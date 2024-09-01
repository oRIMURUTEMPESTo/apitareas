<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\TareasController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/*tareas rutas*/

Route::get('/tareas',[TareasController::class, 'index']);//muestra todas las tareas
Route::get('/tareas/{id}',[TareasController::class, 'show']);//muestra una tarea en especifico
Route::post('/guardar',[TareasController::class, 'store']);//crea una tarea
Route::put('/actualizar/{id}',[TareasController::class, 'update']);//actualiza una tarea
Route::delete('/borrar/{id}',[TareasController::class, 'destroy']);//actualiza el estado de una tarea a false
