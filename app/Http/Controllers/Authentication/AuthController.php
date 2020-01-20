<?php

namespace App\Http\Controllers\Authentication;

use App\Appointment;
use App\Mail\verifyMail;
use App\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function displayLoginForm(){
        return view('Auth.login');
    }

    public function Login(Request $request){
        $this->validate($request, [
            'email' => 'bail|required',
            'password' => 'bail|required',
        ]);
        $user_feedback = User::verify($request);
        $user_status = $user_feedback[0];
        $user_type = $user_feedback[1];
        if($user_status ){
            switch ($user_type){
                case 1:
                    return redirect(route('admin.dashboard'));
                    break;
                default:
                    return redirect(route('user.dashboard'));
            }
        }
        else{
            if ($user_type == null){
                return redirect()->back()->with('failure','invalid email or password not correct');
            }
            else{
                return redirect()->back()->with('failure','You are not a valid User, kindly register');
            }
        }
    }

    public function ajaxLogin(Request $request){
        $user_status = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if ($user_status){
            $response = array(
                'status' => true,
                'msg' => 'login'
            );
            return response()->json($response);
        }
        else{
            $response = array(
                'status' => false,
                'msg' => 'Invalid login details supplied'
            );
            return response()->json($response);
        }
    }

    public function ajaxRegister(Request $request){
        $check_user = User::checkUser($request->email);
        if ($check_user[0]){
            $response = array(
                'status' => false,
                'msg' => 'Email Already exits',
            );
            return response()->json($response);
        }
        else{
            $registration_status = User::userFastRegistration($request);
            if($registration_status){
                Mail::to($registration_status->email)->send(new \App\Mail\ChangePassword($registration_status));
                Auth::attempt(['email' => $request->email, 'password' => $request->email]);
                $response = array(
                    'status' => true,
                    'msg' => 'Registration successful, kindly check your email to change your password',
                );
                return response()->json($response);
            }
            else{
                $response = array(
                    'status' => false,
                    'msg' => 'Registration could not be performed, kindly try again',
                );
                return response()->json($response);
            }
        }

    }

    public function displayRegisterationForm(){
        return view('Auth.register');
    }

    public function Register(Request $request){
        $this->validate($request, [
            'phone_number' => 'bail|required',
            'email' => 'bail|required|unique:users',
            'fullname' => 'bail|required',
            'password' => 'bail|required|confirmed',
        ]);
        $registration_status = User::userRegistration($request);
        if($registration_status){
            Mail::to($registration_status->email)->send(new \App\Mail\verifyEMail($registration_status));
            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            return redirect(route('homepage'))->with('success', 'Welcome to your account, check your email to verify your account');
        }
    }

    public function verifyUser($token){
        $verification_status = User::verifyUser($token);
        if ($verification_status){
            if (Auth::check()){
                return redirect(route('homepage'))->with('success', 'Email verified successfully');
            }
            else{
                return redirect(route('login'))->with('success', "Email verified, kindly login");
            }
        }
        else{
            return redirect(route('homepage'))->with('failure', "Email not verified");
        }
    }

    public function Logout(){
        Auth::logout();

        return redirect('/');
    }

    public function changePassword($token){
    $user = User::getUserByToken($token);
    if($user){
        return view('Auth.change-password', compact('user'));
    }
        return redirect('/')->with('failure','Authentication denied');
    }

    public function uploadProfilePicture( Request $request){
        $image = $request->file('picture');
        $image_name = User::processImage($image);
        $user = User::where('id', Auth::user()->id)->update([
            'profile_image' => $image_name,
        ]);
        if($user){
            return redirect()->back()->with('success', 'profile picture updated successfully');
        }
        else{
            return redirect()->back()->with('failure', 'Error updating profile picture');
        }
    }

    public function updateAccountDetails(Request $request){
        $this->validate($request,[
            'name' => 'bail|required',
            'email' => 'bail|required',
            'address' => 'bail|required',
            'phone' => 'bail|required',
            'dob' => 'bail|required',
        ]);

        $update_status = User::updateAccountDetails($request);
        if ($update_status){
            return redirect()->back()->with('success', 'Account information uploaded successfully');
        }
        else{
            return redirect()->back()->with('failure', 'Error updating account info');
        }
    }

    public function updatePassword(Request $request){
        $this->validate($request,[
            'previous_password' => 'bail|required',
            'password' => 'bail|required|confirmed',
        ]);
        $get_status = User::updatePassword($request);
        if($get_status){
            return redirect()->back()->with('success', 'Password updated Successfully');
        }
        else{
            return redirect()->back()->with('failure', 'Incorrect Password');
        }

    }

    public function forgotPassword(){
        return view('Auth.forgot-password');
    }

    public function userForgotPassword(Request $request){
        $check_user = User::getUserByEmail($request->email);
        if ($check_user){
            Mail::to($check_user->email)->send(new \App\Mail\ChangePassword($check_user));
            return redirect()->back()->with('success', 'An Email has been sent to your email address, kindly follow the instruction');
        }
        else{
            return redirect()->back()->with('failure', 'Email is not a registered email, kindly register');
        }
    }
}
