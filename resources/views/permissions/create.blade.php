@extends('adminlte::page')

@section('content')
<div class="container">
    <h1>Crear Permiso</h1>
    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Permiso</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
