<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareaController extends Controller
{
    /**
     * Muestra el formulario para añadir tareas.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAddTareasForm()
    {
        return view('tareas');
    }

    /**
     * Añadir una nueva tarea.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function añadirTareas(Request $request)
    {
        // Validación
        $request->validate([
            'nombre' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'asignado_a' => 'required|string',
        ]);

        $tarea = new Tarea();

        $tarea->nombre = $request->nombre;
        $tarea->fecha_inicio = $request->fecha_inicio;
        $tarea->fecha_fin = $request->fecha_fin;
        $tarea->asignado_a = $request->asignado_a;

        $tarea->save();

        // Retornar a la vista de tareas con un mensaje de éxito
        return view('tareas')->with('success', 'Tarea añadida exitosamente.');
    }

    /**
     * Consulta y muestra todas las tareas.
     *
     * @return \Illuminate\Http\Response
     */
    public function consultarTareas()
    {
        $tareas = Tarea::all();
        return view('listatareas', ['tareas' => $tareas]);
    }

    public function edit($id)
    {
        $tarea = Tarea::find($id);
        if (!$tarea) {
            return redirect()->route('listaTareas')->with('error', 'Tarea no encontrada.');
        }
    
        return view('editartarea', compact('tarea'));  // Suponiendo que tienes una vista 'editarTarea' para esto
    }
    
    public function update(Request $request, $id)
    {
        $tarea = Tarea::find($id);
        if (!$tarea) {
            return redirect()->route('consultarTareas')->with('error', 'Tarea no encontrada.');
        }
    
        $tarea->update($request->all());
    
        return redirect()->route('consultarTareas')->with('success', 'Tarea actualizada con éxito.');
    }
}
