<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Learning Lab Myanmar - Open Source Academy">
	<meta name="author" content="Myanmar IT Consulting">
	<meta name="keywords" content="Learning Lab, Learning Lab Myanmar, Myanmar IT Consulting, Open Source Academy">

	<link rel="shortcut icon" href="{{ asset('logo/favicon.ico') }}" />

	<title> Learning Lab Myanmar </title>

	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/color.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/font.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/style.css') }}">

	<link href="{{ asset('backend/css/app.css') }}" rel="stylesheet">

	<!-- Datatable CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/datatable/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/datatable/responsive.dataTables.min.css') }}">

    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- Quill -->

    <link href="{{ asset('plugin/quill/quill.snow.css') }}" rel="stylesheet">

    <!-- Select 2 -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/select2_bootstrap4/dist/select2-bootstrap4.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/sortable/jquery-ui.css') }}">

</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          			<span class="align-middle"> 
          				<img src="{{ asset('logo/logo_transparent_500x500.png') }}" class="img-fluid mx-auto d-block" style="width: 50px; height: 50px;">
          				<img src="{{ asset('logo/logotext_color.png') }}" class="img-fluid mx-auto d-block"> 

          			</span>
        		</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('frontend.index') }}">
              				<i class="align-middle mr-2" data-feather="repeat"></i> <span class="align-middle"> Switch to Student </span>
            			</a>
					</li>

					{{-- Admin, Company, Instructor --}}
					<li class="sidebar-item {{ Request::segment(1) === 'panel' ? 'active' : '' }}">
						<a class="sidebar-link" href="{{ route('panel') }}">
              				<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            			</a>
					</li>


					{{-- Admin --}}

					<li class="sidebar-item">
						<a class="sidebar-link" href="">
              				<i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle"> Revenue </span>
            			</a>
					</li>

					{{-- Admin, Company --}}

					<li class="sidebar-item">
						<a class="sidebar-link" href="tables-bootstrap.html">
              				<i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Sale</span>
            			</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('backside.course.index')}}">
              				<i class="align-middle" data-feather="user"></i>  <span class="align-middle"> Students </span>
            			</a>
					</li>

					<li class="sidebar-item {{ Request::segment(2) === 'course' ? 'active' : '' }}">
						<a class="sidebar-link" href="{{route('backside.course.index')}}">
              				<i class="align-middle" data-feather="tag"></i> <span class="align-middle"> Courses </span>
            			</a>
					</li>


					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('backside.sale.index')}}">
              				<i class="align-middle" data-feather="bookmark"></i> <span class="align-middle"> Sale </span>
            			</a>
					</li>
					


					<li class="sidebar-item">
						<a data-target="#users" data-toggle="collapse" class="sidebar-link collapsed">
			              	<i class="align-middle" data-feather="users"></i> <span class="align-middle"> Users </span>
			            </a>
						<ul id="users" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item">
								<a class="sidebar-link" href="{{route('backside.companies.index')}}"> Business </a>
							</li>

							<li class="sidebar-item">
								<a class="sidebar-link" href="{{route('backside.instructors.index')}}"> Insturctors </a>
							</li>

							<li class="sidebar-item">
								<a class="sidebar-link" href=""> Students </a>
							</li>
							
						</ul>
					</li>


					<li class="sidebar-item">
						<a class="sidebar-link" href="">
              				<i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Reviews</span>
            			</a>
					</li>


					<li class="sidebar-item">
						<a class="sidebar-link" href="">
              				<i class="align-middle" data-feather="grid"></i> <span class="align-middle"> Issues </span>
            			</a>
					</li>

					{{-- Admin --}}

					<li class="sidebar-header">
						Addons
					</li>

					<li class="sidebar-item">
						<a data-target="#components" data-toggle="collapse" class="sidebar-link collapsed">
			              	<i class="align-middle" data-feather="briefcase"></i> <span class="align-middle"> Components </span>
			            </a>
						<ul id="components" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item">
								<a class="sidebar-link" href="{{route('backside.jobtitles.index')}}"> Job Titles </a>
							</li>

							<li class="sidebar-item">
								<a class="sidebar-link" href="{{route('backside.category.index')}}"> Category </a>
							</li>

							<li class="sidebar-item">
								<a class="sidebar-link" href="{{route('backside.subcategory.index')}}"> Sub-category </a>
							</li>

							<li class="sidebar-item">
								<a class="sidebar-link" href=""> Level </a>
							</li>
							
						</ul>
					</li>

				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          <i class="hamburger align-self-center"></i>
        </a>

				<form class="d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="text" class="form-control" placeholder="Search…" aria-label="Search">
						<button class="btn" type="button">
              <i class="align-middle" data-feather="search"></i>
            </button>
					</div>
				</form>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">0</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header panelnoti">
									
								</div>
								<div class="list-group" id="noti_data">
									<!-- <a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a> -->
									<!-- <a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a> -->
								</div>
								<div class="dropdown-menu-footer">
									<a href="{{route('questionshownoti')}}" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{ asset('backend/img/avatars/avatar-5.jpg') }}" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{ asset('backend/img/avatars/avatar-2.jpg') }}" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{ asset('backend/img/avatars/avatar-4.jpg') }}" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="{{ asset('backend/img/avatars/avatar-3.jpg') }}" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                <img src="{{ asset('backend/img/avatars/avatar.jpg') }}" class="avatar img-fluid rounded mr-1" alt="Charles Hall" /> <span class="text-dark">Charles Hall</span>
              </a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="pages-settings.html"><i class="align-middle mr-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					{{ $slot }}

					

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<p class="mb-0">
								<a href="https://myanmaritc.com/" target="_blank" class="text-muted"><strong>MMIT </strong></a> &copy;
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="{{ asset('plugin/jquery-3.5.1.min.js') }}"></script>	


	<script src="{{ asset('backend/js/app.js') }}"></script>
	


	<!--Datatable JavaScript -->
    <script src="{{ asset('plugin/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugin/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugin/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugin/datatable/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('plugin/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('plugin/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugin/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugin/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugin/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugin/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('plugin/quill/quill.js') }}"></script>
    <!-- Select 2 -->
    <script src="{{asset('plugin/select2/dist/js/select2.min.js')}}"></script> 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sortable/0.9.13/jquery-sortable-min.js"></script>

    <script src="{{ asset('plugin/sortable/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('plugin/pusher.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/js/noti.js')}}"></script>
    <script type="text/javascript">
    	$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

            $('[data-toggle="tooltip"]').tooltip();
    	

    </script>


    @yield("script_content")

</body>

</html>