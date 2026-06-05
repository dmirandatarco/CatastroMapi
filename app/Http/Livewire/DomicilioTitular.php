<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DomicilioTitular extends Component
{
    public $ubicacionpersona;
    
    public function render()
    {
        return view('livewire.domicilio-titular');
    }
}
