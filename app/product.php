<?php

namespace App;

use App\category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function Sale()
    {
        return $this->hasOne('App\Sale', 'product_id');
    }
}