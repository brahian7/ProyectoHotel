<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HabitacionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'numero' => fake()->unique()->numberBetween(101, 999),

            'tipo' => fake()->randomElement([
                'Sencilla',
                'Doble',
                'Triple',
                'Suite'
            ]),

            'capacidad' => fake()->numberBetween(1, 6),

            'precio_noche' => fake()->randomFloat(2, 80000, 500000),

            'estado' => fake()->randomElement([
                'Disponible',
                'Ocupada',
                'Mantenimiento'
            ]),

            'descripcion' => fake()->sentence(),

            'imagen' => null,
        ];
    }
}