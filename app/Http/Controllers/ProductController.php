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

        $html = '';

        foreach ($products->get() as $product) {
            $html .= "
            <div class='p-4 rounded bg-gray-300 w-full'>
                <img src='$product->imageURL' alt='$product->name' class='w-full h-48 object-cover rounded mb-4'>
                <h3 class='text-2xl'>$product->name</h3>
                <hr />
                <div class='italic text-gray-500 mb-4'>
                    $product->description
                </div>
                <div class='text-4xl text-right'>$product->price</div>
            </div>
            ";
        }

        return response($html);
    }

    // public function store(Request $request){
    //     $request->validate([
    //         'name' => 'required',
    //         'description' => 'required',
    //         'price' => 'required',
    //         'imageURL' => 'required'
    //     ]);

    //     Product::create([
    //         'name' => $request->name,
    //         'description' => $request->description,
    //         'price' => $request->price,
    //         'imageURL' => $request->imageURL

    //     ]);

    //     return redirect('/product');
    // }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'price' => 'required|numeric',
    //         'imageURL' => 'nullable|string', // Validate imageURL if provided
    //     ]);

    //     $product = new Product();
    //     $product->name = $validatedData['name'];
    //     $product->description = $validatedData['description'];
    //     $product->price = $validatedData['price'];
    //     $product->imageURL = $validatedData['imageURL'] ?? 'default_image.jpg'; // Set default value if not provided
    //     $product->save();

    //     return response()->json(['success' => true]);
    // }

    public function store(Request $request) {
        // Product::create($request->all());

        // $products = Product::orderBy('name');

        // $html = "";

        // foreach ($products->get() as $product) {
        //     $html .= "
        //     <div class='p-4 rounded bg-gray-300 w-full'>
        //         <img src='$product->imageURL' alt='$product->name' class='w-full h-48 object-cover rounded mb-4'>
        //         <h3 class='text-2xl'>$product->name</h3>
        //         <hr />
        //         <div class='italic text-gray-500 mb-4'>
        //             $product->description
        //         </div>
        //         <div class='text-4xl text-right'>$product->price</div>
        //     </div>
        //     ";
        // }
        // return $html;

        $validator = Validator::make($request->all(), [
            'name' =>'required',
            'description' =>'required',
            'price' =>'required',
            'imageURL' =>'required'
        ]);

        if($validator->fails()) {
            $products = Product::orderBy('name');
            return view('templates._create-products-error', ['errors' => $validator->errors()->all(), 'products' => $products]);
        };

        Product::create($request->all());

        $products = Product::orderBy('name');

        return view('templates._products-list-for-create', ['products'=>$products]);

    }
}

