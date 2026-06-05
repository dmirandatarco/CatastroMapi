<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ficha;
use App\Models\Persona;
use App\Models\Sectore;
use App\Models\UniCat;
use App\Models\Ubiges;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Models\Institucion;
use App\Models\Titular;
use App\Models\DomicilioTitular;
use App\Models\FichaRural;
use App\Models\CondicionPredio;
use App\Models\DocumentoPosesion;
use App\Models\CaracteristicasRural;
use App\Models\Construccion;
use App\Models\InstalacionRural;
use App\Models\AgricolaPredio;
use App\Models\GanaderiaRural;
use App\Models\Litigante;
use DB;

class FichaRuralCreate extends Component
{
    public $tecnicos;
    public $supervisores;
    public $verificadores;
    public $departamentos;
    public $provincias;
    public $distritos;


    public $nume_ficha;
    public $nume_ficha_lote;
    public $nume_ficha_lote2;
    public $cuc;
    public $codigo_hoja_catastral;
    public $codigo_contr_rentas;
    public $codigo_predial;
    public $unidad_organica;
    public $zona_geografica;
    public $unidad_catastral;
    public $cod_dep;
    public $cod_pro;
    public $cod_dis;
    public $proy_cat;
    public $uni_terr;
    public $nomb_valle;
    public $nomb_sector;
    public $nomb_predio;
    public $num_foto;
    public $num_ortofoto;
    public $img_satelital;
    public $uca_ant;
    public $cord_este;
    public $cord_norte;
    public $datum;
    public $zona;
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
    public $numedoc3;
    public $razon_social;
    public $tipo_persona_juridica;
    public $departamentootros;
    public $provinciaotros;
    public $distritootros;
    public $sector;
    public $nomb_via;
    public $nume_muni;
    public $nomb_edificacion;
    public $telefonodomicilio;
    public $anexodomicilio;
    public $emaildomicilio;
    public $condicion;
    public $condtitular;
    public $fecha_inicio;
    public $ins_reg_publ;
    public $num_part_regi;
    public $fecha_inscripcion;
    public $doc_sobre_propiedad;
    public $fecha_adquisicion;
    public $pruebas_obligatorias;
    public $pruebas_complementarias;

    #CONSTRUCCIONES
    public $cont2=0;
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
    public $porc_bc_terr_legal;
    public $porc_bc_const_legal;
    public $porc_bc_terr_fisc;
    public $porc_bc_const_fisc;
    #CONSTRUCCIONES

    #CONSTRUCCIONES
    public $cont3=0;
    public $tipo_ins;
    public $cantidad;
    public $area_porcentaje;
    public $area_const;
    public $volumen;
    public $fecha_const;
    public $material_est;
    public $estado_conserva;
    public $estado_construc;
    #CONSTRUCCIONES

    #INFORMACION COMPLEMENTARIA
    public $tipolitigante;
    public $numedoc;
    public $nombres;
    public $ape_materno;
    public $cont5=0;
    public $ape_paterno;
    public $observacion;
    #INFORMACION COMPLEMENTARIA

    #INFORMACION FINAL
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
    #INFORMACION FINAL


    public $area_terreno;
    public $area_declarada;
    public $vivienda_construcciones;




    public $codi_uso;
    public $uso_actual;


    public $cont4=0;
    public $tipo_usoactual;
    public $areausoactual;
    public $descripcionusoactual;
    public $grupoestimada;
    public $claseestimada;
    public $areaestimada;
    public $grupoestudio;
    public $claseestudio;
    public $areaestudio;
    public $numplantas;

    public $cont6=0;
    public $tipo_ganaderia;
    public $raza_especie;
    public $cantidad_especie;

    public $cont=0;
    public $num_cotitular;
    public $ape_paternotitulares;
    public $ape_maternotitulares;
    public $nombrestitulares;
    public $estado_civiltitulares;
    public $tipo_doc_titulars;
    public $numedoctitulares;


    public $riego;
    public $derechos_agua;
    public $fuente_hidrica;
    public $cercania_rio;
    public $explotacion;



    public $llenada_observacion;


    public $pru_ob1;
    public $pru_ob2;
    public $pru_ob3;

    public $pru_comp1;
    public $pru_comp2;
    public $pru_comp3;
    public $pru_comp4;
    public $pru_comp5;
    public $pru_comp6;
    public $pru_comp7;
    public $pru_comp8;
    public $pru_comp9;
    public $pru_comp10;
    public $pru_comp11;
    public $pru_comp12;
    public $pru_comp13;
    public $pru_comp14;
    public $pru_comp15;


    public $vivienda;
    public $establo;
    public $corral;
    public $galpon;
    public $invernadero;
    public $reservorio;
    public $deposito;
    public $zona_arque;
    public $otros;
    public $sectores_sel = [];




    public function mount()
    {
        $this->sectores_sel = Sectore::orderBy('codi_sector', 'asc')->get();
        $this->tecnicos = Persona::where('tipo_funcion', 3)->orderBy('nume_doc', 'asc')->get();
        $this->supervisores = Persona::where('tipo_funcion', 2)->orderBy('nume_doc', 'asc')->get();
        $this->verificadores = Persona::where('tipo_funcion', 4)->orderBy('nume_doc', 'asc')->get();
        $this->departamentos = Ubiges::where('cod_pro', '00')->where('codi_dis', '00')->orderBy('descri', 'asc')->get();
        $this->provincias = Ubiges::where('cod_pro', '!=', '00')->where('codi_dis', '00')->orderBy('descri', 'asc')->get();
        $this->distritos = Ubiges::where('codi_dis', '!=', '00')->orderBy('descri', 'asc')->get();

    }
    /* CONSTRUCCIONES */

    public function aumentarConstruccion()
    {
        $this->cont2++;
    }

    public function reducirConstruccion()
    {
        $this->cont2--;
    }

    /* CONSTRUCCIONES */

    /* INSTALACIONES */

    public function aumentarInstalacion()
    {
        $this->cont3++;
    }

    public function reducirInstalacion()
    {
        $this->cont3--;
    }


    public function aumentarinformacion()
    {
        $this->cont5++;
    }

    public function reducirinformacion()
    {
        $this->cont5--;
    }

    public function aumentarExplotacion()
    {
        $this->cont4++;
    }

    public function reducirExplotacion()
    {
        $this->cont4--;
    }



    public function aumentarTipoRaza()
    {
        $this->cont6++;
    }

    public function reducirTipoRaza()
    {
        $this->cont6--;
    }

    public function aumentarCotitulares()
    {
        $this->cont++;
    }

    public function reducirCotitulares()
    {
        $this->cont--;
    }

    /* INSTALACIONES */

    public function render()
    {
        return view('livewire.ficha-rural-create');
    }

    /* INFORMACION FINAL*/
    public function updatedunidadcatastral()
    {
        $this->unidad_catastral=str_pad($this->unidad_catastral,6,'0',STR_PAD_LEFT);

    }

    public function updatednumeficha()
    {
        $this->nume_ficha=str_pad($this->nume_ficha,7,'0',STR_PAD_LEFT);
        $this->validate([
            'nume_ficha'                    => 'required|max:7|unique:tf_ficha_rural,nume_ficha',
        ]);
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
            ])->get($urldni.$dni);

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
    /* INFORMACION FINAL*/

     /* IDENTIFICACION TITULAR */

    public function updatednumedoc1()
    {
        if($this->tipo_doc1=="02")
        {
            $dni=$this->numedoc1;
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
                    session()->flash('success', 'Se necesita 8 digitos');
                }
                if($persona=="")
                {
                    session()->flash('success', 'No se encontro datos');
                }
            }else{
                $this->nombres1=$persona['nombres'];
                $this->ape_paterno1=$persona['apellidoPaterno'];
                $this->ape_materno1=$persona['apellidoMaterno'];
                $this->numedoc1=$dni;
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
            $response=Http::withHeaders([
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
        }
    }

    public function updatednumedoc3()
    {

        if($this->tipoTitular==2)
        {
            $ruc=$this->numedoc3;
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
                    session()->flash('warning', 'RUC invalido');
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
    }
     /* IDENTIFICACION TITULAR */

    public function register()
    {
        try
        {
            DB::beginTransaction();
            $ubigeo=Institucion::first();
            /*VALIDACIONES*/
            $this->validate([
                'nume_ficha'                                => 'required|max:7|unique:tf_ficha_rural',

                'cuc'                                       =>'nullable|max:15',
                'codigo_hoja_catastral'                     =>'nullable|max:15',
                'codigo_contr_rentas'                       =>'nullable|max:15',
                'codigo_predial'                            =>'nullable|max:15',
                'unidad_organica'                           =>'nullable|max:6',
                'zona_geografica'                           =>'nullable|max:2',
                'unidad_catastral'                          =>'nullable|max:6   ',
                'cod_dep'                                   =>'required|max:2',
                'cod_pro'                                   =>'required|max:2',
                'cod_dis'                                   =>'required|max:2',
                'proy_cat'                                  =>'required|max:75',
                'uni_terr'                                  =>'required|max:75',
                'nomb_valle'                                =>'required|max:75',
                'nomb_sector'                               =>'required|max:75',
                'nomb_predio'                               =>'required|max:75',
                'num_foto'                                  =>'nullable|max:175',
                'num_ortofoto'                              =>'nullable|max:175',
                'img_satelital'                             =>'nullable|max:175',
                'uca_ant'                                   =>'nullable|max:75',
                'cord_este'                                 =>'nullable|max:75',
                'cord_norte'                                =>'nullable|max:75',
                'datum'                                     =>'nullable|max:75',
                'zona'                                      =>'nullable|max:75',
                'tipoTitular'                               =>'required',
                'esta_civil1'                               => 'nullable',
                'tipo_doc1'                                 => 'nullable',
                'numedoc1'                                  => 'nullable|max:17',
                'nombres1'                                  => 'nullable|max:150',
                'ape_paterno1'                              => 'nullable|max:50',
                'ape_materno1'                              => 'nullable|max:50',
                'tipo_doc2'                                 => 'nullable',
                'numedoc2'                                  => 'nullable|max:17',
                'nombres2'                                  => 'nullable|max:150',
                'ape_paterno2'                              => 'nullable|max:50',
                'ape_materno2'                              => 'nullable|max:50',
                'numedoc3'                                  => 'nullable|max:17',
                'razon_social'                              => 'nullable|max:100',
                'tipo_persona_juridica'                     => 'nullable',

                'departamentootros'                         =>'required',
                'provinciaotros'                            =>'required',
                'distritootros'                             =>'required',
                'sector'                                    =>'nullable|max:50',
                'nomb_via'                                  =>'nullable|max:100',
                'nume_muni'                                 =>'nullable|max:6',
                'nomb_edificacion'                          =>'nullable|max:100',
                'telefonodomicilio'                         =>'nullable|max:10',
                'anexodomicilio'                            =>'nullable|max:10',
                'emaildomicilio'                            =>'nullable|max:100',
                'condicion'                                 =>'nullable',
                'condtitular'                               =>'required',
                'fecha_inicio'                              =>'nullable|date',
                'ins_reg_publ'                              =>'nullable',
                'num_part_regi'                             =>'nullable|numeric',
                'fecha_inscripcion'                         =>'nullable|date',
                'doc_sobre_propiedad'                       =>'nullable|max:2',
                'fecha_adquisicion'                         =>'nullable|date',

                'area_terreno'                              =>'nullable|numeric',
                'area_declarada'                            =>'required|numeric',
                'vivienda_construcciones'                   =>'nullable',
                'codi_uso'                                  =>'required',
                'uso_actual'                                =>'required',

                'observacion'                               => 'nullable|max:1000',

                'numdocumentodeclarante'                    => 'nullable|max:8',
                'nombres_declarante'                        => 'nullable|max:150',
                'apellido_paterno_declarante'               => 'nullable|max:50',
                'apellido_materno_declarante'               => 'nullable|max:50',
                'fecha_declarante'                          => 'nullable|date',
                'supervisor'                                => 'nullable',
                'fecha_supervision'                         => 'nullable|date',
                'tecnico'                                   => 'required',
                'fecha_levantamiento'           => 'required|date|before_or_equal:today',
                'verificador'                               => 'nullable',
                'nume_registro'                             => 'nullable|max:10',
                'fecha_verificacion'                        => 'nullable|date',


                'riego'                                     => 'nullable',
                'derechos_agua'                             => 'nullable',
                'fuente_hidrica'                            => 'required',
                'cercania_rio'                              => 'nullable',
                'explotacion'                               => 'nullable',
                'llenada_observacion'                       => 'nullable',
            ]);

            for($i=0;$i<$this->cont;$i++){
                $this->validate([
                    'num_cotitular.'.$i                     => 'required|max:2',
                    'ape_paternotitulares.'.$i              => 'required|max:50',
                    'ape_maternotitulares.'.$i              => 'required|max:50',
                    'nombrestitulares.'.$i                  => 'required|max:100',
                    'estado_civiltitulares.'.$i             => 'required',
                    'tipo_doc_titulars.'.$i                 => 'required',
                    'numedoctitulares.'.$i                  => 'required|max:17',
                ]);
            }

            for($i=0;$i<$this->cont2;$i++){
                $this->validate([
                    'num_piso.'.$i                          => 'required|max:2',
                    'fecha.'.$i                             => 'nullable',
                    'mep.'.$i                               => 'required',
                    'ecs.'.$i                               => 'required',
                    'ecc.'.$i                               => 'required',
                    'estr_muro_col.'.$i                     => 'required|max:1',
                    'estr_techo.'.$i                        => 'required|max:1',
                    'acab_piso.'.$i                         => 'required|max:1',
                    'acab_puerta_ven.'.$i                   => 'required|max:1',
                    'acab_revest.'.$i                       => 'required|max:1',
                    'acab_bano.'.$i                         => 'required|max:1',
                    'inst_elect_sanita.'.$i                 => 'required|max:1',
                    'area_verificada.'.$i                   => 'nullable|numeric|regex:/^[\d]{0,8}(\.[\d]{1,2})?$/',
                ]);
            }

            for($i=0;$i<$this->cont5;$i++){
                $this->validate([
                    'tipolitigante.'.$i                     => 'required',
                    'numedoc.'.$i                           => 'required|max:17',
                    'nombres.'.$i                           => 'required|max:150',
                    'ape_paterno.'.$i                       => 'nullable|max:50',
                    'ape_materno.'.$i                       => 'nullable|max:50',
                ]);
            }

            for($i=0;$i<$this->cont6;$i++){
                $this->validate([
                    'tipo_ganaderia.'.$i                    => 'required',
                    'raza_especie.'.$i                      => 'required|max:50',
                    'cantidad_especie.'.$i                  => 'required|numeric',
                ]);
            }

            for($i=0;$i<$this->cont4;$i++){
                $this->validate([
                    'tipo_usoactual.'.$i                    => 'required',
                    'areausoactual.'.$i                     => 'required|numeric',
                    'descripcionusoactual.'.$i              => 'nullable|max:20',
                    'grupoestimada.'.$i                     => 'nullable',
                    'claseestimada.'.$i                     => 'nullable',
                    'areaestimada.'.$i                      => 'nullable|numeric',
                    'grupoestudio.'.$i                      => 'nullable',
                    'claseestudio.'.$i                      => 'nullable',
                    'areaestudio.'.$i                       => 'nullable',
                    'numplantas.'.$i                        => 'nullable|numeric',
                ]);
            }


            for($i=0;$i<$this->cont3;$i++){
                $this->validate([
                    'tipo_ins.'.$i                          => 'required',
                    'cantidad.'.$i                          => 'required|numeric',
                    'area_porcentaje.'.$i                   => 'nullable|numeric',
                    'area_const.'.$i                        => 'nullable|numeric',
                    'volumen.'.$i                           => 'nullable|numeric',
                    'fecha_const.'.$i                       => 'nullable|date',
                    'material_est.'.$i                      => 'required|max:2',
                    'estado_conserva.'.$i                   => 'required|max:2',
                    'estado_construc.'.$i                   => 'required|max:2',
                ]);
            }

            $mytime= Carbon::now('America/Lima');


            $date = $mytime->format('Y');
            if($this->numdocumentodeclarante!=''){
                $iddd=$this->numdocumentodeclarante.'5102';
                $buscarpersona=Persona::where('id_persona','=',$iddd)->first();
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
            $unicatbuscar=($this->nomb_sector).''.($this->unidad_catastral);
            $unicatencontrar=UniCat::where('id_uni_cat',$unicatbuscar)->first();
            if($unicatencontrar!=""){
                $unicatencontrar->cuc=str_pad($this->cuc,12,'0',STR_PAD_LEFT);
                $unicatencontrar->codi_pred_rentas=$this->codigo_predial;
                $unicatencontrar->codi_cont_rentas=$this->codigo_contr_rentas;
                $unicatencontrar->save();
                $unicat=$unicatencontrar;
            }else{
                $unicat= new UniCat();
                $unicat->id_uni_cat=($this->nomb_sector).''.($this->unidad_catastral);
                $unicat->cuc=str_pad($this->cuc,12,'0',STR_PAD_LEFT);
                $unicat->codi_pred_rentas=$this->codigo_predial;
                $unicat->codi_cont_rentas=$this->codigo_contr_rentas;
                $unicat->save();
            }


            $ficha=new Ficha();
            $ficha->id_ficha=$date.''.str_pad($ubigeo->id_institucion,6,'0',STR_PAD_LEFT).'06'.str_pad($this->nume_ficha,7,'0',STR_PAD_LEFT);
            $ficha->tipo_ficha="06";
            $ficha->nume_ficha=str_pad($this->nume_ficha,7,'0',STR_PAD_LEFT);
            $ficha->id_lote=NULL;
            $ficha->id_uni_cat=$unicat->id_uni_cat;
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

            $ficha->id_usuario=\Auth::user()->id_usuario;
            $ficha->fecha_grabado=$mytime->toDateTimeString();
            $ficha->activo=1;
            $ficha->save();




            $ficharural=new FichaRural();
            $ficharural->id_ficha=$ficha->id_ficha;
            $ficharural->cuc=$this->cuc;
            $ficharural->codigo_hoja_catastral=strtoupper($this->codigo_hoja_catastral);
            $ficharural->codigo_contr_rentas=strtoupper($this->codigo_contr_rentas);
            $ficharural->codigo_predial=strtoupper($this->codigo_predial);
            $ficharural->unidad_organica=strtoupper($this->unidad_organica);
            $ficharural->zona_geografica=strtoupper($this->zona_geografica);
            $ficharural->unidad_catastral=strtoupper($this->unidad_catastral);
            $ficharural->cod_dep=strtoupper($this->cod_dep);
            $ficharural->cod_pro=strtoupper($this->cod_pro);
            $ficharural->cod_dis=strtoupper($this->cod_dis);
            $ficharural->proy_cat=strtoupper($this->proy_cat);
            $ficharural->uni_terr=strtoupper($this->uni_terr);
            $ficharural->nomb_valle=strtoupper($this->nomb_valle);
            $ficharural->nomb_sector=strtoupper($this->nomb_sector);
            $ficharural->nomb_predio=strtoupper($this->nomb_predio);
            $ficharural->num_foto=strtoupper($this->num_foto);
            $ficharural->num_ortofoto=strtoupper($this->num_ortofoto);
            $ficharural->img_satelital=strtoupper($this->img_satelital);
            $ficharural->uca_ant=strtoupper($this->uca_ant);
            $ficharural->cord_este=strtoupper($this->cord_este);
            $ficharural->cord_norte=strtoupper($this->cord_norte);
            $ficharural->datum=strtoupper($this->datum);
            $ficharural->zona=strtoupper($this->zona);





            if($this->tipoTitular==1)
            {
                $buscarpersona2=Persona::where('nume_doc',$this->numedoc1)->where('tipo_funcion',1)->first();
                if($buscarpersona2!=""){
                    $persona=$buscarpersona2;
                    $titular=new Titular();
                    $titular->id_ficha=$ficha->id_ficha;
                    $titular->id_persona=$persona->id_persona;
                    $titular->porc_cotitular=0.00;
                    $titular->esta_civil=$this->esta_civil1;
                    $titular->telf              =$this->telefonodomicilio;
                    $titular->anexo             =$this->anexodomicilio;
                    $titular->email             =$this->emaildomicilio;
                    $titular->nume_titular="TITULAR N° 1";
                    $titular->cond_titular=$this->condtitular;
                    $titular->save();
                    $domicilio=new DomicilioTitular();
                    $domicilio->id_ficha=$ficha->id_ficha;
                    $domicilio->id_persona=$persona->id_persona;
                    $domicilio->nomb_via=$this->nomb_via;
                    $domicilio->nume_muni=strtoupper($this->nume_muni);
                    $domicilio->nomb_edificacion = strtoupper($this->nomb_edificacion);
                    $domicilio->nomb_hab_urba=$this->nomb_edificacion;
                    $domicilio->sector=$this->sector;
                    $domicilio->codi_dep=$this->departamentootros;
                    $domicilio->codi_pro=$this->provinciaotros;
                    $domicilio->codi_dis=$this->distritootros;
                    $domicilio->ubicacion=0;
                    $domicilio->save();

                }else{
                    $persona= new Persona();
                    if($this->numedoc1==""){
                        $cantidadpersona=Persona::where('tipo_persona',1)->count()+1;
                        $persona->id_persona=str_pad($cantidadpersona,8,'0',STR_PAD_LEFT).'11'.$this->tipo_doc1;
                        $persona->nume_doc="";
                    }else{
                        $persona->id_persona=str_pad($this->numedoc1,8,'0',STR_PAD_LEFT).'11'.$this->tipo_doc1;
                        $persona->nume_doc=str_pad($this->numedoc1,8,'0',STR_PAD_LEFT);
                    }
                    $persona->tipo_doc=$this->tipo_doc1;
                    $persona->tipo_persona=1;
                    $persona->nombres=strtoupper($this->nombres1);
                    $persona->ape_paterno=strtoupper($this->ape_paterno1);
                    $persona->ape_materno=strtoupper($this->ape_materno1);
                    $persona->tipo_persona_juridica=$this->tipo_persona_juridica;
                    $persona->tipo_funcion=1;
                    $persona->razon_social=strtoupper($this->razon_social);
                    $persona->save();


                    $titular=new Titular();
                    $titular->id_ficha=$ficha->id_ficha;
                    $titular->id_persona=$persona->id_persona;
                    $titular->porc_cotitular=0.00;
                    $titular->esta_civil=$this->esta_civil1;
                    $titular->telf              =$this->telefonodomicilio;
                    $titular->anexo             =$this->anexodomicilio;
                    $titular->email             =$this->emaildomicilio;
                    $titular->nume_titular="TITULAR N° 1";
                    $titular->cond_titular=$this->condtitular;
                    $titular->save();

                    $domicilio=new DomicilioTitular();
                    $domicilio->id_ficha=$ficha->id_ficha;
                    $domicilio->id_persona=$persona->id_persona;
                    $domicilio->nomb_via=strtoupper($this->nomb_via);
                    $domicilio->nume_muni=strtoupper($this->nume_muni);
                    $domicilio->nomb_edificacion = strtoupper($this->nomb_edificacion);
                    $domicilio->nomb_hab_urba=$this->nomb_edificacion;
                    $domicilio->sector=$this->sector;
                    $domicilio->codi_dep=$this->departamentootros;
                    $domicilio->codi_pro=$this->provinciaotros;
                    $domicilio->codi_dis=$this->distritootros;
                    $domicilio->ubicacion=0;
                    $domicilio->save();
                }
            }elseif($this->tipoTitular==2){
                $buscarpersona3=Persona::where('nume_doc',$this->numedoc3)->where('tipo_funcion',1)->first();
                if($buscarpersona3!=""){
                    $persona=$buscarpersona3;
                    $titular=new Titular();
                    $titular->id_ficha=$ficha->id_ficha;
                    $titular->id_persona=$persona->id_persona;
                    $titular->porc_cotitular=0.00;
                    $titular->esta_civil=$this->esta_civil1;
                    $titular->telf              =$this->telefonodomicilio;
                    $titular->anexo             =$this->anexodomicilio;
                    $titular->email             =$this->emaildomicilio;
                    $titular->nume_titular="TITULAR N° 1";
                    $titular->cond_titular=$this->condtitular;
                    $titular->save();

                    $domicilio=new DomicilioTitular();
                    $domicilio->id_ficha=$ficha->id_ficha;
                    $domicilio->id_persona=$persona->id_persona;
                    $domicilio->nomb_via=strtoupper($this->nomb_via);
                    $domicilio->nume_muni=strtoupper($this->nume_muni);
                    $domicilio->nomb_edificacion = strtoupper($this->nomb_edificacion);
                    $domicilio->nomb_hab_urba=$this->nomb_edificacion;
                    $domicilio->sector=$this->sector;
                    $domicilio->codi_dep=$this->departamentootros;
                    $domicilio->codi_pro=$this->provinciaotros;
                    $domicilio->codi_dis=$this->distritootros;
                    $domicilio->ubicacion=0;
                    $domicilio->save();
                }else{
                    $persona= new Persona();
                    if($this->numedoc3==""){
                        $cantidadpersona=Persona::where('tipo_persona',2)->count()+1;
                        $persona->id_persona=str_pad($cantidadpersona,11,'0',STR_PAD_LEFT).'1200';
                        $persona->nume_doc="";
                    }else{
                        $persona->id_persona=str_pad($this->numedoc3,11,'0',STR_PAD_LEFT).'1200';
                        $persona->nume_doc=str_pad($this->numedoc3,11,'0',STR_PAD_LEFT);
                    }
                    $persona->tipo_doc='00';
                    $persona->tipo_persona=2;
                    $persona->tipo_persona_juridica=$this->tipo_persona_juridica;
                    $persona->tipo_funcion=1;
                    $persona->razon_social=strtoupper($this->razon_social);
                    $persona->save();

                    $titular=new Titular();
                    $titular->id_ficha=$ficha->id_ficha;
                    $titular->id_persona=$persona->id_persona;
                    $titular->porc_cotitular=0.00;
                    $titular->esta_civil=$this->esta_civil1;
                    $titular->telf              =$this->telefonodomicilio;
                    $titular->anexo             =$this->anexodomicilio;
                    $titular->email             =$this->emaildomicilio;
                    $titular->nume_titular="TITULAR N° 1";
                    $titular->cond_titular=$this->condtitular;
                    $titular->save();

                    $domicilio=new DomicilioTitular();
                    $domicilio->id_ficha=$ficha->id_ficha;
                    $domicilio->id_persona=$persona->id_persona;
                    $domicilio->nomb_via=strtoupper($this->nomb_via);
                    $domicilio->nume_muni=strtoupper($this->nume_muni);
                    $domicilio->nomb_edificacion = strtoupper($this->nomb_edificacion);
                    $domicilio->nomb_hab_urba=$this->nomb_edificacion;
                    $domicilio->sector=$this->sector;
                    $domicilio->codi_dep=$this->departamentootros;
                    $domicilio->codi_pro=$this->provinciaotros;
                    $domicilio->codi_dis=$this->distritootros;
                    $domicilio->ubicacion=0;
                    $domicilio->save();
                }
            }
            if($this->esta_civil1=='02' || $this->esta_civil1=='04'){
                $buscarpersona4=Persona::where('nume_doc',$this->numedoc2)->where('tipo_funcion',1)->first();
                if($buscarpersona4!=""){
                    $persona2=$buscarpersona4;
                    $titular=new Titular();
                    $titular->id_ficha=$ficha->id_ficha;
                    $titular->id_persona=$persona2->id_persona;

                    $titular->porc_cotitular=0.00;
                    $titular->esta_civil=$this->esta_civil1;
                    $titular->telf              =$this->telefonodomicilio;
                    $titular->anexo             =$this->anexodomicilio;
                    $titular->email             =$this->emaildomicilio;
                    $titular->nume_titular="TITULAR N° 2";
                    $titular->cond_titular=$this->condtitular;
                    $titular->save();
                }else{
                    $persona2= new Persona();
                    if($this->numedoc3==""){
                        $cantidadpersona=Persona::where('tipo_persona',1)->count()+1;
                        $persona2->id_persona=str_pad($cantidadpersona,8,'0',STR_PAD_LEFT).'1200';
                        $persona2->nume_doc=str_pad($cantidadpersona,8,'0',STR_PAD_LEFT);
                    }else{
                        $persona2->id_persona=str_pad($this->numedoc2,8,'0',STR_PAD_LEFT).'1200';
                        $persona2->nume_doc=str_pad($this->numedoc2,8,'0',STR_PAD_LEFT);
                    }
                    $persona2->tipo_doc=$this->tipo_doc2;
                    $persona2->tipo_persona=1;
                    $persona2->nombres=strtoupper($this->nombres2);
                    $persona2->ape_paterno=strtoupper($this->ape_paterno2);
                    $persona2->ape_materno=strtoupper($this->ape_materno2);
                    $persona2->tipo_persona_juridica=$this->tipo_persona_juridica;
                    $persona2->tipo_funcion=1;
                    $persona2->save();

                    $titular=new Titular();
                    $titular->id_ficha=$ficha->id_ficha;
                    $titular->id_persona=$persona2->id_persona;

                    $titular->porc_cotitular=0.00;
                    $titular->esta_civil=$this->esta_civil1;
                    $titular->telf              =$this->telefonodomicilio;
                    $titular->anexo             =$this->anexodomicilio;
                    $titular->email             =$this->emaildomicilio;
                    $titular->nume_titular="TITULAR N° 2";
                    $titular->cond_titular=$this->condtitular;
                    $titular->save();
                }
            }

            $conttitu=0;
            if($this->num_cotitular!="")
            {
                while(count($this->num_cotitular)>$conttitu)
                {
                    $buscarpersona2=Persona::where('nume_doc',$this->numedoctitulares[$conttitu])->where('tipo_funcion',1)->first();
                    if($buscarpersona2!=""){
                        $declarante2=$buscarpersona2;
                    }else{
                        $declarante2= new Persona();
                        $declarante2->id_persona=$this->numedoctitulares[$conttitu].'1102';
                        $declarante2->nume_doc=$this->numedoctitulares[$conttitu];
                        $declarante2->tipo_doc="02";
                        $declarante2->tipo_persona=1;
                        $declarante2->nombres=strtoupper($this->nombrestitulares[$conttitu]);
                        $declarante2->ape_paterno=strtoupper($this->ape_paternotitulares[$conttitu]);
                        $declarante2->ape_materno=strtoupper($this->ape_maternotitulares[$conttitu]);
                        $declarante2->tipo_funcion=1;
                        $declarante2->save();
                    }

                    $titular2=new Titular();
                    $titular2->id_ficha=$ficha->id_ficha;
                    $titular2->id_persona=$declarante2->id_persona;
                    $titular2->esta_civil=$this->estado_civiltitulares[$conttitu];
                    $titular2->nume_titular='TITULAR'.$conttitu+2;
                    $titular2->save();
                    $conttitu++;
                }

            }



            #DESCRIPCION DEL PREDIO
            $ficharural->codi_uso=strtoupper($this->codi_uso);
            $ficharural->clasi_uso=strtoupper($this->uso_actual);

            #EXPLOTACION
            $ficharural->riego=strtoupper($this-> riego);
            $ficharural->derecho_agua=strtoupper($this-> derechos_agua);
            $ficharural->fuente_hidrica=strtoupper($this-> fuente_hidrica);
            $ficharural->cercania_rio=strtoupper($this-> cercania_rio);
            $ficharural->cumple_explotacion=strtoupper($this-> explotacion);
            $ficharural->llenada_intervension=strtoupper($this->llenada_observacion);
            $ficharural->observaciones=strtoupper($this->observacion);
            $ficharural->nume_ficha=str_pad($this->nume_ficha,7,'0',STR_PAD_LEFT);
            $ficharural->save();


            #CONDICION DEL PREDIO
            $condicion_predio= new CondicionPredio();
            $condicion_predio->id_ficha = $ficha->id_ficha;
            $condicion_predio->cond_titular=$this->condicion;

            if(isset($this->fecha_inicio)){
                $condicion_predio->fecha_ini=$this->fecha_inicio;
            }

            $condicion_predio->insc_rrpp=$this->ins_reg_publ;



            if(isset($this->num_part_regi)){
                $condicion_predio->num_part=$this->num_part_regi;
            }
            else{
                $condicion_predio->num_part=0;

            }



            if(isset($this->fecha_inscripcion)){
                $condicion_predio->fecha_insc=$this->fecha_inscripcion;
            }

            $condicion_predio->doc_propiedad=$this->doc_sobre_propiedad;
            if(isset($this->fecha_adquisicion)){
                $condicion_predio->fecha_adq=$this->fecha_adquisicion;
            }
            $condicion_predio->save();


            $documento_posesions=new DocumentoPosesion();
            $documento_posesions->id_ficha=$ficha->id_ficha;

            if($this->pru_ob1=="on"){
                $documento_posesions->pru_ob1=1;
            }else{
                $documento_posesions->pru_ob1=2;
            }

            if($this->pru_ob2=="on"){
                $documento_posesions->pru_ob2=1;
            }else{
                $documento_posesions->pru_ob2=2;
            }

            if($this->pru_ob3=="on"){
                $documento_posesions->pru_ob3=1;
            }else{
                $documento_posesions->pru_ob3=2;
            }

            if($this->pru_comp1=="on"){
                $documento_posesions->pru_comp1=1;
            }else{
                $documento_posesions->pru_comp1=2;
            }




            if($this->pru_comp2=="on"){
                $documento_posesions->pru_comp2=1;
            }else{
                $documento_posesions->pru_comp2=2;
            }

            if($this->pru_comp3=="on"){
                $documento_posesions->pru_comp3=1;
            }else{
                $documento_posesions->pru_comp3=2;
            }

            if($this->pru_comp4=="on"){
                $documento_posesions->pru_comp4=1;
            }else{
                $documento_posesions->pru_comp4=2;
            }

            if($this->pru_comp5=="on"){
                $documento_posesions->pru_comp5=1;
            }else{
                $documento_posesions->pru_comp5=2;
            }

            if($this->pru_comp6=="on"){
                $documento_posesions->pru_comp6=1;
            }else{
                $documento_posesions->pru_comp6=2;
            }

            if($this->pru_comp7=="on"){
                $documento_posesions->pru_comp7=1;
            }else{
                $documento_posesions->pru_comp7=2;
            }

            if($this->pru_comp8=="on"){
                $documento_posesions->pru_comp8=1;
            }else{
                $documento_posesions->pru_comp8=2;
            }

            if($this->pru_comp9=="on"){
                $documento_posesions->pru_comp9=1;
            }else{
                $documento_posesions->pru_comp9=2;
            }

            if($this->pru_comp10=="on"){
                $documento_posesions->pru_comp10=1;
            }else{
                $documento_posesions->pru_comp10=2;
            }


            if($this->pru_comp11=="on"){
                $documento_posesions->pru_comp11=1;
            }else{
                $documento_posesions->pru_comp11=2;
            }

            if($this->pru_comp12=="on"){
                $documento_posesions->pru_comp12=1;
            }else{
                $documento_posesions->pru_comp12=2;
            }

            if($this->pru_comp13=="on"){
                $documento_posesions->pru_comp13=1;
            }else{
                $documento_posesions->pru_comp13=2;
            }

            if($this->pru_comp14=="on"){
                $documento_posesions->pru_comp14=1;
            }else{
                $documento_posesions->pru_comp14=2;
            }
            if($this->pru_comp15=="on"){
                $documento_posesions->pru_comp15=1;
            }else{
                $documento_posesions->pru_comp15=2;
            }
            $documento_posesions->save();
            $caracteristicas_rural=new CaracteristicasRural();
            $caracteristicas_rural->id_ficha=$ficha->id_ficha;
            $caracteristicas_rural->area_terreno=$this->area_terreno;
            $caracteristicas_rural->area_decl=$this->area_declarada;
            if($this->vivienda=='on'){
                $caracteristicas_rural->vivienda=1;
            }else{
                $caracteristicas_rural->vivienda=2;
            }
            if($this->establo=='on'){
                $caracteristicas_rural->establo=1;
            }else{
                $caracteristicas_rural->establo=2;
            }
            if($this->corral=='on'){
                $caracteristicas_rural->corral=1;
            }else{
                $caracteristicas_rural->corral=2;
            }
            if($this->galpon=='on'){
                $caracteristicas_rural->galpon=1;
            }else{
                $caracteristicas_rural->galpon=2;
            }
            if($this->invernadero=='on'){
                $caracteristicas_rural->invernadero=1;
            }else{
                $caracteristicas_rural->invernadero=2;
            }
            if($this->reservorio=='on'){
                $caracteristicas_rural->reservorio=1;
            }else{
                $caracteristicas_rural->reservorio=2;
            }
            if($this->deposito=='on'){
                $caracteristicas_rural->deposito=1;
            }else{
                $caracteristicas_rural->deposito=2;
            }
            if($this->zona_arque=='on'){
                $caracteristicas_rural->zona_arque=1;
            }else{
                $caracteristicas_rural->zona_arque=2;
            }
            if($this->otros=='on'){
                $caracteristicas_rural->otros=1;
            }else{
                $caracteristicas_rural->otros=2;
            }
            $caracteristicas_rural->save();
            $contcon=0;
            $construcciones=$this->num_piso;
            if($construcciones!=""){
                while($contcon < count($construcciones)){
                    $construccion=new Construccion();
                    $construccion->id_construccion=$ficha->id_ficha.''.$this->num_piso[$contcon].''.$contcon+1;
                    $construccion->id_ficha=$ficha->id_ficha;
                    $construccion->codi_construccion=$contcon+1;
                    if(isset($this->num_piso[$contcon])){
                        $construccion->nume_piso=$this->num_piso[$contcon];
                    }else{
                        $construccion->nume_piso="";
                    }
                    if(isset($this->fecha[$contcon])){
                        $construccion->fecha=$this->fecha[$contcon];
                    }
                    if(isset($this->fecha[$contcon])){
                        $construccion->fecha=$this->fecha[$contcon];
                    }else{
                        $construccion->fecha="";
                    }
                    if(isset($this->mep[$contcon])){
                        $construccion->mep=$this->mep[$contcon];
                    }else{
                        $construccion->mep="";
                    }
                    if(isset($this->ecs[$contcon])){
                        $construccion->ecs=$this->ecs[$contcon];
                    }else{
                        $construccion->ecs="";
                    }
                    if(isset($this->ecc[$contcon])){
                        $construccion->ecc=$this->ecc[$contcon];
                    }else{
                        $construccion->ecc="";
                    }
                    if(isset($this->estr_muro_col[$contcon])){
                        $construccion->estr_muro_col=$this->estr_muro_col[$contcon];
                    }else{
                        $construccion->estr_muro_col="";
                    }
                    if(isset($this->estr_techo[$contcon])){
                        $construccion->estr_techo=$this->estr_techo[$contcon];
                    }else{
                        $construccion->estr_techo="";
                    }
                    if(isset($this->acab_piso[$contcon])){
                        $construccion->acab_piso=$this->acab_piso[$contcon];
                    }else{
                        $construccion->acab_piso="";
                    }
                    if(isset($this->acab_puerta_ven[$contcon])){
                        $construccion->acab_puerta_ven=$this->acab_puerta_ven[$contcon];
                    }else{
                        $construccion->acab_puerta_ven="";
                    }
                    if(isset($this->acab_revest[$contcon])){
                        $construccion->acab_revest=$this->acab_revest[$contcon];
                    }else{
                        $construccion->acab_revest="";
                    }
                    if(isset($this->acab_bano[$contcon])){
                        $construccion->acab_bano=$this->acab_bano[$contcon];
                    }else{
                        $construccion->acab_bano="";
                    }
                    if(isset($this->inst_elect_sanita[$contcon])){
                        $construccion->inst_elect_sanita=$this->inst_elect_sanita[$contcon];
                    }else{
                        $construccion->inst_elect_sanita="";
                    }
                    $construccion->area_declarada=0.00;
                    if(isset($this->area_verificada[$contcon])){
                        $construccion->area_verificada=$this->area_verificada[$contcon];
                    }else{
                        $construccion->area_verificada="";
                    }
                    $construccion->save();
                    $contcon++;
                }
            }


            $contlit=0;
            $litigantes=$this->tipolitigante;
            if($litigantes!=""){
                while($contlit < count($litigantes))
                {
                    if($this->numedoc[$contlit]!=''){
                        $buscarpersona4=Persona::where('nume_doc',$this->numedoc[$contlit])->where('tipo_funcion',6)->first();
                        if($buscarpersona4!=""){
                            $litigantepersona=$buscarpersona4;
                        }else{
                            $litigantepersona= new Persona();
                            $litigantepersona->id_persona=$this->numedoc[$contlit].'61'.$this->tipolitigante[$contlit];

                            $litigantepersona->tipo_persona=1;
                            $litigantepersona->tipo_funcion=6;

                            if(isset($this->numedoc[$contlit])){
                                $litigantepersona->nume_doc=$this->numedoc[$contlit];
                            }else{
                                $litigantepersona->nume_doc="";
                            }

                            if(isset($this->tipolitigante[$contlit])){
                                $litigantepersona->tipo_doc=$this->tipolitigante[$contlit];
                            }else{
                                $litigantepersona->tipo_doc="";
                            }

                            if(isset($this->nombres[$contlit])){
                                $litigantepersona->nombres=$this->nombres[$contlit];
                            }else{
                                $litigantepersona->nombres="";
                            }

                            if(isset($this->ape_paterno[$contlit])){
                                $litigantepersona->ape_paterno=$this->ape_paterno[$contlit];
                            }else{
                                $litigantepersona->ape_paterno="";
                            }

                            if(isset($this->ape_materno[$contlit])){
                                $litigantepersona->ape_materno=$this->ape_materno[$contlit];
                            }else{
                                $litigantepersona->ape_materno="";
                            }



                            $litigantepersona->save();
                        }
                    }

                    $litigante=new Litigante();
                    $litigante->id_ficha=$ficha->id_ficha;
                    $litigante->id_persona=$litigantepersona->id_persona;
                    $litigante->save();
                    $contlit++;
                }

                $continst=0;
                if($this->tipo_ins!=""){
                    while(count($this->tipo_ins)>$continst){
                        $instalacion=new InstalacionRural();
                        $instalacion->id_ficha=$ficha->id_ficha;

                        if(isset($this->tipo_ins[$continst])){
                            $instalacion->tipo_ins=$this->tipo_ins[$continst];
                        }else{
                            $instalacion->tipo_ins="";
                        }


                        if(isset($this->cantidad[$continst])){
                            $instalacion->cantidad=$this->cantidad[$continst];
                        }else{
                            $instalacion->cantidad=0;
                        }

                        if(isset($this->area_porcentaje[$continst])){
                            $instalacion->area_porcentaje=$this->area_porcentaje[$continst];
                        }else{
                            $instalacion->area_porcentaje="";
                        }

                        if(isset($this->area_const[$continst])){
                            $instalacion->area_const=$this->area_const[$continst];
                        }else{
                            $instalacion->area_const="";
                        }


                        if(isset($this->volumen[$continst])){
                            $instalacion->volumen=$this->volumen[$continst];
                        }else{
                            $instalacion->volumen="";
                        }


                        if(isset($this->fecha_const[$continst])){
                            $instalacion->fecha_const=$this->fecha_const[$continst];
                        }

                        if(isset($this->material_est[$continst])){
                            $instalacion->material_est=$this->material_est[$continst];
                        }else{
                            $instalacion->material_est="";
                        }

                        if(isset($this->estado_conserva[$continst])){
                            $instalacion->estado_conserva=$this->estado_conserva[$continst];
                        }else{
                            $instalacion->estado_conserva="";
                        }

                        if(isset($this->estado_construc[$continst])){
                            $instalacion->estado_construc=$this->estado_construc[$continst];
                        }else{
                            $instalacion->estado_construc="";
                        }

                        $instalacion->save();
                        $continst++;
                    }
                }






                $contagri=0;
                if($this->tipo_usoactual!=""){
                    while(count($this->tipo_usoactual)>$contagri){
                        $agricola=new AgricolaPredio();
                        $agricola->id_ficha=$ficha->id_ficha;



                        if(isset($this->tipo_usoactual[$contagri])){
                            $agricola->tipo_agricola=$this->tipo_usoactual[$contagri];
                        }else{
                            $agricola->tipo_agricola="";
                        }

                        if(isset($this->areausoactual[$contagri])){
                            $agricola->area_agricola=$this->areausoactual[$contagri];
                        }else{
                            $agricola->area_agricola=0;
                        }

                        if(isset($this->descripcionusoactual[$contagri])){
                            $agricola->descripcion_agricola=$this->descripcionusoactual[$contagri];
                        }else{
                            $agricola->descripcion_agricola="";
                        }

                        if(isset($this->grupoestimada[$contagri])){
                            $agricola->grupo_agricola_campo=$this->grupoestimada[$contagri];
                        }else{
                            $agricola->grupo_agricola_campo="";
                        }

                        if(isset($this->claseestimada[$contagri])){
                            $agricola->clase_agricola_campo=$this->claseestimada[$contagri];
                        }else{
                            $agricola->clase_agricola_campo="";
                        }

                        if(isset($this->areaestimada[$contagri])){
                            $agricola->area_agricola_campo=$this->areaestimada[$contagri];
                        }else{
                            $agricola->area_agricola_campo=0;
                        }

                        if(isset($this->grupoestudio[$contagri])){
                            $agricola->grupo_agricola_tierras=$this->grupoestudio[$contagri];
                        }else{
                            $agricola->grupo_agricola_tierras="";
                        }

                        if(isset($this->claseestudio[$contagri])){
                            $agricola->clase_agricola_tierras=$this->claseestudio[$contagri];
                        }else{
                            $agricola->clase_agricola_tierras="";
                        }

                        if(isset($this->areaestudio[$contagri])){
                            $agricola->area_agricola_tierras=$this->areaestudio[$contagri];
                        }else{
                            $agricola->area_agricola_tierras=0;
                        }

                        if(isset($this->numplantas[$contagri])){
                            $agricola->numero_plantas=$this->numplantas[$contagri];
                        }else{
                            $agricola->numero_plantas=0;
                        }

                        $agricola->save();
                        $contagri++;
                    }
                }



                $contganad=0;
                if($this->tipo_ganaderia!=""){
                    while(count($this->tipo_ganaderia)>$contganad){
                        $ganaderia=new GanaderiaRural();
                        $ganaderia->id_ficha=$ficha->id_ficha;


                        if(isset($this->tipo_ganaderia[$contganad])){
                            $ganaderia->tipo_ganaderia=$this->tipo_ganaderia[$contganad];
                        }else{
                            $ganaderia->tipo_ganaderia="";
                        }

                        if(isset($this->raza_especie[$contganad])){
                            $ganaderia->raza_especio=$this->raza_especie[$contganad];
                        }else{
                            $ganaderia->raza_especio="";
                        }

                        if(isset($this->cantidad_especie[$contganad])){
                            $ganaderia->cantidad_ganderia=$this->cantidad_especie[$contganad];
                        }else{
                            $ganaderia->cantidad_ganderia=0;
                        }
                        $ganaderia->save();
                        $contganad++;
                    }
                }
            }


            DB::commit();
        }
        catch(Exception $e){
            DB::rollBack();
        }

        return redirect()->route('reporte.reportelista')
            ->with('success', 'Ficha Rural Agregado Correctamente.');
    }

}
