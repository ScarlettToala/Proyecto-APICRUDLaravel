<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <style>
        /* ===========================
           ESTILOS GENERALES
        =========================== */
        body {
            background-color: #f8f5ed;
            font-family: 'Inter', sans-serif;
            color: #222;
            margin: 0;
            padding: 0;
        }

        /* ===========================
           CONTENEDOR PRINCIPAL
        =========================== */
        .login-container {
            max-width: 420px;
            margin: 100px auto;
            background-color: #ffffff;
            padding: 45px 40px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
            border: 1.5px solid #e6e2d8;
        }

        /* ===========================
           TÍTULO
        =========================== */
        .login-container h1 {
            font-size: 2rem;
            font-weight: 800;
            color: #004d43;
            margin-bottom: 30px;
        }

        /* ===========================
           MENSAJES DE ERROR
        =========================== */
        .error-messages {
            background-color: #ffeaea;
            border: 1px solid #ff4d4d;
            padding: 15px;
            border-radius: 10px;
            color: #900;
            text-align: left;
            margin-bottom: 25px;
        }

        /* ===========================
           FORMULARIO
        =========================== */
        .login-form .form-group {
            margin-bottom: 25px;
            text-align: left;
        }

        .login-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #004d43;
        }

        .login-form input {
            width: 100%;
            padding: 12px 15px;
            border-radius: 12px;
            border: 1.5px solid #ccc;
            font-size: 1rem;
            box-sizing: border-box;
            transition: border 0.3s ease, box-shadow 0.3s ease;
        }

        .login-form input:focus {
            border-color: #006a4a;
            box-shadow: 0 0 5px rgba(0, 106, 74, 0.3);
            outline: none;
        }

        /* ===========================
           BOTÓN DE ENVÍO
        =========================== */
        .login-button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 30px;
            background-color: #004d43;
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
        }

        .login-button:hover {
            background-color: #007a60;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h1>Iniciar sesión</h1>

        {{-- Mostrar errores si los hay --}}
        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulario --}}
        <form method="POST" action="{{ route('login.post') }}" class="login-form">
            @csrf

            <div class="form-group">
                <label for="email">Correo:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="login-button">Entrar</button>
        </form>
    </div>

    <x-footer/>
</body>
</html>
