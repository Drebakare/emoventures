<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        "name", "email", "phone_number", "subject", "message"
    ];

    public static function createMessage($request){
        $create_message = ContactMessage::create([
          'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        if ($create_message){
            return true;
        }
        else{
            return false;
        }
    }
}
