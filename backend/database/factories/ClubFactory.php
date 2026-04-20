<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Club>
 */
class ClubFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre'    => $this->faker->company(),
            'ciudad'    => $this->faker->city(),
            'categoria' => $this->faker->randomElement([
                'Primera', 'Segunda', 'Tercera', 'Regional'
            ]),
        ];
    }
}