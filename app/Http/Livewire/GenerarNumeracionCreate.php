<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Actividades;
use Illuminate\Support\Facades\Http;
use App\Models\Ficha;
use App\Models\Uso;
use App\Models\GenerarNumeracion;
use App\Models\UbicacionCertificado;
use Carbon\Carbon;

use App\Models\TitularCertificado;

use DB;
use App\Models\Via;

class GenerarNumeracionCreate extends Component
{
    public $numeracion;

    public $cont=1;
    public $via2=array([]);
    public $tipoVia;

    public $tipoVianombre;
    public $tipoViatipo;
    public $tipopuerta;
    public $nume_muni;
    public $cond_nume;
    public $vias;

    //AREAS
    public $area_declarada;
    public $area_verificada;
    public $porc_bc_terr_legal;
    public $porc_bc_terr_fisc;


    //TITULARES
    public $tipoTitular;
    public $esta_civil1;
    public $tipo_doc1;
    public $numedoc1;
    public $nombres1;
    public $ape_paterno1;
    public $ape_materno1;
    public $tipo_doc2;
    public $numedoc2;
    public $nombres2;
    public $ape_paterno2;
    public $ape_materno2;
    public $persona;
    public $numedoc3;
    public $razon_social;
    public $tipo_persona_juridica;
    public $cuadra;
    public $interior;

    //CONDICION DEL PREDIO
    public $clasificacion;
    public $codi_uso;
    public $tipo_edificacion;
    public $cont_en;

    //OBSERVACION
    public $observacion;

    public $id_uni_cat;
    public $id_ficha;





    public function render()
    {
        return view('livewire.generar-numeracion-create');
    }

    public function register()
    {
        try
        {
            $this->validate([

                'numeracion'                    => 'required|max:15|unique:generar_numeracions,numeracion',
                //
                'area_declarada'                => ['nullable','regex:/^\d{1,5}(\.\d{1,2})?$/',],
                'area_verificada'               => ['nullable','regex:/^\d{1,5}(\.\d{1,2})?$/',],
                'porc_bc_terr_legal'            => ['nullable','regex:/^\d{1,5}(\.\d{1,2})?$/',],
                'porc_bc_terr_fisc'             => ['nullable','regex:/^\d{1,5}(\.\d{1,2})?$/',],

                'tipo_doc1'                     => 'nullable',
                'numedoc1'                      => 'nullable|max:17',
                'nombres1'                      => 'nullable|max:150',
                'ape_paterno1'                  => 'nullable|max:50',
                'ape_materno1'                  => 'nullable|max:50',
                'numedoc3'                      => 'nullable|max:17',
                'razon_social'                  => 'nullable|max:100',
                //DESCRIPCION DEL PREDIO
                'clasificacion'                 => 'required',
                'codi_uso'                      => 'required',
                'tipo_edificacion'              => 'nullable',
                'cont_en'                       => 'required',
                'observacion'                   => 'nullable|max:1000',
            ]);

            for($i=0;$i<$this->cont;$i++){
                $this->validate([
                    'tipoVia.'.$i                     => 'required',
                    'tipopuerta.'.$i                  => 'required',
                    'cuadra.'.$i                      => 'nullable|max:20',
                    'interior.'.$i                    => 'nullable|max:10',
                ]);
            }

            DB::beginTransaction();

            $mytime= Carbon::now('America/Lima');
            $date = $mytime->format('Y-m-d');

            $generacionnumeracion = New GenerarNumeracion;

            $generacionnumeracion->area_declarada        = $this->area_declarada;
            $generacionnumeracion->numeracion            = $this->numeracion;
            $generacionnumeracion->dc            = $this->dc;
            $generacionnumeracion->area_verificada       = $this->area_verificada;
            $generacionnumeracion->porc_bc_terr_legal    = $this->porc_bc_terr_legal;
            $generacionnumeracion->porc_bc_terr_fisc     = $this->porc_bc_terr_fisc;
            $generacionnumeracion->clasificacion         = $this->clasificacion;
            $generacionnumeracion->cont_en               = $this->cont_en;
            $generacionnumeracion->codi_uso              = $this->codi_uso;
            $generacionnumeracion->tipo_edificacion      = $this->tipo_edificacion;
            $generacionnumeracion->observaciones         = $this->observacion;
            $generacionnumeracion->id_uni_cat            = $this->id_uni_cat;
            $generacionnumeracion->id_ficha              = $this->id_ficha;
            $generacionnumeracion->id_usuario            = \Auth::user()->id_usuario;
            $generacionnumeracion->fecha_emision         = $date;
            $generacionnumeracion->save();

            //PUERTAS
            $contpuertas=0;
            while($contpuertas<$this->cont)
            {
                $puerta= new UbicacionCertificado();


                if(isset($this->tipoVia[$contpuertas])){
                    $puerta->via_id=$this->tipoVia[$contpuertas];
                }
                if(isset($this->tipopuerta[$contpuertas])){
                    $puerta->codi_puerta=$this->tipopuerta[$contpuertas];
                }
                if(isset($this->tipopuerta[$contpuertas])){
                    $puerta->tipo_puerta=$this->tipopuerta[$contpuertas];
                }
                if(isset($this->cuadra[$contpuertas])){
                    $puerta->cuadra=$this->cuadra[$contpuertas];
                }
                if(isset($this->interior[$contpuertas])){
                    $puerta->interior=$this->interior[$contpuertas];
                }
                $puerta->certificado_id        = $generacionnumeracion->id;

                $puerta->save();
                $contpuertas++;
            }

            if($this->tipoTitular==1)
            {
                $persona= new TitularCertificado();
                $persona->nume_doc              = $this->numedoc1;
                $persona->tipo_doc              = $this->tipo_doc1;
                $persona->tipo_persona          = $this->tipoTitular;
                $persona->nombres               = $this->nombres1;
                $persona->ape_paterno           = $this->ape_paterno1;
                $persona->ape_materno           = $this->ape_materno1;
                $persona->tipo_persona_juridica = $this->tipo_persona_juridica;
                $persona->tipo_funcion          = 1;
                $persona->nregistro             = "";
                $persona->razon_social          = $this->razon_social;
                $persona->certificado_id        = $generacionnumeracion->id;
                $persona->save();
            }
            else {
                if($this->tipoTitular==2)
                {
                    $persona= new TitularCertificado();
                    $persona->nume_doc              = $this->numedoc3;
                    $persona->tipo_persona_juridica = $this->tipo_persona_juridica;
                    $persona->razon_social          = $this->razon_social;
                    $persona->certificado_id        = $generacionnumeracion->id;
                    $persona->save();
                }
            }
            if($this->esta_civil1=='02' || $this->esta_civil1=='05'){
                $persona2= new TitularCertificado();
                $persona2->nume_doc              = $this->numedoc2;
                $persona2->tipo_doc              = $this->tipo_doc2;
                $persona2->tipo_persona          = 1;
                $persona2->nombres               = $this->nombres2;
                $persona2->ape_paterno           = $this->ape_paterno2;
                $persona2->ape_materno           = $this->ape_materno2;
                $persona2->tipo_persona_juridica = $this->tipo_persona_juridica;
                $persona2->tipo_funcion          = 1;
                $persona2->nregistro             = "";
                $persona2->certificado_id        = $generacionnumeracion->id;
                $persona2->save();
            }
            DB::commit();
        }
        catch(Exception $e){
            DB::rollBack();
        }

        return redirect()->route('generarnumeracion.reportegenerarcertificado')
            ->with('success', 'Ficha Economica Agregado Correctamente.');
    }

    public function mount(Ficha $fichaanterior)
    {
        $this->fichaanterior=$fichaanterior;
        $this->id_uni_cat = $fichaanterior->id_uni_cat;
        $this->dc = $fichaanterior->dc;
        $this->id_ficha = $fichaanterior->id_ficha;
        $this->usos=Uso::all();
        $this->vias=Via::orderBy('codi_via')->get();
        for($i=0;$i<$this->cont;$i++){
            $this->tipoVianombre[$i]="";
            $this->tipoViatipo[$i]="";
        }

        $this->cont = count($fichaanterior?->puertas);

        foreach($fichaanterior?->puertas as $i => $puerta){
            $this->tipoVia[$i]=$puerta?->id_via;
            $this->tipoViatipo[$i]=$puerta?->via?->tipo_via;
            $this->tipoVianombre[$i]=$puerta?->via?->nomb_via;
            $this->tipopuerta[$i]=$puerta?->tipo_puerta;

        }
        $this->area_declarada=$fichaanterior?->fichaindividual?->area_declarada;
        $this->area_verificada=$fichaanterior?->fichaindividual?->area_verificada;
        $this->porc_bc_terr_legal = $fichaanterior?->fichaindividual?->porc_bc_terr_legal;
        $this->porc_bc_terr_fisc = $fichaanterior?->fichaindividual?->porc_bc_terr_fisc;
        $this->clasificacion=$fichaanterior?->fichaindividual?->clasificacion;
        $this->cont_en=$fichaanterior?->fichaindividual?->cont_en;
        $this->codi_uso=$fichaanterior?->fichaindividual?->codi_uso;
        $this-> tipo_edificacion = $fichaanterior?->unicat?->edificacion?->tipo_edificacion;
        $this->observacion = $fichaanterior?->fichaindividual?->observaciones;


        #IDENTIFICACIÓN DEL TITULAR CATASTRAL
        if($fichaanterior?->titular!="")
        {
            $this-> tipoTitular = $fichaanterior?->titulars[0]?->persona?->tipo_persona;
            if($fichaanterior?->titulars[0]?->persona?->tipo_persona==1){
                $this-> esta_civil1 = $fichaanterior?->titulars[0]?->esta_civil;
                $this-> tipo_doc1 = $fichaanterior?->titulars[0]?->persona?->tipo_doc;
                $this-> numedoc1 = $fichaanterior?->titulars[0]?->persona?->nume_doc;
                $this-> nombres1 = $fichaanterior?->titulars[0]?->persona?->nombres;
                $this-> ape_paterno1 = $fichaanterior?->titulars[0]?->persona?->ape_paterno;
                $this-> ape_materno1 = $fichaanterior?->titulars[0]?->persona?->ape_materno;
            }
            if($fichaanterior?->titulars[0]?->persona?->tipo_persona==2)
            {
                $this-> numedoc3 = $fichaanterior?->titulars[0]?->persona?->nume_doc;
                $this-> razon_social = $fichaanterior?->titulars[0]?->persona?->razon_social;
                $this-> tipo_persona_juridica = $fichaanterior?->titulars[0]?->persona?->tipo_persona_juridica;
            }

            if(isset($fichaanterior?->titulars[1]))
            {
                $this-> tipo_doc2 = $fichaanterior?->titulars[1]?->persona?->tipo_doc;
                $this-> numedoc2 = $fichaanterior?->titulars[1]?->persona?->nume_doc;
                $this-> nombres2 = $fichaanterior?->titulars[1]?->persona?->nombres;
                $this-> ape_paterno2 = $fichaanterior?->titulars[1]?->persona?->ape_paterno;
                $this-> ape_materno2 = $fichaanterior?->titulars[1]?->persona?->ape_materno;
            }
        }


    }

    public function updatednumedoc1()
    {
        if($this->tipo_doc1=="02")
        {
            $dni=$this->numedoc1;
            if($dni!=""){
                $token= config('services.apisunat.token');
                $urldni=config('services.apisunat.urldni');
                $response=Http::withHeaders([
                    'Referer' => 'http://apis.net.pe/api-ruc',
                    'Authorization' => 'Bearer ' . $token
                ])->get($urldni.$dni);

                $persona=($response->json());

                if(isset($persona['error']) || $persona==""){
                    $this->nombres1="";
                    $this->ape_paterno1="";
                    $this->ape_materno1="";
                    $this->numedoc1=$dni;
                    if(isset($persona['error']))
                    {
                        session()->flash('info', 'Se necesita 8 digitos');
                    }
                    if($persona=="")
                    {
                        session()->flash('info', 'No se encontro datos');
                    }
                }else{
                    $this->nombres1=$persona['nombres'];
                    $this->ape_paterno1=$persona['apellidoPaterno'];
                    $this->ape_materno1=$persona['apellidoMaterno'];
                    $this->numedoc1=$dni;
                }
            }
        }
    }
    public function updatednumedoc2()
    {
        if($this->tipo_doc2=="02")
        {
            $dni=$this->numedoc2;
            $token= config('services.apisunat.token');
            $urldni=config('services.apisunat.urldni');

            $host = 'api.apis.net.pe';
            if (gethostbyname($host) == $host) {
                session()->flash('warning', 'No hay conexión a Internet. Por favor, verifica tu conexión y vuelve a intentarlo.');
                // Manejar el error de falta de conexión a Internet aquí
            } else {
                try {
                    $response=Http::timeout(10)->withHeaders([
                        'Referer' => 'http://apis.net.pe/api-ruc',
                        'Authorization' => 'Bearer ' . $token
                    ])->get($urldni.$dni);
                    $persona=($response->json());
                    if(isset($persona['error']) || $persona==""){
                        $this->nombres2="";
                        $this->ape_paterno2="";
                        $this->ape_materno2="";
                        $this->numedoc2=$dni;
                        if(isset($persona['error']))
                        {
                            session()->flash('danger', 'Se necesita 8 digitos');
                        }
                        if($persona=="")
                        {
                            session()->flash('danger', 'No se encontro datos');
                        }
                    }else{
                        $this->nombres2=$persona['nombres'];
                        $this->ape_paterno2=$persona['apellidoPaterno'];
                        $this->ape_materno2=$persona['apellidoMaterno'];
                        $this->numedoc2=$dni;
                    }
                    // Procesar la respuesta de la API aquí
                } catch (RequestException $e) {
                    if ($e->getCode() === CURLE_OPERATION_TIMEOUTED) {

                        session()->flash('warning', 'Se ha superado el límite de tiempo de la solicitud. Por favor, inténtalo de nuevo más tarde.');

                        // Manejar el error de límite de tiempo de respuesta aquí
                    } else {
                        session()->flash('warning', 'Ocurrió un error al consumir la API:');

                        // Manejar otros errores de la API aquí
                    }
                }
            }
        }
    }

    public function updatednumedoc3($value)
    {
        $ruc=$value;
        $token= config('services.apisunat.token');
        $urlruc=config('services.apisunat.urlruc');
        $response=Http::withHeaders([
            'Referer' => 'http://apis.net.pe/api-ruc',
            'Authorization' => 'Bearer ' . $token
        ])->get($urlruc.$ruc);

        $persona=($response->json());
        if($persona==""||isset($persona['error'])){
            $this->razon_social="";
            $this->numedoc3=$ruc;
            if($persona['error']=="RUC invalido")
            {
                session()->flash('warning'.$nested, 'RUC invalido');
            }
            if($persona['error']=="RUC debe contener 11 digitos")
            {
                session()->flash('warning', 'RUC debe contener 11 digitos');
            }
        }else{
            $this->razon_social=$persona['nombre'];
            $this->numedoc3=$ruc;
        }
    }

    public function buscarpuerta($cont,$idpuerta,$idlote)
    {
        $id=$idlote.''.$idpuerta.''.$cont;
        $buscarpuertaexiste=Puerta::where('id_puerta',$id)->first();
        if($buscarpuertaexiste!=""){
            $cont=$cont+1;
            $id=$this->buscarpuerta($cont,$idpuerta,$idlote);
        }else{
            return $id;
        }

        return $id;
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
    public function aumentarUbicacion()
    {
        $this->tipoViatipo[$this->cont]="";
        $this->tipoVianombre[$this->cont]="";
        $this->tipopuerta[$this->cont]="";
        $this->nume_muni[$this->cont]="";
        $this->tipoVia[$this->cont]="";
        $this->cond_nume[$this->cont]="";

        $this->cuadra="";
        $this->interior="";
        $this->cont++;

    }

    public function reducirUbicacion($i)
    {
        if($this->cont > 0){
            $this->cont--;
            array_splice($this->tipoViatipo, $i,1);
            array_splice($this->tipoVianombre,$i,1);
            array_splice($this->tipopuerta, $i,1);
            array_splice($this->nume_muni, $i,1);
            array_splice($this->tipoVia, $i,1);
            array_splice($this->cond_nume,$i,1);
        }
    }
}
