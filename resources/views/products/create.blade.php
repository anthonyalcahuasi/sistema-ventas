@extends('adminlte::page')

@section('title', 'Nuevo Producto')

@section('content_header')
    <h1>Registrar Producto</h1>
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
            <form action="{{ route('products.store') }}" method="POST">
                @csrf

                <x-adminlte-input name="name" label="Nombre" value="{{ old('name') }}" fgroup-class="mb-3" />

                <x-adminlte-input name="price" label="Precio" type="number" step="0.01" value="{{ old('price') }}" fgroup-class="mb-3" />

                <x-adminlte-input name="stock" label="Stock" type="number" value="{{ old('stock') }}" fgroup-class="mb-3" />

                <x-adminlte-button label="Guardar" theme="primary" icon="fas fa-save" type="submit" />
            </form>
        </div>
    </div>
@stop
