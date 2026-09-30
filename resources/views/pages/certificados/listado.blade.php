@extends('layout.master')
@section('content')
@php
    $nombre = $tipo === 'catastral' ? 'catastral' : 'de numeración';
    $rutaSeleccion = $tipo === 'catastral' ? 'generarcatastral.indexgenerarcatastral' : 'generarnumeracion.indexgenerarcertificado';
    $rutaHistorial = $tipo === 'catastral' ? 'generarcatastral.reportegenerarcatastral' : 'generarnumeracion.reportegenerarcertificado';
    $rutaCrear = $tipo === 'catastral' ? 'ficha.generarcatastralcreate' : 'ficha.generarnumeracioncreate';
    $rutaPdf = $tipo === 'catastral' ? 'pdf.certificado' : 'pdf.numeracion';
@endphp
<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
    <div><h4 class="mb-2">{{ $historial ? 'Historial de certificados '.$nombre : 'Crear certificado '.$nombre }}</h4><p class="text-muted mb-0">{{ $historial ? 'Consulta las emisiones y abre sus certificados.' : 'Busca la ficha individual del predio para continuar.' }}</p></div>
    <a class="btn {{ $historial ? 'btn-primary' : 'btn-outline-primary' }}" href="{{ route($historial ? $rutaSeleccion : $rutaHistorial) }}">{{ $historial ? 'Crear certificado' : 'Ver historial' }}</a>
</div>
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
@if(session('advertencias'))<div class="alert alert-warning">@foreach(session('advertencias') as $advertencia)<div>{{ $advertencia }}</div>@endforeach</div>@endif
@if($errors->any())<div class="alert alert-danger">@foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div>@endif
<div class="card mb-4"><div class="card-body">
    <form method="GET" action="{{ route($historial ? $rutaHistorial : $rutaSeleccion) }}">
        <div class="row align-items-end g-3">
            <div class="col-md-3"><label class="form-label" for="buscarSector">Sector</label><select class="form-select" name="buscarSector" id="buscarSector"><option value="0">Todos los sectores</option>@foreach($sectores as $sector)<option value="{{ $sector->id_sector }}" @selected(($filtros['buscarSector'] ?? '0') == $sector->id_sector)>{{ $sector->codi_sector }} · {{ $sector->nomb_sector }}</option>@endforeach</select></div>
            <div class="col-md-3"><label class="form-label" for="buscarManzana">Manzana</label><select class="form-select" name="buscarManzana" id="buscarManzana"><option value="0">Todas las manzanas</option>@foreach($manzanas as $manzana)@if(empty($filtros['buscarSector']) || $filtros['buscarSector'] == $manzana->id_sector)<option value="{{ $manzana->id_mzna }}" @selected(($filtros['buscarManzana'] ?? '0') == $manzana->id_mzna)>{{ $manzana->codi_mzna }}</option>@endif @endforeach</select></div>
            <div class="col-md-3"><label class="form-label" for="buscarFicha">Número de ficha individual</label><input class="form-control" id="buscarFicha" name="buscarFicha" inputmode="numeric" pattern="[0-9]{1,7}" maxlength="7" placeholder="Ej. 125" value="{{ $filtros['buscarFicha'] ?? '' }}"></div>
            <div class="col-md-3 d-flex gap-2"><button class="btn btn-primary" type="submit">Buscar</button><a class="btn btn-light" href="{{ route($historial ? $rutaHistorial : $rutaSeleccion) }}">Limpiar</a></div>
        </div>
    </form>
</div></div>
<div class="card"><div class="card-body">
    <p class="text-muted">{{ $registros->total() }} {{ $historial ? 'certificados' : 'fichas' }} encontrados</p>
    <div class="table-responsive"><table class="table align-middle"><thead><tr>@if($historial)<th>Certificado</th><th>Fecha</th>@endif<th>Ficha individual</th><th>Sector</th><th>Manzana</th><th>Lote</th><th class="text-end">Acción</th></tr></thead><tbody>
        @forelse($registros as $registro)
            @php($ficha = $historial ? $registro->ficha : $registro)
            <tr>@if($historial)<td>{{ $registro->numero_documento ?: $registro->id }}@if(data_get($registro->documento, 'geografia.advertencias'))<div class="small text-warning">Información geográfica pendiente</div>@endif</td><td>{{ $registro->fecha_emision }}</td>@endif
                <td>{{ $ficha?->nume_ficha ?? '—' }}</td>
                <td>{{ ($historial ? data_get($registro->documento, 'datos.sector') : null) ?? $ficha?->lote?->manzana?->sectore?->codi_sector ?? '—' }}</td>
                <td>{{ ($historial ? data_get($registro->documento, 'datos.manzana') : null) ?? $ficha?->lote?->manzana?->codi_mzna ?? '—' }}</td>
                <td>{{ ($historial ? data_get($registro->documento, 'datos.lote') : null) ?? $ficha?->lote?->codi_lote ?? '—' }}</td>
                <td class="text-end"><a class="btn btn-sm {{ $historial ? 'btn-outline-primary' : 'btn-primary' }}" href="{{ route($historial ? $rutaPdf : $rutaCrear, $registro) }}" @if($historial) target="_blank" rel="noopener" @endif>{{ $historial ? 'Abrir PDF' : 'Crear certificado' }}</a></td>
            </tr>
        @empty<tr><td colspan="{{ $historial ? 7 : 5 }}" class="text-center text-muted py-5">No hay resultados para los filtros seleccionados.</td></tr>@endforelse
    </tbody></table></div>
    {{ $registros->links('pagination::bootstrap-4') }}
</div></div>
@endsection
@push('custom-scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const sector = document.getElementById('buscarSector');
    const manzana = document.getElementById('buscarManzana');
    const opciones = @json($manzanas);
    sector.addEventListener('change', function () {
        manzana.replaceChildren(new Option('Todas las manzanas', '0'));
        opciones.filter(item => sector.value === '0' || String(item.id_sector) === sector.value)
            .forEach(item => manzana.add(new Option(item.codi_mzna, item.id_mzna)));
    });
});
</script>
@endpush
