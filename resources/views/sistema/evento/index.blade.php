@extends('adminlte::page')

@section('title', 'Eventos')

@section('plugins.Sweetalert2', true)

@section('content_header')

<div class="row">
    <div class="col-sm-6">
        <h1>Gestión de eventos</h1>
    </div>
    <div class="col-sm-6 d-none d-sm-block">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="/eventos">Eventos</a></li>
        </ol>
    </div>
</div>

@stop

@section('content')

@livewire('eventos.index')
<x-livewire-alert::scripts />
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop