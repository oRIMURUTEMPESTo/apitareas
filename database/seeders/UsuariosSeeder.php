<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        Usuario::create([
            'nombre' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'password' => bcrypt('password123'),
            'activo' => true,
        ]);

        Usuario::create([
            'nombre' => 'Ana Gómez',
            'email' => 'ana@example.com',
            'password' => bcrypt('password123'),
            'activo' => true,
        ]);

    }
}
