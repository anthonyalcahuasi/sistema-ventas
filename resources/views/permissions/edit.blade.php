@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Editar Permiso</h1>
    <form action="{{ route('permissions.update', $permission) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Permiso</label>
            <input type="text" name="name" class="form-control" value="{{ $permission->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
