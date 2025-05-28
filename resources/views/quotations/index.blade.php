@extends('adminlte::page')

@section('title', 'Cotizaciones')

@section('content_header')
    <h1>Listado de Cotizaciones</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('quotations.create') }}" class="btn btn-primary">Nueva Cotización</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quotations as $quotation)
                        <tr>
                            <td>{{ $quotation->id }}</td>
                            <td>{{ $quotation->client->name }}</td>
                            <td>{{ $quotation->created_at->format('d/m/Y') }}</td>
                            <td>S/ {{ number_format($quotation->total, 2) }}</td>
                            <td>
                                <span class="badge bg-{{ $quotation->status == 'aceptada' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($quotation->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('quotations.show', $quotation->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('quotations.edit', $quotation->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('quotations.destroy', $quotation->id) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Seguro que desea eliminar?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $quotations->links() }}
            </div>
        </div>
    </div>
@stop