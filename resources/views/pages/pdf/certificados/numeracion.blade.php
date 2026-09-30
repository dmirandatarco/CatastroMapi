<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"></head><body>
@include('pages.pdf.certificados.estilos')
<style>.foto { max-height: 34mm; max-width: 76mm; }</style>
<p class="small" style="text-align:justify">BASE LEGAL: RESOLUCIÓN DIRECTORAL N° 011-2021-VIVIENDA/VMVU-DGPRVU, LEY ORGÁNICA DE MUNICIPALIDADES Nº 27972, LEY DE REGULACIÓN DE HABILITACIONES URBANAS Y DE EDIFICACIONES Nº 29090.</p>
<p class="small"><b>EL SUBGERENTE DE INFRAESTRUCTURA Y DESARROLLO TERRITORIAL Y LA JEFATURA DE LA UNIDAD DE CATASTRO Y DESARROLLO URBANO Y RURAL DE LA MUNICIPALIDAD DISTRITAL DE MACHUPICCHU, DAN A CONOCER:</b></p>
<table class="borde compacto"><tr><td class="titulo" style="background:#ffc400">CERTIFICADO DE NUMERACIÓN</td></tr></table>
<table class="borde compacto"><tr><td>CERTIFICADO Nº {{ $datos['numero'] }}</td><td>FUT Nº {{ $datos['fut'] }}</td><td>EXPEDIENTE Nº {{ $datos['expediente'] }}</td></tr></table>
<table class="borde compacto"><tr><td width="20%"><b>SOLICITANTE:</b></td><td>{{ $datos['solicitante'] }}</td></tr></table>
@if(!empty($datos['titulares']))
<table class="borde compacto"><tr><td width="20%"><b>TITULARES:</b></td><td>{!! nl2br(e($datos['titulares'])) !!}</td></tr></table>
@else
<table class="borde compacto"><tr><td><b>PROPIETARIO</b></td><td>{{ $datos['propietario'] !== '' && $datos['propietario'] !== null ? number_format((float)$datos['propietario'], 2) : '—' }} %</td><td><b>COPROPIETARIO</b></td><td>{{ $datos['copropietario'] !== '' && $datos['copropietario'] !== null ? number_format((float)$datos['copropietario'], 2) : '—' }} %</td></tr></table>
@endif
<table class="borde compacto"><tr><td><b>UBICACIÓN</b></td><td>{{ $datos['direccion'] }}</td><td><b>SECTOR</b> {{ $datos['sector'] }}</td><td><b>MZN.</b> {{ $datos['manzana'] }}</td><td><b>LOTE</b> {{ $datos['lote'] }}</td></tr></table>
<table class="borde compacto small"><tr><td><b>UBIGEO</b> {{ $datos['ubigeo'] }}</td><td><b>DEPARTAMENTO</b> CUSCO</td><td><b>PROVINCIA</b> URUBAMBA</td><td><b>DISTRITO</b> MACHUPICCHU</td></tr></table>
<table class="borde compacto" style="margin-top:4mm"><tr><td><b>1. INFORME:</b> {{ $datos['informe'] ?: '—' }}</td></tr></table>
<table class="borde compacto">
    <tr><td width="50%"><b>2. NÚMERO MUNICIPAL ASIGNADO</b></td><td class="numero">Nro. {{ $datos['numero_municipal'] }}</td></tr>
    @foreach(['via' => '3. NOMBRE DE VÍA', 'tipo_numero' => '4. TIPO DE NÚMERO MUNICIPAL', 'tipo_puerta' => '5. TIPO DE PUERTA', 'tipo_numeracion' => '6. TIPO DE NUMERACIÓN', 'estado_numeracion' => '7. ESTADO DE NUMERACIÓN', 'cuadra' => '8. NÚMERO DE CUADRA DONDE SE ENCUENTRA ASIGNADO EL NÚMERO MUNICIPAL'] as $key => $label)
        <tr><td><b>{{ $label }}</b></td><td class="centro">{{ $datos[$key] }}</td></tr>
    @endforeach
    <tr><td><b>9. COORDENADAS DEL NÚMERO MUNICIPAL (UTM)</b></td><td class="centro">ESTE (X): {{ $datos['este'] ?: '—' }}<br>NORTE (Y): {{ $datos['norte'] ?: '—' }}</td></tr>
    <tr><td><b>10. LADO DONDE SE ENCUENTRA ASIGNADO EL NÚMERO MUNICIPAL EN RELACIÓN AL SENTIDO DE LA VÍA</b></td><td class="centro">{{ $datos['lado'] }}</td></tr>
    <tr><td class="centro"><img class="foto" src="{{ $imagenes['foto'] }}"></td><td class="centro">@if(isset($imagenes['plano']))<img class="foto" src="{{ $imagenes['plano'] }}">@else<span class="small">Plano pendiente</span>@endif</td></tr>
    <tr><th>VISTA FRONTAL</th><th>PLANO DE UBICACIÓN DE PUERTAS</th></tr>
</table>
<table class="borde compacto small"><tr><td><b>11. RECIBO Nº</b> {{ $datos['recibo'] }}</td><td><b>MONTO</b> S/. {{ number_format((float)$datos['monto_recibo'], 2) }}</td><td><b>FECHA</b> {{ \Carbon\Carbon::parse($datos['fecha_recibo'])->format('d/m/Y') }}</td></tr></table>
<table class="borde"><tr><td><b>OBSERVACIONES</b></td></tr><tr><td class="small">
    <div>{!! nl2br(e($datos['observaciones'])) !!}</div>
    @if(empty($datos['observaciones_fijas']))
    <div>EL PRESENTE CERTIFICADO NO ACREDITA EL DERECHO DE PROPIEDAD NI TITULARIDAD SOBRE EL PREDIO AL SOLICITANTE.</div>
    <div>SE OTORGA A PETICIÓN DEL SOLICITANTE Y CONSTITUYE UN DOCUMENTO ÚNICAMENTE CON FINES DE IDENTIFICACIÓN PREDIAL.</div>
    @endif
</td></tr></table>
<p class="derecha">Machupicchu, {{ \Carbon\Carbon::parse($datos['fecha'])->locale('es')->translatedFormat('d \d\e F \d\e Y') }}</p>
</body></html>
