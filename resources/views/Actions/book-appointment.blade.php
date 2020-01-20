@extends('Layout.app')
@section('contents')
    <!-- Breadcrumb Area -->
    <div class="tm-breadcrumb-area tm-padding-section" data-bgimage="{{asset('_landing/assets/images/bg/breadcrumb-bg.jpg')}}"
         data-black-overlay="4">
        <div class="container">
            <div class="tm-breadcrumb text-center">
                <h2>Book Appointment</h2>
                <ul>
                    <li><a href="{{route('homepage')}}">Home</a></li>
                    <li>Book Appointment</li>
                </ul>
            </div>
        </div>
    </div>
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
                                    <select name="select_accomodation" required>
                                        <option >Select Accommodation</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <input name="appointment_date" type="text" required="required" data-toggle="datepicker" placeholder="Select Date">
                                </div>
                                <div class="tm-form-field ">
                                    <select name="select_services">
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}">{{$service->keyword}}</option>
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
@endsection