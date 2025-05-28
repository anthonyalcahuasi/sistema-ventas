<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Client;
use App\Models\Product;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('client')->latest()->paginate(10);
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $clients = Client::all();
        $products = Product::all();
        return view('sales.create', compact('clients', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'products' => 'required|array|min:1',
            'products.*' => 'exists:products,id',
            'quantities' => 'required|array|min:1',
            'quantities.*' => 'integer|min:1',
        ]);

        DB::transaction(function () use ($request) {
            $sale = Sale::create([
                'client_id' => $request->client_id,
                'total' => 0, // Se actualizará luego
            ]);

            $total = 0;

            foreach ($request->products as $index => $productId) {
                $product = Product::findOrFail($productId);
                $quantity = $request->quantities[$index];
                $price = $product->price;
                $subtotal = $price * $quantity;

                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'price' => $price,
                ]);

                $total += $subtotal;
            }

            $sale->update(['total' => $total]);
        });

        return redirect()->route('sales.index')->with('success', 'Venta registrada exitosamente.');
    }

    public function show(Sale $sale)
    {
        $sale->load('client', 'items.product');
        return view('sales.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {
        $clients = Client::all();
        $products = Product::all();
        $sale->load('items.product');
        return view('sales.edit', compact('sale', 'clients', 'products'));
    }

    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'products' => 'required|array|min:1',
            'products.*' => 'exists:products,id',
            'quantities' => 'required|array|min:1',
            'quantities.*' => 'integer|min:1',
        ]);

        DB::transaction(function () use ($request, $sale) {
            $sale->update([
                'client_id' => $request->client_id,
            ]);

            $sale->items()->delete();

            $total = 0;

            foreach ($request->products as $index => $productId) {
                $product = Product::findOrFail($productId);
                $quantity = $request->quantities[$index];
                $price = $product->price;
                $subtotal = $price * $quantity;

                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'price' => $price,
                ]);

                $total += $subtotal;
            }

            $sale->update(['total' => $total]);
        });

        return redirect()->route('sales.index')->with('success', 'Venta actualizada correctamente.');
    }

    public function destroy(Sale $sale)
    {
        DB::transaction(function () use ($sale) {
            $sale->items()->delete();
            $sale->delete();
        });

        return redirect()->route('sales.index')->with('success', 'Venta eliminada correctamente.');
    }
}
