<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        "keyword", "price", "body", "image", "title"
    ];

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    public function reviews(){
        return $this->hasMany(Reviews::class);
    }

    public function records(){
        return $this->hasMany(Record::class);
    }

    public static function getAllServices(){
        $services = Service::all();
        return $services;
    }

    public static function retrieveServicePrice($service_id){
        $service = Service::where('id', $service_id)->first();
        return $service->price;
    }

    public static function getService($service){
        $service = Service::where('keyword', $service)->first();
        return $service;
    }

}
