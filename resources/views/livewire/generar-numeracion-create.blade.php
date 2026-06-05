<div class="row">
    <form id="contact" method="POST" class="forms-sample" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="col-md-12 grid-margin stretch-card" >
        <div class="card">
            <div class="card-body">
                <div class="row">
                <h3 class="mb-4">Generar Certificado de Numeración</h3>
                    <div class="row form-group">
                        <h4 class="mb-4"> DATOS GENERALES</h4>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <input type="hidden" name="fichaanterior" value="{{$fichaanterior->id_ficha}}" >
                                <label class="form-label d-inline-flex" > NUMERACION</label>
                                <input type="text" class="form-control" placeholder="Numeracion" name="numeracion" wire:model.lazy="numeracion" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="7">
                                <input type="hidden" class="form-control" placeholder="id_uni_cat" name="id_uni_cat" wire:model.lazy="id_uni_cat">
                                <input type="hidden" class="form-control" placeholder="dc" name="dc" wire:model.lazy="dc">
                                <input type="hidden" class="form-control" placeholder="id_ficha" name="id_ficha" wire:model.lazy="id_ficha">
                                @error('numeracion')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row  form-group">
                        <div class="col-md-12 row" style="place-content: center;text-align: center;">
                            <label class="form-label d-inline-flex" > <div class="divcuadrorequired">3</div> CÓDIGO DE REFERENCIA CATASTRAL</label>
                            <div class="col-md-3 row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label labelpeque" >DPTO.</label>
                                    <input type="text" class="form-control" name="dpto" readonly value="08">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label labelpeque" >PROV.</label>
                                    <input type="text" class="form-control" name="prov" readonly value="01">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label labelpeque" >DIST.</label>
                                    <input type="text" class="form-control" name="dist" readonly value="08">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label class="form-label labelpeque d-inline-flex" >SECTOR</label>
                                    <input type="text" class="form-control" readonly placeholder="" name="lote" value="{{$fichaanterior->unicat->edificacion->lote->manzana->sectore->codi_sector}}">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label class="form-label labelpeque d-inline-flex" >MZNA</label>
                                    <input type="text" class="form-control" readonly placeholder="" name="lote" value="{{$fichaanterior->unicat->edificacion->lote->manzana->codi_mzna}}">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label class="form-label labelpeque d-inline-flex" >LOTE</label>
                                    <input type="text" class="form-control" readonly placeholder="" name="lote" value="{{$fichaanterior->unicat->edificacion->lote->codi_lote}}">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label class="form-label labelpeque d-inline-flex" >EDIFICA</label>
                                    <input type="text" class="form-control" readonly placeholder="" name="edifica" value="{{$fichaanterior->unicat->edificacion->codi_edificacion}} ">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label class="form-label labelpeque d-inline-flex" >ENTRADA</label>
                                    <input type="text" class="form-control" readonly placeholder="" name="entrada" value="{{$fichaanterior->unicat->codi_entrada}} ">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label class="form-label labelpeque d-inline-flex" >PISO</label>
                                    <input type="text" class="form-control"  readonly placeholder="" name="piso" value="{{$fichaanterior->unicat->codi_piso}} ">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label class="form-label labelpeque d-inline-flex" >UNIDAD</label>
                                    <input type="text" class="form-control" readonly placeholder="" name="unidad" value="{{$fichaanterior->unicat->codi_unidad}}">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label class="form-label labelpeque d-inline-flex" >DC</label>
                                    <input type="text" class="form-control" readonly placeholder="" name="dc" value="{{$fichaanterior->dc}} ">
                                </div>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <h4 class="mb-4"> UBICACION DEL PREDIO CATASTRAL</h4>
                        <div class="col-md-12 mb-5">
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadrorequired">5</div> CÓDIGO DE VIA
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">6</div> TIPO DE VIA
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">7</div> NOMBRE DE VIA
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadrorequired">8</div>TIPO DE PUERTA
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">9</div> CUADRA
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">10</div> INTERIOR
                                                </label></th>
                                            <th>
                                                @if($cont == 0)
                                                <button type="button" class="btn btn-success btn-icon" wire:click="aumentarUbicacion" tabindex="22">+</button>
                                                @else
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<$cont;$i++) <tr>
                                            <td>
                                                <select class="form-select" id="via_id{{$i}}" name="via_id[]" data-width="100%" wire:model="tipoVia.{{$i}}" data-live-search tabindex="18">
                                                    <option value="">Seleccione</option>
                                                    @foreach($vias as $via)
                                                    <option value="{{str_pad($via->id_via,12,'0',STR_PAD_LEFT)}}">{{$via->codi_via}} {{$via->tipo_via}} {{$via->nomb_via}}</option>
                                                    @endforeach
                                                </select>
                                                @error('tipoVia.'.$i)
                                                <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                {{$tipoViatipo[$i]}}
                                            </td>
                                            <td>
                                                {{$tipoVianombre[$i]}}
                                            </td>
                                            <td>
                                                <select class="form-select" data-width="100%" data-live-search="true" name="tipo_puerta[]" id="tipo_puerta.{{$i}}" wire:model="tipopuerta.{{$i}}" tabindex="18">
                                                    <option value="">SELECCIONE</option>
                                                    @foreach(\App\Models\TablaCodigo::where('id_tabla','=','TPR')->orderby('codigo','asc')->get() as $tablacodigo)
                                                    <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                                                    @endforeach
                                                </select>
                                                @error('tipopuerta.'.$i)
                                                <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="" name="cuadra[]" id="cuadra.{{$i}}" wire:model.defer="cuadra.{{$i}}" maxlength="20" tabindex="18">
                                                @error('cuadra.'.$i)
                                                <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="" name="interior[]" id="interior.{{$i}}" wire:model.defer="interior.{{$i}}" maxlength="20" tabindex="18">
                                                @error('interior.'.$i)
                                                <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                    @if($i==$cont-1)
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarUbicacion" tabindex="22">+</button>
                                                    @else
                                                    <button type="button" class="btn btn-danger btn-icon" wire:click="reducirUbicacion({{$i}})" tabindex="17">-</button>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">45</div> AREA DE TERRENO PROPIO DECLARADA (M2)
                                </label>
                                <input type="text" class="form-control" placeholder="" name="area_declarada" wire:model="area_declarada" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="8" tabindex="72">
                                @error('area_declarada')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">45</div> AREA DE TERRENO PROPIO VERIFICADA (M2)
                                </label>
                                <input type="text" class="form-control" placeholder="area" name="area_verificada" wire:model="area_verificada" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="8" tabindex="72">
                                @error('area_verificada')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">45</div> AREA DE TERRENO COMUN DECLARADA (M2)
                                </label>
                                <input type="text" class="form-control" placeholder="" name="porc_bc_terr_legal" wire:model="porc_bc_terr_legal" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="8" tabindex="72">
                                @error('porc_bc_terr_legal')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">45</div> AREA DE TERRENO COMUN VERIFICADA (M2)
                                </label>
                                <input type="text" class="form-control" placeholder="" name="porc_bc_terr_fisc" wire:model="porc_bc_terr_fisc" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="8" tabindex="72">
                                @error('porc_bc_terr_fisc')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div>

                    <div class="row form-group">
                        <h4 class="mb-4"> IDENTIFICACIÓN DEL TITULAR CATASTRAL</h4>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadro">20</div> TIPO DE TITULAR
                                    </label>
                                    <select class="form-select" data-width="100%" data-live-search="true" name="tipo_persona" id="tipo_persona" wire:model="tipoTitular" tabindex="32">
                                        <option value="">SELECCIONE</option>
                                        @foreach(\App\Models\TablaCodigo::where('id_tabla','=','TPE')->orderby('codigo','asc')->get() as $tablacodigo)
                                        <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('tipoTitular')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group" wire:ignore id="natural">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadro">21</div> ESTADO CIVIL
                                    </label>
                                    <select class="form-select" data-width="100%" data-live-search="true" name="esta_civil1" id="esta_civil1" wire:model="esta_civil1" tabindex="33">
                                        <option value="">SELECCIONE</option>
                                        @foreach(\App\Models\TablaCodigo::where('id_tabla','=','ECV')->orderby('codigo','asc')->get() as $tablacodigo)
                                        <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('esta_civil1')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadro">22</div> TIPO DOC. IDENTIDAD
                                    </label>
                                    <select class="form-select" data-width="100%" data-live-search="true" name="tipo_doc1" id="tipo_doc1" wire:model="tipo_doc1" tabindex="34">
                                        <option value="">SELECCIONE</option>
                                        @foreach(\App\Models\TablaCodigo::where('id_tabla','=','DOC')->orderby('codigo','asc')->get() as $tablacodigo)
                                        <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('tipo_doc1')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadro">23</div> N° DOC.
                                    </label>
                                    <input type="text" class="form-control" placeholder="" name="nume_doc1" id="nume_doc1" wire:model.lazy="numedoc1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" tabindex="35">
                                </div>
                                @error('numedoc1')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                                @if ($message = Session::get('success'))
                                <span class="error-message" style="color:red">{{ $message }}</span>
                                @endif
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">24</div> NOMBRES
                                </label>
                                <input type="text" class="form-control" placeholder="" name="nombres1" id="nombres1" wire:model="nombres1" onkeydown="return /[a-ñ. ;]/i.test(event.key)" tabindex="36">
                                @error('nombres1')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">25</div> APELLIDO PATERNO
                                </label>
                                <input type="text" class="form-control" placeholder="" name="ape_paterno1" id="ape_paterno1" wire:model="ape_paterno1" onkeydown="return /[a-ñ. ;]/i.test(event.key)" tabindex="37">
                                @error('ape_paterno1')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">26</div> APELLIDO MATERNO
                                </label>
                                <input type="text" class="form-control" placeholder="" name="ape_materno1" id="ape_materno1" wire:model="ape_materno1" onkeydown="return /[a-ñ. ;]/i.test(event.key)" tabindex="38">
                                @error('ape_materno1')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div id="casado" wire:ignore>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div wire:ignore>
                                        <label class="form-label d-inline-flex">
                                            <div class="divcuadro">22</div> TIPO DOC. IDENTIDAD
                                        </label>
                                        <select class="form-select" data-width="100%" data-live-search="true" name="tipo_doc2" id="tipo_doc2" wire:model="tipo_doc2" tabindex="39">
                                            <option value="">SELECCIONE</option>
                                            @foreach(\App\Models\TablaCodigo::where('id_tabla','=','DOC')->orderby('codigo','asc')->get() as $tablacodigo)
                                            <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('tipo_doc2')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadro">23</div> N° DOC.
                                    </label>
                                    <input type="text" class="form-control" placeholder="" name="nume_doc2" id="nume_doc2" wire:model.lazy="numedoc2" tabindex="40">
                                    @error('numedoc2')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                    @if ($message = Session::get('danger'))
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                    @endif
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row form-group">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadro">24</div> NOMBRES
                                    </label>
                                    <input type="text" class="form-control" placeholder="" name="nombres2" id="nombres2" wire:model="nombres2" onkeydown="return /[a-ñ. ;]/i.test(event.key)" tabindex="41">
                                    @error('nombres2')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadro">25</div> APELLIDO PATERNO
                                    </label>
                                    <input type="text" class="form-control" placeholder="" name="ape_paterno2" id="ape_paterno2" wire:model="ape_paterno2" onkeydown="return /[a-ñ. ;]/i.test(event.key)" tabindex="42">
                                    @error('ape_paterno2')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadro">26</div> APELLIDO MATERNO
                                    </label>
                                    <input type="text" class="form-control" placeholder="" name="ape_materno2" id="ape_materno2" wire:model="ape_materno2" onkeydown="return /[a-ñ. ;]/i.test(event.key)" tabindex="43">
                                    @error('ape_materno2')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                    </div>
                    <div class="row form-group" wire:ignore id="juridica">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">27</div> Nº DE R.U.C.
                                </label>
                                <input type="text" class="form-control" placeholder="" name="nume_doc3" wire:model.lazy="numedoc3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="11" tabindex="44">
                                @error('numedoc3')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                                @if ($message = Session::get('warning'))
                                <span class="error-message" style="color:red">{{ $message }}</span>
                                @endif
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">28</div> RAZON SOCIAL
                                </label>
                                <input type="text" class="form-control" placeholder="" name="razon_social" wire:model="razon_social" maxlength="100" tabindex="45">
                                @error('razon_social')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <!--SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadrorequired">29</div> PERSONA JURIDICA
                                    </label>
                                    <select class="form-select" data-width="100%" data-live-search="true" name="tipo_persona_juridica" id="tipo_persona_juridica" wire:model="tipo_persona_juridica" tabindex="46">
                                        <option value="">SELECCIONE</option>
                                        @foreach(\App\Models\TablaCodigo::where('id_tabla','=','TPJ')->orderby('codigo','asc')->get() as $tablacodigo)
                                        <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('tipo_persona_juridica')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->

                    <div class="row form-group">
                        <h4 class="mb-3"> DESCRIPCION DEL PREDIO</h4>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadrorequired">40</div> CLASIFICACION DEL PREDIO
                                </label>
                                <select class="form-select" data-width="100%" data-live-search="true" name="clasificacion" id="clasificacion" wire:model="clasificacion" tabindex="68">
                                    <option value="">SELECCIONE</option>
                                    @foreach(\App\Models\TablaCodigo::where('id_tabla','=','CDP')->orderby('codigo','asc')->get() as $tablacodigo)
                                    <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                                    @endforeach
                                </select>
                                @error('clasificacion')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadrorequired">42</div> CÓDIGO DE USO
                                    </label>
                                    <select class="form-select" data-width="100%" data-live-search="true" name="codi_uso" id="codi_uso" wire:model="codi_uso" tabindex="70">
                                        <option value="">SELECCIONE</option>
                                        @foreach($usos as $uso)
                                        <option value="{{$uso->codi_uso}}">{{$uso->codi_uso}} {{$uso->desc_uso}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('codi_uso')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">11</div> TIPO DE EDIFICACION
                                </label>
                                <select class="form-select" data-width="100%" data-live-search="true" name="tipo_edificacion" id="tipo_edificacion" wire:model="tipo_edificacion" tabindex="23">
                                    <option value="">SELECCIONE</option>
                                    @foreach(\App\Models\TablaCodigo::where('id_tabla','=','TED')->orderby('codigo','asc')->get() as $tablacodigo)
                                    <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                                    @endforeach
                                </select>
                                @error('tipo_edificacion')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadrorequired">41</div> PREDIO CATASTRAL EN
                                </label>
                                <select class="form-select" data-width="100%" data-live-search="true" name="cont_en" id="cont_en" wire:model="cont_en" tabindex="69">
                                    <option value="">SELECCIONE</option>
                                    @foreach(\App\Models\TablaCodigo::where('id_tabla','=','PEN')->orderby('codigo','asc')->get() as $tablacodigo)
                                    <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                                    @endforeach
                                </select>
                                @error('cont_en')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->

                    <div class="row form-group">
                        <h4 class="mb-5"> OBSERVACION</h4>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <textarea type="textarea" class="form-control" rows="5" name="observacion" wire:model="observacion" tabindex="149"></textarea>
                            </div>
                            @error('observacion')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" wire:click.prevent="register">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

@push('custom-scripts')
<script>
    document.addEventListener('livewire:load', function() {
        $('#hab_urbana_id').select2();
        $('#hab_urbana_id').on('change', function() {
            @this.set('tipoHabi', this.value);
        });
        $('#codi_uso').select2();
        $('#codi_uso').on('change', function() {
            @this.set('codi_uso', this.value);
        });

    })
</script>


@if($fichaanterior->titular!="")
    @if($fichaanterior->titular->persona->tipo_persona==1)
    <script>
        $('#juridica').hide();
    </script>
        @if($fichaanterior->titular->esta_civil=="05" || $fichaanterior->titular->esta_civil=="02")
        @else
        <script>
            $('#casado').hide();
        </script>
        @endif
    @endif
    @if($fichaanterior->titular->persona->tipo_persona==2)
    <script>
        $('#natural').hide();
        $('#casado').hide();
    </script>
    @endif
@else
<script>
    $('#juridica').hide();
    $('#casado').hide();
    $('#natural').hide();
</script>
@endif
<script>


    $('#tipo_persona').change(titulartipo);
    $('#esta_civil1').change(titularcasado);

    function titulartipo() {
        if ($("#tipo_persona option:selected").val() == "1") {
            $('#natural').show();
            $('#juridica').hide();
            $('#casado').hide();
        }
        if ($("#tipo_persona option:selected").val() == "2") {
            $('#natural').hide();
            $('#juridica').show();
            $('#casado').hide();
        }
        if ($("#tipo_persona option:selected").val() != "2" && $("#tipo_persona option:selected").val() != "1") {
            $('#natural').hide();
            $('#juridica').hide();
            $('#casado').hide();
        }
    }

    function titularcasado() {
        if ($("#esta_civil1 option:selected").val() == "02" || $("#esta_civil1 option:selected").val() == "05") {
            $('#casado').show();
        } else {
            $('#casado').hide();
        }
    }


    $('#codi_uso').change(Mostrarmas);


</script>
@endpush
