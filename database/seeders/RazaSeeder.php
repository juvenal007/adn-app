<?php

namespace Database\Seeders;

use App\Models\Raza;
use Illuminate\Database\Seeder;

class RazaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Raza::factory()->times(10)->create();
    }
}
