@extends('adminlte::page')

@section('title', 'Detalle de Venta')

@section('content_header')
    <h1>Detalle de Venta #{{ $sale->id }}</h1>
@stop

@section('content')
    <x-adminlte-card title="Información General" theme="info" icon="fas fa-info-circle">
        <p><strong>Cliente:</strong> {{ $sale->client->name ?? 'No asignado' }}</p>
        <p><strong>Fecha:</strong> {{ $sale->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>Total:</strong> S/ {{ number_format($sale->total, 2) }}</p>
    </x-adminlte-card>

    <x-adminlte-card title="Productos Vendidos" theme="secondary" icon="fas fa-box">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sale->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>S/ {{ number_format($item->price, 2) }}</td>
                        <td>S/ {{ number_format($item->quantity * $item->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-adminlte-card>

    <a href="{{ route('sales.index') }}" class="btn btn-primary">
        <i class="fas fa-arrow-left"></i> Volver al listado
    </a>
@stop
