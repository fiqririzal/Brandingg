<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = "category";
    protected $fillable = [
        'name', 'slug', 'description',
    ];

    public function Sale()
    {
        return $this->hasOne('App\Sale', 'category_id');
    }
}