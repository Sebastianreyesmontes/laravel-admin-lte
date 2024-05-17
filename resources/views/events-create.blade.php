@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Crear Eventos</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <x-adminlte-input name="name" label="Nombre" placeholder="Escriba el nombre"
                            fgroup-class="col-md-6" />
                    </div>

                    <div class="row">
                        <x-adminlte-textarea name="descripction" label="Descripción" placeholder="Descripción del evento"
                            fgroup-class="col-md-6">
                        </x-adminlte-textarea>
                    </div>

                    <div class="row">
                        <x-adminlte-select2 name="type" label="Tipo" data-placeholder="Seleccione"
                            fgroup-class="col-md-6">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-tags"></i>
                                </div>
                            </x-slot>
                            <option />
                            <option>Seleccione</option>
                            <option>Reunión</option>
                            <option>Capacitación</option>
                            <option>Cumpleaños</option>
                            <option>Vacaciones</option>
                        </x-adminlte-select2>
                    </div>

                    <div class="row">
                        @php
                            $config = ['format' => 'YYYY-MM-DD'];
                        @endphp
                        <x-adminlte-input-date name="date" label="Fecha" :config="$config" placeholder="Seleccione"
                            fgroup-class="col-md-6">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-calendar"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>
                    </div>

                    <div class="row">
                        @php
                            $config = ['format' => 'LT'];
                        @endphp
                        <x-adminlte-input-date label="Hora" name="hora" :config="$config"
                            placeholder="Seleccione la hora" fgroup-class="col-md-6">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info"> <i class="fas fa-clock"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>
                    </div>


                    {{-- Botón --}}
                    <x-adminlte-button class="btn-flat" type="submit" label="Guardar Evento" theme="success"
                        icon="fas fa-lg fa-save" />

                    {{-- Fin Forms --}}
                </div>
            </div>
        </div>
    </div>
@stop
