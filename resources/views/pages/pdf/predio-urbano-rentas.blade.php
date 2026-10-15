<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hoja Predio Urbano</title>
    <style>
        body { font-family: sans-serif; font-size: 9pt; color: #111; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 0.2mm solid #777; padding: 2mm; vertical-align: middle; }
        th { background: #eeeaf0; font-weight: bold; }
        .cabecera td { border: 0; padding: 2mm 1mm 5mm; }
        .cabecera .titulo td { border: 0.4mm solid #55435d; text-align: center; padding: 4mm 2mm; }
        .datos { margin-bottom: 4mm; }
        .construcciones { text-align: center; font-size: 8pt; }
        .construcciones th { padding: 3mm 1mm; }
    </style>
</head>
<body>
    <table class="cabecera">
        <tr>
            <td style="width: 24%">
                <img src="{{ public_path('img/logomuni.png') }}" style="width: 38mm" alt="Municipalidad Distrital de Machupicchu">
                <div style="font-size: 8pt; margin-top: 2mm"><strong>MUNICIPALIDAD DISTRITAL DE MACHUPICCHU</strong></div>
            </td>
            <td style="width: 48%">
                <strong>{{ $ficha->lote?->hab_urbana?->nomb_hab_urba }}</strong><br>
                @foreach ($ficha->puertas as $puerta)
                    {{ $puerta->via?->tipo_via }} {{ $puerta->via?->nomb_via }} {{ $puerta->nume_muni }}<br>
                @endforeach
                {{ $ficha->unicat?->codi_cont_rentas }}
            </td>
            <td style="width: 28%"><table class="titulo"><tr><td><strong style="font-size: 23pt">P.U. {{ $anio }}</strong><br><strong>Hoja Predio Urbano</strong></td></tr></table></td>
        </tr>
    </table>
    <div style="margin-bottom: 4mm">
        <strong>TITULARES</strong>
        @foreach ($titularesPu as $titular)
            <div>{{ $titular->persona?->tipo_persona == '2' ? $titular->persona?->razon_social : trim($titular->persona?->nombres.' '.$titular->persona?->ape_paterno.' '.$titular->persona?->ape_materno) }}</div>
        @endforeach
    </div>
    <table class="datos">
        <tr><th>Id. Predio</th><th>Id. Catastro</th><th>Condición de propiedad</th><th>Datos relativos al predio</th></tr>
        <tr>
            <td>{{ $ficha->unicat?->codi_pred_rentas }}</td>
            <td>{{ $ficha->id_uni_cat }}</td>
            <td>{{ $titularesPu->pluck('condiciontitular.desc_codigo')->filter()->unique()->implode(', ') }}</td>
            <td>{{ $ficha->construccions->map(fn ($construccion) => $descripcion('ECC', $construccion->ecc))->filter()->unique()->implode(', ') }} {{ $descripcion('CDP', $ficha->fichaindividual?->clasificacion) }}</td>
        </tr>
    </table>
    <table class="construcciones">
        <thead>
            <tr>
                <th rowspan="2" style="width: 6%">N° piso</th>
                <th rowspan="2" style="width: 9%">Antigüedad<br>en años</th>
                <th colspan="3">Categorías</th>
                <th rowspan="2" style="width: 11%">Área construida<br>(m²)</th>
                <th colspan="3">Datos para la depreciación</th>
            </tr>
            <tr>
                <th style="width: 10%">Muros y columnas</th><th style="width: 7%">Techos</th><th style="width: 10%">Puertas y ventanas</th>
                <th style="width: 15%">Clasificación</th><th style="width: 12%">Material estructural predominante</th><th style="width: 14%">Estado de conservación</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ficha->construccions as $construccion)
                <tr>
                    <td>{{ $construccion->nume_piso }}</td>
                    <td>{{ $construccion->fecha && (int) substr($construccion->fecha, 0, 4) > 0 && (int) substr($construccion->fecha, 0, 4) <= $anio ? $anio - (int) substr($construccion->fecha, 0, 4) : '' }}</td>
                    <td>{{ $construccion->estr_muro_col }}</td><td>{{ $construccion->estr_techo }}</td><td>{{ $construccion->acab_puerta_ven }}</td>
                    <td>{{ $construccion->area_verificada !== null ? number_format($construccion->area_verificada, 2, '.', ',') : '' }}</td>
                    <td>{{ $descripcion('CDP', $ficha->fichaindividual?->clasificacion) }}</td><td>{{ $descripcion('MEP', $construccion->mep) }}</td><td>{{ $descripcion('ECS', $construccion->ecs) }}</td>
                </tr>
            @empty
                <tr><td colspan="9">Sin construcciones registradas.</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
