@extends('layout.master')
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush
@section('content')
<div class="row inbox-wrapper">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
            <div class="mb-3">
              <img class="wd-250 ht-250 rounded-circle" src="{{asset('storage/img/usuario/'.$user->imagen)}}" alt="" style="height: 250px;">                            
            </div>
            <div class="text-center">
              <p class="tx-16 fw-bolder">{{$user->nombres}} {{$user->ape_paterno}} {{$user->ape_materno}}</p>
              <p class="tx-12 text-muted"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <h4 class="mb-3">Perfil de Usuario</h4>
          <form class="forms-sample">            
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="tipoDocumento" class="form-label">Tipo de Documento</label>
                <input type="text" class="form-control" value="{{$user->codi_usuario}}" disabled>
              </div>
              <div class="mb-3 col-md-6">
                <label for="nroDocumento" class="form-label">Email</label>
                <input type="text" class="form-control" value="{{$user->email}}" disabled>
              </div>
            </div>
            <div class="row">
              <div class="mb-3 col-md-4">
                <label for="nombres" class="form-label">Nombre</label>
                <input type="text" class="form-control" value="{{$user->nombres}}" disabled>
              </div>
              <div class="mb-3 col-md-4">
                <label for="aPaterno" class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control" value="{{$user->ape_paterno}}" disabled>
              </div>
              <div class="mb-3 col-md-4">
                <label for="aMaterno" class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" value="{{$user->ape_materno}}" disabled>
              </div>
            </div>
            <div class="row">
              <div class="mb-3 col-md-4">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" value="{{$user->usuario}}" disabled>
              </div>
              <div class="mb-3 col-md-4">
                <label for="fc" class="form-label">Fecha de Creacion</label>
                <input type="text" class="form-control" value="{{$user->fecha_creacion}}" disabled>
              </div>
              <div class="mb-3 col-md-4">
                <label for="fc" class="form-label">Fecha de Cese</label>
                <input type="text" class="form-control" value="{{$user->fecha_cese}}" disabled>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="AgregarUsuario" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Crear Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('user.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
        {{csrf_field()}}
          @include('pages.user.form')
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="EditarUsuario" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Editar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('user.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
          {{method_field('patch')}}
          {{csrf_field()}}
          <input type="hidden" name="id_usuario" class="id_usuario">
          @include('pages.user.form')
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="EliminarUsuario" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Cambiar Estado Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('user.destroy','test')}}" method="POST" autocomplete="off">
          {{method_field('delete')}}
          {{csrf_field()}} 
            <p>Estas seguro de cambiar el estado?</p>
            <div class="modal-footer">
              <input type="hidden" name="id_usuario_2" class="id_usuario_2">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </form>
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
        $('#EditarUsuario').modal('show');
    });
</script>       
@else
  @if(count($errors)>0)
  <script>
      $(function() {
          $('#AgregarUsuario').modal('show');
      });
  </script>       
  @endif 
@endif

<script>

var editarUsuario = document.getElementById('EditarUsuario');

editarUsuario.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget

  var id = button.getAttribute('data-id')
  var nombre = button.getAttribute('data-nombre')
  var usuario = button.getAttribute('data-usuario')

  var idModal = editarUsuario.querySelector('.id_usuario')
  var nombreModal = editarUsuario.querySelector('.nombre')
  var usuarioModal = editarUsuario.querySelector('.usuario')

  idModal.value = id;
  nombreModal.value = nombre;
  usuarioModal.value = usuario;
})

var eliminarUsuario = document.getElementById('EliminarUsuario');

eliminarUsuario.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget

  var id = button.getAttribute('data-id')

  var idModal = eliminarUsuario.querySelector('.id_usuario_2')

  idModal.value = id;
})

$(function() {
  'use strict';

  $(function() {
    $('#usuarios').DataTable({
      "aLengthMenu": [
        [10, 30, 50, -1],
        [10, 30, 50, "All"]
      ],
      "language": {
        "lengthMenu": "Mostrar  _MENU_  registros por paginas",
        "zeroRecords": "Nada encontrado - disculpa",
        "info": "Mostrando la página page _PAGE_ de _PAGES_",
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
          targets: [6], 
          orderable: false 
        }
      ]
    });
  });

});
</script>
@endpush