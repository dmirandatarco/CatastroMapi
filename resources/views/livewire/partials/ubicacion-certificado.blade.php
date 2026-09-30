<section class="cc-panel">
    <h5>Plano y coordenadas</h5>
    <p class="cc-description">Se consultan automáticamente para el lote de esta ficha.</p>
    @if($tipoUbicacion === 'numeracion')
        <p class="cc-fixed mt-2">El plano muestra los números registrados en el servicio, incluido S/N. El número asignado en esta solicitud no cambia esos rótulos automáticamente.</p>
    @endif
    @if($ubicacion['estado'] === 'pendiente')
        <div class="cc-empty mt-3">Consultando la ubicación del predio…</div>
    @else
        @if($ubicacion['plano'])
            <img class="cc-photo mt-3" style="height:auto;max-height:280px" src="{{ route('certificados.plano', ['ficha' => $fichaanterior, 'tipo' => $tipoUbicacion, 'puerta' => $puertaSeleccionada]) }}" alt="Plano catastral del lote">
        @else
            <div class="cc-empty mt-3">Plano pendiente · puedes generar el certificado</div>
        @endif
        @foreach($ubicacion['advertencias'] as $advertencia)
            <p class="cc-fixed mt-2 text-warning">{{ $advertencia }}</p>
        @endforeach
        @if(!empty($ubicacion['datos']['coordenadas']))
            <details class="mt-3"><summary>Ver cuadro de coordenadas · UTM 18S</summary>
                <div class="table-responsive mt-2"><table class="table table-sm" style="font-size:11px">
                    <thead><tr>@foreach(['Vértice', 'Lado', 'Dist.', 'Ángulo', 'Este', 'Norte'] as $columna)<th>{{ $columna }}</th>@endforeach</tr></thead>
                    <tbody>@foreach(explode("\n", $ubicacion['datos']['coordenadas']) as $fila)<tr>@foreach(explode('|', $fila) as $celda)<td>{{ trim($celda) }}</td>@endforeach</tr>@endforeach</tbody>
                </table></div>
            </details>
        @endif
        @if(isset($ubicacion['datos']['este'], $ubicacion['datos']['norte']))
            <div class="cc-fixed mt-3">Puerta seleccionada · UTM 18S<br>Este: {{ $ubicacion['datos']['este'] }}<br>Norte: {{ $ubicacion['datos']['norte'] }}</div>
        @endif
    @endif
</section>
