<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Ventas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white flex flex-col">
            <div class="p-6 text-2xl font-bold border-b border-gray-700">
                <a href="{{ route('dashboard') }}">VentasApp</a>
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('dashboard') }}" class="block hover:bg-gray-700 rounded px-3 py-2">Dashboard</a>
                <a href="{{ route('products.index') }}" class="block hover:bg-gray-700 rounded px-3 py-2">Productos</a>
                <a href="{{ route('clients.index') }}" class="block hover:bg-gray-700 rounded px-3 py-2">Clientes</a>
                <a href="{{ route('sales.index') }}" class="block hover:bg-gray-700 rounded px-3 py-2">Ventas</a>
                <a href="{{ route('quotations.index') }}" class="block hover:bg-gray-700 rounded px-3 py-2">Cotizaciones</a>
                <a href="{{ route('users.index') }}" class="block hover:bg-gray-700 rounded px-3 py-2">Usuarios</a>
            </nav>
            <div class="p-4 border-t border-gray-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left hover:bg-red-600 bg-red-500 px-3 py-2 rounded">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main content -->
        <main class="flex-1 p-6">
            @include('components.flash-messages')
            @yield('content')
        </main>
    </div>
</body>
</html>
