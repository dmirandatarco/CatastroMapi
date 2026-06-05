<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RecapitulacionBienescomunes extends Component
{
    public function render()
    {
        return view('livewire.recapitulacion-bienescomunes');
    }
    public $cont=1;

    public function aumentar()
    {
        $this->cont++;        
    }

    public function reducir()
    {
        $this->cont--;
    }
    
}
