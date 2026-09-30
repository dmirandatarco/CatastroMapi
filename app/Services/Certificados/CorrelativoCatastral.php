<?php
namespace App\Services\Certificados;
class CorrelativoCatastral
{
    public function siguiente(int $anio): string
    {
        return app(CorrelativoCertificado::class)->siguiente($anio, 'catastral');
    }
}
