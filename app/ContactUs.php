<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = [
        "location", "opening_period", "contact"
    ];

    public static function updateContactForm($request){
        $status = ContactUs::where('id', 1)->update([
            "location" => $request->location,
            "contact" => $request->phone_number,
            "email" => $request->email,
        ]);
        if($status){
            return true;
        }
        else{
            return false;
        }
    }

    public static function getContact(){
        $contact = ContactUs::where('id', 1)->first();
        return $contact;
    }
}
