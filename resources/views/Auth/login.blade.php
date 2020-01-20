@extends('Layout.app')
@section('contents')
    <!-- Breadcrumb Area -->
    <div class="tm-breadcrumb-area tm-padding-section" data-bgimage="{{asset('_landing/assets/images/bg/breadcrumb-bg.jpg')}}"
         data-black-overlay="4">
        <div class="container">
            <div class="tm-breadcrumb text-center">
                <h2>Login To Your Account</h2>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li>Login</li>
                </ul>
            </div>
        </div>
    </div>
    <!--// Breadcrumb Area -->

    <!-- Main Content -->
    <main class="main-content">

        <!-- Login Register Area -->
        <div class="tm-section tm-login-register-area bg-white tm-padding-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4 add-border">
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
                        <form action="{{route('login')}}" class="tm-form tm-login-form" method="post">
                            @csrf
                            <h4 class=" text-center font-weight-bold">Kindly Signin With Your Credentials</h4>
                            <div class="tm-form-inner mt-5">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span  class="input-group-text">Email Address</span>
                                    </div>
                                    <input name="email" type="text" class="form-control">
                                </div>
                                <div class="input-group mt-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Password</span>
                                    </div>
                                    <input name="password" type="password" class="form-control" >
                                </div>
                                <div class="tm-form-field offset-lg-4">
                                    <button type="submit" class=" tm-button">Login <b></b></button>
                                </div>
                                <div class="row">
                                    <div class="tm-form-field col-lg-4">
                                        <a href="{{route('forgot-password')}}">Forgot your password?</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--// Login Register Area -->

    </main>
    <!--// Main Content -->
@endsection
