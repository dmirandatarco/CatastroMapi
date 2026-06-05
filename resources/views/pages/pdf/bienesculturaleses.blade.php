<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ficha Catastral Bienes Culturales</title>
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
          font-size:11px;
          font-weight:bold;
          text-align:left;
          vertical-align:middle;
          }
          .textotitulo2{
          float:right;
          border:none;
          font-size:15px;
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
          background-color:#9DD3AF;
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
          line-height:16px;
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
          .bp{
          background-color:#432453;
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
        <div style="width: 716px;height:16px;margin: auto;border:none;">
        </div>
        <div style="width: 716px;height:16px;margin: auto;border:none; margin-bottom:5px;background-color:#fff;">
          <div style="width: 120px;height: 120px;float:left;border:none;vertical-align:middle" >
              <img src="{{$logos?->logo_institucion}}" alt="Logo">
          </div>
          <div style="width: 473px;height: 8px;float:left;border:none;">
            <div style="width: 427px;height:16px;margin: auto;" CLASS="bn">
              <div style="width: 230PX;height: 16px;float:left;" class="fondoclaro">
                  <div class="numeros">
                    02
                  </div>
                  <div class="texto fz8 lh14">
                    CÓDIGO DE REFERENCIA CATASTRAL
                  </div>
              </div>
              <div style="width: 194.9PX;height: 16px;float:left;" class="fondoclaro">
                  <div class="numeros">
                    02
                  </div>
                  <div class="texto fz8 lh14">
                    CÓDIGO DE REFERENCIA CATASTRAL
                  </div>
              </div>
            </div>

            <div style="width: 427px;height:16px;margin: auto;" CLASS="bn">
              <div style="width: 230PX;height: 16px;float:left;" class="">
                {{$ficha?->unicat?->cuc}}
              </div>
              <div style="width: 194.9PX;height: 16px;float:left;" class="">
                {{$ficha?->unicat?->codi_hoja_catastral}}
              </div>
            </div>

            <!-- fila 01-->
            <div style="width: 426px;height:16px;margin: auto;">
              <div style="width: 426px;height: 16px;float:left;" class="fondoclaro bn">
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
            <div style="width: 427px;height:16px;margin: auto;" class="fondoclaro bn">
              <div style="width: 106px;height: 16px;float:left;border:none;" >
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
            <div style="width: 427px;height:16px;margin: auto;" class="bn">
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
          <div style="width: 120px;height: 120px;float:left;border:none;" >
              <img src="{{$logos?->logo_catastro}}" alt="">
          </div>
        </div>
        <!-- 18 AL 23-->
        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
          <div class="textotitulo2 tl pl15">
              MONUMENTO ARQUEOLÓGICO PREHISPANICO
          </div>
        </div>
        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
          <div class="textotitulo tl pl15">
              DESCRIPCIÓN DEL BIEN CULTURAL
          </div>
        </div>
        <!-- IDENTIFICACION DEL TITULAR CATASTRAL-->
        <!-- 20 AL 25-->
        <div style="width: 716px;height:10px;margin: auto;">
          <div style="width: 150px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                162
              </div>
              <div class="texto fz7 lh14">
                CATEGORÍA DEL INMUEBLE
              </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->monumento?->cat_inmueble}}
          </div>
          <div style="width: 182px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                01 PATRIMONIO MUNDIAL
              </div>
          </div>
          <div style="width: 182px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                02 ZONA ARQUEOLÓGICA MONUMENTAL
              </div>
          </div>
          <div style="width: 182px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                03 SITIO ARQUEOLÓGICO
              </div>
          </div>
          <div style="width: 170px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
              </div>
          </div>
          <div style="width: 182px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                04 ZONA DE RESERVA ARQUEOLÓGICA
              </div>
          </div>
          <div style="width: 182px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                05 ELEMENTO ARQUEOLÓGICO AISLADO
              </div>
          </div>
          <div style="width: 182px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                07 PAISAJE CULTURAL ARQUEÓLOGICO
              </div>
          </div>
        </div>
        <!-- 24 AL 25-->
        <!--AQUI SE REPETIRA LOS TITULARES CATASTRALES FOREACH-->
        <!-- 22 AL 24-->
        <div style="width: 716px;height:16px;margin: auto;">
          <div style="width: 180px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                163
              </div>
              <div class="texto fz8 lh14">
                NOMBRE DEL MONUMENTO
              </div>
          </div>
          <div style="width: 534PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->monumento?->nomb_monumento}}
          </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;">
          <div style="width: 120px;height: 16px;float:left;" class="fondoclaro">
              <div class="texto fz8 lh14">
                CÓDIGO
              </div>
          </div>
          <div style="width: 180px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->monumento?->cod_monumento}}
          </div>
          <div style="width: 50px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                26
              </div>
              <div class="texto fz8 lh14">
                AREA
              </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->monumento?->tipo_area}}
          </div>
          <div style="width: 50px;height: 16px;float:left;" class="fondoclarito">
            <div class="texto fz6 lh7">
              1 = M2
            </div>
            <div class="texto fz6 lh7">
              2 = Hs
            </div>
          </div>
          <div style="width: 90px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->monumento?->area_monu}}
          </div>
          <div style="width: 90px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              165
            </div>
            <div class="texto fz8 lh14">
              PERÍMETRO
            </div>
          </div>
          <div style="width: 94px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->monumento?->perimetro_monumento}}
          </div>
          <div style="width: 15PX;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              M
            </div>
          </div>
        </div>
        <div style="width: 716px;height:10px;margin: auto;">
          <div style="width: 150px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                166
              </div>
              <div class="texto fz7 lh14">
                FILIACIÓN CRONOLOGICA
              </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->monumento?->filiacion_cronologica}}
          </div>
          <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                01 PRE-CERAMICO
              </div>
          </div>
          <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                02 PERIODO INICIAL
              </div>
          </div>
          <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                03 HORIZONTE TEMPRANO
              </div>
          </div>
          <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                04 INTERMEDIO TEMPRANO
              </div>
          </div>
          <div style="width: 113PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                05 HORIZONTE MEDIO
              </div>
          </div>
          <div style="width: 170px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
              </div>
          </div><div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                06 INTERMEDIO TARDIO
              </div>
          </div>
          <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                07 HORIZONTE TARDIO
              </div>
          </div>
          <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                08 VARIOS PERIODOS
              </div>
          </div>
          <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                09 INDETERMINADO
              </div>
          </div>
          <div style="width: 113PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">

              </div>
          </div>
        </div>
        <!-- 29-->
        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:2px;margin-bottom:2px">
          <div class="textotitulo tl pl15">
              CONDICIONES FÍSICAS DEL MONUMENTO ARQUEOLÓGICO
          </div>
        </div>
        <!-- 30 -->
        <div style="width: 716px;height:10px;margin: auto;">
          <div style="width: 150px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                167
              </div>
              <div class="texto fz7 lh14">
                PRESENCIA DE ARQUITECTURA
              </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->monumento?->presencia_arquitectura}}
          </div>
          <div style="width: 273PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                01 SI
              </div>
          </div>
          <div style="width: 273PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                02 NO
              </div>
          </div>
        </div>
        <div style="width: 716px;height:10px;margin: auto;">
          <div style="width: 150px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                168
              </div>
              <div class="texto fz7 lh14">
                TIPO DE ARQUITECTURA
              </div>
          </div>
          <div style="width: 19PX;height: 16px;float:left;" class="fondoclarito bn">

          </div>
          <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                01 MONTÍCULO
              </div>
          </div>
          <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                02 PLATAFORMAS
              </div>
          </div>
          <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                03 PIRÁMIDE
              </div>
          </div>
          <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                04 COMPLEJO PIRAMIDAL
              </div>
          </div>
          <div style="width: 114PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                05 ESTRUCTURA AISLADA
              </div>
          </div>

          <div style="width: 54PX;height: 16px;float:left;" class="texto2 fz8 lh14 bn">
            <div style="width: 54PX;height: 48px;float:left;" class="texto2 fz8 lh14 bn">
              @foreach($ficha?->tipoarquitecturas as $arquitectura)
                {{$arquitectura?->codigo}}, &nbsp;
              @endforeach
            </div>
          </div>
          <div style="width: 662PX;height: 16px;float:left;" class="texto2 fz8 lh14 bn">
            <div style="width: 114PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                </div>
            </div>
            <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  06 ALDEA
                </div>
            </div>
            <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  07 CIUDADELA
                </div>
            </div>
            <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  08 SITIO AMURALLADO
                </div>
            </div>
            <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  09 ESTRUCTURA FUNERARIA
                </div>
            </div>
            <div style="width: 115.9PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  10 CEMENTERIO
                </div>
            </div>

            <div style="width: 115PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                </div>
            </div>
            <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  11 ÁREAS DE ACTIVIDAD
                </div>
            </div>
            <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  12 PARAVIENTO
                </div>
            </div>
            <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  13 ABRIGOS Y CUEVAS
                </div>
            </div>
            <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  14 PETROGLIFOS
                </div>
            </div>
            <div style="width: 114.9PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  15 TERRAZAS HABITACIONALES
                </div>
            </div>


            <div style="width: 115PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">

              </div>
            </div>
            <div style="width: 95PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  16 SISTEMA HIDRÁULICO
                </div>
            </div>
            <div style="width: 95PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  17 SISTEMA DE CAMINOS
                </div>
            </div>
            <div style="width: 95PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  18 SISTEMA AGRÍCOLA
                </div>
            </div>
            <div style="width: 93PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  19 GEOGLIFOS
                </div>
            </div>
            <div style="width: 93PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  20 PINTURAS RUPESTRES
                </div>
            </div>
            <div style="width: 75.9PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  21 OTROS
                </div>
            </div>
          </div>
        </div>
        <div style="width: 716px;height:10px;margin: auto;">
          <div style="width: 168px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                169
              </div>
              <div class="texto fz7 lh14">
                TIPO DE MATERIAL CONSTRUCTIVO
              </div>
          </div>
          <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                01 PIEDRA SIN TRABAJO
              </div>
          </div>
          <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                02 PIEDRA CANTEADA
              </div>
          </div>
          <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                03 PIEDRA LABRADA
              </div>
          </div>
          <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                04 ADOBE HECHO A MANO
              </div>
          </div>
          <div style="width: 115PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                05 ADOBE HECHO EN MOLDE
              </div>
          </div>
          <div style="width: 90px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @foreach($ficha?->tipomaterials as $material)
              {{$material?->codigo}}, &nbsp;
            @endforeach
          </div>
          <div style="width: 78px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
              </div>
          </div><div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                06 TAPIAL
              </div>
          </div>
          <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                07  QUINCHA
              </div>
          </div>
          <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                08 OTROS
              </div>
          </div>
          <div style="width: 108PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">

              </div>
          </div>
          <div style="width: 115PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">

              </div>
          </div>
        </div>
        <!-- 18 AL 23-->
        <!-- CARACTERISTICAS DE TITULARIDAD-->
        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
          <div class="textotitulo tl pl15">
              ESTADO DE CONSERVACIÓN
          </div>
        </div>
        <div style="width: 716px;height:10px;margin: auto;">
          <div style="width: 168px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                170
              </div>
              <div class="texto fz7 lh14">
                AFECTACIONES NATURALES
              </div>
          </div>
          <div style="width: 78PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                01 LLUVIA
              </div>
          </div>
          <div style="width: 78PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                02 VEGETACIÓN
              </div>
          </div>
          <div style="width: 78PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                03 INUNDACIONES
              </div>
          </div>
          <div style="width: 78PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                04 EROSIÓN
              </div>
          </div>
          <div style="width: 78PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                05 HUAYCOS
              </div>
          </div>
          <div style="width: 78PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                06 EÓLICO
              </div>
          </div>
          <div style="width: 79PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                07 OTROS
              </div>
          </div>
          <div style="width: 90px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @foreach($ficha?->afectacionnaturals as $natural)
              {{$natural?->codigo}}, &nbsp;
            @endforeach
          </div>
          <div style="width: 79px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">

              </div>
          </div>
          <div style="width: 182px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">

              </div>
          </div>
          <div style="width: 182px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">

              </div>
          </div>
          <div style="width: 182px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">

              </div>
          </div>
        </div>
        <div style="width: 716px;height:10px;margin: auto;">
          <div style="width: 168px;height: 32px;float:left;" class="bn">
            <div style="width: 168px;height: 16px;float:left;" class="fondoclaro">
                <div class="numeros">
                  171
                </div>
                <div class="texto fz7 lh14">
                  AFECTACIONES ANTRÓPICAS
                </div>
            </div>
            <div style="width: 90px;height: 16px;float:left;" class="texto2 fz8 lh14">
              @foreach($ficha?->afectacionantropicas as $antropica)
                {{$antropica?->codigo}}, &nbsp;
              @endforeach
            </div>
            <div style="width: 76.9px;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                </div>
            </div>
          </div>

          <div style="width: 78px;height: 32px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                01 HUAQUEO
              </div>
              <div class="texto tc fz6 lh12">
                08 OTROS
              </div>
          </div>
          <div style="width: 78px;height: 32px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                02 INVASIONES
              </div>
          </div>
          <div style="width: 78px;height: 32px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                03 GRAFITTIS
              </div>
          </div>
          <div style="width: 78px;height: 32px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                04 AGRICULTURA
              </div>
          </div>
          <div style="width: 78px;height: 32px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                05 ACTIVIDADES <BR>MINERAS
              </div>
          </div>
          <div style="width: 78px;height: 32px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                06 VIAS DE <BR> ACCESO
              </div>
          </div>
          <div style="width: 80px;height: 32px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                07 TRABAJOS<BR>PÚBLICOS
              </div>
          </div>
        </div>
        <div style="width: 716px;height:10px;margin: auto;">
          <div style="width: 167px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                172
              </div>
              <div class="texto fz7 lh14">
                INTERVENCION EN CONVERSIÓN
              </div>
          </div>
          <div style="width: 136PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                01 RESTAURADO
              </div>
          </div>
          <div style="width: 136PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                02 SEÑALIZADO
              </div>
          </div>
          <div style="width: 136PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                03 ANASTILOSIS
              </div>
          </div>
          <div style="width: 140PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                04 CONSERVACIÓN
              </div>
          </div>
          <div style="width: 90px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @foreach($ficha?->intervenciones as $intervencion)
              {{$intervencion?->codigo}}, &nbsp;
            @endforeach
          </div>
          <div style="width: 79px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
              </div>
          </div>
          <div style="width: 138PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                05 CONSOLIDACIÓN
              </div>
          </div>
          <div style="width: 136PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                06 CERCO PERIMETRICO
              </div>
          </div>
          <div style="width: 136PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                07 MUSEO DE SITIO
              </div>
          </div>
          <div style="width: 136PX;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                08 PUESTA EN VALOR
              </div>
          </div>
        </div>
        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
          <div class="textotitulo tl pl15">
              INSCRIPCIÓN DEL PREDIO CATASTRAL EN EL REGISTRO DE PREDIOS
          </div>
        </div>
        <!-- 71 - 69 -->
        <div style="width: 716px;height:16px;margin: auto;" class="fondoclaro">
          <div style="width: 250px;height: 16px;float:left;">
              <div class="numeros">
                104
              </div>
              <div class="texto fz8 lh14">
                TIPO DE PARTIDA REGISTRAL
              </div>
          </div>
          <div style="width: 120px;height: 16px;float:left;">
              <div class="numeros">
                105
              </div>
              <div class="texto fz8 lh14">
                NÚMERO
              </div>
          </div>
          <div style="width: 120px;height: 16px;float:left;">
              <div class="numeros">
                106
              </div>
              <div class="texto fz8 lh14">
                FOJAS
              </div>
          </div>
          <div style="width: 110px;height: 16px;float:left;">
              <div class="numeros">
                107
              </div>
              <div class="texto fz8 lh14">
                ASIENTO
              </div>
          </div>
          <div style="width: 111px;height: 16px;float:left;">
              <div class="numeros">
                108
              </div>
              <div class="texto fz7 lh7">
                FECHA DE INSCRIPCION <BR> DEL PREDIO
              </div>
          </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;" class="">
          <div style="width: 232px;height: 16px;float:left;" class="fondoclaro bn">
            <div style="width: 35PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  01 TOMO
                </div>
            </div>
            <div style="width: 35PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  02 FICHA
                </div>
            </div>
            <div style="width: 84PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  03 PARTIDA ELECTRONICA
                </div>
            </div>
            <div style="width: 77.9PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  04 CÓDIGO DE PREDIO
                </div>
            </div>

          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if(isset($ficha?->sunarpbiencultural[0]))
              {{$ficha?->sunarpbiencultural[0]?->tipo_partida}}
            @endif
          </div>
          <div style="width: 120px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if(isset($ficha?->sunarpbiencultural[0]))
              {{$ficha?->sunarpbiencultural[0]?->nume_partida}}
            @endif
          </div>
          <div style="width: 120px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if(isset($ficha?->sunarpbiencultural[0]))
              {{$ficha?->sunarpbiencultural[0]?->fojas}}
            @endif
          </div>
          <div style="width: 110px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if(isset($ficha?->sunarpbiencultural[0]))
              {{$ficha?->sunarpbiencultural[0]?->asiento}}
            @endif
          </div>
          <div style="width: 37px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if(isset($ficha?->sunarpbiencultural[0]))
              {{date("d", strtotime($ficha?->sunarpbiencultural[0]?->fecha_inscripcion))}}
            @endif
          </div>
          <div style="width: 36px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if(isset($ficha?->sunarpbiencultural[0]))
              {{date("m", strtotime($ficha?->sunarpbiencultural[0]?->fecha_inscripcion))}}
            @endif
          </div>
          <div style="width: 36px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if(isset($ficha?->sunarpbiencultural[0]))
              {{date("Y", strtotime($ficha?->sunarpbiencultural[0]?->fecha_inscripcion))}}
            @endif
          </div>
        </div>

        <!-- 87-->
        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
          <div class="textotitulo tl pl15">
              NORMATIVA LEGAL
          </div>
        </div>
        @if(isset($ficha?->normalegals[0]))
          @foreach($ficha?->normalegals as $normalegal)
          <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 155px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                173
              </div>
              <div class="texto fz8 lh14">
                NORMATIVIDAD N° / FECHA
              </div>
            </div>
            <div style="width: 126px;height: 16px;float:left;" class="texto2 fz8 lh14" >
              {{$normalegal?->normatividad}}
            </div>
            <div style="width: 70px;height: 16px;float:left;" class="fondoclaro">
              <div class="texto fz8 lh14">
                FECHA
              </div>
            </div>
            <div style="width: 105px;height: 16px;float:left;" class="texto2 fz8 lh14">
              {{date("d-m-Y", strtotime($normalegal?->fecha_norma))}}
            </div>

            <div style="width: 126px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                174
              </div>
              <div class="texto fz8 lh14">
                NÚMERO DE PLANO
              </div>
            </div>
            <div style="width: 126px;height: 16px;float:left;" class="texto2 fz8 lh14" >
              {{$normalegal?->numero_plano}}
            </div>
          </div>
          @endforeach
        @else
          <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 155px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                173
              </div>
              <div class="texto fz8 lh14">
                NORMATIVIDAD N° / FECHA
              </div>
            </div>
            <div style="width: 126px;height: 16px;float:left;" class="texto2 fz8 lh14" >
            </div>
            <div style="width: 70px;height: 16px;float:left;" class="fondoclaro">
              <div class="texto fz8 lh14">
                FECHA
              </div>
            </div>
            <div style="width: 105px;height: 16px;float:left;" class="texto2 fz8 lh14">
            </div>

            <div style="width: 126px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                174
              </div>
              <div class="texto fz8 lh14">
                NÚMERO DE PLANO
              </div>
            </div>
            <div style="width: 126px;height: 16px;float:left;" class="texto2 fz8 lh14" >
            </div>
          </div>
        @endif

        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
          <div class="textotitulo tl pl15">
              OBSERVACIONES
          </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;">
          <div style="width: 716px;height: 45px;float:left;"  class="texto2 fz8 lh14">
            {{$ficha?->monumento?->observaciones}}
          </div>
        </div>
        <div id="pagebreak1"></div>
        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
          <div class="textotitulo2 tl pl15">
              MONUMENTO HISTÓRICO COLONIAL / REPUBLICANO
          </div>
        </div>
        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
          <div class="textotitulo tl pl15">
              INFORMACIÓN COMPLEMENTARIA
          </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;">
          <div style="width: 380px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                175
              </div>
              <div class="texto fz8 lh14">
                INMUEBLE DECLARADO PATRIMONIO CULTURAL DE LA NACIÓN
              </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14" >
            {{$ficha?->colonial?->inmueble_declarado}}
          </div>
          <div style="width: 316px;height: 16px;float:left;" class="fondoclaro bn">
            <div style="width: 157px;height: 16px;float:left;" class="fondoclarito">
              <div class="texto fz8 lh14">
                01 SI
              </div>
            </div>
            <div style="width: 157px;height: 16px;float:left;" class="fondoclarito">
              <div class="texto fz8 lh14">
                02 NO
              </div>
            </div>
          </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;">
          <div style="width: 190px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                176
              </div>
              <div class="texto fz8 lh14">
                NOMBRE O DENOMINACION
              </div>
          </div>
          <div style="width: 524px;height: 16px;float:left;" class="texto2 fz8 lh14" >
            {{$ficha?->colonial?->nombre_colonial}}
          </div>
        </div>

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
            24
          </div>
          <div class="texto fz8 lh14">
            TIPO DE TITULAR
          </div>
        </div>
        <div style="width: 19px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$ficha?->titular?->persona?->tipo_persona}}
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
            25
          </div>
          <div class="texto fz8 lh14">
            ESTADO CIVIL
          </div>
        </div>
        <div style="width: 19px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$ficha?->titular?->esta_civil}}
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
      @if($ficha?->titular?->persona?->tipo_persona==1)
        @foreach($ficha?->titulars as $titular)
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
            {{$titular?->persona?->tipo_doc}}
          </div>
          <div style="width: 53px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              27
            </div>
            <div class="texto fz8 lh14">
              N° DOC
            </div>
          </div>
          <div style="width: 182px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$titular?->persona?->nume_doc}}
          </div>

          <div style="width: 93px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              28
            </div>
            <div class="texto fz8 lh14">
              NOMBRES
            </div>
          </div>
          <div style="width: 264px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$titular?->persona?->nombres}}
          </div>

        </div>
        <!-- 22 AL 24-->

        <!-- 25 AL 26-->
        <div style="width: 716px;height:16px;margin: auto;">
          <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;" class="fondoclaro">
            <div class="numeros" style="float:left;">
              29
            </div>
            <div class="texto fz8 lh14">
              APELLIDO PATERNO
            </div>
          </div>
          <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;" class="fondoclaro">
            <div class="numeros" style="float:left;">
              30
            </div>
            <div class="texto fz8 lh14">
              APELLIDO MATERNO
            </div>
          </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;">
          <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;" class="texto2 fz8 lh14">
            {{$titular?->persona?->ape_paterno}}
          </div>
          <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;" class="texto2 fz8 lh14">
            {{$titular?->persona?->ape_materno}}
          </div>
        </div>
        <!-- 25 AL 26-->
        @endforeach
      @else
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

          </div>
          <div style="width: 53px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              27
            </div>
            <div class="texto fz8 lh14">
              N° DOC
            </div>
          </div>
          <div style="width: 182px;height: 16px;float:left;">

          </div>

          <div style="width: 93px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              28
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
          <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;" class="fondoclaro">
            <div class="numeros" style="float:left;">
              29
            </div>
            <div class="texto fz8 lh14">
              APELLIDO PATERNO
            </div>
          </div>
          <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;" class="fondoclaro">
            <div class="numeros" style="float:left;">
              30
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
      @if($ficha?->titular?->persona?->tipo_persona==2)
        @foreach($ficha?->titulars as $titular)
        <div style="width: 716px;height:16px;margin: auto;">
          <div style="width: 111px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              31
            </div>
            <div class="texto fz8 lh14">
              N° DE RUC
            </div>
          </div>
          <div style="width: 206px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$titular?->persona?->nume_doc}}
          </div>
          <div style="width: 94px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              32
            </div>
            <div class="texto fz8 lh14">
              RAZON SOCIAL
            </div>
          </div>
          <div style="width: 301px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$titular?->persona?->razon_social}}
          </div>
        </div>
        <!-- 31 AL 32-->

        <!-- 29 -->
        <div style="width: 716px;height:16px;margin: auto;">

          <div style="width: 112px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              33
            </div>
            <div class="texto fz8 lh14">
              PERSONA JURIDICA
            </div>
          </div>
          <div style="width: 19px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$titular?->persona?->tipo_persona_juridica}}
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
              31
            </div>
            <div class="texto fz8 lh14">
              N° DE RUC
            </div>
          </div>
          <div style="width: 206px;height: 16px;float:left;" class="texto2 fz8 lh14">

          </div>
          <div style="width: 94px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              32
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
              33
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


      <div style="width: 716px;height:32px;margin: auto;">

        <div style="width: 75px;height: 32px;float:left;" class="fondoclaro">
          <div class="numeros">
            34
          </div>
          <div style="background-color:#FFFFFF;color:#000000;width:15px;height:16px;border:none;float:right;" class="texto2 fz8 lh14">
            {{$ficha?->titular?->cond_titular}}
          </div>
          <div class="texto fz8 lh14" style="font-size:7px;">
            COND. ESP.<BR>DEL TITULAR
          </div>
        </div>
        <div style="width: 640px;height: 32px;float:left;border:none;" class="fondoclarito">
          <div style="width: 640px; height: 10px;border:none;">
            <div style="width: 106px;height: 10px;float:left;">
              <div style="font-size:5px;border:none;text-align:center;">
                01 GOBIERNO CENTRAL
              </div>
            </div>
            <div style="width: 106px;height: 10px;float:left;">
              <div style="font-size:5px;border:none;text-align:center;">
                02 GOBIERNO LOCAL
              </div>
            </div>
            <div style="width: 106px;height: 10px;float:left;">
              <div style="font-size:5px;border:none;text-align:center;">
                03 GOBIERNO REGIONAL
              </div>
            </div>
            <div style="width: 105px;height: 10px;float:left;">
              <div style="font-size:5px;border:none;text-align:center;">
                04 BENEFICIENCIA
              </div>
            </div>
            <div style="width: 105px;height: 10px;float:left;">
              <div style="font-size:5px;border:none;text-align:center;">
                05 HOSPITALES
              </div>
            </div>
            <div style="width: 105.9px;height: 10px;float:left;">
              <div style="font-size:5px;border:none;text-align:center;">
                06 ENTIDADES RELIGIOSAS
              </div>
            </div>
          </div>
          <div style="width: 640px; height: 11px;border:none;">
            <div style="width: 106px;height: 11px;float:left;">
              <div style="font-size:5px;border:none;text-align:center;">
                07 COMPAÑIA DE BOMBEROS
              </div>
            </div>
            <div style="width: 106px;height: 11px;float:left;">
              <div style="font-size:5px;border:none;text-align:center;">
                08 UNIVERSIDADES
              </div>
            </div>
            <div style="width: 106px;height: 11px;float:left;">
              <div style="font-size:5px;border:none;text-align:center;">
                09 CENTRO EDUCATIVO
              </div>
            </div>
            <div style="width: 105px;height: 11px;float:left;">
              <div style="font-size:5px;border:none;text-align:center;">
                10 COMUNIDAD CAMP./NATIVA
              </div>
            </div>
            <div style="width: 105px;height: 11px;float:left;">
              <div style="font-size:5px;border:none;text-align:center;">
                11 ORGANISMOS INTERN.
              </div>
            </div>
            <div style="width: 105.9px;height: 11px;float:left;">
              <div style="font-size:5px;border:none;text-align:center;">
                12 GOBIERNO EXTRANJERO
              </div>
            </div>
          </div>

          <div style="width: 640px; height: 11px;border:none;">
            <div style="width: 106px;height: 11px;float:left;">
              <div style="font-size:5px;border:none;text-align:center;">
                13 ORGANIZACIONES POLITICAS
              </div>
            </div>
            <div style="width: 106px;height: 11px;float:left;">
              <div style="font-size:5px;border:none;text-align:center;">
                14 BANCOS Y FINANCIERAS
              </div>
            </div>
            <div style="width: 106px;height: 11px;float:left;">
              <div style="font-size:5px;border:none;text-align:center;">
                15 ORG. SINDICALES
              </div>
            </div>
            <div style="width: 105px;height: 11px;float:left;">
              <div style="font-size:5px;border:none;text-align:center;">
                16 ORG. DISCAPACITADOS
              </div>
            </div>
            <div style="width: 105px;height: 11px;float:left;">
              <div style="font-size:5px;border:none;text-align:center;">
                17 CONCESIÓN MINERA
              </div>
            </div>
            <div style="width: 105.9px;height: 11px;float:left;">
              <div style="font-size:5px;border:none;text-align:center;">
                18 PENSIONISTA
              </div>
            </div>
          </div>

        </div>
      </div>


      <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:2px;margin-bottom:2px">
        <div class="textotitulo tl pl15">
          DESCRIPCIÓN DEL MONUMENTO INTEGRANTE DEL PATRIMONIO CULTURAL DE LA NACIÓN
        </div>
      </div>
      <div style="width: 716px;height:10px;margin: auto;">
          <div style="width: 150px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                177
              </div>
              <div class="texto fz7 lh14">
                TIPO DE ARQUITECTURA
              </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->colonial?->tipo_arquitectura}}
          </div>
          <div style="width: 136px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                01 CIVIL PÚBLICA
              </div>
          </div>
          <div style="width: 136px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                02 CIVIL DOMESTICA
              </div>
          </div>
          <div style="width: 136px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                03 RELIGIOSA
              </div>
          </div>
          <div style="width: 138px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                04 MILITAR
              </div>
          </div>
          <div style="width: 170px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
              </div>
          </div>
          <div style="width: 136px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                05 INDUSTRIAL
              </div>
          </div>
          <div style="width: 136px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                06 FUNERARIA
              </div>
          </div>
          <div style="width: 274px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                07 OTROS (Especificar).........................................................
              </div>
          </div>

        </div>
        <div style="width: 716px;height:16px;margin: auto;">
          <div style="width: 111px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              178
            </div>
            <div class="texto fz8 lh14">
              USO ACTUAL
            </div>
          </div>
          <div style="width: 206px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->colonial?->uso_actual}}
          </div>
          <div style="width: 94px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              179
            </div>
            <div class="texto fz8 lh14">
              USO ORIGINAL
            </div>
          </div>
          <div style="width: 301px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->colonial?->uso_original}}
          </div>


          <div style="width: 130px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              180
            </div>
            <div class="texto fz8 lh14">
              NÚMERO DE PISOS
            </div>
          </div>
          <div style="width: 342px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->colonial?->num_pisos}}
          </div>
          <div style="width: 120px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              181
            </div>
            <div class="texto fz8 lh14">
              FECHA DE CONSTRUCCIÓN
            </div>
          </div>
          <div style="width: 18PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->colonial?->tipo_fecha}}
          </div>
          <div style="width: 50px;height: 16px;float:left;" class="fondoclarito">
            <div class="texto tc fz6 lh12">
                01 = AÑO
            </div>
            <div class="texto tc fz6 lh12">
                02 = SIGLO
            </div>
          </div>
          <div style="width: 50PX;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->colonial?->fecha_construccion!="")
              {{date("d-m-Y", strtotime($ficha?->colonial?->fecha_construccion))}}
            @endif
          </div>
        </div>



        <div style="width: 716px;height:16px;margin: auto;">
          <div style="width: 238px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              60
            </div>
            <div class="texto fz8 lh14">
              ÁREA DE TERRENO SEGÚN TÍTULO (M2)
            </div>
          </div>
          <div style="width: 238px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              182
            </div>
            <div class="texto fz8 lh14">
              ÁREA CONSTRUIDA (M2)
            </div>
          </div>
          <div style="width: 237px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              183
            </div>
            <div class="texto fz8 lh14">
              ÁREA LIBRE (M2)
            </div>
          </div>

          <div style="width: 238px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->fichabiencultural?->area_titulo}}
          </div>
          <div style="width: 238px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->fichabiencultural?->area_construido}}
          </div>
          <div style="width: 237px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->fichabiencultural?->area_libre}}
          </div>
        </div>



        <div style="width: 716px;height:32px;margin: auto;">
          <div style="width: 150px;height: 32px;float:left;" class="fondoclaro">
            <div class="numeros">
              184
            </div>
            <div style="background-color:#FFFFFF;color:#000000;width:15px;height:16px;border:none;float:right;" class="texto2 fz8 lh14">

            </div>
            <div class="texto fz8 lh14" style="font-size:7px;">
              IDENTIFICACION DE ELEMENTOS <BR>ARQUITECTONICOS
            </div>
          </div>
          <div style="width: 56PX;height: 32px;float:left;border:none;" class="">
            <div style="width: 56PX;height: 32px;float:left;">
              <div class="texto fz6 lh6">
                @foreach($ficha?->intervenciones as $intervencion)
                  {{$intervencion?->codigo}}, &nbsp;
                @endforeach
              </div>
            </div>
          </div>

          <div style="width: 509px;height: 32px;float:left;border:none;" class="fondoclarito">
            <div style="width: 509px; height: 16PX;border:none;">
              <div style="width: 100px;height: 16PX;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                  01 PORTADA
                </div>
              </div>
              <div style="width: 100px;height: 16PX;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                  02 BALCONES
                </div>
              </div>
              <div style="width: 100PX;height: 16PX;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                  03 PILASTRAS
                </div>
              </div>
              <div style="width: 100PX;height: 16PX;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                  04 MOLDURAS
                </div>
              </div>
              <div style="width: 103.9PX;height: 16PX;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                  05 CORNISAS
                </div>
              </div>
            </div>
            <div style="width: 565PX; height: 16PX;border:none;">
              <div style="width: 100px;height: 16PX;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                  06 VENTANAS
                </div>
              </div>
              <div style="width: 100px;height: 16PX;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                  07 BALAUSTRADA
                </div>
              </div>
              <div style="width: 100PX;height: 16PX;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                  08 REJAS
                </div>
              </div>
              <div style="width: 204.9PX;height: 16PX;float:left;">
                <div style="font-size:5px;border:none;text-align:center;">
                  09 OTROS (Especificar)).........................................................
                </div>
              </div>
            </div>
          </div>
        </div>


        <div style="width: 716px;height:48PX;margin: auto;">
          <div style="width: 90px;height: 48PX;float:left;" class="fondoclaro">
            <div class="numeros">
              185
            </div>
            <div style="background-color:#FFFFFF;color:#000000;width:15px;height:16px;border:none;float:right;" class="texto2 fz8 lh14">

            </div>
            <div class="texto fz7 lh10" style="font-size:7px;">
              DESCRIPCIÓN <BR>DE <BR>FACHADA
            </div>
          </div>

          <div style="width: 625PX;height: 48PX;float:left;border:none;" class="">

            <div style="width: 625px; height: 16PX;border:none;" class="texto fz6 lh6">
              {{$ficha?->fichabiencultural?->descripcion_fachada}}
            </div>
          </div>
        </div>

        <div style="width: 716px;height:48PX;margin: auto;">
          <div style="width: 90px;height: 48PX;float:left;" class="fondoclaro">
            <div class="numeros">
              186
            </div>
            <div style="background-color:#FFFFFF;color:#000000;width:15px;height:16px;border:none;float:right;" class="texto2 fz8 lh14">

            </div>
            <div class="texto fz8 lh14" style="font-size:7px;">
              DESCRIPCIÓN <BR>DE <BR>INTERIOR
            </div>
          </div>

          <div style="width: 625PX;height: 48PX;float:left;border:none;" class="">

            <div style="width: 625px; height: 16PX;border:none;" class="texto fz6 lh6">
              {{$ficha?->fichabiencultural?->descripcion_interior}}
            </div>
          </div>
        </div>
        <div style="width: 716px;height:10px;margin: auto;">
          <div style="width: 150px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                187
              </div>
              <div class="texto fz7 lh14">
                FILIACIÓN ESTILÍSTICA
              </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->fichabiencultural?->filiacion_estilistica}}
          </div>
          <div style="width: 68px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                01 GOTICO
              </div>
          </div>
          <div style="width: 68px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                02 MUDEJAR
              </div>
          </div>
          <div style="width: 68px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                03 PLATERESCO
              </div>
          </div>
          <div style="width: 68px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                04 RENACENTISTA
              </div>
          </div>
          <div style="width: 68px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                05 MANIERISTA
              </div>
          </div>
          <div style="width: 68px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                06 BARROCO
              </div>
          </div>
          <div style="width: 68px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                07 ROCOCO
              </div>
          </div>
          <div style="width: 69.9px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                08 NEOCLASICO
              </div>
          </div>
          <div style="width: 170px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">

              </div>
          </div>
          <div style="width: 68px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                09 NEORENACENTISTA
              </div>
          </div>
          <div style="width: 68px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                10 ACADEMICISTA
              </div>
          </div>
          <div style="width: 68px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                11 ART NOUVEAU
              </div>
          </div>
          <div style="width: 68px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                12 NEOCOLONIAL
              </div>
          </div>
          <div style="width: 68px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                13 NEOPERUANO
              </div>
          </div>
          <div style="width: 68px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                14 INDIGENISTA
              </div>
          </div>
          <div style="width: 68px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                15 ART DECO
              </div>
          </div>
          <div style="width: 69.9px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                16 OTROS
              </div>
          </div>
        </div>


        <div style="width: 716px;height:60PX;margin: auto;">
          <div style="width: 150px;height: 40PX;float:left;" class="fondoclaro bn">
            <div style="width: 150px;height: 40PX;float:left;" class="fondoclaro">
                <div class="numeros">
                  188
                </div>
                <div class="texto fz7 lh14">
                  ESTADO DE ELEMENTOS ESTRUCTURALES Y ACABADOS
                </div>
            </div>
            <div style="width: 150px;height: 20PX;float:left;" class="fondoclarito bn">
              <div style="width: 49px;height: 20PX;float:left;" class="fondoclarito bn">
              B = BUENO
              </div>
              <div style="width: 49px;height: 20PX;float:left;" class="fondoclarito bn">
              R = REGULAR
              </div>
              <div style="width: 49px;height: 20PX;float:left;" class="fondoclarito bn">
              M = MALO
              </div>
            </div>
          </div>

          <div style="width: 566px;height: 60px;float:left;" class="fondoclarito bn">
            <div style="width: 94px;height: 60px;float:left;" class="bn">
              <div style="width: 92px;height:30PX;float:left;" class="bn">
                <div class="texto fz7 lh14 bn" style="width:65px; float:left;">
                  CIMIENTOS
                </div>
                <div style="border-radius:50px; width:15px;height:15px;float:left;"  class="texto2 fz8 lh14">
                  @if($ficha?->estadoelemento!="")
                    {{$ficha?->estadoelemento?->cimientos}}
                  @endif

                </div>
              </div>
              <div style="width: 94px;height:30PX;float:left;" class="bn">
                <div class="texto fz7 lh14 bn" style="width:65px; float:left;">
                  BALCONES
                </div>
                <div style="border-radius:50px; width:15px;height:15px;float:left;"  class="texto2 fz8 lh14">
                  @if($ficha?->estadoelemento!="")
                    {{$ficha?->estadoelemento?->balcones}}
                  @endif
                </div>
              </div>
            </div>
            <div style="width: 94px;height: 60px;float:left;" class="bn">
              <div style="width: 94px;height:30PX;float:left;" class="bn">
                <div class="texto fz7 lh14 bn" style="width:65px; float:left;">
                  MUROS
                </div>
                <div style="border-radius:50px; width:15px;height:15px;float:left;"  class="texto2 fz8 lh14">
                  @if($ficha?->estadoelemento!="")
                    {{$ficha?->estadoelemento?->muros}}
                  @endif
                </div>
              </div>
              <div style="width: 94px;height:30PX;float:left;" class="bn">
                <div class="texto fz7 lh14 bn" style="width:65px; float:left;">
                  PUERTAS
                </div>
                <div style="border-radius:50px; width:15px;height:15px;float:left;"  class="texto2 fz8 lh14">
                  @if($ficha?->estadoelemento!="")
                    {{$ficha?->estadoelemento?->puertas}}
                  @endif
                </div>
              </div>
            </div>
            <div style="width: 94px;height: 60px;float:left;" class="bn">
              <div style="width: 94px;height:30PX;float:left;" class="bn">
                <div class="texto fz7 lh14" style="width:65px; float:left;">
                  PISOS
                </div>
                <div style="border-radius:50px; width:15px;height:15px;float:left;"  class="texto2 fz8 lh14">
                  @if($ficha?->estadoelemento!="")
                    {{$ficha?->estadoelemento?->pisos}}
                  @endif

                </div>
              </div>
              <div style="width: 94px;height:30PX;float:left;" class="bn">
                <div class="texto fz7 lh14" style="width:65px; float:left;">
                  VENTANAS
                </div>
                <div style="border-radius:50px; width:15px;height:15px;float:left;"  class="texto2 fz8 lh14">
                  @if($ficha?->estadoelemento!="")
                    {{$ficha?->estadoelemento?->ventanas}}
                  @endif
                </div>
              </div>
            </div>
            <div style="width: 94px;height: 60PX;float:left;" class="bn">
              <div style="width: 94px;height:30PX;float:left;" class="bn">
                <div class="texto fz7 lh14" style="width:65px; float:left;">
                  TECHOS
                </div>
                <div style="border-radius:50px; width:15px;height:15px;float:left;"  class="texto2 fz8 lh14">
                  @if($ficha?->estadoelemento!="")
                    {{$ficha?->estadoelemento?->techos}}
                  @endif

                </div>
              </div>
              <div style="width: 94px;height:30PX;float:left;" class="bn">
                <div class="texto fz7 lh14" style="width:65px; float:left;">
                  REJAS
                </div>
                <div style="border-radius:50px; width:15px;height:15px;float:left;"  class="texto2 fz8 lh14">
                  @if($ficha?->estadoelemento!="")
                    {{$ficha?->estadoelemento?->rejas}}
                  @endif
                </div>
              </div>
            </div>
            <div style="width: 94px;height: 60PX;float:left;" class="bn">
              <div style="width: 94px;height:30PX;float:left;" class="bn">
                <div class="texto fz7 lh14" style="width:65px; float:left;">
                  PILASTRAS
                </div>
                <div style="border-radius:50px; width:15px;height:15px;float:left;"  class="texto2 fz8 lh14">
                  @if($ficha?->estadoelemento!="")
                    {{$ficha?->estadoelemento?->pilastras}}
                  @endif
                </div>
              </div>
              <div style="width: 94px;height:30PX;float:left;" class="bn">
                <div class="texto fz7 lh14" style="width:65px; float:left;">
                  OTROS
                </div>
                <div style="border-radius:50px; width:15px;height:15px;float:left;"  class="texto2 fz8 lh14">
                  @if($ficha?->estadoelemento!="")
                    {{$ficha?->estadoelemento?->otros}}
                  @endif
                </div>
              </div>
            </div>
            <div style="width: 94px;height: 60PX;float:left;" class="bn">
              <div style="width: 94px;height:30PX;float:left;" class="bn">
                <div class="texto fz7 lh14" style="width:65px; float:left;">
                    REVESTIMIENTOS
                </div>
                <div style="border-radius:50px; width:15px;height:15px;float:left;"  class="texto2 fz8 lh14">
                  @if($ficha?->estadoelemento!="")
                    {{$ficha?->estadoelemento?->revestimiento}}
                  @endif
                </div>
              </div>

            </div>
          </div>
        </div>



        <div style="width: 716px;height:10px;margin: auto;">
          <div style="width: 150px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                189
              </div>
              <div class="texto fz7 lh14">
                INTERVENCIONES EN EL INMUEBLE
              </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->fichabiencultural?->intervencion_inmueble}}
          </div>
          <div style="width: 91px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                01 AMPLIACIÓN
              </div>
          </div>
          <div style="width: 91px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                02 ANASTILOSIS
              </div>
          </div>
          <div style="width: 91px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                03 CONSERVACIÓN
              </div>
          </div>
          <div style="width: 91px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                04 CONSOLIDACIÓN
              </div>
          </div>
          <div style="width: 91px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                05 CONSTRUCCIÓN
              </div>
          </div>
          <div style="width: 90.9px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                06 DEMOLICIÓN
              </div>
          </div>
          <div style="width: 170px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                07 RENOVACIÓN URBANA O REVITALIZACIÓN URBANA
              </div>
          </div>
          <div style="width: 91px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                08 PROTECCION
              </div>
          </div>
          <div style="width: 91px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                09 PUESTA EN VALOR
              </div>
          </div>
          <div style="width: 91px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                10 REFACCIÓN
              </div>
          </div>
          <div style="width: 91px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                11 REMODELACIÓN
              </div>
          </div>
          <div style="width: 91px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                12 OBRA NUEVA
              </div>
          </div>
          <div style="width: 90.9px;height: 16px;float:left;" class="fondoclarito bn">
              <div class="texto tc fz6 lh12">
                13 RESTAURACIÓN
              </div>
          </div>
        </div>


        <div style="width: 716px;height:48PX;margin: auto;">
          <div style="width: 90px;height: 48PX;float:left;" class="fondoclaro">
            <div class="numeros">
              190
            </div>
            <div style="background-color:#FFFFFF;color:#000000;width:15px;height:16px;border:none;float:right;" class="texto2 fz8 lh14">
              {{$ficha?->titular?->cond_titular}}
            </div>
            <div class="texto fz8 lh14" style="font-size:7px;">
              RESEÑA <BR>HISTORICA
            </div>
          </div>

          <div style="width: 625px;height: 48PX;float:left;border:none;" class="">
            <div style="width: 625px; height: 16PX;border:none;">
              <div class="texto fz8 lh14" >
                {{$ficha?->resena_historica}}
              </div>
            </div>
          </div>
        </div>



        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:2px;margin-bottom:2px">
          <div class="textotitulo tl pl15">
              INSCRIPCIÓN DEL PREDIO CATASTRAL EN EL REGISTRO DE PREDIOS
          </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;" class="fondoclaro">
          <div style="width: 250px;height: 16px;float:left;">
              <div class="numeros">
                104
              </div>
              <div class="texto fz8 lh14">
                TIPO DE PARTIDA REGISTRAL
              </div>
          </div>
          <div style="width: 120px;height: 16px;float:left;">
              <div class="numeros">
                105
              </div>
              <div class="texto fz8 lh14">
                NÚMERO
              </div>
          </div>
          <div style="width: 120px;height: 16px;float:left;">
              <div class="numeros">
                106
              </div>
              <div class="texto fz8 lh14">
                FOJAS
              </div>
          </div>
          <div style="width: 110px;height: 16px;float:left;">
              <div class="numeros">
                107
              </div>
              <div class="texto fz8 lh14">
                ASIENTO
              </div>
          </div>
          <div style="width: 111px;height: 16px;float:left;">
              <div class="numeros">
                108
              </div>
              <div class="texto fz7 lh7">
                FECHA DE INSCRIPCION <BR> DEL PREDIO
              </div>
          </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;" class="">
          <div style="width: 232px;height: 16px;float:left;" class="fondoclaro bn">
            <div style="width: 35PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  01 TOMO
                </div>
            </div>
            <div style="width: 35PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  02 FICHA
                </div>
            </div>
            <div style="width: 84PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  03 PARTIDA ELECTRONICA
                </div>
            </div>
            <div style="width: 77.9PX;height: 16px;float:left;" class="fondoclarito bn">
                <div class="texto tc fz6 lh12">
                  04 CÓDIGO DE PREDIO
                </div>
            </div>

          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if(isset($ficha?->sunarpbiencultural[1]))
              {{$ficha?->sunarpbiencultural[1]?->tipo_partida}}
            @endif
          </div>
          <div style="width: 120px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if(isset($ficha?->sunarpbiencultural[1]))
              {{$ficha?->sunarpbiencultural[1]?->nume_partida}}
            @endif
          </div>
          <div style="width: 120px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if(isset($ficha?->sunarpbiencultural[1]))
              {{$ficha?->sunarpbiencultural[1]?->fojas}}
            @endif
          </div>
          <div style="width: 110px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if(isset($ficha?->sunarpbiencultural[1]))
              {{$ficha?->sunarpbiencultural[1]?->asiento}}
            @endif
          </div>
          <div style="width: 37px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if(isset($ficha?->sunarpbiencultural[1]))
              {{date("d", strtotime($ficha?->sunarpbiencultural[1]?->fecha_inscripcion))}}
            @endif
          </div>
          <div style="width: 36px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if(isset($ficha?->sunarpbiencultural[1]))
              {{date("m", strtotime($ficha?->sunarpbiencultural[1]?->fecha_inscripcion))}}
            @endif
          </div>
          <div style="width: 36px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if(isset($ficha?->sunarpbiencultural[1]))
              {{date("Y", strtotime($ficha?->sunarpbiencultural[1]?->fecha_inscripcion))}}
            @endif
          </div>
        </div>





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
        <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14" >
          {{$ficha?->fichabiencultural?->cond_declarante}}
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
            115
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
        @if($ficha?->litigantes!="")
          @foreach($ficha?->litigantes as $litigante)
            <div style="width: 65px;height: 16px;float:left;" class="texto2 fz8 lh14" >
              {{$litigante?->persona?->tipo_doc}}
            </div>
            <div style="width: 133px;height: 16px;float:left;" class="texto2 fz8 lh14" >
              {{$litigante?->persona?->nume_doc}}
            </div>
            <div style="width: 371px;height: 16px;float:left;" class="texto2 fz8 lh14" >
              {{$litigante?->persona?->nombres}} {{$litigante?->persona?->ape_paterno}} {{$litigante?->persona?->ape_materno}}
            </div>
            <div style="width: 143px;height: 16px;float:left;" class="texto2 fz8 lh14" >
              {{$litigante?->codi_contribuye}}
            </div>
            <!--foreach-->
          @endforeach
        @else
          <div style="width: 65px;height: 16px;float:left;" class="texto2 fz8 lh14" >

          </div>
          <div style="width: 133px;height: 16px;float:left;" class="texto2 fz8 lh14" >

          </div>
          <div style="width: 371px;height: 16px;float:left;" class="texto2 fz8 lh14" >

          </div>
          <div style="width: 143px;height: 16px;float:left;" class="texto2 fz8 lh14" >

          </div>
          <!--foreach-->
        @endif

      </div>


      <div style="width: 716px;height:16px;margin: auto;">

        <div style="width: 158px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            116
          </div>
          <div class="texto fz8 lh14">
            ESTADO DE LLENADO DE LA FICHA
          </div>
        </div>
        <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14" >
          {{$ficha?->fichabiencultural?->esta_llenado}}
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
            117
          </div>
          <div class="texto fz8 lh14">
            N° DE HABITANTE
          </div>
        </div>
        <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14" >
          {{$ficha?->fichabiencultural?->nume_habitantes}}
        </div>

        <div style="width: 166px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            118
          </div>
          <div class="texto fz8 lh14">
            N° DE FAMILIAS
          </div>
        </div>
        <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14" >
          {{$ficha?->fichabiencultural?->nume_familias}}
        </div>
      </div>
      <!-- 49 AL 92-->





      <!-- 87-->
      <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
          <div class="textotitulo tl pl15">
              NORMATIVA LEGAL
          </div>
        </div>
        @if(isset($ficha?->normalegals1[0]))
          @foreach($ficha?->normalegals1 as $normalegal1)
          <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 155px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                173
              </div>
              <div class="texto fz8 lh14">
                NORMATIVIDAD N° / FECHA
              </div>
            </div>
            <div style="width: 126px;height: 16px;float:left;" class="texto2 fz8 lh14" >
              {{$normalegal1?->normatividad}}
            </div>
            <div style="width: 70px;height: 16px;float:left;" class="fondoclaro">
              <div class="texto fz8 lh14">
                FECHA
              </div>
            </div>
            <div style="width: 105px;height: 16px;float:left;" class="texto2 fz8 lh14">
              {{date("d-m-Y", strtotime($normalegal1?->fecha_norma))}}
            </div>

            <div style="width: 126px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                174
              </div>
              <div class="texto fz8 lh14">
                NÚMERO DE PLANO
              </div>
            </div>
            <div style="width: 126px;height: 16px;float:left;" class="texto2 fz8 lh14" >
              {{$normalegal1?->numero_plano}}
            </div>
          </div>
          @endforeach
        @else
          <div style="width: 716px;height:16px;margin: auto;">
            <div style="width: 155px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                173
              </div>
              <div class="texto fz8 lh14">
                NORMATIVIDAD N° / FECHA
              </div>
            </div>
            <div style="width: 126px;height: 16px;float:left;" class="texto2 fz8 lh14" >
            </div>
            <div style="width: 70px;height: 16px;float:left;" class="fondoclaro">
              <div class="texto fz8 lh14">
                FECHA
              </div>
            </div>
            <div style="width: 105px;height: 16px;float:left;" class="texto2 fz8 lh14">
            </div>

            <div style="width: 126px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                174
              </div>
              <div class="texto fz8 lh14">
                NÚMERO DE PLANO
              </div>
            </div>
            <div style="width: 126px;height: 16px;float:left;" class="texto2 fz8 lh14" >
            </div>
          </div>
        @endif

        <div id="pagebreak1"></div>
        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
        <div class="textotitulo tl pl15">
          OBSERVACIONES
        </div>
      </div>

      <div style="width: 716px;height:16px;margin: auto;">

        <div style="width: 716px;height: 45px;float:left;"  class="texto2 fz8 lh14">
          {{$ficha?->colonial?->observaciones}}
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

              DNI:  @if($ficha?->verificador!="")
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
            NOMBRES:  @if($ficha?->verificador!="")
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
