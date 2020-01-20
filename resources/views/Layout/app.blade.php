<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title Of Site -->
    <title>EMO Physiotherapy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="apple-touch-icon" href="{{asset('_landing/assets/images/favicon.png')}}">
    <link rel="shortcut icon" href="{{asset('_landing/assets/images/favicon.ico')}}">

    <!-- Google Font (font-family: 'Open Sans', sans-serif;) -->
    <link href="../../../../../fonts.googleapis.com/css698e.css?family=Open+Sans:300,400,400i,600,700" rel="stylesheet">
    <!-- Google Font (font-family: 'Poppins', sans-serif;) -->
    <link href="../../../../../fonts.googleapis.com/cssd18e.css?family=Poppins:400,400i,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('_landing/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('_landing/assets/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('_landing/assets/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('_landing/assets/css/custom.css')}}">

    <!-- Fav and Touch Icons -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<body>
    <div id="wrapper" class="wrapper">
        <div class="header">
            @include('layout.inc.header')
        </div>
        @yield('slider')
        @yield('contents')
        <footer class="footer">
            @include('layout.inc.footer')
        </footer>

    </div>
<script src="{{asset('_landing/assets/js/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('_landing/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('_landing/assets/js/popper.min.js')}}"></script>
<script src="{{asset('_landing/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('_landing/assets/js/plugins.js')}}"></script>
<script src="{{asset('_landing/assets/js/main.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script type="text/javascript">
    @if(session('failure'))
    toastr.error('{{session("failure")}}');
    @endif
    @if(session('success'))
    toastr.success('{{session("success")}}');
    @endif
</script>
@yield('script_contents')
</body>
</html>
