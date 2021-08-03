<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductOption;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::where('id', $id)->with('product_option', 'user_product')->first();

        return view('admin-panel.products.show', ['product' => $product]);
    }

    public function index(){
        $products = Product::paginate(10);

        return view('admin-panel.products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('admin-panel.products.create');
    }

    public function store(Request $req){
        $product = new Product();
        $product->name = $req->input('name');
        $product->description = $req->input('description');

        $product->save();

        return redirect()->route('products.index');
    }

    public function edit($id){
        $product = new Product();
        return view('admin-panel.products.edit', ['product' => $product->find($id)]);
    }

    public function update(Request $req, $id){
        $product = Product::find($id);
        $product->name = $req->input('name');
        $product->description = $req->input('description');

        $product->save();

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('products.index');
    }
}
