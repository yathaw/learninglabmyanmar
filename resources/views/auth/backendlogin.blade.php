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
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome back, Admin</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="{{ asset('logo/logo_transparent_500x500.png') }}" class="img-fluid mx-auto d-block" style="width: 150px; height: 150px;">
										<img src="{{ asset('logo/logotext_color.png') }}" class="img-fluid mx-auto d-block">

									</div>

									@if ($errors->any())
				                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
				                        <x-jet-validation-errors class="mb-4" />
				                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
				                    </div>
				                    @endif

				                    
				                    @if (session('status'))
				                        <div class="mb-4 font-medium text-sm text-center text-danger">
				                            {{ session('status') }}
				                        </div>
				                    @endif
				                    
									<form method="POST" action="{{ route('backside_login') }}">
            						@csrf
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required autofocus />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" required autocomplete="current-password" />
											<small>
            									{{-- <a href="pages-reset-password.html">Forgot password?</a> --}}
          									</small>
										</div>
										<div>
											<label class="form-check">
	            								<input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
	            								<span class="form-check-label">
	              									Remember me next time
	            								</span>
	         								</label>
										</div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-warning">Sign in </button>
											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="{{ asset('plugin/jquery-3.5.1.min.js') }}"></script>	


	<script src="{{ asset('backend/js/app.js') }}"></script>

</body>

</html>