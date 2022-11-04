<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table="product";
    protected $fillable=[
        "name",
        "price",
        "stock",
        "description",
        "image"
    ];
    public function product()
    {
        return $this->belongsTo(category::class, 'id_category');
    }
}
