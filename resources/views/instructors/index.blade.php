<x-backend>

	<h1 class="h3 mb-3"> Instructors </h1>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title mb-0"> All Lists 

					<a href="{{route('backside.instructors.create')}}" class="btn custom_primary_btnColor float-right" >
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
                                    <th> User Name </th>
                                    <th> Email</th>
                                    <th> Phone </th>
                                    <th>Headline</th>
                                    <!-- <th>Website</th>
                                    <th>Twitter</th>
                                    <th>Facebook</th>
                                    <th>Linkedin</th>
                                    <th>Youtube</th>
                                    <th>Instagram</th> -->
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php $i=1; ?>
                            	@foreach($instructors as $instructor)
                            	<tr>
                            		<td>{{$i++}}</td>
                            		<td>{{$instructor->user->name}}</td>
                            		<td>{{$instructor->user->email}}</td>
                                    <td>{{$instructor->user->phone}}</td>
                            		<td>{{$instructor->headline}}</td>
                            		<!-- <td>{{$instructor->website}}</td>
                            		<td>{{$instructor->twitter}}</td>
                            		<td>{{$instructor->facebook}}</td>
                            		<td>{{$instructor->linkedin}}</td>
                            		<td>{{$instructor->youtube}}</td>
                            		<td>{{$instructor->instagram}}</td> -->
                                    <td>
                                        <button class="btn btn-primary" id="detail" data-name="{{$instructor->user->name}}" data-email="{{$instructor->user->email}}" data-phone="{{$instructor->user->phone}}" data-headline="{{$instructor->headline}}" data-website="{{$instructor->website}}" data-twitter="{{$instructor->twitter}}" data-facebook="{{$instructor->facebook}}" data-linkedin="{{$instructor->linkedlin}}" data-youtube="{{$instructor->youtube}}" data-instagram="{{$instructor->instagram}}"><i class="fas fa-info-circle"></i></button>
                                        <a href="#" class="btn btn-warning"><i class="align-middle " data-feather="edit-2"></i></a>
                                       
                                        <form action="{{route('backside.instructors.destroy',$instructor->id)}}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="align-middle" data-feather="x"></i></button>
                                            
                                        </form>
                                    </td>
                            	</tr>
                            	@endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th> No </th>
                                    <th> User Name </th>
                                    <th> Email</th>
                                    <th> Phone </th>
                                    <th>Headline</th>
                                   <!--  <th>Website</th>
                                    <th>Twitter</th>
                                    <th>Facebook</th>
                                    <th>Linkedin</th>
                                    <th>Youtube</th>
                                    <th>Instagram</th> -->
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
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Instructor detail </h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-md-2 offset-1">
                    <label>Name :</label>
                </div>
                <div class="col-md-9">
                    <p id="name"></p>
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
                    <label>Headline :</label>
                </div>
                <div class="col-md-9">
                    <p id="headline"></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 offset-1">
                    <label>Website :</label>
                </div>
                <div class="col-md-9">
                    <p id="website"></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 offset-1">
                    <label>Twitter :</label>
                </div>
                <div class="col-md-9">
                    <p id="twitter"></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 offset-1">
                    <label>Facebook :</label>
                </div>
                <div class="col-md-9">
                    <p id="facebook"></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 offset-1">
                    <label>Linkedin :</label>
                </div>
                <div class="col-md-9">
                    <p id="linkedin"></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 offset-1">
                    <label>Youtube :</label>
                </div>
                <div class="col-md-9">
                    <p id="youtube"></p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 offset-1">
                    <label>Instagram :</label>
                </div>
                <div class="col-md-9">
                    <p id="instagram"></p>
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

            $('#detail').click(function(){
                var name = $(this).data('name');
                var email = $(this).data('email');
                var phone = $(this).data('phone');
                var headline = $(this).data('headline');
                var website = $(this).data('website');
                var twitter = $(this).data('twitter');
                var facebook = $(this).data('facebook');
                var linkedin = $(this).data('linedin');
                var youtube = $(this).data('youtube');
                var instagram = $(this).data('instagram');
                
                $('#name').text(name);
                $('#email').text(email);
                $('#phone').text(phone);
                $('#headline').text(headline);
                $('#website').text(website);
                $('#twitter').text(twitter);
                $('#facebook').text(facebook);
                $('#linkedin').text(linkedin);
                $('#youtube').text(youtube);
                $('#instagram').text(instagram);    

                $('#staticBackdrop').modal('show');

            })

        });


    </script>

@stop

</x-backend>
    
