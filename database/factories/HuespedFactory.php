<?php

namespace Database\Factories;

use App\Models\Huesped;
use Illuminate\Database\Eloquent\Factories\Factory;

class HuespedFactory extends Factory
{
    protected $model = Huesped::class;

    public function definition(): array
    {
        return [
            'tipo_documento' => fake()->randomElement(['CC', 'CE', 'Pasaporte']),
            'numero_documento' => fake()->unique()->numerify('##########'),
            'nombres' => fake()->firstName(),
            'apellidos' => fake()->lastName(),
            'telefono' => fake()->numerify('3#########'),
            'correo' => fake()->unique()->safeEmail(),
            'direccion' => fake()->streetAddress(),
            'ciudad' => fake()->city(),
            'fecha_registro' => now(),
        ];
    }
}