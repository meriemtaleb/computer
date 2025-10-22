<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'status',
        'phone_number',
        'wilaya',
        'the_final_price',
        'delivery_type' ,
    ];

    

    public function products() 
     {
        return $this ->belongsToMany(Product::class,'products_order')
        ->withPivot('quantity','total_price')
        ->withTimestamps();
    }
      public function user() 
     {
        return $this ->belongsTo(User::class);
    }

    public function getDeliveryTypeArabicAttribute()
{
    return match($this->delivery_type) {
        'home_delivery' => ' المنزل',
        'stop_desk' =>' مكتب',
        default => $this->delivery_type,
    };
}
}

