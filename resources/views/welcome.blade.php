<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0a0a14, #0e1525);
            overflow-x: hidden;
            transition: background 0.5s ease;
            color: white;
        }

        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #2A2A42, #1E1E32);
            border: none;
            border-radius: 50px;
            width: 50px;
            height: 50px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .theme-toggle:hover {
            transform: scale(1.1) rotate(15deg);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .theme-icon {
            width: 24px;
            height: 24px;
            transition: all 0.3s ease;
        }

        .light-icon {
            fill: #ffffff;
            display: none;
        }

        .dark-icon {
            fill: #1A1A2E;
        }

        .welcome-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            text-align: center;
        }

        .welcome-title {
            font-size: 3.5em;
            margin-bottom: 20px;
            animation: fadeInDown 1s ease-out;
        }

        .welcome-description {
            font-size: 1.5em;
            margin-bottom: 40px;
            max-width: 600px;
            border-right: 2px solid;
            white-space: nowrap;
            overflow: hidden;
            animation: typing 4s steps(40, end), blink-caret 0.75s step-end infinite;
        }

        @keyframes typing {
            from { width: 0; }
            to { width: 100%; }
        }

        @keyframes blink-caret {
            0%, 100% { border-right-color: transparent; }
            50% { border-right-color: #333; }
        }

        .welcome-buttons {
            animation: fadeIn 1s ease-out 0.6s backwards;
        }

        .btn-empezar {
            padding: 20px 60px;
            border: none;
            border-radius: 40px;
            font-size: 1.4em;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #4a00e0;
            color: white;
            text-decoration: none;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(74, 0, 224, 0.3);
        }

        .btn-empezar:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(74, 0, 224, 0.4);
            background: #5a1aff;
        }

        .btn-empezar::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            transform: rotate(45deg);
            transition: all 0.5s ease;
        }

        .btn-empezar:hover::after {
            left: 150%;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body class="dark-mode">
    <div class="welcome-container">
        <h1 class="welcome-title">Bienvenido a nuestra plataforma</h1>
        <p class="welcome-description">Descubre un mundo de posibilidades</p>
        <div class="welcome-buttons">
            <a href="{{ route('register') }}" class="btn-empezar">Empezar</a>
        </div>
    </div>

    <script>
        // Efecto de escritura automática
        document.addEventListener('DOMContentLoaded', function() {
            const description = document.querySelector('.welcome-description');
            const text = description.textContent;
            description.textContent = '';
            let index = 0;

            function type() {
                if (index < text.length) {
                    description.textContent += text.charAt(index);
                    index++;
                    setTimeout(type, 100);
                } else {
                    description.classList.add('typing-done');
                }
            }

            type();
        });
    </script>
</body>
</html>