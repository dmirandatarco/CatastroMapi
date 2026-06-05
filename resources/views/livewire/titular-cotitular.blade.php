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
            <input type="text" class="form-control" name="porc_cotitular[]" placeholder="Nro de cotitular" > 
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
