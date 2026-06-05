<div>
    <div class="row form-group mb-3">
        <label class="form-label d-inline-flex" > <div class="divcuadro">125</div> TOTAL DE COTITULARES</label>
        <input type="number" class="form-control" name="total" min="1" placeholder="Nro de cotitular" wire:model="total">
        <span class="text-danger mb-3">@error('total'){{$message}}@enderror</span>
    </div>
    @for($i=0;$i<$total;$i++)
    <div class="row form-group">
    <h4 class="mb-4">DATOS DEL TITULAR CATASTRAL</h4>
        <div class="col-md-2">
            <div class="mb-2">
                <label class="form-label d-inline-flex" > <div class="divcuadro">124</div> NRO. DE COTITULAR</label>
                <input type="text" class="form-control" name="nume_titular[]" readonly placeholder="Nro de cotitular" value="{{$i+1}}" >
                <span class="text-danger">@error('zona_dist'){{$message}}@enderror</span>
            </div>
        </div><!-- Col -->
        <div class="row form-group">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label d-inline-flex" > <div class="divcuadro">140</div> TIPO DE TITULAR</label>
                    <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_persona[]" id="tipo_persona" wire:model="tipoTitular">
                        <option value="0" {{ old('tipo_persona') == '' ? 'selected' : '' }}>SELECCIONE</option>
                        <option value="1" {{ old('tipo_persona') == '1' ? 'selected' : '' }}>PERSONA NATURAL</option>
                        <option value="2" {{ old('tipo_persona') == '2' ? 'selected' : '' }}>PERSONA JURIDICA</option>
                    </select>
                    @error('tipo_persona')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div>
            </div><!-- Col -->
            <div class="col-md-3">
                <div class="mb-2">
                    <label class="form-label d-inline-flex" > <div class="divcuadro">127</div> % DE COTITULAR</label>
                    <input type="text" class="form-control" name="porc_cotitular[]" placeholder="Nro de cotitular"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="9">
                    <span class="text-danger">@error('porc_cotitular'){{$message}}@enderror</span>
                </div>
            </div><!-- Col -->
            <div class="col-md-2">
                <div class="mb-2">
                    <label class="form-label d-inline-flex" > <div class="divcuadro">04</div> COD CONTRIBUYENTE</label>
                    <input type="text" class="form-control" name="codi_contribuyente[]" placeholder="Nro de cotitular" >
                    <span class="text-danger">@error('codi_contribuyente'){{$message}}@enderror</span>
                </div>
            </div><!-- Col -->
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label d-inline-flex" > <div class="divcuadro">37</div> CONDICION DEL TITULAR</label>
                    <select class="form-select"  data-width="100%" data-live-search="true" name="cond_titular[]" id="cond_titular[]" >
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
            @if($tipoTitular==1)
            <div class="col-md-2">
                <div class="mb-3">
                    <label class="form-label d-inline-flex" > <div class="divcuadro">26</div> TIPO DOC. IDENTIDAD</label>
                    <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_doc1[]" id="tipo_doc1" wire:model="tipo_doc1" >
                        <option value="0" {{ old('tipo_doc1') == '0' ? 'selected' : '' }}>SELECCIONE</option>
                        <option value="01" {{ old('tipo_doc1') == '01' ? 'selected' : '' }}>NO PRESENTE DOC.</option>
                        <option value="02" {{ old('tipo_doc1') == '02' ? 'selected' : '' }}>DNI</option>
                        <option value="03" {{ old('tipo_doc1') == '03' ? 'selected' : '' }}>CARNET DE IDENTIDAD DE POLICIA NACIONAL</option>
                        <option value="04" {{ old('tipo_doc1') == '04' ? 'selected' : '' }}>CARNET DE IDENTIDAD DE FUERZAS ARMADAS</option>
                        <option value="05" {{ old('tipo_doc1') == '05' ? 'selected' : '' }}>PARTIDA DE NACIMIENTO</option>
                        <option value="06" {{ old('tipo_doc1') == '06' ? 'selected' : '' }}>PASAPORTE</option>
                        <option value="07" {{ old('tipo_doc1') == '07' ? 'selected' : '' }}>CARNET DE EXTRANJERIA</option>
                        <option value="08" {{ old('tipo_doc1') == '08' ? 'selected' : '' }}>OTROS</option>
                    </select>
                    @error('tipo_doc1')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div>
            </div><!-- Col -->
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label d-inline-flex" > <div class="divcuadro">27</div> N° DOC.</label>
                    <input type="text" class="form-control" placeholder="" name="nume_doc1[]" id="nume_doc1[]" wire:model.lazy="nume_doc1">
                    @error('nume_doc1')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div>
            </div><!-- Col -->
            <div class="col-md-9 row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label d-inline-flex" > <div class="divcuadro">32</div> NOMBRES</label>
                        <input type="text" class="form-control" placeholder="" name="nombres1[]" id="nombres1[]" wire:model="nombres1">
                        @error('nombres1')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                </div><!-- Col -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label d-inline-flex" > <div class="divcuadro">32</div> APELLIDO PATERNO</label>
                        <input type="text" class="form-control" placeholder="" name="ape_paterno1[]" id="ape_paterno1[]" wire:model="ape_paterno1">
                        @error('ape_paterno1')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                </div><!-- Col -->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label d-inline-flex" > <div class="divcuadro">32</div> APELLIDO MATERNO</label>
                        <input type="text" class="form-control" placeholder="" name="ape_materno1[]" id="ape_materno1[]" wire:model="ape_materno1">
                        @error('ape_materno1')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                </div><!-- Col -->
            </div><!-- Col -->
            @endif
            @if($tipoTitular==2)
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label d-inline-flex" > <div class="divcuadro">31</div> Nº DE R.U.C.</label>
                    <input type="text" class="form-control" placeholder="" name="nume_doc3[]" wire:model.lazy="nume_doc3">
                    @error('nume_doc3')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div>
            </div><!-- Col -->
            <div class="col-md-7">
                <div class="mb-3">
                    <label class="form-label d-inline-flex" > <div class="divcuadro">32</div> RAZON SOCIAL</label>
                    <input type="text" class="form-control" placeholder="" name="razon_social[]" wire:model="razon_social" wire:model="razon_social">
                    @error('razon_social')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div>
            </div><!-- Col -->
            @endif
        </div>

        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">38</div> FORMA DE ADQUISICION</label>
                <select class="form-select"  data-width="100%" data-live-search="true" name="form_adquisicion[]" id="form_adquisicion[]" >
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
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">33</div> FECHA DE ADQUISICION</label>
                <input type="date" class="form-control" placeholder="" name="fecha_adquisicion[]" max="{{ date('Y-m-d') }}">
                @error('fecha_adquisicion')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">33</div> COND. ESP. TITULAR</label>
                <input type="text" class="form-control" placeholder="" name="condicion[]">
                @error('condicion')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">33</div> Nº RES. EXONERACION</label>
                <input type="text" class="form-control" placeholder="" name="nume_resolucion[]">
                @error('nume_resolucion')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">33</div> F. DE INICIO</label>
                <input type="date" class="form-control" placeholder="" name="fecha_inicio[]" max="{{ date('Y-m-d') }}">
                @error('fecha_inicio')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">33</div> F. DE VENCIMIENTO</label>
                <input type="date" class="form-control" placeholder="" name="fecha_vencimiento[]" max="{{ date('Y-m-d') }}">
                @error('fecha_vencimiento')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
    </div><!-- Row -->
    <div class="row form-group">
        <h4 class="mb-4"> DOMICILIO FISCAL DEL COTITULAR CATASTRAL</h4>
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">39</div> DEPARTAMENTO</label>
                <input type="text" class="form-control" placeholder=""  name="deparamentoconductor[]">
                @error('deparamentoconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">40</div> PROVINCIA</label>
                <input type="text" class="form-control" placeholder="" name="provinciaconductor[]">
                @error('provinciaconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">41</div> DISTRITO</label>
                <input type="text" class="form-control" placeholder="" name="distritoconductor[]">
                @error('distritoconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">42</div> TELÉFONO</label>
                <input type="text" class="form-control" placeholder=""  name="telefonoconductor[]">
                @error('telefonoconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-1">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">43</div> ANEXO</label>
                <input type="text" class="form-control" placeholder=""  name="anexoconductor[]">
                @error('anexoconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-1">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">44</div> FAX</label>
                <input type="text" class="form-control" placeholder="" name="faxconductor[]">
                @error('faxconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">45</div> EMAIL</label>
                <input type="text" class="form-control" placeholder="" name="emailconductor[]">
                @error('emailconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
    </div><!-- Row -->
    <div class="row form-group">
        <div class="col-md-1">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">7</div> C. VIA</label>
                <input type="text" class="form-control" placeholder="" name="codigoviaconductor[]">
                @error('codigoviaconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-1">
            <div class="mb-">
                <label class="form-label d-inline-flex" > <div class="divcuadro">8</div> T. VIA</label>
                <input type="text" class="form-control" placeholder="" name="tipoviaconductor[]">
                @error('tipoviaconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">9</div> NOMBRE DE VIA</label>
                <input type="text" class="form-control" placeholder="" name="nombreviaconductor[]">
                @error('nombreviaconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">10</div> N° MUNICIPAL</label>
                <input type="text" class="form-control" placeholder="" name="nmunicipalconductor[]">
                @error('nmunicipalconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">14</div> NOMB. EDIFICACION</label>
                <input type="text" class="form-control" placeholder="" name="nomb_edificacionconductor[]">
                @error('nomb_edificacionconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">17</div> N. INTERIOR</label>
                <input type="text" class="form-control" placeholder="" name="ninteriorconductor[]">
                @error('ninteriorconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
    </div><!-- Row -->
    <div class="row form-group">
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">18</div> CÓDIGO URBANO</label>
                <input type="text" class="form-control" placeholder="" name="codigohurbanoconductor[]">
                @error('codigohurbanoconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-3">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">19</div> NOMBRE DE LA HABILITACIÓN URBANA</label>
                <input type="text" class="form-control" placeholder="" name="nombrehhurbanaconductor[]">
                @error('nombrehhurbanaconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-2">
                <label class="form-label d-inline-flex" > <div class="divcuadro">20</div> ZONA/SECTOR/ETAPA</label>
                <input type="text" class="form-control" placeholder="" name="zonaconductor[]">
                @error('zonaconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">21</div> MANZANA</label>
                <input type="text" class="form-control" placeholder="" name="manzanaconductor[]">
                @error('manzanaconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-1">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">22</div> LOTE</label>
                <input type="text" class="form-control" placeholder="" name="loteconductor[]">
                @error('loteconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">23</div> SUB-LOTE</label>
                <input type="text" class="form-control" placeholder="" name="subloteconductor[]">
                @error('subloteconductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
    </div><!-- Row -->
    @endfor
</div>

