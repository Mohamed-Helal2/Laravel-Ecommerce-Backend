<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $guarded = ['id'];
    protected $table = 'carts';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart_items(){
        return $this->hasMany(cart_items::class);
    }
}
