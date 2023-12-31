<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cidades;


class CidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cidades::factory(50)->create();
    }
}
