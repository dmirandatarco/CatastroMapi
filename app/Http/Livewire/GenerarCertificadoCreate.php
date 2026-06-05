<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Actividades;
use Illuminate\Support\Facades\Http;
use App\Models\Ficha;
use App\Models\Uso;
use App\Models\Via;
use App\Models\GenerarCertificado;
use App\Models\UbicacionCertificadoCatastral;
use App\Models\TitularCertificadoCatastral;
use App\Models\ConstruccionCertificado;


use Carbon\Carbon;

use DB;


class GenerarCertificadoCreate extends Component
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
    public $area_verificada1;
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


    //CONSTRUCCION
    public $bloque;
    public $num_piso;
    public $fecha;
    public $mep;
    public $ecs;
    public $ecc;
    public $estr_muro_col;
    public $estr_techo;
    public $acab_piso;
    public $acab_puerta_ven;
    public $acab_revest;
    public $acab_bano;
    public $inst_elect_sanita;
    public $area_verificada;
    public $uca;
    public $cont2=0;

    public $fren_campo;
    public $dere_campo;
    public $izqu_campo;
    public $fond_campo;
    public $fren_colinda_campo;
    public $dere_colinda_campo;
    public $izqu_colinda_campo;
    public $fond_colinda_campo;

    public $nombresolicitud;




    public function render()
    {
        return view('livewire.generar-certificado-create');
    }

    public function register()
    {
        try
        {
            $this->validate([

                //AREAS
                'area_declarada'                => ['nullable','regex:/^\d{1,5}(\.\d{1,2})?$/',],
                'area_verificada1'               => ['nullable','regex:/^\d{1,5}(\.\d{1,2})?$/',],
                'porc_bc_terr_legal'            => ['nullable','regex:/^\d{1,5}(\.\d{1,2})?$/',],
                'porc_bc_terr_fisc'             => ['nullable','regex:/^\d{1,5}(\.\d{1,2})?$/',],
                //TITULARES
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

                //MEDIDAS EN CAMPO
                'fren_campo'                    => 'nullable|max:200',
                'dere_campo'                    => 'nullable|max:200',
                'izqu_campo'                    => 'nullable|max:200',
                'fond_campo'                    => 'nullable|max:200',
                'fren_colinda_campo'            => 'nullable|max:200',
                'dere_colinda_campo'            => 'nullable|max:200',
                'izqu_colinda_campo'            => 'nullable|max:200',
                'fond_colinda_campo'            => 'nullable|max:200',

            ]);

            for($i=0;$i<$this->cont2;$i++){
                $this->validate([
                    'num_piso.'.$i                    => 'required|max:2',
                    'fecha.'.$i                       => 'nullable',
                    'mep.'.$i                         => 'nullable',
                    'ecs.'.$i                         => 'nullable',
                    'ecc.'.$i                         => 'nullable',
                    'estr_muro_col.'.$i               => 'nullable|max:1',
                    'estr_techo.'.$i                  => 'nullable|max:1',
                    'acab_piso.'.$i                   => 'nullable|max:1',
                    'acab_puerta_ven.'.$i             => 'nullable|max:1',
                    'acab_revest.'.$i                 => 'nullable|max:1',
                    'acab_bano.'.$i                   => 'nullable|max:1',
                    'inst_elect_sanita.'.$i           => 'nullable|max:1',
                    'area_verificada.'.$i             => 'nullable|numeric|regex:/^[\d]{0,8}(\.[\d]{1,2})?$/',
                    'uca.'.$i                         => 'nullable',
                ]);
            }

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

            $generacionnumeracion = New GenerarCertificado;

            $generacionnumeracion->area_declarada        = $this->area_declarada;
            $generacionnumeracion->dc                    = $this->dc;
            $generacionnumeracion->area_verificada       = $this->area_verificada1;
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

            #LINDEROS
            $generacionnumeracion->fren_campo=$this->fren_campo;
            $generacionnumeracion->fren_colinda_campo=$this->fren_colinda_campo;
            $generacionnumeracion->dere_campo=$this->dere_campo;
            $generacionnumeracion->dere_colinda_campo=$this->dere_colinda_campo;
            $generacionnumeracion->izqu_campo=$this->izqu_campo;
            $generacionnumeracion->izqu_colinda_campo=$this->izqu_colinda_campo;
            $generacionnumeracion->fond_campo=$this->fond_campo;
            $generacionnumeracion->fond_colinda_campo=$this->fond_colinda_campo;

            $generacionnumeracion->nombresolicitud = $this->nombresolicitud;
            $generacionnumeracion->save();


            //PUERTAS
            $contpuertas=0;
            while($contpuertas<$this->cont)
            {
                $puerta= new UbicacionCertificadoCatastral();


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
                $puerta->certificado_id = $generacionnumeracion->id;
                $puerta->save();

                $contpuertas++;
            }

            if($this->tipoTitular==1)
            {
                $persona= new TitularCertificadoCatastral();
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
                    $persona= new TitularCertificadoCatastral();
                    $persona->nume_doc              = $this->numedoc3;
                    $persona->tipo_persona_juridica = $this->tipo_persona_juridica;
                    $persona->razon_social          = $this->razon_social;
                    $persona->certificado_id        = $generacionnumeracion->id;
                    $persona->save();
                }
            }
            if($this->esta_civil1=='02' || $this->esta_civil1=='05'){
                $persona2= new TitularCertificadoCatastral();
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

            $contcon=0;
            $construcciones=$this->cont2;
            if($construcciones!=""){
                while($contcon < $this->cont2){
                    $construccion=new ConstruccionCertificado();
                    $construccion->codi_construccion=$contcon+1;
                    if(isset($this->bloque[$contcon])){
                        if($this->bloque[$contcon]!=""){
                            $construccion->bloque=$this->bloque[$contcon];
                        }else{
                            $construccion->bloque="";
                        }
                    }
                    if(isset($this->num_piso[$contcon])){
                        if($this->num_piso[$contcon]!=""){
                            $construccion->nume_piso=$this->num_piso[$contcon];
                        }else{
                            $construccion->nume_piso="";
                        }
                    }
                    if(isset($this->fecha[$contcon])){
                        if($this->fecha[$contcon]!=""){
                            $fechaformato = $this->fecha[$contcon].'-01';
                            $construccion->fecha=$fechaformato;
                        }else{
                            $construccion->fecha="";
                        }
                    }
                    if(isset($this->mep[$contcon])){
                        if($this->mep[$contcon]!=""){
                            $construccion->mep=$this->mep[$contcon];
                        }else{
                            $construccion->mep="";
                        }
                    }
                    if(isset($this->ecs[$contcon])){
                        if($this->ecs[$contcon]!=""){
                            $construccion->ecs=$this->ecs[$contcon];
                        }else{
                            $construccion->ecs="";
                        }
                    }
                    if(isset($this->ecc[$contcon])){
                        if($this->ecc[$contcon]!=""){
                            $construccion->ecc=$this->ecc[$contcon];
                        }else{
                            $construccion->ecc="";
                        }
                    }
                    if(isset($this->estr_muro_col[$contcon])){
                        if($this->estr_muro_col[$contcon]!=""){
                            $construccion->estr_muro_col=$this->estr_muro_col[$contcon];
                        }else{
                            $construccion->estr_muro_col="";
                        }
                    }
                    if(isset($this->estr_techo[$contcon])){
                        if($this->estr_techo[$contcon]!=""){
                            $construccion->estr_techo=$this->estr_techo[$contcon];
                        }else{
                            $construccion->estr_techo="";
                        }
                    }
                    if(isset($this->acab_piso[$contcon])){
                        if($this->acab_piso[$contcon]!=""){
                            $construccion->acab_piso=$this->acab_piso[$contcon];
                        }else{
                            $construccion->acab_piso="";
                        }
                    }
                    if(isset($this->acab_puerta_ven[$contcon])){
                        if($this->acab_puerta_ven[$contcon]!=""){
                            $construccion->acab_puerta_ven=$this->acab_puerta_ven[$contcon];
                        }else{
                            $construccion->acab_puerta_ven="";
                        }
                    }
                    if(isset($this->acab_revest[$contcon])){
                        if($this->acab_revest[$contcon]!=""){
                            $construccion->acab_revest=$this->acab_revest[$contcon];
                        }else{
                            $construccion->acab_revest="";
                        }
                    }
                    if(isset($this->acab_bano[$contcon])){
                        if($this->acab_bano[$contcon]!=""){
                            $construccion->acab_bano=$this->acab_bano[$contcon];
                        }else{
                            $construccion->acab_bano="";
                        }
                    }
                    if(isset($this->inst_elect_sanita[$contcon])){
                        if($this->inst_elect_sanita[$contcon]!=""){
                            $construccion->inst_elect_sanita=$this->inst_elect_sanita[$contcon];
                        }else{
                            $construccion->inst_elect_sanita="";
                        }
                    }
                    $construccion->area_declarada=0.00;
                    if(isset($this->area_verificada[$contcon])){
                        if($this->area_verificada[$contcon]!=""){
                            $construccion->area_verificada=$this->area_verificada[$contcon];
                        }
                    }
                    if(isset($this->uca[$contcon])){
                        if($this->uca[$contcon]!=""){
                            $construccion->uca=$this->uca[$contcon];
                        }else{
                            $construccion->uca="";
                        }
                    }
                    $construccion->certificado_id        = $generacionnumeracion->id;
                    $construccion->save();
                    $contcon++;
                }
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
        $this->area_verificada1=$fichaanterior?->fichaindividual?->area_verificada;
        $this->porc_bc_terr_legal = $fichaanterior?->fichaindividual?->porc_bc_terr_legal;
        $this->porc_bc_terr_fisc = $fichaanterior?->fichaindividual?->porc_bc_terr_fisc;
        $this->clasificacion=$fichaanterior?->fichaindividual?->clasificacion;
        $this->cont_en=$fichaanterior?->fichaindividual?->cont_en;
        $this->codi_uso=$fichaanterior?->fichaindividual?->codi_uso;
        $this-> tipo_edificacion = $fichaanterior?->unicat?->edificacion?->tipo_edificacion;
        $this->observacion = $fichaanterior?->fichaindividual?->observaciones;

        #CONSTRUCCIONES
        if($fichaanterior?->construccions!="")
        {
            $this->cont2 = count($fichaanterior?->construccions);

            foreach($fichaanterior?->construccions as $i => $construccion){
                $this->bloque[$i]=$construccion?->bloque;
                $this->num_piso[$i]=$construccion?->nume_piso;
                $fechaFormateada = Carbon::parse($construccion?->fecha)->format('Y-m');
                $this->fecha[$i]=$fechaFormateada;
                $this->mep[$i]=$construccion?->mep;
                $this->ecs[$i]=$construccion?->ecs;
                $this->ecc[$i]=$construccion?->ecc;
                $this->estr_muro_col[$i]=$construccion?->estr_muro_col;
                $this->estr_techo[$i]=$construccion?->estr_techo;
                $this->acab_piso[$i]=$construccion?->acab_piso;
                $this->acab_puerta_ven[$i]=$construccion?->acab_puerta_ven;
                $this->acab_revest[$i]=$construccion?->acab_revest;
                $this->acab_bano[$i]=$construccion?->acab_bano;
                $this->inst_elect_sanita[$i]=$construccion?->inst_elect_sanita;
                $this->area_verificada[$i]=$construccion?->area_verificada;
                $this->uca[$i]=$construccion?->uca;
            }
        }
        if($fichaanterior?->lindero!="")
        {
            $this->fren_campo=$fichaanterior?->lindero?->fren_campo;
            $this->dere_campo=$fichaanterior?->lindero?->dere_campo;
            $this->izqu_campo=$fichaanterior?->lindero?->izqu_campo;
            $this->fond_campo=$fichaanterior?->lindero?->fond_campo;
            $this->fren_colinda_campo=$fichaanterior?->lindero?->fren_colinda_campo;
            $this->dere_colinda_campo=$fichaanterior?->lindero?->dere_colinda_campo;
            $this->izqu_colinda_campo=$fichaanterior?->lindero?->izqu_colinda_campo;
            $this->fond_colinda_campo=$fichaanterior?->lindero?->fond_colinda_campo;
        }




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

    public function aumentarConstruccion()
    {
        $this->cont2++;
    }

    public function reducirConstruccion()
    {
        $this->cont2--;
    }
}
