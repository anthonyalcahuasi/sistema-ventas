@extends('adminlte::page')

@section('title', 'Detalle del Producto')

@section('content_header')
    <h1>Detalle del Producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h5><strong>Nombre:</strong> {{ $product->name }}</h5>
            <h5><strong>Precio:</strong> S/. {{ number_format($product->price, 2) }}</h5>
            <h5><strong>Stock:</strong> {{ $product->stock }}</h5>

            <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Volver</a>
        </div>
    </div>
@stop
