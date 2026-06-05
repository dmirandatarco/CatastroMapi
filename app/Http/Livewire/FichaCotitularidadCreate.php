<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Uso;
use App\Models\Persona;
use App\Models\Ubiges;
use App\Models\Ficha;
use App\Models\Institucion;
use App\Models\Titular;
use App\Models\FichaCotitularidad;
use App\Models\ExoneracionTitular;
use App\Models\UniCat;
use App\Models\DomicilioTitular;
use App\Models\HabUrbana;
use App\Models\Via;
use Illuminate\Support\Facades\Http;
use DB;
use Carbon\Carbon;

class FichaCotitularidadCreate extends Component
{
    public $usos;
    public $tecnicos;
    public $supervisores;
    public $verificadores;
    public $fichaanterior;
    public $cont;

    public $numeficha;
    public $nume_ficha_lote;
    public $nume_ficha_lote2;

    public $observacion;
    public $cond_declarante;
    public $esta_llenado;

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

    public $total;
    public $departamentos;
    public $provincias;
    public $distritos;

    public $tipoTitular;
    public $porc_cotitular;
    public $codi_contribuyente;
    public $tipo_doc1;
    public $numedoc1;
    public $nombres1;
    public $ape_paterno1;
    public $ape_materno1;
    public $numedoc3;
    public $razon_social;
    public $hab_urbana2;

    public $form_adquisicion;
    public $fecha_adquisicion;
    public $condicion;
    public $nume_resolucion;
    public $fecha_inicio;
    public $fecha_vencimiento;

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
    public $codi_hoja_catastral;

    public function mount(Ficha $fichaanterior, $total)
    {
        $this->usos = Uso::all();
        $this->tecnicos = Persona::where('tipo_funcion', 3)->orderBy('nombres', 'asc')->get();
        $this->supervisores = Persona::where('tipo_funcion', 2)->get();
        $this->verificadores = Persona::where('tipo_funcion', 4)->get();
        $this->fichaanterior = $fichaanterior;
        $this->total = $total;
        $this->departamentos = Ubiges::where('cod_pro', '00')->where('codi_dis', '00')->get();
        $this->provincias = Ubiges::where('cod_pro', '!=', '00')->where('codi_dis', '00')->get();
        $this->distritos = Ubiges::where('codi_dis', '!=', '00')->get();
        for ($i = 0; $i < $this->cont; $i++) {
            $this->tipoVianombre[$i] = "";
            $this->tipoViatipo[$i] = "";
        }
        for ($i = 0; $i < $this->total; $i++) {
            $this->tipo_doc1[$i] = "";
            $this->nombres1[$i] = "";
            $this->ape_paterno1[$i] = "";
            $this->ape_materno1[$i] = "";
        }
    }



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
    public function updatedverificador($id)
    {
        $this->verificador2 = Persona::where('id_persona', $id)->first();
        if ($this->verificador2 == "") {
            $this->nume_registro = "";
        } else {
            $this->nume_registro = $this->verificador2->nregistro;
        }
    }

    public function updatednumeficha()
    {
        $this->numeficha = str_pad($this->numeficha, 7, '0', STR_PAD_LEFT);
        $this->validate([
            'numeficha'                    => 'required|max:7|unique:tf_fichas_cotitularidades,nume_ficha',
        ]);
    }

    public function updatednumedoc1($value, $nested)
    {
        if (isset($this->tipo_doc1[$nested])) {
            if ($this->tipo_doc1[$nested] == "02") {
                $dni = $this->numedoc1[$nested];
                if ($dni != "") {
                    $token = config('services.apisunat.token');
                    $urldni = config('services.apisunat.urldni');
                    $response = Http::withHeaders([
                        'Referer' => 'http://apis.net.pe/api-ruc',
                        'Authorization' => 'Bearer ' . $token
                    ])->get($urldni . $dni);

                    $persona = ($response->json());

                    if (isset($persona['error']) || $persona == "") {
                        $this->nombres1[$nested] = "";
                        $this->ape_paterno1[$nested] = "";
                        $this->ape_materno1[$nested] = "";
                        $this->numedoc1[$nested] = $dni;
                        if (isset($persona['error'])) {
                            session()->flash('info.' . $nested, 'Se necesita 8 digitos');
                        }
                        if ($persona == "") {
                            session()->flash('info.' . $nested, 'No se encontro datos');
                        }
                    } else {
                        $this->nombres1[$nested] = $persona['nombres'];
                        $this->ape_paterno1[$nested] = $persona['apellidoPaterno'];
                        $this->ape_materno1[$nested] = $persona['apellidoMaterno'];
                        $this->numedoc1[$nested] = $dni;
                    }
                }
            }
        }
    }
    public function updatedcodigoviaconductor($id, $nested)
    {
        $idbuscar = str_pad($id, 6, '0', STR_PAD_LEFT);
        $this->hab_urbana2 = Via::where('codi_via', $idbuscar)->first();


        if ($this->hab_urbana2 == "") {
            $this->nombreviaconductor[$nested] = "";
            $this->tipoviaconductor[$nested] = "";
        } else {
            $this->tipoviaconductor[$nested] = $this->hab_urbana2->tipo_via;
            $this->nombreviaconductor[$nested] = $this->hab_urbana2->nomb_via;
        }
    }
    public function updatedcodigohurbanoconductor($id, $nested)
    {
        $idbuscar = str_pad($id, 4, '0', STR_PAD_LEFT);
        $this->hab_urbana2 = HabUrbana::where('codi_hab_urba', $idbuscar)->first();


        if ($this->hab_urbana2 == "") {
            $this->nombrehhurbanaconductor[$nested] = "";
        } else {
            $this->nombrehhurbanaconductor[$nested] = $this->hab_urbana2->tipo_hab_urba . " " . $this->hab_urbana2->nomb_hab_urba;
        }
    }



    public function updatednumedoc3($value, $nested)
    {

        $ruc = $value;
        $token = config('services.apisunat.token');
        $urlruc = config('services.apisunat.urlruc');
        $response = Http::withHeaders([
            'Referer' => 'http://apis.net.pe/api-ruc',
            'Authorization' => 'Bearer ' . $token
        ])->get($urlruc . $ruc);

        $persona = ($response->json());
        if ($persona == "" || isset($persona['error'])) {
            $this->razon_social[$nested] = "";
            $this->numedoc3[$nested] = $ruc;
            if ($persona['error'] == "RUC invalido") {
                session()->flash('warning.' . $nested, 'RUC invalido');
            }
            if ($persona['error'] == "RUC debe contener 11 digitos") {
                session()->flash('warning.' . $nested, 'RUC debe contener 11 digitos');
            }
        } else {
            $this->razon_social[$nested] = $persona['nombre'];
            $this->numedoc3[$nested] = $ruc;
        }
    }


    public function register()
    {
        try {
            DB::beginTransaction();

            $ubigeo = Institucion::first();

            $mytime = Carbon::now('America/Lima');
            $date = $mytime->format('Y');

            $this->validate([
                'numeficha'                    => 'required|max:7|unique:tf_fichas_cotitularidades,nume_ficha',
                'nume_ficha_lote'               => 'required|max:4',
                'nume_ficha_lote2'              => 'nullable|max:5',

                'cond_declarante'               => 'nullable',
                'esta_llenado'                  => 'required',

                'observacion'                 => 'nullable|max:2000',

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

            for ($i = 0; $i < $this->total; $i++) {
                $this->validate([
                    'tipoTitular.' . $i           =>  'required',
                    'porc_cotitular.' . $i        =>  'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,4})?$/',
                    'codi_contribuyente.' . $i    =>  'nullable|max:10',

                    'tipo_doc1.' . $i             =>  'nullable',
                    'numedoc1.' . $i              =>  'nullable|max:17',
                    'nombres1.' . $i              =>  'nullable|max:150',
                    'ape_paterno1.' . $i          =>  'nullable|max:50',
                    'ape_materno1.' . $i          =>  'nullable|max:50',
                    'numedoc3.' . $i              =>  'nullable|max:17',
                    'razon_social.' . $i          =>  'nullable|max:100',

                    'form_adquisicion.' . $i          =>  'nullable',
                    'fecha_adquisicion.' . $i         =>  'nullable|date',
                    'condicion.' . $i         =>  'nullable',
                    'nume_resolucion.' . $i           =>  'nullable',
                    'fecha_inicio.' . $i          =>  'nullable',
                    'fecha_vencimiento.' . $i         =>  'nullable',


                    'deparamentoconductor.' . $i             => 'required',
                    'provinciaconductor.' . $i                => 'required',
                    'distritoconductor.' . $i                 => 'required',
                    'codigoviaconductor.' . $i                => 'nullable|max:6',
                    'tipoviaconductor.' . $i                  => 'nullable|max:10',
                    'nombreviaconductor.' . $i                => 'nullable|max:100',
                    'nmunicipalconductor.' . $i               => 'nullable|max:6',
                    'nomb_edificacionconductor.' . $i               => 'nullable|max:100',
                    'ninteriorconductor.' . $i                => 'nullable|max:5',
                    'codigohurbanoconductor.' . $i            => 'nullable|max:4',
                    'nombrehhurbanaconductor.' . $i           => 'nullable|max:100',
                    'zonaconductor.' . $i                    => 'nullable|max:50',
                    'manzanaconductor.' . $i                  => 'nullable|max:5',
                    'loteconductor.' . $i                     => 'nullable|max:5',
                    'subloteconductor.' . $i                  => 'nullable|max:5',
                    'telefonoconductor.' . $i             => 'nullable|max:10',
                    'anexoconductor.' . $i                => 'nullable|max:5',
                    'faxconductor.' . $i                  => 'nullable|max:10',
                    'emailconductor.' . $i                => 'nullable|max:100',
                ]);
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
            $ficha->id_ficha = $date . '' . str_pad($ubigeo->id_institucion, 6, '0', STR_PAD_LEFT) . '02' . str_pad($this->numeficha, 7, '0', STR_PAD_LEFT);
            $ficha->tipo_ficha = "02";
            $ficha->nume_ficha = str_pad($this->numeficha, 7, '0', STR_PAD_LEFT);
            $ficha->id_lote = $this->fichaanterior->id_lote;
            $ficha->dc = $this->fichaanterior->dc;
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
            $ficha->id_uni_cat = $this->fichaanterior->id_uni_cat;
            $ficha->id_usuario = \Auth::user()->id_usuario;
            $ficha->fecha_grabado = $mytime->toDateTimeString();
            $ficha->activo = 1;
            $ficha->save();


            $unicatencontrar = UniCat::where('id_uni_cat', $this->fichaanterior->id_uni_cat)->first();
            if (isset($this->codi_hoja_catastral)) {
                $unicatencontrar->codi_hoja_catastral = $this->codi_hoja_catastral;
            }
            $unicatencontrar->save();
            $cont = 0;
            $personas = $this->tipoTitular;
            while ($cont < count($personas)) {

                if ($this->tipoTitular[$cont] == 1) {
                    if (isset($this->numedoc1[$cont])) {
                        $buscarpersona = Persona::where('tipo_persona', 1)->where('tipo_funcion', 1)->where('nume_doc', $this->numedoc1[$cont])->first();
                        if ($buscarpersona != "") {
                            $persona = $buscarpersona;
                            $persona->tipo_doc = $this->tipo_doc1[$cont];
                            $persona->tipo_persona = 1;
                            if (isset($this->nombres1[$cont])) {
                                $persona->nombres = strtoupper($this->nombres1[$cont]);
                            }
                            if (isset($this->ape_paterno1[$cont])) {
                                $persona->ape_paterno = strtoupper($this->ape_paterno1[$cont]);
                            }
                            if (isset($this->ape_materno1[$cont])) {
                                $persona->ape_materno = strtoupper($this->ape_materno1[$cont]);
                            }
                            $persona->tipo_funcion = 1;
                            $persona->save();

                            $titular = new Titular();
                            $titular->id_ficha = $ficha->id_ficha;
                            $titular->id_persona = $persona->id_persona;

                            $titular->nume_titular = $cont + 1;



                            if (isset($this->form_adquisicion[$cont])) {
                                $titular->form_adquisicion = $this->form_adquisicion[$cont];
                            }


                            if (isset($this->fecha_adquisicion[$cont])) {
                                $titular->fecha_adquisicion = $this->fecha_adquisicion[$cont];
                            }

                            if (isset($this->porc_cotitular[$cont])) {
                                $titular->porc_cotitular = $this->porc_cotitular[$cont];
                            }

                            if (isset($this->faxconductor[$cont])) {
                                $titular->fax = $this->faxconductor[$cont];
                            }

                            if (isset($this->telefonoconductor[$cont])) {
                                $titular->telf = $this->telefonoconductor[$cont];
                            }

                            if (isset($this->anexoconductor[$cont])) {
                                $titular->anexo = $this->anexoconductor[$cont];
                            }

                            if (isset($this->emailconductor[$cont])) {
                                $titular->email = $this->emailconductor[$cont];
                            }

                            if (isset($this->codi_contribuyente[$cont])) {
                                $titular->codi_contribuyente = $this->codi_contribuyente[$cont];
                            }
                            if (isset($this->condicion[$cont])) {
                                $titular->cond_titular = "05";
                            }
                            $titular->save();




                            $exoneracion = new ExoneracionTitular();
                            $exoneracion->id_ficha = $ficha->id_ficha;
                            $exoneracion->id_persona = $persona->id_persona;
                            if (isset($this->condicion[$cont])) {
                                $exoneracion->condicion = $this->condicion[$cont];
                            }
                            if (isset($this->nume_resolucion[$cont])) {
                                $exoneracion->nume_resolucion = $this->nume_resolucion[$cont];
                            }
                            if (isset($this->fecha_inicio[$cont])) {
                                $exoneracion->fecha_inicio = $this->fecha_inicio[$cont];
                            }
                            if (isset($this->fecha_vencimiento[$cont])) {
                                $exoneracion->fecha_vencimiento = $this->fecha_vencimiento[$cont];
                            }
                            $exoneracion->save();

                            $domicilio = new DomicilioTitular();
                            $domicilio->id_ficha = $ficha->id_ficha;
                            $domicilio->id_persona = $persona->id_persona;
                            if (isset($this->codigoviaconductor[$cont])) {
                                $domicilio->codi_via = $this->codigoviaconductor[$cont];
                            }
                            if (isset($this->tipoviaconductor[$cont])) {
                                $domicilio->tipo_via = strtoupper($this->tipoviaconductor[$cont]);
                            }
                            if (isset($this->nombreviaconductor[$cont])) {
                                $domicilio->nomb_via = strtoupper($this->nombreviaconductor[$cont]);
                            }
                            if (isset($this->nmunicipalconductor[$cont])) {
                                $domicilio->nume_muni = $this->nmunicipalconductor[$cont];
                            }
                            if (isset($this->nomb_edificacionconductor[$cont])) {
                                $domicilio->nomb_edificacion = strtoupper($this->nomb_edificacionconductor[$cont]);
                            }
                            if (isset($this->ninteriorconductor[$cont])) {
                                $domicilio->nume_interior = $this->ninteriorconductor[$cont];
                            }
                            if (isset($this->codigohurbanoconductor[$cont])) {
                                $domicilio->codi_hab_urba = $this->codigohurbanoconductor[$cont];
                            }
                            if (isset($this->nombrehhurbanaconductor[$cont])) {
                                $domicilio->nomb_hab_urba = strtoupper($this->nombrehhurbanaconductor[$cont]);
                            }
                            if (isset($this->zonaconductor[$cont])) {
                                $domicilio->sector = $this->zonaconductor[$cont];
                            }
                            if (isset($this->manzanaconductor[$cont])) {
                                $domicilio->mzna = $this->manzanaconductor[$cont];
                            }
                            if (isset($this->loteconductor[$cont])) {
                                $domicilio->lote = $this->loteconductor[$cont];
                            }
                            if (isset($this->subloteconductor[$cont])) {
                                $domicilio->sublote = $this->subloteconductor[$cont];
                            }
                            if (isset($this->deparamentoconductor[$cont])) {
                                $domicilio->codi_dep = $this->deparamentoconductor[$cont];
                            }
                            if (isset($this->provinciaconductor[$cont])) {
                                $domicilio->codi_pro = $this->provinciaconductor[$cont];
                            }
                            if (isset($this->distritoconductor[$cont])) {
                                $domicilio->codi_dis = $this->distritoconductor[$cont];
                            }
                            $domicilio->save();
                        } else {
                            $persona = new Persona();
                            if ($this->numedoc1[$cont] == "") {
                                $cantidadpersona = Persona::where('tipo_persona', 1)->count() + 1;
                                $persona->id_persona = str_pad($cantidadpersona, 8, '0', STR_PAD_LEFT) . '11' . $this->tipo_doc1[$cont];
                                $persona->nume_doc = "";
                            } else {
                                $perr = $this->numedoc1[$cont];
                                $persona->id_persona = str_pad($perr, 8, '0', STR_PAD_LEFT) . '11' . $this->tipo_doc1[$cont];
                                $persona->nume_doc = str_pad($perr, 8, '0', STR_PAD_LEFT);
                            }
                            $persona->tipo_doc = $this->tipo_doc1[$cont];
                            $persona->tipo_persona = 1;

                            if (isset($this->nombres1[$cont])) {
                                $persona->nombres = strtoupper($this->nombres1[$cont]);
                            }
                            if (isset($this->ape_paterno1[$cont])) {
                                $persona->ape_paterno = strtoupper($this->ape_paterno1[$cont]);
                            }
                            if (isset($this->ape_materno1[$cont])) {
                                $persona->ape_materno = strtoupper($this->ape_materno1[$cont]);
                            }
                            $persona->tipo_funcion = 1;
                            $persona->save();

                            $titular = new Titular();
                            $titular->id_ficha = $ficha->id_ficha;
                            $titular->id_persona = $persona->id_persona;

                            $titular->nume_titular = $cont + 1;

                            if (isset($this->form_adquisicion[$cont])) {
                                $titular->form_adquisicion = $this->form_adquisicion[$cont];
                            }


                            if (isset($this->fecha_adquisicion[$cont])) {
                                $titular->fecha_adquisicion = $this->fecha_adquisicion[$cont];
                            }

                            if (isset($this->porc_cotitular[$cont])) {
                                $titular->porc_cotitular = $this->porc_cotitular[$cont];
                            }

                            if (isset($this->faxconductor[$cont])) {
                                $titular->fax = $this->faxconductor[$cont];
                            }

                            if (isset($this->telefonoconductor[$cont])) {
                                $titular->telf = $this->telefonoconductor[$cont];
                            }

                            if (isset($this->anexoconductor[$cont])) {
                                $titular->anexo = $this->anexoconductor[$cont];
                            }

                            if (isset($this->emailconductor[$cont])) {
                                $titular->email = $this->emailconductor[$cont];
                            }
                            if (isset($this->codi_contribuyente[$cont])) {
                                $titular->codi_contribuyente = $this->codi_contribuyente[$cont];
                            }
                            if (isset($this->condicion[$cont])) {
                                $titular->cond_titular = $this->condicion[$cont];
                            }

                            $titular->save();

                            $exoneracion = new ExoneracionTitular();
                            $exoneracion->id_ficha = $ficha->id_ficha;
                            $exoneracion->id_persona = $persona->id_persona;
                            if (isset($this->condicion[$cont])) {
                                $exoneracion->condicion = $this->condicion[$cont];
                            }
                            if (isset($this->nume_resolucion[$cont])) {
                                $exoneracion->nume_resolucion = $this->nume_resolucion[$cont];
                            }
                            if (isset($this->fecha_inicio[$cont])) {
                                $exoneracion->fecha_inicio = $this->fecha_inicio[$cont];
                            }
                            if (isset($this->fecha_vencimiento[$cont])) {
                                $exoneracion->fecha_vencimiento = $this->fecha_vencimiento[$cont];
                            }
                            $exoneracion->save();

                            $domicilio = new DomicilioTitular();
                            $domicilio->id_ficha = $ficha->id_ficha;
                            $domicilio->id_persona = $persona->id_persona;
                            if (isset($this->codigoviaconductor[$cont])) {
                                $domicilio->codi_via = $this->codigoviaconductor[$cont];
                            }
                            if (isset($this->tipoviaconductor[$cont])) {
                                $domicilio->tipo_via = strtoupper($this->tipoviaconductor[$cont]);
                            }
                            if (isset($this->nombreviaconductor[$cont])) {
                                $domicilio->nomb_via = strtoupper($this->nombreviaconductor[$cont]);
                            }
                            if (isset($this->nmunicipalconductor[$cont])) {
                                $domicilio->nume_muni = $this->nmunicipalconductor[$cont];
                            }
                            if (isset($this->nomb_edificacionconductor[$cont])) {
                                $domicilio->nomb_edificacion = strtoupper($this->nomb_edificacionconductor[$cont]);
                            }
                            if (isset($this->ninteriorconductor[$cont])) {
                                $domicilio->nume_interior = $this->ninteriorconductor[$cont];
                            }
                            if (isset($this->codigohurbanoconductor[$cont])) {
                                $domicilio->codi_hab_urba = $this->codigohurbanoconductor[$cont];
                            }
                            if (isset($this->nombrehhurbanaconductor[$cont])) {
                                $domicilio->nomb_hab_urba = strtoupper($this->nombrehhurbanaconductor[$cont]);
                            }
                            if (isset($this->zonaconductor[$cont])) {
                                $domicilio->sector = $this->zonaconductor[$cont];
                            }
                            if (isset($this->manzanaconductor[$cont])) {
                                $domicilio->mzna = $this->manzanaconductor[$cont];
                            }
                            if (isset($this->loteconductor[$cont])) {
                                $domicilio->lote = $this->loteconductor[$cont];
                            }
                            if (isset($this->subloteconductor[$cont])) {
                                $domicilio->sublote = $this->subloteconductor[$cont];
                            }
                            if (isset($this->deparamentoconductor[$cont])) {
                                $domicilio->codi_dep = $this->deparamentoconductor[$cont];
                            }
                            if (isset($this->provinciaconductor[$cont])) {
                                $domicilio->codi_pro = $this->provinciaconductor[$cont];
                            }
                            if (isset($this->distritoconductor[$cont])) {
                                $domicilio->codi_dis = $this->distritoconductor[$cont];
                            }
                            $domicilio->save();
                        }
                    } else {
                        $this->numedoc1[$cont] = "";
                        $persona = new Persona();
                        if ($this->numedoc1[$cont] == "") {
                            $cantidadpersona = Persona::where('tipo_persona', 1)->count() + 1;
                            $persona->id_persona = str_pad($cantidadpersona, 8, '0', STR_PAD_LEFT) . '11' . $this->tipo_doc1[$cont];
                            $persona->nume_doc = "";
                        } else {
                            $perr = $this->numedoc1[$cont];
                            $persona->id_persona = str_pad($perr, 8, '0', STR_PAD_LEFT) . '11' . $this->tipo_doc1[$cont];
                            $persona->nume_doc = str_pad($perr, 8, '0', STR_PAD_LEFT);
                        }
                        $persona->tipo_doc = $this->tipo_doc1[$cont];
                        $persona->tipo_persona = 1;
                        if (isset($this->nombres1[$cont])) {
                            $persona->nombres = strtoupper($this->nombres1[$cont]);
                        }
                        if (isset($this->ape_paterno1[$cont])) {
                            $persona->ape_paterno = strtoupper($this->ape_paterno1[$cont]);
                        }
                        if (isset($this->ape_materno1[$cont])) {
                            $persona->ape_materno = strtoupper($this->ape_materno1[$cont]);
                        }
                        $persona->tipo_funcion = 1;
                        $persona->save();
                        $titular = new Titular();
                        $titular->id_ficha = $ficha->id_ficha;
                        $titular->id_persona = $persona->id_persona;

                        $titular->nume_titular = $cont + 1;

                        if (isset($this->form_adquisicion[$cont])) {
                            $titular->form_adquisicion = $this->form_adquisicion[$cont];
                        }


                        if (isset($this->fecha_adquisicion[$cont])) {
                            $titular->fecha_adquisicion = $this->fecha_adquisicion[$cont];
                        }

                        if (isset($this->porc_cotitular[$cont])) {
                            $titular->porc_cotitular = $this->porc_cotitular[$cont];
                        }

                        if (isset($this->faxconductor[$cont])) {
                            $titular->fax = $this->faxconductor[$cont];
                        }

                        if (isset($this->telefonoconductor[$cont])) {
                            $titular->telf = $this->telefonoconductor[$cont];
                        }

                        if (isset($this->anexoconductor[$cont])) {
                            $titular->anexo = $this->anexoconductor[$cont];
                        }

                        if (isset($this->emailconductor[$cont])) {
                            $titular->email = $this->emailconductor[$cont];
                        }
                        if (isset($this->codi_contribuyente[$cont])) {
                            $titular->codi_contribuyente = $this->codi_contribuyente[$cont];
                        }
                        if (isset($this->condicion[$cont])) {
                            $titular->cond_titular = $this->condicion[$cont];
                        }

                        $titular->save();

                        $exoneracion = new ExoneracionTitular();
                        $exoneracion->id_ficha = $ficha->id_ficha;
                        $exoneracion->id_persona = $persona->id_persona;
                        if (isset($this->condicion[$cont])) {
                            $exoneracion->condicion = $this->condicion[$cont];
                        }
                        if (isset($this->nume_resolucion[$cont])) {
                            $exoneracion->nume_resolucion = $this->nume_resolucion[$cont];
                        }
                        if (isset($this->fecha_inicio[$cont])) {
                            $exoneracion->fecha_inicio = $this->fecha_inicio[$cont];
                        }
                        if (isset($this->fecha_vencimiento[$cont])) {
                            $exoneracion->fecha_vencimiento = $this->fecha_vencimiento[$cont];
                        }
                        $exoneracion->save();

                        $domicilio = new DomicilioTitular();
                        $domicilio->id_ficha = $ficha->id_ficha;
                        $domicilio->id_persona = $persona->id_persona;
                        if (isset($this->codigoviaconductor[$cont])) {
                            $domicilio->codi_via = $this->codigoviaconductor[$cont];
                        }
                        if (isset($this->tipoviaconductor[$cont])) {
                            $domicilio->tipo_via = strtoupper($this->tipoviaconductor[$cont]);
                        }
                        if (isset($this->nombreviaconductor[$cont])) {
                            $domicilio->nomb_via = strtoupper($this->nombreviaconductor[$cont]);
                        }
                        if (isset($this->nmunicipalconductor[$cont])) {
                            $domicilio->nume_muni = $this->nmunicipalconductor[$cont];
                        }
                        if (isset($this->nomb_edificacionconductor[$cont])) {
                            $domicilio->nomb_edificacion = strtoupper($this->nomb_edificacionconductor[$cont]);
                        }
                        if (isset($this->ninteriorconductor[$cont])) {
                            $domicilio->nume_interior = $this->ninteriorconductor[$cont];
                        }
                        if (isset($this->codigohurbanoconductor[$cont])) {
                            $domicilio->codi_hab_urba = $this->codigohurbanoconductor[$cont];
                        }
                        if (isset($this->nombrehhurbanaconductor[$cont])) {
                            $domicilio->nomb_hab_urba = strtoupper($this->nombrehhurbanaconductor[$cont]);
                        }
                        if (isset($this->zonaconductor[$cont])) {
                            $domicilio->sector = $this->zonaconductor[$cont];
                        }
                        if (isset($this->manzanaconductor[$cont])) {
                            $domicilio->mzna = $this->manzanaconductor[$cont];
                        }
                        if (isset($this->loteconductor[$cont])) {
                            $domicilio->lote = $this->loteconductor[$cont];
                        }
                        if (isset($this->subloteconductor[$cont])) {
                            $domicilio->sublote = $this->subloteconductor[$cont];
                        }
                        if (isset($this->deparamentoconductor[$cont])) {
                            $domicilio->codi_dep = $this->deparamentoconductor[$cont];
                        }
                        if (isset($this->provinciaconductor[$cont])) {
                            $domicilio->codi_pro = $this->provinciaconductor[$cont];
                        }
                        if (isset($this->distritoconductor[$cont])) {
                            $domicilio->codi_dis = $this->distritoconductor[$cont];
                        }
                        $domicilio->save();
                    }
                }
                if ($this->tipoTitular[$cont] == 2) {
                    if (isset($this->numedoc3[$cont])) {
                        $buscarruc = Persona::where('tipo_persona', 2)->where('tipo_funcion', 1)->where('nume_doc', $this->numedoc3[$cont])->first();

                        if ($buscarruc != "") {
                            $persona = $buscarruc;
                            $persona->tipo_doc = $this->tipo_doc1[$cont];
                            $persona->tipo_persona = 2;
                            $persona->tipo_funcion = 1;
                            $persona->razon_social = $this->razon_social[$cont];
                            $persona->save();

                            $titular = new Titular();
                            $titular->id_ficha = $ficha->id_ficha;
                            $titular->id_persona = $persona->id_persona;
                            $titular->nume_titular = $cont;
                            $titular->save();


                            if (isset($this->form_adquisicion[$cont])) {
                                $titular->form_adquisicion = $this->form_adquisicion[$cont];
                            }


                            if (isset($this->fecha_adquisicion[$cont])) {
                                $titular->fecha_adquisicion = $this->fecha_adquisicion[$cont];
                            }

                            if (isset($this->porc_cotitular[$cont])) {
                                $titular->porc_cotitular = $this->porc_cotitular[$cont];
                            }
                            if (isset($this->faxconductor[$cont])) {
                                $titular->fax = $this->faxconductor[$cont];
                            }
                            if (isset($this->telefonoconductor[$cont])) {
                                $titular->telf = $this->telefonoconductor[$cont];
                            }
                            if (isset($this->anexoconductor[$cont])) {
                                $titular->anexo = $this->anexoconductor[$cont];
                            }
                            if (isset($this->emailconductor[$cont])) {
                                $titular->email = $this->emailconductor[$cont];
                            }
                            if (isset($this->codi_contribuyente[$cont])) {
                                $titular->codi_contribuyente = $this->codi_contribuyente[$cont];
                            }
                            if (isset($this->condicion[$cont])) {
                                $titular->cond_titular = $this->condicion[$cont];
                            }
                            $titular->save();
                            $exoneracion = new ExoneracionTitular();
                            $exoneracion->id_ficha = $ficha->id_ficha;
                            $exoneracion->id_persona = $persona->id_persona;
                            if (isset($this->condicion[$cont])) {
                                $exoneracion->condicion = $this->condicion[$cont];
                            }
                            if (isset($this->nume_resolucion[$cont])) {
                                $exoneracion->nume_resolucion = $this->nume_resolucion[$cont];
                            }
                            if (isset($this->fecha_inicio[$cont])) {
                                $exoneracion->fecha_inicio = $this->fecha_inicio[$cont];
                            }
                            if (isset($this->fecha_vencimiento[$cont])) {
                                $exoneracion->fecha_vencimiento = $this->fecha_vencimiento[$cont];
                            }
                            $exoneracion->save();

                            $domicilio = new DomicilioTitular();
                            $domicilio->id_ficha = $ficha->id_ficha;
                            $domicilio->id_persona = $persona->id_persona;
                            if (isset($this->codigoviaconductor[$cont])) {
                                $domicilio->codi_via = $this->codigoviaconductor[$cont];
                            }
                            if (isset($this->tipoviaconductor[$cont])) {
                                $domicilio->tipo_via = strtoupper($this->tipoviaconductor[$cont]);
                            }
                            if (isset($this->nombreviaconductor[$cont])) {
                                $domicilio->nomb_via = strtoupper($this->nombreviaconductor[$cont]);
                            }
                            if (isset($this->nmunicipalconductor[$cont])) {
                                $domicilio->nume_muni = $this->nmunicipalconductor[$cont];
                            }
                            if (isset($this->nomb_edificacionconductor[$cont])) {
                                $domicilio->nomb_edificacion = strtoupper($this->nomb_edificacionconductor[$cont]);
                            }
                            if (isset($this->ninteriorconductor[$cont])) {
                                $domicilio->nume_interior = $this->ninteriorconductor[$cont];
                            }
                            if (isset($this->codigohurbanoconductor[$cont])) {
                                $domicilio->codi_hab_urba = $this->codigohurbanoconductor[$cont];
                            }
                            if (isset($this->nombrehhurbanaconductor[$cont])) {
                                $domicilio->nomb_hab_urba = strtoupper($this->nombrehhurbanaconductor[$cont]);
                            }
                            if (isset($this->zonaconductor[$cont])) {
                                $domicilio->sector = $this->zonaconductor[$cont];
                            }
                            if (isset($this->manzanaconductor[$cont])) {
                                $domicilio->mzna = $this->manzanaconductor[$cont];
                            }
                            if (isset($this->loteconductor[$cont])) {
                                $domicilio->lote = $this->loteconductor[$cont];
                            }
                            if (isset($this->subloteconductor[$cont])) {
                                $domicilio->sublote = $this->subloteconductor[$cont];
                            }
                            if (isset($this->deparamentoconductor[$cont])) {
                                $domicilio->codi_dep = $this->deparamentoconductor[$cont];
                            }
                            if (isset($this->provinciaconductor[$cont])) {
                                $domicilio->codi_pro = $this->provinciaconductor[$cont];
                            }
                            if (isset($this->distritoconductor[$cont])) {
                                $domicilio->codi_dis = $this->distritoconductor[$cont];
                            }
                            $domicilio->save();
                        } else {
                            $persona = new Persona();
                            if ($this->numedoc3[$cont] == "") {
                                $cantidadpersona = Persona::where('tipo_persona', 1)->count() + 1;
                                $persona->id_persona = str_pad($cantidadpersona, 11, '0', STR_PAD_LEFT) . '1200';
                                $persona->nume_doc = "";
                            } else {
                                $rruc = $this->numedoc3[$cont];
                                $persona->id_persona = str_pad($rruc, 11, '0', STR_PAD_LEFT) . '1200';
                                $persona->nume_doc = str_pad($rruc, 11, '0', STR_PAD_LEFT);
                            }
                            $persona->tipo_doc = $this->tipo_doc1[$cont];
                            $persona->tipo_persona = 2;
                            $persona->tipo_funcion = 1;
                            $persona->razon_social = $this->razon_social[$cont];
                            $persona->save();

                            $titular = new Titular();
                            $titular->id_ficha = $ficha->id_ficha;
                            $titular->id_persona = $persona->id_persona;
                            if (isset($this->form_adquisicion[$cont])) {
                                $titular->form_adquisicion = $this->form_adquisicion[$cont];
                            }
                            if (isset($this->fecha_adquisicion[$cont])) {
                                $titular->fecha_adquisicion = $this->fecha_adquisicion[$cont];
                            }
                            if (isset($this->porc_cotitular[$cont])) {
                                $titular->porc_cotitular = $this->porc_cotitular[$cont];
                            }
                            if (isset($this->faxconductor[$cont])) {
                                $titular->fax = $this->faxconductor[$cont];
                            }
                            if (isset($this->telefonoconductor[$cont])) {
                                $titular->telf = $this->telefonoconductor[$cont];
                            }
                            if (isset($this->anexoconductor[$cont])) {
                                $titular->anexo = $this->anexoconductor[$cont];
                            }
                            if (isset($this->emailconductor[$cont])) {
                                $titular->email = $this->emailconductor[$cont];
                            }
                            if (isset($this->codi_contribuyente[$cont])) {
                                $titular->codi_contribuyente = $this->codi_contribuyente[$cont];
                            }
                            if (isset($this->condicion[$cont])) {
                                $titular->cond_titular = $this->condicion[$cont];
                            }
                            $titular->save();
                            $exoneracion = new ExoneracionTitular();
                            $exoneracion->id_ficha = $ficha->id_ficha;
                            $exoneracion->id_persona = $persona->id_persona;
                            if (isset($this->condicion[$cont])) {
                                $exoneracion->condicion = $this->condicion[$cont];
                            }
                            if (isset($this->nume_resolucion[$cont])) {
                                $exoneracion->nume_resolucion = $this->nume_resolucion[$cont];
                            }
                            if (isset($this->fecha_inicio[$cont])) {
                                $exoneracion->fecha_inicio = $this->fecha_inicio[$cont];
                            }
                            if (isset($this->fecha_vencimiento[$cont])) {
                                $exoneracion->fecha_vencimiento = $this->fecha_vencimiento[$cont];
                            }
                            $exoneracion->save();

                            $domicilio = new DomicilioTitular();
                            $domicilio->id_ficha = $ficha->id_ficha;
                            $domicilio->id_persona = $persona->id_persona;
                            if (isset($this->codigoviaconductor[$cont])) {
                                $domicilio->codi_via = $this->codigoviaconductor[$cont];
                            }
                            if (isset($this->tipoviaconductor[$cont])) {
                                $domicilio->tipo_via = strtoupper($this->tipoviaconductor[$cont]);
                            }
                            if (isset($this->nombreviaconductor[$cont])) {
                                $domicilio->nomb_via = strtoupper($this->nombreviaconductor[$cont]);
                            }
                            if (isset($this->nmunicipalconductor[$cont])) {
                                $domicilio->nume_muni = $this->nmunicipalconductor[$cont];
                            }
                            if (isset($this->nomb_edificacionconductor[$cont])) {
                                $domicilio->nomb_edificacion = strtoupper($this->nomb_edificacionconductor[$cont]);
                            }
                            if (isset($this->ninteriorconductor[$cont])) {
                                $domicilio->nume_interior = $this->ninteriorconductor[$cont];
                            }
                            if (isset($this->codigohurbanoconductor[$cont])) {
                                $domicilio->codi_hab_urba = $this->codigohurbanoconductor[$cont];
                            }
                            if (isset($this->nombrehhurbanaconductor[$cont])) {
                                $domicilio->nomb_hab_urba = strtoupper($this->nombrehhurbanaconductor[$cont]);
                            }
                            if (isset($this->zonaconductor[$cont])) {
                                $domicilio->sector = $this->zonaconductor[$cont];
                            }
                            if (isset($this->manzanaconductor[$cont])) {
                                $domicilio->mzna = $this->manzanaconductor[$cont];
                            }
                            if (isset($this->loteconductor[$cont])) {
                                $domicilio->lote = $this->loteconductor[$cont];
                            }
                            if (isset($this->subloteconductor[$cont])) {
                                $domicilio->sublote = $this->subloteconductor[$cont];
                            }
                            if (isset($this->deparamentoconductor[$cont])) {
                                $domicilio->codi_dep = $this->deparamentoconductor[$cont];
                            }
                            if (isset($this->provinciaconductor[$cont])) {
                                $domicilio->codi_pro = $this->provinciaconductor[$cont];
                            }
                            if (isset($this->distritoconductor[$cont])) {
                                $domicilio->codi_dis = $this->distritoconductor[$cont];
                            }
                            $domicilio->save();
                        }
                    } else {
                        $this->numedoc3[$cont] = "";
                        $persona = new Persona();
                        if ($this->numedoc3[$cont] == "") {
                            $cantidadpersona = Persona::where('tipo_persona', 1)->count() + 1;
                            $persona->id_persona = str_pad($cantidadpersona, 11, '0', STR_PAD_LEFT) . '1200';
                            $persona->nume_doc = "";
                        } else {
                            $rruc = $this->numedoc3[$cont];
                            $persona->id_persona = str_pad($rruc, 11, '0', STR_PAD_LEFT) . '1200';
                            $persona->nume_doc = str_pad($rruc, 11, '0', STR_PAD_LEFT);
                        }
                        $persona->tipo_doc = $this->tipo_doc1[$cont];
                        $persona->tipo_persona = 2;
                        $persona->tipo_funcion = 1;
                        $persona->razon_social = $this->razon_social[$cont];
                        $persona->save();

                        $titular = new Titular();
                        $titular->id_ficha = $ficha->id_ficha;
                        $titular->id_persona = $persona->id_persona;
                        if (isset($this->form_adquisicion[$cont])) {
                            $titular->form_adquisicion = $this->form_adquisicion[$cont];
                        }
                        if (isset($this->fecha_adquisicion[$cont])) {
                            $titular->fecha_adquisicion = $this->fecha_adquisicion[$cont];
                        }
                        if (isset($this->porc_cotitular[$cont])) {
                            $titular->porc_cotitular = $this->porc_cotitular[$cont];
                        }
                        if (isset($this->faxconductor[$cont])) {
                            $titular->fax = $this->faxconductor[$cont];
                        }
                        if (isset($this->telefonoconductor[$cont])) {
                            $titular->telf = $this->telefonoconductor[$cont];
                        }
                        if (isset($this->anexoconductor[$cont])) {
                            $titular->anexo = $this->anexoconductor[$cont];
                        }
                        if (isset($this->emailconductor[$cont])) {
                            $titular->email = $this->emailconductor[$cont];
                        }
                        if (isset($this->codi_contribuyente[$cont])) {
                            $titular->codi_contribuyente = $this->codi_contribuyente[$cont];
                        }
                        if (isset($this->condicion[$cont])) {
                            $titular->cond_titular = $this->condicion[$cont];
                        }
                        $titular->save();
                        $exoneracion = new ExoneracionTitular();
                        $exoneracion->id_ficha = $ficha->id_ficha;
                        $exoneracion->id_persona = $persona->id_persona;
                        if (isset($this->condicion[$cont])) {
                            $exoneracion->condicion = $this->condicion[$cont];
                        }
                        if (isset($this->nume_resolucion[$cont])) {
                            $exoneracion->nume_resolucion = $this->nume_resolucion[$cont];
                        }
                        if (isset($this->fecha_inicio[$cont])) {
                            $exoneracion->fecha_inicio = $this->fecha_inicio[$cont];
                        }
                        if (isset($this->fecha_vencimiento[$cont])) {
                            $exoneracion->fecha_vencimiento = $this->fecha_vencimiento[$cont];
                        }
                        $exoneracion->save();

                        $domicilio = new DomicilioTitular();
                        $domicilio->id_ficha = $ficha->id_ficha;
                        $domicilio->id_persona = $persona->id_persona;
                        if (isset($this->codigoviaconductor[$cont])) {
                            $domicilio->codi_via = $this->codigoviaconductor[$cont];
                        }
                        if (isset($this->tipoviaconductor[$cont])) {
                            $domicilio->tipo_via = strtoupper($this->tipoviaconductor[$cont]);
                        }
                        if (isset($this->nombreviaconductor[$cont])) {
                            $domicilio->nomb_via = strtoupper($this->nombreviaconductor[$cont]);
                        }
                        if (isset($this->nmunicipalconductor[$cont])) {
                            $domicilio->nume_muni = $this->nmunicipalconductor[$cont];
                        }
                        if (isset($this->nomb_edificacionconductor[$cont])) {
                            $domicilio->nomb_edificacion = strtoupper($this->nomb_edificacionconductor[$cont]);
                        }
                        if (isset($this->ninteriorconductor[$cont])) {
                            $domicilio->nume_interior = $this->ninteriorconductor[$cont];
                        }
                        if (isset($this->codigohurbanoconductor[$cont])) {
                            $domicilio->codi_hab_urba = $this->codigohurbanoconductor[$cont];
                        }
                        if (isset($this->nombrehhurbanaconductor[$cont])) {
                            $domicilio->nomb_hab_urba = strtoupper($this->nombrehhurbanaconductor[$cont]);
                        }
                        if (isset($this->zonaconductor[$cont])) {
                            $domicilio->sector = $this->zonaconductor[$cont];
                        }
                        if (isset($this->manzanaconductor[$cont])) {
                            $domicilio->mzna = $this->manzanaconductor[$cont];
                        }
                        if (isset($this->loteconductor[$cont])) {
                            $domicilio->lote = $this->loteconductor[$cont];
                        }
                        if (isset($this->subloteconductor[$cont])) {
                            $domicilio->sublote = $this->subloteconductor[$cont];
                        }
                        if (isset($this->deparamentoconductor[$cont])) {
                            $domicilio->codi_dep = $this->deparamentoconductor[$cont];
                        }
                        if (isset($this->provinciaconductor[$cont])) {
                            $domicilio->codi_pro = $this->provinciaconductor[$cont];
                        }
                        if (isset($this->distritoconductor[$cont])) {
                            $domicilio->codi_dis = $this->distritoconductor[$cont];
                        }
                        $domicilio->save();
                    }
                }
                $cont++;
            }



            $fichaecotitularidad = new FichaCotitularidad();
            $fichaecotitularidad->id_ficha = $ficha->id_ficha;
            $fichaecotitularidad->cond_declarante = $this->cond_declarante;
            $fichaecotitularidad->esta_llenado = $this->esta_llenado;
            $fichaecotitularidad->observaciones = $this->observacion;
            $fichaecotitularidad->nume_ficha = str_pad($this->numeficha, 7, '0', STR_PAD_LEFT);
            $fichaecotitularidad->save();


            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('ficha.fichacreateotra', $ficha)
            ->with('success', 'Ficha Cotitularidad Agregado Correctamente.');
    }
    public function updatedNumeFichaLote($value)
    {
        if (!empty($this->nume_ficha_lote2) && $value > $this->nume_ficha_lote2) {
            $this->nume_ficha_lote = ''; 
        }
    }

    public function updatedNumeFichaLote2($value)
    {
        if (!empty($this->nume_ficha_lote) && $this->nume_ficha_lote > $value) {
            $this->nume_ficha_lote = ''; 
        }
    }


    public function render()
    {

        return view('livewire.ficha-cotitularidad-create');
    }
}
