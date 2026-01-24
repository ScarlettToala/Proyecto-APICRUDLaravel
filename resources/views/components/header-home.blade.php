<header class="site-header home-header">

    @if (session('success'))
        <div id="alert-success" class="alert alert-success"
            style="
        background: #e9fff1;
        color: #006a4a;
        border: 1px solid #00a86b;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 15px;
    ">
            {{ session('success') }}
        </div>

        <script>
            // Espera 15 segundos (15000 milisegundos) y luego oculta el mensaje
            setTimeout(function() {
                const alertDiv = document.getElementById('alert-success');
                if (alertDiv) {
                    alertDiv.style.transition = "opacity 0.5s ease";
                    alertDiv.style.opacity = 0;
                    setTimeout(() => alertDiv.remove(), 500); // remueve el div después de la transición
                }
            }, 1000);
        </script>
    @endif


    <div class="nav-container">

        <ul class="nav-left">

            <li><a href="/productos">Comida</a></li>
            <li><a href="#">Historial</a></li>
            @if (Auth::check())
                <li><a href="/cesta">Cesta</a></li>
            @endif

        </ul>

        <div class="nav-logo">
            <img src="img/LOGO.png" alt="Logo Kntina">

        </div>

        <ul class="nav-right">
            <li><a href="/buscar"><i class="fas fa-search"></i> Buscar</a></li>
            @if (Auth::check())
                <li><a href="#"><i class="fas fa-user"></i> Perfil</a></li>
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
            @else
                <a href="{{ route('login') }}">Iniciar sesión</a>
            @endif
        </ul>

    </div>
</header>
