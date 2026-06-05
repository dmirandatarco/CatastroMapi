<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HabUrbana;
use App\Models\Via;

class UbicacionPredio extends Component
{
    public $tipoHabi;
    public $via_id;
    public $hab_urbanas;
    public $hab_urbanas2;
    public $hab_urbana2;
    public $cont=1;
    public $via2=array([]);
    public $tipoVia;
    public $tipoVianombre;
    public $tipoViatipo;
    public $nomb_hab_urba;
    public $tipopuerta;
    public $nume_muni;
    public $cond_nume;

    public function mount()
    {
        $this->hab_urbanas = HabUrbana::orderBy('codi_hab_urba', 'asc')->get();
    }

    public function updatedtipoHabi( $id)
    {
        $idbuscar=str_pad($id,10,'0',STR_PAD_LEFT);
        $this->hab_urbana2=HabUrbana::where('id_hab_urba',$idbuscar)->first();
        for($i=0;$i<$this->cont;$i++){
            $this->tipoVianombre[$i]="";
            $this->tipoViatipo[$i]="";
        }
        if($this->hab_urbana2==""){
            $this->nomb_hab_urba="";
        }else{
            $this->nomb_hab_urba=$this->hab_urbana2->nomb_hab_urba;
        }
    }

    
    public function updatedtipoVia($value,$nested)
    {
        $idbuscar=str_pad($value,12,'0',STR_PAD_LEFT);
        $this->via2=Via::where('id_via',$idbuscar)->first();
        if($this->via2=="")
        {
            $this->tipoVianombre[$nested]="";
            $this->tipoViatipo[$nested]="";
        }else{
            $this->tipoVianombre[$nested]=$this->via2->nomb_via;
            $this->tipoViatipo[$nested]=$this->via2->tipo_via;
        }
    }
    
    public function aumentar()
    {
        $this->tipoViatipo[$this->cont]="";
        $this->tipoVianombre[$this->cont]="";
        $this->cont++;
        
    }

    public function reducir()
    {
        $this->cont--;
    }

    public function render()
    {
        return view('livewire.ubicacion-predio');
    }
}
