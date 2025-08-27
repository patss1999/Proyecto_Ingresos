<form method="POST" action="{{ route('password.confirm') }}">
    @csrf
    <div>
        <label for="password">Confirma tu Contraseña</label>
        <input id="password" type="password" name="password" required autofocus>
    </div>

    <button type="submit">Confirmar</button>
</form>
