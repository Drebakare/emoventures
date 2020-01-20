<?php

namespace App\Http\Controllers\Appointment;

use App\Appointment;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    public function bookAppointment(Request $request){
        $total_amount = 0;
        $accommodation_price = 0;
        if ($request->select_accomodation){
            $accommodation_price = 20000;
        }
        $service_price = Service::retrieveServicePrice($request->select_services);
        $total_amount = $accommodation_price + $service_price ;
        $check_user = User::checkUser($request->email);
        if ($check_user[0]){
            Auth::loginUsingId($check_user[1]);
            $check_appointment = Appointment::checkAppointment($request);
            if($check_appointment){
                return redirect()->back()->with('failure', 'you have an active Appointment on this service, kindly check your dashboard to see active ');
            }
            else{
                $create_appointment = Appointment::createAppointment($request, $total_amount);
                if ($create_appointment){
                    $appointment = Appointment::retrieveAppointment($create_appointment->id);
                    return view('Actions.checkout', compact('appointment'));
                }
                else{
                    return redirect()->back()->with('failure', 'appointment could no be created');
                }
            }
        }
        else{
            $registration_status = User::userFastRegistration($request);
            if($registration_status){
                Mail::to($registration_status->email)->send(new \App\Mail\ChangePassword($registration_status));
                Auth::attempt(['email' => $request->email, 'password' => $request->email]);
                $create_appointment = Appointment::createAppointment($request, $total_amount);
                if ($create_appointment){
                    $appointment = Appointment::retrieveAppointment($create_appointment->id);
                    return view('Actions.checkout', compact('appointment'));
                }
                else{
                    return redirect()->back()->with('failure', 'appointment could no be created');
                }
            }
            else{
                return redirect()->back()->with('failure', 'appointment could no be created');
            }
        }
    }

    public function appointmentForm(){
        $services = Service::getAllServices();
        return view('Actions.book-appointment', compact('services'));
    }

    public function appointmentCheckOut($appointment_id){
        $appointment = Appointment::retrieveAppointment($appointment_id);
        return view('Actions.checkout', compact('appointment'));
    }
}
