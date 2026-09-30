<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"></head><body>
@include('pages.pdf.certificados.estilos')
<hr>
<div class="titulo" style="font-size:13pt">CERTIFICADO NEGATIVO CATASTRAL Nº {{ $datos['numero'] }}</div>
<p class="centro small"><b>SUBGERENCIA DE INFRAESTRUCTURA Y DESARROLLO TERRITORIAL<br>UNIDAD DE CATASTRO Y DESARROLLO URBANO Y RURAL DE LA MUNICIPALIDAD DISTRITAL DE MACHUPICCHU, CERTIFICA QUE:</b></p>
<table class="borde"><tr><th width="28%">TITULARES / COTITULARES</th><th>{!! nl2br(e($datos['titulares'])) !!}</th></tr></table>
<table><tr>
    <td width="49%" style="vertical-align:top;padding:0 2mm 0 0">
        <table class="borde compacto centro small">
            <tr><th colspan="5">CÓDIGO DE REFERENCIA CATASTRAL</th></tr>
            <tr><th colspan="2">UBIGEO</th><th>SECTOR</th><th>MANZANA</th><th>LOTE</th></tr>
            <tr><td colspan="2">{{ $datos['ubigeo'] }}</td><td>{{ $datos['sector'] }}</td><td>{{ $datos['manzana'] }}</td><td>{{ $datos['lote'] }}</td></tr>
        </table>
        <b>DATOS DEL PREDIO</b>
        <table class="compacto small">
            @if(!empty($datos['naturaleza']))<tr><td><b>NATURALEZA</b></td><td>{{ $datos['naturaleza'] }}</td></tr>@endif
            @foreach(['direccion' => 'DIRECCIÓN', 'sector' => 'SECTOR CAT.', 'manzana' => 'MANZANA CAT.', 'lote' => 'LOTE CAT.'] as $key => $label)
                <tr><td width="36%"><b>{{ $label }}</b></td><td>{{ $datos[$key] }}</td></tr>
            @endforeach
            <tr><td><b>ÁREA</b></td><td>{{ number_format((float)$datos['area'], 2) }} m²</td></tr>
            <tr><td><b>PERÍMETRO</b></td><td>{{ number_format((float)$datos['perimetro'], 2) }} m</td></tr>
        </table>
        <div class="small"><b>OBSERVACIONES:</b><br>{!! nl2br(e($datos['observaciones'])) !!}</div>
        <p class="small"><b>SE EXPIDE EL PRESENTE DOCUMENTO A SOLICITUD DE:<br>{{ $datos['solicitante'] }}</b></p>
        <table style="margin:0">
            <tr><td class="centro" style="padding:0"><img src="{{ $imagenes['foto'] }}" style="max-width:81mm;max-height:48mm"></td></tr>
            <tr><td class="nota" style="padding:2mm 0 3mm;line-height:1.3">{{ $datos['leyenda_foto'] }}</td></tr>
        </table>
    </td>
    <td width="51%" style="vertical-align:top;padding:0 0 0 1mm">
        <table style="margin:0">
            @if(isset($imagenes['plano']))
                <tr><td class="centro" style="padding:0"><img src="{{ $imagenes['plano'] }}" style="max-width:86mm;max-height:67mm"></td></tr>
            @else
                <tr><td style="height:67mm;border:0.2mm solid #ddd;">&nbsp;</td></tr>
            @endif
            <tr><td class="nota" style="padding:2mm 0 3mm;line-height:1.3">{{ $datos['leyenda_plano'] }}</td></tr>
        </table>
        @if(empty($datos['coordenadas']))<div class="centro small">{{ $datos['sistema_coordenadas'] }}</div>@endif
        <div class="centro"><img src="{{ public_path('img/certificados/leyenda.png') }}" style="width:54mm"></div>
        @if(!empty($datos['coordenadas']))
            <table class="borde small" style="font-size:6.5pt">
                <tr><th colspan="6">CUADRO DE COORDENADAS {{ $datos['sistema_coordenadas'] }}</th></tr>
                <tr><th>VÉRTICE</th><th>LADO</th><th>DIST.</th><th>ÁNGULO</th><th>ESTE</th><th>NORTE</th></tr>
                @foreach(preg_split('/\r\n|\r|\n/', trim($datos['coordenadas'])) as $fila)
                    <tr>@foreach(explode('|', $fila) as $celda)<td>{{ trim($celda) }}</td>@endforeach</tr>
                @endforeach
            </table>
        @endif
    </td>
</tr></table>
<p class="small"><b>BASE LEGAL:</b> Ley N° 28294; Resolución Ministerial N° 155-2006-VIVIENDA; Ordenanza Municipal N° 013-2026-MDM/CM; Decreto Supremo N° 005-2018-JUS.</p>
<p class="small"><b>RECIBO DE PAGO Nº {{ $datos['recibo'] }}</b> de fecha {{ \Carbon\Carbon::parse($datos['fecha_recibo'])->locale('es')->translatedFormat('d \d\e F \d\e Y') }}.</p>
<table class="borde"><tr><th class="small">EL PRESENTE DOCUMENTO CERTIFICA LA EXISTENCIA Y CARACTERÍSTICAS FÍSICAS DEL PREDIO MAS NO ACREDITA, NI GENERA DERECHOS DE PROPIEDAD, NI SANEA LOS VICIOS QUE PUDIESE CONTENER LA DEFINICIÓN DE LOS LINDEROS DEL BIEN INMUEBLE.</th></tr></table>
<p class="derecha" style="margin-top:3mm">Machupicchu, {{ \Carbon\Carbon::parse($datos['fecha'])->locale('es')->translatedFormat('d \d\e F \d\e Y') }}.</p>
</body></html>
