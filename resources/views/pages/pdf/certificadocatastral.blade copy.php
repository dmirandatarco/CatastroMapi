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
        .bprueba{
          background-color:#333;
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
        .ptb5{
          padding-top:5px;
          padding-bottom:5px;
        }
        .ptb10{
          padding-top:10px;
          padding-bottom:10px;
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
        .fz14{

          font-weight:bolder;
          font-size:14px !important;
        }
        .fz16{

          font-weight:bolder;
          font-size:16px !important;
        }
        .fz18{

          font-weight:bolder;
          font-size:18px !important;
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
        .lh18{
          line-height:18px;
        }
        .lh20{
          line-height:20px;
        }
        .bn{
          border:none !important;
        }
        .bp{
          background-color:#342;
        }
        #pagebreak1{
          page-break-after:always;
        }
        .bgfdc{
          background-color: #5d0d0d;
          color:#fff;
        }

        .bgfdd{
          background-color: #CFCFE9;
        }



      </style>

    </head>
    <body>

      <div style="width: 716px;height:16px;margin: auto;border:none;">
        </div>

      <div style="width: 716px;height:16px;margin: auto;border:none; margin-bottom:5px;background-color:#fff;">

        <div style="width: 120px;height: 120px;float:left;border:none;vertical-align:middle" >
          <img src="{{$logos?->logo_institucion}}" alt="Logo">
        </div>

        <div style="width: 473px;height: 8px;float:left;border:none;" >
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
              FECHA: {{$fecha}}  /  HORA:  {{$hora}}
            </div>
          </div>
          <div style="width: 473px;height:16px;margin: auto; padding-top:5px;padding-bottom:5px; " class="bgfdc">
            <div class="texto fz14 lh10">
              <b>CERTIFICADO CATASTRAL</b>
            </div>
          </div>





          <!-- fila 03-->

          <div style="width: 427px;height:16px;margin: auto; padding-top:10px;border:none" class="">
            <div style="width: 473px;height:1px;margin: auto; " class="">
              <div class="texto fz8 lh8">
                <b>CERTIFICADO CATASTRAL</b>
              </div>
            </div>
            <div style="width: 106px;height: 16px;float:left;border:none;" >
              <div style="width: 106px;height: 8px;float:left;" class="bgfdc">
                <div class="texto fz4 lh6">
                  UBIGEO
                </div>
              </div>
              <div style="width: 106px;height: 8px;float:left;border:none;">
                <div style="width: 34px;height: 8px;float:left;" class="bgfdc">
                  <div class="texto fz4 lh6">
                    DPTO.
                  </div>
                </div>
                <div style="width: 34px;height: 8px;float:left;" class="bgfdc">
                  <div class="texto fz4 lh6">
                    PROV.
                  </div>
                </div>
                <div style="width: 34.9px;height: 8px;float:left;" class="bgfdc">
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
              {{$ficha?->ficha->unicat?->edificacion?->lote?->manzana?->sectore?->codi_sector}}
            </div>
            <div style="width: 53px;height: 16px;float:left;" class="texto2 fz8 lh14">
              {{$ficha?->ficha->unicat?->edificacion?->lote?->manzana?->codi_mzna}}
            </div>
            <div style="width: 51px;height: 16px;float:left;" class="texto2 fz8 lh14">
              {{$ficha?->ficha->unicat?->edificacion?->lote?->codi_lote}}
            </div>
            <div style="width: 35px;height: 16px;float:left;" class="texto2 fz8 lh14">
              {{$ficha?->ficha->unicat?->edificacion?->codi_edificacion}}
            </div>
            <div style="width: 34px;height: 16px;float:left;" class="texto2 fz8 lh14">
              {{$ficha?->ficha->unicat?->codi_entrada}}
            </div>
            <div style="width: 35px;height: 16px;float:left;" class="texto2 fz8 lh14">
              {{$ficha?->ficha->unicat?->codi_piso}}
            </div>
            <div style="width: 52px;height: 16px;float:left;" class="texto2 fz8 lh14">
              {{$ficha?->ficha->unicat?->codi_unidad}}
            </div>
            <div style="width: 17.9px;height: 16px;float:left;" class="texto2 fz8 lh14">
              {{$ficha?->ficha->dc}}
            </div>
          </div>
          <!-- fila 05-->
        </div>

        <div style="width: 120px;height: 120px;float:left;border:none;" >
          <img src="{{$logos?->logo_catastro}}" alt="">
        </div>
      </div>
      <br></br>
      <div style="width: 716px;height:20px;  float:left;" class="bn">
        <div style="width: 716px;height:20px;  float:left;text-align:left;" class="texto fz10 lh10">
          <b>IDENTIFICACIÓN DEL TITULAR:</b>
        </div>
      </div>
      <div style="width: 417px;float:left;" class="bn">
        <div style="width: 417px;height:110px;float:left;" class=" bn">
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

          @if($ficha?->ficha->titulars != "")
            @foreach($ficha?->ficha->titulars as $titulars)
            <div style="width: 290px;height: 16px;float:left;">
              <div class="texto fz6 lh14" class="texto2 fz8 lh14">
                {{$titulars?->persona?->nombres}} {{$titulars?->persona?->ape_paterno}} {{$titulars?->persona?->ape_materno}} {{$titulars?->persona?->razon_social}}
              </div>
            </div>
            <div style="width: 124.9px;height: 16px;float:left;">
              <div class="texto2 fz8 lh14">
                {{$titulars?->persona?->nume_doc}}
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
          <div style="width: 416px;height:10px;float:left;" class="bn">
          </div>




          <div style="width: 102PX;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
              TIPO DE VIA
            </div>
          </div>
          <div style="width: 208PX;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
              NOMBRE DE VIA
            </div>
          </div>

          <div style="width: 52px;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
              CUADRA
            </div>
          </div>
          <div style="width: 51px;height: 16px;float:left;" class="bgfdc">
            <div class="texto fz10 lh14">
              CUADRA
            </div>
          </div>

            @if($ficha?->ubicaciones!="")
                @foreach($ficha?->ubicaciones as $puerta)
                <div style="width: 102PX;height: 16px;float:left;">
                <div class="texto fz8 lh14">
                    {{$puerta->vias->tipo_via}}
                </div>
                </div>
                <div style="width: 208PX;height: 16px;float:left;">
                <div class="texto fz8 lh14">
                    {{$puerta?->vias?->nomb_via}}
                </div>
                </div>
                <div style="width: 52PX;height: 16px;float:left;">
                    <div class="texto fz8 lh14">
                    {{$puerta?->cuadra}},
                    </div>
                </div>
                <div style="width: 51px;height: 16px;float:left;">
                    <div class="texto fz8 lh14">
                    {{$puerta?->interior}},
                    </div>
                </div>

                @endforeach
            @else
            <div style="width: 102PX;height: 16px;float:left;">
              <div class="texto fz8 lh14">

              </div>
            </div>
            <div style="width: 208PX;height: 16px;float:left;">
              <div class="texto fz8 lh14">

              </div>
            </div>

            <div style="width: 103.9PXpx;height: 16px;float:left;">
              <div class="texto fz8 lh14">

              </div>
            </div>
            @endif
        </div>
        <div style="width: 417px;height:10px;float:left;" class="bn">
        </div>
        <div style="width: 417px;height:180px;float:left;" class=" bn">
          <div style="width: 303px;float:left;" class=" ">
            <div style="width: 180px;float:left;" class=" bgfdc">
              <div class="texto fz10 lh14">
                DATOS TÉCNICOS DEL INMUEBLE
              </div>
            </div>
            <div style="width: 60px;float:left;" class="bgfdc ">
              <div class="texto fz10 lh14">
                DECLARADA
              </div>
            </div>
            <div style="width: 59.9px;float:left;" class="bgfdc ">
              <div class="texto fz10 lh14">
                VERIFICADA
              </div>
            </div>
            <!--                                       -->
            <div style="width: 180px;height: 16px;float:left;">
              <div class="texto fz8 lh14">
                AREA DE TERRENO DE USO PROPIO
              </div>
            </div>

            <div style="width: 60px;height: 16px;float:left;">
              <div class="texto fz8 lh14">
                {{$ficha?->ficha->fichaindividual?->area_declarada}}
              </div>
            </div>

            <div style="width: 59.9px;height: 16px;float:left;">
              <div class="texto fz8 lh14">
                {{$ficha?->ficha->fichaindividual?->area_verificada}}
              </div>
            </div>
            <div style="width: 180px;height: 16px;float:left;">
              <div class="texto fz8 lh14">
                AREA DE TERRENO DE USO COMUN
              </div>
            </div>

            <div style="width: 60px;height: 16px;float:left;">
              <div class="texto fz8 lh14">
              {{$ficha?->ficha->fichaindividual?->porc_bc_terr_legal}}
              </div>
            </div>

            <div style="width: 59.9px;height: 16px;float:left;">
              <div class="texto fz8 lh14">
              {{$ficha?->ficha->fichaindividual?->porc_bc_terr_fisc}}
              </div>
            </div>
            <div style="width: 180px;height: 16px;float:left;">
              <div class="texto fz8 lh14">
                AREA TOTAL DEL TERRENO
              </div>
            </div>

            <div style="width: 60px;height: 16px;float:left;">
              <div class="texto fz8 lh14">
              {{$ficha?->ficha->fichaindividual?->area_declarada + $ficha?->ficha->fichaindividual?->porc_bc_terr_legal}}
              </div>
            </div>

            <div style="width: 59.9px;height: 16px;float:left;">
              <div class="texto fz8 lh14">
              {{$ficha?->ficha->fichaindividual?->area_verificada + $ficha?->ficha->fichaindividual?->porc_bc_terr_fisc}}
              </div>
            </div>
          </div>
          <div style="width: 90px; height:150px;float:right;" class=" ">
            <div style="width: 473px;height:1px;margin: auto; " class="">
              <div class="texto fz8 lh8">
                <b>CONDICION PREDIO</b>
              </div>
            </div>
            <div style="width: 90px;height: 16px;float:left;" class="bgfdc">
              <div class="texto fz10 lh14">
                CLASIFICACIÓN
              </div>
            </div>
            <div style="width: 90px;height: 16px;float:left;">
              <div class="texto fz8 lh14">
                @foreach(\App\Models\TablaCodigo::where('id_tabla','=','CDP')->orderby('codigo','asc')->get() as $tablacodigo)
                    @if($ficha?->clasificacion == $tablacodigo->codigo)
                        {{$tablacodigo->desc_codigo}}
                    @else
                    @endif
                @endforeach
              </div>
            </div>
            <div style="width: 90px;height: 16px;float:left;" class="bgfdc">
              <div class="texto fz10 lh14">
                USO DE INMUEBLE
              </div>
            </div>
            <div style="width: 90px;height: 16px;float:left;">
              <div class="texto fz8 lh14">
                @foreach($usos as $uso)
                    @if($ficha?->codi_uso == $uso->codi_uso)
                        {{$uso->desc_uso}}
                    @else
                    @endif
                @endforeach
              </div>
            </div>
            <div style="width: 90px;height: 16px;float:left;" class="bgfdc">
              <div class="texto fz10 lh14">
                TIPO EDIFICACIÓN
              </div>
            </div>
            <div style="width: 90px;height: 16px;float:left;">
              <div class="texto fz8 lh14">
                @foreach(\App\Models\TablaCodigo::where('id_tabla','=','TED')->orderby('codigo','asc')->get() as $tablacodigo)

                @if($ficha?->tipo_edificacion == $tablacodigo->codigo)
                {{$tablacodigo->desc_codigo}}
                @else

                @endif
                @endforeach
              </div>
            </div>
            <div style="width: 90px;height: 16px;float:left;" class="bgfdc">
              <div class="texto fz10 lh14">
                PREDIO CATASTRAL EN
              </div>
            </div>
            <div style="width: 90px;height: 16px;float:left;">
              <div class="texto fz8 lh14">
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



      <div style="width: 288px;float:right;" class="">

        <div style="width: 288px;height:300px;float:left;" class="bn">
          <img src="{{asset('storage/img/imageneslotes/'.$ficha?->ficha->lote?->manzana?->sectore?->codi_sector.''.$ficha?->ficha->lote?->manzana?->codi_mzna.''.$ficha?->ficha->lote?->codi_lote.'.jpg')}}" alt="" style="width: 288px;height:300px;  object-fit: contain;image-orientation: from-image;display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center; align-items: center;">

        </div>
      </div>
      <div style="margin-top:10px;width: 716px;height:100px;  float:left;" class="bn">
        <div style="width: 716px;height:28px;float:left;" class="bn">
          <div style="width: 716px;height:1px;margin: auto; " class="bn">
            <div class="texto fz12 lh12">
              <b>CONSTRUCCIONES</b>
            </div>
          </div>
          <div style="width: 63px;height: 28px;float:left;" class="bgfdc">
            <div class="texto fz10 lh20">
              PISO
            </div>
          </div>


          <div style="width: 65px;height: 28px;float:left;" class="bgfdc">
            <div class="texto fz10 lh20">
              UCA
            </div>
          </div>




          <div style="width: 65px;height: 28px;float:left;" class="bgfdc">
            <div class="texto fz8 lh10">
              FECHA DE CONSTRUCCION
            </div>
          </div>


          <div style="width: 70px;height: 28px;float:left;" class="bgfdc">
            <div class="texto fz10 lh20">
              MEP
            </div>
          </div>
          <div style="width: 70px;height: 28px;float:left;" class="bgfdc">
            <div class="texto fz10 lh20">
              ECS
            </div>
          </div>
          <div style="width: 70px;height: 28px;float:left;" class="bgfdc">
            <div class="texto fz10 lh20">
              ECC
            </div>
          </div>



          <div style="width: 26px;height: 28px;float:left;" class="bgfdc">
            <div class="texto fz10 lh20">
              MC
            </div>
          </div>
          <div style="width: 26px;height: 28px;float:left;" class="bgfdc">
            <div class="texto fz10 lh20">
              TC
            </div>
          </div>
          <div style="width: 26px;height: 28px;float:left;" class="bgfdc">
            <div class="texto fz10 lh20">
              PI
            </div>
          </div>
          <div style="width: 26px;height: 28px;float:left;" class="bgfdc">
            <div class="texto fz10 lh20">
              PV
            </div>
          </div>
          <div style="width: 26px;height: 28px;float:left;" class="bgfdc">
            <div class="texto fz10 lh20">
              RV
            </div>
          </div>
          <div style="width: 26px;height: 28px;float:left;" class="bgfdc">
            <div class="texto fz10 lh20">
              BA
            </div>
          </div>
          <div style="width: 26px;height: 28px;float:left;" class="bgfdc">
            <div class="texto fz10 lh20">
              IES
            </div>
          </div>




          <div style="width: 115.9px;height:28px;float:left;" class="bn">

            <div style="width: 114.9px;height: 14px;float:left;" class="bgfdc">
              <div class="texto fz8 lh12">
                AREA(m2)
              </div>
            </div>
            <div style="width: 59px;height: 14px;float:left;" class="bgfdc">
              <div class="texto fz8 lh12">
                DECLARADA
              </div>
            </div>

            <div style="width: 54.8px;height: 14px;float:left;" class="bgfdc">
              <div class="texto fz8 lh12">
                VERIFICADA
              </div>
            </div>
          </div>
          <!-- ################################## -->
          @foreach($ficha?->ficha->construccions as $construccion)
          <div style="width: 63px;height:14px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->nume_piso}}
          </div>


          <div style="width: 65px;height:14px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->uca}}
          </div>

          <div style="width: 65px;height:14px;float:left;" class="texto2 fz8 lh14">
            {{date("m-Y", strtotime($construccion?->fecha))}}
          </div>

          <div style="width: 70px;height:14px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->mep}}
          </div>

          <div style="width: 70px;height:14px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->ecs}}
          </div>

          <div style="width: 70px;height:14px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->ecc}}
          </div>


          <div style="width: 26px;height:14px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->estr_muro_col}}
          </div>
          <div style="width: 26px;height:14px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->estr_techo}}
          </div>
          <div style="width: 26px;height:14px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->acab_piso}}
          </div>
          <div style="width: 26px;height:14px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->acab_puerta_ven}}
          </div>
          <div style="width: 26px;height:14px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->acab_revest}}
          </div>
          <div style="width: 26px;height:14px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->acab_bano}}
          </div>
          <div style="width: 26px;height:14px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->inst_elect_sanita}}
          </div>

          <div style="width: 59px;height:14px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->area_verificada}}
          </div>
          <div style="width: 54.8px;height:14px;float:left;" class="texto2 fz8 lh14">
            {{$construccion?->area_verificada}}
          </div>
          @endforeach

        </div>
      </div>
      <div style="width: 716px;height:0px;  float:left;" class="bn">

      </div>

      <div style="width: 716px;height:20px;  float:left;" class="bn">
        <div style="width: 350px;height:20px;  float:left;" class="bn ">

          <div style="width: 350px;height:20px; margin-bottom:15px;  float:left;" class=" bn">
            <div style="width: 180px;height: 16px;float:left;" class="bgfdc">
              <div class="texto fz8 lh10" >
                LINDEROS POR LOTE
              </div>
            </div>
            <div style="width: 167.9px;height: 16px;float:left;" class="bgfdc">
              <div class="texto fz8 lh10" >
                MEDIDAS PERIMETRICAS DEL LOTE (M)
              </div>
            </div>
            <!--###################################-->

            <div style="width: 79px;height: 16px;float:left;" class="bgfdd ">
              <div class="texto fz8 lh10" >
                FRENTE
              </div>
            </div>
            <div style="width: 100PX;height: 16px;float:left;">
              <div class="texto fz8 lh10" class="bn texto2 fz8 lh14">
                {{$ficha?->ficha->lindero?->fren_campo}}
              </div>
            </div>
            <div style="width: 167.9PX;height: 16px;float:left;">
              <div class="texto fz8 lh10" class="bn texto2 fz8 lh14">
                {{$ficha?->ficha->lindero?->fren_colinda_campo}}
              </div>
            </div>

            <div style="width: 79px;height: 16px;float:left;" class="bgfdd">
              <div class="texto fz8 lh10" >
                DERECHA
              </div>
            </div>
            <div style="width: 100PX;height: 16px;float:left;">
              <div class="texto fz8 lh10" class="bn texto2 fz8 lh14">
                {{$ficha?->ficha->lindero?->dere_campo}}
              </div>
            </div>
            <div style="width: 167.9PX;height: 16px;float:left;">
              <div class="texto fz8 lh10" class="bn texto2 fz8 lh14">
                {{$ficha?->ficha->lindero?->dere_colinda_campo}}
              </div>
            </div>

            <div style="width: 79px;height: 16px;float:left;" class="bgfdd">
              <div class="texto fz8 lh10">
                IZQUIERDA
              </div>
            </div>
            <div style="width: 100PX;height: 16px;float:left;">
              <div class="texto fz8 lh10" class="bn texto2 fz8 lh14">
                {{$ficha?->ficha->lindero?->izqu_campo}}
              </div>
            </div>
            <div style="width: 167.9PX;height: 16px;float:left;">
              <div class="texto fz8 lh10" class="bn texto2 fz8 lh14">
                {{$ficha?->ficha->lindero?->izqu_colinda_campo}}
              </div>
            </div>

            <div style="width: 79px;height: 16px;float:left;" class="bgfdd">
              <div class="texto fz8 lh10">
                FONDO
              </div>
            </div>
            <div style="width: 100PX;height: 16px;float:left;">
              <div class="texto fz8 lh10" class="bn texto2 fz8 lh14">
                {{$ficha?->ficha->lindero?->fond_campo}}
              </div>
            </div>
            <div style="width: 167.9PX;height: 16px;float:left;">
              <div class="texto fz8 lh10" class="bn texto2 fz8 lh14">
                {{$ficha?->ficha->lindero?->fond_colinda_campo}}
              </div>
            </div>
          </div>
          <div style="width: 90px;height: 20px;float:left;" class="bn">
            <div class="texto fz10 lh10">
              Observaciones:
            </div>
          </div>
          <div style="width: 350px;height: 60px;float:left;">
            <div class="texto2 fz8 lh14">
              {{$ficha?->observaciones}}
            </div>
          </div>

          <div style="margin-top:10px;width: 350px;height: 20px;float:left;">
            <div class="texto fz8 lh12">
              Se expide el presente certificado a solicitud de don(ña):
            </div>
          </div>
          <div style="width: 350px;height: 20px;float:left;">
            <div class="texto fz8 lh12">
                {{ $ficha->nombresolicitud }}
            </div>
          </div>
          <div style="width: 50px;height: 20px;float:left;" class="bn">
            <div class="texto fz10 lh10">
              NOTA:
            </div>
          </div>
          <div style="width: 350px;height: 20px;float:left;" class="bn">
            <div class="texto fz8 lh8">
              El presente registro catastral no constituye titulo de dominio, ni sanea los vicios que pueda contener
              la definicion de los linderos del bien inmueble. <br>Vigencia del certificado 18 Meses.
            </div>
          </div>
            <br></br>
          <div style="width: 350px;height: 20px;float:left;">
            <div class="texto fz8 lh12">
              Firma y Sello
            </div>
          </div>
          <div style="width: 350px;height: 60px;float:left;">
            <div class="texto fz8 lh12">

            </div>
          </div>


        </div>
        <div style="width: 350px;height:370px;  float:right;" class="">
        </div>
      </div>


    </body>
  </html>


