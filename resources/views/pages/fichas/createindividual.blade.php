@extends('layout.master')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet" />
@endpush
@section('content')
<form action="{{route('ficha.store')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
<div class="row">
    <div class="col-md-12 grid-margin stretch-card" >
        <div class="card">
            <div class="card-body">
                <div class="row">
                <h3 class="mb-4"> DATOS GENERALESs</h3>
                    <div class="row form-group">
                        <h4 class="mb-4"> DATOS GENERALESx</h4>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > NUMERO DE FICHA</label>
                                <input type="text" class="form-control" placeholder="" name="nume_ficha" wire:model="nume_ficha"  >
                                @error('nume_ficha')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > NUMERO DE FICHAS POR LOTE</label>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="" name="nume_ficha_lote" wire:model.defer="nume_ficha_lote">
                                        @error('nume_ficha_lote')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="" name="nume_ficha_lote2">
                                        @error('nume_ficha_lote2')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">1</div> CÓDIGO ÚNICO CATASTRAL - CUC</label>
                                <input type="text" class="form-control" placeholder="" name="cuc" wire:model.defer="cuc">
                                @error('cuc')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row  form-group">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">2</div> CÓDIGO DE REFERENCIA CATASTRAL</label>
                                @livewire('dccreate')
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">3</div> CÓDIGO CONTRIBUYENTE DE RENTAS</label>
                                <input type="text" class="form-control" placeholder=""name="codi_cont_rentas" wire:model.defer="codi_cont_rentas" maxlength="15">
                                @error('codi_cont_rentas')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">4</div> CÓDIGO PREDIAL DE RENTAS</label>
                                <input type="text" class="form-control" placeholder=""name="codi_pred_rentas" wire:model.defer="codi_pred_rentas" maxlength="15">
                                @error('codi_pred_rentas')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    @livewire('ubicacion-predio')
                    @livewire('titular-catastral')
                    @livewire('domicilio-titular')
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">34</div> TELÉFONO</label>
                                <input type="text" class="form-control" placeholder="" name="telefono_num">
                                @error('telefono')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">35</div> ANEXO</label>
                                <input type="text" class="form-control" placeholder="" name="anexo">
                                @error('anexo')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">36</div> CORREO ELECTRÓNICO</label>
                                <input type="text" class="form-control" placeholder="" name="email">
                                @error('email')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <h4 class="mb-4"> CARACTERISTICAS DE LA TITULARIDAD</h4>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">37</div> CONDICION DEL TITULAR</label>
                                <select class="form-select"  data-width="100%" data-live-search="true" name="cond_titular" id="cond_titular" >
                                    <option value="" {{ old('tipo_puerta') == '' ? 'selected' : '' }}>SELECCIONE</option>
                                    <option value="01" {{ old('tipo_puerta') == '01' ? 'selected' : '' }}>PROPIETARIO UNICO</option>
                                    <option value="02" {{ old('tipo_puerta') == '02' ? 'selected' : '' }}>SUCESIÓN INTESTADA</option>
                                    <option value="03" {{ old('tipo_puerta') == '03' ? 'selected' : '' }}>POSEEDOR</option>
                                    <option value="04" {{ old('tipo_puerta') == '04' ? 'selected' : '' }}>SOCIEDAD CONYUGAL</option>
                                    <option value="05" {{ old('tipo_puerta') == '05' ? 'selected' : '' }}>COTITULARIDAD</option>
                                    <option value="06" {{ old('tipo_puerta') == '06' ? 'selected' : '' }}>LITIGIO</option>
                                    <option value="07" {{ old('tipo_puerta') == '07' ? 'selected' : '' }}>OTROS</option>
                                </select>
                                @error('cond_titular')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">38</div> FORMA DE ADQUISICION</label>
                                <select class="form-select"  data-width="100%" data-live-search="true" name="form_adquisicion" id="form_adquisicion" >
                                    <option value="0" {{ old('tipo_puerta') == '0' ? 'selected' : '' }}>SELECCIONE</option>
                                    <option value="01" {{ old('tipo_puerta') == '01' ? 'selected' : '' }}>COMPRA VENTA</option>
                                    <option value="02" {{ old('tipo_puerta') == '02' ? 'selected' : '' }}>ANTICIPO DE LEGÍTIMA</option>
                                    <option value="03" {{ old('tipo_puerta') == '03' ? 'selected' : '' }}>TESTAMENTO</option>
                                    <option value="04" {{ old('tipo_puerta') == '04' ? 'selected' : '' }}>DONACIÓN</option>
                                    <option value="05" {{ old('tipo_puerta') == '05' ? 'selected' : '' }}>ADJUDICACIÓN</option>
                                    <option value="06" {{ old('tipo_puerta') == '06' ? 'selected' : '' }}>FUSIÓN</option>
                                    <option value="07" {{ old('tipo_puerta') == '07' ? 'selected' : '' }}>EXPROPIACIÓN</option>
                                    <option value="08" {{ old('tipo_puerta') == '08' ? 'selected' : '' }}>PERMUTA</option>
                                    <option value="09" {{ old('tipo_puerta') == '09' ? 'selected' : '' }}>PRESCRIPCIÓN ADQUISITIVA</option>
                                    <option value="10" {{ old('tipo_puerta') == '10' ? 'selected' : '' }}>CESIÓN DE DERECHOS DE ACCIONES</option>
                                    <option value="11" {{ old('tipo_puerta') == '11' ? 'selected' : '' }}>DACIÓN DE PAGO</option>
                                    <option value="12" {{ old('tipo_puerta') == '12' ? 'selected' : '' }}>DECLARATORIA DE HEREDEROS</option>
                                    <option value="13" {{ old('tipo_puerta') == '13' ? 'selected' : '' }}>POSESIÓN</option>
                                    <option value="14" {{ old('tipo_puerta') == '14' ? 'selected' : '' }}>TRASPASO</option>
                                    <option value="15" {{ old('tipo_puerta') == '15' ? 'selected' : '' }}>APORTE</option>
                                    <option value="16" {{ old('tipo_puerta') == '16' ? 'selected' : '' }}>OTROS</option>
                                </select>
                                @error('form_adquisicion')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">33</div> FECHA DE ADQUISICION</label>
                                <input type="date" class="form-control" placeholder="" name="fecha_adquisicion">
                                @error('fecha_adquisicion')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <h4 class="mb-3"> DESCRIPCION DEL PREDIO</h4>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">40</div> CLASIFICACION DEL PREDIO</label>
                                <select class="form-select"  data-width="100%" data-live-search="true" name="clasificacion" id="clasificacion" >
                                    <option value="0" {{ old('clasificacion') == '0' ? 'selected' : '' }}>SELECCIONE</option>
                                    <option value="01" {{ old('clasificacion') == '01' ? 'selected' : '' }}>CASA HABITACIÓN</option>
                                    <option value="02" {{ old('clasificacion') == '02' ? 'selected' : '' }}>TIENDA - DEPÓSITO - ALMACÉN</option>
                                    <option value="03" {{ old('clasificacion') == '03' ? 'selected' : '' }}>PREDIO EN EDIFICIO</option>
                                    <option value="05" {{ old('clasificacion') == '05' ? 'selected' : '' }}>TERRENO SIN CONSTRUIR</option>
                                    <option value="041" {{ old('clasificacion') == '041' ? 'selected' : '' }}>CLÍNICA</option>
                                    <option value="042" {{ old('clasificacion') == '042' ? 'selected' : '' }}>HOSPITAL</option>
                                    <option value="043" {{ old('clasificacion') == '043' ? 'selected' : '' }}>CINE TEATRO</option>
                                    <option value="044" {{ old('clasificacion') == '044' ? 'selected' : '' }}>INDUSTRIA</option>
                                    <option value="045" {{ old('clasificacion') == '045' ? 'selected' : '' }}>TALLER</option>
                                    <option value="046" {{ old('clasificacion') == '046' ? 'selected' : '' }}>IGLESIA / TEMPLO</option>
                                    <option value="047" {{ old('clasificacion') == '047' ? 'selected' : '' }}>CENTRO DE ENSEÑANZA</option>
                                    <option value="048" {{ old('clasificacion') == '048' ? 'selected' : '' }}>SERVICIO DE COMIDA</option>
                                    <option value="049" {{ old('clasificacion') == '049' ? 'selected' : '' }}>PARQUE</option>
                                    <option value="0410" {{ old('clasificacion') == '0410' ? 'selected' : '' }}>CEMENTERIO</option>
                                    <option value="0411" {{ old('clasificacion') == '0411' ? 'selected' : '' }}>SUB ESTACIÓN</option>
                                    <option value="0412" {{ old('clasificacion') == '0412' ? 'selected' : '' }}>BANCA FINANCIERA</option>
                                    <option value="0413" {{ old('clasificacion') == '0413' ? 'selected' : '' }}>TERMINAL DE TRANSPORTE</option>
                                    <option value="0414" {{ old('clasificacion') == '0414' ? 'selected' : '' }}>MERCADO</option>
                                    <option value="0415" {{ old('clasificacion') == '0415' ? 'selected' : '' }}>CLUB SOCIAL</option>
                                    <option value="0416" {{ old('clasificacion') == '0416' ? 'selected' : '' }}>CLUB DE ESPARCIMIENTO</option>
                                    <option value="0417" {{ old('clasificacion') == '0417' ? 'selected' : '' }}>PLAYA DE ESTACIONAMIENTO</option>
                                    <option value="0418" {{ old('clasificacion') == '0418' ? 'selected' : '' }}>OTROS</option>
                                </select>
                                @error('clasificacion')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">41</div> PREDIO CATASTRAL EN</label>
                                <select class="form-select"  data-width="100%" data-live-search="true" name="cont_en" id="cont_en" >
                                    <option value="0" {{ old('cont_en') == '0' ? 'selected' : '' }}>SELECCIONE</option>
                                    <option value="01" {{ old('cont_en') == '01' ? 'selected' : '' }}>GALERÍA</option>
                                    <option value="02" {{ old('cont_en') == '02' ? 'selected' : '' }}>MERCADO</option>
                                    <option value="03" {{ old('cont_en') == '03' ? 'selected' : '' }}>CAMPO FERIAL</option>
                                    <option value="04" {{ old('cont_en') == '04' ? 'selected' : '' }}>CENTRO COMERCIAL</option>
                                    <option value="05" {{ old('cont_en') == '05' ? 'selected' : '' }}>QUINTA</option>
                                    <option value="06" {{ old('cont_en') == '06' ? 'selected' : '' }}>CALLEJÓN</option>
                                    <option value="07" {{ old('cont_en') == '07' ? 'selected' : '' }}>PREDIO INDEPENDIENTE</option>
                                    <option value="08" {{ old('cont_en') == '08' ? 'selected' : '' }}>SOLAR</option>
                                    <option value="09" {{ old('cont_en') == '09' ? 'selected' : '' }}>CORRALON</option>
                                    <option value="10" {{ old('cont_en') == '10' ? 'selected' : '' }}>AZOTEA</option>
                                    <option value="11" {{ old('cont_en') == '11' ? 'selected' : '' }}>AIRES</option>
                                    <option value="12" {{ old('cont_en') == '12' ? 'selected' : '' }}>PREDIO EN EDIFICIO</option>
                                    <option value="13" {{ old('cont_en') == '13' ? 'selected' : '' }}>OTROS</option>
                                </select>
                                @error('cont_en')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">42</div> CÓDIGO DE USO</label>
                                <select class="form-select"  data-width="100%" data-live-search="true" name="codi_uso" id="codi_uso" >
                                    @foreach($usos as $uso)
                                        <option value="{{$uso->codi_uso}}">{{$uso->desc_uso}}</option>
                                    @endforeach
                                </select>
                                @error('codi_uso')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">44</div> ZONIFICACION</label>
                                <input type="text" class="form-control" placeholder="" name="zonificacion">
                                @error('zonificacion')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">45</div> AREA DE TERRENO ADQUIRIDO (M2)</label>
                                <input type="text" class="form-control" placeholder="" name="area_declarada">
                                @error('area_declarada')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">46</div>  AREA DE TERRENO VERIFICADA (M2)</label>
                                <input type="text" class="form-control" placeholder="" name="area_verificada1">
                                @error('area_verificada1')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="mb-3 divcuadroceleste">
                                <label class="form-label d-inline-flex"  > LINDEROS DE LOTE (ML)</label>
                            </div><!-- Col -->
                            <div class="mb-3 divcuadroceleste">
                                <label class="form-label d-inline-flex"  > FRENTE</label>
                            </div><!-- Col -->
                            <div class="mb-3 divcuadroceleste">
                                <label class="form-label d-inline-flex"  > DERECHA</label>
                            </div><!-- Col -->
                            <div class="mb-3 divcuadroceleste">
                                <label class="form-label d-inline-flex"  > IZQUIERDA</label>
                            </div><!-- Col -->
                            <div class="mb-3 divcuadroceleste">
                                <label class="form-label d-inline-flex"  > FONDO</label>
                            </div><!-- Col -->
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">47</div> MEDIDA EN CAMPO</label>
                            </div><!-- Col -->
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="" name="fren_campo">
                                @error('fren_campo')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div><!-- Col -->
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="" name="dere_campo">
                                @error('dere_campo')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div><!-- Col -->
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="" name="izqu_campo">
                                @error('izqu_campo')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div><!-- Col -->
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="" name="fond_campo">
                                @error('fond_campo')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div><!-- Col -->
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">48</div>COLIDANCIAS EN CAMPO</label>
                            </div><!-- Col -->
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="" name="fren_colinda_campo">
                                @error('fren_colinda_campo')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div><!-- Col -->
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="" name="dere_colinda_campo">
                                @error('dere_colinda_campo')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div><!-- Col -->
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="" name="izqu_colinda_campo">
                                @error('izqu_colinda_campo')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div><!-- Col -->
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="" name="fond_colinda_campo">
                                @error('fond_colinda_campo')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div><!-- Col -->
                        </div>
                    </div><!-- Row -->
                    <div class="row form-group">
                    <h4 class="mb-4"> SERVICIOS QUE CUENTA EL PREDIO</h4>
                        <div class="lineatoggle">
                            <div>
                                <label class="form-label d-inline-flex" > <div class="divcuadro">49</div> LUZ</label>
                            </div>
                            <div style="padding-left: 10px;">
                                <div class="form-check form-switch mb-2">
                                    <input type="checkbox" class="form-check-input" id="formSwitch1" name="luz">
                                </div>
                            </div>
                        </div>
                        <div class="lineatoggle">
                            <div>
                                <label class="form-label d-inline-flex" > <div class="divcuadro">50</div> AGUA</label>
                            </div>
                            <div style="padding-left: 10px;">
                                <div class="form-check form-switch mb-2">
                                    <input type="checkbox" class="form-check-input" id="luz" name="agua">
                                </div>
                            </div>
                        </div>
                        <div class="lineatoggle">
                            <div>
                                <label class="form-label d-inline-flex" > <div class="divcuadro">51</div> TELÉFONO</label>
                            </div>
                            <div style="padding-left: 10px;">
                                <div class="form-check form-switch mb-2">
                                    <input type="checkbox" class="form-check-input" id="luz" name="telefono">
                                </div>
                            </div>
                        </div>
                        <div class="lineatoggle">
                            <div>
                                <label class="form-label d-inline-flex" > <div class="divcuadro">52</div> DESAGÜE</label>
                            </div>
                            <div style="padding-left: 10px;">
                                <div class="form-check form-switch mb-2">
                                    <input type="checkbox" class="form-check-input" id="luz" name="desague">
                                </div>
                            </div>
                        </div>
                        <div class="lineatoggle">
                            <div>
                                <label class="form-label d-inline-flex" > <div class="divcuadro">53</div> GAS</label>
                            </div>
                            <div style="padding-left: 10px;">
                                <div class="form-check form-switch mb-2">
                                    <input type="checkbox" class="form-check-input" id="luz" name="gas">
                                </div>
                            </div>
                        </div>
                        <div class="lineatoggle">
                            <div>
                                <label class="form-label d-inline-flex" > <div class="divcuadro">54</div> INTERNET</label>
                            </div>
                            <div style="padding-left: 10px;">
                                <div class="form-check form-switch mb-2">
                                    <input type="checkbox" class="form-check-input" id="luz" name="internet">
                                </div>
                            </div>
                        </div>
                        <div class="lineatoggle">
                            <div>
                                <label class="form-label d-inline-flex" style="width: 250px;"> <div class="divcuadro">55</div> CONEXIÓN TV POR CABLE O CABLE SATELITAL</label>
                            </div>
                            <div style="padding-left: 10px;">
                                <div class="form-check form-switch mb-2">
                                    <input type="checkbox" class="form-check-input" id="luz" name="tv-cable">
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                    <!-- Construcciones -->
                    @livewire('construcciones')
                    <!-- Construcciones -->
                    <div class="row  form-group">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">70</div>% DEL BIEN COMUN</label>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > TERRENO LEGAL</label>
                                <input type="text" class="form-control" name="porc_bc_terr_legal">
                                @error('porc_bc_terr_legal')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > CONSTRUCCION LEGAL</label>
                                <input type="text" class="form-control"  name="porc_bc_const_legal">
                                @error('porc_bc_const_legal')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > TERRENO FISICO</label>
                                <input type="text" class="form-control" name="porc_bc_terr_fisc" >
                                @error('porc_bc_terr_fisc')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > CONSTRUCCION FISICO</label>
                                <input type="text" class="form-control" name="porc_bc_const_fisc">
                                @error('porc_bc_const_fisc')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <!-- Construcciones -->
                    @livewire('obras-complementarias')
                    <!-- Construcciones -->
                    <!-- Documentos -->
                    @livewire('documentos-adjuntos')
                    <!-- Documentos -->
                    <div class="row form-group">
                    <h4 class="mb-5"> INSCRIPCION DEL PREDIO CATASTRAL</h4>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">79</div>TIPO DE PARTIDA REGISTRAL</label>
                                <select class="form-select" id="tipo_partida" aria-label="Default select example" name="tipo_partida">
                                    <option selected>Seleccione</option>
                                    <option value="01" {{ old('tipo_partida') == '01' ? 'selected' : '' }}>TOMO</option>
                                    <option value="02" {{ old('tipo_partida') == '02' ? 'selected' : '' }}>FICHA</option>
                                    <option value="03" {{ old('tipo_partida') == '03' ? 'selected' : '' }}>PART. ELECTRONICA</option>
                                    <option value="04" {{ old('tipo_partida') == '04' ? 'selected' : '' }}>CÓDIGO DEL PREDIO</option>
                                </select>
                                @error('tipo_partida')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">80</div>NUMERO</label>
                                <input type="text" id="nume_partida" class="form-control" name="nume_partida" >
                                @error('nume_partida')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">81</div>FOJAS </label>
                                <input type="text" id="fojas" class="form-control" name="fojas">
                                @error('fojas')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">82</div>ASIENTO</label>
                                <input type="text" id="asiento" class="form-control" name="asiento">
                                @error('asiento')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">83</div>FECHA DE INSCRIPCION</label>
                                <input type="date" id="fecha_inscripcion" class="form-control" name="fecha_inscripcion">
                                @error('fecha_inscripcion')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">84</div>DECLARATORIA DE FÁBRICA</label>
                                <select class="form-select" id="codi_decla_fabrica" aria-label="Default select example" name="codi_decla_fabrica">
                                    <option value="0">Seleccione</option>
                                    <option value="01" {{ old('codi_decla_fabrica') == '02' ? 'selected' : '' }}>FÁBRICA INSCRITA</option>
                                    <option value="02" {{ old('codi_decla_fabrica') == '02' ? 'selected' : '' }}>FÁBRICA NO INSCRITA</option>
                                </select>
                                @error('codi_decla_fabrica')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">85</div>AS. INSC. DE FÁBRICA </label>
                                <input type="text" id="asie_fabrica" class="form-control" name="asie_fabrica">
                                @error('asie_fabrica')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">86</div>FECHA DE INSC. DE FABRICA</label>
                                <input type="date" id="fecha_fabrica" class="form-control" name="fecha_fabrica">
                                @error('fecha_fabrica')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                    <h4 class="mb-5"> EVALUACION DEL PREDIO CATASTRAL</h4>
                    <label class="form-label d-inline-flex" > <div class="divcuadro">87</div>ÁREA DE TERRENO INVADIDA (M2)</label>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" >EN COLIDANTE</label>
                                <input type="text" id="en_colindante" class="form-control" placeholder="EN LOTE COLINDANTE" name="en_colindante">
                                @error('en_colindante')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" >EN ÁREA PÚBLICA</label>
                                <input type="text" id="en_area_publica" class="form-control" placeholder="EN ÁREA PÚBLICA" name="en_area_publica">
                                @error('en_area_publica')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" >EN JARDÍN DE AISLAMIENTO</label>
                                <input type="text" id="en_jardin_aislamiento" class="form-control" placeholder="EN JARDIN  DE AISLAMIENTO" name="en_jardin_aislamiento">
                                @error('en_jardin_aislamiento')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" >EN ÁREA INTANGIBLE</label>
                                <input type="text" id="en_area_intangible" class="form-control" placeholder="EN ÁREA INTANGIBLE" name="en_area_intangible">
                                @error('en_area_intangible')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    @livewire('informacion-complementaria')
                    <div class="row form-group">
                    <h4 class="mb-5"> OBSERVACION</h4>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <textarea type="textarea" class="form-control" rows="5" name="observacion"></textarea>
                            </div>
                            @error('observacion')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        @livewire('declarante')

                        <div class="col-md-4 mb-3">
                            <label class="form-label d-inline-flex" > <div class="divcuadro">95</div>SUPERVISOR</label>
                            <select class="form-select"  data-width="100%" data-live-search="true" name="supervisor" id="supervisor">
                                <option value="">SELECCIONE</option>
                                @foreach($supervisores as $supervisor)
                                    <option value="{{$supervisor->id_persona}}">{{$supervisor->nume_doc}} {{$supervisor->nombres}} {{$supervisor->ape_paterno}} {{$supervisor->ape_materno}}</option>
                                @endforeach
                            </select>
                            @error('supervisor')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                            <label class="form-label d-inline-flex" > FECHA</label>
                            <input type="date" class="form-control" name="fecha_supervision" max="{{ date('Y-m-d') }}">
                            @error('fecha_supervision')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label d-inline-flex" > <div class="divcuadro">96</div>TÉCNICO CATASTRAL</label>
                            <select class="form-select"  data-width="100%" data-live-search="true" name="tecnico" id="tecnico">
                                <option value="">SELECCIONE</option>
                                @foreach($tecnicos as $tecnico)
                                    <option value="{{$tecnico->id_persona}}">{{$tecnico->nume_doc}} {{$tecnico->nombres}} {{$tecnico->ape_paterno}} {{$tecnico->ape_materno}}</option>
                                @endforeach
                            </select>
                            @error('tecnico')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                            <label class="form-label d-inline-flex" > FECHA</label>
                            <input type="date" class="form-control" name="fecha_levantamiento" max="{{ date('Y-m-d') }}">
                            @error('fecha_levantamiento')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label d-inline-flex" > <div class="divcuadro">97</div>Vº Bº VERIFICADOR CATASTRAL</label>
                            <select class="form-select"  data-width="100%" data-live-search="true" name="verificador" id="verificador">
                                <option value="">SELECCIONE</option>
                                @foreach($verificadores as $verificador)
                                    <option value="{{$verificador->id_persona}}">{{$verificador->nume_doc}} {{$verificador->nombres}} {{$verificador->ape_paterno}} {{$verificador->ape_materno}}</option>
                                @endforeach
                            </select>
                            @error('verificador')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                            <label class="form-label d-inline-flex" > Nº DE REGISTRO</label>
                            <input type="text" class="form-control" name="nume_registro">
                            @error('nume_registro')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                            <label class="form-label d-inline-flex" > FECHA</label>
                            <input type="date" class="form-control" name="fecha_verificacion" max="{{ date('Y-m-d') }}">
                            @error('fecha_verificacion')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div><!-- Row -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
    $('#codi_uso').select2();




</script>

@endpush
