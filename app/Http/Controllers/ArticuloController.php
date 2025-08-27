<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\User;
use App\Models\Visitante;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    public function index()
    {
        $articulos = Articulo::with(['user','visitante'])->get();
        return view('articulos.index', compact('articulos'));
    }

    public function create()
    {
        $usuarios = User::all();
        $visitantes = Visitante::all();
        return view('articulos.create', compact('usuarios','visitantes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'cantidad' => 'required|integer|min:1',
            'estado' => 'required|in:dentro,fuera',
            'user_id' => 'nullable|exists:users,id',
            'visitante_id' => 'nullable|exists:visitantes,id'
        ]);

        Articulo::create($request->all());

        return redirect()->route('articulos.index')->with('success', 'Artículo registrado');
    }

    public function show(Articulo $articulo)
    {
        return view('articulos.show', compact('articulo'));
    }

    public function edit(Articulo $articulo)
    {
        $usuarios = User::all();
        $visitantes = Visitante::all();
        return view('articulos.edit', compact('articulo','usuarios','visitantes'));
    }

    public function update(Request $request, Articulo $articulo)
    {
        $request->validate([
            'nombre' => 'required',
            'cantidad' => 'required|integer|min:1',
        ]);

        $articulo->update($request->all());
        return redirect()->route('articulos.index')->with('success', 'Artículo actualizado');
    }

    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
        return redirect()->route('articulos.index')->with('success', 'Artículo eliminado');
    }
}
