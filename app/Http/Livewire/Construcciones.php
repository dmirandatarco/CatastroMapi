<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HabUrbana;
use App\Models\Via;
class Construcciones extends Component
{
    public $cont=1;
    public function render()
    {
        return view('livewire.construcciones');
    }

    public function mount(){

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
