<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:products',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|unique:products',
        ]);

        $product = Product::create($validated);
        return response()->json($product, 201);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|unique:products,name,' . $product->id,
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric',
            'quantity' => 'sometimes|required|integer|unique:products,quantity,' . $product->id,
        ]);

        $product->update($validated);
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted']);
    }
}
