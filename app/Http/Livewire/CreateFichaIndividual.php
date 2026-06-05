<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateFichaIndividual extends Component
{
    public $tipo_ficha;
    public $nume_ficha;
    public $dc;
    public $nume_ficha_lote;
    public $declarante;
    public $fecha_declarante;
    public $supervisor;
    public $fecha_supervision;
    public $tecnico;
    public $fecha_levantamiento;
    public $verificador;
    public $fecha_verificacion;
    public $nume_registro;

    public $tipoEdificacion;
    public $codi_entrada;
    public $codi_piso;
    public $codi_unidad;
    public $tipo_interior;
    public $cuc;
    public $cuc_antecedente;
    public $codi_hoja_catastral;
    public $codi_pred_rentas;
    public $nume_interior;
    public $unid_acum_rentas;
    public $codi_cont_rentas;


    public $totalSteps = 13;
    public $actualStep = 1;
    public $llenadoStep = 1;
    
    public function render()
    {
        return view('livewire.create-ficha-individual');
    }

    public function incrementarStep(){

        $this->resetErrorBag();
        $this->validateData();
        if($this->actualStep==12){
            $this->actualStep++;
            if($this->actualStep > $this->totalSteps){
                $this->actualStep = $this->totalSteps;
            }
        }else{
            $this->actualStep++;
        }
        
    }

    public function retrocederStep(){
        $this->resetErrorBag();
        $this->actualStep--;
        if($this->actualStep < 1){
            $this->actualStep = 1;
        } 
    }

    public function verStep($i)
    {
        $this->actualStep = $i;
    }

    public function validateData()
    {
        $this->resetErrorBag();
        if($this->actualStep == 1){
            $this->validate([
                'nume_ficha' => 'nullable',
                'nume_ficha_lote' => 'nullable',
                'cuc' => 'nullable',
                'codi_hoja_catastral' => 'nullable',
                'codi_cont_rentas' => 'nullable',
                'codi_pred_rentas' => 'nullable',
                'unid_acum_rentas' => 'nullable',
            ]);
            $this->llenadoStep++;

        }
    }
}
