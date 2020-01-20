<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Payment extends Model
{
    protected $fillable = [
        "product_id", "user_id", "amount_paid", "shipping_address","payment_id", "status"
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function getLatestOrder(){
        $orders = Payment::orderBy('id', 'desc')->take(4)->get();
        return $orders;
    }

    public static function getAllOrder(){
        $order = Payment::all();
        return $order;
    }

    public static function remitPayment($request){
        $create_donation = Payment::create([
            'payment_id' => $request->ref,
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'amount_paid' => $request->amount,
            'shipping_address' => $request->address,
        ]);
        if ($create_donation){
            return true;
        }
        else{
            return false;
        }
    }

    public static function getUserOrders(){
        $orders = Payment::where('user_id', Auth::user()->id)->paginate(5);
        return $orders;
    }
}
