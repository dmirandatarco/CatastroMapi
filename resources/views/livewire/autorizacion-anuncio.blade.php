<div>
    <div class="row form-group">    
        <h4 class="mb-4"> AUTORIZACIÓN DE ANUNCIO</h4>
        <div class="col-md-12 mb-5">
            <div class="table-responsive">
                <table id="vias" class="table" style="font-size:10px;">
                    <thead>
                        <tr >
                            <th style="width:10px"><label class="form-label d-inline-flex" > <div class="divcuadro">152</div>CÓD. TIPO ANUNCIO</label></th>
                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">153</div>DESCRIPCION</label></th>
                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">154</div>Nº LADOS</label></th>
                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">155</div>AREA AUTORIZADA DEL ANUNCIO (M2)</label></th>
                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">156</div>AREA VERIFICADA DEL ANUNCIO (M2)</label></th>
                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">157</div>Nº EXPEDIENTE</label></th>
                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">158</div>Nº LICENCIA</label></th>
                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">159</div>F. EXPEDICION</label></th>
                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">160</div>Fº VENCIMIENTO</label></th>
                            <th><button type="button" class="btn btn-success btn-icon" wire:click="aumentar">+</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i=0;$i<$cont;$i++)
                        <tr >
                            <td>
                                <input  type="text" class="form-control" name="codi_anuncio[]" id="codi_anuncio.{{$i}}">
                                @error('codi_anuncio.'.$i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </td>
                            <td>
                                <input  type="text" class="form-control" name="descripcion[]" id="descripcion.{{$i}}">
                                @error('descripcion.'.$i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </td>
                            <td>
                                <input  type="text" class="form-control" name="nume_lados[]" id="nume_lados.{{$i}}">
                                @error('nume_lados.'.$i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </td>
                            <td>
                                <input  type="text" class="form-control" name="area_autorizada[]" id="area_autorizada.{{$i}}">
                                @error('area_autorizada.'.$i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </td>
                            <td>
                                <input  type="text" class="form-control" name="area_verificada[]" id="area_verificada.{{$i}}">
                                @error('area_verificada.'.$i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </td>
                            <td>
                                <input  type="text" class="form-control" name="nume_expediente1[]" id="nume_expediente1.{{$i}}">
                                @error('nume_expediente.'.$i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </td>
                            <td>
                                <input  type="text" class="form-control" name="nume_licencia1[]" id="nume_licencia1.{{$i}}">
                                @error('nume_licencia.'.$i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </td>
                            <td>
                                <input type="date" class="form-control" name="fecha_expedicion1[]" id="fecha_expedicion1.{{$i}}" max="{{ date('Y-m-d') }}">
                                @error('fecha_expedicion.'.$i)
                                    <span class="error-message" style="color:red">{{ $message }}</span>
                                @enderror
                            </td>
                            <td>
                                <input type="date" class="form-control" name="fecha_vencimiento1[]" id="fecha_vencimiento1.{{$i}}" max="{{ date('Y-m-d') }}">
                                @error('fecha_vencimiento.'.$i)
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

