<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UsosBc;



class UsosBCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usos = [   
            ['codi_uso'=> '100101'	,'desc_uso'=>'EDIFICIO'],
            ['codi_uso'=> '100102'	,'desc_uso'=>'QUINTA'],
            ['codi_uso'=> '100104'	,'desc_uso'=>'CORRALÓN'],
            ['codi_uso'=> '100105'	,'desc_uso'=>'SOLAR'],
            ['codi_uso'=> '100201'	,'desc_uso'=>'CENTRO COMERCIAL'],
            ['codi_uso'=> '100203'	,'desc_uso'=>'OFICINA'],
            ['codi_uso'=> '100204'	,'desc_uso'=>'OTRO NO ESPECIFICADO'],
            ['codi_uso'=> '100205'	,'desc_uso'=>'MERCADO'],
            ['codi_uso'=> '100301'	,'desc_uso'=>'INDUSTRIA'],
            ['codi_uso'=> '100401'	,'desc_uso'=>'RESIDENCIAL'],
            ['codi_uso'=> '100402'	,'desc_uso'=>'COMERCIAL'],
            ['codi_uso'=> '100403'	,'desc_uso'=>'INDUSTRIAL'],
            ['codi_uso'=> '100103'	,'desc_uso'=>'CALLEJON'],
            ['codi_uso'=> '100106'	,'desc_uso'=>'CASA HABITACION'],
            ['codi_uso'=> '100202'	,'desc_uso'=>'GALERIA'],
        ];
        foreach ($usos as $uso) {
            UsosBc::create($uso);
        } 
    }
}
