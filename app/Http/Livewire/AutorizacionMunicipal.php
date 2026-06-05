<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Actividades;

class AutorizacionMunicipal extends Component
{
    public $cont=1;
    public $actividades;

    public function render()
    {
        return view('livewire.autorizacion-municipal');
    } 

    public function mount()
    {
        $this->actividades = Actividades::orderBy('nombre', 'asc')->get();
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
