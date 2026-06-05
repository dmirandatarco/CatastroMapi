
<div class="row">
    <form id="contact" method="POST" class="forms-sample" enctype="multipart/form-data" >
    {{csrf_field()}}
    <div class="col-md-12 grid-margin stretch-card" >
        <div class="card">
            <div class="card-body">
                <div class="row">
                <h3 class="mb-4">Ficha Catastral Urbana Rural</h3>
                    <div class="row form-group">
                        <h4 class="mb-4"> DATOS GENERALES</h4>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > NUMERO DE FICHA</label>
                                <input type="text" class="form-control" placeholder="" name="nume_ficha" wire:model.lazy="nume_ficha" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="7">
                                @error('nume_ficha')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">1</div> CÓDIGO ÚNICO CATASTRAL - CUC</label>
                                <input type="text" class="form-control" placeholder="" name="cuc" wire:model.defer="cuc" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="12">
                                @error('cuc')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">2</div> CÓDIGO HOJA CATASTRAL</label>
                                <input type="text" class="form-control" placeholder="" name="codigo_hoja_catastral" wire:model.defer="codigo_hoja_catastral" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="15">
                                @error('codigo_hoja_catastral')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">3</div> CÓDIGO CONTRIBUYENTE DE RENTAS</label>
                                <input type="text" class="form-control" placeholder=""name="codigo_contr_rentas" wire:model.defer="codigo_contr_rentas" maxlength="15">
                                @error('codigo_contr_rentas')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">4</div> CÓDIGO PREDIAL DE RENTAS</label>
                                <input type="text" class="form-control" placeholder=""name="codigo_predial" wire:model.defer="codigo_predial" maxlength="15">
                                @error('codigo_predial')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->

                    <div class="row form-group">

                        <div class="">
                            <label class="form-label d-inline-flex" > <div class="divcuadro">89</div>IDENTIFICACIÓN DE LOS LITIGANTES</label>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > ZONA</label>
                                <input type="text" class="form-control" placeholder=""name="zona_geografica" wire:model.defer="zona_geografica" maxlength="2">
                                @error('zona_geografica')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > UNIDAD GEOGRAFICA</label>
                                <input type="text" class="form-control" placeholder=""name="unidad_organica" wire:model.defer="unidad_organica" maxlength="6">
                                @error('unidad_organica')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > UNIDAD CATASTRAL</label>
                                <input type="text" class="form-control" placeholder=""name="unidad_catastral" wire:model.lazy="unidad_catastral" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="6">
                                @error('unidad_catastral')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-1"></div>
                    </div><!-- Row -->

                    <div class="row form-group">
                        <h4 class="mb-4"> UBICACIÓN GEOGRÁFICA DEL PREDIO</h4>
                        <div class="col-md-4 mb-3">
                            <div wire:ignore>
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">06</div> DEPARTAMENTO</label>
                                <select class="form-select " data-width="100%" data-live-search="true"  name="cod_dep" id="cod_dep" wire:model="cod_dep">

                                </select>
                            </div >
                            @error('cod_dep')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <div wire:ignore>
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">07</div> PROVINCIAS</label>
                                <select class="form-select " name="cod_pro" id="cod_pro"  wire:model="cod_pro">


                                </select>
                            </div >
                            @error('cod_pro')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">08</div> DISTRITO</label>
                                    <select  class="form-select " name="cod_dis" id="cod_dis"  wire:model="cod_dis">


                                    </select>
                                </div>
                                @error('cod_dis')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">

                    </div><!-- Row -->
                    <div class="row form-group" >
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">09</div> PROYECTO CATASTRAL</label>
                                <input type="text" class="form-control" placeholder="" name="proy_cat" maxlength="20" wire:model.defer="proy_cat">
                                @error('proy_cat')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">10</div>UNIDAD TERRITORIAL</label>
                                <input type="text" class="form-control" placeholder="" name="uni_terr" maxlength="20" wire:model.defer="uni_terr">
                                @error('uni_terr')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">11</div>NOMBRE DEL VALLE</label>
                                <input type="text" class="form-control" placeholder="" name="nomb_valle" maxlength="20" wire:model.defer="nomb_valle">
                                @error('nomb_valle')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group" >
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">12</div>NOMBRE DEL SECTOR</label>
                                <select class="form-select nomb_sector" id="nomb_sector" name="nomb_sector" data-width="100%" wire:model.defer="nomb_sector">
                                    <option value="">Seleccione</option>
                                    @foreach($sectores_sel as $sector)
                                    <option value="{{str_pad($sector->id_sector,10,'0',STR_PAD_LEFT)}}">{{$sector->codi_sector}} {{$sector->nomb_sector}}</option>
                                    @endforeach
                                </select>
                                @error('nomb_sector')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>

                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">13</div>NOMBRE DEL PREDIO</label>
                                <input type="text" class="form-control" placeholder="" name="nomb_predio" maxlength="20" wire:model.defer="nomb_predio">
                                @error('nomb_predio')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">14</div>NUMERO DE FOTO</label>
                                <input type="text" class="form-control" placeholder="" name="num_foto" maxlength="20" wire:model.defer="num_foto">
                                @error('num_foto')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group" >
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">15</div>NUMERO DE ORTOFOTO</label>
                                <input type="text" class="form-control" placeholder="" name="num_ortofoto" maxlength="20" wire:model.defer="num_ortofoto">
                                @error('num_ortofoto')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">16</div>IMAGEN SATELITAL</label>
                                <input type="text" class="form-control" placeholder="" name="img_satelital" maxlength="20" wire:model.defer="img_satelital">
                                @error('img_satelital')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">17</div>UNIDAD CATASTRAL ANTERIOR</label>
                                <input type="text" class="form-control" placeholder="" name="uca_ant" maxlength="20" wire:model.defer="uca_ant">
                                @error('uca_ant')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group" >
                        <label class="form-label d-inline-flex" > <div class="divcuadro">18</div>COORDENADAS UTM DE REFERENCIA</label>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" >ESTE (X)</label>
                                <input type="text" class="form-control" placeholder="" name="cord_este" maxlength="20" wire:model.defer="cord_este">
                                @error('cord_este')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > NORTE (Y)</label>
                                <input type="text" class="form-control" placeholder="" name="cord_norte" maxlength="20" wire:model.defer="cord_norte">
                                @error('cord_norte')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" ><div class="divcuadro">19</div> DATUM</label>
                                <input type="text" class="form-control" placeholder="" name="datum" maxlength="20" wire:model.defer="datum">
                                @error('datum')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" ><div class="divcuadro">20</div> ZONA</label>
                                <input type="text" class="form-control" placeholder="" name="zona" maxlength="20" wire:model.defer="zona">
                                @error('zona')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->

                    <div class="row form-group">
                        <h4 class="mb-4"> DOMICILIO FISCAL DEL TITULAR CATASTRAL</h4>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">21</div> TIPO DE TITULAR</label>
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
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">22</div> ESTADO CIVIL</label>
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
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">23</div> TIPO DOC. IDENTIDAD</label>
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
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">24</div> N° DOC.</label>
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
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">25</div> NOMBRES</label>
                                <input type="text" class="form-control" placeholder="" name="nombres1" id="nombres1" wire:model="nombres1" onkeydown="return /[a-ñ]/i.test(event.key)">
                                @error('nombres1')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">26</div> APELLIDO PATERNO</label>
                                <input type="text" class="form-control" placeholder="" name="ape_paterno1" id="ape_paterno1" wire:model="ape_paterno1" onkeydown="return /[a-ñ]/i.test(event.key)">
                                @error('ape_paterno1')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">27</div> APELLIDO MATERNO</label>
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
                                        <label class="form-label d-inline-flex" > <div class="divcuadrorequired">23</div> TIPO DOC. IDENTIDAD</label>
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
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">24</div> N° DOC.</label>
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
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">25</div> NOMBRES</label>
                                    <input type="text" class="form-control" placeholder="" name="nombres2" id="nombres2"  wire:model="nombres2" onkeydown="return /[a-ñ]/i.test(event.key)">
                                    @error('nombres2')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">26</div> APELLIDO PATERNO</label>
                                    <input type="text" class="form-control" placeholder="" name="ape_paterno2" id="ape_paterno2"  wire:model="ape_paterno2" onkeydown="return /[a-ñ]/i.test(event.key)">
                                    @error('ape_paterno2')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">27</div> APELLIDO MATERNO</label>
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
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">28</div> Nº DE R.U.C.</label>
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
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">29</div> RAZON SOCIAL</label>
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
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">30</div> PERSONA JURIDICA</label>
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
                        <h4 class="mb-4"> IDENTIFICACIÓN DE TITULARES</h4>
                        <div class="col-md-12 mb-5">
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr >
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">31</div> N°</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">32</div> APELLIDO PATERNO</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">33</div> APELLIDO MATERNO</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">34</div> NOMBRES</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">35</div> E. CIVIL</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">36</div> T. DOC. </label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">36</div> NUMERO </label></th>
                                            <th>
                                                @if($cont>0)

                                                    <button type="button" class="btn btn-danger btn-icon" wire:click="reducirCotitulares" tabindex="90">-</button>
                                                @else
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarCotitulares" tabindex="90">+</button>
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<$cont;$i++)
                                        <tr >
                                            <td>
                                                <input type="text" class="form-control"  name="num_cotitular[]" placeholder="N° cotitular" id="num_cotitular.{{$i}}"  wire:model="num_cotitular.{{$i}}"  maxlength="2">
                                                @error('num_cotitular.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="ape_paternotitulares[]" placeholder="APELLIDO PATERNO" id="ape_paternotitulares{{$i}}" wire:model="ape_paternotitulares.{{$i}}"  onkeydown="return /[a-ñ]/i.test(event.key)">
                                                @error('ape_paternotitulares.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="ape_maternotitulares[]" placeholder="APELLIDO MATERNO" id="ape_maternotitulares{{$i}}" wire:model="ape_maternotitulares.{{$i}}"  onkeydown="return /[a-ñ]/i.test(event.key)">
                                                @error('ape_maternotitulares.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror

                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="nombrestitulares[]" placeholder="NOMBRES" id="nombrestitulares{{$i}}" wire:model="nombrestitulares.{{$i}}"  onkeydown="return /[a-ñ]/i.test(event.key)">
                                                @error('nombrestitulares.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <div wire:ignore>
                                                    <select class="form-select"  data-width="100%" data-live-search="true" name="estado_civiltitulares" id="estado_civiltitulares{{$i}}" wire:model="estado_civiltitulares.{{$i}}" >
                                                        <option value="" >SELECCIONE</option>
                                                        <option value="01">01 SOLTERO (A)</option>
                                                        <option value="02">02 CASADO (A)</option>
                                                        <option value="03">03 DIVORCIADO (A)</option>
                                                        <option value="04">04 VIUDO (A)</option>
                                                        <option value="05">05 CONVIVIENTE</option>
                                                    </select>
                                                </div>
                                                @error('estado_civiltitulares.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                            <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_doc_titulars[]" id="tipo_doc_titulars{{$i}}" wire:model="tipo_doc_titulars.{{$i}}" >
                                                    <option value="" >SELECCIONE</option>
                                                    <option value="01" >01 NO PRESENTE DOC.</option>
                                                    <option value="02" >02 DNI</option>
                                                    <option value="03" >03 CARNET DE IDENTIDAD DE POLICIA NACIONAL</option>
                                                    <option value="04" >04 CARNET DE IDENTIDAD DE FUERZAS ARMADAS</option>
                                                    <option value="05" >05 PARTIDA DE NACIMIENTO</option>
                                                    <option value="06" >06 PASAPORTE</option>
                                                    <option value="07" >07 CARNET DE EXTRANJERIA</option>
                                                    <option value="08" >08 OTROS</option>
                                                </select>
                                                @error('tipo_doc_titulars.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="numedoctitulares[]" placeholder="NUMERO DE DOCUMENTO" id="numedoctitulares{{$i}}" wire:model.lazy="numedoctitulares.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="17">
                                                @error('numedoctitulares.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>


                                            <td>

                                                @if($i==$cont-1)
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarCotitulares" tabindex="90">+</button>

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

                        <h4 class="mb-4"> IDENTIFICACIÓN DE LOS COTITULARES CATASTRALES</h4>
                        <div class="col-md-3 mb-3">
                            <div wire:ignore>
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">37</div> Departamento</label>
                                <select   class="form-select " data-width="100%" data-live-search="true"  name="departamentootros" id="departamentootros" wire:model="departamentootros">

                                </select>
                            </div >
                            @error('departamentootros')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <div wire:ignore>
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">38</div> Provincias</label>
                                <select   class="form-select " name="provinciaotros" id="provinciaotros"  wire:model="provinciaotros">


                                </select>
                            </div >
                            @error('provinciaotros')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <div wire:ignore>
                                    <label class="form-label d-inline-flex" > <div class="divcuadrorequired">39</div> DISTRITO</label>
                                    <select   class="form-select " name="distritootros" id="distritootros"  wire:model="distritootros">


                                    </select>
                                </div>
                                @error('distritootros')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label labelpeque d-inline-flex">SECTOR</label>
                                <select class="form-select" data-width="100%" data-live-search="true" name="sector" id="sector" wire:model="sector" tabindex="8">
                                    <option value="">SELECCIONE</option>
                                    @foreach($sectores as $sector)
                                        <option value="{{$sector->codi_sector}}">{{$sector->codi_sector}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">41</div> VIA / CALLE</label>
                                <input type="text" class="form-control" placeholder="" name="nomb_via" wire:model="nomb_via" maxlength="100">
                                @error('nomb_via')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">42</div>NUM MUNICIPAL / LOTE</label>
                                <input type="text" class="form-control" placeholder="" name="nume_muni" wire:model="nume_muni" maxlength="6">
                                @error('nume_muni')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">43</div> NOMBRE PREDIO</label>
                                <input type="text" class="form-control" placeholder="" name="nomb_edificacion" wire:model="nomb_edificacion" maxlength="100" >
                                @error('nomb_edificacion')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">44</div> TELÉFONO</label>
                                <input type="text" class="form-control" placeholder="" name="telefonodomicilio" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..?)\../g, '$1');" maxlength="10" wire:model="telefonodomicilio">
                                @error('telefonodomicilio')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">45</div>ANEXO</label>
                                <input type="text" class="form-control" placeholder="" name="anexodomicilio" maxlength="5" wire:model="anexodomicilio">
                                @error('anexodomicilio')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">46</div> CORREO ELECTRÓNICO</label>
                                <input type="text" class="form-control" placeholder="" name="emaildomicilio" maxlength="100" wire:model="emaildomicilio">
                                @error('emaildomicilio')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <h4 class="mb-4"> CONDICION ESPECIAL DEL PREDIO</h4>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">47</div> COND. ESP. TITULAR</label>
                                <select class="form-select"  data-width="100%" data-live-search="true" name="condicion[]" wire:model="condicion">
                                    <option value="" >SELECCIONE</option>
                                    <option value="01" >01 GOBIERNO CENTRAL</option>
                                    <option value="02" >02 GOBIERNO LOCAL</option>
                                    <option value="03" >03 GOBIERNO REGIONAL</option>
                                    <option value="04" >04 BENEFICIENCIA PUBLICA</option>
                                    <option value="05" >05 HOSPITALES</option>
                                    <option value="06" >06 ENTIDADES RELIGIOSAS</option>
                                    <option value="07" >07 CUERPO GENERAL DE BOMBEROS</option>
                                    <option value="08" >08 UNIVERSIDAD</option>
                                    <option value="09" >09 CENTRO EDUCATIVO</option>
                                    <option value="10" >10 COMUNIDAD CAMPESINA / NATIVA</option>
                                    <option value="11" >11 ORGANISMOS INTERNACIONALES</option>
                                    <option value="12" >12 ORGANIZACION POLITICA</option>
                                    <option value="13" >13 PATRIMONIO CULTURAL DE LA NACION</option>
                                    <option value="14" >14 ORGANIZACIONES SINDICALES</option>
                                    <option value="15" >15 ORGANIZACIONES DE DISCAPACITADOS</option>
                                    <option value="16" >16 PENSIONISTA</option>
                                    <option value="17" >17 GOBIERNO EXTRANJEROS</option>
                                </select>
                                @error('condicion')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadrorequired">48</div> CONDICION DEL TITULAR</label>
                                <select class="form-select"  data-width="100%" data-live-search="true" name="cond_titular" id="cond_titular" wire:model="condtitular" >
                                    <option value=""  >SELECCIONE</option>
                                    <option value="01">01 PROPIETARIO UNICO</option>
                                    <option value="02">02 SUCESIÓN INTESTADA</option>
                                    <option value="03">03 POSEEDOR</option>
                                    <option value="04">04 SOCIEDAD CONYUGAL</option>
                                    <option value="05">05 COTITULARIDAD</option>
                                    <option value="06">06 LITIGIO</option>
                                    <option value="07">07 OTROS</option>
                                </select>
                                @error('condtitular')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">49</div> FECHA INICIO DE OCUPACION</label>
                                <input type="date" class="form-control" placeholder="" name="fecha_inicio" maxlength="100" wire:model="fecha_inicio" max="{{ date('Y-m-d') }}">
                                @error('fecha_inicio')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">50</div> INSCRIPCION EN REG. PUBLICOS</label>
                                <select class="form-select"  data-width="100%" data-live-search="true" name="ins_reg_publ" id="ins_reg_publ" wire:model="ins_reg_publ" >
                                    <option value=""  >SELECCIONE</option>
                                    <option value="01">01 PARTIDA ELECTRONICA</option>
                                    <option value="02">02 CÓDIGO DE PREDIO</option>
                                    <option value="03">03 FICHA</option>
                                    <option value="04">04 TOMO / FOLIO</option>
                                    <option value="05">05 ANTECEDENTE REGISTRAL</option>
                                </select>
                                @error('ins_reg_publ')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">51</div> NUMERO PARTIDA REGISTRAL</label>
                                <input type="text" class="form-control" placeholder="" name="num_part_regi"  wire:model="num_part_regi" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="5">
                                @error('num_part_regi')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">52</div>FECHA DE INSCRIPCION</label>
                                <input type="date" class="form-control" placeholder="" name="fecha_inscripcion" wire:model="fecha_inscripcion" max="{{ date('Y-m-d') }}">
                                @error('fecha_inscripcion')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">53</div> DOCUMENTO SOBRE PROPIEDAD</label>
                                <select class="form-select"  data-width="100%" data-live-search="true" name="doc_sobre_propiedad" id="doc_sobre_propiedad" wire:model="doc_sobre_propiedad" >
                                    <option value=""  >SELECCIONE</option>
                                    <option value="01">01 COMPRA Y VENTA</option>
                                    <option value="02">02 ANTICIPO DE LEGITIMA</option>
                                    <option value="03">03 TESTAMENTO</option>
                                    <option value="04">04 DONACION</option>
                                    <option value="05">05 ADJUDICACION </option>
                                    <option value="06">06 FUSION</option>
                                    <option value="07">07 EXPROPIACION</option>
                                    <option value="08">08 PERMUTAS</option>
                                    <option value="09">09 PRESCRIPCION ADQUISITIVA</option>
                                    <option value="10">10 CESION DE DERECHOS DE ACCIONES </option>
                                    <option value="11">11 DECLARATORIA DE HEREDEROS </option>
                                    <option value="12">12 ADJUDICACION DE REFORMA AGRARIA</option>
                                    <option value="13">13 SENTENCIA JUDICIAL</option>
                                    <option value="14">14 OTROS</option>
                                </select>
                                @error('doc_sobre_propiedad')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">54</div>FECHA DE ADQUISICION</label>
                                <input type="date" class="form-control" placeholder="" name="fecha_adquisicion" wire:model="fecha_adquisicion" max="{{ date('Y-m-d') }}">
                                @error('fecha_adquisicion')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row form-group">
                        <label class="form-label d-inline-flex" > <div class="divcuadro">55</div> PRUEBAS OBLIGATORIAS</label>

                        <div class="col-md-4">
                            <div class="lineatoggle">
                                <div>
                                    <label class="extendtext form-label d-inline-flex" >  DECLARACION JURADA DE TODOS LOS COLINDANTES O SEIS VECINOS</label>
                                </div>
                                <div style="padding-left: 10px;">
                                    <div class="form-check form-switch mb-2">
                                        <input type="checkbox" class="form-check-input" id="pru_ob1" name="pru_ob1" wire:model="pru_ob1" >
                                    </div>
                                </div>
                            </div>
                        </div><!-- Col -->

                        <div class="col-md-4">
                            <div class="lineatoggle">
                                <div>
                                    <label class="extendtext form-label d-inline-flex" >  DD.JJ. DE COMITES, FONDOS U ORGANIZACION DE PRODUCTORES</label>
                                </div>
                                <div style="padding-left: 10px;">
                                    <div class="form-check form-switch mb-2">
                                        <input type="checkbox" class="form-check-input" id="pru_ob2" name="pru_ob2" wire:model="pru_ob2" >
                                    </div>
                                </div>
                            </div>
                        </div><!-- Col -->

                        <div class="col-md-4">
                            <div class="lineatoggle">
                                <div>
                                    <label class="extendtext form-label d-inline-flex" >DD.JJ. DE COMITES, COMISIONES O JUNTA DE USUARIOS DE AGUA</label>
                                </div>
                                <div style="padding-left: 10px;">
                                    <div class="form-check form-switch mb-2">
                                        <input type="checkbox" class="form-check-input" id="pru_ob3" name="pru_ob3" wire:model="pru_ob3" >
                                    </div>
                                </div>
                            </div>
                        </div><!-- Col -->

                    </div><!-- Row -->
                    <div class="row form-group">
                        <label class="form-label d-inline-flex" > <div class="divcuadro">56</div> PRUEBAS COMPLEMENTARIAS</label>
                            <div class="col-md-4">
                                <div class="lineatoggle">
                                    <div>
                                        <label class="extendtext form-label d-inline-flex" >DOCUMENTO QUE ACREDITE PRESTAMO O ADELANTO DE PRESTAMOS POR CREDITO AGRARIO</label>
                                    </div>
                                    <div style="padding-left: 10px;">
                                        <div class="form-check form-switch mb-2">
                                            <input type="checkbox" class="form-check-input" id="pru_comp1" name="pru_comp1" wire:model="pru_comp1" >
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-4">
                                <div class="lineatoggle">
                                    <div>
                                        <label class="extendtext form-label d-inline-flex" >DECLARACION JURADA DE PAGO DEL IMPUESTO PREDIAL</label>
                                    </div>
                                    <div style="padding-left: 10px;">
                                        <div class="form-check form-switch mb-2">
                                            <input type="checkbox" class="form-check-input" id="pru_comp2" name="pru_comp2" wire:model="pru_comp2" >
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-4">
                                <div class="lineatoggle">
                                    <div>
                                        <label class="extendtext form-label d-inline-flex" >DOCUMENTO PUBLICO O DOCUMENTO PRIVADO, DE TRANSFERENCIA DE POSESION</label>
                                    </div>
                                    <div style="padding-left: 10px;">
                                        <div class="form-check form-switch mb-2">
                                            <input type="checkbox" class="form-check-input" id="pru_comp3" name="pru_comp3" wire:model="pru_comp3" >
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Col -->

                            <div class="col-md-4">
                                <div class="lineatoggle">
                                    <div>
                                        <label class="extendtext form-label d-inline-flex" >INSPECCIÓN JUDICIAL DE TIERRAS EN PROCESO DE PRUEBA ANTICIPADA</label>
                                    </div>
                                    <div style="padding-left: 10px;">
                                        <div class="form-check form-switch mb-2">
                                            <input type="checkbox" class="form-check-input" id="pru_comp4" name="pru_comp4" wire:model="pru_comp4" >
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-4">
                                <div class="lineatoggle">
                                    <div>
                                        <label class="extendtext form-label d-inline-flex" >DECLARACION JURADA DE PAGO DEL IMPUESTO PREDIAL.</label>
                                    </div>
                                    <div style="padding-left: 10px;">
                                        <div class="form-check form-switch mb-2">
                                            <input type="checkbox" class="form-check-input" id="pru_comp5" name="pru_comp5" wire:model="pru_comp5" >
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-4">
                                <div class="lineatoggle">
                                    <div>
                                        <label class="extendtext form-label d-inline-flex" >CERTIFICADO EXPEDIDO A NOMBRE DEL POSEEDOR POR EL INEI</label>
                                    </div>
                                    <div style="padding-left: 10px;">
                                        <div class="form-check form-switch mb-2">
                                            <input type="checkbox" class="form-check-input" id="pru_comp6" name="pru_comp6" wire:model="pru_comp6" >
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Col -->

                            <div class="col-md-4">
                                <div class="lineatoggle">
                                    <div>
                                        <label class="extendtext form-label d-inline-flex" >CERTIFICADO DEL PADRON CATASTRAL DE LA DGRAAR, QUE CONSTE LA INSCRIPCIÓN DEL POSEEDOR SOLICITANTE.</label>
                                    </div>
                                    <div style="padding-left: 10px;">
                                        <div class="form-check form-switch mb-2">
                                            <input type="checkbox" class="form-check-input" id="pru_comp7" name="pru_comp7" wire:model="pru_comp7" >
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-4">
                                <div class="lineatoggle">
                                    <div>
                                        <label class="extendtext form-label d-inline-flex" >RECIBOS A NOMBRE DEL POSEEDOR POR CONCEPTO DE USO DE AGUA DE RIEGO, INSUMOS, MAQUINAS U OTROS.</label>
                                    </div>
                                    <div style="padding-left: 10px;">
                                        <div class="form-check form-switch mb-2">
                                            <input type="checkbox" class="form-check-input" id="pru_comp8" name="pru_comp8" wire:model="pru_comp8" >
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-4">
                                <div class="lineatoggle">
                                    <div>
                                        <label class="extendtext form-label d-inline-flex" >CONTRATO DE COMPRA VENTA DE LA PRODUCCION AGRARIA, PRECUARIA O FORESTAL</label>
                                    </div>
                                    <div style="padding-left: 10px;">
                                        <div class="form-check form-switch mb-2">
                                            <input type="checkbox" class="form-check-input" id="pru_comp9" name="pru_comp9" wire:model="pru_comp9" >
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Col -->

                            <div class="col-md-4">
                                <div class="lineatoggle">
                                    <div>
                                        <label class="extendtext form-label d-inline-flex" >CERTIFICADO DE INSCRIPCION DE MARCAS Y SEÑALES DE GANADO EXPEDIDO A NOMBRE DEL POSEEDOR</label>
                                    </div>
                                    <div style="padding-left: 10px;">
                                        <div class="form-check form-switch mb-2">
                                            <input type="checkbox" class="form-check-input" id="pru_comp10" name="pru_comp10" wire:model="pru_comp10" >
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-4">
                                <div class="lineatoggle">
                                    <div>
                                        <label class="extendtext form-label d-inline-flex" >CONSTANCIA DE REGISTRO DEL POSEEDOR INSCRITO EN EL REGISTRO DE ANA</label>
                                    </div>
                                    <div style="padding-left: 10px;">
                                        <div class="form-check form-switch mb-2">
                                            <input type="checkbox" class="form-check-input" id="pru_comp11" name="pru_comp11" wire:model="pru_comp11" >
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-4">
                                <div class="lineatoggle">
                                    <div>
                                        <label class="extendtext form-label d-inline-flex" >CERTIFICADO A NOMBRE DEL POSEEDOR DE DEUDAS CON FONDEAGRO, MINEAGRI U OTRA ENTIDAD FINANCIERA</label>
                                    </div>
                                    <div style="padding-left: 10px;">
                                        <div class="form-check form-switch mb-2">
                                            <input type="checkbox" class="form-check-input" id="pru_comp12" name="pru_comp12" wire:model="pru_comp12" >
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Col -->

                            <div class="col-md-4">
                                <div class="lineatoggle">
                                    <div>
                                        <label class="extendtext form-label d-inline-flex" >CERTIFICADO EN QUE CONSTE QUE EL POSEEDOR FUE PRESTATARIO DEL BANCO AGRARIO.</label>
                                    </div>
                                    <div style="padding-left: 10px;">
                                        <div class="form-check form-switch mb-2">
                                            <input type="checkbox" class="form-check-input" id="pru_comp13" name="pru_comp13" wire:model="pru_comp13" >
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-4">
                                <div class="lineatoggle">
                                    <div>
                                        <label class="extendtext form-label d-inline-flex" >CONSTANCIA DE POSESION OTORGADA POR LA AGENCIA AGRARIA O MUNICIPALIDAD DISTRITAL RESPECTIVA</label>
                                    </div>
                                    <div style="padding-left: 10px;">
                                        <div class="form-check form-switch mb-2">
                                            <input type="checkbox" class="form-check-input" id="pru_comp14" name="pru_comp14" wire:model="pru_comp14" >
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Col -->
                            <div class="col-md-4">
                                <div class="lineatoggle">
                                    <div>
                                        <label class="extendtext form-label d-inline-flex" >CUALQUIER OTRO DOCUMENTO DE FECHA CIERTA QUE ACREDITA LA POSESION</label>
                                    </div>
                                    <div style="padding-left: 10px;">
                                        <div class="form-check form-switch mb-2">
                                            <input type="checkbox" class="form-check-input" id="pru_comp15" name="pru_comp15" wire:model="pru_comp15" >
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                    <div class="row form-group mb-3">
                        <h4 class="mb-3">CARACTERISTICAS DEL PREDIO</h4>
                        <div class="col-md-3">
                            <label class="form-label d-inline-flex" > <div class="divcuadro">57</div>AREA DEL TERRENO</label>
                            <input type="text" class="form-control" placeholder="" name="area_terreno" wire:model="area_terreno" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..?)\../g, '$1');" maxlength="5">
                            @error('area_terreno')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-md-3">
                            <label class="form-label d-inline-flex" > <div class="divcuadrorequired">58</div>AREA DECLARADA</label>
                            <input type="text" class="form-control" placeholder="" name="area_declarada" wire:model="area_declarada" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..?)\../g, '$1');" maxlength="5">
                            @error('area_declarada')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-md-6">


                            <div class="row form-group">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">59</div>VIVENDA / CONSTRUCCIONES E INSTALACIONES</label>


                                <div class="col-md-4">
                                    <div class="lineatoggle">
                                        <div>
                                            <label class="form-label d-inline-flex" style="width: 120px;">VIVIENDA</label>
                                        </div>
                                        <div style="padding-left: 10px;">
                                            <div class="form-check form-switch mb-2">
                                                <input type="checkbox" class="form-check-input" id="vivienda" name="vivienda" wire:model="vivienda" >
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Col -->

                                <div class="col-md-4">
                                    <div class="lineatoggle">
                                        <div>
                                            <label class="form-label d-inline-flex" style="width: 120px;">ESTABLO</label>
                                        </div>
                                        <div style="padding-left: 10px;">
                                            <div class="form-check form-switch mb-2">
                                                <input type="checkbox" class="form-check-input" id="establo" name="establo" wire:model="establo" >
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Col -->

                                <div class="col-md-4">
                                    <div class="lineatoggle">
                                        <div>
                                            <label class="form-label d-inline-flex" style="width: 120px;">CORRAL</label>
                                        </div>
                                        <div style="padding-left: 10px;">
                                            <div class="form-check form-switch mb-2">
                                                <input type="checkbox" class="form-check-input" id="corral" name="corral" wire:model="corral" >
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Col -->

                                <div class="col-md-4">
                                    <div class="lineatoggle">
                                        <div>
                                            <label class="form-label d-inline-flex" style="width: 120px;">GALPON</label>
                                        </div>
                                        <div style="padding-left: 10px;">
                                            <div class="form-check form-switch mb-2">
                                                <input type="checkbox" class="form-check-input" id="galpon" name="galpon" wire:model="galpon" >
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Col -->

                                <div class="col-md-4">
                                    <div class="lineatoggle">
                                        <div>
                                            <label class="form-label d-inline-flex" style="width: 120px;">INVERNADERO</label>
                                        </div>
                                        <div style="padding-left: 10px;">
                                            <div class="form-check form-switch mb-2">
                                                <input type="checkbox" class="form-check-input" id="invernadero" name="invernadero" wire:model="invernadero" >
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Col -->

                                <div class="col-md-4">
                                    <div class="lineatoggle">
                                        <div>
                                            <label class="form-label d-inline-flex" style="width: 120px;">RESERVORIO</label>
                                        </div>
                                        <div style="padding-left: 10px;">
                                            <div class="form-check form-switch mb-2">
                                                <input type="checkbox" class="form-check-input" id="reservorio" name="reservorio" wire:model="reservorio" >
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Col -->

                                <div class="col-md-4">
                                    <div class="lineatoggle">
                                        <div>
                                            <label class="form-label d-inline-flex" style="width: 120px;">DEPOSITO</label>
                                        </div>
                                        <div style="padding-left: 10px;">
                                            <div class="form-check form-switch mb-2">
                                                <input type="checkbox" class="form-check-input" id="deposito" name="deposito" wire:model="deposito" >
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Col -->


                                <div class="col-md-4">
                                    <div class="lineatoggle">
                                        <div>
                                            <label class="form-label d-inline-flex" style="width: 120px;">SITIO Y ZONA ARQUEOLOGICA</label>
                                        </div>
                                        <div style="padding-left: 10px;">
                                            <div class="form-check form-switch mb-2">
                                                <input type="checkbox" class="form-check-input" id="zona_arque" name="zona_arque" wire:model="zona_arque" >
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Col -->


                                <div class="col-md-4">
                                    <div class="lineatoggle">
                                        <div>
                                            <label class="form-label d-inline-flex" style="width: 120px;">OTROS</label>
                                        </div>
                                        <div style="padding-left: 10px;">
                                            <div class="form-check form-switch mb-2">
                                                <input type="checkbox" class="form-check-input" id="otros" name="otros" wire:model="otros" >
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                        </div><!-- Row -->

                    </div><!-- Row -->
                    <!-- Construcciones -->
                    <div class="row form-group">
                        <h4 class="mb-4"> CONSTRUCCIONES</h4>
                        <div class="col-md-12 mb-5">
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr >
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">60</div> N° PISO</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">61</div> FECHA</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">62</div> MEP</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">63</div> ECS</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">64</div> ECC</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">65</div> MUROS </label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">66</div> TECHOS </label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">67</div> PISOS </label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">68</div> P. Y V. </label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">69</div> REVEST. </label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">70</div> BAÑOS </label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">71</div> INST. E. </label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">72</div> AREA V. </label></th>
                                            <th>

                                                @if($cont2>0)

                                                    <button type="button" class="btn btn-danger btn-icon" wire:click="reducirConstruccion" tabindex="90">-</button>
                                                @else
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarConstruccion" tabindex="90">+</button>
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<$cont2;$i++)
                                        <tr >
                                            <td>
                                                <input type="text" class="form-control"  name="nume_piso[]" placeholder="N° piso" id="num_piso.{{$i}}"  wire:model="num_piso.{{$i}}"  maxlength="2">
                                                @error('num_piso.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="date" class="form-control"  name="fecha[]" placeholder="FECHA" id="fecha.{{$i}}"  wire:model="fecha.{{$i}}" max="{{ date('Y-m-d') }}">
                                                @error('fecha.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <select class="form-select w-65"  data-width="100%" data-live-search="true" name="mep.{{$i}}" id="mep.{{$i}}" wire:model="mep.{{$i}}">
                                                    <option value="" >SELECCIONE</option>
                                                    <option value="01">01 CONCRETO</option>
                                                    <option value="02">02 LADRILLO</option>
                                                    <option value="03">03 ADOBE O QUINCHA</option>
                                                </select>
                                                @error('mep.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <select class="form-select w-65"  data-width="100%" data-live-search="true" name="ecs.{{$i}}" id="ecs.{{$i}}" wire:model="ecs.{{$i}}">
                                                    <option value="" >SELECCIONE</option>
                                                    <option value="01">01 MUY BUENO</option>
                                                    <option value="02">02 BUENO</option>
                                                    <option value="03">03 REGULAR</option>
                                                    <option value="04">04 MALO</option>
                                                </select>
                                                @error('ecs.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <select class="form-select w-65"  data-width="100%" data-live-search="true" name="ecc.{{$i}}" id="ecc.{{$i}}" wire:model="ecc.{{$i}}">
                                                    <option value="" >SELECCIONE</option>
                                                    <option value="01">01 TERMINADO</option>
                                                    <option value="02">02 EN CONSTRUCCION</option>
                                                    <option value="03">03 INCONCLUSA</option>
                                                    <option value="04">04 EN RUINAS</option>
                                                </select>
                                                @error('ecc.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="estr_muro_col[]" placeholder="MUROS" wire:model="estr_muro_col.{{$i}}"  onkeydown="return /[a-z]/i.test(event.key)" maxlength="1">
                                                @error('estr_muro_col.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="estr_techo[]" placeholder="TECHOS" wire:model="estr_techo.{{$i}}"   onkeydown="return /[a-z]/i.test(event.key)" maxlength="1">
                                                @error('estr_techo.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="acab_piso[]" placeholder="PISOS" wire:model="acab_piso.{{$i}}"  onkeydown="return /[a-z]/i.test(event.key)" maxlength="1">
                                                @error('acab_piso.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="acab_puerta_ven[]" placeholder="P. Y V." wire:model="acab_puerta_ven.{{$i}}"  onkeydown="return /[a-z]/i.test(event.key)" maxlength="1">
                                                @error('acab_puerta_ven.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="acab_revest[]" placeholder="REVEST." wire:model="acab_revest.{{$i}}"   onkeydown="return /[a-z]/i.test(event.key)" maxlength="1">
                                                @error('acab_revest.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="acab_bano[]" placeholder="BAÑOS" wire:model="acab_bano.{{$i}}"  onkeydown="return /[a-z]/i.test(event.key)" maxlength="1">
                                                @error('acab_bano.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="inst_elect_sanita[]" placeholder="INST. E." wire:model="inst_elect_sanita.{{$i}}"  onkeydown="return /[a-z]/i.test(event.key)" maxlength="1">
                                                @error('inst_elect_sanita.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="area_verificada[]" placeholder="AREA VERIFICADA" wire:model="area_verificada.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="5" >
                                                @error('area_verificada.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>

                                            <td>

                                                @if($i==$cont2-1)
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarConstruccion" tabindex="90">+</button>

                                                @endif
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
                        <h4 class="mb-4"> CARACTERISTICAS DE LAS CONSTRUCCIONES E INSTALACIONES</h4>
                        <div class="col-md-12 mb-5">
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr >
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">73</div> TIPO</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">74</div> CANTIDAD</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">75</div> AREA M2</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">75</div> AREA %</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">75</div> VOLUMEN</label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">76</div> FECHA DE CONSTRUCCION </label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">77</div> MAT. ESTRUC. PREDOMIMANTE </label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">78</div> ESTADO DE CONVERVACION </label></th>
                                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">79</div> ESTADO DE CONSTRUCCION </label></th>
                                            <th>

                                                @if($cont3>0)

                                                    <button type="button" class="btn btn-danger btn-icon" wire:click="reducirInstalacion" tabindex="90">-</button>
                                                @else
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarInstalacion" tabindex="90">+</button>
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<$cont3;$i++)
                                        <tr >
                                            <td>


                                                <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_ins.{{$i}}" id="tipo_ins.{{$i}}" wire:model="tipo_ins.{{$i}}">
                                                    <option value="" >SELECCIONE</option>
                                                    <option value="01">01 TERMINADO</option>
                                                    <option value="02">02 EN CONSTRUCCION</option>
                                                    <option value="03">03 INCONCLUSA</option>
                                                    <option value="04">04 EN RUINAS</option>
                                                </select>
                                                @error('tipo_ins.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror


                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="cantidad[]" placeholder="cantidad" id="cantidad.{{$i}}"  wire:model="cantidad.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="2">
                                                @error('cantidad.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="area_porcentaje[]" placeholder="area_porcentaje" id="area_porcentaje.{{$i}}"  wire:model="area_porcentaje.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="5">
                                                @error('area_porcentaje.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="area_const[]" placeholder="area_const" id="area_const.{{$i}}"  wire:model="area_const.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="5">
                                                @error('area_const.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="volumen[]" placeholder="volumen" id="volumen.{{$i}}"  wire:model="volumen.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="4">
                                                @error('volumen.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="date" class="form-control"  name="fecha_const[]" placeholder="fecha_const" id="fecha_const.{{$i}}"  wire:model="fecha_const.{{$i}}" max="{{ date('Y-m-d') }}">
                                                @error('fecha_const.'.$i)fecha_const
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <select class="form-select"  data-width="100%" data-live-search="true" name="material_est.{{$i}}" id="material_est.{{$i}}" wire:model="material_est.{{$i}}" >
                                                    <option value="" >SELECCIONE</option>
                                                    <option value="01">01 CONCRETO</option>
                                                    <option value="02">02 LADRILLO</option>
                                                    <option value="03">03 ADOBE</option>
                                                    <option value="04">04 QUINCHA</option>
                                                    <option value="05">05 MADERA</option>
                                                    <option value="06">06 OTROS</option>
                                                </select>
                                                @error('material_est.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <select class="form-select"  data-width="100%" data-live-search="true" name="estado_conserva.{{$i}}" id="estado_conserva.{{$i}}" wire:model="estado_conserva.{{$i}}" >
                                                    <option value="" >SELECCIONE</option>
                                                    <option value="01">01 MUY BUENO</option>
                                                    <option value="02">02 BUENO</option>
                                                    <option value="03">03 REGULAR</option>
                                                    <option value="04">04 MALO</option>
                                                    <option value="05">05 MUY MALO</option>
                                                </select>
                                                @error('estado_conserva.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <select class="form-select"  data-width="100%" data-live-search="true" name="estado_construc.{{$i}}" id="estado_construc.{{$i}}" wire:model="estado_construc.{{$i}}" >
                                                    <option value="" >SELECCIONE</option>
                                                    <option value="01">01 TERMINADO</option>
                                                    <option value="02">02 EN CONSTRUCCION</option>
                                                    <option value="03">03 INCONCLUSA</option>
                                                    <option value="04">04 EN RUINAS</option>
                                                    <option value="05">05 OTROS</option>
                                                </select>
                                                @error('estado_construc.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>


                                            <td>

                                                @if($i==$cont3-1)
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarInstalacion" tabindex="90">+</button>

                                                @endif
                                            </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->




                    <div class="row form-group mb-3">
                        <h4 class="mb-3">DESCRIPCIÓN DEL PREDIO</h4>
                        <div class="col-md-6">
                            <label class="form-label d-inline-flex" > <div class="divcuadrorequired">80</div>CÓDIGO DE USO</label>
                            <div wire:ignore>
                                <select class="form-select"  data-live-search="true" name="codi_uso" id="codi_uso" wire:model="codi_uso" >
                                    <option value=""  >SELECCIONE</option>
                                    <option value="01">TERRENO DE CULTIVO</option>
                                    <option value="02">TERRENO DESNUDO</option>
                                    <option value="03">COBERTURA ARBOREA</option>
                                    <option value="04">PASTOS NATURALES</option>
                                    <option value="05">USO NO AGRICOLA</option>
                                    <option value="06">TURISTICO / RECREACIONAL</option>
                                    <option value="07">ERIAZO</option>
                                </select>
                            </div>
                            @error('codi_uso')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-md-6">
                            <label class="form-label d-inline-flex" > <div class="divcuadrorequired">81</div>CLASIFICACIÓN DE USO ACTUAL</label>
                            <div wire:ignore>
                                <select class="form-select"  data-live-search="true" name="uso_actual" id="uso_actual"  wire:model="uso_actual" >
                                    <option value=""  >SELECCIONE</option>
                                    <option value="01">AGRICOLA</option>
                                    <option value="02">GANADERA</option>
                                    <option value="03">AVICOLA</option>
                                    <option value="04">FORESTAL</option>
                                    <option value="05">AGRO-INDUSTRIAL</option>
                                    <option value="06">OTROS(ESPECIFICAR)</option>
                                </select>
                            </div>
                            @error('uso_actual')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div><!-- Col -->
                    </div><!-- Row -->










                    <div class="row form-group">
                    <h4 class="mb-3">EXPLOTACION DEL PREDIO Y CLASIFICACIÓN TIERRAS POR SU CAPACIDAD DE USO MAYOR</h4>
                    <th><label class="form-label d-inline-flex" > <div class="divcuadro">82</div> AGRICOLA</label></th>

                        <div class="col-md-12 mb-5">
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr >
                                            <th><label class="form-label d-inline-flex" > TIPO</label></th>
                                            <th><label class="form-label d-inline-flex" > AREA %</label></th>
                                            <th><label class="form-label d-inline-flex" > DESCRIPCIÓN</label></th>
                                            <th><label class="form-label d-inline-flex" > GRUPO</label></th>
                                            <th><label class="form-label d-inline-flex" > CLASE</label></th>
                                            <th><label class="form-label d-inline-flex" > AREA % </label></th>
                                            <th><label class="form-label d-inline-flex" > GRUPO  </label></th>
                                            <th><label class="form-label d-inline-flex" > CLASE </label></th>
                                            <th><label class="form-label d-inline-flex" > AREA % </label></th>
                                            <th><label class="form-label d-inline-flex" > N° PLANTAS </label></th>
                                            <th>

                                                @if($cont4>0)

                                                    <button type="button" class="btn btn-danger btn-icon" wire:click="reducirExplotacion" tabindex="90">-</button>
                                                @else
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarExplotacion" tabindex="90">+</button>
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<$cont4;$i++)
                                        <tr >
                                            <td>
                                            <select class="form-select"  data-live-search="true" name="tipo_usoactual" id="tipo_usoactual" wire:model="tipo_usoactual.{{$i}}" >
                                                <option value=""  >SELECCIONE</option>
                                                <option value="01">TERRENO DE CULTIVO</option>
                                                <option value="02">TERRENO DESNUDO</option>
                                                <option value="03">COBERTURA ARBOREA</option>
                                                <option value="04">PASTOS NATURALES</option>
                                                <option value="05">USO NO AGRICOLA</option>
                                                <option value="06">TURISTICO / RECREACIONAL</option>
                                                <option value="07">ERIAZO</option>
                                            </select>
                                                @error('tipo_ins.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="areausoactual[]" placeholder="Uso Actual" id="areausoactual.{{$i}}"  wire:model="areausoactual.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="2">
                                                @error('areausoactual.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="descripcionusoactual[]" placeholder="Uso Actual" id="descripcionusoactual.{{$i}}"  wire:model="descripcionusoactual.{{$i}}" maxlength="20">
                                                @error('descripcionusoactual.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="grupoestimada[]" placeholder="Estimada" id="grupoestimada.{{$i}}"  wire:model="grupoestimada.{{$i}}" onkeydown="return /[a-z]/i.test(event.key)" maxlength="1">
                                                @error('grupoestimada.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="claseestimada[]" placeholder="Estimada" id="claseestimada.{{$i}}"  wire:model="claseestimada.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="2">
                                                @error('claseestimada.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="areaestimada[]" placeholder="Estimada" id="areaestimada.{{$i}}"  wire:model="areaestimada.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="5">
                                                @error('areaestimada.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>



                                            <td>
                                                <input type="text" class="form-control"  name="grupoestudio[]" placeholder="Estudio" id="grupoestudio.{{$i}}"  wire:model="grupoestudio.{{$i}}" onkeydown="return /[a-z]/i.test(event.key)" maxlength="1">
                                                @error('grupoestudio.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="claseestudio[]" placeholder="Estudio" id="claseestudio.{{$i}}"  wire:model="claseestudio.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="2">
                                                @error('claseestudio.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="areaestudio[]" placeholder="Estudio" id="areaestudio.{{$i}}"  wire:model="areaestudio.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="5">
                                                @error('areaestudio.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="numplantas[]" placeholder="Plantas" id="numplantas.{{$i}}"  wire:model="numplantas.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="5">
                                                @error('numplantas.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>


                                            <td>

                                                @if($i==$cont4-1)
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarExplotacion" tabindex="90">+</button>

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
                    <h4 class="mb-3">EXPLOTACION DEL PREDIO Y CLASIFICACIÓN TIERRAS POR SU CAPACIDAD DE USO MAYOR</h4>
                    <th><label class="form-label d-inline-flex" > <div class="divcuadro">83</div> GANADERIA / CRIANZA</label></th>

                        <div class="col-md-12 mb-5">
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr >
                                            <th><label class="form-label d-inline-flex" > TIPO</label></th>
                                            <th><label class="form-label d-inline-flex" > RAZA / ESPECIE</label></th>
                                            <th><label class="form-label d-inline-flex" > CANTIDAD</label></th>
                                            <th>

                                                @if($cont6>0)

                                                    <button type="button" class="btn btn-danger btn-icon" wire:click="reducirTipoRaza" tabindex="90">-</button>
                                                @else
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarTipoRaza" tabindex="90">+</button>
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<$cont6;$i++)
                                        <tr >
                                            <td>
                                            <select class="form-select"  data-live-search="true" name="tipo_ganaderia.{{$i}}" id="tipo_ganaderia.{{$i}}" wire:model="tipo_ganaderia.{{$i}}" >
                                                <option value=""  >SELECCIONE</option>
                                                <option value="01"> 1. VACUNO</option>
                                                <option value="02"> 2. OVINO</option>
                                                <option value="03"> 3. CAPRINO</option>
                                                <option value="04"> 4. CAMELIDO</option>
                                                <option value="05"> 5. PORCINO</option>
                                                <option value="06"> 6. AVICULTURA</option>
                                                <option value="07"> 7. ANIMALES MENORES</option>
                                            </select>
                                                @error('tipo_ganaderia.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="raza_especie[]" placeholder="Raza / especie" id="raza_especie.{{$i}}"  wire:model="raza_especie.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="9">
                                                @error('raza_especie.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="cantidad_especie[]" placeholder="Uso Actual" id="cantidad_especie.{{$i}}"  wire:model="cantidad_especie.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="9">
                                                @error('cantidad_especie.'.$i)
                                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                                @enderror
                                            </td>

                                            <td>
                                                @if($i==$cont6-1)
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarTipoRaza" tabindex="90">+</button>

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
                        <div class="col-md-2">
                            <label class="form-label d-inline-flex" > <div class="divcuadro">84</div>RIEGO</label>
                            <div wire:ignore>
                                <select class="form-select"  data-live-search="true" name="riego" id="riego" wire:model="riego" >
                                    <option value=""  >SELECCIONE</option>
                                    <option value="01">RIEGO POR GRAVEDAD</option>
                                    <option value="02">RIEGO TECNIFICADO</option>
                                    <option value="03">SECANO</option>
                                    <option value="04">OTROS</option>
                                </select>
                            </div>
                            @error('riego')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div><!-- Col -->


                        <div class="col-md-2">
                            <label class="form-label d-inline-flex" > <div class="divcuadro">85</div>DERECHOS DE AGUA</label>
                            <div wire:ignore>
                                <select class="form-select"  data-live-search="true" name="derechos_agua" id="derechos_agua" wire:model="derechos_agua" >
                                    <option value=""  >SELECCIONE</option>
                                    <option value="01">LICENCIA</option>
                                    <option value="02">PERMISO</option>
                                    <option value="03">AUTORIZACIÓN</option>
                                    <option value="04">SIN DERECHO DE USO</option>
                                </select>

                            </div>
                            @error('derechos_agua')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div><!-- Col -->

                        <div class="col-md-2">
                            <label class="form-label d-inline-flex" > <div class="divcuadro">86</div>FUENTE HIDRICA</label>
                            <div wire:ignore>
                                <select class="form-select"  data-live-search="true" name="fuente_hidrica" id="fuente_hidrica" wire:model="fuente_hidrica" >
                                    <option value=""  >SELECCIONE</option>
                                    <option value="01">01 AGUAS SUPERFICIALES</option>
                                    <option value="02">02 AGUAS SUBTERRANEAS</option>
                                    <option value="03">03 AGUAS REUSADAS TRATADAS</option>
                                    <option value="04">04 AGUAS DESALINIZADAS</option>
                                    <option value="05">05 AGUAS ATMOSFERICAS</option>
                                </select>

                            </div>
                            @error('fuente_hidrica')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div><!-- Col -->



                        <div class="col-md-2">
                            <label class="form-label d-inline-flex" > <div class="divcuadro">87</div>CERCANIA AL RIO</label>
                            <div wire:ignore>
                                <select class="form-select"  data-live-search="true" name="cercania_rio" id="cercania_rio" wire:model="cercania_rio" >
                                    <option value=""  >SELECCIONE</option>
                                    <option value="01">01 HASTA 1KM</option>
                                    <option value="02">02 DE 1 A 2KM</option>
                                    <option value="03">03 DE 2 A 3KM</option>
                                    <option value="04">04 MAS DE 3KM</option>
                                </select>

                            </div>
                            @error('cercania_rio')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div><!-- Col -->
                        <div class="col-md-4">
                            <label class="form-label d-inline-flex" > <div class="divcuadro">88</div>CUMPLE CON LA EXPLOTACION</label>
                            <div wire:ignore>
                                <select class="form-select"  data-live-search="true" name="explotacion" id="explotacion" wire:model="explotacion" >
                                    <option value=""  >SELECCIONE</option>
                                    <option value="01">SI</option>
                                    <option value="02">NO</option>
                                </select>

                            </div>
                            @error('explotacion')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div><!-- Col -->
                    </div><!-- Row -->





                    <div class="row form-group">
                    <h4 class="mb-3">INFORMACION COMPLEMENTARIA</h4>

                    <div class="col-md-12 mb-5">
                            <div class="mb-3">
                                <label class="form-label d-inline-flex" > <div class="divcuadro">89</div>IDENTIFICACIÓN DE LOS LITIGANTES</label>
                            </div>
                            <div class="table-responsive">
                                <table id="vias" class="table">
                                    <thead>
                                        <tr >
                                            <th><label class="form-label d-inline-flex" > T. DOCUMENTO</label></th>
                                            <th><label class="form-label d-inline-flex" > N° DOCUMENTO</label></th>
                                            <th><label class="form-label d-inline-flex" > NOMBRES</label></th>
                                            <th><label class="form-label d-inline-flex" > APELLIDO PATERNO</label></th>
                                            <th><label class="form-label d-inline-flex" > APELLIDO MATERNO</label></th>
                                            <th>

                                                @if($cont5>0)

                                                    <button type="button" class="btn btn-danger btn-icon" wire:click="reducirinformacion" tabindex="90">-</button>
                                                @else
                                                    <button type="button" class="btn btn-success btn-icon" wire:click="aumentarinformacion" tabindex="90">+</button>
                                                @endif
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<$cont5;$i++)
                                        <tr >
                                            <td>
                                                <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_doc_litigante[]" id="tipo_doc_litigante{{$i}}" wire:model="tipolitigante.{{$i}}" >
                                                    <option value="" >SELECCIONE</option>
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

                                                @if($i==$cont5-1)
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

                    <div class="row form-group mb-3">
                        <div class="col-md-8">
                            <label class="form-label d-inline-flex" > <div class="divcuadro">88</div>FICHA CATASTRAL LLENADA CON INTERVENCION DE REPRESENTANTE DESIGNADO</label>
                            <div wire:ignore>
                                <select class="form-select"  data-live-search="true" name="llenada_observacion" id="llenada_observacion" wire:model="llenada_observacion" >
                                    <option value=""  >SELECCIONE</option>
                                    <option value="01">SI</option>
                                    <option value="02">NO</option>
                                </select>

                            </div>
                            @error('llenada_observacion')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div><!-- Col -->
                    </div><!-- Row -->







                    <div class="row form-group mb-3">
                        <div class="row form-group">
                            <label class="form-label d-inline-flex" > <div class="divcuadro">94</div>DECLARANTE</label>
                            <div class="col-md-2 mb-3">
                                <label class="form-label d-inline-flex" >DNI</label>
                                <input type="number" class="form-control" name="num_documento_declarante" wire:model.lazy="numdocumentodeclarante" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="17" >
                                @error('numdocumentodeclarante')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                                @if ($message = Session::get('dark'))
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @endif
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label d-inline-flex" > NOMBRES</label>
                                <input type="text" class="form-control" name="nombres_declarante" wire:model="nombres_declarante" onkeydown="return /[a-ñ]/i.test(event.key)">
                                @error('nombres_declarante')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label d-inline-flex" > APELLIDO PATERNO</label>
                                <input type="text" class="form-control" name="apellido_paterno_declarante" wire:model="apellido_paterno_declarante" onkeydown="return /[a-ñ]/i.test(event.key)">
                                @error('apellido_paterno_declarante')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label d-inline-flex" > APELLIDO MATERNO</label>
                                <input type="text" class="form-control" name="apellido_materno_declarante" wire:model="apellido_materno_declarante" onkeydown="return /[a-ñ]/i.test(event.key)">
                                @error('apellido_materno_declarante')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label d-inline-flex" > FECHA</label>
                                <input type="date" class="form-control" name="fecha_declarante" wire:model="fecha_declarante" max="{{ date('Y-m-d') }}"  >
                                @error('fecha_declarante')
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
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
                        <div class="col-md-4 mb-3">
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
                        <div class="col-md-4 mb-3">
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
                        <button type="button" class="btn btn-primary" wire:click.prevent="register">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

<style>
    label{
        height:6ch;
        align-items: self-end;
    }
    .extendtext{
        height:auto;
    }
</style>





@push('custom-scripts')

@foreach($fichaanterior->titulars as $titular)
    @if($titular->nume_titular == 'TITULAR N° 1')
        @if($titular!="")
            @if($titular->persona->tipo_persona==1)
            <script>
                $('#juridica').hide();
            </script>
            @if($titular->esta_civil=="05" || $titular->esta_civil=="02")
            @else
            <script>
                $('#casado').hide();
            </script>
            @endif
            @endif
            @if($titular->persona->tipo_persona==2)
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
    @endif
@endforeach


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

</script>


@if($fichaanterior->ficharural!="")
<script>
    $('#cod_dep').empty();
</script>
@if($fichaanterior->ficharural->cod_dep!="")
<script>
    $('#cod_dep').append("<option value='{{$fichaanterior->ficharural->cod_dep}}' >{{$fichaanterior->ficharural->departamento->descri}}</option>");
</script>
@endif
<script>
    $('#cod_pro').empty();
    <?php foreach ($fichaanterior->ficharural->provincias as $provincia) :
        if ($provincia->cod_dep == $fichaanterior->ficharural->cod_dep && $provincia->cod_pro == $fichaanterior->ficharural->cod_pro && $provincia->codi_dis == "00") { ?>
            $('#cod_pro').append("<option value='{{$provincia->codi_pro}}' >{{$provincia->descri}}</option>");
    <?php }
    endforeach ?>

    $('#cod_dis').empty();
    <?php foreach ($fichaanterior->ficharural->distritos as $distrito) :
        if ($distrito->cod_dep == $fichaanterior->ficharural->cod_dep && $distrito->cod_pro == $fichaanterior->ficharural->cod_pro && $distrito->codi_dis == $fichaanterior->ficharural->cod_dis) { ?>
            $('#cod_dis').append("<option value='{{$distrito->codi_dis}}' >{{$distrito->descri}}</option>");
    <?php }
    endforeach ?>
</script>
@endif





<script>
    $('#cod_dep').change(agregarValores2);
    $('#cod_pro').change(agregarValores3);



    function limpiarselect() {
        $('#cod_dep').empty();
    }

    function agregarValores2() {
        limpiarselect2();
        $('#cod_pro').append("<option value='' >SELECCIONE</option>");
        <?php foreach ($provincias  as $pro) : ?>
            if ({{$pro->cod_dep}} == $("#cod_dep option:selected").val()) {
                $('#cod_pro').append("<option value='{{$pro->cod_pro}}' >{{$pro->descri}}</option>");
            }
        <?php endforeach ?>
    }

    function limpiarselect2() {
        $('#cod_pro').empty();
        $('#cod_dis').empty();
    }

    function agregarValores3() {
        limpiarselect3();
        $('#cod_dis').append("<option value='' >SELECCIONE</option>");
        <?php foreach ($distritos  as $dis) : ?>
            if ({{$dis -> cod_pro}} == $("#cod_pro option:selected").val() && {{$dis -> cod_dep}} == $("#cod_dep option:selected").val()) {
                $('#cod_dis').append("<option value='{{$dis->codi_dis}}' >{{$dis->descri}}</option>");
            }
        <?php endforeach ?>
    }

    function limpiarselect3() {
        $('#cod_dis').empty();
    }
</script>









@if($fichaanterior->domiciliotitular!="")
<script>
    $('#departamentootros').empty();
</script>
@if($fichaanterior->domiciliotitular->codi_dep!="")
<script>
    $('#departamentootros').append("<option value='{{$fichaanterior->domiciliotitular->codi_dep}}' >{{$fichaanterior->domiciliotitular->departamento->descri}}</option>");
</script>
@endif
<script>
    $('#provinciaotros').empty();
    <?php foreach ($fichaanterior->domiciliotitular->provincias as $provincia) :
        if ($provincia->cod_dep == $fichaanterior->domiciliotitular->codi_dep && $provincia->cod_pro == $fichaanterior->domiciliotitular->codi_pro && $provincia->codi_dis == "00") { ?>
            $('#provinciaotros').append("<option value='{{$provincia->codi_pro}}' >{{$provincia->descri}}</option>");
    <?php }
    endforeach ?>

    $('#distritootros').empty();
    <?php foreach ($fichaanterior->domiciliotitular->distritos as $distrito) :
        if ($distrito->cod_dep == $fichaanterior->domiciliotitular->codi_dep && $distrito->cod_pro == $fichaanterior->domiciliotitular->codi_pro && $distrito->codi_dis == $fichaanterior->domiciliotitular->codi_dis) { ?>
            $('#distritootros').append("<option value='{{$distrito->codi_dis}}' >{{$distrito->descri}}</option>");
    <?php }
    endforeach ?>
</script>
@endif





<script>



    $('#departamentootros').change(agregarValores2);
    $('#provinciaotros').change(agregarValores3);



    function limpiarselect() {
        $('#departamentootros').empty();
    }

    function agregarValores2() {
        limpiarselect2();
        $('#provinciaotros').append("<option value='' >SELECCIONE</option>");
        <?php foreach ($provincias  as $pro) : ?>
            if ({{$pro->cod_dep}} == $("#departamentootros option:selected").val()) {
                $('#provinciaotros').append("<option value='{{$pro->cod_pro}}' >{{$pro->descri}}</option>");
            }
        <?php endforeach ?>
    }

    function limpiarselect2() {
        $('#provinciaotros').empty();
        $('#distritootros').empty();
    }

    function agregarValores3() {
        limpiarselect3();
        $('#distritootros').append("<option value='' >SELECCIONE</option>");
        <?php foreach ($distritos  as $dis) : ?>
            if ({{$dis -> cod_pro}} == $("#provinciaotros option:selected").val() && {{$dis -> cod_dep}} == $("#departamentootros option:selected").val()) {
                $('#distritootros').append("<option value='{{$dis->codi_dis}}' >{{$dis->descri}}</option>");
            }
        <?php endforeach ?>
    }

    function limpiarselect3() {
        $('#distritootros').empty();
    }
</script>

@endpush
