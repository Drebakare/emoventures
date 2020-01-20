@extends('Layout.app')
@section('contents')
    <!-- Breadcrumb Area -->
    <div class="tm-breadcrumb-area tm-padding-section" data-bgimage="{{asset('_landing/assets/images/bg/breadcrumb-bg.jpg')}}"
         data-black-overlay="4">
        <div class="container">
            <div class="tm-breadcrumb text-center">
                <h2>Service Details</h2>
                <ul>
                    <li><a href="{{route('homepage')}}">Home</a></li>
                    <li>Services</li>
                    <li>{{$service->keyword}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!--// Breadcrumb Area -->

    <!-- Main Content -->
    <main class="main-content">

        <!-- Service Details -->
        <div class="tm-section service-details-area bg-white tm-padding-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="tm-service-details sticky-sidebar">
                            <img class="tm-service-details-image" src="{{asset('profile_picture/'.$service->image)}}"
                                 alt="service details image">
                            <h2>{{$service->keyword}}</h2>
                            <p>{{$service->title}}</p>
                            <p>{{$service->body}}</p>
                           {{-- <ul class="stylish-list">
                                <li><i class="fa fa-hand-o-right"></i> Eum dolor atque quisquam qui voluptate
                                    necessitatibus tempore.</li>
                                <li><i class="fa fa-hand-o-right"></i> Alias quidem non explicabo delectus totam
                                    dolores odit.</li>
                                <li><i class="fa fa-hand-o-right"></i> Et laboriosam magni animi dignissimos.</li>
                                <li><i class="fa fa-hand-o-right"></i> Adipisci dolorem minus quas voluptate
                                    sapiente velit unde veritatis.</li>
                                <li><i class="fa fa-hand-o-right"></i> Perferendis nihil veritatis.</li>
                                <li><i class="fa fa-hand-o-right"></i> Et reiciendis iure blanditiis quas sed
                                    dolore.</li>
                            </ul>
                            <div id="service-acc" class="tm-accordion pt-2">
                                <div class="card">
                                    <div class="card-header" id="service-acc-heading1">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#service-acc-collapse1"
                                                    aria-expanded="true" aria-controls="service-acc-collapse1">
                                                What is Sports Rehabilitation?
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="service-acc-collapse1" class="collapse show" aria-labelledby="service-acc-heading1"
                                         data-parent="#service-acc">
                                        <div class="card-body">
                                            <p>Sint et et illum. Odio et nesciunt veritatis maxime quas esse
                                                dolore. Beatae vel et modi quidem. Modi aut dolorem sed
                                                necessitatibus ut voluptatem deleniti.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="service-acc-heading2">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#service-acc-collapse2" aria-expanded="false"
                                                    aria-controls="service-acc-collapse2">
                                                What is our service of Sports Rehabilitation?
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="service-acc-collapse2" class="collapse" aria-labelledby="service-acc-heading2"
                                         data-parent="#service-acc">
                                        <div class="card-body">
                                            <p>Voluptatum voluptas deserunt. Sed sed ipsum cum placeat et nemo
                                                earum aspernatur consequatur. Autem beatae cum accusantium sunt
                                                rerum est enim iste. Ut vero quis qui distinctio quas omnis
                                                nostrum. Sunt tempore rem pariatur aut odio necessitatibus amet
                                                dolorem illum. Facilis voluptatibus eos.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="service-acc-heading3">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#service-acc-collapse3" aria-expanded="false"
                                                    aria-controls="service-acc-collapse3">
                                                How do I make a perfect Business plan?
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="service-acc-collapse3" class="collapse" aria-labelledby="service-acc-heading3"
                                         data-parent="#service-acc">
                                        <div class="card-body">
                                            <p>Voluptas pariatur ab officiis fuga quia eligendi. Et ab provident
                                                amet voluptas praesentium. Qui ducimus modi qui delectus sed
                                                aspernatur sed. Aut tempora quod quis vitae ipsum. Harum in sint
                                                odio sint quia iste perspiciatis illo.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="sticky-sidebar">
                            <div class="widgets widgets-blog">

                                <!-- Single Widget -->
                                <div class="single-widget widget-serviceitems">
                                    <h5 class="widget-title">Services</h5>
                                    <ul>
                                        @foreach($services as $product)
                                             <li><a href="{{route('service', ["service" => $product->keyword])}}">{{$product->keyword}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!--// Single Widget -->

                                <!-- Single Widget -->
                                <div class="single-widget widget-contact">
                                    <h5 class="widget-title">Get In Touch</h5>
                                    <ul>
                                        <li><b>Address :</b>{{$contact->location}}</li>
                                        <li><b>Phone :</b><a href="tel:{{$contact->contact}}">{{$contact->contact}}</a></li>
                                        <li><b>Email :</b><a href="mailto:{{$contact->email}}">{{$contact->email}}</a></li>
                                    </ul>
                                </div>
                                <!--// Single Widget -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
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
    <!--// Main Content -->
@endsection