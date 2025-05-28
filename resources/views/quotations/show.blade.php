@extends('adminlte::page')

@section('title', 'Detalle de Cotización')

@section('content_header')
    <h1>Detalle de la Cotización</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>Cliente:</strong> {{ $quotation->client->name }}</p>
            <p><strong>Estado:</strong> {{ ucfirst($quotation->status) }}</p>
            <p><strong>Total estimado:</strong> S/ {{ number_format($quotation->estimated_total, 2) }}</p>
            <p><strong>Productos:</strong></p>
            <ul>
                @foreach ($quotation->items as $item)
                    <li>{{ $item->product->name }} - {{ $item->quantity }} x S/ {{ $item->unit_price }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@stop
