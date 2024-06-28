<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::orderBy('name');

        if ($request->filter) {
            $filter = $request->filter;
            $products->where(function ($query) use ($filter) {
                $query->where('name', 'like', "%$filter%")
                      ->orWhere('description', 'like', "%$filter%");
            });
        }

        return view('templates/_products-list-for-create', ['products' => $products]);
    }


    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' =>'required',
            'description' =>'required',
            'price' =>'required',
            'imageURL' =>'required'
        ]);

        if($validator->fails()) {
            $products = Product::orderBy('name');
            return view('templates._create-products-error', ['errors' => $validator->errors(), 'products' => $products]);
        };

        Product::create($request->all());

        $products = Product::orderBy('name');

        return view('templates._success', ['products'=>$products]);

    }

    public function edit(Product $product)
    {
        $product = Product::find($product->id);

        return view('templates._edit-products', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'imageURL' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product->update($request->all());

        return redirect('/products');
    }


    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();

        $products = Product::orderBy('name');

        return view('templates._products-list-for-create', ['products'=>$products]);
    }

    public function details(Product $product)
    {
        return view('templates._product-details', ['product' => $product]);
    }
}

