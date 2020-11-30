<x-backend>

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong> Course List </strong> </h3>
        </div>

        <div class="col-auto ml-auto text-right mt-n1">
            <a href="{{ route('backside.course.create') }}" class="btn custom_primary_btnColor float-right" ><i class="align-middle fas fa-plus"></i> Add New Course </a>
        </div>
    </div>

	<div class="row row-cols-1 row-cols-md-3 g-4">
		<div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100">

                <img class="card-img-top" src="{{ asset('backend/img/photos/unsplash-1.jpg') }}" alt="Unsplash">

                <div class="card-header px-4 pt-4">
                    <div class="card-actions float-right">
                        <div class="dropdown show">
                            <a href="#" data-toggle="dropdown" data-display="static">
                                <i class="align-middle" data-feather="more-horizontal"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item text-success fw-bolder" href="#"> 
                                    <i class="align-middle mr-2" data-feather="file-plus"></i> 
                                    Add Course Content 
                                </a>
                                <a class="dropdown-item text-info fw-bolder" href="#"> 
                                    <i class="align-middle mr-2" data-feather="info"></i> Detail 
                                </a>
                                <a class="dropdown-item text-warning fw-bolder" href="#"> 
                                    <i class="align-middle mr-2" data-feather="edit-2"></i> Edit 
                                </a>
                                <a class="dropdown-item text-danger fw-bolder" href="#"> 
                                    <i class="align-middle mr-2" data-feather="x"></i> Remove 
                                </a>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mb-0"> PHP Developer Course </h5>
                    <div class="badge bg-success my-2">Finished</div>
                </div>
                <div class="card-body px-4 pt-2">
                    <p> This Course Includes : </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="play-circle"></i>
                        <small class="pl-3"> 63 hours on-demand video </small>
                    </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="file"></i>
                        <small class="pl-3"> 16 Articles </small>
                    </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="check-square"></i>
                        <small class="pl-3"> 3 Assignments </small>
                    </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="award"></i> 
                        <small class="pl-3"> Certificate of completion </small>
                    </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="dollar-sign"></i> 
                        <small class="pl-3"> 20,000 Ks </small>
                    </p>

                    <img src="{{ asset('backend/img/avatars/avatar-3.jpg') }}" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
                    <img src="{{ asset('backend/img/avatars/avatar-2.jpg') }}" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
                    <img src="{{ asset('backend/img/avatars/avatar.jpg') }}" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4 pb-4">
                        <p class="mb-2 font-weight-bold">Progress <span class="float-right">100%</span></p>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%;">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100">

                <img class="card-img-top" src="{{ asset('backend/img/photos/unsplash-1.jpg') }}" alt="Unsplash">

                <div class="card-header px-4 pt-4">
                    <div class="card-actions float-right">
                        <div class="dropdown show">
                            <a href="#" data-toggle="dropdown" data-display="static">
                                <i class="align-middle" data-feather="more-horizontal"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item text-success fw-bolder" href="#"> 
                                    <i class="align-middle mr-2" data-feather="file-plus"></i> 
                                    Add Course Content 
                                </a>

                                <a class="dropdown-item text-info fw-bolder" href="#"> 
                                    <i class="align-middle mr-2" data-feather="info"></i> Detail 
                                </a>
                                <a class="dropdown-item text-warning fw-bolder" href="#"> 
                                    <i class="align-middle mr-2" data-feather="edit-2"></i> Edit 
                                </a>
                                <a class="dropdown-item text-danger fw-bolder" href="#"> 
                                    <i class="align-middle mr-2" data-feather="x"></i> Remove 
                                </a>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mb-0"> PHP Developer Course </h5>
                    <div class="badge bg-danger my-2">On hold</div>
                </div>
                <div class="card-body px-4 pt-2">
                    <p> This Course Includes : </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="play-circle"></i>
                        <small class="pl-3"> 0 hours on-demand video </small>
                    </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="file"></i>
                        <small class="pl-3"> 0 Articles </small>
                    </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="check-square"></i>
                        <small class="pl-3"> 0 Assignments </small>
                    </p>
                    <p> 
                        <i class="align-middle mr-2" data-feather="dollar-sign"></i> 
                        <small class="pl-3"> 20,000 Ks </small>
                    </p>
                    

                    <img src="{{ asset('backend/img/avatars/avatar-3.jpg') }}" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
                    <img src="{{ asset('backend/img/avatars/avatar-2.jpg') }}" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
                    <img src="{{ asset('backend/img/avatars/avatar.jpg') }}" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4 pb-4">
                        <p class="mb-2 font-weight-bold">Progress <span class="float-right">0%</span></p>
                        <div class="progress progress-sm">
                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                style="width: 0%;">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100">

                <img class="card-img-top" src="{{ asset('backend/img/photos/unsplash-1.jpg') }}" alt="Unsplash">

                <div class="card-header px-4 pt-4">
                    <div class="card-actions float-right">
                        <div class="dropdown show">
                            <a href="#" data-toggle="dropdown" data-display="static">
                                <i class="align-middle" data-feather="more-horizontal"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item text-success fw-bolder" href="#"> 
                                    <i class="align-middle mr-2" data-feather="file-plus"></i> 
                                    Add Course Content 
                                </a>

                                <a class="dropdown-item text-info fw-bolder" href="#"> 
                                    <i class="align-middle mr-2" data-feather="info"></i> Detail 
                                </a>
                                <a class="dropdown-item text-warning fw-bolder" href="#"> 
                                    <i class="align-middle mr-2" data-feather="edit-2"></i> Edit 
                                </a>
                                <a class="dropdown-item text-danger fw-bolder" href="#"> 
                                    <i class="align-middle mr-2" data-feather="x"></i> Remove 
                                </a>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mb-0"> PHP Developer Course </h5>
                    <div class="badge bg-warning my-2">In progress</div>
                </div>
                <div class="card-body px-4 pt-2">
                    <p> This Course Includes : </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="play-circle"></i>
                        <small class="pl-3"> 63 hours on-demand video </small>
                    </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="file"></i>
                        <small class="pl-3"> 16 Articles </small>
                    </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="check-square"></i>
                        <small class="pl-3"> 3 Assignments </small>
                    </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="award"></i> 
                        <small class="pl-3"> Certificate of completion </small>
                    </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="dollar-sign"></i> 
                        <small class="pl-3"> 20,000 Ks </small>
                    </p>

                    <img src="{{ asset('backend/img/avatars/avatar-3.jpg') }}" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
                    <img src="{{ asset('backend/img/avatars/avatar-2.jpg') }}" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
                    <img src="{{ asset('backend/img/avatars/avatar.jpg') }}" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4 pb-4">
                        <p class="mb-2 font-weight-bold">Progress <span class="float-right">65%</span></p>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"
                                style="width: 65%;">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100">

                <img class="card-img-top" src="{{ asset('backend/img/photos/unsplash-1.jpg') }}" alt="Unsplash">

                <div class="card-header px-4 pt-4">
                    <div class="card-actions float-right">
                        <div class="dropdown show">
                            <a href="#" data-toggle="dropdown" data-display="static">
                                <i class="align-middle" data-feather="more-horizontal"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item text-success fw-bolder" href="#"> 
                                    <i class="align-middle mr-2" data-feather="file-plus"></i> 
                                    Add Course Content 
                                </a>

                                <a class="dropdown-item text-info fw-bolder" href="#"> 
                                    <i class="align-middle mr-2" data-feather="info"></i> Detail 
                                </a>
                                <a class="dropdown-item text-warning fw-bolder" href="#"> 
                                    <i class="align-middle mr-2" data-feather="edit-2"></i> Edit 
                                </a>
                                <a class="dropdown-item text-danger fw-bolder" href="#"> 
                                    <i class="align-middle mr-2" data-feather="x"></i> Remove 
                                </a>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mb-0"> PHP Developer Course </h5>
                    <div class="badge bg-success my-2">Finished</div>
                </div>
                <div class="card-body px-4 pt-2">
                    <p> This Course Includes : </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="play-circle"></i>
                        <small class="pl-3"> 63 hours on-demand video </small>
                    </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="file"></i>
                        <small class="pl-3"> 16 Articles </small>
                    </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="check-square"></i>
                        <small class="pl-3"> 3 Assignments </small>
                    </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="award"></i> 
                        <small class="pl-3"> Certificate of completion </small>
                    </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="dollar-sign"></i> 
                        <small class="pl-3"> 20,000 Ks </small>
                    </p>

                    <img src="{{ asset('backend/img/avatars/avatar-3.jpg') }}" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
                    <img src="{{ asset('backend/img/avatars/avatar-2.jpg') }}" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
                    <img src="{{ asset('backend/img/avatars/avatar.jpg') }}" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4 pb-4">
                        <p class="mb-2 font-weight-bold">Progress <span class="float-right">100%</span></p>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%;">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100">

                <img class="card-img-top" src="{{ asset('backend/img/photos/unsplash-1.jpg') }}" alt="Unsplash">

                <div class="card-header px-4 pt-4">
                    <div class="card-actions float-right">
                        <div class="dropdown show">
                            <a href="#" data-toggle="dropdown" data-display="static">
                                <i class="align-middle" data-feather="more-horizontal"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item text-success fw-bolder" href="#"> 
                                    <i class="align-middle mr-2" data-feather="file-plus"></i> 
                                    Add Course Content 
                                </a>

                                
                                <a class="dropdown-item text-info fw-bolder" href="#"> 
                                    <i class="align-middle mr-2" data-feather="info"></i> Detail 
                                </a>
                                <a class="dropdown-item text-warning fw-bolder" href="#"> 
                                    <i class="align-middle mr-2" data-feather="edit-2"></i> Edit 
                                </a>
                                <a class="dropdown-item text-danger fw-bolder" href="#"> 
                                    <i class="align-middle mr-2" data-feather="x"></i> Remove 
                                </a>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mb-0"> PHP Developer Course </h5>
                    <div class="badge bg-success my-2">Finished</div>
                </div>
                <div class="card-body px-4 pt-2">
                    <p> This Course Includes : </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="play-circle"></i>
                        <small class="pl-3"> 63 hours on-demand video </small>
                    </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="file"></i>
                        <small class="pl-3"> 16 Articles </small>
                    </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="check-square"></i>
                        <small class="pl-3"> 3 Assignments </small>
                    </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="award"></i> 
                        <small class="pl-3"> Certificate of completion </small>
                    </p>

                    <p> 
                        <i class="align-middle mr-2" data-feather="dollar-sign"></i> 
                        <small class="pl-3"> 20,000 Ks </small>
                    </p>

                    
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4 pb-4">
                        <p class="mb-2 font-weight-bold">Progress <span class="float-right">100%</span></p>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                style="width: 100%;">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

	</div>

    <div class="row">
        <div class="col-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
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