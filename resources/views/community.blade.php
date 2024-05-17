@extends('adminlte::page')

@vite(['resources/css/organigrama.css'])

@section('content_header')
    <h1 class="m-0 text-dark">Comunidad</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">

        <div class="card">
            <img src="{{ asset('imgs/organigrama.png') }}" alt="">
        </div>

            <div class="card">
                <div class="card-body">

                    <h3 class="mb-0 text-center">Gerencia Administrativa y Financiera</h3>

                    <div class="tree">

                                    {{-- Gerencia Administrativa y Financiera --}}
                        <ul>
                            <li class="no-line coordinador"><a href="*"><div class="">@if (config('adminlte.usermenu_image'))<img src="{{ Auth::user()->adminlte_image() }}"class="user-image img-circle elevation-1 coordinador"alt="{{ Auth::user()->name }}">@endif<span @if (config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>{{ Auth::user()->name }}</span></div></a>
                            <li class="no-line jefe1"><a href="*"> <div class="">@if (config('adminlte.usermenu_image'))<img src="{{ Auth::user()->adminlte_image() }}"class="user-image img-circle elevation-1 jefe1"alt="{{ Auth::user()->name }}">@endif<span @if (config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>{{ Auth::user()->name }}</span></div></a>
                                </li>

                                {{-- Jefe Administrativo --}}
                                <ul>
                                    <li><a href="*">@if (config('adminlte.usermenu_image'))<img src="{{ Auth::user()->adminlte_image() }}"class="user-image img-circle elevation-1"alt="{{ Auth::user()->name }}">@endif<span @if (config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>{{ Auth::user()->name }}</span></a>
                                        <ul>
                                            <li><a href="*">@if (config('adminlte.usermenu_image'))<img src="{{ Auth::user()->adminlte_image() }}"class="user-image img-circle elevation-1"alt="{{ Auth::user()->name }}">@endif<span @if (config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>{{ Auth::user()->name }}</span></a></li>
                                            <li><a href="*">@if (config('adminlte.usermenu_image'))<img src="{{ Auth::user()->adminlte_image() }}"class="user-image img-circle elevation-1"alt="{{ Auth::user()->name }}">@endif<span @if (config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>{{ Auth::user()->name }}</span></a></li>
                                        </ul>
                                    </li>

                                    {{-- Asistentes --}}
                                    <li><a href="*">@if (config('adminlte.usermenu_image'))<img src="{{ Auth::user()->adminlte_image() }}"class="user-image img-circle elevation-1"alt="{{ Auth::user()->name }}">@endif<span @if (config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>{{ Auth::user()->name }}</span></a>
                                        <ul>
                                            <li><a href="#">@if (config('adminlte.usermenu_image'))<img src="{{ Auth::user()->adminlte_image() }}" class="user-image img-circle elevation-1" alt="{{ Auth::user()->name }}">@endif<span @if (config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>{{ Auth::user()->name }}</span></a>
                                            <ul>
                                                <li><a href="#">@if (config('adminlte.usermenu_image'))<img src="{{ Auth::user()->adminlte_image() }}" class="user-image img-circle elevation-1" alt="{{ Auth::user()->name }}">@endif<span @if (config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>{{ Auth::user()->name }}</span></a>
                                                <ul>
                                                    <li><a href="#">@if (config('adminlte.usermenu_image'))<img src="{{ Auth::user()->adminlte_image() }}" class="user-image img-circle elevation-1" alt="{{ Auth::user()->name }}">@endif<span @if (config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>{{ Auth::user()->name }}</span></a>
                                                    </li>
                                                </ul>
                                            </ul>
                                        </ul>
                                                </li>
                                            </li>

                                    {{-- Jefe de Gestión Humana --}}
                                    <li><a href="*">@if (config('adminlte.usermenu_image'))<img src="{{ Auth::user()->adminlte_image() }}"class="user-image img-circle elevation-1"alt="{{ Auth::user()->name }}">@endif<span @if (config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>{{ Auth::user()->name }}</span></a>
                                        <ul>
                                            <li><a href="*">@if (config('adminlte.usermenu_image'))<img src="{{ Auth::user()->adminlte_image() }}"class="user-image img-circle elevation-1"alt="{{ Auth::user()->name }}">@endif<span @if (config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>{{ Auth::user()->name }}</span></a></li>
                                            <li><a href="*">@if (config('adminlte.usermenu_image'))<img src="{{ Auth::user()->adminlte_image() }}"class="user-image img-circle elevation-1"alt="{{ Auth::user()->name }}">@endif<span @if (config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>{{ Auth::user()->name }}</span></a></li>
                                            <li><a href="*">@if (config('adminlte.usermenu_image'))<img src="{{ Auth::user()->adminlte_image() }}"class="user-image img-circle elevation-1"alt="{{ Auth::user()->name }}">@endif<span @if (config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>{{ Auth::user()->name }}</span></a></li>
                                        </ul>
                                    </li>

                                    {{-- Jefe de Redes y Electronica --}}
                                    <li><a href="*">@if (config('adminlte.usermenu_image'))<img src="{{ Auth::user()->adminlte_image() }}"class="user-image img-circle elevation-1"alt="{{ Auth::user()->name }}">@endif<span @if (config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>{{ Auth::user()->name }}</span></a>
                                        <ul>
                                            <li><a href="*">@if (config('adminlte.usermenu_image'))<img src="{{ Auth::user()->adminlte_image() }}"class="user-image img-circle elevation-1"alt="{{ Auth::user()->name }}">@endif<span @if (config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>{{ Auth::user()->name }}</span></a></li>
                                            <li><a href="*">@if (config('adminlte.usermenu_image'))<img src="{{ Auth::user()->adminlte_image() }}"class="user-image img-circle elevation-1"alt="{{ Auth::user()->name }}">@endif<span @if (config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>{{ Auth::user()->name }}</span></a></li>
                                        </ul>
                                    </li>

                                    {{-- Jefe de Sistemas e Informatica --}}
                                    <li><a href="*">@if (config('adminlte.usermenu_image'))<img src="{{ Auth::user()->adminlte_image() }}"class="user-image img-circle elevation-1"alt="{{ Auth::user()->name }}">@endif<span @if (config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>{{ Auth::user()->name }}</span></a>
                                        <ul>
                                            <li><a href="*">@if (config('adminlte.usermenu_image'))<img src="{{ Auth::user()->adminlte_image() }}"class="user-image img-circle elevation-1"alt="{{ Auth::user()->name }}">@endif<span @if (config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>{{ Auth::user()->name }}</span></a></li>
                                        </ul>
                                    </li>
                                </ul>

                            </li>
                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
