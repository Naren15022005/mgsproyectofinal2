<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        :root {
            --primary-color: #4a00e0;
            --secondary-color: #8e2de2;
            --background-light: #f0f2f5;
            --background-dark: #0a0a14;
            --text-light: #333;
            --text-dark: #ffffff;
            --card-bg-light: #ffffff;
            --card-bg-dark: #1a1a2e;
            --border-light: #ddd;
            --border-dark: #2a2a42;
            --focus-border: #4a00e0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: var(--background-dark);
            color: var(--text-dark);
        }

        .container {
            display: flex;
            width: 100%;
            max-width: 1200px;
            padding: 20px;
        }

        .left-side {
            flex: 1;
            padding: 40px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 20px 0 0 20px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            animation: slideInLeft 0.8s ease-out;
        }

        .right-side {
            flex: 1;
            padding: 40px;
            background: var(--card-bg-light);
            border-radius: 0 20px 20px 0;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
            animation: slideInRight 0.8s ease-out;
            color: var(--text-light);
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .description {
            font-size: 1.1em;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .form-group {
            margin-bottom: 20px;
            animation: fadeIn 0.5s ease-out;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-light);
            font-size: 0.9em;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border-light);
            border-radius: 8px;
            font-size: 1em;
            transition: border-color 0.3s;
            background: var(--card-bg-light);
            color: var(--text-light);
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--focus-border);
        }

        .register-btn {
            width: 100%;
            padding: 12px;
            background: var(--primary-color);
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
            animation: fadeIn 0.5s ease-out 0.3s backwards;
        }

        .register-btn:hover {
            background: var(--secondary-color);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: var(--text-light);
            animation: fadeIn 0.5s ease-out 0.4s backwards;
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: bold;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .left-side {
                border-radius: 20px 20px 0 0;
                padding: 30px;
            }
            
            .right-side {
                border-radius: 0 0 20px 20px;
            }
        }

        .error {
            color: #ff5252;
            font-size: 0.85em;
            margin-top: 5px;
        }

        .terms-group {
            margin: 20px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-light);
        }

        .terms-group input[type="checkbox"] {
            width: auto;
        }
    </style>
</head>
<body class="dark-mode">
    <div class="container">
        <div class="left-side">
            <h1>Únete a nosotros</h1>
            <p class="description">Crea tu cuenta y descubre todas las posibilidades que tenemos para ti. Solo te tomará unos minutos.</p>
        </div>
        <div class="right-side">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre completo</label>
                    <input type="text" id="name" name="name" required>
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" required>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmar contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <div class="terms-group">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">Acepto los términos y condiciones</label>
                </div>

                <button type="submit" class="register-btn">Crear cuenta</button>
            </form>

            <div class="login-link">
                ¿Ya tienes una cuenta? <a href="{{ route('login') }}">Iniciar sesión</a>
            </div>
        </div>
    </div>
</body>
</html>