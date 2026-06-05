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
        .numerosnc{

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
          background-color:#7effff;
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
        .bp{
          background-color:#435423;
        }

      </style>

    </head>
    <body>
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

      <div style="width: 120px;height: 120px;float:left;border:none;" >
          <img src="{{$logos?->logo_institucion}}" alt="">
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
                {{$ficha?->ficharural?->cuc}}
              </div>

            </div>
          </div>
          <div style="width: 230px;height:16px;margin: auto;">
            <div style="width: 230px;height: 16px;float:left;" class="fondoclaro">
              <div class="numeros">
                02
              </div>
              <div class="texto fz8 lh14">
                CÓDIGO HOJA CATASTRAL
              </div>
            </div>
          </div>
          <div style="width: 230px;height:16px;margin: auto;">
            <div style="width: 230px;height: 16px;float:left;">
              <div class="texto fz8 lh14">
                {{$ficha?->ficharural?->codigo_hoja_catastral}}
              </div>

            </div>
          </div>


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
              {{$ficha?->ficharural?->codigo_contr_rentas}}
            </div>
            <div style="width: 212.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
              {{$ficha?->ficharural?->codigo_predial}}
            </div>
          </div>
          <div style="width: 427px;height:16px;margin: auto;">
            <div style="width: 25px;height: 16px;float:left;" class="fondoclaro">

                <div class="texto fz8 lh14">
                    ZONA
                </div>
            </div>
            <div style="width: 199PX;height: 16px;float:left;" class="fondoclaro">
                <div class="texto fz8 lh14">
                    UNIDAD ORGANICA CATASTRAL RURAL
                </div>
            </div>
            <div style="width: 199.9px;height: 16px;float:left;" class="fondoclaro">
                <div class="texto fz8 lh14">
                    UNIDAD CATASTRAL
                </div>
            </div>
        </div>

          <div style="width: 427px;height:16px;margin: auto;">
            <div style="width: 25px;height: 16px;float:left;" class="texto2 fz8 lh14">
              {{$ficha?->ficharural?->zona_geografica}}
            </div>
            <div style="width: 199PX;height: 16px;float:left;" class="texto2 fz8 lh14">
              {{$ficha?->ficharural?->unidad_organica}}
            </div>
            <div style="width: 199.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
              {{$ficha?->ficharural?->unidad_catastral}}
            </div>
          </div>
        </div>

        <div style="width: 120px;height: 120px;float:left;border:none;" >
          <img src="{{$logos?->logo_catastro}}" alt="">
        </div>
      </div>

      <!-- fila 07-->
      <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:0px;margin-bottom:0px;">
        <div class="textotitulo tl pl15">
          UBICACIÓN GEOGRAFICA DEL PREDIO CATASTRAL
        </div>
      </div>
      <div style="width: 716px;height:16px;margin: auto; "class="bn ">
        <div style="width: 238px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            06
          </div>
          <div class="texto fz8 lh14">
            DEPARTAMENTO
          </div>

        </div>
        <div style="width: 237px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            07
          </div>
          <div class="texto fz8 lh14">
            PROVINCIA
          </div>
        </div>
        <div style="width: 237.9px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            08
          </div>
          <div class="texto fz8 lh14">
            DISTRITO
          </div>
        </div>
      </div>

      <div style="width: 716px;height:16px;margin: auto;" class="bn">
        <div style="width: 238px;height: 16px;float:left;" class="texto2 fz8 lh14">

          {{$ficha?->ficharural?->departamento?->descri}}
        </div>
        <div style="width: 237px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @foreach($ficha?->ficharural?->provincias as $provincia)
            @if($provincia?->cod_dep == $ficha?->ficharural?->cod_dep && $provincia?->cod_pro == $ficha?->ficharural?->cod_pro && $provincia?->codi_dis == "00")
              {{$provincia?->descri}}
            @endif
          @endforeach
        </div>
        <div style="width: 237.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @foreach($ficha?->ficharural?->distritos as $distrito)
            @if($distrito?->cod_dep == $ficha?->ficharural?->cod_dep && $distrito?->cod_pro == $ficha?->ficharural?->cod_pro && $distrito?->codi_dis == $ficha?->ficharural?->cod_dis)
              {{$distrito?->descri}}
            @endif
          @endforeach
        </div>
      </div>
      <div style="width: 716px;height:16px;margin: auto;" class="bn">
        <div style="width: 142px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            09
          </div>
          <div class="texto fz8 lh14">
            PROYECTO CATASTRAL
          </div>

        </div>
        <div style="width: 142px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            10
          </div>
          <div class="texto fz8 lh14">
            UNIDAD TERRITORIAL
          </div>
        </div>
        <div style="width: 142px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            11
          </div>
          <div class="texto fz8 lh14">
            NOMBRE DEL VALLE
          </div>
        </div>
        <div style="width: 142px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            12
          </div>
          <div class="texto fz8 lh14">
            NOMBRE DEL SECTOR
          </div>
        </div>
        <div style="width: 142.9px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            13
          </div>
          <div class="texto fz8 lh14">
            NOMBRE DEL PREDIO
          </div>
        </div>
      </div>

      <div style="width: 716px;height:16px;margin: auto;" class="bn">

        <div style="width: 142px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$ficha?->ficharural?->proy_cat}}
        </div>
        <div style="width: 142px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$ficha?->ficharural?->uni_terr}}
        </div>
        <div style="width: 142px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$ficha?->ficharural?->nomb_valle}}
        </div>
        <div style="width: 142px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$ficha?->ficharural?->nomb_sector}}
        </div>
        <div style="width: 142.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$ficha?->ficharural?->nomb_predio}}
        </div>
      </div>

      <div style="width: 716px;height:16px;margin: auto;" class="bn">
        <div style="width: 178px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            14
          </div>
          <div class="texto fz8 lh14">
            NUMERO DE FOTO
          </div>

        </div>
        <div style="width: 178px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            15
          </div>
          <div class="texto fz8 lh14">
            NUMERO DE ORTOFOTO
          </div>
        </div>
        <div style="width: 178px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            16
          </div>
          <div class="texto fz8 lh14">
            IMAGEN SATELITAL
          </div>
        </div>
        <div style="width: 177.9px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            17
          </div>
          <div class="texto fz8 lh14">
            UNIDAD CATASTRAL ANTERIOR
          </div>
        </div>
      </div>

      <div style="width: 716px;height:16px;margin: auto;" class="bn">
        <div style="width: 178px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$ficha?->ficharural?->num_foto}}
        </div>
        <div style="width: 178px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$ficha?->ficharural?->num_ortofoto}}
        </div>
        <div style="width: 178px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$ficha?->ficharural?->img_satelital}}
        </div>
        <div style="width: 177.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$ficha?->ficharural?->uca_ant}}
        </div>
      </div>



      <div style="width: 716px;height:32px;margin: auto;" class="bn">

        <div style="width: 178px;height: 32px;float:left;" class="fondoclaro">
          <div class="numeros">
            18
          </div>
          <div class="texto fz8 lh14">
            COORDENADAS UTM <BR>DE REFERENCIA
          </div>

        </div>

        <div style="width: 179px;height: 32px;float:left;" class="bn">
          <div style="width: 179px;height: 16px;float:left;" class="fondoclaro">
            <div class="texto fz8 lh14">
              ESTE(X)
            </div>
          </div>
          <div style="width: 179px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$ficha?->ficharural?->cord_este}}
          </div>
        </div>

        <div style="width: 163px;height: 32px;float:left;" class="bn">
          <div style="width: 163px;height: 16px;float:left;" class="fondoclaro">

            <div class="texto fz8 lh14">
              NORTE(Y)
            </div>
          </div>
          <div style="width: 163px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$ficha?->ficharural?->cord_norte}}
          </div>
        </div>
        <div style="width: 97px;height: 32px;float:left;" class="bn">
          <div style="width: 97px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              19
            </div>
            <div class="texto fz8 lh14">
              DATUM
            </div>
          </div>
          <div style="width: 97px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->ficharural?->datum}}
          </div>
        </div>
        <div style="width: 97.9px;height: 16px;float:left;" class="bn">
          <div style="width: 97.9px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              20
            </div>
            <div class="texto fz8 lh14">
              ZONA
            </div>
          </div>
          <div style="width: 97.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->ficharural?->zona}}
          </div>
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
      <div style="width: 716px;height:16px;margin: auto;" class="bn">
        <div style="width: 110px;height: 16px;float:left;" class="bn">
          <div style="width: 90px;height: 16px;float:left;" class="fondoclaro ">
            <div class="numeros">
              21
            </div>
            <div class="texto fz8 lh14">
              TIPO DE TITULAR
            </div>
          </div>
          <div style="width: 17.9px;height: 16px;float:left;" class="">
            <div class="texto fz8 lh14">
            @foreach ($ficha?->titulars as $titular )
                @if($titular?->nume_titular == 'TITULAR N° 1')
                    {{$titular?->persona?->tipo_persona}}
                @endif
            @endforeach

            </div>
          </div>
          <div style="width: 108.9px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              01
            </div>
            <div class="texto fz6 lh12">
              PERSONA NATURAL
            </div>
          </div>
          <div style="width: 108.9px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              02
            </div>
            <div class="texto fz6 lh12">
              PERSONA JURIDICA
            </div>
          </div>
        </div>
        <div style="width: 430;height: 16px;float:left;" class="bn ">
          <div style="width: 410px;height: 16px;float:left;" class="fondoclaro ">
            <div class="numeros">
              22
            </div>
            <div class="texto fz8 lh14">
              TIPO DE DOCUMENTO DE IDENTIDAD
            </div>
          </div>
          <div style="width: 17.9px;height: 16px;float:left;" class="">
            <div class="texto fz8 lh14">

            @foreach ($ficha?->titulars as $titular )
                @if($titular?->persona?->tipo_persona==1)
                    @if($titular?->nume_titular == 'TITULAR N° 1')
                        {{$titular?->persona?->tipo_doc}}
                    @endif
                @endif
            @endforeach


            </div>
          </div>
          <div style="width: 107px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              01
            </div>
            <div class="texto fz6 lh12">
              NO PRESENTO DOCUMENTO
            </div>
          </div>
          <div style="width: 70px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              02
            </div>
            <div class="texto fz6 lh12">
              DNI
            </div>
          </div>
          <div style="width: 107px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              03
            </div>
            <div class="texto fz6 lh12">
              CARNET IDENTIDAD P.N.P.
            </div>
          </div>
          <div style="width: 141.9px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              04
            </div>
            <div class="texto fz6 lh12">
              CARNET IDENTIDAD FUERZAS ARMADAS
            </div>
          </div>
          <div style="width: 107px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              05
            </div>
            <div class="texto fz6 lh12">
              PARTIDA DE NACIMIENTO
            </div>
          </div>
          <div style="width: 70px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              06
            </div>
            <div class="texto fz6 lh12">
              PASAPORTE
            </div>
          </div>
          <div style="width: 107px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              07
            </div>
            <div class="texto fz6 lh12">
              CARNET DE EXTRANJERIA
            </div>
          </div>
          <div style="width: 141.9px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              08
            </div>
            <div class="texto fz6 lh12">
              OTROS (ESPECIFICAR)........................
            </div>
          </div>
        </div>
        <div style="width: 175.9px;height: 16px;float:left;" class="bn ">
          <div style="width: 155;height: 16px;float:left;" class="fondoclaro ">
            <div class="numeros">
              08
            </div>
            <div class="texto fz8 lh14">
              ESTADO CIVIL / CONVIVENCIA
            </div>
          </div>
          <div style="width: 18.9px;height: 16px;float:left;" class="">
            <div class="texto fz8 lh14">
                @foreach ($ficha?->titulars as $titular )
                    @if($titular?->persona?->tipo_persona==1)
                        @if($titular?->nume_titular == 'TITULAR N° 1')
                            {{$titular?->esta_civil}}
                        @endif
                    @endif
                @endforeach
            </div>
          </div>
          <div style="width: 54px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              01
            </div>
            <div class="texto fz6 lh12">
              SOLTERO(A)
            </div>
          </div>
          <div style="width: 50px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              02
            </div>
            <div class="texto fz6 lh12">
              CASADO(A)
            </div>
          </div>
          <div style="width: 68.9px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              03
            </div>
            <div class="texto fz6 lh12">
              DIVORCIADO(A)
            </div>
          </div>
          <div style="width: 54px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              04
            </div>
            <div class="texto fz6 lh12">
              CONVIVIENTE
            </div>
          </div>
          <div style="width: 50px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              05
            </div>
            <div class="texto fz6 lh12">
              VIUDO(A)
            </div>
          </div>
          <div style="width: 68.9px;height: 16px;float:left;" class="">

          </div>
        </div>

      <!--####################################################-->
      <!--####################################################-->
      <!--#####################FOREACH########################-->
      <!--####################################################-->
      <!--####################################################-->
        <div style="width: 716px;height:16px;margin: auto; "class="bn ">
          <div style="width: 161px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              24
            </div>
            <div class="texto fz8 lh14">
              N° DOC. IDENTIDAD
            </div>
          </div>
          <div style="width: 552.9px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              25
            </div>
            <div class="texto fz8 lh14">
              NOMBRES
            </div>
          </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto; "class="bn ">
          <div style="width: 161px;height: 16px;float:left;" class="texto2 fz8 lh14">

                @foreach ($ficha?->titulars as $titular )
                    @if($titular?->persona?->tipo_persona==1)
                        @if($titular?->nume_titular == 'TITULAR N° 1')
                            {{$titular?->persona?->nume_doc}}
                        @endif
                    @endif
                @endforeach

          </div>
          <div style="width: 552.9px;height: 16px;float:left;" class="texto2 fz8 lh14">


            @foreach ($ficha?->titulars as $titular )
                @if($titular?->persona?->tipo_persona==1)
                    @if($titular?->nume_titular == 'TITULAR N° 1')
                        {{$titular?->persona?->nombres}}
                    @endif
                @endif
            @endforeach


          </div>
        </div>

        <div style="width: 716px;height:16px;margin: auto; "class="bn ">
          <div style="width: 357px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              26
            </div>
            <div class="texto fz8 lh14">
              APELLIDO PATERNO
            </div>
          </div>
          <div style="width: 357px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              27
            </div>
            <div class="texto fz8 lh14">
              APELLIDO MATERNO
            </div>
          </div>
        </div>

        <div style="width: 716px;height:16px;margin: auto; "class="bn ">
            <div style="width: 357px;height: 16px;float:left;" class="texto2 fz8 lh14">

            @foreach ($ficha?->titulars as $titular )
                @if($titular?->persona?->tipo_persona==1)
                    @if($titular?->nume_titular == 'TITULAR N° 1')
                        {{$titular?->persona?->ape_paterno}}
                    @endif
                @endif
            @endforeach
            </div>
            <div style="width: 357px;height: 16px;float:left;" class="texto2 fz8 lh14">

            @foreach ($ficha?->titulars as $titular )
                @if($titular?->persona?->tipo_persona==1)
                    @if($titular?->nume_titular == 'TITULAR N° 1')
                    {{$ficha?->titular?->persona?->ape_materno}}
                    @endif
                @endif
            @endforeach
            </div>
        </div>


      </div>
      <!--####################################################-->
      <!--####################################################-->
      <!--#####################FOREACH########################-->
      <!--####################################################-->
      <!--####################################################-->

      <div style="width: 716px;height:16px;margin: auto; "class="bn ">
        <div style="width: 141px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            28
          </div>
          <div class="texto fz8 lh14">
            NUMERO DE RUC
          </div>
        </div>
        <div style="width: 572.9px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            29
          </div>
          <div class="texto fz8 lh14">
            RAZON SOCIAL
          </div>
        </div>
      </div>

      <div style="width: 716px;height:16px;margin: auto; "class="bn ">
        <div style="width: 141px;height: 16px;float:left;" class="texto2 fz8 lh14">

            @foreach ($ficha?->titulars as $titular )
                @if($titular?->persona?->tipo_persona==2)
                    @if($titular?->nume_titular == 'TITULAR N° 1')
                        {{$titular?->persona?->nume_doc}}
                    @endif
                @endif
            @endforeach

        </div>
        <div style="width: 572.9px;height: 16px;float:left;" class="texto2 fz8 lh14">

            @foreach ($ficha?->titulars as $titular )
                @if($titular?->persona?->tipo_persona==2)
                    @if($titular?->nume_titular == 'TITULAR N° 1')
                        {{$titular?->persona?->razon_social}}
                    @endif
                @endif
            @endforeach
        </div>
      </div>

      <div style="width: 716px;height:16px;margin: auto; "class="bn ">
        <div style="width: 122PX;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            30
          </div>
          <div class="texto fz8 lh14">
            PERSONA JURIDICA
          </div>
        </div>
        <div style="width: 18PX;height: 16px;float:left;" class="texto2 fz8 lh14">

          @foreach ($ficha?->titulars as $titular )
            @if($titular?->persona?->tipo_persona==2)
                @if($titular?->nume_titular == 'TITULAR N° 1')
                    {{$titular?->persona?->tipo_persona_juridica}}
                @endif
            @endif
        @endforeach
        </div>
        <div style="width: 90px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            01
          </div>
          <div class="texto fz6 lh12">
            EMPRESAS
          </div>
        </div>
        <div style="width: 90px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            02
          </div>
          <div class="texto fz6 lh12">
            COOPERATIVA
          </div>
        </div>
        <div style="width: 108px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            03
          </div>
          <div class="texto fz6 lh12">
            ASOCIACIÓN
          </div>
        </div>
        <div style="width: 142px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            04
          </div>
          <div class="texto fz6 lh12">
            COMUNIDADES CAMPESINAS / NATIVAS
          </div>
        </div>
        <div style="width: 138.9px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            05
          </div>
          <div class="texto fz6 lh12">
            OTROS(ESPECIFICAR)
          </div>
        </div>
      </div>

      <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
        <div class="textotitulo tl pl15">
          IDENTIFICACIÓN DE LOS COTUTULARES CATASTRALES
        </div>
      </div>

      <div style="width: 716px;height:32px;margin: auto; "class="bn ">
        <div style="width: 36px;height: 32px;float:left;" class="fondoclaro">
          <div class="numeros">
            31
          </div>
          <div class="texto fz8 lh14">
            N°
          </div>
        </div>
        <div style="width: 166px;height: 32px;float:left;" class="fondoclaro">
          <div class="numeros">
            32
          </div>
          <div class="texto fz8 lh14">
            APELLIDO PATERNO
          </div>
        </div>
        <div style="width: 166px;height: 32px;float:left;" class="fondoclaro">
          <div class="numeros">
            33
          </div>
          <div class="texto fz8 lh14">
            APELLIDO MATERNO
          </div>
        </div>
        <div style="width: 166px;height: 32px;float:left;" class="fondoclaro">
          <div class="numeros">
            34
          </div>
          <div class="texto fz8 lh14">
            NOMBRES
          </div>
        </div>
        <div style="width: 54px;height: 32px;float:left;" class="fondoclaro">
          <div class="numeros">
            35
          </div>
          <div class="texto fz8 lh14">
            ESTADO CIVIL
          </div>
        </div>
        <div style="width: 122px;height: 32px;float:left;" class="bn ">
          <div style="width: 121px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              36
            </div>
            <div class="texto fz8 lh14">
              DOCUMENTO DE IDENTIDAD
            </div>
          </div>
          <div style="width: 121px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              <div class="texto fz6 lh10">
                tipo
              </div>
            </div>
            <div class="texto fz8 lh14">
              NÚMERO
            </div>
          </div>
        </div>
      </div>

      <!--####################################################-->
      <!--####################################################-->
      <!--#####################FOREACH########################-->
      <!--####################################################-->
      <!--####################################################-->
      @if($ficha?->titulars != "")
        @php $cont=1 @endphp
        @foreach($ficha?->titulars as $titulars)
            @if($titulars?->nume_titular !== 'TITULAR N° 1')
            <div style="width: 716px;height:16px;margin: auto; "class="bn ">
                <div style="width: 36px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{$cont}}
                </div>
                <div style="width: 166px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{$titulars?->persona?->ape_paterno}}
                </div>
                <div style="width: 166px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{$titulars?->persona?->ape_materno}}
                </div>
                <div style="width: 166px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{$titulars?->persona?->nombres}}
                </div>
                <div style="width: 54px;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{$titulars?->esta_civil}}
                </div>
                <div style="width: 16PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{$titulars?->persona?->tipo_doc}}
                </div>
                <div style="width: 104PX;height: 16px;float:left;" class="texto2 fz8 lh14">
                {{$titulars?->persona?->nume_doc}}
                </div>
            </div>
            @endif
          @php $cont++ @endphp
        @endforeach
      @else
        <div style="width: 716px;height:16px;margin: auto; "class="bn ">
          <div style="width: 36px;height: 16px;float:left;" class="texto2 fz8 lh14">

          </div>
          <div style="width: 166px;height: 16px;float:left;" class="texto2 fz8 lh14">

          </div>
          <div style="width: 166px;height: 16px;float:left;" class="texto2 fz8 lh14">

          </div>
          <div style="width: 166px;height: 16px;float:left;" class="texto2 fz8 lh14">

          </div>
          <div style="width: 54px;height: 16px;float:left;" class="texto2 fz8 lh14">

          </div>
          <div style="width: 16PX;height: 16px;float:left;" class="texto2 fz8 lh14">

          </div>
          <div style="width: 104PX;height: 16px;float:left;" class="texto2 fz8 lh14">

          </div>
        </div>
      @endif



      <!--####################################################-->
      <!--####################################################-->
      <!--#####################FOREACH########################-->
      <!--####################################################-->
      <!--####################################################-->





      <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
        <div class="textotitulo tl pl15">
          DOMICILIO FISCAL DEL TITULAR
        </div>
      </div>
      <div style="width: 716px;height:16px;margin: auto;" class="bn">
        <div style="width: 178px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            37
          </div>
          <div class="texto fz8 lh14">
            DEPARTAMENTO
          </div>

        </div>
        <div style="width: 178px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            38
          </div>
          <div class="texto fz8 lh14">
            PROVINCIA
          </div>
        </div>
        <div style="width: 178px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            39
          </div>
          <div class="texto fz8 lh14">
            DISTRITO
          </div>
        </div>
        <div style="width: 177.9px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            40
          </div>
          <div class="texto fz8 lh14">
            ANEXO / ZONA / SECTOR / CASERIO
          </div>
        </div>
      </div>

      <div style="width: 716px;height:16px;margin: auto;" class="bn">
        <div style="width: 178px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($ficha?->domiciliotitular!="")
            {{$ficha?->domiciliotitular?->departamento?->descri}}
          @endif
        </div>
        <div style="width: 178px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($ficha?->domiciliotitular!="")
            @foreach($ficha?->domiciliotitular?->provincias as $provincia)
              @if($provincia?->cod_dep == $ficha?->domiciliotitular?->codi_dep && $provincia?->cod_pro == $ficha?->domiciliotitular?->codi_pro && $provincia?->codi_dis == "00")
                {{$provincia?->descri}}
              @endif
            @endforeach
          @endif
        </div>
        <div style="width: 178px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($ficha?->domiciliotitular!="")
            @foreach($ficha?->domiciliotitular?->distritos as $distrito)
            @if($distrito?->cod_dep == $ficha?->domiciliotitular?->codi_dep && $distrito?->cod_pro == $ficha?->domiciliotitular?->codi_pro && $distrito?->codi_dis == $ficha?->domiciliotitular?->codi_dis)
                {{$distrito?->descri}}
              @endif
            @endforeach
          @endif
        </div>
        <div style="width: 177.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($ficha?->domiciliotitular!="")
            {{$ficha?->domiciliotitular?->sector}}
          @endif
        </div>
      </div>

      <div style="width: 716px;height:16px;margin: auto;" class="bn">
        <div style="width: 357PX;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            41
          </div>
          <div class="texto fz8 lh14">
            CALLE / VIA
          </div>

        </div>
        <div style="width: 178px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            42
          </div>
          <div class="texto fz8 lh14">
            NÚMERO MUNICIPAL / LOTE
          </div>
        </div>
        <div style="width: 177.9px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            43
          </div>
          <div class="texto fz8 lh14">
            NOMBRE DEL PREDIO
          </div>
        </div>
      </div>

      <div style="width: 716px;height:16px;margin: auto;" class="bn">
        <div style="width: 357px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($ficha?->domiciliotitular!="")
            {{$ficha?->domiciliotitular?->nomb_via}}
          @endif
        </div>

        <div style="width: 178px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($ficha?->domiciliotitular!="")
            {{$ficha?->domiciliotitular?->nume_muni}}
          @endif
        </div>
        <div style="width: 177.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($ficha?->domiciliotitular!="")
            {{$ficha?->domiciliotitular?->nomb_edificacion}}
          @endif
        </div>
      </div>
      <div style="width: 716px;height:16px;margin: auto;" class="bn">
        <div style="width: 96px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            44
          </div>
          <div class="texto fz8 lh14">
            TELÉFONO
          </div>
        </div>
        <div style="width: 71px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @foreach ($ficha?->titulars as $titular )
                @if($titular?->nume_titular == 'TITULAR N° 1')
                    {{$titular?->telf}}
                @endif
            @endforeach

        </div>
        <div style="width: 61px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            45
          </div>
          <div class="texto fz8 lh14">
            ANEXO
          </div>
        </div>
        <div style="width: 55px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @foreach ($ficha?->titulars as $titular )
                @if($titular?->nume_titular == 'TITULAR N° 1')
                    {{$titular?->anexo}}
                @endif
            @endforeach
        </div>
        <div style="width: 126px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            46
          </div>
          <div class="texto fz8 lh14">
            CORREO ELECTRÓNICO
          </div>
        </div>
        <div style="width: 301px;height: 16px;float:left;" class="texto2 fz8 lh14">

            @foreach ($ficha?->titulars as $titular )
                @if($titular?->nume_titular == 'TITULAR N° 1')
                    {{$titular?->email}}
                @endif
            @endforeach
        </div>
      </div>


      <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:2px;margin-bottom:2px">
        <div class="textotitulo tl pl15">
          CONDICIÓN ESPECIAL DEL TITULAR
        </div>
      </div>
      <div style="width: 716px;height:16px;margin: auto;" class="bn">
        <div style="width: 695.9px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            47
          </div>
          <div class="texto fz8 lh14">
            CÓDIGO
          </div>
        </div>
        <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$ficha?->condicionpredio?->cond_titular}}
        </div>
        <div style="width: 125px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            01
          </div>
          <div class="texto fz6 lh12">
            GOBIERNO CENTRAL
          </div>
        </div>
        <div style="width: 125px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            02
          </div>
          <div class="texto fz6 lh12">
            GOBIERNO LOCAL
          </div>
        </div>
        <div style="width: 125px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            03
          </div>
          <div class="texto fz6 lh12">
            GOBIERNO REGIONAL
          </div>
        </div>
        <div style="width: 125px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            04
          </div>
          <div class="texto fz6 lh12">
            SOCIEDAD BENEFICIENCIA PUBLICA
          </div>
        </div>
        <div style="width: 123px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            05
          </div>
          <div class="texto fz6 lh12">
            HOSPITAL
          </div>
        </div>
        <div style="width: 86.9px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            06
          </div>
          <div class="texto fz6 lh12">
            ENTIDAD REGIONAL
          </div>
        </div>
        <div style="width: 125px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            07
          </div>
          <div class="texto fz6 lh12">
            CUERPO DE GENERAL DE BOMBEROS
          </div>
        </div>
        <div style="width: 125px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            08
          </div>
          <div class="texto fz6 lh12">
            UNIVERSIDAD
          </div>
        </div>
        <div style="width: 125px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            09
          </div>
          <div class="texto fz6 lh12">
            CENTRO EDUCATIVO
          </div>
        </div>
        <div style="width: 125px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            10
          </div>
          <div class="texto fz6 lh12">
            COMUNIDAD CAMPESINA / NATIVA
          </div>
        </div>
        <div style="width: 123px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            11
          </div>
          <div class="texto fz6 lh12">
            ORGANIZACION INTERNACIONAL
          </div>
        </div>
        <div style="width: 86.9px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            12
          </div>
          <div class="texto fz6 lh12">
            ORGANIZACION POLITICA
          </div>
        </div>
        <div style="width: 125px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            13
          </div>
          <div class="texto fz6 lh12">
            PATRIMONIO CULTURAL DE LA NACIÓN
          </div>
        </div>
        <div style="width: 125px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            14
          </div>
          <div class="texto fz6 lh12">
            ORGANIZACIÓN SINDICAL
          </div>
        </div>
        <div style="width: 125px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            15
          </div>
          <div class="texto fz6 lh12">
            ORGANIZACIÓN DE DISCAPACITADO
          </div>
        </div>
        <div style="width: 125px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            16
          </div>
          <div class="texto fz6 lh12">
            PENSIONISTA
          </div>
        </div>
        <div style="width: 123px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            17
          </div>
          <div class="texto fz6 lh12">
            GOBIERNO EXTRANJERA
          </div>
        </div>
        <div style="width: 86.9px;height: 16px;float:left;" class="fondoclarito">

          <div class="texto fz8 lh14">

          </div>
        </div>
      </div>


        <!-- 29-->
      <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:2px;margin-bottom:2px">
        <div class="textotitulo tl pl15">
          CONDICION DEL PREDIO
        </div>
      </div>

      <!-- 30 -->
      <div style="width: 716px;height:32px;margin: auto;" class="bn">
        <div style="width: 248px;height: 64px;float:left;" class="bn">
          <div style="width: 228px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              48
            </div>
            <div class="texto fz8 lh14">
              CONDICION DEL TITULAR
            </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">

            @foreach ($ficha?->titulars as $titular )
                @if($titular?->nume_titular == 'TITULAR N° 1')
                    {{$titular?->cond_titular}}
                @endif
            @endforeach
          </div>
          <div style="width: 88px;height: 16px;float:left;" class="fondoclarito">
            <div class="numerosnc">
              01
            </div>
            <div class="texto fz6 lh12">
              PROPIETARIO UNICO
            </div>
          </div>
          <div style="width: 88px;height: 16px;float:left;" class="fondoclarito">
            <div class="numerosnc">
              02
            </div>
            <div class="texto fz6 lh12">
              SUCECION INTESTADA
            </div>
          </div>
          <div style="width: 69px;height: 16px;float:left;" class="fondoclarito">
            <div class="numerosnc">
              03
            </div>
            <div class="texto fz6 lh12">
              POSEEDOR
            </div>
          </div>
          <div style="width: 88px;height: 16px;float:left;" class="fondoclarito">
            <div class="numerosnc">
              04
            </div>
            <div class="texto fz6 lh12">
              SOCIEDAD CONYUGAL
            </div>
          </div>
          <div style="width: 88px;height: 16px;float:left;" class="fondoclarito">
            <div class="numerosnc">
              05
            </div>
            <div class="texto fz6 lh12">
              COTITULARIDAD
            </div>
          </div>
          <div style="width: 69px;height: 16px;float:left;" class="fondoclarito">
            <div class="numerosnc">
              06
            </div>
            <div class="texto fz6 lh12">
              LITIGIO
            </div>
          </div>
          <div style="width: 88px;height: 16px;float:left;" class="fondoclarito">
            <div class="numerosnc">
              07
            </div>
            <div class="texto fz6 lh12">
              OTROS(ESPECIFICAR)
            </div>
          </div>
          <div style="width: 88px;height: 16px;float:left;" class="texto2 fz8 lh14">

          </div>
          <div style="width: 68.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
          </div>

        </div>
        <div style="width: 105px;height: 64px;float:left;" class="bn">
          <div style="width: 104px;height: 32px;float:left;" class="fondoclaro">
            <div class="numeros">
              49
            </div>
            <div class="texto fz8 lh14">
              FECHA INICIO OCUPACION
            </div>
          </div>
          <div style="width: 104px;height: 32px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->condicionpredio?->fecha_ini!="")
            {{date("d/m/Y", strtotime($ficha?->condicionpredio?->fecha_ini))}}
            @endif
          </div>
        </div>
        <div style="width: 210px;height: 64px;float:left;" class="bn ">
          <div style="width: 189.9px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              50
            </div>
            <div class="texto fz8 lh14">
              INSCRIPCION EN LOS REGISTROS PUBLICOS
            </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->condicionpredio?->insc_rrpp}}
          </div>
          <div style="width: 104px;height: 16px;float:left;" class="fondoclarito">
            <div class="numerosnc">
              01
            </div>
            <div class="texto fz6 lh12">
              CÓDIGO
            </div>
          </div>
          <div style="width: 104px;height: 16px;float:left;" class="fondoclarito">
            <div class="numerosnc">
              02
            </div>
            <div class="texto fz6 lh12">
              CÓDIGO DE PREDIO
            </div>
          </div>
          <div style="width: 104px;height: 16px;float:left;" class="fondoclarito">
            <div class="numerosnc">
              03
            </div>
            <div class="texto fz6 lh12">
              FICHA
            </div>
          </div>
          <div style="width: 104px;height: 16px;float:left;" class="fondoclarito">
            <div class="numerosnc">
              04
            </div>
            <div class="texto fz6 lh12">
              TOMO / FOLIO
            </div>
          </div>
          <div style="width: 104px;height: 16px;float:left;" class="fondoclarito">
            <div class="numerosnc">
              05
            </div>
            <div class="texto fz6 lh12">
              ANTECEDENTE REGIONAL
            </div>
          </div>
          <div style="width: 103.9px;height: 16px;float:left;" class="">

          </div>
        </div>
        <div style="width: 76px;height: 64px;float:left;" class="bn">
          <div style="width: 76px;height: 32px;float:left;" class="fondoclaro">
            <div class="numeros">
              51
            </div>
            <div class="texto fz7 lh10">
              NUMERO PARTIDA REGISTRAL
            </div>
          </div>
          <div style="width: 76px;height: 32px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->condicionpredio?->num_part}}
          </div>
        </div>
        <div style="width: 76.9px;height: 64px;float:left;" class="bn">
          <div style="width: 76.9px;height: 32px;float:left;" class="fondoclaro">
            <div class="numeros">
              52
            </div>
            <div class="texto fz7 lh10">
              FECHA INSCRIPCION
            </div>
          </div>
          <div style="width: 76.9px;height: 32px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->condicionpredio?->fecha_insc!="")
              {{date("d/m/Y", strtotime($ficha?->condicionpredio?->fecha_insc))}}
            @endif
          </div>
        </div>
      </div>

      <div style="width: 716px;height:32px;margin: auto;" class="bn">
        <div style="width: 603px;height: 64px;float:left;" class="bn">
          <div style="width: 582.9px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              53
            </div>
            <div class="texto fz8 lh14">
              DOCUMENTO SOBRE PROPIEDAD
            </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->condicionpredio?->doc_propiedad}}
          </div>
          <div style="width: 106px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              01
            </div>
            <div class="texto fz6 lh12">
              COMPRA VENTA
            </div>
          </div>
          <div style="width: 123px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              02
            </div>
            <div class="texto fz6 lh12">
              SUCESION INTESTADA
            </div>
          </div>
          <div style="width: 123px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              03
            </div>
            <div class="texto fz6 lh12">
              TESTAMENTO
            </div>
          </div>
          <div style="width: 123px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              04
            </div>
            <div class="texto fz6 lh12">
              DONACION
            </div>
          </div>
          <div style="width: 122.9px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              05
            </div>
            <div class="texto fz6 lh12">
              ADJUDICACIÓN
            </div>
          </div>
          <div style="width: 106px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              06
            </div>
            <div class="texto fz6 lh12">
              FUSION
            </div>
          </div>
          <div style="width: 123px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              07
            </div>
            <div class="texto fz6 lh12">
              EXPROPIACION
            </div>
          </div>
          <div style="width: 123px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              08
            </div>
            <div class="texto fz6 lh12">
              PERMUTAS
            </div>
          </div>
          <div style="width: 123px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              09
            </div>
            <div class="texto fz6 lh12">
              PRESCRIPCION ADQUISITIVA
            </div>
          </div>
          <div style="width: 122.9px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              10
            </div>
            <div class="texto fz6 lh12">
              CESISION DE DERECHOS DE ACCIONES
            </div>
          </div>
          <div style="width: 106px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              11
            </div>
            <div class="texto fz6 lh12">
              DECLARATORIA DE HEREDEROS
            </div>
          </div>
          <div style="width: 247px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              12
            </div>
            <div class="texto fz6 lh12">
              ADJUDICACION DE REFORMA AGRARIA(GRATUITA / ONEROSA)
            </div>
          </div>
          <div style="width: 123px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              13
            </div>
            <div class="texto fz6 lh12">
              SENTENCIA JUDICIAL
            </div>
          </div>
          <div style="width: 122.9px;height: 16px;float:left;" class=" fondoclarito ">
            <div class="numerosnc fondoclarito">
              14
            </div>
            <div class="texto fz6 lh12">
              OTROS(ESPECIFICAR)
            </div>
          </div>
        </div>
        <div style="width: 113px;height: 64px;float:left;" class="bn">
          <div style="width: 113px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              54
            </div>
            <div class="texto fz8 lh14">
              FECHA DE ADQUISICIÓN
            </div>
          </div>
          <div style="width: 113px;height: 48px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->condicionpredio?->fecha_adq!="")
              {{date("d/m/Y", strtotime($ficha?->condicionpredio?->fecha_adq))}}
            @endif
          </div>
        </div>
      </div>




      <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
        <div class="textotitulo tl pl15">
          DOCUMENTOS SOBRE POSESIÓN
        </div>
      </div>

      <div style="width: 716px;height:32px;margin: auto;" class="bn">
        <div style="width: 249px;height: 112px;float:left;" class="bn">
          <div style="width: 248px;height: 16px;float:left;" class=" fondoclaro ">
            <div class="numeros fondoclaro">
              55
            </div>
            <div class="texto fz8 lh14">
              PRUEBAS OBLIGATORIAS
            </div>
          </div>

          <div style="width: 228.9px;height: 32px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
              1
            </div>
            <div class="texto fz6 lh12">
              DECLARACION JURADA DE TODOS LOS COLINDANTES O SEIS VECINOS
            </div>
          </div>
          <div style="width: 18px;height: 32px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->documentoposesion != "")
              {{$ficha?->documentoposesion?->pru_ob1}}
            @endif
          </div>

          <div style="width: 228.9px;height: 32px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
              2
            </div>
            <div class="texto fz6 lh12">
              DD.JJ. DE COMITES, FONDOS U ORGANIZACION DE PRODUCTORES
            </div>
          </div>
          <div style="width: 18px;height: 32px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->documentoposesion != "")
              {{$ficha?->documentoposesion?->pru_ob2}}
            @endif
          </div>

          <div style="width: 228.9px;height: 32px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
              3
            </div>
            <div class="texto fz6 lh12">
              DD.JJ. DE COMITES, COMISIONES O JUNTA DE USUARIOS DE AGUA
            </div>
          </div>
          <div style="width: 18px;height: 32px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->documentoposesion != "")
              {{$ficha?->documentoposesion?->pru_ob3}}
            @endif
          </div>

        </div>
        <div style="width: 467px;height: 112px;float:left;" class="bn">
          <div style="width: 467px;height: 16px;float:left;" class=" fondoclaro ">
            <div class="numeros fondoclaro">
              56
            </div>
            <div class="texto fz8 lh14">
              PRUEBAS COMPLEMENTARIAS
            </div>
          </div>
          <div style="width: 125px;height: 32px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
              1
            </div>
            <div class="texto fz5 lh8">
              DOCUMENTO QUE ACREDITE PRESTAMO O ADELANTO DE PRESTAMOS POR CREDITO AGRARIO
            </div>
          </div>
          <div style="width: 18px;height: 32px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->documentoposesion != "")
              {{$ficha?->documentoposesion?->pru_comp1}}
            @endif
          </div>

          <div style="width: 142px;height: 32px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
              02
            </div>
            <div class="texto fz5 lh8">
              DECLARACION JURADA DE PAGO DEL IMPUESTO PREDIAL
            </div>
          </div>
          <div style="width: 18px;height: 32px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->documentoposesion != "")
              {{$ficha?->documentoposesion?->pru_comp2}}
            @endif
          </div>

          <div style="width: 140px;height: 32px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
              3
            </div>
            <div class="texto fz5 lh8">
              DOCUMENTO PUBLICO O DOCUMENTO PRIVADO, DE TRANSFERENCIA DE POSESION
            </div>
          </div>
          <div style="width: 18px;height: 32px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->documentoposesion != "")
              {{$ficha?->documentoposesion?->pru_comp3}}
            @endif
          </div>


          <div style="width: 125px;height: 32px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
              4
            </div>
            <div class="texto fz5 lh8">
              INSPECCIÓN JUDICIAL DE TIERRAS EN PROCESO DE PRUEBA ANTICIPADA
            </div>
          </div>
          <div style="width: 18px;height: 32px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->documentoposesion != "")
              {{$ficha?->documentoposesion?->pru_comp4}}
            @endif
          </div>

          <div style="width: 142px;height: 32px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
              5
            </div>
            <div class="texto fz5 lh8">
              DECLARACION JURADA DE PAGO DEL IMPUESTO PREDIAL.
            </div>
          </div>
          <div style="width: 18px;height: 32px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->documentoposesion != "")
              {{$ficha?->documentoposesion?->pru_comp5}}
            @endif
          </div>

          <div style="width: 140px;height: 32px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
              6
            </div>
            <div class="texto fz5 lh8">
              CERTIFICADO EXPEDIDO A NOMBRE DEL POSEEDOR POR EL INEI
            </div>
          </div>
          <div style="width: 18px;height: 32px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->documentoposesion != "")
              {{$ficha?->documentoposesion?->pru_comp6}}
            @endif
          </div>


          <div style="width: 125px;height: 32px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
              7
            </div>
            <div class="texto fz5 lh8">
              CERTIFICADO DEL PADRON CATASTRAL DE LA DGRAAR, QUE CONSTE LA INSCRIPCIÓN DEL POSEEDOR SOLICITANTE.
            </div>
          </div>
          <div style="width: 18px;height: 32px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->documentoposesion != "")
              {{$ficha?->documentoposesion?->pru_comp7}}
            @endif
          </div>

          <div style="width: 142px;height: 32px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
              8
            </div>
            <div class="texto fz5 lh8">
              RECIBOS A NOMBRE DEL POSEEDOR POR CONCEPTO DE USO DE AGUA DE RIEGO, INSUMOS, MAQUINAS U OTROS.
            </div>
          </div>
          <div style="width: 18px;height: 32px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->documentoposesion != "")
              {{$ficha?->documentoposesion?->pru_comp8}}
            @endif
          </div>

          <div style="width: 140px;height: 32px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
              9
            </div>
            <div class="texto fz5 lh8">
              CONTRATO DE COMPRA VENTA DE LA PRODUCCION AGRARIA, PRECUARIA O FORESTAL
            </div>
          </div>
          <div style="width: 18px;height: 32px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->documentoposesion != "")
              {{$ficha?->documentoposesion?->pru_comp9}}
            @endif
          </div>


          <div style="width: 125px;height: 32px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
              10
            </div>
            <div class="texto fz5 lh8">
              CERTIFICADO DE INSCRIPCION DE MARCAS Y SEÑALES DE GANADO EXPEDIDO A NOMBRE DEL POSEEDOR
            </div>
          </div>
          <div style="width: 18px;height: 32px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->documentoposesion != "")
              {{$ficha?->documentoposesion?->pru_comp10}}
            @endif
          </div>

          <div style="width: 142px;height: 32px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
              11
            </div>
            <div class="texto fz5 lh8">
              CONSTANCIA DE REGISTRO DEL POSEEDOR INSCRITO EN EL REGISTRO DE ANA
            </div>
          </div>
          <div style="width: 18px;height: 32px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->documentoposesion != "")
              {{$ficha?->documentoposesion?->pru_comp11}}
            @endif
          </div>

          <div style="width: 140px;height: 32px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
              12
            </div>
            <div class="texto fz5 lh8">
              CERTIFICADO A NOMBRE DEL POSEEDOR DE DEUDAS CON FONDEAGRO, MINEAGRI U OTRA ENTIDAD FINANCIERA
            </div>
          </div>
          <div style="width: 18px;height: 32px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->documentoposesion != "")
              {{$ficha?->documentoposesion?->pru_comp12}}
            @endif
          </div>


          <div style="width: 125px;height: 32px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
              13
            </div>
            <div class="texto fz5 lh8">
              CERTIFICADO EN QUE CONSTE QUE EL POSEEDOR FUE PRESTATARIO DEL BANCO AGRARIO.
            </div>
          </div>
          <div style="width: 18px;height: 32px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->documentoposesion != "")
              {{$ficha?->documentoposesion?->pru_comp13}}
            @endif
          </div>

          <div style="width: 142px;height: 32px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
              14
            </div>
            <div class="texto fz5 lh8">
              CONSTANCIA DE POSESION OTORGADA POR LA AGENCIA AGRARIA O MUNICIPALIDAD DISTRITAL RESPECTIVA
            </div>
          </div>
          <div style="width: 18px;height: 32px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->documentoposesion != "")
              {{$ficha?->documentoposesion?->pru_comp14}}
            @endif
          </div>

          <div style="width: 140px;height: 32px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
              15
            </div>
            <div class="texto fz5 lh8">
              CUALQUIER OTRO DOCUMENTO DE FECHA CIERTA QUE ACREDITA LA POSESION
            </div>
          </div>
          <div style="width: 18px;height: 32px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->documentoposesion != "")
              {{$ficha?->documentoposesion?->pru_comp15}}
            @endif
          </div>
        </div>
      </div>



      <div style="height:7px; width:800px;background-color:#fff;border:none;">
        <div class="textotitulo tl pl15">
          CARACTERISTICAS TECNICAS DEL PREDIO
        </div>
      </div>

      <div style="width: 716px;height:32px;margin: auto;" class="bn">
        <div style="width: 157px;height: 48px;float:left;" class="bn">
          <div style="width: 156px;height: 16px;float:left;" class=" fondoclaro">
            <div class="numeros fondoclaro">
              57
            </div>
            <div class="texto fz8 lh14">
              AREA DEL TERRENO(HA)
            </div>
          </div>
          <div style="width: 156px;height: 48px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->caracteristicarural != "")
              {{$ficha?->caracteristicarural?->area_terreno}}
            @endif
          </div>
        </div>
        <div style="width: 157px;height: 48px;float:left;" class="bn">
          <div style="width: 156px;height: 16px;float:left;" class=" fondoclaro">
            <div class="numeros fondoclaro">
              58
            </div>
            <div class="texto fz8 lh14">
              AREA DECLARADA(HA)
            </div>
          </div>
          <div style="width: 156px;height: 48px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->caracteristicarural != "")
              {{$ficha?->caracteristicarural?->area_decl}}
            @endif
          </div>

        </div>
        <div style="width: 402px;height: 48px;float:left;" class="bn ">
          <div style="width: 402px;height: 16px;float:left;" class=" fondoclaro">
            <div class="numeros fondoclaro">
              59
            </div>
            <div class="texto fz8 lh14">
              VIVIENDA / CONSTRUCCIONES E INSTALACIONES
            </div>
          </div>

          <div style="width: 114px;height: 16px;float:left;" class=" fondoclarito">
            <div class="numerosnc ">
              01
            </div>
            <div class="texto fz6 lh10">
              VIVIENDA
            </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->caracteristicarural != "")
              {{$ficha?->caracteristicarural?->vivienda}}
            @endif
          </div>


          <div style="width: 114px;height: 16px;float:left;" class=" fondoclarito">
            <div class="numerosnc ">
              02
            </div>
            <div class="texto fz6 lh10">
              ESTABLO
            </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->caracteristicarural != "")
              {{$ficha?->caracteristicarural?->establo}}
            @endif
          </div>


          <div style="width: 113.9px;height: 16px;float:left;" class=" fondoclarito">
            <div class="numerosnc ">
              03
            </div>
            <div class="texto fz6 lh10">
              CORRAL
            </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->caracteristicarural != "")
              {{$ficha?->caracteristicarural?->corral}}
            @endif
          </div>



          <div style="width: 114px;height: 16px;float:left;" class=" fondoclarito">
            <div class="numerosnc ">
              04
            </div>
            <div class="texto fz6 lh10">
              GALPÓN
            </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->caracteristicarural != "")
              {{$ficha?->caracteristicarural?->galpon}}
            @endif
          </div>


          <div style="width: 114px;height: 16px;float:left;" class=" fondoclarito">
            <div class="numerosnc ">
              05
            </div>
            <div class="texto fz6 lh10">
              INVERNADERO
            </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->caracteristicarural != "")
              {{$ficha?->caracteristicarural?->invernadero}}
            @endif
          </div>


          <div style="width: 113.9px;height: 16px;float:left;" class=" fondoclarito">
            <div class="numerosnc ">
              06
            </div>
            <div class="texto fz6 lh10">
              RESERVORIO
            </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->caracteristicarural != "")
              {{$ficha?->caracteristicarural?->reservorio}}
            @endif
          </div>



          <div style="width: 114px;height: 16px;float:left;" class=" fondoclarito">
            <div class="numerosnc ">
              07
            </div>
            <div class="texto fz6 lh10">
              DEPOSITO
            </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->caracteristicarural != "")
              {{$ficha?->caracteristicarural?->deposito}}
            @endif
          </div>


          <div style="width: 114px;height: 16px;float:left;" class=" fondoclarito">
            <div class="numerosnc ">
              08
            </div>
            <div class="texto fz6 lh10">
              SITIO Y ZONA ARQUEOLOGICA
            </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->caracteristicarural != "")
              {{$ficha?->caracteristicarural?->zona_arque}}
            @endif
          </div>


          <div style="width: 113.9px;height: 16px;float:left;" class=" fondoclarito">
            <div class="numerosnc ">
              09
            </div>
            <div class="texto fz6 lh10">
              OTROS..........................
            </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->caracteristicarural != "")
              {{$ficha?->caracteristicarural?->otros}}
            @endif
          </div>
        </div>
      </div>


      <!-- 49 AL 55-->
      <div style="height:7px; width:800px;background-color:#fff;border:none;">
        <div class="textotitulo tl pl15">
          CARACTERISTICAS DE LA VIVIENDA
        </div>
      </div>

      <!--CONSTRUCCIONES-->

      <div style="width: 716px;height:48px;margin: auto;" class="fondoclaro">

        <div style="width: 60px;height: 48px;float:left;">
          <div class="numeros">
            60
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
              61
            </div>
            <div class="texto fz8 lh14">
            FECHA DE CONSTRUCCION
            </div>
          </div>
          <div style="width: 80px;height: 16px;float:left;border:none;">
            <div style="width: 39px;height: 16px;float:left;border-left:none;">
              MES
            </div>
            <div style="width: 39px;height: 16px;float:left;">
              AÑO
            </div>
          </div>
        </div>
        <div style="width: 36px;height: 48px;float:left;">
          <div class="numeros">
            62
          </div>
          <div class="texto fz8 lh14">
            MEP
          </div>
        </div>
        <div style="width: 36px;height: 48px;float:left;">
          <div class="numeros">
            63
          </div>
          <div class="texto fz8 lh14">
            ECS
          </div>
        </div>
        <div style="width: 36px;height: 48px;float:left;">
          <div class="numeros">
            64
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
                      65
                    </div>
                    <div class="texto" style="font-size:4px;">
                      MUROS Y <BR>COLUMNAS
                    </div>
                  </div>
                  <div style="width: 43.9px;height: 16px;float:left;">
                    <div class="numeros">
                      66
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
                      67
                    </div>
                    <div class="texto" style="font-size:4px;">
                      PISOS
                    </div>
                  </div>
                  <div style="width: 49px;height: 16px;float:left;">
                    <div class="numeros">
                      68
                    </div>
                    <div class="texto" style="font-size:4px;">
                      PUERTAS Y <BR>VENTANAS
                    </div>
                  </div>
                  <div style="width: 49px;height: 16px;float:left;">
                    <div class="numeros">
                      69
                    </div>
                    <div class="texto" style="font-size:4px;">
                      REVEST.
                    </div>

                  </div>
                  <div style="width: 48.9px;height: 16px;float:left;">
                    <div class="numeros">
                      70
                    </div>
                    <div class="texto" style="font-size:4px;">
                      BAÑOS
                    </div>
                  </div>
                </div>

              </div>
              <div style="width: 48.9px;height: 32px;float:left;">
                <div class="numeros">
                  71
                </div>
                <div class="texto" style="font-size:4px;">
                  INST. ELECTRICAS SANITARIAS
                </div>
              </div>
            </div>
          </div>
        </div>
        <div style="width: 123px;height: 48px;float:left;border:none;">
          <div style="width: 123px;height: 16px;float:left;">
              ÁREA CONSTRUIDA(M2)
          </div>
          <div style="width: 123px;height: 32px;float:left;border:none;">
            <div style="width: 123px;height: 32px;float:left;">
              <div class="numeros">
                72
              </div>
              <div class="texto fz8 lh14">
                AREA VERIFICADA
              </div>
            </div>
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

        <div style="width: 49px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$construccion?->inst_elect_sanita}}
        </div>

        <div style="width: 123px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$construccion?->area_verificada}}
        </div>
      </div>
      @endforeach
      <!-- 70 -->
      <div style="width: 716px;height:48px;margin: auto;">
        <div style="width: 158px;height: 16px;float:left;" class="fondoclaro">
          <div class="texto fz8 lh14">
            MEP: MATERIAL
          </div>
        </div>
        <div style="width: 141px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            01
          </div>
          <div class="texto fz6 lh10">
            CONCRETO
          </div>
        </div>
        <div style="width: 141px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            02
          </div>
          <div class="texto fz6 lh10">
            LADRILLO
          </div>
        </div>
        <div style="width: 141px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            03
          </div>
          <div class="texto fz6 lh10">
            ADOBE (QUINCHA, MADERA)
          </div>
        </div>
        <div style="width: 130px;height: 16px;float:left;" class="">

        </div>


        <div style="width: 158px;height: 16px;float:left;" class="fondoclaro">
          <div class="texto fz8 lh14">
            ECS: ESTADO DE CONSERVACIÓN
          </div>
        </div>
        <div style="width: 141px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            01
          </div>
          <div class="texto fz6 lh10">
            MUY BUENO
          </div>
        </div>
        <div style="width: 141px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            02
          </div>
          <div class="texto fz6 lh10">
            BUENO
          </div>
        </div>
        <div style="width: 141px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            03
          </div>
          <div class="texto fz6 lh10">
            REGULAR
          </div>
        </div>
        <div style="width: 130px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            04
          </div>
          <div class="texto fz6 lh10">
            MALO
          </div>
        </div>



        <div style="width: 158px;height: 16px;float:left;" class="fondoclaro">
          <div class="texto fz8 lh14">
            ECC: ESTADO DE LA CONSTRUCCIÓN
          </div>
        </div>
        <div style="width: 141px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            01
          </div>
          <div class="texto fz6 lh10">
            TERMINADO
          </div>
        </div>
        <div style="width: 141px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            02
          </div>
          <div class="texto fz6 lh10">
            EN CONSTRUCCIÓN
          </div>
        </div>
        <div style="width: 141px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            03
          </div>
          <div class="texto fz6 lh10">
            INCONCLUSA
          </div>
        </div>
        <div style="width: 130px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            04
          </div>
          <div class="texto fz6 lh10">
            EN RUINAS
          </div>
        </div>

      </div>
      <!-- 70 -->
      <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
        <div class="textotitulo tl pl15">
          CARACTERISTICAS DE LAS CONSTRUCCIONES E INSTALACIONES
        </div>
      </div>

    <!-- 71 - 69 -->
      <div style="width: 716px;height:32px;margin: auto;" class="fondoclaro">
        <div style="width: 64px;height: 32px;float:left;">
          <div class="numeros">
            73
          </div>
          <div class="texto fz8 lh14">
            TIPO
          </div>
        </div>
        <div style="width: 64px;height: 32px;float:left;">
          <div class="numeros">
              74
          </div>
          <div class="texto fz8 lh14">
            CANTIDAD
          </div>
        </div>

        <div style="width: 105px;height: 32px;float:left;border:none;">
          <div style="width: 105px;height: 16px;float:left;">
            <div class="numeros">
                75
            </div>
            <div class="texto fz8 lh14">
              AREAS
            </div>
          </div>
          <div style="width: 105px;height: 16px;float:left;border:none;">
            <div style="width: 51px;height: 16px;float:left;">
              <div class="texto fz8 lh14">
                (M2)
              </div>
            </div>
            <div style="width: 51.9px;height: 16px;float:left;">
              <div class="texto fz8 lh14">
                %
              </div>
            </div>
          </div>
        </div>
        <div style="width: 70px;height: 32px;float:left;" class="bn">
          <div style="width: 70px;height: 16px;float:left;">
            <div class="texto fz8 lh14">
              VOLUMEN
            </div>
          </div>
          <div style="width: 70px;height: 16px;float:left;">
            <div class="texto fz8 lh14">
              (M3)
            </div>
          </div>
        </div>
        <div style="width: 106;height: 32px;float:left;">
          <div class="numeros">
              76
          </div>
          <div class="texto fz8 lh14">
            FECHA DE CONSTRUCCION AÑO
          </div>
        </div>
        <div style="width: 106px;height: 32px;float:left;">
          <div class="numeros">
              77
          </div>
          <div class="texto fz8 lh14">
            MATERIAL ESTRUCTURAL PREDOMINANTE
          </div>
        </div>
        <div style="width: 98px;height: 32px;float:left;">
          <div class="numeros">
              78
          </div>
          <div class="texto fz8 lh14">
            ESTADO DE CONSERVACION
          </div>
        </div>
        <div style="width: 96.9px;height: 32px;float:left;">
          <div class="numeros">
              79
          </div>
          <div class="texto fz8 lh14">
            ESTADO DE CONSTRUCCIÓN
          </div>
        </div>
      </div>
      <!--FOREACH 71 - 69-->
      @foreach($ficha?->instalacionrural as $instalacion)
      <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 64px;height: 16px;float:left;">
          <div class="texto fz7 lh10">
          {{$instalacion?->tipo_ins}}
          </div>
        </div>
        <div style="width: 64px;height: 16px;float:left;">
          <div class="texto fz7 lh10">
          {{$instalacion?->cantidad}}
          </div>
        </div>
        <div style="width: 51px;height: 16px;float:left;">
          <div class="texto fz7 lh10">
          {{$instalacion?->area_porcentaje}}
          </div>
        </div>
        <div style="width: 51px;height: 16px;float:left;">
          <div class="texto fz7 lh10">
          {{$instalacion?->area_const}}
          </div>
        </div>
        <div style="width: 70px;height: 16px;float:left;">
          <div class="texto fz7 lh10">
          {{$instalacion?->volumen}}
          </div>
        </div>
        <div style="width: 106px;height: 16px;float:left;">
          <div class="texto fz7 lh10">
          @if($instalacion?->fecha_const != "")
            {{date("d/m/Y", strtotime($instalacion?->fecha_const))}}
          @endif
          </div>
        </div>
        <div style="width: 106px;height: 16px;float:left;">
          <div class="texto fz7 lh10">
          {{$instalacion?->material_est}}
          </div>
        </div>
        <div style="width: 98px;height: 16px;float:left;">
          <div class="texto fz7 lh10">
          {{$instalacion?->estado_conserva}}
          </div>
        </div>
        <div style="width: 96.9px;height: 16px;float:left;">
          <div class="texto fz7 lh10">
          {{$instalacion?->estado_construc}}
          </div>
        </div>
      </div>
    @endforeach
      <div style="width: 716px;height:32px;margin: auto;" class="fondoclaro">

        <div style="width: 158px;height: 16px;float:left;" class="fondoclaro">
          <div class="texto fz8 lh14">
            MATERIAL ESTRUCTURAL PREDOMINANTE
          </div>
        </div>
        <div style="width: 91px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            01
          </div>
          <div class="texto fz6 lh10">
            CONCRETO
          </div>
        </div>
        <div style="width: 92px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            02
          </div>
          <div class="texto fz6 lh10">
            LADRILLO
          </div>
        </div>
        <div style="width: 92px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            03
          </div>
          <div class="texto fz6 lh10">
            ADOBE
          </div>
        </div>
        <div style="width: 92px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            04
          </div>
          <div class="texto fz6 lh10">
            QUINCHA
          </div>
        </div>
        <div style="width: 92px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            05
          </div>
          <div class="texto fz6 lh10">
            MADERA
          </div>
        </div>
        <div style="width: 92px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            06
          </div>
          <div class="texto fz6 lh10">
            OTROS(ESPECIFICAR)
          </div>
        </div>

        <div style="width: 158px;height: 16px;float:left;" class="fondoclaro">
          <div class="texto fz8 lh12">
            ESTADO DE CONSERVACIÓN
          </div>
        </div>
        <div style="width: 91px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            01
          </div>
          <div class="texto fz6 lh10">
            MUY BUENO
          </div>
        </div>
        <div style="width: 92px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            02
          </div>
          <div class="texto fz6 lh10">
            BUENO
          </div>
        </div>
        <div style="width: 92px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            03
          </div>
          <div class="texto fz6 lh10">
            REGULAR
          </div>
        </div>
        <div style="width: 92px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            04
          </div>
          <div class="texto fz6 lh10">
            MALO
          </div>
        </div>
        <div style="width: 92px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            05
          </div>
          <div class="texto fz6 lh10">
            MUY MALO
          </div>
        </div>
        <div style="width: 92px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">

          </div>
          <div class="texto fz6 lh10">

          </div>
        </div>



        <div style="width: 158px;height: 16px;float:left;" class="fondoclaro">
          <div class="texto fz8 lh12">
            ESTADO DE CONSTRUCCION
          </div>
        </div>
        <div style="width: 91px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            01
          </div>
          <div class="texto fz6 lh10">
            TERMINADO
          </div>
        </div>
        <div style="width: 92px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            02
          </div>
          <div class="texto fz6 lh10">
            EN CONSTRUCCIÓN
          </div>
        </div>
        <div style="width: 92px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            03
          </div>
          <div class="texto fz6 lh10">
            INCONCLUSA
          </div>
        </div>
        <div style="width: 92px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            04
          </div>
          <div class="texto fz6 lh10">
            EN RUINAS
          </div>
        </div>
        <div style="width: 92px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">
            05
          </div>
          <div class="texto fz6 lh10">
            OTROS (ESPECIFICAR)
          </div>
        </div>
        <div style="width: 92px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc">

          </div>
          <div class="texto fz6 lh10">

          </div>
        </div>
      </div>
      <!--FOREACH 71 - 69-->
    <!-- 71 - 69 -->
    <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
      <div class="textotitulo tl pl15">
        DESCRIPCIÓN DEL PREDIO
      </div>
    </div>

    <!-- 71 - 69 -->
    <!-- DOCUMENTOS -->
    <div style="width: 716px;height:32px;margin: auto;" class="bn">
      <div style="width: 113.9px;height: 16px;float:left;" class=" fondoclaro">
        <div class="numeros fondoclaro">
          80
        </div>
        <div class="texto fz8 lh14">
          CÓDIGO DE USO
        </div>
      </div>
      <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
        {{$ficha?->ficharural?->codi_uso}}
      </div>
      <div style="width: 99px;height: 16px;float:left;" class=" fondoclarito">
        <div class="numerosnc fondoclarito">
          01
        </div>
        <div class="texto fz5 lh10">
          TERRENO DE CULTIVO
        </div>
      </div>
      <div style="width: 70px;height: 16px;float:left;" class=" fondoclarito">
        <div class="numerosnc fondoclarito">
          02
        </div>
        <div class="texto fz5 lh10">
          TERRENO DESNUDO
        </div>
      </div>
      <div style="width: 70px;height: 16px;float:left;" class=" fondoclarito">
        <div class="numerosnc fondoclarito">
          03
        </div>
        <div class="texto fz5 lh10">
          COBERTURA ARBOREA
        </div>
      </div>
      <div style="width: 180px;height: 16px;float:left;" class=" fondoclaro">
        <div class="numerosnc fondoclaro">
          81
        </div>
        <div class="texto fz8 lh14">
          CLASIFICACION DE USO ACTUAL
        </div>
      </div>
      <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$ficha?->ficharural?->clasi_uso}}
      </div>
      <div style="width: 69px;height: 16px;float:left;" class=" fondoclarito">
        <div class="numerosnc fondoclarito">
          01
        </div>
        <div class="texto fz6 lh10">
          AGRICOLA
        </div>
      </div>
      <div style="width: 69px;height: 16px;float:left;" class=" fondoclarito">
        <div class="numerosnc fondoclarito">
          02
        </div>
        <div class="texto fz6 lh10">
          GANADERO
        </div>
      </div>
      <div style="width: 114px;height: 16px;float:left;" class=" fondoclarito">
        <div class="numerosnc fondoclarito">
          04
        </div>
        <div class="texto fz6 lh10">
          PASTOS NATURALES
        </div>
      </div>
      <div style="width: 94px;height: 16px;float:left;" class=" fondoclarito">
        <div class="numerosnc fondoclarito">
          05
        </div>
        <div class="texto fz6 lh10">
          USO NO AGRICOLA
        </div>
      </div>
      <div style="width: 94px;height: 16px;float:left;" class=" fondoclarito">
        <div class="numerosnc fondoclarito">
          06
        </div>
        <div class="texto fz6 lh10">
          TURISTICO / RECREACIONAL
        </div>
      </div>
      <div style="width: 70px;height: 16px;float:left;" class=" fondoclarito">
        <div class="numerosnc fondoclarito">
          07
        </div>
        <div class="texto fz6 lh10">
          ERÍAZO
        </div>
      </div>
      <div style="width: 96px;height: 16px;float:left;" class=" fondoclarito">
        <div class="numerosnc fondoclarito">
          03
        </div>
        <div class="texto fz6 lh10">
          AVICOLA
        </div>
      </div>
      <div style="width: 102px;height: 16px;float:left;" class=" fondoclarito">
        <div class="numerosnc fondoclarito">
          04
        </div>
        <div class="texto fz6 lh10">
          FORESTAL
        </div>
      </div>
      <div style="width: 69px;height: 16px;float:left;" class=" fondoclarito">
        <div class="numerosnc fondoclarito">
          05
        </div>
        <div class="texto fz6 lh10">
          AGROINDUSTRIAL
        </div>
      </div>
      <div style="width: 68.9px;height: 16px;float:left;" class=" fondoclarito">
        <div class="numerosnc fondoclarito">
          06
        </div>
        <div class="texto fz5 lh8">
          OTROS (ESPECIFICAR)
        </div>
      </div>
    </div>
      <!-- LEYENDA TIPO VIA TIPO PUERTA-->
    <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
      <div class="textotitulo tl pl15">
        EXPLOTACIÓN DEL PREDIO Y CLASIFICACIÓN TIERRAS POR SU CAPACIDAD DE USO MAYOR
      </div>
    </div>

      <!-- 79 AL 80-->
      <div style="width: 716px;height:16px;margin: auto;" class="bn">

        <div style="width: 390px;height: 16px;float:left;"  class=" bn" >
          <div style="width: 390px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              82
            </div>
            <div class="texto fz8 lh14">
              AGRICOLA
            </div>
          </div>
          <div style="width: 140px;height: 32px;float:left;"  class="fondoclaro bn">
            <div style="width: 140px;height: 16px;float:left;"  class="fondoclaro">

            <div class="texto fz6 lh10">
              USO ACTUAL
            </div>
            </div>
            <div style="width: 20px;height: 16px;float:left;"  class="fondoclaro">
              <div class="texto fz6 lh10">
                TIPO
              </div>
            </div>
            <div style="width: 40px;height: 16px;float:left;"  class="fondoclaro">
              <div class="texto fz6 lh10">
              AREA %
              </div>

            </div>
            <div style="width: 76.9px;height: 16px;float:left;"  class="fondoclaro">

              <div class="texto fz6 lh10">
              DESCRIPCION
              </div>
            </div>
          </div>
          <div style="width: 110px;height: 32px;float:left;"  class="fondoclaro bn">
            <div style="width: 110px;height: 16px;float:left;"  class="fondoclaro">

              <div class="texto fz6 lh10">
              ESTIMADO EN CAMPO(*)
              </div>
            </div>
            <div style="width: 36px;height: 16px;float:left;"  class="fondoclaro">
              <div class="texto fz6 lh10">
              GRUPO
              </div>
            </div>
            <div style="width: 35px;height: 16px;float:left;"  class="fondoclaro">
              <div class="texto fz6 lh10">
              CLASE
              </div>

            </div>
            <div style="width: 35.9px;height: 16px;float:left;"  class="fondoclaro">
              <div class="texto fz6 lh10">
              AREA %
              </div>
            </div>
          </div>
          <div style="width: 110px;height: 32px;float:left;"  class="fondoclaro bn">
            <div style="width: 110px;height: 16px;float:left;"  class="fondoclaro">
              <div class="texto fz6 lh7">
              CLASIFICACION DE TIERRAS SEGUN ESTUDIO CT-CUM
              </div>
            </div>
            <div style="width: 36px;height: 16px;float:left;"  class="fondoclaro">
              <div class="texto fz6 lh10">
              GRUPO
              </div>
            </div>
            <div style="width: 35px;height: 16px;float:left;"  class="fondoclaro">
              <div class="texto fz6 lh10">
              CLASE
              </div>
            </div>
            <div style="width: 35.9px;height: 16px;float:left;"  class="fondoclaro">
              <div class="texto fz6 lh10">
              AREA %
              </div>
            </div>
          </div>
          <div style="width: 28.9px;height: 32px;float:left;"  class="fondoclaro">
            N° PLANTAS
          </div>



          <!--####################################################-->
          <!--####################################################-->
          <!--#####################FOREACH########################-->
          <!--####################################################-->
          <!--####################################################-->
          @foreach($ficha?->agricolapredios as $agricola)
          <div style="width: 20px;height: 16px;float:left;"  class="texto2 fz8 lh14">
            {{$agricola?->tipo_agricola}}
          </div>
          <div style="width: 40px;height: 16px;float:left;"  class="texto2 fz8 lh14">
            {{$agricola?->area_agricola}}
          </div>
          <div style="width: 76.9px;height: 16px;float:left;"  class="texto2 fz8 lh14">
            {{$agricola?->descripcion_agricola}}
          </div>
          <div style="width: 36px;height: 16px;float:left;"  class="texto2 fz8 lh14">
          {{$agricola?->grupo_agricola_campo}}
          </div>
          <div style="width: 35px;height: 16px;float:left;"  class="texto2 fz8 lh14">
          {{$agricola?->clase_agricola_campo}}
          </div>
          <div style="width: 35.9px;height: 16px;float:left;"  class="texto2 fz8 lh14">
          {{$agricola?->area_agricola_campo}}
          </div>
          <div style="width: 36px;height: 16px;float:left;"  class="texto2 fz8 lh14">
          {{$agricola?->grupo_agricola_tierras}}
          </div>
          <div style="width: 35px;height: 16px;float:left;"  class="texto2 fz8 lh14">
          {{$agricola?->clase_agricola_tierras}}
          </div>
          <div style="width: 35.9px;height: 16px;float:left;"  class="texto2 fz8 lh14">
          {{$agricola?->area_agricola_tierras}}
          </div>
          <div style="width: 28.9px;height: 16px;float:left;"  class="texto2 fz8 lh14">
            {{$agricola?->numero_plantas}}
          </div>
          @endforeach
          <!--####################################################-->
          <!--####################################################-->
          <!--#####################FOREACH########################-->
          <!--####################################################-->
          <!--####################################################-->
        </div>


        <div style="width: 326px;height: 16px;float:left;"  class="bn" >
          <div style="width: 326px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              83
            </div>
            <div class="texto fz8 lh14">
              GANADERIA / CRIANZA
            </div>
          </div>
          <div style="width: 90px;height: 16px;float:left;" class="fondoclaro">
            <div class="texto fz8 lh14">
              TIPO
            </div>
          </div>
          <div style="width: 176px;height: 16px;float:left;" class="fondoclaro">
            <div class="texto fz8 lh14">
              RAZA / ESPECIE
            </div>
          </div>
          <div style="width: 56.9px;height: 16px;float:left;" class="fondoclaro">
            <div class="texto fz8 lh14">
              CANTIDAD
            </div>
          </div>






          <!--###################VACUNOS##############################-->
          <!--###################VACUNOS##############################-->
          <!--###################VACUNOS##############################-->
          <!--###################VACUNOS##############################-->

          @foreach($ficha?->ganaderiarural as $ganaderia)
          <div style="width: 90px;height: 16px;float:left;" class="fondoclaro">
            <div class="texto fz8 lh14">
              {{$ganaderia?->tipo_ganaderia}}
            </div>
          </div>
          <div style="width: 176px;height: 16px;float:left;" class="texto2 fz8 lh14">
            <div class="texto fz8 lh14">
              {{$ganaderia?->raza_especio}}
            </div>
          </div>
          <div style="width: 56.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
            <div class="texto fz8 lh14">
              {{$ganaderia?->cantidad_ganderia}}
            </div>
          </div>
          @endforeach
          <!--###################VACUNOS##############################-->
          <!--###################VACUNOS##############################-->
          <!--###################VACUNOS##############################-->
          <!--###################VACUNOS##############################-->



        </div>
      </div>
      <div style="width: 716px;height:16px;margin: auto;" class="bn ">
        <div style="width: 373px;height: 16px;float:left;"  class="bn " >
          <div style="width: 53px;height: 16px;float:left;" class="fondoclaro">
            <div class="texto fz6 lh10">
              TIPO DE CULTIVO
            </div>
          </div>
          <div style="width: 53px;height: 16px;float:left;" class="fondoclarito">
            <div class="texto fz6 lh10">
              01 ANUAL
            </div>
          </div>
          <div style="width: 53px;height: 16px;float:left;" class="fondoclarito">
            <div class="texto fz6 lh10">
              02 PERMANENTE
            </div>
          </div>
          <div style="width: 53px;height: 16px;float:left;" class="fondoclarito">
            <div class="texto fz5 lh10">
              03 PASTO NATURAL
            </div>
          </div>
          <div style="width: 53px;height: 16px;float:left;" class="fondoclarito">
            <div class="texto fz6 lh10">
              04 FORTALECES
            </div>
          </div>
          <div style="width: 101.9px;height: 16px;float:left;" class="fondoclarito">
            <div class="texto fz6 lh10">
              05 DESCANSO / PREPARACIÓN
            </div>
          </div>
          <div style="width: 107px;height: 16px;float:left;" class="fondoclaro">
            <div class="texto fz8 lh14">
              GRUPO
            </div>
          </div>
          <div style="width: 53px;height: 16px;float:left;" class="fondoclarito">
            <div class="texto fz6 lh10">
              (A)LIMPIO
            </div>
          </div>
          <div style="width: 53px;height: 16px;float:left;" class="fondoclarito">
            <div class="texto fz6 lh10">
              (C) PERMANENTE
            </div>
          </div>
          <div style="width: 53px;height: 16px;float:left;" class="fondoclarito">
            <div class="texto fz6 lh10">
              (P) PASTOS
            </div>
          </div>
          <div style="width: 50px;height: 16px;float:left;" class="fondoclarito">
            <div class="texto fz6 lh10">
              (F) FORESTAL
            </div>
          </div>
          <div style="width: 50.9px;height: 16px;float:left;" class="fondoclarito">
            <div class="texto fz6 lh10">
              (X) PROTECCION
            </div>
          </div>




          <div style="width: 107px;height: 16px;float:left;" class="fondoclaro">
            <div class="texto fz8 lh14">
              CLASE
            </div>
          </div>
          <div style="width: 53px;height: 16px;float:left;" class="fondoclarito">
            <div class="texto fz6 lh10">
              01 ALTA
            </div>
          </div>
          <div style="width: 53px;height: 16px;float:left;" class="fondoclarito">
            <div class="texto fz6 lh10">
              02 MEDIA
            </div>
          </div>
          <div style="width: 53px;height: 16px;float:left;" class="fondoclarito">
            <div class="texto fz6 lh10">
              03 BAJA
            </div>
          </div>
          <div style="width: 101.9px;height: 16px;float:left;" class="">
            <div class="texto fz8 lh14">

            </div>
          </div>
        </div>
        <div style="width: 343px;height: 16px;float:left;"  class="bn " >
          <div style="width: 53px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros fondoclarito">
            84
            </div>
            <div class="texto fz6 lh10">
              RIEGO
            </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->ficharural?->riego}}
          </div>
          <div style="width: 89px;height: 16px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
            01
            </div>
            <div class="texto fz6 lh10">
              RIEGO POR GRAVEDAD
            </div>
          </div>
          <div style="width: 72px;height: 16px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
            02
            </div>
            <div class="texto fz6 lh10">
              RIEGO TECNIFICADO
            </div>
          </div>
          <div style="width: 52px;height: 16px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
            03
            </div>
            <div class="texto fz6 lh10">
              SECANO
            </div>
          </div>

          <div style="width: 52.9px;height: 16px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
            04
            </div>
            <div class="texto fz6 lh10">
              OTROS
            </div>
          </div>


          <div style="width: 323px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros fondoclarito">
            85
            </div>
            <div class="texto fz6 lh10">
              DERECHOS DE USO DE AGUA
            </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$ficha?->ficharural?->derecho_agua}}
          </div>
          <div style="width: 84px;height: 16px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
            01
            </div>
            <div class="texto fz6 lh10">
              LICENCIA
            </div>
          </div>
          <div style="width: 84px;height: 16px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
            02
            </div>
            <div class="texto fz6 lh10">
              PERMISO
            </div>
          </div>
          <div style="width: 85px;height: 16px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
            03
            </div>
            <div class="texto fz6 lh10">
              AUTORIZACION
            </div>
          </div>
          <div style="width: 85.9px;height: 16px;float:left;" class="fondoclarito">
            <div class="numerosnc fondoclarito">
            04
            </div>
            <div class="texto fz6 lh10">
              SIN DERECHO DE USO
            </div>
          </div>
        </div>
      </div>

      <div style="width: 716px;height:16px;margin: auto;" class="bn ">
        <div style="width: 107px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros fondoclaro">
          86
          </div>
          <div class="texto fz8 lh14">
            FUENTE HIDRICA
          </div>
        </div>
        <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$ficha?->ficharural?->fuente_hidrica}}
        </div>
        <div style="width: 115px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc fondoclarito">
          01
          </div>
          <div class="texto fz6 lh10">
            AGUAS SUPERFICIALES
          </div>
        </div>
        <div style="width: 117px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc fondoclarito">
          02
          </div>
          <div class="texto fz6 lh10">
            AGUAS SUBTERRANEAS
          </div>
        </div>
        <div style="width: 117px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc fondoclarito">
          03
          </div>
          <div class="texto fz6 lh10">
            AGUAS REHUSADAS TRATADAS
          </div>
        </div>
        <div style="width: 117px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc fondoclarito">
          04
          </div>
          <div class="texto fz6 lh10">
          AGUAS DESALINIZADAS
          </div>
        </div>
        <div style="width: 117.9px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc fondoclarito">
          05
          </div>
          <div class="texto fz6 lh10">
            AGUAS ATMOSFERICAS
          </div>
        </div>





        <div style="width: 223px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros fondoclaro">
          87
          </div>
          <div class="texto fz8 lh14">
            CERCANIA A RIO (EN CASO SELVA) O CARRETERA
          </div>
        </div>
        <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$ficha?->ficharural?->cercania_rio}}
        </div>

        <div style="width: 117px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc fondoclarito">
          01
          </div>
          <div class="texto fz6 lh10">
            HASTA 1KM
          </div>
        </div>
        <div style="width: 117px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc fondoclarito">
          02
          </div>
          <div class="texto fz6 lh10">
            DE 1 A 2KM
          </div>
        </div>
        <div style="width: 117px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc fondoclarito">
          03
          </div>
          <div class="texto fz6 lh10">
            DE 2 A 3KM
          </div>
        </div>
        <div style="width: 117.9px;height: 16px;float:left;" class="fondoclarito">
          <div class="numerosnc fondoclarito">
          04
          </div>
          <div class="texto fz6 lh10">
            MAS DE 3KM
          </div>
        </div>
        <div style="width: 223px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros fondoclaro">
          88
          </div>
          <div class="texto fz8 lh14">
            CUMPLE CON LA EXPLOTACIÓN ECONOMICA
          </div>
        </div>
        <div style="width: 80px;height: 16px;float:left;" class="bn">

        </div>
        <div style="width: 18px;height: 16px;float:left;" class="fondoclaro">
          <div class="texto fz8 lh14">
            SI
          </div>
        </div>
        <div style="width: 30px;height: 16px;float:left;" class="bn">

        </div>
        <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($ficha?->ficharural?->cumple_explotacion=="1")
            X
          @endif
        </div>
        <div style="width: 80px;height: 16px;float:left;" class="bn">

        </div>
        <div style="width: 18px;height: 16px;float:left;" class="fondoclaro">
          <div class="texto fz8 lh14">
            NO
          </div>
        </div>
        <div style="width: 30px;height: 16px;float:left;" class="bn">

        </div>
        <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($ficha?->ficharural?->cumple_explotacion=="2")
            X
          @endif
        </div>
      </div>
      <br></br>
        <div style="width: 223px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros fondoclaro">
            90
            </div>
            <div class="texto fz8 lh14">
                FICHA CATASTRAL LLENADA CON INTERVENCION DE REPRESENTANTE DESIGNADO
            </div>
            </div>
            <div style="width: 80px;height: 16px;float:left;" class="bn">

            </div>
            <div style="width: 18px;height: 16px;float:left;" class="fondoclaro">
            <div class="texto fz8 lh14">
                SI
            </div>
            </div>
            <div style="width: 30px;height: 16px;float:left;" class="bn">

            </div>
            <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->ficharural?->llenada_intervension=="1")
                X
            @endif
            </div>
            <div style="width: 80px;height: 16px;float:left;" class="bn">

            </div>
            <div style="width: 18px;height: 16px;float:left;" class="fondoclaro">
            <div class="texto fz8 lh14">
                NO
            </div>
            </div>
            <div style="width: 30px;height: 16px;float:left;" class="bn">

            </div>
            <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if($ficha?->ficharural?->llenada_intervension=="2")
                X
            @endif
            </div>
        </div>




      <!-- 79 AL 80-->

      <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
        <div class="textotitulo tl pl15">
          INFORMACIÓN COMPLEMENTARIA
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
        <div style="width: 515px;height: 16px;float:left;" class="fondoclaro">
          <div class="texto fz8 lh14">
            APELLIDOS Y NOMBRES DE LOS LITIGANTES
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
            <div style="width: 515px;height: 16px;float:left;" class="texto2 fz8 lh14" >
              {{$litigante?->persona?->nombres}} {{$litigante?->persona?->ape_paterno}} {{$litigante?->persona?->ape_materno}}
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




        <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
            <div class="textotitulo tl pl15">
            OBSERVACIONES
            </div>
        </div>

        <div style="width: 716px;height:16px;margin: auto;">

            <div style="width: 716px;height: 45px;float:left;"  class="texto2 fz8 lh14">
            {{$ficha?->ficharural?->observaciones}}
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

    </body>
  </html>


