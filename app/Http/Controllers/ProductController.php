<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }


    public function create(): View
    {
        return view('products.create');
    }


    public function store(Request $request): RedirectResponse
    {
        Product::create($request->validated());

        return redirect()->route('products.index');
    }


    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }


    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }


    public function update(Request $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());

        return redirect()->route('products.index');
    }


    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
