<div>
    <div>
        <div class="row form-group">    
            <h4 class="mb-4"> CONSTRUCCIONES</h4>
            <div class="col-md-12 mb-5">
                <div class="table-responsive">
                    <table id="vias" class="table">
                        <thead>
                            <tr >
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">56</div> N° PISO</label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">57</div> FECHA</label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">58</div> MEP</label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">59</div> ECS</label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">60</div> ECC</label></th>                
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">61</div> MUROS </label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">62</div> TECHOS </label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">63</div> PISOS </label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">64</div> P. Y V. </label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">65</div> REVEST. </label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">66</div> BAÑOS </label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">67</div> INST. E. </label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">68</div> AREA V. </label></th>
                                <th><label class="form-label d-inline-flex" > <div class="divcuadro">69</div> UCA </label></th>
                                <th><button type="button" class="btn btn-success btn-icon" wire:click="aumentar">+</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=0;$i<$cont;$i++)
                            <tr >
                                <td>
                                    <input type="text" class="form-control"  name="nume_piso[]" placeholder="N° piso" id="num_piso.{{$i}}"   maxlength="2">
                                    @error('num_piso.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="date" class="form-control"  name="fecha[]" placeholder="FECHA" id="fecha.{{$i}}" max="{{ date('Y-m-d') }}">
                                    @error('fecha.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control w-65"  name="mep[]" placeholder="MEP" id="mep.{{$i}}"  >
                                    @error('mep.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control w-65"  name="ecs[]" placeholder="ECS" id="ecs.{{$i}}"  >
                                    @error('ecs.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>                                    
                                    <input type="text" class="form-control w-65"  name="ecc[]" placeholder="ECC" id="ecc.{{$i}}" >
                                    @error('ecc.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="estr_muro_col[]" placeholder="MUROS" id="estr_muro_col.{{$i}}"  onkeydown="return /[a-z]/i.test(event.key)" maxlength="1">
                                    @error('estr_muro_col.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror        
                                </td> 
                                <td>
                                    <input type="text" class="form-control"  name="estr_techo[]" placeholder="TECHOS" id="estr_techo.{{$i}}"   onkeydown="return /[a-z]/i.test(event.key)" maxlength="1">
                                    @error('estr_techo.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="acab_piso[]" placeholder="PISOS" id="acab_piso.{{$i}}"  onkeydown="return /[a-z]/i.test(event.key)" maxlength="1">
                                    @error('acab_piso.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>                                    
                                    <input type="text" class="form-control"  name="acab_puerta_ven[]" placeholder="P. Y V." id="acab_puerta_ven.{{$i}}"  onkeydown="return /[a-z]/i.test(event.key)" maxlength="1">
                                    @error('acab_puerta_ven.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="acab_revest[]" placeholder="REVEST." id="acab_revest.{{$i}}"   onkeydown="return /[a-z]/i.test(event.key)" maxlength="1">
                                    @error('acab_revest.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="acab_bano[]" placeholder="BAÑOS" id="acab_bano.{{$i}}"  onkeydown="return /[a-z]/i.test(event.key)" maxlength="1">
                                    @error('acab_bano.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>                                    
                                    <input type="text" class="form-control"  name="inst_elect_sanita[]" placeholder="INST. E." id="inst_elect_sanita.{{$i}}"  onkeydown="return /[a-z]/i.test(event.key)" maxlength="1">
                                    @error('inst_elect_sanita.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>                                    
                                    <input type="text" class="form-control"  name="area_verificada[]" placeholder="AREA VERIFICADA" id="area_verificada.{{$i}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="9" >
                                    @error('area_verificada.'.$i)
                                        <span class="error-message" style="color:red">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" class="form-control"  name="uca[]" placeholder="UCA" id="uca.{{$i}}" >
                                    @error('uca.'.$i)
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
