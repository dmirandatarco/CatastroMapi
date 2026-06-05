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
            <h4 class="mb-3">Listado de Codigos de Instalacion</h4>
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
                    <th>Codigo de Instalacion</th>
                    <th>Descripcion</th>
                    <th>Material</th>
                    <th>Unidad</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>


                @foreach($tablas as $tabla)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$tabla->codi_instalacion}}</td>
                    <td>{{$tabla->desc_instalacion}}</td>
                    <td>{{$tabla->material}}</td>
                    <td>{{$tabla->unidad}}</td>
                    <td>
                        @can('vias.edit')
                        <button type="button" class="btn btn-primary btn-icon edit" data-bs-toggle="modal" data-bs-target="#Editar" data-codi_instalacion="{{$tabla->codi_instalacion}}" data-desc_instalacion="{{$tabla->desc_instalacion}}" data-material="{{$tabla->material}}" data-unidad="{{$tabla->unidad}}">
                            <i data-feather="edit"></i>
                        </button>
                        @endcan
                        @can('vias.destroy')
                        <button type="button" class="btn btn-danger btn-icon" data-bs-toggle="modal" data-bs-target="#Eliminar" data-codi_instalacion="{{$tabla->codi_instalacion}}">
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
                <form action="{{route('codigoinstalacion.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">               

                {{csrf_field()}}
                <div class="mb-3">
                    <label for="codi_instalacion" class="form-label">Código de Instalación:</label>
                    <input type="text" class="form-control codi_instalacion" id="codi_instalacion" name="codi_instalacion" value="{{ old('codi_instalacion') }}" maxlength="2">
                    @error('codi_instalacion')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                @include('pages.codigoinstalacion.form')
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
                <form action="{{route('codigoinstalacion.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">               
                {{method_field('patch')}}
                {{csrf_field()}}
                <div class="mb-3">
                    <label for="codi_instalacion" class="form-label">Código de Instalación:</label>
                    <input type="text" class="form-control codi_instalacion" id="codi_instalacion" name="codi_instalacion" value="{{ old('codi_instalacion') }}" maxlength="2" readonly>
                    @error('codi_instalacion')
                        <span class="error-message" style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                @include('pages.codigoinstalacion.form')
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
                    <form action="{{route('codigoinstalacion.destroy','test')}}" method="POST" autocomplete="off">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                        <p>Estas seguro de Eliminar definitivamente?</p>
                        <div class="modal-footer">
                        <input type="hidden" name="codi_instalacion2" class="codi_instalacion2">
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
    var codi_instalacion = button.getAttribute('data-codi_instalacion')
    var desc_instalacion = button.getAttribute('data-desc_instalacion')
    var material = button.getAttribute('data-material')
    var unidad = button.getAttribute('data-unidad')

    var codi_instalacionModal = editar.querySelector('.codi_instalacion')
    var desc_instalacionModal = editar.querySelector('.desc_instalacion')
    var materialModal = editar.querySelector('.material')
    var unidadModal = editar.querySelector('.unidad')


    codi_instalacionModal.value = codi_instalacion;
    desc_instalacionModal.value = desc_instalacion;    
    materialModal.value = material;
    unidadModal.value = unidad;
    });
    var eliminar = document.getElementById('Eliminar');
    eliminar.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget
    var codi_instalacion = button.getAttribute('data-codi_instalacion')

    var codi_instalacionModal = eliminar.querySelector('.codi_instalacion2')

    codi_instalacionModal.value = codigo;
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
