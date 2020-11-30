<x-frontend>


    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2> Sign In </h2>
                <ol>
                    <li><a href="{{ route('frontend.index') }}">Home</a></li>
                    <li> Login </li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page contact">
        <div class="container">
            <div class="section-title">
                  <h2> Login In to your account! </h2>
                  <p> Welcome Back </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">

                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <x-jet-validation-errors class="mb-4" />
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    
                    <form action="{{ route('login') }}" method="post" role="form" class="registerForm">
                        @csrf


                        <div class="form-floating mb-3 col-md-12">
                            <input type="email" class="form-control form-control-sm" id="email" placeholder="Name" value="{{ old('email') }}" name="email" autofocus>
                            <label for="email"> Your Email </label>
                        </div>

                        <div class="row form-group">
                            <div class="form-floating mb-3 col-md-12">
                                <input type="password" class="form-control form-control-sm" id="password" placeholder="Passowrd" name="password" required autocomplete="new-password">
                                <label for="password" class="px-4"> Password </label>

                            </div>
                        </div>

                        <div class="block mb-4">
                            <label for="remember_me" class="flex items-center">
                                <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        
                        <a href="" class="text-muted"> Forgot your Passowrd ? </a>
                        
                      
                        <div class="text-center my-4">
                            <button type="submit"> Login </button>

                            <a href="{{ route('register') }}" class="d-block mt-3"> Don't have an account? Sign Up </a>
                        </div>
                    </form>

                </div>
            </div>
            
        </div>
    </section>






</x-frontend>