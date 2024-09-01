<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TareasModel;

class TareasController extends Controller
{
    // Mostrar todas las tareas
    public function index()
    {
        // Obtiene todas las tareas activas
        $tareas = TareasModel::where('activo', true)->get();
        return response()->json($tareas, 200);
    }

    // Mostrar una tarea específica
    public function show($id)
    {
        // Busca la tarea por ID y verifica si está activa
        $tarea = TareasModel::where('id', $id)->where('activo', true)->first();

        if (!$tarea) {
            return response()->json(['message' => 'Tarea no encontrada o inactiva'], 404);
        }

        return response()->json($tarea, 200);
    }

    // Crear una nueva tarea
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'required|string|in:pendiente,en progreso,completado',
            'fecha' => 'required|date',
            'usuario_asignado_id' => 'nullable|exists:usuarios,id',
            'creado_por' => 'required|exists:usuarios,id'
        ]);

        $tarea = TareasModel::create($validated);
        return response()->json($tarea, 201);
    }

    // Actualizar una tarea
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'titulo' => 'sometimes|required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'sometimes|required|string|in:pendiente,en progreso,completado',
            'fecha' => 'sometimes|required|date',
            'usuario_asignado_id' => 'nullable|exists:usuarios,id',
            'creado_por' => 'sometimes|required|exists:usuarios,id'
        ]);

        $tarea = TareasModel::find($id);

        if (!$tarea) {
            return response()->json(['message' => 'Tarea no encontrada'], 404);
        }

        $tarea->update($validated);
        return response()->json($tarea, 200);
    }

    // Marcar una tarea como inactiva
    public function destroy($id)
    {
        $tarea = TareasModel::find($id);

        if (!$tarea) {
            return response()->json(['message' => 'Tarea no encontrada'], 404);
        }

        $tarea->activo = false;
        $tarea->save();

        return response()->json(['message' => 'Tarea marcada como inactiva'], 200);
    }
}
