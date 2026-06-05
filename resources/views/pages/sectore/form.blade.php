<div class="mb-3">
    <label for="recipient-name" class="form-label">Codigo de Sector: <span class="" style="color: #b5b3b3; font-size:11px;font-weight:bold;">Ej. "01"</span></label>
    <input type="text" class="form-control codi_sector" id="codi_sector" name="codi_sector" value="{{str_pad($ultimo,2,'0',STR_PAD_LEFT)}}" >
    @error('codi_sector')
        <span class="error-message" style="color:red">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="recipient-name" class="form-label">Nombre de Sector:<span class="" style="color: #b5b3b3; font-size:11px;font-weight:bold;">Ej. "SECTOR 01"</span></label>
    <input type="text" class="form-control nomb_sector" id="nomb_sector" name="nomb_sector" value="{{old('nomb_sector')}}">
    @error('nomb_sector')
        <span class="error-message" style="color:red">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="recipient-name" class="form-label">Fichas Individuales:</label>
    <input type="text" class="form-control fichaindividual" id="fichaindividual" name="fichaindividual" value="{{old('fichaindividual')}}">
    @error('fichaindividual')
        <span class="error-message" style="color:red">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="recipient-name" class="form-label">Fichas Cotitulares:</label>
    <input type="text" class="form-control fichacotitular" id="fichacotitular" name="fichacotitular" value="{{old('fichacotitular')}}">
    @error('fichacotitular')
        <span class="error-message" style="color:red">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="recipient-name" class="form-label">Fichas Economicas:</label>
    <input type="text" class="form-control fichaeconomica" id="fichaeconomica" name="fichaeconomica" value="{{old('fichaeconomica')}}">
    @error('fichaeconomica')
        <span class="error-message" style="color:red">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="recipient-name" class="form-label">Fichas de Bien comun:</label>
    <input type="text" class="form-control fichabiencomun" id="fichabiencomun" name="fichabiencomun" value="{{old('fichabiencomun')}}">
    @error('fichabiencomun')
        <span class="error-message" style="color:red">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="recipient-name" class="form-label">Fichas de Bien Cultural:</label>
    <input type="text" class="form-control fichacultural" id="fichacultural" name="fichacultural" value="{{old('fichacultural')}}">
    @error('fichacultural')
        <span class="error-message" style="color:red">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="recipient-name" class="form-label">Fichas Rurales:</label>
    <input type="text" class="form-control ficharural" id="ficharural" name="ficharural" value="{{old('ficharural')}}">
    @error('ficharural')
        <span class="error-message" style="color:red">{{ $message }}</span>
    @enderror
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
