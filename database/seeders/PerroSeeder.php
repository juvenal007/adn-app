<?php

namespace Database\Seeders;

use App\Models\Perro;
use Illuminate\Database\Seeder;

class PerroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perro::factory()->times(50)->create();
    }
}
