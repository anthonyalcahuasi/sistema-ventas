@extends('adminlte::page')

@section('title', 'Editar Venta')

@section('content_header')
    <h1>Editar Venta #{{ $sale->id }}</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sales.update', $sale) }}" method="POST">
        @csrf
        @method('PUT')

        <x-adminlte-select name="client_id" label="Cliente" required>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}" {{ $sale->client_id == $client->id ? 'selected' : '' }}>
                    {{ $client->name }}
                </option>
            @endforeach
        </x-adminlte-select>

        <x-adminlte-input name="date" label="Fecha de Venta" type="date"
            value="{{ old('date', $sale->created_at->format('Y-m-d')) }}" required />

        <h5>Productos</h5>
        <div id="productos-container">
            @foreach ($sale->items as $item)
                <div class="row mb-2">
                    <div class="col-md-6">
                        <x-adminlte-select name="products[]" label="Producto" required>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}"
                                    {{ $item->product_id == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </x-adminlte-select>
                    </div>
                    <div class="col-md-4">
                        <x-adminlte-input name="quantities[]" label="Cantidad" type="number"
                            value="{{ $item->quantity }}" min="1" required />
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-danger btn-sm remove-product">-</button>
                    </div>
                </div>
            @endforeach
        </div>

        <button type="button" id="add-product" class="btn btn-secondary btn-sm mb-3">+ Añadir Producto</button>

        <x-adminlte-button label="Actualizar Venta" type="submit" theme="primary" class="btn-block" />
    </form>
@stop

@section('js')
<script>
    document.getElementById('add-product').addEventListener('click', function () {
        const container = document.getElementById('productos-container');
        const row = container.firstElementChild.cloneNode(true);
        row.querySelectorAll('input, select').forEach(el => el.value = '');
        container.appendChild(row);
    });

    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-product')) {
            const rows = document.querySelectorAll('#productos-container .row');
            if (rows.length > 1) {
                e.target.closest('.row').remove();
            }
        }
    });
</script>
@stop
