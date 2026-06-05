<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Client\RequestException;
use App\Models\Uso;
use App\Models\Persona;
use App\Models\Sectore;
use App\Models\Manzana;
use App\Models\HabUrbana;
use App\Models\Via;
use App\Models\CodigoInstalacion;
use App\Models\Ubiges;
use Illuminate\Support\Facades\Http;
use App\Models\Institucion;
use App\Models\Ficha;
use App\Models\UniCat;
use App\Models\Puerta;
use App\Models\DomicilioTitular;
use App\Models\ExoneracionPredio;
use App\Models\FichaIndividual;
use App\Models\Lindero;
use App\Models\ServicioBasico;
use App\Models\Construccion;
use App\Models\Instalacion;
use App\Models\DocumentoAdjunto;
use App\Models\RegistroLegal;
use App\Models\Sunarp;
use App\Models\Litigante;
use App\Models\Lote;
use App\Models\Titular;
use App\Models\Edificaciones;
use Carbon\Carbon;
use DB;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class FichaIndividualRentasEdit extends Component
{
    use WithFileUploads;

    public $nume_ficha;
    public $nume_ficha_lote;
    public $nume_ficha_lote2;
    public $cuc;
    public $dpto = '08';
    public $prov = '01';
    public $dist = '08';
    public $sector;
    public $mzna;
    public $lote;
    public $edifica;
    public $entrada;
    public $piso;
    public $unidad;
    public $dc;
    public $bloque;
    public $sectores;
    public $manzanas = [];
    public $codi_cont_rentas;
    public $codi_pred_rentas;

    public $tipoHabi;
    public $nomb_hab_urba;
    public $zona_dist;
    public $mzna_dist;
    public $lote_dist;
    public $sub_lote_dist;
    public $via_id;
    public $hab_urbanas;
    public $hab_urbanas2;
    public $hab_urbana2;
    public $cont = 1;
    public $via2 = array([]);
    public $tipoVia;
    public $tipoVianombre;
    public $tipoViatipo;
    public $tipopuerta;
    public $nume_muni;
    public $cond_nume;
    public $tipo_edificacion;
    public $tipo_interior;
    public $nume_interior;

    public $condtitular;
    public $form_adquisicion;
    public $fecha_adquisicion;

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

    #DOMICILIO TITULAR
    public $ubicacionpersona;
    public $departamentootros;
    public $provinciaotros;
    public $distritootros;
    public $codigoviaotros;
    public $tipoviaotros;
    public $nombreviaotros;
    public $nmunicipalotros;
    public $ninteriorotros;
    public $codigohurbanootros;
    public $nombrehhurbanaotros;
    public $zonaootros;
    public $manzanaotros;
    public $loteotros;
    public $subloteotros;
    public $telefonodomicilio;
    public $anexodomicilio;
    public $emaildomicilio;
    #DOMICILIO TITULAR

    #DESCRIPCION DEL PREDIO
    public $clasificacion;
    public $cont_en;
    public $codi_uso;
    public $zonificacion;
    public $area_declarada;
    public $area_verificada1;
    public $fren_campo;
    public $dere_campo;
    public $izqu_campo;
    public $fond_campo;
    public $fren_colinda_campo;
    public $dere_colinda_campo;
    public $izqu_colinda_campo;
    public $fond_colinda_campo;
    #SERVICIOS
    public $luz;
    public $agua;
    public $telefono;
    public $desague;
    public $gas;
    public $internet;
    public $tvcable;
    #SERVICIOS

    #CONSTRUCCIONES
    public $cont2 = 0;
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

    #OBRAS COMPLEMENTARIAS
    public $cont3 = 0;
    public $codi_instalacion;
    public $inst_fecha;
    public $inst_mep;
    public $inst_ecs;
    public $inst_ecc;
    public $inst_prod_total;
    public $inst_uni_med;
    public $inst_uca;
    #OBRAS COMPLEMENTARIAS

    #DOCUMENTOS
    public $cont4 = 0;
    public $tipo_dococumento;
    public $nume_documento;
    public $fecha_dococumento;
    public $area_autorizadadocumento;
    public $url_doc;
    #DOCUMENTOS

    #INSCRIPCION
    public $tipo_partida;
    public $nume_partida;
    public $fojas;
    public $asiento;
    public $fecha_inscripcion;
    public $codi_decla_fabrica;
    public $asie_fabrica;
    public $fecha_fabrica;
    #INSCRIPCION

    #EVALUACION PREDIO
    public $en_colindante;
    public $en_area_publica;
    public $en_jardin_aislamiento;
    public $en_area_intangible;
    #EVALUACION PREDIO

    #INFORMACION COMPLEMENTARIA
    public $tipolitigante;
    public $numedoc;
    public $nombres;
    public $ape_materno;
    public $cont5 = 0;
    public $ape_paterno;
    public $codi_contribuye;
    public $cond_declarante;
    public $esta_llenado;
    public $nume_habitantes;
    public $nume_familias;
    public $mantenimiento;
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

    public $usos;
    public $tecnicos;
    public $supervisores;
    public $verificadores;
    public $departamentos = [];
    public $codigosinstalacion;
    public $provincias = [];
    public $fichaanterior;


    public $imagen_lote;
    public $imagen_plano;


    public function mount(Ficha $fichaanterior)
    {
        $this->nume_ficha = $fichaanterior?->fichaindividual?->nume_ficha;

        $separarnume_ficha = explode('-', $fichaanterior?->nume_ficha_lote);

        $this->nume_ficha_lote = $separarnume_ficha[0];
        $this->nume_ficha_lote2 = $separarnume_ficha[1];
        $this->lote = $fichaanterior?->lote?->codi_lote;
        $this->cuc = $fichaanterior?->unicat?->cuc;

        #$id_mzna = $fichaanterior?->lote?->id_mzna;
        #$mznab = Manzana::where('id_mzna',$id_mzna)?->get();
        #$this->mzna = $mznab?->codi_mzna;
        $this->sector = $fichaanterior?->unicat?->edificacion?->lote?->manzana?->sectore?->codi_sector;
        $this->mzna = $fichaanterior?->unicat?->edificacion?->lote?->manzana?->codi_mzna;
        $this->edifica = $fichaanterior?->unicat?->edificacion?->codi_edificacion;
        $this->entrada = $fichaanterior?->unicat?->codi_entrada;
        $this->piso = $fichaanterior?->unicat?->codi_piso;
        $this->unidad = $fichaanterior?->unicat?->codi_unidad;
        $this->dc = $fichaanterior?->dc;
        $this->codi_cont_rentas = $fichaanterior?->unicat?->codi_cont_rentas;
        $this->codi_pred_rentas = $fichaanterior?->unicat?->codi_pred_rentas;
        $this->tipoHabi = str_pad($fichaanterior?->lote?->id_hab_urba, 10, '0', STR_PAD_LEFT);
        $idhaburb = $fichaanterior?->lote?->id_hab_urba;
        $nomb_hab_urba1 = HabUrbana::where('id_hab_urba', '=', $idhaburb)?->first();
        $nomb_hab_urba2 = $nomb_hab_urba1?->nomb_hab_urba;
        $this->nomb_hab_urba = $nomb_hab_urba2;

        $this->zona_dist = $fichaanterior?->lote?->zona_dist;
        $this->mzna_dist = $fichaanterior?->lote?->mzna_dist;
        $this->lote_dist = $fichaanterior?->lote?->lote_dist;
        $this->sub_lote_dist = $fichaanterior?->sub_lote_dist;

        $this->tipo_edificacion = $fichaanterior?->unicat?->edificacion?->tipo_edificacion;
        $this->tipo_interior = $fichaanterior?->unicat?->tipo_interior;
        $this->nume_interior = $fichaanterior?->unicat?->nume_interior;

        #IDENTIFICACIÓN DEL TITULAR CATASTRAL
        if ($fichaanterior?->titular != "") {
            $this->tipoTitular = $fichaanterior?->titulars[0]?->persona?->tipo_persona;
            if ($fichaanterior?->titulars[0]?->persona?->tipo_persona == 1) {
                $this->esta_civil1 = $fichaanterior?->titulars[0]?->esta_civil;
                $this->tipo_doc1 = $fichaanterior?->titulars[0]?->persona?->tipo_doc;
                $this->numedoc1 = $fichaanterior?->titulars[0]?->persona?->nume_doc;
                $this->nombres1 = $fichaanterior?->titulars[0]?->persona?->nombres;
                $this->ape_paterno1 = $fichaanterior?->titulars[0]?->persona?->ape_paterno;
                $this->ape_materno1 = $fichaanterior?->titulars[0]?->persona?->ape_materno;
            }
            if ($fichaanterior?->titulars[0]?->persona?->tipo_persona == 2) {
                $this->numedoc3 = $fichaanterior?->titulars[0]?->persona?->nume_doc;
                $this->razon_social = $fichaanterior?->titulars[0]?->persona?->razon_social;
                $this->tipo_persona_juridica = $fichaanterior?->titulars[0]?->persona?->tipo_persona_juridica;
            }

            if (isset($fichaanterior?->titulars[1])) {
                $this->tipo_doc2 = $fichaanterior?->titulars[1]?->persona?->tipo_doc;
                $this->numedoc2 = $fichaanterior?->titulars[1]?->persona?->nume_doc;
                $this->nombres2 = $fichaanterior?->titulars[1]?->persona?->nombres;
                $this->ape_paterno2 = $fichaanterior?->titulars[1]?->persona?->ape_paterno;
                $this->ape_materno2 = $fichaanterior?->titulars[1]?->persona?->ape_materno;
            }
        }

        if ($fichaanterior?->domiciliotitular != "") {
            $this->ubicacionpersona = $fichaanterior?->domiciliotitular?->ubicacion;
            $this->codigoviaotros = $fichaanterior?->domiciliotitular?->codi_via;
            $this->tipoviaotros = $fichaanterior?->domiciliotitular?->tipo_via;
            $this->nombreviaotros = $fichaanterior?->domiciliotitular?->nomb_via;
            $this->nmunicipalotros = $fichaanterior?->domiciliotitular?->nume_muni;
            $this->ninteriorotros = $fichaanterior?->domiciliotitular?->nume_interior;
            $this->codigohurbanootros = $fichaanterior?->domiciliotitular?->codi_hab_urba;
            $this->nombrehhurbanaotros = $fichaanterior?->domiciliotitular?->nomb_hab_urba;
            $this->zonaootros = $fichaanterior?->domiciliotitular?->sector;
            $this->manzanaotros = $fichaanterior?->domiciliotitular?->mzna;
            $this->loteotros = $fichaanterior?->domiciliotitular?->lote;
            $this->subloteotros = $fichaanterior?->domiciliotitular?->sublote;
            $this->telefonodomicilio = $fichaanterior?->titular?->telf;
            $this->anexodomicilio = $fichaanterior?->titular?->anexo;
            $this->emaildomicilio = $fichaanterior?->titular?->email;
            $this->departamentootros = $fichaanterior?->domiciliotitular?->codi_dep;
            $this->provinciaotros = $fichaanterior?->domiciliotitular?->codi_pro;
            $this->distritootros = $fichaanterior?->domiciliotitular?->codi_dis;
        }


        $this->cont = count($fichaanterior?->puertas);

        foreach ($fichaanterior?->puertas as $i => $puerta) {
            $this->tipoVia[$i] = $puerta?->id_via;
            $this->tipoViatipo[$i] = $puerta?->via?->tipo_via;
            $this->tipoVianombre[$i] = $puerta?->via?->nomb_via;
            $this->tipopuerta[$i] = $puerta?->tipo_puerta;
            $this->nume_muni[$i] = $puerta?->nume_muni;
            $this->cond_nume[$i] = $puerta?->cond_nume;
        }
        if ($fichaanterior?->titular != "") {
            $this->condtitular = $fichaanterior?->titular?->cond_titular;
            $this->form_adquisicion = $fichaanterior?->titular?->form_adquisicion;
            if ($fichaanterior?->titular?->fecha_adquisicion != "1969-12-31") {
                $this->fecha_adquisicion = $fichaanterior?->titular?->fecha_adquisicion;
            }
        } else {
            $this->condtitular = "05";
        }

        $this->clasificacion = $fichaanterior?->fichaindividual?->clasificacion;
        $this->cont_en = $fichaanterior?->fichaindividual?->cont_en;
        $this->codi_uso = $fichaanterior?->fichaindividual?->codi_uso;
        $this->zonificacion = "";
        $this->area_declarada = $fichaanterior?->fichaindividual?->area_declarada;
        $this->area_verificada1 = $fichaanterior?->fichaindividual?->area_verificada;
        if ($fichaanterior?->lindero != "") {
            $this->fren_campo = $fichaanterior?->lindero?->fren_campo;
            $this->dere_campo = $fichaanterior?->lindero?->dere_campo;
            $this->izqu_campo = $fichaanterior?->lindero?->izqu_campo;
            $this->fond_campo = $fichaanterior?->lindero?->fond_campo;
            $this->fren_colinda_campo = $fichaanterior?->lindero?->fren_colinda_campo;
            $this->dere_colinda_campo = $fichaanterior?->lindero?->dere_colinda_campo;
            $this->izqu_colinda_campo = $fichaanterior?->lindero?->izqu_colinda_campo;
            $this->fond_colinda_campo = $fichaanterior?->lindero?->fond_colinda_campo;
        }


        if ($fichaanterior?->serviciobasico?->luz == 1) {
            $this->luz = "on";
        }
        if ($fichaanterior?->serviciobasico?->agua == 1) {
            $this->agua = "on";
        }
        if ($fichaanterior?->serviciobasico?->telefono == 1) {
            $this->telefono = "on";
        }
        if ($fichaanterior?->serviciobasico?->desague == 1) {
            $this->desague = "on";
        }
        if ($fichaanterior?->serviciobasico?->gas == 1) {
            $this->gas = "on";
        }
        if ($fichaanterior?->serviciobasico?->internet == 1) {
            $this->internet = "on";
        }
        if ($fichaanterior?->serviciobasico?->tvcable == 1) {
            $this->tvcable = "on";
        }


        if ($fichaanterior?->construccions != "") {
            $this->cont2 = count($fichaanterior?->construccions);

            foreach ($fichaanterior?->construccions as $i => $construccion) {
                $this->bloque[$i] = $construccion?->bloque;
                $this->num_piso[$i] = $construccion?->nume_piso;
                if ($construccion?->fecha != "1969-12-31") {
                    $this->fecha[$i] = $construccion?->fecha;
                }
                $this->mep[$i] = $construccion?->mep;
                $this->ecs[$i] = $construccion?->ecs;
                $this->ecc[$i] = $construccion?->ecc;
                $this->estr_muro_col[$i] = $construccion?->estr_muro_col;
                $this->estr_techo[$i] = $construccion?->estr_techo;
                $this->acab_piso[$i] = $construccion?->acab_piso;
                $this->acab_puerta_ven[$i] = $construccion?->acab_puerta_ven;
                $this->acab_revest[$i] = $construccion?->acab_revest;
                $this->acab_bano[$i] = $construccion?->acab_bano;
                $this->inst_elect_sanita[$i] = $construccion?->inst_elect_sanita;
                $this->area_verificada[$i] = $construccion?->area_verificada;
                $this->uca[$i] = $construccion?->uca;
            }
        }

        if ($fichaanterior?->instalacions != "") {
            $this->cont3 = count($fichaanterior?->instalacions);

            foreach ($fichaanterior?->instalacions as $i => $instalacion) {
                $this->codi_instalacion[$i] = $instalacion?->codi_instalacion;

                $fechaFormateada = Carbon::parse($instalacion?->fecha)->format('Y-m');

                $this->inst_fecha[$i] = $fechaFormateada;


                $this->inst_mep[$i] = $instalacion?->mep;
                $this->inst_ecs[$i] = $instalacion?->ecs;
                $this->inst_ecc[$i] = $instalacion?->ecc;
                $this->inst_prod_total[$i] = $instalacion?->prod_total;
                $this->inst_uni_med[$i] = $instalacion?->uni_med;
                $this->inst_uca[$i] = $instalacion?->uca;
            }
        }

        if ($fichaanterior?->documento_adjuntos != "") {
            $this->cont4 = count($fichaanterior?->documento_adjuntos);

            foreach ($fichaanterior?->documento_adjuntos as $i => $documento) {
                $this->tipo_dococumento[$i] = $documento?->tipo_doc;
                $this->nume_documento[$i] = $documento?->nume_doc;
                if ($documento?->fecha_doc != "1969-12-31") {
                    $this->fecha_dococumento[$i] = $documento?->fecha_doc;
                }
                $this->area_autorizadadocumento[$i] = $documento?->area_autorizada;
            }
        }

        $this->porc_bc_terr_legal = $fichaanterior?->fichaindividual?->porc_bc_terr_legal;
        $this->porc_bc_const_legal = $fichaanterior?->fichaindividual?->porc_bc_const_legal;
        $this->porc_bc_terr_fisc = $fichaanterior?->fichaindividual?->porc_bc_terr_fisc;
        $this->porc_bc_const_fisc = $fichaanterior?->fichaindividual?->porc_bc_const_fisc;

        if ($fichaanterior?->sunarp != "") {
            $this->tipo_partida = $fichaanterior?->sunarp?->tipo_partida;
            $this->nume_partida = $fichaanterior?->sunarp?->nume_partida;
            $this->fojas = $fichaanterior?->sunarp?->fojas;
            $this->asiento = $fichaanterior?->sunarp?->asiento;
            if ($fichaanterior?->sunarp?->fecha_inscripcion != "1969-12-31") {
                $this->fecha_inscripcion = $fichaanterior?->sunarp?->fecha_inscripcion;
            }

            $this->codi_decla_fabrica = $fichaanterior?->sunarp?->codi_decla_fabrica;
            $this->asie_fabrica = $fichaanterior?->sunarp?->asie_fabrica;
            if ($fichaanterior?->sunarp?->fecha_fabrica != "1969-12-31") {
                $this->fecha_fabrica = $fichaanterior?->sunarp?->fecha_fabrica;
            }
        }





        $this->en_colindante = $fichaanterior?->fichaindividual?->en_colindante;
        $this->en_area_publica = $fichaanterior?->fichaindividual?->en_area_publica;
        $this->en_jardin_aislamiento = $fichaanterior?->fichaindividual?->en_jardin_aislamiento;
        $this->en_area_intangible = $fichaanterior?->fichaindividual?->en_area_intangible;

        $this->cond_declarante = $fichaanterior?->fichaindividual?->cond_declarante;
        $this->esta_llenado = $fichaanterior?->fichaindividual?->esta_llenado;
        $this->nume_habitantes = $fichaanterior?->fichaindividual?->nume_habitantes;
        $this->nume_familias = $fichaanterior?->fichaindividual?->nume_familias;
        $this->mantenimiento = $fichaanterior?->fichaindividual?->mantenimiento;

        if ($fichaanterior?->litigantes != "") {
            $this->cont5 = count($fichaanterior?->litigantes);

            foreach ($fichaanterior?->documento_adjuntos as $i => $documento) {
                $this->tipolitigante[$i] = $documento?->tipo_doc;
                $this->numedoc[$i] = $documento?->nume_doc;
                $this->codi_contribuye[$i] = $documento?->codi_contribuye;
                $this->nombres[$i] = $documento?->nombres;
                $this->ape_materno[$i] = $documento?->ape_paterno;
                $this->ape_paterno[$i] = $documento?->ape_materno;
            }
        }


        $this->observacion = $fichaanterior?->fichaindividual?->observaciones;
        if ($fichaanterior?->declarante != "") {
            $this->numdocumentodeclarante = $fichaanterior?->declarante?->nume_doc;
            $this->nombres_declarante = $fichaanterior?->declarante?->nombres;
            $this->apellido_paterno_declarante = $fichaanterior?->declarante?->ape_paterno;
            $this->apellido_materno_declarante = $fichaanterior?->declarante?->ape_materno;
        }
        if ($fichaanterior?->fecha_declarante != "1969-12-31") {
            $this->fecha_declarante = $fichaanterior?->fecha_declarante;
        }

        if ($fichaanterior?->supervisor != "") {
            $this->supervisor = $fichaanterior?->supervisor?->id_persona;
        }
        if ($fichaanterior?->fecha_supervision != "1969-12-31") {
            $this->fecha_supervision = $fichaanterior?->fecha_supervision;
        }

        if ($fichaanterior?->tecnico != "") {
            $this->tecnico = $fichaanterior?->tecnico?->id_persona;
        }

        if ($fichaanterior?->fecha_levantamiento != "1969-12-31") {
            $this->fecha_levantamiento = $fichaanterior?->fecha_levantamiento;
        }

        if ($fichaanterior?->verificador != "") {
            $this->verificador = $fichaanterior?->verificador?->id_persona;
        }
        $this->nume_registro = $fichaanterior?->nume_registro;
        if ($fichaanterior?->fecha_verificacion != "1969-12-31") {
            $this->fecha_verificacion = $fichaanterior?->fecha_verificacion;
        }


        $this->fichaanterior = $fichaanterior;

        $this->usos = Uso::all();
        $this->tecnicos = Persona::where('tipo_funcion', 3)?->get();
        $this->supervisores = Persona::where('tipo_funcion', 2)?->get();
        $this->verificadores = Persona::where('tipo_funcion', 4)?->get();
        $this->sectores = Sectore::all();
        $this->hab_urbanas = HabUrbana::all();
        $this->codigosinstalacion = CodigoInstalacion::all();
        $this->departamentos = Ubiges::where('cod_pro', '00')?->where('codi_dis', '00')?->get();
        $this->provincias = Ubiges::where('cod_pro', '!=', '00')?->where('codi_dis', '00')?->get();
        $this->distritos = Ubiges::where('codi_dis', '!=', '00')?->get();
        $this->manzanas = Manzana::orderBy('codi_mzna')->get();
        
        $this->vias = Via::all();
    }
    /* EMPIEZA CÓDIGO REFERENCIAL */
    public function updatedsector($id_sector)
    {
        $this->mostrardc();
        $this->dc = ($this->dpto + $this->prov + $this->dist + $this->sector + $this->mzna + $this->lote + $this->edifica + $this->entrada + $this->piso + $this->unidad) % 9;
    }


    public function updatedunidad()
    {
        $this->mostrardc();
        $this->dc = ($this->dpto + $this->prov + $this->dist + $this->sector + $this->mzna + $this->lote + $this->edifica + $this->entrada + $this->piso + $this->unidad) % 9;
    }

    public function mostrardc()
    {
        if ($this->sector == "") {
            $this->sector = 01;
        }
        if ($this->mzna == "") {
            $this->mzna = 01;
        }
        if ($this->lote == "") {
            $this->lote = 01;
        }
        if ($this->edifica == "") {
            $this->edifica = 01;
        }
        if ($this->entrada == "") {
            $this->entrada = 01;
        }
        if ($this->piso == "") {
            $this->piso = 01;
        }
        if ($this->unidad == "") {
            $this->unidad = 01;
        }
    }

    public function updatedpiso()
    {
        $this->mostrardc();
        $this->dc = ($this->dpto + $this->prov + $this->dist + $this->sector + $this->mzna + $this->lote + $this->edifica + $this->entrada + $this->piso + $this->unidad) % 9;
    }

    public function updatedentrada()
    {
        $this->mostrardc();
        $this->dc = ($this->dpto + $this->prov + $this->dist + $this->sector + $this->mzna + $this->lote + $this->edifica + $this->entrada + $this->piso + $this->unidad) % 9;
    }

    public function updatededifica()
    {
        $this->mostrardc();
        $this->dc = ($this->dpto + $this->prov + $this->dist + $this->sector + $this->mzna + $this->lote + $this->edifica + $this->entrada + $this->piso + $this->unidad) % 9;
    }

    public function updatedlote()
    {
        $this->mostrardc();
        $this->dc = ($this->dpto + $this->prov + $this->dist + $this->sector + $this->mzna + $this->lote + $this->edifica + $this->entrada + $this->piso + $this->unidad) % 9;
    }

    public function updatedmzna()
    {
        $this->mostrardc();
        $this->dc = ($this->dpto + $this->prov + $this->dist + $this->sector + $this->mzna + $this->lote + $this->edifica + $this->entrada + $this->piso + $this->unidad) % 9;
    }

    /* TERMINA CÓDIGO REFERENCIAL */

    /* UBICACION DEL PREDIO */
    public function updatedtipoHabi($id)
    {
        $idbuscar = str_pad($id, 10, '0', STR_PAD_LEFT);
        $this->hab_urbana2 = HabUrbana::where('id_hab_urba', $idbuscar)->first();
        for ($i = 0; $i < $this->cont; $i++) {
            $this->tipoVianombre[$i] = "";
            $this->tipoViatipo[$i] = "";
        }
        if ($this->hab_urbana2 == "") {
            $this->nomb_hab_urba = "";
        } else {
            $this->nomb_hab_urba = $this->hab_urbana2->nomb_hab_urba;
        }
    }


    public function updatedtipoVia($value, $nested)
    {
        $idbuscar = str_pad($value, 12, '0', STR_PAD_LEFT);
        $this->via2 = Via::where('id_via', $idbuscar)->first();
        if ($this->via2 == "") {
            $this->tipoVianombre[$nested] = "";
            $this->tipoViatipo[$nested] = "";
        } else {
            $this->tipoVianombre[$nested] = $this->via2->nomb_via;
            $this->tipoViatipo[$nested] = $this->via2->tipo_via;
        }
    }

    public function aumentarUbicacion()
    {
        $this->tipoViatipo[$this->cont] = "";
        $this->tipoVianombre[$this->cont] = "";
        $this->cont++;
    }

    public function reducirUbicacion()
    {

        if ($this->cont > 0) {
            $this->cont--;
            array_splice($this->tipoVia, $this->cont);
            array_splice($this->tipopuerta, $this->cont);
            array_splice($this->nume_muni, $this->cont);
            array_splice($this->cond_nume, $this->cont);
        }
    }

    /* UBICACION DEL PREDIO */

    /* IDENTIFICACION TITULAR */

    public function updatednumedoc1()
    {
        if ($this->tipo_doc1 == "02") {
            $dni = $this->numedoc1;
            $token = config('services.apisunat.token');
            $urldni = config('services.apisunat.urldni');
            $response = Http::withHeaders([
                'Referer' => 'http://apis.net.pe/api-ruc',
                'Authorization' => 'Bearer ' . $token
            ])->get($urldni . $dni);

            $persona = ($response->json());
            if (isset($persona['error']) || $persona == "") {
                $this->nombres1 = "";
                $this->ape_paterno1 = "";
                $this->ape_materno1 = "";
                $this->numedoc1 = $dni;

                if (isset($persona['error'])) {
                    session()->flash('success', 'Se necesita 8 digitos');
                }
                if ($persona == "") {
                    session()->flash('success', 'No se encontro datos');
                }
            } else {
                $this->nombres1 = $persona['nombres'];
                $this->ape_paterno1 = $persona['apellidoPaterno'];
                $this->ape_materno1 = $persona['apellidoMaterno'];
                $this->numedoc1 = $dni;
            }
        }
    }

    public function updatednumedoc2()
    {
        if ($this->tipo_doc2 == "02") {
            $dni = $this->numedoc2;
            $token = config('services.apisunat.token');
            $urldni = config('services.apisunat.urldni');
            $response = Http::withHeaders([
                'Referer' => 'http://apis.net.pe/api-ruc',
                'Authorization' => 'Bearer ' . $token
            ])->get($urldni . $dni);

            $persona = ($response->json());
            if (isset($persona['error']) || $persona == "") {
                $this->nombres2 = "";
                $this->ape_paterno2 = "";
                $this->ape_materno2 = "";
                $this->numedoc2 = $dni;
                if (isset($persona['error'])) {
                    session()->flash('danger', 'Se necesita 8 digitos');
                }
                if ($persona == "") {
                    session()->flash('danger', 'No se encontro datos');
                }
            } else {
                $this->nombres2 = $persona['nombres'];
                $this->ape_paterno2 = $persona['apellidoPaterno'];
                $this->ape_materno2 = $persona['apellidoMaterno'];
                $this->numedoc2 = $dni;
            }
        }
    }

    public function updatednumedoc3()
    {

        if ($this->tipoTitular == 2) {
            $ruc = $this->numedoc3;
            $token = config('services.apisunat.token');
            $urlruc = config('services.apisunat.urlruc');
            $response = Http::withHeaders([
                'Referer' => 'http://apis.net.pe/api-ruc',
                'Authorization' => 'Bearer ' . $token
            ])->get($urlruc . $ruc);

            $persona = ($response->json());
            if ($persona == "" || isset($persona['error'])) {
                $this->razon_social = "";
                $this->numedoc3 = $ruc;
                if ($persona['error'] == "RUC invalido") {
                    session()->flash('warning', 'RUC invalido');
                }
                if ($persona['error'] == "RUC debe contener 11 digitos") {
                    session()->flash('warning', 'RUC debe contener 11 digitos');
                }
            } else {
                $this->razon_social = $persona['nombre'];
                $this->numedoc3 = $ruc;
            }
        }
    }

    /* IDENTIFICACION TITULAR */

    /* DOMILICIO TITULAR */
    /* DOMICILIO TITULAR */
    /* CONSTRUCCIONES */

    public function aumentarConstruccion()
    {
        $this->cont2++;
    }

    public function reducirConstruccion()
    {

        if ($this->cont2 > 0) {
            $this->cont2--;
            array_splice($this->bloque, $this->cont2);
            array_splice($this->num_piso, $this->cont2);
            array_splice($this->fecha, $this->cont2);
            array_splice($this->mep, $this->cont2);
            array_splice($this->ecs, $this->cont2);
            array_splice($this->ecc, $this->cont2);
            array_splice($this->estr_muro_col, $this->cont2);
            array_splice($this->estr_techo, $this->cont2);
            array_splice($this->acab_piso, $this->cont2);
            array_splice($this->acab_puerta_ven, $this->cont2);
            array_splice($this->acab_revest, $this->cont2);
            array_splice($this->acab_bano, $this->cont2);
            array_splice($this->inst_elect_sanita, $this->cont2);
            array_splice($this->area_verificada, $this->cont2);
            array_splice($this->uca, $this->cont2);
        }
    }

    /* CONSTRUCCIONES */

    /* OBRAS COMPLEMENTARIAS */

    public function aumentarObras()
    {
        $this->cont3++;
    }

    public function reducirObras()
    {


        if ($this->cont3 > 0) {
            $this->cont3--;
            array_splice($this->codi_instalacion, $this->cont3);
            array_splice($this->inst_fecha, $this->cont3);
            array_splice($this->inst_mep, $this->cont3);
            array_splice($this->inst_ecs, $this->cont3);
            array_splice($this->inst_ecc, $this->cont3);
            array_splice($this->inst_prod_total, $this->cont3);
            array_splice($this->inst_uni_med, $this->cont3);
            array_splice($this->inst_uca, $this->cont3);
        }
    }

    /* OBRAS COMPLEMENTARIAS */

    /* DOCUMENTOS ADJUNTOS */

    public function aumentarDocumentos()
    {
        $this->cont4++;
    }

    public function reducirDocumentos()
    {

        if ($this->cont4 > 0) {
            $this->cont4--;
            array_splice($this->tipo_dococumento, $this->cont4);
            array_splice($this->nume_documento, $this->cont4);
            array_splice($this->fecha_dococumento, $this->cont4);
            array_splice($this->area_autorizadadocumento, $this->cont4);
        }
    }
    /* DOCUMENTOS ADJUNTOS */

    /* INFORMACION COMPLEMENTARIA */

    public function updatednumedoc()
    {
        if ($this->cont5 > 0) {
            if ($this->tipolitigante[$this->cont5 - 1] == "02") {
                $dni = $this->numedoc[$this->cont5 - 1];
                $token = config('services.apisunat.token');
                $urldni = config('services.apisunat.urldni');
                $response = Http::withHeaders([
                    'Referer' => 'http://apis.net.pe/api-ruc',
                    'Authorization' => 'Bearer ' . $token
                ])->get($urldni . $dni);

                $persona = ($response->json());
                if (isset($persona['error']) || $persona == "") {
                    $this->nombres[$this->cont5 - 1] = "";
                    $this->ape_paterno[$this->cont5 - 1] = "";
                    $this->ape_materno[$this->cont5 - 1] = "";
                    $this->numedoc[$this->cont5 - 1] = $dni;
                    if (isset($persona['error'])) {
                        session()->flash('info.' . $this->cont5 - 1, 'Se necesita 8 digitos');
                    }
                    if ($persona == "") {
                        session()->flash('info.' . $this->cont5 - 1, 'No se encontro datos');
                    }
                } else {
                    $this->nombres[$this->cont5 - 1] = $persona['nombres'];
                    $this->ape_paterno[$this->cont5 - 1] = $persona['apellidoPaterno'];
                    $this->ape_materno[$this->cont5 - 1] = $persona['apellidoMaterno'];
                    $this->numedoc[$this->cont5 - 1] = $dni;
                }
            }
        }
    }

    public function updatedubicacionpersona($value)
    {

        if ($value == "01") {
            for ($i = 0; $i < $this->cont; $i++) {
                $this->validate([
                    'tipoVia.' . $i                     => 'required',
                    'tipopuerta.' . $i                  => 'required',
                    'nume_muni.' . $i                   => 'nullable|max:20',
                    'cond_nume.' . $i                   => 'nullable',
                ]);
            }
            $this->departamentootros = "08";
            $this->provinciaotros = "01";
            $this->distritootros = "08";

            foreach ($this->tipopuerta as $i => $tipovia) {
                if ($tipovia == "P") {
                    if (isset($this->tipoVia[$i])) {
                        if ($this->tipoVia[$i] != "") {
                            $this->codigoviaotros = str_replace('080108', '', $this->tipoVia[$i]);
                        }
                    }
                    if (isset($this->tipoViatipo[$i])) {
                        if ($this->tipoViatipo[$i] != "") {
                            $this->tipoviaotros = $this->tipoViatipo[$i];
                        }
                    }
                    if (isset($this->tipoVianombre[$i])) {
                        if ($this->tipoVianombre[$i] != "") {
                            $this->nombreviaotros = $this->tipoVianombre[$i];
                        }
                    }
                    if (isset($this->nume_muni[$i])) {
                        if ($this->nume_muni[$i] != "") {
                            $this->nmunicipalotros = $this->nume_muni[$i];
                        }
                    }
                    if ($this->nume_interior != "") {
                        $this->ninteriorotros = $this->nume_interior;
                    }
                    if ($this->tipoHabi != "") {
                        $this->codigohurbanootros = str_replace('080108', '', $this->tipoHabi);
                    }
                    if ($this->nomb_hab_urba != "") {
                        $this->nombrehhurbanaotros = $this->nomb_hab_urba;
                    }
                    if ($this->zona_dist != "") {
                        $this->zonaootros = $this->zona_dist;
                    }
                    if ($this->mzna_dist != "") {
                        $this->manzanaotros = $this->mzna_dist;
                    }
                    if ($this->lote_dist != "") {
                        $this->loteotros = $this->lote_dist;
                    }
                    if ($this->sub_lote_dist != "") {
                        $this->subloteotros = $this->sub_lote_dist;
                    }
                }
            }
        } else {
            $this->departamentootros = "";
            $this->provinciaotros = "";
            $this->distritootros = "";
            $this->codigoviaotros = "";
            $this->tipoviaotros = "";
            $this->nombreviaotros = "";
            $this->nmunicipalotros = "";
            $this->ninteriorotros = "";
            $this->codigohurbanootros = "";
            $this->nombrehhurbanaotros = "";
            $this->zonaootros = "";
            $this->manzanaotros = "";
            $this->loteotros = "";
            $this->subloteotros = "";
        }
    }

    public function aumentarinformacion()
    {
        $this->tipolitigante[$this->cont5] = "0";
        $this->numedoc[$this->cont5] = "";
        $this->cont5++;
    }

    public function reducirinformacion()
    {
        $this->cont5--;
    }

    /* INFORMACION COMPLEMENTARIA */

    /* INFORMACION FINAL*/
    public function updatednumdocumentodeclarante()
    {
        $dni = $this->numdocumentodeclarante;
        if ($dni != "") {
            $token = config('services.apisunat.token');
            $urldni = config('services.apisunat.urldni');
            $response = Http::withHeaders([
                'Referer' => 'http://apis.net.pe/api-ruc',
                'Authorization' => 'Bearer ' . $token
            ])->get($urldni . $dni);

            $persona = ($response->json());

            if (isset($persona['error']) || $persona == "") {
                $this->nombres_declarante = "";
                $this->apellido_paterno_declarante = "";
                $this->apellido_materno_declarante = "";
                $this->numdocumentodeclarante = $dni;
                if (isset($persona['error'])) {
                    session()->flash('dark', 'Se necesita 8 digitos');
                }
                if ($persona == "") {
                    session()->flash('dark', 'No se encontro datos');
                }
            } else {
                $this->nombres_declarante = $persona['nombres'];
                $this->apellido_paterno_declarante = $persona['apellidoPaterno'];
                $this->apellido_materno_declarante = $persona['apellidoMaterno'];
                $this->numdocumentodeclarante = $dni;
            }
        }
    }
    /* INFORMACION FINAL*/


    public function register()
    {
        try {
            DB::beginTransaction();
            $ubigeo = Institucion::first();
            /*VALIDACIONES*/
            $id = $this->fichaanterior->fichaindividual->id_ficha;
            if ($this->condtitular != "05") {
                $this->validate([
                    'nume_ficha'                    => [
                        'required',
                        'max:7',
                        Rule::unique('tf_fichas_individuales', 'nume_ficha')->ignore($id, 'id_ficha')
                    ],
                    'nume_ficha_lote'               => 'required|max:4',
                    'nume_ficha_lote2'              => 'required|max:5',
                    'cuc'                           => 'nullable|max:12',
                    'sector'                        => 'required',
                    'mzna'                          => 'required',
                    'lote'                          => 'required|max:3',
                    'edifica'                       => 'required|max:2',
                    'entrada'                       => 'required|max:2',
                    'piso'                          => 'required|max:2',
                    'unidad'                        => 'required|max:3',
                    'codi_cont_rentas'              => 'nullable|max:15',
                    'codi_pred_rentas'              => 'nullable|max:15',
                    'tipoHabi'                      => 'required',
                    'zona_dist'                     => 'nullable|max:30',
                    'mzna_dist'                     => 'nullable|max:15',
                    'lote_dist'                     => 'nullable|max:5',
                    'sub_lote_dist'                 => 'nullable|max:6',

                    'tipo_edificacion'              => 'nullable',
                    'tipo_interior'                 => 'nullable',
                    'nume_interior'                 => 'nullable|max:15',
                    'condtitular'                  => 'required',
                    'form_adquisicion'              => 'nullable',
                    'fecha_adquisicion'             => 'nullable',


                    'ubicacionpersona'              => 'required',
                    'departamentootros'             => 'required',
                    'provinciaotros'                => 'required',
                    'distritootros'                 => 'required',
                    'codigoviaotros'                => 'nullable|max:6',
                    'tipoviaotros'                  => 'nullable|max:5',
                    'nombreviaotros'                => 'nullable|max:100',
                    'nmunicipalotros'               => 'nullable|max:6',
                    'ninteriorotros'                => 'nullable|max:5',
                    'codigohurbanootros'            => 'nullable|max:4',
                    'nombrehhurbanaotros'           => 'nullable|max:100',
                    'zonaootros'                    => 'nullable|max:50',
                    'manzanaotros'                  => 'nullable|max:5',
                    'loteotros'                     => 'nullable|max:5',
                    'subloteotros'                  => 'nullable|max:5',
                    'telefonodomicilio'             => 'nullable|max:10',
                    'anexodomicilio'                => 'nullable|max:5',
                    'emaildomicilio'                => 'nullable|max:100',
                    'clasificacion'                 => 'required',
                    'cont_en'                       => 'required',
                    'codi_uso'                      => 'required',
                    'zonificacion'                  => 'nullable|max:100',
                    'area_declarada'                => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                    'area_verificada1'              => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                    'fren_campo'                    => 'nullable|max:200',
                    'dere_campo'                    => 'nullable|max:200',
                    'izqu_campo'                    => 'nullable|max:200',
                    'fond_campo'                    => 'nullable|max:200',
                    'fren_colinda_campo'            => 'nullable|max:200',
                    'dere_colinda_campo'            => 'nullable|max:200',
                    'izqu_colinda_campo'            => 'nullable|max:200',
                    'fond_colinda_campo'            => 'nullable|max:200',

                    'porc_bc_terr_legal'            => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                    'porc_bc_const_legal'           => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                    'porc_bc_terr_fisc'             => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                    'porc_bc_const_fisc'            => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',



                    'tipo_partida'                  => 'nullable',
                    'nume_partida'                  => 'nullable|max:18',
                    'fojas'                         => 'nullable|max:18',
                    'asiento'                       => 'nullable|max:18',
                    'fecha_inscripcion'             => 'nullable|date',
                    'codi_decla_fabrica'            => 'nullable',
                    'asie_fabrica'                  => 'nullable|max:18',
                    'fecha_fabrica'                 => 'nullable|date',
                    'en_colindante'                 => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                    'en_area_publica'               => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                    'en_jardin_aislamiento'         => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                    'en_area_intangible'            => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',

                    'cond_declarante'               => 'nullable',
                    'esta_llenado'                  => 'required',
                    'nume_habitantes'               => 'nullable|numeric|min:0',
                    'nume_familias'                 => 'nullable|numeric|min:0',

                    'mantenimiento'                 => 'nullable',
                    'observacion'                   => 'nullable|max:1000',

                    'numdocumentodeclarante'        => 'nullable|max:8',
                    'nombres_declarante'            => 'nullable|max:150',
                    'apellido_paterno_declarante'   => 'nullable|max:50',
                    'apellido_materno_declarante'   => 'nullable|max:50',
                    'fecha_declarante'              => 'nullable|date',
                    'supervisor'                    => 'nullable',
                    'fecha_supervision'             => 'nullable|date',
                    'tecnico'                       => 'required',
                    'fecha_levantamiento'           => 'required|date|before_or_equal:today',
                    'verificador'                   => 'nullable',
                    'nume_registro'                 => 'nullable|max:10',
                    'fecha_verificacion'            => 'nullable|date',
                ]);
            } else {
                $this->validate([
                    'nume_ficha'                    => [
                        'required',
                        'max:7',
                        Rule::unique('tf_fichas_individuales', 'nume_ficha')->ignore($id, 'id_ficha')
                    ],
                    'nume_ficha_lote'               => 'required|max:4',
                    'nume_ficha_lote2'              => 'nullable|max:5',
                    'cuc'                           => 'nullable|max:12',
                    'sector'                        => 'required',
                    'mzna'                          => 'required',
                    'lote'                          => 'required|max:3',
                    'edifica'                       => 'required|max:2',
                    'entrada'                       => 'required|max:2',
                    'piso'                          => 'required|max:2',
                    'unidad'                        => 'required|max:3',
                    'codi_cont_rentas'              => 'nullable|max:15',
                    'codi_pred_rentas'              => 'nullable|max:15',
                    'tipoHabi'                      => 'required',
                    'zona_dist'                     => 'nullable|max:30',
                    'mzna_dist'                     => 'nullable|max:15',
                    'lote_dist'                     => 'nullable|max:5',
                    'sub_lote_dist'                 => 'nullable|max:6',

                    'tipo_edificacion'              => 'nullable',
                    'tipo_interior'                 => 'nullable',
                    'nume_interior'                 => 'nullable|max:15',
                    'condtitular'                  => 'required',
                    'form_adquisicion'              => 'nullable',
                    'fecha_adquisicion'             => 'nullable',

                    'clasificacion'                 => 'required',
                    'cont_en'                       => 'required',
                    'codi_uso'                      => 'required',
                    'zonificacion'                  => 'nullable|max:100',
                    'area_declarada'                => 'nullable|max:20',
                    'area_verificada1'              => 'nullable|max:20',
                    'fren_campo'                    => 'nullable|max:200',
                    'dere_campo'                    => 'nullable|max:200',
                    'izqu_campo'                    => 'nullable|max:200',
                    'fond_campo'                    => 'nullable|max:200',
                    'fren_colinda_campo'            => 'nullable|max:200',
                    'dere_colinda_campo'            => 'nullable|max:200',
                    'izqu_colinda_campo'            => 'nullable|max:200',
                    'fond_colinda_campo'            => 'nullable|max:200',

                    'porc_bc_terr_legal'            => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                    'porc_bc_const_legal'           => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                    'porc_bc_terr_fisc'             => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                    'porc_bc_const_fisc'            => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',



                    'tipo_partida'                  => 'nullable',
                    'nume_partida'                  => 'nullable|max:18',
                    'fojas'                         => 'nullable|max:18',
                    'asiento'                       => 'nullable|max:18',
                    'fecha_inscripcion'             => 'nullable|date',
                    'codi_decla_fabrica'            => 'nullable',
                    'asie_fabrica'                  => 'nullable|max:18',
                    'fecha_fabrica'                 => 'nullable|date',
                    'en_colindante'                 => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                    'en_area_publica'               => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                    'en_jardin_aislamiento'         => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                    'en_area_intangible'            => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',

                    'cond_declarante'               => 'nullable',
                    'esta_llenado'                  => 'required',
                    'nume_habitantes'               => 'nullable|numeric|min:0',
                    'nume_familias'                 => 'nullable|numeric|min:0',
                    'mantenimiento'                 => 'nullable',

                    'observacion'                 => 'nullable|max:1000',

                    'numdocumentodeclarante'        => 'nullable|max:8',
                    'nombres_declarante'            => 'nullable|max:150',
                    'apellido_paterno_declarante'   => 'nullable|max:50',
                    'apellido_materno_declarante'   => 'nullable|max:50',
                    'fecha_declarante'              => 'nullable|date',
                    'supervisor'                    => 'nullable',
                    'fecha_supervision'             => 'nullable|date',
                    'tecnico'                       => 'required',
                    'fecha_levantamiento'           => 'required|date|before_or_equal:today',
                    'verificador'                   => 'nullable',
                    'nume_registro'                 => 'nullable|max:10',
                    'fecha_verificacion'            => 'nullable|date',
                ]);
            }


            for ($i = 0; $i < $this->cont; $i++) {
                $this->validate([
                    'tipoVia.' . $i                     => 'required',
                    'tipopuerta.' . $i                  => 'required',
                    'nume_muni.' . $i                   => 'nullable|max:20',
                    'cond_nume.' . $i                   => 'nullable',
                ]);
            }

            for ($i = 0; $i < $this->cont2; $i++) {
                $this->validate([
                    'num_piso.' . $i                    => 'required|max:2',
                    'fecha.' . $i                       => 'nullable',
                    'mep.' . $i                         => 'nullable',
                    'ecs.' . $i                         => 'nullable',
                    'ecc.' . $i                         => 'nullable',
                    'estr_muro_col.' . $i               => 'nullable|max:1',
                    'estr_techo.' . $i                  => 'nullable|max:1',
                    'acab_piso.' . $i                   => 'nullable|max:1',
                    'acab_puerta_ven.' . $i             => 'nullable|max:1',
                    'acab_revest.' . $i                 => 'nullable|max:1',
                    'acab_bano.' . $i                   => 'nullable|max:1',
                    'inst_elect_sanita.' . $i           => 'nullable|max:1',
                    'area_verificada.' . $i             => 'nullable|numeric|regex:/^[\d]{0,8}(\.[\d]{1,2})?$/',
                    'uca.' . $i                         => 'nullable',
                ]);
            }


            for ($i = 0; $i < $this->cont3; $i++) {
                $this->validate([
                    'codi_instalacion.' . $i            => 'required',
                    'inst_fecha.' . $i                  => 'nullable|date',
                    'inst_mep.' . $i                    => 'nullable',
                    'inst_ecs.' . $i                    => 'nullable',
                    'inst_ecc.' . $i                    => 'nullable',
                    'inst_prod_total.' . $i             => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                    'inst_uni_med.' . $i                => 'nullable|max:2',
                    'inst_uca.' . $i                    => 'nullable',
                ]);
            }


            for ($i = 0; $i < $this->cont4; $i++) {
                $this->validate([
                    'tipo_dococumento.' . $i            => 'required',
                    'nume_documento.' . $i              => 'nullable|max:20',
                    'fecha_dococumento.' . $i           => 'nullable',
                    'area_autorizadadocumento.' . $i    => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                ]);
            }

            for ($i = 0; $i < $this->cont5; $i++) {
                $this->validate([
                    'tipolitigante.' . $i               => 'required',
                    'numedoc.' . $i                     => 'required|max:17',
                    'nombres.' . $i                     => 'required|max:150',
                    'ape_paterno.' . $i                 => 'nullable|max:50',
                    'ape_materno.' . $i                 => 'nullable|max:50',
                    'codi_contribuye.' . $i             => 'nullable|max:18',
                ]);
            }

            $mytime = Carbon::now('America/Lima');

            $date = $mytime->format('Y');

            foreach ($this->fichaanterior->litigantes as $litigante) {
                $litigante->delete();
            }
            if ($this->fichaanterior->sunarp != "") {
                $this->fichaanterior->sunarp->delete();
            }

            foreach ($this->fichaanterior->documento_adjuntos as $documento) {
                $documento->delete();
            }
            foreach ($this->fichaanterior->instalacions as $instalacion) {
                $instalacion->delete();
            }
            foreach ($this->fichaanterior->construccions as $construccion) {
                $construccion->delete();
            }
            if ($this->fichaanterior->serviciobasico != "") {
                $this->fichaanterior->serviciobasico->delete();
            }

            if ($this->fichaanterior->lindero != "") {
                $this->fichaanterior->lindero->delete();
            }
            if ($this->fichaanterior->fichaindividual != "") {
                $this->fichaanterior->fichaindividual->delete();
            }


            if ($this->fichaanterior->domiciliotitular != "") {
                $this->fichaanterior->domiciliotitular->delete();
            }

            foreach ($this->fichaanterior->exoneraciontitulars as $exo) {
                $exo->delete();
            }

            foreach ($this->fichaanterior->titulars as $titular) {
                $titular->delete();
            }

            foreach ($this->fichaanterior->puertas as $puerta) {
                $puerta->fichas()->detach($this->fichaanterior->id_ficha);
                $puerta->via->hab_urbanas()->detach($this->fichaanterior->lote->id_hab_urba);
            }
            $fechaanterior = $this->fichaanterior->fecha_grabado;
            $usuario = $this->fichaanterior->id_usuario;
            $this->fichaanterior->delete();



            $sectorbuscar = str_pad($ubigeo->id_institucion, 6, '0', STR_PAD_LEFT) . '' . str_pad($this->sector, 2, '0', STR_PAD_LEFT);

            $sectorencontrar = Sectore::where('id_sector', $sectorbuscar)->first();
            if ($sectorencontrar != "") {
                $sector = $sectorencontrar;
            } else {
                $sector = new Sectore();
                $sector->id_sector = str_pad($ubigeo->id_institucion, 6, '0', STR_PAD_LEFT) . '' . str_pad($this->sector, 2, '0', STR_PAD_LEFT);
                $sector->id_ubi_geo = str_pad($ubigeo->id_institucion, 6, '0', STR_PAD_LEFT);
                $sector->codi_sector = str_pad($this->sector, 2, '0', STR_PAD_LEFT);
                $sector->nomb_sector = "SECTOR " . str_pad($this->sector, 2, '0', STR_PAD_LEFT);
                $sector->estado = 1;
                $sector->save();
            }

            $mznabuscar = str_pad($ubigeo->id_institucion, 6, '0', STR_PAD_LEFT) . '' . str_pad($this->sector, 2, '0', STR_PAD_LEFT) . '' . str_pad($this->mzna, 3, '0', STR_PAD_LEFT);

            $mznaencontrar = Manzana::where('id_mzna', $mznabuscar)->first();
            if ($mznaencontrar != "") {
                $mzna = $mznaencontrar;
            } else {
                $mzna = new Manzana();
                $mzna->id_mzna = str_pad($ubigeo->id_institucion, 6, '0', STR_PAD_LEFT) . '' . str_pad($this->sector, 2, '0', STR_PAD_LEFT) . '' . str_pad($this->mzna, 3, '0', STR_PAD_LEFT);
                $mzna->id_sector = str_pad($ubigeo->id_institucion, 6, '0', STR_PAD_LEFT) . '' . str_pad($this->sector, 2, '0', STR_PAD_LEFT);
                $mzna->codi_mzna = str_pad($this->mzna, 3, '0', STR_PAD_LEFT);
                $mzna->nume_mzna = str_pad($this->mzna, 3, '0', STR_PAD_LEFT);
                $mzna->estado = 1;
                $mzna->save();
            }

            $lotebuscar = str_pad($ubigeo->id_institucion, 6, '0', STR_PAD_LEFT) . '' . str_pad($this->sector, 2, '0', STR_PAD_LEFT) . '' . str_pad($this->mzna, 3, '0', STR_PAD_LEFT) . '' . str_pad($this->lote, 3, '0', STR_PAD_LEFT);

            $loteencontrar = Lote::where('id_lote', $lotebuscar)->first();
            if ($loteencontrar != "") {
                $lote = $loteencontrar;
                $lote->codi_lote = str_pad($this->lote, 3, '0', STR_PAD_LEFT);
                $lote->id_hab_urba = $this->tipoHabi;
                $lote->mzna_dist = strtoupper($this->mzna_dist);
                $lote->lote_dist = $this->lote_dist;
                $lote->sub_lote_dist = $this->sub_lote_dist;
                $lote->zona_dist = $this->zona_dist;
                $lote->zonificacion = $this->zonificacion;
                $lote->save();
            } else {
                $lote = new Lote();
                $lote->id_lote = str_pad($ubigeo->id_institucion, 6, '0', STR_PAD_LEFT) . '' . str_pad($this->sector, 2, '0', STR_PAD_LEFT) . '' . str_pad($this->mzna, 3, '0', STR_PAD_LEFT) . '' . str_pad($this->lote, 3, '0', STR_PAD_LEFT);
                $lote->id_mzna = str_pad($ubigeo->id_institucion, 6, '0', STR_PAD_LEFT) . '' . str_pad($this->sector, 2, '0', STR_PAD_LEFT) . '' . str_pad($this->mzna, 3, '0', STR_PAD_LEFT);
                $lote->codi_lote = str_pad($this->lote, 3, '0', STR_PAD_LEFT);
                $lote->id_hab_urba = $this->tipoHabi;
                $lote->mzna_dist = strtoupper($this->mzna_dist);
                $lote->lote_dist = $this->lote_dist;
                $lote->sub_lote_dist = $this->sub_lote_dist;
                $lote->zona_dist = $this->zona_dist;
                $lote->zonificacion = $this->zonificacion;
                $lote->save();
            }

            $edificacionbuscar = str_pad($lote->id_lote, 14, '0', STR_PAD_LEFT) . '' . str_pad($this->edifica, 2, '0', STR_PAD_LEFT);

            $edificacionencontrar = Edificaciones::where('id_edificacion', $edificacionbuscar)->first();
            if ($edificacionencontrar != "") {
                $edificacion = $edificacionencontrar;
            } else {
                $edificacion = new Edificaciones();
                $edificacion->id_edificacion = str_pad($lote->id_lote, 14, '0', STR_PAD_LEFT) . '' . str_pad($this->edifica, 2, '0', STR_PAD_LEFT);
                $edificacion->id_lote = str_pad($lote->id_lote, 14, '0', STR_PAD_LEFT);
                $edificacion->codi_edificacion = str_pad($this->edifica, 2, '0', STR_PAD_LEFT);
                $edificacion->tipo_edificacion = $this->tipo_edificacion;
                $edificacion->clasificacion = $this->clasificacion;
                $edificacion->save();
            }

            $unicatbuscar = str_pad($edificacion->id_edificacion, 16, '0', STR_PAD_LEFT) . '' . str_pad($this->entrada, 2, '0', STR_PAD_LEFT) . '' . str_pad($this->piso, 2, '0', STR_PAD_LEFT) . '' . str_pad($this->unidad, 3, '0', STR_PAD_LEFT);
            $unicatencontrar = UniCat::where('id_uni_cat', $unicatbuscar)->first();
            if ($unicatencontrar != "") {
                $unicat = $unicatencontrar;
                $unicat->codi_entrada = str_pad($this->entrada, 2, '0', STR_PAD_LEFT);
                $unicat->codi_piso = str_pad($this->piso, 2, '0', STR_PAD_LEFT);
                $unicat->codi_unidad = str_pad($this->unidad, 3, '0', STR_PAD_LEFT);
                $unicat->tipo_interior = $this->tipo_interior;
                $unicat->cuc = str_pad($this->cuc, 12, '0', STR_PAD_LEFT);
                $unicat->codi_pred_rentas = $this->codi_pred_rentas;
                $unicat->nume_interior = $this->nume_interior;
                $unicat->codi_cont_rentas = $this->codi_cont_rentas;
                $unicat->save();
            } else {
                $unicat = new UniCat();
                $unicat->id_uni_cat = str_pad($edificacion->id_edificacion, 16, '0', STR_PAD_LEFT) . '' . str_pad($this->entrada, 2, '0', STR_PAD_LEFT) . '' . str_pad($this->piso, 2, '0', STR_PAD_LEFT) . '' . str_pad($this->unidad, 3, '0', STR_PAD_LEFT);
                $unicat->id_lote = $lote->id_lote;
                $unicat->id_edificacion = $edificacion->id_edificacion;
                $unicat->codi_entrada = str_pad($this->entrada, 2, '0', STR_PAD_LEFT);
                $unicat->codi_piso = str_pad($this->piso, 2, '0', STR_PAD_LEFT);
                $unicat->codi_unidad = str_pad($this->unidad, 3, '0', STR_PAD_LEFT);
                $unicat->tipo_interior = $this->tipo_interior;
                $unicat->cuc = str_pad($this->cuc, 12, '0', STR_PAD_LEFT);
                $unicat->codi_pred_rentas = $this->codi_pred_rentas;
                $unicat->nume_interior = $this->nume_interior;
                $unicat->codi_cont_rentas = $this->codi_cont_rentas;
                $unicat->save();
            }

            if ($this->numdocumentodeclarante != '') {
                $iddd = $this->numdocumentodeclarante . '5102';
                $buscarpersona = Persona::where('id_persona', '=', $iddd)->first();
                if ($buscarpersona != "") {
                    $declarante = $buscarpersona;
                } else {
                    $declarante = new Persona();
                    $declarante->id_persona = $this->numdocumentodeclarante . '5102';
                    $declarante->nume_doc = $this->numdocumentodeclarante;
                    $declarante->tipo_doc = "02";
                    $declarante->tipo_persona = 1;
                    $declarante->nombres = strtoupper($this->nombres_declarante);
                    $declarante->ape_paterno = strtoupper($this->apellido_paterno_declarante);
                    $declarante->ape_materno = strtoupper($this->apellido_materno_declarante);
                    $declarante->tipo_funcion = 5;
                    $declarante->save();
                }
            } else {
                $declarante = "";
            }
            $ficha = new Ficha();
            $ficha->id_ficha = $date . '' . str_pad($ubigeo->id_institucion, 6, '0', STR_PAD_LEFT) . '01' . str_pad($this->nume_ficha, 7, '0', STR_PAD_LEFT);
            $ficha->tipo_ficha = "01";
            $ficha->nume_ficha = str_pad($this->nume_ficha, 7, '0', STR_PAD_LEFT);
            $ficha->id_lote = $lote->id_lote;
            $ficha->dc = $this->dc;
            $ficha->nume_ficha_lote = $this->nume_ficha_lote . '-' . $this->nume_ficha_lote2;
            if ($declarante == "") {
            } else {
                $ficha->id_declarante = $declarante->id_persona;
            }
            if ($this->fecha_declarante == "") {
            } else {
                $ficha->fecha_declarante = $this->fecha_declarante;
            }

            if ($this->supervisor == "") {
            } else {
                $ficha->id_supervisor = $this->supervisor;
            }

            if ($this->fecha_supervision == "") {
            } else {
                $ficha->fecha_supervision = $this->fecha_supervision;
            }

            if ($this->tecnico == "") {
            } else {
                $ficha->id_tecnico = $this->tecnico;
            }

            if ($this->fecha_levantamiento == "") {
            } else {
                $ficha->fecha_levantamiento = $this->fecha_levantamiento;
            }

            if ($this->verificador == "") {
            } else {
                $ficha->id_verificador = $this->verificador;
            }

            if ($this->fecha_verificacion == "") {
            } else {
                $ficha->fecha_verificacion = $this->fecha_verificacion;
            }
            if ($this->nume_registro == "") {
            } else {
                $ficha->nume_registro = $this->nume_registro;
            }

            $ficha->id_uni_cat = $unicat->id_uni_cat;
            $ficha->id_usuario = $usuario;
            $ficha->fecha_grabado = $fechaanterior;
            $ficha->activo = 1;
            $ficha->save();


            $contpuertas = 0;
            while ($contpuertas < $this->cont) {
                $contadorpuertas = $ficha->puertas()->where('tipo_puerta', $this->tipopuerta[$contpuertas])->count() + 1;
                $buscarpuerta = $lote->id_lote . '' . $this->tipopuerta[$contpuertas] . '' . $contadorpuertas;
                $encontrarpuerta = Puerta::where('id_puerta', $buscarpuerta)->first();
                if ($encontrarpuerta != "") {
                    $puerta = $encontrarpuerta;
                    $puerta->codi_puerta = $this->tipopuerta[$contpuertas];
                    $puerta->tipo_puerta = $this->tipopuerta[$contpuertas];
                    if (isset($this->nume_muni[$contpuertas])) {
                        $puerta->nume_muni = $this->nume_muni[$contpuertas];
                    } else {
                        $puerta->nume_muni = "";
                    }
                    if (isset($this->cond_nume[$contpuertas])) {
                        $puerta->cond_nume = $this->cond_nume[$contpuertas];
                    } else {
                        $puerta->cond_nume = "";
                    }
                    $puerta->id_via = $this->tipoVia[$contpuertas];
                    $puerta->save();
                } else {
                    $puerta = new Puerta();
                    $puerta->id_puerta = $lote->id_lote . '' . $this->tipopuerta[$contpuertas] . '' . $contadorpuertas;
                    $puerta->id_lote = $lote->id_lote;
                    $puerta->codi_puerta = $this->tipopuerta[$contpuertas];
                    $puerta->tipo_puerta = $this->tipopuerta[$contpuertas];
                    if (isset($this->nume_muni[$contpuertas])) {
                        $puerta->nume_muni = $this->nume_muni[$contpuertas];
                    } else {
                        $puerta->nume_muni = "";
                    }
                    if (isset($this->cond_nume[$contpuertas])) {
                        $puerta->cond_nume = $this->cond_nume[$contpuertas];
                    } else {
                        $puerta->cond_nume = "";
                    }
                    $puerta->id_via = $this->tipoVia[$contpuertas];
                    $puerta->save();
                }

                $contpuertas++;
                $puerta->fichas()->attach(str_pad($ficha->id_ficha, 19, '0', STR_PAD_LEFT));
                $puerta->via->hab_urbanas()->attach($this->tipoHabi);
            }

            if ($this->condtitular != "05") {
                if ($this->tipoTitular == 1) {
                    $iddd = str_pad($this->numedoc1, 8, '0', STR_PAD_LEFT) . '11' . $this->tipo_doc1;
                    $buscarpersona2 = Persona::where('id_persona', $iddd)->first();
                    if ($buscarpersona2 != "") {
                        $persona = $buscarpersona2;
                        $persona->tipo_doc = $this->tipo_doc1;
                        $persona->tipo_persona = 1;
                        $persona->nombres = strtoupper($this->nombres1);
                        $persona->ape_paterno = strtoupper($this->ape_paterno1);
                        $persona->ape_materno = strtoupper($this->ape_materno1);
                        $persona->tipo_persona_juridica = $this->tipo_persona_juridica;
                        $persona->tipo_funcion = 1;
                        $persona->razon_social = strtoupper($this->razon_social);
                        $persona->save();

                        $titular = new Titular();
                        $titular->id_ficha = $ficha->id_ficha;
                        $titular->id_persona = $persona->id_persona;
                        $titular->form_adquisicion = $this->form_adquisicion;
                        if ($this->fecha_adquisicion == "") {
                        } else {
                            $titular->fecha_adquisicion = $this->fecha_adquisicion;
                        }
                        $titular->porc_cotitular = 0.00;
                        $titular->esta_civil = $this->esta_civil1;
                        $titular->telf = $this->telefonodomicilio;
                        $titular->anexo = $this->anexodomicilio;
                        $titular->email = $this->emaildomicilio;
                        $titular->nume_titular = "TITULAR N° 1";
                        $titular->cond_titular = $this->condtitular;
                        $titular->save();

                        $domicilio = new DomicilioTitular();
                        $domicilio->id_ficha = $ficha->id_ficha;
                        $domicilio->id_persona = $persona->id_persona;
                        $domicilio->codi_via = $this->codigoviaotros;
                        $domicilio->tipo_via = strtoupper($this->tipoviaotros);
                        $domicilio->nomb_via = strtoupper($this->nombreviaotros);
                        $domicilio->nume_muni = $this->nmunicipalotros;
                        $domicilio->nume_interior = $this->ninteriorotros;
                        $domicilio->codi_hab_urba = $this->codigohurbanootros;
                        $domicilio->nomb_hab_urba = $this->nombrehhurbanaotros;
                        $domicilio->sector = $this->zonaootros;
                        $domicilio->mzna = $this->manzanaotros;
                        $domicilio->lote = $this->loteotros;
                        $domicilio->sublote = $this->subloteotros;
                        $domicilio->codi_dep = $this->departamentootros;
                        $domicilio->codi_pro = $this->provinciaotros;
                        $domicilio->codi_dis = $this->distritootros;
                        $domicilio->ubicacion = $this->ubicacionpersona;
                        $domicilio->save();
                    } else {
                        $persona = new Persona();
                        if ($this->numedoc1 == "") {
                            $cantidadpersona = Persona::where('tipo_persona', 1)->count() + 1;
                            $persona->id_persona = str_pad($cantidadpersona, 8, '0', STR_PAD_LEFT) . '11' . $this->tipo_doc1;
                            $persona->nume_doc = "";
                        } else {
                            $persona->id_persona = str_pad($this->numedoc1, 8, '0', STR_PAD_LEFT) . '11' . $this->tipo_doc1;
                            $persona->nume_doc = str_pad($this->numedoc1, 8, '0', STR_PAD_LEFT);
                        }
                        $persona->tipo_doc = $this->tipo_doc1;
                        $persona->tipo_persona = 1;
                        $persona->nombres = strtoupper($this->nombres1);
                        $persona->ape_paterno = strtoupper($this->ape_paterno1);
                        $persona->ape_materno = strtoupper($this->ape_materno1);
                        $persona->tipo_persona_juridica = $this->tipo_persona_juridica;
                        $persona->tipo_funcion = 1;
                        $persona->razon_social = strtoupper($this->razon_social);
                        $persona->save();

                        $titular = new Titular();
                        $titular->id_ficha = $ficha->id_ficha;
                        $titular->id_persona = $persona->id_persona;
                        $titular->form_adquisicion = $this->form_adquisicion;
                        if ($this->fecha_adquisicion == "") {
                        } else {
                            $titular->fecha_adquisicion = $this->fecha_adquisicion;
                        }
                        $titular->porc_cotitular = 0.00;
                        $titular->esta_civil = $this->esta_civil1;
                        $titular->telf = $this->telefonodomicilio;
                        $titular->anexo = $this->anexodomicilio;
                        $titular->email = $this->emaildomicilio;
                        $titular->nume_titular = "TITULAR N° 1";
                        $titular->cond_titular = $this->condtitular;
                        $titular->save();

                        $domicilio = new DomicilioTitular();
                        $domicilio->id_ficha = $ficha->id_ficha;
                        $domicilio->id_persona = $persona->id_persona;
                        $domicilio->codi_via = $this->codigoviaotros;
                        $domicilio->tipo_via = strtoupper($this->tipoviaotros);
                        $domicilio->nomb_via = strtoupper($this->nombreviaotros);
                        $domicilio->nume_muni = $this->nmunicipalotros;
                        $domicilio->nume_interior = $this->ninteriorotros;
                        $domicilio->codi_hab_urba = $this->codigohurbanootros;
                        $domicilio->nomb_hab_urba = $this->nombrehhurbanaotros;
                        $domicilio->sector = $this->zonaootros;
                        $domicilio->mzna = $this->manzanaotros;
                        $domicilio->lote = $this->loteotros;
                        $domicilio->sublote = $this->subloteotros;
                        $domicilio->codi_dep = $this->departamentootros;
                        $domicilio->codi_pro = $this->provinciaotros;
                        $domicilio->codi_dis = $this->distritootros;
                        $domicilio->ubicacion = $this->ubicacionpersona;
                        $domicilio->save();
                    }
                } elseif ($this->tipoTitular == 2) {
                    $iddd = str_pad($this->numedoc3, 11, '0', STR_PAD_LEFT) . '1200';
                    $buscarpersona3 = Persona::where('id_persona', $iddd)->first();
                    if ($buscarpersona3 != "") {
                        $persona = $buscarpersona3;
                        $persona->tipo_doc = '00';
                        $persona->tipo_persona = 2;
                        $persona->tipo_persona_juridica = $this->tipo_persona_juridica;
                        $persona->tipo_funcion = 1;
                        $persona->razon_social = strtoupper($this->razon_social);
                        $persona->save();

                        $titular = new Titular();
                        $titular->id_ficha = $ficha->id_ficha;
                        $titular->id_persona = $persona->id_persona;
                        $titular->form_adquisicion = $this->form_adquisicion;
                        if ($this->fecha_adquisicion == "") {
                        } else {
                            $titular->fecha_adquisicion = $this->fecha_adquisicion;
                        }
                        $titular->porc_cotitular = 0.00;
                        $titular->telf = $this->telefonodomicilio;
                        $titular->anexo = $this->anexodomicilio;
                        $titular->email = $this->emaildomicilio;
                        $titular->cond_titular = $this->condtitular;
                        $titular->save();

                        $domicilio = new DomicilioTitular();
                        $domicilio->id_ficha = $ficha->id_ficha;
                        $domicilio->id_persona = $persona->id_persona;
                        $domicilio->codi_via = $this->codigoviaotros;
                        $domicilio->tipo_via = strtoupper($this->tipoviaotros);
                        $domicilio->nomb_via = strtoupper($this->nombreviaotros);
                        $domicilio->nume_muni = $this->nmunicipalotros;
                        $domicilio->nume_interior = $this->ninteriorotros;
                        $domicilio->codi_hab_urba = $this->codigohurbanootros;
                        $domicilio->nomb_hab_urba = $this->nombrehhurbanaotros;
                        $domicilio->sector = $this->zonaootros;
                        $domicilio->mzna = $this->manzanaotros;
                        $domicilio->lote = $this->loteotros;
                        $domicilio->sublote = $this->subloteotros;
                        $domicilio->codi_dep = $this->departamentootros;
                        $domicilio->codi_pro = $this->provinciaotros;
                        $domicilio->codi_dis = $this->distritootros;
                        $domicilio->ubicacion = $this->ubicacionpersona;
                        $domicilio->save();
                    } else {
                        $persona = new Persona();
                        if ($this->numedoc3 == "") {
                            $cantidadpersona = Persona::where('tipo_persona', 2)->count() + 1;
                            $persona->id_persona = str_pad($cantidadpersona, 11, '0', STR_PAD_LEFT) . '1200';
                            $persona->nume_doc = "";
                        } else {
                            $persona->id_persona = str_pad($this->numedoc3, 11, '0', STR_PAD_LEFT) . '1200';
                            $persona->nume_doc = str_pad($this->numedoc3, 11, '0', STR_PAD_LEFT);
                        }
                        $persona->tipo_doc = '00';
                        $persona->tipo_persona = 2;
                        $persona->tipo_persona_juridica = $this->tipo_persona_juridica;
                        $persona->tipo_funcion = 1;
                        $persona->razon_social = strtoupper($this->razon_social);
                        $persona->save();

                        $titular = new Titular();
                        $titular->id_ficha = $ficha->id_ficha;
                        $titular->id_persona = $persona->id_persona;
                        $titular->form_adquisicion = $this->form_adquisicion;
                        if ($this->fecha_adquisicion == "") {
                        } else {
                            $titular->fecha_adquisicion = $this->fecha_adquisicion;
                        }
                        $titular->porc_cotitular = 0.00;
                        $titular->telf = $this->telefonodomicilio;
                        $titular->anexo = $this->anexodomicilio;
                        $titular->email = $this->emaildomicilio;
                        $titular->cond_titular = $this->condtitular;
                        $titular->save();

                        $domicilio = new DomicilioTitular();
                        $domicilio->id_ficha = $ficha->id_ficha;
                        $domicilio->id_persona = $persona->id_persona;
                        $domicilio->codi_via = $this->codigoviaotros;
                        $domicilio->tipo_via = strtoupper($this->tipoviaotros);
                        $domicilio->nomb_via = strtoupper($this->nombreviaotros);
                        $domicilio->nume_muni = $this->nmunicipalotros;
                        $domicilio->nume_interior = $this->ninteriorotros;
                        $domicilio->codi_hab_urba = $this->codigohurbanootros;
                        $domicilio->nomb_hab_urba = $this->nombrehhurbanaotros;
                        $domicilio->sector = $this->zonaootros;
                        $domicilio->mzna = $this->manzanaotros;
                        $domicilio->lote = $this->loteotros;
                        $domicilio->sublote = $this->subloteotros;
                        $domicilio->codi_dep = $this->departamentootros;
                        $domicilio->codi_pro = $this->provinciaotros;
                        $domicilio->codi_dis = $this->distritootros;
                        $domicilio->ubicacion = $this->ubicacionpersona;
                        $domicilio->save();
                    }
                }
                if ($this->esta_civil1 == '02' || $this->esta_civil1 == '05') {
                    $iddd = str_pad($this->numedoc2, 8, '0', STR_PAD_LEFT) . '11' . $this->tipo_doc2;
                    $buscarpersona4 = Persona::where('nume_doc', $this->numedoc2)->where('tipo_funcion', 1)->first();
                    if ($buscarpersona4 != "") {
                        $persona2 = $buscarpersona4;
                        $persona2->tipo_doc = $this->tipo_doc2;
                        $persona2->tipo_persona = 1;
                        $persona2->nombres = strtoupper($this->nombres2);
                        $persona2->ape_paterno = strtoupper($this->ape_paterno2);
                        $persona2->ape_materno = strtoupper($this->ape_materno2);
                        $persona2->tipo_persona_juridica = $this->tipo_persona_juridica;
                        $persona2->tipo_funcion = 1;
                        $persona2->save();

                        $titular = new Titular();
                        $titular->id_ficha = $ficha->id_ficha;
                        $titular->id_persona = $persona2->id_persona;
                        $titular->form_adquisicion = $this->form_adquisicion;
                        if ($this->fecha_adquisicion == "") {
                        } else {
                            $titular->fecha_adquisicion = $this->fecha_adquisicion;
                        }
                        $titular->porc_cotitular = 0.00;
                        $titular->esta_civil = $this->esta_civil1;
                        $titular->telf = $this->telefonodomicilio;
                        $titular->anexo = $this->anexodomicilio;
                        $titular->email = $this->emaildomicilio;
                        $titular->nume_titular = "TITULAR N° 2";
                        $titular->cond_titular = $this->condtitular;
                        $titular->save();
                    } else {
                        $persona2 = new Persona();
                        if ($this->numedoc2 == "") {
                            $cantidadpersona = Persona::where('tipo_persona', 1)->count() + 1;
                            $persona2->id_persona = str_pad($cantidadpersona, 8, '0', STR_PAD_LEFT) . '11' . $this->tipo_doc2;
                            $persona2->nume_doc = "";
                        } else {
                            $persona2->id_persona = str_pad($this->numedoc2, 8, '0', STR_PAD_LEFT) . '11' . $this->tipo_doc2;
                            $persona2->nume_doc = str_pad($this->numedoc2, 8, '0', STR_PAD_LEFT);
                        }
                        $persona2->tipo_doc = $this->tipo_doc2;
                        $persona2->tipo_persona = 1;
                        $persona2->nombres = strtoupper($this->nombres2);
                        $persona2->ape_paterno = strtoupper($this->ape_paterno2);
                        $persona2->ape_materno = strtoupper($this->ape_materno2);
                        $persona2->tipo_persona_juridica = $this->tipo_persona_juridica;
                        $persona2->tipo_funcion = 1;
                        $persona2->save();

                        $titular = new Titular();
                        $titular->id_ficha = $ficha->id_ficha;
                        $titular->id_persona = $persona2->id_persona;
                        $titular->form_adquisicion = $this->form_adquisicion;
                        if ($this->fecha_adquisicion == "") {
                        } else {
                            $titular->fecha_adquisicion = $this->fecha_adquisicion;
                        }
                        $titular->porc_cotitular = 0.00;
                        $titular->esta_civil = $this->esta_civil1;
                        $titular->telf = $this->telefonodomicilio;
                        $titular->anexo = $this->anexodomicilio;
                        $titular->email = $this->emaildomicilio;
                        $titular->nume_titular = "TITULAR N° 2";
                        $titular->cond_titular = $this->condtitular;
                        $titular->save();
                    }
                }
            }


            $fichaindividual = new FichaIndividual();
            $fichaindividual->id_ficha = $ficha->id_ficha;
            $fichaindividual->codi_uso = $this->codi_uso;
            $fichaindividual->cont_en = $this->cont_en;
            $fichaindividual->clasificacion = $this->clasificacion;



            if ($this->area_declarada != "") {
                $fichaindividual->area_titulo = $this->area_declarada;
            } else {
                $fichaindividual->area_titulo = 0;
            }

            if ($this->area_declarada != "") {
                $fichaindividual->area_declarada = $this->area_declarada;
            } else {
                $fichaindividual->area_declarada = 0;
            }

            if ($this->area_verificada1 != "") {
                $fichaindividual->area_verificada = $this->area_verificada1;
            } else {
                $fichaindividual->area_verificada = 0;
            }




            if ($this->porc_bc_terr_legal != "") {
                $fichaindividual->porc_bc_terr_legal = $this->porc_bc_terr_legal;
            } else {
                $fichaindividual->porc_bc_terr_legal = 0;
            }
            if ($this->porc_bc_const_fisc != "") {
                $fichaindividual->porc_bc_const_fisc = $this->porc_bc_const_fisc;
            } else {
                $fichaindividual->porc_bc_const_fisc = 0;
            }
            if ($this->porc_bc_const_legal != "") {
                $fichaindividual->porc_bc_const_legal = $this->porc_bc_const_legal;
            } else {
                $fichaindividual->porc_bc_const_legal = 0;
            }
            if ($this->porc_bc_terr_fisc != "") {
                $fichaindividual->porc_bc_terr_fisc = $this->porc_bc_terr_fisc;
            } else {
                $fichaindividual->porc_bc_terr_fisc = 0;
            }


            if ($this->en_colindante != "") {
                $fichaindividual->en_colindante = $this->en_colindante;
            } else {
                $fichaindividual->en_colindante = 0;
            }
            if ($this->en_jardin_aislamiento != "") {
                $fichaindividual->en_jardin_aislamiento = $this->en_jardin_aislamiento;
            } else {
                $fichaindividual->en_jardin_aislamiento = 0;
            }
            if ($this->en_area_publica != "") {
                $fichaindividual->en_area_publica = $this->en_area_publica;
            } else {
                $fichaindividual->en_area_publica = 0;
            }

            if ($this->en_area_intangible != "") {
                $fichaindividual->en_area_intangible = $this->en_area_intangible;
            } else {
                $fichaindividual->en_area_intangible = 0;
            }

            $fichaindividual->cond_declarante = $this->cond_declarante;
            $fichaindividual->esta_llenado = $this->esta_llenado;
            if ($this->nume_habitantes != "") {
                $fichaindividual->nume_habitantes = $this->nume_habitantes;
            }
            if ($this->nume_familias != "") {
                $fichaindividual->nume_familias = $this->nume_familias;
            }
            $fichaindividual->mantenimiento = $this->mantenimiento;
            $fichaindividual->observaciones = $this->observacion;
            $fichaindividual->nume_ficha = str_pad($this->nume_ficha, 7, '0', STR_PAD_LEFT);
            if ($this->imagen_lote) {
                $nombreImagen = $ficha->id_ficha . '.' . $this->imagen_lote->getClientOriginalExtension();

                $rutaImagen = $this->imagen_lote->storeAs('img/imageneslotes', $nombreImagen);

                Image::make('storage/' . $rutaImagen)->fit(1600, 1200, function ($constraint) {
                    $constraint->upsize();
                })->save('storage/' . $rutaImagen, null, 'jpg');
                $fichaindividual->imagen_lote = $nombreImagen;
            }
            if ($this->imagen_plano) {
                $nombreImagen2 = $ficha->id_ficha . '.' . $this->imagen_plano->getClientOriginalExtension();

                $rutaImagen2 = $this->imagen_plano->storeAs('img/imagenesplanos', $nombreImagen2);

                Image::make('storage/' . $rutaImagen2)->fit(1600, 1200, function ($constraint) {
                    $constraint->upsize();
                })->save('storage/' . $rutaImagen2, null, 'jpg');
                $fichaindividual->imagen_plano = $nombreImagen2;
            }
            $fichaindividual->save();

            $lindero = new Lindero();
            $lindero->id_ficha = $ficha->id_ficha;
            $lindero->fren_campo = $this->fren_campo;
            $lindero->fren_colinda_campo = $this->fren_colinda_campo;
            $lindero->dere_campo = $this->dere_campo;
            $lindero->dere_colinda_campo = $this->dere_colinda_campo;
            $lindero->izqu_campo = $this->izqu_campo;
            $lindero->izqu_colinda_campo = $this->izqu_colinda_campo;
            $lindero->fond_campo = $this->fond_campo;
            $lindero->fond_colinda_campo = $this->fond_colinda_campo;
            $lindero->save();

            $servicios = new ServicioBasico();
            $servicios->id_ficha = $ficha->id_ficha;
            if ($this->luz == 'on') {
                $servicios->luz = 1;
            } else {
                $servicios->luz = 2;
            }
            if ($this->agua == 'on') {
                $servicios->agua = 1;
            } else {
                $servicios->agua = 2;
            }
            if ($this->telefono == 'on') {
                $servicios->telefono = 1;
            } else {
                $servicios->telefono = 2;
            }
            if ($this->desague == 'on') {
                $servicios->desague = 1;
            } else {
                $servicios->desague = 2;
            }
            if ($this->gas == 'on') {
                $servicios->gas = 1;
            } else {
                $servicios->gas = 2;
            }
            if ($this->internet == 'on') {
                $servicios->internet = 1;
            } else {
                $servicios->internet = 2;
            }
            if ($this->tvcable == 'on') {
                $servicios->tvcable = 1;
            } else {
                $servicios->tvcable = 2;
            }
            $servicios->save();

            $contcon = 0;
            $construcciones = $this->cont2;
            if ($construcciones != "") {
                while ($contcon < $this->cont2) {
                    $construccion = new Construccion();
                    $construccion->id_construccion = $ficha->id_ficha . '' . $this->num_piso[$contcon] . '' . $contcon + 1;
                    $construccion->id_ficha = $ficha->id_ficha;
                    $construccion->codi_construccion = $contcon + 1;

                    if (isset($this->bloque[$contcon])) {
                        if ($this->bloque[$contcon] != "") {
                            $construccion->bloque = $this->bloque[$contcon];
                        } else {
                            $construccion->bloque = "";
                        }
                    }


                    if (isset($this->num_piso[$contcon])) {
                        if ($this->num_piso[$contcon] != "") {
                            $construccion->nume_piso = $this->num_piso[$contcon];
                        } else {
                            $construccion->nume_piso = "";
                        }
                    }

                    if (isset($this->fecha[$contcon])) {
                        if ($this->fecha[$contcon] != "") {
                            $fechaformato = $this->fecha[$contcon] . '-01';
                            $construccion->fecha = $fechaformato;
                        } else {
                            $construccion->fecha = "";
                        }
                    }


                    if (isset($this->mep[$contcon])) {
                        if ($this->mep[$contcon] != "") {
                            $construccion->mep = $this->mep[$contcon];
                        } else {
                            $construccion->mep = "";
                        }
                    }



                    if (isset($this->ecs[$contcon])) {
                        if ($this->ecs[$contcon] != "") {
                            $construccion->ecs = $this->ecs[$contcon];
                        } else {
                            $construccion->ecs = "";
                        }
                    }



                    if (isset($this->ecc[$contcon])) {
                        if ($this->ecc[$contcon] != "") {
                            $construccion->ecc = $this->ecc[$contcon];
                        } else {
                            $construccion->ecc = "";
                        }
                    }



                    if (isset($this->estr_muro_col[$contcon])) {
                        if ($this->estr_muro_col[$contcon] != "") {
                            $construccion->estr_muro_col = $this->estr_muro_col[$contcon];
                        } else {
                            $construccion->estr_muro_col = "";
                        }
                    }


                    if (isset($this->estr_techo[$contcon])) {
                        if ($this->estr_techo[$contcon] != "") {
                            $construccion->estr_techo = $this->estr_techo[$contcon];
                        } else {
                            $construccion->estr_techo = "";
                        }
                    }



                    if (isset($this->acab_piso[$contcon])) {
                        if ($this->acab_piso[$contcon] != "") {
                            $construccion->acab_piso = $this->acab_piso[$contcon];
                        } else {
                            $construccion->acab_piso = "";
                        }
                    }




                    if (isset($this->acab_puerta_ven[$contcon])) {
                        if ($this->acab_puerta_ven[$contcon] != "") {
                            $construccion->acab_puerta_ven = $this->acab_puerta_ven[$contcon];
                        } else {
                            $construccion->acab_puerta_ven = "";
                        }
                    }



                    if (isset($this->acab_revest[$contcon])) {
                        if ($this->acab_revest[$contcon] != "") {
                            $construccion->acab_revest = $this->acab_revest[$contcon];
                        } else {
                            $construccion->acab_revest = "";
                        }
                    }



                    if (isset($this->acab_bano[$contcon])) {
                        if ($this->acab_bano[$contcon] != "") {
                            $construccion->acab_bano = $this->acab_bano[$contcon];
                        } else {
                            $construccion->acab_bano = "";
                        }
                    }


                    if (isset($this->inst_elect_sanita[$contcon])) {
                        if ($this->inst_elect_sanita[$contcon] != "") {
                            $construccion->inst_elect_sanita = $this->inst_elect_sanita[$contcon];
                        } else {
                            $construccion->inst_elect_sanita = "";
                        }
                    }


                    $construccion->area_declarada = 0.00;


                    if (isset($this->area_verificada[$contcon])) {
                        if ($this->area_verificada[$contcon] != "") {
                            $construccion->area_verificada = $this->area_verificada[$contcon];
                        }
                    }



                    if (isset($this->uca[$contcon])) {
                        if ($this->uca[$contcon] != "") {
                            $construccion->uca = $this->uca[$contcon];
                        } else {
                            $construccion->uca = "";
                        }
                    }


                    $construccion->save();
                    $contcon++;
                }
            }

            $contins = 0;
            while ($contins < $this->cont3) {
                $instalacion = new Instalacion();
                $instalacion->id_instalacion = $ficha->id_ficha . '' . $this->codi_instalacion[$contins] . '' . $contins + 1;
                $instalacion->id_ficha = $ficha->id_ficha;
                $instalacion->codi_obra = $contins + 1;
                if (isset($this->codi_instalacion[$contins])) {
                    if ($this->codi_instalacion[$contins] != "") {
                        $instalacion->codi_instalacion = $this->codi_instalacion[$contins];
                    } else {
                        $instalacion->codi_instalacion = "";
                    }
                }

                if (isset($this->inst_fecha[$contins])) {
                    if ($this->inst_fecha[$contins] != "") {
                        $fechaformato = $this->inst_fecha[$contins] . '-01';
                        $instalacion->fecha = $fechaformato;
                    } else {
                        $instalacion->fecha = "";
                    }
                }


                if (isset($this->inst_mep[$contins])) {
                    if ($this->inst_mep[$contins] != "") {
                        $instalacion->mep = $this->inst_mep[$contins];
                    } else {
                        $instalacion->mep = "";
                    }
                }

                if (isset($this->inst_ecs[$contins])) {
                    if ($this->inst_ecs[$contins] != "") {
                        $instalacion->ecs = $this->inst_ecs[$contins];
                    } else {
                        $instalacion->ecs = "";
                    }
                }

                if (isset($this->inst_ecc[$contins])) {
                    if ($this->inst_ecc[$contins] != "") {
                        $instalacion->ecc = $this->inst_ecc[$contins];
                    } else {
                        $instalacion->ecc = "";
                    }
                }

                if (isset($this->inst_prod_total[$contins])) {
                    if ($this->inst_prod_total[$contins] != "") {
                        $instalacion->prod_total = $this->inst_prod_total[$contins];
                    }
                }

                if (isset($this->inst_uni_med[$contins])) {
                    if ($this->inst_uni_med[$contins] != "" || isset($this->inst_uni_med[$contins])) {
                        $instalacion->uni_med = $this->inst_uni_med[$contins];
                    }
                }

                if (isset($this->inst_uca[$contins])) {
                    if ($this->inst_uca[$contins] != "") {
                        $instalacion->uca = $this->inst_uca[$contins];
                    }
                }
                $instalacion->save();
                $contins++;
            }

            $contdoc = 0;
            while ($contdoc < $this->cont4) {
                $documento = new DocumentoAdjunto();
                $documento->id_doc = $ficha->id_ficha . '' . $contdoc + 1;
                $documento->id_ficha = $ficha->id_ficha;
                $documento->codi_doc = $contdoc + 1;

                if (isset($this->tipo_dococumento[$contdoc])) {
                    if ($this->tipo_dococumento[$contdoc] != "") {
                        $documento->tipo_doc = $this->tipo_dococumento[$contdoc];
                    } else {
                        $documento->tipo_doc = "";
                    }
                }

                if (isset($this->nume_documento[$contdoc])) {
                    if ($this->nume_documento[$contdoc] != "") {
                        $documento->nume_doc = $this->nume_documento[$contdoc];
                    } else {
                        $documento->nume_doc = "";
                    }
                }

                if (isset($this->area_autorizadadocumento[$contdoc])) {
                    if ($this->area_autorizadadocumento[$contdoc] != "") {
                        $documento->area_autorizada = $this->area_autorizadadocumento[$contdoc];
                    } else {
                        $documento->area_autorizada = 0;
                    }
                }
                if (isset($this->fecha_dococumento[$contdoc])) {
                    if ($this->fecha_dococumento[$contdoc] != "") {
                        $documento->fecha_doc = $this->fecha_dococumento[$contdoc];
                    } else {
                        $documento->fecha_doc = "1950-01-01";
                    }
                }
                if ($this->url_doc) {
                    $nombreImagen3 = $ficha->id_ficha . '.' . $this->url_doc->getClientOriginalExtension();

                    $rutaImagen3 = $this->url_doc->storeAs('img/documentos/', $nombreImagen3);

                    // Image::make('storage/' . $rutaImagen2)->resize(1600, null, function ($constraint) {
                    //     $constraint->aspectRatio();
                    // })->save('storage/' . $rutaImagen2, null, 'jpg');
                    $documento->url_doc = $rutaImagen3;
                }

                $documento->save();
                $contdoc++;
            }

            if ($this->tipo_partida != "" || $this->nume_partida != "") {
                $sunarp = new Sunarp();
                $sunarp->id_ficha = $ficha->id_ficha;
                $sunarp->tipo_partida = $this->tipo_partida;
                $sunarp->nume_partida = $this->nume_partida;
                $sunarp->fojas = $this->fojas;
                $sunarp->asiento = $this->asiento;
                $sunarp->fecha_inscripcion = $this->fecha_inscripcion;
                $sunarp->codi_decla_fabrica = $this->codi_decla_fabrica;
                $sunarp->asie_fabrica = $this->asie_fabrica;
                $sunarp->fecha_fabrica = $this->fecha_fabrica;
                $sunarp->save();
            }

            $contlit = 0;
            while ($contlit < $this->cont5) {
                if ($this->numedoc[$contlit] != '') {
                    $buscarpersona4 = Persona::where('nume_doc', $this->numedoc[$contlit])->where('tipo_funcion', 6)->first();
                    if ($buscarpersona4 != "") {
                        $litigantepersona = $buscarpersona4;
                    } else {
                        $litigantepersona = new Persona();
                        $litigantepersona->id_persona = $this->numedoc[$contlit] . '61' . $this->tipolitigante[$contlit];

                        $litigantepersona->tipo_persona = 1;
                        $litigantepersona->tipo_funcion = 6;

                        if (isset($this->numedoc[$contlit])) {
                            if ($this->numedoc[$contlit]) {
                                $litigantepersona->nume_doc = $this->numedoc[$contlit];
                            } else {
                                $litigantepersona->nume_doc = "";
                            }
                        }

                        if (isset($this->tipolitigante[$contlit])) {
                            if ($this->tipolitigante[$contlit] != "") {
                                $litigantepersona->tipo_doc = $this->tipolitigante[$contlit];
                            } else {
                                $litigantepersona->tipo_doc = "";
                            }
                        }

                        if (isset($this->nombres[$contlit])) {
                            if ($this->nombres[$contlit] != "") {
                                $litigantepersona->nombres = $this->nombres[$contlit];
                            } else {
                                $litigantepersona->nombres = "";
                            }
                        }

                        if (isset($this->ape_paterno[$contlit])) {
                            if ($this->ape_paterno[$contlit] != "") {
                                $litigantepersona->ape_paterno = $this->ape_paterno[$contlit];
                            } else {
                                $litigantepersona->ape_paterno = "";
                            }
                        }
                        if (isset($this->ape_materno[$contlit])) {
                            if ($this->ape_materno[$contlit] != "") {
                                $litigantepersona->ape_materno = $this->ape_materno[$contlit];
                            } else {
                                $litigantepersona->ape_materno = "";
                            }
                        }
                        $litigantepersona->save();
                    }
                }

                $litigante = new Litigante();
                $litigante->id_ficha = $ficha->id_ficha;
                $litigante->id_persona = $litigantepersona->id_persona;


                if (isset($this->codi_contribuye[$contlit])) {
                    $documento->codi_contribuye = $this->codi_contribuye[$contlit];
                } else {
                    $documento->codi_contribuye = "";
                }

                $litigante->save();
                $contlit++;
            }


            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('reporte.reportelista')
            ->with('success', 'Ficha Individual Editado Correctamente.');
    }

    public function render()
    {
        return view('livewire.ficha-individual-rentas-edit');
    }
}
