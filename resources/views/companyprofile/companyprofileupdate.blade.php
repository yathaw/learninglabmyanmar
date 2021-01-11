<x-backend>
  <h1 class="h3 mb-4 text-gray-800"> Company Profile </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Update Exiting Company Profile
                <a href="{{route('companyprofile',$user->id)}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-backward mr-2"></i> Go Back </a>
            </h5>
        </div>
        <div class="card-body">

            <form method="post" action="{{route('companyprofileupdate',$user->id)}}" enctype="multipart/form-data" id="example-form">
                @csrf
              
                <input type="hidden" name="oldphoto" value="{{$user->profile_photo_path}}">
                <input type="hidden" name="oldlogo" value="{{$user->company->logo}}">

                <div class="form-group row my-2">
                    <label for="inputprofile" class="col-sm-2 col-form-label">Profile</label>
                    <div class="col-sm-10">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Photo</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Photo</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <img src="{{asset($user->profile_photo_path)}}" class="img-fluid my-2" width="100px" height="100px">
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <input type="file" name="newphoto" class="form-control-file my-2">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="name" value="{{$user->name}}">
                    </div>
                </div>

                <div class="form-group row my-3">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" name="email" value="{{$user->email}}">

                        @if($errors->has('email'))
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row my-3">
                    <label for="companyname" class="col-sm-2 col-form-label">Company Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="companyname" name="companyname" value="{{$user->company->name}}">
                        
                        @if($errors->has('companyname'))
                            <span class="text-danger">{{$errors->first('companyname')}}</span>
                        @endif
                    </div>
                </div>


                <div class="form-group row my-3">
                    <label for="inputphone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputphone" name="phone" value="{{$user->phone}}">

                        @if($errors->has('phone'))
                            <span class="text-danger">{{$errors->first('phone')}}</span>
                        @endif
                    </div>
                </div>

                 <div class="form-group row my-5">
                    <label for="" class="col-sm-2 col-form-label">Company Logo</label>
                    <div class="col-sm-10">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-logo-tab" data-toggle="tab" href="#nav-logo" role="tab" aria-controls="nav-logo" aria-selected="true">Old Logo</a>
                                <a class="nav-item nav-link" id="nav-newlogo-tab" data-toggle="tab" href="#nav-newlogo" role="tab" aria-controls="nav-newlogo" aria-selected="false">New Logo</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-logo" role="tabpanel" aria-labelledby="nav-logo-tab">
                                <img src="{{asset($user->company->logo)}}" class="img-fluid my-2" width="100px" height="100px">
                            </div>
                            <div class="tab-pane fade" id="nav-newlogo" role="tabpanel" aria-labelledby="nav-newlogo-tab">
                                <input type="file" name="newlogo" class="form-control-file my-2">
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="form-group row my-3 pt-3">
                  <label for="life" class="col-sm-2 col-form-label">Your Career Life</label>
                  <div class="col-sm-10">
                    <select class="form-select select2" name="jobtitleid" id="companyId" data-placeholder="Select one carerr">
                      <option></option>
                      @foreach($jobtitles as $jobtitle)
                          <option value="{{$jobtitle->id}}" data-id="{{$jobtitle->id}}" <?php if($jobtitle->id == $user->jobtitle_id)echo "selected";?>>{{$jobtitle->name}}</option>
                      @endforeach

                    </select>
                  </div>
                </div>

                <div class="form-group row my-3">
                    <label for="address" class="col-sm-2 col-form-label">Company Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="address" name="address" value="{{$user->company->address}}">

                        @if($errors->has('address'))
                            <span class="text-danger">{{$errors->first('address')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row my-3">
                    <label for="description" class="col-sm-2 col-form-label">Company Description</label>
                    <div class="col-sm-10">
                        <div id="descriptionId">{!! $user->company->description !!}</div>
                        <textarea class="form-control d-none" id="description" name="description"></textarea>
                        @if($errors->has('description'))
                            <span class="text-danger">{{$errors->first('description')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
                
            </form>

        </div>
    </div>
    @section('script_content')
    <script type="text/javascript">
      var toolbarOptions = [
                [{ 'font': [] }],
                [{ 'header': [1, 2, 3, 4, 5, 6] }],
                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                ['link', 'image'],
                ['blockquote', 'code-block'],

                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent

                [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                

                [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                
                [{ 'align': [] }],


            ];


            var quill = new Quill('#descriptionId', {
                modules: {
                    toolbar: toolbarOptions
                  },
                theme: 'snow',

            });
            var quillData = quill.getContents();
            var quillText = quill.getText();
            var quillHtml = quill.root.innerHTML.trim();
            
                    
            $("#description").val(quillHtml);
    </script>
    @endsection
</x-backend>