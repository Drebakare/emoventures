<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerReview extends Model
{
    protected $fillable = [
       'name', "message"
    ];

    public static function addReview($request){
        $status = CustomerReview::create([
          "name" => $request->name,
          "message" => $request->message
        ]);
        if ($status){
            return true;
        }
        else{
            return false;
        }
    }

    public static function getReviews(){
        $reviews = CustomerReview::all();
        return $reviews;
    }
}
