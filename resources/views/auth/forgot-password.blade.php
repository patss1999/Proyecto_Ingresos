<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div>
        <label for="email">Correo Electrónico</label>
        <input id="email" type="email" name="email" required autofocus>
    </div>

    <button type="submit">Enviar enlace de recuperación</button>
</form>
