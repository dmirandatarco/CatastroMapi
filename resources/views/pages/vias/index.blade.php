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
          <h4 class="mb-3">Listado de Vias</h4>
          <div class="mb-5">
            <a href="{{route('vias.create')}}">
              @can('vias.create')
              <button type="button" class="btn btn-primary mb-2 me-2 mb-md-0 ">
                <i data-feather="user-plus"></i><b> &nbsp; Crear Via</b>
              </button>
              @endcan
            </a>
            <button type="button" class="btn btn-primary mb-2 mb-md-0 " data-bs-toggle="modal" data-bs-target="#subidaMasiva">
              <i data-feather="file-plus"></i><b> &nbsp; Subir Via</b>
            </button>
          </div>
          @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ $message }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>
          @endif
          <div class="table-responsive">
            <table id="vias" class="table">
              <thead>
                <tr >
                  <th>Numero</th>
                  <th>Codigo</th>
                  <th>Tipo</th>
                  <th>Nombre</th>
                  <th>Fecha</th>
                  <th>Habilitaciones Urbana</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($vias as $via)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{$via->codi_via}}</td>
                  <td>{{$via->tipo_via}}</td>
                  <td>{{$via->nomb_via}}</td>
                  <td>{{$via->fecha_via}}</td>
                  <td style="min-width: 50px;max-width: 50px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                    @foreach($via->hab_urbanas as $urbana)
                      {{$urbana->nomb_hab_urba}},
                    @endforeach
                  </td>
                  <td>
                    @can('vias.edit')
                    <a href="{{route('vias.edit',$via->id_via)}}">
                      <button type="button" class="btn btn-primary btn-icon edit">
                        <i data-feather="edit"></i>
                      </button>
                    </a>
                    @endcan
                    @can('vias.destroy')
                    <button type="button" class="btn btn-danger btn-icon" data-bs-toggle="modal" data-bs-target="#Eliminar" data-id="{{$via->id_via}}">
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

<div class="modal fade" id="subidaMasiva" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Subir archivo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('manzana.subidamasiva')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="mb-3">
            <label for="recipient-name" class="form-label">Archivo:</label>
            <input type="file" name="archivo" id="archivo" class="form-control" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
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
        <form action="{{route('vias.destroy','test')}}" method="POST" autocomplete="off">
          {{method_field('delete')}}
          {{csrf_field()}}
            <p>Estas seguro de cambiar el estado?</p>
            <div class="modal-footer">
              <input type="hidden" name="id_via_2" class="id_via_2">
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


var eliminar = document.getElementById('Eliminar');

eliminar.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget

  var id = button.getAttribute('data-id')

  var idModal = eliminar.querySelector('.id_via_2')

  idModal.value = id;
});

$(function() {
  'use strict';

  $(function() {
    $('#vias').DataTable({
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
          targets: [0],
          orderable: false
        }
      ]
    });
  });

});
</script>
@endpush
