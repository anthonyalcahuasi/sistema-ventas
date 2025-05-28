@extends('adminlte::page')

@section('title', 'Nuevo Cliente')

@section('content_header')
    <h1>Registrar Cliente</h1>
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
            <form action="{{ route('clients.store') }}" method="POST">
                @csrf

                <x-adminlte-input name="name" label="Nombre" placeholder="Nombre del cliente" fgroup-class="mb-3" value="{{ old('name') }}" />

                <x-adminlte-input name="email" label="Correo Electrónico" type="email" placeholder="cliente@email.com" fgroup-class="mb-3" value="{{ old('email') }}" />

                <x-adminlte-input name="phone" label="Teléfono" placeholder="999999999" fgroup-class="mb-3" value="{{ old('phone') }}" />

                <x-adminlte-input name="address" label="Dirección" placeholder="Calle Falsa 123" fgroup-class="mb-3" value="{{ old('address') }}" />

                <x-adminlte-button label="Guardar" theme="primary" icon="fas fa-save" type="submit" class="mt-2" />
            </form>
        </div>
    </div>
@stop
