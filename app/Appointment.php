<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Appointment extends Model
{
    protected $fillable = [
        "user_id", "payment_status", "service_id", "start_date", "message", "accommodation_status", "amount",'accommodation_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function accommodation(){
        return $this->belongsTo(Accommodation::class);
    }

    public static function createAppointment($request, $amount){
        $new_appointment = Appointment::create([
            'user_id' => Auth::user()->id,
            'payment_status' => 0,
            'service_id' => $request->select_services,
            'start_date' => $request->appointment_date,
            'message' => $request->message,
            'accommodation_status' => $request->select_accomodation,
            'amount' => $amount,
        ]);
        if ($new_appointment){
            return  $new_appointment;
        }
        else{
            return false;
        }
    }

    public static function retrieveAppointment($appointment_id){
        $appointment = Appointment::where('id', $appointment_id)->first();
        return $appointment;
    }

    public static function checkAppointment($request){
        $appointment = Appointment::where([['user_id', Auth::user()->id], ['service_id', $request->select_services],['appointment_status', 0]])->first();
        if($appointment){
            return true;
        }
        else{
            return false;
        }
    }

    public static function getLatestAppointment(){
        $appointments = Appointment::orderBy('id', 'desc')->take(4)->get();
        return $appointments;
    }

    public static function getAllAppointments(){
        $appointments = Appointment::all();
        return $appointments;
    }

    public static function getUserAppointments(){
        $appointments = Appointment::where("user_id", Auth::user()->id)->paginate(5);
        return $appointments;
    }
}
