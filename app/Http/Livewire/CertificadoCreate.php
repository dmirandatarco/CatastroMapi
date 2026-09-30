<?php

namespace App\Http\Livewire;

use App\Models\Ficha;
use App\Services\Certificados\CamposCertificado;
use App\Services\Certificados\EmisionCertificadoService;
use Livewire\Component;
use Livewire\WithFileUploads;

abstract class CertificadoCreate extends Component
{
    use WithFileUploads;

    public Ficha $fichaanterior;
    public array $datos = [];
    public $foto;
    public array $ubicacion = ['estado' => 'pendiente', 'advertencias' => [], 'datos' => [], 'plano' => false];

    abstract protected function tipo(): string;

    public function mount(Ficha $fichaanterior)
    {
        abort_unless(auth()->check(), 403);
        $this->fichaanterior = $fichaanterior;
        $this->datos = app(EmisionCertificadoService::class)->defaults($fichaanterior, $this->tipo());
    }

    public function register()
    {
        abort_unless(auth()->check(), 403);
        $rules = $this->tipo() === 'catastral' ? CamposCertificado::manualesCatastral() : CamposCertificado::manualesNumeracion();
        $this->validate($rules + [
            'foto' => ($this->tipo() === 'numeracion' ? 'required' : 'nullable').'|image|mimes:jpg,jpeg,png|max:8192',
        ]);
        try {
            $record = app(EmisionCertificadoService::class)->emit(
                $this->fichaanterior, $this->tipo(), $this->datos, auth()->user()->id_usuario,
                array_filter(['foto' => $this->foto])
            );
        } catch (\Illuminate\Validation\ValidationException $error) {
            throw $error;
        } catch (\Throwable $error) {
            report($error);
            $this->addError('emision', 'No se pudo guardar el certificado. Tus datos siguen en el formulario; vuelve a intentarlo.');
            return;
        }
        $route = $this->tipo() === 'numeracion' ? 'generarnumeracion.reportegenerarcertificado' : 'generarcatastral.reportegenerarcatastral';
        return redirect()->route($route)
            ->with('success', 'Certificado '.$record->numero_documento.' guardado en el historial.')
            ->with('advertencias', $record->documento['geografia']['advertencias'] ?? []);
    }

    public function cargarUbicacion(): void
    {
        abort_unless(auth()->check(), 403);
        $ficha = Ficha::findOrFail($this->fichaanterior->getKey());
        $resultado = app(\App\Services\Certificados\UbicacionPredioService::class)->obtener($ficha, $this->tipo());
        $this->ubicacion = [
            'estado' => 'consultado', 'plano' => $resultado['png'] !== null,
            'datos' => $resultado['datos'], 'advertencias' => $resultado['advertencias'],
        ];
    }

    public function render()
    {
        if ($this->tipo() === 'catastral') {
            return view('livewire.catastral-create', [
                'resumen' => app(\App\Services\Certificados\DatosCatastrales::class)->desdeFicha($this->fichaanterior),
                'imagenes' => app(EmisionCertificadoService::class)->sourceImages($this->fichaanterior),
                'tipoUbicacion' => 'catastral',
            ]);
        }
        return view('livewire.numeracion-create', [
            'campos' => CamposCertificado::definitions('numeracion'),
            'tipoUbicacion' => 'numeracion',
            'resumen' => app(\App\Services\Certificados\DatosNumeracion::class)->desdeFicha($this->fichaanterior),
            'observaciones' => \App\Services\Certificados\DatosNumeracion::observaciones($this->datos['solicitante'] ?: '[SOLICITANTE]'),
        ]);
    }
}
