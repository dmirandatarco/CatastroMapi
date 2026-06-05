<div class="mb-3">
    <label for="recipient-name" class="form-label">Codigos de tabla:</label>
    <select class="form-select id_tablacodigos" id="id_tablacodigos" name="id_tablacodigos" data-width="100%">
        <option value="">SELECCIONE</option>
        @foreach($tablas as $i => $desctabla)
            <option value="{{ $desctabla->id_tabla }}" {{ old('id_tablacodigos') == $i ? 'selected' : '' }}>
            {{ $desctabla->id_tabla }} - {{ $desctabla->desc_tabla }}
            </option>
        @endforeach
    </select>
    @error('id_tablacodigos')
        <span class="error-message" style="color:red">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="recipient-name" class="form-label">Codigo:</label>
    <input type="text" class="form-control codigo" id="codigo" name="codigo" value="{{old('codigo')}}">
    <input type="hidden" class="form-control codigo" id="codigo2" name="codigo2" value="{{old('codigo2')}}">
    @error('codigo')
        <span class="error-message" style="color:red">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label for="recipient-name" class="form-label">Descripción:</label>
    <input type="text" class="form-control desc_codigo" id="desc_codigo" name="desc_codigo" value="{{old('desc_codigo')}}">
    @error('desc_codigo')
        <span class="error-message" style="color:red">{{ $message }}</span>
    @enderror
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
