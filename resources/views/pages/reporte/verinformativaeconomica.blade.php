@extends('layout.master')

@section('content')
<div class="row inbox-wrapper">
    <div class="col-md-12">
        <div class="card">
        <div style="text-align-last: right !important;margin: 10px 10px 0px 0px;">
            <button type="button" class="btn btn-success btn-icon printer" onclick="window.print();">
            <i data-feather="printer"></i>
            </button>
        </div>
        <div class="card-body">
            <div class="row">
            <h4 class="mb-3">Buscar Ficha Catastral</h4>
            {!!Form::open(array('url'=>'impresion/verinformativaeconomica','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
            <div class="form-group row">
                <div class="col-md-1" style="padding-top: 10px">
                        <span> <strong> Sector </strong></span>
                    <br>                              
                </div>
                <div class="col-md-2">
                    <div class="input-group" id="buscarFecha">
                        <select class="form-control" id="buscarSector" name="buscarSector"  data-live-search="true">
                            <option value="0" {{ $sector2 == '0' ? 'selected' : '' }} >TODOS</option>
                            @foreach($sectores as $sector)
                                <option value="{{$sector->id_sector}}" {{ $sector2 == $sector->id_sector ? 'selected' : '' }} >{{$sector->nomb_sector}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                </div>
                <div class="col-md-1" style="padding-top: 10px">
                        <span> <strong> Manzana </strong></span>
                    <br>                              
                </div>
                <div class="col-md-2">
                    <select class="form-control" id="buscarManzana" name="buscarManzana"  data-live-search="true">
                        <option value="0" {{ $manzana2 == '0' ? 'selected' : '' }} >TODOS</option>
                    </select>
                    <br>                              
                </div>
                <div class="col-md-1" style="padding-top: 10px">
                        <span> <strong> Nº Ficha </strong></span>
                    <br></br>                              
                </div>
                <div class="col-md-2">
                    <div class="input-group">
                        <input type="text" id="buscarFicha" name="buscarFicha" class="form-control" placeholder="Nº Ficha" value="{{$ficha2}}" maxlength="7" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        <br>
                    </div>
                </div>
                
                <div class="col-md-2 mb-5">
                    <div class="input-group">
                        <button type="submit"  id="buscar" class="btn btn-primary"><i data-feather="search"></i> Buscar</button>
                    </div>
                </div>
            </div>
            
            
            {{Form::close()}}
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                </div>
            @endif
            <div class="table-responsive ">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nº Ficha</th>
                            <th>Sector</th>
                            <th>Manzana</th>
                            <th>Lote</th>
                            <th>Fecha</th>
                            <th>Tipo Ficha</th>
                            <th>Ver Informativa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ficha as $ficha)
                            <tr>
                                <td>{{$ficha->nume_ficha}}</td>
                                <td>{{$ficha->lote->manzana->sectore->nomb_sector}}</td>
                                <td>{{$ficha->lote->manzana->codi_mzna}}</td>
                                <td>{{$ficha?->lote?->codi_lote}}</td>
                                <td>{{date("d/m/Y", strtotime($ficha->fecha_grabado))}}</td>
                                <td>
                                @if($ficha->tipo_ficha==01)
                                    INDIVIDUAL
                                </td>
                                
                                @elseif($ficha->tipo_ficha=="02")
                                    COTITULARIDAD
                                </td>
                                <td>
                                </td>
                                @elseif($ficha->tipo_ficha=="04")
                                    BIENES COMUNES
                                </td>
                                <td>
                                    
                                </td>
                                @elseif($ficha->tipo_ficha=="03")
                                    ECONOMICA
                                </td>
                                <td>
                                    <a href="{{route('pdf.informeeconomico',$ficha)}}" target="_blank">
                                        <button type="button" class="btn btn-dark btn-icon " >
                                        <i data-feather="printer"></i>
                                        </button>
                                    </a>
                                </td>
                                @elseif($ficha->tipo_ficha=="05")
                                    BIEN CULTURAL
                                </td>
                                <td>
                                    
                                </td>
                                @elseif($ficha->tipo_ficha=="06")
                                    RURAL
                                </td>
                                <td>
                                    
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>


@endsection



@push('custom-scripts')
@if($manzana2==0)
    @if($sector2==0)
        <script>

        $("#buscarSector").change(agregarValores);

        function agregarValores(){
            limpiarselect();
            $('#buscarManzana').append("<option value='0' >TODOS</option>");
            <?php foreach ($manzanas as $manzana): ?>
                if('{{$manzana->id_sector}}'==$("#buscarSector option:selected").val()){
                    $('#buscarManzana').append("<option value='{{$manzana->id_mzna}}' >{{$manzana->codi_mzna}}</option>");
                }
            <?php endforeach ?>
        }
        function limpiarselect(){
            $('#buscarManzana').empty();
        }

        </script>
    @else
    <script>
        limpiarselect();
        $('#buscarManzana').append("<option value='0' >TODOS</option>");
        <?php foreach ($manzanas as $manzana): ?>
            if('{{$manzana->id_sector}}'=='{{$sector2}}'){
                $('#buscarManzana').append("<option value='{{$manzana->id_mzna}}' >{{$manzana->codi_mzna}}</option>");
            }
        <?php endforeach ?>

        $('#buscarManzana').val('{{$manzana2}}')
        
        function limpiarselect(){
            $('#buscarManzana').empty();
        }
        $("#buscarSector").change(agregarValores2);
        function agregarValores2(){
            limpiarselect();
            $('#buscarManzana').append("<option value='0' >TODOS</option>");
            <?php foreach ($manzanas as $manzana): ?>
                if('{{$manzana->id_sector}}'==$("#buscarSector option:selected").val()){
                    $('#buscarManzana').append("<option value='{{$manzana->id_mzna}}' >{{$manzana->codi_mzna}}</option>");
                }
            <?php endforeach ?>
        }
    </script>
    @endif
@else
<script>
    limpiarselect();
    $('#buscarManzana').append("<option value='0' >TODOS</option>");
    <?php foreach ($manzanas as $manzana): ?>
        if('{{$manzana->id_sector}}'=='{{$sector2}}'){
            $('#buscarManzana').append("<option value='{{$manzana->id_mzna}}' >{{$manzana->codi_mzna}}</option>");
        }
    <?php endforeach ?>

    $('#buscarManzana').val('{{$manzana2}}')
    
    function limpiarselect(){
        $('#buscarManzana').empty();
    }
    $("#buscarSector").change(agregarValores2);
    function agregarValores2(){
        limpiarselect();
        $('#buscarManzana').append("<option value='0' >TODOS</option>");
        <?php foreach ($manzanas as $manzana): ?>
            if('{{$manzana->id_sector}}'==$("#buscarSector option:selected").val()){
                $('#buscarManzana').append("<option value='{{$manzana->id_mzna}}' >{{$manzana->codi_mzna}}</option>");
            }
        <?php endforeach ?>
    }
</script>

@endif
@endpush
