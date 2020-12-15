<x-backend>

	<h1 class="h3 mb-3"> Students List </h1>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title mb-0"> All Lists 

					<a href="{{route('backside.students.create')}}" class="btn custom_primary_btnColor float-right" >
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
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            	@php $i =1; 
                                $student_users = array();
                                @endphp

                                @foreach($users as $user)
                                	@foreach($user->courses as $user_course)
                                        @php
                                            $user_course_sales = $user_course->sales;
                                            
                                        @endphp
                                    
                                        @foreach($user_course_sales as $user_course_sale)
                                        {{$user_course_sale->pivot}}
                                        @if($user_course_sale->pivot->status == 1)
                                        @php
                                          array_push($student_users,$user_course_sale->user);

                                        @endphp
                                        @endif
                                        @endforeach
                                    @endforeach
                                @endforeach

                                @php 
                                   
                                    $unique_student = array_unique($student_users);
                                @endphp

                                @foreach($unique_student as $student)
                            	<tr>
                            		<td>{{$i++}}</td>
                                   
                            		<td>{{$student->name}}</td>
                                    <td>{{$student->email}}</td>
                            		
                            		<td>
                            			<a href="#" class="btn btn-warning"><i class="align-middle " data-feather="edit-2"></i></a>
                            			
                                        <form action="{{route('backside.students.destroy',$student->id)}}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="align-middle" data-feather="x"></i></button>
                                            
                                        </form>
                            		</td>
                            	</tr>
                                @endforeach
                               
                            </tbody>
                            <tfoot>
                               
                            </tfoot>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
				</div>
			</div>
		</div>
	</div>

@section('script_content')
    
    <script type="text/javascript">

        $(document).ready(function() {

        	$('#listTable').DataTable();

        });


    </script>

@stop

</x-backend>