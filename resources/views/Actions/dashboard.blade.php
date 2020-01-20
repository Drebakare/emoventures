@extends('Layout.app')
@section('contents')
    <!-- Breadcrumb Area -->
    <div class="tm-breadcrumb-area tm-padding-section" data-bgimage="{{asset('_landing/assets/images/bg/breadcrumb-bg.jpg')}}"
         data-black-overlay="4">
        <div class="container">
            <div class="tm-breadcrumb text-center">
                <h2>Dashboard</h2>
                <ul>
                    <li><a href="{{route('homepage')}}">Home</a></li>
                    <li>Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
    <!--// Breadcrumb Area -->

    <!-- Main Content -->
    <main class="main-content">
        <div class="tm-section tm-my-account-area bg-white tm-padding-section">
            <div class="container">
                <div class="tm-myaccount">
                    <ul class="nav tm-tabgroup justify-content-start justify-content-lg-center" id="account" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="account-dashboard-tab" data-toggle="tab" href="#account-dashboard"
                               role="tab" aria-controls="account-dashboard" aria-selected="true">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders"
                               role="tab" aria-controls="account-orders" aria-selected="false">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-address-tab" data-toggle="tab" href="#account-address"
                               role="tab" aria-controls="account-address" aria-selected="false">Past Health Records</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-acdetails-tab" data-toggle="tab" href="#account-acdetails"
                               role="tab" aria-controls="account-acdetails" aria-selected="false"> Edit Account Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-logout-tab" href="{{route('user.logout')}}" role="tab"
                               aria-controls="account-address" aria-selected="false">Logout</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="account-ontent">
                        <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel"
                             aria-labelledby="account-dashboard-tab">
                            <div class="tm-myaccount-dashboard padding-around text-center col-sm-10 offset-sm-1">
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
                                <div class="row pb-4">
                                    <div class="col-sm-4">
                                        <img src="{{asset('profile_picture/'.Auth::user()->profile_image)}}" class="rounded img-fluid" alt="...">
                                        <div>
                                            <form method="post" action="{{route('dashboard.upload-picture')}}" enctype="multipart/form-data">
                                                @csrf
                                                    <div class="col-sm-12 pt-3">
                                                        <input type="file" name="picture" required>
                                                    </div>
                                                    <div class="col-sm-5 pt-3 offset-sm-2">
                                                        <button type="submit" class="btn btn-xs btn-success">Upload new picture</button>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 text-sm-right pt-5">
                                        <a href="{{route('user.logout')}}"><button class="btn-danger"> Logout</button></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <span> <h4 class="font-weight-bolder" >Name:</h4> </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span> {{Auth::user()->name}}</span>
                                    </div>
                                </div>
                                <hr style="margin-top: 10px;">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <span> <h4 class="font-weight-bolder" >Email:</h4> </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span>{{Auth::user()->email}}</span>
                                    </div>
                                </div>
                                <hr style="margin-top: 10px;">
                                    <div class="row">
                                    <div class="col-sm-4">
                                        <span> <h4 class="font-weight-bolder" >Phone number:</h4> </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span>{{Auth::user()->phone_number}}</span>
                                    </div>
                                </div>
                                <hr style="margin-top: 10px;">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <span> <h4 class="font-weight-bolder" >Date of Birth:</h4> </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span>{{Auth::user()->dob}}</span>
                                    </div>
                                </div>
                                <hr style="margin-top: 10px;">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <span> <h4 class="font-weight-bolder" >Address:</h4> </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span> {{Auth::user()->address}}</span>
                                    </div>
                                </div>
                                <hr style="margin-top: 10px;">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <span> <h4 class="font-weight-bolder" >Password:</h4> </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <span>**********</span>
                                    </div>
                                </div>
                                <hr style="margin-top: 10px;">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-orders" role="tabpanel" aria-labelledby="account-orders-tab">
                            <div class="tm-myaccount-orders">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0 col-xl-12">
                                        <thead>
                                        <tr>
                                            <th class="tm-myaccount-orders-col-id">ORDER ID</th>
                                            <th class="tm-myaccount-orders-col-date">DATE</th>
                                            <th class="tm-myaccount-orders-col-status">STATUS</th>
                                            <th class="tm-myaccount-orders-col-status">PRODUCT</th>
                                            <th class="tm-myaccount-orders-col-total">AMOUNT PAID</th>
                                            <th class="tm-myaccount-orders-col-total">SHIPPING ADDRESS</th>
                                            <th class="tm-myaccount-orders-col-view">ACTION</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $key => $order)
                                            <tr>
                                                <td>{{$order->payment_id}}</td>
                                                <td>{{$order->created_at}}</td>
                                                <td>
                                                    @if($order->status == 0)
                                                        <span class="font-weight-bold" style="color:yellowgreen">on Hold</span>
                                                    @else
                                                        <span style="color: green">Completed</span>
                                                    @endif
                                                </td>
                                                <td>
                                                   {{$order->product->product_name}}
                                                </td>
                                                <td>#{{$order->amount_paid}}</td>
                                                <td>{{$order->shipping_address}}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-sm-3 pr-5">
                                                            <a href="{{route('shop.product-details',["name" => $order->product->product_name])}}" class="tm-button tm-button-sm">View <b></b></a>
                                                        </div>
                                                        @if($order->status == 0)
                                                            <div class="col-sm-4 pl-5">
                                                                <a  data-toggle="modal" href="#shippingForm{{$key}}" class=" tm-button tm-button-dark tm-button-sm">Edit Address<b></b></a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-address" role="tabpanel" aria-labelledby="account-address-tab">
                            <div class="tm-myaccount-orders">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                        <tr>
                                            <th class="tm-myaccount-orders-col-id">SERVICE</th>
                                            <th class="tm-myaccount-orders-col-date">AMOUNT</th>
                                            <th class="tm-myaccount-orders-col-status">PAYMENT STATUS</th>
                                            <th class="tm-myaccount-orders-col-total">START DATE</th>
                                            <th class="tm-myaccount-orders-col-total">STATUS</th>
                                            <th class="tm-myaccount-orders-col-view">VIEW</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($appointments as $key => $appointment)
                                            <tr>
                                                <td>{{$appointment->service->keyword}}
                                                    @if($appointment->accommodation_status==1)
                                                        (WITH ACCOMMODATION)
                                                    @else
                                                        (No ACCOMMODATION)
                                                    @endif
                                                </td>
                                                <td>{{$appointment->amount}}</td>
                                                <td>
                                                    @if($appointment->payment_status == 0)
                                                        <span style="color:darkred" class="font-weight-bold">Pending</span>
                                                    @else
                                                        <span style="color:green" class="font-weight-bold">Completed</span>
                                                    @endif
                                                </td>
                                                <td>{{$appointment->start_date}}</td>
                                                <td>
                                                    @if($appointment->appointment_status == 0)
                                                        <span style="color:darkred" class="font-weight-bold">Pending</span>
                                                    @else
                                                        <span style="color:green" class="font-weight-bold">Completed</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-sm-3 pr-5">
                                                            <a href="{{route('appointment.checkout',["id" => $appointment->id])}}" class="tm-button tm-button-sm">View <b></b></a>
                                                        </div>
                                                        {{--@if($appointment->appointment_status == 0)
                                                            <div class="col-sm-4 pl-5">
                                                                <a  data-toggle="modal" href="#report{{$key}}" class=" tm-button tm-button-dark tm-button-sm">Report<b></b></a>
                                                            </div>
                                                        @endif--}}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-acdetails" role="tabpanel" aria-labelledby="account-acdetails-tab">
                            <div class="tm-myaccount-acdetails row">
                                <div class="col-md-6">
                                    <form action="{{route('user.update-account-details')}}" class="tm-form tm-form-bordered" method="post">
                                        @csrf
                                        <h4>Update Account Details</h4>
                                        <div class="tm-form-inner">
                                            <div class="tm-form-field ">
                                                <label for="acdetails-firstname">Fullname</label>
                                                <input name="name" type="text" id="acdetails-firstname" value="{{Auth::user()->name}}" placeholder="{{Auth::user()->name}}" required>
                                            </div>
                                            <div class="tm-form-field">
                                                <label for="acdetails-email">Email address</label>
                                                <input name="email" type="email" id="acdetails-email" value="{{Auth::user()->email}}" placeholder="{{Auth::user()->email}}" required>
                                            </div>
                                            <div class="tm-form-field">
                                                <label for="acdetails-email">Date Of Birth</label>
                                                <input name="dob" type="date" id="acdetails-email" value="{{Auth::user()->dob}}" placeholder="{{Auth::user()->dob}}" required>
                                            </div>
                                            <div class="tm-form-field">
                                                <label for="acdetails-password">Address</label>
                                                <input name="address" type="text" id="acdetails-password" value="{{Auth::user()->address}}" placeholder="{{Auth::user()->address}}" required>
                                            </div>
                                            <div class="tm-form-field">
                                                <label for="acdetails-newpassword">Phone number</label>
                                                <input name="phone" type="tel" id="acdetails-newpassword" value="{{Auth::user()->phone_number}}" placeholder="{{Auth::user()->phone_number}}" required>
                                            </div>
                                            <div class="tm-form-field">
                                                <button type="submit" class="tm-button">Update Account<b></b></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{route('user.update-password')}}" class="tm-form tm-form-bordered" method="post">
                                        @csrf
                                        <h4>Change Password</h4>
                                        <div class="tm-form-inner">
                                            <div class="tm-form-field">
                                                <label for="acdetails-password">Old password</label>
                                                <input name="previous_password" type="password" id="acdetails-password">
                                            </div>
                                            <div class="tm-form-field">
                                                <label for="acdetails-newpassword">New password</label>
                                                <input name="password" type="password" id="acdetails-newpassword">
                                            </div>
                                            <div class="tm-form-field">
                                                <label for="acdetails-confirmpass">Confirm password</label>
                                                <input name="password_confirmation" type="password" id="acdetails-confirmpass">
                                            </div>
                                            <div class="tm-form-field">
                                                <button type="submit" class="tm-button">Update Password <b></b></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--// Main Content -->
    @foreach($orders as $key=>$order)
        <div class="modal fade" id="shippingForm{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#login"><i class="icon-present"></i>Product Shipment Information</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content mt-30">
                            <div class="tab-pane container active" id="login">
                                <form method="post" action="{{route('product.edit-shipping-address')}}">
                                    @csrf
                                    <h5 class=" text-center font-weight-bold">Edit your current Shipping address</h5>
                                    <input name="product_id" value="{{$order->product_id}}" hidden>
                                    <div class="form-group">
                                        <label for="comment">Shipping Address:</label>
                                        <textarea class="form-control" rows="3" id="address" name="address" required>{{$order->shipping_address}}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary" >Edit Address</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection