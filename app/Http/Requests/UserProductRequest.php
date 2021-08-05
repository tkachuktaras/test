<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserProductRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'count' => 'required|numeric|max:1000000',
            'price' => 'required|numeric|min:0.1|max:100000',
        ];
    }
}
