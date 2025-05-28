@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content_header')
    <h1>Editar Cliente</h1>
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
            <form action="{{ route('clients.update', $client) }}" method="POST">
                @csrf
                @method('PUT')

                <x-adminlte-input name="name" label="Nombre" value="{{ old('name', $client->name) }}" fgroup-class="mb-3" />

                <x-adminlte-input name="email" label="Correo Electrónico" type="email" value="{{ old('email', $client->email) }}" fgroup-class="mb-3" />

                <x-adminlte-input name="phone" label="Teléfono" value="{{ old('phone', $client->phone) }}" fgroup-class="mb-3" />

                <x-adminlte-input name="address" label="Dirección" value="{{ old('address', $client->address) }}" fgroup-class="mb-3" />

                <x-adminlte-button label="Actualizar" theme="warning" icon="fas fa-save" type="submit" class="mt-2" />
            </form>
        </div>
    </div>
@stop
