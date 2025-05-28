@extends('adminlte::page')

@section('content')
<h2 class="text-xl font-bold mb-4">Editar Roles de {{ $user->name }}</h2>

<form method="POST" action="{{ route('users.update', $user) }}">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="font-semibold block mb-2">Roles asignados:</label>
        @foreach($roles as $role)
            <label class="block">
                <input type="checkbox" name="roles[]" value="{{ $role->name }}"
                    {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                {{ ucfirst($role->name) }}
            </label>
        @endforeach
    </div>

    <button class="bg-green-600 text-white px-4 py-2 rounded">Guardar cambios</button>
</form>
@endsection
