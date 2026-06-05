<div>
    <div>
        <div class="row form-group">    
            <h4 class="mb-4"> RECAPITULACION DE EDIFICIOS</h4>
            <div class="col-md-12 mb-5">
                <div class="table-responsive">
                    <table id="vias" class="table">
                        <thead>
                            <tr >
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">71</div> EDIFICIO</label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">72</div> PORCENTAJE (%)</label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">57</div> ATC (M2)</label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">58</div> ACC (M2)</label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">59</div> AOIC (M2)</label></th>                                                
                                <th><button type="button" class="btn btn-success btn-icon" wire:click="aumentar">+</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=0;$i<$cont;$i++)
                            <tr >
                                <td>
                                    <input type="text" class="form-control"  name="edificio[]" placeholder="EDIFICIO" id="edificio.{{$i}}"  >
                                    @error('edificio.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="porcentaje[]" placeholder="%" id="porcentaje.{{$i}}"  >
                                    @error('porcentaje.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="date" class="form-control"  name="atc[]" placeholder="FECHA" id="atc.{{$i}}" max="{{ date('Y-m-d') }}">
                                    @error('atc.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="acc[]" placeholder="MEP" id="acc.{{$i}}"  >
                                    @error('acc.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>                                    
                                    <input type="text" class="form-control"  name="aoic[]" placeholder="ECS" id="aoic.{{$i}}">
                                    @error('aoic.'.$i)
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
                                <td>
                                    Total
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="totalporcentaje[]" placeholder="%" id="totalporcentaje.{{$i}}"  >
                                    @error('totalporcentaje.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="date" class="form-control"  name="totalatc[]" placeholder="FECHA" id="totalatc.{{$i}}" max="{{ date('Y-m-d') }}">
                                    @error('totalatc.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="totalacc[]" placeholder="MEP" id="totalacc.{{$i}}"  >
                                    @error('totalacc.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>                                    
                                    <input type="text" class="form-control"  name="totalaoic[]" placeholder="ECS" id="totalaoic.{{$i}}">
                                    @error('totalaoic.'.$i)
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
            <label class="form-label d-inline-flex" > <div class="divcuadro">89</div> ÁREA DE TERRENO INVADIDA EN M2</label>
            <div class="col-md-3 mb-3">
                <label class="form-label d-inline-flex" >LOTE COLINDANTE</label>
                <input type="number" class="form-control" name="lotecolindante" wire:model.lazy="lotecolindante">
                @error('lotecolindante')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>  
            <div class="col-md-3 mb-3">
                <label class="form-label d-inline-flex" > JARDIN AISLAMIENTO</label>
                <input type="text" class="form-control" name="jardinaislamiento" wire:model="jardinaislamiento">
                @error('jardinaislamiento')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>  
            <div class="col-md-3 mb-3">
                <label class="form-label d-inline-flex" > ÁREA PÚBLICA</label>
                <input type="text" class="form-control" name="areapublica" wire:model="areapublica">
                @error('areapublica')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>  
            <div class="col-md-3 mb-3">
                <label class="form-label d-inline-flex" >ÁREA INTANGIBLE</label>
                <input type="text" class="form-control" name="areaintangible" wire:model="areaintangible">
                @error('areaintangible')
                    <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
            </div>  
        </div>

    </div>    
</div>
