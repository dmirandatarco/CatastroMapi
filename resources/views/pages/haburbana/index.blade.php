@extends('layout.master')
@push('plugin-styles')
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
        <div class="row">
          <h4 class="mb-3">Listado de Habilitaciones Urbanas</h4>
          <div class="mb-5">
            @can('haburbana.create')
            <button type="button" class="btn btn-primary mb-2 mb-md-0 " data-bs-toggle="modal" data-bs-target="#Agregar">
              <i data-feather="user-plus"></i><b> &nbsp; Crear Habilitacion Urbana</b>
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
            <table id="especialidad" class="table">
              <thead>
                <tr >
                  <th>Numero</th>
                  <th style="display: none;">Grupo Urbano</th>
                  <th>Tipo</th>
                  <th>Nombre</th>
                  <th>Codigo</th>
                  <th>Ubigeo</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($haburbanas as $haburbana)
                <tr>
                  <td>{{++$i}}</td>
                  <td style="display: none;">{{$haburbana->grup_urba}}</td>
                  <td>{{$haburbana->tipo_hab_urba}}</td>
                  <td>{{$haburbana->nomb_hab_urba}}</td>
                  <td>{{$haburbana->codi_hab_urba}}</td>
                  <td>{{$haburbana->ubigeo->nomb_ubigeo}}</td>
                  <td>

                    @if($haburbana->estado == "1")
                      Activo
                    @else
                      Desactivo
                    @endif
                  </td>

                  <td>
                    @can('haburbana.edit')
                    <button type="button" class="btn btn-primary btn-icon edit" data-bs-toggle="modal" data-bs-target="#Editar" data-id="{{$haburbana->id_hab_urba}}" data-grup_urba="{{$haburbana->grup_urba}}" data-tipo_hab_urba="{{$haburbana->tipo_hab_urba}}" data-nomb_hab_urba="{{$haburbana->nomb_hab_urba}}" data-codi_hab_urba="{{$haburbana->codi_hab_urba}}">
                      <i data-feather="edit"></i>
                    </button>
                    @endcan
                    @can('haburbana.destroy')
                    <button type="button" class="btn btn-danger btn-icon" data-bs-toggle="modal" data-bs-target="#Eliminar" data-id="{{$haburbana->id_hab_urba}}">
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
        <h5 class="modal-title" >Crear Habilitacion Urbana</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('haburbana.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
        {{csrf_field()}}
          @include('pages.haburbana.form')
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Editar" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Editar Habilitacion Urbana</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('haburbana.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
          {{method_field('patch')}}
          {{csrf_field()}}
          <input type="hidden" name="id_haburbana" class="id_haburbana">
          @include('pages.haburbana.form')
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Eliminar" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Cambiar Estado Habilitacion Urbana</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('haburbana.destroy','test')}}" method="POST" autocomplete="off">
          {{method_field('delete')}}
          {{csrf_field()}}
            <p>Estas seguro de cambiar el estado?</p>
            <div class="modal-footer">
              <input type="hidden" name="id_haburbana_2" class="id_haburbana_2">
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

var editar = document.getElementById('Editar');

editar.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget

  var id = button.getAttribute('data-id')
  var grup_urba = button.getAttribute('data-grup_urba')
  var tipo_hab_urba = button.getAttribute('data-tipo_hab_urba')
  var nomb_hab_urba = button.getAttribute('data-nomb_hab_urba')
  var codi_hab_urba = button.getAttribute('data-codi_hab_urba')

  var idModal = editar.querySelector('.id_haburbana')
  var grup_urbaModal = editar.querySelector('.grup_urba')
  var tipo_hab_urbaModal = editar.querySelector('.tipo_hab_urba')
  var nomb_hab_urbaModal = editar.querySelector('.nomb_hab_urba')
  var codi_hab_urbaModal = editar.querySelector('.codi_hab_urba')

  idModal.value = id;
  grup_urbaModal.value = grup_urba;
  tipo_hab_urbaModal.value = tipo_hab_urba;
  nomb_hab_urbaModal.value = nomb_hab_urba;
  codi_hab_urbaModal.value = codi_hab_urba;
});

var eliminar = document.getElementById('Eliminar');

eliminar.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget

  var id = button.getAttribute('data-id')

  var idModal = eliminar.querySelector('.id_haburbana_2')

  idModal.value = id;
});

$(function() {
  'use strict';

  $(function() {
    $('#especialidad').DataTable({
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
          targets: [7],
          orderable: false
        }
      ]
    });
  });

});


</script>
@endpush
