<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Persona;


class TecnicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tecnicos = [
            [
                'id_persona' => '240013343102',
                'nume_doc' => '24001334',
                'tipo_doc' => '02',
                'tipo_persona' => '1',
                'nombres' => 'ZOILA ISELA',
                'ape_paterno' => 'NUÑEZ',
                'ape_materno' => 'MONTERROSO',
                'tipo_persona_juridica' => null,
                'tipo_funcion' => '3',
                'nregistro' => '',
                'razon_social' => null
            ],
            [
                'id_persona' => '422195583102',
                'nume_doc' => '42219558',
                'tipo_doc' => '02',
                'tipo_persona' => '1',
                'nombres' => 'YUKIKO',
                'ape_paterno' => 'NISHIYAMA',
                'ape_materno' => 'GÓNGORA',
                'tipo_persona_juridica' => null,
                'tipo_funcion' => '3',
                'nregistro' => '',
                'razon_social' => null
            ],
            [
                'id_persona' => '447299443102',
                'nume_doc' => '44729944',
                'tipo_doc' => '02',
                'tipo_persona' => '1',
                'nombres' => 'MANUEL',
                'ape_paterno' => 'APARICIO',
                'ape_materno' => 'GONZÁLEZ',
                'tipo_persona_juridica' => null,
                'tipo_funcion' => '3',
                'nregistro' => '',
                'razon_social' => null
            ],
            [
                'id_persona' => '482860983102',
                'nume_doc' => '48286098',
                'tipo_doc' => '02',
                'tipo_persona' => '1',
                'nombres' => 'SANDRA GUADALUPE',
                'ape_paterno' => 'CARDENAS',
                'ape_materno' => 'FLOREZ',
                'tipo_persona_juridica' => null,
                'tipo_funcion' => '3',
                'nregistro' => '',
                'razon_social' => null
            ],
            [
                'id_persona' => '703130073102',
                'nume_doc' => '70313007',
                'tipo_doc' => '02',
                'tipo_persona' => '1',
                'nombres' => 'BRUNO',
                'ape_paterno' => 'RIVAS',
                'ape_materno' => 'RAMOS',
                'tipo_persona_juridica' => null,
                'tipo_funcion' => '3',
                'nregistro' => '',
                'razon_social' => null
            ],
            [
                'id_persona' => '703243263102',
                'nume_doc' => '70324326',
                'tipo_doc' => '02',
                'tipo_persona' => '1',
                'nombres' => 'ADRIANA',
                'ape_paterno' => 'ARAUJO',
                'ape_materno' => 'HUAMAN',
                'tipo_persona_juridica' => null,
                'tipo_funcion' => '3',
                'nregistro' => '',
                'razon_social' => null
            ],
            [
                'id_persona' => '712296743102',
                'nume_doc' => '71229674',
                'tipo_doc' => '02',
                'tipo_persona' => '1',
                'nombres' => 'EMANUEL',
                'ape_paterno' => 'BARRETO',
                'ape_materno' => 'SALAVALDEZ',
                'tipo_persona_juridica' => null,
                'tipo_funcion' => '3',
                'nregistro' => '',
                'razon_social' => null
            ],
            [
                'id_persona' => '719604523102',
                'nume_doc' => '71960452',
                'tipo_doc' => '02',
                'tipo_persona' => '1',
                'nombres' => 'DYANA URPI',
                'ape_paterno' => 'ACURIO',
                'ape_materno' => 'LINES',
                'tipo_persona_juridica' => null,
                'tipo_funcion' => '3',
                'nregistro' => '',
                'razon_social' => null
            ],
            [
                'id_persona' => '730431603102',
                'nume_doc' => '73043160',
                'tipo_doc' => '02',
                'tipo_persona' => '1',
                'nombres' => 'YUDITH MARILIA',
                'ape_paterno' => 'CCAHUA',
                'ape_materno' => 'CUSIHUAMAN',
                'tipo_persona_juridica' => null,
                'tipo_funcion' => '3',
                'nregistro' => '',
                'razon_social' => null
            ],
            [
                'id_persona' => '741203673102',
                'nume_doc' => '74120367',
                'tipo_doc' => '02',
                'tipo_persona' => '1',
                'nombres' => 'LUIS BENJAMIN',
                'ape_paterno' => 'VITERY',
                'ape_materno' => 'CORDERO',
                'tipo_persona_juridica' => null,
                'tipo_funcion' => '3',
                'nregistro' => '',
                'razon_social' => null
            ],
            [
                'id_persona' => '470457563102',
                'nume_doc' => '47045756',
                'tipo_doc' => '02',
                'tipo_persona' => '1',
                'nombres' => 'MIGUEL ANGEL',
                'ape_paterno' => 'MORALES',
                'ape_materno' => 'QUIÑONES',
                'tipo_persona_juridica' => null,
                'tipo_funcion' => '3',
                'nregistro' => '',
                'razon_social' => null
            ],
            [
                'id_persona' => '733604423102',
                'nume_doc' => '73360442',
                'tipo_doc' => '02',
                'tipo_persona' => '1',
                'nombres' => 'DAICY',
                'ape_paterno' => 'LOPEZ',
                'ape_materno' => 'HUAMANRAYME',
                'tipo_persona_juridica' => null,
                'tipo_funcion' => '3',
                'nregistro' => '',
                'razon_social' => null
            ]
        ];
        
        foreach ($tecnicos as $tecnico) {
            Persona::create($tecnico);
        } 
    }
}
