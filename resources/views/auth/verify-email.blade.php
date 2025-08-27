<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit">
        Reenviar enlace de verificación
    </button>
</form>
