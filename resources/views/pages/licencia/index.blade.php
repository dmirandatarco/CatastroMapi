@extends('layout.master')
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
<div class="row inbox-wrapper">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <h4 class="mb-3">Listado de Licencias</h4>
          <div class="mb-5">
            @can('licenciaedificacion.create')
              <a href="{{route('licenciaedificacion.create')}}">
                <button type="button" class="btn btn-primary mb-2 mb-md-0">
                  <i data-feather="user-plus"></i><b> &nbsp; Crear Licencia</b>
                </button>
              </a>
              @endcan
          </div>
          @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ $message }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>
          @endif
          <div class="table-responsive">
            <table id="licencia" class="table">
              <thead>
                <tr >
                  <th>Nº</th>
                  <th>Fecha Emisión</th>
                  <th>Expediente</th>
                  <th>Numero</th>
                  <th>Administrado</th>
                  <th>Tipo</th>
                  <th>Estado</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($licencias as $licencia)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{date("m/d/Y" ,strtotime($licencia->fecha_emision))}}</td>
                  <td>{{$licencia->nroexpediente}}</td>
                  <td>{{$licencia->nrolicencia}}</td>
                  <td>{{$licencia->administrado1}}
                      @if($licencia->administrado2!="")
                        <br>{{$licencia->administrado2}}
                      @endif
                  </td>
                  <td>{{$licencia->tipolicencia}}</td>
                  <td>
                    @if($licencia->estado==1)
                      Registrado
                    @else
                      Anulado
                    @endif
                  </td>
                  <td>
                    @can('licenciaedificacion.show')
                      <a href="{{route('licenciaedificacion.show',$licencia)}}">
                        <button type="button" class="btn btn-warning btn-icon edit" >
                          <i data-feather="eye"></i>
                        </button>
                      </a>
                    @endcan
                    @can('licenciaedificacion.edit')
                      <a href="{{route('licenciaedificacion.edit',$licencia)}}">
                        <button type="button" class="btn btn-primary btn-icon edit" >
                          <i data-feather="edit"></i>
                        </button>
                      </a>
                    @endcan
                    @can('licenciaedificacion.destroy')
                    <button type="button" class="btn btn-danger btn-icon" data-bs-toggle="modal" data-bs-target="#Eliminar" data-id="{{$licencia->id}}">
                      <i data-feather="trash-2"></i>
                    </button>
                    @endcan
                    @can('licenciaedificacion.pdf')
                    <a href="{{route('licenciaedificacion.pdf',$licencia)}}" target="_blank">
                    <button type="button" class="btn btn-success btn-icon">
                      <i data-feather="file"></i>
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
</div>

<div class="modal fade" id="Eliminar" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Cambiar Estado </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('licenciaedificacion.destroy','test')}}" method="POST" autocomplete="off">
          {{method_field('delete')}}
          {{csrf_field()}}
            <p>Estas seguro de cambiar el estado?</p>
            <div class="modal-footer">
              <input type="hidden" name="id_licencia_2" class="id_licencia_2">
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


<script>
var eliminar = document.getElementById('Eliminar');

eliminar.addEventListener('show.bs.modal', function (event) {
  var button = event.relatedTarget
  var id = button.getAttribute('data-id')
  var idModal = eliminar.querySelector('.id_licencia_2')
  idModal.value = id;
});

$(function() {
  'use strict';

  $(function() {
    $('#licencia').DataTable({
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
          targets: [7],
          orderable: false
        }
      ]
    });
  });

});
</script>
@endpush