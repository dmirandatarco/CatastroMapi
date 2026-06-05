<div>
    <div>
        <div class="row form-group">    
            <h4 class="mb-4"> RECAPITULACION DE EDIFICIOS</h4>
            <div class="col-md-12 mb-5">
                <div class="table-responsive">
                    <table id="vias" class="table">
                        <thead>
                            <tr >
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">133</div> N°</label></th>
                                <th><label class="form-label d-inline-flex" > EDIFICACION</label></th>
                                <th><label class="form-label d-inline-flex" > ENTRADA</label></th>
                                <th><label class="form-label d-inline-flex" > PISO</label></th>
                                <th><label class="form-label d-inline-flex" > UNIDAD</label></th>   
                                
                                <th><label class="form-label d-inline-flex" ><div class="divcuadro">89</div> %</label></th>
                                <th><label class="form-label d-inline-flex" ><div class="divcuadro">134</div> ATC</label></th>
                                <th><label class="form-label d-inline-flex" ><div class="divcuadro">131</div> ACC</label></th>
                                <th><label class="form-label d-inline-flex" ><div class="divcuadro">132</div> AOIC</label></th>   
                                <th><button type="button" class="btn btn-success btn-icon" wire:click="aumentar">+</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=0;$i<$cont;$i++)
                            <tr >
                                <td>
                                    <input type="text" class="form-control"  name="rbcnro[]" placeholder="N°" id="rbcnro.{{$i}}"  >
                                    @error('rbcnro.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="rbcedificio[]" placeholder="EDIFICACION" id="rbcedificio.{{$i}}"  >
                                    @error('rbcedificio.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="rbcentrada[]" placeholder="ENTRADA" id="rbcentrada.{{$i}}"  >
                                    @error('rbcentrada.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="rbcpiso[]" placeholder="PISO" id="rbcpiso.{{$i}}"  >
                                    @error('rbcpiso.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="rbcunidad[]" placeholder="UNIDAD" id="rbcunidad.{{$i}}"  >
                                    @error('rbcunidad.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="rbcporcentaje[]" placeholder="%" id="rbcporcentaje.{{$i}}"  >
                                    @error('rbcporcentaje.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="date" class="form-control"  name="rbcatc[]" placeholder="FECHA" id="rbcatc.{{$i}}"  max="{{ date('Y-m-d') }}">
                                    @error('rbcatc.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="rbcacc[]" placeholder="MEP" id="rbcacc.{{$i}}"  >
                                    @error('rbcacc.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>                                    
                                    <input type="text" class="form-control"  name="rbcaoic[]" placeholder="ECS" id="rbcaoic.{{$i}}">
                                    @error('rbcaoic.'.$i)
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
                        <tfoot>
                            <tr >
                                <td colspan="5">
                                    Total
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="rbctotalporcentaje[]" placeholder="%" id="rbctotalporcentaje.{{$i}}"  >
                                    @error('rbctotalporcentaje.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="date" class="form-control"  name="rbctotalatc[]" placeholder="FECHA" id="rbctotalatc.{{$i}}"  max="{{ date('Y-m-d') }}">
                                    @error('rbctotalatc.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="rbctotalacc[]" placeholder="MEP" id="rbctotalacc.{{$i}}"  >
                                    @error('rbctotalacc.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>                                    
                                    <input type="text" class="form-control"  name="rbctotalaoic[]" placeholder="ECS" id="rbctotalaoic.{{$i}}">
                                    @error('rbctotalaoic.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>                            
                                <td>
                                    @if($i==$cont-1)
                                        <button type="button" class="btn btn-danger btn-icon" wire:click="reducir">-</button>
                                    @endif
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div><!-- Col -->
        </div><!-- Row --> 
        
        <div class="row form-group">
            <label class="form-label d-inline-flex" > <div class="divcuadro">119</div> MANTENIMIENTO</label>
            <div class="col-md-3 mb-3">
            <select class="form-select"  data-width="100%" data-live-search="true" name="mantenimiento" id="mantenimiento">
                <option value="1" {{ old('mantenimiento') == '1' ? 'selected' : '' }}>SELECCIONE</option>
                <option value="2" {{ old('mantenimiento') == '2' ? 'selected' : '' }}>CONFORMIDAD DE OBRA</option>
                <option value="3" {{ old('mantenimiento') == '3' ? 'selected' : '' }}>LICENCIA DE CONSTRUCCION</option>
                <option value="4" {{ old('mantenimiento') == '4' ? 'selected' : '' }}>DECLARATORIA DE FÁBRICA</option>
            </select>
            @error('mantenimiento')
                <span class="error-message" style="color:red">{{ $message }}</span>
            @enderror
            </div>  
        </div>  
        <div class="row form-group">
        <h4 class="mb-4"> DOCUMENTOS Y DATOS REGISTRALES</h4>
        <label class="form-label d-inline-flex" >REGISTROS NOTARIAL DE LA ESCRITURA PUBLICA</label>

            <div class="col-md-3 mb-3">
                <label class="form-label d-inline-flex" > NOTARIA</label>
                <input type="text" class="form-control" name="rbcnotaria" wire:model="rbcnotaria">
                @error('rbcnotaria')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>  
            <div class="col-md-3 mb-3">
                <label class="form-label d-inline-flex" > KARDEX</label>
                <input type="text" class="form-control" name="rbckardex" wire:model="rbckardex">
                @error('rbckardex')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>  
            <div class="col-md-3 mb-3">
                <label class="form-label d-inline-flex" >FECHA DE ESCRITURA</label>

                <input type="date" class="form-control"  name="rbcfechaesc" placeholder="FECHA" id="rbcfechaesc" max="{{ date('Y-m-d') }}">
                @error('rbcfechaesc')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>  
        </div>

        
        <div class="row form-group">
        <h4 class="mb-4"> INSCRIPCIÓN EN REGISTRO DE PREDIOS</h4>        

            <div class="col-md-3 ">
                <label class="form-label d-inline-flex" > <div class="divcuadro">104</div> TIPO DE PARTIDA REGISTRAL</label>
                <div class="mb-3">
                    <select class="form-select"  data-width="100%" data-live-search="true" name="rbctipopartidaregistral" id="rbctipopartidaregistral">
                        <option value="" {{ old('rbctipopartidaregistral') == '1' ? 'selected' : '' }}>SELECCION</option>
                        <option value="1" {{ old('rbctipopartidaregistral') == '1' ? 'selected' : '' }}>TOMO</option>
                        <option value="2" {{ old('rbctipopartidaregistral') == '2' ? 'selected' : '' }}>FICHAS</option>
                        <option value="3" {{ old('rbctipopartidaregistral') == '3' ? 'selected' : '' }}>PART. ELECTRONICA</option>
                        <option value="4" {{ old('rbctipopartidaregistral') == '4' ? 'selected' : '' }}>CÓDIGO DE PREDIO</option>
                    </select>
                    @error('rbctipopartidaregistral')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div> 
            </div>              
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label d-inline-flex" > <div class="divcuadro">105</div> NUMERO</label>
                    <input type="text" class="form-control" placeholder="" name="rbcnumero">
                    @error('rbcnumero')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div>
            </div><!-- Col -->  
            <div class="col-md-3">
                <div class="mb-3">
                <label class="form-label d-inline-flex" > <div class="divcuadro">106</div>FOJAS</label>
                    <input type="text" class="form-control" placeholder="" name="rbcfojas">
                    @error('rbcfojas')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div>
            </div><!-- Col -->  
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label d-inline-flex" > <div class="divcuadro">107</div> ASIENTO</label>
                    <input type="text" class="form-control" placeholder="" name="rbcasientos">
                    @error('rbcasientos')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div>
            </div><!-- Col -->  
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label d-inline-flex" > <div class="divcuadro">108</div> FECHA DE INSCRIPCION</label>
                    <input type="date" class="form-control"  name="rbcfechainscpredio" placeholder="FECHA" id="rbcfechainscpredio" max="{{ date('Y-m-d') }}">
                    @error('rbcfechainscpredio')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div>
            </div><!-- Col -->  

            <div class="col-md-3">
            <label class="form-label d-inline-flex" > <div class="divcuadro">104</div> TIPO DE PARTIDA REGISTRAL</label>
                <div class="mb-3">
                    <select class="form-select"  data-width="100%" data-live-search="true" name="rbcdeclaratoriafab" id="rbcdeclaratoriafab">
                        <option value="" {{ old('rbcdeclaratoriafab') == '1' ? 'selected' : '' }}>SELECCION</option>
                        <option value="1" {{ old('rbcdeclaratoriafab') == '1' ? 'selected' : '' }}>FAB. INSCRITA</option>
                        <option value="2" {{ old('rbcdeclaratoriafab') == '2' ? 'selected' : '' }}>FAB. NO INSCRITA</option>
                    </select>
                    @error('rbcdeclaratoriafab')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div>  
            </div>  
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label d-inline-flex" > <div class="divcuadro">108</div> AS. INSC. DE FAB.</label>
                    <input type="text" class="form-control" placeholder="" name="rbcasinscfab">
                    @error('rbcasinscfab')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div>
            </div><!-- Col --> 
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label d-inline-flex" > <div class="divcuadro">111</div> FECHA INSC. DE FAB.</label>
                    <input type="date" class="form-control"  name="rbcfechainscfab" placeholder="FECHA" id="rbcfechainscfab" max="{{ date('Y-m-d') }}">
                    @error('rbcfechainscfab')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div>
            </div><!-- Col -->  


            
        </div>

    </div>    
</div>
