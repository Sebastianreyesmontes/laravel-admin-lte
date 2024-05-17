<x-modal-action action="{{ $action }}">
    @if ($data->id)
        @method('put')
    @endif
    <div class="row">
        <div class="col-6">
            <p>Fecha inicio</p>
            <div class="mb-3">
                <input type="text" name="start_date" value="{{ $data->start_date ?? request()->start_date }}"
                    class="form-control datetimepicker-input" id="datetimepicker5" data-toggle="datetimepicker"
                    data-target="#datetimepicker5" />
            </div>
        </div>
        <div class="col-6">
            <p>Fecha Fin</p>
            <div class="mb-3">
                <input type="text" name="end_date" value="{{ $data->end_date ?? request()->end_date }}"
                    class="form-control datetimepicker-input" id="datetimepicker6" data-toggle="datetimepicker"
                    data-target="#datetimepicker6" />
            </div>
        </div>

        <div class="col-12">
            <p>Titulo</p>
            <div class="mb-3">
                <textarea name="title" class="form-control">{{ $data->title }}</textarea>
            </div>
        </div>
        <div class="col-12">
            <p>Color del Evento</p>
            <div class="mb-3">

                <div class="btn-group" style="width: 100%;">
                    <ul class="fc-color-picker" id="color-chooser">
                        <li>
                            <input type="radio" name="category" id="category-success" value="success"
                                class="form-check-input" {{ $data->category == 'success' ? 'checked' : '' }}>
                            <label class="form-check-label text-success color-option" for="category-success"><i
                                    class="fas fa-square"></i></label>
                        </li>
                        <li>
                            <input type="radio" name="category" id="category-danger" value="danger"
                                class="form-check-input" {{ $data->category == 'danger' ? 'checked' : '' }}>
                            <label class="form-check-label text-danger color-option" for="category-danger"><i
                                    class="fas fa-square"></i></label>
                        </li>
                        <li>
                            <input type="radio" name="category" id="category-warning" value="warning"
                                class="form-check-input" {{ $data->category == 'warning' ? 'checked' : '' }}>
                            <label class="form-check-label text-warning color-option" for="category-warning"><i
                                    class="fas fa-square"></i></label>
                        </li>
                        <li>
                            <input type="radio" name="category" id="category-info" value="info"
                                class="form-check-input" {{ $data->category == 'info' ? 'checked' : '' }}>
                            <label class="form-check-label text-info color-option" for="category-info"><i
                                    class="fas fa-square"></i></label>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <div class="custom-control custom-switch">
                    <div class="checkbox icheck-pomegranate">
                        <input type="checkbox" name="delete" id="customSwitch1" />
                        <label for="customSwitch1">Borrar</label>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-modal-action>

<script>
    $(document).ready(function() {
        $(document).ready(function() {
            $('.fc-color-picker li').on('click', function(e) {
                e.preventDefault();

                // Remover la clase de todos los elementos <li>
                $('.fc-color-picker li').removeClass('selected');

                // Agregar la clase al elemento seleccionado
                $(this).addClass('selected');

                // Resto del código para cambiar el color del botón
            });
        });

        // Manejar clic en los elementos <li>
        $('.color-option').on('click', function(e) {
            e.preventDefault();

            // Remover la clase de todos los elementos <li>
            $('.color-option').removeClass('selected');

            // Agregar la clase al elemento seleccionado
            $(this).addClass('selected');

            var colorClass = $(this).attr('class').split(' ')[1].replace('text-', '');

            console.log('colorClass:', colorClass);

            // Cambiar color del botón
            $('#btn-event').removeClass().addClass('btn btn-' + colorClass);

            // Agregar clase de color de texto según el color seleccionado
            if (colorClass === 'warning') {
                $('#btn-event').addClass('text-dark'); // Color de texto negro
            } else {
                $('#btn-event').addClass('text-light'); // Color de texto blanco
            }

            // Obtener la categoría desde la ID del input
            var category = $(this).attr('for').replace('category-', '');
            console.log(category); // Verificar en la consola si se obtiene la categoría

            // Actualizar el campo oculto con la categoría seleccionada
            $('#category-' + category).prop('checked', true);

        });
    });
</script>
