<div class="row">
    <form id="contact" method="POST" class="forms-sample" enctype="multipart/form-data" wire:submit.prevent="register">
    {{csrf_field()}}
    <div class="col-md-12 grid-margin stretch-card" >
        <div class="card">
            <div class="card-body" style="background-color: #f5ffe4">
                <div class="row">
                    <h3 class="mb-4">Ficha Catastral Urbana Economica</h3>
                    <div class="row form-group">
                        <h4 class="mb-4"> DATOS GENERALES</h4>
                        
                        <div class="col-md-2">
                            <div class="mb-3">
                                <input type="hidden" name="fichaanterior" value="{{$fichaanterior->id_ficha}}" >
                                <label class="form-label d-inline-flex" > NUMERO DE FICHA</label>
                                <input type="text" class="form-control" placeholder="" name="numeficha" wire:model.lazy="numeficha" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="7">
                                @error('numeficha')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > NUMERO DE FICHAS POR LOTE</label>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="" name="nume_ficha_lote" wire:model="nume_ficha_lote" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="4">
                                        @error('nume_ficha_lote')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="" name="nume_ficha_lote2" wire:model="nume_ficha_lote2" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="4">
                                        @error('nume_ficha_lote2')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">1</div> CÓDIGO ÚNICO CATASTRAL - CUC</label>
                                <input type="text" class="form-control" placeholder="" readonly name="cuc"  value="{{$fichaanterior->unicat->cuc}}">
                                @error('cuc')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">303</div> CÓDIGO SECUENCIAL DE ACTIVIDAD ECONOMICA</label>
                                <input type="text" class="form-control" placeholder="" name="codigo_secuencial" wire:model="codigo_secuencial" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="6">
                                @error('codigo_secuencial')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row  form-group">
                        <div class="col-md-12 row" style="place-content: center;text-align: center;">
                            <label class="form-label d-inline-flex" > <div class="divcuadrorequired">2</div> CÓDIGO DE REFERENCIA CATASTRAL</label>
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
                    <div>
                        <div class="row form-group">
                            <h4 class="mb-4"> IDENTIFICACIÓN DEL CONDUCTOR</h4>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">140</div> TIPO DE CONDUCTOR</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_persona" id="tipo_persona" wire:model="tipoConductor">
                                        <option value="" >SELECCIONE</option>
                                        @foreach(\App\Models\TablaCodigo::where('id_tabla','=','TPE')->orderby('codigo','asc')->get() as $tablacodigo)
                                            <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                                        @endforeach
                                    </select>
                                    @error('tipoConductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->

                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">141</div>NOMBRE COMERCIAL</label>
                                    <input type="text" class="form-control" placeholder="" name="nomb_comercial" id="nomb_comercial" wire:model="nomb_comercial"  maxlength="100">
                                    @error('nomb_comercial')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->

                            <!-- codigo_secuencial-->
                            <!-- codigo_secuencial-->
                            <!-- codigo_secuencial-->
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">22</div> TIPO DOC. IDENTIDAD</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_doc1" id="tipo_doc1" wire:model="tipo_doc1" >
                                        <option value="0" >SELECCIONE</option>
                                        @foreach(\App\Models\TablaCodigo::where('id_tabla','=','DOC')->orderby('codigo','asc')->get() as $tablacodigo)
                                            <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                                        @endforeach
                                    </select>
                                    @error('tipo_doc1')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">23</div> N° DOC.</label>
                                    <input type="text" class="form-control" placeholder="" name="nume_doc1" id="nume_doc1" wire:model.lazy="numedoc1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="17">
                                    @error('nume_doc1')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                    @if ($message = Session::get('info'))
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @endif
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-8 row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label d-inline-flex" > <div class="{{ $requiredtipoConductor == 1 ? 'divcuadrorequired' : 'divcuadro' }}">28</div>  NOMBRES</label>
                                        <input type="text" class="form-control" placeholder="" name="nombres1" id="nombres1" wire:model="nombres1" maxlength="150">
                                        @error('nombres1')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><!-- Col -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label d-inline-flex" > <div class="{{ $requiredtipoConductor == 1 ? 'divcuadrorequired' : 'divcuadro' }}">28</div>  APELLIDO PATERNO</label>
                                        <input type="text" class="form-control" placeholder="" name="ape_paterno1" id="ape_paterno1" wire:model="ape_paterno1" maxlength="50">
                                        @error('ape_paterno1')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><!-- Col -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label d-inline-flex" > 
                                            <div class="{{ $requiredtipoConductor == 1 ? 'divcuadrorequired' : 'divcuadro' }}">28</div> 
                                            APELLIDO MATERNO</label>
                                            
                                        <input type="text" class="form-control" placeholder="" name="ape_materno1" id="ape_materno1" wire:model="ape_materno1" maxlength="50">
                                        @error('ape_materno1')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Col -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">27</div> Nº DE R.U.C.</label>
                                    <input type="text" class="form-control" placeholder="" name="nume_doc3" wire:model.lazy="numedoc3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="17">
                                    @error('numedoc3')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                    @if ($message = Session::get('warning'))
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @endif
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex">
                                        <div class="{{ $requiredtipoConductor == 2 ? 'divcuadro' : 'divcuadro' }}">28</div> 
                                        RAZON SOCIAL
                                    </label>
                                    <input type="text" class="form-control" placeholder="" name="razon_social" wire:model="razon_social" maxlength="100">
                                    @error('razon_social')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            
                            
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">142</div> COND. CONDUCTOR</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="cond_conductor" id="cond_conductor" wire:model="cond_conductor">
                                        <option value="" >SELECCIONE</option>
                                        @foreach(\App\Models\TablaCodigo::where('id_tabla','=','CDC')->orderby('codigo','asc')->get() as $tablacodigo)
                                            <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                                        @endforeach
                                    </select>
                                    @error('cond_conductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->                                                
                    </div>

                    
                    <div>
                        <div class="row form-group">
                            <h4 class="mb-4"> DOMICILIO FISCAL DEL CONDUCTOR DE LA ACTIVIDAD</h4>
                            <div class="col-md-2" >
                                <div class="mb-3">
                                    <div wire:ignore >
                                        <label class="form-label d-inline-flex" > <div class="divcuadrorequired">31</div> DEPARTAMENTO</label>
                                        <select  class="form-select " data-width="100%" data-live-search="true"  name="deparamentoconductor" id="deparamentoconductor" wire:model="deparamentoconductor">
                                            <option value="">SELECCIONE</option>
                                        </select>
                                    </div>
                                    @error('deparamentoconductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-2" >
                                <div class="mb-3">
                                    <div wire:ignore >
                                        <label class="form-label d-inline-flex" > <div class="divcuadrorequired">32</div> PROVINCIA</label>
                                        <select  class="form-select " name="provinciaconductor" id="provinciaconductor"  wire:model="provinciaconductor">
                                        </select>
                                    </div>
                                    @error('provinciaconductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-2" >
                                <div class="mb-3">
                                    <div wire:ignore >
                                        <label class="form-label d-inline-flex" > <div class="divcuadrorequired">33</div> DISTRITO</label>
                                        <select  class="form-select " name="distritoconductor" id="distritoconductor"  wire:model="distritoconductor">
                                        </select>
                                    </div>
                                    @error('distritoconductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">34</div> TELÉFONO</label>
                                    <input type="text" class="form-control" placeholder=""  name="telefonoconductor" wire:model="telefonoconductor" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10">
                                    @error('telefonoconductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">35</div> ANEXO</label>
                                    <input type="text" class="form-control" placeholder=""  name="anexoconductor" wire:model="anexoconductor" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="5">
                                    @error('anexoconductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            {{-- <div class="col-md-1">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">44</div> FAX</label>
                                    <input type="text" class="form-control" placeholder="" name="faxconductor" wire:model="faxconductor" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="5">
                                    @error('faxconductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col --> --}}
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">36</div> EMAIL</label>
                                    <input type="text" class="form-control" placeholder="" name="emailconductor" wire:model="emailconductor" maxlength="100">
                                    @error('emailconductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row form-group">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">05</div> C. VIA</label>
                                    <input type="text" class="form-control" placeholder="" name="codigoviaconductor" wire:model="codigoviaconductor" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="6">
                                    @error('codigoviaconductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-2">
                                <div class="mb-">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">06</div> T. VIA</label>
                                    
                                    <select class="form-select tipoviaconductor" id="tipoviaconductor" name="tipoviaconductor" data-width="100%" wire:model="tipoviaconductor" tabindex="5">
                                    <option value="">SELECCIONE</option>
                                        @foreach (\App\Models\TablaCodigo::where('id_tabla', '=', 'VIA')->orderby('codigo', 'asc')->get() as $tablacodigo)
                                            <option value="{{ $tablacodigo->codigo }}">
                                                {{ $tablacodigo->codigo }}
                                                {{ $tablacodigo->desc_codigo }}</option>
                                        @endforeach
                                    </select>
                                    @error('tipoviaconductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">07</div> NOMBRE DE VIA</label>
                                    <input type="text" class="form-control" placeholder="" name="nombreviaconductor" wire:model="nombreviaconductor" maxlength="100">
                                    @error('nombreviaconductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">09</div> N° MUNICIPAL</label>
                                    <input type="text" class="form-control" placeholder="" name="nmunicipalconductor" wire:model="nmunicipalconductor" maxlength="6">
                                    @error('nmunicipalconductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            {{-- <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">14</div> NOMB. EDIFICACION</label>
                                    <input type="text" class="form-control" placeholder="" name="nomb_edificacionconductor" wire:model="nomb_edificacionconductor" maxlength="100">
                                    @error('nomb_edificacionconductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col --> --}}
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">13</div> N. INTERIOR</label>
                                    <input type="text" class="form-control" placeholder="" name="ninteriorconductor" wire:model="ninteriorconductor" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="5">
                                    @error('ninteriorconductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row form-group">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">14</div> CÓDIGO URBANO</label>
                                    <input type="text" class="form-control" placeholder="" name="codigohurbanoconductor" wire:model.lazy="codigohurbanoconductor" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="4">
                                    @error('codigohurbanoconductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">15</div> NOMBRE DE LA HABILITACIÓN URBANA</label>
                                    <input type="text" class="form-control" placeholder="" name="nombrehhurbanaconductor" wire:model="nombrehhurbanaconductor" maxlength="100">
                                    @error('nombrehhurbanaconductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">16</div> ZONA/SECTOR/ETAPA</label>
                                    <input type="text" class="form-control" placeholder="" name="zonaconductor" wire:model="zonaconductor" maxlength="20">
                                    @error('zonaconductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">17</div> MANZANA</label>
                                    <input type="text" class="form-control" placeholder="" name="manzanaconductor" wire:model="manzanaconductor" maxlength="5">
                                    @error('manzanaconductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">18</div> LOTE</label>
                                    <input type="text" class="form-control" placeholder="" name="loteconductor" wire:model="loteconductor" maxlength="5">
                                    @error('loteconductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">19</div> SUB-LOTE</label>
                                    <input type="text" class="form-control" placeholder="" name="subloteconductor" wire:model="subloteconductor" maxlength="5">
                                    @error('subloteconductor')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                    </div>


                    <div>
                        <div class="row form-group">
                            <h4 class="mb-4"> AUTORIZACIÓN MUNICIPAL DE FUNCIONAMIENTO</h4>


                            <div class="col-md-5 mb-5">
                                <div class="table-responsive">
                                    <table id="vias" class="table">
                                        <thead>
                                            <tr >
                                                <th><label class="form-label d-inline-flex" > <div class="divcuadrorequired">143</div>COD. ACTIVIDAD</label></th>
                                                <th>
                                                    <button type="button" class="btn btn-success btn-icon" wire:loading.attr="disabled" wire:click="aumentarAutorizacionMunicipal">+</button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for($i=0;$i<$cont1;$i++)
                                            <tr >
                                                <td>
                                                    <select class="form-select"  data-width="100%" data-live-search="true" name="codi_actividad[]" id="codi_actividad.{{$i}}" wire:model="codi_actividad.{{$i}}">
                                                        <option value="">SELECCIONE</option>
                                                        @foreach($actividades as $actividad)
                                                            <option value="{{$actividad?->codi_actividad}}">{{$actividad?->codi_actividad}} {{$actividad?->desc_actividad}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('codi_actividad.'.$i)
                                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-icon" wire:loading.attr="disabled" wire:click="reducirAutorizacionMunicipal({{ $i }})">-</button>
                                                </td>
                                            </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- Col -->



                            <div class="col-md-7 mb-5 row">
                                <div class="col-md-6 mb-5 row"style="font-size:12px" >
                                    <h6 class="mb-2">ÁREA DE ACTIVIDAD ECONOMICA</h6>
                                    <div class="col-md-3 mb-2">
                                        <p class="form-label d-inline-flex" >UBICACION</p>
                                    </div>
                                    <div class="col-md-5 mb-2">
                                        <label class="form-label d-inline-flex" > <div class="divcuadro">145</div>AUTORIZADA</label>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label d-inline-flex" > <div class="divcuadro">146</div>VERIFICADA</label>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <p class="form-label d-inline-flex" >PREDIO CATASTRAL</p>
                                    </div>
                                    <div class="col-md-5 mb-2">
                                        <input type="text" class="form-control" name="pred_area_autor" wire:model="pred_area_autor" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="9">
                                        @error('pred_area_autor')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <input type="text" class="form-control" name="pred_area_verif" wire:model="pred_area_verif" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="9">
                                        @error('pred_area_verif')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <p class="form-label d-inline-flex" >VIA PUBLICA</p>
                                    </div>
                                    <div class="col-md-5 mb-2">
                                        <input type="text" class="form-control" name="viap_area_autor" wire:model="viap_area_autor" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="9">
                                        @error('viap_area_autor')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <input type="text" class="form-control" name="viap_area_verif" wire:model="viap_area_verif" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="9">
                                        @error('viap_area_verif')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <p class="form-label d-inline-flex" >BIEN COMUN</p>
                                    </div>
                                    <div class="col-md-5 mb-2">
                                        <input type="text" class="form-control" name="bc_area_autor" wire:model="bc_area_autor" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="9">
                                        @error('bc_area_autor')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-2">

                                        <input type="text" class="form-control" name="bc_area_verif" wire:model="bc_area_verif" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="9">
                                        @error('bc_area_verif')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <p class="form-label d-inline-flex" >TOTAL</p>
                                    </div>
                                    <div class="col-md-5 mb-2">
                                        <input type="text" class="form-control" name="total1" wire:model="totalautor" readonly>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <input type="text" class="form-control" name="total2" wire:model="totalverificada" readonly>
                                    </div>

                                    <!--AQUI FALTAN NAMES-->

                                </div>
                                <div class="col-md-6 mb-5 row"style="font-size:12px" >
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label d-inline-flex" > <div class="divcuadro">147</div>Nº EXPEDIENTE</label>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label d-inline-flex" > <div class="divcuadro">148</div>Nº LICENCIA</label>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="nume_expediente" wire:model="nume_expediente" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10">
                                        @error('nume_expediente')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" name="nume_licencia" wire:model="nume_licencia" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10">
                                        @error('nume_licencia')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <h6 class="form-label d-inline-flex" >VIGENCIA DE AUTORIZACIÓN</h6>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label d-inline-flex" > <div class="divcuadro">149</div>F. EXPEDICION</label>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label d-inline-flex" > <div class="divcuadro">150</div>F. VENCIMIENTO</label>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="date" class="form-control" name="fecha_expedicion" wire:model="fecha_expedicion" max="{{ date('Y-m-d') }}">
                                        @error('fecha_expedicion')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="date" class="form-control" name="fecha_vencimiento" wire:model="fecha_vencimiento" max="{{ date('Y-m-d') }}">
                                        @error('fecha_vencimiento')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label d-inline-flex" > <div class="divcuadro">150</div>INICIO DE ACTIVIDAD</labep>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="date" class="form-control" name="inic_actividad" wire:model="inic_actividad" max="{{ date('Y-m-d') }}">
                                        @error('inic_actividad')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div><!-- Row -->
                    </div>
                    <div>
                        <div class="row form-group">
                            <h4 class="mb-4"> AUTORIZACIÓN DE ANUNCIO</h4>
                            <div class="col-md-12 mb-5">
                                <div class="table-responsive">
                                    <table id="vias" class="table" style="font-size:10px;">
                                        <thead>
                                            <tr >
                                                <th>
                                                    <button type="button" class="btn btn-success btn-icon" wire:loading.attr="disabled" wire:click="aumentarAutorizacionAnuncio" tabindex="90">+</button>
                                                </th>
                                                <th style="width:10px"><label class="form-label d-inline-flex" > <div class="divcuadro">152</div>CÓD. TIPO ANUNCIO</label></th>
                                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">154</div>Nº LADOS</label></th>
                                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">155</div>AREA AUTORIZADA DEL ANUNCIO (M2)</label></th>
                                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">156</div>AREA VERIFICADA DEL ANUNCIO (M2)</label></th>
                                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">157</div>Nº EXPEDIENTE</label></th>
                                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">158</div>Nº LICENCIA</label></th>
                                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">159</div>F. EXPEDICION</label></th>
                                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">160</div>Fº VENCIMIENTO</label></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for($i=0;$i<$cont2;$i++)
                                            <tr >
                                                <!-- JALAR SELECT CODI ANUNCIO -->
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-icon" wire:loading.attr="disabled" wire:click="reducirAutorizacionAnuncio({{ $i }})">-</button>
                                                </td>
                                                <td>
                                                    <select  type="text" class="form-select" data-width="100%" data-live-search="true" name="codi_anuncio[]" id="codi_anuncio.{{$i}}" wire:model="codianuncio.{{$i}}">
                                                        <option value="">Seleccione</option>
                                                        @foreach(\App\Models\TablaCodigo::where('id_tabla','=','ANU')?->orderby('codigo','asc')?->get() as $tablacodigo)
                                                            <option value="{{$tablacodigo?->codigo}}">{{$tablacodigo?->codigo}} {{$tablacodigo?->desc_codigo}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('codianuncio.'.$i)
                                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input  type="text" class="form-control" name="nume_lados[]" id="nume_lados.{{$i}}" wire:model="nume_lados.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="2">
                                                    @error('nume_lados.'.$i)
                                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input  type="text" class="form-control" name="area_autorizada[]" id="area_autorizada.{{$i}}" wire:model="area_autorizada.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="9">
                                                    @error('area_autorizada.'.$i)
                                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input  type="text" class="form-control" name="area_verificada[]" id="area_verificada.{{$i}}" wire:model="area_verificada.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="9">
                                                    @error('area_verificada.'.$i)
                                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input  type="text" class="form-control" name="nume_expediente1[]" id="nume_expediente1.{{$i}}" wire:model="nume_expediente1.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10">
                                                    @error('nume_expediente.'.$i)
                                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input  type="text" class="form-control" name="nume_licencia1[]" id="nume_licencia1.{{$i}}" wire:model="nume_licencia1.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10">
                                                    @error('nume_licencia.'.$i)
                                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control" name="fecha_expedicion1[]" id="fecha_expedicion1.{{$i}}" wire:model="fecha_expedicion1.{{$i}}" max="{{ date('Y-m-d') }}">
                                                    @error('fecha_expedicion.'.$i)
                                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control" name="fecha_vencimiento1[]" id="fecha_vencimiento1.{{$i}}" wire:model="fecha_vencimiento1.{{$i}}" max="{{ date('Y-m-d') }}">
                                                    @error('fecha_vencimiento.'.$i)
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
                    </div>                    
                    <div class="row form-group">
                        <h4 class="mb-4"> INFORMACION COMPLEMENTARIA</h4>
                        <div class="row form-group">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">88</div>CONDICIÓN DE DECLARANTE</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="cond_declarante" id="cond_declarante" wire:model="cond_declarante" >
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
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">161</div>DOCUMENTOS PRESENTADOS</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="docu_presentado" id="docu_presentado" wire:model="docu_presentado">
                                        <option value="">SELECCIONE</option>
                                        @foreach(\App\Models\TablaCodigo::where('id_tabla','=','DFE')->orderby('codigo','asc')->get() as $tablacodigo)
                                            <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                                        @endforeach
                                    </select>
                                    @error('docu_presentado')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">90</div>ESTADO DE LLENADO DE LA FICHA</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="esta_llenado" id="esta_llenado" wire:model="esta_llenado">

                                        <option value="">SELECCIONE</option>
                                        @foreach(\App\Models\TablaCodigo::where('id_tabla','=','LLE')->orderby('codigo','asc')->get() as $tablacodigo)
                                            <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                                        @endforeach
                                    </select>
                                    @error('esta_llenado')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">93</div>MANTENIMIENTO</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="mantenimiento" id="mantenimiento" wire:model="mantenimiento">
                                        <option value="">SELECCIONE</option>
                                        @foreach(\App\Models\TablaCodigo::where('id_tabla','=','MFE')->orderby('codigo','asc')->get() as $tablacodigo)
                                            <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                                        @endforeach
                                    </select>
                                    @error('mantenimiento')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Col -->
                    </div><!-- Col -->
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
                            <input type="number" class="form-control" name="numdocumentodeclarante" wire:model.lazy="numdocumentodeclarante" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="17" placeholder="DNI declarante">
                            @error('numdocumentodeclarante')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                            @if ($message = Session::get('dark'))
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @endif


                            <label class="form-label d-inline-flex" > NOMBRES</label>
                            <input type="text" class="form-control" name="nombres_declarante" wire:model="nombres_declarante" onkeydown="return /[a-ñ]/i.test(event.key)" placeholder="Nombre declarante">
                            @error('nombres_declarante')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror


                            <label class="form-label d-inline-flex" > APELLIDO PATERNO</label>
                            <input type="text" class="form-control" name="apellido_paterno_declarante" wire:model="apellido_paterno_declarante" onkeydown="return /[a-ñ]/i.test(event.key)" placeholder="A. Paterno declarante">
                            @error('apellido_paterno_declarante')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror


                            <label class="form-label d-inline-flex" > APELLIDO MATERNO</label>
                            <input type="text" class="form-control" name="apellido_materno_declarante" wire:model="apellido_materno_declarante" onkeydown="return /[a-ñ]/i.test(event.key)" placeholder="A. Materno declarante">
                            @error('apellido_materno_declarante')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror


                            <label class="form-label d-inline-flex" > FECHA</label>
                            <input type="date" class="form-control" name="fecha_declarante" wire:model="fecha_declarante" max="{{ date('Y-m-d') }}" >
                            @error('fecha_declarante')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror

                        </div>



                        <div class="col-md-3 mb-3">
                            <label class="form-label d-inline-flex" > <div class="divcuadro">95</div>SUPERVISOR</label>
                            <select class="form-select"  data-width="100%" data-live-search="true" name="supervisor" id="supervisor" wire:model="supervisor">
                                <option value="">SELECCIONE</option>
                                @foreach($supervisores as $supervisor)
                                    <option value="{{$supervisor->id_persona}}">{{$supervisor->nume_doc}} {{$supervisor->nombres}} {{$supervisor->ape_paterno}} {{$supervisor->ape_materno}}</option>
                                @endforeach
                            </select>
                            @error('supervisor')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                            <label class="form-label d-inline-flex" > FECHA</label>
                            <input type="date" class="form-control" name="fecha_supervision" wire:model="fecha_supervision" max="{{ date('Y-m-d') }}">
                            @error('fecha_supervision')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label d-inline-flex" > <div class="divcuadrorequired">96</div>TÉCNICO CATASTRAL</label>
                            <select class="form-select"  data-width="100%" data-live-search="true" name="tecnico" id="tecnico" wire:model="tecnico">
                                <option value="">SELECCIONE</option>
                                @foreach($tecnicos as $tecnico)
                                    <option value="{{$tecnico->id_persona}}">{{$tecnico->nume_doc}} {{$tecnico->nombres}} {{$tecnico->ape_paterno}} {{$tecnico->ape_materno}}</option>
                                @endforeach
                            </select>
                            @error('tecnico')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                            <label class="form-label d-inline-flex" > FECHA</label>
                            <input type="date" class="form-control" name="fecha_levantamiento" wire:model="fecha_levantamiento" max="{{ date('Y-m-d') }}">
                            @error('fecha_levantamiento')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label d-inline-flex" > <div class="divcuadro">97</div>Vº Bº VERIFICADOR CATASTRAL</label>
                            <select class="form-select"  data-width="100%" data-live-search="true" name="verificador" id="verificador" wire:model="verificador">
                                <option value="">SELECCIONE</option>
                                @foreach($verificadores as $verificador)
                                    <option value="{{$verificador->id_persona}}">{{$verificador->nume_doc}} {{$verificador->nombres}} {{$verificador->ape_paterno}} {{$verificador->ape_materno}}</option>
                                @endforeach
                            </select>
                            @error('verificador')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                            <label class="form-label d-inline-flex" > Nº DE REGISTRO</label>
                            <input type="text" class="form-control" name="nume_registro" wire:model="nume_registro">
                            @error('nume_registro')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                            <label class="form-label d-inline-flex" > FECHA</label>
                            <input type="date" class="form-control" name="fecha_verificacion" wire:model="fecha_verificacion" max="{{ date('Y-m-d') }}">
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
    </form>
</div>
@push('custom-scripts')
<script>


    $('#deparamentoconductor').append("<option value='' >SELECCIONE</option>");
    <?php foreach ($departamentos  as $dep): ?>
        $('#deparamentoconductor').append("<option value='{{$dep?->cod_dep}}' >{{$dep?->descri}}</option>");
    <?php endforeach ?>
</script>
    @if($fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)!="")
    <script>
        $('#provinciaconductor').append("<option value='' >SELECCIONE</option>");
        <?php foreach ($provincias  as $pro): ?>
            if({{$pro?->cod_dep}}=='{{$fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)?->codi_dep}}'){
                $('#provinciaconductor').append("<option value='{{$pro?->cod_pro}}' >{{$pro?->descri}}</option>");
            }
        <?php endforeach ?>
    </script>
    @endif
    @if($fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)!="")
    <script>
        $('#distritoconductor').append("<option value='' >SELECCIONE</option>");
        <?php foreach ($distritos  as $dis): ?>
            if({{$dis?->cod_pro}}=='{{$fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)?->codi_pro}}' && {{$dis?->cod_dep}}=='{{$fichaanterior?->conductor?->persona?->domiciliotitular($fichaanterior->id_ficha)?->codi_dep}}')
            {
                $('#distritoconductor').append("<option value='{{$dis?->codi_dis}}' >{{$dis?->descri}}</option>");
            }
        <?php endforeach ?>
    </script>
    @endif

<script>

$('#deparamentoconductor').change(agregarValores2);
$('#provinciaconductor').change(agregarValores3);

function agregarValores2(){
    limpiarselect2();
    $('#provinciaconductor').append("<option value='' >SELECCIONE</option>");
    <?php foreach ($provincias  as $pro): ?>
        if({{$pro?->cod_dep}}==$("#deparamentoconductor option:selected").val()){
            $('#provinciaconductor').append("<option value='{{$pro?->cod_pro}}' >{{$pro?->descri}}</option>");
        }
    <?php endforeach ?>
}

function limpiarselect2(){
    $('#provinciaconductor').empty();
    $('#distritoconductor').empty();
}

function agregarValores3(){
    limpiarselect3();
    $('#distritoconductor').append("<option value='' >SELECCIONE</option>");
    <?php foreach ($distritos  as $dis): ?>
        if({{$dis?->cod_pro}}==$("#provinciaconductor option:selected").val() && {{$dis?->cod_dep}}==$("#deparamentoconductor option:selected").val())
        {
            $('#distritoconductor').append("<option value='{{$dis?->codi_dis}}' >{{$dis?->descri}}</option>");
        }
    <?php endforeach ?>
}

function limpiarselect3(){
    $('#distritoconductor').empty();
}
</script>
@endpush
