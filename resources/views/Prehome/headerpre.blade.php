
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="imgs/logo-aerocali-big.png" class="logo d-inline-block align-bottom img-fluid">
        <span class="text-logo">INTRANET</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto text-center mb-2 mb-lg-0">
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">VUELOS</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ url('noticias') }}">ESTADÍSTICAS</a>

            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{ url('noticias') }}" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    NOTICIAS
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('noticias') }}">Tráfico</a>
                    <a class="dropdown-item" href="/noticias">Informativo</a>
                    <a class="dropdown-item" href="/noticias">Internacional</a>
                    <a class="dropdown-item" href="/noticias">Economía</a>
                    <a class="dropdown-item" href="/noticias">Salud</a>
                    <a class="dropdown-item" href="/noticias">Avance y Tecnología</a>
                    <a class="dropdown-item" href="{{ route('news') }}">Social y Cultural</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ACERCA DE AEROCALI
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('acerca-de-aerocali') }}">Reseña Histórica</a>
                    <a class="dropdown-item" href="{{ route('acerca-de-aerocali') }}">Misión y Visión</a>
                    <a class="dropdown-item" href="{{ route('acerca-de-aerocali') }}">Valores Cosporativos</a>
                    <a class="dropdown-item" href="{{ route('acerca-de-aerocali') }}">Política de Calidad</a>
                    <a class="dropdown-item" href="{{ route('acerca-de-aerocali') }}">Organigrama</a>
                    <a class="dropdown-item" href="{{ route('acerca-de-aerocali') }}">Políticas</a>
                </div>
            </li>
            <li class="nav-item">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary"
                            style="color: white !important; padding: .25rem .5rem !important">Iniciar Sesión</a>
                    @endauth
                @endif
            </li>
        </ul>
    </div>
</nav>

@yield('content')