@extends('adminlte::page')

@vite(['resources/css/proyectos.css'])

@section('content_header')
    <h3 class="m-0 text-dark text-center">{{ $project->name }}</h3>
@stop

@section('content')
    {{-- <div class="card">
        <div class="card-header">
            <h3 class="card-title">Condensed Full Width Table</h3>
        </div>

        <div class="card-body p-0">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Task</th>
                        <th>Progress</th>
                        <th style="width: 40px">Label</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>Update software</td>
                        <td>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-danger">55%</span></td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Clean database</td>
                        <td>
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-warning" style="width: 70%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-warning">70%</span></td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Cron job running</td>
                        <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar bg-primary" style="width: 30%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-primary">30%</span></td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Fix and squish bugs</td>
                        <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar bg-success" style="width: 90%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-success">90%</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div> --}}

    {{-- @php
    // Verifica el valor de $project->id
    dd($project->id);
@endphp --}}
    <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">
            <a style="max-width: 230px; margin-bottom: 10px;" class="btn btn-block bg-gradient-info float-right"
                href="{{ route('projects.createProcess', ['id' => $project->id]) }}">Crear Etapas del Proyecto</a>
        </div>
    </div>


    <div class="card card-gray">
        <div class="card-header">
            <h3 class="card-title">Detalles</h3>
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
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Presupuesto Estimado</span>
                                    <span
                                        class="info-box-number text-center text-muted mb-0">{{ $project->estimated_budget }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Contratista</span>
                                    <span
                                        class="info-box-number text-center text-muted mb-0">{{ $project->contractor }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Tiempo Final Estimado</span>
                                    <span
                                        class="info-box-number text-center text-muted mb-0">{{ $project->end_date }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="mt-2 mb-4">Etapas Creadas </h4>

                            {{-- <div class="post clearfix">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg"
                                        alt="User Image">
                                    <span class="username">
                                        <a href="#">Sarah Ross</a>
                                    </span>
                                    <span class="description">Sent you a message - 3 days ago</span>
                                </div>

                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore.
                                </p>
                                <p>
                                    <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo
                                        File
                                        2</a>
                                </p>
                            </div>
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg"
                                        alt="user image">
                                    <span class="username">
                                        <a href="#">Jonathan Burke Jr.</a>
                                    </span>
                                    <span class="description">Shared publicly - 5 days ago</span>
                                </div>

                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore.
                                </p>
                                <p>
                                    <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo
                                        File
                                        1 v1</a>
                                </p>
                            </div> --}}

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="planning-tab" data-toggle="tab"
                                        data-target="#planning" type="button" role="tab" aria-controls="planning"
                                        aria-selected="false">Planificación</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="execution-tab" data-toggle="tab" data-target="#execution"
                                        type="button" role="tab" aria-controls="execution"
                                        aria-selected="false">Ejecución</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="closing-tab" data-toggle="tab" data-target="#closing"
                                        type="button" role="tab" aria-controls="closing"
                                        aria-selected="false">Cierre</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="planning" role="tabpanel"
                                    aria-labelledby="planning-tab">
                                    <div class="content-card">
                                        @if (!empty($planningProcesses))
                                            <p style="margin-top: 8px;" class="text-sm">Cantidad:
                                                {{ count($planningProcesses) }}</p>
                                            @foreach ($planningProcesses as $process)
                                                <div class="card">
                                                    <div class="card-header">
                                                        <b>{{ $process->name }}</b>
                                                    </div>
                                                    <div class="card-body">
                                                        <p style="text-align: justify;">{{ $process->description }}</p>
                                                        {{-- <b>Etapa: {{ $process->stage }}</b> --}}

                                                        @if (!empty($process->file_path))
                                                            <p>Archivos Subidos</p>
                                                            <ul>
                                                                @php
                                                                    $filepaths = explode(',', $process->file_path); // Divide la cadena en un array
                                                                @endphp

                                                                @foreach ($filepaths as $filepath)
                                                                    <ul class="list-unstyled">
                                                                        <li>
                                                                            <i class="fas fa-file-download"
                                                                                style="color: #6c757d"></i>{{ ' ' . $filepath }}
                                                                            <a href="{{ asset($filepath) }}">Descargar</a>
                                                                        </li>
                                                                    </ul>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <p>No hay archivos relacionados con este proceso.</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No hay procesos disponibles de Planificación.</p>
                                        @endif
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="execution" role="tabpanel" aria-labelledby="execution-tab">
                                    <div class="content-card">
                                        @if (!empty($executionProcesses))
                                            <p style="margin-top: 8px;" class="text-sm">Cantidad:
                                                {{ count($executionProcesses) }}</p>
                                            @foreach ($executionProcesses as $process)
                                                <div class="card">
                                                    <div class="card-header">
                                                        <b>{{ $process->name }}</b>
                                                    </div>
                                                    <div class="card-body">
                                                        <p style="text-align: justify;">{{ $process->description }}</p>

                                                        @if (!empty($process->file_path))
                                                            <p>Archivos Subidos</p>
                                                            <ul>
                                                                @php
                                                                    $filepaths = explode(',', $process->file_path); // Divide la cadena en un array
                                                                @endphp

                                                                @foreach ($filepaths as $filepath)
                                                                    <ul class="list-unstyled">
                                                                        <li>
                                                                            <i class="fas fa-file-download"
                                                                                style="color: #6c757d"></i>{{ ' ' . $filepath }}
                                                                            <a href="{{ asset($filepath) }}">Descargar</a>
                                                                        </li>
                                                                    </ul>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <p>No hay archivos relacionados con este proceso.</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No hay procesos disponibles de Ejecución.</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="closing" role="tabpanel" aria-labelledby="closing-tab">
                                    <div class="content-card">
                                        @if (!empty($closureProcesses))
                                            <p style="margin-top: 8px;" class="text-sm">Cantidad:
                                                {{ count($closureProcesses) }}</p>
                                            @foreach ($closureProcesses as $process)
                                                <div class="card">
                                                    <div class="card-header">
                                                        <b>{{ $process->name }}</b>
                                                    </div>
                                                    <div class="card-body">
                                                        <p style="text-align: justify;">{{ $process->description }}</p>

                                                        @if (!empty($process->file_path))
                                                            <p>Archivos Subidos</p>
                                                            <ul>
                                                                @php
                                                                    $filepaths = explode(',', $process->file_path); // Divide la cadena en un array
                                                                @endphp

                                                                @foreach ($filepaths as $filepath)
                                                                    <ul class="list-unstyled">
                                                                        <li>
                                                                            <i class="fas fa-file-download"
                                                                                style="color: #6c757d"></i>{{ ' ' . $filepath }}
                                                                            <a href="{{ asset($filepath) }}">Descargar</a>
                                                                        </li>
                                                                    </ul>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <p>No hay archivos relacionados con este proceso.</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No hay procesos disponibles de Cierre.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h3 class="text-primary"><i class="fas fa-users-cog"></i> Proyecto {{ $project->name }}</h3>
                    <p class="text-muted">{{ $project->object }}</p>
                    <br>
                    <div class="text-muted">
                        <h5 class="mt-5 text-muted">Lider del Proyecto</h5>
                        <p class="d-block">{{ $project->project_leader }}</p>
                    </div>

                    <div class="text-muted">
                        <h5 class="mt-5 text-muted">Miembros</h5>
                        <button id="modal-action" type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalCenter" class="modal" tabindex="-1">
                            Agregar Miembros
                        </button>
                        <div id="modal-action" data-target="#exampleModalCenter" class="modal" tabindex="-1"></div>
                    </div>

                </div>


            </div>

        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#modal-action').click(function() {
                $('#addMembersModal').modal('show');
            });
    });
    </script>
@stop
