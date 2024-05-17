@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- <p class="mb-0">You are logged in!</p> --}}
                    <h4>Hola {{ auth()->user()->name }}</h4>
                    @role('admin')
                        <h5>Eres administrador</h5>
                    @endrole
                    @role('user')
                    <h5>Eres un usuario</h5>
                    @endrole
                </div>
            </div>
        </div>
    </div>
@stop
