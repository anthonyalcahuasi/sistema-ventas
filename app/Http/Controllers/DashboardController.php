<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use App\Models\SaleItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $año = $request->get('año', now()->year);

        // Total de ventas y productos
        $totalVentas = Sale::count();
        $totalProductos = Product::count();

        // Ventas por mes (para gráfica)
        $ventasPorMes = Sale::selectRaw('MONTH(created_at) as mes, SUM(total) as total')
            ->whereYear('created_at', $año)
            ->groupBy('mes')
            ->orderBy('mes')
            ->get()
            ->map(function ($item) {
                return [
                    'mes' => Carbon::create()->month($item->mes)->locale('es')->translatedFormat('F'),
                    'total' => $item->total
                ];
            });

        // Productos más vendidos (top 5)
        $productos = SaleItem::with('product')
            ->selectRaw('product_id, SUM(quantity) as cantidad')
            ->groupBy('product_id')
            ->orderByDesc('cantidad')
            ->limit(5)
            ->get()
            ->map(function ($item) {
                return [
                    'nombre' => $item->product->name,
                    'cantidad' => $item->cantidad
                ];
            });

        return view('dashboard', [
            'labels' => $ventasPorMes->pluck('mes'),
            'data' => $ventasPorMes->pluck('total'),
            'año' => $año,
            'años' => Sale::selectRaw('YEAR(created_at) as año')->distinct()->pluck('año'),
            'productosLabels' => $productos->pluck('nombre'),
            'productosData' => $productos->pluck('cantidad'),
            'totalVentas' => $totalVentas,
            'totalProductos' => $totalProductos
        ]);
    }
}
