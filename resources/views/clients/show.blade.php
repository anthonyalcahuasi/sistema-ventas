@extends('adminlte::page')

@section('title', 'Detalle del Cliente')

@section('content_header')
    <h1>Detalle del Cliente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h5><strong>Nombre:</strong> {{ $client->name }}</h5>
            <h5><strong>Email:</strong> {{ $client->email }}</h5>
            <h5><strong>Teléfono:</strong> {{ $client->phone }}</h5>
            <h5><strong>Dirección:</strong> {{ $client->address }}</h5>

            <a href="{{ route('clients.index') }}" class="btn btn-secondary mt-3">Volver</a>
        </div>
    </div>
@stop
