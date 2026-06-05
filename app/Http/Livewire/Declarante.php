<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Declarante extends Component
{
    public $num_documentode_clarante;
    public $nombres_declarante;
    public $apellido_paterno_declarante;
    public $apellido_materno_declarante;
    
    public function render()
    {
        $dni=$this->num_documentode_clarante;
        if($dni!=""){
            $token= config('services.apisunat.token');
            $urldni=config('services.apisunat.urldni');
            $response=Http::withHeaders([
                'Referer' => 'http://apis.net.pe/api-ruc',
                'Authorization' => 'Bearer ' . $token
            ])->get($urldni.$dni);
            
            $persona=($response->json());
            $this->nombres_declarante=$persona['nombres'];
            $this->apellido_paterno_declarante=$persona['apellidoPaterno'];
            $this->apellido_materno_declarante=$persona['apellidoMaterno'];
        }
        

        return view('livewire.declarante');
    }

    
}
