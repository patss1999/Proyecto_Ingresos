<form method="POST" action="{{ route('register') }}">
    @csrf
    <div>
        <label for="name">Nombre</label>
        <input id="name" type="text" name="name" required autofocus>
    </div>

    <div>
        <label for="email">Correo Electrónico</label>
        <input id="email" type="email" name="email" required>
    </div>

    <div>
        <label for="password">Contraseña</label>
        <input id="password" type="password" name="password" required>
    </div>

    <div>
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>

    <button type="submit">Registrarse</button>
</form>
