@extends('Layout.app')
@section('contents')
    <!-- Breadcrumb Area -->
    <div class="tm-breadcrumb-area tm-padding-section" data-bgimage="{{asset('_landing/assets/images/bg/breadcrumb-bg.jpg')}}"
         data-black-overlay="4">
        <div class="container">
            <div class="tm-breadcrumb text-center">
                <h2>About Us</h2>
                <ul>
                    <li><a href="{{route('homepage')}}">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </div>
    <!--// Breadcrumb Area -->

    <!-- Main Content -->
    <main class="main-content">

        <!-- About Us -->
        <div class="tm-section about-us-area bg-white tm-padding-section">
            <span class="bg-shape-2"><img src="{{asset('_landing/assets/images/icons/bg-shape-3.png')}}" alt="bg shape 3"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="about-content about-content-2">
                            <h2>Who we are</h2>
                            <p>E.M.O physiotherapy clinic is a limited  liability company incorporated in 2002 under
                                the company and allied matters act 1999 with full state licensure</p>
                            <p>{{$about_us->mission}}
                            </p>
                            <p>{{$about_us->vision}}</p>
                            <div class="about-contentbottom">
                                <a href="tel:{{$about_us->phone_number}}" class="tm-callbutton">
                                    <span class="tm-callbutton-icon"><i class="zmdi zmdi-phone-in-talk"></i></span>
                                    <h3>+2348033739499</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="about-videobox">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewbox="0 0 398 358">
                                <defs>
                                    <pattern id="attachedImage1" height="100%" width="100%" patternContentUnits="objectBoundingBox">
                                        <image xlink:href="assets/images/heroslider/heroslider-image-1.jpg"
                                               preserveAspectRatio="none" width="1" height="1" />
                                    </pattern>
                                </defs>
                                <path opacity="0.102" fill="rgb(0, 117, 183)" d="M82.843,22.613 C175.233,-23.488 239.443,6.649 290.825,61.522 C342.208,116.395 387.664,123.712 393.707,208.984 C399.750,294.254 313.624,341.741 274.739,347.672 C235.855,353.603 189.875,346.162 138.910,347.419 C63.098,349.289 33.144,322.675 18.231,290.376 C-2.864,244.685 19.343,229.351 6.068,175.158 C-9.838,110.222 10.571,58.677 82.843,22.613 Z" />
                                <path fill="url(#attachedImage1)" d="M152.967,0.590 C250.043,-6.027 295.075,43.373 320.013,109.616 C344.951,175.858 381.888,198.656 356.382,274.898 C330.877,351.140 238.755,361.226 202.759,352.311 C166.763,343.397 129.414,320.302 84.587,302.958 C17.905,277.158 1.427,243.209 0.097,209.764 C-1.784,162.451 23.084,157.167 31.080,105.300 C40.661,43.151 77.029,5.768 152.967,0.590 Z" />
                                <path fill="rgba(0,0,0,0.1)" d="M152.967,0.590 C250.043,-6.027 295.075,43.373 320.013,109.616 C344.951,175.858 381.888,198.656 356.382,274.898 C330.877,351.140 238.755,361.226 202.759,352.311 C166.763,343.397 129.414,320.302 84.587,302.958 C17.905,277.158 1.427,243.209 0.097,209.764 C-1.784,162.451 23.084,157.167 31.080,105.300 C40.661,43.151 77.029,5.768 152.967,0.590 Z" />
                            </svg>
                            <div class="tm-videobutton">
                                <a data-fancybox href="https://www.youtube.com/watch?v=4wr4eYMvSXI">
                                    <span><i class="flaticon-play-button"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--
            <div class="funfact-area tm-padding-section-top">
                <div class="container">
                    <div class="row mt-30-reverse">

                        <!-- Single Funfact -->
                        <div class="col mt-30">
                            <div class="tm-funfact">
                                    <span class="tm-funfact-icon">
                                        <i class="flaticon-spa"></i>
                                    </span>
                                <div class="tm-funfact-content">
                                    <span class="tm-funfact-contentbg"></span>
                                    <span class="odometer" data-count-to="5320"></span>
                                    <h5>Therapy Experts</h5>
                                </div>
                            </div>
                        </div>
                        <!--// Single Funfact -->

                        <!-- Single Funfact -->
                        <div class="col mt-30">
                            <div class="tm-funfact">
                                    <span class="tm-funfact-icon">
                                        <i class="flaticon-happiness"></i>
                                    </span>
                                <div class="tm-funfact-content">
                                    <span class="tm-funfact-contentbg"></span>
                                    <span class="odometer" data-count-to="3231"></span>
                                    <h5>Happy Patients</h5>
                                </div>
                            </div>
                        </div>
                        <!--// Single Funfact -->

                        <!-- Single Funfact -->
                        <div class="col mt-30">
                            <div class="tm-funfact">
                                    <span class="tm-funfact-icon">
                                        <i class="flaticon-cancer"></i>
                                    </span>
                                <div class="tm-funfact-content">
                                    <span class="tm-funfact-contentbg"></span>
                                    <span class="odometer" data-count-to="2435"></span>
                                    <h5>Treatment</h5>
                                </div>
                            </div>
                        </div>
                        <!--// Single Funfact -->

                        <!-- Single Funfact -->
                        <div class="col mt-30">
                            <div class="tm-funfact">
                                    <span class="tm-funfact-icon">
                                        <i class="flaticon-trophy"></i>
                                    </span>
                                <div class="tm-funfact-content">
                                    <span class="tm-funfact-contentbg"></span>
                                    <span class="odometer" data-count-to="190"></span>
                                    <h5>Awards</h5>
                                </div>
                            </div>
                        </div>
                        <!--// Single Funfact -->

                    </div>
                </div>
            </div>--}}
        </div>
        <!--// About Us -->

        <!-- Mission & Vision Area -->
        <div class="tm-section mission-vision-area bg-white tm-padding-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10 col-12">
                        <div class="tm-section-title text-center">
                            <h2>Why Us</h2>
                            <p>Lorem ipsum dolor sit amet, in quodsi vulputate pro. Ius illum vocent mediocritatem
                                an cule dicta iriure at phaedrum. </p>
                        </div>
                    </div>
                </div>
                <div class="row no-gutters justify-content-center">
                    <div class="col-xl-10 col-12">
                        <div class="tm-missvis">
                            <ul class="nav tm-missvis-tabs" id="bstab1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="bstab1-area1-tab" data-toggle="tab" href="#bstab1-area1"
                                       role="tab" aria-controls="bstab1-area1" aria-selected="true">
                                        <span class="tab-icon"><i class="flaticon-vision"></i></span>
                                        <h5>Our Mission</h5>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="bstab1-area2-tab" data-toggle="tab" href="#bstab1-area2"
                                       role="tab" aria-controls="bstab1-area2" aria-selected="false">
                                        <span class="tab-icon"><i class="flaticon-eye"></i></span>
                                        <h5>Our Vision & Values</h5>
                                    </a>
                                </li>
                                {{--<li class="nav-item">
                                    <a class="nav-link" id="bstab1-area3-tab" data-toggle="tab" href="#bstab1-area3"
                                       role="tab" aria-controls="bstab1-area3" aria-selected="false">
                                        <span class="tab-icon"><i class="flaticon-award"></i></span>
                                        <h5>Our Quality</h5>
                                    </a>
                                </li>--}}
                            </ul>

                            <div class="tab-content tm-missvis-tabcontent" id="bstab1-ontent">
                                <div class="tab-pane show active" id="bstab1-area1" role="tabpanel" aria-labelledby="bstab1-area1-tab">
                                    <div class="tm-missvis-sectionwrap">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="tm-missvis-image">
                                                    <svg viewBox="0 0 431 335">
                                                        <defs>
                                                            <pattern id="attachedImage2" height="100%" width="100%"
                                                                     patternContentUnits="objectBoundingBox">
                                                                <image xlink:href="{{asset('_landing/assets/images/others/mission-image-1.jpg')}}"
                                                                       preserveAspectRatio="none" width="1" height="1" />
                                                            </pattern>
                                                        </defs>
                                                        <path fill="url(#attachedImage2)" d="M430.996,174.472 C423.887,83.089 371.892,54.804 300.831,53.617 C298.012,53.570 292.437,53.719 292.437,53.719 C292.437,53.719 239.106,56.279 209.125,28.113 C186.919,10.651 157.335,-0.005 124.848,-0.005 C55.894,-0.005 -0.006,47.991 -0.006,107.199 C-0.006,134.935 12.273,160.197 32.408,179.225 C43.887,190.073 50.185,204.686 50.075,219.886 C50.073,220.143 50.072,220.400 50.072,220.657 C50.072,273.592 89.861,317.864 142.330,326.363 C224.644,346.993 398.469,340.919 429.740,191.379 C430.646,185.967 431.104,180.348 430.996,174.472 Z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="tm-missvis-content">
                                                    <h5>Our core and additional services</h5>
                                                    <p>{{$about_us->mission}}</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="bstab1-area2" role="tabpanel" aria-labelledby="bstab1-area2-tab">
                                    <div class="tm-missvis-sectionwrap">
                                        <div class="row">
                                            <div class="col-lg-6 order-1 order-lg-2">
                                                <div class="tm-missvis-image">
                                                    <svg viewBox="0 0 431 335">
                                                        <defs>
                                                            <pattern id="attachedImage3" height="100%" width="100%"
                                                                     patternContentUnits="objectBoundingBox">
                                                                <image xlink:href="{{asset('_landing/assets/images/heroslider/heroslider-image-1.jpg')}}"
                                                                       preserveAspectRatio="none" width="1" height="1" />
                                                            </pattern>
                                                        </defs>
                                                        <path fill="url(#attachedImage3)" d="M430.996,174.472 C423.887,83.089 371.892,54.804 300.831,53.617 C298.012,53.570 292.437,53.719 292.437,53.719 C292.437,53.719 239.106,56.279 209.125,28.113 C186.919,10.651 157.335,-0.005 124.848,-0.005 C55.894,-0.005 -0.006,47.991 -0.006,107.199 C-0.006,134.935 12.273,160.197 32.408,179.225 C43.887,190.073 50.185,204.686 50.075,219.886 C50.073,220.143 50.072,220.400 50.072,220.657 C50.072,273.592 89.861,317.864 142.330,326.363 C224.644,346.993 398.469,340.919 429.740,191.379 C430.646,185.967 431.104,180.348 430.996,174.472 Z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 order-2 order-lg-1">
                                                <div class="tm-missvis-content">
                                                    <h5>Our Visions</h5>
                                                    <p>{{$about_us->vision}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="bstab1-area3" role="tabpanel" aria-labelledby="bstab1-area3-tab">
                                    <div class="tm-missvis-sectionwrap">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="tm-missvis-image">
                                                    <svg viewBox="0 0 431 335">
                                                        <defs>
                                                            <pattern id="attachedImage4" height="100%" width="100%"
                                                                     patternContentUnits="objectBoundingBox">
                                                                <image xlink:href="assets/images/heroslider/heroslider-image-1.jpg"
                                                                       preserveAspectRatio="none" width="1" height="1" />
                                                            </pattern>
                                                        </defs>
                                                        <path fill="url(#attachedImage4)" d="M430.996,174.472 C423.887,83.089 371.892,54.804 300.831,53.617 C298.012,53.570 292.437,53.719 292.437,53.719 C292.437,53.719 239.106,56.279 209.125,28.113 C186.919,10.651 157.335,-0.005 124.848,-0.005 C55.894,-0.005 -0.006,47.991 -0.006,107.199 C-0.006,134.935 12.273,160.197 32.408,179.225 C43.887,190.073 50.185,204.686 50.075,219.886 C50.073,220.143 50.072,220.400 50.072,220.657 C50.072,273.592 89.861,317.864 142.330,326.363 C224.644,346.993 398.469,340.919 429.740,191.379 C430.646,185.967 431.104,180.348 430.996,174.472 Z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="tm-missvis-content">
                                                    <h5>Our core and additional services</h5>
                                                    <p>Our Vision is to promote a healthy lifestyle. To be a global
                                                        health care leader by advancing the science and practice of
                                                        massage therapy. In supporting our members and serving our
                                                        stakeholders. In supporting our members and serving our
                                                        stakeholders.</p>
                                                    <ul class="stylish-list-color">
                                                        <li>Physiotherapy</li>
                                                        <li>Chiropractic Care</li>
                                                        <li>Naturopathy</li>
                                                        <li>Massage Therapy</li>
                                                        <li>Acupuncture</li>
                                                        <li>Chiropody</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Mission & Vision Area -->
    </main>
    <!--// Main Content -->
@endsection