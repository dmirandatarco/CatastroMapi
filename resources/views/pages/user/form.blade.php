<div class="mb-3">
  <label for="recipient-name" class="form-label">Nombre:</label>
  <input type="text" class="form-control nombre" id="nombre" name="nombre" value="{{old('nombre')}}">
  @error('nombre')
    <span class="error-message" style="color:red">{{ $message }}</span>
  @enderror
</div>
<div class="mb-3">
  <label for="message-text" class="form-label">Usuario:</label>
  <input type="text" class="form-control usuario" id="usuario"  name="usuario" value="{{old('usuario')}}">
  @error('usuario')
    <span class="error-message" style="color:red">{{ $message }}</span>
  @enderror
</div>
<div class="mb-3">
  <label for="message-text" class="form-label">Password:</label>
  <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
  @error('password')
    <span class="error-message" style="color:red">{{ $message }}</span>
  @enderror
</div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
  <button type="submit" class="btn btn-primary">Guardar</button>
</div>