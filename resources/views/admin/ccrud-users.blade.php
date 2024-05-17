@extends('adminlte::page')


@section('content_header')
    <h1 class="m-0 text-dark">CRUD USERS</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form name="userForm" id="userForm" action="{{ url('') }}" method="post">@csrf
                    <div class="card-body">
                    {{-- <p class="mb-0">Usuarios</p> --}}
                    {{-- @section('plugins.Datatables', true) --}}

                    {{-- With prepend slot --}}
                    <x-adminlte-input name="iUser" label="Nombre" placeholder="Ingrese el nombre" label-class="text-lightblue" fgroup-class="col-md-6">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>

                    <div class="row">
                        <x-adminlte-input name="iMail" label="Correo Electronico" placeholder="mail@example.com" fgroup-class="col-md-6"
                            disable-feedback />
                    </div>

                </div>
                </form>
            </div>

                    <div class="card">
                        <div class="card-body">
                    {{-- Setup data for datatables --}}
                    @php
                        $heads = ['ID', 'Nombre', 'Correo Electronico', 'correo verificado', 'create', ['label' => 'Acciones', 'no-export' => true, 'width' => 5]];
                        
                        $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </button>';
                        $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>';
                        $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                        </button>';
                        
                        $usuarios = App\Models\User::all(); //Obtener los datos de tu tabla en el controlador y asignarlos a la variable $usuarios
                        
                        $data = [];
                        foreach ($usuarios as $usuario) {
                            $data[] = [
                                $usuario->id,
                                $usuario->name,
                                $usuario->email,
                                $usuario->email_verified_at,
                                $usuario->created_at,
                                '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>', // Botones de acción
                            ];
                        }
                        
                        $config = [
                            'data' => $data,
                            'order' => [[1, 'asc']],
                            'columns' => [null, null, null, null, null, ['orderable' => false]],
                        ];
                    @endphp

                    {{-- With buttons --}}
                    <x-adminlte-datatable id="table7" :heads="$heads" head-theme="dark" theme="light"
                        :config="$config" striped hoverable with-buttons>
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

                    {{-- With buttons + customization --}}
                    @php
                        $config['dom'] = '<"row" <"col-sm-7" B> <"col-sm-5 d-flex justify-content-end" i> >
                                        <"row" <"col-12" tr> >
                                        <"row" <"col-sm-12 d-flex justify-content-start" f> >';
                        $config['paging'] = false;
                        $config['lengthMenu'] = [10, 50, 100, 500];
                    @endphp

                    <i class="fas fa-user-plus"></i>

                    {{-- Custom --}}
                    <x-adminlte-modal id="modalCustom" title="Account Policy" size="lg" theme="primary"
                        icon="fas fa-edit" v-centered static-backdrop scrollable>
                        <div style="height:800px;">Info...</div>
                        <x-slot name="footerSlot">
                            <x-adminlte-button class="mr-auto" theme="danger" label="Cancelar" data-dismiss="modal" />
                            <x-adminlte-button theme="success" label="Aceptar" />
                        </x-slot>
                    </x-adminlte-modal>
                    {{-- Example button to open modal --}}
                    <x-adminlte-button label="Open Modal" data-toggle="modal" data-target="#modalCustom"
                        class="bg-primary" />

                </div>
            </div>
        </div>
    </div>
@stop
