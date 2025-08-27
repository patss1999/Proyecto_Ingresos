<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visitante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show login form for users
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Process user login
    public function login(Request $request)
    {
        $request->validate([
            'documento' => 'required',
            'password' => 'required',
        ]);

        // Find user by documento
        $user = User::where('documento', $request->documento)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->intended('/dashboard'); // or wherever you want to redirect
        }

        return back()->withErrors([
            'documento' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    // Show visitor login form
    public function showVisitorLoginForm()
    {
        return view('auth.login_visitante');
    }

    // Process visitor login
    public function loginVisitante(Request $request)
    {
        $request->validate([
            'documento' => 'required',
            'password' => 'required',
        ]);

        // Find visitor by documento
        $visitante = Visitante::where('documento', $request->documento)->first();

        if ($visitante && Hash::check($request->password, $visitante->password)) {
            // You might want to create a custom guard for visitors
            // For now, we'll store visitor info in session
            session(['visitante' => $visitante]);
            return redirect('/visitante/dashboard'); // or wherever visitors should go
        }

        return back()->withErrors([
            'documento' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}