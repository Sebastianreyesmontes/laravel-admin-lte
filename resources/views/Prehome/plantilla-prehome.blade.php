<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/sass/app.scss', 'resources/css/prehome.css', 'resources/css/app.css', 'resources/js/gotop.js', 'resources/js/passengers-flights.js'])

    {{-- Extra Configured Plugins Stylesheets --}}
    @include('adminlte::plugins', ['type' => 'css'])

    @section('adminlte_css')
        @stack('css')
        @yield('css')
    @stop

</head>

<body>
    <!-- Header navbar-->
    <header class="header">
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
                        <a class="nav-link" href="{{ url('boletines') }}">BOLETINES</a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ url('noticias') }}">NOTICIAS</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ACERCA DE AEROCALI
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('reseña-historica') }}">Reseña Histórica</a>
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
    </header>
    <!-- Fin header navbar -->

    <div class="contenedor-main">

        @yield('content')

    </div>

    <!-- footer -->
    <div id="footer" class="footer">
        <div class="container-fluid container-footer">
            <div class="row">
                {{-- Columna 1 --}}
                <div class="col-lg-4 col-sm-6" style="margin: 10px;"> {{-- CAMBIAR PADDING PARA EL RESPONSIVE --}}
                    <div class="single-box">
                        <img src="imgs/logo-aerocali-big.png"
                            style="width: 178px;
                        height: 130px;">
                        <hr />
                        <div class="text-footer">
                            <p>Aerocali S.A - Sociedad Concesionaria del Aeropuerto Internacional Alfonso Bonilla Aragón
                            </p>
                            <p>Piso 3, PBX: (602) 6663026</p>
                        </div>

                        <div>
                            <p class="media-icons">Siguenos en nuestras redes sociales.</p>
                        </div>
                        <div class="card-area">
                            <a href="https://www.facebook.com/Aerocali"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="25" height="25" fill="currentColor" class="bi bi-facebook"
                                    viewBox="0 0 16 16" style="margin: 10px">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg></a>

                            <a href="https://www.instagram.com/alfonsobonillaaragon/?igshid=MzRlODBiNWFlZA%3D%3D"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16"
                                    style="margin: 10px">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                </svg></a>

                            <a href="https://twitter.com/aerocali"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="25" height="25" fill="currentColor" class="bi bi-twitter"
                                    viewBox="0 0 16 16" style="margin: 10px">
                                    <path
                                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                </svg></a>

                        </div>


                    </div>
                </div>
                {{-- Columna 2  --}}
                <div class="col-lg-4 col-sm-6">
                    <div class="single-box">
                        <iframe
                            src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FAerocali&tabs=timeline&width=300&height=300&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                            width="300" height="300" style="border:none;overflow:hidden" scrolling="no"
                            frameborder="0" allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>
                </div>
                {{-- Columna 3 --}}
                <div class="col-lg-3 col-sm-2">
                    <div class="single-box imgs-f"> {{-- style="display: flex; flex-direction: column; align-items: flex-start;" --}}
                        <img src="imgs/logosupertransporte.png" alt=""
                            style="width: 188px; height: 60px; margin: 10px;">
                        <img src="imgs/logo-aeronautica.svg.png" alt=""
                            style="width: 298px; height: 53px; margin: 10px;">
                    </div>
                </div>
                {{-- Fin columna 3 --}}
            </div>
        </div>
    </div>
    <!-- fin footer -->

    <div class="go-top-container">
        <div class="go-top-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/>
              </svg>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script>
    // {{-- var dates = @json($dates); console.log(dates,'vista plantilla'); --}}
    // {{-- window.nacionalLlegadaCounts1 = @json($nacionalLlegadaCounts1); --}}
    // {{-- window.nacionalLlegadaCounts2 = @json($nacionalLlegadaCounts2); --}}
    // {{-- window.nacionalSalidaCounts = @json($nacionalSalidaCounts); --}}
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    {{-- Extra Configured Plugins Scripts --}}
    @include('adminlte::plugins', ['type' => 'js'])

    @section('adminlte_js')
        @stack('js')
        @yield('js')
    @stop

</body>

</html>
