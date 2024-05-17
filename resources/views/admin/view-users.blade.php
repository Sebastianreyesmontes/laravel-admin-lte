@extends('adminlte::page')

{{-- @section('plugins.Datatables', true)
@section('plugins.DatatablesPlugin', true) --}}

@section('content_header')
    <h1 class="m-0 text-dark text-center">Listar Usuarios Registrados</h1>
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
                <div class="card-header">
                    <a style="max-width: 150px; float:right; display: inline-block; color:white"
                        class="btn btn-block bg-gradient-success" href="{{ url('crud-users/anadir') }}">Agregar Usuario</a>
                </div>
                <div class="card-body">
                    {{-- Setup data for datatables --}}

                    @php
                        $heads = ['ID', 'Nombre', 'Correo Electronico', 'correo verificado', 'create', ['label' => 'Acciones', 'no-export' => true, 'width' => 5]];
                        
                        $usuarios = App\Models\User::all(); //Obtener los datos de tu tabla en el controlador y asignarlos a la variable $usuarios
                        
                        $data = [];
                        foreach ($usuarios as $usuario) {
                            $data[] = [
                                $usuario->id,
                                $usuario->name,
                                $usuario->email,
                                date('F j, Y, g:i a', strtotime($usuario->email_verified_at)),
                                date('F j, Y, g:i a', strtotime($usuario->created_at)),
                                '<div class="btn-group" role="group"><button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                <a href="' .
                                url('crud-users/anadir/' . $usuario->id) .
                                '"><i class="fa fa-lg fa-fw fa-pen"></i></a>
                                </button>' .
                                '<button class="btn btn-xs btn-default text-danger mx-1 shadow confirmDelete" title="Eliminar" data-id="' .
                                $usuario->id .
                                '" data-nombre="' .
                                $usuario->name .
                                '"><i class="fa fa-lg fa-fw fa-trash"></i></button></div>',
                            ];
                        }
                        
                        $config = [
                            'data' => $data,
                            'order' => [[4, 'asc']], //el num es la posición de la columna que escogera para ordenar | desc(descendiente), asc(ascendiente)
                            //'order' => [[1, 'asc'], [2, 'desc']], Ordenar por la segunda columna en orden ascendente y luego por la tercera columna en orden descendente
                            'columns' => [null, null, null, null, null, ['orderable' => false]],
                        ];
                    @endphp

                    {{-- DOM de la datatable --}}
                    @php
                        $config['paging'] = true;
                        $config['lengthMenu'] = [5, 10, 50, 100, 500];
                        $config['responsive'] = true;
                        $config['language'] = [
                            'url' => 'https://cdn.datatables.net/plug-ins/1.13.5/i18n/es-ES.json',
                        ];
                    @endphp

                    {{-- Datatable con tema dark --}}

                    {{-- <x-adminlte-datatable id="table8" :heads="$heads" head-theme="dark" theme="light" :config="$config"
                    striped hoverable with-buttons /> --}}

                    <x-adminlte-datatable id="table7" :heads="$heads" head-theme="dark" theme="light"
                        :config="$config" striped hoverable with-buttons bordered with-footer footer-theme="dark">

                        {{-- @foreach ($usuarios as $row)
                            <tr>
                                <td>{{ $row['id'] }}</td>
                                <td>{{ $row['name'] }}</td>
                                <td>{{ $row['email'] }}</td>
                                <td>{{ $row['email_verified_at'] }}</td>
                                <td>{{ $row['created_at'] }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        {!! $btnEdit !!}
                                        {!! $btnDelete !!}
                                        {!! $btnDetails !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach --}}
                        {{-- <td>{{ $row['update_at']}}</td> --}}
                    </x-adminlte-datatable>


                </div>
            </div>

                    {{-- Sweetalert2 Plugin --}}
                    @push('js')
                        <script>
                            $(document).ready(function() {
                                $(document).on("click", ".confirmDelete", function(e) {
                                    e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace

                                    var userId = $(this).data("id");
                                    var userName = $(this).data("nombre");

                                    Swal.fire({
                                        title: '¿Estás seguro de eliminar al usuario <strong>"' + userName +
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
                                                url: "{{ url('crud-users/eliminar') }}/" + userId,
                                                type: "GET",
                                                success: function(response) {
                                                    Swal.fire(
                                                        '¡Eliminado!',
                                                        '<strong>"' + userName +
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
                                                        'Se produjo un error al eliminar el usuario',
                                                        'error'
                                                    );
                                                }
                                            });
                                        }
                                    });
                                });
                            });

                            // var Toast = Swal.mixin({
                            //     toast: true,
                            //     text: 'uuhkjhkhhk',
                            //     position: 'top-end',
                            //     showConfirmButton: false,
                            //     timer: 3000
                            // });

                            // //ejm1
                            // Swal.bindClickHandler()

                            // Swal.mixin({
                            //     toast: true,
                            // }).bindClickHandler('data-swal-toast-template')

                            // //ejm2
                            // $(document).ready(function() {
                            //     $('#btnOpenSaltB').click(function() {
                            //         Swal.fire(
                            //             'Buen Trabajo',
                            //             'You clicked the button!',
                            //             'success'
                            //         );
                            //     });

                            //     var Toast = Swal.mixin({
                            //         toast: true,
                            //         position: 'top-end',
                            //         showConfirmButton: false,
                            //         timer: 3000
                            //     });

                            //     $('#btnOpenSaltC').click(function() {
                            //         Toast.fire({
                            //             icon: 'success',
                            //             title: '6521855555555555'
                            //         });
                            //     });
                            // })
                        </script>
                    @endpush

        </div>
    </div>
@stop
