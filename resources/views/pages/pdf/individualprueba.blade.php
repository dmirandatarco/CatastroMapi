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

        .m-0auto {
            margin: 0 auto;
        }


        .numeros {
            background-color: #b9b9b9;
            height: 14px;
            width: 14px;
            position: absolute;
            top: 0px;
            left: 0px;
            float: left;
            border: none;
        }

        .textotop {
            background-color: #FFF;
            color: #000;
            width: 80px;
            height: 14px;
            border: none;
            float: left;
        }

        .texto {
            float: right;
            border: none;
            text-align: center;
            vertical-align: middle;
            width: auto;
            margin: 0 auto;

        }

        .h-14 {
            height: 14px;
        }

        .h-7 {
            height: 7px;
        }

        .h-6 {
            height: 6px;
        }

        .left {
            float: left
        }

        .right {
            float: right
        }

        .texto-input {
            float: right;
            border: none;
            text-align: center;
            vertical-align: middle;
            width: auto;
            margin: 0 auto;
            height: 14px;
            background: #FFF;
        }

        .textobloque {
            float: right;
            border: none;
            text-align: center;
            vertical-align: middle;
            width: calc(100% - 15px);
            /* Resta el ancho del número al ancho total del contenedor */
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

        .bprueba {
            background-color: #333;
        }

        .bn {
            border: none !important;
        }

        .bt {
            border: none;
            border-top: 0.5px solid;
        }

        .bb {
            border-bottom: 0.5px solid;
        }

        .border {
            border: 0.5px solid !important;
        }

        .pagina {
            width: 100%;
            background: #f3f3f3;
            overflow: hidden;
        }

        .header-1,
        .header-2,
        .header-3 {
            float: left;
            margin-right: 10px;
        }

        .header-1,
        .header-3 {
            width: 120px;
            text-align: center;
        }

        .header-2 {
            width: 478px;
            text-align: center;

        }

        .img-logos {
            width: 120px;
            position: absolute;
            bottom: 0%;
        }

        .pab {
            position: absolute
        }
    </style>

</head>

<body>
    <div class="pagina bn">
        <div class="first-section  bn" style="height: 130px;">
            <div class="header-1 bn " style="position: relative;">
                <img class="img-logos" src="{{ $logos?->logo_catastro }}" alt="" style="">
            </div>


            <div class="header-2 bn">
                {{-- INFO FICHA --}}
                <div class="bn fz12">
                    FICHA CATASTRAL URBANA INDIVIDUAL
                </div>
                <div class="bn fz6">
                    RESOLUCIÓN N° 001-2020-SNCP-CNC
                </div>
                {{-- INFO FICHA --}}
                {{-- 01 --}}
                <div class="fondoclaro  m-0auto" style="width: 200px;">
                    <div class="numeros">
                        01
                    </div>
                    <div class="texto h-14 fz8 lh14">
                        CÓDIGO UNICO CATASTRAL - CUC
                    </div>
                    <div class="texto-input m-0auto lh16">
                        s
                    </div>
                </div>
                {{-- 01 --}}
                {{-- 02 --}}
                <div class="fondoclaro bn m-0auto" style="width: 400px;">
                    <div class="numeros">
                        02
                    </div>
                    <div class="  h-14 fz8 lh14">
                        CÓDIGO DE REFERENCIA CATASTRAL
                    </div>
                    <div class="texto-input bn lh16">
                        <div class="fondoclaro left bn" style="width: 105px;">
                            <div class="border h-7 fz4 lh6 border">
                                UBIGEO
                            </div>
                            <div class="texto-input lh16">
                                <div class="fondoclaro left" style="width: 33.9px;">
                                    <div class="bn h-7 fz4 lh6">
                                        UBIGEO
                                    </div>
                                    <div class="texto-input lh16">

                                    </div>
                                </div>
                                <div class="fondoclaro left" style="width: 34px;">
                                    <div class="bn h-7 fz4 lh6">
                                        UBIGEO
                                    </div>
                                    <div class="texto-input lh16">

                                    </div>
                                </div>
                                <div class="fondoclaro left" style="width: 34px;">
                                    <div class="bn h-7 fz4 lh6">
                                        UBIGEO
                                    </div>
                                    <div class="texto-input lh16">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fondoclaro left" style="width: 35px;">
                            <div class="texto h-14 fz8 lh14">
                                SECTOR
                            </div>
                            <div class="texto-input lh16">

                            </div>
                        </div>
                        <div class="fondoclaro left" style="width: 52.9px;">
                            <div class="texto h-14 fz8 lh14">
                                MANZANA
                            </div>
                            <div class="texto-input lh16">

                            </div>
                        </div>
                        <div class="fondoclaro left" style="width: 36px;">
                            <div class="texto h-14 fz8 lh14">
                                LOTE
                            </div>
                            <div class="texto-input lh16">

                            </div>
                        </div>
                        <div class="fondoclaro left" style="width: 35px;">
                            <div class="texto h-14 fz8 lh14">
                                EDIFICA
                            </div>
                            <div class="texto-input lh16">

                            </div>
                        </div>
                        <div class="fondoclaro left" style="width: 40px;">
                            <div class="texto h-14 fz8 lh14">
                                ENTRADA
                            </div>
                            <div class="texto-input lh16">

                            </div>
                        </div>
                        <div class="fondoclaro left" style="width: 30px;">
                            <div class="texto h-14 fz8 lh14">
                                PISO
                            </div>
                            <div class="texto-input lh16">

                            </div>
                        </div>
                        <div class="fondoclaro left" style="width: 40px;">
                            <div class="texto h-14 fz8 lh14">
                                UNIDAD
                            </div>
                            <div class="texto-input lh16">

                            </div>
                        </div>
                        <div class="fondoclaro left" style="width: 18px;">
                            <div class="texto h-14 fz8 lh14">
                                DC
                            </div>
                            <div class="texto-input lh16">

                            </div>
                        </div>
                    </div>
                </div>
                {{-- 02 --}}
                {{-- 03-04 --}}
                <div class="fondoclaro bn m-0auto" style="width: 400px;">
                    <div class="   left" style="width: 198.9px;">
                        <div class="numeros">
                            03
                        </div>
                        <div class="texto h-14 fz8 lh14">
                            COD. CONTRIBUYENTE DE RENTAS
                        </div>
                        <div class="texto-input m-0auto lh16">

                        </div>
                    </div>
                    <div class="   left" style="width: 199px;">
                        <div class="numeros">
                            04
                        </div>
                        <div class="texto h-14 fz8 lh14">
                            CÓDIGO PREDIAL DE RENTAS
                        </div>
                        <div class="texto-input m-0auto lh16">

                        </div>
                    </div>
                </div>

                {{-- 03-04 --}}
            </div>
            <div class="header-3 bn  " style="height:120px;position: absolute;">
                <div class="info-ficha bn bprueba"style="height:50px;">
                    <span>NUMERO DE FICHA</span>
                    <div class="texto h-14 fz8 lh14">
                        N° {{ $ficha?->nume_ficha }}
                    </div>
                    <div style="width: 120px;height: 15px;float:right;" class="fondoclaro tc bn">
                        <div class="textotop fz6 lh8">
                            CONTADOR DE <BR> FICHAS POR LOTE
                        </div>
                        <div class="bn fz8 lh16">
                            {{ $ficha?->nume_ficha }}
                        </div>
                    </div>
                </div>
                <div class="img bprueba" style="height:70px;">
                    <img class="img-logos" src="{{ $logos?->logo_catastro }}" alt="">
                </div>
            </div>
        </div>
    </div>

    contenido
</body>

</html>
