<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use http\Env\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function form(Request $request){
        $products = Product::all();
        return view('alpine.products',['products'=>$products]);
    }
    function index(Request $request)
    {
        $products = Product::all();
        return response()->json($products);
    }
    function store(Request $request){
        $validated = $request->validate([
            "name" => "string|required|max:255",
            "description" => "string|required",
            "price" => "numeric|required"
        ]);

        $product = Product::create($validated);
        return response()->json(['message'=>"Product Stored Successfully",'product'=>$product],200);
    }
    function update(Request $request,$id){
        $product = Product::find($id);
        $validated = $request->validate([
            "name" => "string|required|max:255",
            "description" => "string|required",
            "price" => "numeric|required"
        ]);

//        var_dump($validated);

        $product->update($validated);
        return response()->json(["message" => "Product Updated Successfully", 'product' => $product], 200);

    }

    function destroy(Request $request,$id){
        $product = Product::find($id);
//        dd($id);
        if (!$product) {

            return response()->json(['message' => 'Product not found'], 404);
        }
        $product->delete();
        return response()->json(['message'=>'Product Removed Successfully'],200);
    }
}


