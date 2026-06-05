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
            <div class="row">
            <h4 class="mb-3">Buscar Ficha Catastral</h4>
            {!!Form::open(array('url'=>'licenciaedificacion/reporte','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
            <div class="form-group row">
                <div class="col-md-2" style="padding-top: 10px">
                    <span> <strong> Fecha </strong></span>
                    <br>                              
                </div>
                <div class="col-md-5">
                    <div class="input-group" id="buscarFecha">
                        <input type="date" id="buscarFechaInicio" name="buscarFechaInicio" class="form-control" placeholder="Fecha Inicio" value="{{$fechainicio}}">
                        <label style="padding-top: 10px"><strong> &nbsp;&nbsp; / &nbsp;&nbsp;</strong></label>
                        <input type="date" id="buscarFechaFin" name="buscarFechaFin" class="form-control" placeholder="Fecha Fin"  value="{{$fechafin}}">
                        
                    </div>
                    <br>
                </div>
                <div class="col-md-5" style="padding-top: 10px">
                </div>
                <div class="col-md-2" style="padding-top: 10px">
                        <span> <strong> Administrado </strong></span>
                    <br>                          
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" id="buscarAdministrado" name="buscarAdministrado" class="form-control" placeholder="Apellidos o Nombre" value="{{$administrado}}">
                        <br>
                    </div>
                </div>
                <div class="col-md-2 mb-5">
                    <div class="input-group">
                        <button type="submit"  id="buscar" class="btn btn-primary"><i data-feather="search"></i> Buscar</button>
                    </div>
                </div>
            </div>
            
            {{Form::close()}}
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                </div>
            @endif
            <div class="form-group row">
                <div class="col-md-12 mb-2">
                    <span style="font-size: 20px"><strong style="color:  #6c6c6c;">Total: </strong>{{$total}}</span>&nbsp;&nbsp;&nbsp;&nbsp;                    
                </div>
            </div>
            <div class="table-responsive ">
                <table class="table">
                    <thead>
                        <tr>
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

@endsection
