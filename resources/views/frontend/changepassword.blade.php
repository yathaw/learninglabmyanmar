<x-frontend>
  <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2> Account Change Password</h2>
                <ol>
                    <li><a href="{{ route('frontend.index') }}">Home</a></li>
                    <li> Account Change Password</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->
    
    <section class="inner-page contact">
        <div class="container">
            <div class="section-title">
                  <h2> My Account Profile Update </h2>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    @if(session('msg'))
                        <h5 class="my-4 text-center text-danger">{{session('msg')}}</h5>
                    @endif

                    <form method="post" action="{{route('accountupdatepassword')}}" enctype="multipart/form-data" id="example-form">
                    @csrf

                    @php 
                    $email = $user->email;
                    @endphp

                    <input type="hidden" name="currentpassword" value="{{$user->password}}">
                    <input type="hidden" name="userid" value="{{$user->id}}">
                    
                        
                        <div class="row form-group mt-4">
                            <div class="form-floating mb-3 col-md-6 offset-3">
                                <input class="form-control form-control-sm {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{$email}}" id="email" type="email" name="email" />
                    
                                <small class="text-danger"> (we need your email to confirm your changes) </small>

                                @if($errors->has('email'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                                
                                <label for="email" class="px-4"> Your Email </label>

                            </div>

                            
                        </div>

                        <div class="row form-group mt-4">
                            <div class="form-floating mb-3 col-md-6 offset-3">
                                <input class="form-control py-2 {{$errors->has('changepassword') ? 'is-invalid' : ''}}" id="chpassword" type="password" name="changepassword" value="{{old('changepassword')}}" />


                                @if($errors->has('changepassword'))
                                    <span class="text-danger">{{$errors->first('changepassword')}}</span>
                                @endif
                                <label for="chpassword" class="px-4"> Change Password </label>
                            </div>

                        </div>

                        <div class="row form-group">
    
                            <div class="form-floating mb-3 col-md-6 offset-3">
                                <input class="form-control py-2 {{$errors->has('changepassword_confirmation') ? 'is-invalid' : ''}}" id="cfpassword" type="password" name="changepassword_confirmation" value="{{old('changepassword_confirmation')}}"/>

                                @if($errors->has('changepassword_confirmation'))
                                    <span class="text-danger">{{$errors->first('changepassword_confirmation')}}</span>
                                @endif
                                <label for="chpassword" class="px-4"> Confirm Password </label>
                            </div>

                        </div>
                      
                        <div class="form-group hideForm d-flex align-items-center justify-content-between mt-4 mb-0 offset-md-3">
                            <button type="submit" class="btn btn-outline-primary"> Update Password</button>
                        </div>
                    </form>

                </div>
            </div>
            
        </div>
    </section>
 
    @section('script_content')
    <script type="text/javascript">
      
            $(document).ready(function(){
        $('.msg').hide(5000);
    })
    </script>
    @endsection
</x-frontend>