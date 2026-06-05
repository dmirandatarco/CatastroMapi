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
          <h4 class="mb-3">Listado de Sectores</h4>
          <div class="mb-5">
            @can('sectore.create')
            <button type="button" class="btn btn-primary mb-2 mb-md-0 " data-bs-toggle="modal" data-bs-target="#Agregar">
              <i data-feather="user-plus"></i><b> &nbsp; Crear Sector</b>
            </button>
            @endcan
          </div>
          @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ $message }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>
          @endif
          @if ($message = Session::get('error'))

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ $message }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>
          @endif
          <div class="table-responsive">
            <table id="especialidad" class="table">
              <thead>
                <tr >
                  <th>Numero</th>
                  <th>Ubigeo</th>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Ficha Individual</th>
                  <th>Ficha Cotitularidad</th>
                  <th>Ficha Economica</th>
                  <th>Ficha de Bienes Comunes</th>
                  <th>Ficha Cultural</th>
                  <th>Ficha Rural</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($sectores as $sector)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{$sector->ubigeo->nomb_ubigeo}}</td>
                  <td>{{$sector->codi_sector}}</td>
                  <td>{{$sector->nomb_sector}}</td>
                  <td>{{$sector->fichaindividual}}</td>
                  <td>{{$sector->fichacotitular}}</td>
                  <td>{{$sector->fichaeconomica}}</td>
                  <td>{{$sector->fichabiencomun}}</td>
                  <td>{{$sector->fichacultural}}</td>
                  <td>{{$sector->ficharural}}</td>
                  <td>
                    @can('sectore.edit')
                    <button type="button" class="btn btn-primary btn-icon edit" data-bs-toggle="modal" data-bs-target="#Editar" data-id="{{$sector->id_sector}}" data-codi_sector="{{$sector->codi_sector}}" data-nomb_sector="{{$sector->nomb_sector}}" data-fichaindividual="{{$sector->fichaindividual}}" data-fichacotitular="{{$sector->fichacotitular}}" data-fichaeconomica="{{$sector->fichaeconomica}}" data-fichabiencomun="{{$sector->fichabiencomun}}" data-fichacultural="{{$sector->fichacultural}}" data-ficharural="{{$sector->ficharural}}">
                      <i data-feather="edit"></i>
                    </button>
                    @endcan
                    @can('sectore.destroy')
                    <button type="button" class="btn btn-danger btn-icon" data-bs-toggle="modal" data-bs-target="#Eliminar" data-id="{{$sector->id_sector}}">
                      <i data-feather="trash-2"></i>
                    </button>
                    @endcan
                    @can('sectore.destroy')
                    <button type="button" class="btn btn-warning btn-icon" data-bs-toggle="modal" data-bs-target="#Destroy" data-id="{{$sector->id_sector}}">
                      <i data-feather="alert-triangle"></i>
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
        <h5 class="modal-title" >Crear Sector</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('sectore.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
        {{csrf_field()}}
          @include('pages.sectore.form')
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Editar" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Editar Sector</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('sectore.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
          {{method_field('patch')}}
          {{csrf_field()}}
          <input type="hidden" name="id_sectore" class="id_sectore">
          @include('pages.sectore.form')
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
        <form action="{{route('sectore.destroy','test')}}" method="POST" autocomplete="off">
          {{method_field('delete')}}
          {{csrf_field()}} 
            <p>Estas seguro de cambiar el estado?</p>
            <div class="modal-footer">
              <input type="hidden" name="id_sectore_2" class="id_sectore_2">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="Destroy" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Cambiar Estado </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('sectore.eliminar','test')}}" method="POST" autocomplete="off">
          {{csrf_field()}} 
            <p>Estas seguro de cambiar el estado?</p>
            <div class="modal-footer">
              <input type="hidden" name="id_sectore_2" class="id_sectore_2">
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
  var codi_sector = button.getAttribute('data-codi_sector')
  var nomb_sector = button.getAttribute('data-nomb_sector')
  var fichaindividual = button.getAttribute('data-fichaindividual')
  var fichacotitular = button.getAttribute('data-fichacotitular')
  var fichaeconomica = button.getAttribute('data-fichaeconomica')
  var fichabiencomun = button.getAttribute('data-fichabiencomun')
  var fichacultural = button.getAttribute('data-fichacultural')
  var ficharural = button.getAttribute('data-ficharural')


  var idModal = editar.querySelector('.id_sectore')
  var codi_sectorModal = editar.querySelector('.codi_sector')
  var nomb_sectorModal = editar.querySelector('.nomb_sector')

  var fichaindividualModal = editar.querySelector('.fichaindividual')
  var fichacotitularModal = editar.querySelector('.fichacotitular')
  var fichaeconomicaModal = editar.querySelector('.fichaeconomica')
  var fichabiencomunModal = editar.querySelector('.fichabiencomun')
  var fichaculturalModal = editar.querySelector('.fichacultural')
  var ficharuralModal = editar.querySelector('.ficharural')

  idModal.value = id;
  codi_sectorModal.value = codi_sector;
  nomb_sectorModal.value = nomb_sector;

  fichaindividualModal.value = fichaindividual;
  fichacotitularModal.value = fichacotitular;
  fichaeconomicaModal.value = fichaeconomica;
  fichabiencomunModal.value = fichabiencomun;
  fichaculturalModal.value = fichacultural;
  ficharuralModal.value = ficharural;
});

var eliminar = document.getElementById('Eliminar');

eliminar.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget

  var id = button.getAttribute('data-id')

  var idModal = eliminar.querySelector('.id_sectore_2')

  idModal.value = id;
});
var eliminar = document.getElementById('Destroy');

eliminar.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget

  var id = button.getAttribute('data-id')

  var idModal = eliminar.querySelector('.id_sectore_2')

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