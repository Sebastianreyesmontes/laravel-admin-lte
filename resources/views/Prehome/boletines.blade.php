@extends('Prehome.plantilla-prehome')

@section('content')

<div class="container-title2">
    <div class="text-container">
        <h1>Boletines</h1>
    </div>
</div>

<div id="boletines">
    <div class="row">

        <nav class="menu-boletines">
            <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                <button class="nav-link" id="nav-boletin1-tab" data-toggle="tab" data-target="#nav-boletin1" type="button"
                    role="tab" aria-controls="nav-boletin1" aria-selected="true">Boletin 1</button>
                <button class="nav-link active" id="nav-boletin2-tab" data-toggle="tab"
                    data-target="#nav-boletin2" type="button" role="tab" aria-controls="nav-boletin2"
                    aria-selected="false">Boletin 2</button>
                <button class="nav-link" id="nav-boletin3-tab" data-toggle="tab" data-target="#nav-boletin3"
                    type="button" role="tab" aria-controls="nav-boletin3"
                    aria-selected="false">Boletin 3</button>
            </div>
        </nav>

        <div class="contenido-boletines">

            <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane fade" id="nav-boletin1" role="tabpanel"
                aria-labelledby="nav-boletin1-tab">
                Boletin 1
            </div>
                <div class="tab-pane fade" id="nav-boletin2" role="tabpanel"
                aria-labelledby="nav-boletin2-tab">
                Boletin 2
            </div>
                <div class="tab-pane fade" id="nav-boletin3" role="tabpanel"
                aria-labelledby="nav-boletin3-tab">
                Boletin 3
            </div>

            </div>

    </div>
</div>
</div>
@endsection

{{-- <script>
    var vuelos = @json($vuelos);
</script> --}}