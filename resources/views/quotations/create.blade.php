@extends('adminlte::page')

@section('title', 'Crear Cotización')

@section('content_header')
    <h1>Crear Cotización</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Corrige los errores a continuación:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('quotations.store') }}" method="POST">
        @csrf

        <div class="card">
            <div class="card-header bg-primary text-white">
                <strong>Datos del Cliente</strong>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="client_id">Seleccionar Cliente:</label>
                    <select name="client_id" id="client_id" class="form-control" required>
                        <option value="">-- Selecciona un cliente --</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                {{ $client->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header bg-info text-white">
                <strong>Agregar Productos</strong>
            </div>
            <div class="card-body">
                @foreach($products as $product)
                    <div class="form-group row align-items-center">
                        <label class="col-md-4 col-form-label">{{ $product->name }}</label>
                        <div class="col-md-3">
                            <input type="number" name="products[{{ $product->id }}][quantity]"
                                   class="form-control" placeholder="Cantidad" min="0"
                                   value="{{ old("products.{$product->id}.quantity") }}">
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="products[{{ $product->id }}][price]"
                                   class="form-control" placeholder="Precio" min="0" step="0.01"
                                   value="{{ old("products.{$product->id}.price") }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-success">Guardar Cotización</button>
            <a href="{{ route('quotations.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
@stop
