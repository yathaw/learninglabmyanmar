<!DOCTYPE html>
<html>
<head>
	<title> Learning Lab Myanmar | Certificate  </title>
	<style type='text/css'>
		@font-face {
		  	font-family: 'Open Sans';
		  	font-style: normal;
		  	font-weight: 400;
		  	src: url(https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFVZ0e.ttf) format('truetype');
		}
		@font-face {
		  	font-family: 'Pinyon Script';
		  	font-style: normal;
		  	font-weight: 400;
		  	src: url(https://fonts.gstatic.com/s/pinyonscript/v11/6xKpdSJbL9-e9LuoeQiDRQR8WOXaPw.ttf) format('truetype');
		}
		@font-face {
		  	font-family: 'Rochester';
		  	font-style: normal;
		  	font-weight: 400;
		  	src: url(https://fonts.gstatic.com/s/rochester/v11/6ae-4KCqVa4Zy6Fif-UC2FHS.ttf) format('truetype');
		}
		.rochester{
			font-family: Rochester;
		}
		.cursive {
		  	font-family: 'Pinyon Script', cursive;
		}
		.sans {
		  	font-family: 'Open Sans', sans-serif;
		}
		.bold {
		  	font-weight: bold;
		}
		.block {
		  	display: block;
		}
		.underline {
		  	border-bottom: 1px solid #777;
		  	padding: 5px;
		  	margin-bottom: 15px;
		}
		.margin-0 {
		  	margin: 0;
		}
		.padding-0 {
		  	padding: 0;
		}
		.pm-empty-space {
		  	height: 40px;
		  	width: 100%;
		}
		body {
		  	padding: 20px 0;
		  	background: #ccc;
		}

		.gray{
			color: #949494;
		}

		.uppercase{
			text-transform: uppercase;
		}
		.text-center{
			text-align: center;
		}

		.center {
		  margin: auto;
		  	/*width: 50%;*/
		}

		#certificate_box{
			/*display: flex;*/
			align-items: center;
			width: 90%;
			margin: auto;
			/*max-width: 22em;*/
			position: relative;
			/*padding: 30% 2em;*/
			box-sizing: border-box;
			color: #000;
			/*background: #FFF;*/
			background-image: url("{{ asset('certificate/background.jpg') }}"); 
			object-fit: cover; 
			background-clip: padding-box;
			/* !importanté */
			border: solid 15px transparent;
			border-image: radial-gradient(#AE8625, #F7EF8A, #D2AC47, #EDC967) 1;
		}
		#certificate_box:before {
			content: '';
			position: absolute;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			z-index: -1;
			margin: -5px;
			/*background: linear-gradient(to right, red, orange);*/
		}

		div.header h1{
			font-size: 108px;
			margin-bottom: 10px;
		}

		div.header h2{
			letter-spacing: 0.4em;
			word-spacing: 0.3;
		}
		div.header p{
			margin: 30px 0px;
			letter-spacing: 0.2em;

		}
		hr {
			background-color: #fff;
			padding: 0;
		}

		hr.hr-1 {
			border: 0;
			height: 1px;
			margin: 0 100px;

			background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
		}

		div.nameDiv h1{
			font-size: 50px;
			padding: 20px 0px;

		}

		h3.coursename{
			padding: 20px 0px;
			letter-spacing: 0.2em;
		}

		div.descriptionDiv p{
			font-size: 20px;
			margin: 0 auto;
		}

		div.footerDiv{
			display: grid;
			/*grid-template-columns: auto auto auto;*/
			grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
			margin: 50px auto;
		}
		
		div.footerDiv{
			padding: 0px 50px;
		}

		img.signature{
			width: 200px;
			display: block;
			margin: 0 auto;
		}
		img.companylogo{
			width: 200px;
			display: block;
			margin: 0 auto;
		}
    </style>

</head>
<body>
	<div id="certificate_box">
		<div class="header center gray">
			<h1 class="cursive text-center padding-0 "> Certificate </h1>
			<h2 class="uppercase text-center sans"> Of Achivement </h2>

			<hr class="hr-1">

			<p class="uppercase text-center sans"> This certificate is proudly to </p>
		</div>

		<div class="nameDiv">
			<h1 class="sans text-center padding-0 "> Ya Thaw Myat Noe </h1>
		</div>

		<div class="descriptionDiv text-center">
			<p class="cursive"> has successfully completed </p>

			<h3 class="sans coursename"> PHP Developer Bootcamp </h3> 
		</div>

		<div class="footerDiv">
			<div class="footer_start">
				<img src="{{ asset('certificate/signature.png') }}" class="signature">
				<hr class="hr-1">
				<p class="text-center"> Signature </p>
			</div>
			<div class="footer_middle">
				<img src="{{ asset('certificate/logo.jpg') }}" class="companylogo">
			</div>
			<div class="footer_end gray">
				<p> <b> Verified At : </b> learninglabmyanmar.com/verify/000000 </p>
				<p> <b> Issue Date : </b> January 3, 2021 </p>
			</div>

		</div>

	</div>






























	
</body>
</html>