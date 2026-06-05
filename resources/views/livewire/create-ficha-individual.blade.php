<div>
    <div class="row">
        <div class="col-md-2 grid-margin">
            <nav class="navmenuvert">
                <ul>
                    @if ($llenadoStep >= 1)
                        <li><a class="active" href="#" wire:click="verStep(1)">Datos Generales</a></li>
                    @endif
                    @if ($llenadoStep >= 2)
                        <li><a class="active" href="#" wire:click="verStep(2)">Ubicación del Predio</a></li>
                    @else
                        <li><a>Ubicación del Predio</a></li>
                    @endif
                    @if ($llenadoStep >= 3)
                        <li><a class="active" href="#" wire:click="verStep(3)">Titular Catastral</a></li>
                    @else
                        <li><a>Titular Catastral</a></li>
                    @endif
                    @if ($llenadoStep >= 4)
                        <li><a class="active" href="#" wire:click="verStep(4)">Domicilio Titular</a></li>
                    @else
                        <li><a>Domicilio Titular</a></li>
                    @endif
                    @if ($llenadoStep >= 5)
                        <li><a class="active" href="#" wire:click="verStep(5)">Caracteristicas Titularidad</a>
                        </li>
                    @else
                        <li><a>Caracteristicas Titularidad</a></li>
                    @endif
                    @if ($llenadoStep >= 6)
                        <li><a class="active" href="#" wire:click="verStep(6)">Descripcion del Predio</a></li>
                    @else
                        <li><a>Descripcion del Predio</a></li>
                    @endif
                    @if ($llenadoStep >= 7)
                        <li><a class="active" href="#" wire:click="verStep(7)">Servicio del Predio</a></li>
                    @else
                        <li><a>Servicio del Predio</a></li>
                    @endif
                    @if ($llenadoStep >= 8)
                        <li><a class="active" href="#" wire:click="verStep(8)">Obras Complementarias</a></li>
                    @else
                        <li><a>Obras Complementarias</a></li>
                    @endif
                    @if ($llenadoStep >= 9)
                        <li><a class="active" href="#" wire:click="verStep(9)">Documentos</a></li>
                    @else
                        <li><a>Documentos</a></li>
                    @endif
                    @if ($llenadoStep >= 10)
                        <li><a class="active" href="#" wire:click="verStep(10)">Inscripcion del Predio</a></li>
                    @else
                        <li><a>Inscripcion del Predio</a></li>
                    @endif
                    @if ($llenadoStep >= 11)
                        <li><a class="active" href="#" wire:click="verStep(11)">Evaluacion del Predio</a></li>
                    @else
                        <li><a>Evaluacion del Predio</a></li>
                    @endif
                    @if ($llenadoStep >= 12)
                        <li><a class="active" href="#" wire:click="verStep(12)">Información Complementaria</a>
                        </li>
                    @else
                        <li><a>Información Complementaria</a></li>
                    @endif
                    @if ($llenadoStep >= 13)
                        <li><a class="active" href="#" wire:click='verStep(13)'>Observaciones</a></li>
                    @else
                        <li><a>Observaciones</a></li>
                    @endif
                    {{ $actualStep }}
                </ul>
            </nav>
        </div>
        <div class="col-md-10 grid-margin">
            @if ($actualStep == 1)
                <div class="row form-group">
                    <h4 class="mb-4"> Datos Generalesx</h4>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex"> NUMERO DE FICHA</label>
                            <input type="text" class="form-control" placeholder="" wire:model="nume_ficha">
                            @error('nume_ficha')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex"> NUMERO DE FICHAS POR LOTE</label>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder=""
                                        wire:model="nume_ficha_lote">
                                    @error('nume_ficha_lote')
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>

                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row form-group">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">1</div> CÓDIGO ÚNICO CATASTRAL - CUC
                            </label>
                            <input type="text" class="form-control" placeholder="" wire:model="cuc">
                            @error('cuc')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">2</div> CÓDIGO HOJA CATASTRAL
                            </label>
                            <input type="text" class="form-control" placeholder="" wire:model="codi_hoja_catastral">
                            @error('codi_hoja_catastral')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row  form-group">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">3</div> CÓDIGO ÚNICO CATASTRAL - CUC
                            </label>
                            <div class="row row3 mb-3" style="place-content: center;text-align: center;">
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label labelpeque d-inline-flex">UBIGEO</label>
                                        <input type="text" class="form-control" placeholder="" readonly
                                            value="080108">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="mb-3">
                                        <label class="form-label labelpeque d-inline-flex">SECTOR</label>
                                        <input type="text" class="form-control" placeholder=""
                                            wire:model="nume_ficha_lote">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="mb-3">
                                        <label class="form-label labelpeque d-inline-flex">MZNA</label>
                                        <input type="text" class="form-control" placeholder=""
                                            wire:model="nume_ficha_lote">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="mb-3">
                                        <label class="form-label labelpeque d-inline-flex">LOTE</label>
                                        <input type="text" class="form-control" placeholder=""
                                            wire:model="nume_ficha_lote">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="mb-3">
                                        <label class="form-label labelpeque d-inline-flex">EDIFICA</label>
                                        <input type="text" class="form-control" placeholder=""
                                            wire:model="nume_ficha_lote">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="mb-3">
                                        <label class="form-label labelpeque d-inline-flex">ENTRADA</label>
                                        <input type="text" class="form-control" placeholder=""
                                            wire:model="nume_ficha_lote">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="mb-3">
                                        <label class="form-label labelpeque d-inline-flex">PISO</label>
                                        <input type="text" class="form-control" placeholder=""
                                            wire:model="nume_ficha_lote">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="mb-3">
                                        <label class="form-label labelpeque d-inline-flex">UNIDAD</label>
                                        <input type="text" class="form-control" placeholder=""
                                            wire:model="nume_ficha_lote">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="mb-3">
                                        <label class="form-label labelpeque d-inline-flex">DC</label>
                                        <input type="text" class="form-control" placeholder="" wire:model="dc">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Col -->

                </div><!-- Row -->
                <div class="row form-group">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">4</div> CÓD CONTRIBUYENTE DE RENTAS
                            </label>
                            <input type="text" class="form-control" placeholder="" wire:model="codi_cont_rentas">
                            @error('codi_cont_rentas')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">5</div> CÓDIGO PREDIAL DE RENTAS
                            </label>
                            <input type="text" class="form-control" placeholder="" wire:model="codi_pred_rentas">
                            @error('codi_pred_rentas')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex" style="color: red;">
                                <div class="divcuadro">6</div> UNIDAD ACUMULADA A CÓDIGO PREDIAL DE RENTAS
                            </label>
                            <input type="text" class="form-control" placeholder="" wire:model="unid_acum_rentas">
                            @error('unid_acum_rentas')
                                <span class="error-message" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
            @endif
            @if ($actualStep == 2)
                <div class="row form-group">
                    <h4 class="mb-4"> Ubicacion del predio catastral</h4>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">5</div> CÓDIGO DE VIA
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">6</div> TIPO DE VIA
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">7</div> NOMBRE DE VIA
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">8</div> TIPO DE PUERTA
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">9</div> N° MUNICIPAL
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-1">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">10</div> COND.NUMER.
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row form-group">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">11</div> TIPO DE EDIFICACION
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">12</div> TIPO DE INTERIOR
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">13</div> N° DE INTERIOR
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row form-group">
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">14</div> CÓDIGO URBANO
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">15</div> NOMBRE DE LA HABILITACIÓN URBANA
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-2">
                        <div class="mb-2">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">16</div> ZONA/SECTOR/ETAPA
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">17</div> MANZANA
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-1">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">18</div> LOTE
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-1">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">19</div> SUB-LOTE
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
            @endif
            @if ($actualStep == 3)
                <div class="row form-group">
                    <h4 class="mb-4"> IDENTIFICACIÓN DEL TITULAR CATASTRAL</h4>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">20</div> TIPO DE TITULAR
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">21</div> ESTADO CIVIL
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">22</div> TIPO DOC. IDENTIDAD
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">23</div> N° DOC.
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row form-group">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">24</div> NOMBRES
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">25</div> APELLIDO PATERNO
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">26</div> APELLIDO MATERNO
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
            @endif
            @if ($actualStep == 4)
                <div class="row form-group">
                    <h4 class="mb-4"> DOMICILIO FISCAL DEL TITULAR CATASTRAL</h4>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">27</div> TIPO DE TITULAR
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">28</div> ESTADO CIVIL
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">29</div> TIPO DOC. IDENTIDAD
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">30</div> UBICACION
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
            @endif
            @if ($actualStep == 4)
                <div class="row form-group">
                    <h4 class="mb-4"> DOMICILIO FISCAL DEL TITULAR CATASTRAL</h4>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">31</div> DEPARTAMENTO
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">32</div> PROVINCIA
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">33</div> DISTRITO
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row form-group">
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">5</div> CÓDIGO DE VIA
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-2">
                        <div class="mb-">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">6</div> TIPO DE VIA
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">7</div> NOMBRE DE VIA
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->

                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">9</div> N° MUNICIPAL
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">13</div> COND.NUMER.
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row form-group">
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">14</div> CÓDIGO URBANO
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">15</div> NOMBRE DE LA HABILITACIÓN URBANA
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-2">
                        <div class="mb-2">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">16</div> ZONA/SECTOR/ETAPA
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">17</div> MANZANA
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-1">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">18</div> LOTE
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-1">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">19</div> SUB-LOTE
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->

                <div class="row form-group">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">34</div> TELÉFONO
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">35</div> ANEXO
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">36</div> CORREO ELECTRÓNICO
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
            @endif
            @if ($actualStep == 5)
                <div class="row form-group">
                    <h4 class="mb-4"> CARACTERISTICAS DE LA TITULARIDAD</h4>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">37</div> CONDICION DEL TITULAR
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">38</div> FORMA DE ADQUISICION
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">33</div> FECHA DE ADQUISICION
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row form-group">
                    <h4 class="mb-4"> DESCRIPCION DEL PREDIO</h4>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">40</div> CLASIFICACION DEL PREDIO
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">41</div> PREDIO CATASTRAL EN
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row form-group">
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">42</div> CÓDIGO DE USO
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">43</div> USO DEL PREDIO CATASTRAL (Descripcion)
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">44</div> ZONIFICACION
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">45</div> AREA DE TERRENO ADQUIRIDO (M2)
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">46</div> AREA DE TERRENO VERIFICADA (M2)
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row form-group">
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">42</div> CÓDIGO DE USO
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">43</div> USO DEL PREDIO CATASTRAL (Descripcion)
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">44</div> ZONIFICACION
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">45</div> AREA DE TERRENO ADQUIRIDO (M2)
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">46</div> AREA DE TERRENO VERIFICADA (M2)
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->

                <div class="row form-group">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">47</div> MEDIDA EN CAMPO
                            </label>
                            <input type="text" class="form-control" placeholder="frente">
                            <input type="text" class="form-control" placeholder="derecha">
                            <input type="text" class="form-control" placeholder="izquierda">
                            <input type="text" class="form-control" placeholder="fondo">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">48</div> COLINDANCIAS EN CAMPO
                            </label>
                            <input type="text" class="form-control" placeholder="frente">
                            <input type="text" class="form-control" placeholder="derecha">
                            <input type="text" class="form-control" placeholder="izquierda">
                            <input type="text" class="form-control" placeholder="fondo">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
            @endif
            @if ($actualStep == 6)
                <div class="row form-group">
                    <h4 class="mb-4"> SERVICIOS QUE CUENTA EL PREDIO</h4>
                    <div class="col-md-1">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">49</div> LUZ
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-1">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">50</div> AGUA
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-1">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">51</div> TELÉFONO
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-1">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">52</div> DESAGÜE
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-1">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">53</div> GAS
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-1">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">54</div> INTERNET
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-1">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">55</div> CONEXIÓN TV POR CABLE O CABLE SATELITAL
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
            @endif
            @if ($actualStep == 7)
                <div class="row form-group">
                    <h4 class="mb-4"> CONSTRUCCIONES</h4>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">56</div> N° PISO SOTANO MEZZANINE
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">57</div> FECHA DE CONSTRUCCION
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">58</div> MEP
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">59</div> ECS
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">60</div> ECC
                            </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
            @endif
            @if ($actualStep == 8)
                <div class="row form-group">
                    <h4 class="mb-5"> CATEGORIAS DE CONSTRUCCION</h4>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">61</div>ESTRUCTURA
                            </label>
                            <input type="text" class="form-control" placeholder="MUROS Y COLUMNAS">
                            <input type="text" class="form-control" placeholder="TECHOS">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">62</div> ACABADOS
                            </label>
                            <input type="text" class="form-control" placeholder="PISOS">
                            <input type="text" class="form-control" placeholder="PUERTAS Y VENTANAS">
                            <input type="text" class="form-control" placeholder="REVEST">
                            <input type="text" class="form-control" placeholder="BAÑOS">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
            @endif
            @if ($actualStep == 9)
                <div class="row form-group">
                    <h4 class="mb-5"> CATEGORIAS DE CONSTRUCCION</h4>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">61</div>MUROS Y COLUMNOS
                            </label>
                            <input type="text" class="form-control" placeholder="MUROS Y COLUMNAS">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">62</div>TECHOS
                            </label>
                            <input type="text" class="form-control" placeholder="TECHOS">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">63</div> PISOS
                            </label>
                            <input type="text" class="form-control" placeholder="PISOS">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">64</div> PUERTAS Y VENTANAS
                            </label>
                            <input type="text" class="form-control" placeholder="PUERTAS Y VENTANAS">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">65</div> REVEST.
                            </label>
                            <input type="text" class="form-control" placeholder="REVEST">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">66</div> BAÑOS
                            </label>
                            <input type="text" class="form-control" placeholder="BAÑOS">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">67</div> INSTALACIONES ELECTRICAS
                            </label>
                            <input type="text" class="form-control" placeholder="BAÑOS">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
            @endif
            @if ($actualStep == 10)
                <div class="row form-group">
                    <h4 class="mb-5"> % DE BIEN COMUN</h4>


                </div><!-- Row -->
                <div class="row form-group">
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">68</div>AREA VERIFICADA
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">69</div>UCA
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
            @endif
            @if ($actualStep == 11)
                <div class="row form-group">
                    <h4 class="mb-5"> % DE BIEN COMUN</h4>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">68</div>TERRENO LEGAL
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">68</div>CONSTRUCCION LEGAL
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">68</div>TERRENO FISICO
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">68</div>CONSTRUCCION FISICO
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
            @endif
            @if ($actualStep == 12)
                <div class="row form-group">
                    <h4 class="mb-5"> OBRAS COMPLEMENTARIAS</h4>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">71</div>CÓDIGO
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">72</div>DESCRIPCION
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">57</div>FECHA DE CONSTRUCCION
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->

                <div class="row form-group">
                    <div class="col-md43">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">58</div>MEP
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">59</div>ECS
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">60</div>ECC
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row form-group">
                    <div class="col-md43">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">73</div>PRODUCTO TOTAL
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">74</div>UNIDAD DE MEDIDA
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">69</div>UCA
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
            @endif
            @if ($actualStep == 13)
                <div class="row form-group">
                    <h4 class="mb-5"> DOCUMENTOS</h4>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">75</div>TIPO DE DOCUMENTO
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">76</div>DESCRIPCION
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">77</div>FECHA DE CONSTRUCCION
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">78</div>AREA AUTORIZADA
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->





                <div class="row form-group">
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">79</div>TIPO DE DOCUMENTO
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">72</div>DESCRIPCION
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">57</div>FECHA DE CONSTRUCCION
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">57</div>FECHA DE CONSTRUCCION
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->


                <div class="row form-group">
                    <h4 class="mb-5"> INSCRIPCION DEL PREDIO CATASTRAL</h4>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">79</div>TIPO DE PARTIDA REGISTRAL
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">80</div>NUMERO
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">81</div>FOJAS
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">82</div>ASIENTO
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row form-group">
                    <div class="col-md-2">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">83</div>FECHA DE INSCRIPCION
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">84</div>DECLARATORIA DE FÁBRICA
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">85</div>AS. INSC. DE FÁBRICA
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">86</div>FECHA DE INSCRIPCION DE FABRICA
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->



                <div class="row form-group">
                    <h4 class="mb-5"> EVALUACION DEL PREDIO CATASTRAL</h4>
                    <label class="form-label d-inline-flex">
                        <div class="divcuadro">87</div>TIPO DE PARTIDA REGISTRAL
                    </label>

                    <div class="col-md-2">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="EN LOTE COLINDANTE">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="EN ÁREA PÚBLICA">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="EN JARDIN  DE AISLAMIENTO">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="EN ÁREA INTANGIBLE">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->




                <div class="row form-group">
                    <label class="form-label d-inline-flex">
                        <div class="divcuadro">89</div>IDENTIFICACION DE LOS LITIGANTES
                    </label>

                    <div class="col-md-2">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="TD">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="N° DOCUMENTO">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <input type="text" class="form-control"
                                placeholder="APELLIDOS Y NOMBRES DE LITIGANTES">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="CÓDIGO DEL CONTRIBUYENTE">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row form-group">

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">89</div>MANTENIMIENTO
                            </label>
                            <input type="text" class="form-control" placeholder="TD">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->


                <div class="row form-group">
                    <h4 class="mb-5"> INFORMACION COMPLEMENTARIA</h4>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">80</div>CONDICION DE DECLARANTE
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">90</div>ESTADO DE LLENADO DE LA FICHA
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">91</div>N° DE HABITANTES
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label d-inline-flex">
                                <div class="divcuadro">92</div>N° DE FAMILIAS
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->

                <div class="row form-group">
                    <h4 class="mb-5"> OBSERVACION</h4>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <input type="textarea" class="form-control">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row form-group">
                    <h4 class="mb-5"> OBSERVACION</h4>
                    <div class="mb-3">
                        <label class="form-label d-inline-flex">
                            <div class="divcuadro">94</div>DECLARANTE
                        </label>
                        <input type="text" class="form-control">

                        <label class="form-label d-inline-flex"> FECHA</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-inline-flex">
                            <div class="divcuadro">94</div>DECLARANTE
                        </label>
                        <input type="text" class="form-control">

                        <label class="form-label d-inline-flex"> FECHA</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-inline-flex">
                            <div class="divcuadro">94</div>DECLARANTE
                        </label>
                        <input type="text" class="form-control">

                        <label class="form-label d-inline-flex"> FECHA</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-inline-flex">
                            <div class="divcuadro">94</div>DECLARANTE
                        </label>
                        <input type="text" class="form-control">

                        <label class="form-label d-inline-flex"> FECHA</label>
                        <input type="text" class="form-control">
                    </div>
                </div><!-- Row -->
            @endif





            <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">
                @if ($actualStep == 1 || $actualStep == 13)
                    <div></div>
                @endif
                @if ($actualStep > 1 && $actualStep <= 12)
                    <button type="button" class="btn btm-md btn-secondary"
                        wire:click="retrocederStep()">Atras</button>
                @endif
                @if ($actualStep <= 12)
                    <button type="button" class="btn btm-md btn-success"
                        wire:click="incrementarStep()">Siguiente</button>
                @endif
                @if ($actualStep == 13)
                    <button type="submit" class="btn btm-md btn-primary">Enviar</button>
                @endif
            </div>
        </div>
    </div>
</div>
