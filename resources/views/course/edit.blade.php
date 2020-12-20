<x-backend>
   <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong> Edit Course </strong> </h3>
        </div>
        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('panel') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('backside.category.index') }}">List</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Edit </li>
                </ol>
            </nav>
        </div>
   </div>

   @php
        $outlines = json_decode($course->outline,true);
        $outline_count = count($outlines);

        $requirements = json_decode( $course->requirements, true);
        $requirement_count = count($requirements);

    @endphp


   <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="wizard-content">
                        <form id="example-form" action="{{ route('backside.course.update',$course->id) }}" class="tab-wizard wizard-circle wizard clearfix g-3" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h6>Course  Landing </h6>
                            <section>
                                <div class="row form-group mb-4">
                                    <div class="col-md-12">
                                        <label for="titleId" class="form-label"> Course Title </label>
                                        <input type="text" class="form-control form-control-lg" id="titleId" placeholder="E.g Learn Digital Marketing" name="title" value="{{$course->title}}">
                                    </div>
                                </div>
                                <div class="row form-group my-4">
                                    <div class="col-md-12">
                                        <label for="subtitleId" class="form-label"> Course Subtitle </label>
                                        <input type="text" class="form-control form-control-lg" id="subtitleId" placeholder="Insert Your Course Subtitle" name="subtitle" value="{{$course->subtitle}}">
                                    </div>
                                </div>
                                <div class="row form-group my-4">
                                    <div class="col-md-6">
                                        <label for="titleId" class="form-label"> Choose Category </label>
                                        <select class="form-select select2" name="subcategoryid">
                                            @foreach($categories as $category)
                                                <optgroup class="text-info" label="{{ $category->name }}">
                                                    @foreach($category->subcategories as $subcategory)
                                                        <option value="{{$subcategory->id}}" @if($subcategory->id == $course->subcategory_id) {{'selected'}} @endif >{{$subcategory->name}}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="titleId" class="form-label"> Choose Level </label>
                                        <select class="form-select select2" name="level">
                                            @foreach($levels as $level)
                                                <option value="{{$level->id}}" @if($level->id == $course->level_id) {{'selected'}} @endif>{{$level->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                @php
                                    $authRole = Auth::user()->getRoleNames()[0];
                                @endphp
                                @if($authRole=="Admin" || $authRole=="Developer")
                                    @if(isset($company))
                                    <div class="row form-group my-4">

                                        <div class="col-md-12" >
                                            <label for="companyId" class="form-label"> Choose Company </label>

                                            
                                            <select class="form-select select2" name="subcategoryid" id="companyId" data-placeholder="Select one company" disabled="">
                                                <option> {{ $company->name }} </option>
                                                

                                            </select>
                                        </div>
                                    </div>
                                    @endif

                                @endif

                                @if($authRole=="Admin" || $authRole=="Developer" || $authRole == "Business")

                                @if(isset($instructors))
                                    <div class="row form-group my-4">

                                        <div class="col-md-12">
                                            <label for="companyInstructor" class="form-label"> Select Instructors </label>

                                            <select name="teachers[]" class="form-select select2" id="companyInstructor" multiple="multiple">
                                                @foreach($instructors as $user_instructor)
                                                    <option value="{{$user_instructor->instructor->id}}" @foreach($course->instructors as $course_instructor) <?php if($course_instructor->id==$user_instructor->instructor->id) { ?> selected <?php }; ?>  @endforeach>{{$user_instructor->name}}</option>
                                                @endforeach                 
                                            </select> 
                                        </div>
                                    </div>
                                @endif
                                @endif

                                {{-- 
                                <div class="row form-group my-4">
                                   <div class="col-md-12">
                                      <label for="instructorId" class="form-label"> Select Instructors </label>
                                      <select name="teachers[]" class="form-select select2 teacher" id="inputTeacher" multiple="multiple">
                                         @foreach($instructors as $instructor)
                                         <option value="{{$instructor->id}}">{{$instructor->name}}</option>
                                         @endforeach
                                      </select>
                                   </div>
                                </div>
                                --}}
                                <div class="row form-group my-4 vh-50">
                                    <div class="col-md-12">
                                        <label for="descriptionId" class="form-label"> Course Description </label>
                                        <div id="descriptionId"></div>
                                        <textarea class="form-control d-none" id="hiddenArea" name="description"></textarea>
                                    </div>
                                </div>
                            </section>
                             
                            <h6> What will Learn </h6>
                            <section>
                                <div class="row form-group mb-4">
                                    <div class="col-md-12">
                                        <label for="situationId" class="form-label"> What will students learn in your course? </label>
                                        <input type="text" class="form-control form-control-lg my-4" id="situationId" placeholder="E.g Learn Digital Marketing" name="situations[]" value="{{ $outlines[0] }}">
                                        <div class="situation_morewrapperField"></div>
                                        <button class="btn btn-light text-success add_situations">  
                                            <i class="align-middle mr-2" data-feather="plus"></i> Add Answer 
                                        </button>
                                    </div>
                                </div>
                            </section>
                            </section>
                            
                            <h6> Requirement For Students </h6>
                            <section>
                                <div class="row form-group mb-4">
                                   <div class="col-md-12">
                                      <label for="requirementId" class="form-label"> Are there any course requirements or prerequisites? </label>
                                      <input type="text" class="form-control form-control-lg my-4" id="requirementId" placeholder="E.g Be able to read english 4 skills" name="requirements[]" value="{{ $requirements[0] }}">
                                      <div class="requirement_morewrapperField"></div>
                                      <button class="btn btn-light text-success add_requirements">  
                                      <i class="align-middle mr-2" data-feather="plus"></i> Add Answer 
                                      </button>
                                   </div>
                                </div>
                            </section>
                            <h6> Pricing </h6>
                            <section>
                                <div class="row form-group mb-4">
                                   <div class="col-md-12">
                                        <label for="priceId" class="form-label"> Pricing </label>
                                        <input type="number" class="form-control form-control-lg" id="priceId" placeholder="Course Amount" name="pricing" value="{{$course->price}}">
                                   </div>
                                </div>
                                <input id="acceptTerms-2" name="acceptTerms" type="checkbox" class="" @if($course->certificate == "on") {{'checked'}} @endif> 
                                <label for="acceptTerms-2"> Give a certificate for completing courses </label>
                                <small class="d-block"> If you give certificate to students, please check,   </small>
                            </section>


                            <h6> Photo / Video </h6>
                            <section>
                                <div class="row">
                                    <div class="tab">
                                        <ul class="nav nav-tabs mb-4 nav-fill" role="tablist">
                                            <li class="nav-item"><a class="nav-link active bg-transparent" href="#tab-1" data-toggle="tab" role="tab"> Current Course Trailer </a></li>
                                            <li class="nav-item"><a class="nav-link bg-transparent" href="#tab-2" data-toggle="tab" role="tab"> New Photo / Video Upload </a></li>
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-1" role="tabpanel">
                                                <input type="hidden" name="oldphoto" value="{{ $course->image }}">
                                                <input type="hidden" name="oldvideo" value="{{ $course->video }}">

                                                <div class="video-player card-img-top">
                                                    <video class="js-player lesson_video_play vidoe-js" data-poster="{{ asset($course->image) }}" controls crossorigin preload="auto" playsinline id="videoarea" style="--plyr-color-main: #f09819;">
                                                        <source src="{{ asset($course->video) }}" type="video/mp4"/ >
                                                    </video>
                                                </div>
                                                
                                            </div>

                                            <div class="tab-pane" id="tab-2" role="tabpanel">
                                                <div class="form-group my-3">
                                                    <label>Photo(<small class="text-danger">jpeg|bmp|png</small>)</label>
                                                    <input type='file' name="photo" onchange="readURL(this);" />

                                                    <img id="blah" src="http://placehold.it/180" alt="your image" class="img-fluid d-block" />
                                                </div>

                                                <div class="form-group my-3">
                                                    <label>Video(<small class="text-danger">mp4</small>)</label>
                                                    <input type="file" name="video" class="form-control-file" id="uploadVideoFile" accept="video/*">

                                                    <div id="videoSourceWrapper" class="mt-3">
                                                        <video class="js-player lesson_video_play vidoe-js" controls crossorigin preload="auto" playsinline id="videoarea" style="--plyr-color-main: #f09819;">
                                                            <source id="videoSource"/>
                                                        </video>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </section>
                        </form>
                    </div>
                </div>
             </div>
        </div>
   </div>
   @section('script_content')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/plyr/demo.css') }}">
    <script src="{{ asset('plugin/plyr/plyr_plugin.js') }}"></script>
    <script src="{{ asset('plugin/plyr/default.js') }}"></script>
    <script type="text/javascript">
      $(document).ready(function() {

            $("#videoSourceWrapper").hide();

            $('#example-form').on('change','#uploadVideoFile',function(){
                    var fileInput = document.getElementById("uploadVideoFile");
                    console.log('Trying to upload the video file: %O', fileInput);

                    if ('files' in fileInput) {
                        if (fileInput.files.length === 0) {
                            alert("Select a file to upload");
                        } else {
                            var $source = $('#videoSource');
                            $source[0].src = URL.createObjectURL(this.files[0]);
                            $source.parent()[0].load();
                            $("#videoSourceWrapper").show();
                        }
                    } else {
                        console.log('No found "files" property');
                    }
                }
            );


            readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah')
                            .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
      
            var form = $("#example-form");
      
            form.steps({
                headerTag: "h6",
                bodyTag: "section",
                transitionEffect: "fade",
                titleTemplate: '<span class="step">#index#</span> #title#',
                onFinished: function (event, currentIndex)
                {
                    var about = document.querySelector('textarea[name=description]');

                    var quillData = quill.getContents();
                    var quillText = quill.getText();
                    var quillHtml = quill.root.innerHTML.trim();

                    about.value =  quillHtml;
                    form.submit();
      
                }
            });
      
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
              theme: 'snow'
            });
            
            quill.clipboard.dangerouslyPasteHTML(`{!! $course->description !!}`);

      
            $('.select2').select2({
                theme: 'bootstrap4',
            });

          
            var max_fields = 10; //Maximum allowed input fields 
            var situation_wrapper    = $(".situation_morewrapperField"); //Input fields wrapper
            var requirement_wrapper    = $(".requirement_morewrapperField"); //Input fields wrapper
      
            var add_answerBtn = $(".add_situations"); //Add button class or ID
            var add_requirementBtn = $(".add_requirements"); //Add button class or ID
      
            var x = {!! $outline_count !!}; //Initial input field is set to 1
            var y ={{ $requirement_count }};

            var outlines = JSON.parse(`{!! $course->outline !!}`);
            var requirements = JSON.parse(`{!! $course->requirements !!}`);

            console.log(outlines);

            append_situation_wrapper(x);
            append_requirement_wrapper(y);

            function append_situation_wrapper(x){
                $.each(outlines,function(i,v){
                    if(i > 0){
                        $(situation_wrapper).append(`<div class="input-group mb-3">
                                  <input type="text" class="form-control form-control-lg" placeholder="E.g Learn Digital Marketing" name="situations[]" value="${v}">
                                  <button class="btn btn-danger remove_situationfield" type="button" id="button-addon2"> X
                                  </button>
                              </div>`);
                    }
                })

                
            }

            function append_requirement_wrapper(y){
                $.each(requirements,function(i,v){
                    if(i > 0){
                        $(requirement_wrapper).append(`<div class="input-group mb-3">
                                      <input type="text" class="form-control form-control-lg" placeholder="E.g Be able to read english 4 skills" name="requirements[]" value="${v}">
                                      <button class="btn btn-danger remove_requirementfield" type="button" id="button-addon2"> X
                                      </button>
                                  </div>`);
                    }
                })
            }

      
            $(add_answerBtn).click(function(e) {
      
                e.preventDefault();
                //Check maximum allowed input fields
                if(x < max_fields){ 
                x++; //input field increment
                //add input field
                $(situation_wrapper).append(`<div class="input-group mb-3">
                                  <input type="text" class="form-control form-control-lg" placeholder="E.g Learn Digital Marketing" name="situations[]">
                                  <button class="btn btn-danger remove_situationfield" type="button" id="button-addon2"> X
                                  </button>
                              </div>`);
                }
      
            });

            
      
              
               
              //when user click on remove button
              $(situation_wrapper).on("click",".remove_situationfield", function(e){ 
                  e.preventDefault();
              $(this).parent('div').remove(); //remove inout field
              x--; //inout field decrement
      
          });
      
      
          $(add_requirementBtn).click(function(e) {
      
              e.preventDefault();
              //Check maximum allowed input fields
                  if(y < max_fields){ 
                  y++; //input field increment
                  //add input field
                  $(requirement_wrapper).append(`<div class="input-group mb-3">
                                      <input type="text" class="form-control form-control-lg" placeholder="E.g Be able to read english 4 skills" name="requirements[]">
                                      <button class="btn btn-danger remove_requirementfield" type="button" id="button-addon2"> X
                                      </button>
                                  </div>`);
                  }
      
              });
      
              
               
              //when user click on remove button
              $(requirement_wrapper).on("click",".remove_requirementfield", function(e){ 
                  e.preventDefault();
              $(this).parent('div').remove(); //remove inout field
              y--; //inout field decrement
      
          });
      
            const player = Plyr.setup('.js-player',{
                // invertTime: false,
                i18n: {
                    rewind: 'Rewind 15s',
                    fastForward: 'Forward 15s',
                    seek: "Seek",
                    start: "Start",
                    end: "End",
                    seekTime : 10
                },
                controls: [
                    'play-large', // The large play button in the center
                    'restart', // Restart playback
                    'rewind', // Rewind by the seek time (default 10 seconds)
                    'play', // Play/pause playback
                    'fast-forward', // Fast forward by the seek time (default 10 seconds)
                    'progress', // The progress bar and scrubber for playback and buffering
                    'current-time', // The current time of playback
                    'mute', // Toggle mute
                    'volume', // Volume control
                    'captions', // Toggle captions
                    'settings', // Settings menu
                    'fullscreen', // Toggle fullscreen
                    'airplay'
                ],
                events: ["ended", "progress", "stalled", "playing", "waiting", "canplay", "canplaythrough", "loadstart", "loadeddata", "loadedmetadata", "timeupdate", "volumechange", "play", "pause", "error", "seeking", "seeked", "emptied", "ratechange", "cuechange", "download", "enterfullscreen", "exitfullscreen", "captionsenabled", "captionsdisabled", "languagechange", "controlshidden", "controlsshown", "ready", "statechange", "qualitychange", "adsloaded", "adscontentpause", "adscontentresume", "adstarted", "adsmidpoint", "adscomplete", "adsallcomplete", "adsimpression", "adsclick"],
                listeners: {
                    seek: function (e) {
                        // return false;    // required on v3
                    },
                    fastForward: 100
                },
                
                clickToPlay: true,
            });
          
      });
      
      
   </script>
   @stop
</x-backend>