<x-backend>
  <h1 class="h3 mb-4 text-gray-800"> Company </h1>
  @if(session('msg'))
 <h5 class="my-4 text-center text-danger">{{session('msg')}}</h5>
@endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Update Exiting Company Change Password
                <a href="{{route('companyprofile',$user->id)}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-backward mr-2"></i> Go Back </a>
            </h5>
        </div>
        <div class="card-body">

            <form method="post" action="{{route('companyupdatepassword',$user->id)}}" enctype="multipart/form-data" id="example-form">
                @csrf


                @php 
                $email = $user->email;
                @endphp
                <input type="hidden" name="currentpassword" value="{{$user->password}}">
                <div class="form-group offset-md-3 row mb-3">
                    <label class=" mb-1" for="email"> Email </label>
                    <div class="col-md-6">
                    <input class="form-control py-2 {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{$email}}" id="email" type="email" name="email" />
                    
                    <small class="text-danger"> (we need your email to confirm your changes) </small>

                    @if($errors->has('email'))
                        <span class="text-danger">{{$errors->first('email')}}</span>
                    @endif
                    </div>
                </div>
                                    
                <div class="form-group offset-md-3 row mb-3">   
                    <label class="mb-1" for="chpassword"> Change Password </label>
                    <div class="col-md-6">
                        <input class="form-control py-2 {{$errors->has('changepassword') ? 'is-invalid' : ''}}" id="chpassword" type="password" name="changepassword" value="{{old('changepassword')}}" />


                        @if($errors->has('changepassword'))
                            <span class="text-danger">{{$errors->first('changepassword')}}</span>
                        @endif
                    </div>
                </div>
            
                    
                <div class="form-group offset-md-3 row mb-3">
                    <label class="mb-1" for="cfpassword"> Confirm Password </label>
                    <div class="col-md-6">
                        <input class="form-control py-2 {{$errors->has('changepassword_confirmation') ? 'is-invalid' : ''}}" id="cfpassword" type="password" name="changepassword_confirmation" value="{{old('changepassword_confirmation')}}"/>

                        @if($errors->has('changepassword_confirmation'))
                            <span class="text-danger">{{$errors->first('changepassword_confirmation')}}</span>
                        @endif

                    </div>
                </div>

                <!-- <div class="form-group offset-md-3 row mb-3">
                    <label class="mb-1" for="crpassword"> Current Password </label>
                    <div class="col-md-6">
                        <input class="form-control py-4 {{$errors->has('currentpassword') ? 'is-invalid' : ''}}" id="crpassword" type="password" name="currentpassword" value="{{$user->password}}"/>

                        <small class="text-danger"> (we need your current password to confirm your changes) </small>

                        @if($errors->has('currentpassword'))
                            <span class="text-danger">{{$errors->first('currentpassword')}}</span>
                        @endif
                    </div>
                    
                </div> -->

                <div class="form-group hideForm d-flex align-items-center justify-content-between mt-4 mb-0 offset-md-3">
                    <button type="submit" class="btn btn-outline-primary"> Update </button>
                </div>
                
            </form>

        </div>
    </div>
    @section('script_content')
    <script type="text/javascript">
      
            $(document).ready(function(){
        $('.msg').hide(5000);
    })
    </script>
    @endsection
</x-backend>