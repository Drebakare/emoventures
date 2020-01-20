<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title Of Site -->
    <title>EMO Physiotherapy|Admin</title>
    <meta charset="UTF-8">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="../../../fonts.googleapis.com/cssf1e9.css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('_admin/vendor/bootstrap/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('_admin/vendor/animate/animate.css')}}">

    <link rel="stylesheet" href="{{asset('_admin/vendor/font-awesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('_admin/vendor/magnific-popup/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('_admin/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" />

   	<link rel="stylesheet" href="{{asset('_admin/vendor/owl.carousel/assets/owl.carousel.css')}}" />
    <link rel="stylesheet" href="{{asset('_admin/vendor/owl.carousel/assets/owl.theme.default.css')}}" />
    <link rel="stylesheet" href="{{asset('_admin/vendor/select2/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('_admin/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('_admin/vendor/datatables/media/css/dataTables.bootstrap4.css')}}" />
    <link rel="stylesheet" href="{{asset('_admin/vendor/pnotify/pnotify.custom.css')}}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('_admin/css/theme.css')}}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{asset('_admin/css/custom.css')}}">

    <!-- Head Libs -->
    <script src="{{asset('_admin/vendor/modernizr/modernizr.js')}}"></script>
    <script src="{{asset('_admin/master/style-switcher/style.switcher.localstorage.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<body>
    <section class="body">
        <header class="header">
            @include('layout.admin_inc.header')
        </header>
        <div class="inner-wrapper">
            <aside id="sidebar-left" class="sidebar-left">
                @include('layout.admin_inc.sidebar')
            </aside>
            @yield('contents')
        </div>
        <aside class="sidebar-right" id="sidebar-right">
            @include('layout.admin_inc.aside')
        </aside>
    </section>

@yield('script_contents')

<script src="{{asset('_admin/vendor/jquery/jquery.js')}}"></script>
<script src="{{asset('_admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
<script src="{{asset('_admin/vendor/jquery-cookie/jquery.cookie.js')}}"></script>
<script src="{{asset('_admin/master/style-switcher/style.switcher.js')}}"></script>
<script src="{{asset('_admin/vendor/popper/umd/popper.min.js')}}"></script>
<script src="{{asset('_admin/vendor/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('_admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('_admin/vendor/common/common.js')}}"></script>
<script src="{{asset('_admin/vendor/nanoscroller/nanoscroller.js')}}"></script>
<script src="{{asset('_admin/vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('_admin/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>

<!-- Specific Page Vendor -->
<script src="{{asset('_admin/vendor/jquery-appear/jquery.appear.js')}}"></script>
<script src="{{asset('_admin/vendor/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{asset('_admin/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js')}}"></script>
<script src="{{asset('_admin/vendor/owl.carousel/owl.carousel.js')}}"></script>
<script src="{{asset('_admin/vendor/isotope/isotope.js')}}"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{asset('_admin/js/theme.js')}}"></script>

<!-- Theme Custom -->
<script src="{{asset('_admin/js/custom.js')}}"></script>

<!-- Theme Initialization Files -->
<script src="{{asset('_admin/js/theme.init.js')}}"></script>
<!-- Analytics to Track Preview Website -->
<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)		  })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');		  ga('create', 'UA-42715764-8', 'auto');		  ga('send', 'pageview');		</script>
<!-- Examples -->
<script src="{{asset('_admin/js/examples/examples.landing.dashboard.js')}}"></script>
    <script src="{{asset('_admin/vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('_admin/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('_admin/vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('_admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('_admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('_admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('_admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('_admin/vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js')}}"></script>
    <script src="{{asset('_admin/vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js')}}"></script>
    <script src="{{asset('_admin/vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js')}}"></script>
    <script src="{{asset('_admin/js/examples/examples.datatables.default.js')}}"></script>
    <script src="{{asset('_admin/js/examples/examples.datatables.row.with.details.js')}}"></script>
    <script src="{{asset('_admin/js/examples/examples.datatables.tabletools.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{asset('_admin/vendor/pnotify/pnotify.custom.js')}}"></script>
    <script type="text/javascript">
        @if(session('failure'))
        toastr.error('{{session("failure")}}');
        @endif
        @if(session('success'))
        toastr.success('{{session("success")}}');
        @endif
    </script>
</body>
</html>
