@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Administrador de Archivos</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
            <form action =""method="post" Enctype="multipart/form-data">
                {{-- <div class="card-body"> --}}
                    {{-- <p class="mb-0">You are logged in!</p> --}}
                    {{-- <h4>Hola {{ auth()->user()->name }}</h4>
                    @role('admin')
                        <h5>Eres administrador</h5>
                    @endrole
                    @role('user')
                    <h5>Eres un usuario</h5>
                    @endrole --}}

                    <iframe src="{{ route('unisharp.lfm.show') }}" style="width: 100%; height: 600px; border: none;"></iframe>

                {{-- </div> --}}
            </div>
        </div>
    </div>
@stop
