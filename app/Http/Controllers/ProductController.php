<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        $products = Product::paginate(10); // ✅ Esto devuelve un LengthAwarePaginator
        return view('products.index', compact('products'));
    }

    // Formulario para crear un nuevo producto
    public function create()
    {
        return view('products.create');
    }

    // Guardar nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'nullable|string|max:255',
            'stock' => 'required|integer',
            'description' => 'nullable|string'
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

    // Formulario para editar producto
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Actualizar producto
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'nullable|string|max:255',
            'stock' => 'required|integer',
            'description' => 'nullable|string'
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
    }

    // Eliminar producto
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

}
