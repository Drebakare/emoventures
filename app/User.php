<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone_number','address','profile_image',
        'token', 'user_type', 'account_status','dob'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    public function reviews(){
        return $this->hasMany(Reviews::class);
    }

    public function record(){
        return $this->hasMany(Record::class);
    }

    public function product_review(){
        return $this->hasMany(ProductReview::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public static function verify($request){
        $user_status = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        $user_type = null;

        if($user_status){
            $user = User::where('email', $request->email)->first();
            $user_type = $user->user_type;
        }
        return [$user_status, $user_type];

    }
    public static function userRegistration($request){
        $new_user = User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'usertype' => 0,
            'phone_number' => $request->phone_number,
            'token' => Str::random(30),
        ]);
        if($new_user){
            return $new_user;
        }
    }

    public static function userFastRegistration($request){
        $new_user = User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->email),
            'usertype' => 0,
            /*'phone_number' => $request->phone_number,*/
            'token' => Str::random(30),
        ]);
        if($new_user){
            return $new_user;
        }
    }

    public static function verifyUser($token){
        $user = User::where('token', $token)->update([
            "account_status" => 1,
            "token" => Str::random(30),
        ]);
        if($user){
            return true;
        }
        else{
            return false;
        }
    }

    public static function checkUser($email){
        $check_user = User::where('email', $email)->first();
        if ($check_user){
            return [true, $check_user->id];
        }
        else{
            return [false, null];
        }
    }

    public static function getUserByToken($token){
        $get_user = User::where('token', $token)->first();
        return $get_user;
    }

    public static function processImage($image){
        $image_name = Str::random(10).'.'.$image->getClientOriginalExtension();
        $is_file_uploaded = Storage::disk('upload')->putFileAs('/',$image, $image_name);
        return $image_name;
    }


    public static function updateAccountDetails($request){

        $update_status = User::where('id', Auth::user()->id)->update([
            "name" => $request->name,
            "address" => $request->address,
            "email" => $request->email,
            "phone_number" => $request->phone,
            "dob" => $request->dob,
        ]);
        if ($update_status){
            return true;
        }
        else{
            return false;
        }
    }
    public static function updatePassword($request){
        $update_status = User::where('id', Auth::user()->id)->first();
        $status = false;
        if(Hash::check($request->previous_password, $update_status->password)){
            User::where('id', Auth::user()->id)->update([
                'password' => bcrypt($request->password),
            ]);
            $status = true ;
        }
        return $status;
    }

    public static function getUserByEmail($email){
        $get_user = User::where('email', $email)->first();
        return $get_user;
    }

    public static function getAllUser(){
        $all_users = User::all();
        return $all_users;
    }

    public static function getLatestUser(){
        $user = User::orderBy('id', 'desc')->take(4)->get();
        return $user;
    }

}
