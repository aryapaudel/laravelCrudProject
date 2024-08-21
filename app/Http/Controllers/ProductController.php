<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    
    public function store(Request $request)
   {
    $validatedData = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('products'), $imageName);

        $product = new Product();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->image = $imageName;

        $product->save();
        return back()->withsuccess('Product Created !!!');


    }


    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request,$id){
       //validate data
       $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable',
        ]);
        $product=Product::where('id',$id)->first();
        if(isset($request->image)){
          //upload Image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);
        $product->name = $imageName;


        }
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withsuccess('Product Updated !!!');
    }

    public function destroy($id){
      $product=Product::where('id',$id)->first();
      $product->delete();
      return back()->withsuccess('Product Deleted !!!');

    }

    public function show($id){
     $product=Product::where('id',$id)->first();
     return view('products.show',['product'=>$product]);
    }
}
