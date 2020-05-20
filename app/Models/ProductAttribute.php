<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $table = 'product_attributes';

    protected $fillable = [ 'product_id', 'options','sku', 'stock', 'price','sale_price'];

    protected $casts = [
        'options'    =>  'array'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function() {
            \Cache::forget('products');
        });
        static::updating(function() {
            \Cache::forget('products');
        });
        static::deleting(function() {
            \Cache::forget('products');
        });
    }


}
