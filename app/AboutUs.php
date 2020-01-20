<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $fillable = [
        "vision", "mission", "phone_number", "description"
    ];

    public static function updateAboutUsForm($request){
        $status = AboutUs::where('id', 1)->update([
            "mission" => $request->mission,
            "phone_number" => $request->phone_number,
            "vision" => $request->vision,
            "description" => $request->description,
        ]);
        if($status){
            return true;
        }
        else{
            return false;
        }
    }

    public static function getAboutUs(){
        $about_us = AboutUs::where('id', 1)->first();
        return $about_us;
    }
}
