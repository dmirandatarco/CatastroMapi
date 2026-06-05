<div class="card">
<form id="contact" method="POST" class="forms-sample" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="card-body" style="background-color: #fff8e4">
        <div class="row">
            <h3 class="mb-4">Ficha Catastral Urbana Cotitularidad</h3>
            <div class="row form-group">                
            <h4 class="mb-4"> DATOS GENERALES</h4>
                <div class="col-md-2">
                    <div class="mb-3">
                        <input type="hidden" name="fichaanterior" value="{{$fichaanterior->id_ficha}}" >
                        <label class="form-label d-inline-flex" > NUMERO DE FICHA</label>
                        <input type="text" class="form-control" placeholder="" name="numeficha" wire:model.lazy="numeficha">
                        @error('numeficha')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                </div><!-- Col -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label d-inline-flex" > NUMERO DE FICHAS POR LOTE</label>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="" name="nume_ficha_lote" wire:model="nume_ficha_lote">
                                @error('nume_ficha_lote')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="" name="nume_ficha_lote2" wire:model="nume_ficha_lote2">
                                @error('nume_ficha_lote2')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div><!-- Col -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label d-inline-flex" > <div class="divcuadro">1</div> CÓDIGO ÚNICO CATASTRAL - CUC</label>
                        <input type="text" class="form-control" placeholder="" name="cuc" value="{{$fichaanterior->unicat->cuc}}">
                        @error('cuc')
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
                            <input type="text" class="form-control" readonly placeholder="" name="dc" value="{{$fichaanterior->unicat->dc}} ">
                        </div>
                    </div>
                </div><!-- Col -->
            </div><!-- Row -->
            

            
            @for ($i = 0; $i < $total; $i++)
                    <div class="row form-group" id="titular{{ $i }}">
                        <h4 class="mb-4">DATOS DEL TITULAR CATASTRAL</h4>
                        <div class="col-md-2">
                            <div class="mb-2">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">124</div> NRO. DE COTITULAR
                                </label>
                                <input type="text" class="form-control" name="nume_titular[]" readonly
                                    placeholder="Nro de cotitular" value="{{ $i + 1 }}">
                                <span class="text-danger">
                                    @error('zona_dist')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-2">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">125</div> TOTAL DE COTITULARES
                                </label>
                                <input type="text" class="form-control" name="nume_titular[]" readonly
                                    placeholder="Nro de cotitular" value="{{ $total }}">
                                <span class="text-danger">
                                    @error('zona_dist')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadrorequired">126</div> TIPO DE TITULAR
                                </label>
                                <select class="form-select" data-width="100%" data-live-search="true"
                                    name="tipo_persona[]" id="tipo_persona{{ $i }}"
                                    wire:model="tipoTitular.{{ $i }}">
                                    <option value="">SELECCIONE</option>
                                    @foreach (\App\Models\TablaCodigo::where('id_tabla', '=', 'TPE')->get() as $tablacodigo)
                                        <option value="{{ $tablacodigo->codigo }}">{{ $tablacodigo->codigo }}
                                            {{ $tablacodigo->desc_codigo }}</option>
                                    @endforeach
                                </select>
                                @error('tipoTitular.' . $i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-2">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">127</div> % DE COTITULAR
                                </label>
                                <input type="text" class="form-control" name="porc_cotitular[]"
                                    placeholder="Nro de cotitular" wire:model="porc_cotitular.{{ $i }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    maxlength="12">
                                <span class="text-danger">
                                    @error('porc_cotitular.' . $i)
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-2">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">03</div> COD CONTRIBUYENTE
                                </label>
                                <input type="text" class="form-control" name="codi_contribuyente[]"
                                    placeholder="Nro de cotitular"
                                    wire:model="codi_contribuyente.{{ $i }}"
                                    maxlength="10">
                                <span class="text-danger">
                                    @error('codi_contribuyente.' . $i)
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div><!-- Col -->

                        <div class="row form-group w-100" id="natural{{ $i }}" wire:ignore>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadro">22</div> TIPO DOC. IDENTIDAD
                                    </label>
                                    <select class="form-select" data-width="100%" data-live-search="true"
                                        name="tipo_doc1[]" id="tipo_doc1"
                                        wire:model="tipo_doc1.{{ $i }}">
                                        <option value="">SELECCIONE</option>
                                        @foreach (\App\Models\TablaCodigo::where('id_tabla', '=', 'DOC')->orderby('codigo', 'asc')->get() as $tablacodigo)
                                            <option value="{{ $tablacodigo->codigo }}">{{ $tablacodigo->codigo }}
                                                {{ $tablacodigo->desc_codigo }}</option>
                                        @endforeach
                                    </select>
                                    @error('tipo_doc1.' . $i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadro">23</div> N° DOC.
                                    </label>
                                    <input type="text" class="form-control" placeholder="" name="numedoc1[]"
                                        id="numedoc1.{{ $i }}"
                                        wire:model.lazy="numedoc1.{{ $i }}">
                                    @error('numedoc1.' . $i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                    @if ($message = Session::get('info.' . $i))
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @endif
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-7 row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label d-inline-flex">
                                            <div class="divcuadro">24</div> NOMBRES
                                        </label>
                                        <input type="text" class="form-control" placeholder="" name="nombres1[]"
                                            id="nombres1.{{ $i }}"
                                            wire:model.defer="nombres1.{{ $i }}">
                                        @error('nombres1.' . $i)
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><!-- Col -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label d-inline-flex">
                                            <div class="divcuadro">25</div> APELLIDO PATERNO
                                        </label>
                                        <input type="text" class="form-control" placeholder=""
                                            name="ape_paterno1[]" id="ape_paterno1.{{ $i }}"
                                            wire:model="ape_paterno1.{{ $i }}">
                                        @error('ape_paterno1.' . $i)
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><!-- Col -->
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label d-inline-flex">
                                            <div class="divcuadro">26</div> APELLIDO MATERNO
                                        </label>
                                        <input type="text" class="form-control" placeholder=""
                                            name="ape_materno1[]" id="ape_materno1.{{ $i }}"
                                            wire:model="ape_materno1.{{ $i }}">
                                        @error('ape_materno1.' . $i)
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Col -->
                        </div><!-- Col -->
                        <div class="row form-group" id="juridica{{ $i }}" wire:ignore>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadro">31</div> Nº DE R.U.C.
                                    </label>
                                    <input type="text" class="form-control" placeholder="" name="numedoc3[]"
                                        id="numedoc3{{ $i }}"
                                        wire:model.lazy="numedoc3.{{ $i }}">
                                    @error('numedoc3.' . $i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                    @if ($message = Session::get('warning.' . $i))
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @endif
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadro">32</div> RAZON SOCIAL
                                    </label>
                                    <input type="text" class="form-control" placeholder="" name="razon_social[]"
                                        id="razon_social{{ $i }}"
                                        wire:model="razon_social.{{ $i }}">
                                    @error('razon_social.' . $i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        </div><!-- Col -->

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">38</div> FORMA DE ADQUISICION
                                </label>
                                <select class="form-select" data-width="100%" data-live-search="true"
                                    name="form_adquisicion[]" id="form_adquisicion[]"
                                    wire:model="form_adquisicion.{{ $i }}">
                                    <option value="">SELECCIONE</option>
                                    @foreach (\App\Models\TablaCodigo::where('id_tabla', '=', 'FAQ')->orderby('codigo', 'asc')->get() as $tablacodigo)
                                        <option value="{{ $tablacodigo->codigo }}">{{ $tablacodigo->codigo }}
                                            {{ $tablacodigo->desc_codigo }}</option>
                                    @endforeach
                                </select>
                                @error('form_adquisicion.' . $i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">39</div> FECHA DE ADQUISICION
                                </label>
                                <input type="date" class="form-control" placeholder="" name="fecha_adquisicion[]"
                                    wire:model="fecha_adquisicion.{{ $i }}" max="{{ date('Y-m-d') }}">
                                @error('fecha_adquisicion.' . $i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                        
                    </div><!-- Row -->
                    <div class="row form-group" id="domiclio{{ $i }}">
                        <h4 class="mb-4"> DOMICILIO FISCAL DEL COTITULAR CATASTRAL</h4>
                        <div class="col-md-2" id="departamentos{{ $i }}">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadrorequired">31</div> DEPARTAMENTO
                                    </label>
                                    <select class="form-select " data-width="100%" data-live-search="true"
                                        name="deparamentoconductor" id="deparamentoconductor{{ $i }}"
                                        wire:model="deparamentoconductor.{{ $i }}">

                                    </select>
                                </div>
                                @error('deparamentoconductor.' . $i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2" id="provincias{{ $i }}">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadrorequired">32</div> PROVINCIA
                                    </label>
                                    <select class="form-select " name="provinciaconductor"
                                        id="provinciaconductor{{ $i }}"
                                        wire:model="provinciaconductor.{{ $i }}">
                                    </select>
                                </div>
                                @error('provinciaconductor.' . $i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2" id="distritos{{ $i }}">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex">
                                        <div class="divcuadrorequired">33</div> DISTRITO
                                    </label>
                                    <select class="form-select " name="distritoconductor"
                                        id="distritoconductor{{ $i }}"
                                        wire:model="distritoconductor.{{ $i }}">


                                    </select>
                                </div>
                                @error('distritoconductor.' . $i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">34</div> TELÉFONO
                                </label>
                                <input type="text" class="form-control" placeholder="" name="telefonoconductor[]"
                                    wire:model="telefonoconductor.{{ $i }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    maxlength="10">
                                @error('telefonoconductor.' . $i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">35</div> ANEXO
                                </label>
                                <input type="text" class="form-control" placeholder="" name="anexoconductor[]"
                                    wire:model="anexoconductor.{{ $i }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    maxlength="5">
                                @error('anexoconductor.' . $i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">45</div> EMAIL
                                </label>
                                <input type="text" class="form-control" placeholder="" name="emailconductor[]"
                                    wire:model="emailconductor.{{ $i }}" maxlength="100">
                                @error('emailconductor.' . $i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">05</div> C. VIA
                                </label>
                                <input type="text" class="form-control" placeholder=""
                                    name="codigoviaconductor[]"
                                    wire:model.lazy="codigoviaconductor.{{ $i }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    maxlength="6">
                                @error('codigoviaconductor.' . $i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">06</div> T. VIA
                                </label>
                                <input type="text" class="form-control" placeholder="" name="tipoviaconductor[]"
                                    wire:model="tipoviaconductor.{{ $i }}" maxlength="4">
                                @error('tipoviaconductor.' . $i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">07</div> NOMBRE DE VIA
                                </label>
                                <input type="text" class="form-control" placeholder=""
                                    name="nombreviaconductor[]" wire:model="nombreviaconductor.{{ $i }}"
                                    maxlength="100">
                                @error('nombreviaconductor.' . $i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">09</div> N° MUNICIPAL
                                </label>
                                <input type="text" class="form-control" placeholder=""
                                    name="nmunicipalconductor[]" wire:model="nmunicipalconductor.{{ $i }}"
                                    maxlength="6">
                                @error('nmunicipalconductor.' . $i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->                        
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">13</div> N. INTERIOR
                                </label>
                                <input type="text" class="form-control" placeholder=""
                                    name="ninteriorconductor[]" wire:model="ninteriorconductor.{{ $i }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    maxlength="4">
                                @error('ninteriorconductor.' . $i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">14</div> CÓDIGO DE HU
                                </label>
                                <input type="text" class="form-control" placeholder=""
                                    name="codigohurbanoconductor[]"
                                    wire:model="codigohurbanoconductor.{{ $i }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    maxlength="4">
                                @error('codigohurbanoconductor.' . $i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">15</div> NOMBRE DE LA HABILITACIÓN URBANA
                                </label>
                                <input type="text" class="form-control" placeholder=""
                                    name="nombrehhurbanaconductor[]"
                                    wire:model="nombrehhurbanaconductor.{{ $i }}" maxlength="100">
                                @error('nombrehhurbanaconductor.' . $i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-2">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">16</div> ZONA/SECTOR/ETAPA
                                </label>
                                <input type="text" class="form-control" placeholder="" name="zonaconductor[]"
                                    wire:model="zonaconductor.{{ $i }}" maxlength="50">
                                @error('zonaconductor.' . $i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">17</div> MANZANA
                                </label>
                                <input type="text" class="form-control" placeholder="" name="manzanaconductor[]"
                                    wire:model="manzanaconductor.{{ $i }}" maxlength="5">
                                @error('manzanaconductor.' . $i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-1">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">18</div> LOTE
                                </label>
                                <input type="text" class="form-control" placeholder="" name="loteconductor[]"
                                    wire:model="loteconductor.{{ $i }}" maxlength="5">
                                @error('loteconductor.' . $i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex">
                                    <div class="divcuadro">19</div> SUB-LOTE
                                </label>
                                <input type="text" class="form-control" placeholder="" name="subloteconductor[]"
                                    wire:model="subloteconductor.{{ $i }}" maxlength="5">
                                @error('subloteconductor.' . $i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                @endfor

            <div class="row form-group">
                <h4 class="mb-4"> INFORMACION COMPLEMENTARIA</h4>
                <div class="row form-group">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex" > <div class="divcuadro">114</div>CONDICIÓN DE DECLARANTE</label>
                            <select class="form-select"  data-width="100%" data-live-search="true" name="cond_declarante" id="cond_declarante" wire:model="cond_declarante">
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
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex" > <div class="divcuadrorequired">116</div>ESTADO DE LLENADO DE LA FICHA</label>
                            <select class="form-select"  data-width="100%" data-live-search="true" name="esta_llenado" id="esta_llenado" wire:model="esta_llenado">
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
                </div>
            </div><!-- Col -->
            <div class="row form-group">
            <h4 class="mb-5"> OBSERVACION</h4>
                <div class="col-md-12">
                    <div class="mb-3">
                        <textarea type="textarea" class="form-control" rows="5" name="observacion" wire:model="observacion" ></textarea>
                    </div>
                    @error('observacion')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div><!-- Col -->
            </div><!-- Row -->
            <div class="row form-group">

                <div class="col-md-3 mb-3">

                        <label class="form-label d-inline-flex">
                            <div class="divcuadro">120</div>DECLARANTE DNI
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
                        <input type="text" class="form-control" name="nombres_declarante" wire:model="nombres_declarante" onkeydown="return /[a-ñ ]/i.test(event.key)" placeholder="Nombre declarante">
                        @error('nombres_declarante')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror


                        <label class="form-label d-inline-flex" > APELLIDO PATERNO</label>
                        <input type="text" class="form-control" name="apellido_paterno_declarante" wire:model="apellido_paterno_declarante" onkeydown="return /[a-ñ ]/i.test(event.key)" placeholder="A. Paterno declarante">
                        @error('apellido_paterno_declarante')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror


                        <label class="form-label d-inline-flex" > APELLIDO MATERNO</label>
                        <input type="text" class="form-control" name="apellido_materno_declarante" wire:model="apellido_materno_declarante" onkeydown="return /[a-ñ ]/i.test(event.key)" placeholder="A. Materno declarante">
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
                    <label class="form-label d-inline-flex" > <div class="divcuadro">121</div>SUPERVISOR</label>
                    <select class="form-select"  data-width="100%" data-live-search="true" name="supervisor" id="supervisor" wire:model="supervisor" >
                        <option value="">SELECCIONE</option>
                        @foreach($supervisores as $supervisor)
                            <option value="{{$supervisor->id_persona}}">{{$supervisor->nume_doc}} {{$supervisor->nombres}} {{$supervisor->ape_paterno}} {{$supervisor->ape_materno}}</option>
                        @endforeach
                    </select>
                    @error('supervisor')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                    <label class="form-label d-inline-flex" > FECHA</label>
                    <input type="date" class="form-control" name="fecha_supervision" wire:model="fecha_supervision" max="{{ date('Y-m-d') }}" >
                    @error('fecha_supervision')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">122</div>TÉCNICO CATASTRAL</label>
                    <select class="form-select"  data-width="100%" data-live-search="true" name="tecnico" id="tecnico" wire:model="tecnico" >
                        <option value="">SELECCIONE</option>
                        @foreach($tecnicos as $tecnico)
                            <option value="{{$tecnico->id_persona}}">{{$tecnico->nume_doc}} {{$tecnico->nombres}} {{$tecnico->ape_paterno}} {{$tecnico->ape_materno}}</option>
                        @endforeach
                    </select>
                    @error('tecnico')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                    <label class="form-label d-inline-flex" > FECHA</label>
                    <input type="date" class="form-control" name="fecha_levantamiento" wire:model="fecha_levantamiento"  max="{{ date('Y-m-d') }}">
                    @error('fecha_levantamiento')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label d-inline-flex" > <div class="divcuadro">123</div>Vº Bº VERIFICADOR CATASTRAL</label>
                    <select class="form-select"  data-width="100%" data-live-search="true" name="verificador" id="verificador" wire:model="verificador" >
                        <option value="">SELECCIONE</option>
                        @foreach($verificadores as $verificador)
                            <option value="{{$verificador->id_persona}}">{{$verificador->nume_doc}} {{$verificador->nombres}} {{$verificador->ape_paterno}} {{$verificador->ape_materno}}</option>
                        @endforeach
                    </select>
                    @error('verificador')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                    <label class="form-label d-inline-flex" > Nº DE REGISTRO</label>
                    <input type="text" class="form-control" name="nume_registro" wire:model="nume_registro" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10" >
                    @error('nume_registro')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                    <label class="form-label d-inline-flex" > FECHA</label>
                    <input type="date" class="form-control" name="fecha_verificacion" wire:model="fecha_verificacion"  max="{{ date('Y-m-d') }}">
                    @error('fecha_verificacion')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div>
            </div><!-- Row -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" wire:click.prevent="register">Guardar</button>
            </div>
        </div>
    </div>
</form>
</div>
@push('custom-scripts')
@for($i=0;$i<$total;$i++)
<script>

if('{{$tipoTitular[$i]}}'=="1"){
    $('#natural{{$i}}').show();
    $('#juridica{{$i}}').hide();
}
if('{{$tipoTitular[$i]}}'=="2"){
    $('#natural{{$i}}').hide();
    $('#juridica{{$i}}').show();
}

$('#tipo_persona{{$i}}').change(agregar);


function agregar()
{
    if($("#tipo_persona{{$i}} option:selected").val()=="1"){
        $('#natural{{$i}}').show();
        $('#juridica{{$i}}').hide();
    }
    if($("#tipo_persona{{$i}} option:selected").val()=="2"){
        $('#natural{{$i}}').hide();
        $('#juridica{{$i}}').show();
    }
    if($("#tipo_persona{{$i}} option:selected").val()!="2" && $("#tipo_persona{{$i}} option:selected").val()!="1"){
        $('#natural{{$i}}').hide();
        $('#juridica{{$i}}').hide();
    }
}



$('#deparamentoconductor{{$i}}').append("<option value='' >SELECCIONE</option>");
<?php foreach ($departamentos  as $dep): ?>
    $('#deparamentoconductor{{$i}}').append("<option value='{{$dep->cod_dep}}' >{{$dep->descri}}</option>");
<?php endforeach ?>

</script>
    @if($fichaanterior->titulars[$i]->persona->domiciliotitular($fichaanterior->id_ficha)!="")
    <script>
        $('#provinciaconductor{{$i}}').append("<option value='' >SELECCIONE</option>");
        <?php foreach ($provincias  as $pro): ?>
            if({{$pro->cod_dep}}=='{{$fichaanterior->titulars[$i]->persona->domiciliotitular($fichaanterior->id_ficha)->codi_dep}}'){
                $('#provinciaconductor{{$i}}').append("<option value='{{$pro->cod_pro}}' >{{$pro->descri}}</option>");
            }
        <?php endforeach ?>
    </script>
    @endif
    @if($fichaanterior->titulars[$i]->persona->domiciliotitular($fichaanterior->id_ficha)!="")
    <script>
        $('#distritoconductor{{$i}}').append("<option value='' >SELECCIONE</option>");
        <?php foreach ($distritos  as $dis): ?>
            if({{$dis->cod_pro}}=='{{$fichaanterior->titulars[$i]->persona->domiciliotitular($fichaanterior->id_ficha)->codi_pro}}' && {{$dis->cod_dep}}=='{{$fichaanterior->titulars[$i]->persona->domiciliotitular($fichaanterior->id_ficha)->codi_dep}}')
            {
                $('#distritoconductor{{$i}}').append("<option value='{{$dis->codi_dis}}' >{{$dis->descri}}</option>");
            }
        <?php endforeach ?>
    </script>
    @endif
<script>


$('#deparamentoconductor{{$i}}').change(agregarValores2);
$('#provinciaconductor{{$i}}').change(agregarValores3);

function agregarValores2(){
    limpiarselect2();
    $('#provinciaconductor{{$i}}').empty();
    $('#distritoconductor{{$i}}').empty();
    $('#provinciaconductor{{$i}}').append("<option value='' >SELECCIONE</option>");
    <?php foreach ($provincias  as $pro): ?>
        if({{$pro->cod_dep}}==$("#deparamentoconductor{{$i}} option:selected").val()){
            $('#provinciaconductor{{$i}}').append("<option value='{{$pro->cod_pro}}' >{{$pro->descri}}</option>");
        }
    <?php endforeach ?>
}

function limpiarselect2(){
    $('#provinciaconductor{{$i}}').empty();
    $('#distritoconductor{{$i}}').empty();
}

function agregarValores3(){
    limpiarselect3();
    $('#distritoconductor{{$i}}').empty();
    $('#distritoconductor{{$i}}').append("<option value='' >SELECCIONE</option>");
    <?php foreach ($distritos  as $dis): ?>
        if({{$dis->cod_pro}}==$("#provinciaconductor{{$i}} option:selected").val() && {{$dis->cod_dep}}==$("#deparamentoconductor{{$i}} option:selected").val())
        {
            $('#distritoconductor{{$i}}').append("<option value='{{$dis->codi_dis}}' >{{$dis->descri}}</option>");
        }
    <?php endforeach ?>
}

function limpiarselect3(){
    $('#distritoconductor{{$i}}').empty();
}
</script>
@endfor
@endpush
