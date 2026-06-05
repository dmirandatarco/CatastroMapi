<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Institucion;
use App\Models\Ubigeo;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id_usuario' => '0801081',
            'codi_usuario' => '1',
            'usuario' => 'admin',
            'password' => '$2y$10$L0rUGxHP.dD7COlQDt4wI.nnhwTY52YNddIJZpbOZTON3Lz2BC33a',
            'nombres' => 'ADMINISTRADOR',
            'ape_paterno' => 'GENERAL',
            'ape_materno' => 'DEL SISTEMA',
            'email' => '',
            'fecha_creacion' => '2022-07-01',
            'fecha_cese' => NULL,
            'imagen' => 'default.png',
            'estado' => 1,
        ])->assignRole('ADMINISTRADOR');

    }
}
