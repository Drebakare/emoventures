<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected $fillable = [
        "email", "subject", "body"
    ];

    public static function createMail($request){
        $new_mail = Mail::create([
            'email' => $request->email,
            'subject' => $request->subject,
            'body' => $request->body,

        ]);
        if($new_mail){
            return true;
        }
        else{
            return false;
        }
    }

    public static function getAllMails(){
        $mails = Mail::all();
        return $mails;
    }
}
