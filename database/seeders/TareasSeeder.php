<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TareasModel; 

class TareasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            TareasModel::create([
                'titulo' => "Tarea de prueba $i",
                'descripcion' => "Esta es la descripción de la tarea $i.",
                'estado' => 'pendiente',
                'fecha' => now()->addDays($i),
                'usuario_asignado_id' => null,
                'creado_por' => 1,
            ]);
        }
    }
}
