<?php

namespace App\Http\Controllers;

use App\Models\Visitante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VisitanteController extends Controller
{
    public function index()
    {
        $visitantes = Visitante::all();
        return view('visitantes.index', compact('visitantes'));
    }

    public function create()
    {
        return view('visitantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'documento' => 'required|unique:visitantes',
            'email' => 'required|email|unique:visitantes',
            'telefono' => 'required',
            'ocupacion' => 'required',
            'fin_actividades' => 'required|date',
            'password' => 'required|min:6'
        ]);

        Visitante::create([
            'nombre' => $request->nombre,
            'documento' => $request->documento,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'ocupacion' => $request->ocupacion,
            'fin_actividades' => $request->fin_actividades,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('visitantes.index')->with('success', 'Visitante registrado');
    }

    public function show(Visitante $visitante)
    {
        return view('visitantes.show', compact('visitante'));
    }

    public function edit(Visitante $visitante)
    {
        return view('visitantes.edit', compact('visitante'));
    }

    public function update(Request $request, Visitante $visitante)
    {
        $visitante->update($request->all());
        return redirect()->route('visitantes.index')->with('success', 'Visitante actualizado');
    }

    public function destroy(Visitante $visitante)
    {
        $visitante->delete();
        return redirect()->route('visitantes.index')->with('success', 'Visitante eliminado');
    }
}
