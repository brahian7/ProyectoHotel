<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed de usuarios base del sistema.
     */
    public function run(): void
    {
        // ============================
        // Administrador
        // ============================

        User::updateOrCreate(

            [
                'email' => 'admin@hotel.com'
            ],

            [
                'nombre' => 'Administrador',
                'apellido' => 'Sistema',
                'password' => Hash::make('12345678'),
                'rol' => 'Administrador',
                'estado' => true,
            ]

        );

        // ============================
        // Recepcionista
        // ============================

        User::updateOrCreate(

            [
                'email' => 'recepcion@hotel.com'
            ],

            [
                'nombre' => 'Recepcionista',
                'apellido' => 'Hotel',
                'password' => Hash::make('12345678'),
                'rol' => 'Recepcionista',
                'estado' => true,
            ]

        );

        // ============================
        // Cliente
        // ============================

        User::updateOrCreate(

            [
                'email' => 'juanmu@gmail.com'
            ],

            [
                'nombre' => 'Juan',
                'apellido' => 'Muñoz',
                'password' => Hash::make('12345678'),
                'rol' => 'Cliente',
                'estado' => true,
            ]

        );
    }
}