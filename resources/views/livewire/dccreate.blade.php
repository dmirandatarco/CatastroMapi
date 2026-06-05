<div class="row row3 mb-3" style="place-content: center;text-align: center;">
    <div class="col-md-3 row">
        <div class="col-md-4 mb-3">
            <label class="form-label labelpeque" >DPTO.</label>
            <input type="number" class="form-control" name="dpto" readonly wire:model="dpto">
            @error('dpto')
                <span class="error-message" style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label labelpeque" >PROV.</label>
            <input type="number" class="form-control" name="prov" readonly wire:model="prov">
            @error('prov')
                <span class="error-message" style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-4 mb-3">
            <label class="form-label labelpeque" >DIST.</label>
            <input type="number" class="form-control" name="dist" readonly wire:model="dist">
            @error('dist')
                <span class="error-message" style="color:red">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-3 row">
        <div class="col-md-6 mb-3">
            <label class="form-label labelpeque d-inline-flex" >SECTOR</label>
            <select class="form-select " name="sector" wire:model="sector">
                <option value="">SELECCIONE</option>
                @foreach($sectores as $sector)
                    <option value="{{$sector->codi_sector}}">{{$sector->nomb_sector}}</option>
                @endforeach
            </select>
            @error('sector')
                <span class="error-message" style="color:red">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label labelpeque d-inline-flex" >MZNA</label>
            <select class="form-select" name="mzna" wire:model="mzna">
                <option value="">SELECCIONE</option>
                @foreach($manzanas as $manzana)
                    <option value="{{$manzana->codi_mzna}}">{{$manzana->codi_mzna}}</option>
                @endforeach
            </select>
            @error('mzna')
                <span class="error-message" style="color:red">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-1">
        <div class="mb-3">
            <label class="form-label labelpeque d-inline-flex" >LOTE</label>
            <input type="text" class="form-control" placeholder="" name="lote" wire:model="lote" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="3">
            @error('lote')
                <span class="error-message" style="color:red">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-1">
        <div class="mb-3">
            <label class="form-label labelpeque d-inline-flex" >EDIFICA</label>
            <input type="text" class="form-control" placeholder="" name="edifica" wire:model="edifica" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="2">
            @error('edifica')
                <span class="error-message" style="color:red">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-1">
        <div class="mb-3">
            <label class="form-label labelpeque d-inline-flex" >ENTRADA</label>
            <input type="text" class="form-control" placeholder="" name="entrada" wire:model="entrada" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="2">
            @error('entrada')
                <span class="error-message" style="color:red">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-1">
        <div class="mb-3">
            <label class="form-label labelpeque d-inline-flex" >PISO</label>
            <input type="text" class="form-control" placeholder="" name="piso" wire:model="piso"  x-data="{ piso: '{{$piso}}' }" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="2">
            @error('piso')
                <span class="error-message" style="color:red">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-1">
        <div class="mb-3">
            <label class="form-label labelpeque d-inline-flex" >UNIDAD</label>
            <input type="text" class="form-control" placeholder="" name="unidad" wire:model="unidad" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="3">
            @error('unidad')
                <span class="error-message" style="color:red">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-1">
        <div class="mb-3">
            <label class="form-label labelpeque d-inline-flex" >DC</label>
            <input type="number" class="form-control" readonly placeholder="" name="dc" wire:model="dc">
            @error('dc')
                <span class="error-message" style="color:red">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>