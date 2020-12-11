<x-backend>

	<h1 class="h3 mb-3"> Business </h1>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title mb-0"> All Lists 

					<a href="{{route('backside.companies.create')}}" class="btn custom_primary_btnColor float-right" >
		            	<i class="align-middle fas fa-plus"></i>
		            </a>

		            </h5>
				</div>
				<div class="card-body">

					<div class="alert alert-success alert-dismissible fade show d-none" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                			<span aria-hidden="true">&times;</span>
              			</button>
						<div class="alert-icon">
							<i class="far fa-fw fa-bell"></i>
						</div>
						<div class="alert-message">
							<strong>Success!</strong>
							<span class="msg"> </span>
						</div>
					</div>

					<div class="table-responsive m-t-40">
                         <table id="listTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead class="custom_primary_bgColor text-white">
                                <tr>
                                    <th> No </th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company Name</th>
                                    <th>Address</th>
                                    
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php $i =1; ?>
                            	@foreach($companies as $company)



                            	<tr>
                            		<td>{{$i++}}</td>
                                    @foreach($company->user as $company_user)
                                    @php 
                                        $role_name = $company_user->getRoleNames();
                                    @endphp
                                    @if($role_name[0] == "Business" && $company_user->status == '0')
                               
                                    <td>
                                        {{$company_user->name}}</td>
                                    <td>{{$company_user->email}}</td>
                                    <td>{{$company_user->phone}}</td>
                            		<td>{{$company->name}}</td>
                            		
                            		<td>{{$company->address}}</td>
                            		
                            		<td>
                                        <button class="btn btn-primary" id="business_detail" data-user_name="{{$company_user->name}}" data-email="{{$company_user->email}}" data-phone="{{$company_user->phone}}" data-company_name="{{$company->name}}" data-logo="{{$company->logo}}" data-address="{{$company->address}}" data-description="{{$company->description}}"><i class="fas fa-info-circle"></i></button>
                            			<a href="#" class="btn btn-warning"><i class="align-middle " data-feather="edit-2"></i></a>
                            			<form action="{{route('backside.companies.destroy',$company->id)}}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="fas fa-user-times"></i></button>
                                            
                                        </form>
                            		</td>
                                    @endif
                                    @endforeach
                            	</tr>
                            	@endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th> No </th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company Name</th>
                                    <th>Address</th>
                                        
                                    <th> Action </th>
                                </tr>
                            </tfoot>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
				</div>
			</div>
		</div>
	</div>

    <!-- Modal -->
    <div class="modal fade" id="business_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Instructor detail </h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-md-3 offset-1">
                    <label>Logo :</label>
                </div>
                <div class="col-md-8">
                    <img src="" id="logo" class="img-fluid">
                </div>
            </div> 

            <div class="row">
                <div class="col-md-2 offset-1">
                    <label>Name :</label>
                </div>
                <div class="col-md-9">
                    <p id="user_name"></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 offset-1">
                    <label>Email :</label>
                </div>
                <div class="col-md-9">
                    <p id="email"></p>
                </div>
            </div>

              <div class="row">
                <div class="col-md-2 offset-1">
                    <label>Phone :</label>
                </div>
                <div class="col-md-9">
                    <p id="phone"></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 offset-1">
                    <label>Company :</label>
                </div>
                <div class="col-md-9">
                    <p id="company_name"></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 offset-1">
                    <label>Address :</label>
                </div>
                <div class="col-md-9">
                    <p id="address"></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 offset-1">
                    <label>Description:</label>
                </div>
                <div class="col-md-9">
                    <p id="description"></p>
                </div>
            </div>     

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>

@section('script_content')
    
    <script type="text/javascript">

        $(document).ready(function() {

        	$('#listTable').DataTable();

            $('tbody').on('click','#business_detail',function(){
                alert('honey');
                var user_name = $(this).data('user_name');
                var email = $(this).data('email');
                var phone = $(this).data('phone');
                var company_name = $(this).data('company_name');
                var address = $(this).data('address');
                var description = $(this).data('description');
                var logo = $(this).data('logo');
                $('#user_name').text(user_name);
                $('#email').text(email);
                $('#phone').text(phone);
                $('#company_name').text(company_name);
                $('#address').text(address);
                $('#description').text(description);
                $('#logo').attr('src',logo);
                $('#business_modal').modal('show');


            })

        });


    </script>

@stop

</x-backend>