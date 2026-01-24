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

        /* ===== HEADER ===== */
        .site-header {
            background-color: #fff7ed;
            padding: 15px 40px;
            border-bottom: 1px solid #eee;
        }

        .nav-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Listas */
        .nav-left,
        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-left a,
        .nav-right a,
        .nav-right span {
            text-decoration: none;
            color: #004a34;
            font-weight: 600;
        }

        /* Logo */
        .nav-logo img {
            height: 50px;
            width: auto;
        }

        /* Botón logout */
        .nav-right button {
            background: none;
            border: none;
            color: #004a34;
            font-weight: 600;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 15px;
            }

            .nav-left,
            .nav-right {
                flex-wrap: wrap;
                justify-content: center;
                gap: 12px;
            }

            .nav-logo img {
                height: 40px;
            }
        }


        /* ===========================
           CONTENEDOR PRINCIPAL
        =========================== */
        .login-container {
            max-width: 420px;
            margin: 50px auto;
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

        /* ======== FOOTER COMPACTO ======== */
        .site-footer {
            background: #004a34;
            padding: 20px 20px;
            /* menos padding arriba y abajo */
            overflow: hidden;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            /* menos espacio entre columnas */
            color: #f6f3e8;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 5px;
            /* menos espacio entre enlaces */
        }

        .footer-links a {
            color: #f6f3e8;
            text-decoration: none;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            transition: opacity 0.3s;
        }

        .footer-logo {
            position: static;
            /* ya no lo bajamos tanto */
            transform: none;
            display: block;
            margin: 0 auto;
        }

        .footer-logo img {
            width: clamp(150px, 30vw, 300px);
            /* más pequeño */
            height: auto;
        }


        /* ======== RESPONSIVE ======== */
        @media (max-width: 768px) {
            .footer-container {
                flex-direction: column;
                text-align: center;
                align-items: center;
            }

            .footer-links {
                flex-direction: column;
                align-items: center;
            }

            .footer-logo {
                bottom: -45%;
                display: flex;
                justify-content: center
            }

            .footer-logo img {
                width: 70%;
                max-width: 320px;
            }
        }

        /* ===========================
            BOTÓN VOLVER HOME
=========================== */
        .volver-home {
            position: absolute;
            /* permite colocarla encima del contenido */
            top: 20px;
            /* distancia desde arriba del body o contenedor */
            right: 20px;
            /* distancia desde la derecha */
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #004d43;
            background-color: #fff7ed;
            border-radius: 50%;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 10;
            /* se asegura de que esté por encima del formulario */
            transition: all 0.3s ease;
        }

        .volver-home:hover {
            background-color: #004d43;
            color: #ffffff;
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <a href="/" class="volver-home">X</a>

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

    <x-footer />
</body>

</html>
