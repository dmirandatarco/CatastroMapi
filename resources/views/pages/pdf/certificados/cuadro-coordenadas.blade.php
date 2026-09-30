<table class="borde small" style="font-size:6.5pt">
    <thead>
        <tr><th colspan="6">CUADRO DE COORDENADAS {{ $datos['sistema_coordenadas'] }}@if($totalHojas > 1) · HOJA {{ $hoja }} DE {{ $totalHojas }}@endif</th></tr>
        <tr><th>VÉRTICE</th><th>LADO</th><th>DIST.</th><th>ÁNGULO</th><th>ESTE</th><th>NORTE</th></tr>
    </thead>
    <tbody>
        @foreach($filas as $fila)
            <tr>@foreach(explode('|', $fila) as $celda)<td style="padding:0.5mm 1.5mm">{{ trim($celda) }}</td>@endforeach</tr>
        @endforeach
        @if($totalHojas > 1)
            @for($i = count($filas); $i < 10; $i++)
                <tr>@for($col = 0; $col < 6; $col++)<td style="padding:0.5mm 1.5mm">&nbsp;</td>@endfor</tr>
            @endfor
        @endif
    </tbody>
</table>
