<?php

namespace App\Http\Controllers\Actions;

use App\AboutUs;
use App\ContactMessage;
use App\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActionController extends Controller
{
    public function Contact(){
        $contact_us = ContactUs::getContact();
        return view('Actions.contact-us', compact('contact_us'));
    }

    public function submitContactForm(Request $request){
        $this->validate($request, [
            'email' => 'bail|required',
            'name' => 'bail|required',
            'phone' => 'bail|required',
            'subject' => 'bail|required',
        ]);
        $contact_message_status = ContactMessage::createMessage($request);
        if ($contact_message_status){
            return redirect()->back()->with('success', 'message submitted successfully');
        }
        else{
            return redirect()->back()->with('failure', 'message could not processed');
        }
    }

    public function aboutUs(){
        $about_us = AboutUs::getAboutUs();
        return view('Actions.about-us', compact('about_us'));
    }
}
