<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ObrasComplementarias extends Component
{
    public $cont=1;

    public function render()
    {
        return view('livewire.obras-complementarias');
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
