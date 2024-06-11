<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index() {
        $products = Product::orderby('created_at')->get();

        // return json_encode($products);

        return response()->json($products, 200);
    }

    function create() {
        return view('products.create');
    }

    function store(Request $request) {

        // dd($request);
        // return response()->json(['hello' => 'hi']);
        
        $product = new Product;

        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = str_replace(array("R$",".",","),array("", "", "."),$request->price);
        $product->category = $request->category;
        
        $product->save();
        
        return response()->json($product, 201);

    }
}
