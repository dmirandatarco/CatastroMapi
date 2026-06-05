<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ficha Catastral Individual</title>
    <style>
        body {
            background-color: #FFF;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 7px;
            font-weight: normal;
            margin: 5px;
            color: #151b1e;
            TEXT-TRANSFORM: UPPERCASE;

        }

        div {
            border: 0.5px solid;
        }

        .numeros {
            background-color: #777777;
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
            font-size: 11px;
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

        .fondoclaro {
            background-color: #a9e5ff;
        }

        .fondoclarito {
            background-color: #ffff7e;
            color: #c62200;

        }

        .fz4 {

            font-weight: bolder;
            font-size: 4px !important;
        }

        .fz6 {

            font-weight: bolder;
            font-size: 6px !important;
        }

        .fz7 {

            font-weight: bolder;
            font-size: 7px !important;
        }

        .fz8 {

            font-weight: bolder;
            font-size: 8px !important;
        }

        .fz10 {

            font-weight: bolder;
            font-size: 10px !important;
        }

        .fz12 {

            font-weight: bolder;
            font-size: 12px !important;
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

        .resumen {
            page-break-after: always;
        }
    </style>

</head>

<body>
    @foreach ($fichas as $ficha)

        <div style="width: 716px;height:16px;margin: auto;border:none;">
            <div style="width: 150;height: 16px;float:right;" class="fondoclaro tc">
                <div class="textotop">
                    NÚMERO DE FICHA
                </div>
                <div class="texto fz8 lh14">
                    {{ $ficha?->nume_ficha }}
                </div>
            </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;border:none;">
            <div style="width: 150px;height: 16px;float:right;" class="fondoclaro">
                <div style="width: 150px;height: 8px;float:right;" class="textotop tc">
                    CONTADOR DE FICHAS POR LOTE
                </div>
                <div style="width: 150px;height: 8px;float:right;border:none;" class="fondoclaro">
                    <div style="width: 150px;height: 8px;float:left;" class="fondoclaro">
                        <div class="texto fz8 lh14">
                            {{ $ficha?->nume_ficha_lote }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="width: 316px;height:16px;margin: auto;border:none;" class="">
            <div class="texto fz12 lh14" style="font-weight:bold;">
                FICHA CATASTRAL URBANA INDIVIDUAL
            </div>
        </div>

        <div style="width: 716px;height:16px;margin: auto;border:none; margin-bottom:5px;background-color:#fff;">

            <div style="width: 120px;height: 120px;float:left;border:none;">
                <img src="{{ $logos?->logo_institucion }}" alt="">
            </div>

            <div style="width: 473px;height: 8px;float:left;border:none;">
                <div style="width: 230px;height:16px;margin: auto;">
                    <div style="width: 230px;height: 16px;float:left;" class="fondoclaro">
                        <div class="numeros">
                            01
                        </div>
                        <div class="texto fz8 lh14">
                            CÓDIGO ÚNICO CATASTRAL - CUC
                        </div>
                    </div>
                </div>
                <div style="width: 230px;height:16px;margin: auto;">
                    <div style="width: 230px;height: 16px;float:left;">
                        <div class="texto fz8 lh14">
                            {{ $ficha?->unicat?->cuc }}
                        </div>

                    </div>
                </div>

                <!-- fila 01-->
                <div style="width: 427px;height:16px;margin: auto;">
                    <div style="width: 427px;height: 16px;float:left;" class="fondoclaro">
                        <div class="numeros">
                            02
                        </div>
                        <div class="texto fz8 lh14">
                            CÓDIGO DE REFERENCIA CATASTRAL
                        </div>
                    </div>
                </div>
                <!-- fila 02-->

                <!-- fila 03-->
                <div style="width: 427px;height:16px;margin: auto;" class="fondoclaro">
                    <div style="width: 106px;height: 16px;float:left;border:none;">
                        <div style="width: 106px;height: 8px;float:left;">
                            <div class="texto fz4 lh6">
                                UBIGEO
                            </div>
                        </div>
                        <div style="width: 106px;height: 8px;float:left;border:none;">
                            <div style="width: 34px;height: 8px;float:left;">
                                <div class="texto fz4 lh6">
                                    DPTO.
                                </div>
                            </div>
                            <div style="width: 34px;height: 8px;float:left;">
                                <div class="texto fz4 lh6">
                                    PROV.
                                </div>
                            </div>
                            <div style="width: 34.9px;height: 8px;float:left;">
                                <div class="texto fz4 lh6">
                                    DIST.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="width: 35px;height: 16px;float:left;">
                        <div class="texto fz6 lh14">
                            SECTOR
                        </div>
                    </div>
                    <div style="width: 53px;height: 16px;float:left;">
                        <div class="texto fz6 lh14">
                            MANZANA
                        </div>
                    </div>
                    <div style="width: 51px;height: 16px;float:left;">
                        <div class="texto fz6 lh14">
                            LOTE
                        </div>
                    </div>
                    <div style="width: 35px;height: 16px;float:left;">
                        <div class="texto fz6 lh14">
                            EDIFICA
                        </div>
                    </div>
                    <div style="width: 34px;height: 16px;float:left;">
                        <div class="texto fz6 lh14">
                            ENTRADA
                        </div>
                    </div>
                    <div style="width: 35px;height: 16px;float:left;">
                        <div class="texto fz6 lh14">
                            PISO
                        </div>
                    </div>
                    <div style="width: 52px;height: 16px;float:left;">
                        <div class="texto fz6 lh14">
                            UNIDAD
                        </div>
                    </div>
                    <div style="width: 17.9px;height: 16px;float:left;">
                        <div class="texto fz6 lh14">
                            DC
                        </div>
                    </div>
                </div>
                <!-- fila 04-->
                <div style="width: 427px;height:16px;margin: auto;">
                    <div style="width: 106px;height: 16px;float:left;border:none;">
                        <div style="width: 106px;height: 16px;float:left;border:none;">
                            <div style="width: 34px;height: 16px;float:left;" class="texto2 fz8 lh14">
                                08
                            </div>
                            <div style="width: 34px;height: 16px;float:left;" class="texto2 fz8 lh14">
                                01
                            </div>
                            <div style="width: 34.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
                                08
                            </div>
                        </div>
                    </div>
                    <div style="width: 35px;height: 16px;float:left;" class="texto2 fz8 lh14">
                        {{ $ficha?->unicat?->edificacion?->lote?->manzana?->sectore?->codi_sector }}
                    </div>
                    <div style="width: 53px;height: 16px;float:left;" class="texto2 fz8 lh14">
                        {{ $ficha?->unicat?->edificacion?->lote?->manzana?->codi_mzna }}
                    </div>
                    <div style="width: 51px;height: 16px;float:left;" class="texto2 fz8 lh14">
                        {{ $ficha?->unicat?->edificacion?->lote?->codi_lote }}
                    </div>
                    <div style="width: 35px;height: 16px;float:left;" class="texto2 fz8 lh14">
                        {{ $ficha?->unicat?->edificacion?->codi_edificacion }}
                    </div>
                    <div style="width: 34px;height: 16px;float:left;" class="texto2 fz8 lh14">
                        {{ $ficha?->unicat?->codi_entrada }}
                    </div>
                    <div style="width: 35px;height: 16px;float:left;" class="texto2 fz8 lh14">
                        {{ $ficha?->unicat?->codi_piso }}
                    </div>
                    <div style="width: 52px;height: 16px;float:left;" class="texto2 fz8 lh14">
                        {{ $ficha?->unicat?->codi_unidad }}
                    </div>
                    <div style="width: 17.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
                        {{ $ficha?->dc }}
                    </div>
                </div>
                <!-- fila 05-->
                <div style="width: 427px;height:16px;margin: auto;">
                    <div style="width: 212px;height: 16px;float:left;" class="fondoclaro">
                        <div class="numeros">
                            03
                        </div>
                        <div class="texto fz8 lh14">
                            CÓD. CONTRIBUYENTE DE RENTAS
                        </div>
                    </div>
                    <div style="width: 212.9px;height: 16px;float:left;" class="fondoclaro">
                        <div class="numeros">
                            04
                        </div>
                        <div class="texto fz8 lh14">
                            CÓDIGO PREDIAL DE RENTAS
                        </div>
                    </div>
                </div>
                <div style="width: 427px;height:16px;margin: auto;">
                    <div style="width: 212px;height: 16px;float:left;" class="texto2 fz8 lh14">
                        {{ $ficha?->unicat?->codi_cont_rentas }}
                    </div>
                    <div style="width: 212.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
                        {{ $ficha?->unicat?->codi_pred_rentas }}
                    </div>
                </div>
            </div>

            <div style="width: 120px;height: 120px;float:left;border:none;">
                <img src="{{ $logos?->logo_catastro }}" alt="">
            </div>
        </div>
        <div style="height:102px; width:800px;background-color:#fff;border:none;margin-top:30px;margin-bottom:0px;">
            <div style="height:12px; width:315px; margin:auto;" class="bn">


                <div style="width: 150px;height:100px;float:left;" class="bn">
                    <img src="{{ 'storage/img/imageneslotes/' . $ficha?->fichaindividual?->imagen_lote }}"
                        alt="imglotes" style="width: 200px;height:150px;  object-fit: cover;">
                </div>
                <div style="width: 10px;height:100px;float:left;" class=" bn">
                </div>
                <div style="width: 150px;height:100px;float:left;" class="bn">
                    <img src="{{ 'storage/img/imagenesplanos/' . $ficha?->fichaindividual?->imagen_plano }}"
                        alt="imgplanos" style="width: 200px;height:150px;  object-fit: contain;">
                </div>
            </div>
        </div>

        <!-- fila 07-->
        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:0px;margin-bottom:0px;">
            <div class="textotitulo tl pl15">
                UBICACIÓN DEL PREDIO CATASTRAL
            </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 123px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    05
                </div>
                <div class="texto fz8 lh14">
                    CÓDIGO DE VIA
                </div>

            </div>
            <div style="width: 71px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    06
                </div>
                <div class="texto fz8 lh14">
                    TIPO DE VIA
                </div>
            </div>
            <div style="width: 320px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    07
                </div>
                <div class="texto fz8 lh14">
                    NOMBRE DE VIA
                </div>
            </div>
            <div style="width: 74px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    08
                </div>
                <div class="texto fz6 lh14">
                    TIPO DE PUERTA
                </div>
            </div>
            <div style="width: 76px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    09
                </div>
                <div class="texto fz6 lh14">
                    N° MUNICIPAL
                </div>
            </div>
            <div style="width: 46px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    10
                </div>
                <div class="texto fz5 lh6">
                    COND.<BR>
                    NUMER
                </div>
            </div>
        </div>
        <!-- INTERIOR 05 AL 10-->
        @foreach ($ficha?->puertas as $puerta)
            <div style="width: 716px;height:16px;margin: auto;">
                <div style="width: 123px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $puerta?->via?->codi_via }}
                </div>
                <div style="width: 71px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $puerta?->via?->tipo_via }}
                </div>
                <div style="width: 320px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $puerta?->via?->nomb_via }}
                </div>
                <div style="width: 74px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $puerta?->tipo_puerta }}
                </div>
                <div style="width: 76px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $puerta?->nume_muni }}
                </div>
                <div style="width: 46px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $puerta?->cond_nume }}
                </div>
            </div>
            <!-- INTERIOR 05 AL 10-->
        @endforeach
        <!-- 14 AL 17-->
        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 123px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    11
                </div>
                <div class="texto fz8 lh14">
                    TIPO DE EDIFICACION
                </div>
            </div>
            <div style="width: 138PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->unicat?->edificacion?->tipo_edificacion }}
            </div>
            <div style="width: 123px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    12
                </div>
                <div class="texto fz8 lh14">
                    TIPO DE INTERIOR
                </div>
            </div>
            <div style="width: 101px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->unicat?->tipo_interior }}
            </div>
            <div style="width: 123px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    13
                </div>
                <div class="texto fz8 lh14">
                    N° INTERIOR
                </div>
            </div>
            <div style="width: 101.9PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->unicat?->nume_interior }}
            </div>
        </div>
        <!-- 14 AL 17-->
        <!-- LEYENDA TIPO VIA TIPO PUERTA-->
        <div style="width: 716px;height:10px;margin: auto;">
            <div style="width: 185px;height: 10px;float:left; text-align:center;">
                TIPO DE VIA
            </div>
            <div style="width: 135px;height: 10px;float:left; text-align:center;">
                TIPO DE PUERTA
            </div>
            <div style="width: 131px;height: 10px;float:left; text-align:center;">
                CONDICION DE NUMERACION
            </div>
            <div style="width: 106px;height: 10px;float:left; text-align:center;">
                TIPO DE EDIFICACION
            </div>
            <div style="width: 154px;height: 10px;float:left; text-align:center;">
                TIPO DE INTERIOR
            </div>
        </div>
        <!-- LEYENDA TIPO VIA TIPO PUERTA-->
        <!-- LEYENDA TIPO VIA TIPO PUERTA-->
        <div style="width: 716px;height:41px;margin: auto;" class="fondoclarito">
            <div style="width: 185px;height: 41px;float:left;">
                <div style="width: 50%;height: 6px; font-size:6px;float:left;border:none;text-align:center;">
                    AV. AVENIDA
                </div>
                <div style="width: 50%;height: 6px; font-size:6px;float:left;border:none;text-align:center;">
                    OTRA CARRERA
                </div>
                <div style="width: 50%;height: 6px; font-size:6px;float:left;border:none;text-align:center;">
                    CA. CALLE
                </div>
                <div style="width: 50%;height: 6px; font-size:6px;float:left;border:none;text-align:center;">
                    PRLG. PROLONGACION
                </div>
                <div style="width: 50%;height: 6px; font-size:6px;float:left;border:none;text-align:center;">
                    JR. JIRON
                </div>
                <div style="width: 50%;height: 6px; font-size:6px;float:left;border:none;text-align:center;">
                    PS. PASEO
                </div>
                <div style="width: 50%;height: 6px; font-size:6px;float:left;border:none;text-align:center;">
                    PJE. PASAJE
                </div>
                <div style="width: 50%;height: 6px; font-size:6px;float:left;border:none;text-align:center;">
                    ML. MALECON
                </div>
                <div style="width: 50%;height: 6px; font-size:6px;float:left;border:none;text-align:center;">
                    AL. ALAMEDA
                </div>
                <div style="width: 50%;height: 6px; font-size:6px;float:left;border:none;text-align:center;">
                    CAM. CAMINO
                </div>
            </div>
            <div style="width: 135px;height: 41px;float:left;">

                <div style="width: 100%;height: 7PX; font-size:7PX;float:left;border:none;text-align:center;">
                    <div style="border:none;width:70%;float:left;">PRINCIPAL</div>
                    <div style="border:none;width:25%;float:right;">P</div>
                </div>
                <div style="width: 100%;height: 7PX; font-size:7PX;float:left;border:none;text-align:center;">
                    <div style="border:none;width:70%;float:left;">SECUNDARIA</div>
                    <div style="border:none;width:25%;float:right;">S</div>
                </div>
                <div style="width: 100%;height: 7PX; font-size:7PX;float:left;border:none;text-align:center;">
                    <div style="border:none;width:70%;float:left;">GARAGE </div>
                    <div style="border:none;width:25%;float:right;">G </div>
                </div>
                <div style="width: 100%;height: 7PX; font-size:7PX;float:left;border:none;text-align:center;">
                    <div style="border:none;width:70%;float:left;">ESTACIONAMIENTO</div>
                    <div style="border:none;width:25%;float:right;">E</div>
                </div>

            </div>
            <div style="width: 131px;height: 41px;float:left;">

                <div style="width: 100%;height: 7PX; font-size:7PX;float:left;border:none;text-align:center;">
                    <div style="border:none;width:25%;float:left;">01</div>
                    <div style="border:none;width:70%;float:right;">GENERADO POR MUNIC.</div>
                </div>
                <div style="width: 100%;height: 7PX; font-size:7PX;float:left;border:none;text-align:center;">
                    <div style="border:none;width:25%;float:left;">02</div>
                    <div style="border:none;width:70%;float:right;">AUT. GEN. POR EL TIT CAT.</div>
                </div>
                <div style="width: 100%;height: 7PX; font-size:7PX;float:left;border:none;text-align:center;">
                    <div style="border:none;width:25%;float:left;">03 </div>
                    <div style="border:none;width:70%;float:right;">GEN. POR EL TEC. CAT.</div>
                </div>
                <div style="width: 100%;height: 7PX; font-size:7PX;float:left;border:none;text-align:center;">
                    <div style="border:none;width:25%;float:left;">04</div>
                    <div style="border:none;width:70%;float:right;">SIN NUMERO</div>
                </div>
            </div>
            <div style="width: 106px;height: 41px;float:left;">

                <div style="width: 100%;height: 7PX; font-size:7PX;float:left;border:none;text-align:center;">
                    <div style="border:none;width:25%;float:left;">01</div>
                    <div style="border:none;width:70%;float:right;">BLOCK</div>
                </div>
                <div style="width: 100%;height: 7PX; font-size:7PX;float:left;border:none;text-align:center;">
                    <div style="border:none;width:25%;float:left;">02</div>
                    <div style="border:none;width:70%;float:right;">CASA / CHALET</div>
                </div>
                <div style="width: 100%;height: 7PX; font-size:7PX;float:left;border:none;text-align:center;">
                    <div style="border:none;width:25%;float:left;">03 </div>
                    <div style="border:none;width:70%;float:right;">EDIFICIO</div>
                </div>
                <div style="width: 100%;height: 7PX; font-size:7PX;float:left;border:none;text-align:center;">
                    <div style="border:none;width:25%;float:left;">04</div>
                    <div style="border:none;width:70%;float:right;">PABELLON</div>
                </div>

            </div>
            <div style="width: 154px;height: 41px;float:left;">

                <div style="width: 50%;height: 6px; font-size:6px;float:left;border:none;text-align:center;">
                    01 DEPARTAMENTO
                </div>
                <div style="width: 50%;height: 6px; font-size:6px;float:left;border:none;text-align:center;">
                    06 TENDAL
                </div>
                <div style="width: 50%;height: 6px; font-size:6px;float:left;border:none;text-align:center;">
                    02 CASA / CHALET
                </div>
                <div style="width: 50%;height: 6px; font-size:6px;float:left;border:none;text-align:center;">
                    07 TIENDA
                </div>
                <div style="width: 50%;height: 6px; font-size:6px;float:left;border:none;text-align:center;">
                    03 OFICINA
                </div>
                <div style="width: 50%;height: 6px; font-size:6px;float:left;border:none;text-align:center;">
                    08 PUERTO
                </div>
                <div style="width: 50%;height: 6px; font-size:6px;float:left;border:none;text-align:center;">
                    04 ESTACIONAMIENTO
                </div>
                <div style="width: 50%;height: 6px; font-size:6px;float:left;border:none;text-align:center;">
                    09 STAND
                </div>
                <div style="width: 50%;height: 6px; font-size:6px;float:left;border:none;text-align:center;">
                    05 DEPOSITO
                </div>
                <div style="width: 50%;height: 6px; font-size:6px;float:left;border:none;text-align:center;">
                    10 OTROS
                </div>

            </div>

        </div>
        <!-- LEYENDA TIPO VIA TIPO PUERTA-->
        <!-- 18 AL 23-->
        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 111px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    14
                </div>
                <div class="texto fz8 lh14">
                    CÓDIGO HU
                </div>
            </div>
            <div style="width: 222px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    15
                </div>
                <div class="texto fz8 lh14">
                    NOMBRE DE LA HABILITACIÓN URBANA
                </div>
            </div>
            <div style="width: 130px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    16
                </div>
                <div class="texto fz8 lh14">
                    ZONA/SECTOR/ETAPA
                </div>
            </div>
            <div style="width: 93px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    17
                </div>
                <div class="texto fz8 lh14">
                    MANZANA
                </div>
            </div>
            <div style="width: 80px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    18
                </div>
                <div class="texto fz8 lh14">
                    LOTE
                </div>
            </div>
            <div style="width: 74px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    19
                </div>
                <div class="texto fz8 lh14">
                    SUB-LOTE
                </div>
            </div>
        </div>
        <!-- 14 al 19-->
        <!-- 18 AL 23-->
        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 111px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->unicat?->edificacion?->lote?->hab_urbana?->codi_hab_urba }}
            </div>
            <div style="width: 222px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->unicat?->edificacion?->lote?->hab_urbana?->tipo_hab_urba }}
                {{ $ficha?->unicat?->edificacion?->lote?->hab_urbana?->nomb_hab_urba }}
            </div>
            <div style="width: 130px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->unicat?->edificacion?->lote?->zona_dist }}
            </div>
            <div style="width: 93px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->unicat?->edificacion?->lote?->mzna_dist }}
            </div>
            <div style="width: 80px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->unicat?->edificacion?->lote?->lote_dist }}
            </div>
            <div style="width: 74px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->unicat?->edificacion?->lote?->sub_lote_dist }}
            </div>
        </div>
        <!-- 18 AL 23-->
        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
            <div class="textotitulo tl pl15">
                IDENTIFICACIÓN DEL TITULAR CATASTRAL
            </div>
        </div>
        <!-- IDENTIFICACION DEL TITULAR CATASTRAL-->
        <!-- 20 AL 25-->
        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 93px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    20
                </div>
                <div class="texto fz8 lh14">
                    TIPO DE TITULAR
                </div>
            </div>
            <div style="width: 19px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->titular != '')
                    {{ $ficha?->titular?->persona?->tipo_persona }}
                @endif
            </div>
            <div style="width: 75px;height: 16px;float:left;border:none;" class="fondoclarito">
                <div style="width: 75px;height: 8px;float:left;">
                    <div class="texto ti pl5" style="font-size:4px;">
                        1 = PERSONA NATURAL
                    </div>
                </div>
                <div style="width: 75px;height: 8px;float:left;">
                    <div class="texto ti pl5" style="font-size:4px;">
                        2 = PERSONA JURIDICA
                    </div>
                </div>
            </div>
            <div style="width: 165px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    21
                </div>
                <div class="texto fz8 lh14">
                    ESTADO CIVIL
                </div>
            </div>
            <div style="width: 19px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->titular != '')
                    {{ $ficha?->titular?->esta_civil }}
                @endif
            </div>
            <div style="width: 67px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto fz6 lh12">
                    01 SOLTERO(A)
                </div>
            </div>
            <div style="width: 67px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto fz6 lh12">
                    02 CASADO(A)
                </div>
            </div>
            <div style="width: 67px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto fz6 lh12">
                    03 DIVORCIADO(A)
                </div>
            </div>
            <div style="width: 67px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto fz6 lh12">
                    04 VIUDO(A)
                </div>
            </div>
            <div style="width: 67.9px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto fz6 lh12">
                    05 CONVIVIENTE(A)
                </div>
            </div>

        </div>
        <!-- 24 AL 25-->
        <!--AQUI SE REPETIRA LOS TITULARES CATASTRALES FOREACH-->
        <!-- 22 AL 24-->
        @if ($ficha?->titular != '')
            @if ($ficha?->titular?->persona?->tipo_persona == 1)
                @foreach ($ficha?->titulars as $titular)
                    <div style="width: 716px;height:16px;margin: auto;">
                        <div style="width: 100px;height: 16px;float:left;" class="fondoclaro">
                            <div class="numeros">
                                22
                            </div>
                            <div class="texto fz8 lh14">
                                TIPO DOC. IDENTIDAD
                            </div>
                        </div>
                        <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
                            {{ $titular?->persona?->tipo_doc }}
                        </div>
                        <div style="width: 53px;height: 16px;float:left;" class="fondoclaro">
                            <div class="numeros">
                                23
                            </div>
                            <div class="texto fz8 lh14">
                                N° DOC
                            </div>
                        </div>
                        <div style="width: 182px;height: 16px;float:left;" class="texto2 fz8 lh14">
                            {{ $titular?->persona?->nume_doc }}
                        </div>
                        <div style="width: 93px;height: 16px;float:left;" class="fondoclaro">
                            <div class="numeros">
                                24
                            </div>
                            <div class="texto fz8 lh14">
                                NOMBRES
                            </div>
                        </div>
                        <div style="width: 264px;height: 16px;float:left;" class="texto2 fz8 lh14">
                            {{ $titular?->persona?->nombres }}
                        </div>

                    </div>
                    <!-- 22 AL 24-->

                    <!-- 25 AL 26-->
                    <div style="width: 716px;height:16px;margin: auto;">
                        <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;"
                            class="fondoclaro">
                            <div class="numeros" style="float:left;">
                                25
                            </div>
                            <div class="texto fz8 lh14">
                                APELLIDO PATERNO
                            </div>
                        </div>
                        <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;"
                            class="fondoclaro">
                            <div class="numeros" style="float:left;">
                                26
                            </div>
                            <div class="texto fz8 lh14">
                                APELLIDO MATERNO
                            </div>
                        </div>
                    </div>
                    <div style="width: 716px;height:16px;margin: auto;">
                        <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;"
                            class="texto2 fz8 lh14">
                            {{ $titular?->persona?->ape_paterno }}
                        </div>
                        <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;"
                            class="texto2 fz8 lh14">
                            {{ $titular?->persona?->ape_materno }}
                        </div>
                    </div>
                    <!-- 25 AL 26-->
                @endforeach
            @else
                <div style="width: 716px;height:16px;margin: auto;">
                    <div style="width: 100px;height: 16px;float:left;" class="fondoclaro">
                        <div class="numeros">
                            22
                        </div>
                        <div class="texto fz8 lh14">
                            TIPO DOC. IDENTIDAD
                        </div>
                    </div>
                    <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">

                    </div>
                    <div style="width: 53px;height: 16px;float:left;" class="fondoclaro">
                        <div class="numeros">
                            23
                        </div>
                        <div class="texto fz8 lh14">
                            N° DOC
                        </div>
                    </div>
                    <div style="width: 182px;height: 16px;float:left;">

                    </div>

                    <div style="width: 93px;height: 16px;float:left;" class="fondoclaro">
                        <div class="numeros">
                            24
                        </div>
                        <div class="texto fz8 lh14">
                            NOMBRES
                        </div>
                    </div>
                    <div style="width: 264px;height: 16px;float:left;">

                    </div>

                </div>
                <!-- 22 AL 24-->

                <!-- 25 AL 26-->
                <div style="width: 716px;height:16px;margin: auto;">
                    <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;"
                        class="fondoclaro">
                        <div class="numeros" style="float:left;">
                            25
                        </div>
                        <div class="texto fz8 lh14">
                            APELLIDO PATERNO
                        </div>
                    </div>
                    <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;"
                        class="fondoclaro">
                        <div class="numeros" style="float:left;">
                            26
                        </div>
                        <div class="texto fz8 lh14">
                            APELLIDO MATERNO
                        </div>
                    </div>
                </div>
                <div style="width: 716px;height:16px;margin: auto;">
                    <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;">

                    </div>
                    <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;">

                    </div>
                </div>
                <!-- 25 AL 26-->
            @endif
            <!--AQUI SE REPETIRA LOS TITULARES CATASTRALES FOREACH-->
            <!-- LEYENDA TIPO VIA TIPO PUERTA-->
            <div style="width: 716px;height:10px;margin: auto;">
                <div style="width: 92px;height: 15PX;float:left;">
                    TIPO DE DOC. IDENTIDAD
                </div>
                <div style="width: 154PX;height: 15PX;float:left;" class="fondoclarito">
                    <div style="width: 100%;height: 5px; font-size:5px;float:left;border:none;text-align:left;">
                        01 NO PRESENTO DOCUMENTO
                    </div>
                    <div style="width: 100%;height: 5px; font-size:5px;float:left;border:none;text-align:left;">
                        02 DNI
                    </div>
                </div>
                <div style="width: 161PX;height: 15PX;float:left;" class="fondoclarito">
                    <div style="width: 100%;height: 5px; font-size:5px;float:left;border:none;text-align:left;">
                        03 CARNET DE IDENTIDAD DE POLICIA NACIONAL
                    </div>
                    <div style="width: 100%;height: 5px; font-size:5px;float:left;border:none;text-align:left;">
                        04 CARNET DE IDENTIDAD DE FUERZAS ARMADAS
                    </div>
                </div>
                <div style="width: 136PX;height: 15PX;float:left;" class="fondoclarito">
                    <div style="width: 100%;height: 5px; font-size:5px;float:left;border:none;text-align:left;">
                        05 PARTIDA DE NACIMIENTO
                    </div>
                    <div style="width: 100%;height: 5px; font-size:5px;float:left;border:none;text-align:left;">
                        06 PASAPORTE
                    </div>
                </div>
                <div style="width: 168PX;height: 15PX;float:left;" class="fondoclarito">
                    <div style="width: 100%;height: 5px; font-size:5px;float:left;border:none;text-align:left;">
                        07 CARNET DE EXTRANJERIA
                    </div>
                    <div style="width: 100%;height: 5px; font-size:5px;float:left;border:none;text-align:left;">
                        08 OTROS (especif.)................
                    </div>
                </div>

            </div>
            <!-- LEYENDA TIPO VIA TIPO PUERTA-->
            <!-- 31 AL 32-->
            @if ($ficha?->titular?->persona?->tipo_persona == 2)
                @foreach ($ficha?->titulars as $titular)
                    <div style="width: 716px;height:16px;margin: auto;">
                        <div style="width: 111px;height: 16px;float:left;" class="fondoclaro">
                            <div class="numeros">
                                27
                            </div>
                            <div class="texto fz8 lh14">
                                N° DE RUC
                            </div>
                        </div>
                        <div style="width: 206px;height: 16px;float:left;" class="texto2 fz8 lh14">
                            {{ $titular?->persona?->nume_doc }}
                        </div>
                        <div style="width: 94px;height: 16px;float:left;" class="fondoclaro">
                            <div class="numeros">
                                28
                            </div>
                            <div class="texto fz8 lh14">
                                RAZON SOCIAL
                            </div>
                        </div>
                        <div style="width: 301px;height: 16px;float:left;" class="texto2 fz8 lh14">
                            {{ $titular?->persona?->razon_social }}
                        </div>
                    </div>
                    <!-- 31 AL 32-->

                    <!-- 29 -->
                    <div style="width: 716px;height:16px;margin: auto;">

                        <div style="width: 112px;height: 16px;float:left;" class="fondoclaro">
                            <div class="numeros">
                                29
                            </div>
                            <div class="texto fz8 lh14">
                                PERSONA JURIDICA
                            </div>
                        </div>
                        <div style="width: 19px;height: 16px;float:left;" class="texto2 fz8 lh14">
                            {{ $titular?->persona?->tipo_persona_juridica }}
                        </div>

                        <div style="width: 115px;height: 16px;float:left;" class="fondoclarito">
                            <div style="font-size:5px;border:none;text-align:center;">
                                01 EMPRESA
                            </div>
                        </div>
                        <div style="width: 115px;height: 16px;float:left;" class="fondoclarito">
                            <div style="font-size:5px;border:none;text-align:center;">
                                02 COOPERATIVA
                            </div>
                        </div>
                        <div style="width: 115px;height: 16px;float:left;" class="fondoclarito">
                            <div style="font-size:5px;border:none;text-align:center;">
                                03 ASOCIACIÓN
                            </div>
                        </div>
                        <div style="width: 115px;height: 16px;float:left;" class="fondoclarito">
                            <div style="font-size:5px;border:none;text-align:center;">
                                04 FUNDACIÓN
                            </div>
                        </div>
                        <div style="width: 118px;height: 16px;float:left;" class="fondoclarito">
                            <div style="font-size:5px;border:none;text-align:center;">
                                05 OTROS (especif.)....................
                            </div>
                        </div>

                    </div>
                @endforeach
            @else
                <div style="width: 716px;height:16px;margin: auto;">
                    <div style="width: 111px;height: 16px;float:left;" class="fondoclaro">
                        <div class="numeros">
                            27
                        </div>
                        <div class="texto fz8 lh14">
                            N° DE RUC
                        </div>
                    </div>
                    <div style="width: 206px;height: 16px;float:left;" class="texto2 fz8 lh14">

                    </div>
                    <div style="width: 94px;height: 16px;float:left;" class="fondoclaro">
                        <div class="numeros">
                            28
                        </div>
                        <div class="texto fz8 lh14">
                            RAZON SOCIAL
                        </div>
                    </div>
                    <div style="width: 301px;height: 16px;float:left;" class="texto2 fz8 lh14">

                    </div>
                </div>
                <!-- 31 AL 32-->

                <!-- 29 -->
                <div style="width: 716px;height:16px;margin: auto;">

                    <div style="width: 112px;height: 16px;float:left;" class="fondoclaro">
                        <div class="numeros">
                            29
                        </div>
                        <div class="texto fz8 lh14">
                            PERSONA JURIDICA
                        </div>
                    </div>
                    <div style="width: 19px;height: 16px;float:left;" class="texto2 fz8 lh14">

                    </div>

                    <div style="width: 115px;height: 16px;float:left;" class="fondoclarito">
                        <div style="font-size:5px;border:none;text-align:center;">
                            01 EMPRESA
                        </div>
                    </div>
                    <div style="width: 115px;height: 16px;float:left;" class="fondoclarito">
                        <div style="font-size:5px;border:none;text-align:center;">
                            02 COOPERATIVA
                        </div>
                    </div>
                    <div style="width: 115px;height: 16px;float:left;" class="fondoclarito">
                        <div style="font-size:5px;border:none;text-align:center;">
                            03 ASOCIACIÓN
                        </div>
                    </div>
                    <div style="width: 115px;height: 16px;float:left;" class="fondoclarito">
                        <div style="font-size:5px;border:none;text-align:center;">
                            04 FUNDACIÓN
                        </div>
                    </div>
                    <div style="width: 118px;height: 16px;float:left;" class="fondoclarito">
                        <div style="font-size:5px;border:none;text-align:center;">
                            05 OTROS (especif.)....................
                        </div>
                    </div>

                </div>
            @endif
            <!-- 29-->
            <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:2px;margin-bottom:2px">
                <div class="textotitulo tl pl15">
                    DOMICILIO FISCAL DEL TITULAR CATASTRAL
                </div>
            </div>

            <!-- 30 -->
            <div style="width: 716px;height:32px;margin: auto;">

                <div style="width: 350px;height: 32px;float:left;border:none;">
                    <div style="width: 97px;height: 16px;float:left;" class="fondoclaro">
                        <div class="numeros">
                            30
                        </div>
                        <div class="texto fz8 lh14">
                            UBICACION
                        </div>
                    </div>
                    <div style="width: 19px;height: 16px;float:left;" class="texto2 fz8 lh14">
                        @if ($ficha?->domiciliotitular != '')
                            {{ $ficha?->domiciliotitular?->ubicacion }}
                        @endif
                    </div>
                    <div style="width: 114px;height: 16px;float:left;" class="fondoclarito">
                        <div style="font-size:5px;border:none;text-align:center;">
                            01 IGUAL A UU.CC.
                        </div>
                    </div>
                    <div style="width: 115px;height: 16px;float:left;" class="fondoclarito">
                        <div style="font-size:5px;border:none;text-align:center;">
                            02 OTROS (especif.).........FSDAF...........
                        </div>
                    </div>
                </div>

                <div style="width: 324px;height: 32px;float:right;border:none;">

                    <div style="width: 107px;height: 16px;float:right;" class="fondoclaro">
                        <div class="numeros">
                            31
                        </div>
                        <div class="texto fz8 lh14">
                            DISTRITOS
                        </div>
                    </div>
                    <div style="width: 107px;height: 16px;float:right;" class="fondoclaro">
                        <div class="numeros">
                            32
                        </div>
                        <div class="texto fz8 lh14">
                            PROVINCIA
                        </div>
                    </div>
                    <div style="width: 106px;height: 16px;float:right;" class="fondoclaro">
                        <div class="numeros">
                            33
                        </div>
                        <div class="texto fz8 lh14">
                            DEPARTAMENTO
                        </div>
                    </div>
                    <div style="width: 106px;height: 16px;float:right;" class="texto2 fz8 lh14">
                        @if (isset($ficha?->domiciliotitular))
                            @if ($ficha?->domiciliotitular != '')
                                @foreach ($ficha?->domiciliotitular?->distritos as $distrito)
                                    @if (
                                        $distrito?->cod_dep == $ficha?->domiciliotitular?->codi_dep &&
                                            $distrito?->cod_pro == $ficha?->domiciliotitular?->codi_pro &&
                                            $distrito?->codi_dis == $ficha?->domiciliotitular?->codi_dis)
                                        {{ $distrito?->descri }}
                                    @endif
                                @endforeach
                            @endif
                        @endif
                    </div>
                    <div style="width: 107px;height: 16px;float:right;" class="texto2 fz8 lh14">
                        @if (isset($ficha?->domiciliotitular))
                            @if ($ficha?->domiciliotitular != '')
                                @foreach ($ficha?->domiciliotitular?->provincias as $provincia)
                                    @if (
                                        $provincia?->cod_dep == $ficha?->domiciliotitular?->codi_dep &&
                                            $provincia?->cod_pro == $ficha?->domiciliotitular?->codi_pro &&
                                            $provincia?->codi_dis == '00')
                                        {{ $provincia?->descri }}
                                    @endif
                                @endforeach
                            @endif
                        @endif

                    </div>
                    <div style="width: 107px;height: 16px;float:right;" class="texto2 fz8 lh14">
                        @if (isset($ficha?->domiciliotitular?->departamento))
                            @if ($ficha?->domiciliotitular?->departamento != '')
                                {{ $ficha?->domiciliotitular?->departamento?->descri }}
                            @endif
                        @endif
                    </div>
                </div>

            </div>
            <!-- 30 -->





            <!-- 05 AL 13-->

            <div style="width: 716px;height:16px;margin: auto;">
                <div style="width: 122px ;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        05
                    </div>
                    <div class="texto fz8 lh14">
                        CÓDIGO DE VIA
                    </div>
                </div>

                <div style="width: 87px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        06
                    </div>
                    <div class="texto fz8 lh14">
                        TIPO DE VIA
                    </div>
                </div>

                <div style="width: 370px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        07
                    </div>
                    <div class="texto fz8 lh14">
                        NOMBRE DE VIA
                    </div>
                </div>

                <div style="width: 70px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        09
                    </div>
                    <div class="texto fz8 lh14">
                        N° MUNICIPAL
                    </div>
                </div>

                <div style="width: 62px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        13
                    </div>
                    <div class="texto fz8 lh14">
                        N° INTERIOR
                    </div>
                </div>

            </div>

            <div style="width: 716px;height:16px;margin: auto;">
                <div style="width: 122px ;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->domiciliotitular != '')
                        {{ $ficha?->domiciliotitular?->codi_via }}
                    @endif
                </div>

                <div style="width: 87px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->domiciliotitular != '')
                        {{ $ficha?->domiciliotitular?->tipo_via }}
                    @endif
                </div>

                <div style="width: 370px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->domiciliotitular != '')
                        {{ $ficha?->domiciliotitular?->nomb_via }}
                    @endif
                </div>

                <div style="width: 70px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->domiciliotitular != '')
                        {{ $ficha?->domiciliotitular?->nume_muni }}
                    @endif
                </div>

                <div style="width: 62px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->domiciliotitular != '')
                        {{ $ficha?->domiciliotitular?->nume_interior }}
                    @endif
                </div>
            </div>

            <!-- 05 AL 13-->

            <!-- 14 AL 19-->

            <div style="width: 716px;height:16px;margin: auto;">
                <div style="width: 111px ;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        14
                    </div>
                    <div class="texto fz8 lh14">
                        CÓDIGO DE HU
                    </div>
                </div>

                <div style="width: 224px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        15
                    </div>
                    <div class="texto fz8 lh14">
                        NOMBRE DE LA HABILITACIÓN URBANA
                    </div>
                </div>

                <div style="width: 130px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        16
                    </div>
                    <div class="texto fz8 lh14">
                        ZONA/SECTOR/ETAPA
                    </div>
                </div>

                <div style="width: 93px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        17
                    </div>
                    <div class="texto fz8 lh14">
                        MANZANA
                    </div>
                </div>

                <div style="width: 81px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        18
                    </div>
                    <div class="texto fz8 lh14">
                        LOTE
                    </div>
                </div>

                <div style="width: 71px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        19
                    </div>
                    <div class="texto fz8 lh14">
                        SUB-LOTE
                    </div>
                </div>
            </div>
            <!-- 34 AL 36-->
            <div style="width: 716px;height:16px;margin: auto;">
                <div style="width: 111px ;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->domiciliotitular != '')
                        {{ $ficha?->domiciliotitular?->codi_hab_urba }}
                    @endif
                </div>

                <div style="width: 224px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->domiciliotitular != '')
                        {{ $ficha?->domiciliotitular?->nomb_hab_urba }}
                    @endif
                </div>

                <div style="width: 130px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->domiciliotitular != '')
                        {{ $ficha?->domiciliotitular?->sector }}
                    @endif
                </div>

                <div style="width: 93px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->domiciliotitular != '')
                        {{ $ficha?->domiciliotitular?->mzna }}
                    @endif
                </div>

                <div style="width: 81px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->domiciliotitular != '')
                        {{ $ficha?->domiciliotitular?->lote }}
                    @endif
                </div>

                <div style="width: 71px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->domiciliotitular != '')
                        {{ $ficha?->domiciliotitular?->sublote }}
                    @endif
                </div>
            </div>

            <!-- 05 AL 13-->
            <div style="width: 716px;height:16px;margin: auto; margin-top:10px">

                <div style="width: 96px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        34
                    </div>
                    <div class="texto fz8 lh14">
                        TELÉFONO
                    </div>
                </div>
                <div style="width: 71px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $ficha?->titular?->telf }}
                </div>
                <div style="width: 61px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        35
                    </div>
                    <div class="texto fz8 lh14">
                        ANEXO
                    </div>
                </div>
                <div style="width: 55px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $ficha?->titular?->anexo }}
                </div>
                <div style="width: 126px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        36
                    </div>
                    <div class="texto fz8 lh14">
                        CORREO ELECTRÓNICO
                    </div>
                </div>
                <div style="width: 301px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $ficha?->titular?->email }}
                </div>
            </div>
            <!-- 34 AL 36-->
        @else
            <div style="width: 716px;height:16px;margin: auto;">
                <div style="width: 100px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        22
                    </div>
                    <div class="texto fz8 lh14">
                        TIPO DOC. IDENTIDAD
                    </div>
                </div>
                <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>
                <div style="width: 53px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        23
                    </div>
                    <div class="texto fz8 lh14">
                        N° DOC
                    </div>
                </div>
                <div style="width: 182px;height: 16px;float:left;">

                </div>

                <div style="width: 93px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        24
                    </div>
                    <div class="texto fz8 lh14">
                        NOMBRES
                    </div>
                </div>
                <div style="width: 264px;height: 16px;float:left;">

                </div>

            </div>
            <!-- 22 AL 24-->

            <!-- 25 AL 26-->
            <div style="width: 716px;height:16px;margin: auto;">
                <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;"
                    class="fondoclaro">
                    <div class="numeros" style="float:left;">
                        25
                    </div>
                    <div class="texto fz8 lh14">
                        APELLIDO PATERNO
                    </div>
                </div>
                <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;"
                    class="fondoclaro">
                    <div class="numeros" style="float:left;">
                        26
                    </div>
                    <div class="texto fz8 lh14">
                        APELLIDO MATERNO
                    </div>
                </div>
            </div>
            <div style="width: 716px;height:16px;margin: auto;">
                <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;">

                </div>
                <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;">

                </div>
            </div>
            <!-- 25 AL 26-->
            <!--AQUI SE REPETIRA LOS TITULARES CATASTRALES FOREACH-->
            <!-- LEYENDA TIPO VIA TIPO PUERTA-->
            <div style="width: 716px;height:10px;margin: auto;">
                <div style="width: 92px;height: 15PX;float:left;">
                    TIPO DE DOC. IDENTIDAD
                </div>
                <div style="width: 154PX;height: 15PX;float:left;" class="fondoclarito">
                    <div style="width: 100%;height: 5px; font-size:5px;float:left;border:none;text-align:left;">
                        01 NO PRESENTO DOCUMENTO
                    </div>
                    <div style="width: 100%;height: 5px; font-size:5px;float:left;border:none;text-align:left;">
                        02 DNI
                    </div>
                </div>
                <div style="width: 161PX;height: 15PX;float:left;" class="fondoclarito">
                    <div style="width: 100%;height: 5px; font-size:5px;float:left;border:none;text-align:left;">
                        03 CARNET DE IDENTIDAD DE POLICIA NACIONAL
                    </div>
                    <div style="width: 100%;height: 5px; font-size:5px;float:left;border:none;text-align:left;">
                        04 CARNET DE IDENTIDAD DE FUERZAS ARMADAS
                    </div>
                </div>
                <div style="width: 136PX;height: 15PX;float:left;" class="fondoclarito">
                    <div style="width: 100%;height: 5px; font-size:5px;float:left;border:none;text-align:left;">
                        05 PARTIDA DE NACIMIENTO
                    </div>
                    <div style="width: 100%;height: 5px; font-size:5px;float:left;border:none;text-align:left;">
                        06 PASAPORTE
                    </div>
                </div>
                <div style="width: 168PX;height: 15PX;float:left;" class="fondoclarito">
                    <div style="width: 100%;height: 5px; font-size:5px;float:left;border:none;text-align:left;">
                        07 CARNET DE EXTRANJERIA
                    </div>
                    <div style="width: 100%;height: 5px; font-size:5px;float:left;border:none;text-align:left;">
                        08 OTROS (especif.)................
                    </div>
                </div>

            </div>
            <!-- LEYENDA TIPO VIA TIPO PUERTA-->
            <!-- 31 AL 32-->
            <div style="width: 716px;height:16px;margin: auto;">
                <div style="width: 111px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        27
                    </div>
                    <div class="texto fz8 lh14">
                        N° DE RUC
                    </div>
                </div>
                <div style="width: 206px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>
                <div style="width: 94px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        28
                    </div>
                    <div class="texto fz8 lh14">
                        RAZON SOCIAL
                    </div>
                </div>
                <div style="width: 301px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>
            </div>
            <!-- 31 AL 32-->

            <!-- 29 -->
            <div style="width: 716px;height:16px;margin: auto;">

                <div style="width: 112px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        29
                    </div>
                    <div class="texto fz8 lh14">
                        PERSONA JURIDICA
                    </div>
                </div>
                <div style="width: 19px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>

                <div style="width: 115px;height: 16px;float:left;" class="fondoclarito">
                    <div style="font-size:5px;border:none;text-align:center;">
                        01 EMPRESA
                    </div>
                </div>
                <div style="width: 115px;height: 16px;float:left;" class="fondoclarito">
                    <div style="font-size:5px;border:none;text-align:center;">
                        02 COOPERATIVA
                    </div>
                </div>
                <div style="width: 115px;height: 16px;float:left;" class="fondoclarito">
                    <div style="font-size:5px;border:none;text-align:center;">
                        03 ASOCIACIÓN
                    </div>
                </div>
                <div style="width: 115px;height: 16px;float:left;" class="fondoclarito">
                    <div style="font-size:5px;border:none;text-align:center;">
                        04 FUNDACIÓN
                    </div>
                </div>
                <div style="width: 118px;height: 16px;float:left;" class="fondoclarito">
                    <div style="font-size:5px;border:none;text-align:center;">
                        05 OTROS (especif.)....................
                    </div>
                </div>

            </div>
            <!-- 29-->
            <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:2px;margin-bottom:2px">
                <div class="textotitulo tl pl15">
                    DOMICILIO FISCAL DEL TITULAR CATASTRAL
                </div>
            </div>

            <!-- 30 -->
            <div style="width: 716px;height:32px;margin: auto;">

                <div style="width: 350px;height: 32px;float:left;border:none;">
                    <div style="width: 97px;height: 16px;float:left;" class="fondoclaro">
                        <div class="numeros">
                            30
                        </div>
                        <div class="texto fz8 lh14">
                            UBICACION
                        </div>
                    </div>
                    <div style="width: 19px;height: 16px;float:left;" class="texto2 fz8 lh14">

                    </div>
                    <div style="width: 114px;height: 16px;float:left;" class="fondoclarito">
                        <div style="font-size:5px;border:none;text-align:center;">
                            01 IGUAL A UU.CC.
                        </div>
                    </div>
                    <div style="width: 115px;height: 16px;float:left;" class="fondoclarito">
                        <div style="font-size:5px;border:none;text-align:center;">
                            02 OTROS (especif.)....................
                        </div>
                    </div>
                </div>

                <div style="width: 324px;height: 32px;float:right;border:none;">

                    <div style="width: 107px;height: 16px;float:right;" class="fondoclaro">
                        <div class="numeros">
                            31
                        </div>
                        <div class="texto fz8 lh14">
                            DISTRITO
                        </div>
                    </div>
                    <div style="width: 107px;height: 16px;float:right;" class="fondoclaro">
                        <div class="numeros">
                            32
                        </div>
                        <div class="texto fz8 lh14">
                            PROVINCIA
                        </div>
                    </div>
                    <div style="width: 106px;height: 16px;float:right;" class="fondoclaro">
                        <div class="numeros">
                            33
                        </div>
                        <div class="texto fz8 lh14">
                            DEPARTAMENTO
                        </div>
                    </div>
                    <div style="width: 107px;height: 16px;float:right;" class="texto2 fz8 lh14">

                    </div>
                    <div style="width: 107px;height: 16px;float:right;" class="texto2 fz8 lh14">

                    </div>
                    <div style="width: 106px;height: 16px;float:right;" class="texto2 fz8 lh14">

                    </div>
                </div>

            </div>
            <!-- 30 -->





            <!-- 05 AL 13-->

            <div style="width: 716px;height:16px;margin: auto;">
                <div style="width: 122px ;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        05
                    </div>
                    <div class="texto fz8 lh14">
                        CÓDIGO DE VIA
                    </div>
                </div>

                <div style="width: 87px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        06
                    </div>
                    <div class="texto fz8 lh14">
                        TIPO DE VIA
                    </div>
                </div>

                <div style="width: 370px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        07
                    </div>
                    <div class="texto fz8 lh14">
                        NOMBRE DE VIA
                    </div>
                </div>

                <div style="width: 70px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        09
                    </div>
                    <div class="texto fz8 lh14">
                        N° MUNICIPAL
                    </div>
                </div>

                <div style="width: 62px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        13
                    </div>
                    <div class="texto fz8 lh14">
                        N° INTERIOR
                    </div>
                </div>

            </div>

            <div style="width: 716px;height:16px;margin: auto;">
                <div style="width: 122px ;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>

                <div style="width: 87px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>

                <div style="width: 370px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>

                <div style="width: 70px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>

                <div style="width: 62px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>
            </div>

            <!-- 05 AL 13-->

            <!-- 14 AL 19-->

            <div style="width: 716px;height:16px;margin: auto;">
                <div style="width: 111px ;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        14
                    </div>
                    <div class="texto fz8 lh14">
                        CÓDIGO DE HU
                    </div>
                </div>

                <div style="width: 224px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        15
                    </div>
                    <div class="texto fz8 lh14">
                        NOMBRE DE LA HABILITACIÓN URBANA
                    </div>
                </div>

                <div style="width: 130px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        16
                    </div>
                    <div class="texto fz8 lh14">
                        ZONA/SECTOR/ETAPA
                    </div>
                </div>

                <div style="width: 93px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        17
                    </div>
                    <div class="texto fz8 lh14">
                        MANZANA
                    </div>
                </div>

                <div style="width: 81px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        18
                    </div>
                    <div class="texto fz8 lh14">
                        LOTE
                    </div>
                </div>

                <div style="width: 71px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        19
                    </div>
                    <div class="texto fz8 lh14">
                        SUB-LOTE
                    </div>
                </div>
            </div>
            <!-- 34 AL 36-->
            <div style="width: 716px;height:16px;margin: auto;">
                <div style="width: 111px ;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>

                <div style="width: 224px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>

                <div style="width: 130px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>

                <div style="width: 93px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>

                <div style="width: 81px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>

                <div style="width: 71px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>
            </div>

            <!-- 05 AL 13-->
            <div style="width: 716px;height:16px;margin: auto; margin-top:10px">

                <div style="width: 96px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        34
                    </div>
                    <div class="texto fz8 lh14">
                        TELÉFONO
                    </div>
                </div>
                <div style="width: 71px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>
                <div style="width: 61px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        35
                    </div>
                    <div class="texto fz8 lh14">
                        ANEXO
                    </div>
                </div>
                <div style="width: 55px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>
                <div style="width: 126px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        36
                    </div>
                    <div class="texto fz8 lh14">
                        CORREO ELECTRÓNICO
                    </div>
                </div>
                <div style="width: 301px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>
            </div>
            <!-- 34 AL 36-->
        @endif

        <!-- 18 AL 23-->
        <!-- CARACTERISTICAS DE TITULARIDAD-->

        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
            <div class="textotitulo tl pl15">
                CARACTERÍSTICAS DE LA TITULARIDAD
            </div>
        </div>


        <!-- CARACTERISTICAS DE TITULARIDAD-->

        <!-- 46 -->
        <div style="width: 716px;height:16px;margin: auto;">

            <div style="width: 112px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    37
                </div>
                <div class="texto fz8 lh14">
                    CONDICION DEL TITULAR
                </div>
            </div>
            <div style="width: 19px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->titular != '')
                    {{ $ficha?->titular?->cond_titular }}
                @else
                    05
                @endif
            </div>
            <div style="width: 582px;height: 15px;float:left;" class="fondoclarito">
                <div style="width: 70px;height: 15px;float:left;">
                    <div style="font-size:5px;border:none;text-align:center;">
                        01 PROPIETARIO UNICO
                    </div>
                </div>
                <div style="width: 80px;height: 15px;float:left;">
                    <div style="font-size:5px;border:none;text-align:center;">
                        02 SUCESIÓN INTESTADA
                    </div>
                </div>
                <div style="width: 80px;height: 15px;float:left;">
                    <div style="font-size:5px;border:none;text-align:center;">
                        03 POSEEDOR
                    </div>
                </div>
                <div style="width: 80px;height: 15px;float:left;">
                    <div style="font-size:5px;border:none;text-align:center;">
                        04 SOCIEDAD CONYUGAL
                    </div>
                </div>
                <div style="width: 80px;height: 15px;float:left;">
                    <div style="font-size:5px;border:none;text-align:center;">
                        05 COTITULARIDAD
                    </div>
                </div>
                <div style="width: 79.9px;height: 15px;float:left;">
                    <div style="font-size:5px;border:none;text-align:center;">
                        06 LITIGIO
                    </div>
                </div>
                <div style="width: 105px;height: 15px;float:left;">
                    <div style="font-size:5px;border:none;text-align:center;">
                        07 OTROS(especif.).......................................
                    </div>
                </div>
            </div>
        </div>
        <!-- 46-->
        <!-- 38 AL 39  -->
        <div style="width: 716px;height:32px;margin: auto;">

            <div style="width: 75px;height: 32px;float:left;" class="fondoclaro">
                <div class="numeros">
                    38
                </div>
                <div style="background-color:#FFFFFF;color:#000000;width:15px;height:6px;border:none;float:right;"
                    class="texto2 fz8 lh14">
                    @if ($ficha?->titular != '')
                        {{ $ficha?->titular?->form_adquisicion }}
                    @endif
                </div>
                <div class="texto fz8 lh14" style="font-size:7px;">
                    FORMA ADQUISICION
                </div>
            </div>
            <div style="width: 505px;height: 32px;float:left;border:none;" class="fondoclarito">
                <div style="width: 505px; height: 16px;border:none;">
                    <div style="width: 68px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            01 COMPRA VENTA
                        </div>
                    </div>
                    <div style="width: 71px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            02 ANTIC. LEGITIMA
                        </div>
                    </div>
                    <div style="width: 59px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            03 TESTAMENTO
                        </div>
                    </div>
                    <div style="width: 70px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            04 DONACION
                        </div>
                    </div>
                    <div style="width: 58px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            05 ADJUDICACIÓN
                        </div>
                    </div>
                    <div style="width: 51px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            06 FUSIÓN
                        </div>
                    </div>
                    <div style="width: 59px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            07 EXPROPIACIÓN
                        </div>
                    </div>
                    <div style="width: 60.9px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            08 PERMUTA
                        </div>
                    </div>
                </div>
                <div style="width: 505px; height: 16px;border:none;">
                    <div style="width: 68px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            09 PRESCRIP. ADQU.
                        </div>
                    </div>
                    <div style="width: 71px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            10 CES. DERIVACIONES
                        </div>
                    </div>
                    <div style="width: 59px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            11 DACION PAGO
                        </div>
                    </div>
                    <div style="width: 70px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            12 DECL. HEREDEROS
                        </div>
                    </div>
                    <div style="width: 58px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            13 POSESIÓN
                        </div>
                    </div>
                    <div style="width: 172.9px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            14 OTROS (especif.)....................................
                        </div>
                    </div>
                </div>
            </div>

            <div style="width: 65px;height: 32px;float:left;" class="fondoclaro">
                <div class="numeros">
                    39
                </div>
                <div class="texto fz8 lh14">
                    FECHA DE ADQUISICION
                </div>

            </div>
            <div style="width: 68px;height: 32px;float:left;" class="texto2 fz8 lh14">

                @if ($ficha?->titular != '')
                    @if ($ficha?->titular?->fecha_adquisicion != '')
                        {{ date('d/m/Y', strtotime($ficha?->titular?->fecha_adquisicion)) }}
                    @endif
                @endif
            </div>
        </div>
        <!-- 38 AL 39 -->

        <!-- CARACTERISTICAS DE TITULARIDAD-->

        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
            <div class="textotitulo tl pl15">
                DESCRIPCIÓN DEL PREDIO
            </div>
        </div>
        <!-- DESCRIPCION DEL BIEN COMUN-->
        <!-- 40 -->
        <div style="width: 716px;height:16px;margin: auto;">

            <div style="width: 128px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    40
                </div>
                <div class="texto fz8 lh14">
                    CLASIFICACION DEL PREDIO
                </div>
            </div>
            <div style="width: 19px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->fichaindividual?->clasificacion }}
            </div>
            <div style="width: 567px;height: 16px;float:left;border:none;" class="fondoclarito">
                <div style="width: 105px;height: 16px;float:left;">
                    <div class="texto fz6 lh12">
                        01 CASA HABITACION
                    </div>
                </div>
                <div style="width: 105px;height: 16px;float:left;border-left:none;">
                    <div class="texto fz6 lh12">
                        02 TIENDA-DEPOSITO-ALMACÉN
                    </div>
                </div>
                <div style="width: 105px;height: 16px;float:left;">
                    <div class="texto fz6 lh12">
                        03 PREDIO EN EDIFICIO
                    </div>
                </div>
                <div style="width: 141px;height: 16px;float:left;">
                    <div class="texto fz6 lh12">
                        04 OTROS(especif.)......................................
                    </div>
                </div>
                <div style="width: 106.4px;height: 16px;float:left;">
                    <div class="texto fz6 lh12">
                        05 TERRENO SIN CONSTRUIR
                    </div>
                </div>
            </div>

        </div>
        <!-- 40 -->

        <!-- DESCRIPCION DEL BIEN COMUN-->
        <!-- LEYENDA TIPO VIA TIPO PUERTA-->
        <div style="width: 716px;height:10px;margin: auto;" class="fondoclarito">
            <div style="width: 119px;height: 10px;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                    4.1 CLÍNICA
                </div>
            </div>
            <div style="width: 115px;height: 10px;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                    4.2 HOSPITAL
                </div>
            </div>
            <div style="width: 119px;height: 10px;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                    4.3 CINE, TEATRO
                </div>
            </div>
            <div style="width: 119px;height: 10px;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                    4.4 INDUSTRIA
                </div>
            </div>
            <div style="width: 119px;height: 10px;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                    4.5 TALLER
                </div>
            </div>
            <div style="width: 119px;height: 10px;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                    4.6 IGLESIA / TEMPLO
                </div>
            </div>
        </div>
        <div style="width: 716px;height:10px;margin: auto;" class="fondoclarito">
            <div style="width: 119px;height: 10px;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                    4.7 CENTRO DE ENSEÑANZA
                </div>
            </div>
            <div style="width: 115px;height: 10px;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                    4.8 SERVICIO DE COMIDA
                </div>
            </div>
            <div style="width: 119px;height: 10px;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                    4.9 PARQUE
                </div>
            </div>
            <div style="width: 119px;height: 10px;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                    4.10 CEMENTERIO
                </div>
            </div>
            <div style="width: 119px;height: 10px;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                    4.11 SUB ESTACIÓN
                </div>
            </div>
            <div style="width: 119px;height: 10px;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                    4.12 BANCO FINANCIERA
                </div>
            </div>
        </div>
        <div style="width: 716px;height:10px;margin: auto;" class="fondoclarito">
            <div style="width: 119px;height: 10px;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                    4.13 TERMINAL DE TRANSPORTE
                </div>
            </div>
            <div style="width: 115px;height: 10px;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                    4.14 MERCADO
                </div>
            </div>
            <div style="width: 119px;height: 10px;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                    4.15 CLUB SOCIAL
                </div>
            </div>
            <div style="width: 119px;height: 10px;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                    4.16 CLUB DE ESPARCIMIENTO
                </div>
            </div>
            <div style="width: 119px;height: 10px;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                    4.17 PLAYA DE ESTACIONAMIENTO
                </div>
            </div>
            <div style="width: 119px;height: 10px;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                    4.18 OTROS
                </div>
            </div>
        </div>

        <!-- CLASIFICACION DE PREDIO-->

        <!-- 41  -->
        <div style="width: 716px;height:32px;margin: auto;">

            <div style="width: 95px;height: 32px;float:left;" class="fondoclaro">
                <div class="numeros">
                    41
                </div>
                <div class="texto fz8 lh8">
                    PREDIO CATASTRAL EN
                </div>
                <div style="background-color:#FFFFFF;color:#000000;width:17px;height:15px;border:none;float:right;"
                    class="texto2 fz8 lh14">
                    {{ $ficha?->fichaindividual?->cont_en }}
                </div>
            </div>
            <div style="width: 619px;height: 32px;float:left;border:none;" class="fondoclarito">
                <div style="width: 620px; height: 17px;border:none;">
                    <div style="width: 87px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            01 GALERIA
                        </div>
                    </div>
                    <div style="width: 87px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            02 MERCADO
                        </div>
                    </div>
                    <div style="width: 87PX;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            03 CAMPO FERIAL
                        </div>
                    </div>
                    <div style="width: 87px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            04 CENTRO COMERCIAL
                        </div>
                    </div>
                    <div style="width: 87px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            05 QUINTA
                        </div>
                    </div>
                    <div style="width: 88px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            06 CALLEJÓN
                        </div>
                    </div>
                    <div style="width: 89px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            07 PREDIO INDEPENDIENTE
                        </div>
                    </div>

                    <div style="width: 87px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            08 SOLAR
                        </div>
                    </div>
                    <div style="width: 87px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            09 CORRALON
                        </div>
                    </div>
                    <div style="width: 87PX;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            10 AZOTEA
                        </div>
                    </div>
                    <div style="width: 87px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            11 AIRES
                        </div>
                    </div>
                    <div style="width: 87px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            12 PREDIO EN EDIFICIO
                        </div>
                    </div>
                    <div style="width: 178px;height: 16px;float:left;">
                        <div style="font-size:5px;border:none;text-align:center;">
                            13 OTROS (especif.).....................................
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 41 -->

        <!-- 56 AL 59-->
        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 103px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    42
                </div>
                <div class="texto fz8 lh14">
                    CÓDIGO DE USO
                </div>
            </div>
            <div style="width: 480PX;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    43
                </div>
                <div class="texto fz8 lh14">
                    USO DEL PREDIO CATASTRAL (Descripción)
                </div>
            </div>
            <div style="width: 130px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    44
                </div>
                <div class="texto fz8 lh14">
                    ZONIFICACION
                </div>
            </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 103px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->fichaindividual?->uso?->codi_uso }}
            </div>
            <div style="width: 480PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->fichaindividual?->uso?->desc_uso }}
            </div>
            <div style="width: 130px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->unicat?->edificacion?->lote?->zonificacion }}
            </div>
        </div>

        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 357px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    45
                </div>
                <div class="texto fz8 lh14">
                    AREA DE TERRENO ADQUIRIDA(M2)
                </div>
            </div>
            <div style="width: 357px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    46
                </div>
                <div class="texto fz8 lh14">
                    AREA DE TERRENO VERIFICADA(M2)
                </div>
            </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 357px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->fichaindividual?->area_declarada }}
            </div>
            <div style="width: 357px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->fichaindividual?->area_verificada }}
            </div>
        </div>
        <!-- 47 AL 48-->
        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 142PX;height: 16px;float:left;">
                LINDEROS DE LOTE(ML)
            </div>
            <div style="width: 247PX;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    47
                </div>
                <div class="texto fz8 lh14">
                    MEDIDA EN CAMPO
                </div>
            </div>
            <div style="width: 324px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    48
                </div>
                <div class="texto fz8 lh14">
                    COLINDANCIAS EN CAMPO
                </div>
            </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 142PX;height: 16px;float:left;">
                FRENTE
            </div>
            <div style="width: 247PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->lindero?->fren_campo }}
            </div>
            <div style="width: 324px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->lindero?->fren_colinda_campo }}
            </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 142PX;height: 16px;float:left;">
                DERECHA
            </div>
            <div style="width: 247PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->lindero?->dere_campo }}
            </div>
            <div style="width: 324px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->lindero?->dere_colinda_campo }}
            </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 142PX;height: 16px;float:left;">
                IZQUIERDA
            </div>
            <div style="width: 247PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->lindero?->izqu_campo }}
            </div>
            <div style="width: 324px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->lindero?->izqu_colinda_campo }}
            </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 142PX;height: 16px;float:left;">
                FONDO
            </div>
            <div style="width: 247PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->lindero?->fond_campo }}
            </div>
            <div style="width: 324px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->lindero?->fond_colinda_campo }}
            </div>
        </div>
        <!-- SERVICIOS QUE CUENTA EL PREDIO-->

        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:40px;margin-bottom:10px">
            <div class="textotitulo tl pl15">
                SERVICIOS QUE CUENTA EL PREDIO
            </div>
        </div>

        <!-- 49 AL 55-->
        <div style="width: 716px;height:16px;margin: auto;">

            <div style="width: 73px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    49
                </div>
                <div class="texto fz8 lh14">
                    LUZ
                </div>
            </div>
            <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->serviciobasico?->luz }}
            </div>
            <div style="width: 73px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    50
                </div>
                <div class="texto fz8 lh14">
                    AGUA
                </div>
            </div>
            <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->serviciobasico?->agua }}
            </div>
            <div style="width: 74px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    51
                </div>
                <div class="texto fz8 lh14">
                    TELÉFONO
                </div>
            </div>
            <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->serviciobasico?->telefono }}
            </div>
            <div style="width: 74px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    52
                </div>
                <div class="texto fz8 lh14">
                    DESAGÜE
                </div>
            </div>
            <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->serviciobasico?->desague }}
            </div>
            <div style="width: 62px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    53
                </div>
                <div class="texto fz8 lh14">
                    GAS
                </div>
            </div>
            <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->serviciobasico?->gas }}
            </div>
            <div style="width: 74px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    54
                </div>
                <div class="texto fz8 lh14">
                    INTERNET
                </div>
            </div>
            <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->serviciobasico?->internet }}
            </div>
            <div style="width: 115px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    55
                </div>
                <div class="texto" style="font-size:5px;">
                    CONEXIÓN A TV POR CABLE<BR>O CABLE SATELITAL
                </div>
            </div>
            <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->serviciobasico?->tvcable }}
            </div>
            <div style="width: 38px;height: 16px;float:left;border:none;" class="fondoclaro">
                <div style="width: 37px;height: 8px;float:left;">
                    <div class="texto ti pl5" style="font-size:4px;">
                        1 = SI
                    </div>
                </div>
                <div style="width: 37px;height: 8px;float:left;">
                    <div class="texto ti pl5" style="font-size:4px;">
                        2 = NO
                    </div>
                </div>
            </div>
        </div>
        <!-- 49 AL 55-->
        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
            <div class="textotitulo tl pl15">
                CONSTRUCCIONES
            </div>
        </div>

        <!--CONSTRUCCIONES-->

        <div style="width: 716px;height:48px;margin: auto;" class="fondoclaro">
            <div style="width: 34px; height: 48px; float: left;">
                <div class="numeros">
                    301
                </div>
                <div class="textobloque fz6 lh14">
                    <br>
                    BLOQUE
                </div>
            </div>

            <div style="width: 45PX;height: 48px;float:left;">
                <div class="numeros">
                    56
                </div>
                <div class="textobloque fz6 lh8 ">
                    <BR><BR>N° PISO<BR>
                    SÓTANO<BR>
                    MEZZANINE
                </div>
            </div>
            <div style="width: 60PX;height: 48px;float:left;border:none;">
                <div style="width: 60PX;height: 32px;float:left;">
                    <div class="numeros">
                        57
                    </div>
                    <div class="textobloque fz6 lh14">
                        FECHA DE CONSTRUCCION
                    </div>
                </div>
                <div style="width: 60PX;height: 16px;float:left;border:none;">
                    <div style="width: 29px;height: 16px;float:left;">
                        MES
                    </div>
                    <div style="width: 28.9px;height: 16px;float:left;">
                        AÑO
                    </div>
                </div>
            </div>
            <div style="width: 36px;height: 48px;float:left;">
                <div class="numeros">
                    58
                </div>
                <div class="texto fz8 lh14">
                    MEP
                </div>
            </div>
            <div style="width: 36px;height: 48px;float:left;">
                <div class="numeros">
                    59
                </div>
                <div class="texto fz8 lh14">
                    ECS
                </div>
            </div>
            <div style="width: 36px;height: 48px;float:left;">
                <div class="numeros">
                    60
                </div>
                <div class="texto fz8 lh14">
                    ECC
                </div>
            </div>
            <div style="width: 341px;height: 48px;float:left;border:none;">
                <div style="width: 341px;height: 16px;float:left;">

                    <div class="texto fz8 lh14">
                        CATEGORIAS
                    </div>
                </div>
                <div style="width: 341px;height: 32px;float:left;border:none;">
                    <div style="width: 341px;height: 32px;float:left;border:none;">
                        <div style="width: 90px;height: 32px;float:left;border:none;">

                            <div style="width: 90px;height: 16px;float:left;">
                                <div style="width: 89px;height: 15;float:left;">
                                    <div class="texto fz8 lh14">
                                        ESTRUCTURAS
                                    </div>
                                </div>
                            </div>
                            <div style="width: 90px;height: 16px;float:left;border:none;">
                                <div style="width: 43.9px;height: 16px;float:left;">
                                    <div class="numeros">
                                        61
                                    </div>
                                    <div class="texto" style="font-size:4px;">
                                        MUROS Y <BR>COLUMNAS
                                    </div>
                                </div>
                                <div style="width: 43.9px;height: 16px;float:left;">
                                    <div class="numeros">
                                        62
                                    </div>
                                    <div class="texto" style="font-size:4px;">
                                        TECHOS
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div style="width: 200px;height: 32px;float:left;">

                            <div style="width: 200px;height: 15;float:left;">
                                <div class="texto fz8 lh14">
                                    ACABADOS
                                </div>
                            </div>

                            <div style="width: 200px;height: 16px;float:left;border:none;">
                                <div style="width: 49px;height: 16px;float:left;">
                                    <div class="numeros">
                                        63
                                    </div>
                                    <div class="texto" style="font-size:4px;">
                                        PISOS
                                    </div>
                                </div>
                                <div style="width: 49px;height: 16px;float:left;">
                                    <div class="numeros">
                                        64
                                    </div>
                                    <div class="texto" style="font-size:4px;">
                                        PUERTAS Y <BR>VENTANAS
                                    </div>
                                </div>
                                <div style="width: 49px;height: 16px;float:left;">
                                    <div class="numeros">
                                        65
                                    </div>
                                    <div class="texto" style="font-size:4px;">
                                        REVEST.
                                    </div>

                                </div>
                                <div style="width: 48.9px;height: 16px;float:left;">
                                    <div class="numeros">
                                        66
                                    </div>
                                    <div class="texto" style="font-size:4px;">
                                        BAÑOS
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div style="width: 48.9px;height: 32px;float:left;">
                            <div class="numeros">
                                67
                            </div>
                            <div class="textobloque fz6" style="padding-left:5px;">
                                INST. ELECTRICAS SANITARIAS
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="width: 83px;height: 48px;float:left;border:none;">
                <div style="width: 83px;height: 16px;float:left;">
                    ÁREA CONSTRUIDA(M2)
                </div>
                <div style="width: 83px;height: 32px;float:left;border:none;">
                    <div style="width: 83px;height: 32px;float:left;">
                        <div class="numeros">
                            68
                        </div>
                        <div class="texto fz8 lh14">
                            AREA VERIFICADA
                        </div>
                    </div>
                </div>
            </div>
            <div style="width: 39px;height: 48px;float:left;">
                <div class="numeros">
                    69
                </div>
                <div class="texto fz8 lh14">
                    UCA
                </div>
            </div>
        </div>


        <!--FOREACH CONSTRUCCIONES -->
        @foreach ($ficha?->construccions as $construccion)
            <div style="width: 716px;height:16px;margin: auto;">
                <div style="width: 34px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $construccion?->bloque }}
                </div>
                <div style="width: 45PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $construccion?->nume_piso }}
                </div>
                <div style="width: 29px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($construccion?->fecha != '')
                        {{ date('m', strtotime($construccion?->fecha)) }}
                    @endif

                </div>
                <div style="width: 29px;height: 16px;float:left;" class="texto2 fz8 lh14">

                    @if ($construccion?->fecha != '')
                        {{ date('Y', strtotime($construccion?->fecha)) }}
                    @endif
                </div>
                <div style="width: 36px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $construccion?->mep }}
                </div>
                <div style="width: 36px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $construccion?->ecs }}
                </div>
                <div style="width: 36px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $construccion?->ecc }}
                </div>
                <div style="width: 44px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $construccion?->estr_muro_col }}
                </div>
                <div style="width: 44px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $construccion?->estr_techo }}
                </div>
                <div style="width: 49px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $construccion?->acab_piso }}
                </div>
                <div style="width: 49px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $construccion?->acab_puerta_ven }}
                </div>
                <div style="width: 49px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $construccion?->acab_revest }}
                </div>
                <div style="width: 49px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $construccion?->acab_bano }}
                </div>

                <div style="width: 50px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $construccion?->inst_elect_sanita }}
                </div>
                <div style="width: 82px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $construccion?->area_verificada }}
                </div>
                <div style="width: 39px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $construccion?->uca }}
                </div>
            </div>
        @endforeach
        <!-- 70 -->
        <div style="width: 716px;height:48px;margin: auto;">

            <div style="width: 572px;height: 48px;float:left;">
                <div style="width: 572px;height: 11px;float:left;border:none;">
                    <div style="width: 113px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            MEP: MATERIAL ESTRUC. PREDOMINANTE
                        </div>
                    </div>
                    <div style="width: 113px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            ECS: ESTADO DE CONSERVACION
                        </div>
                    </div>
                    <div style="width: 113px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            ECC:ESTADO DE LA CONSTRUCCION
                        </div>
                    </div>
                    <div style="width: 228.9px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            UCA: UBICACION DE CONSTRUCCION ANTIRREGLAMENTARIA
                        </div>
                    </div>
                </div>
                <div style="width: 572px;height: 9px;float:left;border:none;" class="fondoclarito">
                    <div style="width: 113px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            01 CONCRETO
                        </div>
                    </div>
                    <div style="width: 113px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            01 MUY BUENO
                        </div>
                    </div>
                    <div style="width: 113px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            01 TERMINADO
                        </div>
                    </div>
                    <div style="width: 113.9px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            01 EN RETIRO MUNICIPAL
                        </div>
                    </div>
                    <div style="width: 114px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            05 ALTURA NO REGLAMENTARIA
                        </div>
                    </div>
                </div>
                <div style="width: 572px;height: 9px;float:left;border:none;" class="fondoclarito">
                    <div style="width: 113px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            02 LADRILLO
                        </div>
                    </div>
                    <div style="width: 113px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            02 BUENO
                        </div>
                    </div>
                    <div style="width: 113px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            02 EN CONSTRUCCION
                        </div>
                    </div>
                    <div style="width: 113.9px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            02 EN JARDÍN DE AISLAMIENTO
                        </div>
                    </div>
                    <div style="width: 114px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            06 EN PARQUE
                        </div>
                    </div>
                </div>
                <div style="width: 572px;height: 9px;float:left;border:none;" class="fondoclarito">
                    <div style="width: 113px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            03 ADOBE (QUINCHA MADERA)
                        </div>
                    </div>
                    <div style="width: 113px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            03 REGULAR
                        </div>
                    </div>
                    <div style="width: 113px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            03 INCONCLUSA
                        </div>
                    </div>
                    <div style="width: 113.9px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            03 EN VIA PUBLICA
                        </div>
                    </div>
                    <div style="width: 114px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            07 EN BIEN COMUN
                        </div>
                    </div>
                </div>
                <div style="width: 572px;height: 9px;float:left;border:none;" class="fondoclarito">
                    <div style="width: 113px;height: 11px;float:left;">

                    </div>
                    <div style="width: 113px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            04 MALO
                        </div>
                    </div>
                    <div style="width: 113px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            04 EN RUINAS
                        </div>
                    </div>
                    <div style="width: 113.9px;height: 11px;float:left;">
                        <div class="texto fz6 lh8">
                            04 EN LOTE COLINDANTE
                        </div>
                    </div>
                    <div style="width: 114px;height: 11px;float:left;">

                    </div>
                </div>
            </div>
            <div style="width: 54.9px;height: 56px;float:left;" class="fondoclaro">
                <div style="width: 54px;height: 19px;float:left;">
                    <div class="numeros">
                        70
                    </div>
                    <div class="texto fz6 lh6">
                        % DE BIEN<BR>
                        COMÚN
                    </div>
                </div>
                <div style="width: 54px;height: 18px;float:left;">
                    <div class="texto fz6 lh14">
                        LEGAL
                    </div>
                </div>
                <div style="width: 54px;height: 18px;float:left;">
                    <div class="texto fz6 lh14">
                        FISICO
                    </div>
                </div>
            </div>
            <div style="width: 43px;height: 56px;float:left;">
                <div style="width: 54px;height: 19px;float:left;" class="fondoclaro">
                    <div class="texto fz6 lh14">
                        TERRENO
                    </div>
                </div>
                <div style="width: 54px;height: 18px;float:left;" class="texto2 fz8 lh14">
                    {{ $ficha?->fichaindividual?->porc_bc_terr_legal }}
                </div>
                <div style="width: 54px;height: 18px;float:left;" class="texto2 fz8 lh14">
                    {{ $ficha?->fichaindividual?->porc_bc_terr_fisc }}

                </div>
            </div>
            <div style="width: 42px;height: 56px;float:left;">
                <div style="width: 54px;height: 19px;float:left;" class="fondoclaro">
                    <div class="texto fz6 lh14">
                        CONSTRUC.
                    </div>
                </div>
                <div style="width: 54px;height: 18px;float:left;" class="texto2 fz8 lh14">
                    {{ $ficha?->fichaindividual?->porc_bc_const_legal }}
                </div>
                <div style="width: 54px;height: 18px;float:left;" class="texto2 fz8 lh14">
                    {{ $ficha?->fichaindividual?->porc_bc_const_fisc }}
                </div>
            </div>

        </div>
        <!-- 70 -->
        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
            <div class="textotitulo tl pl15">
                OBRAS COMPLEMENTARIAS / OTRAS INSTALACIONES
            </div>
        </div>

        <!-- 71 - 69 -->
        <div style="width: 716px;height:32px;margin: auto;" class="fondoclaro">
            <div style="width: 64px;height: 32px;float:left;">
                <div class="numeros">
                    71
                </div>
                <div class="texto fz8 lh14">
                    CÓDIGO
                </div>
            </div>
            <div style="width: 307px;height: 32px;float:left;">
                <div class="numeros">
                    72
                </div>
                <div class="texto fz8 lh14">
                    DESCRIPCION
                </div>
            </div>

            <div style="width: 83px;height: 32px;float:left;border:none;">
                <div style="width: 83px;height: 16px;float:left;">
                    <div class="numeros">
                        57
                    </div>
                    <div class="texto fz8 lh14">
                        FECHA CONST.
                    </div>
                </div>
                <div style="width: 83px;height: 16px;float:left;border:none;">
                    <div style="width: 40px;height: 16px;float:left;">
                        <div class="texto fz8 lh14">
                            MES
                        </div>
                    </div>
                    <div style="width: 41px;height: 16px;float:left;">
                        <div class="texto fz8 lh14">
                            AÑO
                        </div>
                    </div>
                </div>
            </div>
            <div style="width: 32px;height: 32px;float:left;">
                <div class="numeros">
                    58
                </div>
                <div class="texto fz8 lh14">
                    MEP
                </div>
            </div>
            <div style="width: 32px;height: 32px;float:left;">
                <div class="numeros">
                    59
                </div>
                <div class="texto fz8 lh14">
                    ECS
                </div>
            </div>
            <div style="width: 32px;height: 32px;float:left;">
                <div class="numeros">
                    60
                </div>
                <div class="texto fz8 lh14">
                    ECC
                </div>
            </div>
            <div style="width: 62px;height: 32px;float:left;">
                <div class="numeros">
                    73
                </div>
                <div class="texto fz8 lh14">
                    PRODUCTO <BR>TOTAL
                </div>
            </div>
            <div style="width: 62px;height: 32px;float:left;">
                <div class="numeros">
                    74
                </div>
                <div class="texto fz8 lh14">
                    UNIDAD DE MEDIDA
                </div>
            </div>
            <div style="width: 33.9px;height: 32px;float:left;">
                <div class="numeros">
                    69
                </div>
                <div class="texto fz8 lh14">
                    UCA
                </div>
            </div>
        </div>
        <!--FOREACH 71 - 69-->
        @foreach ($ficha?->instalacions as $instalacion)
            <div style="width: 716px;height:16px;margin: auto;">
                <div style="width: 64px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $instalacion?->codiinstalacion?->codi_instalacion }}
                </div>
                <div style="width: 307px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $instalacion?->codiinstalacion?->desc_instalacion }}
                </div>
                <div style="width: 40px;height: 16px;float:left;" class="texto2 fz8 lh14">

                    @if ($instalacion?->fecha != '')
                        {{ date('m', strtotime($instalacion?->fecha)) }}
                    @endif
                </div>
                <div style="width: 41px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($instalacion?->fecha != '')
                        {{ date('Y', strtotime($instalacion?->fecha)) }}
                    @endif
                </div>
                <div style="width: 32px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $instalacion?->mep }}
                </div>
                <div style="width: 32px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $instalacion?->ecs }}
                </div>
                <div style="width: 32px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $instalacion?->ecc }}
                </div>
                <div style="width: 62px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $instalacion?->prod_total }}
                </div>
                <div style="width: 62px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $instalacion?->uni_med }}
                </div>
                <div style="width: 33.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $instalacion?->uca }}
                </div>
            </div>
        @endforeach
        <!--FOREACH 71 - 69-->
        <!-- 71 - 69 -->
        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
            <div class="textotitulo tl pl15">
                DOCUMENTOS
            </div>
        </div>

        <!-- 71 - 69 -->
        <!-- DOCUMENTOS -->
        <div style="width: 716px;height:32px;margin: auto;" class="fondoclaro">
            <div style="width: 129px;height: 32px;float:left;">
                <div class="numeros">
                    75
                </div>
                <div class="texto fz8 lh14">
                    TIPO DE <BR>DOCUMENTO
                </div>
            </div>
            <div style="width: 273px;height: 32px;float:left;">
                <div class="numeros">
                    76
                </div>
                <div class="texto fz8 lh14">
                    N° DE DOCUMENTO
                </div>
            </div>

            <div style="width: 172px;height: 32px;float:left;border:none;">
                <div style="width: 172px;height: 16px;float:left;">
                    <div class="numeros">
                        77
                    </div>
                    <div class="texto fz8 lh14">
                        FECHA
                    </div>
                </div>
                <div style="width: 175px;height: 16px;float:left;border:none;">
                    <div style="width: 56px;height: 16px;float:left;">
                        <div class="texto fz8 lh14">
                            DIA
                        </div>
                    </div>
                    <div style="width: 56px;height: 16px;float:left;">
                        <div class="texto fz8 lh14">
                            MES
                        </div>
                    </div>
                    <div style="width: 56.9px;height: 16px;float:left;">
                        <div class="texto fz8 lh14">
                            AÑO
                        </div>
                    </div>
                </div>
            </div>
            <div style="width: 139px;height: 32px;float:left;">
                <div class="numeros">
                    78
                </div>
                <div class="texto fz8 lh14">
                    AREA AUTORIZADA
                </div>
            </div>
        </div>
        <!-- DOCUMENTOS -->
        <!-- 71 - 69 -->
        @foreach ($ficha?->documento_adjuntos as $documento)
            <!-- LEYENDA TIPO VIA TIPO PUERTA-->
            <div style="width: 716px;height:16px;margin: auto;">
                <div style="width: 129px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $documento?->tipo_doc }}
                </div>
                <div style="width: 273px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $documento?->nume_doc }}
                </div>
                <div style="width: 56px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($documento?->fecha_doc != '')
                        {{ date('d', strtotime($documento?->fecha_doc)) }}
                    @endif
                </div>
                <div style="width: 56px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($documento?->fecha_doc != '')
                        {{ date('m', strtotime($documento?->fecha_doc)) }}
                    @endif
                </div>
                <div style="width: 56.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($documento?->fecha_doc != '')
                        {{ date('Y', strtotime($documento?->fecha_doc)) }}
                    @endif
                </div>
                <div style="width: 139px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $documento?->area_autorizada }}
                </div>
            </div>
            <!-- LEYENDA TIPO VIA TIPO PUERTA-->
        @endforeach
        <!-- LEYENDA TIPO VIA TIPO PUERTA-->
        <div style="width: 716px;height:30px;margin: auto;" class="fondoclarito">
            <div style="width: 142px;height: 30px;float:left;">
                <div style="width: 142px;height: 10px;float:left;">
                    <div class="texto fz6 ti pl15">
                        01 CONFORMIDAD DE OBRA
                    </div>
                </div>
                <div style="width: 142px;height: 10px;float:left;">
                    <div class="texto fz6 ti pl15">
                        02 LICENCIA DE CONSTRUCCION
                    </div>
                </div>
                <div style="width: 142px;height: 10px;float:left;">
                    <div class="texto fz6 ti pl15">
                        03 DECLARATORIA DE FÁBRICA
                    </div>
                </div>
            </div>
            <div style="width: 142px;height: 30px;float:left;">
                <div style="width: 142px;height: 10px;float:left;">
                    <div class="texto fz6 ti pl15">
                        04 DECLARACIÓN JURADA AUTOAVALÚD
                    </div>
                </div>
                <div style="width: 142px;height: 10px;float:left;">
                    <div class="texto fz6 ti pl15">
                        05 RESOLUCIÓN DE EXONERACIÓN
                    </div>
                </div>
                <div style="width: 142px;height: 10px;float:left;">
                    <div class="texto fz6 ti pl15">
                        06 PODERES
                    </div>
                </div>
            </div>
            <div style="width: 142px;height: 30px;float:left;">
                <div style="width: 142px;height: 10px;float:left;">
                    <div class="texto fz6 ti pl15">
                        07 ESCRITURA PUBLICA
                    </div>
                </div>
                <div style="width: 142px;height: 10px;float:left;">
                    <div class="texto fz6 ti pl15">
                        08 MINUTA COMPRA VENTA
                    </div>
                </div>
                <div style="width: 142px;height: 10px;float:left;">
                    <div class="texto fz6 ti pl15">
                        09 DOC. PRIVADO DE TRANSFERENCIA
                    </div>
                </div>
            </div>
            <div style="width: 142px;height: 30px;float:left;">
                <div style="width: 142px;height: 10px;float:left;">
                    <div class="texto fz6 ti pl15">
                        10 CONSTANCIA DE POSESIÓN
                    </div>
                </div>
                <div style="width: 142px;height: 10px;float:left;">
                    <div class="texto fz6 ti pl15">
                        11 PARTIDA DE DEFUNCIÓN
                    </div>
                </div>
                <div style="width: 142px;height: 10px;float:left;">
                    <div class="texto fz6 ti pl15">
                        12 CERTIFICADO CATASTRAL
                    </div>
                </div>
            </div>
            <div style="width: 143px;height: 30px;float:left;">
                <div style="width: 143px;height: 10px;float:left;">
                    <div class="texto fz6 ti pl15">
                        13 HOJA INFORMATIVA CATASTRAL
                    </div>
                </div>
                <div style="width: 143px;height: 10px;float:left;">
                    <div class="texto fz6 ti pl15">
                        14 PARTIDA DE NACIMIENTO
                    </div>
                </div>
                <div style="width: 143px;height: 10px;float:left;">

                </div>
            </div>

        </div>
        <!-- LEYENDA TIPO VIA TIPO PUERTA-->
        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
            <div class="textotitulo tl pl15">
                INSCRIPCIÓN DEL PREDIO CATASTRAL EN EL REGISTRO DE PREDIOS
            </div>
        </div>

        <!-- 79 AL 80-->
        <div style="width: 716px;height:16px;margin: auto;">

            <div style="width: 125px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    79
                </div>
                <div class="texto  fz6 lh6">
                    TIPO DE PARTIDA<BR>REGISTRAL
                </div>
            </div>

            <div style="width: 100px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    80
                </div>
                <div class="texto  fz6 lh6">
                    NUMERO
                </div>
            </div>

            <div style="width: 59px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    81
                </div>
                <div class="texto  fz6 lh6">
                    FOJAS
                </div>
            </div>

            <div style="width: 61px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    82
                </div>
                <div class="texto  fz6 lh6">
                    ASIENTO
                </div>
            </div>

            <div style="width: 101px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    83
                </div>
                <div class="texto  fz6 lh6">
                    FECHA DE INSCRIPCION<BR>DEL PREDIO
                </div>
            </div>

            <div style="width: 98px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    84
                </div>
                <div class="texto  fz6 lh6">
                    DECLARATORIA DE FÁBRICA
                </div>
            </div>

            <div style="width: 64px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    85
                </div>
                <div class="texto  fz6 lh6">
                    AS. INSC.<BR>DE FABRICA
                </div>
            </div>
            <div style="width: 100px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    86
                </div>
                <div class="texto  fz6 lh6">
                    FECHA DE INSCRIPCION<BR> DE FABRICA
                </div>
            </div>



            <div style="width: 109px;height: 16px;float:left;border:none;" class="fondoclarito">
                <div style="width: 53px;height: 8px;float:left;">
                    <div class="texto ti pl5" style="font-size:4px;">
                        01 TOMO
                    </div>
                </div>
                <div style="width: 53.9px;height: 8px;float:left;">
                    <div class="texto ti pl5" style="font-size:4px;">
                        03 PART. ELECTRONICA
                    </div>
                </div>
                <div style="width: 53px;height: 8px;float:left;">
                    <div class="texto ti pl5" style="font-size:4px;">
                        02 FICHA
                    </div>
                </div>
                <div style="width: 53.9px;height: 8px;float:left;">
                    <div class="texto ti pl5" style="font-size:4px;">
                        04 CÓDIGO DE PREDIO
                    </div>
                </div>
            </div>

            <div style="width: 16px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->sunarp != '')
                    {{ $ficha?->sunarp?->tipo_partida }}
                @endif
            </div>

            <div style="width: 100px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->sunarp != '')
                    {{ $ficha?->sunarp?->nume_partida }}
                @endif
            </div>

            <div style="width: 59px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->sunarp != '')
                    {{ $ficha?->sunarp?->fojas }}
                @endif
            </div>

            <div style="width: 61px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->sunarp != '')
                    {{ $ficha?->sunarp?->asiento }}
                @endif
            </div>

            <div style="width: 30px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->sunarp != '')
                    @if ($ficha?->sunarp?->fecha_inscripcion != '')
                        {{ date('d', strtotime($ficha?->sunarp?->fecha_inscripcion)) }}
                    @endif
                @endif
            </div>
            <div style="width: 36px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->sunarp != '')
                    @if ($ficha?->sunarp?->fecha_inscripcion != '')
                        {{ date('m', strtotime($ficha?->sunarp?->fecha_inscripcion)) }}
                    @endif
                @endif
            </div>
            <div style="width: 33px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->sunarp != '')
                    @if ($ficha?->sunarp?->fecha_inscripcion != '')
                        {{ date('Y', strtotime($ficha?->sunarp?->fecha_inscripcion)) }}
                    @endif
                @endif
            </div>
            <div style="width: 80px;height: 16px;float:left;border:none;" class="fondoclarito">
                <div style="width: 79px;height: 8px;float:left;">
                    <div class="texto ti pl5" style="font-size:4px;">
                        01 = FAB INSCRITA
                    </div>
                </div>
                <div style="width: 79px;height: 8px;float:left;">
                    <div class="texto ti pl5" style="font-size:4px;">
                        02 = FAB NO INSCRITA
                    </div>
                </div>
            </div>
            <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->sunarp != '')
                    {{ $ficha?->sunarp?->codi_decla_fabrica }}
                @endif
            </div>
            <div style="width: 64px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->sunarp != '')
                    {{ $ficha?->sunarp?->asie_fabrica }}
                @endif
            </div>
            <div style="width: 30px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->sunarp != '')
                    @if ($ficha?->sunarp?->fecha_fabrica != '')
                        {{ date('d', strtotime($ficha?->sunarp?->fecha_fabrica)) }}
                    @endif
                @endif
            </div>
            <div style="width: 36px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->sunarp != '')
                    @if ($ficha?->sunarp?->fecha_fabrica != '')
                        {{ date('m', strtotime($ficha?->sunarp?->fecha_fabrica)) }}
                    @endif
                @endif
            </div>
            <div style="width: 32px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->sunarp != '')
                    @if ($ficha?->sunarp?->fecha_fabrica != '')
                        {{ date('Y', strtotime($ficha?->sunarp?->fecha_fabrica)) }}
                    @endif
                @endif
            </div>
        </div>
        <!-- 79 AL 80-->

        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
            <div class="textotitulo tl pl15">
                EVALUACIÓN DEL PREDIO CATASTRAL
            </div>
        </div>

        <!-- 87 -->
        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 716px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    87
                </div>
                <div class="texto fz8 lh14">
                    AREA DE TERRENO INVADIDA(M2)
                </div>
            </div>
            <div style="width: 113px;height: 16px;float:left;" class="fondoclaro">
                <div class="texto fz8 lh14">
                    EN LOTE COLINDANTE
                </div>
            </div>
            <div style="width: 63px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->fichaindividual?->en_colindante }}
            </div>
            <div style="width: 114px;height: 16px;float:left;" class="fondoclaro">
                <div class="texto fz8 lh14">
                    EN ÁREA PÚBLICA
                </div>
            </div>
            <div style="width: 63px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->fichaindividual?->en_area_publica }}
            </div>
            <div style="width: 113px;height: 16px;float:left;" class="fondoclaro">
                <div class="texto fz8 lh14">
                    EN JARDÍN DE AISLAMIENTO
                </div>
            </div>
            <div style="width: 64px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->fichaindividual?->en_jardin_aislamiento }}
            </div>
            <div style="width: 113px;height: 16px;float:left;" class="fondoclaro">
                <div class="texto fz8 lh14">
                    EN ÁREA INTANGIBLE
                </div>
            </div>
            <div style="width: 65px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->fichaindividual?->en_area_intangible }}
            </div>
        </div>
        <!-- 87-->
        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
            <div class="textotitulo tl pl15">
                INFORMACIÓN COMPLEMENTARIA
            </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 126px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    88
                </div>
                <div class="texto fz8 lh14">
                    CONDICION DEL DECLARANTE
                </div>
            </div>
            <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->fichaindividual?->cond_declarante }}
            </div>
            <div style="width: 77px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto fz6 lh6">
                    01 TITULAR CATASTRAL
                </div>
            </div>
            <div style="width: 86px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto fz6 lh6">
                    02 REPRESENTANTE LEGAL
                </div>
            </div>
            <div style="width: 67px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto fz6 lh6">
                    03 ARRENDATARIO
                </div>
            </div>
            <div style="width: 77px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto fz6 lh6">
                    04 FAMILIAR
                </div>
            </div>
            <div style="width: 61px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto ti pl5" style="font-size:4px;">
                    05 VECINO
                </div>
            </div>
            <div style="width: 197px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto ti pl5" style="font-size:4px;">
                    06 OTRO(Especificar):..............................................
                </div>
            </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 716px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    89
                </div>
                <div class="texto fz8 lh14">
                    IDENTIFICACION DE LOS LITIGANTES
                </div>
            </div>
            <div style="width: 65px;height: 16px;float:left;" class="fondoclaro">
                <div class="texto fz8 lh14">
                    TD
                </div>
            </div>
            <div style="width: 133px;height: 16px;float:left;" class="fondoclaro">
                <div class="texto fz8 lh14">
                    N° DOCUMENTO
                </div>
            </div>
            <div style="width: 371px;height: 16px;float:left;" class="fondoclaro">
                <div class="texto fz8 lh14">
                    APELLIDOS Y NOMBRES DE LOS LITIGANTES
                </div>
            </div>
            <div style="width: 143px;height: 16px;float:left;" class="fondoclaro">
                <div class="texto fz8 lh14">
                    CÓDIGO DEL CONTRIBUYENTE
                </div>
            </div>
            <!--foreach-->
            @if ($ficha?->litigantes != '')
                @foreach ($ficha?->litigantes as $litigante)
                    <div style="width: 65px;height: 16px;float:left;" class="texto2 fz8 lh14">
                        {{ $litigante?->persona?->tipo_doc }}
                    </div>
                    <div style="width: 133px;height: 16px;float:left;" class="texto2 fz8 lh14">
                        {{ $litigante?->persona?->nume_doc }}
                    </div>
                    <div style="width: 371px;height: 16px;float:left;" class="texto2 fz8 lh14">
                        {{ $litigante?->persona?->nombres }} {{ $litigante?->persona?->ape_paterno }}
                        {{ $litigante?->persona?->ape_materno }}
                    </div>
                    <div style="width: 143px;height: 16px;float:left;" class="texto2 fz8 lh14">
                        {{ $litigante?->codi_contribuye }}
                    </div>
                    <!--foreach-->
                @endforeach
            @else
                <div style="width: 65px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>
                <div style="width: 133px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>
                <div style="width: 371px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>
                <div style="width: 143px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>
                <!--foreach-->
            @endif

        </div>


        <div style="width: 716px;height:16px;margin: auto;">

            <div style="width: 158px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    90
                </div>
                <div class="texto fz8 lh14">
                    ESTADO DE LLENADO DE LA FICHA
                </div>
            </div>
            <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->fichaindividual?->esta_llenado }}
            </div>

            <div style="width: 170px;height: 16px;float:left;border:none;" class="fondoclarito">
                <div style="width: 30px;height: 16px;float:left;">
                    <div class="texto fz4 lh6">
                        01 FICHA <br> COMPLETA
                    </div>
                </div>
                <div style="width: 34px;height: 16px;float:left;">
                    <div class="texto fz4 lh6">
                        02 FICHA INCOMPLETA
                    </div>
                </div>
                <div style="width: 42px;height: 16px;float:left;">
                    <div class="texto fz4 lh6">
                        03 COMPLETADA EN OFICINA
                    </div>
                </div>
                <div style="width: 59.9px;height: 16px;float:left;">
                    <div class="texto fz4 lh6">
                        04 COMPLETADA EN CONTROL EXTERIOR
                    </div>
                </div>
            </div>

            <div style="width: 165px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    91
                </div>
                <div class="texto fz8 lh14">
                    N° DE HABITANTE
                </div>
            </div>
            <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->fichaindividual?->nume_habitantes }}
            </div>

            <div style="width: 165px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    92
                </div>
                <div class="texto fz8 lh14">
                    N° DE FAMILIAS
                </div>
            </div>
            <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->fichaindividual?->nume_familias }}
            </div>
        </div>
        <!-- 49 AL 92-->


        <div style="width: 716px;height:16px;margin: auto;">

            <div style="width: 210px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    93
                </div>
                <div class="texto fz8 lh14">
                    MANTENIMIENTO
                </div>
            </div>
            <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->fichaindividual?->mantenimiento }}
            </div>
            <div style="width: 486px;height: 15px;float:left; " class="fondoclarito">
                <div style="width: 120px;height: 15px;float:left;">
                    <div class="texto fz6 lh6">
                        01 = POR SER PREDIO CATASTRAL NUEVO
                    </div>
                </div>
                <div style="width: 120px;height: 15px;float:left;">
                    <div class="texto fz6 lh6">
                        02 = POR VARIACION EN LA CONSTRUCCIÓN
                    </div>
                </div>
                <div style="width: 120px;height: 15px;float:left;">
                    <div class="texto fz6 lh6">
                        03 = POR CAMBIO DEL TITULAR CATASTRAL
                    </div>
                </div>
                <div style="width: 122px;height: 15px;float:left;">
                    <div class="texto fz6 lh6">
                        04 = POR CAMBIO DE USO
                    </div>
                </div>
            </div>
        </div>

        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
            <div class="textotitulo tl pl15">
                OBSERVACIONES
            </div>
        </div>

        <div style="width: 716px;height:16px;margin: auto;">

            <div style="width: 716px;height: 45px;float:left;" class="texto2 fz8 lh14">
                {{ $ficha?->fichaindividual?->observaciones }}
            </div>
        </div>


        <div style="width: 716px;height:23px;margin: auto; margin-top:5px;">
            <div class="texto ti pl15" style="font-size:7PX;">
                DECLARO BAJO JURAMENTO QUE LOS DATOS CONSIGNADOS EN LA DECLARACIÓN SON VERDADEROS
                <BR>
                LA FICHA CATASTRAL CERTIFICA LA EXISTENCIA Y CARACTERISTICAS DEL PREDIO, ESTA FICHA NO GENERA DERECHOS
                DE PROPIEDAD, NI REGULARIZA LAS OBLIGACIONES MUNICIPALES
            </div>
        </div>
        <div style="width: 716px;height:23px;margin: auto;">
            <div style="width: 178px;height: 70px;float:left;">
                <div class="numeros">
                    94
                </div>
                <div class="texto fz8 lh14">
                    FIRMA DEL DECLARANTE
                </div>
            </div>
            <div style="width: 178px;height: 70px;float:left;">
                <div class="numeros">
                    95
                </div>
                <div class="texto fz8 lh14">
                    FIRMA DEL SUPERVISOR
                </div>
            </div>
            <div style="width: 178px;height: 70px;float:left;">
                <div class="numeros">
                    96
                </div>
                <div class="texto fz8 lh14">
                    FIRMA DEL TÉCNICO CATASTRAL
                </div>
            </div>
            <div style="width: 178px;height: 70px;float:left;">
                <div style="width: 178px;height: 56px;float:left;">
                    <div class="numeros">
                        97
                    </div>
                    <div class="texto fz8 lh14">
                        V°B° DEL VERIFICADOR CATASTRAL
                    </div>
                </div>
                <div style="width: 178px;height: 13px;float:left;">
                    <div class="texto ti pl15">

                        DNI: @if ($ficha?->verificador != '')
                            {{ $ficha?->verificador?->nume_doc }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div style="width: 716px;height:14px;margin: auto;">
            <div style="width: 178px;height: 14px;float:left;">
                <div class="texto ti pl15">
                    DNI:@if ($ficha?->declarante != '')
                        {{ $ficha?->declarante?->nume_doc }}
                    @endif
                </div>

            </div>
            <div style="width: 178px;height: 14px;float:left;">
                <div class="texto ti pl15">
                    DNI: @if ($ficha?->supervisor != '')
                        {{ $ficha?->supervisor?->nume_doc }}
                    @endif
                </div>
            </div>
            <div style="width: 178px;height: 14px;float:left;">
                <div class="texto ti pl15">
                    DNI: @if ($ficha?->tecnico != '')
                        {{ $ficha?->tecnico?->nume_doc }}
                    @endif
                </div>
            </div>
            <div style="width: 178px;height: 14px;float:left;">
                <div class="texto ti pl15">
                    N° DE REGISTRO: {{ $ficha?->nume_registro }}
                </div>

            </div>
        </div>
        <div style="width: 716px;height:14px;margin: auto;">
            <div style="width: 178px;height: 14px;float:left;">
                <div class="texto ti pl15">
                    NOMBRES: @if ($ficha?->declarante != '')
                        {{ $ficha?->declarante?->nombres }}
                    @endif
                </div>
            </div>
            <div style="width: 178px;height: 14px;float:left;">
                <div class="texto ti pl15">
                    NOMBRES: @if ($ficha?->supervisor != '')
                        {{ $ficha?->supervisor?->nombres }}
                    @endif
                </div>
            </div>
            <div style="width: 178px;height: 14px;float:left;">
                <div class="texto ti pl15">
                    NOMBRES: @if ($ficha?->tecnico != '')
                        {{ $ficha?->tecnico?->nombres }}
                    @endif
                </div>
            </div>
            <div style="width: 178px;height: 14px;float:left;">
                <div class="texto ti pl15">
                    NOMBRES: @if ($ficha?->verificador != '')
                        {{ $ficha?->verificador?->nombres }}
                    @endif
                </div>
            </div>
        </div>
        <div style="width: 716px;height:28px;margin: auto;">
            <div style="width: 178px;height: 28px;float:left;">
                <div class="texto ti pl15">
                    APELLIDOS:@if ($ficha?->declarante != '')
                        {{ $ficha?->declarante?->ape_paterno }} {{ $ficha?->declarante?->ape_materno }}
                    @endif
                </div>
            </div>
            <div style="width: 178px;height: 28px;float:left;">
                <div class="texto ti pl15">
                    APELLIDOS: @if ($ficha?->supervisor != '')
                        {{ $ficha?->supervisor?->ape_paterno }} {{ $ficha?->supervisor?->ape_materno }}
                    @endif
                </div>
            </div>
            <div style="width: 178px;height: 28px;float:left;">
                <div class="texto ti pl15">
                    APELLIDOS: @if ($ficha?->tecnico != '')
                        {{ $ficha?->tecnico?->ape_paterno }} {{ $ficha?->tecnico?->ape_materno }}
                    @endif
                </div>
            </div>
            <div style="width: 178px;height: 28px;float:left;">
                <div class="texto ti pl15">
                    APELLIDOS: @if ($ficha?->verificador != '')
                        {{ $ficha?->verificador?->ape_paterno }} {{ $ficha?->verificador?->ape_materno }}
                    @endif
                </div>
            </div>
        </div>
        <div style="width: 716px;height:14px;margin: auto;">
            <div style="width: 178px;height: 14px;float:left;">
                <div class="texto ti pl15">
                    @if ($ficha?->fecha_declarante != '')
                        @if ($ficha?->fecha_declarante != '')
                            FECHA: {{ $ficha?->fecha_declarante }}
                        @endif
                    @endif
                </div>
            </div>
            <div style="width: 178px;height: 14px;float:left;">
                <div class="texto ti pl15">
                    @if ($ficha?->fecha_supervision != '')
                        @if ($ficha?->fecha_supervision != '')
                            FECHA: {{ $ficha?->fecha_supervision }}
                        @endif
                    @endif
                </div>
            </div>
            <div style="width: 178px;height: 14px;float:left;">
                <div class="texto ti pl15">
                    @if ($ficha?->fecha_levantamiento != '')
                        @if ($ficha?->fecha_levantamiento != '')
                            FECHA: {{ $ficha?->fecha_levantamiento }}
                        @endif
                    @endif
                </div>
            </div>
            <div style="width: 178px;height: 14px;float:left;">
                <div class="texto ti pl15">
                    @if ($ficha?->fecha_verificacion != '')
                        @if ($ficha?->fecha_verificacion != '')
                            FECHA: {{ $ficha?->fecha_verificacion }}
                        @endif
                    @endif
                </div>
            </div>
        </div>



        <div class="resumen "></div>
    @endforeach
</body>

</html>
