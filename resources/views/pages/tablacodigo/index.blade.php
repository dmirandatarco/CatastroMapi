@extends('layout.master')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
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
            <div class="row">
            <h4 class="mb-3">Listado de Codigos de tabla</h4>
            {!!Form::open(array('url'=>'mantenimiento/tablacodigo','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}

            <div class="d-flex gap-2">
                <div class="col-md-3">
                    <select class="form-control" id="buscarTabla" name="buscarTabla"  data-live-search="true">
                        <option value="0" {{ $tabla2 == '0' ? 'selected' : '' }} >TODOS</option>
                        @foreach($tablas as $tab)
                            <option value="{{$tab?->id_tabla}}" {{ $tabla2 == $tab?->id_tabla ? 'selected' : '' }} >{{$tab?->id_tabla}} {{$tab?->desc_tabla}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <button type="submit"  id="buscar" class="btn btn-primary"><i data-feather="search"></i> Buscar</button>
                    </div>
                </div>
            </div>
            {{Form::close()}}

            <div class="mb-5">
                @can('vias.create')
                <button type="button" class="btn btn-primary mb-2 mb-md-0 " data-bs-toggle="modal" data-bs-target="#Agregar">
                <i data-feather="user-plus"></i><b> &nbsp; Crear Codigo de tabla</b>
                </button>
                @endcan
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                </div>
            @endif
            <div class="table-responsive">
                <table id="tablacodigo" class="table">
                <thead>
                    <tr >
                    <th>Numero</th>
                    <th>Tabla</th>
                    <th>Codigo</th>
                    <th>Descripcion</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>


                @foreach($tablacodigos as $tablacodigo)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$tablacodigo->id_tabla}}</td>
                    <td>{{$tablacodigo->codigo}}</td>
                    <td>{{$tablacodigo->desc_codigo}}</td>
                    <td>
                        @can('vias.edit')
                        <button type="button" class="btn btn-primary btn-icon edit" data-bs-toggle="modal" data-bs-target="#Editar" data-codigo="{{$tablacodigo->codigo}}" data-id_tabla="{{$tablacodigo->id_tabla}}" data-desc_codigo="{{$tablacodigo->desc_codigo}}">
                            <i data-feather="edit"></i>
                        </button>
                        @endcan
                        @can('vias.destroy')
                        <button type="button" class="btn btn-danger btn-icon" data-bs-toggle="modal" data-bs-target="#Eliminar" data-codigo="{{$tablacodigo->codigo}}" data-id_tabla="{{$tablacodigo->id_tabla}}">
                            <i data-feather="trash-2"></i>
                        </button>
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
    </div>

    <div class="modal fade" id="Agregar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Crear Codigo de Tabla</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('tablacodigo.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}
            @include('pages.tablacodigo.form')
            </form>
        </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="Editar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Editar Codigo de Tabla</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('tablacodigo.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                {{method_field('patch')}}
                {{csrf_field()}}
                @include('pages.tablacodigo.form')
                </form>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Eliminar" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Cambiar Estado </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('tablacodigo.destroy','test')}}" method="POST" autocomplete="off">
            {{method_field('delete')}}
            {{csrf_field()}}
                <p>Estas seguro de Eliminar definitivamente?</p>
                <div class="modal-footer">
                <input type="hidden" name="id_tablacodigos_2" class="id_tablacodigos_2">
                <input type="hidden" name="id_tabla_id_2" class="id_tabla_id_2">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </form>
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
    @if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
    <script>
        $(function() {
            $('#Editar').modal('show');
        });
    </script>
    @else
    @if(count($errors)>0)
    <script>
        $(function() {
            $('#Agregar').modal('show');
        });
    </script>
    @endif
    @endif

<script>
    var agregar = document.getElementById('Agregar');
    var editar = document.getElementById('Editar');
    editar.addEventListener('show.bs.modal', function (event) {

    var button = event.relatedTarget
    var codigo = button.getAttribute('data-codigo');
    var id_tabla = button.getAttribute('data-id_tabla');
    var desc_codigo = button.getAttribute('data-desc_codigo');

    // Selecciona los elementos en el modal
    var codigoModal = editar.querySelector('#codigo');
    var codigo2Modal = editar.querySelector('#codigo2');
    var id_tablaModal = editar.querySelector('#id_tablacodigos');
    var desc_codigoModal = editar.querySelector('#desc_codigo');

    // Asigna el valor de data-codigo a ambos campos
    if (codigoModal) codigoModal.value = codigo;
    if (codigo2Modal) codigo2Modal.value = codigo;

    // Asigna los valores de id_tabla y desc_codigo si existen
    if (id_tablaModal) id_tablaModal.value = id_tabla;
    if (desc_codigoModal) desc_codigoModal.value = desc_codigo;

    });
    var eliminar = document.getElementById('Eliminar');
    eliminar.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget
    var codigo = button.getAttribute('data-codigo')
    var id_tabla = button.getAttribute('data-id_tabla')
    var codigoModal = eliminar.querySelector('.id_tablacodigos_2')
    var id_tablaModal = eliminar.querySelector('.id_tabla_id_2')
    codigoModal.value = codigo;
    id_tablaModal.value = id_tabla;
    });

    $(function() {
    'use strict';

    $(function() {
        $('#tablacodigo').DataTable({
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
