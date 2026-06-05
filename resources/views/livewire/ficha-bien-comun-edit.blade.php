<div class="row">
<form id="contact" method="POST" class="forms-sample" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="col-md-12 grid-margin stretch-card" >
        <div class="card">
            <div class="card-body" style="background-color: #ffe6db">
                <div class="row">
                <h3 class="mb-4">Ficha Catastral Urbana Bienes Comunes</h3>
                    <div class="row form-group">
                        <h4 class="mb-4"> DATOS GENERALES</h4>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex pb-2"> NUMERO DE FICHA</label>
                                <input type="text" class="form-control" placeholder="" name="numeficha"
                                    wire:model.lazy="numeficha"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    maxlength="7" tabindex="1"
                                    @if ($errors->has('numeficha')) autofocus @endif>
                                @error('numeficha')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex pb-2"> NUMERO DE FICHAS POR LOTE</label>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder=""
                                            name="nume_ficha_lote" wire:model="nume_ficha_lote" maxlength="4"
                                            tabindex="2">
                                        @error('nume_ficha_lote')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder=""
                                            name="nume_ficha_lote2" wire:model="nume_ficha_lote2"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                            maxlength="4" tabindex="3">
                                        @error('nume_ficha_lote2')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">1</div> CÓDIGO ÚNICO CATASTRAL - CUC
                                </label>
                                <input type="text" class="form-control" placeholder="" name="cuc"
                                    wire:model="cuc"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    maxlength="12" tabindex="4">
                                @error('cuc')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->                            
                    </div><!-- Row -->     
                    <div class="row  form-group">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadrorequired">2</div> CÓDIGO DE REFERENCIA CATASTRAL
                                </label>
                                <div class="row row3 mb-3 align-items-center"
                                    style="place-content: center;text-align: center;">
                                    <div class="col-md-3 row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label labelpeque">DPTO.</label>
                                            <input type="number" class="form-control" name="dpto" readonly
                                                wire:model="dpto" tabindex="5">
                                            @error('dpto')
                                                <span class="error-message" style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label labelpeque">PROV.</label>
                                            <input type="number" class="form-control" name="prov" readonly
                                                wire:model="prov" tabindex="6">
                                            @error('prov')
                                                <span class="error-message" style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label labelpeque">DIST.</label>
                                            <input type="number" class="form-control" name="dist" readonly
                                                wire:model="dist" tabindex="7">
                                            @error('dist')
                                                <span class="error-message" style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label labelpeque d-inline-flex">SECTOR</label>
                                            <select class="form-select" data-width="100%" data-live-search="true"
                                                name="sector" id="sector" wire:model="sector"
                                                tabindex="8">
                                                <option value="">SELECCIONE</option>
                                                @foreach ($sectores as $sector)
                                                    <option value="{{ $sector->codi_sector }}">
                                                        {{ $sector->codi_sector }}</option>
                                                @endforeach
                                            </select>
                                            @error('sector')
                                                <span class="error-message"
                                                    style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label labelpeque d-inline-flex">MANZANA</label>
                                            <input type="text" class="form-control" placeholder=""
                                                name="mzna" wire:model.lazy="mzna"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                maxlength="3" tabindex="9">
                                            @error('mzna')
                                                <span class="error-message"
                                                    style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-3">
                                            <label class="form-label labelpeque d-inline-flex">LOTE</label>
                                            <input type="text" class="form-control" placeholder=""
                                                name="lote" wire:model.lazy="lote"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                maxlength="3" tabindex="10">
                                            @error('lote')
                                                <span class="error-message"
                                                    style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-3">
                                            <label class="form-label labelpeque d-inline-flex">EDIFICA</label>
                                            <input type="text" class="form-control" placeholder=""
                                                name="edifica" wire:model.lazy="edifica"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                maxlength="2" tabindex="11">
                                            @error('edifica')
                                                <span class="error-message"
                                                    style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-3">
                                            <label class="form-label labelpeque d-inline-flex">ENTRADA</label>
                                            <input type="text" class="form-control" readonly placeholder=""
                                                name="entrada" wire:model.lazy="entrada"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                maxlength="2" tabindex="12">
                                            @error('entrada')
                                                <span class="error-message"
                                                    style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-3">
                                            <label class="form-label labelpeque d-inline-flex">PISO</label>
                                            <input type="text" class="form-control" readonly placeholder=""
                                                name="piso" wire:model.lazy="piso"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                maxlength="2" tabindex="13">
                                            @error('piso')
                                                <span class="error-message"
                                                    style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-3">
                                            <label class="form-label labelpeque d-inline-flex">UNIDAD</label>
                                            <input type="text" class="form-control" readonly placeholder=""
                                                name="unidad" wire:model.lazy="unidad"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                maxlength="3" tabindex="14">
                                            @error('unidad')
                                                <span class="error-message"
                                                    style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="mb-3">
                                            <label class="form-label labelpeque d-inline-flex">DC</label>
                                            <input type="number" class="form-control" readonly placeholder=""
                                                name="dc" wire:model="dc" tabindex="15">
                                            @error('dc')
                                                <span class="error-message"
                                                    style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-icon mt-3"
                                            wire:click="calcularDC"
                                            wire:loading.attr="disabled">
                                        <i class="mdi mdi-calculator"></i>
                                    </button>

                                </div>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">3</div> CÓDIGO CONTRIBUYENTE DE RENTAS
                                </label>
                                <input type="text" class="form-control" placeholder=""
                                    name="codi_cont_rentas" wire:model="codi_cont_rentas" maxlength="15"
                                    tabindex="16">
                                @error('codi_cont_rentas')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">4</div> CÓDIGO PREDIAL DE RENTAS
                                </label>
                                <input type="text" class="form-control" placeholder=""
                                    name="codi_pred_rentas" wire:model="codi_pred_rentas" maxlength="15"
                                    tabindex="17">
                                @error('codi_pred_rentas')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->

                    <div class="row form-group">
                        <div>
                            <span class="mb-2 h4"> UBICACION DEL PREDIO CATASTRAL</span>
                            <button type="button" class="btn btn-primary btn-icon mt-3" wire:click="buscarPuertas()">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                        <div class="col-md-12 mb-5">
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadrorequired">07</div> CÓDIGO DE VIA</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">08</div> TIPO DE VIA</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">09</div> NOMBRE DE VIA</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadrorequired">10</div>TIPO DE PUERTA</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">11</div> N° MUNICIPAL</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">12</div> COND. NUMER. </label></th>
                                            <th>
                                                @if($cont==0)
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarUbicacion" tabindex="18">+</button>
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($puertass as $i => $puerta)
                                        <tr>
                                            <td>{{$puerta['id_puerta']}}</td>
                                            <td>{{$puerta['tipoVianombre']}}</td>
                                            <td>{{$puerta['tipoViatipo']}}</td>
                                            <td>{{$puerta['tipo_puerta']}}</td>
                                            <td>{{$puerta['nume_muni']}}</td>
                                            <td>{{$puerta['cond_nume']}}</td>
                                            <td><button type="button" class="btn btn-danger btn-icon" wire:click="eliminarPuertas({{$i}})">x</button></td>
                                            <td><button type="button" class="btn btn-dark btn-icon" wire:click='votarPuertas(@json($puerta["id_puerta"]),{{$i}},1)'>x</button></td>
                                        </tr>
                                        @endforeach
                                        @for($i=0;$i<$cont;$i++)
                                        <tr >
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
                                                <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_puerta[]" id="tipo_puerta.{{$i}}" wire:model="tipopuerta.{{$i}}"  tabindex="18">
                                                    <option value="" >SELECCIONE</option>
                                                    @foreach(\App\Models\TablaCodigo::where('id_tabla','=','TPR')->orderby('codigo','asc')->get() as $tablacodigo)
                                                        <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                                                    @endforeach
                                                </select>
                                                @error('tipopuerta.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="" name="nume_muni[]" id="nume_muni.{{$i}}" wire:model="nume_muni.{{$i}}" maxlength="20" tabindex="18">

                                                @error('nume_muni.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <select class="form-select"  data-width="100%" data-live-search="true" name="cond_nume[]" id="cond_nume.{{$i}}" wire:model="cond_nume.{{$i}}" tabindex="18">
                                                    <option value=""  >SELECCIONE</option>
                                                    @foreach(\App\Models\TablaCodigo::where('id_tabla','=','CNP')->orderby('codigo','asc')->get() as $tablacodigo)
                                                        <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                                                    @endforeach
                                                </select>
                                                @error('cond_nume.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            
                                            <td>
                                                <button type="button" class="btn btn-success btn-icon" wire:click="aumentarUbicacion" tabindex="18">+</button>
                                                <button type="button" class="btn btn-danger btn-icon" wire:click="reducirUbicacion" tabindex="18">-</button>
                                                <button type="button" class="btn btn-dark btn-icon" wire:click='votarPuertas(@json($idPuertaEditar[$i] ?? null),{{$i}},0)'>x</button>
                                            </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">                            
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">11</div> TIPO DE EDIFICACION
                                </label>
                                <select class="form-select" data-width="100%" data-live-search="true"
                                    name="tipo_edificacion" id="tipo_edificacion" wire:model="tipo_edificacion"
                                    tabindex="20">
                                    <option value="">SELECCIONE</option>
                                    <option value="01">01 BLOCK</option>
                                    <option value="02">02 CASA / CHALET</option>
                                    <option value="03">03 EDIFICIO</option>
                                    <option value="04">04 PABELLON</option>
                                </select>
                                @error('tipo_edificacion')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <div class="col-md-2">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadrorequired">14</div> CÓDIGO URBANO
                                    </label>
                                    <select class="form-select insumo_id" id="hab_urbana_id" name="hab_urbana_id"
                                        data-width="100%" wire:model="tipoHabi" tabindex="21">
                                        <option value="">Seleccione</option>
                                        @foreach ($hab_urbanas as $hab_urbana)
                                            <option
                                                value="{{ str_pad($hab_urbana->id_hab_urba, 10, '0', STR_PAD_LEFT) }}">
                                                {{ $hab_urbana->codi_hab_urba }} {{ $hab_urbana->tipo_hab_urba }}
                                                {{ $hab_urbana->nomb_hab_urba }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="text-danger">
                                    @error('tipoHabi')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadrorequired">15</div> NOMBRE DE LA HABILITACIÓN URBANA
                                </label>
                                <input type="text" class="form-control" name="nomb_hab_urba" readonly
                                    placeholder="Nombre Habilitacion Urbana" wire:model="nomb_hab_urba"
                                    tabindex="22">
                                <span class="text-danger">
                                    @error('nomb_hab_urba')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-2">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">16</div> ZONA/SECTOR/ETAPA
                                </label>
                                <input type="text" class="form-control" name="zona_dist"
                                    wire:model="zona_dist" placeholder="Zona, Sector, Etapa"
                                    tabindex="23" maxlength="15">
                                <span class="text-danger">
                                    @error('zona_dist')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">17</div> MANZANA
                                </label>
                                <input type="text" class="form-control" name="mzna_dist"
                                    wire:model="mzna_dist" placeholder="Manzana" maxlength="15" tabindex="24">
                                <span class="text-danger">
                                    @error('mzna_dist')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-1">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">18</div> LOTE
                                </label>
                                <input type="text" class="form-control" name="lote_dist"
                                    wire:model="lote_dist" placeholder="Lote" maxlength="5" tabindex="25">
                                <span class="text-danger">
                                    @error('lote_dist')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">19</div> SUB-LOTE
                                </label>
                                <input type="text" class="form-control" name="sub_lote_dist"
                                    wire:model="sub_lote_dist" placeholder="Sublote" maxlength="6"
                                    tabindex="26">
                                <span class="text-danger">
                                    @error('sub_lote_dist')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <h4 class="mb-3"> DESCRIPCION DEL PREDIO BIEN COMUN</h4>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadrorequired">40</div> CLASIFICACION DEL PREDIO
                                </label>
                                <select class="form-select" data-width="100%" data-live-search="true"
                                    name="clasificacion" id="clasificacion" wire:model="clasificacion"
                                    tabindex="27">
                                    <option value="">SELECCIONE</option>
                                    @foreach (\App\Models\TablaCodigo::where('id_tabla', '=', 'CDP')->orderby('codigo', 'asc')->get() as $tablacodigo)
                                        <option value="{{ $tablacodigo->codigo }}">{{ $tablacodigo->codigo }}
                                            {{ $tablacodigo->desc_codigo }}</option>
                                    @endforeach
                                </select>
                                @error('clasificacion')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadrorequired">41</div> PREDIO CATASTRAL EN
                                </label>
                                <select class="form-select" data-width="100%" data-live-search="true"
                                    name="cont_en" id="cont_en" wire:model="cont_en" tabindex="28">
                                    <option value="">SELECCIONE</option>
                                    @foreach (\App\Models\TablaCodigo::where('id_tabla', '=', 'PEN')->orderby('codigo', 'asc')->get() as $tablacodigo)
                                        <option value="{{ $tablacodigo->codigo }}">{{ $tablacodigo->codigo }}
                                            {{ $tablacodigo->desc_codigo }}</option>
                                    @endforeach
                                </select>
                                @error('cont_en')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadrorequired">42</div> CÓDIGO DE USO
                                    </label>
                                    <select class="form-select" data-width="100%" data-live-search="true"
                                        name="codi_uso" id="codi_uso" wire:model="codi_uso" tabindex="29">
                                        <option value="">SELECCIONE</option>
                                        @foreach ($usos as $uso)
                                            <option value="{{ $uso->codi_uso }}">{{ $uso->codi_uso }}
                                                {{ $uso->desc_uso }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('codi_uso')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">44</div> ZONIFICACION
                                </label>
                                <input type="text" class="form-control" placeholder="" name="zonificacion"
                                    wire:model="zonificacion"
                                    maxlength="50" tabindex="31">
                                @error('zonificacion')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">45</div> AREA DE TERRENO ADQUIRIDO (M2)
                                </label>
                                <input type="text" class="form-control" placeholder="" name="area_declarada"
                                    wire:model="area_declarada"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    maxlength="8" tabindex="32">
                                @error('area_declarada')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadrorequired">46</div> AREA DE TERRENO VERIFICADA (M2)
                                </label>
                                <input type="text" class="form-control" placeholder=""
                                    name="area_verificada1" wire:model="area_verificada1"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    maxlength="9" tabindex="33">
                                @error('area_verificada1')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <div class="col-md-2">
                            <div class="mb-3 divcuadroceleste">
                                <label class="form-label d-inline-flex"> LINDEROS DE LOTE (ML)</label>
                            </div><!-- Col -->
                            <div class="mb-3 divcuadroceleste">
                                <label class="form-label d-inline-flex"> FRENTE</label>
                            </div><!-- Col -->
                            <div class="mb-3 divcuadroceleste">
                                <label class="form-label d-inline-flex"> DERECHA</label>
                            </div><!-- Col -->
                            <div class="mb-3 divcuadroceleste">
                                <label class="form-label d-inline-flex"> IZQUIERDA</label>
                            </div><!-- Col -->
                            <div class="mb-3 divcuadroceleste">
                                <label class="form-label d-inline-flex"> FONDO</label>
                            </div><!-- Col -->
                        </div>
                        <div class="col-md-10 row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadro">47</div> MEDIDA EN CAMPO
                                    </label>
                                </div><!-- Col -->
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="" name="fren_campo"
                                        wire:model="fren_campo"
                                        oninput="this.value = this.value.replace(/[^0-9.,; ]/g, '').replace(/(\.*?)\*/g, '$1');"
                                        maxlength="200" tabindex="34">
                                    @error('fren_campo')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div><!-- Col -->
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="" name="dere_campo"
                                        wire:model="dere_campo"
                                        oninput="this.value = this.value.replace(/[^0-9.,; ]/g, '').replace(/(\.*?)\*/g, '$1');"
                                        maxlength="200" tabindex="38">
                                    @error('dere_campo')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div><!-- Col -->
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="" name="izqu_campo"
                                        wire:model="izqu_campo"
                                        oninput="this.value = this.value.replace(/[^0-9.,; ]/g, '').replace(/(\.*?)\*/g, '$1');"
                                        maxlength="200" tabindex="42">
                                    @error('izqu_campo')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div><!-- Col -->
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="" name="fond_campo"
                                        wire:model="fond_campo"
                                        oninput="this.value = this.value.replace(/[^0-9.,; ]/g, '').replace(/(\.*?)\*/g, '$1');"
                                        maxlength="200" tabindex="46">
                                    @error('fond_campo')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div><!-- Col -->
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadro">48</div>COLIDANCIAS EN CAMPO
                                    </label>
                                </div><!-- Col -->
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder=""
                                        name="fren_colinda_campo" wire:model="fren_colinda_campo" maxlength="200"
                                        tabindex="36">
                                    @error('fren_colinda_campo')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div><!-- Col -->
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder=""
                                        name="dere_colinda_campo" wire:model="dere_colinda_campo" maxlength="200"
                                        tabindex="40">
                                    @error('dere_colinda_campo')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div><!-- Col -->
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder=""
                                        name="izqu_colinda_campo" wire:model="izqu_colinda_campo" maxlength="200"
                                        tabindex="44">
                                    @error('izqu_colinda_campo')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div><!-- Col -->
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder=""
                                        name="fond_colinda_campo" wire:model="fond_colinda_campo" maxlength="200"
                                        tabindex="48">
                                    @error('fond_colinda_campo')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div><!-- Col -->
                            </div>                                                      
                        </div>
                    </div><!-- Row -->
                    
                    <div class="row form-group">
                        <h4 class="mb-4"> SERVICIOS QUE CUENTA EL PREDIO</h4>
                        <div class="lineatoggle">
                            <div>
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">49</div> LUZ
                                </label>
                            </div>
                            <div style="padding-left: 10px;">
                                <div class="form-check form-switch mb-2">
                                    <input type="checkbox" class="form-check-input" id="formSwitch1"
                                        name="luz" wire:model="luz" tabindex="50">
                                </div>
                            </div>
                        </div>
                        <div class="lineatoggle">
                            <div>
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">50</div> AGUA
                                </label>
                            </div>
                            <div style="padding-left: 10px;">
                                <div class="form-check form-switch mb-2">
                                    <input type="checkbox" class="form-check-input" id="luz"
                                        name="agua" wire:model="agua" tabindex="51">
                                </div>
                            </div>
                        </div>
                        <div class="lineatoggle">
                            <div>
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">51</div> TELÉFONO
                                </label>
                            </div>
                            <div style="padding-left: 10px;">
                                <div class="form-check form-switch mb-2">
                                    <input type="checkbox" class="form-check-input" id="luz"
                                        name="telefono" wire:model="telefono" tabindex="52">
                                </div>
                            </div>
                        </div>
                        <div class="lineatoggle">
                            <div>
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">52</div> DESAGÜE
                                </label>
                            </div>
                            <div style="padding-left: 10px;">
                                <div class="form-check form-switch mb-2">
                                    <input type="checkbox" class="form-check-input" id="luz"
                                        name="desague" wire:model="desague" tabindex="53">
                                </div>
                            </div>
                        </div>
                        <div class="lineatoggle">
                            <div>
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">53</div> GAS
                                </label>
                            </div>
                            <div style="padding-left: 10px;">
                                <div class="form-check form-switch mb-2">
                                    <input type="checkbox" class="form-check-input" id="luz"
                                        name="gas" wire:model="gas" tabindex="54">
                                </div>
                            </div>
                        </div>
                        <div class="lineatoggle">
                            <div>
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">54</div> INTERNET
                                </label>
                            </div>
                            <div style="padding-left: 10px;">
                                <div class="form-check form-switch mb-2">
                                    <input type="checkbox" class="form-check-input" id="luz"
                                        name="internet" wire:model="internet" tabindex="55">
                                </div>
                            </div>
                        </div>
                        <div class="lineatoggle">
                            <div>
                                <label class="form-label d-inline-flex" style="width: 250px;">
                                    <div class="divcuadro">55</div> CONEXIÓN TV POR CABLE O CABLE SATELITAL
                                </label>
                            </div>
                            <div style="padding-left: 10px;">
                                <div class="form-check form-switch mb-2">
                                    <input type="checkbox" class="form-check-input" id="luz"
                                        name="tvcable" wire:model="tvcable" tabindex="56">
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                    <!-- Construcciones -->
                    
                    <div class="row form-group">
                        <h4 class="mb-4"> CONSTRUCCIONES</h4>
                        <div class="col-md-12 mb-5">
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr>                                                
                                            <th>
                                                @if ($codi_uso == '070101')
                                                @else     
                                                    <button type="button" class="btn btn-success btn-icon"
                                                            wire:click="aumentarConstruccion"
                                                            wire:loading.attr="disabled"
                                                            wire:target="aumentarConstruccion"
                                                            tabindex="57">+
                                                    </button>
                                                @endif
                                            </th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">301</div> BLOQUE
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">56</div> N° PISO
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">57</div> FECHA
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">58</div> MEP
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">59</div> ECS
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">60</div> ECC
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">61</div> MUROS
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">62</div> TECHOS
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">63</div> PISOS
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">64</div> P. Y V.
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">65</div> REVEST.
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">66</div> BAÑOS
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">67</div> INST. E.
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">68</div> AREA V.
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">69</div> UCA
                                                </label></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < $cont2; $i++)
                                            <tr>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-icon"
                                                            wire:click="reducirConstruccion({{ $i }})"
                                                            wire:loading.attr="disabled"
                                                            wire:target="reducirConstruccion"
                                                            tabindex="57">-
                                                    </button>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="bloque[]"
                                                        placeholder="Bloque" id="bloque.{{ $i }}"
                                                        wire:model="bloque.{{ $i }}" maxlength="2"
                                                        tabindex="57">
                                                    @error('bloque.' . $i)
                                                        <span class="error-message"
                                                            style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="nume_piso[]"
                                                        placeholder="N° piso" id="num_piso.{{ $i }}"
                                                        wire:model="num_piso.{{ $i }}" maxlength="2"
                                                        tabindex="57">
                                                    @error('num_piso.' . $i)
                                                        <span class="error-message"
                                                            style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="month" class="form-control" name="fecha[]"
                                                        placeholder="FECHA" id="fecha.{{ $i }}"
                                                        wire:model="fecha.{{ $i }}" tabindex="57">
                                                    @error('fecha.' . $i)
                                                        <span class="error-message"
                                                            style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <select class="form-select w-65" data-width="100%"
                                                        data-live-search="true" name="mep.{{ $i }}"
                                                        id="mep.{{ $i }}"
                                                        wire:model="mep.{{ $i }}" tabindex="57">
                                                        <option value="">SELECCIONE</option>
                                                        @foreach (\App\Models\TablaCodigo::where('id_tabla', '=', 'MEP')->orderby('codigo', 'asc')->get() as $tablacodigo)
                                                            <option value="{{ $tablacodigo->codigo }}">
                                                                {{ $tablacodigo->codigo }}
                                                                {{ $tablacodigo->desc_codigo }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('mep.' . $i)
                                                        <span class="error-message"
                                                            style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <select class="form-select w-65" data-width="100%"
                                                        data-live-search="true" name="ecs.{{ $i }}"
                                                        id="ecs.{{ $i }}"
                                                        wire:model="ecs.{{ $i }}" tabindex="57">
                                                        <option value="">SELECCIONE</option>
                                                        @foreach (\App\Models\TablaCodigo::where('id_tabla', '=', 'ECS')->orderby('codigo', 'asc')->get() as $tablacodigo)
                                                            <option value="{{ $tablacodigo->codigo }}">
                                                                {{ $tablacodigo->codigo }}
                                                                {{ $tablacodigo->desc_codigo }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('ecs.' . $i)
                                                        <span class="error-message"
                                                            style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <select class="form-select w-65" data-width="100%"
                                                        data-live-search="true" name="ecc.{{ $i }}"
                                                        id="ecc.{{ $i }}"
                                                        wire:model="ecc.{{ $i }}" tabindex="57">
                                                        <option value="">SELECCIONE</option>
                                                        @foreach (\App\Models\TablaCodigo::where('id_tabla', '=', 'ECC')->orderby('codigo', 'asc')->get() as $tablacodigo)
                                                            <option value="{{ $tablacodigo->codigo }}">
                                                                {{ $tablacodigo->codigo }}
                                                                {{ $tablacodigo->desc_codigo }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('ecc.' . $i)
                                                        <span class="error-message"
                                                            style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        name="estr_muro_col[]" placeholder="MUROS"
                                                        wire:model="estr_muro_col.{{ $i }}"
                                                        onkeydown="return /[a-i. ;]/i.test(event.key)"
                                                        maxlength="1" tabindex="57">
                                                    @error('estr_muro_col.' . $i)
                                                        <span class="error-message"
                                                            style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        name="estr_techo[]" placeholder="TECHOS"
                                                        wire:model="estr_techo.{{ $i }}"
                                                        onkeydown="return /[a-i. ;]/i.test(event.key)"
                                                        maxlength="1" tabindex="57">
                                                    @error('estr_techo.' . $i)
                                                        <span class="error-message"
                                                            style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="acab_piso[]"
                                                        placeholder="PISOS"
                                                        wire:model="acab_piso.{{ $i }}"
                                                        onkeydown="return /[a-i. ;]/i.test(event.key)"
                                                        maxlength="1" tabindex="57">
                                                    @error('acab_piso.' . $i)
                                                        <span class="error-message"
                                                            style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        name="acab_puerta_ven[]" placeholder="P. Y V."
                                                        wire:model="acab_puerta_ven.{{ $i }}"
                                                        onkeydown="return /[a-i. ;]/i.test(event.key)"
                                                        maxlength="1" tabindex="57">
                                                    @error('acab_puerta_ven.' . $i)
                                                        <span class="error-message"
                                                            style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        name="acab_revest[]" placeholder="REVEST."
                                                        wire:model="acab_revest.{{ $i }}"
                                                        onkeydown="return /[a-i. ;]/i.test(event.key)"
                                                        maxlength="1" tabindex="57">
                                                    @error('acab_revest.' . $i)
                                                        <span class="error-message"
                                                            style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="acab_bano[]"
                                                        placeholder="BAÑOS"
                                                        wire:model="acab_bano.{{ $i }}"
                                                        onkeydown="return /[a-i. ;]/i.test(event.key)"
                                                        maxlength="1" tabindex="57">
                                                    @error('acab_bano.' . $i)
                                                        <span class="error-message"
                                                            style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        name="inst_elect_sanita[]" placeholder="INST. E."
                                                        wire:model="inst_elect_sanita.{{ $i }}"
                                                        onkeydown="return /[a-i. ;]/i.test(event.key)"
                                                        maxlength="1" tabindex="57">
                                                    @error('inst_elect_sanita.' . $i)
                                                        <span class="error-message"
                                                            style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        name="area_verificada[]" placeholder="AREA VERIFICADA"
                                                        wire:model="area_verificada.{{ $i }}"
                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                        maxlength="9" tabindex="57">
                                                    @error('area_verificada.' . $i)
                                                        <span class="error-message"
                                                            style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <select class="form-select" data-width="100%"
                                                        data-live-search="true" name="uca.{{ $i }}"
                                                        id="uca.{{ $i }}"
                                                        wire:model="uca.{{ $i }}" tabindex="57">
                                                        <option value="">SELECCIONE</option>
                                                        @foreach (\App\Models\TablaCodigo::where('id_tabla', '=', 'UCA')->orderby('codigo', 'asc')->get() as $tablacodigo)
                                                            <option value="{{ $tablacodigo->codigo }}">
                                                                {{ $tablacodigo->codigo }}
                                                                {{ $tablacodigo->desc_codigo }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('uca.' . $i)
                                                        <span class="error-message"
                                                            style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>                                                    
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <!-- Construcciones -->
                    <div class="row form-group">
                        <h4 class="mb-4"> OBRAS COMPLEMENTARIAS / OTRAS INSTALACIONES</h4>
                        <div class="col-md-12 mb-5">
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr >
                                            <th>
                                                <button type="button" class="btn btn-success btn-icon"
                                                    wire:click="aumentarObras"
                                                    wire:loading.attr="disabled"
                                                    tabindex="58">+
                                                </button>
                                            </th>
                                            <th><label class="form-label d-inline-flex">
                                                <div class="divcuadro">71</div> CÓDIGO
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">57</div> FECHA
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">58</div> MEP
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">59</div> ECS
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">60</div> ECC
                                                </label></th>
                                            {{-- <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">92</div> DIMENSIÓN LARGO
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">93</div> DIMENSIÓN ANCHO
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">94</div> DIMENSIÓN ALTO
                                                </label></th> --}}
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">73</div> PRODUCTO TOTAL
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">74</div> U. MEDIDA
                                                </label></th>
                                            <th><label class="form-label d-inline-flex">
                                                    <div class="divcuadro">69</div> UCA
                                                </label></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<$cont3;$i++)
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-icon"
                                                        wire:click="reducirObras({{ $i }})"
                                                        wire:loading.attr="disabled"
                                                        wire:target="reducirObras"
                                                        tabindex="109">-
                                                </button>
                                            </td>
                                            <td>
                                                <select class="form-select" data-width="100%"
                                                    data-live-search="true"
                                                    name="codiinstalacion.{{ $i }}"
                                                    id="codiinstalacion.{{ $i }}"
                                                    wire:model="codiinstalacion.{{ $i }}"
                                                    tabindex="58">
                                                    <option value="">SELECCIONE</option>
                                                    @foreach ($codigosinstalacion as $codigoin)
                                                        <option value="{{ $codigoin->codi_instalacion }}">
                                                            {{ $codigoin->codi_instalacion }}
                                                            {{ $codigoin->desc_instalacion }}
                                                            {{ $codigoin->material }}</option>
                                                    @endforeach
                                                </select>
                                                @error('codiinstalacion.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="month" class="form-control"
                                                    name="inst_fecha[]" placeholder="FECHA"
                                                    id="inst-fecha.{{ $i }}"
                                                    wire:model.defer="inst_fecha.{{ $i }}"
                                                    tabindex="58">
                                                @error('inst_fecha.' . $i)
                                                    <span class="error-message"
                                                        style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <select class="form-select w-65" data-width="100%"
                                                    data-live-search="true"
                                                    name="inst_mep.{{ $i }}"
                                                    id="inst_mep.{{ $i }}"
                                                    wire:model.defer="inst_mep.{{ $i }}"
                                                    tabindex="58">
                                                    <option value="">SELECCIONE</option>
                                                    @foreach (\App\Models\TablaCodigo::where('id_tabla', '=', 'MEP')->orderby('codigo', 'asc')->get() as $tablacodigo)
                                                        <option value="{{ $tablacodigo->codigo }}">
                                                            {{ $tablacodigo->codigo }}
                                                            {{ $tablacodigo->desc_codigo }}</option>
                                                    @endforeach
                                                </select>
                                                @error('inst_mep.' . $i)
                                                    <span class="error-message"
                                                        style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <select class="form-select w-65" data-width="100%"
                                                    data-live-search="true"
                                                    name="inst_ecs.{{ $i }}"
                                                    id="inst_ecs.{{ $i }}"
                                                    wire:model.defer="inst_ecs.{{ $i }}"
                                                    tabindex="58">
                                                    <option value="">SELECCIONE</option>
                                                    @foreach (\App\Models\TablaCodigo::where('id_tabla', '=', 'ECS')->orderby('codigo', 'asc')->get() as $tablacodigo)
                                                        <option value="{{ $tablacodigo->codigo }}">
                                                            {{ $tablacodigo->codigo }}
                                                            {{ $tablacodigo->desc_codigo }}</option>
                                                    @endforeach
                                                </select>
                                                @error('inst_ecs.' . $i)
                                                    <span class="error-message"
                                                        style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <select class="form-select w-65" data-width="100%"
                                                    data-live-search="true"
                                                    name="inst_ecc.{{ $i }}"
                                                    id="inst_ecc.{{ $i }}"
                                                    wire:model.defer="inst_ecc.{{ $i }}"
                                                    tabindex="58">
                                                    <option value="">SELECCIONE</option>
                                                    @foreach (\App\Models\TablaCodigo::where('id_tabla', '=', 'ECC')->orderby('codigo', 'asc')->get() as $tablacodigo)
                                                        <option value="{{ $tablacodigo->codigo }}">
                                                            {{ $tablacodigo->codigo }}
                                                            {{ $tablacodigo->desc_codigo }}</option>
                                                    @endforeach
                                                </select>
                                                @error('inst_ecc.' . $i)
                                                    <span class="error-message"
                                                        style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>                                                    
                                            
                                            <td>
                                                <input type="text" class="form-control"
                                                    name="inst_prod_total[]" placeholder="PRODUCTO TOTAL"
                                                    id="inst-prod_total.{{ $i }}"
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                    maxlength="8"
                                                    wire:model.defer="inst_prod_total.{{ $i }}"
                                                    tabindex="58">
                                                @error('inst_prod_total.' . $i)
                                                    <span class="error-message"
                                                        style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"
                                                    name="inst_uni_med[]" placeholder="U. MEDIDA"
                                                    id="inst-uni_med.{{ $i }}" maxlength="5"
                                                    wire:model.defer="inst_uni_med.{{ $i }}"
                                                    tabindex="58">
                                                @error('inst_uni_med.' . $i)
                                                    <span class="error-message"
                                                        style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <select class="form-select" data-width="100%"
                                                    data-live-search="true"
                                                    name="inst_uca.{{ $i }}"
                                                    id="inst_uca.{{ $i }}"
                                                    wire:model.defer="inst_uca.{{ $i }}"
                                                    tabindex="58">
                                                    <option value="">SELECCIONE</option>
                                                    @foreach (\App\Models\TablaCodigo::where('id_tabla', '=', 'UCA')->orderby('codigo', 'asc')->get() as $tablacodigo)
                                                        <option value="{{ $tablacodigo->codigo }}">
                                                            {{ $tablacodigo->codigo }}
                                                            {{ $tablacodigo->desc_codigo }}</option>
                                                    @endforeach
                                                </select>
                                                @error('inst_uca.' . $i)
                                                    <span class="error-message"
                                                        style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->

                    <div class="row form-group">
                        <h4 class="mb-4"> RECAPITULACION DE EDIFICIOS</h4>
                        <div class="col-md-12 mb-5">
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                @if($edifica=="99")
                                                    <button type="button" class="btn btn-success btn-icon"
                                                        wire:click="aumentarEdificios"
                                                        wire:loading.attr="disabled"
                                                        tabindex="59">+
                                                    </button> 
                                                @endif
                                            </th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">128</div> EDIFICIO</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">129</div> PORCENTAJE (%)</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">130</div> ATC (M2)</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">131</div> ACC (M2)</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">132</div> AOIC (M2)</label></th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<$cont4;$i++)
                                        <tr >
                                            <td>
                                                <button type="button" class="btn btn-danger btn-icon"
                                                    wire:click="reducirEdificios({{$i}})"
                                                    wire:loading.attr="disabled"
                                                    tabindex="60">-
                                                </button>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="edificiobbc[]" placeholder="%" id="edificiobbc.{{$i}}"  wire:model="edificiobbc.{{$i}}" maxlength="2">
                                                @error('edificiobbc.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="porcentaje[]" placeholder="%" id="porcentaje.{{$i}}"  wire:model="porcentaje.{{$i}}" oninput="this.value = this.value.replace(/[^0-9,.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="7">
                                                @error('porcentaje.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="atc[]" placeholder="FECHA" id="atc.{{$i}}"  wire:model="atc.{{$i}}" oninput="this.value = this.value.replace(/[^0-9,]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10">
                                                @error('atc.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="acc[]" placeholder="MEP" id="acc.{{$i}}"  wire:model="acc.{{$i}}" oninput="this.value = this.value.replace(/[^0-9,]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10">
                                                @error('acc.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="aoic[]" placeholder="ECS" id="aoic.{{$i}}" wire:model="aoic.{{$i}}" oninput="this.value = this.value.replace(/[^0-9,]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10">
                                                @error('aoic.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>                                            
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->

                    <div class="row form-group">
                    <h4 class="mb-5"> EVALUACION DEL PREDIO CATASTRAL</h4>
                    <label class="form-label d-inline-flex" > <div class="divcuadro">113</div>ÁREA DE TERRENO INVADIDA (M2)</label>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" >EN COLIDANTE</label>
                                <input type="text" id="en_colindante" class="form-control" placeholder="EN LOTE COLINDANTE" name="en_colindante" wire:model="en_colindante"  maxlength="8" tabindex="132">
                                @error('en_colindante')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" >EN ÁREA PÚBLICA</label>
                                <input type="text" id="en_area_publica" class="form-control" placeholder="EN ÁREA PÚBLICA" name="en_area_publica" wire:model="en_area_publica" maxlength="8" tabindex="133">
                                @error('en_area_publica')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" >EN JARDÍN DE AISLAMIENTO</label>
                                <input type="text" id="en_jardin_aislamiento" class="form-control" placeholder="EN JARDIN  DE AISLAMIENTO" name="en_jardin_aislamiento" wire:model="en_jardin_aislamiento" oninput="this.value = this.value.replace(/[^0-9,.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="8" tabindex="134">
                                @error('en_jardin_aislamiento')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" >EN ÁREA INTANGIBLE</label>
                                <input type="text" id="en_area_intangible" class="form-control" placeholder="EN ÁREA INTANGIBLE" name="en_area_intangible" wire:model="en_area_intangible" oninput="this.value = this.value.replace(/[^0-9,.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="8" tabindex="135">
                                @error('en_area_intangible')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->


                    <div class="row form-group">
                        <h4 class="mb-4"> RECAPITULACION DE BIENES COMUNES</h4>
                        <div class="col-md-12 mb-5">
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr >
                                            <th>
                                                @if ($edifica != '99')                                                                                                            
                                                    <button type="button" class="btn btn-success btn-icon"
                                                        wire:click="aumentarRecap"
                                                        wire:loading.attr="disabled"
                                                        tabindex="65">+
                                                    </button>
                                                @endif
                                            </th>                                            
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">133</div> N°</label></th>
                                            <th><label class="form-label d-inline-flex" > EDIFICACION</label></th>
                                            <th><label class="form-label d-inline-flex" > ENTRADA</label></th>
                                            <th><label class="form-label d-inline-flex" > PISO</label></th>
                                            <th><label class="form-label d-inline-flex" > UNIDAD</label></th>

                                            <th><label class="form-label d-inline-flex" ><div class="divcuadro">89</div> %</label></th>
                                            <th><label class="form-label d-inline-flex" ><div class="divcuadro">134</div> ATC</label></th>
                                            <th><label class="form-label d-inline-flex" ><div class="divcuadro">131</div> ACC</label></th>
                                            <th><label class="form-label d-inline-flex" ><div class="divcuadro">132</div> AOIC</label></th>
                                            <th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<$cont5;$i++)
                                        <tr>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-icon"
                                                    wire:click="reducirRecap({{ $i }})"
                                                    wire:loading.attr="disabled">-
                                                </button>
                                            </td>
                                            <td>
                                                {{$i+1}}
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="rbcedifica[]"  wire:model="rbcedifica.{{$i}}"  id="rbcedifica.{{$i}}" maxlength="2" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" >
                                                @error('rbcedifica.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="rbcentrada[]"  wire:model="rbcentrada.{{$i}}"  id="rbcentrada.{{$i}}"  maxlength="2" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" >
                                                @error('rbcentrada.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="rbcnume_piso[]"  wire:model="rbcnume_piso.{{$i}}"  id="rbcnume_piso.{{$i}}" maxlength="2" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  >
                                                @error('rbcnume_piso.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="rbcunidad[]"  wire:model="rbcunidad.{{$i}}"  id="rbcunidad.{{$i}}" maxlength="3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" >
                                                @error('rbcunidad.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="rbctotalporcentaje[]"  wire:model="rbctotalporcentaje.{{$i}}"  id="rbctotalporcentaje.{{$i}}"   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="7">
                                                @error('rbctotalporcentaje.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="rbctotalatc[]"  wire:model="rbctotalatc.{{$i}}" id="rbctotalatc.{{$i}}"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="9">
                                                @error('rbctotalatc.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="rbctotalacc[]"  wire:model="rbctotalacc.{{$i}}" id="rbctotalacc.{{$i}}"   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="9">
                                                @error('rbctotalacc.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="rbctotalaoic[]" wire:model="rbctotalaoic.{{$i}}" id="rbctotalaoic.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="9">
                                                @error('rbctotalaoic.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                    <tfoot>
                                        <tr>                                                    
                                            <td>
                                                Total:
                                            </td>
                                            <td>
                                                {{$cont5}}
                                            </td>
                                            <td>
                                                {{$totalrecap['rbcedifica']}}
                                            </td>
                                            <td>
                                                {{$totalrecap['rbcentrada']}}
                                            </td>
                                            <td>
                                                
                                                {{$totalrecap['rbcnume_piso']}}
                                            </td>
                                            <td>
                                                {{$totalrecap['rbcunidad']}}                                                   
                                            </td>
                                            <td>
                                                {{$totalrecap['rbctotalporcentaje']}}
                                            </td>
                                            <td>
                                                {{$totalrecap['rbctotalatc']}}
                                            </td>
                                            <td>
                                                {{$totalrecap['rbctotalacc']}}
                                            </td>
                                            <td>
                                                {{$totalrecap['rbctotalaoic']}}
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->

                    <div class="row form-group">
                        <h4 class="mb-1"> DOCUMENTOS Y DATOS REGISTRALES</h4>
                        <h4 class="mb-5"> INSCRIPCION DEL PREDIO CATASTRAL</h4>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">79</div>TIPO DE PARTIDA REGISTRAL
                                </label>
                                <select class="form-select" id="tipo_partida"
                                    aria-label="Default select example" name="tipo_partida"
                                    wire:model="tipo_partida" tabindex="134">
                                    <option value="">SELECCIONE</option>
                                    @foreach (\App\Models\TablaCodigo::where('id_tabla', '=', 'TPA')->orderby('codigo', 'asc')->get() as $tablacodigo)
                                        <option value="{{ $tablacodigo->codigo }}">{{ $tablacodigo->codigo }}
                                            {{ $tablacodigo->desc_codigo }}</option>
                                    @endforeach


                                </select>
                                @error('tipo_partida')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">80</div>NUMERO
                                </label>
                                <input type="text" id="nume_partida" class="form-control"
                                    name="nume_partida" maxlength="18" wire:model="nume_partida"
                                    tabindex="134">
                                @error('nume_partida')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">81</div>FOJAS
                                </label>
                                <input type="text" id="fojas" class="form-control" name="fojas"
                                    maxlength="18" wire:model="fojas" tabindex="134">
                                @error('fojas')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">82</div>ASIENTO
                                </label>
                                <input type="text" id="asiento" class="form-control" name="asiento"
                                    maxlength="18" wire:model="asiento" tabindex="134">
                                @error('asiento')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">83</div>FECHA DE INSCRIPCION
                                </label>
                                <input type="date" id="fecha_inscripcion" class="form-control"
                                    name="fecha_inscripcion" wire:model="fecha_inscripcion" tabindex="134">
                                @error('fecha_inscripcion')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">84</div>DECLARATORIA DE FÁBRICA
                                </label>
                                <select class="form-select" id="codi_decla_fabrica"
                                    aria-label="Default select example" name="codi_decla_fabrica"
                                    wire:model="codi_decla_fabrica" tabindex="134">
                                    <option value="">Seleccione</option>
                                    @foreach (\App\Models\TablaCodigo::where('id_tabla', '=', 'DFB')->orderby('codigo', 'asc')->get() as $tablacodigo)
                                        <option value="{{ $tablacodigo->codigo }}">{{ $tablacodigo->codigo }}
                                            {{ $tablacodigo->desc_codigo }}</option>
                                    @endforeach
                                </select>
                                @error('codi_decla_fabrica')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">85</div>AS. INSC. DE FÁBRICA
                                </label>
                                <input type="text" id="asie_fabrica" class="form-control"
                                    name="asie_fabrica" maxlength="18" wire:model="asie_fabrica"
                                    tabindex="134">
                                @error('asie_fabrica')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">86</div>FECHA DE INSC. DE FABRICA
                                </label>
                                <input type="date" id="fecha_fabrica" class="form-control"
                                    name="fecha_fabrica" wire:model="fecha_fabrica" tabindex="134">
                                @error('fecha_fabrica')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <h4 class="mb-4"> INFORMACION COMPLEMENTARIA</h4>
                        <div class="row form-group">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">114</div>CONDICIÓN DE DECLARANTE</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="cond_declarante" id="cond_declarante" wire:model="cond_declarante" tabindex="136">
                                        <option value="" >SELECCIONE</option>
                                        @foreach(\App\Models\TablaCodigo::where('id_tabla','=','CDE')->orderby('codigo','asc')->get() as $tablacodigo)
                                            <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                                        @endforeach
                                    </select>
                                    @error('cond_declarante')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">116</div>ESTADO DE LLENADO DE LA FICHA</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="esta_llenado" id="esta_llenado" wire:model="esta_llenado" tabindex="137">
                                    <option value="" >SELECCIONE</option>

                                        @foreach(\App\Models\TablaCodigo::where('id_tabla','=','LLE')->orderby('codigo','asc')->get() as $tablacodigo)
                                            <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                                        @endforeach
                                    </select>
                                    @error('esta_llenado')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">119</div>MANTENIMIENTO</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="mantenimiento" id="mantenimiento" wire:model="mantenimiento" tabindex="140">
                                        <option value="">SELECCIONE</option>

                                        @foreach(\App\Models\TablaCodigo::where('id_tabla','=','MFC')->orderby('codigo','asc')->get() as $tablacodigo)
                                            <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                                        @endforeach


                                    </select>
                                    @error('mantenimiento')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                    </div><!-- Row -->
                    <div class="row form-group">
                    <h4 class="mb-5"> OBSERVACION</h4>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <textarea type="textarea" class="form-control" rows="5" name="observacion" wire:model="observacion"></textarea>
                            </div>
                            @error('observacion')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div><!-- Col -->
                    </div><!-- Row -->
                    
                    <div class="row form-group">
                        <div class="col-md-3 mb-3">

                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">94</div>DECLARANTE DNI
                            </label>

                            <label class="form-label d-inline-flex"></label>
                            <input type="number" class="form-control" name="numdocumentodeclarante"
                                wire:model.lazy="numdocumentodeclarante"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                maxlength="17" placeholder="DNI declarante" tabindex="142">
                            @error('numdocumentodeclarante')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                            @if ($message = Session::get('dark'))
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @endif


                            <label class="form-label d-inline-flex"> NOMBRES</label>
                            <input type="text" class="form-control" name="nombres_declarante"
                                wire:model="nombres_declarante" onkeydown="return /[a-ñ]/i.test(event.key)"
                                placeholder="Nombre declarante" tabindex="143">
                            @error('nombres_declarante')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror


                            <label class="form-label d-inline-flex"> APELLIDO PATERNO</label>
                            <input type="text" class="form-control" name="apellido_paterno_declarante"
                                wire:model="apellido_paterno_declarante"
                                onkeydown="return /[a-ñ]/i.test(event.key)" placeholder="A. Paterno declarante"
                                tabindex="144">
                            @error('apellido_paterno_declarante')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror


                            <label class="form-label d-inline-flex"> APELLIDO MATERNO</label>
                            <input type="text" class="form-control" name="apellido_materno_declarante"
                                wire:model="apellido_materno_declarante"
                                onkeydown="return /[a-ñ]/i.test(event.key)" placeholder="A. Materno declarante"
                                tabindex="145">
                            @error('apellido_materno_declarante')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror


                            <label class="form-label d-inline-flex"> FECHA</label>
                            <input type="date" class="form-control" name="fecha_declarante"
                                wire:model="fecha_declarante" tabindex="146" max="{{ date('Y-m-d') }}">
                            @error('fecha_declarante')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">95</div>SUPERVISOR
                            </label>
                            <select class="form-select" data-width="100%" data-live-search="true"
                                name="supervisor" id="supervisor" wire:model="supervisor" tabindex="147">
                                <option value="">SELECCIONE</option>
                                @foreach ($supervisores as $supervisor)
                                    <option value="{{ $supervisor->id_persona }}">{{ $supervisor->nume_doc }}
                                        {{ $supervisor->nombres }} {{ $supervisor->ape_paterno }}
                                        {{ $supervisor->ape_materno }}</option>
                                @endforeach
                            </select>
                            @error('supervisor')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                            <label class="form-label d-inline-flex"> FECHA</label>
                            <input type="date" class="form-control" name="fecha_supervision"
                                wire:model="fecha_supervision" tabindex="148" max="{{ date('Y-m-d') }}">
                            @error('fecha_supervision')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadrorequired">96</div>TÉCNICO CATASTRAL
                            </label>
                            <select class="form-select" data-width="100%" data-live-search="true"
                                name="tecnico" id="tecnico" wire:model="tecnico" tabindex="149">
                                <option value="">SELECCIONE</option>
                                @foreach ($tecnicos as $tecnico)
                                    <option value="{{ $tecnico->id_persona }}">{{ $tecnico->nume_doc }}
                                        {{ $tecnico->nombres }} {{ $tecnico->ape_paterno }}
                                        {{ $tecnico->ape_materno }}</option>
                                @endforeach
                            </select>
                            @error('tecnico')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                            <label class="form-label d-inline-flex"> FECHA</label>
                            <input type="date" class="form-control" name="fecha_levantamiento"
                                wire:model="fecha_levantamiento" tabindex="150" max="{{ date('Y-m-d') }}">
                            @error('fecha_levantamiento')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">97</div>Vº Bº VERIFICADOR CATASTRAL
                            </label>
                            <select class="form-select" data-width="100%" data-live-search="true"
                                name="verificador" id="verificador" wire:model="verificador" tabindex="151">
                                <option value="">SELECCIONE</option>
                                @foreach ($verificadores as $verificador)
                                    <option value="{{ $verificador->id_persona }}">
                                        {{ $verificador->nume_doc }} {{ $verificador->nombres }}
                                        {{ $verificador->ape_paterno }} {{ $verificador->ape_materno }}</option>
                                @endforeach
                            </select>
                            @error('verificador')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                            <label class="form-label d-inline-flex"> Nº DE REGISTRO</label>
                            <input type="text" class="form-control" name="nume_registro"
                                wire:model="nume_registro" tabindex="152">
                            @error('nume_registro')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                            <label class="form-label d-inline-flex"> FECHA</label>
                            <input type="date" class="form-control" name="fecha_verificacion"
                                wire:model="fecha_verificacion" tabindex="153" max="{{ date('Y-m-d') }}">
                            @error('fecha_verificacion')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div><!-- Row -->
                    <div class="modal-footer">
                        <div class="row w-100">
                            <div class="col-12 w-100">
                                <div class="row w-100">
                                    @error('numeficha')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('nume_ficha_lote')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('nume_ficha_lote2')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('cuc')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('dpto')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('prov')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('dist')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('sector')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('mzna')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('lote')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('edifica')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('entrada')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('piso')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('unidad')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('dc')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('codi_cont_rentas')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('codi_pred_rentas')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @for ($i = 0; $i < $cont; $i++)
                                        @error('tipoVia.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('tipopuerta.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('nume_muni.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('cond_nume.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    @endfor

                                    @error('tipo_edificacion')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('tipoHabi')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('nomb_hab_urba')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('zona_dist')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('mzna_dist')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('lote_dist')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('sub_lote_dist')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('clasificacion')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('cont_en')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('codi_uso')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('zonificacion')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('area_declarada')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('area_verificada1')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('fren_campo')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('dere_campo')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('izqu_campo')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('fond_campo')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('fren_colinda_campo')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('dere_colinda_campo')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('izqu_colinda_campo')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('fond_colinda_campo')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror
                                    @for ($i = 0; $i < $cont2; $i++)
                                        @error('bloque.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('num_piso.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('fecha.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('mep.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('ecs.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('ecc.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('estr_muro_col.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('estr_techo.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('acab_piso.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('acab_puerta_ven.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('acab_revest.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('acab_bano.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('inst_elect_sanita.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('area_verificada.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('uca.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    @endfor
                                    @for ($i = 0; $i < $cont3; $i++)
                                        @error('codiinstalacion.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('inst_fecha.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('inst_mep.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('inst_ecs.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('inst_ecc.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('inst_prod_total.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('inst_uni_med.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('inst_uca.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    @endfor
                                    @for ($i = 0; $i < $cont4; $i++)
                                        @error('edificiobbc.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('porcentaje.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('atc.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('acc.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('aoic.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    @endfor
                                    @error('en_colindante')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('en_jardin_aislamiento')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('en_area_publica')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('en_area_intangible')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror
                                    @for ($i = 0; $i < $cont5; $i++)
                                        @error('rbcedifica.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('rbcentrada.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('rbcnume_piso.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('rbcunidad.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('rbctotalporcentaje.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('rbctotalatc.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('rbctotalacc.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror

                                        @error('rbctotalaoic.' . $i)
                                        <div class="col-3">
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    @endfor
                                    @error('tipo_partida')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('nume_partida')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('fojas')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('asiento')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('fecha_inscripcion')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('codi_decla_fabrica')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('asie_fabrica')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('fecha_fabrica')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('cond_declarante')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('esta_llenado')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('mantenimiento')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('observacion')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('numdocumentodeclarante')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('nombres_declarante')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('apellido_paterno_declarante')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('apellido_materno_declarante')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('fecha_declarante')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('supervisor')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('fecha_supervision')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('tecnico')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('fecha_levantamiento')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('verificador')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('nume_registro')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror

                                    @error('fecha_verificacion')
                                    <div class="col-3">
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    </div>
                                    @enderror                                        
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary"
                            wire:click.prevent="register"
                            wire:loading.attr="disabled">Guardar
                        </button>
                         @error('sectorbloqueo')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                        @error('error-lindero')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@push('custom-scripts')
<script>
  document.addEventListener('livewire:load', () => {
    Livewire.on('alertPuerta', (cantidad) => {
      Swal.fire(
        'El lote cuenta con ' + cantidad + ' registrados.',
        '¿Estás seguro de crear más puertas?',
        'question'
      )
    });

    Livewire.on('alertPuertaBorrar', (mensaje, id, i,n) => {
        Swal.fire({
            title: mensaje,
            text: '¿Estás seguro de eliminar la puerta?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('puertaBorrarConfirmada', id, i,n);
            }
        });
    });
  });
</script>
@endpush