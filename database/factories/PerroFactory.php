<?php

namespace Database\Factories;

use App\Models\Perro;
use Illuminate\Database\Eloquent\Factories\Factory;

class PerroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Perro::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'perro_nombre' => 'PERRO_NOMBRE-'.rand(1000, 40000),
            'perro_color' => 'PERRO_COLOR-'.rand(1000, 4000),
            'perro_edad' => rand(1, 25),
            'perro_raza_id' => $this->faker->numberBetween($min = 1, $max= 10),
        ];
    }
}
