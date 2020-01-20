<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    protected $fillable =[
        "name", "price"
    ];

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
    public static function getAllAccommodation(){
        $accommodations = Accommodation::all();
        return $accommodations;
    }
    public static function addNewAccommodation($request){
        $status = Accommodation::create([
            "price" => $request->price,
            "name" => $request->name,
        ]);

        if ($status){
            return true;
        }
        else{
            return false;
        }
    }
}
