<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=['id'];

    protected $table = 'products';
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function orders(){
        return $this->belongsToMany(Order::class,'product_order');
    }
}
