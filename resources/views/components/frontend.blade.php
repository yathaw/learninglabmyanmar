<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Learning Lab Myanmar - Open Source Academy">
    <meta name="author" content="Myanmar IT Consulting">
    <meta name="keywords" content="Learning Lab, Learning Lab Myanmar, Myanmar IT Consulting, Open Source Academy">

    <link rel="shortcut icon" href="{{ asset('logo/favicon.ico') }}" />

    <title> Learning Lab Myanmar </title>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/color.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/font.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/style.css') }}">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('plugin/bootstrap5/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/venobox/venobox.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

    

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-transparent">
        <div class="container d-flex align-items-center">

            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="index.html" class="logo mr-auto text-decoration-none">
                <img src="{{ asset('logo/logo_transparent_500x500.png') }}" alt="" class="img-fluid">

                <img src="{{ asset('logo/logotext_color.png') }}" alt="" class="img-fluid">
            </a>

            {{-- <h1 class="logo mr-auto"><a href="index.html">Baker</a></h1> --}}


            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active">
                        <a href="">Home</a>
                    </li>

                    <li>
                        <a href=""> About </a>
                    </li>

                    <li>
                        <a href=""> How It Works </a>
                    </li>
                    
                    <li>
                        <a href="">Pricing</a>
                    </li>
                   
                    <li class="pt-2">
                        <a href="" class="cartIcon">  <i class='bx bx-cart bx-lg'></i> </a>
                    </li>

                    <li>
                        <a href="" class="btn btn-outline-light"> Login  </a>
                    </li>

                    <li>
                        <a href="" class="btn custom_primary_btnColor"> Signup  </a>
                    </li>

                   {{--  <li class="drop-down"><a href=""> Account </a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>

                            <div></div>
                            <li><a href="#"> Logout </a></li>
                        </ul>
                    </li> --}}

                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center justify-content-center">
        <div class="container position-relative">
            <h1 class="logoFont"> Learning Lab Myanmar </h1>
            <h2> Find the best Courses and Upgrade your skills. Learn Anytime, Anywhere, Accelerate your future </h2>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
    </section>
    <!-- End Hero -->


    <main id="main">

        {{ $slot }}
    
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <img src="{{ asset('logo/logo_transparent_500x500.png') }}" class="img-fluid mx-auto d-block" style="width: 100px; height: 100px;">

                        <img src="{{ asset('logo/logotext_color.png') }}" class="img-fluid mx-auto d-block" >
                        
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Home</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">How It works </a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#"> Find Instructors </a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a>
                            </li>
                          <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4> Contact </h4>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>

                        <div class="social-links">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        </div>
                    </div>

                  <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4> Apps </h4>
                    
                    <img src="frontend/img/android.png" class="img-fluid" style="height: 50px;">

                    <img src="frontend/img/appstore.png" class="img-fluid" style="height: 50px;">

                  </div>

                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="mr-md-auto text-center text-md-left">
                <div class="copyright">
                    &copy; Copyright <strong><span>Baker</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
              
                Designed by <a href="https://myanmaritc.com/" target="_blank">MMIT</a>
                </div>
            </div>
            
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

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

    <!-- Template Main JS File -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>

     @yield("script_content")


</body>

</html>