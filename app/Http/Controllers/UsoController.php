<?php

namespace App\Http\Controllers;

use App\Models\Uso;
use App\Models\Pieza;
use Illuminate\Http\Request;

class UsoController extends Controller
{
    // Mostrar formulario para registrar un uso
    public function create()
    {
        $piezas = Pieza::all(); // Obtener todas las piezas disponibles
        return view('usos.create', compact('piezas'));
    }

    // Almacenar un nuevo uso
    public function store(Request $request)
    {
        $request->validate([
            'pieza_id' => 'required|exists:piezas,id',  // Validar que la pieza exista
            'cantidad_utilizada' => 'required|integer|min:1',  // Validar que la cantidad sea positiva
        ]);

        // Crear el registro de uso
        Uso::create([
            'pieza_id' => $request->pieza_id,
            'cantidad_utilizada' => $request->cantidad_utilizada,
            'fecha' => now(),  // Fecha actual
        ]);

        // Actualizar la cantidad en el inventario de piezas
        $pieza = Pieza::find($request->pieza_id);
        $pieza->cantidad -= $request->cantidad_utilizada;
        $pieza->save();

        return redirect()->route('usos.create')->with('success', 'Uso registrado correctamente');
    }
}