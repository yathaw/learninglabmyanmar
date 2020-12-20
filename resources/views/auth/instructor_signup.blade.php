<x-auth_step>
	
	<div class="container">
		<div class="row justify-content-center">
		    <div class="col-xs-12 col-md-8 col-lg-8">
		    	<div class="card border-0 shadow p-3 mb-5 bg-white rounded">
		    		<div class="card-header bg-transparent border-0 text-center pt-4">
		    			<img src="{{ asset('logo/logo_transparent_500x500.png') }}" class="img-fluid mx-auto d-block" style="width: 100px; height: 100px;">
		    			<h3> Welcome to Learning Lab Myanmar </h3>
		    			<p> <strong class="custom_primary_Color"> Hello {{ $user->name }}, </strong> Provide us some details to get you started </p>
		    		</div>
	                <div class="card-body">
	                	<div class="wizard-content">
                            <form id="example-form" action="{{ route('backside.course.store') }}" class="tab-wizard wizard-circle wizard clearfix g-3" method="POST" enctype="multipart/form-data">
                            @csrf

                                <h6> Personal </h6>
                                <section class="pt-3">
                                    <div class="row form-group ">
                                        <div class="col-md-12">
                                            <label for="headlineId" class="form-label"> Headline </label>
                                            <small class="mmfont text-muted"> ( သင့်အကြောင်းအကျဉ်းချုပ်ဖော်ပြပါ ) </small>

                                            <input type="text" class="form-control" id="headlineId" placeholder="Your Headline" name="headline">
                                        </div>
                                    </div>


                                    <div class="row form-group my-4">

                                        <div class="col-md-12" >
                                            <label for="companyId" class="form-label"> Your Career Life </label>

                                            <select class="form-select select2" name="subcategoryid" id="companyId" data-placeholder="Select one carerr">
                                                <option></option>
                                                @foreach($jobtitles as $jobtitle)
                                                    <option value="{{$jobtitle->id}}" data-id="{{$jobtitle->id}}">{{$jobtitle->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group my-4 vh-50">

                                        <div class="col-md-12">
                                            <label for="descriptionId" class="form-label"> Biography </label>

                                            <small class="mmfont text-muted"> ( သင့်အားသာချက်နှင့် အရည်အချင်းများ ကိုအတိုချုပ် ဖော်ပြပါ ) </small>

                                            <div id="descriptionId"></div>

                                            <textarea class="form-control d-none" id="hiddenArea" name="description"></textarea>
                                        </div>
                                    </div>

                                    
                                </section>
                             
                                <h6> Social Media </h6>
                                <section class="pb-0 pt-3">
                             		
                             		<label class="form-label"> Let us know your social life. If you don't want to show, just skip it. </label>

                                    <div class="row form-group ">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
											  	<span class="input-group-text" id="basic-addon1"> <i class="icofont-globe"></i> </span>
											  	<input type="text" class="form-control" placeholder="Website Link ( https://www.google.com/ )" name="website">
											</div>
                                        </div>
                                    </div>

                                    <div class="row form-group ">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
											  	<span class="input-group-text" id="basic-addon1"> <i class="icofont-twitter"></i> </span>
											  	<input type="text" class="form-control" placeholder="Twitter Link ( https://twitter.com/username )" name="twitter">
											</div>
                                        </div>
                                    </div>

                                    <div class="row form-group ">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
											  	<span class="input-group-text" id="basic-addon1"><i class="icofont-facebook"></i> </span>
											  	<input type="text" class="form-control" placeholder="Facebook Link ( https://facebook.com/username )" name="facebook">
											</div>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group ">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
											  	<span class="input-group-text" id="basic-addon1"> <i class="icofont-linkedin"></i> </span>
											  	<input type="text" class="form-control" placeholder="Linkedin Link ( https://linkedin.com/username )" name="linkedin">
											</div>
                                        </div>
                                    </div>

                                    <div class="row form-group ">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
											  	<span class="input-group-text" id="basic-addon1"> <i class="icofont-brand-youtube"></i> </span>
											  	<input type="text" class="form-control" placeholder="Youtube Link ( https://youtube.com/username )" name="youtube">
											</div>
                                        </div>
                                    </div>

                                    <div class="row form-group ">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
											  	<span class="input-group-text" id="basic-addon1"> <i class="icofont-instagram"></i> </span>
											  	<input type="text" class="form-control" placeholder="Instagram Link ( https://instagram.com/username )" name="instagram">
											</div>
                                        </div>
                                    </div>
                                    
                                   
                                </section>
                             
                                <h6> Education </h6>
                                <section class="pb-0 pt-3">
                                    <label class="form-label"> Education Life </label>
                                    <small class="mmfont text-muted"> ( သင့်ပညာအရည်အချင်းကိုဖော်ပြပါ ) </small>

                                    <div class="row bg-light px-3">

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

                                    {{-- <div class="d-grid gap-2 col-6 mx-auto my-3">
	                                    <button class="btn btn-light btn-sm text-success add_education">  
	                                        <i class="icofont-plus"></i> Add Answer 
	                                    </button>
	                                </div>

	                                <small class="text-center text-muted d-block mmfont"> သင့် ပညာအရည်အချင်းများကို အနည်းဆုံး ၁ ခု မှ အများဆုံး ၁၀ ခု ထည့်သွင်းနိုင်ပါသည် </small>

                                    <div class="edu_morewrapperField"></div> --}}


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
	                </div>
	            </div>
		    </div>
		</div>
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
                    form.submit();

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