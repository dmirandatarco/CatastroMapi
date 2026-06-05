@extends('layout.master')
@push('plugin-styles')
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
                    <h4 class="mb-3">Reporte por firmas</h4>
                    {!!Form::open(array('url'=>'reporte/reportefirmas','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                    <div class="form-group row">
                        <div class="col-md-2" style="padding-top: 10px">
                            <span> <strong> Declarante: </strong></span>
                            <br>
                        </div>


                        <div class="col-md-3">
                            <div class="input-group" id="">
                                <select class="form-control" id="buscarDeclarante" name="buscarDeclarante" data-live-search="true">
                                    <option value="0" {{ $declarante2 == '0' ? 'selected' : '' }}>TODOS</option>
                                    @foreach($declarantes as $declarante)
                                    <option value="{{$declarante->id_persona}}" {{ $declarante2 == $declarante->id_persona ? 'selected' : '' }}>{{$declarante->nume_doc}} {{$declarante->nombres}} {{$declarante->ape_paterno}} {{$declarante->ape_materno}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                        </div>
                        <div class="col-md-2" style="padding-top: 10px">
                            <span> <strong> Supervisor: </strong></span>
                            <br>
                        </div>


                        <div class="col-md-3">
                            <div class="input-group" id="">
                                <select class="form-control" id="buscarSupervisor" name="buscarSupervisor" data-live-search="true">
                                    <option value="0" {{ $supervisor2 == '0' ? 'selected' : '' }}>TODOS</option>
                                    @foreach($supervisors as $supervisor)
                                    <option value="{{$supervisor->id_persona}}" {{ $supervisor2 == $supervisor->id_persona ? 'selected' : '' }}>{{$supervisor->nume_doc}} {{$supervisor->nombres}} {{$supervisor->ape_paterno}} {{$supervisor->ape_materno}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                        </div>

                        <div class="col-md-2" style="padding-top: 10px">

                        </div>


                        <div class="col-md-2" style="padding-top: 10px">
                            <span> <strong> Tecnico: </strong></span>
                            <br>
                        </div>


                        <div class="col-md-3">
                            <div class="input-group" id="">
                                <select class="form-control" id="buscarTecnico" name="buscarTecnico" data-live-search="true">
                                    <option value="0" {{ $tecnico2 == '0' ? 'selected' : '' }}>TODOS</option>
                                    @foreach($tecnicos as $tecnico)
                                    <option value="{{$tecnico->id_persona}}" {{ $tecnico2 == $tecnico->id_persona ? 'selected' : '' }}>{{$tecnico->nume_doc}} {{$tecnico->nombres}} {{$tecnico->ape_paterno}} {{$tecnico->ape_materno}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                        </div>

                        <div class="col-md-2" style="padding-top: 10px">
                            <span> <strong> Verificador: </strong></span>
                            <br>
                        </div>


                        <div class="col-md-2">
                            <div class="input-group" id="">
                                <select class="form-control" id="buscarVerificador" name="buscarVerificador" data-live-search="true">
                                    <option value="0" {{ $verificado2 == '0' ? 'selected' : '' }}>TODOS</option>
                                    @foreach($verificadors as $verificador)
                                    <option value="{{$verificador->id_persona}}" {{ $verificado2 == $verificador->id_persona ? 'selected' : '' }}>{{$verificador->nume_doc}} {{$verificador->nombres}} {{$verificador->ape_paterno}} {{$verificador->ape_materno}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                        </div>

                        <div class="col-md-2 mb-5">
                            <div class="input-group">
                                <button type="submit" id="buscar" class="btn btn-primary"><i data-feather="search"></i> Buscar</button>
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
                                    <th>Ver Ficha</th>
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
                                        @can('pdf.individual')
                                        <a href="{{route('pdf.individual',$ficha)}}" target="_blank">
                                            <button type="button" class="btn btn-success btn-icon ">
                                                <i data-feather="printer"></i>
                                            </button>
                                        </a>
                                        @endcan
                                    </td>
                                    @elseif($ficha->tipo_ficha=="02")
                                    COTITULARIDAD
                                    </td>
                                    <td>
                                        @can('pdf.cotitularidad')
                                        <a href="{{route('pdf.cotitularidad',$ficha)}}" target="_blank">
                                            <button type="button" class="btn btn-success btn-icon ">
                                                <i data-feather="printer"></i>
                                            </button>
                                        </a>
                                        @endcan
                                    </td>

                                    @elseif($ficha->tipo_ficha=="04")
                                    BIENES COMUNES
                                    </td>
                                    <td>
                                        @can('pdf.bienescomunes')
                                        <a href="{{route('pdf.bienescomunes',$ficha)}}" target="_blank">
                                            <button type="button" class="btn btn-success btn-icon ">
                                                <i data-feather="printer"></i>
                                            </button>
                                        </a>
                                        @endcan
                                    </td>
                                    @elseif($ficha->tipo_ficha=="03")
                                    ECONOMICA
                                    </td>
                                    <td>
                                        @can('pdf.economica')
                                        <a href="{{route('pdf.economica',$ficha)}}" target="_blank">
                                            <button type="button" class="btn btn-success btn-icon ">
                                                <i data-feather="printer"></i>
                                            </button>
                                        </a>
                                        @endcan
                                    </td>
                                    @elseif($ficha->tipo_ficha=="05")
                                    BIEN CULTURAL
                                    </td>
                                    <td>
                                        @can('pdf.bienesculturales')
                                        <a href="{{route('pdf.bienesculturales',$ficha)}}" target="_blank">
                                            <button type="button" class="btn btn-success btn-icon ">
                                                <i data-feather="printer"></i>
                                            </button>
                                        </a>
                                        @endcan
                                    </td>
                                    @elseif($ficha->tipo_ficha=="06")
                                    RURAL
                                    </td>
                                    <td>
                                        @can('pdf.rural')
                                        <a href="{{route('pdf.rural',$ficha)}}" target="_blank">
                                            <button type="button" class="btn btn-success btn-icon ">
                                                <i data-feather="printer"></i>
                                            </button>
                                        </a>
                                        @endcan
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
@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
$('#buscarDeclarante').select2();
</script>
<script>
$('#buscarSupervisor').select2();
</script>
<script>
$('#buscarTecnico').select2();
</script>

<script>
$('#buscarVerificador').select2();
</script>

@endpush


