<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable = [
        "user_id", "product_id", "message", "rating"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public static function productComments($product_id){
        $comments = ProductReview::where('product_id', $product_id)->get();
        return $comments;
    }

    public static function createComment($request){
        $status = ProductReview::create([
            "user_id" => $request->user_id,
            "product_id" => $request->product_id,
            "message" => $request->message,
            "rating" => 0,
        ]);
        if ($status){
            return true;
        }
        else{
            return false;
        }
    }
}
