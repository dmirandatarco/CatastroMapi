<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DocumentosAdjuntos extends Component
{
    public $cont=1;
    public function render()
    {
        return view('livewire.documentos-adjuntos');
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
