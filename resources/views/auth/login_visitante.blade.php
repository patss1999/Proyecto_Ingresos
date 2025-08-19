@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">
    <div class="card shadow p-4" style="width: 400px; border-radius: 20px;">
        <h3 class="text-center mb-4 text-white p-2" style="background:#4A4A4A; border-radius:10px;">
            Ingreso de Visitantes
        </h3>
        <form method="POST" action="{{ route('visitante.auth') }}">
            @csrf
            <div class="mb-3">
                <label for="documento" class="form-label">Documento</label>
                <input type="text" class="form-control" name="documento" id="documento" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>

            <button type="submit" class="btn w-100 text-white" style="background:#4A4A4A;">
                Iniciar sesión
            </button>
        </form>
    </div>
</div>
@endsection
