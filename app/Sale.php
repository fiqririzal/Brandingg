<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\category', 'category_id');
    }

    public function Product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}