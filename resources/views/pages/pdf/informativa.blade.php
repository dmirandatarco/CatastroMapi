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
                    GERENCIA DE DESARROLLO URBANO Y RURAL
                </div>
            </div>
            <div style="width: 473px;height:16px;margin: auto; padding-top:5px;padding-bottom:5px; " class="bgfdc">
                <div class="texto fz14 lh10">
                    HOJA INFORMATIVA CATASTRAL URBANO N° -
                </div>
            </div>

            <div style="width: 473px;height:16px;margin: auto;">
                <div style="width: 210PX;height:16PX;  float:left;" class="texto2 fz8 lh14">
                    FECHA:
                </div>
                <div style="width: 260PX;height:16PX;  float:left;" class="texto2 fz8 lh14">
                    HORA:
                </div>
                <div style="width: 210PX;height:16PX;  float:left;" class="texto2 fz8 lh14">
                    {{ $fecha }}
                </div>
                <div style="width: 260PX;height:16PX;  float:left;" class="texto2 fz8 lh14">
                    {{ $hora }}
                </div>
            </div>



            <!-- fila 03-->
            <div style="width: 427px;height:16px;margin: auto; padding-top:10px;border:none" class="">
                <div style="width: 106px;height: 16px;float:left;border:none;">
                    <div style="width: 106px;height: 8px;float:left;" class="bgfdc">
                        <div class="texto fz4 lh6">
                            UBIGEO
                        </div>
                    </div>
                    <div style="width: 106px;height: 8px;float:left;border:none;" class="bgfdc">
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
                            8
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


    <div style="width: 716px;height:20px;  float:left;" class="bn">

    </div>

    <div style="width: 716px;height:20px;  float:left;" class="bn">
        <div style="width: 716px;height:20px;  float:left;text-align:left;" class="texto fz10 lh10">
            <b>DATOS DEL TITULAR(ES) CATASTRAL:</b>
        </div>
    </div>


    <div style="width: 716px;height:20px;  float:left;" class="bn">
        <div style="width: 310px;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
                NOMBRES Y APELLIDOS O RAZON SOCIAL
            </div>
        </div>
        <div style="width: 180px;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
                TIPO DE DOCUMENTO
            </div>
        </div>
        <div style="width: 222.9px;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
                N° DE DOCUMENTO
            </div>
        </div>
        <!-- <div style="width: 87px;height: 16px;float:left;" class="bgfdc">
          <div class="texto fz10 lh14">
            %
          </div>
        </div> -->
        <!-- #####################################-->
        @if ($ficha?->titulars != '')
            @foreach ($ficha?->titulars as $titulars)
                <div style="width: 310px;height: 16px;float:left;">
                    <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                        {{ $titulars?->persona?->nombres }} {{ $titulars?->persona?->ape_paterno }}
                        {{ $titulars?->persona?->ape_materno }}
                    </div>
                </div>
                <div style="width: 180px;height: 16px;float:left;">
                    <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                        {{ $titulars?->persona?->tipo_doc }}
                    </div>
                </div>
                <div style="width: 222.9px;height: 16px;float:left;">
                    <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                        {{ $titulars?->persona?->nume_doc }}
                    </div>
                </div>

                <!-- <div style="width: 87px;height: 16px;float:left;">
            <div class="texto fz10 lh14"  class="texto2 fz8 lh14">
              {{ $titulars?->porc_cotitular }}
            </div>
          </div> -->
            @endforeach
        @else
            <div style="width: 310px;height: 16px;float:left;">
                <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                </div>
            </div>
            <div style="width: 180px;height: 16px;float:left;">
                <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                </div>
            </div>
            <div style="width: 135px;height: 16px;float:left;">
                <div class="texto fz10 lh14" class="texto2 fz8 lh14">

                </div>
            </div>
            <div style="width: 87px;height: 16px;float:left;">
                <div class="texto fz10 lh14" class="texto2 fz8 lh14">

                </div>
            </div>
        @endif
        <div style="width: 716px;height: 16px;float:left;">
            <div class="ti texto fz10 lh14">
                <b>CONDICION DE TITULAR: </b>
                @if ($ficha?->titular != '')
                    {{ $ficha?->titular?->condiciontitular?->desc_codigo }}
                @endif
            </div>
        </div>
    </div>

    <div style="width: 716px;height:20px;  float:left;" class="bn">

    </div>


    <div style="width: 716px;height:20px;  float:left;" class="bn">
        <div style="width: 716px;height:20px;  float:left;text-align:left;" class="texto fz10 lh10">
            <b>DATOS DEL PREDIO:</b>
        </div>
    </div>

    <div style="width: 716px;height:20px;  float:left;" class=" bn">
        <div style="width: 716px;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
                DIRECCION DEL PREDIO
            </div>
        </div>
        <div style="width: 100.9PX;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
                TIPO DE VIA
            </div>
        </div>
        <div style="width: 345PX;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
                NOMBRE DE VIA
            </div>
        </div>
        <div style="width: 130PX;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
                N° MUNICIPAL
            </div>
        </div>
        <div style="width: 50PX;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
                LOTE
            </div>
        </div>
        <div style="width: 85PX;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
                MANZANA
            </div>
        </div>
        @if ($ficha?->puertas != '')
            @foreach ($ficha?->puertas as $puerta)
                <div style="width: 100.9PX;height: 16px;float:left;">
                    <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                        {{ $puerta?->via?->tipo_via }}
                    </div>
                </div>
                <div style="width: 345PX;height: 16px;float:left;">
                    <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                        {{ $puerta?->via?->nomb_via }}
                    </div>
                </div>
                <div style="width: 130PX;height: 16px;float:left;">
                    <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                        {{ $puerta?->nume_muni }}
                    </div>
                </div>
                <div style="width: 50PX;height: 16px;float:left;">
                    <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                        {{ $ficha?->unicat?->edificacion?->lote?->mzna_dist }}
                    </div>
                </div>
                <div style="width: 85PX;height: 16px;float:left;">
                    <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                        {{ $ficha?->unicat?->edificacion?->lote?->lote_dist }}
                    </div>
                </div>
            @endforeach
        @else
            <div style="width: 100.9PX;height: 16px;float:left;">
                <div class="texto fz10 lh14" class="texto2 fz8 lh14">

                </div>
            </div>
            <div style="width: 345PX;height: 16px;float:left;">
                <div class="texto fz10 lh14" class="texto2 fz8 lh14">

                </div>
            </div>
            <div style="width: 130PX;height: 16px;float:left;">
                <div class="texto fz10 lh14" class="texto2 fz8 lh14">

                </div>
            </div>
            <div style="width: 50PX;height: 16px;float:left;">
                <div class="texto fz10 lh14" class="texto2 fz8 lh14">

                </div>
            </div>
            <div style="width: 85PX;height: 16px;float:left;">
                <div class="texto fz10 lh14" class="texto2 fz8 lh14">

                </div>
            </div>
        @endif
        <div style="width: 411.9px;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
                Urbanizacion - hu
            </div>
        </div>
        <div style="width: 90px;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
                departamento
            </div>
        </div>
        <div style="width: 95px;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
                provincia
            </div>
        </div>
        <div style="width: 115px;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
                distrito
            </div>
        </div>
        <!-- #####################################-->

        <div style="width: 411.9px;height: 16px;float:left;">
            <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                {{ $ficha?->unicat?->edificacion?->lote?->hab_urbana?->tipo_hab_urba }}
                {{ $ficha?->unicat?->edificacion?->lote?->hab_urbana?->nomb_hab_urba }}
            </div>
        </div>
        <div style="width: 90px;height: 16px;float:left;">
            <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                @if (isset($ficha?->domiciliotitular?->departamento))
                    @if ($ficha?->domiciliotitular?->departamento != '')
                        {{ $ficha?->domiciliotitular?->departamento?->descri }}
                    @endif
                @endif
            </div>
        </div>
        <div style="width: 95px;height: 16px;float:left;">
            <div class="texto fz10 lh14" class="texto2 fz8 lh14">
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
        </div>
        <div style="width: 115px;height: 16px;float:left;">
            <div class="texto fz10 lh14" class="texto2 fz8 lh14">
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
        </div>
    </div>

    <div style="width: 716px;height:20px;  float:left;" class="bn">
    </div>

    <div style="width: 716px;height:20px;  float:left;" class=" bn">
        <div style="width: 237px;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
                ÁREA DE TERRENO VERIFICADA (M2)
            </div>
        </div>
        <div style="width: 237.9px;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
                ÁREA CONSTRUIDA (M2)
            </div>
        </div>
        <div style="width: 238px;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
                % BIEN COMUN
            </div>
        </div>
        <div style="width: 237px;height: 16px;float:left;">
            <div class="texto fz10 lh14">
                @if ($ficha?->fichaindividual != '')
                    {{ $ficha?->fichaindividual?->area_declarada }}
                @endif
            </div>
        </div>
        <div style="width: 237.9px;height: 16px;float:left;">
            <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                @if ($ficha?->fichaindividual != '')
                    {{ $ficha?->fichaindividual?->area_verificada }}
                @endif
            </div>
        </div>
        <div style="width: 238px;height: 16px;float:left;">
            <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                @if ($ficha?->fichaindividual != '')
                    {{ $ficha?->fichaindividual?->porc_bc_terr_legal }}
                @endif
            </div>
        </div>
    </div>

    <div style="width: 716px;height:20px;  float:left;" class=" bn">
        <div style="width: 425PX;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
                LINDEROS POR LOTE
            </div>
        </div>
        <div style="width: 288.9px;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
                MEDIDAS PERIMETRICAS DEL LOTE (M)
            </div>
        </div>
        <!--###################################-->

        <div style="width: 124PX;height: 16px;float:left;" class="bgfdd">
            <div class="texto fz10 lh14">
                FRENTE
            </div>
        </div>
        <div style="width: 300PX;height: 16px;float:left;">
            <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                @if ($ficha?->lindero != '')
                    {{ $ficha?->lindero?->fren_campo }}
                @endif
            </div>
        </div>
        <div style="width: 289PX;height: 16px;float:left;">
            <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                @if ($ficha?->lindero != '')
                    {{ $ficha?->lindero?->fren_colinda_campo }}
                @endif
            </div>
        </div>

        <div style="width: 124PX;height: 16px;float:left;" class="bgfdd">
            <div class="texto fz10 lh14">
                DERECHA
            </div>
        </div>
        <div style="width: 300PX;height: 16px;float:left;">
            <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                @if ($ficha?->lindero != '')
                    {{ $ficha?->lindero?->dere_campo }}
                @endif
            </div>
        </div>
        <div style="width: 289PX;height: 16px;float:left;">
            <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                @if ($ficha?->lindero != '')
                    {{ $ficha?->lindero?->dere_colinda_campo }}
                @endif
            </div>
        </div>

        <div style="width: 124PX;height: 16px;float:left;" class="bgfdd">
            <div class="texto fz10 lh14">
                IZQUIERDA
            </div>
        </div>
        <div style="width: 300PX;height: 16px;float:left;">
            <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                @if ($ficha?->lindero != '')
                    {{ $ficha?->lindero?->izqu_campo }}
                @endif
            </div>
        </div>
        <div style="width: 289PX;height: 16px;float:left;">
            <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                @if ($ficha?->lindero != '')
                    {{ $ficha?->lindero?->izqu_colinda_campo }}
                @endif
            </div>
        </div>

        <div style="width: 124PX;height: 16px;float:left;" class="bgfdd">
            <div class="texto fz10 lh14">
                FONDO
            </div>
        </div>
        <div style="width: 300PX;height: 16px;float:left;">
            <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                @if ($ficha?->lindero != '')
                    {{ $ficha?->lindero?->fond_campo }}
                @endif
            </div>
        </div>
        <div style="width: 289PX;height: 16px;float:left;">
            <div class="texto fz10 lh14" class="texto2 fz8 lh14">
                @if ($ficha?->lindero != '')
                    {{ $ficha?->lindero?->fond_colinda_campo }}
                @endif
            </div>
        </div>
    </div>


    <div style="width: 716px;height:20px;  float:left;" class="bn">
    </div>

    <div style="width: 716px;height:400px;  float:left;" class="bn ">
        <div style="width: 385px;height:455px;float:left;" class="bn">

            <img src="{{ 'storage/img/imageneslotes/' . $ficha?->fichaindividual?->imagen_lote }}" alt="imglotes"
                style="width: 385px;height:455px;  object-fit: cover;">

        </div>
        <div style="width: 315px;height:400px;  float:right;" class="bn">
            <div style="width: 315px;height:210px;  float:right;" class="">
                <img src="{{ 'storage/img/imagenesplanos/' . $ficha?->fichaindividual?->imagen_plano }}"
                    alt="imgplanos" style="width: 315px;height:210px;  object-fit: contain;">
            </div>
            <div style="margin-top:10px;width: 315px;height: 20px;float:left;">
                <div class="texto fz8 lh12">
                    Se expide el presente certificado a solicitud de don(ña):
                </div>
            </div>
            <div style="width: 315px;height: 20px;float:left;">
                <div class="texto fz8 lh12">

                </div>
            </div>
            <div style="margin-top:10px;width: 315px;height: 20px;float:left;">
                <div class="texto fz8 lh12">
                    ZONA CATASTRADA
                </div>
            </div>
            <div style="width: 315px;height: 20px;float:left;">
                <div class="texto fz8 lh12">

                </div>
            </div>

            <div style="margin-top:10px;width: 315px;height: 20px;float:left;">
                <div class="texto fz8 lh12">
                    VISTO EN LA ENTIDAD GENERADORA DE CATASTRO
                </div>
                <div style="width: 315px;height: 120px;float:left;" class="bn">
                    <div class="texto fz8 lh12">

                    </div>
                </div>
            </div>

        </div>



    </div>






</body>

</html>
