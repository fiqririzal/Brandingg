<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buy_transaction extends Model
{
    protected $table = 'buy_transaction';

    public function category(){
        return $this->belongsTo('App\category','category_id');

    }
    public function product(){
        return $this->belongsTo('App\product','product_id');

    }
    public function Supplier(){
        return $this->belongsTo('App\supplier','supplier_id');

    }

}
