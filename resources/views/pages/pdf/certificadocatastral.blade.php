<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INFORME TÉCNICO CATASTRAL</title>
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
            border: none;
            font-weight: bold;
            vertical-align: middle;
        }

        .ti {
            text-align: left !important;
        }

        .td {
            text-align: right !important;
        }

        .tc {
            text-align: center !important;
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
            <div style="width: 473px;height:16px;margin: auto;" class="bn">
                <div class="textotitulo fz16 lh16 tc">
                    PLANO CATASTRAL
                </div>
                <div class="texto fz14 lh16 tc">
                    N° 089-2022-OC/GM/MPC
                </div>
            </div>
        </div>
        <div style="width: 120px;height: 120px;float:left;border:none;">
            <img src="{{ $logos?->logo_catastro }}" alt="">
        </div>
    </div>
    <br></br>
    <div style="width: 716px;height:20px;  float:left;" class="bn">
        <div style="width: 716px;height:20px;  float:left;text-align:left;" class="texto fz10 lh10">
            <b>EXP. N°:</b>
        </div>
    </div>
    <div style="width: 450px;float:left;" class="">
        <div style="width: 450px;height:400px;float:left;" class="bn">
            <img src="{{$url }}"
                alt=""
                style="width: 450px;height:400px;  object-fit: contain;image-orientation: from-image;display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; align-items: center;">
        </div>
    </div>
    <div style="width: 265px;float:left;" class="">
        <div style="width: 265px;float:left;" class=" bn">
            <div style="width: 265px;height: 16px;float:left;" class="">
                <div class="texto fz10 lh14">
                    CUADRO TÉCNICO
                </div>
            </div>
            <div style="width: 265px;height: 32px;float:left;" class="bn ">
                <div style="width: 30px;height: 32px;float:left;" class="bn">
                    <div class="texto fz10 lh16">
                        VERT.
                    </div>
                </div>
                <div style="width: 234.9px;height: 32px;float:left;" class="bn">
                    <div style="width: 234.9px;height: 16px;float:left;" class="">
                        <div class="texto fz10 lh14">
                            COORDENADAS UTM
                        </div>
                    </div>
                    <div style="width: 234.9px;height: 16px;float:left;" class="bn ">
                        <div style="width: 115.9;height: 16px;float:left;" class="">
                            <div class="texto fz10 lh16">
                                este(X)
                            </div>
                        </div>
                        <div style="width: 116.9px;height: 16px;float:left;" class="">
                            <div class="texto fz10 lh16">
                                norte(Y)
                            </div>
                        </div>
                    </div>
                </div>
                <!--FOREACH-->
                @foreach($coordenadas as $i => $coordenada)
                    <div style="width: 29px;height: 16px;float:left;" class="">
                        <div class="texto fz10 lh16">
                            {{$i+1}}
                        </div>
                    </div>
                    <div style="width: 115.9px;height: 16px;float:left;" class="">
                        <div class="texto fz10 lh16">
                            {{$coordenada->x}}
                        </div>
                    </div>
                    <div style="width: 116.9px;height: 16px;float:left;" class="">
                        <div class="texto fz10 lh16">
                            {{$coordenada->y}}
                        </div>
                    </div>
                @endforeach
                <!--FOREACH-->
            </div>
        </div>

        <div style="width: 265px;height: 16px;float:left;" class="bn">
        </div>
        <div style="width: 265px;float:left;" class=" bn">
            <div style="width: 265px;height: 16px;float:left;" class="">
                <div class="texto fz10 lh14">
                    universal transverse mercator
                </div>
            </div>
            <div style="width: 265px;height: 32px;float:left;" class="bn ">
                <div style="width: 80px;height: 16px;float:left;" class="">
                    <div class="texto fz10 lh16">
                        datum hztal
                    </div>
                </div>
                <div style="width: 182.9px;height: 16px;float:left;" class="">
                    <div class="texto fz10 lh16">
                        k
                    </div>
                </div>
                <div style="width: 80px;height: 16px;float:left;" class="">
                    <div class="texto fz10 lh16">
                        datum vcal
                    </div>
                </div>
                <div style="width: 182.9px;height: 16px;float:left;" class="">
                    <div class="texto fz10 lh16">
                        m
                    </div>
                </div>
                <div style="width: 80px;height: 16px;float:left;" class="">
                    <div class="texto fz10 lh16">
                        zona utm
                    </div>
                </div>
                <div style="width: 182.9px;height: 16px;float:left;" class="">
                    <div class="texto fz10 lh16">
                        o
                    </div>
                </div>
                <div style="width: 80px;height: 16px;float:left;" class="">
                    <div class="texto fz10 lh16">
                        escala
                    </div>
                </div>
                <div style="width: 182.9px;height: 16px;float:left;" class="">
                    <div class="texto fz10 lh16">
                        q
                    </div>
                </div>
            </div>
        </div>
        <div style="width: 265px;height: 16px;float:left;" class="bn">
        </div>
        <div style="width: 265px;float:left;" class=" bn">
            <div style="width: 265px;height: 16px;float:left;" class="">
                <div class="textotitulo fz10 lh14">
                    datos de la construcción:
                </div>
            </div>
            <div style="width: 265px;height: 32px;float:left;" class="bn ">
                <div style="width: 45PX;height: 16px;float:left;" class="">
                    <div class="textotitulo fz10 lh16 tc">
                        nivel
                    </div>
                </div>
                <div style="width: 110.9px;height: 16px;float:left;" class="">
                    <div class="textotitulo fz10 lh16 tc">
                        categoria
                    </div>
                </div>
                <div style="width: 106px;height: 16px;float:left;" class="">
                    <div class="textotitulo fz10 lh16 tc">
                        area
                    </div>
                </div>
                <!--FOREACH-->
                @foreach($ficha?->ficha?->construccions as $construccion)


                    @if(isset($construccion?->nume_piso))
                        @switch($construccion?->nume_piso)
                            @case('1')
                                <div style="width: 15px; height:17px;float:left;" class="bprueba">
                                    <img src="{{ asset('storage/img/1.jpg') }}"
                                    alt=""
                                    style="width: 15px;height:15px;  object-fit: cover">
                                </div>
                                @break
                            @case('2')
                                <div style="width: 15px; height:17px;float:left;" class="bprueba">
                                    <img src="{{ asset('storage/img/2.jpg') }}"
                                    alt=""
                                    style="width: 15px;height:15px;  object-fit: cover">
                                </div>
                                @break
                            @case('3')
                                <div style="width: 15px; height:17px;float:left;" class="bprueba">
                                    <img src="{{ asset('storage/img/3.jpg') }}"
                                    alt=""
                                    style="width: 15px;height:15px;  object-fit: cover">
                                </div>
                                @break
                            @case('4')
                                <div style="width: 15px; height:17px;float:left;" class="bprueba">
                                    <img src="{{ asset('storage/img/4.jpg') }}"
                                    alt=""
                                    style="width: 15px;height:15px;  object-fit: cover">
                                </div>
                                @break
                            @case('5')
                                <div style="width: 15px; height:17px;float:left;" class="bprueba">
                                    <img src="{{ asset('storage/img/5.jpg') }}"
                                    alt=""
                                    style="width: 15px;height:15px;  object-fit: cover">
                                </div>
                                @break
                            @case('6')
                                <div style="width: 15px; height:17px;float:left;" class="bprueba">
                                    <img src="{{ asset('storage/img/6.jpg') }}"
                                    alt=""
                                    style="width: 15px;height:15px;  object-fit: cover">
                                </div>
                                @break
                            @case('7')
                                <div style="width: 15px; height:17px;float:left;" class="bprueba">
                                    <img src="{{ asset('storage/img/7.jpg') }}"
                                    alt=""
                                    style="width: 15px;height:15px;  object-fit: cover">
                                </div>
                                @break
                            @case('8')
                                <div style="width: 15px; height:17px;float:left;" class="bprueba">
                                    <img src="{{ asset('storage/img/8.jpg') }}"
                                    alt=""
                                    style="width: 15px;height:15px;  object-fit: cover">
                                </div>
                                @break
                            @case('9')
                                <div style="width: 15px; height:17px;float:left;" class="bprueba">
                                    <img src="{{ asset('storage/img/9.jpg') }}"
                                    alt=""
                                    style="width: 15px;height:15px;  object-fit: cover">
                                </div>
                                @break
                            @case('10')
                                <div style="width: 15px; height:17px;float:left;" class="bprueba">
                                    <img src="{{ asset('storage/img/10.jpg') }}"
                                    alt=""
                                    style="width: 15px;height:15px;  object-fit: cover">
                                </div>
                                @break
                            @case('51')
                                <div style="width: 15px; height:17px;float:left;" class="bprueba">
                                    <img src="{{ asset('storage/img/51.jpg') }}"
                                    alt=""
                                    style="width: 15px;height:15px;  object-fit: cover">
                                </div>
                                @break
                            @case('71')
                                <div style="width: 15px; height:17px;float:left;" class="bprueba">
                                    <img src="{{ asset('storage/img/71.jpg') }}"
                                    alt=""
                                    style="width: 15px;height:15px;  object-fit: cover">
                                </div>
                                @break
                            @case('81')
                                <div style="width: 15px; height:17px;float:left;" class="bprueba">
                                    <img src="{{ asset('storage/img/81.jpg') }}"
                                    alt=""
                                    style="width: 15px;height:15px;  object-fit: cover">
                                </div>
                                @break
                            @default
                                <div style="width: 15px; height:17px;float:left;" class="bprueba">
                                    <img src="{{ asset('storage/img/7.jpg') }}"
                                    alt=""
                                    style="width: 15px;height:15px;  object-fit: cover">
                                </div>
                        @endswitch
                    @else
                        <div style="width: 15px; height:17px;float:left;" class="bprueba">
                                    <img src="{{ asset('storage/img/8.jpg') }}"
                                    alt=""
                                    style="width: 15px;height:15px;  object-fit: cover">
                                </div>
                    @endif



                    <div style="width: 45PX;height: 16px;float:left;" class="">
                        <div class="texto fz10 lh16 tc">
                        {{$construccion?->nume_piso}}
                        </div>
                    </div>

                    <div style="width: 110.9px;height: 16px;float:left;" class="">
                        <div class="texto fz10 lh16 tc">
                            {{$construccion?->estr_muro_col}} -
                            {{$construccion?->estr_techo}} -
                            {{$construccion?->acab_piso}} -
                            {{$construccion?->acab_puerta_ven}} -
                            {{$construccion?->acab_revest}} -
                            {{$construccion?->acab_bano}} -
                            {{$construccion?->inst_elect_sanita}}
                        </div>
                    </div>

                    <div style="width: 90px;height: 16px;float:left;" class="">
                        <div class="texto fz10 lh16 tc">
                            {{$construccion?->area_verificada}}
                        </div>
                    </div>
                @endforeach
                <!--FOREACH-->
            </div>
        </div>
    </div>
    <div style="width: 716px;height:20px; margin-top:5px;" class="bn ">
    </div>
    <div style="width: 716px;height:20px; margin-top:5px;" class="">
        <div style="width: 716px;height:16px; margin:auto; " class="bn ">
            <div style="width: 716px;height:16px; float:left;" class=" bn ">
                <div style="width: 237px;height: 16px;float:left;" class="">
                    <div class="textotitulo  ti">
                        TITULAR CATASTRAL:
                    </div>
                    <div class="texto  ti">
                        {{ $ficha->ficha?->titular?->persona?->nombres }} {{ $ficha->ficha?->titular?->persona?->ape_paterno }} {{ $ficha->ficha?->titular?->persona?->ape_materno }}
                    </div>
                </div>
                <div style="width: 238.9px;height: 16px;float:left;" class="">
                    <div class="textotitulo  ti">
                        CONDICION:
                    </div>
                    <div class="texto ti">
                    @if(isset($ficha->ficha->titular->cond_titular))
                        @switch($ficha->ficha->titular->cond_titular)
                            @case('01')
                                Titular Catastral
                                @break
                            @case('02')
                                Representante Legal
                                @break
                            @case('03')
                                Arrendatario
                                @break
                            @case('04')
                                Familiar
                                @break
                            @case('05')
                                Vecino
                                @break
                            @case('06')
                                Otros
                                @break
                            @default
                                El tipo de titular catastral no está especificado correctamente.
                        @endswitch
                    @else
                        No se ha especificado el tipo de titular catastral.
                    @endif
                    </div>
                </div>
                <div style="width: 237px;height: 16px;float:left;" class="">
                    <div class="textotitulo  ti">
                        PORCENTAJE (%):
                    </div>
                    <div class="texto ti">
                        %
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="width: 716px;height:20px;  float:left;" class="bn">
    </div>
    <div style="width: 716px;height:20px;  float:left;" class="bn ">
        <div style="width: 350px;height:20px;  float:left;" class="bn ">
            <div style="width: 350px;height:20px; margin-bottom:15px;  float:left;" class=" bn">
                <div style="width: 350px;height: 16px;float:left;" class="">
                    <div class="textotitulo ti fz8 lh10">
                        DATOS DEL PREDIO
                    </div>
                </div>
                <div style="width: 140PX;height: 16px;float:left;" class="">
                    <div class="textotitulo ti fz8 lh10">
                        COD. CATASTRAL:
                    </div>
                </div>
                <div style="width: 207.9PX;height: 16px;float:left;" class="">
                    <div class="texto fz8 lh10">
                        {{  $ficha->ficha?->id_uni_cat}}
                    </div>
                </div>
                <div style="width: 50PX;height: 16px;float:left;" class="">
                    <div class="textotitulo ti fz8 lh10">
                        SECTOR:
                    </div>
                </div>
                <div style="width: 120PX;height: 16px;float:left;" class="">
                    <div class="texto fz8 lh10">
                        {{$ficha?->ficha?->unicat?->edificacion?->lote?->manzana?->sectore?->codi_sector}}
                    </div>
                </div>
                <div style="width: 50PX;height: 16px;float:left;" class="">
                    <div class="textotitulo ti fz8 lh10">
                        MZ.CAT.:
                    </div>
                </div>
                <div style="width: 125.9px;height: 16px;float:left;" class="">
                    <div class="texto fz8 lh10">
                    </div>
                </div>
                <div style="width: 50PX;height: 16px;float:left;" class="">
                    <div class="textotitulo ti fz8 lh10">
                        LT.CAT.:
                    </div>
                </div>
                <div style="width: 120PX;height: 16px;float:left;" class="">
                    <div class="texto fz8 lh10">
                    </div>
                </div>
                <div style="width: 50PX;height: 16px;float:left;" class="">
                    <div class="textotitulo ti fz8 lh10">
                        UNIDAD:
                    </div>
                </div>
                <div style="width: 125.9px;height: 16px;float:left;" class="">
                    <div class="texto fz8 lh10">
                        {{$ficha?->ficha?->unicat?->edificacion?->codi_edificacion}}
                    </div>
                </div>
                <div style="width: 140PX;height: 16px;float:left;" class="">
                    <div class="textotitulo ti fz8 lh10">
                        HAB. URBANA:
                    </div>
                </div>
                <div style="width: 207.9PX;height: 16px;float:left;" class="">
                    <div class="texto fz8 lh10">
                        {{$ficha?->ficha?->unicat?->edificacion?->lote?->hab_urbana?->codi_hab_urba}}
                        {{$ficha?->ficha?->unicat?->edificacion?->lote?->hab_urbana?->tipo_hab_urba}}
                        {{$ficha?->ficha?->unicat?->edificacion?->lote?->hab_urbana?->nomb_hab_urba}}
                    </div>
                </div>
                <div style="width: 50PX;height: 16px;float:left;" class="">
                    <div class="textotitulo ti fz8 lh10">
                        MZ.:
                    </div>
                </div>
                <div style="width: 120PX;height: 16px;float:left;" class="">
                    <div class="texto fz8 lh10">
                        {{$ficha?->ficha?->unicat?->edificacion?->lote?->manzana?->codi_mzna}}

                    </div>
                </div>
                <div style="width: 50PX;height: 16px;float:left;" class="">
                    <div class="textotitulo ti fz8 lh10">
                        LOTE:
                    </div>
                </div>
                <div style="width: 125.9px;height: 16px;float:left;" class="">
                    <div class="texto fz8 lh10">
                        {{$ficha?->ficha?->unicat?->edificacion?->lote?->codi_lote}}
                    </div>
                </div>
            </div>
            <div style="width: 350px;height:20px; margin-bottom:15px;  float:right;" class=" bn">
                <div style="width: 50PX;height: 16px;float:left;" class="">
                    <div class="textotitulo ti fz8 lh10">
                        VIA:
                    </div>
                </div>
                <div style="width: 297.9px;height: 16px;float:left;" class="">
                    <div class="texto fz8 lh10">
                    {{$ficha?->ficha?->domiciliotitular?->codi_via}}
                    {{$ficha?->ficha?->domiciliotitular?->tipo_via}}
                    {{$ficha?->ficha?->domiciliotitular?->nomb_via}}
                    </div>
                </div>
                <div style="width: 80px;height: 16px;float:left;" class="">
                    <div class="textotitulo ti fz8 lh10">
                        ZONIFICACION:
                    </div>
                </div>
                <div style="width: 267.9px;height: 16px;float:left;" class="">
                    <div class="texto fz8 lh10">
                        {{$ficha?->ficha?->unicat?->edificacion?->lote?->zonificacion}}
                    </div>
                </div>
                <div style="width: 100px;height: 16px;float:left;" class="">
                    <div class="textotitulo ti fz8 lh10">
                        AREA CATASTRADA:
                    </div>
                </div>
                <div style="width: 247.9px;height: 16px;float:left;" class="">
                    <div class="texto fz8 lh10">
                        {{$ficha?->ficha?->fichaindividual?->area_titulo}}
                    </div>
                </div>
                <div style="width: 348.9px;height: 16px;float:left;" class="">
                    <div class="texto fz8 lh10">
                        <div class="textotitulo ti">
                            observaciones
                        </div>
                        <div class="texto ti">
                            observaciones
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="width: 350px;height:20px;  float:right;" class="bn ">
            <div style="width: 350px;height:20px; margin-bottom:15px;  float:right;" class=" bn">
                <div style="width: 350px;height: 180px;float:left;border:none;vertical-align:middle" class="">
                    <img src="" style="width: 350px;height: 180px" alt="Logo">
                </div>
                <div style="margin-top:10px;width: 350px;height: 20px;float:right;">
                    <div class="texto fz8 lh12">
                        Se expide el presente certificado a solicitud de don(ña):
                    </div>
                </div>
                <div style="width: 350px;height: 20px;float:right;">
                    <div class="texto fz8 lh12">
                        {{ $ficha->nombresolicitud }}
                    </div>
                </div>
            </div>
        </div>






    </div>
</body>

</html>
