<x-backend>
  <h1 class="h3 mb-4 text-gray-800"> Instructor </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Instructor Info
                
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
                    <img src="{{asset($user->profile_photo_path)}}" class="img-fluid my-auto" width="250px" height="300px">
                
                    @if(Auth::user() && $user->id==Auth::user()->id)
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <a href="{{route('instructorprofileedit',$user->id)}}" class="btn btn-outline-warning btn-block">Edit Profile</a>
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
                            Instructor
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
                        <label class="col-sm-4">Headline:</label>
                        <div class="col-md-8">
                            {{$user->instructor->headline}}
                        </div>
                    </div>

                    <div class="row mt-2">
                        <label class="col-sm-4">Bio:</label>
                        <div class="col-md-8">
                            {!! $user->instructor->bio !!}
                        </div>
                    </div>

                    <div class="row mt-2">
                        <label class="col-sm-4">Website:</label>
                        <div class="col-md-8">
                            {{$user->instructor->website}}
                        </div>
                    </div>
                    <div class="row mt-2">
                            <label class="col-sm-4">Education:</label>
                            <div class="col-md-8">
                                @php 
                               
                                $education1=trim($user->instructor->education,'/\(([^()]*+|(?R))*\)\s*/"');
                                $education = explode(',',$education1);
                                
                                @endphp
                                {{$education[0].'-'.trim($education[1],'"').' ('.trim($education[2],'"').')'}}
                            </div>
                        </div>
                </div>

                <div class="col-10 offset-1 mt-4">
                    
                    <div class="row mt-2">
                        <label class="col-sm-4">Twitter:</label>
                        <div class="col-md-8">
                          @if($user->instructor->twitter)
                            {{$user->instructor->twitter}}
                          @else
                           ---
                          @endif
                        </div>
                    </div>

                    <div class="row mt-2">
                        <label class="col-sm-4">Facebook:</label>
                        <div class="col-md-8">
                          @if($user->instructor->facebook)
                            {{$user->instructor->facebook}}
                            @else
                            ---
                            @endif
                        </div>
                    </div>

                        <div class="row mt-2">
                            <label class="col-sm-4">LinkedIn:</label>
                            <div class="col-md-8">
                              @if($user->instructor->linkedin)
                                {{$user->instructor->linkedin}}
                                @else
                                ---
                                @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label class="col-sm-4">Youtube:</label>
                            <div class="col-md-8">
                              @if($user->instructor->youtube)
                                {{$user->instructor->youtube}}
                                @else
                                ---
                                @endif
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label class="col-sm-4">Instragram:</label>
                            <div class="col-md-8">
                              @if($user->instructor->instagram)
                                {{$user->instructor->instagram}}
                                @else
                                ---
                                @endif
                            </div>
                        </div>
                


                </div>

            </div>


        </div>
    </div>





<!-- change password modal -->

<div class="modal" tabindex="-1" role="dialog" id="changepassword">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" method="post">
                @csrf
                
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-10 offset-1 input-group">
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

</x-backend>