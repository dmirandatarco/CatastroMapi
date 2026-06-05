<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RecapitulacionEdificios extends Component
{
    public $cont=1;

    public function aumentar()
    {
        $this->cont++;        
    }

    public function reducir()
    {
        $this->cont--;
    }
    public function render()
    {
        return view('livewire.recapitulacion-edificios');
    }
}
