<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ActividadesSeeder::class);
        $this->call(CodigoInstalacionSeeder::class);
        $this->call(UbigeoSeeder::class);
        $this->call(UbigesSeeder::class);
        $this->call(HabUrbanaSeeder::class);
        $this->call(InstitucionSeeder::class);
        $this->call(SectoresSeeder::class);
        $this->call(ManzanaSeeder::class);
        $this->call(ViasSeeder::class);
        $this->call(TablasSeeder::class);
        $this->call(TablaCodigosSeeder::class);
        $this->call(UsosSeeder::class);
        $this->call(UsosBCSeeder::class);
        $this->call(TecnicosSeeder::class);
    }
}
