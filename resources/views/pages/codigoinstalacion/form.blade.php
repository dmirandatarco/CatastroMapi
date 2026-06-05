
<div class="mb-3">
    <label for="desc_instalacion" class="form-label">Descripción:</label>
    <input type="text" class="form-control desc_instalacion" id="desc_instalacion" name="desc_instalacion" value="{{ old('desc_instalacion') }}" maxlength="50">
    @error('desc_instalacion')
        <span class="error-message" style="color:red">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="material" class="form-label">Material:</label>
    <input type="text" class="form-control material" id="material" name="material" value="{{ old('material') }}" maxlength="50">
    @error('material')
        <span class="error-message" style="color:red">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="unidad" class="form-label">Unidad:</label>
    <input type="text" class="form-control unidad" id="unidad" name="unidad" value="{{ old('unidad') }}" maxlength="30">
    @error('unidad')
        <span class="error-message" style="color:red">{{ $message }}</span>
    @enderror
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
