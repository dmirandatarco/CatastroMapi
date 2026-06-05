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
            <h4 class="mb-3">Reporte por fechas</h4>
            {!!Form::open(array('url'=>'reporte/reportefechas','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
            <div class="form-group row">
                <div class="col-md-1" style="padding-top: 10px">
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
                    <span style="font-size: 20px"><strong style="color:  #6c6c6c;">Total: </strong>{{$numero}}</span>&nbsp;&nbsp;&nbsp;&nbsp;                    
                </div>
            </div>
            <div class="table-responsive ">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nº Ficha</th>
                            <th>Sector</th>
                            <th>Manzana</th>
                            <th>Lote</th>
                            <th>Fecha</th>
                            <th>Tipo Ficha</th>
                            <th>Ver Informativa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ficha as $ficha)
                            <tr>
                                <td>{{$ficha->nume_ficha}}</td>
                                <td>{{$ficha->lote->manzana->sectore->nomb_sector}}</td>
                                <td>{{$ficha->lote->manzana->codi_mzna}}</td>
                                <td>{{$ficha?->lote?->codi_lote}}</td>
                                <td>{{date("d/m/Y", strtotime($ficha->fecha_grabado))}}</td>
                                <td>
                                @if($ficha->tipo_ficha==01)
                                    INDIVIDUAL
                                </td>
                                <td>
                                    <a href="{{route('pdf.gerenciaadministracion',$ficha)}}" target="_blank">
                                        <button type="button" class="btn btn-info btn-icon " >
                                        <i data-feather="printer"></i>
                                        </button>
                                    </a>
                                </td>
                                @elseif($ficha->tipo_ficha=="02")
                                    COTITULARIDAD
                                </td>
                                <td>
                                </td>
                                @elseif($ficha->tipo_ficha=="04")
                                    BIENES COMUNES
                                </td>
                                <td>
                                </td>
                                @elseif($ficha->tipo_ficha=="03")
                                    ECONOMICA
                                </td>
                                <td>
                                </td>
                                @elseif($ficha->tipo_ficha=="05")
                                    BIEN CULTURAL
                                </td>
                                <td>
                                </td>
                                @elseif($ficha->tipo_ficha=="06")
                                    RURAL
                                </td>
                                <td>
                                </td>
                                @endif
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

