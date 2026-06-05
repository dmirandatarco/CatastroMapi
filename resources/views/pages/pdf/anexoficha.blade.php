<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ficha Informativa</title>
    <style>
        body {
            background-color: #FFF;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 9px;
            font-weight: normal;
            margin: 5px;
            color: #151b1e;
            TEXT-TRANSFORM: UPPERCASE;

        }

        div {
            border: 0.5px solid;
        }

        .bprueba {
            background-color: #333;
        }

        .numeros {
            background-color: #777777;
            color: #000;
            width: 15px;
            height: 15px;
            border: none;
            float: left;
        }

        .numerosblanco {
            background-color: #fff;
            color: #000;
            width: 15px;
            height: 15px;
            border: none;
            float: left;
        }

        .textotop {
            background-color: #FFF;
            color: #000;
            width: 80px;
            height: 15px;
            border: none;
            float: left;
        }

        .texto {
            float: right;
            border: none;

            text-align: center;
            vertical-align: middle;
        }

        .texto2 {
            float: right;

            text-align: center;
            vertical-align: middle;
        }

        .textotitulo {
            float: right;
            border: none;
            font-weight: bold;
            text-align: left;
            vertical-align: middle;
        }

        .ti {
            text-align: left;
        }

        .td {
            text-align: right;
        }

        .tc {
            text-align: center;
        }

        .pr5 {
            padding-right: 5px;
        }

        .pr15 {
            padding-right: 15px;
        }

        .pr25 {
            padding-right: 25px;
        }

        .pl5 {
            padding-left: 5px;
        }

        .pl15 {
            padding-left: 15px;
        }

        .pl25 {
            padding-left: 25px;
        }

        .ptb5 {
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .ptb10 {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .fondoclaro {
            background-color: #7effff;
        }

        .fondoclarito {
            background-color: #ffff7e;
            color: #c62200;

        }

        .fz4 {

            font-weight: bolder;
            font-size: 6px !important;
        }

        .fz5 {

            font-weight: bolder;
            font-size: 7px !important;
        }

        .fz6 {

            font-weight: bolder;
            font-size: 8px !important;
        }

        .fz7 {

            font-weight: bolder;
            font-size: 9px !important;
        }

        .fz8 {

            font-weight: bolder;
            font-size: 10px !important;
        }

        .fz10 {

            font-weight: bolder;
            font-size: 12px !important;
        }

        .fz12 {

            font-weight: bolder;
            font-size: 14px !important;
        }

        .fz14 {

            font-weight: bolder;
            font-size: 16px !important;
        }

        .fz16 {

            font-weight: bolder;
            font-size: 18px !important;
        }

        .fz18 {

            font-weight: bolder;
            font-size: 20px !important;
        }

        .lh2 {
            line-height: 2px;
        }

        .lh4 {
            line-height: 4px;
        }

        .lh6 {
            line-height: 6px;
        }

        .lh7 {
            line-height: 7px;
        }

        .lh8 {
            line-height: 8px;
        }

        .lh10 {
            line-height: 10px;
        }

        .lh12 {
            line-height: 12px;
        }

        .lh14 {
            line-height: 14px;
        }

        .lh16 {
            line-height: 16px;
        }

        .lh18 {
            line-height: 18px;
        }

        .lh20 {
            line-height: 20px;
        }

        .bn {
            border: none !important;
        }

        .bp {
            background-color: #342;
        }

        #pagebreak1 {
            page-break-after: always;
        }

        .bgfdc {
            background-color: #195186;
            color: #fff;
        }

        .bgfdd {
            background-color: #CFCFE9;
        }








        .table {
            display: table;
            width: 100%;
            max-width: 100%;
            margin-bottom: 0.3rem;
            background-color: transparent;
            border-collapse: collapse;
        }

        thead {
            display: table-header-group;
            vertical-align: middle;
            border-color: inherit;
        }

        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
        }

        .table th,
        .table td {
            padding: 0.3rem;
            vertical-align: top;
        }

        .table thead th {
            vertical-align: bottom;
            background-color: #195186;
            color: #fff;
            border: 1px solid #fff;
        }

        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 1px;
        }

        th,
        td {
            display: table-cell;
            vertical-align: inherit;
            line-height: 1.6;
        }

        th {
            font-weight: bold;
            text-align: -internal-center;
            text-align: left;
            line-height: 1.6;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody {
            vertical-align: middle;
            border-color: inherit;
        }
    </style>

</head>

<body>

   <div style="width:100%; border:0;">

        <table style="width:100%; border-collapse:collapse; table-layout:fixed; border:0;">
            <tr>
            <!-- Logo izquierda -->
            <td style="width:120px; text-align:center; vertical-align:middle; border:0;">
                @if($logos?->logo_institucion)
                <img src="{{ $logos?->logo_institucion }}" alt="Logo izquierda"
                    style="max-width:110px; height:auto; display:inline-block; border:0;">
                @endif
            </td>

            <!-- Centro -->
            <td style="text-align:center; vertical-align:middle; padding:4px 8px; border:0;">
                <div style="font-family:Arial,Helvetica,sans-serif; font-size:20px; line-height:1.2; text-transform:uppercase; border:0;">
                <b style="color:#195186; border:0;">Municipalidad Distrital de MACHUPICCHU</b>
                </div>

                <div style="font-family:Arial,Helvetica,sans-serif; font-size:14px; line-height:1.2; text-transform:uppercase; border:0;">
                Cusco – Perú
                </div>

                <div style="font-family:Arial,Helvetica,sans-serif; font-size:12px; line-height:1.4; text-transform:uppercase; margin-top:2px; border:0;">
                Gerencia de Desarrollo Urbano y Rural<br>
                Fecha: {{ $fecha }} / Hora: {{ $hora }}
                </div>

                <table style="width:100%; border-collapse:collapse;  border:0;">
                    <tr>
                        <td style="background:#195186; color:#fff; text-align:center; border:0;">
                        <span style="font-family:Arial,Helvetica,sans-serif; font-size:20px; font-weight: bold;
                                    text-transform:uppercase;">
                            Reporte de Titulares Catastral
                        </span>
                        </td>
                    </tr>
                </table>
            </td>

            <!-- Logo derecha -->
            <td style="width:120px; text-align:center; vertical-align:middle; border:0;">
                @if($logos?->logo_catastro)
                <img src="{{ $logos?->logo_catastro }}" alt="Logo derecha"
                    style="max-width:110px; height:auto; display:inline-block; border:0;">
                @endif
            </td>
            </tr>
        </table>

    </div>


    <br></br>
    <div style="width: 100%;border: 0;">
        <table style="width: 100%;">
            <tr>
                <td style="width: 25%;">
                    <div style="text-align:left;" class="texto fz10 lh10">
                        <b>DEPARTAMENTO:</b> CUSCO
                    </div>
                </td>
                <td style="width: 25%;">
                    <div style="text-align:left;" class="texto fz10 lh10">
                            <b>PROVINCIA:</b> URUBAMBA
                    </div>
                </td>
                <td style="width: 25%;">
                    <div style="text-align:left;" class="texto fz10 lh10">
                            <b>DISTRITO:</b> MACHUPICCHU
                    </div>
                </td>
                <td style="width: 25%;">
                    <div style="text-align:left;" class="texto fz10 lh10">
                        <b>SECTOR:</b> {{$sectores?->nomb_sector}}
                    </div>
                </td>
            </tr>
        </table>

    </div>


    <div style="margin-top:10px;width: 1080px;height:100px;  float:left;" class="bn">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th rowspan="2">CUC Lote</th>
                    <th rowspan="2">CUC Und. Catastral</th>
                    <th rowspan="2">Titular(es) Catastral(es)</th>
                    <th rowspan="2">% Prop.</th>
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
                    <th>Mnza.</th>
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



    <div style="width: 1080px;height:20px;  float:left;" class="bn">

    </div>




</body>

</html>
