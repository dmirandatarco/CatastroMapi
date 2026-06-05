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
            <h4 class="mb-3">Reporte de Titulares por sector</h4>
            {!!Form::open(array('url'=>'reporte/reportetitulares','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
            <div class="form-group row">
                <div class="col-md-1" style="padding-top: 10px">
                        <span> <strong> Sector: </strong></span>
                    <br>
                </div>
                <div class="col-md-2">
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
                <div class="col-md-4 mb-5">
                    <div class="input-group d-flex gap-2">
                        <button type="submit"  id="buscar" class="btn btn-primary"><i data-feather="search"></i> Buscar</button>
                        <a href="#" id="printLink" target="_blank">
                            <button type="button" class="btn btn-danger " onclick="updateLink();">
                                <i data-feather="file-text"></i>Reporte PDF
                            </button>
                        </a>
                        <a href="#" id="printLinkExcel" target="_blank">
                            <button type="button" class="btn btn-success " onclick="updateLinkExcel();">
                                <i data-feather="file-text"></i>Reporte Excel
                            </button>
                        </a>
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
                                <th rowspan="2">CUC Lote</th>
                                <th rowspan="2">CUC Unidad Catastral</th>
                                <th rowspan="2">Titular(es) Catastral(es)</th>
                                <th rowspan="2">% Propiedad</th>
                                <th rowspan="2">DNI / RUC</th>
                                <th colspan="8" class="text-center">UBICACIÓN DEL PREDIO CATASTRAL</th>
                                <th rowspan="2">Área de terreno verificada (m2)</th>
                                <th rowspan="2">Área de construida verificada total (m2)</th>
                                <th rowspan="2">Uso</th>
                            </tr>
                            <tr>
                                <th>Tipo Via</th>
                                <th>Nombre de Via</th>
                                <th>Número</th>
                                <th>Tipo Interior</th>
                                <th>Nº Interior</th>
                                <th>Manzana</th>
                                <th>Lote</th>
                                <th>Nombre de Hab. Urb.</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($titulares as $titular)
                                <tr>
                                    <td>{{$titular->lote->cuc}}</td>
                                    <td>{{$titular->cuc_ficha}}</td>
                                    <td>
                                        @foreach($titular->titularesPersonalizados() as $titular1)
                                            {{ $titular1->nombres }}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($titular->titularesPersonalizados() as $titular1)
                                            {{ $titular1->porc_cotitular }}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($titular->titularesPersonalizados() as $titular1)
                                            {{ $titular1->nume_doc }}<br>
                                        @endforeach
                                    </td>
                                    <td>{{$titular->puertaPersonalizada?->tipo_via}}</td>
                                    <td>{{$titular->puertaPersonalizada?->nomb_via}}</td>
                                    <td>{{$titular->puertaPersonalizada?->nume_muni}}</td>
                                    <td>{{$titular->tipo_interior}}</td>
                                    <td>{{$titular->nume_interior}}</td>
                                    <td>{{$titular->lote->manzana->codi_mzna}}</td>
                                    <td>{{$titular->lote->codi_lote}}</td>
                                    <td>{{$titular->lote?->hab_urbana?->nomb_hab_urba}}</td>
                                    <td>{{$titular->area_seleccionada}}</td>
                                    <td>{{$titular->total_construcciones}}</td>
                                    <td>{{$titular->usoUniCat()?->desc_uso}}</td>
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

@push('custom-scripts')
<script type="text/javascript">
    function updateLink() {
        var sectorValue = $('#buscarSector').val();
        var newUrl = '{{ route('pdf.anexoficha', '') }}' + '/' + sectorValue;
        $('#printLink').attr('href', newUrl);
    }
    function updateLinkExcel() {
        var sectorValue = $('#buscarSector').val();
        var newUrl = '{{ route('excel.anexoficha', '') }}' + '/' + sectorValue;
        $('#printLinkExcel').attr('href', newUrl);
    }
</script>




@endpush
