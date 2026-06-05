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
            {!!Form::open(array('url'=>'fichaanexo','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
            <div class="form-group row">
                <div class="col-md-1" style="padding-top: 10px">
                        <span> <strong> Sector: </strong></span>
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
                        <span> <strong> Manzana: </strong></span>
                    <br>
                </div>
                <div class="col-md-2">
                    <select class="form-control" id="buscarManzana" name="buscarManzana"  data-live-search="true">
                        <option value="0" {{ $manzana2 == '0' ? 'selected' : '' }} >TODOS</option>
                    </select>
                    <br>
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
            <div class="form-group row">

                @php $contador=0;@endphp


            </div>
            <div class="table-responsive ">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Lote</th>
                            <th>CUC</th>
                            <th>Titular Catastral</th>
                            <th>DNI / RUC</th>
                            <th>Ubicacion del Predio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ficha as $ficha)
                            @foreach($ficha->titulars as $titular)

                            @php $contador = $contador + 1 @endphp

                            <tr>
                                <td>{{$ficha->lote->codi_lote}}</td>
                                <td>{{$ficha->lote->cuc}}</td>
                                <td>
                                    @if($titular->persona->tipo_persona == "1")
                                    {{$titular->persona->nombres}} {{$titular->persona->ape_paterno}} {{$titular->persona->ape_materno}}
                                    @elseif($titular->persona->tipo_persona == "2")
                                    {{$titular->persona->razon_social}}
                                    @endif
                                </td>
                                <td>{{$titular->persona->nume_doc}}</td>
                                @if($titular->persona->domiciliotitular($ficha->id_ficha)!="")
                                <td>{{$titular->persona->domiciliotitular($ficha->id_ficha)->tipo_via}} {{$titular->persona->domiciliotitular($ficha->id_ficha)->nomb_via}} {{$titular->persona->domiciliotitular($ficha->id_ficha)->nume_muni}} {{$titular->persona->domiciliotitular($ficha->id_ficha)->nume_interior}}</td>
                                @else
                                <td></td>
                                @endif

                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
                            <div class="col-md-12 mb-2">
                                <span style="font-size: 20px"><strong style="color:  #6c6c6c;">Total: </strong>{{$contador}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                            </td>
                        </tr>

                    </tfoot>
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
