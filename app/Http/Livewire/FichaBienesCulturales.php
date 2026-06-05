<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ficha;
use App\Models\Persona;
use App\Models\Institucion;
use App\Models\Titular;
use App\Models\FichaBienCultural;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Models\TipoArquitectura;
use App\Models\TipoMaterial;
use App\Models\AfectacionNatural;
use App\Models\AfectacionAntropicas;
use App\Models\Intervencion;
use App\Models\Monumento;
use App\Models\Colonial;
use App\Models\ElementoArquitectonico;
use App\Models\Sunarp;
use App\Models\NormaLegal;
use App\Models\EstadoElemento;
use App\Models\Litigante;
use DB;

class FichaBienesCulturales extends Component
{
    public $fichaanterior;
    public $tecnicos;
    public $supervisores;
    public $verificadores;

    public $numeficha;
    public $nume_ficha_lote;
    public $nume_ficha_lote2;
    public $codi_hoja_catastral;

    public $cat_inmueble;
    public $nombre_monumento;
    public $cod_monumento;
    public $tipo_area;
    public $area_monu;
    public $perimetro_monumento;
    public $fil_crono;
    public $presencia_arquitectura;

    public $cont = 0;
    public $tipo_arquitectura;

    public $cont1 = 0;
    public $tipo_mateconst;

    public $cont2 = 0;
    public $afe_natu;

    public $cont3 = 0;
    public $afe_antro;

    public $cont4 = 0;
    public $inter_cons;

    public $tipo_partida;
    public $nume_partida;
    public $fojas;
    public $asiento;
    public $fecha_inscripcion;

    public $cont5 = 0;
    public $normatividad;
    public $fecha_norma;
    public $numero_plano;

    public $observacion;

    public $inmueble_declarado;
    public $nombre_colonial;

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

    public $tipo_arquitectura2;
    public $uso_actual;
    public $uso_original;
    public $num_pisos;
    public $tipo_fecha;
    public $fecha_construccion;

    public $area_segun = 0;
    public $area_const = 0;
    public $area_libre = 0;

    public $cont6 = 0;
    public $identificacion_elementos;
    public $descripcion_fachada;
    public $descripcion_interior;

    public $filiacion_estilistica;
    public $cimientos_estado;
    public $muros_estado;
    public $pisos_estado;
    public $techos_estado;
    public $pilastras_estado;
    public $revestimiento_estado;
    public $balcones_estado;
    public $puertas_estado;
    public $ventanas_estado;
    public $rejas_estado;

    public $int_inmueble;
    public $resena_historica;

    public $tipo_partida1;
    public $nume_partida1;
    public $fojas1;
    public $asiento1;
    public $fecha_inscripcion1;

    #INFORMACION COMPLEMENTARIA
    public $tipolitigante;
    public $numedoc;
    public $nombres;
    public $ape_materno;
    public $cont7 = 0;
    public $ape_paterno;
    public $codi_contribuye;
    public $cond_declarante;
    public $esta_llenado;
    public $nume_habitantes;
    public $nume_familias;
    #INFORMACION COMPLEMENTARIA

    public $observacion1;
    public $cont8 = 0;
    public $normatividad1;
    public $fecha_norma1;
    public $numero_plano1;

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
    public $crc_rural;
    public $cond_titular;

    public function mount(Ficha $fichaanterior)
    {
        $this->fichaanterior = $fichaanterior;
        $this->tecnicos = Persona::where('tipo_funcion', 3)->orderBy('nombres', 'asc')->get();
        $this->supervisores = Persona::where('tipo_funcion', 2)->get();
        $this->verificadores = Persona::where('tipo_funcion', 4)->get();
    }

    public function render()
    {
        return view('livewire.ficha-bienes-culturales');
    }

    public function aumentarTipoArquitectura()
    {
        $this->cont++;
    }

    public function reducirTipoArquitectura()
    {
        $this->cont--;
    }

    public function aumentarTipoMaterial()
    {
        $this->cont1++;
    }

    public function reducirTipoMaterial()
    {
        $this->cont1--;
    }

    public function aumentarAfectacionNatural()
    {
        $this->cont2++;
    }

    public function reducirAfectacionNatural()
    {
        $this->cont2--;
    }

    public function aumentarAfectacionAntropicas()
    {
        $this->cont3++;
    }

    public function reducirAfectacionAntropicas()
    {
        $this->cont3--;
    }

    public function aumentarIntervension()
    {
        $this->cont4++;
    }

    public function reducirIntervension()
    {
        $this->cont4--;
    }

    public function aumentarnorma()
    {
        $this->cont5++;
    }

    public function reducirnorma()
    {
        $this->cont5--;
    }

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

    public function aumentarIdentifcacion()
    {
        $this->cont6++;
    }

    public function reducirIdentifcacion()
    {
        $this->cont6--;
    }

    /* INFORMACION COMPLEMENTARIA */

    public function updatednumedoc()
    {
        if ($this->cont7 > 0) {
            if ($this->tipolitigante[$this->cont7 - 1] == "02") {
                $dni = $this->numedoc[$this->cont7 - 1];
                $token = config('services.apisunat.token');
                $urldni = config('services.apisunat.urldni');
                $response = Http::withHeaders([
                    'Referer' => 'http://apis.net.pe/api-ruc',
                    'Authorization' => 'Bearer ' . $token
                ])->get($urldni . $dni);

                $persona = ($response->json());
                if (isset($persona['error']) || $persona == "") {
                    $this->nombres[$this->cont7 - 1] = "";
                    $this->ape_paterno[$this->cont7 - 1] = "";
                    $this->ape_materno[$this->cont7 - 1] = "";
                    $this->numedoc[$this->cont7 - 1] = $dni;
                    if (isset($persona['error'])) {
                        session()->flash('info.' . $this->cont7 - 1, 'Se necesita 8 digitos');
                    }
                    if ($persona == "") {
                        session()->flash('info.' . $this->cont7 - 1, 'No se encontro datos');
                    }
                } else {
                    $this->nombres[$this->cont7 - 1] = $persona['nombres'];
                    $this->ape_paterno[$this->cont7 - 1] = $persona['apellidoPaterno'];
                    $this->ape_materno[$this->cont7 - 1] = $persona['apellidoMaterno'];
                    $this->numedoc[$this->cont7 - 1] = $dni;
                }
            }
        }
    }

    public function updatednumeficha()
    {
        $this->numeficha = str_pad($this->numeficha, 7, '0', STR_PAD_LEFT);
    }
    public function aumentarinformacion()
    {
        $this->tipolitigante[$this->cont7] = "0";
        $this->numedoc[$this->cont7] = "";
        $this->cont7++;
    }

    public function reducirinformacion()
    {
        $this->cont7--;
    }

    /* INFORMACION COMPLEMENTARIA */

    public function aumentarnorma1()
    {
        $this->cont8++;
    }

    public function reducirnorma1()
    {
        $this->cont8--;
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

    public function register()
    {
        try {
            $this->validate([

                'numeficha'                                 => 'required|max:7|unique:tf_ficha_bien_cultural,nume_ficha',
                'nume_ficha_lote'                           => 'required|max:4',
                'nume_ficha_lote2'                          => 'required|max:5',
                'codi_hoja_catastral'                       => 'nullable|max:10',
                'cat_inmueble'                              => 'required',
                'nombre_monumento'                          => 'required|max:150',
                'cod_monumento'                             => 'nullable|max:15',
                'tipo_area'                                 => 'nullable',
                'area_monu'                                 => 'nullable|numeric',
                'perimetro_monumento'                       => 'nullable|numeric',
                'fil_crono'                                 => 'required',
                'observacion'                               => 'nullable|max:1000',
                'presencia_arquitectura'                    => 'nullable',

                'tipo_partida'                              => 'nullable',
                'nume_partida'                              => 'nullable|max:18',
                'fojas'                                     => 'nullable|max:18',
                'asiento'                                   => 'nullable|max:18',
                'fecha_inscripcion'                         => 'nullable|date',

                'inmueble_declarado'                        => 'required',
                'nombre_colonial'                           => 'nullable|max:150',
                'tipoTitular'                               => 'required',
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

                'tipo_arquitectura2'                        => 'nullable',
                'num_pisos'                                 => 'nullable',
                'tipo_fecha'                                => 'nullable',
                'fecha_construccion'                        => 'nullable|max:4',
                'uso_actual'                                => 'nullable|max:100',
                'uso_original'                              => 'nullable|max:100',
                'area_segun'                                => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                'area_const'                                => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
                'area_libre'                                => 'nullable|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',

                'descripcion_fachada'                       => 'nullable|max:350',
                'descripcion_interior'                      => 'nullable|max:350',

                'filiacion_estilistica'                     => 'nullable',
                'cimientos_estado'                          => 'nullable',
                'muros_estado'                              => 'nullable',
                'pisos_estado'                              => 'nullable',
                'techos_estado'                             => 'nullable',
                'pilastras_estado'                          => 'nullable',
                'revestimiento_estado'                      => 'nullable',
                'balcones_estado'                           => 'nullable',
                'puertas_estado'                            => 'nullable',
                'ventanas_estado'                           => 'nullable',
                'rejas_estado'                              => 'nullable',
                'int_inmueble'                              => 'nullable',
                'resena_historica'                          => 'nullable|max:350',

                'tipo_partida1'                             => 'nullable',
                'nume_partida1'                             => 'nullable|max:18',
                'fojas1'                                    => 'nullable|max:18',
                'asiento1'                                  => 'nullable|max:18',
                'fecha_inscripcion1'                        => 'nullable|date',

                'cond_declarante'                           => 'nullable',
                'nume_habitantes'                           => 'nullable|numeric',
                'nume_familias'                             => 'nullable|numeric',
                'esta_llenado'                              => 'required',
                'observacion1'                              => 'nullable|max:1000',

                'supervisor'                                => 'nullable',
                'fecha_supervision'                         => 'nullable|date',
                'tecnico'                                   => 'required',
                'fecha_levantamiento'           => 'required|date|before_or_equal:today',
                'verificador'                               => 'nullable',
                'nume_registro'                             => 'nullable|max:10',
                'fecha_verificacion'                        => 'nullable|date',

                'numdocumentodeclarante'                    => 'nullable|max:8',
                'nombres_declarante'                        => 'nullable|max:150',
                'apellido_paterno_declarante'               => 'nullable|max:50',
                'apellido_materno_declarante'               => 'nullable|max:50',
                'fecha_declarante'                          => 'nullable|date',

            ]);
            for ($i = 0; $i < $this->cont; $i++) {
                $this->validate([
                    'tipo_arquitectura.' . $i                     => 'required',
                ]);
            }
            for ($i = 0; $i < $this->cont1; $i++) {
                $this->validate([
                    'tipo_mateconst.' . $i                        => 'required',
                ]);
            }
            for ($i = 0; $i < $this->cont2; $i++) {
                $this->validate([
                    'afe_natu.' . $i                              => 'required',
                ]);
            }
            for ($i = 0; $i < $this->cont3; $i++) {
                $this->validate([
                    'afe_antro.' . $i                             => 'required',
                ]);
            }
            for ($i = 0; $i < $this->cont4; $i++) {
                $this->validate([
                    'inter_cons.' . $i                            => 'required',
                ]);
            }

            for ($i = 0; $i < $this->cont5; $i++) {
                $this->validate([
                    'normatividad.' . $i                          => 'required|max:20',
                    'fecha_norma.' . $i                           => 'nullable|date',
                    'numero_plano.' . $i                          => 'nullable|max:20',
                ]);
            }
            for ($i = 0; $i < $this->cont6; $i++) {
                $this->validate([
                    'identificacion_elementos.' . $i              => 'required',
                ]);
            }

            for ($i = 0; $i < $this->cont7; $i++) {
                $this->validate([
                    'tipolitigante.' . $i                         => 'required',
                    'numedoc.' . $i                               => 'required|max:17',
                    'nombres.' . $i                               => 'required|max:150',
                    'ape_paterno.' . $i                           => 'nullable|max:50',
                    'ape_materno.' . $i                           => 'nullable|max:50',
                    'codi_contribuye.' . $i                       => 'nullable|max:18',
                ]);
            }

            for ($i = 0; $i < $this->cont8; $i++) {
                $this->validate([
                    'normatividad1.' . $i                         => 'required|max:20',
                    'fecha_norma1.' . $i                          => 'nullable|date',
                    'numero_plano1.' . $i                         => 'nullable|max:20',
                ]);
            }

            DB::beginTransaction();

            $ubigeo = Institucion::first();

            $mytime = Carbon::now('America/Lima');

            $date = $mytime->format('Y');

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
            $ficha->id_ficha = $date . '' . str_pad($ubigeo->id_institucion, 6, '0', STR_PAD_LEFT) . '05' . str_pad($this->numeficha, 7, '0', STR_PAD_LEFT);
            $ficha->tipo_ficha = "05";
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


            if ($this->tipoTitular == 1) {
                $idpersonabuscar = str_pad($this->numedoc1, 8, '0', STR_PAD_LEFT) . '11' . $this->tipo_doc1;
                $buscarpersona2 = Persona::where('id_persona', $idpersonabuscar)->first();
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
                    $titular->porc_cotitular = 0.00;
                    $titular->esta_civil = $this->esta_civil1;
                    $titular->nume_titular = "TITULAR N° 1";
                    $titular->cond_titular = $this->cond_titular;
                    $titular->save();
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
                    $titular->porc_cotitular = 0.00;
                    $titular->esta_civil = $this->esta_civil1;
                    $titular->nume_titular = "TITULAR N° 1";
                    $titular->cond_titular = $this->cond_titular;
                    $titular->save();
                }
            } elseif ($this->tipoTitular == 2) {
                $idpersonabuscar = str_pad($this->numedoc3, 11, '0', STR_PAD_LEFT) . '1200';
                $buscarpersona3 = Persona::where('id_persona', $idpersonabuscar)->first();
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
                    $titular->porc_cotitular = 0.00;
                    $titular->cond_titular = $this->cond_titular;
                    $titular->save();
                } else {
                    $persona = new Persona();
                    if ($this->numedoc3 == "") {
                        $cantidadpersona = Persona::where('tipo_persona', 2)->count() + 1;
                        $persona->id_persona = str_pad($cantidadpersona, 11, '0', STR_PAD_LEFT) . '1200';
                        $persona->nume_doc = str_pad($cantidadpersona, 11, '0', STR_PAD_LEFT);
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
                    $titular->porc_cotitular = 0.00;
                    $titular->cond_titular = $this->cond_titular;
                    $titular->save();
                }
            }
            if ($this->esta_civil1 == '02' || $this->esta_civil1 == '04') {
                $idpersonabuscar = str_pad($this->numedoc2, 8, '0', STR_PAD_LEFT) . '1200';
                $buscarpersona4 = Persona::where('id_persona', $idpersonabuscar)->first();
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
                    $titular->porc_cotitular = 0.00;
                    $titular->esta_civil = $this->esta_civil1;
                    $titular->nume_titular = "TITULAR N° 2";
                    $titular->cond_titular = $this->cond_titular;
                    $titular->save();
                } else {
                    $persona2 = new Persona();
                    if ($this->numedoc3 == "") {
                        $cantidadpersona = Persona::where('tipo_persona', 1)->count() + 1;
                        $persona2->id_persona = str_pad($cantidadpersona, 8, '0', STR_PAD_LEFT) . '1200';
                        $persona2->nume_doc = str_pad($cantidadpersona, 8, '0', STR_PAD_LEFT);
                    } else {
                        $persona2->id_persona = str_pad($this->numedoc2, 8, '0', STR_PAD_LEFT) . '1200';
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
                    $titular->porc_cotitular = 0.00;
                    $titular->esta_civil = $this->esta_civil1;
                    $titular->nume_titular = "TITULAR N° 2";
                    $titular->cond_titular = $this->cond_titular;
                    $titular->save();
                }
            }


            $fichabiencultural = new FichaBienCultural();
            $fichabiencultural->id_ficha = $ficha->id_ficha;


            if (isset($this->crc_rural)) {
                if ($this->crc_rural != "") {
                    $fichabiencultural->crc_rural = strtoupper($this->crc_rural);
                }
            }
            if (isset($this->area_segun)) {
                if ($this->area_segun != "") {
                    $fichabiencultural->area_titulo = strtoupper($this->area_segun);
                }
            }
            if (isset($this->area_const)) {
                if ($this->area_const != "") {
                    $fichabiencultural->area_construido = $this->area_const;
                }
            }
            if (isset($this->area_libre)) {
                if ($this->area_libre != "") {
                    $fichabiencultural->area_libre = $this->area_libre;
                }
            }
            $fichabiencultural->descripcion_fachada = $this->descripcion_fachada;
            $fichabiencultural->descripcion_interior = $this->descripcion_interior;
            $fichabiencultural->filiacion_estilistica = $this->filiacion_estilistica;
            $fichabiencultural->intervencion_inmueble = $this->int_inmueble;
            $fichabiencultural->resena_historica = $this->resena_historica;
            $fichabiencultural->cond_declarante = $this->cond_declarante;
            $fichabiencultural->esta_llenado = $this->esta_llenado;
            if (isset($this->nume_habitantes)) {
                if ($this->nume_habitantes != "") {
                    $fichabiencultural->nume_habitantes = $this->nume_habitantes;
                }
            }
            if (isset($this->nume_familias)) {
                if ($this->nume_familias != "") {
                    $fichabiencultural->nume_familias = $this->nume_familias;
                }
            }
            $fichabiencultural->nume_ficha = str_pad($this->numeficha, 7, '0', STR_PAD_LEFT);
            $fichabiencultural->save();
            $contarq = 0;
            if ($this->tipo_arquitectura != "") {
                while (count($this->tipo_arquitectura) > $contarq) {
                    $separar = explode('_', $this->tipo_arquitectura[$contarq]);
                    $arquitectura = new TipoArquitectura();
                    $arquitectura->id_ficha = $ficha->id_ficha;
                    $arquitectura->codigo = $separar[0];
                    $arquitectura->descripcion = $separar[1];
                    $arquitectura->save();
                    $contarq++;
                }
            }
            $contmat = 0;
            if ($this->tipo_mateconst != "") {
                while (count($this->tipo_mateconst) > $contmat) {
                    $separar = explode('_', $this->tipo_mateconst[$contmat]);
                    $material = new TipoMaterial();
                    $material->id_ficha = $ficha->id_ficha;
                    $material->codigo = $separar[0];
                    $material->descripcion = $separar[1];
                    $material->save();
                    $contmat++;
                }
            }
            $contafn = 0;
            if ($this->afe_natu != "") {
                while (count($this->afe_natu) > $contafn) {
                    $separar = explode('_', $this->afe_natu[$contafn]);
                    $afectacionnatural = new AfectacionNatural();
                    $afectacionnatural->id_ficha = $ficha->id_ficha;
                    $afectacionnatural->codigo = $separar[0];
                    $afectacionnatural->descripcion = $separar[1];
                    $afectacionnatural->save();
                    $contafn++;
                }
            }

            $contafa = 0;
            if ($this->afe_antro != "") {
                while (count($this->afe_antro) > $contafa) {
                    $separar = explode('_', $this->afe_antro[$contafa]);
                    $afectacionnatural = new AfectacionAntropicas();
                    $afectacionnatural->id_ficha = $ficha->id_ficha;
                    $afectacionnatural->codigo = $separar[0];
                    $afectacionnatural->descripcion = $separar[1];
                    $afectacionnatural->save();
                    $contafa++;
                }
            }

            $contint = 0;
            if ($this->inter_cons != "") {
                while (count($this->inter_cons) > $contint) {
                    $separar = explode('_', $this->inter_cons[$contint]);
                    $afectacionnatural = new Intervencion();
                    $afectacionnatural->id_ficha = $ficha->id_ficha;
                    $afectacionnatural->codigo = $separar[0];
                    $afectacionnatural->descripcion = $separar[1];
                    $afectacionnatural->save();
                    $contint++;
                }
            }

            if ($this->tipo_partida != "") {
                $sunarp = new Sunarp();
                $sunarp->id_ficha = $ficha->id_ficha;
                $sunarp->tipo_partida = $this->tipo_partida;
                $sunarp->nume_partida = $this->nume_partida;
                $sunarp->fojas = $this->fojas;
                $sunarp->asiento = $this->asiento;

                if (isset($this->fecha_inscripcion)) {
                    if ($this->fecha_inscripcion != "") {
                        $sunarp->fecha_inscripcion = $this->fecha_inscripcion;
                    }
                }
                $sunarp->save();
            }

            $contnor = 0;
            if ($this->normatividad != "") {
                while (count($this->normatividad) > $contnor) {
                    $normalegal = new NormaLegal();
                    $normalegal->id_ficha = $ficha->id_ficha;
                    $normalegal->normatividad = $this->normatividad[$contnor];

                    if (isset($this->fecha_norma[$contnor])) {
                        if ($this->fecha_norma[$contnor] != "") {
                            $normalegal->fecha_norma = $this->fecha_norma[$contnor];
                        }
                    }





                    if (isset($this->numero_plano[$contnor])) {
                        $normalegal->numero_plano = $this->numero_plano[$contnor];
                    } else {
                        $normalegal->numero_plano = "";
                    }
                    $normalegal->tipo_norma = 1;
                    $normalegal->save();
                    $contnor++;
                }
            }

            $monumento = new Monumento();
            $monumento->id_ficha = $ficha->id_ficha;
            $monumento->cat_inmueble = $this->cat_inmueble;
            $monumento->nomb_monumento = strtoupper($this->nombre_monumento);
            $monumento->cod_monumento = $this->cod_monumento;
            $monumento->presencia_arquitectura = $this->presencia_arquitectura;
            $monumento->filiacion_cronologica = $this->fil_crono;
            $monumento->tipo_area = $this->tipo_area;



            if (isset($this->area_monu)) {
                if ($this->area_monu != "") {
                    $monumento->area_monu = $this->area_monu;
                }
            }

            if (isset($this->perimetro_monumento)) {
                if ($this->perimetro_monumento != "") {
                    $monumento->perimetro_monumento = $this->perimetro_monumento;
                }
            }





            $monumento->observaciones = $this->observacion;
            $monumento->save();

            $colonial = new Colonial();
            $colonial->id_ficha = $ficha->id_ficha;
            $colonial->inmueble_declarado = $this->inmueble_declarado;
            $colonial->nombre_colonial = strtoupper($this->nombre_colonial);
            $colonial->tipo_arquitectura = $this->tipo_arquitectura2;
            $colonial->uso_actual = $this->uso_actual;
            $colonial->uso_original = $this->uso_original;
            $colonial->num_pisos = $this->num_pisos;
            $colonial->tipo_fecha = $this->tipo_fecha;
            $colonial->fecha_construccion = $this->fecha_construccion;
            $colonial->observaciones = $this->observacion1;
            $colonial->save();


            $contelemt = 0;

            if ($this->identificacion_elementos != "") {
                while (count($this->identificacion_elementos) > $contelemt) {
                    $separar = explode('_', $this->identificacion_elementos[$contelemt]);
                    $elemento = new ElementoArquitectonico();
                    $elemento->id_ficha = $ficha->id_ficha;

                    $elemento->codigo = $separar[0];
                    $elemento->descripcion = $separar[1];
                    $elemento->save();
                    $contelemt++;
                }
            }

            if ($this->tipo_partida1 != "") {

                $sunarp = new Sunarp();
                $sunarp->id_ficha = $ficha->id_ficha;
                $sunarp->tipo_partida = $this->tipo_partida1;
                $sunarp->nume_partida = $this->nume_partida1;
                $sunarp->fojas = $this->fojas1;
                $sunarp->asiento = $this->asiento1;

                if (isset($this->fecha_inscripcion1)) {
                    if ($this->fecha_inscripcion1 != "") {
                        $sunarp->fecha_inscripcion = $this->fecha_inscripcion1;
                    }
                }
                $sunarp->save();
            }

            $contnor2 = 0;
            if ($this->normatividad1 != "") {
                while (count($this->normatividad1) > $contnor2) {
                    $normalegal = new NormaLegal();
                    $normalegal->id_ficha = $ficha->id_ficha;
                    $normalegal->normatividad = $this->normatividad1[$contnor2];
                    if (isset($this->fecha_norma1[$contnor2])) {
                        if ($this->fecha_norma1[$contnor2] != "") {
                            $normalegal->fecha_norma = $this->fecha_norma1[$contnor2];
                        }
                    }



                    if (isset($this->numero_plano1[$contnor2])) {
                        $normalegal->numero_plano = $this->numero_plano1[$contnor2];
                    } else {
                        $normalegal->numero_plano = "";
                    }
                    $normalegal->tipo_norma = 2;
                    $normalegal->save();
                    $contnor2++;
                }
            }

            if ($this->cimientos_estado != "" || $this->muros_estado != "" || $this->pisos_estado != "" || $this->techos_estado != "" || $this->pilastras_estado != "" || $this->revestimiento_estado != "" || $this->balcones_estado != "" || $this->puertas_estado != "" || $this->ventanas_estado != "" || $this->rejas_estado != "") {
                $estadoe = new EstadoElemento();
                $estadoe->id_ficha = $ficha->id_ficha;
                $estadoe->cimientos = $this->cimientos_estado;
                $estadoe->muros = $this->muros_estado;
                $estadoe->pisos = $this->pisos_estado;
                $estadoe->techos = $this->techos_estado;
                $estadoe->pilastras = $this->pilastras_estado;
                $estadoe->revestimiento = $this->revestimiento_estado;
                $estadoe->balcones = $this->balcones_estado;
                $estadoe->puertas = $this->puertas_estado;
                $estadoe->ventanas = $this->ventanas_estado;
                $estadoe->rejas = $this->rejas_estado;
                $estadoe->save();
            }

            $contlit = 0;
            $litigantes = $this->tipolitigante;
            if ($litigantes != "") {
                while ($contlit < count($litigantes)) {
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
                                $litigantepersona->nume_doc = $this->numedoc[$contlit];
                            } else {
                                $litigantepersona->nume_doc = "";
                            }

                            if (isset($this->tipolitigante[$contlit])) {
                                $litigantepersona->tipo_doc = $this->tipolitigante[$contlit];
                            } else {
                                $litigantepersona->tipo_doc = "";
                            }

                            if (isset($this->nombres[$contlit])) {
                                $litigantepersona->nombres = strtoupper($this->nombres[$contlit]);
                            } else {
                                $litigantepersona->nombres = "";
                            }

                            if (isset($this->ape_paterno[$contlit])) {
                                $litigantepersona->ape_paterno = strtoupper($this->ape_paterno[$contlit]);
                            } else {
                                $litigantepersona->ape_paterno = "";
                            }

                            if (isset($this->ape_materno[$contlit])) {
                                $litigantepersona->ape_materno = strtoupper($this->ape_materno[$contlit]);
                            } else {
                                $litigantepersona->ape_materno = "";
                            }



                            $litigantepersona->save();
                        }
                    }

                    $litigante = new Litigante();
                    $litigante->id_ficha = $ficha->id_ficha;
                    $litigante->id_persona = $litigantepersona->id_persona;


                    if (isset($this->codi_contribuye[$contlit])) {
                        $litigante->codi_contribuye = $this->codi_contribuye[$contlit];
                    } else {
                        $litigante->codi_contribuye = "";
                    }


                    $litigante->save();
                    $contlit++;
                }
            }


            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('reporte.reportelista')
            ->with('success', 'Ficha Bien Cultural Agregado Correctamente.');
    }
    public function updatedverificador($id)
    {
        $this->verificador2 = Persona::where('id_persona', $id)->first();
        if ($this->verificador2 == "") {
            $this->nume_registro = "";
        } else {
            $this->nume_registro = $this->verificador2->nregistro;
        }
    }
    public function updatedNumeFichaLote($value)
    {
        if (!empty($this->nume_ficha_lote2) && $value > $this->nume_ficha_lote2) {
            $this->nume_ficha_lote = ''; // Vacía el campo si el valor es mayor al segundo campo
        }
    }

    public function updatedNumeFichaLote2($value)
    {
        if (!empty($this->nume_ficha_lote) && $this->nume_ficha_lote > $value) {
            $this->nume_ficha_lote = ''; // Vacía el primer campo si el segundo es menor
        }
    }
}
