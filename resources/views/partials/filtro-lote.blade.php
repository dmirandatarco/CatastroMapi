<div class="col-md-2 mb-3">
    <label for="buscarLote" class="form-label"><strong>Lote</strong></label>
    <input type="text" class="form-control" id="buscarLote" name="buscarLote" inputmode="numeric" pattern="[0-9]{1,3}" maxlength="3" placeholder="Ej. 004" value="{{ is_string(request('buscarLote')) ? request('buscarLote') : '' }}">
    @error('buscarLote')<div class="text-danger">{{ $message }}</div>@enderror
</div>
