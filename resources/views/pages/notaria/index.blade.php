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
          <h4 class="mb-3">Listado de Notarias</h4>
          <div class="mb-5">
            @can('notaria.create')
            <button type="button" class="btn btn-primary mb-2 mb-md-0 " data-bs-toggle="modal" data-bs-target="#Agregar">
              <i data-feather="user-plus"></i><b> &nbsp; Crear Notaria</b>
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
            <table id="notarias" class="table">
              <thead>
                <tr >
                  <th>Numero</th>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Ubigeo</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($notarias as $notaria)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{$notaria->codi_notaria}}</td>
                  <td>{{$notaria->nomb_notaria}}</td>
                  <td>{{$notaria->ubigeo->nomb_ubigeo}}</td>
                  <td>
                    @can('notaria.edit')
                    <button type="button" class="btn btn-primary btn-icon edit" data-bs-toggle="modal" data-bs-target="#Editar" data-id="{{str_pad($notaria->id_notaria,11,'0',STR_PAD_LEFT)}}" data-codi_notaria="{{$notaria->codi_notaria}}" data-nomb_notaria="{{$notaria->nomb_notaria}}">
                      <i data-feather="edit"></i>
                    </button>
                    @endcan
                    @can('notaria.destroy')
                    <button type="button" class="btn btn-danger btn-icon" data-bs-toggle="modal" data-bs-target="#Eliminar" data-id="{{str_pad($notaria->id_notaria,11,'0',STR_PAD_LEFT)}}">
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
        <h5 class="modal-title" >Crear Notaria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('notaria.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
        {{csrf_field()}}
          @include('pages.notaria.form')
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Editar" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Editar Notaria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('notaria.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
          {{method_field('patch')}}
          {{csrf_field()}}
          <input type="hidden" name="id_notaria" class="id_notaria">
          @include('pages.notaria.form')
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
        <form action="{{route('notaria.destroy','test')}}" method="POST" autocomplete="off">
          {{method_field('delete')}}
          {{csrf_field()}} 
            <p>Estas seguro de cambiar el estado?</p>
            <div class="modal-footer">
              <input type="hidden" name="id_notaria_2" class="id_notaria_2">
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
  var codi_notaria = button.getAttribute('data-codi_notaria')
  var nomb_notaria = button.getAttribute('data-nomb_notaria')

  var idModal = editar.querySelector('.id_notaria')
  var codi_notariaModal = editar.querySelector('.codi_notaria')
  var nomb_notariaModal = editar.querySelector('.nomb_notaria')

  idModal.value = id;
  codi_notariaModal.value = codi_notaria;
  nomb_notariaModal.value = nomb_notaria;
});

var eliminar = document.getElementById('Eliminar');

eliminar.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget

  var id = button.getAttribute('data-id')

  var idModal = eliminar.querySelector('.id_notaria_2')

  idModal.value = id;
});

$(function() {
  'use strict';

  $(function() {
    $('#notarias').DataTable({
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