<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HabitacionFactory extends Factory
{
    public function definition(): array
    {
        return [

            'numero' => $this->faker->unique()->numberBetween(101, 999),

            'tipo' => $this->faker->randomElement([
                'Sencilla',
                'Doble',
                'Triple',
                'Suite'
            ]),

            'capacidad' => $this->faker->numberBetween(1, 6),

            'precio_noche' => $this->faker->randomFloat(2, 80000, 500000),

            'estado' => $this->faker->randomElement([
                'Disponible',
                'Ocupada',
                'Mantenimiento'
            ]),

            'descripcion' => $this->faker->sentence(),

            'imagen' => null,

        ];
    }
}