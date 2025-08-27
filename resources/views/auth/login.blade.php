<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - SENA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --sena-green: #39A900;
            --sena-dark-green: #2d7a00;
            --sena-light-green: #4dbf00;
        }

        body {
            background: linear-gradient(135deg, var(--sena-green) 0%, var(--sena-dark-green) 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 450px;
            width: 100%;
            margin: 20px;
            transform: translateY(20px);
            animation: slideUp 0.8s ease-out forwards;
        }

        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .login-header {
            background: linear-gradient(135deg, var(--sena-green) 0%, var(--sena-light-green) 100%);
            color: white;
            padding: 2.5rem 2rem;
            text-align: center;
            position: relative;
        }

        .login-header::before {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            border-top: 10px solid var(--sena-light-green);
        }

        .login-header h2 {
            margin: 0;
            font-weight: 700;
            font-size: 1.8rem;
        }

        .login-header .subtitle {
            margin: 0.5rem 0 0 0;
            opacity: 0.9;
            font-size: 0.9rem;
        }

        .login-body {
            padding: 2.5rem 2rem;
        }

        .form-floating {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-floating input {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 1rem 0.75rem;
            transition: all 0.3s ease;
        }

        .form-floating input:focus {
            border-color: var(--sena-green);
            box-shadow: 0 0 0 0.25rem rgba(57, 169, 0, 0.15);
            transform: translateY(-2px);
        }

        .form-floating label {
            color: #6c757d;
            transition: all 0.3s ease;
        }

        .form-floating input:focus ~ label {
            color: var(--sena-green);
        }

        .btn-login {
            background: linear-gradient(135deg, var(--sena-green) 0%, var(--sena-dark-green) 100%);
            border: none;
            border-radius: 12px;
            padding: 0.875rem 2rem;
            font-weight: 600;
            font-size: 1.1rem;
            width: 100%;
            color: white;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(57, 169, 0, 0.3);
            background: linear-gradient(135deg, var(--sena-light-green) 0%, var(--sena-green) 100%);
        }

        .btn-login:active {
            transform: translateY(-1px);
        }

        .visitor-link {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #e9ecef;
        }

        .visitor-link a {
            color: var(--sena-green);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .visitor-link a:hover {
            color: var(--sena-dark-green);
            transform: translateX(5px);
        }

        .forgot-password-link {
            color: var(--sena-green);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .forgot-password-link:hover {
            color: var(--sena-dark-green);
            text-decoration: underline;
        }

        .alert {
            border: none;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .icon-input {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            transition: color 0.3s ease;
            z-index: 5;
        }

        .form-floating:focus-within .icon-input {
            color: var(--sena-green);
        }

        .sena-logo {
            width: 60px;
            height: 60px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem auto;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="sena-logo">
                    <i class="fas fa-graduation-cap fa-2x text-white"></i>
                </div>
                <h2>Bienvenido</h2>
                <p class="subtitle">Sistema de Control de Acceso SENA</p>
            </div>

            <div class="login-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <div>
                                @foreach($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.process') }}">
                    @csrf
                    
                    <!-- Documento -->
                    <div class="form-floating">
                        <input type="text" 
                               class="form-control" 
                               id="documento" 
                               name="documento" 
                               placeholder="Documento de Identidad"
                               value="{{ old('documento') }}" 
                               required 
                               autofocus>
                        <label for="documento">Documento de Identidad</label>
                        <i class="fas fa-id-card icon-input"></i>
                    </div>

                    <!-- Contraseña -->
                    <div class="form-floating">
                        <input type="password" 
                               class="form-control" 
                               id="password" 
                               name="password" 
                               placeholder="Contraseña"
                               required>
                        <label for="password">Contraseña</label>
                        <i class="fas fa-lock icon-input"></i>
                    </div>

                    <button type="submit" class="btn btn-login">
                        <i class="fas fa-sign-in-alt me-2"></i>
                        Iniciar Sesión
                    </button>
                </form>

                <!-- Olvidé mi contraseña -->
                <div class="text-center mt-3">
                    <a href="{{ route('password.request') }}" class="forgot-password-link">
                        <i class="fas fa-key me-1"></i>
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>

                <div class="visitor-link">
                    <a href="{{ route('login.visitante') }}">
                        <i class="fas fa-user-friends"></i>
                        ¿Eres visitante? Ingresa aquí
                    </a>
                    <span class="mx-2">|</span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Agregar efecto de ripple al botón
        document.querySelector('.btn-login').addEventListener('click', function(e) {
            let ripple = document.createElement('span');
            let rect = this.getBoundingClientRect();
            let size = Math.max(rect.width, rect.height);
            let x = e.clientX - rect.left - size / 2;
            let y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    </script>
</body>
</html>