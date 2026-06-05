<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REPORTE DE TITULARES POR SECTOR</title>
    <style>
    </style>
</head>
<body>
<div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
    <div class="card">
        <div class="row">
            <div class="table-responsive" >
            <table  class="table table-bordered table-striped table-sm">
                <thead >
                    <tr>
                        <td colspan="7">
                            <h3 class="text-uppercase m0">
                                MUNICIPALIDAD DISTRITAL DE MACHUPICCHU
                            </h3>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <p class="m0">
                               <strong>GERENCIA DE DESARROLLO URBANO Y RURAL</strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <p class="m0">
                                <strong>FECHA: {{$fecha}} / HORA: {{$hora}}</strong>
                            </p>
                        </td>
                    </tr>
                    <tr >
                        <th colspan="7">REPORT DE TITULARES POR SECTOR </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    </tr>
                    <tr>
                        <td colspan="2"><b>CUSCO / URUBAMBA / MACHUPICCHU</b>  </td>
                    </tr>
                    <tr>
                        <td>SECTOR: </td>
                        <td STYLE="text-align:center">{{$sectores?->nomb_sector}}</td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <th rowspan="2">CUC Lote</th>
                        <th rowspan="2">CUC Unidad Catastral</th>
                        <th rowspan="2">Titular(es) Catastral(es)</th>
                        <th rowspan="2">% Propiedad</th>
                        <th rowspan="2">DNI / RUC</th>
                        <th colspan="8" class="text-center">UBICACIÓN DEL PREDIO CATASTRAL</th>
                        <th rowspan="2">Área de terreno verificada (m2)</th>
                        <th rowspan="2">Área de construida verificada total (m2)</th>
                        <th rowspan="2">Uso</th>
                    </tr>
                    <tr>
                        <th>Tipo Via</th>
                        <th>Nombre de Via</th>
                        <th>Número</th>
                        <th>Tipo Interior</th>
                        <th>Nº Interior</th>
                        <th>Manzana</th>
                        <th>Lote</th>
                        <th>Nombre de Hab. Urb.</th>
                    </tr>
                    @foreach($titulares as $titular)
                    <tr>
                        <td>{{$titular->lote->cuc}}</td>
                        <td>{{$titular->cuc_ficha}}</td>
                        <td>
                            @foreach($titular->titularesPersonalizados() as $titular1)
                                {{ $titular1->nombres }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($titular->titularesPersonalizados() as $titular1)
                                {{ $titular1->porc_cotitular }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach($titular->titularesPersonalizados() as $titular1)
                                {{ $titular1->nume_doc }}<br>
                            @endforeach
                        </td>
                        <td>{{$titular->puertaPersonalizada?->tipo_via}}</td>
                        <td>{{$titular->puertaPersonalizada?->nomb_via}}</td>
                        <td>{{$titular->puertaPersonalizada?->nume_muni}}</td>
                        <td>{{$titular->tipo_interior}}</td>
                        <td>{{$titular->nume_interior}}</td>
                        <td>{{$titular->lote->manzana->codi_mzna}}</td>
                        <td>{{$titular->lote->codi_lote}}</td>
                        <td>{{$titular->lote?->hab_urbana?->nomb_hab_urba}}</td>
                        <td>{{$titular->area_seleccionada}}</td>
                        <td>{{$titular->total_construcciones}}</td>
                        <td>{{$titular->usoUniCat()?->desc_uso}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</body>

</html>
