<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\User;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index()
    {
        $reportes = Reporte::with('user')->get();
        return view('reportes.index', compact('reportes'));
    }

    public function create()
    {
        $usuarios = User::all();
        return view('reportes.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'user_id' => 'required|exists:users,id',
            'fecha_reporte' => 'required|date'
        ]);

        Reporte::create($request->all());
        return redirect()->route('reportes.index')->with('success', 'Reporte registrado');
    }

    public function show(Reporte $reporte)
    {
        return view('reportes.show', compact('reporte'));
    }

    public function edit(Reporte $reporte)
    {
        $usuarios = User::all();
        return view('reportes.edit', compact('reporte','usuarios'));
    }

    public function update(Request $request, Reporte $reporte)
    {
        $request->validate(['descripcion' => 'required']);
        $reporte->update($request->all());
        return redirect()->route('reportes.index')->with('success', 'Reporte actualizado');
    }

    public function destroy(Reporte $reporte)
    {
        $reporte->delete();
        return redirect()->route('reportes.index')->with('success', 'Reporte eliminado');
    }
}
