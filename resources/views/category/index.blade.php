
<x-backend>

  <h1 class="h3 mb-3"> Category List </h1>

  <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"> All Lists 

                        <a href="{{ route('backside.category.create') }}" class="btn custom_primary_btnColor float-right" ><i class="align-middle fas fa-plus"></i></a>
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
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @php
                                    $i=1;
                                @endphp

                                 @foreach($categories as $row)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$row->name}}</td>
                                    <th><a href="{{route('backside.category.edit',$row->id)}}" class="btn btn-success">Edit</a>
                                    <a href="{{route('backside.category.show',$row->id)}}" class="btn btn-info">Show</a></th>
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
