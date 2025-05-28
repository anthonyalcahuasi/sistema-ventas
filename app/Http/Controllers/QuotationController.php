<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\QuotationItem;
use App\Models\Product;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use App\Models\Sale;
use App\Models\SaleItem;

class QuotationController extends Controller
{
    public function index()
    {
        $quotations = Quotation::paginate(10);
        return view('quotations.index', compact('quotations'));
    }

    public function create()
    {
        $clients = Client::all();
        $products = Product::all();
        return view('quotations.create', compact('clients', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'products' => 'required|array'
        ]);

        $estimatedTotal = 0;

        foreach ($request->products as $values) {
            if (!empty($values['quantity']) && !empty($values['price'])) {
                $estimatedTotal += $values['quantity'] * $values['price'];
            }
        }

        $quotation = Quotation::create([
            'client_id' => $request->client_id,
            'user_id' => auth()->id(),
            'status' => 'pendiente',
            'estimated_total' => $estimatedTotal,
        ]);

        foreach ($request->products as $productId => $values) {
            if (!empty($values['quantity']) && !empty($values['price'])) {
                $quotation->items()->create([
                    'product_id' => $productId,
                    'quantity' => $values['quantity'],
                    'unit_price' => $values['price'], // ← Corrección aquí
                ]);
            }
        }

        return redirect()->route('quotations.index')->with('success', 'Cotización creada correctamente.');
    }

    public function accept(Quotation $quotation)
    {
        if ($quotation->status !== 'pendiente') {
            return redirect()->route('quotations.index')->with('error', 'Esta cotización ya fue procesada.');
        }

        DB::beginTransaction();

        try {
            $sale = Sale::create([
                'user_id' => auth()->id(),
                'client_id' => $quotation->client_id,
                'total' => $quotation->items->sum(function ($item) {
                    return $item->unit_price * $item->quantity; // ← Corrección aquí
                }),
            ]);

            foreach ($quotation->items as $item) {
                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'unit_price' => $item->unit_price,
                ]);
            }

            $quotation->status = 'aceptada';
            $quotation->save();

            DB::commit();
            return redirect()->route('quotations.index')->with('success', 'Cotización convertida en venta.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', 'Error al aceptar cotización: ' . $e->getMessage());
        }
    }
    
    public function show(Quotation $quotation)
    {
        return view('quotations.show', compact('quotation'));
    }

}
