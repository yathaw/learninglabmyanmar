<x-backend>

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong> Create New Course </strong> </h3>
        </div>

        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('panel') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('backside.category.index') }}">List</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> New </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="wizard-content">
                        <form id="example-form" action="{{ route('backside.course.store') }}" class="tab-wizard wizard-circle wizard clearfix g-3" method="POST" enctype="multipart/form-data">
                        @csrf

                            <h6>Course  Landing </h6>
                            <section>
                                <div class="row form-group mb-4">
                                    <div class="col-md-12">
                                        <label for="titleId" class="form-label"> Course Title </label>
                                        <input type="text" class="form-control form-control-lg" id="titleId" placeholder="E.g Learn Digital Marketing" name="title">
                                    </div>
                                </div>

                                <div class="row form-group my-4">

                                    <div class="col-md-12">
                                        <label for="subtitleId" class="form-label"> Course Subtitle </label>
                                        <input type="text" class="form-control form-control-lg" id="subtitleId" placeholder="Insert Your Course Subtitle" name="subtitle">
                                    </div>
                                </div>

                                <div class="row form-group my-4">
                                    <div class="col-md-6">
                                        <label for="titleId" class="form-label"> Choose Category </label>

                                        
                                        <select class="form-select select2" name="subcategoryid">
                                            @foreach($categories as $category)
                                            <optgroup class="bg-dark" label="{{ $category->name }}">
                                                @foreach($category->subcategories as $subcategory)
                                                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                                @endforeach
                                            </optgroup>
                                            @endforeach

                                        </select>
                                    </div>


                                    <div class="col-md-6">
                                        <label for="titleId" class="form-label"> Choose Level </label>
                                        <select class="form-select select2" name="level">
                                            @foreach($levels as $level)
                                            <option value="{{$level->id}}">{{$level->name}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>



                                <div class="row form-group my-4">

                                    <div class="col-md-12">
                                        <label for="instructorId" class="form-label"> Select Instructors </label>

                                        <select name="teachers[]" class="form-select select2 teacher" id="inputTeacher" multiple="multiple">
                                            
                                            @if(is_null($authuser->company_id))
                                            <option value="{{$authuser->id}}">{{$authuser->name}}</option>

                                            @else

                                            @foreach($users as $row)
                                            @if($row->company_id == $companyid)

                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endif
                                            @endforeach
                                            @endif
                                           
                                            
                                        </select> 
                                    </div>
                                </div>

                                {{-- <div class="row form-group my-4">

                                    <div class="col-md-12">
                                        <label for="instructorId" class="form-label"> Select Instructors </label>

                                        <select name="teachers[]" class="form-select select2 teacher" id="inputTeacher" multiple="multiple">
                                            @foreach($instructors as $instructor)
                                            <option value="{{$instructor->id}}">{{$instructor->name}}</option>
                                            @endforeach
                                            

                                        </select> 
                                    </div>
                                </div> --}}


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
                                        <input type="text" class="form-control form-control-lg my-4" id="situationId" placeholder="E.g Learn Digital Marketing" name="situations[]">

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
                                        <input type="text" class="form-control form-control-lg my-4" id="requirementId" placeholder="E.g Be able to read english 4 skills" name="requirements[]">

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
                                        <input type="number" class="form-control form-control-lg" id="priceId" placeholder="Course Amount" name="pricing">
                                    </div>
                                </div>

                                <input id="acceptTerms-2" name="acceptTerms" type="checkbox" class=""> <label for="acceptTerms-2"> Give a certificate for completing courses </label>
                                <small class="d-block"> If you give certificate to students, please check,   </small>
                            </section>

                            <h6> Photo / Video </h6>
                            <section>
                                <label>Photo(<small class="text-danger">jpeg|bmp|png</small>)</label>
                                
                                {{-- <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror" > --}}
                                <img id="blah" src="http://placehold.it/180" alt="your image" class="img-fluid d-block" />

                                <input type='file' onchange="readURL(this);" />

                                @error('photo')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                                @enderror

                                <div class="my-5"> 
                                <label>Video(<small class="text-danger">mp4</small>)</label>
                                <input type="file" name="video" class="form-control-file @error('video') is-invalid @enderror" >
                                @error('video')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                                @enderror
                                </div>
                            </section>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    
@section('script_content')
    
    <script type="text/javascript">

        $(document).ready(function() {

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
                    $("#hiddenArea").val($("#descriptionId").html());
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


            $('.select2').select2({
                theme: 'bootstrap4',
            });
            
            var max_fields = 10; //Maximum allowed input fields 
            var situation_wrapper    = $(".situation_morewrapperField"); //Input fields wrapper
            var requirement_wrapper    = $(".requirement_morewrapperField"); //Input fields wrapper

            var add_answerBtn = $(".add_situations"); //Add button class or ID
            var add_requirementBtn = $(".add_requirements"); //Add button class or ID

            var x = 1; //Initial input field is set to 1
            var y =1;

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

            
            
        });


    </script>

@stop
</x-backend>