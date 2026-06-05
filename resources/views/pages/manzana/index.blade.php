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
          <h4 class="mb-3">Listado de Manzanas</h4>
          <div class="mb-5">
            @can('manzana.create')
            <button type="button" class="btn btn-primary mb-2 mb-md-0 " data-bs-toggle="modal" data-bs-target="#Agregar">
              <i data-feather="user-plus"></i><b> &nbsp; Crear Manzana</b>
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
                  <th>Sector</th>
                  <th>Codigo</th>
                  <th>Numero</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($manzanas as $manzana)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{$manzana->sectore->nomb_sector}}</td>
                  <td>{{$manzana->codi_mzna}}</td>
                  <td>{{$manzana->nume_mzna}}</td>
                  <td>
                    @can('manzana.edit')
                    <button type="button" class="btn btn-primary btn-icon edit" data-bs-toggle="modal" data-bs-target="#Editar" data-id="{{$manzana->codi_mzna}}" data-id_sector="{{str_pad($manzana->id_sector,8,'0',STR_PAD_LEFT)}}" data-codi_mzna="{{$manzana->codi_mzna}}" data-nume_mzna="{{$manzana->nume_mzna}}">
                      <i data-feather="edit"></i>
                    </button>
                    @endcan
                    @can('manzana.destroy')
                    <button type="button" class="btn btn-danger btn-icon" data-bs-toggle="modal" data-bs-target="#Eliminar" data-id="{{$manzana->id_mzna}}">
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
        <h5 class="modal-title" >Crear Manzana</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('manzana.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
        {{csrf_field()}}
          @include('pages.manzana.form')
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Editar" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Editar Manzana</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('manzana.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
          {{method_field('patch')}}
          {{csrf_field()}}
          <input type="hidden" name="id_manzana" class="id_manzana">
          @include('pages.manzana.form')
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
        <form action="{{route('manzana.destroy','test')}}" method="POST" autocomplete="off">
          {{method_field('delete')}}
          {{csrf_field()}}
            <p>Estas seguro de cambiar el estado?</p>
            <div class="modal-footer">
              <input type="text" name="id_manzana_2" class="id_manzana_2">
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

  var id = button.getAttribute('data-id')
  var id_sector = button.getAttribute('data-id_sector')
  var codi_mzna = button.getAttribute('data-codi_mzna')
  var nume_mzna = button.getAttribute('data-nume_mzna')

  var idModal = editar.querySelector('.id_manzana')
  var id_sectorModal = editar.querySelector('.sectore_id')
  var codi_mznaModal = editar.querySelector('.codi_mzna')
  var nume_mznaModal = editar.querySelector('.nume_mzna')

  idModal.value = id;
  id_sectorModal.value = id_sector;
  codi_mznaModal.value = codi_mzna;
  nume_mznaModal.value = nume_mzna;

});

var eliminar = document.getElementById('Eliminar');

eliminar.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget

  var id = button.getAttribute('data-id')

  var idModal = eliminar.querySelector('.id_manzana_2')

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
          targets: [4],
          orderable: false
        }
      ]
    });
  });

});
</script>

@endpush
