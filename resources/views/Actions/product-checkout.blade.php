@extends('Layout.app')
@section('contents')
    <!-- Breadcrumb Area -->
    <div class="tm-breadcrumb-area tm-padding-section" data-bgimage="{{asset('_landing/assets/images/bg/breadcrumb-bg.jpg')}}"
         data-black-overlay="4">
        <div class="container">
            <div class="tm-breadcrumb text-center">
                <h2>Product Details</h2>
                <ul>
                    <li><a href="{{route('homepage')}}">Home</a></li>
                    <li>Product Details</li>
                </ul>
            </div>
        </div>
    </div>
    <!--// Breadcrumb Area -->

    <!-- Main Content -->
    <main class="main-content">
        <div class="tm-section product-details-area bg-white tm-padding-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="tm-prodetails">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">

                                    <!-- Product Details Images -->
                                    <div class="tm-prodetails-images">
                                        <div class="tm-prodetails-largeimages">
                                            <div class="tm-prodetails-largeimage">
                                                <a data-fancybox="tm-prodetails-imagegallery" href="{{asset('profile_picture/'.$product->main_image_name)}}"
                                                   data-caption="Product Zoom Image 1">
                                                    <img src="{{asset('profile_picture/'.$product->main_image_name)}}" alt="product image">
                                                </a>
                                            </div>
                                            @foreach($product_images as $image)
                                                <div class="tm-prodetails-largeimage">
                                                    <a data-fancybox="tm-prodetails-imagegallery" href="{{asset('profile_picture/'.$image->image_name)}}"
                                                       data-caption="Product Zoom Image 2">
                                                        <img src="{{asset('profile_picture/'.$image->image_name)}}" alt="product image">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="tm-prodetails-thumbnails">
                                            @foreach($product_images as $image)
                                                <div class="tm-prodetails-thumbnail text-left">
                                                    <img src="{{asset('profile_picture/'.$image->image_name)}}" alt="product image">
                                                </div>
                                            @endforeach
                                            <div class="tm-prodetails-thumbnail text-left">
                                                <img src="{{asset('profile_picture/'.$product->main_image_name)}}" alt="product image">
                                            </div>
                                        </div>
                                    </div>
                                    <!--// Product Details Images -->

                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="tm-prodetails-content">
                                        <h3 class="tm-prodetails-title">{{$product->product_name}}</h3>
                                        {{--<div class="tm-rating">
                                            <span class="active"><i class="zmdi zmdi-star"></i></span>
                                            <span class="active"><i class="zmdi zmdi-star"></i></span>
                                            <span class="active"><i class="zmdi zmdi-star"></i></span>
                                            <span class="active"><i class="zmdi zmdi-star"></i></span>
                                            <span class="active"><i class="zmdi zmdi-star"></i></span>
                                        </div>--}}
                                        <p class="tm-prodetails-availability">Availalbe: <span>In Stock</span></p>
                                        <div class="tm-prodetails-price">
                                            <span> #{{$product->amount}}</span>
                                        </div>
                                        <p>{{$product->product_details}}</p>
                                        <div class="tm-prodetails-quantitycart">
                                            <a href="#" class="tm-button tm-cta-button" onclick="checkAuth()">Make Order<b></b></a>
                                        </div>

                                        <div class="tm-prodetails-categories">
                                            <h6>Category :</h6>
                                            <ul>
                                                <li><a href="#">{{$product->category->keyword}}</a></li>
                                            </ul>
                                        </div>

                                        <div class="tm-prodetails-share">
                                            <h6>Share :</h6>
                                            <ul>
                                                <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                                <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                                <li><a href="#"><i class="zmdi zmdi-pinterest"></i></a></li>
                                                <li><a href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product Details Description & Review -->
                        <div class="tm-prodetails-desreview tm-padding-section-sm-top">
                            <ul class="nav tm-tabgroup2" id="prodetails" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="prodetails-area1-tab" data-toggle="tab" href="#prodetails-area1"
                                       role="tab" aria-controls="prodetails-area1" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="prodetails-area2-tab" data-toggle="tab" href="#prodetails-area2"
                                       role="tab" aria-controls="prodetails-area2" aria-selected="false">Reviews
                                        {{count($comments)}}</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="prodetails-content">
                                <div class="tab-pane fade show active" id="prodetails-area1" role="tabpanel"
                                     aria-labelledby="prodetails-area1-tab">
                                    <div class="tm-prodetails-description">
                                        <p>{{$product->product_details}}</p>
                                        <p>{{$product->product_description}}</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="prodetails-area2" role="tabpanel" aria-labelledby="prodetails-area2-tab">
                                    <div class="tm-prodetails-review">
                                        <h5 class="text-uppercase">{{count($comments)}} Review For {{$product->product_name}}</h5>
                                        <div class="tm-comment-wrapper mb-50">
                                            <!-- Comment Single -->
                                            @if(count($comments) > 0)
                                                @foreach($comments as $comment)
                                                    <div class="tm-comment">
                                                        <div class="tm-comment-content">
                                                            <h6 class="tm-comment-authorname"><a href="#">{{$comment->user->name}}</a></h6>
                                                            <span class="tm-comment-date">{{$comment->created_at}}</span>
                                                            <p>{{$comment->message}}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <h5 class="text-uppercase text-center">No Review Yet</h5>
                                            @endif

                                            <!--// Comment Single -->
                                        </div>
                                        @if(Auth::check())
                                            <input id="check_auth" value="1" hidden>
                                        @else
                                            <input id="check_auth" value="0" hidden>
                                        @endif
                                        @if($can_comment)
                                            <h5 class="text-uppercase">Add a review</h5>

                                                <div class="tm-form-inner">
                                                    <div class="tm-form-field tm-form-fieldhalf">
                                                        <input type="text" value="@if(Auth::check()) {{Auth::user()->name}} @endif" placeholder="@if(Auth::check()) {{Auth::user()->name}} @endif" required="required">
                                                        <input type="text" value="@if(Auth::check()) {{Auth::user()->id}} @endif"  hidden id="comment_id">
                                                    </div>
                                                    <div class="tm-form-field tm-form-fieldhalf">
                                                        <input type="Email" value="@if(Auth::check()) {{Auth::user()->email}} @endif" placeholder="@if(Auth::check()) {{Auth::user()->email}} @endif" required="required" id="comment_email">
                                                    </div>
                                                    <div class="tm-form-field">
                                                        <textarea name="product-review" cols="30" rows="5" placeholder="Your Review" id="message" required></textarea>
                                                    </div>
                                                    <div class="tm-form-field">
                                                        <button type="button" class="tm-button" onclick="addComment()">Submit</button>
                                                    </div>
                                                </div>

                                        @else
                                            <h5 class="text-uppercase text-center">Use our product and then you can leave a review for other users about it</h5>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--// Product Details Description & Review -->

                        <div class="tm-similliar-products tm-padding-section-sm-top">
                            <h3 class="small-title">Similar Products</h3>
                            <div class="tm-similliar-products-slider tm-slider-arrow tm-slider-arrow-hovervisible row">
                               @foreach($other_products as $other)
                                    <!-- Single Product -->
                                    <div class="col-12">
                                        <div class="tm-product">
                                            <div class="tm-product-image">
                                                <a class="tm-product-imagelink" href="{{route('shop.product-details',["name" => $other->product_name])}}">
                                                    <img src="{{asset('profile_picture/'.$other->main_image_name)}}" alt="product image">
                                                </a>
                                            </div>
                                            <div class="tm-product-content">
                                                <h5 class="tm-product-title"><a href="{{route('shop.product-details',["name" => $other->product_name])}}">{{$other->product_name}}</a></h5>
                                                <h6 class="tm-product-price">#{{$other->amount}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!--// Single Product -->
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3">
                        <div class="widgets sidebar-widgets3 sticky-sidebar">

                            <!-- Single Widget -->
                            <div class="single-widget widget-categories">
                                <h5 class="widget-title">Categories</h5>
                                <ul>
                                    @foreach($categories as $category)
                                         <li><a href="{{route('product.category', ["category" =>$category->keyword])}}">{{$category->keyword}}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <button type="button" class="btn btn-outline-info" data-target="#MyModal" data-toggle="modal" id="login_form" hidden>
    Modal</button>

    <div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#register">Register</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content mt-30">
                        <div class="tab-pane container active" id="login">
                            <form>
                                <h5 class=" text-center font-weight-bold">Kindly Signin To Continue</h5>
                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input name="email" type="email" class="form-control" id="login_email" required>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input name="password" type="password" class="form-control" id="login_password" required>
                                </div>
                                <div class="form-group">
                                    <a href="{{route('forgot-password')}}">Forgot your password?</a>
                                </div>
                                <button type="submit" class="btn btn-primary" onclick="logUserIn()">Login</button>
                            </form>

                        </div>
                        <div class="tab-pane container fade" id="register">
                            <h5 class=" text-center font-weight-bold">Kindly Register To Continue </h5>
                            <div class="form-group">
                                <label for="fullname">Fullname:</label>
                                <input name="fullname" type="text" class="form-control" id="register_fullname" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address:</label>
                                <input name="email" type="email" class="form-control" id="register_email" required>
                            </div>
                            <button type="button" class="btn btn-primary" id="register_button" onclick="registerUser()">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-outline-info" data-target="#shippingForm" data-toggle="modal" id="shipping_form" hidden>
        Modal</button>

    <div class="modal fade" id="shippingForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <form>
                                <h5 class=" text-center font-weight-bold">Kindly supply the address you want to ship to</h5>
                                <div class="form-group">
                                    <label for="comment">Shipping Address:</label>
                                    <textarea class="form-control" rows="3" id="address" name="address"></textarea>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="payWithPaystack()">Make Payment</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />
    <meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />
    <meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />
    <meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />

@endsection
@section('script_contents')
    <script type="text/javascript">
            function checkAuth(){
               var check_auth =  document.getElementById("check_auth").value
                if (check_auth ==1){
                    document.getElementById("shipping_form").click();
                }
                else {
                    document.getElementById("login_form").click();
                }
            }
            function logUserIn() {
                var email = document.getElementById("login_email").value;
                var password = document.getElementById("login_password").value;
                $.ajaxSetup({
                    headers: {
                        'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                    }
                });
                var data =  {
                    email : email,
                    password: password,
                    _token: '{!! csrf_token() !!}',
                }
                $.ajax({
                    url: "{{route('user.ajax.login') }}",
                    method: 'POST',
                    contentType:"application/json",
                    dataType: "json",
                    data: JSON.stringify(data),
                    cache: false,
                    success: function(status){
                        console.log(status.status);
                        if(status.status === true){
                           toastr.success('Authentication successful');
                          location.reload();
                        }
                        else{
                            toastr.error('Invalid login details');
                        }

                    },
                    failure: function (result) {
                        console.log(result);
                    }
                });
            }
            function registerUser() {
                var name = document.getElementById("register_fullname").value;
                var email = document.getElementById("register_email").value;
                if (email == "" || name==""){
                    toastr.error(' Email and Full name fields are required')
                }
                else{
                    $.ajaxSetup({
                        headers: {
                            'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                        }
                    });
                    var data =  {
                        email : email,
                        fullname: name,
                        _token: '{!! csrf_token() !!}',
                    }
                    $.ajax({
                        url: "{{route('user.ajax.register') }}",
                        method: 'POST',
                        contentType:"application/json",
                        dataType: "json",
                        data: JSON.stringify(data),
                        cache: false,
                        success: function(status){
                            console.log(status.status);
                            if(status.status === true){
                                toastr.success(status.msg);
                                location.reload();
                            }
                            else{
                                toastr.error(status.msg);;
                            }

                        },
                        failure: function (result) {
                            console.log(result);
                        }
                    });
                }

            }
            function payWithPaystack() {
                var address = document.getElementById("address").value;
                if (address == ''){
                    toastr.error("The address field must be filled");
                }
                else{
                    @if(Auth::check())
                         var email =  '{{Auth::user()->email}}';
                         var user_id =  '{{Auth::user()->id}}';
                    @endif
                    var amount  = '{{$product->amount}}';
                    var product_id  = '{{$product->id}}';
                    var handler = PaystackPop.setup({
                        key: 'pk_test_34eeea7ae9b3fd4d2e217f9d09d0076ce61e4342',
                        email: email,
                        amount: amount,
                        currency: "NGN",
                        ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                        metadata: {
                            custom_fields: [
                                {
                                    display_name: "E.M.O Ventures",
                                    variable_name: "{{$product->product_name}}",
                                    value: "+2348102780566"
                                }
                            ]
                        },
                        callback: function(response){
                            if(response.status === 'success'){
                                var ref = response.reference;
                                remitPayment(amount,product_id,user_id,ref,address);
                            }
                            else{
                                console.log("its here");
                                toastr.error(response.status);
                            }

                        },
                        onClose: function(){
                            alert('window closed');
                        }
                    });
                    handler.openIframe();
                }

            }
            function remitPayment(amount,product_id,user_id, ref, address) {
                $.ajaxSetup({
                    headers: {
                        'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                    }
                });
                var data =  {
                    amount : amount,
                    product_id: product_id,
                    user_id: user_id,
                    ref: ref,
                    address: address,
                    _token: '{!! csrf_token() !!}',
                }
                $.ajax({
                    url: "{{route('user.ajax.remitPayment') }}",
                    method: 'POST',
                    contentType:"application/json",
                    dataType: "json",
                    data: JSON.stringify(data),
                    cache: false,
                    success: function(status){
                        console.log(status.status);
                        if(status.status === true){
                            toastr.success(status.msg);
                            setTimeout(function () {
                                location.reload();
                            },1200);
                        }
                        else{
                            toastr.error(status.msg);
                            setTimeout(function () {
                                location.reload();
                            },1200);
                        }

                    },
                    failure: function (result) {
                        console.log(result);
                    }
                });
            }

            function addComment() {
                alert("its here");
                var user_id = document.getElementById("comment_id").value;
                var email = document.getElementById("comment_email").value;
                var message = document.getElementById("message").value;
                var product_id = "{{$product->id}}";
                if (message =="" || email ==""){
                    toastr.error('All fields must be filled')
                }
                else {
                    $.ajaxSetup({
                        headers: {
                            'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                        }
                    });
                    var data =  {
                        user_id : user_id,
                        email: email,
                        message: message,
                        product_id: product_id,
                        _token: '{!! csrf_token() !!}',
                    }
                    $.ajax({
                        url: "{{route('user.ajax.createComment') }}",
                        method: 'POST',
                        contentType:"application/json",
                        dataType: "json",
                        data: JSON.stringify(data),
                        cache: false,
                        success: function(status){
                            console.log(status.status);
                            if(status.status === true){
                                toastr.success(status.msg);
                                setTimeout(function () {
                                    location.reload();
                                },1200);
                            }
                            else{
                                toastr.error(status.msg);
                                setTimeout(function () {
                                    location.reload();
                                },1200);
                            }

                        },
                        failure: function (result) {
                            console.log(result);
                        }
                    });
                }
            }
    </script>
@endsection