<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AutorizacionAnuncio extends Component
{
    public $cont=1;

    public function render()
    {
        return view('livewire.autorizacion-anuncio');
    }

    public function aumentar()
    {
        $this->cont++;        
    }

    public function reducir()
    {
        $this->cont--;
    }
}
