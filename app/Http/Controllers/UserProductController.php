<?php

namespace App\Http\Controllers;

use App\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProductController extends Controller
{
    public function update(Request $req){
        $user_product = new UserProduct();
        $user_product->count = $req->input('count');
        $user_product->price = $req->input('price');
        $user_product->user_id = Auth::user()->id;
        $user_product->product_id = $req->id;

        $user_product->save();

        return redirect()->route('product.edit', $req->id);
    }
}
