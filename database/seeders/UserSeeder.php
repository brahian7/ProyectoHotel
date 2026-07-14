<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nombre' => 'Administrador',
            'apellido' => 'Principal',
            'email' => 'admin@hotel.com',
            'password' => bcrypt('12345678'),
            'rol' => 'Administrador',
            'estado' => true,
        ]);

        User::create([
            'nombre' => 'Recepcionista',
            'apellido' => 'Hotel',
            'email' => 'recepcion@hotel.com',
            'password' => bcrypt('12345678'),
            'rol' => 'Recepcionista',
            'estado' => true,
        ]);
    }
}
