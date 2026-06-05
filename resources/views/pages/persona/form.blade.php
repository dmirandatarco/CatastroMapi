<div class="mb-3">
  <label for="message-text" class="form-label">Numero de Documento:</label>
  <input type="text" class="form-control nume_doc" id="nume_doc"  name="nume_doc" value="{{old('nume_doc')}}">
  @error('nume_doc')
    <span class="error-message" style="color:red">{{ $message }}</span>
  @enderror
</div>
<div class="mb-3">
  <label for="message-text" class="form-label">Nombres:</label>
  <input type="text" class="form-control nombres" id="nombres"  name="nombres" value="{{old('nombres')}}">
  @error('nombres')
    <span class="error-message" style="color:red">{{ $message }}</span>
  @enderror
</div>
<div class="mb-3">
  <label for="message-text" class="form-label">Apellido paterno:</label>
  <input type="text" class="form-control ape_paterno" id="ape_paterno"  name="ape_paterno" value="{{old('ape_paterno')}}">
  @error('ape_paterno')
    <span class="error-message" style="color:red">{{ $message }}</span>
  @enderror
</div>
<div class="mb-3">
<label for="message-text" class="form-label">Apellido Materno:</label>
  <input type="text" class="form-control ape_materno" id="ape_materno"  name="ape_materno" value="{{old('ape_materno')}}">
  @error('ape_materno')
    <span class="error-message" style="color:red">{{ $message }}</span>
  @enderror
</div>


<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
  <button type="submit" class="btn btn-primary">Guardar</button>
</div>