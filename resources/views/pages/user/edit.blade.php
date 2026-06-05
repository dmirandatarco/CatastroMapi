@extends('layout.master')
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
<div class="row inbox-wrapper">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <form action="{{route('user.update',$user)}}" method="post" class="forms-sample" enctype="multipart/form-data">
          {{method_field('patch')}}
            {{csrf_field()}}
          <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
            <div class="mb-3">
              <img src="{{asset('storage/img/usuario/'.$user->imagen)}}" alt="{{$user->nombre}}" class="wd-250 ht-250 rounded-circle" style="height: 250px;object-fit: cover;">
              <input type="file" name="imagen">
              @error('imagen')
                  <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
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
          <h4 class="mb-3">Editar Usuario</h4>
            <div class="row">
            </div>
            <div class="row">
              <div class="mb-3 col-md-4">
                <label for="nombres" class="form-label">Nombre</label>
                <input type="text" name="nombres" class="form-control no-transform" value="{{$user->nombres}}" >
                @error('nombres')
                  <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3 col-md-4">
                <label for="aPaterno" class="form-label">Apellido Paterno</label>
                <input type="text" name="ape_paterno" class="form-control no-transform" value="{{$user->ape_paterno}}" >
                @error('ape_paterno')
                  <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3 col-md-4">
                <label for="aMaterno" class="form-label">Apellido Materno</label>
                <input type="text" name="ape_materno" class="form-control no-transform" value="{{$user->ape_materno}}" >
                @error('ape_materno')
                  <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" name="usuario" class="form-control no-transform" value="{{$user->usuario}}" >
                @error('usuario')
                  <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control no-transform" >
                @error('password')
                  <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="mb-3 col-md-4">
                <label for="uc" class="form-label">Email</label>
                <input type="text" name="email" class="form-control no-transform" value="{{$user->email}}" >
                @error('email')
                  <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3 col-md-4">

              <label class="form-label">Rol</label>
                <select class="js-example-basic-single form-select" id="rol" name="rol" data-width="100%">
                  @foreach($roles as $role)
                    @if($user->roles()->count())

                        <option value="{{$role->id}}" {{ $user->roles[0]->id == $role->id ? 'selected' : '' }} >{{$role->name}}</option>
                    @else
                    <option value="{{$role->id}}" >{{$role->name}}</option>

                    @endif

                  @endforeach
                </select>
                @error('rol')
                  <span class="error-message" style="color:red">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <button type="submit" class="btn btn-primary me-2">Actualizar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

@push('plugin-scripts')
   <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
$(function() {
  'use strict';

  $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
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
