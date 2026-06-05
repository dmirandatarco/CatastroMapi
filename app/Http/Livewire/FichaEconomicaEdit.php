<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Actividades;
use Illuminate\Support\Facades\Http;
use App\Models\Ficha;
use App\Models\Uso;
use App\Models\Ubiges;
use App\Models\HabUrbana;
use App\Models\Persona;
use App\Models\Sectore;
use App\Models\Manzana;
use App\Models\UniCat;
use App\Models\Lote;
use App\Models\Edificaciones;
use Carbon\Carbon;
use App\Models\FichaEconomica;
use App\Models\Institucion;
use App\Models\Conductor;
use App\Models\DomicilioTitular;
use App\Models\AutorizacionAnuncio;
use DB;
use Illuminate\Validation\Rule;

class FichaEconomicaEdit extends Component
{
    public $cont1;
    public $cont2;
    public $actividades;
    public $fichaanterior;
    public $tecnicos;
    public $supervisores;
    public $verificadores;
    public $departamentos;
    public $provincias;
    public $distritos;
    public $numeficha;
    public $codigo_secuencial;
    public $nume_ficha_lote;
    public $nume_ficha_lote2;
    public $codi_hoja_catastral;
    public $cuc;
    public $dpto=8;
    public $prov=1;
    public $dist=8;
    public $sector;
    public $mzna;
    public $lote;
    public $edifica;
    public $entrada;
    public $piso;
    public $unidad;
    public $dc;
    public $tipoConductor;
    public $requiredtipoConductor;
    public $nomb_comercial;
    public $tipo_doc1;
    public $numedoc1;
    public $nombres1;
    public $ape_paterno1;
    public $ape_materno1;
    public $numedoc3;
    public $razon_social;
    public $cond_conductor;

    public $deparamentoconductor;
    public $provinciaconductor;
    public $distritoconductor;
    public $telefonoconductor;
    public $anexoconductor;
    public $faxconductor;
    public $emailconductor;
    public $codigoviaconductor;
    public $tipoviaconductor;
    public $nombreviaconductor;
    public $nmunicipalconductor;
    public $nomb_edificacionconductor;
    public $ninteriorconductor;
    public $codigohurbanoconductor;
    public $nombrehhurbanaconductor;
    public $zonaconductor;
    public $manzanaconductor;
    public $loteconductor;
    public $subloteconductor;

    public $codi_actividad;

    public $pred_area_autor;
    public $pred_area_verif;
    public $viap_area_autor;
    public $viap_area_verif;
    public $bc_area_autor;
    public $bc_area_verif;
    public $nume_expediente;
    public $nume_licencia;
    public $fecha_expedicion;
    public $fecha_vencimiento;
    public $inic_actividad;

    public $codianuncio;
    public $descripcion;
    public $nume_lados;
    public $area_autorizada;
    public $area_verificada;
    public $nume_expediente1;
    public $nume_licencia1;
    public $fecha_expedicion1;
    public $fecha_vencimiento1;

    public $cond_declarante;
    public $docu_presentado;
    public $esta_llenado;
    public $mantenimiento;
    public $observacion;

    public $supervisor;
    public $fecha_supervision;
    public $tecnico;
    public $fecha_levantamiento;
    public $verificador;
    public $nume_registro;
    public $fecha_verificacion;
    public $numdocumentodeclarante;
    public $nombres_declarante;
    public $apellido_paterno_declarante;
    public $apellido_materno_declarante;
    public $fecha_declarante;


    public function mount(Ficha $fichaanterior)
    {
        if($fichaanterior?->fichaeconomica!=""){
            $this->numeficha=$fichaanterior?->fichaeconomica?->nume_ficha;
        }

        $separarnume_ficha = explode('-',$fichaanterior?->nume_ficha_lote);
        $this->nume_ficha_lote=$separarnume_ficha[0];
        $this->nume_ficha_lote2=$separarnume_ficha[1];
        $this->codi_hoja_catastral=$fichaanterior?->unicat?->codi_hoja_catastral;
        $this-> cuc = $fichaanterior?->unicat?->cuc;
        $this-> lote = $fichaanterior?->lote?->codi_lote;
        $this-> sector = $fichaanterior?->unicat?->edificacion?->lote?->manzana?->sectore?->codi_sector;
        $this-> mzna = $fichaanterior?->unicat?->edificacion?->lote?->manzana?->codi_mzna;
        $this-> edifica = $fichaanterior?->unicat?->edificacion?->codi_edificacion;
        $this-> entrada = $fichaanterior?->unicat?->codi_entrada;
        $this-> piso = $fichaanterior?->unicat?->codi_piso;
        $this-> unidad = $fichaanterior?->unicat?->codi_unidad;
        $this-> dc = $fichaanterior?->dc;

        if($fichaanterior?->conductor!=""){
            $this->tipoConductor=$fichaanterior?->conductor?->persona?->tipo_persona;
        }
        if($fichaanterior?->fichaeconomica!=""){
            $this->nomb_comercial=$fichaanterior?->fichaeconomica?->nomb_comercial;
        }
        if($fichaanterior?->fichaeconomica!=""){
            $this->codigo_secuencial=$fichaanterior?->fichaeconomica?->codigo_secuencial;
        }
        if($fichaanterior?->conductor!=""){
            if($fichaanterior?->conductor?->persona?->tipo_persona==1){
                $this->tipo_doc1=$fichaanterior?->conductor?->persona?->tipo_doc;
                $this->numedoc1=$fichaanterior?->conductor?->persona?->nume_doc;
                $this->nombres1=$fichaanterior?->conductor?->persona?->nombres;
                $this->ape_paterno1=$fichaanterior?->conductor?->persona?->ape_paterno;
                $this->ape_materno1=$fichaanterior?->conductor?->persona?->ape_materno;
                $this->razon_social=$fichaanterior?->conductor?->persona?->razon_social;
                $this->numedoc3=$fichaanterior?->conductor?->nume_ruc;


            }
            if($fichaanterior?->conductor?->persona?->tipo_persona==2){
                $this->razon_social=$fichaanterior?->conductor?->persona?->razon_social;
                $this->numedoc3=$fichaanterior?->conductor?->nume_ruc;
            }

            $this->cond_conductor=$fichaanterior?->conductor?->cond_conductor;

            $this->telefonoconductor=$fichaanterior?->conductor?->telefono;
            $this->anexoconductor=$fichaanterior?->conductor?->anexo;
            $this->faxconductor=$fichaanterior?->conductor?->fax;
            $this->emailconductor=$fichaanterior?->conductor?->email;

            if($fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)!=""){
                $this->deparamentoconductor=$fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)?->codi_dep;
                $this->provinciaconductor=$fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)?->codi_pro;
                $this->distritoconductor=$fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)?->codi_dis;
                $this->codigoviaconductor=$fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)?->codi_via;
                $this->tipoviaconductor=$fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)?->tipo_via;
                $this->nombreviaconductor=$fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)?->nomb_via;
                $this->nmunicipalconductor=$fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)?->nume_muni;
                $this->nomb_edificacionconductor=$fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)?->nomb_edificacion;
                $this->ninteriorconductor=$fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)?->nume_interior;
                $this->codigohurbanoconductor=$fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)?->codi_hab_urba;
                $this->nombrehhurbanaconductor=$fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)?->nomb_hab_urba;
                $this->zonaconductor=$fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)?->sector;
                $this->manzanaconductor=$fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)?->mzna;
                $this->loteconductor=$fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)?->lote;
                $this->subloteconductor=$fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)?->sublote;
            }
        }

        $this->cont1 = count($fichaanterior?->actividades);

        foreach($fichaanterior?->actividades as $i => $actividad){
            $this->codi_actividad[$i]=$actividad?->codi_actividad;
        }

        if($fichaanterior?->fichaeconomica!=""){
            $this->pred_area_autor=$fichaanterior?->fichaeconomica?->pred_area_autor;
            $this->pred_area_verif=$fichaanterior?->fichaeconomica?->pred_area_verif;
            $this->viap_area_autor=$fichaanterior?->fichaeconomica?->viap_area_autor;
            $this->viap_area_verif=$fichaanterior?->fichaeconomica?->viap_area_verif;
            $this->bc_area_autor=$fichaanterior?->fichaeconomica?->bc_area_autor;
            $this->bc_area_verif=$fichaanterior?->fichaeconomica?->bc_area_verif;
            $this->nume_expediente=$fichaanterior?->fichaeconomica?->nume_expediente;
            $this->nume_licencia=$fichaanterior?->fichaeconomica?->nume_licencia;
            if($fichaanterior?->fichaeconomica?->fecha_expedicion!="1969-12-31"){
                $this->fecha_expedicion=$fichaanterior?->fichaeconomica?->fecha_expedicion;
            }
            if($fichaanterior?->fichaeconomica?->fecha_vencimiento!="1969-12-31"){
                $this->fecha_vencimiento=$fichaanterior?->fichaeconomica?->fecha_vencimiento;
            }
            if($fichaanterior?->fichaeconomica?->inic_actividad!="1969-12-31"){
                $this->inic_actividad=$fichaanterior?->fichaeconomica?->inic_actividad;
            }

            $this->totalautor =$this->pred_area_autor + $this->viap_area_autor + $this->bc_area_autor;
            $this->totalverificada =$this->pred_area_verif +$this->viap_area_verif+ $this->bc_area_verif;
        }

        $this->cont2 = count($fichaanterior?->autorizacion_anuncios);

        foreach($fichaanterior?->autorizacion_anuncios as $i => $autorizaciones){
            $this->codianuncio[$i]=$autorizaciones?->codi_anuncio;
            $this->nume_lados[$i]=$autorizaciones?->nume_lados;
            $this->area_autorizada[$i]=$autorizaciones?->area_autorizada;
            $this->area_verificada[$i]=$autorizaciones?->area_verificada;
            $this->nume_expediente1[$i]=$autorizaciones?->nume_expediente;
            $this->nume_licencia1[$i]=$autorizaciones?->nume_licencia;
            $this->fecha_expedicion1[$i]=$autorizaciones?->fecha_expedicion;
            $this->fecha_vencimiento1[$i]=$autorizaciones?->fecha_vencimiento;


        }

        if($fichaanterior?->fichaeconomica!=""){
            $this->cond_declarante=$fichaanterior?->fichaeconomica?->cond_declarante;
            $this->docu_presentado=$fichaanterior?->fichaeconomica?->docu_presentado;
            $this->esta_llenado=$fichaanterior?->fichaeconomica?->esta_llenado;
            $this->mantenimiento=$fichaanterior?->fichaeconomica?->mantenimiento;
            $this->observacion=$fichaanterior?->fichaeconomica?->observaciones;
        }

        if($fichaanterior?->declarante!=""){
            $this->numdocumentodeclarante=$fichaanterior?->declarante?->nume_doc;
            $this->nombres_declarante=$fichaanterior?->declarante?->nombres;
            $this->apellido_paterno_declarante=$fichaanterior?->declarante?->ape_paterno;
            $this->apellido_materno_declarante=$fichaanterior?->declarante?->ape_materno;
        }
        if($fichaanterior?->fecha_declarante != "1969-12-31"){
            $this->fecha_declarante=$fichaanterior?->fecha_declarante;
        }

        if($fichaanterior?->supervisor!=""){
            $this->supervisor=$fichaanterior?->supervisor?->id_persona;
        }
        if($fichaanterior?->fecha_supervision != "1969-12-31"){
            $this->fecha_supervision=$fichaanterior?->fecha_supervision;
        }

        if($fichaanterior?->tecnico!=""){
            $this->tecnico=$fichaanterior?->tecnico?->id_persona;
        }

        if($fichaanterior?->fecha_levantamiento != "1969-12-31"){
            $this->fecha_levantamiento=$fichaanterior?->fecha_levantamiento;
        }

        if($fichaanterior?->verificador!=""){
            $this->verificador=$fichaanterior?->verificador?->id_persona;
        }
        $this->nume_registro=$fichaanterior?->nume_registro;
        if($fichaanterior?->fecha_verificacion != "1969-12-31"){
            $this->fecha_verificacion=$fichaanterior?->fecha_verificacion;
        }

        $this->fichaanterior=$fichaanterior;
        $this->actividades=Actividades::all();
        $this->tecnicos=Persona::where('tipo_funcion',3)?->get();
        $this->supervisores=Persona::where('tipo_funcion',2)?->get();
        $this->verificadores=Persona::where('tipo_funcion',4)?->get();
        $this->departamentos=Ubiges::where('cod_pro','00')?->where('codi_dis','00')?->get();
        $this->provincias=Ubiges::where('cod_pro','!=','00')?->where('codi_dis','00')?->get();
        $this->distritos=Ubiges::where('codi_dis','!=','00')?->get();
    }

    public function updatedsector($id_sector)
    {
        $this->mostrardc();
        $this->dc=($this->dpto+$this->prov+$this->dist+$this->sector+$this->mzna+$this->lote+$this->edifica+$this->entrada+$this->piso+$this->unidad)%9;
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
            $this->sector=01;
        }
        if($this->mzna=="")
        {
            $this->mzna=01;
        }
        if($this->lote=="")
        {
            $this->lote=01;
        }
        if($this->edifica=="")
        {
            $this->edifica=01;
        }
        if($this->entrada=="")
        {
            $this->entrada=01;
        }
        if($this->piso=="")
        {
            $this->piso=01;
        }
        if($this->unidad=="")
        {
            $this->unidad=01;
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

    public function updatednumeficha()
    {
        $id=$this->fichaanterior?->fichaeconomica?->id_ficha;
        $this->numeficha=str_pad($this->numeficha,7,'0',STR_PAD_LEFT);
        $this->validate([
            'numeficha'                    => ['required','max:7',
                Rule::unique('tf_fichas_economicas', 'nume_ficha')?->ignore($id, 'id_ficha')],
        ]);
    }
    public function updatedpredareaverif(){
        $this->pred_area_verif = ($this->pred_area_verif === "") ? 0 : $this->pred_area_verif;
        $this->viap_area_verif = ($this->viap_area_verif === "") ? 0 : $this->viap_area_verif;
        $this->bc_area_verif = ($this->bc_area_verif === "") ? 0 : $this->bc_area_verif;

        $total = $this->pred_area_verif + $this->viap_area_verif + $this->bc_area_verif;
        $this->totalverificada=$total;
    }
    public function updatedviapareaverif(){

        $this->pred_area_verif = ($this->pred_area_verif === "") ? 0 : $this->pred_area_verif;
        $this->viap_area_verif = ($this->viap_area_verif === "") ? 0 : $this->viap_area_verif;
        $this->bc_area_verif = ($this->bc_area_verif === "") ? 0 : $this->bc_area_verif;
        $total = $this->pred_area_verif + $this->viap_area_verif + $this->bc_area_verif;
        $this->totalverificada=$total;
    }
    public function updatedbcareaverif(){

        $this->pred_area_verif = ($this->pred_area_verif === "") ? 0 : $this->pred_area_verif;
        $this->viap_area_verif = ($this->viap_area_verif === "") ? 0 : $this->viap_area_verif;
        $this->bc_area_verif = ($this->bc_area_verif === "") ? 0 : $this->bc_area_verif;
        $total = $this->pred_area_verif + $this->viap_area_verif + $this->bc_area_verif;
        $this->totalverificada=$total;
    }

    public function updatedpredareaautor(){


        $this->pred_area_autor = ($this->pred_area_autor === "") ? 0 : $this->pred_area_autor;
        $this->viap_area_autor = ($this->viap_area_autor === "") ? 0 : $this->viap_area_autor;
        $this->bc_area_autor = ($this->bc_area_autor === "") ? 0 : $this->bc_area_autor;

        $total = $this->pred_area_autor + $this->viap_area_autor + $this->bc_area_autor;
        $this->totalautor=$total;
    }
    public function updatedviapareaautor(){

        $this->pred_area_autor = ($this->pred_area_autor === "") ? 0 : $this->pred_area_autor;
        $this->viap_area_autor = ($this->viap_area_autor === "") ? 0 : $this->viap_area_autor;
        $this->bc_area_autor = ($this->bc_area_autor === "") ? 0 : $this->bc_area_autor;
        $total = $this->pred_area_autor + $this->viap_area_autor + $this->bc_area_autor;
        $this->totalautor=$total;
    }
    public function updatedbcareaautor(){

        $this->pred_area_autor = ($this->pred_area_autor === "") ? 0 : $this->pred_area_autor;
        $this->viap_area_autor = ($this->viap_area_autor === "") ? 0 : $this->viap_area_autor;
        $this->bc_area_autor = ($this->bc_area_autor === "") ? 0 : $this->bc_area_autor;
        $total = $this->pred_area_autor + $this->viap_area_autor + $this->bc_area_autor;
        $this->totalautor=$total;
    }


    public function register()
    {
        

        try
        {
            DB::beginTransaction();
            $ubigeo=Institucion::first();
            $mytime= Carbon::now('America/Lima');
            $date = $mytime?->format('Y');

            $id=$this->fichaanterior?->fichaeconomica?->id_ficha;
            $this->validate([

                'numeficha'                    => ['required','max:7',Rule::unique('tf_fichas_economicas', 'nume_ficha')?->ignore($id, 'id_ficha')],

                'nume_ficha_lote'               => 'required|max:4',
                'nume_ficha_lote2'              => 'required|max:5',
                'codi_hoja_catastral'           => 'nullable|max:10',
                'cuc'                           => 'nullable|max:12',
                'sector'                        => 'required',
                'mzna'                          => 'required',
                'lote'                          => 'required|max:3',
                'edifica'                       => 'required|max:2',
                'entrada'                       => 'required|max:2',
                'piso'                          => 'required|max:2',
                'unidad'                        => 'required|max:3',
                'tipoConductor'                 => 'required',
                'nomb_comercial'                => 'nullable|max:100',

                'tipo_doc1'                     => 'nullable',
                'numedoc1'                     => 'nullable|max:17',
                'nombres1'                      => 'nullable|max:150',
                'ape_paterno1'                  => 'nullable|max:50',
                'ape_materno1'                => 'nullable|max:50',
                'numedoc3'                      => 'nullable|max:17',
                'razon_social'                 => 'nullable|max:100',

                'cond_conductor'                => 'required',
                'deparamentoconductor'          => 'required',
                'provinciaconductor'            => 'required',
                'distritoconductor'             => 'required',
                'telefonoconductor'             => 'nullable|max:10',
                'anexoconductor'                => 'nullable|max:5',
                'faxconductor'                  => 'nullable|max:10',
                'emailconductor'                => 'nullable|max:100',

                'codigoviaconductor'            => 'nullable|max:6',
                'tipoviaconductor'              => 'nullable|max:7',
                'nombreviaconductor'            => 'nullable|max:100',
                'nmunicipalconductor'           => 'nullable|max:6',
                'nomb_edificacionconductor'     => 'nullable|max:100',
                'ninteriorconductor'            => 'nullable|max:5',
                'codigohurbanoconductor'        => 'nullable|max:4',
                'nombrehhurbanaconductor'       => 'nullable|max:100',
                'zonaconductor'                 => 'nullable|max:50',
                'manzanaconductor'              => 'nullable|max:5',
                'loteconductor'                 => 'nullable|max:5',
                'subloteconductor'              => 'nullable|max:5',

                'pred_area_autor'               => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                'pred_area_verif'               => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                'viap_area_autor'               => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                'viap_area_verif'               => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                'bc_area_autor'                 => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                'bc_area_verif'                 => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                'nume_expediente'               => 'nullable|max:10',
                'nume_licencia'                 => 'nullable|max:10',
                'fecha_expedicion'              => 'nullable',
                'fecha_vencimiento'             => 'nullable',
                'inic_actividad'                => 'nullable',


                'cond_declarante'               => 'nullable',
                'docu_presentado'               => 'nullable',
                'esta_llenado'                  => 'required',

                'mantenimiento'                 => 'nullable',
                'observacion'                   => 'nullable|max:2000',

                'supervisor'                    => 'nullable',
                'fecha_supervision'             => 'nullable|date',
                'tecnico'                       => 'required',
                'fecha_levantamiento'           => 'required|date|before_or_equal:today',
                'verificador'                   => 'nullable',
                'nume_registro'                 => 'nullable|max:10',
                'fecha_verificacion'            => 'nullable|date',

                'numdocumentodeclarante'        => 'nullable|max:8',
                'nombres_declarante'            => 'nullable|max:150',
                'apellido_paterno_declarante'   => 'nullable|max:50',
                'apellido_materno_declarante'   => 'nullable|max:50',
                'fecha_declarante'           => 'nullable|date',
            ]);

            for($i=0;$i<$this->cont2;$i++){
                $this->validate([
                    'codianuncio.'.$i                   => 'required',
                    'nume_lados.'.$i                    => 'nullable|max:2',
                    'area_autorizada.'.$i               => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                    'area_verificada.'.$i               => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                    'nume_expediente1.'.$i              => 'nullable|max:10',
                    'nume_licencia1.'.$i                => 'nullable|max:10',
                    'fecha_expedicion1.'.$i             => 'nullable',
                    'fecha_vencimiento1.'.$i            => 'nullable',
                ]);
            }

            for($i=0;$i<$this->cont1;$i++){
                $this->validate([
                    'codi_actividad.'.$i               => 'required',
                ]);
            }

            if($this->fichaanterior?->conductor!=""){
                $this->fichaanterior?->conductor?->delete();
            }
            if($this->fichaanterior->domiciliotitulares!=""){
                foreach($this->fichaanterior->domiciliotitulares as $domicilio){
                    $domicilio->delete();
                }
            }
            if($this->fichaanterior?->fichaeconomica!=""){
                $this->fichaanterior?->fichaeconomica?->delete();
            }
            foreach($this->fichaanterior?->autorizacion_anuncios as $autorizaciones){
                $autorizaciones?->delete();
            }
            foreach($this->fichaanterior?->actividades as $actividad){
                $actividad?->fichas()->detach($this->fichaanterior?->id_ficha);
            }
            $fechaanterior=$this->fichaanterior?->fecha_grabado;
            $usuario=$this->fichaanterior?->id_usuario;
            $this->fichaanterior?->delete();












            $sectorbuscar=str_pad($ubigeo?->id_institucion,6,'0',STR_PAD_LEFT).''.str_pad($this->sector,2,'0',STR_PAD_LEFT);

            $sectorencontrar=Sectore::where('id_sector',$sectorbuscar)?->first();
            if($sectorencontrar!=""){
                $sector=$sectorencontrar;
            }else{
                $sector= new Sectore();
                $sector->id_sector=str_pad($ubigeo?->id_institucion,6,'0',STR_PAD_LEFT).''.str_pad($this->sector,2,'0',STR_PAD_LEFT);
                $sector->id_ubi_geo=str_pad($ubigeo?->id_institucion,6,'0',STR_PAD_LEFT);
                $sector->codi_sector=str_pad($this->sector,2,'0',STR_PAD_LEFT);
                $sector->nomb_sector="SECTOR ".str_pad($this->sector,2,'0',STR_PAD_LEFT);
                $sector->estado=1;
                $sector->save();
            }

            $mznabuscar=str_pad($ubigeo?->id_institucion,6,'0',STR_PAD_LEFT).''.str_pad($this->sector,2,'0',STR_PAD_LEFT).''.str_pad($this->mzna,3,'0',STR_PAD_LEFT);

            $mznaencontrar=Manzana::where('id_mzna',$mznabuscar)?->first();
            if($mznaencontrar!=""){
                $mzna=$mznaencontrar;
            }else{
                $mzna= new Manzana();
                $mzna->id_mzna=str_pad($ubigeo?->id_institucion,6,'0',STR_PAD_LEFT).''.str_pad($this->sector,2,'0',STR_PAD_LEFT).''.str_pad($this->mzna,3,'0',STR_PAD_LEFT);
                $mzna->id_sector=str_pad($ubigeo?->id_institucion,6,'0',STR_PAD_LEFT).''.str_pad($this->sector,2,'0',STR_PAD_LEFT);
                $mzna->codi_mzna=str_pad($this->mzna,3,'0',STR_PAD_LEFT);
                $mzna->nume_mzna=str_pad($this->mzna,3,'0',STR_PAD_LEFT);
                $mzna->estado=1;
                $mzna->save();
            }

            $lotebuscar=str_pad($ubigeo?->id_institucion,6,'0',STR_PAD_LEFT).''.str_pad($this->sector,2,'0',STR_PAD_LEFT).''.str_pad($this->mzna,3,'0',STR_PAD_LEFT).''.str_pad($this->lote,3,'0',STR_PAD_LEFT);

            $loteencontrar=Lote::where('id_lote',$lotebuscar)?->first();
            if($loteencontrar!=""){
                $lote=$loteencontrar;
                $lote->codi_lote=str_pad($this->lote,3,'0',STR_PAD_LEFT);
                $lote->save();
            }else{
                $lote= new Lote();
                $lote->id_lote=str_pad($ubigeo?->id_institucion,6,'0',STR_PAD_LEFT).''.str_pad($this->sector,2,'0',STR_PAD_LEFT).''.str_pad($this->mzna,3,'0',STR_PAD_LEFT).''.str_pad($this->lote,3,'0',STR_PAD_LEFT);
                $lote->id_mzna=str_pad($ubigeo?->id_institucion,6,'0',STR_PAD_LEFT).''.str_pad($this->sector,2,'0',STR_PAD_LEFT).''.str_pad($this->mzna,3,'0',STR_PAD_LEFT);
                $lote->codi_lote=str_pad($this->lote,3,'0',STR_PAD_LEFT);
                $lote->save();
            }

            $edificacionbuscar=str_pad($lote->id_lote,14,'0',STR_PAD_LEFT).''.str_pad($this->edifica,2,'0',STR_PAD_LEFT);

            $edificacionencontrar=Edificaciones::where('id_edificacion',$edificacionbuscar)?->first();
            if($edificacionencontrar!=""){
                $edificacion=$edificacionencontrar;
            }else{
                $edificacion= new Edificaciones();
                $edificacion->id_edificacion=str_pad($lote->id_lote,14,'0',STR_PAD_LEFT).''.str_pad($this->edifica,2,'0',STR_PAD_LEFT);
                $edificacion->id_lote=str_pad($lote->id_lote,14,'0',STR_PAD_LEFT);
                $edificacion->codi_edificacion=str_pad($this->edifica,2,'0',STR_PAD_LEFT);
                $edificacion->save();
            }

            $unicatbuscar=str_pad($edificacion->id_edificacion,16,'0',STR_PAD_LEFT).''.str_pad($this->entrada,2,'0',STR_PAD_LEFT).''.str_pad($this->piso,2,'0',STR_PAD_LEFT).''.str_pad($this->unidad,3,'0',STR_PAD_LEFT);
            $unicatencontrar=UniCat::where('id_uni_cat',$unicatbuscar)?->first();
            if($unicatencontrar!=""){
                $unicat=$unicatencontrar;
                $unicat->codi_entrada=str_pad($this->entrada,2,'0',STR_PAD_LEFT);
                $unicat->codi_piso=str_pad($this->piso,2,'0',STR_PAD_LEFT);
                $unicat->codi_unidad=str_pad($this->unidad,3,'0',STR_PAD_LEFT);
                $unicat->cuc=str_pad($this->cuc,12,'0',STR_PAD_LEFT);
                $unicat->save();
            }else{
                $unicat= new UniCat();
                $unicat->id_uni_cat=str_pad($edificacion->id_edificacion,16,'0',STR_PAD_LEFT).''.str_pad($this->entrada,2,'0',STR_PAD_LEFT).''.str_pad($this->piso,2,'0',STR_PAD_LEFT).''.str_pad($this->unidad,3,'0',STR_PAD_LEFT);
                $unicat->id_lote=$lote->id_lote;
                $unicat->id_edificacion=$edificacion->id_edificacion;
                $unicat->codi_entrada=str_pad($this->entrada,2,'0',STR_PAD_LEFT);
                $unicat->codi_piso=str_pad($this->piso,2,'0',STR_PAD_LEFT);
                $unicat->codi_unidad=str_pad($this->unidad,3,'0',STR_PAD_LEFT);
                $unicat->cuc=str_pad($this->cuc,12,'0',STR_PAD_LEFT);
                $unicat->save();
            }

            if($this->numdocumentodeclarante!=''){
                $iddd=$this->numdocumentodeclarante.'5102';
                $buscarpersona=Persona::where('id_persona','=',$iddd)?->first();
                if($buscarpersona!=""){
                    $declarante=$buscarpersona;
                }else{
                    $declarante= new Persona();
                    $declarante->id_persona=$this->numdocumentodeclarante.'5102';
                    $declarante->nume_doc=$this->numdocumentodeclarante;
                    $declarante->tipo_doc="02";
                    $declarante->tipo_persona=1;
                    $declarante->nombres=strtoupper($this->nombres_declarante);
                    $declarante->ape_paterno=strtoupper($this->apellido_paterno_declarante);
                    $declarante->ape_materno=strtoupper($this->apellido_materno_declarante);
                    $declarante->tipo_funcion=5;
                    $declarante->save();
                }
            }else{
                $declarante="";
            }

            $ficha=new Ficha();
            $ficha->id_ficha=$date.''.str_pad($ubigeo?->id_institucion,6,'0',STR_PAD_LEFT).'03'.str_pad($this->numeficha,7,'0',STR_PAD_LEFT);
            $ficha->tipo_ficha="03";
            $ficha->nume_ficha=str_pad($this->numeficha,7,'0',STR_PAD_LEFT);
            $ficha->id_lote=$lote->id_lote;
            $ficha->dc=$this->dc;
            $ficha->nume_ficha_lote=$this->nume_ficha_lote.'-'.$this->nume_ficha_lote2;
            if($declarante==""){
            }else{
                $ficha->id_declarante=$declarante->id_persona;
            }
            if($this->fecha_declarante==""){
            }else{
                $ficha->fecha_declarante=$this->fecha_declarante;
            }

            if($this->supervisor==""){
            }else{
                $ficha->id_supervisor=$this->supervisor;
            }
            if($this->fecha_supervision==""){
            }else{
                $ficha->fecha_supervision=$this->fecha_supervision;
            }

            if($this->tecnico==""){
            }else{
                $ficha->id_tecnico=$this->tecnico;
            }
            if($this->fecha_levantamiento==""){
            }else{
                $ficha->fecha_levantamiento=$this->fecha_levantamiento;
            }

            if($this->verificador==""){
            }else{
                $ficha->id_verificador=$this->verificador;
            }
            if($this->fecha_verificacion==""){
            }else{
                $ficha->fecha_verificacion=$this->fecha_verificacion;
            }
            if($this->nume_registro==""){
            }else{
                $ficha->nume_registro=$this->nume_registro;
            }
            $ficha->id_uni_cat=$unicat->id_uni_cat;
            $ficha->id_usuario=$usuario;
            $ficha->fecha_grabado=$fechaanterior;
            $ficha->activo=1;
            $ficha->save();


            $ficha->actividades()->sync($this->codi_actividad);

            if($this->tipoConductor==1)
            {
                if($this->numedoc1!="")
                {

                    $iddd=str_pad($this->numedoc1,8,'0',STR_PAD_LEFT).'71'.$this->tipo_doc1;
                    $buscarpersona2=Persona::where('id_persona',$iddd)?->first();
                    if($buscarpersona2!=""){

                        $persona=$buscarpersona2;
                        $persona->tipo_doc=$this->tipo_doc1;
                        $persona->tipo_persona=1;
                        $persona->nombres=strtoupper($this->nombres1);
                        $persona->ape_paterno=strtoupper($this->ape_paterno1);
                        $persona->ape_materno=strtoupper($this->ape_materno1);
                        $persona->tipo_funcion=7;

                        if(isset($this->razon_social)){
                        $persona->razon_social=$this->razon_social;
                        }
                        $persona->save();


                        $conductor=new Conductor();
                        $conductor->id_ficha=$ficha->id_ficha;
                        $conductor->id_persona=$persona->id_persona;
                        $conductor->fax=$this->faxconductor;
                        $conductor->telefono=$this->telefonoconductor;
                        $conductor->anexo=$this->anexoconductor;
                        $conductor->email=$this->emailconductor;
                        $conductor->cond_conductor=$this->cond_conductor;
                        $conductor->nume_ruc=$this->numedoc3;

                        $conductor->save();

                        $domicilio=new DomicilioTitular();
                        $domicilio->id_ficha=$ficha->id_ficha;
                        $domicilio->id_persona=$persona->id_persona;
                        $domicilio->codi_via=$this->codigoviaconductor;
                        $domicilio->tipo_via=strtoupper($this->tipoviaconductor);
                        $domicilio->nomb_via=strtoupper($this->nombreviaconductor);
                        $domicilio->nume_muni=$this->nmunicipalconductor;
                        $domicilio->nomb_edificacion=strtoupper($this->nomb_edificacionconductor);
                        $domicilio->nume_interior=$this->ninteriorconductor;
                        $domicilio->codi_hab_urba=$this->codigohurbanoconductor;
                        $domicilio->nomb_hab_urba=strtoupper($this->nombrehhurbanaconductor);
                        $domicilio->sector=$this->zonaconductor;
                        $domicilio->mzna=$this->manzanaconductor;
                        $domicilio->lote=$this->loteconductor;
                        $domicilio->sublote=$this->subloteconductor;
                        $domicilio->codi_dep=$this->deparamentoconductor;
                        $domicilio->codi_pro=$this->provinciaconductor;
                        $domicilio->codi_dis=$this->distritoconductor;
                        $domicilio->save();
                    }else{
                        $persona= new Persona();
                        if($this->numedoc1==""){
                            $cantidadpersona=Persona::where('tipo_funcion',7)?->count()+1;
                            $persona->id_persona=str_pad($cantidadpersona,8,'0',STR_PAD_LEFT).'71'.$this->tipo_doc1;
                            $persona->nume_doc="";
                        }else{
                            $persona->id_persona=str_pad($this->numedoc1,8,'0',STR_PAD_LEFT).'71'.$this->tipo_doc1;
                            $persona->nume_doc=str_pad($this->numedoc1,8,'0',STR_PAD_LEFT);
                        }
                        $persona->tipo_doc=$this->tipo_doc1;
                        $persona->tipo_persona=1;
                        $persona->nombres=strtoupper($this->nombres1);
                        $persona->ape_paterno=strtoupper($this->ape_paterno1);
                        $persona->ape_materno=strtoupper($this->ape_materno1);
                        $persona->tipo_funcion=7;
                        if(isset($this->razon_social)){
                        $persona->razon_social=$this->razon_social;
                        }
                        $persona->save();

                        $conductor=new Conductor();
                        $conductor->id_ficha=$ficha->id_ficha;
                        $conductor->id_persona=$persona->id_persona;
                        $conductor->fax=$this->faxconductor;
                        $conductor->telefono=$this->telefonoconductor;
                        $conductor->anexo=$this->anexoconductor;
                        $conductor->email=$this->emailconductor;
                        $conductor->cond_conductor=$this->cond_conductor;
                        $conductor->nume_ruc=$this->numedoc3;
                        $conductor->save();

                        $domicilio=new DomicilioTitular();
                        $domicilio->id_ficha=$ficha->id_ficha;
                        $domicilio->id_persona=$persona->id_persona;
                        $domicilio->codi_via=$this->codigoviaconductor;
                        $domicilio->tipo_via=strtoupper($this->tipoviaconductor);
                        $domicilio->nomb_via=strtoupper($this->nombreviaconductor);
                        $domicilio->nume_muni=$this->nmunicipalconductor;
                        $domicilio->nomb_edificacion=strtoupper($this->nomb_edificacionconductor);
                        $domicilio->nume_interior=$this->ninteriorconductor;
                        $domicilio->codi_hab_urba=$this->codigohurbanoconductor;
                        $domicilio->nomb_hab_urba=strtoupper($this->nombrehhurbanaconductor);
                        $domicilio->sector=$this->zonaconductor;
                        $domicilio->mzna=$this->manzanaconductor;
                        $domicilio->lote=$this->loteconductor;
                        $domicilio->sublote=$this->subloteconductor;
                        $domicilio->codi_dep=$this->deparamentoconductor;
                        $domicilio->codi_pro=$this->provinciaconductor;
                        $domicilio->codi_dis=$this->distritoconductor;
                        $domicilio->save();
                    }

                }else{
                    $persona= new Persona();
                    if($this->numedoc1==""){
                        $cantidadpersona=Persona::where('tipo_funcion',7)?->count()+1;
                        $persona->id_persona=str_pad($cantidadpersona,8,'0',STR_PAD_LEFT).'71'.$this->tipo_doc1;
                        $persona->nume_doc="";
                    }else{
                        $persona->id_persona=str_pad($this->numedoc1,8,'0',STR_PAD_LEFT).'71'.$this->tipo_doc1;
                        $persona->nume_doc=str_pad($this->numedoc1,8,'0',STR_PAD_LEFT);
                    }
                    $persona->tipo_doc=$this->tipo_doc1;
                    $persona->tipo_persona=1;
                    $persona->nombres=strtoupper($this->nombres1);
                    $persona->ape_paterno=strtoupper($this->ape_paterno1);
                    $persona->ape_materno=strtoupper($this->ape_materno1);
                    $persona->tipo_funcion=7;
                    if(isset($this->razon_social)){
                        $persona->razon_social=$this->razon_social;
                    }

                    $persona->save();

                    $conductor=new Conductor();
                    $conductor->id_ficha=$ficha->id_ficha;
                    $conductor->id_persona=$persona->id_persona;
                    $conductor->fax=$this->faxconductor;
                    $conductor->telefono=$this->telefonoconductor;
                    $conductor->anexo=$this->anexoconductor;
                    $conductor->email=$this->emailconductor;
                    $conductor->cond_conductor=$this->cond_conductor;
                    $conductor->nume_ruc=$this->numedoc3;

                    $conductor->save();

                    $domicilio=new DomicilioTitular();
                    $domicilio->id_ficha=$ficha->id_ficha;
                    $domicilio->id_persona=$persona->id_persona;
                    $domicilio->codi_via=$this->codigoviaconductor;
                    $domicilio->tipo_via=strtoupper($this->tipoviaconductor);
                    $domicilio->nomb_via=strtoupper($this->nombreviaconductor);
                    $domicilio->nume_muni=$this->nmunicipalconductor;
                    $domicilio->nomb_edificacion=strtoupper($this->nomb_edificacionconductor);
                    $domicilio->nume_interior=$this->ninteriorconductor;
                    $domicilio->codi_hab_urba=$this->codigohurbanoconductor;
                    $domicilio->nomb_hab_urba=strtoupper($this->nombrehhurbanaconductor);
                    $domicilio->sector=$this->zonaconductor;
                    $domicilio->mzna=$this->manzanaconductor;
                    $domicilio->lote=$this->loteconductor;
                    $domicilio->sublote=$this->subloteconductor;
                    $domicilio->codi_dep=$this->deparamentoconductor;
                    $domicilio->codi_pro=$this->provinciaconductor;
                    $domicilio->codi_dis=$this->distritoconductor;
                    $domicilio->save();

                }
            }

            if($this->tipoConductor==2)
            {
                if($this->numedoc3!="")
                {
                    $iddd=str_pad($this->numedoc3,11,'0',STR_PAD_LEFT).'7200';
                    $buscarpersona2=Persona::where('id_persona',$iddd)?->first();
                    if($buscarpersona2!=""){
                        $persona=$buscarpersona2;
                        $persona->tipo_doc='00';
                        $persona->tipo_persona=2;
                        $persona->tipo_funcion=7;
                        if(isset($this->razon_social)){
                        $persona->razon_social=$this->razon_social;
                        }



                        $conductor=new Conductor();
                        $conductor->id_ficha=$ficha->id_ficha;
                        $conductor->id_persona=$persona->id_persona;
                        $conductor->fax=$this->faxconductor;
                        $conductor->telefono=$this->telefonoconductor;
                        $conductor->anexo=$this->anexoconductor;
                        $conductor->email=$this->emailconductor;
                        $conductor->cond_conductor=$this->cond_conductor;
                        $conductor->nume_ruc=$this->numedoc3;
                        $conductor->save();

                        $domicilio=new DomicilioTitular();
                        $domicilio->id_ficha=$ficha->id_ficha;
                        $domicilio->id_persona=$persona->id_persona;
                        $domicilio->codi_via=$this->codigoviaconductor;
                        $domicilio->tipo_via=strtoupper($this->tipoviaconductor);
                        $domicilio->nomb_via=strtoupper($this->nombreviaconductor);
                        $domicilio->nume_muni=$this->nmunicipalconductor;
                        $domicilio->nomb_edificacion=strtoupper($this->nomb_edificacionconductor);
                        $domicilio->nume_interior=$this->ninteriorconductor;
                        $domicilio->codi_hab_urba=$this->codigohurbanoconductor;
                        $domicilio->nomb_hab_urba=strtoupper($this->nombrehhurbanaconductor);
                        $domicilio->sector=$this->zonaconductor;
                        $domicilio->mzna=$this->manzanaconductor;
                        $domicilio->lote=$this->loteconductor;
                        $domicilio->sublote=$this->subloteconductor;
                        $domicilio->codi_dep=$this->deparamentoconductor;
                        $domicilio->codi_pro=$this->provinciaconductor;
                        $domicilio->codi_dis=$this->distritoconductor;
                        $domicilio->save();
                    }else{
                        $persona= new Persona();
                        if($this->numedoc3==""){
                            $cantidadpersona=Persona::where('tipo_funcion',7)?->count()+1;
                            $persona->id_persona=str_pad($cantidadpersona,11,'0',STR_PAD_LEFT).'7200';
                            $persona->nume_doc="";
                        }else{
                            $persona->id_persona=str_pad($this->numedoc3,11,'0',STR_PAD_LEFT).'7200';
                            $persona->nume_doc=str_pad($this->numedoc3,8,'0',STR_PAD_LEFT);
                        }
                        $persona->tipo_doc='00';
                        $persona->tipo_persona=2;
                        $persona->tipo_funcion=7;
                        $persona->razon_social=strtoupper($this->razon_social);
                        $persona->save();

                        $conductor=new Conductor();
                        $conductor->id_ficha=$ficha->id_ficha;
                        $conductor->id_persona=$persona->id_persona;
                        $conductor->fax=$this->faxconductor;
                        $conductor->telefono=$this->telefonoconductor;
                        $conductor->anexo=$this->anexoconductor;
                        $conductor->email=$this->emailconductor;
                        $conductor->cond_conductor=$this->cond_conductor;
                        $conductor->nume_ruc=$this->numedoc3;
                        $conductor->save();

                        $domicilio=new DomicilioTitular();
                        $domicilio->id_ficha=$ficha->id_ficha;
                        $domicilio->id_persona=$persona->id_persona;
                        $domicilio->codi_via=$this->codigoviaconductor;
                        $domicilio->tipo_via=strtoupper($this->tipoviaconductor);
                        $domicilio->nomb_via=strtoupper($this->nombreviaconductor);
                        $domicilio->nume_muni=$this->nmunicipalconductor;
                        $domicilio->nomb_edificacion=strtoupper($this->nomb_edificacionconductor);
                        $domicilio->nume_interior=$this->ninteriorconductor;
                        $domicilio->codi_hab_urba=$this->codigohurbanoconductor;
                        $domicilio->nomb_hab_urba=strtoupper($this->nombrehhurbanaconductor);
                        $domicilio->sector=$this->zonaconductor;
                        $domicilio->mzna=$this->manzanaconductor;
                        $domicilio->lote=$this->loteconductor;
                        $domicilio->sublote=$this->subloteconductor;
                        $domicilio->codi_dep=$this->deparamentoconductor;
                        $domicilio->codi_pro=$this->provinciaconductor;
                        $domicilio->codi_dis=$this->distritoconductor;
                        $domicilio->save();
                    }

                }else{
                    $persona= new Persona();
                    if($this->numedoc3==""){
                        $cantidadpersona=Persona::where('tipo_funcion',7)?->count()+1;
                        $persona->id_persona=str_pad($cantidadpersona,11,'0',STR_PAD_LEFT).'7200';
                        $persona->nume_doc="";
                    }else{
                        $persona->id_persona=str_pad($this->numedoc1,11,'0',STR_PAD_LEFT).'7200';
                        $persona->nume_doc=str_pad($this->numedoc1,11,'0',STR_PAD_LEFT);
                    }
                    $persona->tipo_doc='00';
                    $persona->tipo_persona=2;
                    $persona->tipo_funcion=7;

                    if(isset($this->razon_social)){
                        $persona->razon_social=$this->razon_social;
                    }
                    $persona->save();

                    $conductor=new Conductor();
                    $conductor->id_ficha=$ficha->id_ficha;
                    $conductor->id_persona=$persona->id_persona;
                    $conductor->fax=$this->faxconductor;
                    $conductor->telefono=$this->telefonoconductor;
                    $conductor->anexo=$this->anexoconductor;
                    $conductor->email=$this->emailconductor;
                    $conductor->cond_conductor=$this->cond_conductor;
                    $conductor->nume_ruc=$this->numedoc3;
                    $conductor->save();

                    $domicilio=new DomicilioTitular();
                    $domicilio->id_ficha=$ficha->id_ficha;
                    $domicilio->id_persona=$persona->id_persona;
                    $domicilio->codi_via=$this->codigoviaconductor;
                    $domicilio->tipo_via=strtoupper($this->tipoviaconductor);
                    $domicilio->nomb_via=strtoupper($this->nombreviaconductor);
                    $domicilio->nume_muni=$this->nmunicipalconductor;
                    $domicilio->nomb_edificacion=strtoupper($this->nomb_edificacionconductor);
                    $domicilio->nume_interior=$this->ninteriorconductor;
                    $domicilio->codi_hab_urba=$this->codigohurbanoconductor;
                    $domicilio->nomb_hab_urba=strtoupper($this->nombrehhurbanaconductor);
                    $domicilio->sector=$this->zonaconductor;
                    $domicilio->mzna=$this->manzanaconductor;
                    $domicilio->lote=$this->loteconductor;
                    $domicilio->sublote=$this->subloteconductor;
                    $domicilio->codi_dep=$this->deparamentoconductor;
                    $domicilio->codi_pro=$this->provinciaconductor;
                    $domicilio->codi_dis=$this->distritoconductor;
                    $domicilio->save();

                }
            }


            $fichaeconomica=new FichaEconomica();
            $fichaeconomica->id_ficha=$ficha->id_ficha;
            $fichaeconomica->nomb_comercial=strtoupper($this->nomb_comercial);
            $fichaeconomica->codigo_secuencial=strtoupper($this->codigo_secuencial);
            
            if($this->pred_area_autor!=""){
                $fichaeconomica->pred_area_autor=$this->pred_area_autor;
            }
            if($this->pred_area_verif!=""){
                $fichaeconomica->pred_area_verif=$this->pred_area_verif;
            }
            if($this->viap_area_autor!=""){
                $fichaeconomica->viap_area_autor=$this->viap_area_autor;
            }
            if($this->viap_area_verif!=""){
                $fichaeconomica->viap_area_verif=$this->viap_area_verif;
            }
            if($this->bc_area_autor!=""){
                $fichaeconomica->bc_area_autor=$this->bc_area_autor;
            }
            if($this->bc_area_verif!=""){
                $fichaeconomica->bc_area_verif=$this->bc_area_verif;
            }
            if($this->nume_expediente!=""){
                $fichaeconomica->nume_expediente=$this->nume_expediente;
            }
            if($this->nume_licencia!=""){
                $fichaeconomica->nume_licencia=$this->nume_licencia;
            }
            if($this->fecha_expedicion!=""){
                $fichaeconomica->fecha_expedicion=$this->fecha_expedicion;
            }
            if($this->fecha_expedicion!=""){
                $fichaeconomica->fecha_vencimiento=$this->fecha_vencimiento;
            }
            if($this->inic_actividad!=""){
                $fichaeconomica->inic_actividad=$this->inic_actividad;
            }

            $fichaeconomica->cond_declarante=$this->cond_declarante;
            $fichaeconomica->esta_llenado=$this->esta_llenado;
            $fichaeconomica->mantenimiento=$this->mantenimiento;
            $fichaeconomica->docu_presentado=$this->docu_presentado;
            if($this->pred_area_verif!=""){
                $fichaeconomica->pred_area_verif=$this->pred_area_verif;
            }

            $fichaeconomica->observaciones=$this->observacion;
            $fichaeconomica->nume_ficha=str_pad($this->numeficha,7,'0',STR_PAD_LEFT);
            $fichaeconomica->save();

            $contcon=0;
            $autorizaciones=$this->cont2;
            if($autorizaciones!=""){
                while($contcon < $this->cont2){

                    $anuncio22=$contcon+1;
                    $anuncios=new AutorizacionAnuncio();
                    $anuncios->id_anuncio=$ficha->id_ficha.''.str_pad($this->codianuncio[$contcon],3,'0',STR_PAD_LEFT).''.$anuncio22;
                    $anuncios->id_ficha=$ficha->id_ficha;
                    $anuncios->codi_autoriza=$anuncio22;
                    $anuncios->codi_anuncio=str_pad($this->codianuncio[$contcon],3,'0',STR_PAD_LEFT);

                    if(isset($this->nume_lados[$contcon])){
                        if($this->nume_lados[$contcon]!="" ){
                            $anuncios->nume_lados=$this->nume_lados[$contcon];
                        }else{
                            $anuncios->nume_lados=0;
                        }
                    }
                    if(isset($this->area_autorizada[$contcon])){
                        if($this->area_autorizada[$contcon]!="" ){
                            $anuncios->area_autorizada=$this->area_autorizada[$contcon];
                        }else{
                            $anuncios->area_autorizada=0;
                        }
                    }
                    if(isset($this->area_verificada[$contcon])){
                        if($this->area_verificada[$contcon]!="" ){
                            $anuncios->area_verificada=$this->area_verificada[$contcon];
                        }else{
                            $anuncios->area_verificada=0;
                        }
                    }
                    if(isset($this->nume_expediente1[$contcon])){
                        if($this->nume_expediente1[$contcon]!="" ){
                            $anuncios->nume_expediente=$this->nume_expediente1[$contcon];
                        }else{
                            $anuncios->nume_expediente=0;
                        }
                    }
                    if(isset($this->nume_licencia1[$contcon])){
                        if($this->nume_licencia1[$contcon]!="" ){
                            $anuncios->nume_licencia=$this->nume_licencia1[$contcon];
                        }else{
                            $anuncios->nume_licencia=0;
                        }
                    }
                    if(isset($this->fecha_expedicion1[$contcon])){
                        if($this->fecha_expedicion1[$contcon]!="" ){
                            $anuncios->fecha_expedicion=$this->fecha_expedicion1[$contcon];
                        }else{
                            $anuncios->fecha_expedicion=0;
                        }
                    }
                    if(isset($this->fecha_vencimiento1[$contcon])){
                        if($this->fecha_vencimiento1[$contcon]!="" ){
                            $anuncios->fecha_vencimiento=$this->fecha_vencimiento1[$contcon];
                        }else{
                            $anuncios->fecha_vencimiento=0;
                        }
                    }

                    $anuncios->save();
                    $contcon++;
                }
            }

            DB::commit();
        }
        catch(Exception $e){
            DB::rollBack();
        }

        return redirect()->route('reporte.reportelista')
            ?->with('success', 'Ficha Economica Editado Correctamente.');
    }
    public function updatedverificador($id)
    {
        $this->verificador2=Persona::where('id_persona',$id)->first();
        if($this->verificador2==""){
            $this->nume_registro="";
        }else{
            $this->nume_registro=$this->verificador2->nregistro;
        }
    }

    public function aumentarAutorizacionMunicipal()
    {
        $this->cont1++;
    }

    public function reducirAutorizacionMunicipal($i)
    {        
        $this->cont1--;

            if (is_array($this->codi_actividad)) {
                array_splice($this->codi_actividad, $i, 1);
            }
    }


    public function aumentarAutorizacionAnuncio()
    {
        $this->cont2++;
    }

    public function reducirAutorizacionAnuncio($i)
    {
        $this->cont2--;
        if (is_array($this->codianuncio)) {
            array_splice($this->codianuncio, $i, 1);
        }
        if (is_array($this->nume_lados)) {
            array_splice($this->nume_lados, $i, 1);
        }
        if (is_array($this->area_autorizada)) {
            array_splice($this->area_autorizada, $i, 1);
        }
        if (is_array($this->area_verificada)) {
            array_splice($this->area_verificada, $i, 1);
        }
        if (is_array($this->nume_expediente1)) {
            array_splice($this->nume_expediente1, $i, 1);
        }
        if (is_array($this->nume_licencia1)) {
            array_splice($this->nume_licencia1, $i, 1);
        }
        if (is_array($this->fecha_expedicion1)) {
            array_splice($this->fecha_expedicion1, $i, 1);
        }
        if (is_array($this->fecha_vencimiento1)) {
            array_splice($this->fecha_vencimiento1, $i, 1);
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
                ])?->get($urldni.$dni);

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

    public function updatednumedoc3($value)
    {
        $ruc=$value;
        $token= config('services.apisunat.token');
        $urlruc=config('services.apisunat.urlruc');
        $response=Http::withHeaders([
            'Referer' => 'http://apis.net.pe/api-ruc',
            'Authorization' => 'Bearer ' . $token
        ])?->get($urlruc.$ruc);

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
    public function updatedtipoConductor($value)
    {
        if ($value == 1) {
            $this-> requiredtipoConductor = 1;
        }
        elseif ($value == 2) {
            $this-> requiredtipoConductor = 2;
        }
    }

    public function updatednumdocumentodeclarante()
    {
        $dni=$this->numdocumentodeclarante;
        if($dni!=""){
            $token= config('services.apisunat.token');
            $urldni=config('services.apisunat.urldni');
            $response=Http::withHeaders([
                'Referer' => 'http://apis.net.pe/api-ruc',
                'Authorization' => 'Bearer ' . $token
            ])?->get($urldni.$dni);

            $persona=($response->json());

            if(isset($persona['error']) || $persona==""){
                $this->nombres_declarante="";
                $this->apellido_paterno_declarante="";
                $this->apellido_materno_declarante="";
                $this->numdocumentodeclarante=$dni;
                if(isset($persona['error']))
                {
                    session()->flash('dark', 'Se necesita 8 digitos');
                }
                if($persona=="")
                {
                    session()->flash('dark', 'No se encontro datos');
                }
            }else{
                $this->nombres_declarante=$persona['nombres'];
                $this->apellido_paterno_declarante=$persona['apellidoPaterno'];
                $this->apellido_materno_declarante=$persona['apellidoMaterno'];
                $this->numdocumentodeclarante=$dni;
            }
        }
    }
    public function updatedcodigohurbanoconductor($id)
    {
        $idbuscar = str_pad($id, 4, '0', STR_PAD_LEFT);
        $this->hab_urbana2 = HabUrbana::where('codi_hab_urba', $idbuscar)->first();

        if ($this->hab_urbana2 == "") {
            $this->nombrehhurbanaconductor = "";
        } else {
            $this->nombrehhurbanaconductor = $this->hab_urbana2->tipo_hab_urba . " " . $this->hab_urbana2->nomb_hab_urba;
        }
    }
    public function render()
    {
        return view('livewire.ficha-economica-edit');
    }
}
