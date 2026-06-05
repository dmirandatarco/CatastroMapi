<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Ficha Catastral biencomun</title>
      <style>
        body {
          background-color: #FFF;
          font-family: -apple-system, BlinkMacSystemFont,"Segoe UI", Roboto,"Helvetica Neue", Arial, sans-serif;
          font-size: 7px;
          font-weight: normal;
          margin:5px;
          color: #151b1e;
          TEXT-TRANSFORM: UPPERCASE;

        }
        div{
          border:0.5px solid;
        }
        .numeros{
          background-color:#777777;
          color:#000;
          width:15px;
          height:15px;
          border:none;
          float:left;
        }
        .numerosblanco{
          background-color:#fff;
          color:#000;
          width:15px;
          height:15px;
          border:none;
          float:left;
        }
        .textotop{
          background-color:#FFF;
          color:#000;
          width:80px;
          height:15px;
          border:none;
          float:left;
        }
        .texto{
          float:right;
          border:none;

          text-align:center;
          vertical-align:middle;
        }
        .texto2{
          float:right;

          text-align:center;
          vertical-align:middle;
        }
        .textotitulo{
          float:right;
          border:none;
          font-weight:bold;
          text-align:left;
          vertical-align:middle;
        }
        .ti{
          text-align:left;
        }
        .td{
          text-align:right;
        }
        .tc{
          text-align:center;
        }
        .pr5{
          padding-right:5px;
        }
        .pr15{
          padding-right:15px;
        }
        .pr25{
          padding-right:25px;
        }
        .pl5{
          padding-left:5px;
        }
        .pl15{
          padding-left:15px;
        }
        .pl25{
          padding-left:25px;
        }

        .fondoclaro{
          background-color:#d92828;
        }
        .fondoclarito{
          background-color:#ffff7e;
          color:#c62200;

        }
        .fz4{

          font-weight:bolder;
          font-size:4px !important;
        }
        .fz5{

          font-weight:bolder;
          font-size:5px !important;
        }
        .fz6{

          font-weight:bolder;
          font-size:6px !important;
        }
        .fz7{

          font-weight:bolder;
          font-size:7px !important;
        }
        .fz8{

          font-weight:bolder;
          font-size:8px !important;
        }
        .fz10{

          font-weight:bolder;
          font-size:10px !important;
        }
        .fz12{

          font-weight:bolder;
          font-size:12px !important;
        }
        .lh2{
          line-height:2px;
        }
        .lh4{
          line-height:4px;
        }
        .lh6{
          line-height:6px;
        }
        .lh7{
          line-height:7px;
        }
        .lh8{
          line-height:8px;
        }
        .lh10{
          line-height:10px;
        }
        .lh12{
          line-height:12px;
        }
        .lh14{
          line-height:14px;
        }
        .lh16{
          line-height:16px;
        }
        .bn{
          border:none !important;
        }
        #pagebreak1{
          page-break-after:always;
        }

        .resumen{
            page-break-after: always;
        }




      </style>
    </head>
    <body>

    @foreach($fichas as $ficha)
    <div style="width: 716px;height:16px;margin: auto;border:none;">
        <div style="width: 150;height: 16px;float:right;" class="fondoclaro tc">
            <div class="textotop">
                NÚMERO DE FICHA
            </div>
            <div class="texto fz8 lh14">
                {{$ficha?->nume_ficha}}
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
                        {{$ficha?->nume_ficha_lote}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="width: 316px;height:16px;margin: auto;border:none;" class="">
        <div class="texto fz12 lh14" style="font-weight:bold;">
            FICHA CATASTRAL URBANA BIENES COMUNES
        </div>
    </div>
    <div style="width: 716px;height:16px;margin: auto;border:none; margin-bottom:5px;background-color:#fff;">
        <div style="width: 120px;height: 120px;float:left;border:none;">
            <img src="{{$logos?->logo_institucion}}" alt="">
        </div>
        <div style="width: 473px;height: 8px;float:left;border:none;">
        <div style="width: 427PX;height:16px;margin: auto;">
                <div style="width: 211.9px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        01
                    </div>
                    <div class="texto fz8 lh14">
                        CÓDIGO ÚNICO CATASTRAL - CUC
                    </div>
                </div>
                <div style="width: 212.9px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        01
                    </div>
                    <div class="texto fz8 lh14">
                        CÓDIGO DE HOJA CATASTRAL
                    </div>
                </div>
            </div>
            <div style="width: 427px;height:16px;margin: auto;">
                <div style="width: 211.9;height: 16px;float:left;">
                    <div class="texto fz8 lh14">
                        {{$ficha?->unicat?->cuc}}
                    </div>
                </div>
                <div style="width: 212.9;height: 16px;float:left;">
                    <div class="texto fz8 lh14">
                    {{$ficha?->unicat?->codi_hoja_catastral}}
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
                    {{$ficha?->unicat?->edificacion?->lote?->manzana?->sectore?->codi_sector}}
                </div>
                <div style="width: 53px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{$ficha?->unicat?->edificacion?->lote?->manzana?->codi_mzna}}
                </div>
                <div style="width: 51px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{$ficha?->unicat?->edificacion?->lote?->codi_lote}}
                </div>
                <div style="width: 35px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{$ficha?->unicat?->edificacion?->codi_edificacion}}
                </div>
                <div style="width: 34px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{$ficha?->unicat?->codi_entrada}}
                </div>
                <div style="width: 35px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{$ficha?->unicat?->codi_piso}}
                </div>
                <div style="width: 52px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{$ficha?->unicat?->codi_unidad}}
                </div>
                <div style="width: 17.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{$ficha?->dc}}
                </div>
            </div>
        </div>
        <div style="width: 120px;height: 120px;float:left;border:none;vertical-align:middle">
            <img src="{{$logos?->logo_institucion}}" alt="Logo">

        </div>
    </div>
    <!-- fila 07-->
    <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:0px;margin-bottom:0px;">
        <div class="textotitulo ti pl15">
            UBICACIÓN DEL BIEN COMUN
        </div>
    </div>
    <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 123px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                07
            </div>
            <div class="texto fz8 lh14">
                CÓDIGO DE VIA
            </div>

        </div>
        <div style="width: 71px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                08
            </div>
            <div class="texto fz8 lh14">
                TIPO DE VIA
            </div>
        </div>
        <div style="width: 272.9px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                09
            </div>
            <div class="texto fz8 lh14">
                NOMBRE DE VIA
            </div>
        </div>
        <div style="width: 74px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                10
            </div>
            <div class="texto fz6 lh14">
                TIPO DE PUERTA
            </div>
        </div>
        <div style="width: 76px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                11
            </div>
            <div class="texto fz6 lh14">
                N° MUNICIPAL
            </div>
        </div>
        <div style="width: 46px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                12
            </div>
            <div class="texto fz5 lh6">
                COND.<BR>
                NUMER
            </div>
        </div>
        <div style="width: 46px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                13
            </div>
            <div class="texto fz5 lh6">
                NUM. CERT.
            </div>
        </div>
    </div>
    <!-- INTERIOR 05 AL 10-->
    @foreach($ficha?->puertas as $puerta)
    <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 123px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$puerta?->via?->codi_via}}
        </div>
        <div style="width: 71px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$puerta?->via?->tipo_via}}
        </div>
        <div style="width: 272.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$puerta?->via?->nomb_via}}
        </div>
        <div style="width: 74px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$puerta?->tipo_puerta}}
        </div>
        <div style="width: 76px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$puerta?->nume_muni}}
        </div>
        <div style="width: 46px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$puerta?->cond_nume}}
        </div>
        <div style="width: 46px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$puerta?->nume_certificacion}}
        </div>
    </div>
    <!-- INTERIOR 05 AL 10-->
    @endforeach
    <!-- 14 AL 17-->
    <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 136PX;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                14
            </div>
            <div class="texto fz8 lh14">
                NOMBRE DE EDIFICACION
            </div>
        </div>
        <div style="width: 400px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->unicat?->edificacion?->nomb_edificacion}}
        </div>
        <div style="width: 109px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                15
            </div>
            <div class="texto fz8 lh14">
                TIPO DE EDIFICACION
            </div>
        </div>
        <div style="width: 67PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->unicat?->edificacion?->tipo_edificacion}}
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
                18
            </div>
            <div class="texto fz8 lh14">
                CÓDIGO HU
            </div>
        </div>
        <div style="width: 222px;height: 16px;float:left;" class="fondoclaro">
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
        <div style="width: 80px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                22
            </div>
            <div class="texto fz8 lh14">
                LOTE
            </div>
        </div>
        <div style="width: 74px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                23
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
            {{$ficha?->unicat?->edificacion?->lote?->hab_urbana?->codi_hab_urba}}
        </div>
        <div style="width: 222px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->unicat?->edificacion?->lote?->hab_urbana?->nomb_hab_urba}}
        </div>
        <div style="width: 130px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->unicat?->edificacion?->lote?->zona_dist}}
        </div>
        <div style="width: 93px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->unicat?->edificacion?->lote?->mzna_dist}}
        </div>
        <div style="width: 80px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->unicat?->edificacion?->lote?->lote_dist}}
        </div>
        <div style="width: 74px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->unicat?->edificacion?->lote?->sub_lote_dist}}
        </div>
    </div>



    <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
        <div class="textotitulo ti pl15">
            DESCRIPCIÓN DEL BIEN COMUN
        </div>
    </div>
    <!-- DESCRIPCION DEL BIEN COMUN-->
    <!-- 40 -->
    <div style="width: 716px;height:16px;margin: auto;">

        <div style="width: 128px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                54
            </div>
            <div class="texto fz8 lh14">
                CLASIFICACION DEL PREDIO
            </div>
        </div>
        <div style="width: 19px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->fichabiencomun?->clasificacion}}
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
                55
            </div>
            <div class="texto fz8 lh8">
                PREDIO CATASTRAL EN
            </div>
            <div style="background-color:#FFFFFF;color:#000000;width:17px;height:15px;border:none;float:right;" class="texto2 fz8 lh14">
                {{$ficha?->fichabiencomun?->cont_en}}
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
                56
            </div>
            <div class="texto fz8 lh14">
                CÓDIGO DE USO
            </div>
        </div>
        <div style="width: 348.9PX;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                57
            </div>
            <div class="texto fz8 lh14">
                USO DEL PREDIO CATASTRAL (Descripción)
            </div>
        </div>
        <div style="width: 130px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                58
            </div>
            <div class="texto fz8 lh14">
                ESTRUCTURACION
            </div>
        </div>
        <div style="width: 130px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                59
            </div>
            <div class="texto fz8 lh14">
                ZONIFICACION
            </div>
        </div>
    </div>
    <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 103px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->fichabiencomun?->uso?->codi_uso}}
        </div>
        <div style="width: 348.9PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->fichabiencomun?->uso?->desc_uso}}
        </div>
        <div style="width: 130px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->unicat?->edificacion?->lote?->estructuracion}}
        </div>
        <div style="width: 130px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->unicat?->edificacion?->lote?->zonificacion}}
        </div>
    </div>

    <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 357px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                60
            </div>
            <div class="texto fz8 lh14">
                ÁREA DE TERRENO ADQUIRIDA(M2)
            </div>
        </div>
        <div style="width: 357px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                62
            </div>
            <div class="texto fz8 lh14">
                ÁREA DE TERRENO VERIFICADA(M2)
            </div>
        </div>
    </div>
    <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 357px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->fichabiencomun?->area_declarada}}
        </div>
        <div style="width: 357px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->fichabiencomun?->area_verificada}}
        </div>
    </div>
    <!-- 47 AL 48-->
    <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 142PX;height: 16px;float:left;">
            LINDEROS DE LOTE(ML)
        </div>
        <div style="width: 142PX;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                63
            </div>
            <div class="texto fz8 lh14">
                MEDIDA EN CAMPO
            </div>
        </div>
        <div style="width: 142PX;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                64
            </div>
            <div class="texto fz8 lh14">
                MEDIDA SEGUN TITULO
            </div>
        </div>
        <div style="width: 142PX;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                65
            </div>
            <div class="texto fz8 lh14">
                COLINDANCIAS DE CAMPO
            </div>
        </div>
        <div style="width: 142.9PX;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                66
            </div>
            <div class="texto fz8 lh14">
                CONLINDANCIAS SEGUN TITULO
            </div>
        </div>
    </div>
    <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 142PX;height: 16px;float:left;">
            FRENTE
        </div>
        <div style="width: 142PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->lindero?->fren_campo}}
        </div>
        <div style="width: 142PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->lindero?->fren_titulo}}
        </div>
        <div style="width: 142PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->lindero?->fren_colinda_campo}}
        </div>
        <div style="width: 142.9PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->lindero?->fren_colinda_titulo}}
        </div>
    </div>
    <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 142PX;height: 16px;float:left;">
            DERECHA
        </div>

        <div style="width: 142PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->lindero?->dere_campo}}
        </div>
        <div style="width: 142PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->lindero?->dere_titulo}}
        </div>
        <div style="width: 142PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->lindero?->dere_colinda_campo}}
        </div>
        <div style="width: 142.9PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->lindero?->dere_colinda_titulo}}
        </div>
    </div>
    <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 142PX;height: 16px;float:left;">
            IZQUIERDA
        </div>
        <div style="width: 142PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->lindero?->izqu_campo}}
        </div>
        <div style="width: 142PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->lindero?->izqu_titulo}}
        </div>
        <div style="width: 142PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->lindero?->izqu_colinda_campo}}
        </div>
        <div style="width: 142.9PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->lindero?->izqu_colinda_titulo}}
        </div>
    </div>
    <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 142PX;height: 16px;float:left;">
            FONDO
        </div>
        <div style="width: 142PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->lindero?->fond_campo}}
        </div>
        <div style="width: 142PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->lindero?->fond_titulo}}
        </div>
        <div style="width: 142PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->lindero?->fond_colinda_campo}}
        </div>
        <div style="width: 142.9PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->lindero?->fond_colinda_titulo}}
        </div>
    </div>
    <!-- SERVICIOS QUE CUENTA EL PREDIO-->


    <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:10px;margin-bottom:10px">
        <div class="textotitulo ti pl15">
            SERVICIOS BASICOS COMUNES
        </div>
    </div>

    <!-- 49 AL 55-->
    <div style="width: 716px;height:16px;margin: auto;">

        <div style="width: 73px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                67
            </div>
            <div class="texto fz8 lh14">
                LUZ
            </div>
        </div>
        <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->serviciobasico?->luz}}
        </div>
        <div style="width: 73px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                68
            </div>
            <div class="texto fz8 lh14">
                AGUA
            </div>
        </div>
        <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->serviciobasico?->agua}}
        </div>
        <div style="width: 74px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                69
            </div>
            <div class="texto fz8 lh14">
                TELÉFONO
            </div>
        </div>
        <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->serviciobasico?->telefono}}
        </div>
        <div style="width: 74px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                70
            </div>
            <div class="texto fz8 lh14">
                DESAGÜE
            </div>
        </div>
        <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->serviciobasico?->desague}}
        </div>
        <div style="width: 62px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                71
            </div>
            <div class="texto fz8 lh14">
                GAS
            </div>
        </div>
        <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->serviciobasico?->gas}}
        </div>
        <div style="width: 74px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                72
            </div>
            <div class="texto fz8 lh14">
                INTERNET
            </div>
        </div>
        <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->serviciobasico?->internet}}
        </div>
        <div style="width: 115px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
                73
            </div>
            <div class="texto" style="font-size:5px;">
                CONEXIÓN A TV POR CABLE<BR>O CABLE SATELITAL
            </div>
        </div>
        <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->serviciobasico?->tvcable}}
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

    <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
        <div class="textotitulo ti pl15">
            CONSTRUCCIONES COMUNES (Llenar una fila por cada piso, sotano, o mezzanine)
        </div>
    </div>

    <!--CONSTRUCCIONES-->

    <div style="width: 716px;height:48px;margin: auto;" class="fondoclaro">

        <div style="width: 60px;height: 48px;float:left;">
            <div class="numeros">
                74
            </div>
            <div class="texto fz8 lh14">
                N° PISO<BR>
                SÓTANO<BR>
                MEZZANINE
            </div>
        </div>
        <div style="width: 80px;height: 48px;float:left;border:none;">
            <div style="width: 80px;height: 32px;float:left;">
                <div class="numeros">
                    75
                </div>
                <div class="texto fz8 lh14">
                    FECHA DE CONSTRUCCION
                </div>
            </div>
            <div style="width: 80px;height: 16px;float:left;border:none;">
                <div style="width: 39.5px;height: 16px;float:left;border-left:none;">
                    MES
                </div>
                <div style="width: 38.9px;height: 16px;float:left;">
                    AÑO
                </div>
            </div>
        </div>
        <div style="width: 36px;height: 48px;float:left;">
            <div class="numeros">
                76
            </div>
            <div class="texto fz8 lh14">
                MEP
            </div>
        </div>
        <div style="width: 36px;height: 48px;float:left;">
            <div class="numeros">
                77
            </div>
            <div class="texto fz8 lh14">
                ECS
            </div>
        </div>
        <div style="width: 36px;height: 48px;float:left;">
            <div class="numeros">
                78
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
                                    79
                                </div>
                                <div class="texto" style="font-size:4px;">
                                    MUROS Y <BR>COLUMNAS
                                </div>
                            </div>
                            <div style="width: 43.9px;height: 16px;float:left;">
                                <div class="numeros">
                                    80
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
                                    81
                                </div>
                                <div class="texto" style="font-size:4px;">
                                    PISOS
                                </div>
                            </div>
                            <div style="width: 49px;height: 16px;float:left;">
                                <div class="numeros">
                                    82
                                </div>
                                <div class="texto" style="font-size:4px;">
                                    PUERTAS Y <BR>VENTANAS
                                </div>
                            </div>
                            <div style="width: 49px;height: 16px;float:left;">
                                <div class="numeros">
                                    83
                                </div>
                                <div class="texto" style="font-size:4px;">
                                    REVEST.
                                </div>

                            </div>
                            <div style="width: 48.9px;height: 16px;float:left;">
                                <div class="numeros">
                                    84
                                </div>
                                <div class="texto" style="font-size:4px;">
                                    BAÑOS
                                </div>
                            </div>
                        </div>

                    </div>
                    <div style="width: 48.9px;height: 32px;float:left;">
                        <div class="numeros">
                            85
                        </div>
                        <div class="texto" style="font-size:4px;">
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
                <div style="width: 40.9PX;height: 32px;float:left;">
                    <div class="numeros">
                        86
                    </div>
                    <div class="textobloque fz6 lh14">
                        ÁREA DECLARADA
                    </div>
                </div>
                <div style="width: 40PX;height: 32px;float:left;">
                    <div class="numeros">
                        87
                    </div>
                    <div class="textobloque fz6 lh14">
                        ÁREA VERIFICADA
                    </div>
                </div>
            </div>
        </div>
        <div style="width: 39px;height: 48px;float:left;">
            <div class="numeros">
                88
            </div>
            <div class="texto fz8 lh14">
                UCA
            </div>
        </div>
    </div>


    <!--FOREACH CONSTRUCCIONES -->
    @foreach($ficha?->construccions as $construccion)
    <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 60px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->nume_piso}}
        </div>
        <div style="width: 39px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{date("m", strtotime($construccion?->fecha))}}
        </div>
        <div style="width: 39px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{date("Y", strtotime($construccion?->fecha))}}
        </div>
        <div style="width: 36px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->mep}}
        </div>
        <div style="width: 36px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->ecs}}
        </div>
        <div style="width: 36px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->ecc}}
        </div>
        <div style="width: 44px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->estr_muro_col}}
        </div>
        <div style="width: 44px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->estr_techo}}
        </div>
        <div style="width: 49px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->acab_piso}}
        </div>
        <div style="width: 49px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->acab_puerta_ven}}
        </div>
        <div style="width: 49px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->acab_revest}}
        </div>
        <div style="width: 49px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->acab_bano}}
        </div>

        <div style="width: 50px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->inst_elect_sanita}}
        </div>
        <div style="width: 41px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->area_declarada}}
        </div>
        <div style="width: 40px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->area_verificada}}
        </div>
        <div style="width: 39px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->uca}}
        </div>
    </div>
    @endforeach
    <!-- 70 -->
    <div style="width: 716px;height:48px;margin: auto;">

        <div style="width: 716px;height: 48px;float:left;">
            <div style="width: 716px;height: 11px;float:left;border:none;">
                <div style="width: 147px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        MEP: MATERIAL ESTRUC. PREDOMINANTE
                    </div>
                </div>
                <div style="width: 147px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        ECS: ESTADO DE CONSERVACION
                    </div>
                </div>
                <div style="width: 147px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        ECC:ESTADO DE LA CONSTRUCCION
                    </div>
                </div>
                <div style="width: 268.9px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        UCA: UBICACION DE CONSTRUCCION ANTIRREGLAMENTARIA
                    </div>
                </div>
            </div>
            <div style="width: 716px;height: 9px;float:left;border:none;" class="fondoclarito">
                <div style="width: 143px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        01 CONCRETO
                    </div>
                </div>
                <div style="width: 143px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        01 MUY BUENO
                    </div>
                </div>
                <div style="width: 143px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        01 TERMINADO
                    </div>
                </div>
                <div style="width: 143px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        01 EN RETIRO MUNICIPAL
                    </div>
                </div>
                <div style="width: 138px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        05 ALTURA NO REGLAMENTARIA
                    </div>
                </div>
            </div>
            <div style="width: 716px;height: 9px;float:left;border:none;" class="fondoclarito">
                <div style="width: 143px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        02 LADRILLO
                    </div>
                </div>
                <div style="width: 143px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        02 BUENO
                    </div>
                </div>
                <div style="width: 143px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        02 EN CONSTRUCCION
                    </div>
                </div>
                <div style="width: 143px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        02 EN JARDÍN DE AISLAMIENTO
                    </div>
                </div>
                <div style="width: 138px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        06 EN PARQUE
                    </div>
                </div>
            </div>
            <div style="width: 716px;height: 9px;float:left;border:none;" class="fondoclarito">
                <div style="width: 143px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        03 ADOBE (QUINCHA MADERA)
                    </div>
                </div>
                <div style="width: 143px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        03 REGULAR
                    </div>
                </div>
                <div style="width: 143px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        03 INCONCLUSA
                    </div>
                </div>
                <div style="width: 143px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        03 EN VIA PUBLICA
                    </div>
                </div>
                <div style="width: 138px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        07 EN BIEN COMUN
                    </div>
                </div>
            </div>
            <div style="width: 716px;height: 9px;float:left;border:none;" class="fondoclarito">
                <div style="width: 143px;height: 11px;float:left;">

                </div>
                <div style="width: 143px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        04 MALO
                    </div>
                </div>
                <div style="width: 143px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        04 EN RUINAS
                    </div>
                </div>
                <div style="width: 143px;height: 11px;float:left;">
                    <div class="texto fz6 lh8">
                        04 EN LOTE COLINDANTE
                    </div>
                </div>
                <div style="width: 138px;height: 11px;float:left;">

                </div>
            </div>
        </div>


    </div>


    <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
        <div class="textotitulo ti pl15">
            OBRAS COMPLEMENTARIAS / OTRAS INSTALACIONES
        </div>
    </div>

    <!-- 71 - 69 -->
    <div style="width: 716px;height:32px;margin: auto;" class="fondoclaro">
        <div style="width: 64px;height: 32px;float:left;">
            <div class="numeros">
                90
            </div>
            <div class="texto fz8 lh14">
                CÓDIGO
            </div>
        </div>
        <div style="width: 307px;height: 32px;float:left;">
            <div class="numeros">
                91
            </div>
            <div class="texto fz8 lh14">
                DESCRIPCION
            </div>
        </div>

        <div style="width: 83px;height: 32px;float:left;border:none;">
            <div style="width: 83px;height: 16px;float:left;">
                <div class="numeros">
                    75
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
                76
            </div>
            <div class="texto fz8 lh14">
                MEP
            </div>
        </div>
        <div style="width: 32px;height: 32px;float:left;">
            <div class="numeros">
                77
            </div>
            <div class="texto fz8 lh14">
                ECS
            </div>
        </div>
        <div style="width: 32px;height: 32px;float:left;">
            <div class="numeros">
                78
            </div>
            <div class="texto fz8 lh14">
                ECC
            </div>
        </div>
        <div style="width: 62px;height: 32px;float:left;">
            <div class="numeros">
                95
            </div>
            <div class="texto fz8 lh14">
                PRODUCTO <BR>TOTAL
            </div>
        </div>
        <div style="width: 62px;height: 32px;float:left;">
            <div class="numeros">
                96
            </div>
            <div class="texto fz8 lh14">
                UNIDAD DE MEDIDA
            </div>
        </div>
        <div style="width: 33.9px;height: 32px;float:left;">
            <div class="numeros">
                88
            </div>
            <div class="texto fz8 lh14">
                UCA
            </div>
        </div>
    </div>
    <!--FOREACH 71 - 69-->
    @foreach($ficha?->instalacions as $instalacion)
    <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 64px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$instalacion?->codiinstalacion?->codi_instalacion}}
        </div>
        <div style="width: 307px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$instalacion?->codiinstalacion?->desc_instalacion}}
        </div>
        <div style="width: 40px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{date("m", strtotime($instalacion?->fecha))}}
        </div>
        <div style="width: 41px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{date("Y", strtotime($instalacion?->fecha))}}
        </div>
        <div style="width: 32px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$instalacion?->mep}}
        </div>
        <div style="width: 32px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$instalacion?->ecs}}
        </div>
        <div style="width: 32px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$instalacion?->ecc}}
        </div>
        <div style="width: 62px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$instalacion?->prod_total}}
        </div>
        <div style="width: 62px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$instalacion?->uni_med}}
        </div>
        <div style="width: 33.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$instalacion?->uca}}
        </div>
    </div>
    @endforeach
    <div id="pagebreak1"></div>

    <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
        <div class="textotitulo ti pl15">
            RECAPITULACIÓN DE EDIFICIOS
        </div>
    </div>

    <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 466PX;height: 16px;float:left;" class="bn">
            <div style="width: 75PX;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    128
                </div>
                <div class="texto fz8 lh14">
                    EDIFICIO
                </div>

            </div>
            <div style="width: 94px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    129
                </div>
                <div class="texto fz8 lh14">
                    PORCENTAJE (%)
                </div>
            </div>
            <div style="width: 94PX;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    130
                </div>
                <div class="texto fz8 lh14">
                    ATC (M2)
                </div>
            </div>
            <div style="width: 94PX;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    131
                </div>
                <div class="texto fz8 lh14">
                    ACC (M2)
                </div>
            </div>
            <div style="width: 103.9PX;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    132
                </div>
                <div class="texto fz8 lh14">
                    AOIC (M2)
                </div>
            </div>
            @php $total1=0 @endphp
            @php $total2=0 @endphp
            @php $total3=0 @endphp
            @php $total4=0 @endphp
            @foreach($ficha?->recapedificio as $edificio)
            <div style="width: 75PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{$edificio?->id_recap}}
            </div>
            <div style="width: 94px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{number_format($edificio?->total_porcentaje,2)}}
                @php $total1=$total1+$edificio?->total_porcentaje @endphp
            </div>
            <div style="width: 94PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{number_format($edificio?->total_atc,2)}}
                @php $total2=$total2+$edificio?->total_atc @endphp
            </div>
            <div style="width: 94PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{number_format($edificio?->total_acc,2)}}
                @php $total3=$total3+$edificio?->total_acc @endphp
            </div>
            <div style="width: 103.9PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{number_format($edificio?->total_aoic,2)}}
                @php $total4=$total4+$edificio?->total_aoic @endphp
            </div>
            @endforeach
            <div style="width: 75PX;height: 16px;float:left;">
                <div class="texto fz8 lh8 ti" class="texto2 fz8 lh14">
                    TOTAL
                </div>
            </div>
            <div style="width: 94px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{number_format($total1,2)}}
            </div>
            <div style="width: 94PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{number_format($total2,2)}}
            </div>
            <div style="width: 94PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{number_format($total3,2)}}
            </div>
            <div style="width: 103.9PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{number_format($total4,2)}}
            </div>

        </div>

        <div style="width: 249.9px;height: 32px;float:left;" class="bn">
            <div style="width: 249px;height: 32px;float:left;" class="fondoclarito bn">
                <div style="width: 249PXpx;height: 10px;float:left;" class="fondoclaro bn">
                    <div class="texto fz8 lh8 ti">
                        ATC ÁREA DE TERRENO COMUN
                    </div>
                </div>
                <div style="width: 249PXpx;height: 11px;float:left;" class="fondoclaro bn">
                    <div class="texto fz8 lh8 ti">
                        ACC ÁREA CONSTRUIDA COMÚN
                    </div>
                </div>
                <div style="width: 249PXpx;height: 11px;float:left;" class="fondoclaro bn">
                    <div class="texto fz8 lh8 ti">
                        AOIC ÁREA DE OTRAS INSTALACIONES COMUNES
                    </div>
                </div>
            </div>
            <div style="width: 250px;height: 16px;float:left;" class="bn">
                <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>
                <div style="width: 230.9px;height: 16px;float:left;" class="fondoclaro">
                    <div class="numeros">
                        113
                    </div>
                    <div class="texto fz6 lh14">
                        ÁREA DE TERRENO INVADIDA EN M2
                    </div>
                </div>
            </div>
            <div style="width: 250px;height: 16px;float:left;" class="bn">
                <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>
                <div style="width: 140;height: 16px;float:left;" class="fondoclaro">

                    <div class="texto fz6 lh14">
                        LOTE COLINDANTE
                    </div>
                </div>
                <div style="width: 89.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{$ficha?->fichabiencomun?->en_colindante}}
                </div>
            </div>
            <div style="width: 250px;height: 16px;float:left;" class="bn">
                <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>
                <div style="width: 140;height: 16px;float:left;" class="fondoclaro">

                    <div class="texto fz6 lh14">
                        JARDIN AISLAMIENTO
                    </div>
                </div>
                <div style="width: 89.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{$ficha?->fichabiencomun?->en_jardin_aislamiento}}
                </div>
            </div>
            <div style="width: 250px;height: 16px;float:left;" class="bn">
                <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>
                <div style="width: 140;height: 16px;float:left;" class="fondoclaro">

                    <div class="texto fz6 lh14">
                        ÁREA PÚBLICA
                    </div>
                </div>
                <div style="width: 89.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{$ficha?->fichabiencomun?->en_area_publica}}
                </div>
            </div>
            <div style="width: 250px;height: 16px;float:left;" class="bn">
                <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">

                </div>
                <div style="width: 140;height: 16px;float:left;" class="fondoclaro">

                    <div class="texto fz6 lh14">
                        ÁREA INTANGIBLE
                    </div>
                </div>
                <div style="width: 89.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
                    {{$ficha?->fichabiencomun?->en_area_intangible}}
                </div>
            </div>
        </div>
    </div>
    <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
        <div class="textotitulo ti pl15">
            RECAPITULACION DE BIENES COMUNES
        </div>
    </div>
    <!--16PX-->
    <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 450PX;height: 16px;float:left;" class="bn">
            <div style="width: 41px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    133
                </div>
                <div class="texto fz8 lh14">
                    N°
                </div>
            </div>

            <div style="width: 41px;height: 16px;float:left;" class="fondoclaro">

                <div class="texto fz6 lh14">
                    EDIFICACION
                </div>
            </div>

            <div style="width: 41px;height: 16px;float:left;" class="fondoclaro">

                <div class="texto fz8 lh14">
                    ENTRADA
                </div>
            </div>
            <div style="width: 41px;height: 16px;float:left;" class="fondoclaro">
                <div class="texto fz8 lh14">
                    PISO
                </div>
            </div>
            <div style="width: 41px;height: 16px;float:left;" class="fondoclaro">
                <div class="texto fz8 lh14">
                    UNIDAD
                </div>
            </div>

            <div style="width: 59px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    89
                </div>
                <div class="texto fz8 lh14">
                    %
                </div>
            </div>
            <div style="width: 59px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    134
                </div>
                <div class="texto fz8 lh14">
                    ATC
                </div>
            </div>
            <div style="width: 59px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    131
                </div>
                <div class="texto fz8 lh14">
                    ACC
                </div>
            </div>
            <div style="width: 58.9px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    132
                </div>
                <div class="texto fz8 lh14">
                    AOIC
                </div>
            </div>
            @php $totales1=0 @endphp
            @php $totales2=0 @endphp
            @php $totales3=0 @endphp
            @php $totales4=0 @endphp

            @foreach($ficha?->recapbbcc as $bbcc)
            <!--ESPACIOS BLANCOS -->
            <div style="width: 41px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{$bbcc?->nume_registro}}
            </div>
            <div style="width: 41px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{$bbcc?->edifica}}
            </div>
            <div style="width: 41px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{$bbcc?->entrada}}
            </div>
            <div style="width: 41px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{$bbcc?->nume_piso}}
            </div>
            <div style="width: 41px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{$bbcc?->unidad}}
            </div>
            <div style="width: 59px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{number_format($bbcc?->porcentaje,2)}}
                @php $totales1=$totales1+$bbcc?->porcentaje @endphp
            </div>
            <div style="width: 59px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{number_format($bbcc?->atc,2)}}
                @php $totales2=$totales2+$bbcc?->atc @endphp
            </div>
            <div style="width: 59px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{number_format($bbcc?->acc,2)}}
                @php $totales3=$totales3+$bbcc?->acc @endphp
            </div>
            <div style="width: 58.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{number_format($bbcc?->aoic,2)}}
                @php $totales4=$totales4+$bbcc?->aoic @endphp
            </div>
            <!--ESPACIOS BLANCOS -->
            @endforeach
            <div style="width: 209px;height: 16px;float:left;" class="texto2 fz8 lh14">
                TOTAL
            </div>
            <div style="width: 59px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{number_format($totales1,2)}}
            </div>
            <div style="width: 59px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{number_format($totales2,2)}}
            </div>
            <div style="width: 59px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{number_format($totales3,2)}}
            </div>
            <div style="width: 58.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{number_format($totales4,2)}}
            </div>


        </div>
        <div style="width: 15px;height: 32px;float:left;" class="bn">
        </div>





        <div style="width: 251px;height: 32px;float:left;;" class="bn">
            <div style="width: 251px;height: 64px;float:left;" class="fondoclarito bn">

                <div style="width: 251PXpx;height: 13px;float:left;" class="fondoclaro bn">
                    <div class="texto fz8 lh8 ti">
                        N° ORDEN DE UNIDADES
                    </div>
                </div>
                <div style="width: 251PXpx;height: 13px;float:left;" class="fondoclaro bn">
                    <div class="texto fz8 lh8 ti">
                        % PORCENTAJE DE BIEN COMUN
                    </div>
                </div>
                <div style="width: 251PXpx;height: 13px;float:left;" class="fondoclaro bn">
                    <div class="texto fz8 lh8 ti">
                        ATC ÁREA DE TERRENO COMUN A LA UNIDAD
                    </div>
                </div>
                <div style="width: 251PXpx;height: 13px;float:left;" class="fondoclaro bn">
                    <div class="texto fz8 lh8 ti">
                        ACC ÁREA CONSTRUIDA COMÚN
                    </div>
                </div>
                <div style="width: 251PXpx;height: 13px;float:left;" class="fondoclaro bn">
                    <div class="texto fz8 lh8 ti">
                        AOIC ÁREA DE OTRAS INSALACIONES COMUNES
                    </div>
                </div>
            </div>
            <div style="width: 231.9px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    119
                </div>
                <div class="texto fz8 lh14">
                    MANTENIMIENTO
                </div>
            </div>
            <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{$ficha?->fichabiencomun?->mantenimiento}}
            </div>
            <div style="width: 250.9px;height: 16px;float:left;" class="fondoclarito">

                <div class="texto fz8 lh14 ti">
                    1 = POR VARIACIÓN DE UNIDADES
                </div>
            </div>
            <div style="width: 250.9px;height: 16px;float:left;" class="fondoclarito">

                <div class="texto fz8 lh14 ti">
                    2 = POR VARIACIÓN EN LA CONSTRUCCIÓN
                </div>
            </div>
            <div style="width: 250.9px;height: 16px;float:left;" class="fondoclarito">

                <div class="texto fz8 lh14 ti">
                    3 = POR VARIACIÓN DE PORCENTAJE
                </div>
            </div>
            <div style="width: 250.9px;height: 16px;float:left;" class="fondoclarito">

                <div class="texto fz8 lh14 ti">
                    4 = POR CAMBIO DE USO
                </div>
            </div>
            <div style="height:7px; width:251PX;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
                <div class="textotitulo ti pl15">
                    DOCUMENTOS Y DATOS REGISTRALES
                </div>
            </div>
            <div style="width: 250.9px;height: 16px;float:left;" class="fondoclaro">
                <div class="texto fz8 lh14">
                    REGISTROS NOTARIAL DE LA ESCRITURA PUBLICA
                </div>
            </div>
            <div style="width: 250.9px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    101
                </div>
                <div class="texto fz8 lh14">
                    NOMBRE DE LA NOTARIA
                </div>
            </div>
            <div style="width: 250.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if($ficha?->registrolegal!="")
                {{$ficha?->registrolegal?->notaria?->nomb_notaria}}
                @endif
            </div>
            <div style="width: 120px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    102
                </div>
                <div class="texto fz8 lh14">
                    KARDEX
                </div>
            </div>
            <div style="width: 128.9px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    103
                </div>
                <div class="texto fz8 lh14">
                    FECHA DE ESCRITURA
                </div>
            </div>
            <div style="width: 120px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if($ficha?->registrolegal!="")
                {{$ficha?->registrolegal?->kardex}}
                @endif
            </div>
            <div style="width: 128.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if($ficha?->registrolegal!="")
                {{date("d-m-Y", strtotime($ficha?->registrolegal?->fecha_escritura))}}
                @endif
            </div>




            <div style="height:15px; width:251PX;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">

            </div>
            <div style="width: 250.9px;height: 16px;float:left;" class="fondoclaro">
                <div class="texto fz8 lh14">
                    INSCRIPCIÓN EN REGISTRO DE PREDIOS
                </div>
            </div>
            <div style="width: 120px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    104
                </div>
                <div class="texto fz7 lh6">
                    TIPO DE PARTIDA<BR>REGISTRAL
                </div>
            </div>
            <div style="width: 128.9px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    105
                </div>
                <div class="texto fz8 lh14">
                    NÚMERO
                </div>
            </div>
            <div style="width: 30px;height: 16px;float:left;" class="fondoclarito bn">
                <div style="width: 30px;height: 8px;float:left;" class="fondoclarito">
                    <div class="textotitulo fz5 lh6">
                        01 TOMO
                    </div>
                </div>
                <div style="width: 30px;height: 8px;float:left;" class="fondoclarito">
                    <div class="textotitulo fz5 lh6">
                        02 FICHA
                    </div>
                </div>
            </div>
            <div style="width: 71px;height: 16px;float:left;" class="fondoclarito bn">
                <div style="width: 71px;height: 8px;float:left;" class="fondoclarito">
                    <div class="textotitulo fz5 lh6">
                        03 PART. ELECTRÓNICA
                    </div>
                </div>
                <div style="width: 71px;height: 8px;float:left;" class="fondoclarito">
                    <div class="textotitulo fz5 lh6">
                        04 CÓDIGO DE PREDIO
                    </div>
                </div>
            </div>
            <div style="width: 19px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if($ficha?->sunarp!="")
                {{$ficha?->sunarp?->tipo_partida}}
                @endif
            </div>
            <div style="width: 128.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if($ficha?->sunarp!="")
                {{$ficha?->sunarp?->nume_partida}}
                @endif
            </div>

            <div style="width: 60PX;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    106
                </div>
                <div class="texto fz8 lh14">
                    FOJAS
                </div>
            </div>
            <div style="width: 59PX;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    107
                </div>
                <div class="texto fz8 lh14">
                    ASIENTO
                </div>
            </div>
            <div style="width: 128.9px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    108
                </div>
                <div class="texto fz7 lh6">
                    FECHA DE INSCRIPCION<BR>DEL PREDIO
                </div>
            </div>

            <div style="width: 60PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if($ficha?->sunarp!="")
                {{$ficha?->sunarp?->fojas}}
                @endif
            </div>
            <div style="width: 59PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if($ficha?->sunarp!="")
                {{$ficha?->sunarp?->asiento}}
                @endif
            </div>
            <div style="width: 128.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if($ficha?->sunarp!="")
                {{date("d-m-Y", strtotime($ficha?->sunarp?->fecha_inscripcion))}}
                @endif
            </div>

            <div style="width: 60PX;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    109
                </div>
                <div class="texto fz6 lh6">
                    DECLARATORIA<BR>FABRICA
                </div>
            </div>
            <div style="width: 59PX;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    110
                </div>
                <div class="texto fz6 lh6">
                    AS. INSC.<BR>DE FABRICA
                </div>
            </div>
            <div style="width: 128.9px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                    111
                </div>
                <div class="texto fz6 lh6">
                    FECHA DE INSCRIPCION<BR>DE FABRICA
                </div>
            </div>

            <div style="width: 60PX;height: 16px;float:left;" class="fondoclarito bn">
                <div style="width: 60PX;height: 8px;float:left;" class="fondoclarito">
                    <div class="textotitulo fz4 lh6">
                        01 = FAB. INSCRITA
                    </div>
                </div>
                <div style="width: 60PX;height: 8px;float:left;" class="fondoclarito">
                    <div class="textotitulo fz4 lh6">
                        02 = FAB. NO INSCRITA
                    </div>
                </div>
            </div>
            <div style="width: 17PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if($ficha?->sunarp!="")
                {{$ficha?->sunarp?->codi_decla_fabrica}}
                @endif
            </div>
            <div style="width: 42PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if($ficha?->sunarp!="")
                {{$ficha?->sunarp?->asie_fabrica}}
                @endif
            </div>
            <div style="width: 128.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
                @if($ficha?->sunarp!="")
                {{date("d-m-Y", strtotime($ficha?->sunarp?->fecha_fabrica))}}
                @endif
            </div>

        </div>
    </div>








    <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
        <div class="textotitulo ti pl15">
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
            {{$ficha?->fichabiencomun?->cond_declarante}}
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

    <div style="width: 716px;height:32px;margin: auto;">

        <div style="width: 215px;height: 32px;float:left;" class="fondoclaro">
            <div class="numeros">
                116
            </div>
            <div class="texto fz8 lh12">
                ESTADO DE LLENADO DE FICHA
            </div>
            <div style="background-color:#FFFFFF;color:#000000;width:17px;height:15px;border:none;float:right;" class="texto2 fz8 lh14">
                {{$ficha?->fichabiencomun?->esta_llenado}}
            </div>
        </div>
        <div style="width: 500px;height: 32px;float:left;border:none;" class="fondoclarito">
            <div style="width: 620px; height: 17px;border:none;">
                <div style="width: 249px;height: 16px;float:left;">
                    <div style="font-size:5px;border:none;text-align:center;">
                        1 = FICHA COMPLETA
                    </div>
                </div>
                <div style="width: 249px;height: 16px;float:left;">
                    <div style="font-size:5px;border:none;text-align:center;">
                        2 = FICHA INCOMPLETA
                    </div>
                </div>
                <div style="width: 249px;height: 16px;float:left;">
                    <div style="font-size:5px;border:none;text-align:center;">
                        3 = COMPLETADA EN OFICINA
                    </div>
                </div>
                <div style="width: 249px;height: 16px;float:left;">
                    <div style="font-size:5px;border:none;text-align:center;">
                        4 = COMPLETADA CONTROL EXTERIOR
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
        <div class="textotitulo ti pl15">
            OBSERVACIONES
        </div>
    </div>

    <div style="width: 716px;height:16px;margin: auto;">

        <div style="width: 716px;height: 45px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->fichabiencomun?->observaciones}}
        </div>
    </div>


    <div style="width: 716px;height:23px;margin: auto; margin-top:5px;">
        <div class="texto ti pl15" style="font-size:7PX;">
            DECLARO BAJO JURAMENTO QUE LOS DATOS CONSIGNADOS EN LA DECLARACIÓN SON VERDADEROS
            <BR>
            LA FICHA CATASTRAL CERTIFICA LA EXISTENCIA Y CARACTERISTICAS DEL PREDIO, ESTA FICHA NO GENERA DERECHOS DE PROPIEDAD, NI REGULARIZA LAS OBLIGACIONES MUNICIPALES
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

                    DNI: @if($ficha?->verificador!="")
                    {{$ficha?->verificador?->nume_doc}}
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div style="width: 716px;height:14px;margin: auto;">
        <div style="width: 178px;height: 14px;float:left;">
            <div class="texto ti pl15">
                DNI:@if($ficha?->declarante!="")
                {{$ficha?->declarante?->nume_doc}}
                @endif
            </div>

        </div>
        <div style="width: 178px;height: 14px;float:left;">
            <div class="texto ti pl15">
                DNI: @if($ficha?->supervisor!="")
                {{$ficha?->supervisor?->nume_doc}}
                @endif
            </div>
        </div>
        <div style="width: 178px;height: 14px;float:left;">
            <div class="texto ti pl15">
                DNI: @if($ficha?->tecnico!="")
                {{$ficha?->tecnico?->nume_doc}}
                @endif
            </div>
        </div>
        <div style="width: 178px;height: 14px;float:left;">
            <div class="texto ti pl15">
                N° DE REGISTRO: {{$ficha?->nume_registro}}
            </div>

        </div>
    </div>
    <div style="width: 716px;height:14px;margin: auto;">
        <div style="width: 178px;height: 14px;float:left;">
            <div class="texto ti pl15">
                NOMBRES: @if($ficha?->declarante!="")
                {{$ficha?->declarante?->nombres}}
                @endif
            </div>
        </div>
        <div style="width: 178px;height: 14px;float:left;">
            <div class="texto ti pl15">
                NOMBRES: @if($ficha?->supervisor!="")
                {{$ficha?->supervisor?->nombres}}
                @endif
            </div>
        </div>
        <div style="width: 178px;height: 14px;float:left;">
            <div class="texto ti pl15">
                NOMBRES: @if($ficha?->tecnico!="")
                {{$ficha?->tecnico?->nombres}}
                @endif
            </div>
        </div>
        <div style="width: 178px;height: 14px;float:left;">
            <div class="texto ti pl15">
                NOMBRES: @if($ficha?->verificador!="")
                {{$ficha?->verificador?->nombres}}
                @endif
            </div>
        </div>
    </div>
    <div style="width: 716px;height:28px;margin: auto;">
        <div style="width: 178px;height: 28px;float:left;">
            <div class="texto ti pl15">
                APELLIDOS:@if($ficha?->declarante!="")
                {{$ficha?->declarante?->ape_paterno}} {{$ficha?->declarante?->ape_materno}}
                @endif
            </div>
        </div>
        <div style="width: 178px;height: 28px;float:left;">
            <div class="texto ti pl15">
                APELLIDOS: @if($ficha?->supervisor!="")
                {{$ficha?->supervisor?->ape_paterno}} {{$ficha?->supervisor?->ape_materno}}
                @endif
            </div>
        </div>
        <div style="width: 178px;height: 28px;float:left;">
            <div class="texto ti pl15">
                APELLIDOS: @if($ficha?->tecnico!="")
                {{$ficha?->tecnico?->ape_paterno}} {{$ficha?->tecnico?->ape_materno}}
                @endif
            </div>
        </div>
        <div style="width: 178px;height: 28px;float:left;">
            <div class="texto ti pl15">
                APELLIDOS: @if($ficha?->verificador!="")
                {{$ficha?->verificador?->ape_paterno}} {{$ficha?->verificador?->ape_materno}}
                @endif
            </div>
        </div>
    </div>
    <div style="width: 716px;height:14px;margin: auto;">
        <div style="width: 178px;height: 14px;float:left;">
            <div class="texto ti pl15">
                FECHA: {{$ficha?->fecha_declarante}}
            </div>
        </div>
        <div style="width: 178px;height: 14px;float:left;">
            <div class="texto ti pl15">
                FECHA: {{$ficha?->fecha_supervision}}
            </div>
        </div>
        <div style="width: 178px;height: 14px;float:left;">
            <div class="texto ti pl15">
                FECHA: {{$ficha?->fecha_levantamiento}}
            </div>
        </div>
        <div style="width: 178px;height: 14px;float:left;">
            <div class="texto ti pl15">
                FECHA: {{$ficha?->fecha_verificacion}}
            </div>
        </div>
    </div>

      <div class="resumen "></div>
      @endforeach
    </body>
  </html>


