@extends('adminlte::page')

@vite(['resources/css/proyectos.css']) {{-- SE PUEDE QUITAR --}}

@section('content_header')
    <h1 class="m-0 text-dark">{{ $title }}</h1>
@stop

@section('content')

    <form name="projectForm" id="projectForm"
        @if (empty($newproject['id'])) action="{{ url('proyectos/crear') }}" @else action="{{ url('proyectos/crear/' . $newproject['id']) }}" @endif
        method="post">@csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        <div class="row">

            <div class="col-md-6">


                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Colapsar">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="form-group">
                            <x-adminlte-input name="name" label="Nombre del proyecto" placeholder="Escriba el nombre"
                                value="{{ !empty($newproject['name']) ? $newproject['name'] : '' }}">
                            </x-adminlte-input>

                        </div>
                        <div class="form-group">
                            <x-adminlte-textarea name="object" label="Objeto" placeholder="Objeto del Proyecto" rows=5>
                                {{ $newproject['object'] ?? '' }}
                            </x-adminlte-textarea>
                        </div>

                        @php
                            $config = [
                                'placeholder' => 'Seleccione los miembros del equipo',
                                'allowClear' => true,
                            ];
                            $users = \App\Models\User::pluck('name');

                            $userOptions = '';
                            foreach ($users as $user) {
                                $userOptions .= "<option>{$user}</option>";
                            }
                        @endphp

                        {{-- <div class="form-group">
                            <x-adminlte-select2 id="sel2Category" name="members[]" label="Miembros del Proyecto"
                                igroup-size="sm" :config="$config" multiple>
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-gradient-warning">
                                        <i class="fas fa-lg fa-user">
                                            @if (!empty($newproject['members[]']))
                                            @endif
                                        </i>
                                    </div>
                                </x-slot>
                                <x-slot name="appendSlot">
                                    <x-adminlte-button id="limpiar-button" theme="outline-dark" label="Limpiar"
                                        icon="fas fa-lg fa-ban text-danger" />
                                </x-slot>
                                {!! $userOptions !!}
                            </x-adminlte-select2>
                        </div> --}}
                        <div class="form-group">
                            <x-adminlte-select2 name="project_leader" label="Lider del Proyecto"
                                data-placeholder="Seleccione">
                                @foreach ($users as $userOption)
                                    <option value="{{ $userOption }}"
                                        {{ Auth::user()->name == $userOption ? 'selected' : '' }}>{{ $userOption }}
                                    </option>
                                @endforeach

                            </x-adminlte-select2>
                        </div>
                        <div class="form-group">
                            <x-adminlte-input name="contractor" label="Contratista" placeholder="Escriba el nombre"
                                value="{{ !empty($newproject['contractor']) ? $newproject['contractor'] : '' }}">
                            </x-adminlte-input>
                        </div>

                    </div>
                </div>


            </div>


            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Presupuesto</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Colapsar">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <x-adminlte-input name="estimated_budget" label="Presupuesto Estimado" type="number"
                                igroup-size="sm"
                                value="{{ !empty($newproject['estimated_budget']) ? $newproject['estimated_budget'] : '' }}"
                                style="font-size: 17px;">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-dark">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                        </div>

                        <div class="form-group">
                            <label for="">Duración Estimada del Proyecto</label>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <p class="mb-0">Fecha Inicial:</p>
                                        <input type="text" name="start_date"
                                            value="{{ $newproject->start_date ?: date('Y-m-d') }}"
                                            class="form-control datetimepicker-input" id="datetimepicker5"
                                            data-toggle="datetimepicker" data-target="#datetimepicker5"
                                            autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <p class="mb-0">Fecha Final:</p>
                                        <input type="text" name="end_date"
                                            value="{{ $newproject->end_date ?? old('end_date') }}"
                                            class="form-control datetimepicker-input" id="datetimepicker6"
                                            data-toggle="datetimepicker" data-target="#datetimepicker6"
                                            autocomplete="off" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                {{-- <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Archivos</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                        title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tamaño</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Functional-requirements.docx</td>
                            <td>49.8005 kb</td>
                            <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                    <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>UAT.pdf</td>
                            <td>28.4883 kb</td>
                            <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                    <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Email-from-flatbal.mln</td>
                            <td>57.9003 kb</td>
                            <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                    <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Logo.png</td>
                            <td>50.5190 kb</td>
                            <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                    <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Contract-10_12_2014.docx</td>
                            <td>44.9715 kb</td>
                            <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                    <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div> --}}
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <p class="mb-0" style="font-size: 14px;">Limpia todos los campos</p>
                @if (request()->has('id'))
                    <a href="{{ route('proyectos.crear') }}" class="btn btn-secondary">Cancelar</a>
                @else
                    <button type="button" class="btn btn-secondary" onclick="limpiarFormulario()">Cancelar</button>
                @endif

                <x-adminlte-button class="btn btn-success float-right" type="submit" label="Guardar" theme="success"
                    icon="fas fa-lg fa-save" />
            </div>
        </div>

    </form>

    <script>
        function limpiarFormulario() {
            // Obtén el formulario por su id
            var formulario = document.getElementById('projectForm');

            // Recorre todos los elementos del formulario y límpialos
            for (var i = 0; i < formulario.elements.length; i++) {
                var elemento = formulario.elements[i];

                // Verifica si el elemento es un campo de entrada (input)
                if (elemento.type == "text" || elemento.type == "password" || elemento.tagName.toLowerCase() ==
                    "textarea") {
                    elemento.value = ''; // Restablece el valor del campo
                } else if (elemento.type == "checkbox" || elemento.type == "radio") {
                    elemento.checked = false; // Desmarca casillas de verificación y botones de radio
                } else if (elemento.tagName.toLowerCase() == "select") {
                    elemento.selectedIndex = 0; // Restablece la opción seleccionada en los elementos select
                }
            }

            // Redirige a la URL deseada después de limpiar el formulario
            window.location.href = "{{ url('proyectos/crear') }}";
        }

        document.addEventListener('DOMContentLoaded', function() {
            // document.querySelector('#limpiar-button').addEventListener('click', function() {
            $('#datetimepicker5').datetimepicker({
                todayHighlight: true,
                format: 'YYYY-MM-DD',
                useCurrent: false
            });
            $('#datetimepicker6').datetimepicker({
                todayHighlight: true,
                format: 'YYYY-MM-DD',
                useCurrent: false
            });
        });

    </script>
@stop
