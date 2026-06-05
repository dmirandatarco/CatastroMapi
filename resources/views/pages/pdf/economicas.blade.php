<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ficha Catastral Economica</title>
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
            background-color: #9DD3AF;
        }

        .fondoclarito {
            background-color: #ffff7e;
            color: #c62200;

        }

        .fz4 {

            font-weight: bolder;
            font-size: 4px !important;
        }

        .fz5 {

            font-weight: bolder;
            font-size: 5px !important;
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

        .bn {
            border: none !important;
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
                FICHA CATASTRAL URBANA ECONOMICA
            </div>
        </div>

        <div style="width: 716px;height:16px;margin: auto;border:none; margin-bottom:5px;background-color:#fff;">

            <div style="width: 120px;height: 120px;float:left;border:none;">
                <img src="{{ $logos?->logo_institucion }}" alt="">
            </div>

            <div style="width: 427PX;height: 8px;float:left;border:none;">
                <div style="width: 427PX;height:16px;margin: auto;">
                    <div style="width: 211.9px;height: 16px;float:left;" class="fondoclaro">
                        <div class="numeros">
                            01
                        </div>
                        <div class="texto fz8 lh14">
                            CÓDIGO ÚNICO CATASTRAL - CUC
                        </div>
                    </div>
                    <div style="width: 211.9px;height: 16px;float:left;" class="fondoclaro">
                        <div class="numeros">
                            02
                        </div>
                        <div class="texto fz8 lh14">
                            CÓDIGO DE HOJA CATASTRAL
                        </div>
                    </div>
                </div>
                <div style="width: 427px;height:16px;margin: auto;">
                    <div style="width: 211.9;height: 16px;float:left;">
                        <div class="texto fz8 lh14">
                            {{ $ficha?->unicat?->cuc }}
                        </div>
                    </div>
                    <div style="width: 211.9;height: 16px;float:left;">
                        <div class="texto fz8 lh14">
                            {{ $ficha?->unicat?->codi_hoja_catastral }}
                        </div>
                    </div>
                </div>

                <!-- fila 01-->
                <div style="width: 427px;height:16px;margin: auto;">
                    <div style="width: 427px;height: 16px;float:left;" class="fondoclaro">
                        <div class="numeros">
                            03
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
                    <div style="width: 51px;height: 16px;float:left;">
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
                    <div style="width: 51px;height: 16px;float:left;" class="texto2 fz8 lh14">
                        {{ $ficha?->unicat?->codi_unidad }}
                    </div>
                    <div style="width: 17.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
                        {{ $ficha?->dc }}
                    </div>
                </div>
            </div>

            <div style="width: 120px;height: 120px;float:left;border:none;">
                <img src="{{ $logos?->logo_catastro }}" alt="">
            </div>
        </div>

        <!-- 18 AL 23-->
        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
            <div class="textotitulo tl pl15">
                IDENTIFICACIÓN DEL CONDUCTOR
            </div>
        </div>
        <!-- IDENTIFICACION DEL TITULAR CATASTRAL-->
        <!-- 20 AL 25-->
        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 93px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    140
                </div>
                <div class="texto fz7 lh14">
                    TIPO DE CONDUCTOR
                </div>
            </div>
            <div style="width: 19px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->conductor != '')
                    {{ $ficha?->conductor?->persona?->tipo_persona }}
                @endif
            </div>
            <div style="width: 90px;height: 16px;float:left;">
                <div style="width: 90px;height: 8px;float:left;" class="fondoclarito bn">
                    <div style="width: 100%;height: 7px;float:left;" class="texto tc fz5 lh6">
                        1 = PERSONA NATURAL
                    </div>
                </div>
                <div style="width: 90px;height: 7px;float:left;" class="fondoclarito bn">
                    <div style="width: 100%;height: 7px;float:left;" class="texto tc fz5 lh6">
                        2 = PERSONA JURIDICA
                    </div>
                </div>
            </div>
            <div style="width: 164px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    141
                </div>
                <div class="texto fz8 lh14">
                    NOMBRE COMERCIAL
                </div>
            </div>
            <div style="width: 345PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->fichaeconomica != '')
                    {{ $ficha?->fichaeconomica?->nomb_comercial }}
                @endif
            </div>
        </div>
        <div style="width: 716px;height:10px;margin: auto;">
            <div style="width: 119px;height: 16px;float:left;">
                TIPO DE DOC. IDENTIDAD
            </div>
            <div style="width: 97px;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                    01 NO PRESENTO DOCUMENTO
                </div>
            </div>
            <div style="width: 160px;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                    03 CARNET DE IDENTIDAD DE POLICIA NACIONAL
                </div>
            </div>
            <div style="width: 100px;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                    05 PARTIDA DE NACIMIENTO
                </div>
            </div>
            <div style="width: 100px;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                    07 CARNET DE EXTRANJERIA
                </div>
            </div>
            <div style="width: 139px;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                    08 OTROS (especif.).......................................
                </div>
            </div>
        </div>
        <!-- 24 AL 25-->
        <!--AQUI SE REPETIRA LOS TITULARES CATASTRALES FOREACH-->
        <!-- 22 AL 24-->

        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 100px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    26
                </div>
                <div class="texto fz8 lh14">
                    TIPO DOC. IDENTIDAD
                </div>
            </div>
            <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->conductor != '')
                    {{ $ficha?->conductor?->persona?->tipo_doc }}
                @endif
            </div>

            <div style="width: 97px;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                    02 DNI
                </div>
            </div>
            <div style="width: 160px;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                    04 CARNET DE IDENTIDAD DE FUERZAS ARMADAS
                </div>
            </div>
            <div style="width: 100px;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                    06 PASAPORTE
                </div>
            </div>
            <div style="width: 100px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    27
                </div>
                <div class="texto fz8 lh14">
                    N° DOC.
                </div>
            </div>
            <div style="width: 137px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->conductor != '')
                    @if ($ficha?->conductor?->persona?->tipo_persona == 1)
                        {{ $ficha?->conductor?->persona?->nume_doc }}
                    @endif
                @endif
            </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;">

            <div style="width: 170px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    31
                </div>
                <div class="texto fz8 lh14">
                    N° DE RUC
                </div>
            </div>
            <div style="width: 150px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->conductor != '')
                    @if ($ficha?->conductor?->persona?->tipo_persona == 2)
                        {{ $ficha?->conductor?->persona?->nume_doc }}
                    @endif
                @endif
            </div>
            <div style="width: 172px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    32
                </div>
                <div class="texto fz7 lh7">
                    APELLIDOS Y NOMBRES <BR> RAZÓN SOCIAL DEL CONDUCTOR
                </div>
            </div>
            <div style="width: 220px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->conductor != '')
                    @if ($ficha?->conductor?->persona?->tipo_persona == 1)
                        {{ $ficha?->conductor?->persona?->ape_paterno }}
                        {{ $ficha?->conductor?->persona?->ape_materno }} {{ $ficha?->conductor?->persona?->nombres }}
                    @endif
                    @if ($ficha?->conductor?->persona?->tipo_persona == 2)
                        {{ $ficha?->conductor?->persona?->razon_social }}
                    @endif
                @endif
            </div>
        </div>
        <!-- 22 AL 24-->
        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 220px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    142
                </div>
                <div class="texto fz8 lh14">
                    CONDICION DEL CONDUCTOR
                </div>
            </div>
            <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->conductor != '')
                    {{ $ficha?->conductor?->cond_conductor }}
                @endif
            </div>

            <div style="width: 97px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto tc fz6 lh12">
                    01 TITULAR CATASTRAL
                </div>
            </div>
            <div style="width: 166px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto tc fz6 lh12">
                    02 ARRENTADARIO
                </div>
            </div>
            <div style="width: 97px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto tc fz6 lh12">
                    03 CESION EN USO
                </div>
            </div>
            <div style="width: 112px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto tc fz6 lh12">
                    04 OTROS (ESPECIFICAR)
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
        <div style="width: 716px;height:16px;margin: auto;">

            <div style="width: 98px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    39
                </div>
                <div class="texto fz8 lh14">
                    DEPARTAMENTO
                </div>
            </div>
            <div style="width: 105px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    40
                </div>
                <div class="texto fz8 lh14">
                    PROVINCIA
                </div>
            </div>
            <div style="width: 123px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    41
                </div>
                <div class="texto fz8 lh14">
                    DISTRITO
                </div>
            </div>
            <div style="width: 76px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    42
                </div>
                <div class="texto fz8 lh14">
                    TELÉFONO
                </div>
            </div>
            <div style="width: 51px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    43
                </div>
                <div class="texto fz8 lh14">
                    ANEXO
                </div>
            </div>
            <div style="width: 75px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    44
                </div>
                <div class="texto fz8 lh14">
                    FAX
                </div>
            </div>
            <div style="width: 181px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    45
                </div>
                <div class="texto fz8 lh14">
                    CORREO ELECTRÓNICO
                </div>
            </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 98px ;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->conductor != '')
                    @if ($ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha) != '')
                        @if ($ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha)?->departamento != '')
                            {{ $ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha)?->departamento?->descri }}
                        @endif
                    @endif
                @endif
            </div>

            <div style="width: 105px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->conductor != '')
                    @if ($ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha) != '')
                        @if ($ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha)?->provincias != '')
                            @foreach ($ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha)?->provincias as $provincia)
                                @if (
                                    $provincia?->cod_dep == $ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha)?->codi_dep &&
                                        $provincia?->cod_pro == $ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha)?->codi_pro &&
                                        $provincia?->codi_dis == '00')
                                    {{ $provincia?->descri }}
                                @endif
                            @endforeach
                        @endif
                    @endif
                @endif
            </div>

            <div style="width: 123px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->conductor != '')
                    @if ($ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha) != '')
                        @if ($ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha)?->provincias != '')
                            @foreach ($ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha)?->distritos as $distrito)
                                @if (
                                    $distrito?->cod_dep == $ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha)?->codi_dep &&
                                        $distrito?->cod_pro == $ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha)?->codi_pro &&
                                        $distrito?->codi_dis == $ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha)?->codi_dis)
                                    {{ $distrito?->descri }}
                                @endif
                            @endforeach
                        @endif
                    @endif
                @endif
            </div>

            <div style="width: 76px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->conductor != '')
                    {{ $ficha?->conductor?->telefono }}
                @endif
            </div>

            <div style="width: 51px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->conductor != '')
                    {{ $ficha?->conductor?->anexo }}
                @endif
            </div>

            <div style="width: 75px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->conductor != '')
                    {{ $ficha?->conductor?->fax }}
                @endif
            </div>

            <div style="width: 181px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->conductor != '')
                    {{ $ficha?->conductor?->email }}
                @endif
            </div>
        </div>




        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 122px ;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    07
                </div>
                <div class="texto fz8 lh14">
                    CÓDIGO DE VIA
                </div>
            </div>

            <div style="width: 60px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    08
                </div>
                <div class="texto fz8 lh14">
                    TIPO DE VIA
                </div>
            </div>

            <div style="width: 266px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    09
                </div>
                <div class="texto fz8 lh14">
                    NOMBRE DE VIA
                </div>
            </div>

            <div style="width: 74px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    11
                </div>
                <div class="texto fz8 lh14">
                    N° MUNICIPAL
                </div>
            </div>

            <div style="width: 123px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    14
                </div>
                <div class="texto fz8 lh14">
                    NOMBRE DE EDIFICACION
                </div>
            </div>

            <div style="width: 65px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    17
                </div>
                <div class="texto fz8 lh14">
                    N° INTERIOR
                </div>
            </div>
        </div>

        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 122px ;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->conductor != '')
                    @if ($ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha) != '')
                        {{ $ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha)?->codi_via }}
                    @endif
                @endif
            </div>

            <div style="width: 60px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->conductor != '')
                    @if ($ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha) != '')
                        {{ $ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha)?->tipo_via }}
                    @endif
                @endif
            </div>

            <div style="width: 266px;height: 16px;float:left;"class="texto2 fz8 lh14">
                @if ($ficha?->conductor != '')
                    @if ($ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha) != '')
                        {{ $ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha)?->nomb_via }}
                    @endif
                @endif
            </div>

            <div style="width: 74px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->conductor != '')
                    @if ($ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha) != '')
                        {{ $ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha)?->nume_muni }}
                    @endif
                @endif
            </div>

            <div style="width: 123px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->conductor != '')
                    @if ($ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha) != '')
                        {{ $ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha)?->nomb_edificacion }}
                    @endif
                @endif
            </div>

            <div style="width: 65px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->conductor != '')
                    @if ($ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha) != '')
                        {{ $ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha)?->nume_interior }}
                    @endif
                @endif
            </div>
        </div>


        <!-- 14 AL 19-->

        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 111px ;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    18
                </div>
                <div class="texto fz8 lh14">
                    CÓDIGO DE HU
                </div>
            </div>

            <div style="width: 224px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    19
                </div>
                <div class="texto fz8 lh14">
                    NOMBRE DE LA HABILITACIÓN URBANA
                </div>
            </div>

            <div style="width: 130px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    20
                </div>
                <div class="texto fz8 lh14">
                    ZONA/SECTOR/ETAPA
                </div>
            </div>

            <div style="width: 93px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    21
                </div>
                <div class="texto fz8 lh14">
                    MANZANA
                </div>
            </div>

            <div style="width: 81px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    22
                </div>
                <div class="texto fz8 lh14">
                    LOTE
                </div>
            </div>

            <div style="width: 71px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    23
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




        <!-- 18 AL 23-->
        <!-- CARACTERISTICAS DE TITULARIDAD-->

        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
            <div class="textotitulo tl pl15">
                AUTORIZACIÓN MUNICIPAL DE FUNCIONAMIENTO
            </div>
        </div>


        <div style="width: 716px;height:32px;margin: auto;" class="bn">
            <div style="width: 385px;height: 16px;float:left;" class="bn">
                <div style="width: 73;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        143
                    </div>
                    <div class="texto fz6 lh7">
                        CÓDIGO<BR>ACTIVIDAD
                    </div>
                </div>
                <div style="width: 310PX;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        144
                    </div>
                    <div class="texto fz8 lh14">
                        DESCRIPCIÓN DE LA ACTIVIDAD
                    </div>
                </div>
                @foreach ($ficha?->actividades as $actividad)
                    <div style="width: 73;height: 16px;float:left;" class="texto2 fz8 lh14">
                        {{ $actividad?->codi_actividad }}
                    </div>
                    <div style="width: 310PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                        {{ $actividad?->desc_actividad }}
                    </div>
                @endforeach
            </div>
            <div style="width: 331px;height: 16px;float:left;" class=" bn">
                <div style="width: 176px;height: 16px;float:left;" class="fondoclaro">

                    <div class="texto fz8 lh14">
                        ÁREA DE LA ACTIVIDAD ECONÓMICA
                    </div>
                </div>
                <div style="width: 79px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        147
                    </div>
                    <div class="texto fz6 lh6">
                        NUMERO DE <BR>EXPEDIENTE
                    </div>
                </div>
                <div style="width: 72;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        148
                    </div>
                    <div class="texto fz6 lh6">
                        NUMERO DE <BR>LICENCIA
                    </div>
                </div>
                <div style="width: 59PX;height: 16px;float:left;" class="fondoclaro">

                    <div class="texto fz8 lh14">
                        UBICACION
                    </div>
                </div>
                <div style="width: 56PX;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        145
                    </div>
                    <div class="texto fz6 lh6">
                        AREA <BR>AUTORIZADA
                    </div>
                </div>
                <div style="width: 59PX;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        146
                    </div>
                    <div class="texto fz6 lh6">
                        AREA <BR>VERIFICADA
                    </div>
                </div>

                <div style="width: 79px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->fichaeconomica != '')
                        {{ $ficha?->fichaeconomica?->nume_expediente }}
                    @endif
                </div>
                <div style="width: 72;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->fichaeconomica != '')
                        {{ $ficha?->fichaeconomica?->nume_licencia }}
                    @endif
                </div>
                <div style="width: 59PX;height: 16px;float:left;" class="fondoclaro">

                    <div class="texto fz7 lh7">
                        PREDIO<BR> CATASTRAL
                    </div>
                </div>
                @php $total1=0 @endphp
                @php $total2=0 @endphp
                <div style="width: 56PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->fichaeconomica != '')
                        {{ $ficha?->fichaeconomica?->pred_area_autor }}
                        @php $total1=$ficha?->fichaeconomica?->pred_area_autor + $total1 @endphp
                    @endif
                </div>
                <div style="width: 59PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->fichaeconomica != '')
                        {{ $ficha?->fichaeconomica?->pred_area_verif }}
                        @php $total2=$ficha?->fichaeconomica?->pred_area_verif + $total2 @endphp
                    @endif
                </div>
                <div style="width: 152PX;height: 16px;float:left;" class="fondoclaro ">
                    <div class="texto fz8 lh14 bn">
                        VIGENCIA DE AUTORIZACIÓN
                    </div>
                </div>
                <div style="width: 59PX;height: 16px;float:left;" class="fondoclaro">

                    <div class="texto fz8 lh14">
                        VIA PUBLICA
                    </div>
                </div>
                <div style="width: 56PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->fichaeconomica != '')
                        {{ $ficha?->fichaeconomica?->viap_area_autor }}
                        @php $total1=$ficha?->fichaeconomica?->viap_area_autor + $total1 @endphp
                    @endif
                </div>
                <div style="width: 59PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->fichaeconomica != '')
                        {{ $ficha?->fichaeconomica?->viap_area_verif }}
                        @php $total2=$ficha?->fichaeconomica?->viap_area_verif + $total2 @endphp
                    @endif
                </div>
                <div style="width: 79PX;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        149
                    </div>
                    <div class="texto fz7 lh7">
                        FECHA DE <BR> EXPEDICION
                    </div>
                </div>
                <div style="width: 72PX;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        150
                    </div>
                    <div class="texto fz7 lh7">
                        FECHA DE <BR> VENCIMIENTO
                    </div>
                </div>
                <div style="width: 59PX;height: 16px;float:left;" class="fondoclaro">

                    <div class="texto fz8 lh14">
                        BIEN COMUN
                    </div>
                </div>
                <div style="width: 56PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->fichaeconomica != '')
                        {{ $ficha?->fichaeconomica?->bc_area_autor }}
                        @php $total1=$ficha?->fichaeconomica?->bc_area_autor + $total1 @endphp
                    @endif

                </div>
                <div style="width: 59PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->fichaeconomica != '')
                        {{ $ficha?->fichaeconomica?->bc_area_verif }}
                        @php $total2=$ficha?->fichaeconomica?->bc_area_verif + $total2 @endphp
                    @endif
                </div>
                <div style="width: 79PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->fichaeconomica != '')
                        @if ($ficha?->fichaeconomica?->fecha_expedicion != '')
                            {{ date('d-m-Y', strtotime($ficha?->fichaeconomica?->fecha_expedicion)) }}
                        @endif
                    @endif
                </div>
                <div style="width: 72PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->fichaeconomica != '')
                        @if ($ficha?->fichaeconomica?->fecha_vencimiento != '')
                            {{ date('d-m-Y', strtotime($ficha?->fichaeconomica?->fecha_vencimiento)) }}
                        @endif
                    @endif
                </div>
                <div style="width: 59PX;height: 16px;float:left;" class="fondoclaro">

                    <div class="texto fz8 lh14">
                        TOTAL
                    </div>
                </div>
                <div style="width: 56PX;height: 16px;float:left;" class="texto2 fz8 lh14">

                    {{ $total1 }}
                </div>
                <div style="width: 59PX;height: 16px;float:left;" class="texto2 fz8 lh14">

                    {{ $total2 }}
                </div>
                <div style="width: 79PX;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        151
                    </div>
                    <div class="texto fz7 lh7">
                        INICIO DE <BR> ACTIVIDA
                    </div>
                </div>
                <div style="width: 72PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->fichaeconomica != '')
                        @if ($ficha?->fichaeconomica?->inic_actividad != '')
                            {{ date('d-m-Y', strtotime($ficha?->fichaeconomica?->inic_actividad)) }}
                        @endif
                    @endif
                </div>
            </div>

        </div>





        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
            <div class="textotitulo tl pl15">
                AUTORIZACIÓN DE ANUNCIO
            </div>
        </div>

        <!-- 71 - 69 -->
        <div style="width: 716px;height:32px;margin: auto;" class="fondoclaro">
            <div style="width: 87px;height: 32px;float:left;">
                <div class="numeros">
                    152
                </div>
                <div class="texto fz8 lh14">
                    CÓDIGO <BR>TIPO DE ANUNCIO
                </div>
            </div>
            <div style="width: 180px;height: 32px;float:left;">
                <div class="numeros">
                    153
                </div>
                <div class="texto fz8 lh14">
                    DESCRIPCIÓN DEL TIPO DE ANUNCIO
                </div>
            </div>
            <div style="width: 31px;height: 32px;float:left;">
                <div class="numeros">
                    154
                </div>
                <div class="texto fz5 lh7">
                    N°<BR>DE<BR>LADOS
                </div>
            </div>
            <div style="width: 74px;height: 32px;float:left;">
                <div class="numeros">
                    155
                </div>
                <div class="texto fz7 lh7">
                    AREA <br>AUTORIZADA <br>DEL ANUNCIO<br>(m2)
                </div>
            </div>
            <div style="width: 71px;height: 32px;float:left;">
                <div class="numeros">
                    156
                </div>
                <div class="texto fz7 lh7">
                    AREA <br>VERIFICADA <br>DEL ANUNCIO<br>(m2)
                </div>
            </div>
            <div style="width: 73px;height: 32px;float:left;">
                <div class="numeros">
                    157
                </div>
                <div class="texto fz8 lh14">
                    N° <BR>EXPEDIENTE
                </div>
            </div>
            <div style="width: 66px;height: 32px;float:left;">
                <div class="numeros">
                    158
                </div>
                <div class="texto fz8 lh14">
                    N° <BR>LICENCIA
                </div>
            </div>

            <div style="width: 127px;height: 32px;float:left;border:none;">
                <div style="width: 127px;height: 16px;float:left;">

                    <div class="texto fz8 lh14">
                        VIGENCIA DE AUTORIZACION
                    </div>
                </div>
                <div style="width: 127px;height: 16px;float:left;border:none;">
                    <div style="width: 62px;height: 16px;float:left;">
                        <div class="numeros">
                            159
                        </div>
                        <div class="texto fz6 lh7">
                            FECHA DE <BR>EXPEDICION
                        </div>
                    </div>
                    <div style="width: 62.9px;height: 16px;float:left;">
                        <div class="numeros">
                            160
                        </div>
                        <div class="texto fz6 lh7">
                            FECHA DE <BR>VENCIMIENTO
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--FOREACH 71 - 69-->
        @foreach ($ficha?->autorizacion_anuncios as $autorizacion)
            <div style="width: 716px;height:16px;margin: auto;">
                <div style="width: 87px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $autorizacion?->codi_anuncio }}
                </div>
                <div style="width: 180px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($autorizacion?->codigos != '')
                        {{ $autorizacion?->codigos?->desc_codigo }}
                    @endif
                </div>
                <div style="width: 31px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $autorizacion?->nume_lados }}
                </div>
                <div style="width: 74px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $autorizacion?->area_autorizada }}
                </div>
                <div style="width: 71px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $autorizacion?->area_verificada }}
                </div>
                <div style="width: 73px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $autorizacion?->nume_expediente }}
                </div>
                <div style="width: 66px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ $autorizacion?->nume_licencia }}
                </div>
                <div style="width: 62px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ date('d-m-Y', strtotime($autorizacion?->fecha_expedicion)) }}
                </div>
                <div style="width: 63px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{ date('d-m-Y', strtotime($autorizacion?->fecha_vencimiento)) }}
                </div>

            </div>
        @endforeach
        <!--FOREACH 71 - 69-->

        <!-- 71 - 69 -->


        <!-- 87-->
        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
            <div class="textotitulo tl pl15">
                INFORMACIÓN COMPLEMENTARIA
            </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 126px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    114
                </div>
                <div class="texto fz8 lh14">
                    CONDICION DEL DECLARANTE
                </div>
            </div>
            <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if ($ficha?->fichaeconomica != '')
                    {{ $ficha?->fichaeconomica?->cond_declarante }}
                @endif
            </div>
            <div style="width: 77px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto fz6 lh12">
                    01 TITULAR CATASTRAL
                </div>
            </div>
            <div style="width: 86px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto fz6 lh12">
                    02 REPRESENTANTE LEGAL
                </div>
            </div>
            <div style="width: 67px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto fz6 lh12">
                    03 ARRENDATARIO
                </div>
            </div>
            <div style="width: 77px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto fz6 lh12">
                    04 FAMILIAR
                </div>
            </div>
            <div style="width: 61px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto fz6 lh12">
                    05 VECINO
                </div>
            </div>
            <div style="width: 197px;height: 16px;float:left;" class="fondoclarito">
                <div class="texto fz6 lh12">

                    06 OTRO(Especificar):..............................................
                </div>
            </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto; border:none;margin-top:5px;margin-bottom:5px">

            <div style="width: 230PX;height:16px;float:left;border:none;">
                <div style="width: 210.9px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        161
                    </div>
                    <div class="texto fz8 lh14">
                        DOCUMENTOS PRESENTADOS
                    </div>
                </div>
                <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->fichaeconomica != '')
                        {{ $ficha?->fichaeconomica?->docu_presentado }}
                    @endif
                </div>
                <div style="width: 229px;height: 16px;float:left;" class="fondoclarito">
                    <div class="texto fz8 lh12">
                        01 LICENCIA DE FUNCIONAMIENTO
                    </div>
                </div>
                <div style="width: 229px;height: 16px;float:left;" class="fondoclarito">
                    <div class="texto fz8 lh12">
                        02 LICENCIA DE ANUNCIOS
                    </div>
                </div>
                <div style="width: 229px;height: 16px;float:left;" class="fondoclarito">
                    <div class="texto fz8 lh12">
                        03 AMBOS
                    </div>
                </div>
                <div style="width: 229px;height: 16px;float:left;" class="fondoclarito">
                    <div class="texto fz8 lh12">
                        04 OTRO(Especificar):..............................................
                    </div>
                </div>



            </div>
            <div style="width: 13PX;height:16px;float:left;border:none;">
            </div>

            <div style="width: 230PX;height:16px;float:left;border:none;">
                <div style="width: 210.9px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        116
                    </div>
                    <div class="texto fz8 lh14">
                        ESTADO DE LLENADO DE FICHA
                    </div>
                </div>
                <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->fichaeconomica != '')
                        {{ $ficha?->fichaeconomica?->esta_llenado }}
                    @endif
                </div>
                <div style="width: 229px;height: 16px;float:left;" class="fondoclarito">
                    <div class="texto fz8 lh12">
                        1 FICHA COMPLETA
                    </div>
                </div>
                <div style="width: 229px;height: 16px;float:left;" class="fondoclarito">
                    <div class="texto fz8 lh12">
                        2 FICHA INCOMPLETA
                    </div>
                </div>
                <div style="width: 229px;height: 16px;float:left;" class="fondoclarito">
                    <div class="texto fz8 lh12">
                        3 COMPLETADA EN OFICINA
                    </div>
                </div>
                <div style="width: 229px;height: 16px;float:left;" class="fondoclarito">
                    <div class="texto fz8 lh12">
                        4 COMPLETADA EN CONTROL EXTERNO
                    </div>
                </div>
            </div>
            <div style="width: 13PX;height:16px;float:left;border:none;">
            </div>
            <div style="width: 229;height:16px;float:left;border:none;">
                <div style="width: 210px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        119
                    </div>
                    <div class="texto fz8 lh14">
                        MANTENIMIENTO
                    </div>
                </div>
                <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    @if ($ficha?->fichaeconomica != '')
                        {{ $ficha?->fichaeconomica?->mantenimiento }}
                    @endif
                </div>
                <div style="width: 229px;height: 16px;float:left;" class="fondoclarito">
                    <div class="texto fz8 lh12">
                        01 POR SER PREDIO CATASTRAL NUEVO
                    </div>
                </div>
                <div style="width: 229px;height: 16px;float:left;" class="fondoclarito">
                    <div class="texto fz8 lh12">
                        02 POR TENER VARIACIÓN EN ÁREA DE USO
                    </div>
                </div>
                <div style="width: 229px;height: 16px;float:left;" class="fondoclarito">
                    <div class="texto fz8 lh12">
                        03 POR CAMBIO DE CONDUCTOR
                    </div>
                </div>
                <div style="width: 229px;height: 16px;float:left;" class="fondoclarito">
                    <div class="texto fz8 lh12">
                        04 POR CAMBIO DE GIRO
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
                @if ($ficha?->fichaeconomica != '')
                    {{ $ficha?->fichaeconomica?->observaciones }}
                @endif
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
                    120
                </div>
                <div class="texto fz8 lh14">
                    FIRMA DEL DECLARANTE
                </div>
            </div>
            <div style="width: 178px;height: 70px;float:left;">
                <div class="numeros">
                    121
                </div>
                <div class="texto fz8 lh14">
                    FIRMA DEL SUPERVISOR
                </div>
            </div>
            <div style="width: 178px;height: 70px;float:left;">
                <div class="numeros">
                    122
                </div>
                <div class="texto fz8 lh14">
                    FIRMA DEL TÉCNICO CATASTRAL
                </div>
            </div>
            <div style="width: 178px;height: 70px;float:left;">
                <div style="width: 178px;height: 56px;float:left;">
                    <div class="numeros">
                        123
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
                    FECHA: {{ $ficha?->fecha_declarante }}
                </div>
            </div>
            <div style="width: 178px;height: 14px;float:left;">
                <div class="texto ti pl15">
                    FECHA: {{ $ficha?->fecha_supervision }}
                </div>
            </div>
            <div style="width: 178px;height: 14px;float:left;">
                <div class="texto ti pl15">
                    FECHA: {{ $ficha?->fecha_levantamiento }}
                </div>
            </div>
            <div style="width: 178px;height: 14px;float:left;">
                <div class="texto ti pl15">
                    FECHA: {{ $ficha?->fecha_verificacion }}
                </div>
            </div>
        </div>
        <div class="resumen "></div>
    @endforeach
</body>

</html>
