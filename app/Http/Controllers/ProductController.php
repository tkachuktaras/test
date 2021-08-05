<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::where('id', $id)->with('product_option', 'user_product.user')->firstOrFail();

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

    public function store(ProductRequest $req){
        $product = new Product();
        $product->name = $req->input('name');
        $product->description = $req->input('description');

        $product->save();

        return redirect()->route('products.index');
    }

    public function edit($id){
        $product = Product::where('id', $id)->with('product_option', 'user_product.user')->firstOrFail();

        if($product->user_product->isEmpty()){
            $disabled = false;
            return view('admin-panel.products.edit', ['product' => $product, 'disabled' => $disabled]);
        } else {
            foreach($product->user_product as $user_product){
                if($user_product->user->id == Auth::user()->id){
                    $disabled = true;
                } else {
                    $disabled = false;
                }
            }
            return view('admin-panel.products.edit', ['product' => $product, 'disabled' => $disabled]);
        }
    }

    public function update(ProductRequest $req, $id){
        $product = Product::where('id', $id)->firstOrFail();
        $product->name = $req->input('name');
        $product->description = $req->input('description');

        $product->save();

        return redirect()->route('product.edit', $id);
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('products.index');
    }
}
