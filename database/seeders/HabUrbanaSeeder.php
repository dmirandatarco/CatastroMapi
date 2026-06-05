<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HabUrbana; 

class HabUrbanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $haburbanas = [
            ['id_hab_urba'=>'0801081001','grup_urba'=>NULL,'tipo_hab_urba'=>'AA.HH.','nomb_hab_urba'=>'JOSE OLAYA','codi_hab_urba'=>'1001','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801081002','grup_urba'=>NULL,'tipo_hab_urba'=>'AA.HH.','nomb_hab_urba'=>'PROGRAMA DE VIVIENDA TTIO SUR','codi_hab_urba'=>'1002','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801081003','grup_urba'=>NULL,'tipo_hab_urba'=>'URB.','nomb_hab_urba'=>'REYNA DE BELEN','codi_hab_urba'=>'1003','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801081004','grup_urba'=>NULL,'tipo_hab_urba'=>'HU.PR.','nomb_hab_urba'=>'SIMON HERRERA','codi_hab_urba'=>'1004','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801081005','grup_urba'=>NULL,'tipo_hab_urba'=>'AA.HH.','nomb_hab_urba'=>'VALLECITO','codi_hab_urba'=>'1005','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801081006','grup_urba'=>NULL,'tipo_hab_urba'=>'HU.PR.','nomb_hab_urba'=>'CAPAC YUPANQUI','codi_hab_urba'=>'1006','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801081007','grup_urba'=>NULL,'tipo_hab_urba'=>'CA.','nomb_hab_urba'=>'HILARIO MENDIVIL 1 ETAPA','codi_hab_urba'=>'1007','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801081008','grup_urba'=>NULL,'tipo_hab_urba'=>'CA.','nomb_hab_urba'=>'HILARIO MENDIVIL 2 ETAPA','codi_hab_urba'=>'1008','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801081009','grup_urba'=>NULL,'tipo_hab_urba'=>'ASOC.','nomb_hab_urba'=>'INGENIERIA','codi_hab_urba'=>'1009','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801081010','grup_urba'=>NULL,'tipo_hab_urba'=>'ASOC.','nomb_hab_urba'=>'KENNEDY "B"','codi_hab_urba'=>'1010','id_ubi_geo'=>'080108','estado'=>'1'],

            ['id_hab_urba'=>'0801080660','grup_urba'=>NULL,'tipo_hab_urba'=>'PRG. VIV. ','nomb_hab_urba'=>'URB. TTIO','codi_hab_urba'=>'0660','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080670','grup_urba'=>NULL,'tipo_hab_urba'=>'PP.JJ.','nomb_hab_urba'=>'SIMON HERRERA FARFAN','codi_hab_urba'=>'0670','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080680','grup_urba'=>NULL,'tipo_hab_urba'=>'S/T.','nomb_hab_urba'=>'SIN DENOMINACION','codi_hab_urba'=>'0680','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080690','grup_urba'=>NULL,'tipo_hab_urba'=>'AA.HH.','nomb_hab_urba'=>'PUEBLO JOVEN "JOSE OLAYA"','codi_hab_urba'=>'0690','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080700','grup_urba'=>NULL,'tipo_hab_urba'=>'S/T.','nomb_hab_urba'=>'SIN DENOMINACION','codi_hab_urba'=>'0700','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080710','grup_urba'=>NULL,'tipo_hab_urba'=>'AA.HH. MRG','nomb_hab_urba'=>'PUEBLO JOVEN VALLECITO','codi_hab_urba'=>'0710','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080720','grup_urba'=>NULL,'tipo_hab_urba'=>'S/T.','nomb_hab_urba'=>'SIN DENOMINACION','codi_hab_urba'=>'0720','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080730','grup_urba'=>NULL,'tipo_hab_urba'=>'S/T.','nomb_hab_urba'=>'SIN DENOMINACION','codi_hab_urba'=>'0730','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080740','grup_urba'=>NULL,'tipo_hab_urba'=>'S/T.','nomb_hab_urba'=>'SIN DENOMINACION','codi_hab_urba'=>'0740','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080750','grup_urba'=>NULL,'tipo_hab_urba'=>'APV.','nomb_hab_urba'=>'JOHN F. KENNEDY "B"','codi_hab_urba'=>'0750','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080760','grup_urba'=>NULL,'tipo_hab_urba'=>'APV.','nomb_hab_urba'=>'SAN JUDAS CHICO N° 3','codi_hab_urba'=>'0760','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080770','grup_urba'=>NULL,'tipo_hab_urba'=>'APV.','nomb_hab_urba'=>'LOS ALAMOS','codi_hab_urba'=>'0770','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080780','grup_urba'=>NULL,'tipo_hab_urba'=>'URB.','nomb_hab_urba'=>'VELASCO ASTETE','codi_hab_urba'=>'0780','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080790','grup_urba'=>NULL,'tipo_hab_urba'=>'S/T.','nomb_hab_urba'=>'LAS ORQUIDEAS','codi_hab_urba'=>'0790','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080800','grup_urba'=>NULL,'tipo_hab_urba'=>'S/T.','nomb_hab_urba'=>'SIN DENOMINACION','codi_hab_urba'=>'0800','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080810','grup_urba'=>NULL,'tipo_hab_urba'=>'CC. HH. ','nomb_hab_urba'=>'HILARIO MENDIVIL','codi_hab_urba'=>'0810','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080820','grup_urba'=>NULL,'tipo_hab_urba'=>'APV.','nomb_hab_urba'=>'SAN JUDAS CHICO N° 3','codi_hab_urba'=>'0820','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080830','grup_urba'=>NULL,'tipo_hab_urba'=>'ADV.','nomb_hab_urba'=>'SANTA LUCILA','codi_hab_urba'=>'0830','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080840','grup_urba'=>NULL,'tipo_hab_urba'=>'ADV.','nomb_hab_urba'=>'SEÑOR DE LOS MILAGROS','codi_hab_urba'=>'0840','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080850','grup_urba'=>NULL,'tipo_hab_urba'=>'AA.HH. MRG','nomb_hab_urba'=>'SOL NACIENTE','codi_hab_urba'=>'0850','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080860','grup_urba'=>NULL,'tipo_hab_urba'=>'S/T.','nomb_hab_urba'=>'SIN DENOMINACION','codi_hab_urba'=>'0860','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080870','grup_urba'=>NULL,'tipo_hab_urba'=>'SUBDIVISIO ','nomb_hab_urba'=>'PREDIO AÑAYPAMPA','codi_hab_urba'=>'0870','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080880','grup_urba'=>NULL,'tipo_hab_urba'=>'APV.','nomb_hab_urba'=>'CAPAC YUPANQUI','codi_hab_urba'=>'0880','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080890','grup_urba'=>NULL,'tipo_hab_urba'=>'S/T.','nomb_hab_urba'=>'SIN DENOMINACION','codi_hab_urba'=>'0890','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080900','grup_urba'=>NULL,'tipo_hab_urba'=>'S/T.','nomb_hab_urba'=>'SIN DENOMINACION','codi_hab_urba'=>'0900','id_ubi_geo'=>'080108','estado'=>'1'],
            ['id_hab_urba'=>'0801080910','grup_urba'=>NULL,'tipo_hab_urba'=>'ASOC.','nomb_hab_urba'=>'INGENIERIA','codi_hab_urba'=>'0910','id_ubi_geo'=>'080108','estado'=>'1'],



            
        ];
        
        foreach ($haburbanas as $haburb) {
            HabUrbana::create($haburb);
        }
        
    }
}
