<?php

namespace App\Http\Livewire;

class GenerarCertificadoCreate extends CertificadoCreate
{
    protected function tipo(): string
    {
        return 'catastral';
    }
}
