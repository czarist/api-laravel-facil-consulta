<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(CidadesSeeder::class);
        $this->call(MedicosSeeder::class);
        $this->call(PacientesSeeder::class);
        $this->call(ConsultasSeeder::class);
    }
}
