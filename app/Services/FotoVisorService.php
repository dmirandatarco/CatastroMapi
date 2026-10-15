<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use RuntimeException;

class FotoVisorService
{
    public function convertir(string $disco, string $nombre): string
    {
        if ($nombre === '' || basename(str_replace('\\', '/', $nombre)) !== $nombre || str_contains($nombre, "\0")) {
            throw new RuntimeException('Nombre de foto inválido.');
        }
        $storage = Storage::disk($disco);
        $ruta = 'img/imageneslotes/'.$nombre;
        if (!$storage->fileExists($ruta)) {
            throw new RuntimeException('No existe la foto original.');
        }
        if ($storage->size($ruta) > 25 * 1024 * 1024) {
            throw new RuntimeException('La foto supera 25 MB; requiere revisión.');
        }
        $bytes = $storage->get($ruta);
        $info = @getimagesizefromstring($bytes);
        if (!$info) {
            throw new RuntimeException('No se pudo reconocer la imagen original.');
        }
        if ($info['mime'] === 'image/jpeg') {
            // Copiar los bytes originales: no decodificar ni recomprimir fotos de alta resolución.
            return $bytes;
        }
        if ($info[0] * $info[1] > 16000000) {
            throw new RuntimeException('La imagen no es JPEG y supera 16 megapíxeles; su conversión requiere revisión.');
        }
        $imagen = @imagecreatefromstring($bytes);
        if (!$imagen) {
            throw new RuntimeException('Formato no soportado por GD en este servidor.');
        }
        $fondo = imagecreatetruecolor($info[0], $info[1]);
        try {
            imagefill($fondo, 0, 0, imagecolorallocate($fondo, 255, 255, 255));
            imagecopy($fondo, $imagen, 0, 0, 0, 0, $info[0], $info[1]);
            ob_start();
            try {
                if (!imagejpeg($fondo, null, 90)) {
                    throw new RuntimeException('No se pudo convertir a JPEG.');
                }
                return ob_get_contents();
            } finally {
                ob_end_clean();
            }
        } finally {
            imagedestroy($imagen);
            imagedestroy($fondo);
        }
    }
}
