@extends('layout.master')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

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
                <div class="row mb-3">
                    <h4 class="mb-3">Reporte por tipo de actividad economica</h4>
                    {!!Form::open(array('url'=>'reporte/actividadeconomica','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                    <div class="form-group row">

                        <div class="col-md-5">
                            <select class="form-control" id="buscarActividad" name="buscarActividad"  data-live-search="true">
                                <option value="0" {{ $actividad2 == '0' ? 'selected' : '' }} >TODOS</option>
                                @foreach($actividades as $actividad)
                                    <option value="{{$actividad->codi_actividad}}" {{ $actividad2 == $actividad->codi_actividad ? 'selected' : '' }} >{{$actividad->desc_actividad}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
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
                        <div class="col-md-4">
                            <button type="submit"  id="buscar" class="btn btn-primary"><i data-feather="search"></i> Buscar</button>
                        </div>


                    </div>
                    {{Form::close()}}
                </div>

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
                    <table class="table" id="tablareporte">
                        <thead>
                            <tr>
                                <th>Nº Ficha</th>
                                <th>Sector</th>
                                <th>Manzana</th>
                                <th>Lote</th>
                                <th>Fecha</th>
                                <th>Tipo Ficha</th>
                                <th>Ver Ficha</th>
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
                                <td>ECONOMICA</td>
                                <td>
                                    @can('pdf.economica')
                                    <a href="{{route('pdf.economica',$ficha)}}" target="_blank">
                                        <button type="button" class="btn btn-success btn-icon " >
                                        <i data-feather="printer"></i>
                                        </button>
                                    </a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection



@push('plugin-scripts')
    
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endpush

@push('custom-scripts')

<script>
$('#buscarActividad').select2();
</script>
<script>
    $(function() {
    'use strict';

    $(function() {
        $('#tablareporte').DataTable({
        "aLengthMenu": [
            [10, 30, 50, -1],
            [10, 30, 50, "All"]
        ],
        "language": {
            "lengthMenu": "Mostrar  _MENU_  registros por paginas",
            "zeroRecords": "Nada encontrado - disculpa",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles.",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate":{
            "next": "Siguiente",
            "previous": "Anterior",
            }
        },
        "columnDefs": [
            {
            targets: [4],
            orderable: false
            }
        ]
        });
    });

});
</script>
@endpush
