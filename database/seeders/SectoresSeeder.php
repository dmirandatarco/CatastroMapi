<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sectore;


class SectoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectores = [
            ['id_sector'=>'08010807','id_ubi_geo'=>'080108', 'codi_sector'=>'07', 'nomb_sector'=>'SECTOR 07', 'fichaindividual'=>'0', 'fichacotitular'=>'0', 'fichaeconomica'=>'0', 'fichabiencomun'=>'0', 'fichacultural'=>'0', 'ficharural'=>'0', 'estado'=>'1'],
            ['id_sector'=>'08010808','id_ubi_geo'=>'080108', 'codi_sector'=>'08', 'nomb_sector'=>'SECTOR 08', 'fichaindividual'=>'0', 'fichacotitular'=>'0', 'fichaeconomica'=>'0', 'fichabiencomun'=>'0', 'fichacultural'=>'0', 'ficharural'=>'0', 'estado'=>'1'],
            
            
        ];

        foreach ($sectores as $sector) {
            Sectore::create($sector);
        }
    }
}


