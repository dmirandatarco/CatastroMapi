<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Ficha Catastral Cotitular</title>
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
          background-color:#c7c7c7;
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
          background-color:#fee69a;
        }
        .fondoclarito{
          background-color:#ffff7e;
          color:#000000;

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

        <div style="width: 316px;height:16px;margin: auto;border:none;" class="">
            <div class="texto fz12 lh14" style="font-weight:bold;">
                FICHA CATASTRAL URBANA COTITULARIDAD
            </div>
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
                {{$ficha?->unicat?->cuc}}
              </div>

            </div>
          </div>

          <!-- fila 01-->
          <div style="width: 427px;height:16px;margin: auto;">
            <div style="width: 427px;height: 16px;float:left;" class="fondoclaro">
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
          <div style="width: 427px;height:16px;margin: auto;" class="fondoclaro">
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
          <!-- fila 05-->
          {{-- <div style="width: 427px;height:16px;margin: auto;">
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
              {{$ficha?->unicat?->codi_cont_rentas}}
            </div>
            <div style="width: 212.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
              {{$ficha?->unicat?->codi_pred_rentas}}
            </div>
          </div> --}}
        </div>

        <div style="width: 120px;height: 120px;float:left;border:none;" >
          <img src="{{$logos?->logo_catastro}}" alt="">
        </div>
      </div>
      <!-- --------------------------------------------------------- -->
      <!-- --------------------------------------------------------- -->
      <!-- --------------------------------------------------------- -->
      <!-- ------------------FOREACH-------------------------------- -->
      <!-- --------------------------------------------------------- -->
      <!-- --------------------------------------------------------- -->
      <!-- --------------------------------------------------------- -->

      @foreach($ficha?->titulars as $titular1)
      <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
        <div class="textotitulo tl pl15">
          DATOS DEL COTITULAR CATASTRAL
        </div>
      </div>
      <!-- IDENTIFICACION DEL TITULAR CATASTRAL-->
      <!-- 20 AL 25-->
      <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 98px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            124
          </div>
          <div class="texto fz7 lh7">
            NÚMERO DE <BR>COTITULAR
          </div>
        </div>
        <div style="width: 19px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$titular1?->nume_titular}}
        </div>
        <div style="width: 94px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            125
          </div>
          <div class="texto fz7 lh7">
            TOTAL DE<BR> COTITULARES
          </div>
        </div>
        <div style="width: 19px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{count($ficha?->titulars)}}
        </div>
        <div style="width: 97px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            126
          </div>
          <div class="texto fz8 lh14">
            TIPO DE TITULAR
          </div>
        </div>

        <div style="width: 19px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($titular1?->persona!="")
            {{$titular1?->persona?->tipo_persona}}
          @endif
        </div>
        <div style="width: 80px;height: 16px;float:left;border:none;" class="fondoclarito">
          <div style="width: 79PX;height: 8px;float:left;">
            <div class="texto ti pl5" style="font-size:4px;">
              1 = PERSONA NATURAL
            </div>
          </div>
          <div style="width: 79PX;height: 8px;float:left;">
            <div class="texto ti pl5" style="font-size:4px;">
              2 = PERSONA JURIDICA
            </div>
          </div>
        </div>
        <div style="width: 95px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            127
          </div>
          <div class="texto fz8 lh14">
            % DE COTITULAR
          </div>
        </div>
        <div style="width: 25px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{ number_format($titular1?->porc_cotitular, 2) }}
        </div>
        <div style="width: 98px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            03
          </div>
          <div class="texto fz7 lh7">
            CÓDIGO DEL <BR> CONTRIBUYENTE
          </div>
        </div>
        <div style="width: 62px;height: 16px;float:left;" class="texto2 fz8 lh14">
          {{$titular1?->codi_contribuyente}}
        </div>

      </div>
        <div style="width: 716px;height:16px;margin: auto;" class="bn">
          <div style="width: 100px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              22
            </div>
            <div class="texto fz8 lh14">
              TIPO DOC. IDENTIDAD
            </div>
          </div>
          <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$titular1?->persona?->tipo_doc}}
          </div>
          <div style="width: 53px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              23
            </div>
            <div class="texto fz8 lh14">
              N° DOC
            </div>
          </div>
          <div style="width: 182px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if($titular1?->persona?->tipo_persona==1)
              {{$titular1?->persona?->nume_doc}}
            @endif

          </div>

          <div style="width: 93px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              24
            </div>
            <div class="texto fz8 lh14">
              NOMBRES
            </div>
          </div>
          <div style="width: 264px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$titular1?->persona?->nombres}}
          </div>

        </div>
        <!-- 22 AL 24-->

        <!-- 25 AL 26-->
        <div style="width: 716px;height:16px;margin: auto;">
          <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;" class="fondoclaro">
            <div class="numeros" style="float:left;">
              25
            </div>
            <div class="texto fz8 lh14">
              APELLIDO PATERNO
            </div>
          </div>
          <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;" class="fondoclaro">
            <div class="numeros" style="float:left;">
              26
            </div>
            <div class="texto fz8 lh14">
              APELLIDO MATERNO
            </div>
          </div>
        </div>
        <div style="width: 716px;height:16px;margin: auto;">
          <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;" class="texto2 fz8 lh14">
            {{$titular1?->persona?->ape_paterno}}
          </div>
          <div style="width: 357px;text-align:center;height: 16px;float:left;line-height: normal;" class="texto2 fz8 lh14">
            {{$titular1?->persona?->ape_materno}}
          </div>
        </div>
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
          @if($titular1?->persona?->tipo_persona==2)
            {{$titular1?->persona?->nume_doc}}
          @endif
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
          {{$titular1?->persona?->razon_social}}
        </div>
      </div>
      <div style="width: 716px;height:16px;margin: auto;">
          <div style="width: 85px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              38
            </div>
            <div class="texto fz7 lh7">
              FORMA DE <BR> ADQUISICION
            </div>
          </div>
          <div style="width: 70px;height: 16px;float:left;" class="texto2 fz8 lh14">
            {{$titular1?->form_adquisicion}}
          </div>
          <div style="width: 90px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              39
            </div>
            <div class="texto fz7 lh7">
              FECHA DE <BR> ADQUISICION
            </div>
          </div>
          <div style="width: 70px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if ($titular1?->fecha_adquisicion != '')                    
                {{date("d/m/Y", strtotime($titular1?->fecha_adquisicion))}}
            @endif
            
          </div>
          {{-- <div style="width: 90px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              34
            </div>
            <div class="texto fz8 lh14">
              COND. ESP. TITULAR
            </div>
          </div>
          <div style="width: 25px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if($titular1?->exoneraciontitular!="")
              {{$titular1?->exoneraciontitular?->condicion}}
            @endif
          </div>
          <div style="width: 63.9px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              35
            </div>
            <div class="texto fz6 lh7">
              N° RESOLUCION<BR> EXONERACION
            </div>
          </div> --}}
          {{-- <div style="width: 56px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if($titular1?->exoneraciontitular!="")
              {{$titular1?->exoneraciontitular?->nume_resolucion}}
            @endif
          </div>
          <div style="width: 60px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              37
            </div>
            <div class="texto fz7 lh7">
              FECHA DE <BR> INICIO
            </div>
          </div>
          <div style="width: 45px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if($titular1?->exoneraciontitular!="")
              {{date("d/m/Y", strtotime($titular1?->exoneraciontitular?->fecha_inicio))}}
            @endif
          </div>
          <div style="width: 60px;height: 16px;float:left;" class="fondoclaro">
            <div class="numeros">
              38
            </div>
            <div class="texto fz7 lh7">
              FECHA DE <BR> VCTO.
            </div>
          </div>
          <div style="width: 45px;height: 16px;float:left;" class="texto2 fz8 lh14">
            @if($titular1?->exoneraciontitular!="")
              {{date("d/m/Y", strtotime($titular1?->exoneraciontitular?->fecha_vencimiento))}}
            @endif
          </div> --}}
        </div>



      <!-- 29-->
      <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:2px;margin-bottom:2px">
        <div class="textotitulo tl pl15">
          DOMICILIO FISCAL DEL TITULAR CATASTRAL
        </div>
      </div>

      <!-- 30 -->
      <div style="width: 716px;height:16px;margin: auto;">

        <div style="width: 105px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            31
          </div>
          <div class="texto fz8 lh14">
            DEPARTAMENTO
          </div>
        </div>
        <div style="width: 105px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            32
          </div>
          <div class="texto fz8 lh14">
            PROVINCIA
          </div>
        </div>
        <div style="width: 130px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            33
          </div>
          <div class="texto fz8 lh14">
            DISTRITO
          </div>
        </div>
        <div style="width: 80px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            34
          </div>
          <div class="texto fz8 lh14">
            TELÉFONO
          </div>
        </div>
        <div style="width: 90px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            35
          </div>
          <div class="texto fz8 lh14">
            ANEXO
          </div>
        </div>
        
        <div style="width: 200px;height: 16px;float:left;"  class="fondoclaro">
          <div class="numeros">
            45
          </div>
          <div class="texto fz8 lh14">
            CORREO ELECTRÓNICO
          </div>
        </div>
      </div>
      <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 105px ;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($titular1?->persona?->domiciliotitular($ficha->id_ficha)!="")
            @if($titular1?->persona?->domiciliotitular($ficha->id_ficha)?->departamento!="")
              {{$titular1?->persona?->domiciliotitular($ficha->id_ficha)?->departamento?->descri}}
            @endif
          @endif
        </div>

        <div style="width: 105px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($titular1?->persona?->domiciliotitular($ficha->id_ficha)!="")
            @if($titular1?->persona?->domiciliotitular($ficha->id_ficha)?->provincias!="")
              @foreach($titular1?->persona?->domiciliotitular($ficha->id_ficha)?->provincias as $provincia)
                @if($provincia?->cod_dep == $titular1?->persona?->domiciliotitular($ficha->id_ficha)?->codi_dep && $provincia?->cod_pro == $titular1?->persona?->domiciliotitular($ficha->id_ficha)?->codi_pro && $provincia?->codi_dis == "00")
                  {{$provincia?->descri}}
                @endif
              @endforeach
            @endif
          @endif
        </div>

        <div style="width: 130px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($titular1?->persona?->domiciliotitular($ficha->id_ficha)!="")
            @if($titular1?->persona?->domiciliotitular($ficha->id_ficha)?->distritos!="")
              @foreach($titular1?->persona?->domiciliotitular($ficha->id_ficha)?->distritos as $distrito)
                @if($distrito?->cod_dep == $titular1?->persona?->domiciliotitular($ficha->id_ficha)?->codi_dep && $distrito?->cod_pro == $titular1?->persona?->domiciliotitular($ficha->id_ficha)?->codi_pro && $distrito?->codi_dis == $titular1?->persona?->domiciliotitular($ficha->id_ficha)?->codi_dis)
                  {{$distrito?->descri}}
                @endif
              @endforeach
            @endif
          @endif
        </div>

        <div style="width: 80px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($titular1!="")
            {{$titular1?->telf}}
          @endif
        </div>

        <div style="width: 90px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($titular1!="")
            {{$titular1?->anexo}}
          @endif
        </div>

        <div style="width: 200px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($titular1!="")
            {{$titular1?->email}}
          @endif
        </div>
      </div>




      <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 136px ;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            05
          </div>
          <div class="texto fz8 lh14">
            CÓDIGO DE VIA
          </div>
        </div>

        <div style="width: 95px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            06
          </div>
          <div class="texto fz8 lh14">
            TIPO DE VIA
          </div>
        </div>

        <div style="width: 280px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            07
          </div>
          <div class="texto fz8 lh14">
            NOMBRE DE VIA
          </div>
        </div>

        <div style="width: 100px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            09
          </div>
          <div class="texto fz8 lh14">
            N° MUNICIPAL
          </div>
        </div>        

        <div style="width: 100px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            13
          </div>
          <div class="texto fz8 lh14">
            N° INTERIOR
          </div>
        </div>
      </div>

      <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 136px ;height: 16px;float:left;" class="texto2 fz8 lh14" >
          @if($titular1?->persona?->domiciliotitular($ficha->id_ficha)!="")
            {{$titular1?->persona?->domiciliotitular($ficha->id_ficha)?->codi_via}}
          @endif
        </div>

        <div style="width: 95px;height: 16px;float:left;"  class="texto2 fz8 lh14">
          @if($titular1?->persona?->domiciliotitular($ficha->id_ficha)!="")
            {{$titular1?->persona?->domiciliotitular($ficha->id_ficha)?->tipo_via}}
          @endif
        </div>

        <div style="width: 280px;height: 16px;float:left;" class="texto2 fz8 lh14" >
          @if($titular1?->persona?->domiciliotitular($ficha->id_ficha)!="")
            {{$titular1?->persona?->domiciliotitular($ficha->id_ficha)?->nomb_via}}
          @endif
        </div>

        <div style="width: 100px;height: 16px;float:left;" class="texto2 fz8 lh14" >
          @if($titular1?->persona?->domiciliotitular($ficha->id_ficha)!="")
            {{$titular1?->persona?->domiciliotitular($ficha->id_ficha)?->nume_muni}}
          @endif
        </div>
        

        <div style="width: 100px;height: 16px;float:left;"  class="texto2 fz8 lh14">
          @if($titular1?->persona?->domiciliotitular($ficha->id_ficha)!="")
            {{$titular1?->persona?->domiciliotitular($ficha->id_ficha)?->nume_interior}}
          @endif
        </div>
      </div>


      <!-- 14 AL 19-->

      <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 111px ;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            14
          </div>
          <div class="texto fz8 lh14">
            CÓDIGO DE HU
          </div>
        </div>

        <div style="width: 224px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            15
          </div>
          <div class="texto fz8 lh14">
            NOMBRE DE LA HABILITACIÓN URBANA
          </div>
        </div>

        <div style="width: 130px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            16
          </div>
          <div class="texto fz8 lh14">
            ZONA/SECTOR/ETAPA
          </div>
        </div>

        <div style="width: 93px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            17
          </div>
          <div class="texto fz8 lh14">
            MANZANA
          </div>
        </div>

        <div style="width: 81px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            18
          </div>
          <div class="texto fz8 lh14">
            LOTE
          </div>
        </div>

        <div style="width: 71px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            19
          </div>
          <div class="texto fz8 lh14">
            SUB-LOTE
          </div>
        </div>
      </div>
      <!-- 34 AL 36-->
      <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 111px ;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($titular1?->persona?->domiciliotitular($ficha->id_ficha)!="")
            {{$titular1?->persona?->domiciliotitular($ficha->id_ficha)?->codi_hab_urba}}
          @endif
        </div>

        <div style="width: 224px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($titular1?->persona?->domiciliotitular($ficha->id_ficha)!="")
            {{$titular1?->persona?->domiciliotitular($ficha->id_ficha)?->nomb_hab_urba}}
          @endif
        </div>

        <div style="width: 130px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($titular1?->persona?->domiciliotitular($ficha->id_ficha)!="")
            {{$titular1?->persona?->domiciliotitular($ficha->id_ficha)?->sector}}
          @endif
        </div>

        <div style="width: 93px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($titular1?->persona?->domiciliotitular($ficha->id_ficha)!="")
            {{$titular1?->persona?->domiciliotitular($ficha->id_ficha)?->mzna}}
          @endif
        </div>

        <div style="width: 81px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($titular1?->persona?->domiciliotitular($ficha->id_ficha)!="")
            {{$titular1?->persona?->domiciliotitular($ficha->id_ficha)?->lote}}
          @endif
        </div>

        <div style="width: 71px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($titular1?->persona?->domiciliotitular($ficha->id_ficha)!="")
            {{$titular1?->persona?->domiciliotitular($ficha->id_ficha)?->sublote}}
          @endif
        </div>
      </div>
      @endforeach
      <div style="height:7px; width:800px;background-color:#fff;border:none;margin-top:5px;margin-bottom:5px">
        <div class="textotitulo tl pl15">
          INFORMACIÓN COMPLEMENTARIA
        </div>
      </div>
      <div style="width: 716px;height:16px;margin: auto;">
        <div style="width: 126px;height: 16px;float:left;" class="fondoclaro">
          <div class="numeros">
            88
          </div>
          <div class="texto fz8 lh14">
            CONDICION DEL DECLARANTE
          </div>
        </div>
        
        {{-- <div style="width: 18px;height: 16px;float:left;" class="texto2 fz8 lh14">
          @if($ficha?->conductor!="")
            {{$ficha?->conductor?->cond_conductor}}
          @endif
        </div> --}}
        <div style="width: 17px;height: 16px;float:left;" class="texto2 fz8 lh14" >
          @if($ficha?->fichacotitular!="")
            {{$ficha?->fichacotitular?->cond_declarante}}
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

      <div style="width: 716px;height:32px;margin: auto;">

        <div style="width: 215px;height: 32px;float:left;" class="fondoclaro">
          <div class="numeros">
            90
          </div>
          <div class="texto fz8 lh12">
            ESTADO DE LLENADO DE FICHA
          </div>
          <div style="background-color:#FFFFFF;color:#000000;width:17px;height:15px;border:none;float:right;" class="texto2 fz8 lh14">
          @if($ficha?->fichacotitular!="")
            {{$ficha?->fichacotitular?->esta_llenado}}
          @endif
          </div>
        </div>
        <div style="width: 500px;height: 32px;float:left;border:none;" class="fondoclarito">
          <div style="width: 620px; height: 17px;border:none;">
            <div style="width: 249px;height: 16px;float:left;">
              <div class="texto fz8 lh12">
                1 = FICHA COMPLETA
              </div>
            </div>
            <div style="width: 249px;height: 16px;float:left;">
              <div class="texto fz8 lh12">
                2 = FICHA INCOMPLETA
              </div>
            </div>
            <div style="width: 249px;height: 16px;float:left;">
              <div class="texto fz8 lh12">
                3 = COMPLETADA EN OFICINA
              </div>
            </div>
            <div style="width: 249px;height: 16px;float:left;">
              <div class="texto fz8 lh12">
                4 = COMPLETADA CONTROL EXTERIOR
              </div>
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

        <div style="width: 716px;height: 45px;float:left;"  class="texto2 fz8 lh14">
          @if($ficha?->fichacotitular!="")
            {{$ficha?->fichacotitular?->observaciones}}
          @endif
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


