@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
    <h1>Gestión de Ventas</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Listado de Ventas</span>
            <a href="{{ route('sales.create') }}" class="btn btn-primary">Nueva Venta</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr>
                            <td>{{ $sale->id }}</td>
                            <td>{{ $sale->client->name ?? 'N/A' }}</td>
                            <td>{{ $sale->created_at->format('d/m/Y') }}</td>
                            <td>S/ {{ number_format($sale->total, 2) }}</td>
                            <td>
                                <a href="{{ route('sales.show', $sale) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('sales.edit', $sale) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('sales.destroy', $sale) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
