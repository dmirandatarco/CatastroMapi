@extends('layout.master')

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
                <div class="row mb-3">
                    <h4 class="mb-3">Reporte por dia de llenado</h4>
                    {!!Form::open(array('url'=>'reporte/llenadoficha','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                    <div class="form-group row">
                        
                        <div class="col-md-7">
                            <input type="date" id="buscarFechaInicio" name="buscarFechaInicio" class="form-control" placeholder="Fecha Inicio" value="{{$fechainicio}}">
                        </div>
                        <div class="col-md-5">
                            <button type="submit"  id="buscar" class="btn btn-primary"><i data-feather="search"></i> Buscar</button>
                        </div>
                        
                    </div>
                    {{Form::close()}}
                </div>
                
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                    </div>
                @endif
                <div class="table-responsive ">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Cantidad</th>
                                <th>Apellidos y Nombres</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ficha as $ficha)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$ficha->cantidad}}</td>
                                <td>{{$ficha->ape_paterno}} {{$ficha->ape_materno}} {{$ficha->nombres}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection



@push('custom-scripts')

@endpush
