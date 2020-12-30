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

    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/color.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/font.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/emoji.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/quiz.css') }}">
    <link href="{{ asset('frontend/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">

    <link href="{{ asset('plugin/bootstrap5/css/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body>
    <div class="quizContent">
        {{ $slot }}
    </div>


    <div class="d-flex flex-column justify-content-evenly">
        <footer class="demo_footer mt-auto mb-auto whiteless">
            <div class="container py-2 justify-content-center">

                <div class="mr-md-auto text-center text-md-left">
                    <div class="copyright text-center">
                        &copy; Copyright <strong><span> Learning Lab Myanmar </span></strong>. All Rights Reserved
                    </div>
                    <div class="credits text-center">
                  
                    Designed by <a href="https://myanmaritc.com/" class="whiteless text-decoration-underline" target="_blank">MMIT</a>
                    </div>
                </div>
                
            </div>
        </footer>
    </div>


    <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugin/bootstrap5/js/bootstrap.bundle.min.js') }}"></script>

    @yield("script_content")


</body>
</html>