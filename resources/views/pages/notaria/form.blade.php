<div class="mb-3">
  <label for="recipient-name" class="form-label">Codigo de Notaria:</label>
  <input type="text" class="form-control codi_notaria" id="codi_notaria" name="codi_notaria" value="{{$ultimo}}" readonly>
  @error('codi_notaria')
    <span class="error-message" style="color:red">{{ $message }}</span>
  @enderror
</div>
<div class="mb-3">
  <label for="recipient-name" class="form-label">Nombre de Notaria:</label>
  <input type="text" class="form-control nomb_notaria" id="nomb_notaria" name="nomb_notaria" value="{{old('nomb_notaria')}}">
  @error('nomb_notaria')
    <span class="error-message" style="color:red">{{ $message }}</span>
  @enderror
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
  <button type="submit" class="btn btn-primary">Guardar</button>
</div>
