@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <!-- Total Ventas -->
    <div class="col-lg-3 col-6">
        <x-adminlte-info-box title="Total Ventas" text="{{ $totalVentas }}" icon="fas fa-shopping-cart" theme="info"/>
    </div>

    <!-- Total Productos -->
    <div class="col-lg-3 col-6">
        <x-adminlte-info-box title="Productos Registrados" text="{{ $totalProductos }}" icon="fas fa-boxes" theme="success"/>
    </div>
</div>

<div class="row">
    <!-- Ventas por Mes -->
    <div class="col-md-6">
        <x-adminlte-card title="Ventas por Mes - {{ $año }}" theme="info" collapsible>
            <form method="GET" action="{{ route('dashboard') }}" class="mb-3">
                <x-adminlte-select name="año" label="Selecciona Año" onchange="this.form.submit()">
                    @foreach($años as $opcion)
                        <option value="{{ $opcion }}" {{ $opcion == $año ? 'selected' : '' }}>{{ $opcion }}</option>
                    @endforeach
                </x-adminlte-select>
            </form>

            <canvas id="ventasChart"></canvas>
        </x-adminlte-card>
    </div>

    <!-- Productos más Vendidos -->
    <div class="col-md-6">
        <x-adminlte-card title="Productos más Vendidos" theme="success" collapsible>
            <canvas id="productosChart"></canvas>
        </x-adminlte-card>
    </div>
</div>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ventasChart = new Chart(document.getElementById('ventasChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Total en Ventas',
                data: {!! json_encode($data) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        }
    });

    const productosChart = new Chart(document.getElementById('productosChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($productosLabels) !!},
            datasets: [{
                label: 'Cantidad Vendida',
                data: {!! json_encode($productosData) !!},
                backgroundColor: 'rgba(40, 167, 69, 0.7)',
                borderColor: 'rgba(40, 167, 69, 1)',
                borderWidth: 1
            }]
        }
    });
</script>
@stop
