<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class InformacionComplementaria extends Component
{
    public $tipolitigante;
    public $numedoc;
    public $nombres;
    public $ape_materno;
    public $cont=0;
    public $ape_paterno;
    public $codi_contribuye;

    public function render()
    {
        if($this->cont > 0){
            if($this->tipolitigante[$this->cont-1]=="02" && $this->numedoc[$this->cont-1]!=""){
                $token= config('services.apisunat.token');
                $urldni=config('services.apisunat.urldni');
                $response=Http::withHeaders([
                    'Referer' => 'http://apis.net.pe/api-ruc',
                    'Authorization' => 'Bearer ' . $token
                ])->get($urldni.$this->numedoc[$this->cont-1]);
                
                $persona=($response->json());
                $this->nombres[$this->cont-1]=$persona['nombres'];
                $this->ape_paterno[$this->cont-1]=$persona['apellidoPaterno'];
                $this->ape_materno[$this->cont-1]=$persona['apellidoMaterno'];
            }
        }
        
        
        return view('livewire.informacion-complementaria');
    }             

    
    public function aumentar()
    {
        $this->tipolitigante[$this->cont]="0";
        $this->numedoc[$this->cont]="";
        $this->cont++;        
    }

    public function reducir()
    {
        $this->cont--;
    }
}
