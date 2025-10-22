<?php
namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

        protected $fillable = [
        'name',
        'price',
        'category',
        'stock',
        'status',
        'cpu',
        'gpu',
        'ram',
        'storage',
        'screen',
        'battery',
        'charger',
        'keybored',
        'image',
        ];


  public function orders() 
     {
        return $this ->belongsToMany(Order::class ,'products_order')
        ->withPivot('quantity','total_price')
        ->withTimestamps();
    }
}
