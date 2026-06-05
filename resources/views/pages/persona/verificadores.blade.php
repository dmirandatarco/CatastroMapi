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
        @can('verificadores.create')
        <button type="button" class="btn btn-success btn-icon printer" onclick="window.print();">
          <i data-feather="printer"></i>
        </button>
        @endcan
      </div>
      <div class="card-body">
        <div class="row">
          <h4 class="mb-3">Listado de Verificadores</h4>
          <div class="mb-5">
            <button type="button" class="btn btn-primary mb-2 mb-md-0 " data-bs-toggle="modal" data-bs-target="#Agregar">
              <i data-feather="user-plus"></i><b> &nbsp; Crear Verificador</b>
            </button>
          </div>
          @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ $message }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>
          @endif
          <div class="table-responsive">
            <table id="manzanas" class="table">
            <thead>
                <tr >
                  <th>Numero</th>
                  <th>Nº Documento</th>
                  <th>Nombres</th>
                  <th>Apellido Paterno</th>
                  <th>Apellido Materno</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($personas as $persona)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{$persona->nume_doc}}</td> 
                  <td>{{$persona->nombres}} </td>
                  <td>{{$persona->ape_paterno}}</td>
                  <td>{{$persona->ape_materno}}</td>                   
                  <td>
                    @can('verificadores.edit')
                    <button type="button" class="btn btn-primary btn-icon edit" data-bs-toggle="modal" data-bs-target="#Editar" data-id="{{$persona->id_persona}}" data-nume_doc="{{$persona->nume_doc}}" data-nombres="{{$persona->nombres}}" data-ape_paterno="{{$persona->ape_paterno}}" data-ape_materno="{{$persona->ape_materno}}" data-nregistro="{{$persona->nregistro}}">
                      <i data-feather="edit"></i>
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
        <h5 class="modal-title" >Crear Verificador</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('persona.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
        {{csrf_field()}}
          @include('pages.persona.form2')
          
          <input type="hidden" name="tipo_funcion" value="4">
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Editar" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Editar Verificador</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('persona.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
          {{method_field('patch')}}
          {{csrf_field()}}
          <input type="hidden" name="id_persona" class="id_persona">
          @include('pages.persona.form2')
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
@endif
@if(!empty(Session::get('error_code')) && Session::get('error_code') == 6)
  <script>
      $(function() {
          $('#Agregar').modal('show');
      });
  </script>     
@endif

<script>

var agregar = document.getElementById('Agregar');


var editar = document.getElementById('Editar');

editar.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget

  var id = button.getAttribute('data-id')  
  var nume_doc = button.getAttribute('data-nume_doc')
  var nombres = button.getAttribute('data-nombres')
  var ape_paterno = button.getAttribute('data-ape_paterno')
  var ape_materno = button.getAttribute('data-ape_materno')
  var nregistro = button.getAttribute('data-nregistro')



  var idModal = editar.querySelector('.id_persona')
  var nume_docModal = editar.querySelector('.nume_doc')
  var nombresModal = editar.querySelector('.nombres')
  var ape_paternoModal = editar.querySelector('.ape_paterno')
  var ape_maternoModal = editar.querySelector('.ape_materno')
  var nregistroModal = editar.querySelector('.nregistro')


  idModal.value = id;
  nume_docModal.value = nume_doc
  nombresModal.value = nombres
  ape_paternoModal.value = ape_paterno
  ape_maternoModal.value = ape_materno
  nregistroModal.value = nregistro
  tipo_funcionModal.value = tipo_funcion

  
});

$(function() {
  'use strict';

  $(function() {
    $('#manzanas').DataTable({
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
          targets: [5], 
          orderable: false 
        }
      ]
    });
  });

});
</script>

@endpush