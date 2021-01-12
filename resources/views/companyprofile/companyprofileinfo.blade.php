<x-backend>
  <h1 class="h3 mb-4 text-gray-800"> Company Profile </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Company Profile Info
                
            </h5>
        </div>
        <div class="card-body">

            @if($errors->has('password'))
                <span class="text-danger">{{$errors->first('password')}}</span>
            @elseif(session('message'))
               <alert class="alert alert-success msg">{{session('message')}}</alert>
            @endif


            <div class="row">
                <div class="col-md-4 offset-1 d-flex">
                    @if($user->profile_photo_path != NULL && $user->profile_photo_path != "on")
                    <img src="{{asset($user->profile_photo_path)}}" class="img-fluid my-auto" width="250px" height="300px">
                    @else
                    <img src="{{asset('backend/img/avatars/default.jpeg')}}" class="img-fluid my-auto" width="250px" height="200px">
                    @endif
                
                    @if(Auth::user() && $user->id==Auth::user()->id)
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <a href="{{route('companyprofileedit',$user->id)}}" class="btn btn-outline-warning btn-block">Edit Profile</a>
                                <button class="btn btn-outline-secondary btn-block" data-target="#changepassword" data-toggle="modal">Change Password</button>
                        
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-md-6 offset-1">

                    <div class="row mb-2">
                        <div class="col-md-12">
                            <h2>{{$user->name}}</h2>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-4">Role:</label>
                        <div class="col-md-8">
                            Business
                        </div>
                    </div>

                    <div class="row mt-2">
                        <label class="col-sm-4">Email:</label>
                        <div class="col-md-8">
                            {{$user->email}}
                        </div>
                    </div>

                    <div class="row mt-2">
                        <label class="col-sm-4">Phone:</label>
                        <div class="col-md-8">
                            {{$user->phone}}
                        </div>
                    </div>

                    <div class="row mt-2">
                        <label class="col-sm-4">Company Name:</label>
                        <div class="col-md-8">
                            {{$user->company->name}}
                        </div>
                    </div>

                    <div class="row mt-2">
                        <label class="col-sm-4">Company Logo:</label>
                        <div class="col-md-8">
                            <img src="{{$user->company->logo}}" width="150px" height="150px">
                        </div>
                    </div>

                    <div class="row mt-2">
                        <label class="col-sm-4">Company Address:</label>
                        <div class="col-md-8">
                            {{$user->company->address}}
                        </div>
                    </div>
                    <div class="row mt-2">
                            <label class="col-sm-4">Company Description:</label>
                            <div class="col-md-8">
                                {!! $user->company->description !!}
                            </div>
                        </div>
                </div>

            </div>


        </div>
    </div>





<!-- change password modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="changepassword">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                 <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{route('companyprofilechangepassword',Auth::id())}}" method="post">
                @csrf
                
                <div class="modal-body m-3">
                    <div class="form-group row">
                        <div class="col-sm-12 input-group">
                            <input type="password" class="form-control" id="password" name="password" aria-describedby="basic-addon1">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-light circle" onclick="showpassword()"><i class="fas fa-eye"></i></button>
                            </div>
                        </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

            </form>

        </div>
    </div>
</div>
@section('script_content')
<script type="text/javascript">
  function showpassword()
    {
        var password = document.getElementById('password');
        if(password.type=="password"){
            password.type="text";
        }
        else{
            password.type="password";
        }
    }
</script>
@endsection

</x-backend>