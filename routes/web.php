<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('tareas');
})->middleware(['auth', 'verified'])->name('tareas');

Route::get('/privado', function () {
    return view('privado');
})->middleware(['auth', 'verified'])->name('privado');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Para el formulario de añadir tareas (mostrar el formulario)
Route::get('/tareas', [TareaController::class, 'showAddTareasForm'])->name('showAddTareasForm');

// Para procesar el formulario de añadir tareas (manejar los datos POST)
Route::post('/tareas', [TareaController::class, 'añadirTareas'])->name('añadirTareas');

// Para consultar y mostrar todas las tareas
Route::get('/listatareas', [TareaController::class, 'consultarTareas'])->name('consultarTareas');

Route::get('/tarea/{id}/editar', [TareaController::class, 'edit'])->name('tarea.editar');
Route::post('/tarea/{id}/actualizar', [TareaController::class, 'update'])->name('tarea.actualizar');
Route::get('/tarea/{id}/borrar', [TareaController::class, 'delete'])->name('tarea.borrar');

Route::get('/tarea/{id}/editar', [TareaController::class, 'edit'])->name('tarea.editar');
// Esta ruta maneja la acción de actualización cuando se envía el formulario
Route::post('/tarea/{id}/actualizar', [TareaController::class, 'update'])->name('tarea.actualizar');