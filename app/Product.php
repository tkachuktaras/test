<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','description',
    ];

    public function product_option()
    {
        return $this->hasMany(ProductOption::class, 'product_id', 'id');
    }

    public function user_product()
    {
        return $this->hasMany(UserProduct::class, 'product_id', 'id');
    }
}
