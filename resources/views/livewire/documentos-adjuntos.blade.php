<div>
    <div>
        <div class="row form-group">    
            <h4 class="mb-4"> DOCUMENTOS</h4>
            <div class="col-md-12 mb-5">
                <div class="table-responsive">
                    <table id="vias" class="table">
                        <thead>
                            <tr >
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">75</div>TIPO DOC.</label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">76</div>N° DE DOCUMENTO</label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">77</div>FECHA</label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">78</div>AREA AUTORIZADA</label></th>
                                <th><button type="button" class="btn btn-success btn-icon" wire:click="aumentar">+</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=0;$i<$cont;$i++)
                            <tr >
                                <td>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_doc[]" id="tipo_doc.{{$i}}">
                                        <option value="0" {{ old('tipo_doc') == '0' ? 'selected' : '' }}>SELECCIONE</option>
                                        <option value="01" {{ old('tipo_doc') == '01' ? 'selected' : '' }}>CONFORMIDAD DE OBRA</option>
                                        <option value="02" {{ old('tipo_doc') == '02' ? 'selected' : '' }}>LICENCIA DE CONSTRUCCION</option>
                                        <option value="03" {{ old('tipo_doc') == '03' ? 'selected' : '' }}>DECLARATORIA DE FÁBRICA</option>
                                        <option value="04" {{ old('tipo_doc') == '04' ? 'selected' : '' }}>DECLARACIÓN JURADA AUTOAVALÚD</option>
                                        <option value="05" {{ old('tipo_doc') == '05' ? 'selected' : '' }}>RESOLUCIÓN DE EXONERACIÓN</option>
                                        <option value="06" {{ old('tipo_doc') == '06' ? 'selected' : '' }}>PODERES</option>
                                        <option value="07" {{ old('tipo_doc') == '07' ? 'selected' : '' }}>ESCRITURA PUBLICA</option>
                                        <option value="08" {{ old('tipo_doc') == '08' ? 'selected' : '' }}>MINUTA COMPRA VENTA</option>
                                        <option value="09" {{ old('tipo_doc') == '09' ? 'selected' : '' }}>DOC. PRIVADO DE TRANSFERENCIA</option>
                                        <option value="10" {{ old('tipo_doc') == '10' ? 'selected' : '' }}>CONSTANCIA DE POSESIÓN</option>
                                        <option value="11" {{ old('tipo_doc') == '11' ? 'selected' : '' }}>PARTIDA DE DEFUNCIÓN</option>
                                        <option value="12" {{ old('tipo_doc') == '12' ? 'selected' : '' }}>CERTIFICADO CATASTRAL</option>
                                        <option value="13" {{ old('tipo_doc') == '13' ? 'selected' : '' }}>HOJA INFORMATIVA CATASTRAL</option>
                                        <option value="14" {{ old('tipo_doc') == '14' ? 'selected' : '' }}>PARTIDA DE NACIMIENTO</option>
                                    </select>
                                    @error('tipo_doc.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="nume_doc[]" placeholder="N° DE DOCUMENTO" id="nume_doc.{{$i}}"  maxlength="20">
                                    @error('nume_doc.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="date" class="form-control"  name="fecha_doc[]" placeholder="FECHA" id="fecha_doc.{{$i}}" max="{{ date('Y-m-d') }}" >
                                    @error('fecha_doc.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="area_autorizada[]" placeholder="AREA AUTORIZADA" id="area_autorizada.{{$i}}"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="7" >
                                    @error('area_autorizada.'.$i)
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
        </div><!-- Row --> 
    </div>    
</div>

