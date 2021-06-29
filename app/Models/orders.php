<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Cart;
class orders extends Model
{
    use HasFactory;
    protected $fillable= ['total'];
    //order
    public function orderCols(){
        return $this->belongsToMany(Book::class);
    }
    public static function createOrder(){
         $user = Auth::user();
         //insert order table data
         $order = $user->orders()->create([
             'total' => Cart::subtotal()
         ]);
         //Place order and insert date to order_products
         foreach(Cart::content() as $data){
            $order->orderCols()->attach($data->id,[
                'total' => $data->qty * $data->price,
                'qty' => $data->qty
            ]);
            }
            Cart::destroy();
    }
}
