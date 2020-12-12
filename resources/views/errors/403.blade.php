<!DOCTYPE html>
<html>
<head>
	<title> 403 - Permission Denied </title>
	<link rel="shortcut icon" href="{{ asset('logo/favicon.ico') }}" />

	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/font.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/errors.css') }}">

</head>
<body>

	<h1 id="headerBg"> 403 </h1>

	<div class="container">
	  	<h1>4<div class="lock"><div class="top"></div><div class="bottom"></div></div>3</h1>
	  	<h3>Access denied</h3>

	  	<p> The page you're trying to access has restricted access. </p>

	  	<a href="{{ route('frontend.index') }}" class="button"> Go Back Main Page </a>
	</div>

	<script type="text/javascript">
		const interval = 500;

		function generateLocks() {
		  const lock = document.createElement('div'),
		        position = generatePosition();
		  lock.innerHTML = '<div class="top"></div><div class="bottom"></div>';
		  lock.style.top = position[0];
		  lock.style.left = position[1];
		  lock.classList = 'lock'// generated';
		  document.body.appendChild(lock);
		  setTimeout(()=>{
		    lock.style.opacity = '1';
		    lock.classList.add('generated');
		  },100);
		  setTimeout(()=>{
		    lock.parentElement.removeChild(lock);
		  }, 2000);
		}
		function generatePosition() {
		  const x = Math.round((Math.random() * 100) - 10) + '%';
		  const y = Math.round(Math.random() * 100) + '%';
		  return [x,y];
		}
		setInterval(generateLocks,interval);
		generateLocks();
	</script>

</body>
</html>