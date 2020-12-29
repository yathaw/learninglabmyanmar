<x-backend>
  <h1 class="h3 mb-4 text-gray-800"> Instructor </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Update Exiting Instructor
                <a href="{{route('instructorprofile',$user->id)}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-backward mr-2"></i> Go Back </a>
            </h5>
        </div>
        <div class="card-body">

            <form method="post" action="{{route('instructorprofileupdate',$user->id)}}" enctype="multipart/form-data" id="example-form">
                @csrf
              
                <input type="hidden" name="oldphoto" value="{{$user->profile_photo_path}}">

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
                    <label for="headline" class="col-sm-2 col-form-label">Headline</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="headline" name="headline" value="{{$user->instructor->headline}}">
                        
                        @if($errors->has('headline'))
                            <span class="text-danger">{{$errors->first('headline')}}</span>
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
                    <label for="bio" class="col-sm-2 col-form-label">Bio</label>
                    <div class="col-sm-10">
                      <div id="descriptionId">{!! $user->instructor->bio !!}</div>
                        <textarea class="form-control d-none" id="bio" name="bio"></textarea>

                       
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
                    <label for="website" class="col-sm-2 col-form-label">Website</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="website" name="website" value="{{$user->instructor->website}}">

                        @if($errors->has('website'))
                            <span class="text-danger">{{$errors->first('website')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row my-3">
                    <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Twitter Link ( https://twitter.com/username  )" name="twitter" id="twitter" value="{{$user->instructor->twitter}}">
                    </div>
                </div>

                             
                <div class="row form-group my-3">
                  <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Facebook Link ( https://facebook.com/username )" name="facebook" id="facebook" value="{{$user->instructor->facebook}}">
                    </div>
                </div>
                                 
                                    
                <div class="row form-group  my-3">
                  <label for="linkedin" class="col-sm-2 col-form-label">LinkedIn</label>
                    <div class="col-sm-10">
                                            
                      <input type="text" class="form-control" placeholder="Linkedin Link ( https://linkedin.com/username )" name="linkedin" id="linkedin" value="{{$user->instructor->linkedin}}">
                    </div>
                </div>
          

                <div class="row form-group my-3">
                  <label for="youtube" class="col-sm-2 col-form-label">Youtube</label>
                    <div class="col-sm-10">
                                            
                      <input type="text" class="form-control" placeholder="Youtube Link ( https://youtube.com/username )" name="youtube" id="youtube" value="{{$user->instructor->youtube}}">
                      
                    </div>
                </div>

                <div class="row form-group my-3">
                  <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                  <div class="col-sm-10">
                                          
                    <input type="text" class="form-control" placeholder="Instagram Link ( https://instagram.com/username )" name="instagram" id="instagram" value="{{$user->instructor->instagram}}">
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
            
                    
            $("#bio").val(quillHtml);
    </script>
    @endsection
</x-backend>