<?php

namespace App\Http\Livewire;

class GenerarNumeracionCreate extends CertificadoCreate
{
    protected function tipo(): string
    {
        return 'numeracion';
    }
}
