@extends('Layout.app')
@section('contents')
    <!-- Breadcrumb Area -->
    <div class="tm-breadcrumb-area tm-padding-section" data-bgimage="{{asset('_landing/assets/images/bg/breadcrumb-bg.jpg')}}"
         data-black-overlay="4">
        <div class="container">
            <div class="tm-breadcrumb text-center">
                <h2>Service Invoice</h2>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!--// Breadcrumb Area -->

    <!-- Main Content -->
    <main class="main-content">

        <!-- Shopping Cart Area -->
        <div class="tm-section shopping-cart-area bg-white tm-padding-section">
            <div class="container">

                <!-- Shopping Cart Table -->
                <div class="tm-cart-table table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                        <tr>
                            <th class="tm-cart-col-productname" scope="col">Name</th>
                            <th class="tm-cart-col-price" scope="col">Service</th>
                            <th class="tm-cart-col-quantity" scope="col">Start date</th>
                            <th class="tm-cart-col-total" scope="col">Payment Status</th>
                            <th class="tm-cart-col-remove" scope="col">Amount</th>
                            <th class="tm-cart-col-remove" scope="col">Appointment Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>

                                    {{$appointment->user->name}}
                            </td>
                            <td>
                                <a href="#" class="tm-cart-productname">
                                {{$appointment->service->keyword}}
                                    @if($appointment->accommodation_status==1)
                                        (WITH ACCOMMODATION)
                                    @else
                                        (No ACCOMMODATION)
                                    @endif
                                </a>
                            </td>
                            <td class="tm-cart-price">{{$appointment->start_date}}</td>
                            <td>
                                <div class="">
                                    @if($appointment->payment_status == 0)
                                        <span style="color:darkred" class="font-weight-bold">Pending</span>
                                    @else
                                        <span style="color:green" class="font-weight-bold">Completed</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <span class="tm-cart-totalprice"># {{$appointment->amount}}</span>
                            </td>
                            <td>
                                <span >
                                    @if($appointment->appointment_status == 1)
                                        Completed
                                    @else
                                        Active
                                    @endif
                                </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!--// Shopping Cart Table -->

                <!-- Shopping Cart Content -->
                <div class="tm-cart-bottomarea">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="tm-buttongroup">
                                <a href="{{route('appointment-invoice.download', ["id" => $appointment->id])}}" class="tm-button">Download invoice<b></b></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="tm-cart-pricebox">
                                <h2> Price break down</h2>
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                        <tr class="tm-cart-pricebox-subtotal">
                                            <td>Service Price</td>
                                            <td># {{$appointment->service->price}}</td>
                                        </tr>
                                        <tr class="tm-cart-pricebox-shipping">
                                            <td>Accommodation fee</td>
                                            <td># @if($appointment->accommodation_status == 1) 20000 @else 0 @endif</td>
                                        </tr>
                                        <tr class="tm-cart-pricebox-total">
                                            <td>Total Fee</td>
                                            <td> @if($appointment->accommodation_status == 1)  #{{20000 + $appointment->service->price }}@else # {{$appointment->service->price}} @endif</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @if($appointment->payment_status == 0)
                                <a href="#" class="tm-button" onclick="payWithPaystack()">Make Payment <b></b></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--// Shopping Cart Content -->
            </div>
        </div>
        <!--// Shopping Cart Area -->
    </main>
    <!--// Main Content -->
    <!-- Button trigger modal -->
    <meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />
@endsection
@section("script_contents")
    <script type="text/javascript">
        function payWithPaystack() {
                var email =  '{{Auth::user()->email}}';
                var user_id =  '{{Auth::user()->id}}';
                var amount  = '{{$appointment->amount}}';
                var service_id  = '{{$appointment->service_id}}';
                var start_date  = '{{$appointment->start_date}}';
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
                                variable_name: "{{$appointment->service->keyword}}",
                                value: "+2348102780566"
                            }
                        ]
                    },
                    callback: function(response){
                        if(response.status === 'success'){
                            var ref = response.reference;
                            remitPayment(amount,user_id,service_id,start_date);
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
        function remitPayment(amount,user_id, service_id,start_date) {
            $.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
            var data =  {
                amount : amount,
                service_id: service_id,
                user_id: user_id,
                start_date: start_date,
                _token: '{!! csrf_token() !!}',
            }
            $.ajax({
                url: "{{route('user.ajax.remitServicePayment') }}",
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
                           window.location.href = '{{route('user.dashboard')}}';
                        },1600);
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
    </script>
@endsection
