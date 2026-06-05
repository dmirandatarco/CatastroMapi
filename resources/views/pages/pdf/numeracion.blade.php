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

        .p5 {
            padding: 5px;
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
                </div>
            </div>
            <div style="width: 473px;height:16px;margin: auto;" class="bn">
                <div class="textotitulo fz16 lh16 tc">
                    CERTIFICADO DE NUMERACIÓN
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


    <div style="width: 716px;height:20px;  float:left;" class="bn">

    </div>

    <div style="width: 716px;height:20px;  float:left;" class="bn">
        <div style="width: 716px;height:20px;  float:left;text-align:left;" class="texto fz10 lh10">
            <b>EXPEDIENTE. N° :</b>
        </div>
    </div>
    <div style="width: 417px; height:400PX;float:left;" class="  ">
        <div style="width: 417px;height:400PX;float:left;" class="bn">
            <img src="{{asset('storage/img/imageneslotes/'.$ficha?->lote?->manzana?->sectore?->codi_sector.''.$ficha?->lote?->manzana?->codi_mzna.''.$ficha?->lote?->codi_lote.'.jpg')}}" alt="" style="width: 417px;height:400PX;  object-fit: contain;image-orientation: from-image;display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; align-items: center;">
        </div>
    </div>
    <div style="width: 288px;float:right;" class="bn">
        <div style="width: 288px;height:195px;float:left;" class="">
            <img src="{{asset('storage/img/imageneslotes/'.$ficha?->lote?->manzana?->sectore?->codi_sector.''.$ficha?->lote?->manzana?->codi_mzna.''.$ficha?->lote?->codi_lote.'.jpg')}}" alt="" style="width: 288px;height:145px;  object-fit: contain;image-orientation: from-image;display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; align-items: center;">
        </div>
        <div style="width: 288px;height:205px;float:left;" class="">
            <div class="textotitulo fz10 lh16 tc">
                DATOS DEL PREDIO
            </div>
            <div class="texto fz10 lh16 ti p5">
                <b>CÓDIGO CATASTRAL:</b> {{  $ficha->ficha?->id_lote}}
            </div>
            <div class="texto fz10 lh16 ti p5">

                <b>TITULAR  CATASTRAL:</b>{{ $ficha->ficha?->titular?->persona?->nombres }} {{ $ficha->ficha?->titular?->persona?->ape_paterno }} {{ $ficha->ficha?->titular?->persona?->ape_materno }}
            </div>
            <div class="texto fz10 lh16 ti p5">

            <b>CONDICIÓN:</b>
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

            <div class="texto fz10 lh16 ti p5">
                <b>PORCENTAJE (%):</b>
            </div>
            <div class="texto fz10 lh16 ti p5">
                <b>VIA:</b> {{$ficha?->ficha?->domiciliotitular?->codi_via}} {{$ficha?->ficha?->domiciliotitular?->tipo_via}} {{$ficha?->ficha?->domiciliotitular?->nomb_via}}
            </div>
        </div>
    </div>
    <div style="width: 716px;height:20px; margin-top:5px; float:left;" class="bn ">
        <div class="ti fz8 lh14 bn p5">
            <b> EL QUE SUSCRIBE, DIRECTOR DE LA OFICINA DE CATASTRO DEL(A) GOBIERNO MUNICIPAL DE CUSCO</b>
        </div>
        <table>
            <tbody>
                <tr>
                    <td rowspan="2">
                        <div class="ti fz16 lh14 bn">
                            <b> CERTIFICA:</b>
                        </div>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <div class="ti fz10 lh16 bn">
                            <b> AL AMPARO DE LA FUNCION MUNICIPAL DE ASIGNAR Y CERTIFICAR LA NUMERACIÓN OFICIAL DE LOS PREDIOS DENTRO DE SU JURISDICCION SE DEJA CONSTANCIA</b>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="width: 716px;height:20px; margin-top:5px;" class="bn ">
        <div style="width: 716px;height:16px; margin:auto; " class="bn ">
            <div style="width: 530px;height:16px; float:left; margin:auto;" class=" bn ">
                <div style="width: 237.9px;height: 16px;float:left;" class="">
                    <div class="textotitulo tc ">
                        N° OFICIAL
                    </div>
                </div>
                <div style="width: 237.9px;height: 16px;float:left;" class="">
                    <div class="textotitulo tc ">
                        TIPO DE PUERTA
                    </div>
                </div>
            </div>

            @foreach($ficha?->ficha?->puertas as $puerta)
                <div style="width: 530px;height:16px;   float:left;  margin:auto;" class=" bn">
                    <div style="width: 237.9px;height: 16px;float:left;" class="">
                        <div class="texto  ">
                        {{$puerta?->nume_muni}}
                        </div>
                    </div>
                    <div style="width: 237.9px;height: 16px;float:left;" class="">
                        <div class="texto  ">
                            {{$puerta?->tipo_puerta}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div style="width: 716px;height:20px;  float:left;" class="bn">
    </div>
    <div style="width: 716px;height:20px;  float:left;" class="bn ">
        <div style="width: 390px;float:left;" class="bn ">
            <div style="width: 390px;float:left;" class="bn ">
                <div style="width: 390px;height:15px;margin: auto; " class="">
                    <div class="texto fz8 lh12 ti">
                        <b>OBSERVACIÓN</b>
                    </div>
                </div>
                <div style="width: 390px;height:90px;margin: auto; " class="">
                    {{$ficha?->observaciones}}

                </div>
            </div>
        </div>
        <div style="width: 305px; float:right;" class="bn">
            <div style="width: 305px;height:105px;  float:right;" class="bn ">
                <div style="width: 315px;height:105px; font-size:10px; float:right;" class="">
                    <div class="bn" style="padding:5px;">
                    SE EXPIDE EL PRESENTE CERTIFICADO:
                    </div>
                </div>
            </div>
        </div>
    </div>








</body>

</html>
