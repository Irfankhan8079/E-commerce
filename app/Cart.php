<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'product_id',
        'product_qty',
    ];

    public function products(){

        return $this->belongsTo(Product::class ,'product_id', 'id');
    }
}
