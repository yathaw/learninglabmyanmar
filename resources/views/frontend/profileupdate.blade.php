<x-frontend>
   <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2> My Profile Update </h2>
                <ol>
                    <li><a href="{{ route('frontend.index') }}">Home</a></li>
                    <li> My Profile Update </li>
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

                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <x-jet-validation-errors class="mb-4" />
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    
                    <form action="{{ route('profileupdate',$user->id) }}" method="post" role="form" class="registerForm" enctype="multipart/form-data">
                        @csrf

                        <div class="row form-group mt-4">
                            <div class="form-floating mb-3 col-md-6">
                                <input type="text" class="form-control form-control-sm" id="name" placeholder="Your Name" name="name" value="{{ $user->name }}" required autofocus autocomplete="name">
                                <label for="name" class="px-4"> Your Name </label>

                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <input type="number" class="form-control form-control-sm" id="phone" placeholder="Your Phoneno" name="phone" value="{{ $user->phone }}">
                                <label for="phone" class="px-4"> Your Phone Number </label>

                            </div>
                        </div>

                        <div class="row form-group mt-4">
                            <div class="form-floating mb-3 col-md-12">
                                <input type="email" class="form-control form-control-sm" id="email" placeholder="Name" value="{{ $user->email }}" name="email">
                                <label for="email" class="px-4"> Your Email </label>
                            </div>

                        </div>

                        <div class="row form-group">
                            
                            @if($user->profile_photo_path != NULL)
                              <div class="form-floating mb-3 col-md-6">
                                <input type="file" class="form-control-file px-4" id="file" name="photo">
                                
                            </div>
                              <div class="form-floating mb-3 col-md-6">
                                <img src="{{asset($user->profile_photo_path)}}" width="100" height="100">
                              </div>
                            @else
                              <div class="form-floating mb-3 col-md-12">
                                <input type="file" class="form-control-file px-4" id="file" name="photo">
                                
                            </div>
                            @endif

                        </div>

                        <div class="row form-group">
                          <div class="form-floating mb-3 col-md-6">
                              <img src="" id="preview">
                            </div>
                        </div>
                      
                        <div class="text-center my-4">
                            <button type="submit" id="notyf-show"> Update Account </button>
                        </div>
                    </form>

                </div>
            </div>
            
        </div>
    </section>

    @section('script_content')
    <script type="text/javascript">
      $(document).ready(function(){

      function readURL(input){
            // console.log(input.files);
            if (input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result).width('100').height('100');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#file").change(function() {
            readURL(this); 
        });
          })
    </script>
    @endsection
</x-frontend>