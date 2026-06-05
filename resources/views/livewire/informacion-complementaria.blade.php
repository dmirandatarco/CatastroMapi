<div>
    <div>
        <div class="row form-group">    
            <h4 class="mb-4"> INFORMACION COMPLEMENTARIA</h4>
            <div class="row form-group">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label d-inline-flex" > <div class="divcuadro">88</div>CONDICIÓN DE DECLARANTE</label>
                        <select class="form-select"  data-width="100%" data-live-search="true" name="cond_declarante" id="cond_declarante">
                            <option value="0" {{ old('cond_declarante') == '0' ? 'selected' : '' }}>SELECCIONE</option>
                            <option value="01" {{ old('cond_declarante') == '01' ? 'selected' : '' }}>TITULAR CATASTRAL</option>
                            <option value="02" {{ old('cond_declarante') == '02' ? 'selected' : '' }}>REPRESENTATE LEGAL</option>
                            <option value="03" {{ old('cond_declarante') == '03' ? 'selected' : '' }}>ARRENDATARIO</option>
                            <option value="04" {{ old('cond_declarante') == '04' ? 'selected' : '' }}>FAMILIAR</option>
                            <option value="05" {{ old('cond_declarante') == '05' ? 'selected' : '' }}>VECINO</option>
                            <option value="06" {{ old('cond_declarante') == '06' ? 'selected' : '' }}>OTROS</option>
                        </select>
                        @error('cond_declarante')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                </div><!-- Col -->            
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label d-inline-flex" > <div class="divcuadro">90</div>ESTADO DE LLENADO DE LA FICHA</label>
                        <select class="form-select"  data-width="100%" data-live-search="true" name="esta_llenado" id="esta_llenado">
                            <option value="0" {{ old('esta_llenado') == '0' ? 'selected' : '' }}>SELECCIONE</option>
                            <option value="1" {{ old('esta_llenado') == '01' ? 'selected' : '' }}>FICHA COMPLETA</option>
                            <option value="2" {{ old('esta_llenado') == '02' ? 'selected' : '' }}>FICHA INCOMPLETA</option>
                            <option value="3" {{ old('esta_llenado') == '03' ? 'selected' : '' }}>COMPLETADA EN OFICINA</option>
                            <option value="4" {{ old('esta_llenado') == '04' ? 'selected' : '' }}>COMPLETADA EN CONTROL EXTERNO</option>
                        </select>
                        @error('esta_llenado')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                </div><!-- Col --> 
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label d-inline-flex" > <div class="divcuadro">91</div>N° DE HABITANTES </label>
                        <input type="text" id="nume_habitantes" class="form-control" name="nume_habitantes" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="3" >
                        @error('nume_habitantes')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                </div><!-- Col -->
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label d-inline-flex" > <div class="divcuadro">92</div>N° DE FAMILIAS</label>
                        <input type="text" id="nume_familias" class="form-control" name="nume_familias" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="3" >
                        @error('nume_familias')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror"
                    </div>
                </div><!-- Col -->
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label d-inline-flex" > <div class="divcuadro">93</div>MANTENIMIENTO</label>
                        <select class="form-select"  data-width="100%" data-live-search="true" name="mantenimiento" id="mantenimiento">
                            <option value="0" {{ old('mantenimiento') == '0' ? 'selected' : '' }}>SELECCIONE</option>
                            <option value="1" {{ old('mantenimiento') == '01' ? 'selected' : '' }}>POR SER PREDIO CATASTRAL NUEVO</option>
                            <option value="2" {{ old('mantenimiento') == '02' ? 'selected' : '' }}>POR VARIACIÓN EN LA CONSTRUCCIÓN</option>
                            <option value="3" {{ old('mantenimiento') == '03' ? 'selected' : '' }}>POR CAMBIO DEL TITULAR CATASTRAL</option>
                            <option value="4" {{ old('mantenimiento') == '04' ? 'selected' : '' }}>POR CAMBIO DE USO</option>
                        </select>
                        @error('mantenimiento')
                            <span class="error-message" style="color:red">{{ $message }}</span>
                        @enderror
                    </div>
                </div><!-- Col --> 
            </div><!-- Row --> 
            <div class="col-md-12 mb-5">
                <div class="mb-3">
                    <label class="form-label d-inline-flex" > <div class="divcuadro">89</div>IDENTIFICACIÓN DE LOS LITIGANTES</label>
                </div>
                <div class="table-responsive">
                    <table id="vias" class="table">
                        <thead>
                            <tr >
                                <th><label class="form-label d-inline-flex" > T. DOCUMENTO</label></th>
                                <th><label class="form-label d-inline-flex" > N° DOCUMENTO</label></th>
                                <th><label class="form-label d-inline-flex" > CÓDIGO DEL CONTRIBUYENTE</label></th>
                                <th><label class="form-label d-inline-flex" > NOMBRES</label></th>
                                <th><label class="form-label d-inline-flex" > APELLIDO PATERNO</label></th>
                                <th><label class="form-label d-inline-flex" > APELLIDO MATERNO</label></th>
                                <th><button type="button" class="btn btn-success btn-icon" wire:click="aumentar">+</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=0;$i<$cont;$i++)
                            <tr >
                                <td>
                                    <select class="form-select"  data-width="100%" data-live-search="true" name="tipo_doc_litigante[]" id="tipo_doc_litigante{{$i}}" wire:model="tipolitigante.{{$i}}" >
                                        <option value="0" {{ old('tipo_doc_litigante.'.$i) == '0' ? 'selected' : '' }}>SELECCIONE</option>
                                        <option value="01" {{ old('tipo_doc_litigante.'.$i) == '01' ? 'selected' : '' }}>NO PRESENTE DOC.</option>
                                        <option value="02" {{ old('tipo_doc_litigante.'.$i) == '02' ? 'selected' : '' }}>DNI</option>
                                        <option value="03" {{ old('tipo_doc_litigante.'.$i) == '03' ? 'selected' : '' }}>CARNET DE IDENTIDAD DE POLICIA NACIONAL</option>
                                        <option value="04" {{ old('tipo_doc_litigante.'.$i) == '04' ? 'selected' : '' }}>CARNET DE IDENTIDAD DE FUERZAS ARMADAS</option>
                                        <option value="05" {{ old('tipo_doc_litigante.'.$i) == '05' ? 'selected' : '' }}>PARTIDA DE NACIMIENTO</option>
                                        <option value="06" {{ old('tipo_doc_litigante.'.$i) == '06' ? 'selected' : '' }}>PASAPORTE</option>
                                        <option value="07" {{ old('tipo_doc_litigante.'.$i) == '07' ? 'selected' : '' }}>CARNET DE EXTRANJERIA</option>
                                        <option value="08" {{ old('tipo_doc_litigante.'.$i) == '08' ? 'selected' : '' }}>OTROS</option>
                                    </select>
                                    @error('tipo_doc_litigante.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="nume_doclitigante[]" placeholder="NUMERO DE DOCUMENTO" id="nume_doc{{$i}}" wire:model.lazy="numedoc.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="17">
                                    @error('nume_doc.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="codi_contribuye[]" placeholder="CÓDIGO DE CONTRIBUYENTE" id="codi_contribuye{{$i}}" wire:model="codi_contribuye.{{$i}}"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  maxlength="18">
                                    @error('codi_contribuye.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td> 
                                <td>
                                    <input type="text" class="form-control"  name="nombreslitigante[]" placeholder="NOMBRES" id="nombres{{$i}}" wire:model="nombres.{{$i}}"  onkeydown="return /[a-z]/i.test(event.key)">
                                    @error('nombres.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="ape_paternolitigante[]" placeholder="APELLIDO PATERNO" id="ape_paterno{{$i}}" wire:model="ape_paterno.{{$i}}"  onkeydown="return /[a-z]/i.test(event.key)">
                                    @error('ape_materno.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="ape_maternolitigante[]" placeholder="APELLIDO MATERNO" id="ape_materno{{$i}}" wire:model="ape_materno.{{$i}}"  onkeydown="return /[a-z]/i.test(event.key)">
                                    @error('ape_paterno.'.$i)
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

