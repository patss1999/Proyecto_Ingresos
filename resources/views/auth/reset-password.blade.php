<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <div>
        <label for="email">Correo Electrónico</label>
        <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus>
    </div>

    <div>
        <label for="password">Nueva Contraseña</label>
        <input id="password" type="password" name="password" required>
    </div>

    <div>
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>

    <button type="submit">Restablecer Contraseña</button>
</form>
