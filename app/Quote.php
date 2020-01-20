<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'header', 'body'
    ];

    public static function updateQuoteInfo($request){
        $status = Quote::where('id', 1)->update([
            "body" => $request->body,
            "header" => $request->header,
        ]);
        if($status){
            return true;
        }
        else{
            return false;
        }
    }

    public static function getQuote(){
        $quote = Quote::where('id', 1)->first();
        return $quote;
    }
}
