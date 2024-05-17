@extends('Prehome.plantilla-prehome')

@section('content')
    <div class="container-title3">
        <div class="text-container">
            <h1>Noticias</h1>
        </div>
    </div>

    <div id="noticias">
        <div class="row">

            <nav class="menu-noticias">
                <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                    <button class="nav-link" id="nav-trafico-tab" data-toggle="tab" data-target="#nav-trafico" type="button"
                        role="tab" aria-controls="nav-trafico" aria-selected="true">Tráfico</button>
                    <button class="nav-link active" id="nav-informativo-tab" data-toggle="tab"
                        data-target="#nav-informativo" type="button" role="tab" aria-controls="nav-informativo"
                        aria-selected="false">Informativo</button>
                    <button class="nav-link" id="nav-internacional-tab" data-toggle="tab" data-target="#nav-internacional"
                        type="button" role="tab" aria-controls="nav-internacional"
                        aria-selected="false">Internacional</button>
                    <button class="nav-link" id="nav-economia-tab" data-toggle="tab" data-target="#nav-economia"
                        type="button" role="tab" aria-controls="nav-economia" aria-selected="false">Economía</button>
                    <button class="nav-link" id="nav-salud-tab" data-toggle="tab" data-target="#nav-salud" type="button"
                        role="tab" aria-controls="nav-salud" aria-selected="false">Salud</button>
                    <button class="nav-link" id="nav-avanceytecnologia-tab" data-toggle="tab"
                        data-target="#nav-avanceytecnologia" type="button" role="tab"
                        aria-controls="nav-avanceytecnologia" aria-selected="false">Avance y Tecnología</button>
                    <button class="nav-link" id="nav-socialycultural-tab" data-toggle="tab"
                        data-target="#nav-socialycultural" type="button" role="tab" aria-controls="nav-socialycultural"
                        aria-selected="false">Social y Cultural</button>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane fade" id="nav-trafico" role="tabpanel" aria-labelledby="nav-trafico-tab">

                    <div class="contenido-noticias-p1">

                        <h2 class="text-center">TRAFICO</h2>
                            
                        <div class="container">
                            <div class="container-carousel">
                                <div class="carousel1">
                                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active">
                                            </li>
                                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                              <a href="{{ route('new') }}">
                                                <img src="imgs/20220308_141854.jpg" class="d-block w-100">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5>First slide label</h5>
                                                    <p>Some representative placeholder content for the first slide.</p>
                                                </div>
                                                </a>
                                            </div>
                                            <div class="carousel-item">
                                              <a href="{{ route('new') }}">
                                                <img src="imgs/20220308_141854.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5>Second slide label</h5>
                                                    <p>Some representative placeholder content for the second slide.</p>
                                                </div>
                                              </a>
                                            </div>
                                            <div class="carousel-item">
                                              <a href="{{ route('new') }}">
                                                <img src="imgs/20220308_141854.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5>Third slide label</h5>
                                                    <p>Some representative placeholder content for the third slide.</p>
                                                </div>
                                              </a>
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-target="#carouselExampleCaptions" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-target="#carouselExampleCaptions" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="cards-2-col">
                        <div class="container-cards">
                            <!-- Columna 1 -->
                            <div class="card1">
                                <div class="card mb-3" style="max-width: 540px;">
                                  <a href="{{ route('new') }}" class="row align-items-start" style="text-decoration: none">
                                        <div class="col-md-4">
                                            <img src="imgs/logo-aerocali-big.png" class="card-img img-fluid rounded">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Card 1</h5>
                                                <p class="card-text">This is a wider card with supporting.</p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                        ago</small></p>
                                            </div>
                                        </div>
                                      </a>
                                </div>
                            </div>
                            {{-- fin columna1 --}}

                            <!-- Columna 2 -->
                            <div class="card2">
                                <div class="card mb-3" style="max-width: 540px;">
                                  <a href="{{ route('new') }}" class="row align-items-center" style="text-decoration: none">
                                        <div class="col-md-4">
                                            <img src="imgs/logo-aerocali-big.png" class="card-img img-fluid rounded">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Card 2</h5>
                                                <p class="card-text">This is a wider card with supporting.</p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                        ago</small></p>
                                            </div>
                                        </div>
                                      </a>
                                </div>
                            </div>
                            {{-- fin columna 2 --}}

                            <!-- Columna 3 -->
                            <div class="card1">
                                <div class="card mb-3" style="max-width: 540px;">
                                  <a href="{{ route('new') }}" class="row align-items-center" style="text-decoration: none">
                                        <div class="col-md-4">
                                            <img src="imgs/logo-aerocali-big.png" class="card-img img-fluid rounded">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Card 3</h5>
                                                <p class="card-text">This is a wider card with supporting.</p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                        ago</small></p>
                                            </div>
                                        </div>
                                      </a>
                                </div>
                            </div>
                            {{-- fin columna 3 --}}

                            <!-- Columna 4 -->
                            <div class="card2">
                                <div class="card mb-3" style="max-width: 540px;">
                                  <a href="{{ route('new') }}" class="row align-items-center" style="text-decoration: none">
                                        <div class="col-md-4">
                                            <img src="imgs/logo-aerocali-big.png" class="card-img img-fluid rounded">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Card 4</h5>
                                                <p class="card-text">This is a wider card with supporting.</p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                        ago</small></p>
                                            </div>
                                        </div>
                                      </a>
                                </div>
                            </div>
                            {{-- fin columna 4 --}}

                            <!-- Columna 5 -->
                            <div class="card2">
                                <div class="card mb-3" style="max-width: 540px;">
                                  <a href="{{ route('new') }}" class="row align-items-center" style="text-decoration: none">
                                        <div class="col-md-4">
                                            <img src="imgs/logo-aerocali-big.png" class="card-img img-fluid rounded">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Card 5</h5>
                                                <p class="card-text">This is a wider card with supporting.</p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                        ago</small></p>
                                            </div>
                                        </div>
                                      </a>
                                </div>
                            </div>
                            {{-- fin columna 5 --}}

                            <!-- Columna 6 -->
                            <div class="card2">
                                <div class="card mb-3" style="max-width: 540px;">
                                      <a href="{{ route('new') }}" class="row align-items-center" style="text-decoration: none">
                                        <div class="col-md-4">
                                            <img src="imgs/logo-aerocali-big.png" class="card-img img-fluid rounded">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Card 6</h5>
                                                <p class="card-text">This is a wider card with supporting.</p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                        ago</small></p>
                                            </div>
                                        </div>
                                      </a>
                                </div>
                            </div>
                            {{-- fin columna 6 --}}

                        </div>
                    </div>



                </div>
                {{-- Fin trafico --}}

                <div class="tab-pane fade show active" id="nav-informativo" role="tabpanel"
                    aria-labelledby="nav-informativo-tab">
                    INFORMATIVO
                </div>
                <div class="tab-pane fade" id="nav-internacional" role="tabpanel"
                    aria-labelledby="nav-internacional-tab">
                    INTERNACIONAL
                </div>
                <div class="tab-pane fade" id="nav-economia" role="tabpanel" aria-labelledby="nav-economia-tab">
                    ECONOMIA
                </div>
                <div class="tab-pane fade" id="nav-salud" role="tabpanel" aria-labelledby="nav-salud-tab">
                    SALUD
                </div>
                <div class="tab-pane fade" id="nav-avanceytecnologia" role="tabpanel"
                    aria-labelledby="nav-avanceytecnologia-tab">
                    AVANCE Y TECNOLOGIA
                </div>
                <div class="tab-pane fade" id="nav-socialycultural" role="tabpanel"
                    aria-labelledby="nav-socialycultural-tab">
                    SOCIAL Y CULTURAL
                </div>
            </div>


        </div>
    </div>
@endsection
