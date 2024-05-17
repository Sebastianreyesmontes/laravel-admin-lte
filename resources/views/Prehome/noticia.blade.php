@extends('Prehome.plantilla-prehome')

@section('content')
    <div class="container-title3">
        <div class="text-container">
            {{-- Fotos del aeropuerto pasan. --}}
        </div>
    </div>

    <div id="noticia">
        
        <div class="container">
            <div class="news-container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="nav-menu">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('news') }}">Noticias</a></li>
                      <li class="breadcrumb-item"><a href="#">--Categoria--</a></li>
                      <li class="breadcrumb-item active" aria-current="page">--noticia--</li>
                    </ol>
                  </nav>
                <h1 class="news-title text-center">Título de la Noticia</h1>
                
                <div class="image-container">
                    <img src="imgs/fondo-reseñah.jpg" class="img-fluid">
                    <p class="image-credit">Foto por ~~Fotógrafo~~</p>
                    <p class="publish-info">Publicado por ~~Nombre del Autor~~ | ~~14/Junio/2023~~</p>
                </div>
                <hr>
                <div class="news-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec risus neque. Maecenas vulputate
                        euismod tincidunt. Integer euismod facilisis nisi, at dignissim nunc placerat vitae. Curabitur nec
                        faucibus ipsum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac
                        turpis egestas. Fusce ut semper lacus, a luctus eros.</p>
    
                    <p>Suspendisse potenti. Donec vel arcu eu libero laoreet hendrerit. Praesent non bibendum mauris.
                        Vivamus sit amet elit tincidunt, ultrices sapien et, venenatis turpis. Quisque hendrerit nunc ut
                        tellus malesuada, a aliquam nunc vestibulum. Vivamus ut efficitur risus. Nullam rhoncus dapibus
                        posuere. In hac habitasse platea dictumst.</p>
    
                    <p>Etiam consequat non velit at pharetra. Nunc gravida felis in ante tincidunt, vel elementum turpis
                        auctor. Integer mollis ex tellus, non dapibus arcu bibendum a. Proin sit amet turpis nec nisi
                        scelerisque faucibus. Sed consectetur elit id nisi vehicula, vitae bibendum enim euismod. Ut
                        pulvinar nulla vel tincidunt rhoncus. Aliquam id dolor sit amet turpis consectetur convallis ut
                        eget mi.</p>
                </div>
            </div>
        </div>

    </div>
@endsection
