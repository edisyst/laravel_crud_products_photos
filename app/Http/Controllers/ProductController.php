<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
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
        $product = [
            'name' => $request->name,
            'code' => $request->code,
            'details' => $request->details,
        ];

        $image = $request->file('logo');

        if ($image){
            $img_name = 'Prod_' . $request->code . '_' . date('dmy_H_s_i');
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_full_name = $img_name . '.' . $img_ext;
            $upload_path = 'media/';
            $img_url = $upload_path . $img_full_name;
            $image->move($upload_path , $img_full_name);
            $product['logo'] = $img_url;
        }

        Product::insert($product);

        return redirect()->route('products.index')->with('message', 'Product Created Successfully');
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
//        dd($request->all());

        $data = [
            'name' => $request->name,
            'code' => $request->code,
            'details' => $request->details,
        ];

        $old_logo  = $request->old_logo;
        $image = $request->file('logo');

        if ($image){
            unlink($old_logo);
            $img_name = 'Prod_' . $request->code . '_' . date('dmy_H_s_i');
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_full_name = $img_name . '.' . $img_ext;
            $upload_path = 'media/';
            $img_url = $upload_path . $img_full_name;
            $image->move($upload_path , $img_full_name);
            $data['logo'] = $img_url;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('message', 'Product Updated Successfully');
    }


    public function destroy(Product $product): RedirectResponse
    {
        unlink($product->logo);

        $product->delete();

        return redirect()->route('products.index');
    }
}
