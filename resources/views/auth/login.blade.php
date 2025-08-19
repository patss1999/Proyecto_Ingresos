@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">
    <div class="card shadow p-4" style="width: 400px; border-radius: 20px;">
        <h3 class="text-center mb-4 text-white p-2" style="background:#F37021; border-radius:10px;">
            Ingreso al Sistema
        </h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="documento" class="form-label">Documento de identidad</label>
                <input type="text" class="form-control" name="documento" id="documento" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>

            <button type="submit" class="btn w-100 text-white" style="background:#F37021;">
                Iniciar sesión
            </button>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('password.request') }}">Olvidé mi contraseña</a>
                <a href="{{ route('visitante.login') }}">Ingreso de visitantes</a>
            </div>
        </form>
    </div>
</div>
@endsection