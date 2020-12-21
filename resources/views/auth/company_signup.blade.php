<x-auth_step>
	
	<div class="container">
		<div class="row justify-content-center">
		    <div class="col-xs-12 col-md-8 col-lg-8">
		    	<div class="card border-0 shadow p-3 mb-5 bg-white rounded">
		    		<div class="card-header bg-transparent border-0 text-center pt-4">
		    			<img src="{{ asset('logo/logo_transparent_500x500.png') }}" class="img-fluid mx-auto d-block" style="width: 100px; height: 100px;">
		    			<h3> Welcome to Learning Lab Myanmar </h3>
		    			<p> <strong class="custom_primary_Color"> Hello {{ $user->name }}, </strong> 
                            <span id="regStep_msg"> Provide us some details to get you started </span> 
                            <span id="activateCompany_msg"> Activate your Company Account </span>

                        </p>
		    		</div>
	                <div class="card-body">
	                	<div class="wizard-content">
                            <form id="example-form" action="{{ route('company_reg') }}" class="tab-wizard wizard-circle wizard clearfix g-3" method="POST" enctype="multipart/form-data">
                            @csrf
                                <input type="hidden" name="userid" value="{{ $user->id }}">
                                

                                <h6> Personal </h6>
                                <section class="pb-0 pt-3">
                                    <div class="row form-group ">
                                        <div class="col-md-6">
                                            <label for="headlineId" class="form-label"> Company Name </label>

                                            <input type="text" class="form-control" id="headlineId" placeholder="Your Company Name" name="companyname">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="companylogoId" class="form-label"> Company Logo </label>

                                            <input type="file" id="companylogoId" name="companylogo">
                                        </div>
                                    </div>


                                    <div class="row form-group my-4">

                                        <div class="col-md-12" >
                                            <label for="jobtitleId" class="form-label"> Which position are you in that company? </label>

                                            <select class="form-select select2" name="jobtitleid" id="jobtitleId" data-placeholder="Select one carerr">
                                                <option></option>
                                                @foreach($jobtitles as $jobtitle)
                                                    <option value="{{$jobtitle->id}}" data-id="{{$jobtitle->id}}">{{$jobtitle->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group ">
                                        <div class="col-md-12">
                                            <label for="headlineId" class="form-label"> Company Address </label>

                                            <textarea class="form-control" name="address"></textarea>
                                        </div>
                                    </div>


                                    
                                </section>
                             
                                <h6> Company Information </h6>
                                <section class="pt-0">
                             		
                             		
                                    <div class="row form-group my-4 vh-50">

                                        <div class="col-md-12">
                                            <label for="descriptionId" class="form-label"> About the Company </label>

                                            <small class="mmfont text-muted"> ( သင့်company အကြောင်း ကိုအတိုချုပ် ဖော်ပြပါ ) </small>

                                            <div id="descriptionId"></div>

                                            <textarea class="form-control d-none" id="hiddenArea" name="description"></textarea>
                                        </div>
                                    </div>
                                    
                                   
                                </section>
                             
                                <h6> Profile </h6>
                                <section class="pb-0 pt-3">
                                    
                                    <label class="form-label"> Choose a profile Icon </label>

                                    <div class="row g-4">

                                    
                                    	
                                    	@foreach($profiles as $profile)
                                    	<div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-6">
                                    		

											<label class="profileCard">
											    
											   <div class="card border-0 shadow-sm p-3 bg-white rounded">
											    <input name="profile" class="radio" type="radio">

												<img src="{{ asset($profile) }}" class="card-img-top" alt="...">
											</div>
											</label>
                                    	</div>
                                    	@endforeach

                                    </div>

                                </section>

                                <h6> Terms & Condition </h6>

                                <section class="pb-0 pt-3">

                                	<div class="alert alert-primary" role="alert">
										<strong> <i class="icofont-exclamation-tringle"></i> Important </strong>
										<small>In order to continue, you must read the Terms & Conditions and Privacy Notice by scrolling to the bottom.</small>
									</div>

									<div class="row">
										<div class="col-12">
											<div class="card p-3">
												<h5 class="card-title"> Terms and Conditions </h5>
												<div class="card-body termsCard">
												    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
									                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam porta sem malesuada magna mollis euismod. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Donec ullamcorper nulla non metus auctor fringilla. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
									                <p>Nullam quis risus eget urna mollis ornare vel eu leo. Donec id elit non mi porta gravida at eget metus. Donec sed odio dui. Donec sed odio dui. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla. Cras mattis consectetur purus sit amet fermentum. Curabitur blandit tempus porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
									                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam porta sem malesuada magna mollis euismod. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Donec ullamcorper nulla non metus auctor fringilla. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
									                <p>Nullam quis risus eget urna mollis ornare vel eu leo. Donec id elit non mi porta gravida at eget metus. Donec sed odio dui. Donec sed odio dui. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla. Cras mattis consectetur purus sit amet fermentum. Curabitur blandit tempus porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
									                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam porta sem malesuada magna mollis euismod. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Donec ullamcorper nulla non metus auctor fringilla. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
									                <p>Nullam quis risus eget urna mollis ornare vel eu leo. Donec id elit non mi porta gravida at eget metus. Donec sed odio dui. Donec sed odio dui. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla. Cras mattis consectetur purus sit amet fermentum. Curabitur blandit tempus porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group my-2">
										<input id="websiterules" name="websiterules" type="checkbox" class=""> 
										<label for="websiterules"> Please agree to our 
						                    <a href="#" target="_blank">terms and conditions <i class="icofont-external-link"></i> </a>
						                    and
						                    <a href="#" target="_blank">privacy policy <i class="icofont-external-link"></i></a>  
						                </label>
						            </div>

									<div class="form-group my-2">
                                		<input id="acceptTerms-2" name="acceptTerms" type="checkbox" class=""> <label for="acceptTerms-2"> I agree to the terms and conditions </label>
									</div>

                                </section>

                            </form>
                        </div>

                        <div class="verifyDiv">
                            <h3> Email Confirmation </h3>

                            <div class="row justify-content-center">
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <svg id="b76bd6b3-ad77-41ff-b778-1d1d054fe577" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 570 511.67482"><path d="M879.99927,389.83741a.99678.99678,0,0,1-.5708-.1792L602.86963,197.05469a5.01548,5.01548,0,0,0-5.72852.00977L322.57434,389.65626a1.00019,1.00019,0,0,1-1.14868-1.6377l274.567-192.5918a7.02216,7.02216,0,0,1,8.02-.01318l276.55883,192.603a1.00019,1.00019,0,0,1-.57226,1.8208Z" transform="translate(-315 -194.16259)" fill="#3f3d56"/><polygon points="23.264 202.502 285.276 8.319 549.276 216.319 298.776 364.819 162.776 333.819 23.264 202.502" fill="#e6e6e6"/><path d="M489.25553,650.70367H359.81522a6.04737,6.04737,0,1,1,0-12.09473H489.25553a6.04737,6.04737,0,1,1,0,12.09473Z" transform="translate(-315 -194.16259)" fill="#f9a826"/><path d="M406.25553,624.70367H359.81522a6.04737,6.04737,0,1,1,0-12.09473h46.44031a6.04737,6.04737,0,1,1,0,12.09473Z" transform="translate(-315 -194.16259)" fill="#f9a826"/><path d="M603.96016,504.82207a7.56366,7.56366,0,0,1-2.86914-.562L439.5002,437.21123v-209.874a7.00817,7.00817,0,0,1,7-7h310a7.00818,7.00818,0,0,1,7,7v210.0205l-.30371.12989L606.91622,504.22734A7.61624,7.61624,0,0,1,603.96016,504.82207Z" transform="translate(-315 -194.16259)" fill="#fff"/><path d="M603.96016,505.32158a8.07177,8.07177,0,0,1-3.05957-.59863L439.0002,437.54521v-210.208a7.50851,7.50851,0,0,1,7.5-7.5h310a7.50851,7.50851,0,0,1,7.5,7.5V437.68779l-156.8877,66.999A8.10957,8.10957,0,0,1,603.96016,505.32158Zm-162.96-69.1123,160.66309,66.66455a6.1182,6.1182,0,0,0,4.668-.02784l155.669-66.47851V227.33721a5.50653,5.50653,0,0,0-5.5-5.5h-310a5.50653,5.50653,0,0,0-5.5,5.5Z" transform="translate(-315 -194.16259)" fill="#3f3d56"/><path d="M878,387.83741h-.2002L763,436.85743l-157.06982,67.07a5.06614,5.06614,0,0,1-3.88038.02L440,436.71741l-117.62012-48.8-.17968-.08H322a7.00778,7.00778,0,0,0-7,7v304a7.00779,7.00779,0,0,0,7,7H878a7.00779,7.00779,0,0,0,7-7v-304A7.00778,7.00778,0,0,0,878,387.83741Zm5,311a5.002,5.002,0,0,1-5,5H322a5.002,5.002,0,0,1-5-5v-304a5.01106,5.01106,0,0,1,4.81006-5L440,438.87739l161.28027,66.92a7.12081,7.12081,0,0,0,5.43994-.03L763,439.02741l115.2002-49.19a5.01621,5.01621,0,0,1,4.7998,5Z" transform="translate(-315 -194.16259)" fill="#3f3d56"/><path d="M602.345,445.30958a27.49862,27.49862,0,0,1-16.5459-5.4961l-.2959-.22217-62.311-47.70752a27.68337,27.68337,0,1,1,33.67407-43.94921l40.36035,30.94775,95.37793-124.38672a27.68235,27.68235,0,0,1,38.81323-5.12353l-.593.80517.6084-.79346a27.71447,27.71447,0,0,1,5.12353,38.81348L624.36938,434.50586A27.69447,27.69447,0,0,1,602.345,445.30958Z" transform="translate(-315 -194.16259)" fill="#f9a826"/></svg>
                                    
                                </div>


                            </div>

                            <div class="row">
                                <div class="d-grid gap-2 col-5 mx-auto">
                                    <a class="btn btn-warning my-3" type="button"> Verify Account </a>
                                </div>
                            </div>

                            <p> Before you go and play on Learning Lab Myanmar, Please verify your email address. </p>

                            <p class="lh-lg mt-5"> Why you ask? Connecting with other students and instructors is a big part of the Learning Lab experience. We'll email you about interactions with other people on Learning Lab. Once it's done you will be able to start your business. </p>
                        </div>
	                </div>
	            </div>
		    </div>
		</div>

        <footer class="demo_footer">
            <div class="container py-4 justify-content-center">

                <div class="mr-md-auto text-center text-md-left">
                    <div class="copyright text-center">
                        &copy; Copyright <strong><span> Learning Lab Myanmar </span></strong>. All Rights Reserved
                    </div>
                    <div class="credits text-center">
                  
                    Designed by <a href="https://myanmaritc.com/" target="_blank">MMIT</a>
                    </div>
                </div>
                
            </div>
        </footer>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered modal-lg">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel"> Education Life 
                    <small class="mmfont text-muted"> ( သင့်ပညာအရည်အချင်းကိုဖော်ပြပါ ) </small> </h5>
	        		<button type="button" class="btn-close closeBtn" data-bs-dismiss="modal" aria-label="Close"></button>
	      		</div>
	      		<div class="modal-body">
	      			<div class="container">
		        		<div class="row">

	                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-12 my-2">
	                        	<label for="universityId" class="form-label"> University or Institution </label>
	                            <small class="mmfont text-muted" style="font-size: 12px;"> ( တက္ကသိုလ် သို့ ပညာရေးအဖွဲ့အစည်း ) </small>

	                            <input type="text" class="form-control" id="universityId" placeholder="University of Computer Studies, Yangon">
	                        </div>

	                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-12 my-2">
	                        	<label for="degreeId" class="form-label"> Degree or Certification </label>
	                            <small class="mmfont text-muted"> ( ဘွဲ့ သို့ အသိအမှတ်ပြုလွှာ ) </small>

	                            <input type="text" class="form-control" id="degreeId" placeholder="B.C.Sc. (Business Information Systems)">
	                        </div>

	                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-12 my-2">
	                        	<label for="fromId" class="form-label"> From </label>

	                            <input type="date" class="form-control" id="fromId">
	                        </div>

	                        <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-12 my-2">
	                        	<label for="toId" class="form-label"> To </label>

	                            <input type="date" class="form-control" id="toId">
	                        </div>


	                    </div>
	                </div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary closeBtn" data-bs-dismiss="modal">Close</button>
	        		<button type="button" class="btn btn-primary saveBtn">Save changes</button>
	      		</div>
	    	</div>
	  	</div>
	</div>

@section('script_content')
    
    <script type="text/javascript">

        $(document).ready(function() {

            $('.verifyDiv').hide();
            $('#activateCompany_msg').hide();

        	$("select#images").imagepicker();

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

                    var formData = new FormData(this);

                    $.ajax({
                        type:'POST',
                        url: "{{ route('company_reg')}}",
                        data: formData,
                        cache:false,
                        contentType: false,
                        processData: false,
                        success: (data) => {  
                            // jQuery.noConflict();

                            $('.wizard-content').hide();
                            $('#regStep_msg').hide();
                            
                            $('.verifyDiv').show();
                            $('#activateCompany_msg').show();
                            
                        },
                        error: function(error){
                            
                            //console.log(error.responseJSON.errors);
                            
                            
                        }
                    });

                    // form.submit();

                }
            });

            $('.select2').select2({
                // placeholder: "Select a state",
                theme: 'bootstrap4',
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

            var max_fields = 10; //Maximum allowed input fields 
            var edu_wrapper    = $(".edu_morewrapperField"); //Input fields wrapper

            var add_eduBtn = $(".add_education");

            var closeBtn = $(".closeBtn");
            var saveBtn = $(".saveBtn");



            var x = 1; //Initial input field is set to 1
            var y =1;

            $(add_eduBtn).click(function(e) {

                e.preventDefault();
                $("#exampleModal").modal("show");
                

            });

            $(closeBtn).click(function(e) {

                e.preventDefault();
                $(this).removeData();

                $("#exampleModal").modal("hide");
                

            });

            $(saveBtn).click(function(e) {

                e.preventDefault();
                var universiy = $('#universityId').data();
                var degree = $('#degreeId').data();
                var from = $('#fromId').data();
                var to = $('#toId').data();
            });

        });




    </script>

@stop


</x-auth_step>