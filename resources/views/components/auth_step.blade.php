<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Learning Lab Myanmar - Open Source Academy">
    <meta name="author" content="Myanmar IT Consulting">
    <meta name="keywords" content="Learning Lab, Learning Lab Myanmar, Myanmar IT Consulting, Open Source Academy">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="shortcut icon" href="{{ asset('logo/favicon.ico') }}" />

    <title> Learning Lab Myanmar </title>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/color.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/font.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/reg_step.css') }}">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('plugin/bootstrap5/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/venobox/venobox.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

    <!-- Quill -->
    <link href="{{ asset('plugin/quill/quill.snow.css') }}" rel="stylesheet">

    <!-- Select 2 -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/select2_bootstrap4/dist/select2-bootstrap4.min.css') }}">


</head>
<body style="background-color: #f7f7fc">

    {{ $slot }}
	

 <!-- Vendor JS Files -->
    <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugin/bootstrap5/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{ asset('frontend/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('plugin/jquery.steps.min.js') }}"></script>


    <!-- Template Main JS File -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('plugin/custom.js') }}"></script>

    <script src="{{ asset('plugin/pusher.min.js')}}"></script>
   <!--  <script src="https://js.pusher.com/7.0/pusher.min.js"></script> -->
    <script type="text/javascript" src="{{asset('frontend/js/notification.js')}}"></script>

    {{-- localstorage --}}
    <script src="{{ asset('plugin/localstorage.js') }}"></script>
    <script src="{{ asset('plugin/quill/quill.js') }}"></script>
    <!-- Select 2 -->
    <script src="{{asset('plugin/select2/dist/js/select2.min.js')}}"></script> 
    {{-- image picker --}}
    <script src="{{ asset('plugin/imagepicker/image-picker.min.js') }}"></script>



    

    
     @yield("script_content")


</body>

</html>