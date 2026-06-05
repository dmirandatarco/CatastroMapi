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
        <h4 class="mb-3">Progreso de llenado de lotes</h4>
        {!!Form::open(array('url'=>'progresofichas','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
          <div class="form-group row">
            <div class="col-md-1" style="padding-top: 10px">
                    <span> <strong> Sector </strong></span>
                <br>                              
            </div>
            <div class="col-md-3">
                <div class="input-group" id="buscarFecha">
                    <select class="form-control" id="buscarSector" name="buscarSector"  data-live-search="true">
                        <option value="0" {{ $sector2 == '0' ? 'selected' : '' }} >TODOS</option>
                        @foreach($sectores as $sector)
                            <option value="{{$sector->id_sector}}" {{ $sector2 == $sector->id_sector ? 'selected' : '' }} >{{$sector->nomb_sector}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
            </div>
            <div class="col-md-1" style="padding-top: 10px">
                    <span> <strong> Tipo de Ficha </strong></span>
                <br>                              
            </div>
            <div class="col-md-3">
                <div class="input-group" id="buscarFecha">
                    <select class="form-control" id="buscarFicha" name="buscarFicha"  data-live-search="true">
                        <option value="0" {{ $ficha2 == '0' ? 'selected' : '' }} >TODOS</option>
                        <option value="01" {{ $ficha2 == '01' ? 'selected' : '' }} >FICHA INDIVIDUAL</option>
                        <option value="02" {{ $ficha2 == '02' ? 'selected' : '' }} >FICHA DE COTITULARIDAD</option>
                        <option value="03" {{ $ficha2 == '03' ? 'selected' : '' }} >FICHA ECONOMICA</option>
                        <option value="04" {{ $ficha2 == '04' ? 'selected' : '' }} >FICHA DE BIENES COMUNES</option>
                        <option value="05" {{ $ficha2 == '05' ? 'selected' : '' }} >FICHA DE BIEN CULTURAL</option>
                        <option value="06" {{ $ficha2 == '06' ? 'selected' : '' }} >FICHA RURAL</option>
                        
                    </select>
                </div>
                <br>
            </div>
            <div class="col-md-2 mb-5">
                <div class="input-group">
                    <button type="submit"  id="buscar" class="btn btn-primary"><i data-feather="search"></i> Buscar</button>
                </div>
            </div>
          </div>
        {{Form::close()}}
        <div class="col-md-12 mb-5">
          <div class="progress" style="padding-left: 0 !important;">
            <div class="progress-bar" role="progressbar" style="width: {{$valor1}}%;" aria-valuenow={{$valor1}} aria-valuemin="0" aria-valuemax="100">{{$valor1}}%</div>
          </div>
        </div> 
        
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

<script>


$(function() {
  'use strict';

  $(function() {
    $('#roles').DataTable({
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
          targets: [2,3], 
          orderable: false 
        }
      ]
    });
  });

});







</script>
@endpush