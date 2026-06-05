<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HabUrbana;
use App\Models\Via;


class CotitularCatastral extends Component
{
    public $total;

    public function mount()
    {
        
    }
    
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
        return view('livewire.cotitular-catastral');
    }
}
