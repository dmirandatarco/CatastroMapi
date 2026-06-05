
<div class="row">
    <form id="contact" method="POST" class="forms-sample" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="col-md-12 grid-margin stretch-card" >
        <div class="card">
            <div class="card-body">
                <div class="row">
                <h3 class="mb-4">Ficha Catastral Urbana Bien Cultural</h3>

                    <div class="row form-group">
                        <h4 class="mb-4"> DATOS GENERALES</h4>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > NUMERO DE FICHA</label>
                                <input type="text" class="form-control" placeholder="" name="nume_ficha" wire:model="nume_ficha" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="7">
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
                                        <input type="text" class="form-control" placeholder="" name="nume_ficha_lote" wire:model="nume_ficha_lote" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="3">
                                        @error('nume_ficha_lote')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="" name="nume_ficha_lote2" wire:model="nume_ficha_lote2" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="3">
                                        @error('nume_ficha_lote2')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
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
                                <label class="form-label d-inline-flex" > <div class="divcuadro">2</div> CÓDIGO HOJA CATASTRAL</label>
                                <input type="text" class="form-control" placeholder="" name="codi_hoja_catastral" wire:model="codi_hoja_catastral" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10">
                                @error('codi_hoja_catastral')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row  form-group">
                        <div class="col-md-12 row" style="place-content: center;text-align: center;">
                            <label class="form-label d-inline-flex" > <div class="divcuadrorequired">3</div> CÓDIGO DE REFERENCIA CATASTRAL / URBANO</label>
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
                    <div class="row  form-group">
                        <div class="col-md-12 row" style="place-content: center;text-align: center;">
                            <label class="form-label d-inline-flex" > <div class="divcuadrorequired">4</div> CÓDIGO DE REFERENCIA CATASTRAL / RURAL</label>
                                    <label class="form-label " >ZONA / COORDENADA ESTE / COORDENADA NORTE / RURAL</label>
                                    <input type="text" class="form-control" name="crc_rural" wire:model="crc_rural">
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <h2 class="mb-4"> MONUMENTO ARQUELOGICO PREHISPANICO</h2>
                        <h4 class="mb-4"> DESCRIPCIÓN DEL BIEN CULTURAL</h4>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">162</div> CATEGORIA DEL INMUEBLE</label>
                                    <select class="form-select insumo_id" id="cat_inmueble" name="cat_inmueble" data-width="100%" wire:model="cat_inmueble">
                                        <option value="">Seleccione</option>
                                        <option value="01">01 PATRIMONIO MUNDIAL</option>
                                        <option value="02">02 ZONA ARQUEOLÓGICA MONUMENTAL</option>
                                        <option value="03">03 SITIO ARQUEOLÓGICO</option>
                                        <option value="04">04 ZONA DE RESERVA ARQUEOLÓGICA</option>
                                        <option value="05">05 ELEMENTO ARQUEOLÓGICO AISLADO</option>
                                        <option value="06">06 PAISAJE CULTURAL ARQUEÓLOGICO</option>

                                    </select>
                                </div>
                                <span class="text-danger">@error('cat_inmueble'){{$message}}@enderror</span>
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-6">
                            <div class="mb-2">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">163</div> NOMBRE DEL MONUMENTO</label>
                                    <input type="text" class="form-control" placeholder="" name="nombre_monumento" id="nombre_monumento" wire:model="nombre_monumento" maxlength="150">
                                    @error('nombre_monumento')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" ><div class="divcuadroinvi"></div>  CÓDIGO</label>
                                    <input type="text" class="form-control" placeholder="" name="cod_monumento" id="cod_monumento" wire:model="cod_monumento" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="15">
                                    @error('cod_monumento')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div><!-- Col -->

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">164</div> AREA</label>
                                <select class="form-select" id="tipo_area" name="tipo_area" data-width="100%" wire:model="tipo_area">
                                    <option value="">Seleccione</option>
                                    <option value="1">1 M2</option>
                                    <option value="2">2 HE</option>
                                </select>
                                @error('tipo_area')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">164</div> AREA</label>
                                <input type="text" class="form-control" placeholder="" name="area_monu" id="area_monu" wire:model="area_monu" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="13">
                                @error('area_monu')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->

                        <div class="col-md-3">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">165</div> PERIMETRO</label>
                                    <input type="text" class="form-control" placeholder="" name="perimetro_monumento" id="perimetro_monumento" wire:model="perimetro_monumento" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="13">
                                    @error('perimetro_monumento')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div><!-- Col -->

                        <div class="col-md-3">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">166</div> FILIACIÓN CRONOLÓGICA</label>
                                    <select class="form-select insumo_id" id="fil_crono" name="fil_crono" data-width="100%" wire:model="fil_crono">
                                        <option value="">Seleccione</option>
                                        <option value="1">01 PRE-CERAMICO</option>
                                        <option value="2">02 PERIODO INICIAL</option>
                                        <option value="3">03 HORIZONTE TEMPRANO </option>
                                        <option value="4">04 INTERMEDIO TEMPRANO</option>
                                        <option value="5">05 HORIZONTE MEDIO</option>
                                        <option value="6">06 INTERMEDIO TARDIO</option>
                                        <option value="7">07 HORIZONTE TARDIO</option>
                                        <option value="8">08 VARIOS PERIODOS</option>
                                        <option value="9">09 INDETERMINADO </option>
                                    </select>
                                </div>
                                <span class="text-danger">@error('fil_crono'){{$message}}@enderror</span>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->

                    <div class="row form-group">
                        <h4 class="mb-4"> CONDICIONES FISICAS DEL MONUMENTO ARQUEOLÓGICO</h4>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">167</div> PRESENCIA DE ARQUITECTURA</label>
                                <select class="form-select" id="presencia_arquitectura" name="presencia_arquitectura" data-width="100%" wire:model="presencia_arquitectura">
                                    <option value="">Seleccione</option>
                                    <option value="01">01 Si</option>.
                                    <option value="02">02 No</option>
                                </select>
                                @error('presencia_arquitectura')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->

                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr >
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">168</div>TIPO DE ARQUITECTURA</label></th>
                                            <th>

                                                @if($cont>0)
                                                    <button type="button" class="btn btn-danger btn-icon" wire:click="reducirTipoArquitectura">-</button>
                                                @else
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarTipoArquitectura" tabindex="90">+</button>
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<$cont;$i++)
                                        <tr >
                                            <td>
                                                <select class="form-select insumo_id" id="tipo_arquitectura.{{$i}}" name="tipo_arquitectura" data-width="100%" wire:model="tipo_arquitectura.{{$i}}">
                                                    <option value="">Seleccione</option>
                                                    <option value="01_MONTICULO ">01 MONTICULO </option>
                                                    <option value="02_PLATAFORMAS">02 PLATAFORMAS</option>
                                                    <option value="03_PIRAMIDE ">03 PIRAMIDE </option>
                                                    <option value="04_COMPLEJO PIRAMIDAL">04 COMPLEJO PIRAMIDAL</option>
                                                    <option value="05_ESTRUCTURA AISLADA">05 ESTRUCTURA AISLADA</option>
                                                    <option value="06_ALDEA">06 ALDEA</option>
                                                    <option value="07_CIUDADELA ">07 CIUDADELA </option>
                                                    <option value="08_SITIO AMURALLADO">08 SITIO AMURALLADO</option>
                                                    <option value="09_ESTRUCTURA FUNERARIA ">09 ESTRUCTURA FUNERARIA </option>
                                                    <option value="10_CEMENTERIO">10 CEMENTERIO</option>
                                                    <option value="11_AREAS DE ACTIVIDAD">11 AREAS DE ACTIVIDAD</option>
                                                    <option value="12_PARAVIENTO">12 PARAVIENTO</option>
                                                    <option value="13_ABRIGOS Y CUEVAS">13 ABRIGOS Y CUEVAS</option>
                                                    <option value="14_PETROGLIPOS ">14 PETROGLIPOS </option>
                                                    <option value="15_TERRAZAS HABITACIONALES">15 TERRAZAS HABITACIONALES</option>
                                                    <option value="16_SISTEMA HIDRAULICO">16 SISTEMA HIDRAULICO</option>
                                                    <option value="17_SISTEMA DE CAMINOS">17 SISTEMA DE CAMINOS</option>
                                                    <option value="18_SISTEMA AGRICOLA">18 SISTEMA AGRICOLA</option>
                                                    <option value="19_GEOGLIFOS">19 GEOGLIFOS</option>
                                                    <option value="20_PINTURAS RUPESTRES">20 PINTURAS RUPESTRES</option>
                                                    <option value="21_OTROS">21 OTROS</option>
                                                </select>
                                                @error('tipo_arquitectura.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>

                                                @if($i==$cont-1)
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarTipoArquitectura" tabindex="90">+</button>

                                                @endif
                                            </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- Col -->

                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr >
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">169</div>TIPO DE MATERIAL CONSTRUCTIVO</label></th>
                                            <th>

                                                @if($cont1>0)
                                                    <button type="button" class="btn btn-danger btn-icon" wire:click="reducirTipoMaterial">-</button>
                                                @else
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarTipoMaterial" tabindex="90">+</button>
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<$cont1;$i++)
                                        <tr >
                                            <td>
                                                <select class="form-select insumo_id" id="tipo_mateconst.{{$i}}" name="tipo_mateconst" data-width="100%" wire:model="tipo_mateconst.{{$i}}">
                                                    <option value="">Seleccione</option>
                                                    <option value="01_PIEDRA SIN TRABAJO">01 PIEDRA SIN TRABAJO </option>
                                                    <option value="02_PIEDRA CANTEADA">02 PIEDRA CANTEADA</option>
                                                    <option value="03_PIEDRA LABRADA">03 PIEDRA LABRADA </option>
                                                    <option value="04_ADOBDE HECHO A MANO">04 ADOBE HECHO A MANO</option>
                                                    <option value="05_ADOBE HECHO EN MOLDE">05 ADOBE HECHO EN MOLDE</option>
                                                    <option value="06_TAPIAL">06 TAPIAL</option>
                                                    <option value="07_QUINCHA">07 QUINCHA</option>
                                                    <option value="08_OTROS">08 OTROS</option>
                                                </select>
                                                @error('tipo_mateconst.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>

                                                @if($i==$cont1-1)
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarTipoMaterial" tabindex="90">+</button>

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
                        <h4 class="mb-4"> ESTADO DE CONSERVACIÓN</h4>
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr >
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">170</div>AFECTACIONES NATURALES</label></th>
                                            <th>
                                                @if($cont2>0)
                                                    <button type="button" class="btn btn-danger btn-icon" wire:click="reducirAfectacionNatural">-</button>
                                                @else
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarAfectacionNatural" tabindex="90">+</button>
                                                @endif

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<$cont2;$i++)
                                        <tr >
                                            <td>
                                                <select class="form-select" id="afe_natu.{{$i}}" name="afe_natu" data-width="100%" wire:model="afe_natu.{{$i}}">
                                                    <option value="">Seleccione</option>
                                                    <option value="01_LLUVIA">01 LLUVIA</option>
                                                    <option value="02_VEGETACIÓN">02 VEGETACIÓN</option>
                                                    <option value="03_INUNDACIONES">03 INUNDACIONES</option>
                                                    <option value="04_EROSIÓN">04 EROSIÓN</option>
                                                    <option value="05_HUAYCOS">05 HUAYCOS</option>
                                                    <option value="06_EÓLICO">06 EÓLICO</option>
                                                    <option value="07_OTROS">07 OTROS</option>
                                                </select>
                                                @error('afe_natu.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>

                                                @if($i==$cont2-1)
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarAfectacionNatural" tabindex="90">+</button>

                                                @endif
                                            </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr >
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">171</div>AFECTACIONES ANTRÓPICAS</label></th>
                                            <th>

                                                @if($cont3>0)
                                                <button type="button" class="btn btn-danger btn-icon" wire:click="reducirAfectacionAntropicas">-</button>
                                                @else
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarAfectacionAntropicas" tabindex="90">+</button>
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<$cont3;$i++)
                                        <tr >
                                            <td>
                                                <select class="form-select" id="afe_antro.{{$i}}" name="afe_antro" data-width="100%" wire:model="afe_antro.{{$i}}">
                                                    <option value="" >SELECCIONE</option>
                                                    <option value="01_HUAQUEO">01 HUAQUEO</option>
                                                    <option value="02_INVASIONES">02 INVASIONES</option>
                                                    <option value="03_GRAFITTIS">03 GRAFITTIS</option>
                                                    <option value="04_AGRICULTURA">04 AGRICULTURA</option>
                                                    <option value="05_ACTIVIDADES MINERAS">05 ACTIVIDADES MINERAS</option>
                                                    <option value="06_VIAS DE ACCESO">06 VIAS DE ACCESO</option>
                                                    <option value="07_TRABAJOS PUBLICOS">07 TRABAJOS PUBLICOS</option>
                                                    <option value="08_OTROS">08 OTROS</option>
                                                </select>
                                                @error('afe_antro.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>

                                                @if($i==$cont3-1)
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarAfectacionAntropicas" tabindex="90">+</button>

                                                @endif
                                            </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr >
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">172</div>INTERVENCIONES EN CONSERVACIÓN</label></th>
                                            <th>
                                                @if($cont4>0)
                                                <button type="button" class="btn btn-danger btn-icon" wire:click="reducirIntervension">-</button>
                                                @else
                                                <button type="button" class="btn btn-success btn-icon" wire:click="aumentarIntervension">+</button>
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<$cont4;$i++)
                                        <tr >
                                            <td>
                                                <select class="form-select" id="inter_cons.{{$i}}" name="inter_cons" data-width="100%" wire:model="inter_cons.{{$i}}">
                                                    <option value="" >SELECCIONE</option>
                                                    <option value="01_RESTAURADO">01 RESTAURADO</option>
                                                    <option value="02_SEÑALIZADO">02 SEÑALIZADO</option>
                                                    <option value="03_ANASTILOSIS">03 ANASTILOSIS</option>
                                                    <option value="04_CONSERVACIÓN">04 CONSERVACIÓN</option>
                                                    <option value="05_CONSOLIDACIÓN">05 CONSOLIDACIÓN</option>
                                                    <option value="06_CERCO PERIMÉTRICO">06 CERCO PERIMÉTRICO</option>
                                                    <option value="07_MUSEO DE SITIO">07 MUSEO DE SITIO</option>
                                                    <option value="08_PUESTA EN VALOR">08 PUESTA EN VALOR</option>
                                                </select>
                                                @error('inter_cons.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>

                                                @if($i==$cont4-1)
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarIntervension" tabindex="90">+</button>

                                                @endif
                                            </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group mt-5">
                    <h4 class="mb-5"> INSCRIPCION DEL PREDIO CATASTRAL</h4>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">104</div>TIPO DE PARTIDA REGISTRAL</label>
                                <select class="form-select" id="tipo_partida" aria-label="Default select example" name="tipo_partida" wire:model="tipo_partida">
                                    <option value="">Seleccione</option>
                                    <option value="01">01 TOMO</option>
                                    <option value="02">02 FICHA</option>
                                    <option value="03">03 PART. ELECTRONICA</option>
                                    <option value="04">04 CÓDIGO DEL PREDIO</option>
                                </select>
                                @error('tipo_partida')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">105</div>NUMERO</label>
                                <input type="text" id="nume_partida" class="form-control" name="nume_partida" maxlength="18" wire:model="nume_partida">
                                @error('nume_partida')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">106</div>FOJAS </label>
                                <input type="text" id="fojas" class="form-control" name="fojas" maxlength="18" wire:model="fojas">
                                @error('fojas')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">107</div>ASIENTO</label>
                                <input type="text" id="asiento" class="form-control" name="asiento" maxlength="18" wire:model="asiento">
                                @error('asiento')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">108</div>FECHA DE INSCRIPCION</label>
                                <input type="date" id="fecha_inscripcion" class="form-control" name="fecha_inscripcion" wire:model="fecha_inscripcion">
                                @error('fecha_inscripcion')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->

                    <div class="row form-group">
                        <h4 class="mb-4"> NORMA LEGAL</h4>
                        <div class="col-md-12 mb-3">
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr >
                                            <th><label class="form-label d-inline-flex" ><div class="divcuadro">173</div>NORMATIVA N°</label></th>
                                            <th><label class="form-label d-inline-flex" > FECHA</label></th>
                                            <th><label class="form-label d-inline-flex" ><div class="divcuadro">174</div> NÚMERO DE PLANO</label></th>
                                            <th>
                                                @if($cont5>0)
                                                <button type="button" class="btn btn-danger btn-icon" wire:click="reducirnorma">-</button>
                                                @else
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarnorma" tabindex="90">+</button>
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<$cont5;$i++)
                                        <tr >
                                            <td>
                                                <input type="text" class="form-control" placeholder="" name="normatividad" wire:model="normatividad.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="20">
                                                @error('normatividad.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="date" class="form-control" placeholder="" name="fecha_norma" wire:model="fecha_norma.{{$i}}" max="{{ date('Y-m-d') }}">
                                                @error('fecha_norma.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="" name="numero_plano" wire:model="numero_plano.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="20">
                                                @error('numero_plano.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>

                                                @if($i==$cont5-1)
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarnorma" tabindex="90">+</button>

                                                @endif
                                            </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>

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
                        <h2 class="mb-4"> MONUMENTO HISTÓRICO COLONIAL / REPUBLICANO</h2>
                        <h4 class="mb-4"> INFORMACION BASICA</h4>

                    </div><!-- Row -->


                    <div class="row form-group">
                        <h4 class="mb-4"> CONDICIONES FISICAS DEL MONUMENTO ARQUEOLÓGICO</h4>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">175</div> INMUEBLE DECLARADO PATRIMONIO CULTURAL DE LA NACIÓN</label>
                                <select class="form-select" id="inmueble_declarado" name="inmueble_declarado" data-width="100%" wire:model="inmueble_declarado">
                                    <option value="">Seleccione</option>
                                    <option value="01">01 Si</option>
                                    <option value="02">02 No</option>
                                </select>
                                @error('inmueble_declarado')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->

                        <div class="col-md-9">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">176</div> NOMBRE O DENOMINACIÓN</label>
                                    <input type="text" class="form-control" placeholder="" name="nombre_colonial" id="nombre_colonial" wire:model="nombre_colonial" maxlength="150">
                                    @error('nombre_monumento')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->

                    <div class="row form-group">
                        <h4 class="mb-4"> IDENTIFICACIÓN DEL TITULAR DEL BIEN CULTURAL</h4>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">24</div> TIPO DE TITULAR</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_persona" id="tipo_persona" wire:model="tipoTitular" >
                                        <option value="">SELECCIONE</option>
                                        <option value="1">1 PERSONA NATURAL</option>
                                        <option value="2">2 PERSONA JURIDICA</option>
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
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">25</div> ESTADO CIVIL</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="esta_civil1" id="esta_civil1" wire:model="esta_civil1" >
                                        <option value="" >SELECCIONE</option>
                                        <option value="01">01 SOLTERO (A)</option>
                                        <option value="02">02 CASADO (A)</option>
                                        <option value="03">03 DIVORCIADO (A)</option>
                                        <option value="04">04 VIUDO (A)</option>
                                        <option value="05">05 CONVIVIENTE</option>
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
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">26</div> TIPO DOC. IDENTIDAD</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_doc1" id="tipo_doc1" wire:model="tipo_doc1" >
                                        <option value="" >SELECCIONE</option>
                                        <option value="01">01 NO PRESENTE DOC.</option>
                                        <option value="02">02 DNI</option>
                                        <option value="03">03 CARNET DE IDENTIDAD DE POLICIA NACIONAL</option>
                                        <option value="04">04 CARNET DE IDENTIDAD DE FUERZAS ARMADAS</option>
                                        <option value="05">05 PARTIDA DE NACIMIENTO</option>
                                        <option value="06">06 PASAPORTE</option>
                                        <option value="07">07 CARNET DE EXTRANJERIA</option>
                                        <option value="08">08 OTROS</option>
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
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">27</div> N° DOC.</label>
                                    <input type="text" class="form-control" placeholder="" name="nume_doc1" id="nume_doc1" wire:model.lazy="numedoc1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
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
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">28</div> NOMBRES</label>
                                <input type="text" class="form-control" placeholder="" name="nombres1" id="nombres1" wire:model="nombres1" onkeydown="return /[a-ñ]/i.test(event.key)">
                                @error('nombres1')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">29</div> APELLIDO PATERNO</label>
                                <input type="text" class="form-control" placeholder="" name="ape_paterno1" id="ape_paterno1" wire:model="ape_paterno1" onkeydown="return /[a-ñ]/i.test(event.key)">
                                @error('ape_paterno1')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">30</div> APELLIDO MATERNO</label>
                                <input type="text" class="form-control" placeholder="" name="ape_materno1" id="ape_materno1" wire:model="ape_materno1" onkeydown="return /[a-ñ]/i.test(event.key)">
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
                                        <label class="form-label d-inline-flex" > <div class="divcuadrorequired">26</div> TIPO DOC. IDENTIDAD</label>
                                        <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_doc2" id="tipo_doc2" wire:model="tipo_doc2" >
                                            <option value="" >SELECCIONE</option>
                                            <option value="01">01 NO PRESENTE DOC.</option>
                                            <option value="02">02 DNI</option>
                                            <option value="03">03 CARNET DE IDENTIDAD DE POLICIA NACIONAL</option>
                                            <option value="04">04 CARNET DE IDENTIDAD DE FUERZAS ARMADAS</option>
                                            <option value="05">05 PARTIDA DE NACIMIENTO</option>
                                            <option value="06">06 PASAPORTE</option>
                                            <option value="07">07 CARNET DE EXTRANJERIA</option>
                                            <option value="08">08 OTROS</option>
                                        </select>
                                    </div>
                                    @error('tipo_doc2')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">27</div> N° DOC.</label>
                                    <input type="text" class="form-control" placeholder="" name="nume_doc2" id="nume_doc2" wire:model.lazy="numedoc2" >
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
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">28</div> NOMBRES</label>
                                    <input type="text" class="form-control" placeholder="" name="nombres2" id="nombres2"  wire:model="nombres2" onkeydown="return /[a-ñ]/i.test(event.key)">
                                    @error('nombres2')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">29</div> APELLIDO PATERNO</label>
                                    <input type="text" class="form-control" placeholder="" name="ape_paterno2" id="ape_paterno2"  wire:model="ape_paterno2" onkeydown="return /[a-ñ]/i.test(event.key)">
                                    @error('ape_paterno2')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">30</div> APELLIDO MATERNO</label>
                                    <input type="text" class="form-control" placeholder="" name="ape_materno2" id="ape_materno2" wire:model="ape_materno2" onkeydown="return /[a-ñ]/i.test(event.key)">
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
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">31</div> Nº DE R.U.C.</label>
                                <input type="text" class="form-control" placeholder="" name="nume_doc3" wire:model.lazy="numedoc3"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="11">
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
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">32</div> RAZON SOCIAL</label>
                                <input type="text" class="form-control" placeholder="" name="razon_social" wire:model="razon_social" maxlength="100">
                                @error('razon_social')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <!--SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">33</div> PERSONA JURIDICA</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_persona_juridica" id="tipo_persona_juridica" wire:model="tipo_persona_juridica">
                                        <option value="" >SELECCIONE</option>
                                        <option value="01">01 EMPRESA</option>
                                        <option value="02">02 COOPERATIVA</option>
                                        <option value="03">03 ASOCIACIÓN</option>
                                        <option value="04">04 FUNDACIÓN</option>
                                        <option value="05">05 OTROS</option>
                                    </select>
                                </div>
                                @error('tipo_persona_juridica')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div wire:ignore>
                                            <label class="form-label d-inline-flex" > <div class="divcuadro">34</div> COND. ESP. DEL TITULAR</label>
                                            <select class="form-select"  data-width="100%" data-live-search="true" name="cond_titular" id="cond_titular" wire:model="cond_titular" >
                                                <option value="">SELECCIONE</option>
                                                <option value="01">01 GOBIERNO CENTRAL </option>
                                                <option value="02">02 GOBIERNO LOCAL </option>
                                                <option value="03">03 GOBIERNO REGIONAL </option>
                                                <option value="04">04 BENEFICIENCIA </option>
                                                <option value="05">05 HOSPITALES </option>
                                                <option value="06">06 ENTIDADES RELIGIOSAS </option>
                                                <option value="07">07 COMPAÑIA DE BOMBEROS </option>
                                                <option value="08">08 UNIVERSIDADES </option>
                                                <option value="09">09 CENTRO EDUCATIVO </option>
                                                <option value="10">10 COMUNICAD CAMP./NATIVA </option>
                                                <option value="11">11 ORGANISMOS INTERN. </option>
                                                <option value="12">12 GOBIERNO EXTRANJERO </option>
                                                <option value="13">13 ORGANIZACIONES POLITICAS </option>
                                                <option value="14">14 BANCOS Y FINANCIERAS </option>
                                                <option value="15">15 ORG. SINDICALES </option>
                                                <option value="16">16 ORG. DISCAPACITADOS </option>
                                                <option value="17">17 CONCESION MINERA </option>
                                                <option value="18">18 PENSIONISTA </option>

                                            </select>
                                        </div>
                                        @error('tipoTitular')
                                            <span class="error-message" style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                    <div class="row form-group">
                        <h4 class="mb-4"> DESCRIPCIÓN DEL MONUMENTO INTEGRANTE DEL PATRIMONIO CULTURAL DE LA NACIÓN</h4>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">177</div> TIPO DE ARQUITECTURA</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_arquitectura2" id="tipo_arquitectura2" wire:model="tipo_arquitectura2">
                                        <option value="" >SELECCIONE</option>
                                        <option value="01">01 CIVIL PUBLICA</option>
                                        <option value="02">02 CIVIL DOMESTICA</option>
                                        <option value="03">03 RELIGIOSA</option>
                                        <option value="04">04 MILITAR</option>
                                        <option value="05">05 INDUSTRIAL</option>
                                        <option value="06">06 FUNERARIA</option>
                                        <option value="07">07 OTROS</option>
                                    </select>
                                </div>
                                @error('tipo_arquitectura')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">178</div> USO ACTUAL</label>
                                <input type="text" class="form-control" placeholder="" name="uso_actual" wire:model="uso_actual" maxlength="100">
                                @error('uso_actual')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">179</div> USO ORIGINAL</label>
                                <input type="text" class="form-control" placeholder="" name="uso_original" wire:model="uso_original"  maxlength="100">
                                @error('uso_original')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">180</div> NÚMERO DE PISOS</label>
                                <input type="text" class="form-control" placeholder="" name="num_pisos" wire:model="num_pisos" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="3">
                                @error('num_pisos')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadroinvi"></div> AÑO / SIGLO</label>
                                <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_fecha" id="tipo_fecha" wire:model="tipo_fecha" >
                                    <option value="">SELECCIONE</option>
                                    <option value="1">1 AÑO</option>
                                    <option value="2">2 SIGLO</option>
                                </select>
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-4">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">181</div> FECHA DE CONSTRUCCIÓN</label>
                                <input type="text" class="form-control" placeholder="" name="fecha_construccion" wire:model="fecha_construccion" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="4">
                                @error('fecha_construccion')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">60</div> ÁREA DE TERRENO SEGÚN TITULO(M2)</label>
                                <input type="text" class="form-control" placeholder="" name="area_segun" wire:model="area_segun" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="12">
                                @error('area_segun')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">182</div> AREA CONSTRUIDA(M2)</label>
                                <input type="text" class="form-control" placeholder="" name="area_const" wire:model="area_const" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="12">
                                @error('area_const')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">183</div> AREA LIBRE(M2)</label>
                                <input type="text" class="form-control" placeholder="" name="area_libre" wire:model="area_libre" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="12">
                                @error('area_libre')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->

                    </div><!-- Row -->

                    <div class="row form-group">
                        <div class="col-md-12 mb-3">
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr >
                                            <th><label class="form-label d-inline-flex"><div class="divcuadro">184</div>IDENTIFICACIÓN DE ELEMENTOS ARQUITECTONICOS</label></th>
                                            <th>

                                                @if($cont6>0)
                                                    <button type="button" class="btn btn-danger btn-icon" wire:click="reducirIdentifcacion">-</button>
                                                @else
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarIdentifcacion" tabindex="90">+</button>
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<$cont6;$i++)
                                        <tr >
                                            <td>
                                                <select class="form-select" id="identificacion_elementos.{{$i}}" name="identificacion_elementos" data-width="100%" wire:model="identificacion_elementos.{{$i}}">
                                                    <option value="" >SELECCIONE</option>
                                                    <option value="01_PORTADA">01 PORTADA </option>
                                                    <option value="02_BALCONES">02 BALCONES </option>
                                                    <option value="03_PILASTRAS">03 PILASTRAS </option>
                                                    <option value="04_MOLDURAS">04 MOLDURAS </option>
                                                    <option value="05_CORNISAS">05 CORNISAS </option>
                                                    <option value="06_VENTANAS">06 VENTANAS </option>
                                                    <option value="07_BALAUSTRADA">07 BALAUSTRADA </option>
                                                    <option value="08_REJAS">08 REJAS </option>
                                                    <option value="09_OTROS">09 OTROS </option>
                                                </select>
                                                @error('identificacion_elementos.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>


                                                @if($i==$cont6-1)
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarIdentifcacion" tabindex="90">+</button>

                                                @endif
                                            </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group mt-5">
                        <label class="form-label d-inline-flex" > <div class="divcuadro">185</div>DESCRIPCIÓN DE FACHADA</label>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <textarea type="textarea" class="form-control" rows="5" name="descripcion_fachada" wire:model="descripcion_fachada"></textarea>
                            </div>
                            @error('descripcion_fachada')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group mt-5">
                        <label class="form-label d-inline-flex" > <div class="divcuadro">186</div>DESCRIPCIÓN DEL INTERIOR</label>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <textarea type="textarea" class="form-control" rows="5" name="descripcion_interior" wire:model="descripcion_interior"></textarea>
                            </div>
                            @error('descripcion_interior')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div><!-- Col -->
                    </div><!-- Row -->

                    <div class="row form-group">
                    <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">187</div> FILIACION ESTILISTICA</label>
                                <select class="form-select" id="filiacion_estilistica" name="filiacion_estilistica" data-width="100%" wire:model="filiacion_estilistica">
                                    <option value="" >SELECCIONE</option>
                                    <option value="01">01 GOTICO</option>
                                    <option value="02">02 MUDEJAR</option>
                                    <option value="03">03 PLATERESCO</option>
                                    <option value="04">04 RENACENTISTA</option>
                                    <option value="05">05 MANIERISTA</option>
                                    <option value="06">06 BARROCO</option>
                                    <option value="07">07 ROCOCO</option>
                                    <option value="08">08 NEOCLASICO</option>
                                    <option value="09">09 NEORENANCENTISTA</option>
                                    <option value="10">10 ACADEMICISTA</option>
                                    <option value="11">11 ART NOUVEAU</option>
                                    <option value="12">12 NEOCOLONIAL</option>
                                    <option value="13">13 NEOPURUANO</option>
                                    <option value="14">14 INDEGENISTA</option>
                                    <option value="15">15 ARTDECO</option>
                                    <option value="16">16 OTROS</option>
                                </select>
                                @error('filiacion_estilistica')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4" style="align-self: center;">
                            <div class="">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">188</div> ESTADO DE ELEMENTOS ESTRUCTURALES Y ACABADOS</label>
                            </div>
                        </div><!-- Col -->
                    </div>
                    <div class="row form-group">

                        <div class="col">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadroinvi"></div> CIMIENTOS</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="cimientos_estado" id="cimientos_estado" wire:model="cimientos_estado">
                                        <option value="" >SELECCIONE</option>
                                        <option value="B">B = BUENO</option>
                                        <option value="R">R = REGULAR</option>
                                        <option value="M">M = MALO</option>
                                    </select>
                                </div>
                                @error('cimientos_estado')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadroinvi"></div> MUROS</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="muros_estado" id="muros_estado" wire:model="muros_estado">
                                        <option value="" >SELECCIONE</option>
                                        <option value="B">B = BUENO</option>
                                        <option value="R">R = REGULAR</option>
                                        <option value="M">M = MALO</option>
                                    </select>
                                </div>
                                @error('muros_estado')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadroinvi"></div> PISOS</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="pisos_estado" id="pisos_estado" wire:model="pisos_estado">
                                        <option value="" >SELECCIONE</option>
                                        <option value="B">B = BUENO</option>
                                        <option value="R">R = REGULAR</option>
                                        <option value="M">M = MALO</option>
                                    </select>
                                </div>
                                @error('pisos_estado')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadroinvi"></div> TECHOS</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="techos_estado" id="techos_estado" wire:model="techos_estado">
                                        <option value="" >SELECCIONE</option>
                                        <option value="B">B = BUENO</option>
                                        <option value="R">R = REGULAR</option>
                                        <option value="M">M = MALO</option>
                                    </select>
                                </div>
                                @error('techos_estado')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadroinvi"></div> PILASTRAS</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="pilastras_estado" id="pilastras_estado" wire:model="pilastras_estado">
                                        <option value="" >SELECCIONE</option>
                                        <option value="B">B = BUENO</option>
                                        <option value="R">R = REGULAR</option>
                                        <option value="M">M = MALO</option>
                                    </select>
                                </div>
                                @error('pilastras_estado')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadroinvi"></div> REVESTIMIENTO</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="revestimiento_estado" id="revestimiento_estado" wire:model="revestimiento_estado">
                                        <option value="" >SELECCIONE</option>
                                        <option value="B">B = BUENO</option>
                                        <option value="R">R = REGULAR</option>
                                        <option value="M">M = MALO</option>
                                    </select>
                                </div>
                                @error('revestimiento_estado')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadroinvi"></div> BALCONES</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="balcones_estado" id="balcones_estado" wire:model="balcones_estado">
                                        <option value="" >SELECCIONE</option>
                                        <option value="B">B = BUENO</option>
                                        <option value="R">R = REGULAR</option>
                                        <option value="M">M = MALO</option>
                                    </select>
                                </div>
                                @error('balcones_estado')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadroinvi"></div> PUERTAS</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="puertas_estado" id="puertas_estado" wire:model="puertas_estado">
                                        <option value="" >SELECCIONE</option>
                                        <option value="B">B = BUENO</option>
                                        <option value="R">R = REGULAR</option>
                                        <option value="M">M = MALO</option>
                                    </select>
                                </div>
                                @error('puertas_estado')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadroinvi"></div> VENTANAS</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="ventanas_estado" id="ventanas_estado" wire:model="ventanas_estado">
                                        <option value="" >SELECCIONE</option>
                                        <option value="B">B = BUENO</option>
                                        <option value="R">R = REGULAR</option>
                                        <option value="M">M = MALO</option>
                                    </select>
                                </div>
                                @error('ventanas_estado')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadroinvi"></div> REJAS</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="rejas_estado" id="rejas_estado" wire:model="rejas_estado">
                                        <option value="" >SELECCIONE</option>
                                        <option value="B">B = BUENO</option>
                                        <option value="R">R = REGULAR</option>
                                        <option value="M">M = MALO</option>
                                    </select>
                                </div>
                                @error('rejas_estado')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <div wire:ignore>
                                <label class="form-label d-inline-flex" > <div class="divcuadro">189</div> INTERVENCIONES EN EL INMUEBLE</label>
                                <select class="form-select"  data-width="100%" data-live-search="true" name="int_inmueble" id="int_inmueble" wire:model="int_inmueble" >
                                    <option value="">SELECCIONE</option>
                                    <option value="01">01 AMPLIACION</option>
                                    <option value="02">02 ANASTILOSIS</option>
                                    <option value="03">03 CONSERVACIÓN</option>
                                    <option value="04">04 CONSOLIDACIÓN</option>
                                    <option value="05">05 CONSTRUCCIÓN</option>
                                    <option value="06">06 DEMOLICIÓN</option>
                                    <option value="07">07 RENOVACIÓN  URBANA O REVITALIZACIÓN URBANA</option>
                                    <option value="08">08 PROTECCIÓN</option>
                                    <option value="09">09 PUESTA EN VALOR</option>
                                    <option value="10">10 REFACCIÓN</option>
                                    <option value="11">11 REMODELACIÓN</option>
                                    <option value="12">12 OBRA NUEVA</option>
                                    <option value="13">13 RESTAURACIÓN</option>
                                </select>
                            </div>
                            @error('int_inmueble')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="row form-group mt-5">
                        <label class="form-label d-inline-flex" > <div class="divcuadro">190</div>RESEÑA HISTORICA</label>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <textarea type="textarea" class="form-control" rows="5" name="resena_historica" wire:model="resena_historica"></textarea>
                            </div>
                            @error('resena_historica')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div><!-- Col -->
                    </div><!-- Row -->

                    <div class="row form-group mt-5">
                    <h4 class="mb-5"> INSCRIPCION DEL PREDIO CATASTRAL</h4>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">104</div>TIPO DE PARTIDA REGISTRAL</label>
                                <select class="form-select" id="tipo_partida1" aria-label="Default select example" name="tipo_partida1" wire:model="tipo_partida1">
                                    <option value="">Seleccione</option>
                                    <option value="01">01 TOMO</option>
                                    <option value="02">02 FICHA</option>
                                    <option value="03">03 PART. ELECTRONICA</option>
                                    <option value="04">04 CÓDIGO DEL PREDIO</option>
                                </select>
                                @error('tipo_partida1')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">105</div>NUMERO</label>
                                <input type="text" id="nume_partida1" class="form-control" name="nume_partida1" maxlength="18" wire:model="nume_partida1">
                                @error('nume_partida1')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">106</div>FOJAS </label>
                                <input type="text" id="fojas1" class="form-control" name="fojas1" maxlength="18" wire:model="fojas1">
                                @error('fojas1')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">107</div>ASIENTO</label>
                                <input type="text" id="asiento1" class="form-control" name="asiento1" maxlength="18" wire:model="asiento1">
                                @error('asiento1')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">108</div>FECHA DE INSCRIPCION</label>
                                <input type="date" id="fecha_inscripcion1" class="form-control" name="fecha_inscripcion1" wire:model="fecha_inscripcion1">
                                @error('fecha_inscripcion1')
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
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="cond_declarante" id="cond_declarante" wire:model="cond_declarante">
                                        <option value="0" >SELECCIONE</option>
                                        <option value="01" >01 TITULAR CATASTRAL</option>
                                        <option value="02" >02 REPRESENTATE LEGAL</option>
                                        <option value="03" >03 ARRENDATARIO</option>
                                        <option value="04" >04 FAMILIAR</option>
                                        <option value="05" >05 VECINO</option>
                                        <option value="06" >06 OTROS</option>
                                    </select>
                                    @error('cond_declarante')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">116</div>ESTADO DE LLENADO DE LA FICHA</label>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="esta_llenado" id="esta_llenado" wire:model="esta_llenado">
                                        <option value="0" >SELECCIONE</option>
                                        <option value="1">1 FICHA COMPLETA</option>
                                        <option value="2">2 FICHA INCOMPLETA</option>
                                        <option value="3">3 COMPLETADA EN OFICINA</option>
                                        <option value="4">4 COMPLETADA EN CONTROL EXTERNO</option>
                                    </select>
                                    @error('esta_llenado')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">117</div>N° DE HABITANTES </label>
                                    <input type="text" id="nume_habitantes" class="form-control" name="nume_habitantes" wire:model="nume_habitantes" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="3" >
                                    @error('nume_habitantes')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadro">92</div>N° DE FAMILIAS</label>
                                    <input type="text" id="nume_familias" class="form-control" name="nume_familias" wire:model="nume_familias" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="3" >
                                    @error('nume_familias')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror"
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="col-md-12 mb-5">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">115</div>IDENTIFICACIÓN DE LOS LITIGANTES</label>
                            </div>
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr >
                                            <th><label class="form-label d-inline-flex" > T. DOCUMENTO</label></th>
                                            <th><label class="form-label d-inline-flex" > N° DOCUMENTO</label></th>
                                            <th><label class="form-label d-inline-flex" > CÓDIGO DEL CONTRIBUYENTE</label></th>
                                            <th><label class="form-label d-inline-flex" > NOMBRES</label></th>
                                            <th><label class="form-label d-inline-flex" > APELLIDO PATERNO</label></th>
                                            <th><label class="form-label d-inline-flex" > APELLIDO MATERNO</label></th>
                                            <th>

                                                @if($cont7>0)
                                                    <button type="button" class="btn btn-danger btn-icon" wire:click="reducirinformacion">-</button>
                                                @else
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarinformacion" tabindex="90">+</button>
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $cont5 = 0; ?>
                                        @for($i=0;$i<$cont7;$i++)
                                        <tr >
                                            <td>
                                                <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_doc_litigante[]" id="tipo_doc_litigante{{$i}}" wire:model="tipolitigante.{{$i}}" >
                                                    <option value="0" >SELECCIONE</option>
                                                    <option value="01" >01 NO PRESENTE DOC.</option>
                                                    <option value="02" >02 DNI</option>
                                                    <option value="03" >03 CARNET DE IDENTIDAD DE POLICIA NACIONAL</option>
                                                    <option value="04" >04 CARNET DE IDENTIDAD DE FUERZAS ARMADAS</option>
                                                    <option value="05" >05 PARTIDA DE NACIMIENTO</option>
                                                    <option value="06" >06 PASAPORTE</option>
                                                    <option value="07" >07 CARNET DE EXTRANJERIA</option>
                                                    <option value="08" >08 OTROS</option>
                                                </select>
                                                @error('tipolitigante.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="nume_doclitigante[]" placeholder="NUMERO DE DOCUMENTO" id="nume_doc{{$i}}" wire:model.lazy="numedoc.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="17">
                                                @if ($message = Session::get('info.'.$i))
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @endif
                                                @error('numedoc.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="codi_contribuye[]" placeholder="CÓDIGO DE CONTRIBUYENTE" id="codi_contribuye{{$i}}" wire:model="codi_contribuye.{{$i}}"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  maxlength="18">
                                                @error('codi_contribuye.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="nombreslitigante[]" placeholder="NOMBRES" id="nombres{{$i}}" wire:model="nombres.{{$i}}"  onkeydown="return /[a-ñ]/i.test(event.key)">
                                                @error('nombres.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="ape_paternolitigante[]" placeholder="APELLIDO PATERNO" id="ape_paterno{{$i}}" wire:model="ape_paterno.{{$i}}"  onkeydown="return /[a-ñ]/i.test(event.key)">
                                                @error('ape_materno.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="ape_maternolitigante[]" placeholder="APELLIDO MATERNO" id="ape_materno{{$i}}" wire:model="ape_materno.{{$i}}"  onkeydown="return /[a-ñ]/i.test(event.key)">
                                                @error('ape_paterno.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>

                                                @if($i==$cont7-1)
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarinformacion" tabindex="90">+</button>

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
                        <h4 class="mb-4"> NORMA LEGAL</h4>
                        <div class="col-md-12 mb-3">
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr >
                                            <th><label class="form-label d-inline-flex" ><div class="divcuadro">173</div>NORMATIVA N°</label></th>
                                            <th><label class="form-label d-inline-flex" > FECHA</label></th>
                                            <th><label class="form-label d-inline-flex" ><div class="divcuadro">174</div> NÚMERO DE PLANO</label></th>
                                            <th>

                                                @if($cont8>0)
                                                    <button type="button" class="btn btn-danger btn-icon" wire:click="reducirnorma1">-</button>
                                                @else
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarnorma1" tabindex="90">+</button>
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<$cont8;$i++)
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" placeholder="" name="normatividad1" wire:model="normatividad1.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="20">
                                                @error('normatividad1.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="date" class="form-control" placeholder="" name="fecha_norma1" wire:model="fecha_norma1.{{$i}}" max="{{ date('Y-m-d') }}">
                                                @error('fecha_norma1.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="" name="numero_plano1" wire:model="numero_plano1.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="20">
                                                @error('numero_plano1.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>

                                                @if($i==$cont8-1)
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarnorma1" tabindex="90">+</button>

                                                @endif
                                            </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div><!-- Row -->
                    <div class="row form-group">
                    <h4 class="mb-5"> OBSERVACION</h4>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <textarea type="textarea" class="form-control" rows="5" name="observacion1" wire:model="observacion1"></textarea>
                            </div>
                            @error('observacion1')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">


                        <div class="col-md-3 mb-3">
                        <label class="form-label d-inline-flex" > <div class="divcuadro">120</div>DECLARANTE</label>
                                <label class="form-label d-inline-flex" >DNI</label>
                                <input type="number" class="form-control" name="num_documento_declarante" wire:model.lazy="numdocumentodeclarante" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="17" >
                                @error('numdocumentodeclarante')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                                @if ($message = Session::get('dark'))
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @endif
                                <label class="form-label d-inline-flex" > NOMBRES</label>
                                <input type="text" class="form-control" name="nombres_declarante" wire:model="nombres_declarante" onkeydown="return /[a-ñ]/i.test(event.key)">
                                @error('nombres_declarante')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                                <label class="form-label d-inline-flex" > APELLIDO PATERNO</label>
                                <input type="text" class="form-control" name="apellido_paterno_declarante" wire:model="apellido_paterno_declarante" onkeydown="return /[a-ñ]/i.test(event.key)">
                                @error('apellido_paterno_declarante')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                                <label class="form-label d-inline-flex" > APELLIDO MATERNO</label>
                                <input type="text" class="form-control" name="apellido_materno_declarante" wire:model="apellido_materno_declarante" onkeydown="return /[a-ñ]/i.test(event.key)">
                                @error('apellido_materno_declarante')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                                <label class="form-label d-inline-flex" > FECHA</label>
                                <input type="date" class="form-control" name="fecha_declarante" wire:model="fecha_declarante" max="{{ date('Y-m-d') }}">
                                @error('fecha_declarante')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label d-inline-flex" > <div class="divcuadro">121</div>SUPERVISOR</label>
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
                            <label class="form-label d-inline-flex" > <div class="divcuadrorequired">122</div>TÉCNICO CATASTRAL</label>
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
                            <label class="form-label d-inline-flex" > <div class="divcuadro">123</div>Vº Bº VERIFICADOR CATASTRAL</label>
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
                        <button type="button" class="btn btn-primary" wire:click.prevent="register">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

@push('custom-scripts')@if($fichaanterior->titular!="")
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

    function Mostrarmas() {
        if ($("#codi_uso option:selected").val() == "070101") {
            $('#construcciones2').hide();
        } else {
            $('#construcciones2').show();
        }
    }
</script>

</script>

@endpush
