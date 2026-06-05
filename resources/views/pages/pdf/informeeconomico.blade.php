<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INFORME CATASTRAL ECONOMICO</title>
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
            bord er: none;
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

        .fz14 {
            font-weight: bolder;
            font-size: 14px !important;
        }

        .fz16 {
            font-weight: bolder;
            font-size: 16px !important;
        }

        .fz18 {
            font-weight: bolder;
            font-size: 18px !important;
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
            background-color: #5d0d0d;
            color: #fff;
        }

        .bgfdd {
            background-color: #CFCFE9;
        }
    </style>

</head>

<body>
    <div style="width: 716px;height:16px;margin: auto;border:none;">
    </div>

    <div style="width: 716px;height:16px;margin: auto;border:none; margin-bottom:5px;background-color:#fff;">

        <div style="width: 120px;height: 120px;float:left;border:none;vertical-align:middle">
            <img src="{{ $logos?->logo_institucion }}" alt="Logo">
        </div>

        <div style="width: 473px;height: 8px;float:left;border:none;">
            <div style="width: 473px;height:16px;margin: auto;" class="bn">
                <div class="texto fz18 lh14">
                    <b style="color:#5d0d0d"> {{ $logos?->desc_institucion }}</b>
                </div>
            </div>
            <div style="width: 473px;height:16px;margin: auto;" class="bn">
                <div class="texto fz12 lh14">
                    CUSCO - PERÚ
                </div>
            </div>
            <div style="width: 473px;height:16px;margin: auto;" class="bn">
                <div class="texto fz8 lh14">
                    GERENCIA DE DESARROLLO URBANO Y RURAL<br>
                    FECHA: {{ $fecha }} / HORA: {{ $hora }}
                </div>
            </div>
            <div style="width: 473px;height:16px;margin: auto; padding-top:5px;padding-bottom:5px; margin-bottom:5px; "
                class="bgfdc">
                <div class="texto fz14 lh14">
                    <b>INFORME TÉCNICO CATASTRAL GERENCIA DE ADMINISTRACION TRIBUTARIA</b>
                </div>
            </div>



            <!-- fila 03-->
            <div style="width: 427px;height:16px;margin: auto; border:none">
                <div class="texto fz10">
                    <b> CÓDIGO DE REFERENCIA CATASTRAL</b>
                </div>
                <div style="width: 106px;height: 16px;float:left;border:none;" class="bgfdc">
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
                <div style="width: 35px;height: 16px;float:left;" class="bgfdc">
                    <div class="texto fz6 lh14">
                        SECTOR
                    </div>
                </div>
                <div style="width: 53px;height: 16px;float:left;" class="bgfdc">
                    <div class="texto fz6 lh14">
                        MANZANA
                    </div>
                </div>
                <div style="width: 51px;height: 16px;float:left;" class="bgfdc">
                    <div class="texto fz6 lh14">
                        LOTE
                    </div>
                </div>
                <div style="width: 35px;height: 16px;float:left;" class="bgfdc">
                    <div class="texto fz6 lh14">
                        EDIFICA
                    </div>
                </div>
                <div style="width: 34px;height: 16px;float:left;" class="bgfdc">
                    <div class="texto fz6 lh14">
                        ENTRADA
                    </div>
                </div>
                <div style="width: 35px;height: 16px;float:left;" class="bgfdc">
                    <div class="texto fz6 lh14">
                        PISO
                    </div>
                </div>
                <div style="width: 52px;height: 16px;float:left;" class="bgfdc">
                    <div class="texto fz6 lh14">
                        UNIDAD
                    </div>
                </div>
                <div style="width: 17.9px;height: 16px;float:left;" class="bgfdc">
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
        </div>

        <div style="width: 120px;height: 120px;float:left;border:none;">
            <img src="{{ $logos?->logo_catastro }}" alt="">
        </div>
    </div>
    <br></br>
    <div style="width: 716px;height:20px;  float:left;" class="bn">
        <div style="width: 716px;height:20px;  float:left;text-align:left;" class="texto fz10 lh10">
            <b>IDENTIFICACION DEL CONDUCTOR:</b>
        </div>
    </div>
    <div style="width: 417px;float:left;" class="bn">
        <div style="width: 400px;height:110px;float:left;" class="bn ">
            <div style="width: 160px;height: 16px;float:left;" class="bgfdc">
                <div class="texto fz10 lh14">
                    TIPO DE CONDUCTOR
                </div>
            </div>
            <div style="width: 237.9px;height: 16px;float:left;">
                <div class="texto fz10 lh14">
                    @if ($ficha?->conductor != '')
                        {{ $ficha?->conductor?->persona?->tipo_doc }}
                    @endif
                </div>
            </div>
            <div style="width: 160px;height: 16px;float:left;" class="bgfdc">
                <div class="texto fz10 lh14">
                    COND. DEL CONDUCTOR
                </div>
            </div>
            <div style="width: 237.9px;height: 16px;float:left;">
                <div class="texto fz10 lh14">
                    @if ($ficha?->conductor != '')
                        {{ $ficha?->conductor?->cond_conductor }}
                    @endif
                </div>
            </div>
            <div style="width: 160px;height: 16px;float:left;" class="bgfdc">
                <div class="texto fz10 lh14">
                    NOMBRE COMERCIAL
                </div>
            </div>
            <div style="width: 237.9px;height: 16px;float:left;">
                <div class="texto fz10 lh14">
                    @if ($ficha?->fichaeconomica != '')
                        {{ $ficha?->fichaeconomica?->nomb_comercial }}
                    @endif
                </div>
            </div>
            <div style="width: 160px;height: 16px;float:left;" class="bgfdc">
                <div class="texto fz10 lh14">
                    APELLIDOS Y NOMBRES
                </div>
            </div>
            <div style="width: 237.9px;height: 16px;float:left;">
                <div class="texto fz10 lh14">
                    @if ($ficha?->conductor != '')
                        @if ($ficha?->conductor?->persona?->tipo_persona == 1)
                            {{ $ficha?->conductor?->persona?->ape_paterno }}
                            {{ $ficha?->conductor?->persona?->ape_materno }}
                            {{ $ficha?->conductor?->persona?->nombres }}
                        @endif
                    @endif
                </div>
            </div>

            <div style="width: 160px;height: 16px;float:left;" class="bgfdc">
                <div class="texto fz10 lh14">
                    ESTADO CIVIL
                </div>
            </div>
            <div style="width: 237.9px;height: 16px;float:left;">
                <div class="texto fz10 lh14">

                </div>
            </div>

            <div style="width: 88PX;height:16px;float:left;" class="bgfdc">
                <div class="texto fz10 lh14">
                    TIPO DE DOC
                </div>
            </div>
            <div style="width: 135PX;height:16px;float:left;" class="">
                <div class="texto fz10 lh14">
                    @if ($ficha?->conductor != '')
                        @if ($ficha?->conductor?->persona?->tipo_persona == 1)
                            {{ $ficha?->conductor?->persona?->nume_doc }}
                        @endif
                    @endif
                </div>
            </div>
            <div style="width: 62PX;height:16px;float:left;" class="bgfdc">
                <div class="texto fz10 lh14">
                    NRO DOC
                </div>
            </div>
            <div style="width: 110.9PX;height:16px;float:left;" class="">
                <div class="texto fz10 lh14">
                    @if ($ficha?->conductor != '')
                        {{ $ficha?->conductor?->persona?->tipo_doc }}
                    @endif
                </div>
            </div>

            <div style="width: 88PX;height:16px;float:left;" class="bgfdc">
                <div class="texto fz10 lh14">
                    RAZON SOCIAL
                </div>
            </div>
            <div style="width: 310PX;height:16px;float:left;" class="">
                <div class="texto fz10 lh14">
                    @if ($ficha?->conductor != '')
                        @if ($ficha?->conductor?->persona?->tipo_persona == 2)
                            {{ $ficha?->conductor?->persona?->razon_social }}
                        @endif
                    @endif
                </div>
            </div>



            <div style="width: 42PX;height:16px;float:left;" class="bgfdc">
                <div class="texto fz10 lh14">
                    RUC
                </div>
            </div>
            <div style="width: 110PX;height:16px;float:left;" class="">
                <div class="texto fz10 lh14">
                    @if ($ficha?->conductor != '')
                        @if ($ficha?->conductor?->persona?->tipo_persona == 2)
                            {{ $ficha?->conductor?->persona?->nume_doc }}
                        @endif
                    @endif
                </div>
            </div>
            <div style="width: 110PX;height:16px;float:left;" class="bgfdc">
                <div class="texto fz10 lh14">
                    PERSONA JURIDICA
                </div>
            </div>
            <div style="width: 133.9PX;height:16px;float:left;" class="">
                <div class="texto fz10 lh14">

                </div>
            </div>


            <div style="width: 400PX;height:16px;float:left;" class="bgfdc">
                <div class="texto fz10 lh14">
                    DOMICILIO DEL CONDUCTOR
                </div>
            </div>
            <div style="width: 400PX;height:16px;float:left;" class="">
                <div class="texto fz10 lh14">
                    @if ($ficha?->conductor != '')
                        @if ($ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha) != '')
                            {{ $ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha)?->tipo_via }}
                            {{ $ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha)?->nomb_via }}
                            {{ $ficha?->conductor?->persona?->domiciliotitular($ficha->id_ficha)?->nume_muni }}
                        @endif
                    @endif
                </div>
            </div>



            <div style="width: 417px;height:10px;float:left;" class="bn">
            </div>

            <div style="width: 90PX;height:20px;float:left;" class="bgfdc">
                <div class="texto fz8 lh8">
                    CÓDIGO DE <BR> ACTIVIDAD
                </div>
            </div>
            <div style="width: 308PX;height:20px;float:left;" class="bgfdc">
                <div class="texto fz10 lh12">
                    DESCRIPCION DE LA ACTIVIDAD
                </div>
            </div>
            @foreach ($ficha?->actividades as $actividad)
                <div style="width: 90PX;height:16PX;float:left;" class="">
                    <div class="texto fz10 lh14">
                        {{ $actividad?->codi_actividad }}
                    </div>
                </div>
                <div style="width: 308PX;height:16PX;float:left;" class="">
                    <div class="texto fz10 lh14">
                        {{ $actividad?->desc_actividad }}
                    </div>
                </div>
            @endforeach
        </div>

        <div style="width: 417px;height:10px;float:right;" class="bn">
        </div>
    </div>


    <div style="width: 298px;float:left;" class="">


        <div style="width: 298px;height:300px;float:left;" class="bn">
            <img src="{{ asset('storage/img/imageneslotes/' . $ficha?->lote?->manzana?->sectore?->codi_sector . '' . $ficha?->lote?->manzana?->codi_mzna . '' . $ficha?->lote?->codi_lote . '.jpg') }}"
                alt=""
                style="width: 298px;height:300px;  object-fit: contain;image-orientation: from-image;display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; align-items: center;">
        </div>
    </div>

    <div style="margin-top:10px;width: 716px;  float:left;" class="">
        <div style="width: 716px;height:1px;margin: auto; " class="bn">
            <div class="texto fz12 lh12">
                <b>AUTORIZACION DE ANUNCIOS</b>
            </div>
        </div>
        <div style="width: 716px;height:28px;float:left;" class="">
            <div style="width: 67px;height: 28px;float:left;" class="bgfdc">
                <div class="texto fz8 lh10">
                    CÓDIGO TIPO DE ANUNCIO
                </div>
            </div>
            <div style="width: 210;height: 28px;float:left;" class="bgfdc">
                <div class="texto fz8 lh16">
                    DESCRIPCIÓN TIPO DE ANUNCIO
                </div>
            </div>


            <div style="width: 35px;height: 28px;float:left;" class="bgfdc">
                <div class="texto fz8 lh10">
                    N° DE LADOS
                </div>
            </div>

            <div style="width: 70px;height: 28px;float:left;" class="bgfdc">
                <div class="texto fz8 lh10">
                    ÁREA <br> AUTORIZADA
                </div>
            </div>

            <div style="width: 65px;height: 28px;float:left;" class="bgfdc">
                <div class="texto fz8 lh10">
                    ÁREA <br> VERIFICADA
                </div>
            </div>
            <div style="width: 65px;height: 28px;float:left;" class="bgfdc">
                <div class="texto fz8 lh10">
                    N° DE <BR>EXPEDIENTE
                </div>
            </div>
            <div style="width: 45px;height: 28px;float:left;" class="bgfdc">
                <div class="texto fz8 lh10">
                    N° DE <BR>LICENCIA
                </div>
            </div>




            <div style="width: 151px;height:28px;float:left;" class="bn bgfdc">

                <div style="width: 151px;height: 14px;float:left;">
                    <div class="texto fz8 lh8">
                        VIGENCIA DE AUTORIZACIÓN
                    </div>
                </div>
                <div style="width: 74px;height: 14px;float:left;">
                    <div class="texto fz6 lh6">
                        FECHA DE<br> EXPEDICIÓN
                    </div>
                </div>

                <div style="width: 74.9px;height: 14px;float:left;">
                    <div class="texto fz6 lh6">
                        FECHA DE<br> VENCIMIENTO
                    </div>
                </div>
            </div>




            <!-- ################################## -->
            @foreach ($ficha?->autorizacion_anuncios as $autorizacion)
                <div style="width: 67px;height: 14px;float:left;">
                    <div class="texto fz10 lh14">
                        {{ $autorizacion?->codi_anuncio }}
                    </div>
                </div>
                <div style="width: 210;height: 14px;float:left;">
                    <div class="texto fz10 lh14">
                        @if ($autorizacion?->codigos != '')
                            {{ $autorizacion?->codigos?->desc_codigo }}
                        @endif
                    </div>
                </div>


                <div style="width: 35px;height: 14px;float:left;">
                    <div class="texto fz10 lh14">
                        {{ $autorizacion?->nume_lados }}
                    </div>
                </div>

                <div style="width: 70px;height: 14px;float:left;">
                    <div class="texto fz10 lh14">
                        {{ $autorizacion?->area_autorizada }}
                    </div>
                </div>

                <div style="width: 65px;height: 14px;float:left;">
                    <div class="texto fz10 lh14">
                        {{ $autorizacion?->area_verificada }}
                    </div>
                </div>
                <div style="width: 65px;height: 14px;float:left;">
                    <div class="texto fz10 lh14">
                        {{ $autorizacion?->nume_expediente }}
                    </div>
                </div>
                <div style="width: 45px;height: 14px;float:left;">
                    <div class="texto fz10 lh14">
                        {{ $autorizacion?->nume_licencia }}
                    </div>
                </div>

                <div style="width: 74px;height: 14px;float:left;">
                    <div class="texto fz8 lh14">
                        {{ date('d-m-Y', strtotime($autorizacion?->fecha_expedicion)) }}
                    </div>
                </div>

                <div style="width: 74.9px;height: 14px;float:left;">
                    <div class="texto fz8 lh14">
                        {{ date('d-m-Y', strtotime($autorizacion?->fecha_vencimiento)) }}
                    </div>
                </div>
        </div>
        @endforeach
    </div>


    <div style="width: 716px;height:20px;  float:left;" class="bn">

    </div>

    <div style="width: 716px;height:20px;  float:left;" class="bn">
        <div style="width: 350px;height:20px;  float:left;" class="bn">


            <div style="width: 350px;height:20PX;float:left;" class=" bn">
                <div style="width: 200px;height:20PX;float:left;" class="bgfdc">
                    <div class="texto fz8 lh14">
                        DATOS TÉCNICOS DEL INMUEBLE
                    </div>
                </div>
                <div style="width: 73PX;height:20PX;float:left;" class="bgfdc">
                    <div class="texto fz8 lh14">
                        DECLARADA (M2)
                    </div>
                </div>
                <div style="width: 73.9PX;height:20PX;float:left;" class="bgfdc">
                    <div class="texto fz8 lh14">
                        DECLARADA (M2)
                    </div>
                </div>


                <div style="width: 66PX;height:20PX;float:left;" class="bgfdc">
                    <div class="texto fz8 lh12">
                        UBICACIÓN
                    </div>
                </div>
                <div style="width: 66PX;height:20PX;float:left;" class="bgfdc">
                    <div class="texto fz8 lh8">
                        ÁREA AUTORIZADA
                    </div>
                </div>
                <div style="width: 66PX;height:20PX;float:left;" class="bgfdc">
                    <div class="texto fz8 lh12">
                        ÁREA VERIFICADA
                    </div>
                </div>

                <div style="width: 73px;height: 20PX;float:left;">
                    <div class="texto fz8 lh14">
                        @if ($ficha?->fichaeconomica != '')
                            {{ $ficha?->fichaeconomica?->nume_expediente }}
                        @endif
                    </div>
                </div>

                <div style="width: 73.9px;height: 20PX;float:left;">
                    <div class="texto fz8 lh14">
                        @if ($ficha?->fichaeconomica != '')
                            {{ $ficha?->fichaeconomica?->nume_licencia }}
                        @endif
                    </div>
                </div>

                @php $total1=0 @endphp
                @php $total2=0 @endphp

                <div style="width: 66PX;height:20PX;float:left;" class="bgfdc">
                    <div class="texto fz8 lh8">
                        PREDIO CATASTRAL
                    </div>
                </div>
                <div style="width: 66PX;height:20PX;float:left;" class="">
                    <div class="texto fz8 lh14">
                        @if ($ficha?->fichaeconomica != '')
                            {{ $ficha?->fichaeconomica?->pred_area_autor }}
                            @php $total1=$ficha?->fichaeconomica?->pred_area_autor + $total1 @endphp
                        @endif
                    </div>
                </div>
                <div style="width: 66PX;height:20PX;float:left;" class="">
                    <div class="texto fz8 lh14">
                        @if ($ficha?->fichaeconomica != '')
                            {{ $ficha?->fichaeconomica?->pred_area_verif }}
                            @php $total2=$ficha?->fichaeconomica?->pred_area_verif + $total2 @endphp
                        @endif
                    </div>
                </div>

                <div style="width: 147.9px;height: 20PX;float:left;" class="bgfdc">
                    <div class="texto fz8 lh14">
                        VIGENCIA DE AUTORIZACION
                    </div>
                </div>



                <div style="width: 66PX;height:20PX;float:left;" class="bgfdc">
                    <div class="texto fz8 lh14">
                        VIA PUBLICA
                    </div>
                </div>
                <div style="width: 66PX;height:20PX;float:left;" class="">
                    <div class="texto fz8 lh14">
                        @if ($ficha?->fichaeconomica != '')
                            {{ $ficha?->fichaeconomica?->viap_area_autor }}
                            @php $total1=$ficha?->fichaeconomica?->viap_area_autor + $total1 @endphp
                        @endif
                    </div>
                </div>
                <div style="width: 66PX;height:20PX;float:left;" class="">
                    <div class="texto fz8 lh14">
                        @if ($ficha?->fichaeconomica != '')
                            {{ $ficha?->fichaeconomica?->viap_area_verif }}
                            @php $total2=$ficha?->fichaeconomica?->viap_area_verif + $total2 @endphp
                        @endif
                    </div>
                </div>

                <div style="width: 73px;height: 20PX;float:left;" class="bgfdc">
                    <div class="texto fz8 lh8">
                        FECHA <BR>EXPEDIENTE
                    </div>
                </div>

                <div style="width: 73.9px;height: 20PX;float:left;" class="bgfdc">
                    <div class="texto fz8 lh8">
                        FECHA <BR>VENCIMIENTO
                    </div>
                </div>



                <div style="width: 66PX;height:20PX;float:left;" class="bgfdc">
                    <div class="texto fz8 lh8">
                        BIEN <BR>COMUN
                    </div>
                </div>
                <div style="width: 66PX;height:20PX;float:left;" class="">
                    <div class="texto fz8 lh14">
                        @if ($ficha?->fichaeconomica != '')
                            {{ $ficha?->fichaeconomica?->bc_area_autor }}
                            @php $total1=$ficha?->fichaeconomica?->bc_area_autor + $total1 @endphp
                        @endif
                    </div>
                </div>
                <div style="width: 66PX;height:20PX;float:left;" class="">
                    <div class="texto fz8 lh14">
                        @if ($ficha?->fichaeconomica != '')
                            {{ $ficha?->fichaeconomica?->bc_area_verif }}
                            @php $total2=$ficha?->fichaeconomica?->bc_area_verif + $total2 @endphp
                        @endif
                    </div>
                </div>

                <div style="width: 73px;height: 20PX;float:left;">
                    <div class="texto fz8 lh14">
                        @if ($ficha?->fichaeconomica != '')
                            @if ($ficha?->fichaeconomica?->fecha_expedicion != '')
                                {{ date('d-m-Y', strtotime($ficha?->fichaeconomica?->fecha_expedicion)) }}
                            @endif
                        @endif
                    </div>
                </div>

                <div style="width: 73.9px;height: 20PX;float:left;">
                    <div class="texto fz8 lh14">
                        @if ($ficha?->fichaeconomica != '')
                            @if ($ficha?->fichaeconomica?->fecha_vencimiento != '')
                                {{ date('d-m-Y', strtotime($ficha?->fichaeconomica?->fecha_vencimiento)) }}
                            @endif
                        @endif
                    </div>
                </div>



                <div style="width: 66PX;height:20PX;float:left;" class="bgfdc">
                    <div class="texto fz8 lh14">
                        TOTAL
                    </div>
                </div>
                <div style="width: 66PX;height:20PX;float:left;" class="">
                    <div class="texto fz8 lh14">
                        {{ $total1 }}
                    </div>
                </div>
                <div style="width: 66PX;height:20PX;float:left;" class="">
                    <div class="texto fz8 lh14">
                        {{ $total2 }}
                    </div>
                </div>

                <div style="width: 73px;height: 20PX;float:left;" class="bgfdc">
                    <div class="texto fz8 lh8">
                        INICIO DE ACTIVIDAD
                    </div>
                </div>

                <div style="width: 73.9px;height: 20PX;float:left;">
                    <div class="texto fz8 lh14">
                        @if ($ficha?->fichaeconomica != '')
                            @if ($ficha?->fichaeconomica?->inic_actividad != '')
                                {{ date('d-m-Y', strtotime($ficha?->fichaeconomica?->inic_actividad)) }}
                            @endif
                        @endif
                    </div>
                </div>


            </div>

            <div style="margin-top:20px;width: 90px;height: 20px;float:left;" class="bn">
                <div class="texto fz10 lh10">
                    <b>Observaciones:</b>
                </div>
            </div>

            <div style="width: 350px;height: 60px;float:left;">
                <div class="texto fz8 lh12">

                </div>
            </div>

            <div style="margin-top:10px;width: 350px;height: 20px;float:left;">
                <div class="texto fz8 lh12">
                    <b>Se expide el presente certificado a solicitud de don(ña):</b>
                </div>
            </div>
            <div style="width: 350px;height: 20px;float:left;">
                <div class="texto fz8 lh12">

                </div>
            </div>
            <div style="width: 50px;height: 20px;float:left;margin-top: 7px" class="bn">
                <div class="texto fz10 lh10">
                    <b>NOTA:</b>
                </div>
            </div>
            <div style="width: 350px;height: 20px;float:left;margin-bottom: 7px" class="bn">
                <div class="texto fz8 lh8">
                    El presente registro catastral no constituye titulo de dominio, ni sanea los vicios que pueda
                    contener
                    la definicion de los linderos del bien inmueble. <br>Vigencia del certificado 18 Meses
                </div>
            </div>

            <div style="width: 350px;height: 20px;float:left;">
                <div class="texto fz8 lh12">
                    <b>Firma y Sello</b>
                </div>
            </div>
            <div style="width: 350px;height: 60px;float:left;">
                <div class="texto fz8 lh12">

                </div>
            </div>


        </div>
        <div style="width: 350px;height:450px;  float:right;" class="">
        </div>
    </div>
</body>

</html>
