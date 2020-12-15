<x-backend>
	<div class="row">
		<div class="form-group">
			<h2>Confirm remove your account</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<input type="checkbox" name="" id="check_data"> <label for="check_data">I agree this term!!</label>
		</div>
	</div>
	<div class="row my-3">
		<div class="form-group">
			<button class="btn custom_primary_btnColor" id="confirm_remove"> Confirm</button>
			
		</div>
	</div>

	 <!-- Modal -->
    <div class="modal fade" id="success_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Account Delete </h5>
           
          </div>
          <div class="modal-body text-center">
          	<p class="text-center">Your account delete successfully</p>
          	<form action="{{route('logout')}}" method="POST" class="d-inline-block">
                @csrf
               
                <button class="btn btn-success text-center" type="submit">Ok</button>
                
            </form>

          </div>
         
        </div>
      </div>
    </div>

    

@section('script_content')
	<script type="text/javascript">
		$(document).ready(function(){
			$("#confirm_remove").click(function(){
				var ans = confirm('Are you sure to delete your Account!!!');
				
				if(ans){
					$.get("{{route('account_remove')}}",function(res){
						if(ans){
							$("#success_modal").modal('show');

						}

					})
				}
			})

		})
	</script>
@stop
</x-backend>