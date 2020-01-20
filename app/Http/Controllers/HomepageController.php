<?php

namespace App\Http\Controllers;

use App\AboutUs;
use App\Accommodation;
use App\ContactUs;
use App\CustomerReview;
use App\Product;
use App\Quote;
use App\Service;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function displayLandingPage(){
        $quote = Quote::getQuote();
        $services = Service::getAllServices();
        $about_us = AboutUs::getAboutUs();
        $products = Product::getproducts();
        $reviews = CustomerReview::getReviews();
        $accommodations = Accommodation::getAllAccommodation();
        return view('homepage', compact('services','quote', 'about_us', 'products', 'reviews','accommodations'));
    }

    public function viewService($service){
        $service = Service::getService($service);
        $services = Service::getAllServices();
        $contact = ContactUs::getContact();

        return view('Actions.service-details', compact('service','services', 'contact'));
    }
}
