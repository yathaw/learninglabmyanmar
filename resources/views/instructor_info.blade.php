<x-frontend>
<style type="text/css">
	

#grad1 {
    background-color: #e1e6e2;
    /*background-image: linear-gradient(#00000f, #81D4FA)*/
}

#msform {
    text-align: center;
    position: relative;
    margin-top: 20px
}

#msform fieldset .form-card {
    background: white;
    border: 0 none;
    border-radius: 0px;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    padding: 20px 40px 30px 40px;
    box-sizing: border-box;
    width: 94%;
    margin: 0 3% 20px 3%;
    position: relative
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

#msform fieldset:not(:first-of-type) {
    display: none
}

#msform fieldset .form-card {
    text-align: left;
    color: #9E9E9E
}

#msform input,
#msform textarea {
    padding: 0px 8px 4px 8px;
    border: none;
    border-bottom: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    font-size: 16px;
    letter-spacing: 1px
}

#msform input:focus,
#msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: none;
    font-weight: bold;
    border-bottom: 2px solid skyblue;
    outline-width: 0
}

#msform .action-button {
    width: 100px;
    background: #f09819;
    font-weight: bold;
    color: white;
    border: 1;
    border-radius: 5px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px
}



#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 1;
    border-radius: 5px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px
}


.card {
    z-index: 0;
    border: none;
    border-radius: 0.5rem;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #2C3E50;
    margin-bottom: 10px;
    font-weight: bold;
    text-align: left
}


</style>
	<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Sign Up Your User Account</strong></h2>
                <p>Fill all form field to go to next step</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform">
                             <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Account Information</h2> 
                                    <div class="form-group row">
                                    	<label for="user_name">User Name</label>
                                    	<input type="text" name="user_name" id="user_name" class="form-control">
                                    </div>
                                    
                                    <div class="form-group row">
                                    	<label for="email">Email</label>
                                    	<input type="email" name="email" id="email" class="form-control">
                                    </div>

                                    <div class="form-group row">
                                    	<label for="password">Password</label>
                                    	<input type="password" name="password" id="password" class="form-control">
                                    </div>
                                   
                                   	<div class="form-group row">
                                   		<label for="confirm_password">Confirm password</label>
                                   		<input type="password" name="confirm_password" id="confirm_password" class="form-control">
                                   	</div>
                                </div> 
                                <input type="button" name="next" class="next action-button btn btn-primary" value="Next Step" />
                            </fieldset>
                           
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Instructors Information</h2>

                                    <div class="form-group row">
                                    	<label for="headline">Headline</label>
                                    	<input type="text" name="headline" id="headline" class="form-control">
                                    </div>

                                    <div class="form-group row">
                                    	<label for="biography">Biography</label>
                                    	<input type="text" name="biography" id="biography" class="form-control">
                                    </div>

                                    <div class="form-group row">
                                    	<label for="website">Website</label>
                                    	<input type="text" name="website" id="website" class="form-control">
                                    </div>

                                    <div class="form-group row">
                                    	<label for="twitter">Twitter</label>
                                    	<input type="text" name="twitter" id="twitter" class="form-control">
                                    </div>

                                    <div class="form-group row">
                                    	<label for="facebook">Facebook</label>
                                    	<input type="text" name="facebook" id="facebook" class="form-control">
                                    </div>

                                    <div class="form-group row">
                                    	<label for="linkedin">Linkedin</label>
                                    	<input type="text" name="linkedin" id="linkedin" class="form-control">
                                    </div>
                                   
                                    <div class="form-group row">
                                    	<label for="youtube">Youtube</label>
                                    	<input type="text" name="youtube" id="youtube" class="form-control">
                                    </div>
                                    
                                    <div class="form-group row">
                                    	<label for="instagram">Instagram</label>
                                    	<input type="text" name="instagram" id="instagram" class="form-control">
                                    </div>
                                </div> 
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> <input type="button" class=" action-button" value="Confirm" />
                            </fieldset>
                           <!--  <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">Success !</h2> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                    </div> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>You Have Successfully Signed Up</h5>
                                        </div>
                                    </div>
                                </div>
                            </fieldset> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script_content')
    
<script type="text/javascript">

	$(document).ready(function(){

		var current_fs, next_fs, previous_fs; //fieldsets
		var opacity;

		$(".next").click(function(){

			current_fs = $(this).parent();
			next_fs = $(this).parent().next();


			//show the next fieldset
			next_fs.show();
			//hide the current fieldset with style
			current_fs.animate({opacity: 0}, {
			step: function(now) {
			// for making fielset appear animation
			opacity = 1 - now;

			current_fs.css({
			'display': 'none',
			'position': 'relative'
			});
			next_fs.css({'opacity': opacity});
			},
			duration: 600
			});
		});

		$(".previous").click(function(){

			current_fs = $(this).parent();
			previous_fs = $(this).parent().prev();

			
			//show the previous fieldset
			previous_fs.show();

			//hide the current fieldset with style
			current_fs.animate({opacity: 0}, {
			step: function(now) {
			// for making fielset appear animation
			opacity = 1 - now;

			current_fs.css({
			'display': 'none',
			'position': 'relative'
			});
			previous_fs.css({'opacity': opacity});
			},
			duration: 600
			});
		});


	});

</script>

@stop
</x-frontend>