<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class TitularCotitular extends Component
{
    public $tipoTitular;
    public $esta_civil1;
    public $tipo_doc1;
    public $nume_doc1; 
    public $nombres1;
    public $ape_paterno1;
    public $ape_materno1;    
    public $persona;
    public $nume_doc3;  
    public $razon_social;

    public function render()
    {
        if($this->tipo_doc1=="02" && $this->nume_doc1!=""){
            $dni=$this->nume_doc1;
            $token= config('services.apisunat.token');
            $urldni=config('services.apisunat.urldni');
            $response=Http::withHeaders([
                'Referer' => 'http://apis.net.pe/api-ruc',
                'Authorization' => 'Bearer ' . $token
            ])->get($urldni.$dni);
            
            $persona=($response->json());
            if($persona==""){
                $this->nombres1="";
                $this->ape_paterno1="";
                $this->ape_materno1="";
            }else{
                $this->nombres1=$persona['nombres'];
                $this->ape_paterno1=$persona['apellidoPaterno'];
                $this->ape_materno1=$persona['apellidoMaterno'];
            }
            
        }

        if($this->tipoTitular==2 && $this->nume_doc3!=""){
            $ruc=$this->nume_doc3;
            $token= config('services.apisunat.token');
            $urlruc=config('services.apisunat.urlruc');
            $response=Http::withHeaders([
                'Referer' => 'http://apis.net.pe/api-ruc',
                'Authorization' => 'Bearer ' . $token
            ])->get($urlruc.$ruc);
            
            $persona=($response->json());
            if($persona==""){
                $this->razon_social="";
            }else{
                $this->razon_social=$persona['nombre'];
            }
            
        }

        return view('livewire.titular-cotitular');
    }
}
