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
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- sort --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/sortable/jquery-ui.css') }}">
    
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <!-- Template Main CSS File -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

    <!-- Select 2 -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/select2_bootstrap4/dist/select2-bootstrap4.min.css') }}">
    <!-- Quill -->
    <link href="{{ asset('plugin/quill/quill.snow.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/timeline.css') }}">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top {{ Request::segment(1) === NULL ? 'header-transparent' : '' }} ">
        <div class="container d-flex align-items-center">

            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="{{ route('frontend.index') }}" class="logo mr-auto text-decoration-none">
                <img src="{{ asset('logo/logo_transparent_500x500.png') }}" alt="" class="img-fluid">

                <img src="{{ asset('logo/logotext_color.png') }}" alt="" class="img-fluid">
            </a>

            {{-- <h1 class="logo mr-auto"><a href="index.html">Baker</a></h1> --}}


            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="{{ Request::segment(1) === NULL ? 'active' : '' }}">
                        <a href="{{ route('frontend.index') }}">Home</a>
                    </li>

                   {{--  <li class="drop-down {{ Request::segment(1) === 'courses' ? 'active' : '' }}"><a href="{{ route('courses') }}"> Category </a>
                        <ul>

                            <li><a href="#"> Category 1</a></li>
                            <li class="drop-down"><a href="#">Category  2</a>
                                <ul>
                                    <li><a href="#">Sub-category 1</a></li>
                                    <li><a href="#">Sub-category 2</a></li>
                                    <li><a href="#">Sub-category 3</a></li>
                                    <li><a href="#">Sub-category 4</a></li>
                                    <li><a href="#">Sub-category 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Category 3</a></li>
                            <li><a href="#">Category 4</a></li>
                            <li><a href="#">Category 5</a></li>
                        </ul>
                    </li> --}}



                    <li class="drop-down {{ Request::segment(1) === 'courses' ? 'active' : '' }}"><a href="{{ route('courses') }}"> Category </a>
                        <ul>
                            @foreach($categories as $category)
                                @if($category->subcategories)
                                <li class="drop-down"><a href="{{ route('cours/catégorie',$category->id) }}"> {{$category->name}}</a> 
                                    <ul>
                                        @foreach($category->subcategories as $subcategory)
                                            <li><a href="{{ route('cours/sous-catégorie',$subcategory->id) }}"> {{ $subcategory->name }} </a></li> 
                                        @endforeach
                                    </ul>
                                </li> 
                                @else
                                <li><a href="#"> {{$category->name}}</a> </li>
                                @endif 
                            @endforeach
                        </ul>
                    </li>



                    {{-- <li class="{{ Request::segment(1) === 'instructors' ? 'active' : '' }}">
                        <a href="{{ route('instructors') }}"> Find Instrutors </a>
                    </li> --}}

                    <li class="{{ Request::segment(1) === 'steps' ? 'active' : '' }}">
                        <a href="{{ route('timeline') }}"> How It Works </a>
                    </li>
                    
                    <li class="{{ Request::segment(1) === 'pricing' ? 'active' : '' }}">
                        <a href="{{ route('pricing') }}">Pricing</a>
                    </li>
                   
                    <li class="pt-2 {{ Request::segment(1) === 'cart' ? 'active' : '' }}">
                        <a href="{{ route('cart') }}" class="cartIcon">  
                            <i class='bx bx-cart bx-lg'></i>
                            <input type="hidden" name="user_id" class="user_id" data-user_id = "{{Auth::id()}}">
                            <span class="cartNoti count"> 0 </span>
                        </a>
                    </li>
                    @if (Route::has('login'))
                    
                    @auth

                    <li class="drop-down mr-5"><a href=""> Account </a>
                        <ul>
                            <li><a href="{{route('profile',Auth::id())}}"> My Profile </a></li>
                            <li><a href="{{ route('mystudyings') }}"> My Studying </a></li>
                            <li><a href="{{ route('wishlist') }}"> Wishlist </a></li>
                            <li><a href="{{ route('collection') }}"> Collection </a></li>
                            <li><a href="{{ route('purchase_history') }}"> Purchase History </a></li>


                            <li class="nav-icon"><a href="#" >  Notification <span class="badge rounded-pill bg-danger float-right"> 0 </span> </a></li>

                            @role('Instructor')
                            <li><a href="{{ route('panel') }}"> Instructor Dashboard </a></li>
                            @endrole
                            @role('Student')
                            <li><a href="#"> Teaching Mode On </a></li>
                            @endrole

                            <li><hr class="dropdown-divider"></li>
                            
                            <li><a href="#"> Cart History </a></li>

                            <li><a href="{{route('accountchangepassword',Auth::id())}}"> Change Password</a></li>
                            

                            <li><hr class="dropdown-divider"></li>
                           <!--  <li><a href="{{route('logout')}}"> Logout </a></li> -->
                             <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-jet-dropdown-link>
                        </form>
                        </ul>
                    </li>
                    @else
                    <li class="{{ Request::segment(1) === 'login' ? 'active' : '' }}">
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm"> Login  </a>
                    </li>

                    <li class="{{ Request::segment(1) === 'register' ? 'active' : '' }}">
                        <a href="{{ route('register') }}" class="btn custom_primary_btnColor btn-sm"> Signup  </a>
                    </li>
                    @endauth
                    @endif

                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header>
    <!-- End Header -->
    @if(Request::segment(1) === NULL)

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center justify-content-center">
        <div class="container position-relative">
            <h1 class="logoFont"> Learning Lab Myanmar </h1>
            <h2> Find the best Courses and Upgrade your skills. Learn Anytime, Anywhere, Accelerate your future </h2>
            @auth
                <a href="{{ route('courses') }}" class="btn-get-started scrollto"> Start Course </a>

            @else
                <a href="{{ route('register') }}" class="btn-get-started scrollto"> Register Now </a>
            @endauth
        </div>
    </section>
    <!-- End Hero -->
    @endif


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
                                <i class="bx bx-chevron-right"></i> <a href="{{ route('frontend.index') }}">Home</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">How It works </a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="{{ route('instructors') }}"> Find Instructors </a>
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
                    
                    <img src="{{ asset('frontend/img/android.png') }}" class="img-fluid" style="height: 50px;">

                    <img src="{{ asset('frontend/img/appstore.png') }}" class="img-fluid" style="height: 50px;">

                  </div>

                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">

            <div class="mr-md-auto text-center text-md-left">
                <div class="copyright">
                    &copy; Copyright <strong><span> Learning Lab Myanmar </span></strong>. All Rights Reserved
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

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('plugin/custom.js') }}"></script>

    <script src="{{ asset('plugin/pusher.min.js')}}"></script>
   <!--  <script src="https://js.pusher.com/7.0/pusher.min.js"></script> -->
    <script type="text/javascript" src="{{asset('frontend/js/notification.js')}}"></script>
     <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <!-- <script src="{{asset('plugin/scripts/script-test.js')}}" type="text/javascript"></script>
      <script src="{{asset('plugin/scripts/script-demo.js')}}" type="text/javascript"></script> -->
     
    {{-- localstorage --}}
    <script src="{{ asset('plugin/localstorage.js') }}"></script>
    <script src="{{ asset('plugin/quill/quill.js') }}"></script>

    <!-- Select 2 -->
    <script src="{{asset('plugin/select2/dist/js/select2.min.js')}}"></script>

    {{-- sort --}}
    <script src="{{ asset('plugin/sortable/jquery-ui.min.js') }}"></script>

     @yield("script_content")

     <script type="text/javascript">
         //var da = "<?php echo Session::get('name') ?>";
           // console.log(da);
           /*var da = "A";
            var message = da || getMessage();
        var type = "success";
        var duration = 2500;
        var ripple = "With ripple";
        var dismissible = "Dismissible";
        var positionX = "right";
        var positionY = "top";
        window.notyf.open({
          type,
          message,
          duration,
          ripple,
          dismissible,
          position: {
            x: positionX,
            y: positionY
          }
      })*/
     </script>
      
</body>

</html>