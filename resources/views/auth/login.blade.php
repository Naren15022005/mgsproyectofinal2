<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        }

        .right-side {
            flex: 1;
            padding: 40px;
            background: var(--card-bg-light);
            border-radius: 0 20px 20px 0;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
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

        .forgot-password {
            text-align: right;
            margin-bottom: 20px;
        }

        .forgot-password a {
            color: #666;
            text-decoration: none;
            font-size: 0.9em;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background: var(--primary-color);
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login-btn:hover {
            background: var(--secondary-color);
        }

        .create-account {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: var(--text-light);
        }

        .create-account a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: bold;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="left-side">
            <h1>Bienvenido</h1>
            <p class="description">Es un placer tenerte nuevamente con nosotros</p>
        </div>
        <div class="right-side">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" placeholder="Correo Electrónico" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <div class="forgot-password">
                    <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                </div>
                <button type="submit" class="login-btn">Iniciar Sesión</button>
            </form>

            <div class="create-account">
                ¿No tienes una cuenta? <a href="{{ route('register') }}">Crear cuenta</a>
            </div>
        </div>
    </div>
</body>
</html>