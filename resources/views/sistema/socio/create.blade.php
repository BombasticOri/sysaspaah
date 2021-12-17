@extends('adminlte::page')

@section('title', 'Socios')

@section('plugins.Sweetalert2', true)

@section('content_header')

<div class="row">
    <div class="col-sm-6">
        <h1>Registrar Socio</h1>
    </div>
    <div class="col-sm-6 d-none d-sm-block">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="/socios">Socios</a></li>
            <li class="breadcrumb-item"><a href="/socios/create">Registrar</a></li>
        </ol>
    </div>
</div>

@stop

@section('content')

@livewire('socios.create')

<x-livewire-alert::scripts />
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop