@extends('adminlte::page')


@section('content_header')
    <h1 class="m-0 text-dark">Proyectos</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">

            @if (Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success:</strong> {{ Session::get('success_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

            <div class="card">
                <div class="card-body">

                    @php
                        $heads = ['ID', 'Nombre Proyecto', 'Estado', 'Lider', ['label' => 'Acciones', 'no-export' => true, 'width' => 5]];
                        
                        $proyectos = App\Models\Project::all(); //Obtener los datos de tu tabla en el controlador y asignarlos a la variable $proyectos
                        
                        $data = [];
                        foreach ($proyectos as $proyecto) {
                            $data[] = [
                                $proyecto->id,
                                $proyecto->name,
                                // $proyecto->description,
                                $proyecto->state,
                                $proyecto->project_leader,
                                // $proyecto->company_client,
                                // $proyecto->estimated_budget,
                                // $proyecto->total_spent,
                                // $proyecto->start_date,
                                // $proyecto->end_date,
                                // $proyecto->file_path,
                                // date('F j, Y, g:i a', strtotime($proyecto->email_verified_at)),
                                // date('F j, Y, g:i a', strtotime($proyecto->created_at)),
                                '<div class="btn-group d-flex justify-content-between" role="group">
                                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Editar">
                                        <a href="' . url('proyectos/crear/' . $proyecto->id) . '" style="color: #20c997 !important;" >
                                            <i class="fa fa-lg fa-fw fa-pen"></i>
                                        </a></button>
                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow confirmDelete" title="Eliminar" data-id="' . $proyecto->id . '" data-nombre="' . $proyecto->name . '">
                                        <i class="fa fa-lg fa-fw fa-trash"></i></button>
                                    <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Details">
                                        <a href="' . url('proyectos/ver/' . $proyecto->id) . '" style="color: #17a2b8 !important;" >
                                            <i class="fa fa-lg fa-fw fa-eye"></i></a></button>
                                </div>',
                            ];
                        }
                        
                        $config = [
                            'data' => $data,
                            'order' => [[4, 'asc']], //el num es la posición de la columna que escogera para ordenar | desc(descendiente), asc(ascendiente)
                            //'order' => [[1, 'asc'], [2, 'desc']], Ordenar por la segunda columna en orden ascendente y luego por la tercera columna en orden descendente
                            'columns' => [null, null, null, null, ['orderable' => false]],
                        ];
                    @endphp

                    {{-- DOM de la datatable --}}
                    @php
                        $config['paging'] = true;
                        $config['lengthMenu'] = [10, 50, 100, 500];
                        $config['responsive'] = true;
                        $config['language'] = [
                            'url' => 'https://cdn.datatables.net/plug-ins/1.13.5/i18n/es-ES.json',
                        ];
                    @endphp

                    <x-adminlte-datatable id="table7" :heads="$heads" head-theme="light" theme="light"
                        :config="$config" striped hoverable beautify />

                </div>
            </div>

            {{-- <div class="card">
                <div class="card-body">

                    @php
                        $heads = ['ID', 'Nombre Proyecto', 'Descripción', 'Estado', 'Lider', 'Compañia Cliente', 'Presupuesto Estimado', 'Total Gastado', 'Fecha Inicial', 'Fecha Final', 'Ruta', ['label' => 'Acciones', 'no-export' => true, 'width' => 5]];
                        
                        $proyectos = App\Models\Project::all(); //Obtener los datos de tu tabla en el controlador y asignarlos a la variable $proyectos
                        
                        $data = [];
                        foreach ($proyectos as $proyecto) {
                            $data[] = [
                                $proyecto->id,
                                $proyecto->name,
                                $proyecto->description,
                                $proyecto->state,
                                $proyecto->project_leader,
                                $proyecto->company_client,
                                $proyecto->estimated_budget,
                                $proyecto->total_spent,
                                $proyecto->start_date,
                                $proyecto->end_date,
                                $proyecto->file_path,
                                // date('F j, Y, g:i a', strtotime($proyecto->email_verified_at)),
                                // date('F j, Y, g:i a', strtotime($proyecto->created_at)),
                                '<div class="btn-group" role="group"><button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                            <a href="' .
                                url('proyectos/crear/' . $proyecto->id) .
                                '"><i class="fa fa-lg fa-fw fa-pen"></i></a>
                            </button>' .
                                '<button class="btn btn-xs btn-default text-danger mx-1 shadow confirmDelete" title="Eliminar" data-id="' .
                                $proyecto->id .
                                '" data-nombre="' .
                                $proyecto->name .
                                '"><i class="fa fa-lg fa-fw fa-trash"></i></button></div>',
                            ];
                        }
                        
                        $config = [
                            'data' => $data,
                            'order' => [[4, 'asc']], //el num es la posición de la columna que escogera para ordenar | desc(descendiente), asc(ascendiente)
                            //'order' => [[1, 'asc'], [2, 'desc']], Ordenar por la segunda columna en orden ascendente y luego por la tercera columna en orden descendente
                            'columns' => [null, null, null, null, null, null, null, null, null, null, null, ['orderable' => false]],
                        ];
                    @endphp

                    {{-- DOM de la datatable --}}
                    {{-- @php
                        $config['paging'] = true;
                        $config['lengthMenu'] = [5, 10, 50, 100, 500];
                        $config['responsive'] = true;
                        $config['language'] = [
                            'url' => 'https://cdn.datatables.net/plug-ins/1.13.5/i18n/es-ES.json',
                        ];
                    @endphp --}}

                    {{-- <x-adminlte-datatable id="table7" :heads="$heads" head-theme="light" theme="light"
                        :config="$config" striped hoverable beautify />

                </div>
            </div> --}}
            
        </div>
    </div>

    @push('js')
    <script>
        $(document).ready(function() {
            $(document).on("click", ".confirmDelete", function(e) {
                e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace

                var projectId = $(this).data("id");
                var projectName = $(this).data("nombre");

                Swal.fire({
                    title: '¿Estás seguro de eliminar el proyecto <strong>"' + projectName +
                        '"</strong>?',
                    text: "Esta acción no se puede deshacer",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonColor: '#3085d6',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Sí, eliminar',
                    reverseButtons: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Aquí puedes realizar la petición para eliminar el usuario, por ejemplo, a través de una llamada Ajax
                        // y después actualizar la tabla datatable si es necesario

                        // Ejemplo de eliminación de usuario mediante una llamada Ajax
                        $.ajax({
                            url: "{{ url('proyectos/eliminar') }}/" + projectId,
                            type: "GET",
                            success: function(response) {
                                Swal.fire(
                                    '¡Eliminado!',
                                    '<strong>"' + projectName +
                                    '"</strong> ha sido eliminado correctamente',
                                    'success'
                                ).then(function() {
                                    // Actualizar la tabla datatable o recargar la página si es necesario
                                    location.reload(); // Recargar la página
                                });
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Error',
                                    'Se produjo un error al eliminar el proyecto',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>
    @endpush
@stop
