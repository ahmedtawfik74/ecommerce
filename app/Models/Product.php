<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\ProductAttribute;
class Product extends Model
{
	protected $table = 'products';

    protected $fillable = [
    		'code','name','slug', 'description','status'
    	];

    protected $casts = [
        'status'    =>  'boolean',

    ];

    protected $with = ['attributes'];

    protected $appends = ['attributesCount'];

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
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
    public function scopeFilter($query, $filter)
    {
        return $filter->apply($query);
    }
    public function getAttributesCountAttribute()
    {
        return $this->attributes()->count();
    }
}
