<!DOCTYPE html>
<html>
<head>
	<title> 500 - Internal Server Error </title>
	<link rel="shortcut icon" href="{{ asset('logo/favicon.ico') }}" />

	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/font.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/errors.css') }}">

</head>
<body>

	<h1 id="headerBg"> 505 </h1>

	<div class="container">

			<div class="compcontainer">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90.5 74.769">
			<path fill="#C7CCDB" d="M58.073 74.769H32.426l6.412-19.236h12.824z"/>
			<path fill="#373F45" d="M90.5 52.063c0 1.917-2.025 3.471-4.525 3.471H4.525C2.025 55.534 0 53.98 0 52.063V3.471C0 1.554 2.026 0 4.525 0h81.449c2.5 0 4.525 1.554 4.525 3.471v48.592z"/>
			<path fill="#F1F2F2" d="M84.586 46.889c0 1.509-1.762 2.731-3.936 2.731H9.846c-2.172 0-3.933-1.223-3.933-2.731V8.646c0-1.508 1.761-2.732 3.933-2.732H80.65c2.174 0 3.936 1.225 3.936 2.732v38.243z"/>
			<path fill="#A2A7A5" d="M16.426 5.913L8.051 23h13l-6.875 12.384L26.75 46.259l-8.375-11.375L26.75 20H14.625l6.801-14.087zM68.551 49.62l-8.375-17.087h13l-6.875-12.384L78.875 9.274 70.5 20.649l8.375 14.884H66.75l6.801 14.087z"/>
		</svg>
	</div>

	  	<h1> 500 Error</h1>
	  	<!-- <h3>Page Not Found </h3> -->

	  	<p> Sorry, something went wrong on our end. We are currently trying to fix the problem. </p>

	  	<a href="{{ route('frontend.index') }}" class="button"> Go Back Main Page </a>
	</div>

	    

</body>
</html>