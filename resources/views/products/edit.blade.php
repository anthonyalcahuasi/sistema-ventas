@extends('adminlte::page')

@section('title', 'Editar Producto')

@section('content_header')
    <h1>Editar Producto</h1>
@stop

@section('content')
    @if ($errors->any())
        <x-adminlte-alert theme="danger" title="Errores de validación">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-adminlte-alert>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.update', $product) }}" method="POST">
                @csrf
                @method('PUT')

                <x-adminlte-input name="name" label="Nombre" value="{{ old('name', $product->name) }}" fgroup-class="mb-3" />

                <x-adminlte-input name="price" label="Precio" type="number" step="0.01" value="{{ old('price', $product->price) }}" fgroup-class="mb-3" />

                <x-adminlte-input name="stock" label="Stock" type="number" value="{{ old('stock', $product->stock) }}" fgroup-class="mb-3" />

                <x-adminlte-button label="Actualizar" theme="warning" icon="fas fa-save" type="submit" />
            </form>
        </div>
    </div>
@stop
