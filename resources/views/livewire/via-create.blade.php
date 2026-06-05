<div>
    <div class="row form-group">    
        <div class="col-md-12 mb-5">
            <div class="table-responsive">
                <table id="vias" class="table">
                    <thead>
                        <tr >
                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">5</div> CÓDIGO DE VIA</label></th>
                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">6</div> TIPO DE VIA</label></th>
                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">7</div> NOMBRE DE VIA</label></th>
                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">8</div>PUERTA</label></th>
                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">9</div> N° MUNICIPAL</label></th>                
                            <th><label class="form-label d-inline-flex" > <div class="divcuadro">10</div> COND. NUMER. <button type="button" class="divcuadro" wire:click="aumentar">+</button></label></th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i=0;$i<$cont;$i++)
                        <tr >
                            <td>
                                <div wire:ignore>
                                    <select class="form-select" id="via_id{{$i}}" name="via_id[]" data-width="100%" wire:model="via_id.{{$i}}" data-live-search>
                                        <option value="0">Seleccione</option>
                                        @if($hab_urbana2!="")
                                            @foreach($hab_urbana2->vias as $via)
                                                <option value="{{$via->id}}" {{ old('hab_urbana_id') == $hab_urbana->id ? 'selected' : '' }}>{{$via->codi_via}} {{$via->tipo_via}} {{$via->nomb_via}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>      
                            </td>
                            <td></td>
                            <td></td>
                            <td><input type="text" class="form-control" placeholder=""></td>
                            <td><input type="text" class="form-control" placeholder=""></td>
                            <td><input type="text" class="form-control" placeholder=""></td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div><!-- Col -->
    </div><!-- Row --> 
</div>

@push('custom-scripts')
<script>
    
    document.addEventListener('selects', event=> {
            $('#via_id'+ event.detail.cont2).select2();
            $('#via_id'+ event.detail.cont2).on('change',function(){
                @this.set('via_id.'+event.detail.cont2,this.value);
            });
    });
    document.addEventListener('livewire:load',function(){
        $('#hab_urbana_id').select2();
        $('#hab_urbana_id').on('change',function(){
            @this.set('hab_urbana_id',this.value);
            <?php for($a=0;$a<$cont;$a++){ ?>
                $('#via_id{{$a}}').select2();
                $('#via_id{{$a}}').on('change',function(){
                    @this.set('via_id.{{$a}}',this.value);
                });
            <?php } ?>
            
        });
    })
</script>

@endpush