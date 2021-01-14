<x-backend> 
	<meta name="csrf-token" content="{{ csrf_token() }}">
   
    <div class="container py-5">
       
			        <div class="row">
			        	
			            <div class="col-md-12">
			            	<div class="tile text-center">
			            		<h3 class="my-3 mx-3">Send Your Feedback!</h3>
				            	<textarea class="form-control my-3 comment" placeholder="Any Comment.."></textarea>
				         </div>
				         <div class="col-md-4 offset-md-4">
				         		<a href="javascript:void(0)" class="btn form-control btn btn-success sendfeedback" data-id={{$course->id}}>
				            		Send Feedback
				            	</a>
				         </div>
				            	
				            	
				            
			            </div>
			      

       </div>
    </div>



@section('script_content')

   <script type="text/javascript">
   
	  $.ajaxSetup({
    	headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		 }
		});

	   $(document).ready(function(){

	         $('.sendfeedback').click(function () {
	          //alert('ok');
	          let comment = $('.comment').val();
	  		  let courseid = $(this).data('id');
	  		  //console.log(comment);
	  		  //console.log(courseid);
	          $.post("/backside/comment",{comment:comment,id:courseid},function (response) {
	            console.log(response.msg);
	            location.href = "/backside/course";
	          })
	        })   
	         

	   })
      
      

   </script>
   @endsection
   </x-backend>

