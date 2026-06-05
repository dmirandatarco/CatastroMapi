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
            {!!Form::open(array('url'=>'reporte/condiciondeclarante','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
            <div class="form-group row">
                <div class="col-md-1" style="padding-top: 10px">
                        <span> <strong> Tipo Ficha </strong></span>
                    <br></br>                              
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <select class="form-control" id="buscarTipo" name="buscarTipo"  data-live-search="true">
                        <option value="0"  {{ $tipoficha2 == '0' ? 'selected' : '' }} >TODOS</option>
                        <option value="01" {{ $tipoficha2 == '01' ? 'selected' : '' }} >INDIVIDUAL</option>
                        <option value="02" {{ $tipoficha2 == '02' ? 'selected' : '' }} >COTITULARIDAD</option>
                        <option value="04" {{ $tipoficha2 == '04' ? 'selected' : '' }} >BIENES COMUNES</option>
                        <option value="03" {{ $tipoficha2 == '03' ? 'selected' : '' }} >ECONOMICA</option>
                        
                    </select>
                        <br>
                    </div>
                </div>


                <div class="col-md-1" style="padding-top: 10px">
                        <span> <strong> Condicion del Declarante </strong></span>
                    <br>                              
                </div>
                <div class="col-md-3">
                    <div class="input-group" id="buscarCondicion">
                        <select class="form-control" id="buscarCondicion" name="buscarCondicion"  data-live-search="true">
                            
                            <option value=""  >SELECCIONE</option>
                            @foreach(\App\Models\TablaCodigo::where('id_tabla','=','CTT')->orderby('codigo','asc')->get() as $tablacodigo)
                                <option value="{{$tablacodigo->codigo}}">{{$tablacodigo->codigo}} {{$tablacodigo->desc_codigo}}</option>
                            @endforeach
                        </select>
                    </div>
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
                <div class="col-md-12 mb-2">
                    <span style="font-size: 20px"><strong style="color:  #6c6c6c;">Total: </strong>{{$numero}}</span>&nbsp;&nbsp;&nbsp;&nbsp;                    
                </div>
            </div>
            <div class="table-responsive ">
                <table class="table" >
                    <thead>
                        <tr>
                            <th>Nº Ficha</th>
                            <th>Sector</th>
                            <th>Manzana</th>
                            <th>Lote</th>
                            <th>Fecha</th>
                            <th>Tipo Ficha</th>
                            <th>Ver Ficha</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
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
                                <td>
                                    @can('pdf.individual')
                                    <a href="{{route('pdf.individual',$ficha)}}" target="_blank">
                                        <button type="button" class="btn btn-success btn-icon " >
                                        <i data-feather="printer"></i>
                                        </button>
                                    </a>
                                    @endcan
                                </td>
                                <td>
                                    @can('ficha.editindividual')
                                    <a href="{{route('ficha.editindividual',$ficha)}}" target="_blank">
                                        <button type="button" class="btn btn-primary btn-icon " >
                                        <i data-feather="edit"></i>
                                        </button>
                                    </a>
                                    @endcan
                                </td>
                                <td>
                                    @can('ficha.destroyindividual')
                                    <a onclick="return confirm('Seguro que desea eliminar la ficha')" href="{{route('ficha.destroyindividual',$ficha)}}" >
                                        <button type="button" class="btn btn-danger btn-icon " >
                                        <i data-feather="trash-2"></i>
                                        </button>
                                    </a>
                                    @endcan
                                </td>
                                
                                
                                @elseif($ficha->tipo_ficha=="02")
                                    COTITULARIDAD
                                </td>
                                <td>
                                    @can('pdf.cotitularidad')
                                    <a href="{{route('pdf.cotitularidad',$ficha)}}" target="_blank">
                                        <button type="button" class="btn btn-success btn-icon " >
                                        <i data-feather="printer"></i>
                                        </button>
                                    </a>
                                    @endcan
                                </td>
                                <td>
                                    @can('ficha.editcotitularidad')
                                    <a href="{{route('ficha.editcotitularidad',$ficha)}}" target="_blank">
                                        <button type="button" class="btn btn-info btn-icon " >
                                        <i data-feather="edit"></i>
                                        </button>
                                    </a>
                                    @endcan
                                </td>
                                <td>
                                    @can('ficha.destroycotitularidad')
                                    <a onclick="return confirm('Seguro que desea eliminar la ficha')" href="{{route('ficha.destroycotitularidad',$ficha)}}" >
                                        <button type="button" class="btn btn-danger btn-icon " >
                                        <i data-feather="trash-2"></i>
                                        </button>
                                    </a>
                                    @endcan
                                </td>
                                @elseif($ficha->tipo_ficha=="04")
                                    BIENES COMUNES
                                </td>
                                <td>
                                    @can('pdf.bienescomunes')
                                    <a href="{{route('pdf.bienescomunes',$ficha)}}" target="_blank">
                                        <button type="button" class="btn btn-success btn-icon " >
                                        <i data-feather="printer"></i>
                                        </button>
                                    </a>
                                    @endcan
                                </td>
                                <td>
                                    @can('ficha.editbiencomun')
                                        <a href="{{route('ficha.editbiencomun',$ficha)}}" target="_blank">
                                            <button type="button" class="btn btn-info btn-icon " >
                                            <i data-feather="edit"></i>
                                            </button>
                                        </a>
                                    @endcan
                                </td>
                                <td>
                                    @can('ficha.destroybiencomun')
                                        <a onclick="return confirm('Seguro que desea eliminar la ficha')"  href="{{route('ficha.destroybiencomun',$ficha)}}" target="_blank">
                                            <button type="button" class="btn btn-danger btn-icon " >
                                                <i data-feather="trash-2"></i>
                                            </button>
                                        </a>
                                    @endcan
                                </td>
                                @elseif($ficha->tipo_ficha=="03")
                                    ECONOMICA
                                </td>
                                <td>
                                    @can('pdf.economica')
                                    <a href="{{route('pdf.economica',$ficha)}}" target="_blank">
                                        <button type="button" class="btn btn-success btn-icon " >
                                        <i data-feather="printer"></i>
                                        </button>
                                    </a>
                                    @endcan
                                </td>
                                <td>
                                    @can('ficha.editeconomica')
                                    <a href="{{route('ficha.editeconomica',$ficha)}}"  target="_blank" >
                                        <button type="button" class="btn btn-info btn-icon " >
                                        <i data-feather="edit"></i>
                                        </button>
                                    </a>
                                    @endcan
                                </td>
                                <td>
                                    @can('ficha.destroyeconomica')
                                    <a onclick="return confirm('Seguro que desea eliminar la ficha')"  href="{{route('ficha.destroyeconomica',$ficha)}}">
                                        <button type="button" class="btn btn-danger btn-icon " >
                                        <i data-feather="trash-2"></i>
                                        </button>
                                    </a>
                                    @endcan
                                </td>
                                @elseif($ficha->tipo_ficha=="05")
                                    BIEN CULTURAL
                                </td>
                                <td>
                                    @can('pdf.bienesculturales')
                                    <a href="{{route('pdf.bienesculturales',$ficha)}}" target="_blank">
                                        <button type="button" class="btn btn-success btn-icon " >
                                        <i data-feather="printer"></i>
                                        </button>
                                    </a>
                                    @endcan
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                @elseif($ficha->tipo_ficha=="06")
                                    RURAL
                                </td>
                                <td>
                                    @can('pdf.rural')
                                    <a href="{{route('pdf.rural',$ficha)}}" target="_blank">
                                        <button type="button" class="btn btn-success btn-icon " >
                                        <i data-feather="printer"></i>
                                        </button>
                                    </a>
                                    @endcan
                                </td>
                                <td>
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
