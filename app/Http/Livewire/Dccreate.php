<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sectore;
use App\Models\Manzana;
use App\Models\Institucion;

class Dccreate extends Component
{
    public $dpto=8;
    public $prov=7;
    public $dist=1;
    public $sector;
    public $mzna;
    public $lote;
    public $edifica;
    public $entrada;
    public $piso;
    public $unidad;
    public $dc;
    public $sectores;
    public $manzanas=[];

    public function mount()
    {
        $this->sectores = Sectore::orderBy('codi_sector', 'asc')->get();
    }

    public function updatedsector($id_sector)
    {
        $id_cod_sector=str_pad($this->dpto,2,'0',STR_PAD_LEFT).''.str_pad($this->prov,2,'0',STR_PAD_LEFT).''.str_pad($this->dist,2,'0',STR_PAD_LEFT).''.$id_sector;
        $this->mostrardc(); 
        $this->mzna=0;
        $this->dc=($this->dpto+$this->prov+$this->dist+$this->sector+$this->mzna+$this->lote+$this->edifica+$this->entrada+$this->piso+$this->unidad)%9;
        $this->manzanas=Manzana::where('id_sector',$id_cod_sector)->get();
    }

    public function updatedunidad()
    {
        $this->mostrardc(); 
        $this->dc=($this->dpto+$this->prov+$this->dist+$this->sector+$this->mzna+$this->lote+$this->edifica+$this->entrada+$this->piso+$this->unidad)%9;
    }
    
    public function mostrardc()
    {
        if($this->sector=="")
        {
            $this->sector=0;
        }
        if($this->mzna=="")
        {
            $this->mzna=0;
        }
        if($this->lote=="")
        {
            $this->lote=0;
        }
        if($this->edifica=="")
        {
            $this->edifica=0;
        }
        if($this->entrada=="")
        {
            $this->entrada=0;
        }
        if($this->piso=="")
        {
            $this->piso=0;
        }
        if($this->unidad=="")
        {
            $this->unidad=0;
        }
    }

    public function updatedpiso()
    {
        $this->mostrardc(); 
        $this->dc=($this->dpto+$this->prov+$this->dist+$this->sector+$this->mzna+$this->lote+$this->edifica+$this->entrada+$this->piso+$this->unidad)%9;
    }

    public function updatedentrada()
    {
        $this->mostrardc(); 
        $this->dc=($this->dpto+$this->prov+$this->dist+$this->sector+$this->mzna+$this->lote+$this->edifica+$this->entrada+$this->piso+$this->unidad)%9;
    }

    public function updatededifica()
    {
        $this->mostrardc(); 
        $this->dc=($this->dpto+$this->prov+$this->dist+$this->sector+$this->mzna+$this->lote+$this->edifica+$this->entrada+$this->piso+$this->unidad)%9;
    }

    public function updatedlote()
    {
        $this->mostrardc(); 
        $this->dc=($this->dpto+$this->prov+$this->dist+$this->sector+$this->mzna+$this->lote+$this->edifica+$this->entrada+$this->piso+$this->unidad)%9;
    }

    public function updatedmzna()
    {
        $this->mostrardc(); 
        $this->dc=($this->dpto+$this->prov+$this->dist+$this->sector+$this->mzna+$this->lote+$this->edifica+$this->entrada+$this->piso+$this->unidad)%9;
    }

    public function render()
    {
        return view('livewire.dccreate');
    }
}
