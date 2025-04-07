<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use Illuminate\Http\Request;

class PiezaController extends Controller
{
    // Mostrar todas las piezas
    public function index()
    {
        $piezas = Pieza::all();  // Asegúrate de que la base de datos tiene registros
        return view('piezas.index', compact('piezas'));  // Verifica que la vista exista
    }

    // Mostrar el formulario para crear una nueva pieza
    public function create()
    {
        return view('piezas.create');  // Verifica que la vista 'create' esté en 'resources/views/piezas'
    }

    // Almacenar una nueva pieza en la base de datos
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required|unique:piezas',  // Validar que el código sea único
            'cantidad' => 'required|integer|min:0',  // Asegurar que la cantidad sea un entero no negativo
            'limite_alerta' => 'required|integer|min:0',  // Asegurar que el límite de alerta sea un entero no negativo
        ]);

        // Crear el registro en la base de datos
        Pieza::create([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo,
            'descripcion' => $request->descripcion,  // Puede ser null si no se proporciona
            'cantidad' => $request->cantidad,
            'limite_alerta' => $request->limite_alerta,
        ]);

        // Redirigir a la lista de piezas con un mensaje de éxito
        return redirect()->route('piezas.index')->with('success', 'Pieza registrada correctamente.');
    }

    // Mostrar el formulario para editar una pieza existente
    public function edit(Pieza $pieza)
    {
        return view('piezas.edit', compact('pieza'));  // Asegúrate de tener la vista 'edit' en 'resources/views/piezas'
    }

    // Actualizar los datos de una pieza existente en la base de datos
    public function update(Request $request, Pieza $pieza)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required',
            'codigo' => 'required|unique:piezas,codigo,' . $pieza->id,  // Validar código único, pero excluyendo la pieza actual
            'cantidad' => 'required|integer|min:0',  // Asegurar que la cantidad sea un número entero no negativo
            'limite_alerta' => 'required|integer|min:0',  // Asegurar que el límite de alerta sea un número entero no negativo
        ]);

        // Actualizar los registros de la pieza en la base de datos
        $pieza->update([
            'nombre' => $request->nombre,
            'codigo' => $request->codigo,
            'descripcion' => $request->descripcion,  // La descripción puede ser null si no se proporciona
            'cantidad' => $request->cantidad,
            'limite_alerta' => $request->limite_alerta,
        ]);

        // Redirigir a la lista de piezas con un mensaje de éxito
        return redirect()->route('piezas.index')->with('success', 'Pieza actualizada correctamente.');
    }

    // Eliminar una pieza de la base de datos
    public function destroy(Pieza $pieza)
    {
        // Eliminar la pieza
        $pieza->delete();

        // Redirigir a la lista de piezas con un mensaje de éxito
        return redirect()->route('piezas.index')->with('success', 'Pieza eliminada correctamente.');
    }
}