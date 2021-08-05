<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductOptionRequest;
use App\ProductOption;
use Illuminate\Http\Request;

class ProductOptionController extends Controller
{
    public function add(ProductOptionRequest $req){
        $product_option = new ProductOption();
        $product_option->option_type = $req->input('option_type');
        $product_option->option = $req->input('option');
        $product_option->product_id = $req->input('product_id');

        $product_option->save();

        return redirect()->route('product.edit', $req->input('product_id'));
    }

    public function destroy(Request $req, $id)
    {
        ProductOption::findOrFail($id)->delete();
        return redirect()->route('product.edit', $req->product_id);
    }
}
