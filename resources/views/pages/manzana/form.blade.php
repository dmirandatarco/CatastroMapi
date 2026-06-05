<div class="mb-3">
  <label for="recipient-name" class="form-label">Sector:</label>
  <select class="form-select sectore_id" id="id_sector" name="id_sector" data-width="100%">
      <option value="">SELECCIONE</option>
    @foreach($sectores as $sector)
      <option value="{{str_pad($sector->id_sector,8,'0',STR_PAD_LEFT)}}" >{{$sector->nomb_sector}}</option>
    @endforeach
  </select>
  @error('id_sector')
    <span class="error-message" style="color:red">{{ $message }}</span>
  @enderror
</div>
<div class="mb-3">
  <label for="recipient-name" class="form-label">Codigo:</label>
  <input type="text" class="form-control codi_mzna" id="codi_mzna" name="codi_mzna" value="{{old('codi_mzna')}}">
  @error('codi_mzna')
    <span class="error-message" style="color:red">{{ $message }}</span>
  @enderror
</div>
<div class="mb-3">
  <label for="recipient-name" class="form-label">Numero:</label>
  <input type="text" class="form-control nume_mzna" id="nume_mzna" name="nume_mzna" value="{{old('nume_mzna')}}">
  @error('nume_mzna')
    <span class="error-message" style="color:red">{{ $message }}</span>
  @enderror
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
  <button type="submit" class="btn btn-primary">Guardar</button>
</div>
