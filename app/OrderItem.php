<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    // use HasFactory;

    // The table associated with the model.
    protected $table = 'order_items';

    // The attributes that are mass assignable.
    protected $fillable = [
        'order_id', 'product_id', 'product_qty', 'price'
    ];

    public function products(){

        return $this->belongsTo(Product::class ,'product_id', 'id');
    }
}
