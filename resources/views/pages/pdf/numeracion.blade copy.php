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
            <img src="{{$logos?->logo_institucion}}" alt="Logo">
        </div>

        <div style="width: 473px;height: 8px;float:left;border:none;">
            <div style="width: 473px;height:16px;margin: auto;" class="bn">
                <div class="texto fz18 lh14">
                    <b style="color:#5d0d0d"> {{$logos?->desc_institucion}}</b>
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
            <div style="width: 473px;height:16px;margin: auto; padding-top:5px;padding-bottom:5px; margin-bottom:5px; " class="bgfdc">
                <div class="texto fz14 lh14">
                    <b>CERTIFICADO NUMERACION</b>
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
                    {{ $ficha->ficha?->unicat?->edificacion?->lote?->manzana?->sectore?->codi_sector }}
                </div>
                <div style="width: 53px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{$ficha->ficha?->unicat?->edificacion?->lote?->manzana?->codi_mzna}}
                </div>
                <div style="width: 51px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{$ficha->ficha?->unicat?->edificacion?->lote?->codi_lote}}
                </div>
                <div style="width: 35px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{$ficha->ficha?->unicat?->edificacion?->codi_edificacion}}
                </div>
                <div style="width: 34px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{$ficha->ficha?->unicat?->codi_entrada}}
                </div>
                <div style="width: 35px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{$ficha->ficha?->unicat?->codi_piso}}
                </div>
                <div style="width: 52px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{$ficha->ficha?->unicat?->codi_unidad}}
                </div>
                <div style="width: 17.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{$ficha->ficha?->dc}}
                </div>
            </div>
            <!-- fila 05-->
        </div>

        <div style="width: 120px;height: 120px;float:left;border:none;">
            <img src="{{$logos?->logo_catastro}}" alt="">
        </div>
    </div>


    <div style="width: 716px;height:20px;  float:left;" class="bn">

    </div>

    <div style="width: 716px;height:20px;  float:left;" class="bn">
        <div style="width: 716px;height:20px;  float:left;text-align:left;" class="texto fz10 lh10">
            <b>EXPEDIENTE. N° :</b>
        </div>
    </div>
    <div style="width: 417px;float:left;" class="bn  ">
        <div style="width: 417px;height:10px ;float:left;" class=" bn ">
            <div style="width: 290px;height: 16px;float:left;" class="bgfdc">
                <div class="texto fz10 lh14">
                    PROPIETARIO (APELLIDOS Y NOMBRES) / RAZON
                </div>
            </div>
            <div style="width: 124.9px;height: 16px;float:left;" class="bgfdc">
                <div class="texto fz10 lh14">
                    DNI / RUC
                </div>
            </div>


            @if($ficha?->titulares != "")
            @foreach ($ficha->titulares as $titulars)
            <div style="width: 290px;height: 16px;float:left;">
                <div class="texto fz6 lh14" class="texto2 fz8 lh14">
                    {{$titulars?->nombres}} {{$titulars?->ape_paterno}} {{$titulars?->ape_materno}} {{$titulars?->razon_social}}
                </div>
            </div>
            <div style="width: 124.9px;height: 16px;float:left;">
                <div class="texto2 fz8 lh14">
                    {{$titulars?->nume_doc}}
                </div>
            </div>
            @endforeach
            @else
            <div style="width: 290px;height: 16px;float:left;">
                <div class="texto fz6 lh14">

                </div>
            </div>
            <div style="width: 124.9px;height: 16px;float:left;">
                <div class="texto fz6 lh14">

                </div>
            </div>
            @endif
        </div>

        <div style="width: 417px;margin-top:5px;height:10px;float:left;" class=" bn ">
            <div style="width: 417px;float:left;" class=" ">
                <div style="width: 230px;float:left;" class=" bgfdc">
                    <div class="texto fz10 lh14">
                        DATOS TÉCNICOS DEL INMUEBLE
                    </div>
                </div>
                <div style="width: 93px;float:left;" class="bgfdc ">
                    <div class="texto fz10 lh14">
                        DECLARADA
                    </div>
                </div>
                <div style="width: 89.9px;float:left;" class="bgfdc ">
                    <div class="texto fz10 lh14">
                        VERIFICADA
                    </div>
                </div>
                <!--                                       -->
                <div style="width: 230px;height: 16px;float:left;">
                    <div class="texto fz8 lh14">
                        AREA DE TERRENO DE USO PROPIO
                    </div>
                </div>

                <div style="width: 93px;height: 16px;float:left;">
                    <div class="texto fz8 lh14">
                        {{$ficha?->area_declarada}}
                    </div>
                </div>

                <div style="width: 89.9px;height: 16px;float:left;">
                    <div class="texto fz8 lh14">
                        {{$ficha?->area_verificada}}
                    </div>
                </div>
                <div style="width: 230px;height: 16px;float:left;">
                    <div class="texto fz8 lh14">
                        AREA DE TERRENO DE USO COMUN
                    </div>
                </div>

                <div style="width: 93px;height: 16px;float:left;">
                    <div class="texto fz8 lh14">
                        {{$ficha?->porc_bc_terr_legal}}
                    </div>
                </div>

                <div style="width: 89.9px;height: 16px;float:left;">
                    <div class="texto fz8 lh14">
                        {{$ficha?->porc_bc_terr_fisc}}
                    </div>
                </div>
                <div style="width: 230px;height: 16px;float:left;">
                    <div class="texto fz8 lh14">
                        AREA TOTAL DEL TERRENO
                    </div>
                </div>

                <div style="width: 93px;height: 16px;float:left;">
                    <div class="texto fz8 lh14">
                        {{$ficha?->area_declarada + $ficha?->porc_bc_terr_legal}}
                    </div>
                </div>

                <div style="width: 89.9px;height: 16px;float:left;">
                    <div class="texto fz8 lh14">
                        {{$ficha?->area_verificada + $ficha?->porc_bc_terr_fisc}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div style="width: 288px;float:right;" class="bn">
        <b>VISTA FOTOGRAFICA:</b>

        <div style="width: 288px;height:170px;float:left;" class="bn">
            <img src="{{asset('storage/img/imageneslotes/'.$ficha?->lote?->manzana?->sectore?->codi_sector.''.$ficha?->lote?->manzana?->codi_mzna.''.$ficha?->lote?->codi_lote.'.jpg')}}" alt="" style="width: 288px;height:170px;  object-fit: contain;image-orientation: from-image;display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; align-items: center;">

        </div>
    </div>

    <div style="width: 716px;height:20px; margin-top:5px; float:left;" class="bn ">
        <div class="texto fz8 lh14">
            La gerencia de Desarrollo Urbano; através de la Sub Gerencia de Planeamiento, Fiscalización Urbana y Catastro de la MUNICIPALIDAD DISTRITAL de MACHUPICCHU, en atención al Expediente N°: {{ $ficha->id }} y a la Ficha N°: {{ $ficha->id_ficha }} asigna la siguiente numeración de finca:
        </div>
    </div>





    <div style="width: 716px;height:20px;  float:left;" class="bn">
    </div>

    <div style="width: 716px;height:20px;  float:left;" class="bn ">
        <div style="width: 390px;float:left;" class="bn ">
            <div style="width: 390px;float:left;" class="bn ">
                <div style="width: 390px;height:1px;margin: auto; " class="">
                    <div class="texto fz12 lh12">
                        <b>NUMERACIÓN</b>
                    </div>
                </div>
                <div style="width: 390px;height:15px;margin: auto; " class="bn">
                </div>
                <div style="width: 180px;height:25px; margin: auto; " class="">
                    <div class="texto fz12 lh12">
                        {{ $ficha->numeracion }}
                    </div>
                </div>
            </div>
            <div style="width: 390px;height:15px;margin: auto; " class="bn">
            </div>
            <div style="width: 390px;height:16px;  float:left;" class="bn ">
                <div style="width: 390px;height:16px; float:left;" class=" bn ">
                    <div style="width: 200px;height: 16px;float:left;" class="bgfdc">
                        <div class="texto fz8 lh10  pl5 ti">
                            TIPO DE VIA
                        </div>
                    </div>
                    <div style="width: 187.9px;height: 16px;float:left;" class="">
                        <div class="texto fz8 lh10  pl5 ti">
                            @if($ficha?->ubicaciones!="")
                            @foreach ($ficha?->ubicaciones as $ubicacion)
                            {{ $ubicacion->vias->tipo_via }},

                            @endforeach
                            @else
                            @endif
                        </div>
                    </div>
                </div>
                <div style="width: 390px;height:16px;   float:left;" class=" bn">
                    <div style="width: 200px;height: 16px;float:left;" class="bgfdc">
                        <div class="texto fz8 lh10 pl5 ti">
                            NOMBRE DE VIA
                        </div>
                    </div>
                    <div style="width: 187.9px;height: 16px;float:left;" class="">
                        <div class="texto fz8 lh10 pl5 ti">

                            @if($ficha?->ubicaciones!="")
                            @foreach ($ficha?->ubicaciones as $ubicacion)
                            {{ $ubicacion->vias->nomb_via }},

                            @endforeach
                            @else
                            @endif
                        </div>
                    </div>
                </div>
                <div style="width: 390px;height:16px;   float:left;" class=" bn">
                    <div style="width: 200px;height: 16px;float:left;" class="bgfdc">
                        <div class="texto fz8 lh10 pl5 ti">
                            TIPO PUERTA
                        </div>
                    </div>
                    <div style="width: 187.9px;height: 16px;float:left;" class="">
                        <div class="texto fz8 lh10 pl5 ti">
                            @if($ficha?->ubicaciones!="")
                            @foreach($ficha?->ubicaciones as $puerta)
                            {{$puerta?->tipo_puerta}},
                            @endforeach
                            @else
                            @endif
                        </div>
                    </div>
                </div>

                <div style="width: 390px;height:16px;   float:left;" class=" bn">
                    <div style="width: 200px;height: 16px;float:left;" class="bgfdc">
                        <div class="texto fz8 lh10 pl5 ti">
                            CUADRA
                        </div>
                    </div>
                    <div style="width: 187.9px;height: 16px;float:left;" class="">
                        <div class="texto fz8 lh10 pl5 ti">
                            @if($ficha?->ubicaciones!="")
                            @foreach($ficha?->ubicaciones as $puerta)
                            {{$puerta?->cuadra}},
                            @endforeach
                            @else
                            @endif
                        </div>
                    </div>
                </div>
                <div style="width: 390px;height:16px;   float:left;" class=" bn">
                    <div style="width: 200px;height: 16px;float:left;" class="bgfdc">
                        <div class="texto fz8 lh10 pl5 ti">
                            DTTO/INTERIOR
                        </div>
                    </div>
                    <div style="width: 187.9px;height: 16px;float:left;" class="">
                        <div class="texto fz8 lh10 pl5 ti">
                            @if($ficha?->ubicaciones!="")
                            @foreach($ficha?->ubicaciones as $puerta)
                            {{$puerta?->interior}},
                            @endforeach
                            @else
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div style="width: 390px;height:15px;margin: auto; " class="bn">

            </div>
            <div style="width: 390px;float:left;" class="bn">
                <div style="width: 390px;height:1px;margin: auto; " class="">
                    <div class="texto fz12 lh12">
                        <b>CONDICION DEL PREDIO</b>
                    </div>
                </div>

            </div>
            <div style="width: 390px;height:15px;margin: auto; " class="bn">

            </div>

            <div style="width: 390px;height:16px;  float:left;" class="bn ">

                <div style="width: 390px;height:16px; float:left;" class=" bn">
                    <div style="width: 200px;height: 16px;float:left;" class="bgfdc">
                        <div class="texto fz8 lh10  pl5 ti">
                            CLASIFICACIÓN DEL PREDIO
                        </div>
                    </div>
                    <div style="width: 187.9px;height: 16px;float:left;" class="">
                        <div class="texto fz8 lh10  pl5 ti">
                            @foreach(\App\Models\TablaCodigo::where('id_tabla','=','CDP')->orderby('codigo','asc')->get() as $tablacodigo)
                            @if($ficha?->clasificacion == $tablacodigo->codigo)
                            {{$tablacodigo->desc_codigo}}
                            @else
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div style="width: 390px;height:16px;   float:left;" class=" bn">
                    <div style="width: 200px;height: 16px;float:left;" class="bgfdc">
                        <div class="texto fz8 lh10 pl5 ti">
                            USO DEL INMUEBLE
                        </div>
                    </div>
                    <div style="width: 187.9px;height: 16px;float:left;" class="">
                        <div class="texto fz8 lh10 pl5 ti">

                            @foreach($usos as $uso)
                            @if($ficha?->codi_uso == $uso->codi_uso)
                            {{$uso->desc_uso}}
                            @else
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div style="width: 390px;height:16px;   float:left;" class=" bn">
                    <div style="width: 200px;height: 16px;float:left;" class="bgfdc">
                        <div class="texto fz8 lh10 pl5 ti">
                            TIPO EDIFICACIÓN
                        </div>
                    </div>
                    <div style="width: 187.9px;height: 16px;float:left;" class="">
                        <div class="texto fz8 lh10 pl5 ti">


                            @foreach(\App\Models\TablaCodigo::where('id_tabla','=','TED')->orderby('codigo','asc')->get() as $tablacodigo)

                            @if($ficha?->tipo_edificacion == $tablacodigo->codigo)
                            {{$tablacodigo->desc_codigo}}
                            @else

                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div style="width: 390px;height:16px;   float:left;" class=" bn">
                    <div style="width: 200px;height: 16px;float:left;" class="bgfdc">
                        <div class="texto fz8 lh10 pl5 ti">
                            PREDIO CATASTRAL EN
                        </div>
                    </div>
                    <div style="width: 187.9px;height: 16px;float:left;" class="">
                        <div class="texto fz8 lh10 pl5 ti">
                            @foreach(\App\Models\TablaCodigo::where('id_tabla','=','PEN')->orderby('codigo','asc')->get() as $tablacodigo)
                            @if($ficha?->cont_en == $tablacodigo->codigo)
                            {{$tablacodigo->desc_codigo}}
                            @else

                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>




        <div style="width: 305px; float:right;" class="bn">
            <div style="width: 305px;height:400px;  float:right;" class="bn ">
                <b>PLANO CATASTRAL:</b>

                <div style="width: 315px;height:210px; font-size:10px; float:right;" class="">
                    <div class="bn" style="padding:5px;">
                        {{$ficha?->observaciones}}
                    </div>

                </div>
            </div>
        </div>
    </div>








</body>

</html>