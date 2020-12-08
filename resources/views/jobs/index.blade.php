<x-backend>

	<h1 class="h3 mb-3"> JobTitles </h1>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title mb-0"> All Lists 

					<a href="{{route('backside.jobtitles.create')}}" class="btn custom_primary_btnColor float-right" >
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
                                    <th> Name </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php $i=1; ?>
                            	@foreach($jobtitles as $jobtitle)
                            	<tr>
                            		<td>{{$i++}}</td>
                            		<td>{{$jobtitle->name}}</td>
                            		<td>
                            			<a href="{{route('backside.jobtitles.edit',$jobtitle->id)}}" class="btn btn-warning text-dark"><i class="align-middle " data-feather="edit-2"></i> </a>
                            			<form action="{{route('backside.jobtitles.destroy',$jobtitle->id)}}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="align-middle" data-feather="x"></i></button>
                                            
                                        </form>
                            		</td>
                            	</tr>
                            	@endforeach
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