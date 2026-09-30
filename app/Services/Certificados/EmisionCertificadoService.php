<?php

namespace App\Services\Certificados;

use App\Models\Ficha;
use App\Models\GenerarCertificado;
use App\Models\GenerarNumeracion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class EmisionCertificadoService
{
    public function defaults(Ficha $ficha, string $tipo): array
    {
        if ($tipo === 'catastral') {
            return app(DatosCatastrales::class)->desdeFicha($ficha);
        }
        return app(DatosNumeracion::class)->desdeFicha($ficha);
    }

    public function sourceImages(Ficha $ficha): array
    {
        $images = [];
        foreach (['foto' => ['imagen_lote', 'imageneslotes'], 'plano' => ['imagen_plano', 'imagenesplanos']] as $key => [$column, $folder]) {
            $name = $ficha->fichaindividual?->{$column};
            if ($name && basename($name) === $name) {
                foreach (['local', 'public'] as $disk) {
                    $path = 'img/'.$folder.'/'.$name;
                    if (Storage::disk($disk)->exists($path)) {
                        $images[$key] = Storage::disk($disk)->path($path);
                        break;
                    }
                }
            }
        }
        return $images;
    }

    public function emit(Ficha $ficha, string $tipo, array $datos, int $usuario, array $uploads = [], ?string $idPuerta = null): Model
    {
        abort_unless(in_array($tipo, ['numeracion', 'catastral'], true), 422);
        $rules = $tipo === 'catastral' ? CamposCertificado::manualesCatastral() : CamposCertificado::manualesNumeracion();
        $datos = Validator::make(['datos' => $datos], $rules)->validate()['datos'];
        $model = $tipo === 'numeracion' ? new GenerarNumeracion : new GenerarCertificado;
        if ($tipo === 'numeracion') {
            Validator::make($uploads, ['foto' => 'required|image|mimes:jpg,jpeg,png|max:8192'])->validate();
        }
        // Las consultas GIS y HTTP ocurren antes de bloquear ficha y correlativo.
        $ficha = Ficha::findOrFail($ficha->getKey());
        if ($tipo === 'numeracion' && $idPuerta !== null) {
            PuertaCertificado::seleccionar($ficha, $idPuerta);
        }
        $ubicacion = app(UbicacionPredioService::class)->obtener($ficha, $tipo, $idPuerta);
        $loteConsultado = $ficha->id_lote;
        $files = [];
        try {
            return DB::transaction(function () use ($ficha, $tipo, $datos, $usuario, $uploads, $model, $ubicacion, $loteConsultado, $idPuerta, &$files) {
                $ficha = Ficha::whereKey($ficha->getKey())->lockForUpdate()->firstOrFail();
                if ($ficha->id_lote !== $loteConsultado) {
                    throw ValidationException::withMessages(['emision' => 'El lote de la ficha cambió durante la consulta. Vuelve a generar el certificado.']);
                }
                $ficha->load('fichaindividual');
                if ($tipo === 'catastral') {
                    $automaticos = app(DatosCatastrales::class)->desdeFicha($ficha);
                    $datos = array_replace($automaticos, array_intersect_key($datos, array_flip(DatosCatastrales::MANUALES)));
                    $datos['numero'] = app(CorrelativoCatastral::class)->siguiente((int) substr($datos['fecha'], 0, 4));
                    Validator::make(['datos' => $datos], CamposCertificado::rules('catastral'), [], [
                        'datos.titulares' => 'titulares de la ficha o su cotitularidad',
                        'datos.direccion' => 'dirección de la puerta principal P',
                        'datos.area' => 'área verificada de la ficha',
                        'datos.perimetro' => 'perímetro (revisa los cuatro linderos de campo de la ficha)',
                    ])->validate();
                    $uploads = [];
                }
                if ($tipo === 'numeracion') {
                    $automaticos = app(DatosNumeracion::class)->desdeFicha($ficha, $idPuerta);
                    $datos = array_replace($automaticos, array_intersect_key($datos, array_flip(DatosNumeracion::MANUALES)));
                    $datos['numero'] = app(CorrelativoCertificado::class)->siguiente((int) substr($datos['fecha'], 0, 4), $tipo);
                    $datos['observaciones'] = DatosNumeracion::observaciones($datos['solicitante']);
                    $datos['observaciones_fijas'] = true;
                    Validator::make(['datos' => $datos], CamposCertificado::rules($tipo), [], [
                        'datos.titulares' => 'titulares de la ficha o su cotitularidad',
                        'datos.direccion' => 'dirección de la puerta seleccionada',
                        'datos.tipo_numeracion' => 'tipo de numeración de la puerta seleccionada',
                    ])->validate();
                    $uploads = array_intersect_key($uploads, ['foto' => true]);
                }
                $datos = array_replace($datos, $ubicacion['datos']);
                $sources = $tipo === 'catastral' ? $this->sourceImages($ficha) : [];
                // El plano pertenece a esta consulta GIS, no a una imagen antigua de la ficha.
                unset($sources['plano']);
                if ($ubicacion['png'] !== null) {
                    $path = 'certificados/'.Str::uuid().'.png';
                    $files[] = $path;
                    if (!Storage::disk('local')->put($path, $ubicacion['png'])) {
                        throw new \RuntimeException('No se pudo conservar el plano del certificado.');
                    }
                }
                $images = $ubicacion['png'] !== null ? ['plano' => $path] : [];
                $source = isset($uploads['foto']) ? $uploads['foto']->getRealPath() : ($sources['foto'] ?? null);
                if (!$source) {
                    throw ValidationException::withMessages(['foto' => $tipo === 'catastral'
                        ? 'Falta la fotografía en la ficha. Regístrala en sus imágenes antes de emitir.'
                        : 'Adjunta la fotografía de la puerta.']);
                }
                $mime = getimagesize($source)['mime'] ?? null;
                if (!in_array($mime, ['image/jpeg', 'image/png'], true)) {
                    throw ValidationException::withMessages(['foto' => 'La imagen debe ser JPG o PNG.']);
                }
                $path = 'certificados/'.Str::uuid().($mime === 'image/png' ? '.png' : '.jpg');
                $files[] = $path;
                if (!Storage::disk('local')->put($path, file_get_contents($source))) {
                    throw new \RuntimeException('No se pudo conservar la imagen del certificado.');
                }
                $images['foto'] = $path;
                $model->id_ficha = $ficha->id_ficha;
                $model->id_uni_cat = $ficha->id_uni_cat;
                $model->dc = $ficha->dc;
                $model->codi_uso = $ficha->fichaindividual?->codi_uso ?? '';
                $model->fecha_emision = $datos['fecha'];
                $model->id_usuario = $usuario;
                $model->observaciones = $datos['observaciones'] ?? null;
                $model->numero_documento = $datos['numero'];
                $model->documento = ['version' => 1, 'tipo' => $tipo, 'datos' => $datos, 'imagenes' => $images, 'geografia' => [
                    'srid' => config('certificados.ubicacion.srid'),
                    'consultado_en' => $ubicacion['consultado_en'],
                    'advertencias' => $ubicacion['advertencias'],
                ]];
                if ($tipo === 'catastral') {
                    $model->nombresolicitud = $datos['solicitante'];
                    $model->area_verificada = $datos['area'];
                }
                $model->save();
                return $model;
            });
        } catch (\Throwable $error) {
            Storage::disk('local')->delete($files);
            if ($error instanceof \Illuminate\Database\QueryException && in_array((string) $error->getCode(), ['23505', '23000'], true)) {
                throw ValidationException::withMessages(['datos.numero' => 'No se pudo guardar: revisa que el número de certificado no esté repetido.']);
            }
            throw $error;
        }
    }
}
