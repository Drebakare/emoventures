<?php

namespace App\Http\Controllers\Admin;

use App\AboutUs;
use App\Accommodation;
use App\Appointment;
use App\Birthday;
use App\ContactUs;
use App\CustomerReview;
use App\Images;
use App\Payment;
use App\Product;
use App\ProductCategory;
use App\Quote;
use App\Service;
use App\User;
use Carbon\Carbon;
use http\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function Dashboard(){
        $users = User::getAllUser();
        $latest_orders = Payment::getLatestOrder();
        $latest_appointments = Appointment::getLatestAppointment();
        $services = Service::getAllServices();
        $latest_users = User::getLatestUser();
        $appointments = Appointment::getAllAppointments();
        $orders = Payment::getAllOrder();

        return view('Admin.dashboard', compact('users', 'latest_appointments', 'latest_orders','services','latest_users', 'appointments','orders'));
    }

    public function retrieveAllUser(){
        $users = User::getAllUser();
        return view('Admin.view-users', compact('users'));
    }

    public function retrieveAppointments(){
        $services = Service::getAllServices();
        $appointments = Appointment::getAllAppointments();
        return view('Admin.appointments', compact('appointments', 'services'));
    }

    public function verifyUser($token){
        $user = User::where('token', $token)->update([
            "account_status" => 1,
            "token" => Str::random(30),
        ]);

        if ($user){
            return redirect()->back()->with('success', 'User verified successfully');
        }
        else{
            return redirect()->back()->with('failure', 'User could not be verified');
        }
    }

    public function completeOrder($id){
        $status = Payment::where('id', $id)->update([
            "status" => 1,
        ]);

        if ($status){
            return redirect()->back()->with('success', 'Order marked as completed');
        }
        else{
            return redirect()->back()->with('failure', 'Order could not be marked as completed');
        }
    }
    public function completeAppointment($id){
        $status = Appointment::where('id', $id)->update([
            "appointment_status" => 1,
        ]);

        if ($status){
            return redirect()->back()->with('success', 'Appointment marked as completed');
        }
        else{
            return redirect()->back()->with('failure', 'Appointment could not be marked as completed');
        }
    }

    public function deleteOrder($id){
        $status = Payment::where('id', $id)->delete();
        if ($status){
            return redirect()->back()->with('success', 'Order deleted successfully');
        }
        else{
            return redirect()->back()->with('failure', 'Order could not be deleted');
        }
    }

    public function deleteAppointment($id){
        $status = Appointment::where('id', $id)->delete();
        if ($status){
            return redirect()->back()->with('success', 'Appointment deleted successfully');
        }
        else{
            return redirect()->back()->with('failure', 'Appointment could not be deleted');
        }
    }

    public function makeAdmin($token){
        $user = User::where('token', $token)->update([
            "user_type" => 1,
            "token" => Str::random(30),
        ]);

        if ($user){
            return redirect()->back()->with('success', 'User is now an admin');
        }
        else{
            return redirect()->back()->with('failure', 'Action could not be completed');
        }
    }

    public function removeAdmin($token){
        $user = User::where('token', $token)->update([
            "user_type" => 0,
            "token" => Str::random(30),
        ]);

        if ($user){
            return redirect()->back()->with('success', 'Admin privilege removes successfully');
        }
        else{
            return redirect()->back()->with('failure', 'Action could not be performed successfully');
        }
    }

    public function productCategory(){
        $categories = ProductCategory::getAllCategory();
        return view('Admin.add-product-category', compact('categories'));
    }

    public function addProductCategory(Request $request){
        $this->validate($request,[
            "keyword" => "bail|required"
         ]);
        $status = ProductCategory::addNewCategory($request->keyword);
        if ($status){
            return redirect()->back()->with('success', 'Product category added successfully');
        }
        else{
            return redirect()->back()->with('failure', 'Action could not be performed successfully');
        }
    }
    public function addNewAccommodation(Request $request){
        $this->validate($request,[
            "price" => "bail|required",
            "name" => "bail|required"
         ]);
        $status = Accommodation::addNewAccommodation($request);
        if ($status){
            return redirect()->back()->with('success', 'Accommodation added successfully');
        }
        else{
            return redirect()->back()->with('failure', 'Action could not be performed successfully');
        }
    }

    public function removeProductCategory($id){
        $status = ProductCategory::removeCategory($id);
        if ($status){
            return redirect()->back()->with('success', 'Product category removed successfully');
        }
        else{
            return redirect()->back()->with('failure', 'Action could not be performed successfully');
        }
    }

    public function addProduct(){
        $products  = Product::all();
        $product_categories = ProductCategory::getAllCategory();
        return view('Admin.add-product', compact('products', 'product_categories'));
    }

    public function addservice(){
        $services  = Service::all();
        return view('Admin.add-service', compact('services'));
    }

    public function addProductDetails(Request $request){
        $this->validate($request, [
            'product_name' => 'bail|required',
            'amount' => 'bail|required',
            'product_details' => 'bail|required',
            'category_id' => 'bail|required',
            'product_description' => 'bail|required',
            'main_image' => 'bail|required',
            'image1' => 'bail|required',
            'image2' => 'bail|required',
        ]);
        try{
            $image = $request->file('main_image');
            $image_name = User::processImage($image);
            $new_product = new Product();
            $new_product->product_name = $request->product_name;
            $new_product->amount = $request->amount;
            $new_product->product_category_id = $request->category_id;
            $new_product->product_description = $request->product_description;
            $new_product->product_details = $request->product_details;
            $new_product->main_image_name = $image_name;
            $new_product->save();
            for ($i = 1; $i<3; $i++){
                $image = $request->file('image'.$i);
                $image_name = User::processImage($image);
                $other_images = new Images();
                $other_images->product_id = $new_product->id;
                $other_images->image_name = $image_name;
                $other_images->save();
            }
            return redirect()->back()->with('success', 'Product added successfully');
        }
        catch (\Exception $exception){
            return redirect()->back()->with("failure", $exception->getMessage())->withInput();
        }

    }
    public function addServiceDetails(Request $request){
        $this->validate($request, [
            'keyword' => 'bail|required',
            'price' => 'bail|required',
            'body' => 'bail|required',
            'title' => 'bail|required',
            'image' => 'bail|required',
        ]);
        try{
            $image = $request->file('image');
            $image_name = User::processImage($image);
            $new_service = new Service();
            $new_service->keyword = $request->keyword;
            $new_service->price = $request->price;
            $new_service->body = $request->body;
            $new_service->title = $request->title;
            $new_service->image = $image_name;
            $new_service->save();
            return redirect()->back()->with('success', 'Service added successfully');
        }
        catch (\Exception $exception){
            return redirect()->back()->with("failure", $exception->getMessage())->withInput();
        }

    }
    public function editServiceDetails(Request $request){
        $this->validate($request, [
            'keyword' => 'bail|required',
            'price' => 'bail|required',
            'body' => 'bail|required',
            'title' => 'bail|required',
        ]);
        try{
            $status = Service::where('id', $request->id)->update([
                "keyword" => $request->keyword,
                "price" => $request->price,
                "body" => $request->body,
                "title" => $request->title
            ]);
            if ($status){
                return redirect()->back()->with('success', 'Service Edited successfully');
            }
        }
        catch (\Exception $exception){
            return redirect()->back()->with("failure", $exception->getMessage())->withInput();
        }

    }
    public function editProductDetails(Request $request){
        $this->validate($request, [
            'product_name' => 'bail|required',
            'amount' => 'bail|required',
            'product_details' => 'bail|required',
            'category_id' => 'bail|required',
            'product_description' => 'bail|required',
        ]);
        try{
            $status = Product::where('id', $request->id)->update([
                "product_name" => $request->product_name,
                "amount" => $request->amount,
                "product_details" => $request->product_details,
                "product_category_id" => $request->category_id,
                "product_description" => $request->product_description
            ]);
            if ($status){
                return redirect()->back()->with('success', 'Product Edited successfully');
            }
        }
        catch (\Exception $exception){
            return redirect()->back()->with("failure", $exception->getMessage())->withInput();
        }

    }
    public function editAppointmentDetails(Request $request){
        $this->validate($request, [
            'accommodation_status' => 'bail|required',
            'start_date' => 'bail|required',
            'service_id' => 'bail|required',
            'message' => 'bail|required',
        ]);
        try{
            $total_amount = 0;
            $accommodation_price = 0;
            if ($request->accommodation_status ==1){
                $accommodation_price = 20000;
            }
            $service_price = Service::retrieveServicePrice($request->service_id);
            $total_amount = $accommodation_price + $service_price ;
            $status = Appointment::where('id', $request->id)->update([
                "service_id" => $request->service_id,
                "start_date" => $request->start_date,
                "amount" => $total_amount,
                "message" => $request->message,
                "accommodation_status" => $request->accommodation_status,
            ]);
            if ($status){
                return redirect()->back()->with('success', 'Appointment Edited successfully');
            }
        }
        catch (\Exception $exception){
            return redirect()->back()->with("failure", $exception->getMessage())->withInput();
        }

    }
    public function editreviewDetails(Request $request){
        $this->validate($request, [
            'name' => 'bail|required',
            'message' => 'bail|required',

        ]);
        try{
            $status = CustomerReview::where('id', $request->id)->update([
                "name" => $request->name,
                "message" => $request->message,
            ]);
            if ($status){
                return redirect()->back()->with('success', 'Review Edited successfully');
            }
        }
        catch (\Exception $exception){
            return redirect()->back()->with("failure", $exception->getMessage())->withInput();
        }

    }

    public  function renderContactUs(){
        $contact = ContactUs::all();
        return view('Admin.contact-us', compact('contact'));
    }

    public  function contactUs(Request $request){
        $this->validate($request, [
          'location' => 'bail|required',
          'email' => 'bail|required',
          'phone_number' => 'bail|required',
        ]);
        $status = ContactUs::updateContactForm($request);
        if($status){
            return redirect()->back()->with('success', 'contact information updated successfully');
        }
        else{
            return redirect()->back()->with('failure', 'Error updating contact information');
        }
    }

    public function renderAboutUs(){
        $about_us = AboutUs::where('id', 1)->first();
        return view('Admin.about-us', compact('about_us'));
    }

    public  function aboutUs(Request $request){
        $this->validate($request, [
            'vision' => 'bail|required',
            'mission' => 'bail|required',
            'phone_number' => 'bail|required',
            'description' => 'bail|required',
        ]);
        $status = AboutUs::updateAboutUsForm($request);
        if($status){
            return redirect()->back()->with('success', 'contact information updated successfully');
        }
        else{
            return redirect()->back()->with('failure', 'Error updating contact information');
        }
    }

    public function renderQuote(){
        $quote = Quote::where('id', 1)->first();
        return view('Admin.quote', compact('quote'));
    }

    public function Quote(Request $request){
        $this->validate($request, [
            'header' => 'bail|required',
            'body' => 'bail|required',
        ]);
        $status = Quote::updateQuoteInfo($request);
        if($status){
            return redirect()->back()->with('success', 'quote information updated successfully');
        }
        else{
            return redirect()->back()->with('failure', 'Error updating quote information');
        }
    }

    public function removeService($id){
        $service = Service::where('id', $id)->first();
        Storage::disk('upload')->delete('/',$service->image);
        $service = Service::where('id', $id)->delete();
        if ($service){
            return redirect()->back()->with('success', 'service deleted successfully');
        }
        else{
            return redirect()->back()->with('failure', 'Service could not be deleted');
        }
    }

    public function removeUser($token){
        $status = User::where('token', $token)->delete();
        if ($status){
            return redirect()->back()->with('success', 'User deleted successfully');
        }
        else{
            return redirect()->back()->with('failure', 'User could not be deleted');
        }
    }

    public function removeProduct($id){
        $product = Product::where('id', $id)->first();
        Storage::disk('upload')->delete('/',$product->main_image_name);
        $images = Images::where('product_id', $id)->get();
        foreach ($images as $image){
            Storage::disk('upload')->delete('/',$image->image_name);
        }
        $images = Images::where('product_id', $id)->delete();
        $product = Product::where('id', $id)->delete();
        if ($product){
            return redirect()->back()->with('success', 'product deleted successfully');
        }
        else{
            return redirect()->back()->with('failure', 'Product could not be deleted');
        }
    }
    public function removeReview($id){
        $review = CustomerReview::where('id', $id)->delete();
        if ($review){
            return redirect()->back()->with('success', 'review deleted successfully');
        }
        else{
            return redirect()->back()->with('failure', 'review could not be deleted');
        }
    }

    public function Review(){
        $reviews = CustomerReview::all();
        return view('Admin.review', compact('reviews'));
    }

    public function addReview(Request $request){
        $this->validate($request, [
            'message' => 'bail|required',
            'name' => 'bail|required',
        ]);

        $status = CustomerReview::addReview($request);
        if ($status){
            return redirect()->back()->with('success', 'review added successfully');
        }
        else{
            return redirect()->back()->with('failure', 'review could not be successfully');
        }
    }

    public function retrieveAllOrder(){
        $orders = Payment::getAllOrder();
        return view('Admin.product-orders', compact('orders'));
    }

    public function sendMail(){
        $mails = \App\Mail::getAllMails();
        return view('Admin.send-mail', compact('mails'));
    }

    public function actionMail(Request $request){
        $this->validate($request, [
            'email' => 'bail|required',
            'subject' => 'bail|required',
            'body' => 'bail|required',

        ]);
        try{
             Mail::to($request->email)->send(new \App\Mail\Official($request));
            $new_mail = \App\Mail::createMail($request);
            if($new_mail){
                return redirect()->back()->with('success', 'Mail Successfully Sent');
            }
            else{
                return redirect()->back()->with('failure', 'Mail couldnt be Sent');
            }

        }
        catch (\Exception $exception){
            return redirect()->back()->with("failure", $exception->getMessage())->withInput();
        }
    }

    public function deleteMail($id){
        $status = \App\Mail::where('id', $id)->delete();
        if ($status){
            return redirect()->back()->with('success', 'Mail successfully deleted');
        }
        else{
            return redirect()->back()->with('failure', 'Mail couldnt be deleted');
        }
    }

    public function getBirthday(){
        $users = User::whereRaw("DATE_FORMAT(dob, '%m-%d') = DATE_FORMAT(now(),'%m-%d')")->get();
        $message = Birthday::where('id', 1)->first();
       return view('Admin.birthday', compact('message','users'));
    }

    public function updateBirthdayMsg(Request $request){
        $this->validate($request,[
            "message" => 'bail|required'
        ]);
        $status = Birthday::where('id', 1)->update([
            "message" => $request->message,
        ]);
        if ($status){
            return redirect()->back()->with('success', 'Message updated Successfully');
        }
        else{
            return redirect()->back()->with('failure', 'Message couldnt be updated');
        }
    }
    public function sendBirthdayMail(Request $request){
        $message = Birthday::where('id', 1)->first();
        $users = User::whereRaw("DATE_FORMAT(dob, '%m-%d') = DATE_FORMAT(now(),'%m-%d')")->get();

        try{
            foreach ($users as $user){
                Mail::to($user->email)->send(new \App\Mail\BirthdayMessage($message));
            }
            return redirect()->back()->with('success', 'Birthday Mail Successfully Sent');

        }
        catch (\Exception $exception){
            return redirect()->back()->with("failure", $exception->getMessage())->withInput();
        }
    }

    public function renderHotelForm(){
        $accommodations = Accommodation::getAllAccommodation();
        return view('Admin.add-accommodation', compact('accommodations'));
    }

    public function removeAccommodation($id){
        $status = Accommodation::where('id', $id)->delete();
        if ($status){
            return redirect()->back()->with('success', 'Accommodation successfully deleted');
        }
        else{
            return redirect()->back()->with('failure', 'Accommodation couldnt be deleted');
        }

    }

    public function editAccommodationDetails(Request $request){
        $status = Accommodation::where('id', $request->id)->update([
            'price' => $request->price,
            'name' =>$request->name,
        ]);
        if ($status){
            return redirect()->back()->with('success', 'Accommodation successfully Edited');
        }
        else{
            return redirect()->back()->with('failure', 'Accommodation couldnt be Edited');
        }

    }
}
