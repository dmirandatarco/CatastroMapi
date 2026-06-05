<div class="row form-group">
    <label class="form-label d-inline-flex" > <div class="divcuadro">94</div>DECLARANTE</label>
    <div class="col-md-2 mb-3">
        <label class="form-label d-inline-flex" >DNI</label>
        <input type="number" class="form-control" name="num_documento_declarante" wire:model.lazy="num_documentode_clarante" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="12345678" >
        @error('declarante')
            <span class="error-message" style="color:red">{{ $message }}</span>
        @enderror
    </div>  
    <div class="col-md-2 mb-3">
        <label class="form-label d-inline-flex" > NOMBRES</label>
        <input type="text" class="form-control" name="nombres_declarante" wire:model="nombres_declarante" onkeydown="return /[a-z]/i.test(event.key)">
        @error('fecha_declarante')
            <span class="error-message" style="color:red">{{ $message }}</span>
        @enderror
    </div>  
    <div class="col-md-3 mb-3">
        <label class="form-label d-inline-flex" > APELLIDO PATERNO</label>
        <input type="text" class="form-control" name="apellido_paterno_declarante" wire:model="apellido_paterno_declarante" onkeydown="return /[a-z]/i.test(event.key)">
        @error('fecha_declarante')
            <span class="error-message" style="color:red">{{ $message }}</span>
        @enderror
    </div>  
    <div class="col-md-3 mb-3">
        <label class="form-label d-inline-flex" > APELLIDO MATERNO</label>
        <input type="text" class="form-control" name="apellido_materno_declarante" wire:model="apellido_materno_declarante" onkeydown="return /[a-z]/i.test(event.key)">
        @error('fecha_declarante')
            <span class="error-message" style="color:red">{{ $message }}</span>
        @enderror
    </div>  
    <div class="col-md-2 mb-3">
        <label class="form-label d-inline-flex" > FECHA</label>
        <input type="date" class="form-control" name="fecha_declarante" max="{{ date('Y-m-d') }}">
        @error('fecha_declarante')
            <span class="error-message" style="color:red">{{ $message }}</span>
        @enderror
    </div>  
</div>
