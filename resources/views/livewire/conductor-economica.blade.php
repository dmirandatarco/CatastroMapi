<div>
    <div class="row form-group">
        <h4 class="mb-4"> IDENTIFICACIÓN DEL CONDUCTOR</h4>
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">140</div> TIPO DE CONDUCTOR</label>
                <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_persona" id="tipo_persona">
                    <option value="0" {{ old('tipo_puerta') == '' ? 'selected' : '' }}>SELECCIONE</option>
                    <option value="1" {{ old('tipo_puerta') == '1' ? 'selected' : '' }}>PERSONA NATURAL</option>
                    <option value="2" {{ old('tipo_puerta') == '2' ? 'selected' : '' }}>PERSONA JURIDICA</option>
                </select>
                @error('tipo_persona')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        
        <div class="col-md-8">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">141</div>NOMBRE COMERCIAL</label>
                <input type="text" class="form-control" placeholder="" name="nomb_comercial" id="nomb_comercial">
                @error('nomb_comercial')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">26</div> TIPO DOC. IDENTIDAD</label>
                <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_doc1" id="tipo_doc1" wire:model="tipo_doc1" >
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
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">27</div> N° DOC.</label>
                <input type="text" class="form-control" placeholder="" name="nume_doc1" id="nume_doc1" wire:model.lazy="nume_doc1">
                @error('nume_doc1')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-8 row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label d-inline-flex" > <div class="divcuadro">32</div> NOMBRES</label>
                    <input type="text" class="form-control" placeholder="" name="nombres1" id="nombres1" wire:model="nombres1">
                    @error('nombres1')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div>
            </div><!-- Col -->            
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label d-inline-flex" > <div class="divcuadro">32</div> APELLIDO PATERNO</label>
                    <input type="text" class="form-control" placeholder="" name="ape_paterno1" id="ape_paterno1" wire:model="ape_paterno1">
                    @error('ape_paterno1')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div>
            </div><!-- Col -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label d-inline-flex" > <div class="divcuadro">32</div> APELLIDO MATERNO</label>
                    <input type="text" class="form-control" placeholder="" name="ape_materno1" id="ape_materno1" wire:model="ape_materno1">
                    @error('ape_materno1')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div>
            </div><!-- Col -->
        </div><!-- Col -->
        <div class="col-md-3">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">31</div> Nº DE R.U.C.</label>
                <input type="text" class="form-control" placeholder="" name="nume_doc3" wire:model.lazy="nume_doc3">
                @error('nume_doc3')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-7">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">32</div> RAZON SOCIAL</label>
                <input type="text" class="form-control" placeholder="" name="razon_social" wire:model="razon_social">
                @error('razon_social')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
        <div class="col-md-2">
            <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">142</div> COND. CONDUCTOR</label>
                <select class="form-select"  data-width="100%" data-live-search="true" name="cond_conductor" id="cond_conductor">
                    <option value="0" {{ old('cond_conductor') == '0' ? 'selected' : '' }}>SELECCIONE</option>
                    <option value="01" {{ old('cond_conductor') == '01' ? 'selected' : '' }}>TITULAR CATASTRAL</option>
                    <option value="02" {{ old('cond_conductor') == '02' ? 'selected' : '' }}>ARRENDATARIO</option>
                    <option value="03" {{ old('tipo_puerta') == '03' ? 'selected' : '' }}>CESION EN USO</option>
                    <option value="04" {{ old('tipo_puerta') == '04' ? 'selected' : '' }}>OTROS</option>
                </select>
                @error('cond_conductor')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>
        </div><!-- Col -->
    </div><!-- Row --> 
</div>
