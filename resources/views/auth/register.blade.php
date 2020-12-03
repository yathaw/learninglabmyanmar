<x-frontend>


    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2> Sign Up </h2>
                <ol>
                    <li><a href="{{ route('frontend.index') }}">Home</a></li>
                    <li> Register </li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page contact">
        <div class="container">
            <div class="section-title">
                  <h2> Sign Up </h2>
                  <p> Register Form </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">

                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <x-jet-validation-errors class="mb-4" />
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    
                    <form action="{{ route('register') }}" method="post" role="form" class="registerForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-group">
                            <label> Which Type of user are you ? </label>

                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <label class="rad-label" data-toggle="tooltip" data-placement="top" title="Start Learning!">
                                    <input type="radio" class="rad-input" name="role"  value="Student">
                                    <div class="rad-design"></div>
                                    <div class="rad-text"> Student </div>
                                </label>
                            </div>
                            
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12" data-description="You are Teacher">
                                <label class="rad-label" data-toggle="tooltip" data-placement="top" title="Become an Instructor!">
                                    <input type="radio" class="rad-input" name="role" value="Instructor">
                                    <div class="rad-design"></div>
                                    <div class="rad-text"> Instructor </div>
                                </label>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12" data-description="You are Business with us">
                                <label class="rad-label" data-toggle="tooltip" data-placement="top" title="Your Organizations access to their description for employee learning">
                                    <input type="radio" class="rad-input" name="role" value="Company">
                                    <div class="rad-design"></div>
                                    <div class="rad-text"> For Business </div>
                                </label>
                            </div>
                        </div>

                        <div class="row form-group mt-4">
                            <div class="form-floating mb-3 col-md-6">
                                <input type="text" class="form-control form-control-sm" id="name" placeholder="Your Name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                                <label for="name" class="px-4"> Your Name </label>

                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <input type="number" class="form-control form-control-sm" id="phone" placeholder="Your Phoneno" name="phone" value="{{ old('phone') }}">
                                <label for="phone" class="px-4"> Your Phone Number </label>

                            </div>
                        </div>

                        <div class="row form-group mt-4">
                            <div class="form-floating mb-3 col-md-6">
                                <input type="email" class="form-control form-control-sm" id="email" placeholder="Name" value="{{ old('email') }}" name="email">
                                <label for="email"> Your Email </label>
                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <input type="file" class="form-control form-control-sm" id="photo" name="photo" value="{{old('photo')}}">
                               <!--  <label for="photo">photo</label> -->
                             </div>

                        </div>

                        <div class="row form-group">
                            <div class="form-floating mb-3 col-md-6">
                                <input type="password" class="form-control form-control-sm" id="password" placeholder="Passowrd" name="password" required autocomplete="new-password">
                                <label for="password" class="px-4"> Password </label>

                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <input type="password" class="form-control form-control-sm" id="cpassowrd" placeholder="Confirm Passsword"name="password_confirmation" required autocomplete="new-password">
                                <label for="cpassowrd" class="px-4"> Confirm Passsword </label>

                            </div>
                        </div>

                        <div class="block mb-4">
                            <label for="remember_me" class="flex items-center">
                                <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                                <span class="ml-2 text-sm text-gray-600"> I agree all statements in Terms of service </span>
                            </label>
                        </div>

                        
                      
                        <div class="text-center my-4">
                            <button type="submit"> Create Account </button>

                            <a href="{{ route('login') }}" class="d-block mt-3"> Already have an account? Login </a>
                        </div>
                    </form>

                </div>
            </div>
            
        </div>
    </section>






</x-frontend>