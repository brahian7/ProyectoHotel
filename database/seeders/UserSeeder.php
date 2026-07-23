<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Administrador
        |--------------------------------------------------------------------------
        */
        User::updateOrCreate(
            ['email' => 'admin@hotel.com'],
            [
                'nombre' => 'Administrador',
                'apellido' => 'Sistema',
                'password' => Hash::make('12345678'),
                'rol' => 'Administrador',
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Recepcionista
        |--------------------------------------------------------------------------
        */

        User::create([
            'nombre' => 'Recepcionista',
            'apellido' => 'Hotel',
            'email' => 'recepcion@hotel.com',
            'password' => Hash::make('12345678'),
            'rol' => 'Recepcionista',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Cliente
        |--------------------------------------------------------------------------
        */

        User::create([
            'nombre' => 'Juan',
            'apellido' => 'Muñoz',
            'email' => 'juanmu@gmail.com',
            'password' => Hash::make('12345678'),
            'rol' => 'Cliente',
        ]);
    }
}