<!-- Header Top Area -->
<div class="header-toparea">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7 col-sm-6 col-12">
                <div class="header-topinfo">
                    <ul>
                        <li>Email us : <a href="mailto://emophysio@yahoo.co">emophysio@yahoo.com</a></li>
                        <li>Call us : <a href="tel://+2348033739499">08033739499</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5 col-sm-6 col-12">
                <div class="header-topbutton">
                    <a href="{{route('user.book-appointment')}}" class="tm-button tm-button-white">Book an Appointment</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--// Header Top Area -->

<!-- Header Bottom Area -->
<div class="header-bottomarea">
    <div class="container">
        <div class="header-bottominner">
            <div class="header-logo">
                <a href="{{route('homepage')}}">
                    <h5 class="font-weight-bold"><span style="color: #0075b7;">E.M.O </span> PHYSIOTHERAPY </h5>
                    {{--<img src="assets/images/logo/logo.png" alt="dialia logo">--}}
                </a>
            </div>
            <nav class="tm-navigation">
                <ul>
                    <li><a href="{{route('homepage')}}">Home</a></li>
                    <li><a href="{{route('about-us')}}">About</a></li>
                    <li><a href="{{route('shop')}}">Shop</a></li>
                    @if(!Auth::check())
                        <li><a href="{{route('account-login')}}"><i class="zmdi zmdi-sign-in"></i>Login</a></li>
                        <li><a href="{{route('account-register')}}"><i class="zmdi zmdi-account-add"></i>Register</a></li>
                    @else
                        <li><a href="{{route('user.dashboard')}}"><i class="zmdi zmdi-pin-account"></i>Dashboard</a></li>
                        <li><a href="{{route('user.logout')}}"><i class="zmdi zmdi-arrow-out"></i>Log out</a></li>
                    @endif
                    <li><a href="{{route('contact-us')}}">Contact</a></li>
                </ul>
            </nav>
        </div>
        <div class="header-mobilemenu clearfix">
            <div class="tm-mobilenav"></div>
        </div>
    </div>
</div>
<!--// Header Bottom Area -->
