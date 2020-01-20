@extends('Layout.app')
@section('slider')
    <div class="heroslider-area" data-bgimage="{{asset('_landing/assets/images/bg/bg-image-1.jpg')}}" data-black-overlay="3">

        <!-- Heroslider Slider -->
        <div class="heroslider-slider heroslider-animated tm-slider-dots tm-slider-dots-left" data-white-overlay="7">
            <!-- Heroslider Single -->
            <div class="heroslider-singleslider d-flex align-items-center">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-6 col-sm-8 col-12">
                            <div class="heroslider-image heroslider-image-left">
                                <svg viewBox="0 0 665 645">
                                    <defs>
                                        <pattern id="attachedImage2" height="100%" width="100%" patternContentUnits="objectBoundingBox">
                                            <image xlink:href="{{asset('_landing/assets/images/heroslider/heroslider-image-2.jpg')}}"
                                                   preserveAspectRatio="none" width="1" height="1" />
                                        </pattern>
                                    </defs>
                                    <path fill="url(#attachedImage2)" d="M277.030,1.101 C452.838,-10.886 534.393,78.587 579.557,198.565 C624.722,318.542 691.616,359.832 645.425,497.920 C599.233,636.008 432.396,654.275 367.205,638.129 C302.015,621.984 234.375,580.155 153.191,548.742 C32.427,502.014 2.584,440.527 0.176,379.950 C-3.230,294.260 41.806,284.689 56.287,190.747 C73.638,78.186 139.502,10.477 277.030,1.101 Z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-12">
                            <div class="heroslider-content">
                                <h1>{{$quote->header}}</h1>
                                <p>{{$quote->body}}</p>
                                <a href="{{route('about-us')}}" class="tm-button">About
                                    Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Heroslider Single -->

        </div>
        <!--// Heroslider Slider -->

    </div>
    @endsection
    @section('contents')
    <div class="tm-section about-us-area bg-grey">
        <div class="about-image" data-bgimage="assets/images/others/about-image-1.jpg" data-overlay="1">
            <div class="tm-videobutton">
                <a data-fancybox href="https://www.youtube.com/watch?v=4wr4eYMvSXI">
                    <span><i class="flaticon-play-button"></i></span>
                </a>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-6">
                    <div class="about-content tm-padding-section">
                        <h2><span class="font-weight-bold"><span class="color-theme">About</span> Us</span></h2>
                        <p>E.M.O physiotherapy clinic is a limited  liability company incorporated in 2002 under
                            the company and allied matters act 1999 with full state licensure</p>
                        <p>{{$about_us->mission}}</p>
                        <div class="about-contentbottom">
                            <a href="about-us.html" class="tm-button">Read more</a>
                            <a href="tel:{{$about_us->phone_number}}" class="tm-callbutton">
                                <span class="tm-callbutton-icon"><i class="zmdi zmdi-phone-in-talk"></i></span>
                                <h3>{{$about_us->phone_number}}</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tm-section services-area tm-padding-section bg-white">
        <span class="bg-shape-left"><img src="{{asset('_landing/assets/images/icons/bg-shape-1.png')}}" alt="background shape"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10 col-12">
                    <div class="tm-section-title text-center">
                        <h2>Our Services</h2>
                        <p>We Offer the following services</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-30-reverse">
                @foreach($services as $service)
                    <!-- Single Service -->
                    <div class="col-lg-4 col-md-6 col-12 mt-30">
                        <div class="tm-service text-center wow fadeInUp">
                            <div class="tm-service-inner">
                                        <span class="tm-service-icon">
                                            <i class="flaticon-physiotherapy"></i>
                                        </span>
                                <span class="tm-service-backicon">
                                            <i class="flaticon-physiotherapy"></i>
                                        </span>
                                <h5><a href="#">{{$service->keyword}}</a></h5>
                                <p>{{$service->title}}</p>
                                <a href="{{route('service', ["service" => $service->keyword])}}" class="tm-readmore">Read more</a>
                            </div>
                        </div>
                    </div>
                    <!--// Single Service -->
                @endforeach

            </div>
        </div>
    </div>
    <div class="tm-section call-to-action-area tm-padding-section" data-bgimage="{{asset('_landing/assets/images/bg/call-to-action-bg.jpg')}}"
         data-overlay="8">
        <div class="container">
            <div class="tm-cta">
                <div class="tm-cta-content">
                    <h2>For your convenience, you can book your appointment</h2>
                </div>
                <div class="header-topbutton">
                    <a href="{{route('user.book-appointment')}}" class="tm-button tm-button-white">Book an Appointment</a>
                </div>
            </div>
        </div>
    </div>
    <!--  Products Area -->
    <div class="tm-section products-area tm-padding-section bg-white">
        <span class="bg-shape-right"><img src="{{asset('_landing/assets/images/icons/bg-shape-2.png')}}" alt="background shape"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10 col-12">
                    <div class="tm-section-title text-center">
                        <h2>Welcome to our shop</h2>
                        <p>Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem
                            an cule dicta iriure at phaedrum. </p>
                    </div>
                </div>
            </div>
            <div class="row product-slider-active tm-slider-arrow tm-slider-arrow-hovervisible">
                @foreach($products as $product)
                    <!-- Single Product -->
                    <div class="col">
                        <div class="tm-product">
                            <div class="tm-product-image">
                                <a class="tm-product-imagelink" href="{{route('shop.product-details',["name" => $product->product_name])}}">
                                        <img src="{{asset('profile_picture/'.$product->main_image_name)}}" alt="product image">
                                </a>
                            </div>
                            <div class="tm-product-content">
                                <h5 class="tm-product-title"><a href="#">{{$product->product_name}}</a></h5>
                                {{--<div class="tm-product-rating">
                                    <span class="active"><i class="zmdi zmdi-star"></i></span>
                                    <span class="active"><i class="zmdi zmdi-star"></i></span>
                                    <span class="active"><i class="zmdi zmdi-star"></i></span>
                                    <span class="active"><i class="zmdi zmdi-star"></i></span>
                                    <span class="active"><i class="zmdi zmdi-star"></i></span>
                                </div>--}}
                                <h6 class="tm-product-price"><span>#</span>{{$product->amount}}</h6>
                            </div>
                        </div>
                    </div>
                    <!--// Single Product -->
                @endforeach
            </div>
            <div class="row ">
                <div class="col-xl-6 col-lg-8 col-md-10 col-12 mt-50 offset-md-1">
                    <div class="tm-section-title">
                        <div class="header-topbutton">
                            <a href="{{route('shop')}}" class="tm-button tm-cta-button">View All Products <i class="zmdi zmdi-arrow-forward"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//  Products Area -->
    <!-- Appointment Information Area -->
    <div class="tm-section appointment-information-area tm-padding-section bg-white">
        <span class="bg-shape-2"><img src="{{asset('_landing/assets/images/icons/bg-shape-3.png')}}" alt="background shape"></span>
        <div class="container">
            <div class="row mt-50-reverse">
                <div class="col-lg-6 mt-50">
                    <div class="tm-information">
                        <div class="tm-information-timing">
                            <h5>Opening Hours</h5>
                            <ul>
                                <li>Monday - Friday <span>12:00 - 17:00</span></li>
                                <li>Saturday <span>15:00 - 18:00</span></li>
                                <li>Sunday <span>Closed</span></li>
                            </ul>
                        </div>
                        <div class="tm-information-contact">
                            <h5>Contact Details</h5>
                            <ul>
                                <li><b>Address </b>80 Ondo road
                                    Off Mayfair round about
                                    Ile-Ife Osun state, Nigeria
                                </li>
                                <li><b>Phone </b>08033739499</li>
                                <li><b>Email </b>emophysio@yahoo.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-50">
                    <div class="tm-appointment">
                        <h2>Book an Appointment</h2>
                        <form action="{{route('user.book-appointment')}}" class="tm-form" method="post">
                            @csrf
                            <div class="tm-form-inner">
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <input name="fullname" type="text" required="required" placeholder="Name*">
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <input name="email" type="email" required="required" placeholder="Email*">
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <select name="select_accomodation" id="accommodation" required>
                                        <option >Select Accommodation</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <select name="select_services" class="hotels">
                                        <option value="">Select Hotel</option>
                                        @foreach($accommodations as $accommodation)
                                            <option value="{{$accommodation->id}}">{{$accommodation->name}} ( #{{$accommodation->price}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <input name="appointment_date" type="text" required="required" data-toggle="datepicker" placeholder="Select Date">
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <select name="select_services">
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}">{{$service->keyword}} (#{{$service->price}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="tm-form-field">
                                    <textarea name="message" cols="30" rows="5" placeholder="Message"></textarea>
                                </div>
                                <div class="tm-form-field">
                                    <button type="submit" class="tm-button">Proceed</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Appointment Information Area -->
    <div class="tm-section testimonial-area tm-padding-section bg-grey">
        <div class="bg-animated-shape">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10 col-12">
                    <div class="tm-section-title text-center">
                        <h2>What Our Customers Say</h2>
                    </div>
                </div>
            </div>
            <div class="testimonial-slider-active tm-slider-arrow-2">
                @foreach($reviews as $review)
                    <!-- Testimonial Single -->
                    <div class="tm-testimonial-slideritem">
                        <div class="tm-testimonial">
                            <div class="tm-testimonial-author">
                                {{--<div class="tm-testimonial-authorimage">
                                    <img src="assets/images/authors/author-image-1.jpg" alt="author image">
                                </div>--}}
                                <div class="tm-testimonial-authorinfo">
                                    <h5>{{$review->name}}</h5>
                                </div>
                            </div>
                            <div class="tm-testimonial-content">
                                <p>{{$review->message}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!--// Testimonial Single -->
            </div>
        </div>
    </div>
@endsection
@section('script_contents')
    <script type="text/javascript">
        $(document).ready(function () {
           $('.hotels').prop('disabled', true);
           $('#accommodation').change(function () {
               let value = $(this).val();
               if (value==1){
                   $('.hotels').prop("disabled", false);
               }
               else {
                   $('.hotels').prop('disabled', true);
               }
           })
        })
    </script>
@endsection
