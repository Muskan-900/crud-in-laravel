<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index(){
        $product = Product::orderby('created_at')->get();
        return view('products.index',['product'=>$product]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){

        $product = new Product;
        
        $file_name = time(). '.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('image'),$file_name);

        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->image = $file_name;

        $product->save();
        return redirect()->route('products.index')->with('success',"Product Added successfully");
    }
}
