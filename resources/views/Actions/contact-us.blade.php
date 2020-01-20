@extends('Layout.app')
@section('contents')
    <!-- Breadcrumb Area -->
    <div class="tm-breadcrumb-area tm-padding-section" data-bgimage="{{asset('_landing/assets/images/bg/breadcrumb-bg.jpg')}}"
         data-black-overlay="4">
        <div class="container">
            <div class="tm-breadcrumb text-center">
                <h2>Contact Us</h2>
                <ul>
                    <li><a href="{{route('homepage')}}">Home</a></li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>
    </div>
    <!--// Breadcrumb Area -->

    <!-- Main Content -->
    <main class="main-content">

        <!-- Contact Us Area -->
        <div class="tm-section contact-us-area tm-padding-section bg-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10 col-12">
                        <div class="tm-section-title text-center">
                            <h2>How To Find Us</h2>
                            <p>Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem
                                an cule dicta iriure at phaedrum. </p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-30-reverse">
                    <div class="col-lg-4 col-md-6 col-12 mt-30">
                        <div class="tm-contactblock text-center">
                                <span class="tm-contactblock-icon">
                                    <i class="flaticon-placeholder"></i>
                                </span>
                            <span class="tm-contactblock-backicon">
                                    <i class="flaticon-placeholder"></i>
                                </span>
                            <h5>Our location</h5>
                            <p>{{$contact_us->location}}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mt-30">
                        <div class="tm-contactblock text-center">
                                <span class="tm-contactblock-icon">
                                    <i class="flaticon-alarm-clock"></i>
                                </span>
                            <span class="tm-contactblock-backicon">
                                    <i class="flaticon-alarm-clock"></i>
                                </span>
                            <h5>Opening Hour</h5>
                            <ul>
                                <li>Monday - Friday <span>12:00 - 17:00</span></li>
                                <li>Saturday <span>15:00 - 18:00</span></li>
                                <li>Sunday <span>Closed</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mt-30">
                        <div class="tm-contactblock text-center">
                                <span class="tm-contactblock-icon">
                                    <i class="flaticon-phone"></i>
                                </span>
                            <span class="tm-contactblock-backicon">
                                    <i class="flaticon-phone"></i>
                                </span>
                            <h5>Contact</h5>
                            <ul>
                                <li>Phone <span>{{$contact_us->contact}}</span></li>
                                <li>Email <span>{{$contact_us->email}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-50">
                    <div class="col-xl-6 col-lg-8 col-md-10 col-12">
                        <div class="tm-section-title text-center">
                            <h2>Drop a Message for Us</h2>
                            {{--<p>Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem
                                an cule dicta iriure at phaedrum. </p>--}}
                        </div>
                    </div>
                    <div class="col-lg-8">
                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger"  style="margin-top: 10px; margin-left: 10px;">
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif
                        @if(session('failure'))
                            <div class="alert alert-danger" style="margin-top: 10px; margin-left: 10px;">
                                {{session('failure')}}
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success" style=" margin-top: 10px; margin-left: 10px;">
                                {{session('success')}}
                            </div>
                        @endif
                        <form id="" action="{{route('contact-form')}}" method="post" class="tm-form tm-contact-form">
                            @csrf
                            <div class="tm-form-inner">
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <input type="text" name="name" required="required" placeholder="Name*">
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <input type="email" name="email" required="required" placeholder="Email*">
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <input type="text" name="phone" placeholder="Phone">
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <input type="text" name="subject" required="required" placeholder="Subject*">
                                </div>
                                <div class="tm-form-field">
                                    <textarea name="message" cols="30" rows="5" placeholder="Message" required></textarea>
                                </div>
                                <div class="tm-form-field text-center">
                                    <button type="submit" class="tm-button tm-button-dark">Send Message</button>
                                </div>
                            </div>
                        </form>
                        <p class="form-messages"></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--// Main Content -->
@endsection