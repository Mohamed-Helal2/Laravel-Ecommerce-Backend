<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded=['id'];
    protected $table = 'orders';
    public function product(){
        return $this->belongsToMany(Product::class,'product_order');
    }
}
