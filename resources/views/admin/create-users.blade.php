@extends('adminlte::page')


@section('content_header')
    <h1 class="m-0 text-dark">{{ $title}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form name="userForm" id="userForm" @if(empty($newuser['id'])) action="{{ url('crud-users/anadir') }}" @else action="{{ url('crud-users/anadir/'.$newuser['id']) }}" @endif method="post">@csrf
                    <div class="card-body">

                        <div class="row">
                    <x-adminlte-input name="name" label="Nombre" placeholder="Ingrese el nombre" fgroup-class="col-md-6" label-class="text-lightblue" :value="$newuser['name'] ?? null">
                        @if(!empty($newuser['name']))
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope text-lightblue"></i>
                                </div>
                            </x-slot>
                        @endif
                    </x-adminlte-input>
                        </div>

                    <div class="row">
                        <x-adminlte-input id="email" name="email" for="email" label="Correo Electrónico" placeholder="mail@example.com" fgroup-class="col-md-6" label-class="text-lightblue" :value="$newuser['email'] ?? null">
                            @if(!empty($newuser['email']))
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope text-lightblue"></i>
                                    </div>
                                </x-slot>
                            @endif
                        </x-adminlte-input>
                    </div>

                    <div class="row">
                    <x-adminlte-input id="password" name="password" for="password" label="Contraseña" placeholder="Ingrese la contraseña" fgroup-class="col-md-6" label-class="text-lightblue" :value="$newuser['password'] ?? null">
                        @if(!empty($newuser['password']))
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope text-lightblue"></i>
                                </div>
                            </x-slot>
                        @endif
                    </x-adminlte-input>
                    </div>

                    <x-adminlte-button class="btn-flat" type="submit" label="Crear Usuario" theme="success"
                    icon="fas fa-lg fa-save" />
                </div>
                </form>
            </div>
        </div>
        </div>
    </div>
@stop
