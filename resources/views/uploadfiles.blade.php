@extends('adminlte::page')


@section('content_header')
    <h1 class="m-0 text-dark">Archivos</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0" style="text-align: center">Crear  archivos</p>
                    <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
                        
                     @csrf
                    <div class="row">
                        <x-adminlte-input name="name" label="Nombre" placeholder="Escriba el nombre"
                            fgroup-class="col-md-6" />
                    </div>

                    <div class="row">
                        <x-adminlte-select2 name="area" label="Procesos" data-placeholder="Seleccione"
                            fgroup-class="col-md-6">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-tags"></i>
                                </div>
                            </x-slot>
                            <option />
                            <option>GERENCIAL</option>
                            <option>GESTIÓN COMERCIAL</option>
                            <option>GESTIÓN CALIDAD</option>
                            <option>COORDINACIÓN DE OPERACIONES AEROPORTUARIAS</option>
                            <option>PROYECTOS DE INFRAESTRUCTURA</option>
                            <option>MANTENIMIENTO</option>
                            <option>SEGURIDAD AEROPORTUARIA</option>
                            <option>COMPRAS</option>
                            <option>FACTURACIÓN Y CARTERA</option>
                            <option>PROCESO FINANCIERO</option>
                            <option>RECURSOS HUMANOS</option>
                            <option>SISTEMAS E INFORMATICA</option>
                        </x-adminlte-select2>
                    </div>

                    <div class="row">
                        <x-adminlte-select2 name="prop" label="Propietario" data-placeholder="Escoja uno"
                            fgroup-class="col-md-6">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-tags"></i>
                                </div>
                            </x-slot>
                            <option />
                            <option>CLAUDIA ALVAREZ</option>
                            <option>RICARDO LENIS</option>
                            <option>CESAR MEJIA</option>
                            <option>JORGE BARIONI</option>
                            <option>MARIA PAULA GAMBOA</option>
                            <option>ANGELA SALCEDO</option>
                            <option>LISBETH HERNANDEZ</option>
                            <option>JUAN CARLOS GARCIA</option>
                            <option>MARILUZ SALGADO</option>
                            <option>JUAN CARLOS MONROY/option>
                            <option>PHANOR TRUJILLO</option>
                            <option>JOSE DARIO HERNANDEZ</option>
                            <option>WILDER SANCHEZ</option>
                            <option>ELKIN BERMUDEZ</option>
                            <option>ANDRES MILLAN</option>
                            <option>MAURICIO ESPAÑA </option>
                            <option>DIDIER GUERRERO </option>
                            <option>FELIPE AGUDELO</option>
                            <option>DIEGO ARISTIZABAL</option>
                            <option>ANGELA VALENCIA  </option>
                            <option>MAURICIO ALZATE</option>
                            <option>ANTONIO SILVA</option>
                            <option>JULIO BERMUDEZ </option>
                            <option>JORGE CAVIEDES</option>
                            <option>KAROL CARDONA</option>
                            <option>JHON JAIRO ROMERO</option>

                        </x-adminlte-select2>
                    </div>

                    <div class="row">
                        <x-adminlte-select2 name="arch" label="Tipo de Documento" data-placeholder="Eliga uno"
                            fgroup-class="col-md-6">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-folder-open"></i>
                                </div>
                            </x-slot>
                            <option />
                            <option> Manual (Y) aparato </option>
                            <option> Guía de algún proceso / procedimiento </option>
                            <option> Formato </option>
                            <option> Instructivo </option>
                            <option> Docs </option>
                        </x-adminlte-select2>
                    </div>

                    {{-- <x-adminlte-select2 name="tipoDoc" label="Tipo de Documento" label-class="text-lightblue" igroup-size="lg"
                        data-placeholder="Eliga uno">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-folder-open"></i>
                            </div>
                        </x-slot>
                        <option />
                        <option> Manual (Y) aparato </option>
                        <option> Guía de algún proceso / procedimiento </option>
                        <option> Formato </option>
                        <option> Instructivo </option>
                        <option> Docs </option>
                    </x-adminlte-select2> --}}


                    {{-- SE PODRIA IMPLEMENTAR UN TRUE FALSE O PREGUNTAR SI TENDRA OTRA SESIÓN- SI EL NOMBRE COMO OTRA SUBCARPETA --}}

                    {{-- SI ES SI, SE HABRE OTRO FORMULARIO PARA PEDIR MAS DATOS. NO ES QUE LE PERMITIRA AL USUARIO SUBIR DIRECTAMENTE EL ARCHIVO --}}

                    {{-- With custom text using data-* config --}}
                    {{-- <x-adminlte-input-switch name="iswText" data-on-text="YES" data-off-text="NO" data-on-color="teal" /> --}}

                    <div class="form-group">
                        <label for="file-edit" >Archivo</label name="docs">
                        <input type="file" class="form-control-file" id="file-edit" name="docs">
                    </div>
                    <form method="POST" action="{{ url('/archivos') }}" enctype="multipart/form-data">
                        @csrf
                        <x-adminlte-button  href="#" class="btn-flat"  type="submit" name="submit" value="submit" label="Subir Archivo" theme="success"
                        icon="fas fa-lg fa-save"  />
                    </form>

                </div>
            </div>
        </div>
    </div>

    


@stop
