<header class="site-header">
    <div class="nav-container">
        <ul class="nav-left">
            <li><a href="/">Inicio</a></li>
            <li><a href="/productos">Comida</a></li>
            <li><a href="#">Historial</a></li>
            @if (Auth::check())
                <li><a href="/cesta">Cesta</a></li>
            @endif
        </ul>

        <div class="nav-logo">
            <img src="{{ asset('img/LOGO.png') }}" alt="Logo Kntina">
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
