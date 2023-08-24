<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Audit;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        foreach($products as $product) {
            $product->tax_price = $product->getTaxPriceAttribute();
        }

        return view('products.index', ['products' => $products]);
    }

    public function show($id)
    {
        return view('products.show', ['product' => Product::findOrFail($id)]);
    }

    public function edit($id = null)
    {
        return view('products.edit', ['product' => Product::findOrFail($id)]);
    }

    public function create()
    {
        return view('products.edit', ['product' => Product::make()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'count' => 'required|integer|min:0|max:10000',
            'price' => 'required|numeric|min:0|max:1000000',
        ]);

        $product = Product::create($validated);

        Audit::create([
            'user_id' => Auth::user()->id,
            'event' => 'create',
            'object_type' => 'Product',
            'object_id' => $product->id,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if(!$product){
            return redirect()->back()->with('error', 'Product not found.');
        }

        $validated = $request->validate([
            'name' => 'required|max:255',
            'count' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($validated);

        Audit::create([
            'user_id' => Auth::user()->id,
            'event' => 'update',
            'object_type' => 'Product',
            'object_id' => $product->id,
        ]);

        return view('products.show', ['product' => Product::find($product->id)])->with('success', 'Product updated successfully.');
    }

    public function delete($id)
    {
        $product = Product::find($id);

        if(!$product){
            return redirect()->back()->with('error', 'Product not found.');
        }

        Audit::create([
            'user_id' => Auth::user()->id,
            'event' => 'delete',
            'object_type' => 'Product',
            'object_id' => $product->id,
        ]);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
