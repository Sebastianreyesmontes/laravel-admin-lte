@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Crear Etapa del Proyecto {{ $project->name }}</h1>
@stop

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Crear Proceso</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('projects.createProcess', ['id' => $project->id]) }}"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <x-adminlte-select2 name="stage" label="Estado del Proyecto" data-placeholder="Eliga uno">

                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-dots text-info">
                                <i class="fas fa-info-circle"></i>
                            </div>
                        </x-slot>
                        <option />
                        <option value="Planificación"
                            {{ !empty($newproject['stage']) && $newproject['stage'] == 'Planificación' ? 'selected' : '' }}>
                            Planificación</option>
                        <option value="Ejecución"
                            {{ !empty($newproject['stage']) && $newproject['stage'] == 'Ejecución' ? 'selected' : '' }}>
                            Ejecución</option>
                        <option value="Cierre"
                            {{ !empty($newproject['stage']) && $newproject['stage'] == 'Cierre' ? 'selected' : '' }}>Cierre
                        </option>

                    </x-adminlte-select2>
                </div>

<div>

</div>

                <div class="">
                    <x-adminlte-input name="name" label="Titulo" placeholder="Nombre del proceso..."></x-adminlte-input>

                    <x-adminlte-textarea name="description" label="Descripción" placeholder="Escribe aqui..." rows=5/>
                </div>

                <div class="create-post-p mt-3 mb-3 ml-3 mr-3">

                    <x-adminlte-input-file name="file[]" label="Subir Archivos" multiple/>

                    {{-- <h5>Archivos Cargados</h5>
                    <div class="row">
                        <!-- Columna izquierda -->
                        <div class="col-md-6">
                            <ul id="fileList" class="list-unstyled">
                                <li id="noFilesSelected">Ningún archivo seleccionado</li>
                            </ul>
                        </div>
                        <!-- Columna derecha -->
                        <div class="col-md-6">
                        </div>
                    </div> --}}

                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-secondary">
                            Cancelar </button>
                        <button type="submit" class="btn btn-primary btn btn-success float-right">
                            <i class="fas fa-location-arrow"></i> Subir </button>
                    </div>
                </div>
            </form>

        </div>


    </div>

    <script>
        const selectedFiles = [];

        function getFileIcon(extension) {
            // Mapea extensiones a nombres de iconos
            const iconMap = {
                pdf: 'far fa-fw fa-file-pdf',
                docx: 'far fa-fw fa-file-word',
                mln: 'far fa-fw fa-envelope',
                png: 'far fa-file-image',
                jpg: 'fas fa-file-image',
                jpeg: 'fas fa-file-image',
                pst: 'far fa-envelope',
                xls: 'far fa-file-excel',
                xlsx: 'fas fa-file-excel',
                rar: 'fas fa-file-archive',
                zip: 'fas fa-file-archive',
                pptx: 'fas fa-file-powerpoint',
                ppt: 'fas fa-file-powerpoint',
                mp4: 'far fa-file-video',
                avi: 'far fa-file-video',
                mkv: 'far fa-file-video',
                wmv: 'far fa-file-video',
                mp3: 'far fa-file-audio',
                wma: 'far fa-file-audio',
                mp3: 'far fa-file-audio',
                wav: 'far fa-file-audio',
                opus: 'far fa-file-audio',
                pst: 'far fa-envelope',
            };

        // Usa el icono predeterminado si no se encuentra una coincidencia
        return iconMap[extension] || 'far fa-fw fa-file';
    }

    function handleFileChange(input) {
        console.log("handleFileChange is called");
        const fileListElement = document.getElementById('fileList');
        const noFilesSelectedElement = document.getElementById('noFilesSelected');

        const existingFiles = [];
        const newFiles = [];

        for (const file of input.files) {
            const isDuplicate = selectedFiles.some(f => f.name === file.name);

            if (isDuplicate) {
                existingFiles.push(file);
            } else {
                newFiles.push(file);
            }
        }

        // Verificar y procesar archivos duplicados
        function processNextDuplicate() {
            const file = existingFiles.shift();

            if (!file) {
                // No hay más archivos duplicados
                return;
            }

            const fileExtension = file.name.split('.').pop().toLowerCase();
            const fileIconClass = getFileIcon(fileExtension);

            Swal.fire({
                icon: 'warning',
                title: 'Archivo duplicado',
                html: `El archivo <strong>${file.name}</strong> (${fileExtension.toUpperCase()}) ya ha sido cargado. ¿Desea reemplazarlo?`,
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Reemplazar',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    // Reemplazar el archivo existente
                    const index = selectedFiles.findIndex(f => f.name === file.name);
                    selectedFiles[index] = file;

                    // Actualizar la vista
                    const listItem = fileListElement.querySelector(`[data-file="${file.name}"]`);
                    listItem.innerHTML = `<a href="" class="btn-link text-secondary"><i class="${fileIconClass}"></i> ${file.name}</a>`;

                    // Procesar el siguiente archivo duplicado
                    processNextDuplicate();
                } else {
                    // Procesar el siguiente archivo duplicado
                    processNextDuplicate();
                }
            });
        }

        // Comenzar el proceso de verificación de archivos duplicados
        processNextDuplicate();

        // Agregar los archivos nuevos que no son duplicados
        for (const file of newFiles) {
            selectedFiles.push(file);
            const listItem = document.createElement('li');
            const fileExtension = file.name.split('.').pop().toLowerCase();
            const fileIconClass = getFileIcon(fileExtension);
            listItem.dataset.file = file.name;
            listItem.innerHTML = `<a href="" class="btn-link text-secondary"><i class="${fileIconClass}"></i> ${file.name}</a>`;
            fileListElement.appendChild(listItem);
        }

        // Limpiar el input de tipo archivo para permitir selecciones adicionales
        input.value = '';

         // Ocultar el mensaje "Ningún archivo seleccionado" si se han seleccionado archivos
         if (selectedFiles.length > 0) {
            noFilesSelectedElement.style.display = 'none';
        }
    }

    document.querySelector('#ifMultiple').addEventListener('change', function() {
        handleFileChange(this);
    });
</script>
@stop
