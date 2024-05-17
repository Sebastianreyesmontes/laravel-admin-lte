@extends('adminlte::page')


@section('content_header')
    <h1 class="m-0 text-dark">Archivos</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form name="fileForm" id="fileForm" method="post" enctype="multipart/form-data">
                    <p class="mb-0" style="text-align: center">Archivos</p>
                    <div class="card">
                        <div class="card-header">
                            <a style="max-width: 150px; float:right; display: inline-block; color:white"
                                class="btn btn-block bg-gradient-success" href="{{ url('archivos/crear') }}">Crear Archivo</a>
                        </div>
                    @php
                    
                    $heads = ['ID', 'Archivo' , 'Nombre', 'Area', 'Propietario', 'Tipo de Documento', ['label' => 'Acciones', 'no-export' => true, 'width' => 7]]; 
                        
                        $files = App\Models\FileUpload::all();


                        $data = [];
                        foreach ($files as $file) {
                            $data[] = [

                                $file->id,
                                '<a href="' . asset('storage/' . $file->docs ) . '" target="_blank">' . $file->filename . '.' . $file->docs . '</a>',
                                $file->name,
                                $file->area,  
                                $file->prop,
                                $file->arch,
                                '<div class="btn-group" role="group"><button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                <a href="' .
                                url('archivos/crear-editar' . $file->id) .
                                '"><i class="fa fa-lg fa-fw fa-pen"></i></a>
                                </button>' .
                                '<button class="btn btn-xs btn-default text-danger mx-1 shadow confirmDelete" title="Eliminar" data-id="' .
                                $file->id .
                                '" data-nombre="' .
                                $file->name .
                                '"><i class="fa fa-lg fa-fw fa-trash"></i></button></div>',   
                               
                                                                // date('F j, Y, g:i a', strtotime($file->email_verified_at)),
                                // date('F j, Y, g:i a', strtotime($file->created_at)),
                                
                                
                            ];
                        }
                        
                        $config = [
                            'data' => $data,
                            'order' => [[4, 'asc']], //el num es la posición de la columna que escogera para ordenar | desc(descendiente), asc(ascendiente)
                            //'order' => [[1, 'asc'], [2, 'desc']], Ordenar por la segunda columna en orden ascendente y luego por la tercera columna en orden descendente
                            'columns' => [null, null, null, null, null, null,null],
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
              
              

              
            @push('js')
            <script>
                $(document).ready(function() {
                    $(document).on("click", ".confirmDelete", function(e) {
                        e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
        
                        var fileId = $(this).data("id");
                        var fileName = $(this).data("nombre");
        
                        Swal.fire({
                            title: '¿Estás seguro de eliminar el archivo <strong>"' + fileName +
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
                                    url: "{{ url('archivos/eliminar') }}/" + fileId,
                                    type: "GET",
                                    success: function(response) {
                                        Swal.fire(
                                            '¡Eliminado!',
                                            '<strong>"' + fileName +
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
                                            'Se produjo un error al eliminar el archivo',
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
        </div>
    </div>



@stop




