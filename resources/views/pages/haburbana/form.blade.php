<div class="mb-3" style="display: none;">
  <label for="recipient-name" class="form-label">Grupo Urbano:</label>
  <input type="text" class="form-control grup_urba" id="grup_urba" name="grup_urba" value="{{old('grup_urba')}}">
  @error('grup_urba')
    <span class="error-message" style="color:red">{{ $message }}</span>
  @enderror
</div>
<div class="mb-3">
  <label for="recipient-name" class="form-label">Tipo Habilitacion Urbana:</label>
  <select class="form-select tipo_hab_urba" id="tipo_hab_urba" name="tipo_hab_urba" data-width="100%">
      @foreach($codigos as $codigo)
        <option value="{{$codigo->codigo}}">{{$codigo->codigo}} {{$codigo->desc_codigo}}</option>
      @endforeach
  </select>

  @error('tipo_hab_urba')
    <span class="error-message" style="color:red">{{ $message }}</span>
  @enderror

</div>


<div class="mb-3">
  <label for="recipient-name" class="form-label">Nombre:</label>
  <input type="text" class="form-control nomb_hab_urba" id="nomb_hab_urba" name="nomb_hab_urba" value="{{old('nomb_hab_urba')}}">
  @error('nomb_hab_urba')
    <span class="error-message" style="color:red">{{ $message }}</span>
  @enderror
</div>
<div class="mb-3">
  <label for="recipient-name" class="form-label">Codigo:</label>
  <input type="text" class="form-control codi_hab_urba" id="codi_hab_urba" name="codi_hab_urba" value="{{old('codi_hab_urba')}}">
  @error('codi_hab_urba')
    <span class="error-message" style="color:red">{{ $message }}</span>
  @enderror
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
  <button type="submit" class="btn btn-primary">Guardar</button>
</div>
