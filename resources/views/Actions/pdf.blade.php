{{--
<h3 align="center">E.M.O PHYSIOTHERAPY</h3>
<h4 align="center">Service Invoice</h4>
<table width="100%" style="border-collapse: collapse; border: 0px;">
    <tr>
        <th style="border: 1px solid; padding: 12px; width: 15%">Name</th>
        <th style="border: 1px solid; padding: 12px; width: 25%">Service</th>
        <th style="border: 1px solid; padding: 12px; width: 15%">Start Date</th>
        <th style="border: 1px solid; padding: 12px; width: 15%">Payment Status</th>
        <th style="border: 1px solid; padding: 12px; width: 15%">Amount</th>
        <th style="border: 1px solid; padding: 12px; width: 15%">Appointment Status</th>
    </tr>
    <tr>
        <td style="border: 1px solid; padding: 12px; width: 15%">{{$appointment->user->name}}</td>
        <td style="border: 1px solid; padding: 12px; width: 25%">
            {{$appointment->service->keyword}}
            @if($appointment->accommodation_status==1)
                (WITH ACCOMMODATION)
            @else
                (No ACCOMMODATION)
            @endif
        </td>
        <td style="border: 1px solid; padding: 12px; width: 15%">{{$appointment->start_date}}</td>
        <td style="border: 1px solid; padding: 12px; width: 15%">
            @if($appointment->payment_status == 0)
                Pending
            @else
               Completed
            @endif
        </td>
        <td style="border: 1px solid; padding: 12px; width: 15%">{{$appointment->amount}}</td>
        <td style="border: 1px solid; padding: 12px; width: 15%">
            @if($appointment->appointment_status == 0)
                Pending
            @else
                Completed
            @endif
        </td>
    </tr>
</table>
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
    </div>
</div>--}}

        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - E.M.O Physiotherapy</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <h3>{{$appointment->user->name}}</h3>
                <pre>
80 Ondo road Off Mayfair
round about Ile-Ife Osun state,
Nigeria.
<br /><br />
Date: {{$appointment->created_at}}
Identifier: {{$appointment->user->name}}
Status: @if($appointment->payment_status == 0)
            Pending
        @else
            Paid
        @endif
</pre>


            </td>
            <td align="center">
                <h4 style="color: white;">E.M.O Physiotherapy</h4>
            </td>
            <td align="right" style="width: 40%;">

                <h3>E.M.O Physiotherapy</h3>
                <pre>
                    80 Ondo road Off Mayfair
                    round about Ile-Ife Osun state,
                    Nigeria.
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h3>Invoice specification </h3>
    <table width="100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Service</th>
            <th>Start Date</th>
            <th>Payment Status</th>
            <th>Amount</th>
            <th>Appointment Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$appointment->user->name}}</td>
            <td>
                {{$appointment->service->keyword}}
                @if($appointment->accommodation_status==1)
                    (WITH ACCOMMODATION)
                @else
                    (No ACCOMMODATION)
                @endif
            </td>
            <td >{{$appointment->start_date}}</td>
            <td >
                @if($appointment->payment_status == 0)
                    Pending
                @else
                    Completed
                @endif
            </td>
            <td >{{$appointment->amount}}</td>
            <td >
                @if($appointment->appointment_status == 0)
                    Pending
                @else
                    Completed
                @endif
            </td>

        </tr>
        {{--<tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>--}}
        </tbody>
    </table>
</div>
<div class="invoice">
    <h3>Payment Break Down </h3>
    <table width="40%">
        <thead>
        <tr>
            <th>Material</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Service Price</td>
            <td >{{$appointment->amount}}</td>
        </tr>
        <tr>
            <td>Accommodation Fee</td>
            <td ># @if($appointment->accommodation_status == 1) 20000 @else 0 @endif</td>
        </tr>
        <tr>
            <td>Total Fee</td>
            <td>@if($appointment->accommodation_status == 1)
                    #{{20000 + $appointment->service->price }}
                @else
                    # {{$appointment->service->price}}
                @endif
            </td>
        </tr>
        </tbody>
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                Pain makes people change
            </td>
        </tr>

    </table>
</div>
</body>
</html>