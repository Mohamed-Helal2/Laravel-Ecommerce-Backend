<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cart_items extends Model
{
    protected $guarded=['id'];
   protected $table='cart_items';

   public function cart(){
    return $this->belongsTo(cart::class);
   }
}
