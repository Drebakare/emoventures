<?php

namespace App\Http\Controllers\Authentication;

use App\Appointment;
use App\Payment;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\VarDumper\Dumper\esc;

class UserController extends Controller
{
    public  function Dashboard(){
        $orders = Payment::getUserOrders();
        $appointments = Appointment::getUserAppointments();
        return view('Actions.dashboard', compact('orders', 'appointments'));
    }
    public function editShippingAddress(Request $request){
        $payment = Payment::where([["user_id", Auth::user()->id], ["product_id", $request->product_id]])->update([
            "shipping_address" => $request->address
        ]);
        if ($payment){
            return redirect()->back()->with('success', "Shipping Address Successfully Updated");
        }
        else {
            return redirect()->back()->with('failure', "Shipping Address could not be updated");
        }
    }

    public function remitServicePayment(Request $request){
        $appointment = Appointment::where([['user_id', Auth::user()->id], ['start_date', $request->start_date], ['service_id', $request->service_id]])->update([
                "payment_status" => 1
        ]);
        if ($appointment){
            $response = array(
                'status' => true,
                'msg' => 'Payment Successful'
            );
            return response()->json($response);
        }
        else{
            $response = array(
                'status' => false,
                'msg' => 'Payment Unsuccessful'
            );
            return response()->json($response);
        }
    }
    public function downloadPDF($appointment_id){
        $appointment = Appointment::retrieveAppointment($appointment_id);
        $pdf = PDF::loadView('Actions.pdf', ['appointment' => $appointment]);
        return $pdf->download("Invoice.pdf");
    }


}
