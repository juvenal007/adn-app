<?php

namespace Database\Factories;

use App\Models\Raza;
use Illuminate\Database\Eloquent\Factories\Factory;

class RazaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Raza::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'raza_nombre' => 'RAZA_NOMBRE-'.rand(1000, 4000),
            'raza_descripcion' => 'RAZA_DESCRIPCION-'.rand(1000, 4000),
        ];
    }
}
