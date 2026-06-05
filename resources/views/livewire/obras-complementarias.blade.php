<div>
    <div>
        <div class="row form-group">    
            <h4 class="mb-4"> OBRAS COMPLEMENTARIAS / OTRAS INSTALACIONES</h4>
            <div class="col-md-12 mb-5">
                <div class="table-responsive">
                    <table id="vias" class="table">
                        <thead>
                            <tr >
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">71</div> CÓDIGO</label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">72</div> DESCRIPCIÓN</label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">57</div> FECHA</label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">58</div> MEP</label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">59</div> ECS</label></th>                
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">60</div> ECC </label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">73</div> PRODUCTO TOTAL </label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">74</div> U. MEDIDA </label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">69</div> UCA </label></th>
                                <th><button type="button" class="btn btn-success btn-icon" wire:click="aumentar">+</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=0;$i<$cont;$i++)
                            <tr >
                                <td>
                                    <input type="text" class="form-control"  name="codi_instalacion[]" placeholder="CÓDIGO" id="codi_instalacion.{{$i}}" maxlength="2" >
                                    @error('codi_instalacion.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="descripcion[]" placeholder="DESCRIPCIÓN" id="descripcion.{{$i}}"  >
                                    @error('descripcion.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="date" class="form-control"  name="inst_fecha[]" placeholder="FECHA" id="inst-fecha.{{$i}}"  max="{{ date('Y-m-d') }}">
                                    @error('inst-fecha.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control w-65"  name="inst_mep[]" placeholder="MEP" id="inst-mep.{{$i}}"  >
                                    @error('inst-mep.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>                                    
                                    <input type="text" class="form-control w-65"  name="inst_ecs[]" placeholder="ECS" id="inst-ecs.{{$i}}">
                                    @error('inst-ecs.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control w-65"  name="inst_ecc[]" placeholder="ECC" id="inst-ecc.{{$i}}"  >
                                    @error('inst-ecc.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror        
                                </td> 
                                <td>
                                    <input type="text" class="form-control"  name="inst_prod_total[]" placeholder="PRODUCTO TOTAL" id="inst-prod_total.{{$i}}"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="9">
                                    @error('inst-prod_total.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="inst_uni_med[]" placeholder="U. MEDIDA" id="inst-uni_med.{{$i}}" maxlength="2" >
                                    @error('inst-uni_med.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="inst_uca[]" placeholder="UCA" id="inst-uca.{{$i}}"  >
                                    @error('inst-uca.'.$i)
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
