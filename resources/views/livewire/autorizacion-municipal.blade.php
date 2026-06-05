<div class="col-md-5 mb-5">
    <div class="table-responsive">
        <table id="vias" class="table">
            <thead>
                <tr >
                    <th><label class="form-label d-inline-flex" > <div class="divcuadro">143</div>COD. ACTIVIDAD</label></th>
                    <th><button type="button" class="btn btn-success btn-icon" wire:click="aumentar">+</button></th>
                </tr>
            </thead>
            <tbody>
                @for($i=0;$i<$cont;$i++)
                <tr >
                    <td>
                        <select class="form-select"  data-width="100%" data-live-search="true" name="codi_actividad[]" id="codi_actividad.{{$i}}">
                            <option value="0" {{ old('codi_actividad.'.$i) == '0' ? 'selected' : '' }}>SELECCIONE</option>
                            @foreach($actividades as $actividad)
                                <option value="{{$actividad->codi_actividad}}" {{ old('codi_actividad.'.$i) == '0' ? 'selected' : '' }}>{{$actividad->codi_actividad}} {{$actividad->desc_actividad}}</option>
                            @endforeach
                        </select>
                        @error('codi_actividad.'.$i)
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        @if($i==$cont-1)
                            <button type="button" class="btn btn-danger btn-icon" wire:click="reducir">-</button>
                        @endif
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div><!-- Col -->

