<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::with('rol')->get();
        return view('users.index', compact('usuarios'));
    }

    public function create()
    {
        $roles = Rol::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'documento' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'telefono' => 'required',
            'password' => 'required|min:6',
            'rol_id' => 'required|exists:rols,id'
        ]);

        User::create([
            'nombre' => $request->nombre,
            'documento' => $request->documento,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'password' => Hash::make($request->password),
            'rol_id' => $request->rol_id
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Rol::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->update([
            'nombre' => $request->nombre,
            'documento' => $request->documento,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'rol_id' => $request->rol_id,
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado');
    }
}
