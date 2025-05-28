@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
    @if (session('success'))
        <x-adminlte-alert theme="success" title="Éxito">
            {{ session('success') }}
        </x-adminlte-alert>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('clients.create') }}" class="btn btn-primary">Nuevo Cliente</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->phone }}</td>
                            <td>
                                <a href="{{ route('clients.show', $client) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Deseas eliminar este cliente?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $clients->links() }}
            </div>
        </div>
    </div>
@stop
