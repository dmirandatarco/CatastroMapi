@extends('layout.master')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
<div class="row inbox-wrapper">
    <div class="col-md-12">
        <div class="card">
        <div class="card-body">
            <div class="row">
            <h4 class="mb-3">Buscar Ficha Catastral en Linea de tiempo</h4>
            {!!Form::open(array('url'=>'lineatiempo','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
            <div class="form-group row">
                <div class="col-md-1" style="padding-top: 10px">
                        <span> <strong> Lote </strong></span>
                    <br>                              
                </div>
                <div class="col-md-3">
                    <select class="form-control" id="buscarLote" name="buscarLote"  data-live-search="true">
                        <option value="0" {{ $lote2 == '0' ? 'selected' : '' }} >TODOS</option>
                        @foreach($lotes as $lote)
                            <option value="{{$lote->id_lote}}" {{ $lote2 == $lote->id_lote ? 'selected' : '' }} >{{$lote->id_lote}}</option>
                        @endforeach
                    </select>
                    <br>                              
                </div>
                <div class="col-md-2 mb-5">
                    <div class="input-group">
                        <button type="submit"  id="buscar" class="btn btn-primary"><i data-feather="search"></i> Buscar</button>
                    </div>
                </div>
            </div>
            
            {{Form::close()}}
            <div class="table-responsive ">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nº Ficha</th>
                            <th>Sector</th>
                            <th>Manzana</th>
                            <th>Lote</th>
                            <th>Llenado</th>
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
                                <td>{{$ficha->user->usuario}}</td>
                                <td>{{date("d/m/Y", strtotime($ficha->fecha_grabado))}}</td>
                                <td>
                                @if($ficha->tipo_ficha==01)
                                    INDIVIDUAL
                                </td>
                                <td>
                                    <a href="{{route('pdf.individual',$ficha)}}" target="_blank">
                                        <button type="button" class="btn btn-success btn-icon " >
                                        <i data-feather="printer"></i>
                                        </button>
                                    </a>
                                </td>
                                @elseif($ficha->tipo_ficha=="02")
                                    COTITULARIDAD
                                </td>
                                <td>
                                    <a href="{{route('pdf.cotitularidad',$ficha)}}" target="_blank">
                                        <button type="button" class="btn btn-success btn-icon " >
                                        <i data-feather="printer"></i>
                                        </button>
                                    </a>
                                </td>
                                @elseif($ficha->tipo_ficha=="04")
                                    BIENES COMUNES
                                </td>
                                <td>
                                    <a href="{{route('pdf.bienescomunes',$ficha)}}" target="_blank">
                                        <button type="button" class="btn btn-success btn-icon " >
                                        <i data-feather="printer"></i>
                                        </button>
                                    </a>
                                </td>
                                @elseif($ficha->tipo_ficha=="03")
                                    ECONOMICA
                                </td>
                                <td>
                                    <a href="{{route('pdf.economica',$ficha)}}" target="_blank">
                                        <button type="button" class="btn btn-success btn-icon " >
                                        <i data-feather="printer"></i>
                                        </button>
                                    </a>
                                </td>
                                @elseif($ficha->tipo_ficha=="05")
                                    BIEN CULTURAL
                                </td>
                                <td>
                                    <a href="{{route('pdf.bienesculturales',$ficha)}}" target="_blank">
                                        <button type="button" class="btn btn-success btn-icon " >
                                        <i data-feather="printer"></i>
                                        </button>
                                    </a>
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
$('#buscarLote').select2();
</script>
@endpush