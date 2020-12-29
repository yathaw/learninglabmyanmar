<x-frontend>


	<!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      	<div class="container">

        	<div class="d-flex justify-content-between align-items-center">
          		<h2> All Courses </h2>
          		<ol>
            		<li><a href="{{ route('frontend.index') }}">Home</a></li>
            		<li> All Courses </li>
          		</ol>
        	</div>

      	</div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page showdata">
      	<div class="container">

      		<div class="row">
      			<div class="col-12 ">
      				<div class="card bg-light border-0">
      					<div class="card-body">
      						<div class="row">
      							<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
      								@php 
							        	$count = count($courses);
							        	$total = count($allcourses);
							        	
							        @endphp

      								<p> Showing {{$count}} of {{$total}} Results  </p>
      							</div>

      							<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
      								<div class="searchInputWrapper float-right mr-4">
									    <input class="searchInput" type="text" placeholder='focus here to search' data-user_id = "{{Auth::id()}}" @if(Auth::user() && Auth::user()->instructor) data-instructor = "{{Auth::user()->instructor->id}}" @endif>
									    	<i class='searchInputIcon bx bx-search-alt-2' ></i>
									</div>
      							</div>
      						</div>

      						
      					</div>
      				</div>
      			</div>
      		</div>

			<section id="portfolio" class="portfolio">
		      	<div class="container">

			        <div class="section-title">
			          	<h2> All Courses </h2>
			        </div>
			       
			        <div class="searchcourseshow">

			        	@if ($courses->isEmpty())
   						<div class="row justify-content-center">
							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-10 col-10 py-5">
	   						
				                <svg id="b7da5827-4560-4d63-9360-f6e9beb837fe" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1104.46862 797.51507"><title>searching</title><rect x="959.04901" y="388.46353" width="9.83152" height="388.34522" fill="#3f3d56"/><path d="M1107.38,489.19613c.62586,135.79464-94.91286,246.32062-94.91286,246.32062s-96.55343-109.64065-97.17929-245.4353,94.91286-246.32062,94.91286-246.32062S1106.75418,353.40148,1107.38,489.19613Z" transform="translate(-47.76569 -51.24247)" fill="#3f3d56"/><rect x="767.24391" y="571.18561" width="5.05659" height="199.73514" fill="#3f3d56"/><path d="M866.73273,647.882c.3219,69.8424-48.81593,126.68852-48.81593,126.68852s-49.65971-56.39078-49.98161-126.23318,48.81593-126.68852,48.81593-126.68852S866.41084,578.03962,866.73273,647.882Z" transform="translate(-47.76569 -51.24247)" fill="#3f3d56"/><ellipse cx="871.96862" cy="776.51507" rx="137" ry="21" fill="#3f3d56"/><path d="M931.0336,338.32371c-11.60691-19.61209-34.57027-20.5261-34.57027-20.5261s-22.37648-2.86148-36.73085,27.008c-13.37942,27.84079-31.84473,54.72165-2.97276,61.239l5.21511-16.23177,3.22969,17.4402a112.96671,112.96671,0,0,0,12.35324.21113c30.91954-.99827,60.36573.29206,59.4176-10.80317C935.715,381.91142,942.20179,357.19447,931.0336,338.32371Z" transform="translate(-47.76569 -51.24247)" fill="#2f2e41"/><path d="M889.23431,375.25753s15,21,6,38,21,35,21,35l22-48s-26-17-19-33Z" transform="translate(-47.76569 -51.24247)" fill="#fbbebe"/><circle cx="851.46862" cy="307.01507" r="26" fill="#fbbebe"/><path d="M809.25482,388.31339l21.72805-28.03376s7.6506-29.38483,18.73125-27.89516-4.3766,35.23982-4.3766,35.23982l-21.58945,31.03056Z" transform="translate(-47.76569 -51.24247)" fill="#fbbebe"/><polygon points="871.469 710.015 878.469 747.015 893.469 751.015 889.469 707.015 871.469 710.015" fill="#fbbebe"/><polygon points="1022.469 670.015 1049.469 707.015 1060.469 712.015 1069.469 697.015 1042.469 662.015 1022.469 670.015" fill="#fbbebe"/><path d="M913.23431,432.25753l-16.6811-21.95933s-32.3189,5.95933-35.3189,8.95933,8,58,8,58,2,15,11,23l9,6,74-15,2.78246-32.9258a86.41011,86.41011,0,0,0-22.78243-66.07417l0,0-12.8758,1.76022Z" transform="translate(-47.76569 -51.24247)" fill="#575a89"/><path d="M865.23431,421.25753l-5-2-23-2s-8-2-6-6,4-5,0-6-5-2-4-5,7-9,7-9l-17-14s-.9201.65081-2.4073,1.85491c-8.44043,6.83376-35.14719,31.48943-15.5927,56.14509,23,29,50,46,72,40Z" transform="translate(-47.76569 -51.24247)" fill="#575a89"/><path d="M887.23431,501.25753v14s-9,17-6,33,4,24,4,24a136.53331,136.53331,0,0,0,7,40c7,20-16,151,13,153s45,4,54-6-15-182-15-182,82,171,99,164,60-23,55-32-131-209-131-209l-4-9Z" transform="translate(-47.76569 -51.24247)" fill="#2f2e41"/><path d="M935.23431,791.25753s-16-1-16,4-8,22-8,22-6,20,10,18,26-20,26-20l-4-19Z" transform="translate(-47.76569 -51.24247)" fill="#2f2e41"/><path d="M1102.23431,756.25753s-14-9-13-3,2,22,9,23,28,7,29,9,25,10,25-3-15-23-15-23l-17-13s-11-1-13,6S1102.23431,756.25753,1102.23431,756.25753Z" transform="translate(-47.76569 -51.24247)" fill="#2f2e41"/><circle cx="851.50812" cy="266.65448" r="16.60376" fill="#2f2e41"/><path d="M880.92228,313.52753a16.60441,16.60441,0,0,1,14.856-16.51042,16.77219,16.77219,0,0,0-1.74776-.09334,16.60376,16.60376,0,1,0,0,33.20753,16.77219,16.77219,0,0,0,1.74776-.09334A16.60442,16.60442,0,0,1,880.92228,313.52753Z" transform="translate(-47.76569 -51.24247)" fill="#2f2e41"/><polygon points="878.136 285.191 855.45 273.307 824.12 278.169 817.638 306.797 833.774 306.176 838.282 295.659 838.282 306.003 845.727 305.717 850.048 288.972 852.749 306.797 879.217 306.257 878.136 285.191" fill="#2f2e41"/><path d="M924.54355,503.57426l-34.98722.94591s-29.85391,5.809-28.17895-6.24071,30.79949-7.83525,30.79949-7.83525l31.88021-4.86338Z" transform="translate(-47.76569 -51.24247)" fill="#fbbebe"/><path d="M952.22557,390.5624a7.46667,7.46667,0,0,1,8.23586,5.128c6.84947,21.584,27.95077,93.81336,6.98533,103.72285-24.69358,11.67164-42.714,11.15847-42.714,11.15847l-9.64534-23.748,8.78051-8.24031,9.37441-60.27537,4.492-25.55049Z" transform="translate(-47.76569 -51.24247)" fill="#575a89"/><polygon points="897.969 379.515 893.969 419.515 858.969 434.515 897.969 425.515 897.969 379.515" opacity="0.4"/><path d="M756.98,298.70514h0a46.83994,46.83994,0,0,1,27.35248,19.86961l3.27083,5.06568.16459.20953L845.153,340.64134a4.18288,4.18288,0,0,1,2.86079,5.11516l-4.45513,16.335a4.18288,4.18288,0,0,1-5.16148,2.92785l-57.3995-16.04387-.00125.0016-5.76486,2.1795a51.51527,51.51527,0,0,1-33.12186,1.12567h0Z" transform="translate(-47.76569 -51.24247)" fill="#3f3d56"/><ellipse cx="811.10661" cy="344.23329" rx="3.50423" ry="6.57042" transform="translate(205.17511 974.78362) rotate(-73.69006)" fill="#575a89"/><circle cx="766.71601" cy="294.13977" r="2.40916" fill="#3f3d56"/><ellipse cx="749.69389" cy="325.72758" rx="28.09043" ry="12.70282" transform="translate(160.84035 887.15413) rotate(-72.0342)" fill="#f9a826"/><path d="M759.99372,329.12386c4.61092-14.21979,3.35687-27.4722-2.7109-30.35509a5.89148,5.89148,0,0,1,1.07554.238c6.67348,2.164,8.20424,15.88146,3.419,30.639s-14.07438,24.96651-20.7479,22.80258a5.86342,5.86342,0,0,1-.70807-.28386C746.88566,353.00035,755.46051,343.10408,759.99372,329.12386Z" transform="translate(-47.76569 -51.24247)" opacity="0.4"/><path d="M757.73431,298.75753,627.49655,197.73229a861.92171,861.92171,0,0,1-66.21511-57.3855C524.15612,104.95908,473.758,76.666,415.0802,61.6025,272.519,25.00485,159.58154,89.89694,108.21435,185.18075c-78.49457,145.60388-138.65021,381.8794,209.394,256.11011,76.11683-27.50562,153.1648-30.42932,211.58594-44.91773l211.54-43.6156Z" transform="translate(-47.76569 -51.24247)" fill="#f9a826"/><circle cx="318.96862" cy="70.51507" r="7" fill="#f2f2f2"/><polygon points="454.949 86.695 453.127 86.695 453.127 84.873 452.771 84.873 452.771 86.695 450.949 86.695 450.949 87.051 452.771 87.051 452.771 88.873 453.127 88.873 453.127 87.051 454.949 87.051 454.949 86.695" fill="#f2f2f2"/><polygon points="637.949 238.695 636.127 238.695 636.127 236.873 635.771 236.873 635.771 238.695 633.949 238.695 633.949 239.051 635.771 239.051 635.771 240.873 636.127 240.873 636.127 239.051 637.949 239.051 637.949 238.695" fill="#f2f2f2"/><polygon points="624.949 285.695 623.127 285.695 623.127 283.873 622.771 283.873 622.771 285.695 620.949 285.695 620.949 286.051 622.771 286.051 622.771 287.873 623.127 287.873 623.127 286.051 624.949 286.051 624.949 285.695" fill="#f2f2f2"/><polygon points="65.949 325.695 64.127 325.695 64.127 323.873 63.771 323.873 63.771 325.695 61.949 325.695 61.949 326.051 63.771 326.051 63.771 327.873 64.127 327.873 64.127 326.051 65.949 326.051 65.949 325.695" fill="#f2f2f2"/><polygon points="145.949 107.695 144.127 107.695 144.127 105.873 143.771 105.873 143.771 107.695 141.949 107.695 141.949 108.051 143.771 108.051 143.771 109.873 144.127 109.873 144.127 108.051 145.949 108.051 145.949 107.695" fill="#f2f2f2"/><polygon points="456.949 293.695 455.127 293.695 455.127 291.873 454.771 291.873 454.771 293.695 452.949 293.695 452.949 294.051 454.771 294.051 454.771 295.873 455.127 295.873 455.127 294.051 456.949 294.051 456.949 293.695" fill="#f2f2f2"/><polygon points="265.949 43.695 264.127 43.695 264.127 41.873 263.771 41.873 263.771 43.695 261.949 43.695 261.949 44.051 263.771 44.051 263.771 45.873 264.127 45.873 264.127 44.051 265.949 44.051 265.949 43.695" fill="#f2f2f2"/><path d="M314.41494,238.91546l-2.27.35c.71,4.54,1.27,9.18,1.68,13.77l2.29-.2C315.70492,248.18548,315.13492,243.50549,314.41494,238.91546Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M308.20492,211.57544l-2.2.67c1.33,4.4,2.52,8.91,3.53,13.4l2.25-.51C310.75491,220.59546,309.54495,216.03546,308.20492,211.57544Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M298.29495,185.35547l-2.09.96c1.92,4.19,3.72,8.49,5.35,12.79l2.15-.81C302.055,193.94543,300.245,189.58545,298.29495,185.35547Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M284.89493,160.77545l-1.94,1.23c2.47,3.87994,4.84,7.9,7.04,11.93l2.02-1.1C289.79495,168.75549,287.39493,164.69543,284.89493,160.77545Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M268.235,138.24548l-1.75,1.49c2.98,3.5,5.88,7.16,8.62,10.86l1.84-1.37C274.1849,145.48547,271.25491,141.78546,268.235,138.24548Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M248.65493,118.18548l-1.53,1.71c3.44,3.07,6.81,6.3,10.02,9.59l1.65-1.61C255.545,124.54547,252.13492,121.28546,248.65493,118.18548Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M226.53494,100.96545l-1.29,1.9c3.82,2.57,7.6,5.31,11.23,8.14l1.42-1.81006C234.21493,106.33545,230.39493,103.56549,226.53494,100.96545Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M206.40493,89.00549v2.6c2.39,1.25,4.76,2.56,7.08,3.9l1.15-1.99Q210.58489,91.17544,206.40493,89.00549Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M314.5699,267.22119l2.29863-.04178c.04223,2.3211.04537,4.65451.00942,6.93607l-2.29844-.03589C314.61446,271.824,314.61145,269.51646,314.5699,267.22119Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M179.41494,435.91546l-2.27.35c.71,4.54,1.27,9.18,1.68,13.77l2.29-.2C180.70492,445.18548,180.13492,440.50549,179.41494,435.91546Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M173.20492,408.57544l-2.2.67c1.33,4.4,2.52,8.91,3.53,13.4l2.25-.51C175.75491,417.59546,174.545,413.03546,173.20492,408.57544Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M163.295,382.35547l-2.09.96c1.92,4.19,3.72,8.49,5.35,12.79l2.15-.81C167.055,390.94543,165.245,386.58545,163.295,382.35547Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M149.89493,357.77545l-1.94,1.23c2.47,3.87994,4.84,7.9,7.04,11.93l2.02-1.1C154.795,365.75549,152.39493,361.69543,149.89493,357.77545Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M133.235,335.24548l-1.75,1.49c2.98,3.5,5.88,7.16,8.62,10.86l1.84-1.37C139.1849,342.48547,136.25491,338.78546,133.235,335.24548Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M113.65493,315.18548l-1.53,1.71c3.44,3.07,6.81,6.3,10.02,9.59l1.65-1.61C120.545,321.54547,117.13492,318.28546,113.65493,315.18548Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M91.53494,297.96545l-1.29,1.9c3.81995,2.57,7.6,5.31,11.23,8.14l1.42-1.81006C99.21493,303.33545,95.39493,300.56549,91.53494,297.96545Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M71.40493,286.00549v2.6c2.39,1.25,4.76,2.56,7.08,3.9l1.15-1.99Q75.58489,288.17544,71.40493,286.00549Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M179.5699,464.22119l2.29863-.04178c.04223,2.3211.04537,4.65451.00942,6.93607l-2.29844-.03589C179.61446,468.824,179.61145,466.51646,179.5699,464.22119Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M641.41494,336.91546l-2.27.35c.71,4.54,1.27,9.18,1.68,13.77l2.29-.2C642.70492,346.18548,642.13492,341.50549,641.41494,336.91546Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M635.20492,309.57544l-2.2.67c1.33,4.4,2.52,8.91,3.53,13.4l2.25-.51C637.75491,318.59546,636.545,314.03546,635.20492,309.57544Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M625.295,283.35547l-2.09.96c1.92,4.19,3.72,8.49,5.35,12.79l2.15-.81C629.055,291.94543,627.245,287.58545,625.295,283.35547Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M611.89493,258.77545l-1.94,1.23c2.47,3.87994,4.84,7.9,7.04,11.93l2.02-1.1C616.795,266.75549,614.39493,262.69543,611.89493,258.77545Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M595.235,236.24548l-1.75,1.49c2.98,3.5,5.88,7.16,8.62,10.86l1.84-1.37C601.1849,243.48547,598.25491,239.78546,595.235,236.24548Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M575.65493,216.18548l-1.53,1.71c3.44,3.07,6.81,6.3,10.02,9.59l1.65-1.61C582.545,222.54547,579.13492,219.28546,575.65493,216.18548Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M553.53494,198.96545l-1.29,1.9c3.82,2.57,7.6,5.31,11.23,8.14l1.42-1.81006C561.21493,204.33545,557.39493,201.56549,553.53494,198.96545Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M533.40493,187.00549v2.6c2.39,1.25,4.76,2.56,7.08,3.9l1.15-1.99Q537.58489,189.17544,533.40493,187.00549Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M641.5699,365.22119l2.29863-.04178c.04223,2.3211.04537,4.65451.00942,6.93607l-2.29844-.03589C641.61446,369.824,641.61145,367.51646,641.5699,365.22119Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><polygon points="149.295 199.895 147.6 199.895 147.6 198.199 147.269 198.199 147.269 199.895 145.573 199.895 145.573 200.225 147.269 200.225 147.269 201.921 147.6 201.921 147.6 200.225 149.295 200.225 149.295 199.895" fill="#f2f2f2"/><polygon points="129.754 302.252 128.059 302.252 128.059 300.556 127.728 300.556 127.728 302.252 126.032 302.252 126.032 302.583 127.728 302.583 127.728 304.278 128.059 304.278 128.059 302.583 129.754 302.583 129.754 302.252" fill="#f2f2f2"/><polygon points="72.417 391.959 70.721 391.959 70.721 390.264 70.39 390.264 70.39 391.959 68.695 391.959 68.695 392.29 70.39 392.29 70.39 393.986 70.721 393.986 70.721 392.29 72.417 392.29 72.417 391.959" fill="#f2f2f2"/><path d="M279.68428,329.42536a122.81116,122.81116,0,1,1,56.98177,45.75139,39.726,39.726,0,1,1-56.98177-45.75139Z" transform="translate(-47.76569 -51.24247)" fill="#3f3d56"/><path d="M380.89379,190.67942c28.154,0,47.524,15.61609,47.524,38.06422,0,14.86532-7.20743,25.15092-21.09674,33.33435-13.06346,7.58282-17.493,13.13854-17.493,22.74844h0a5.93109,5.93109,0,0,1-5.9311,5.9311H369.504a5.9311,5.9311,0,0,1-5.9275-5.72432l-.02555-.73233c-1.27631-15.466,4.12926-25.07584,17.71827-33.034,12.68807-7.58282,18.01856-12.38777,18.01856-21.69736s-9.00928-16.14163-20.1958-16.14163c-8.50252,0-15.23133,4.13864-18.31771,10.8956a13.25248,13.25248,0,0,1-12.112,7.57343h0c-9.752,0-16.19427-10.37059-11.63357-18.99048C344.24307,199.27078,359.46494,190.67942,380.89379,190.67942ZM361.14844,319.362c0-8.63389,7.20743-15.46594,16.06655-15.46594,8.93421,0,16.14162,6.757,16.14162,15.46594s-7.20743,15.466-16.14163,15.466-16.06655-6.757-16.06655-15.466Z" transform="translate(-47.76569 -51.24247)" fill="#f9a826"/></svg>


						    </div>


						    <div class="col-10 justify-content-center text-center">
	                        	<h4 class="mt-5"> Sorry,There is no course. </h4>
						    </div>
						</div>
					    

			        @else

				        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
					        @foreach($courses as $course)

					        	<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
					        		<div class="card courseCard h-100 border-0">
					        			<div class="card-img-wrapper">
					        				<a href="{{route('course',$course->id)}}">
									      		<img src="{{ asset($course->image) }}" class="card-img-top" alt="...">
									      	</a>
								      	</div>
								      	<div class="card-body">
								      		<div class="card-title">
								      			<a href="{{route('course',$course->id)}}" class="text-decoration-none text-muted">
									      			<h4 class="fontbold text-dark"> {{$course->title}}</h4>
									      		</a>

									      		@php 

									      			$array = array();
									      		@endphp
									      		

									      		{{-- check auth --}}
									      		@if(Auth::user())
									      		@if(!Auth::user()->company)

									      		{{-- check role business --}}
									      		
									      		{{-- check course instructor --}}
									      		@if(count($course->instructors) == 0)

									      			@php
								      					array_push($array, "true");
								      				@endphp
								      			@endif
									      		{{-- end check course instructor --}}


									      		{{-- check auth instructor --}}
									      		@if(Auth::user()->instructor)


									      		@foreach($course->instructors as $instructor)

									      			@if($instructor->pivot->instructor_id != Auth::user()->instructor->id)

									      				@php
									      					array_push($array, "true");
									      				@endphp
			

									      			@endif


									      		@endforeach


									      		{{-- check auth instructor --}}

									      		@else
							        			
								      			<a class="favouriteBtn one
								      			@foreach($wishlists as $wishlist)
								      			@if($wishlist->course_id == $course->id && Auth::id() == $wishlist->user_id)

								      				active

												@endif 
												@endforeach
												mobile button--secondary float-right wishlist" data-course_id = "{{$course->id}}">
												    <div class="btn__effect">
												      	<svg width="515.99" height="480.73" class="heart-stroke icon-svg icon-svg--size-4 icon-svg--color-silver" viewBox="20 18 29 28" aria-hidden="true" focusable="false"><path d="M28.3 21.1a4.3 4.3 0 0 1 4.1 2.6 2.5 2.5 0 0 0 2.3 1.7c1 0 1.7-.6 2.2-1.7a3.7 3.7 0 0 1 3.7-2.6c2.7 0 5.2 2.7 5.3 5.8.2 4-5.4 11.2-9.3 15a2.8 2.8 0 0 1-2 1 3.4 3.4 0 0 1-2.2-1c-9.6-10-9.4-13.2-9.3-15 0-1 .6-5.8 5.2-5.8m0-3c-5.3 0-7.9 4.3-8.2 8.5-.2 3.2.4 7.2 10.2 17.4a6.3 6.3 0 0 0 4.3 1.9 5.7 5.7 0 0 0 4.1-1.9c1.1-1 10.6-10.7 10.3-17.3-.2-4.6-4-8.6-8.4-8.6a7.6 7.6 0 0 0-6 2.7 8.1 8.1 0 0 0-6.2-2.7z"></path></svg>
												      	<svg class="heart-full icon-svg icon-svg--size-4 icon-svg--color-blue" viewBox="0 0 19.2 18.5" aria-hidden="true" focusable="false"><path d="M9.66 18.48a4.23 4.23 0 0 1-2.89-1.22C.29 10.44-.12 7.79.02 5.67.21 2.87 1.95.03 5.42.01c1.61-.07 3.16.57 4.25 1.76A5.07 5.07 0 0 1 13.6 0c2.88 0 5.43 2.66 5.59 5.74.2 4.37-6.09 10.79-6.8 11.5-.71.77-1.7 1.21-2.74 1.23z"></path></svg>
												      	<svg class="broken-heart" xmlns="http://www.w3.org/2000/svg" width="48" height="16" viewBox="5.707 17 48 16"><g fill="#F48FB1">
												  		<path class="broken-heart--left" d="M29.865 32.735V18.703a4.562 4.562 0 0 0-3.567-1.476c-2.916.017-4.378 2.403-4.538 4.756-.118 1.781.227 4.006 5.672 9.737a3.544 3.544 0 0 0 2.428 1.025l-.008-.008.013-.002z"/>
												  		<path class="broken-heart--right" d="M37.868 22.045c-.135-2.588-2.277-4.823-4.697-4.823a4.258 4.258 0 0 0-3.302 1.487l-.004-.003v14.035a3.215 3.215 0 0 0 2.289-1.033c.598-.596 5.882-5.99 5.714-9.663z"/></g>
												  		<path class="broken-heart--crack" fill="none" stroke="#FFF" stroke-miterlimit="10" d="M29.865 18.205v14.573"/></svg>
												      	
												      	<div class="effect-group">
												        	<span class="effect"></span>
												        	<span class="effect"></span>
												        	<span class="effect"></span>
												        	<span class="effect"></span>
												        	<span class="effect"></span>
												      	</div>
												    </div>
												</a>
												@endif
												{{-- check auth instructor --}}

							        			
												{{-- check data array --}}
							        			@if($array)

							        				<a class="favouriteBtn one
									      			@foreach($wishlists as $wishlist)
									      			@if($wishlist->course_id == $course->id && Auth::id() == $wishlist->user_id)

									      				active

													@endif 
													@endforeach
													mobile button--secondary float-right wishlist" data-course_id = "{{$course->id}}">
													    <div class="btn__effect">
													      	<svg width="515.99" height="480.73" class="heart-stroke icon-svg icon-svg--size-4 icon-svg--color-silver" viewBox="20 18 29 28" aria-hidden="true" focusable="false"><path d="M28.3 21.1a4.3 4.3 0 0 1 4.1 2.6 2.5 2.5 0 0 0 2.3 1.7c1 0 1.7-.6 2.2-1.7a3.7 3.7 0 0 1 3.7-2.6c2.7 0 5.2 2.7 5.3 5.8.2 4-5.4 11.2-9.3 15a2.8 2.8 0 0 1-2 1 3.4 3.4 0 0 1-2.2-1c-9.6-10-9.4-13.2-9.3-15 0-1 .6-5.8 5.2-5.8m0-3c-5.3 0-7.9 4.3-8.2 8.5-.2 3.2.4 7.2 10.2 17.4a6.3 6.3 0 0 0 4.3 1.9 5.7 5.7 0 0 0 4.1-1.9c1.1-1 10.6-10.7 10.3-17.3-.2-4.6-4-8.6-8.4-8.6a7.6 7.6 0 0 0-6 2.7 8.1 8.1 0 0 0-6.2-2.7z"></path></svg>
													      	<svg class="heart-full icon-svg icon-svg--size-4 icon-svg--color-blue" viewBox="0 0 19.2 18.5" aria-hidden="true" focusable="false"><path d="M9.66 18.48a4.23 4.23 0 0 1-2.89-1.22C.29 10.44-.12 7.79.02 5.67.21 2.87 1.95.03 5.42.01c1.61-.07 3.16.57 4.25 1.76A5.07 5.07 0 0 1 13.6 0c2.88 0 5.43 2.66 5.59 5.74.2 4.37-6.09 10.79-6.8 11.5-.71.77-1.7 1.21-2.74 1.23z"></path></svg>
													      	<svg class="broken-heart" xmlns="http://www.w3.org/2000/svg" width="48" height="16" viewBox="5.707 17 48 16"><g fill="#F48FB1">
													  		<path class="broken-heart--left" d="M29.865 32.735V18.703a4.562 4.562 0 0 0-3.567-1.476c-2.916.017-4.378 2.403-4.538 4.756-.118 1.781.227 4.006 5.672 9.737a3.544 3.544 0 0 0 2.428 1.025l-.008-.008.013-.002z"/>
													  		<path class="broken-heart--right" d="M37.868 22.045c-.135-2.588-2.277-4.823-4.697-4.823a4.258 4.258 0 0 0-3.302 1.487l-.004-.003v14.035a3.215 3.215 0 0 0 2.289-1.033c.598-.596 5.882-5.99 5.714-9.663z"/></g>
													  		<path class="broken-heart--crack" fill="none" stroke="#FFF" stroke-miterlimit="10" d="M29.865 18.205v14.573"/></svg>
													      	
													      	<div class="effect-group">
													        	<span class="effect"></span>
													        	<span class="effect"></span>
													        	<span class="effect"></span>
													        	<span class="effect"></span>
													        	<span class="effect"></span>
													      	</div>
													    </div>
													</a>

							        			@endif
							        			@endif
							        			{{-- end check data array --}}
							        			@endif
							        			{{-- end check auth --}}
												



								        		{{-- <p class="card-text fst-italic text-muted">
								        			
								        			@foreach($course->instructors as $instructor)
								        				{{$instructor->user->name}}
								        				@php
								        					$instructor = $instructor->user->name;
								        				@endphp
								        			@endforeach
								        		</p> --}}

								        		<div class="rating">
								        			<i class='bx bxs-star custom_primary_Color'></i>
								        			<i class='bx bxs-star custom_primary_Color'></i>
								        			<i class='bx bxs-star custom_primary_Color' ></i>
								        			<i class='bx bxs-star-half custom_primary_Color' ></i>

								        			<i class='bx bx-star' ></i>
								        		</div>

								        		<div class="price">
								        			<span class="text-danger fs-5"> {{$course->price}} Ks  </span> 

										    		{{-- <span class="text-decoration-line-through text-muted"> 
										    		55,000 Ks </span> --}}

										    		<i class='bx bxs-purchase-tag text-danger' ></i>
								        		</div>

								      		</div>
								        	

								        	<div class="card-content">
									            <small class="card-text text-muted" >

									            	{!! \Illuminate\Support\Str::limit($course->subtitle, 80) !!}
									            </small>
									            
									            <div class="d-grid gap-2 col-6 mx-auto">

									            	

									            	@if(Auth::user() && Auth::user()->getRoleNames()[0] != "Business")

									            	@if(Auth::user()->sales)
									            	@if(!Auth::user()->company)



									            	@php
									            		$pending_array = array();
									            		$purched_array = array();
									            		$count_sale = count(Auth::user()->sales);
									            	@endphp

									            		@if($count_sale > 0)
										            		@foreach(Auth::user()->sales as $sales)
										            			@foreach($sales->courses as $course_sale)
										            			

										            				@if($course_sale->pivot->course_id == $course->id && $course_sale->pivot->status == 0)

										            					@php
										            						array_push($pending_array, 'true')
										            					@endphp

										            					<button disabled="disabled" class="btn custom_primary_btnColor mt-3">Pending</button>

										            				@elseif($course_sale->pivot->course_id == $course->id && $course_sale->pivot->status == 1)
										            					@php
										            						array_push($purched_array, 'true')
										            					@endphp
										            				@endif
										            			@endforeach
										            		@endforeach

											            		@if($purched_array)
											            			 <a href="{{route('lecture',$course->id)}}" class="btn custom_primary_btnColor mt-3">Go to Course</a>
											            		@endif


										            	@endif
										            @endif

									            		

									            	@foreach($course->instructors as $instructor)
									      				@if(Auth::user()->instructor)


									      					@if($instructor->pivot->instructor_id != Auth::user()->instructor->id && !$purched_array && !$pending_array)


												            	<a href="javascript:void(0)" class="btn custom_primary_btnColor mt-3 addtocart"
												            	data-id="{{$course->id}}" data-course_title="{{$course->title}}" data-instructor = "{{$instructor}}" data-user_id = "{{Auth::id()}}" data-price = "{{$course->price}}" data-image = "{{$course->image}}"
												            	 	{{-- for wishlist --}}
														      		@foreach($wishlists as $wishlist)
													      			@if($wishlist->course_id == $course->id && Auth::id() == $wishlist->user_id)

													      			data-wishlist = "save"

																	@endif 
																	@endforeach
																	
																	>
																	Purchase
												            	</a>
												           
												            @endif
												            @elseif(!$purched_array && !$pending_array)
												            	<a href="javascript:void(0)" class="btn custom_primary_btnColor mt-3 addtocart"
												            	data-id="{{$course->id}}" data-course_title="{{$course->title}}" data-instructor = "{{$instructor}}" data-user_id = "{{Auth::id()}}" data-price = "{{$course->price}}" data-image = "{{$course->image}}"
												            	 	{{-- for wishlist --}}
														      		@foreach($wishlists as $wishlist)
													      			@if($wishlist->course_id == $course->id && Auth::id() == $wishlist->user_id)

													      			data-wishlist = "save"

																	@endif 
																	@endforeach
																	
																	>
												            	Purchase
												            	</a>
												            
												            	@php
												            	 break;
												            	@endphp
										            	@endif
										            @endforeach



										            
										            @else()
										            	<button disabled="disabled" class="btn custom_primary_btnColor mt-3">Purchase</button>
										            @endif
										            @endif




										        </div>

									        </div>
								      	</div>
								    </div>
					        	</div>

					        @endforeach
					    </div>
					@endif

			        </div>
			        
			        
			        <nav aria-label="Page navigation example" class="mt-5 paginate">
					  	<ul class="pagination justify-content-center">
							{!! $courses->links() !!}
					  	</ul>
					</nav>

		      	</div>

		      	<div class="container">
			        
		      	</div>

		      	
		            
		       
		    </section>
		</div>
	</section>



@section('script_content')
<script type="text/javascript">
	$(document).ready(function() {

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$('.searchInput').keyup(function(){
			var search_data = $(this).val();
			var user_id = $(this).data('user_id');
			var instructor_data = $(this).data('instructor');
			// alert(instructor);
			var style = "";
			var html = "";
			var instructor = "";
			var heart = false;
			var sale =  new Array();
			var subtitle;

			$.post("{{route('courses_search')}}",{data:search_data},function(data){
				
				if(data.length > 0){
					html += `<div class="row justify-content-center">`;

					$.each(data,function(i,v){
						subtitle = v.subtitle.slice(0,60);
						
						html+=`<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
			        		<div class="card courseCard h-100 border-0">
			        			<div class="card-img-wrapper">
			        				<a href="{{route('course',':id')}}">
							      		<img src="${v.image}" class="card-img-top" alt="...">
							      	</a>
						      	</div>
						      	<div class="card-body">
						      		<div class="card-title">
						      			<a href="{{route('course',':course_id')}}" class="text-decoration-none text-muted">
							      			<h4 class="fontbold text-dark"> ${v.title} </h4>
							      		</a>`;



							      		if(user_id){
							      		$.each(v.instructors,function(a,b){
							      			// console.log(b.pivot.instructor_id , instructor_data)
						        			
						        			if(b.pivot.instructor_id != instructor_data){
						        				heart = true;
						        			}
						        			
						        		});
						        		}

						        		$.each(v.sales,function(c,d){
						        			
							        			if(d.pivot.status == 1 && d.user_id == user_id){
							        				sale = "true";
							        			}else if(d.pivot.status == 0 && d.user_id == user_id) {
							        				sale = "false";
							        			}
						        			
						        		})
						        		console.log(v.sales);
						        		console.log(user_id);


						        		if(heart == true){
						        			

						      			html+=`<a class="favouriteBtn one `;  
						      			$.each(v.wishlists,function(w,l){
											if(l.user_id == user_id && l.course_id == v.id){
												
												html += `active`;
											}
										})

						      			html+=` mobile button--secondary float-right wishlists" data-course_id = "${v.id}">
										    <div class="btn__effect" >
										      	<svg width="515.99" height="480.73" class="heart-stroke icon-svg icon-svg--size-4 icon-svg--color-silver" viewBox="20 18 29 28" aria-hidden="true" focusable="false"><path d="M28.3 21.1a4.3 4.3 0 0 1 4.1 2.6 2.5 2.5 0 0 0 2.3 1.7c1 0 1.7-.6 2.2-1.7a3.7 3.7 0 0 1 3.7-2.6c2.7 0 5.2 2.7 5.3 5.8.2 4-5.4 11.2-9.3 15a2.8 2.8 0 0 1-2 1 3.4 3.4 0 0 1-2.2-1c-9.6-10-9.4-13.2-9.3-15 0-1 .6-5.8 5.2-5.8m0-3c-5.3 0-7.9 4.3-8.2 8.5-.2 3.2.4 7.2 10.2 17.4a6.3 6.3 0 0 0 4.3 1.9 5.7 5.7 0 0 0 4.1-1.9c1.1-1 10.6-10.7 10.3-17.3-.2-4.6-4-8.6-8.4-8.6a7.6 7.6 0 0 0-6 2.7 8.1 8.1 0 0 0-6.2-2.7z"></path></svg>
										      	<svg class="heart-full icon-svg icon-svg--size-4 icon-svg--color-blue" viewBox="0 0 19.2 18.5" aria-hidden="true" focusable="false"><path d="M9.66 18.48a4.23 4.23 0 0 1-2.89-1.22C.29 10.44-.12 7.79.02 5.67.21 2.87 1.95.03 5.42.01c1.61-.07 3.16.57 4.25 1.76A5.07 5.07 0 0 1 13.6 0c2.88 0 5.43 2.66 5.59 5.74.2 4.37-6.09 10.79-6.8 11.5-.71.77-1.7 1.21-2.74 1.23z"></path></svg>
										      	<svg class="broken-heart" xmlns="http://www.w3.org/2000/svg" width="48" height="16" viewBox="5.707 17 48 16"><g fill="#F48FB1">
										  		<path class="broken-heart--left" d="M29.865 32.735V18.703a4.562 4.562 0 0 0-3.567-1.476c-2.916.017-4.378 2.403-4.538 4.756-.118 1.781.227 4.006 5.672 9.737a3.544 3.544 0 0 0 2.428 1.025l-.008-.008.013-.002z"/>
										  		<path class="broken-heart--right" d="M37.868 22.045c-.135-2.588-2.277-4.823-4.697-4.823a4.258 4.258 0 0 0-3.302 1.487l-.004-.003v14.035a3.215 3.215 0 0 0 2.289-1.033c.598-.596 5.882-5.99 5.714-9.663z"/></g>
										  		<path class="broken-heart--crack" fill="none" stroke="#FFF" stroke-miterlimit="10" d="M29.865 18.205v14.573"/></svg>
										      	
										      	<div class="effect-group">
										        	<span class="effect"></span>
										        	<span class="effect"></span>
										        	<span class="effect"></span>
										        	<span class="effect"></span>
										        	<span class="effect"></span>
										      	</div>
										    </div>
										</a>
						        		<p class="card-text fst-italic text-muted">`;
						        		}


						        		$.each(v.instructors,function(a,b){

						        			instructor = b.user.name;
						        			html+= `${b.user.name}`;
						        		});

						        		html+=`</p>

						        		<div class="rating">
						        			<i class='bx bxs-star custom_primary_Color'></i>
						        			<i class='bx bxs-star custom_primary_Color'></i>
						        			<i class='bx bxs-star custom_primary_Color' ></i>
						        			<i class='bx bxs-star-half custom_primary_Color' ></i>

						        			<i class='bx bx-star' ></i>
						        		</div>

						        		<div class="price">
						        			<span class="text-danger fs-5"> ${v.price} Ks  </span> 

								    		<i class='bx bxs-purchase-tag text-danger' ></i>
						        		</div>

						      		</div>
						        	

						        	<div class="card-content">
							            <small class="card-text text-muted">
							            	${subtitle}
							            </small>
							            <div class="d-grid gap-2 col-6 mx-auto">`;

							            if(heart == true && v.sales.length < 1){
								        html +=  `<a href="javascript:void(0)" class="btn custom_primary_btnColor mt-3 cart" data-id="${v.id}" data-course_title="${v.title}" data-instructor = "${instructor}" data-user_id = "{{Auth::id()}}" data-price = "${v.price}" data-image = "${v.image}" `;


								            	$.each(v.wishlists,function(w,l){
													if(l.user_id == user_id && l.course_id == v.id){
														
														html += `data-wishlist = "save"`;
														}
													})	 
										      		
									      			html+= `>
								            	Purchase
								            </a>`;
								          }else if(heart == true && sale == "true"){
								          	html += ` <a href="{{route('lecture',':course_detail_id')}}" class="btn custom_primary_btnColor mt-3">Go to Course</a>`;


								          }else if(heart == true && sale == "false"){
								          	html += `<button disabled="disabled" class="btn custom_primary_btnColor mt-3">Pending</button>`;
								          }

								          // else if(heart == true && sale == "incorrect"){
								          // 	html += `<button  class="btn custom_primary_btnColor mt-3">Purchase</button>`;
								          // }

								          else{
								          	html+=`<button disabled="disabled" class="btn custom_primary_btnColor mt-3">Purchase</button>`
								          }


								        html+= `</div>
							        </div>
						      	</div>
						    </div>
			        	</div>`;
			        	html = html.replace(':id',v.id);
			        	html = html.replace(':course_id',v.id);
			        	html = html.replace(':course_detail_id',v.id);


					});

					html +=`</div>`;
					
					$('.searchcourseshow').html(html);

				}

				else{
					
					html+=`<div class="row justify-content-center">
							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-10 col-10 py-5">
	   						
				                <svg id="b7da5827-4560-4d63-9360-f6e9beb837fe" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1104.46862 797.51507"><title>searching</title><rect x="959.04901" y="388.46353" width="9.83152" height="388.34522" fill="#3f3d56"/><path d="M1107.38,489.19613c.62586,135.79464-94.91286,246.32062-94.91286,246.32062s-96.55343-109.64065-97.17929-245.4353,94.91286-246.32062,94.91286-246.32062S1106.75418,353.40148,1107.38,489.19613Z" transform="translate(-47.76569 -51.24247)" fill="#3f3d56"/><rect x="767.24391" y="571.18561" width="5.05659" height="199.73514" fill="#3f3d56"/><path d="M866.73273,647.882c.3219,69.8424-48.81593,126.68852-48.81593,126.68852s-49.65971-56.39078-49.98161-126.23318,48.81593-126.68852,48.81593-126.68852S866.41084,578.03962,866.73273,647.882Z" transform="translate(-47.76569 -51.24247)" fill="#3f3d56"/><ellipse cx="871.96862" cy="776.51507" rx="137" ry="21" fill="#3f3d56"/><path d="M931.0336,338.32371c-11.60691-19.61209-34.57027-20.5261-34.57027-20.5261s-22.37648-2.86148-36.73085,27.008c-13.37942,27.84079-31.84473,54.72165-2.97276,61.239l5.21511-16.23177,3.22969,17.4402a112.96671,112.96671,0,0,0,12.35324.21113c30.91954-.99827,60.36573.29206,59.4176-10.80317C935.715,381.91142,942.20179,357.19447,931.0336,338.32371Z" transform="translate(-47.76569 -51.24247)" fill="#2f2e41"/><path d="M889.23431,375.25753s15,21,6,38,21,35,21,35l22-48s-26-17-19-33Z" transform="translate(-47.76569 -51.24247)" fill="#fbbebe"/><circle cx="851.46862" cy="307.01507" r="26" fill="#fbbebe"/><path d="M809.25482,388.31339l21.72805-28.03376s7.6506-29.38483,18.73125-27.89516-4.3766,35.23982-4.3766,35.23982l-21.58945,31.03056Z" transform="translate(-47.76569 -51.24247)" fill="#fbbebe"/><polygon points="871.469 710.015 878.469 747.015 893.469 751.015 889.469 707.015 871.469 710.015" fill="#fbbebe"/><polygon points="1022.469 670.015 1049.469 707.015 1060.469 712.015 1069.469 697.015 1042.469 662.015 1022.469 670.015" fill="#fbbebe"/><path d="M913.23431,432.25753l-16.6811-21.95933s-32.3189,5.95933-35.3189,8.95933,8,58,8,58,2,15,11,23l9,6,74-15,2.78246-32.9258a86.41011,86.41011,0,0,0-22.78243-66.07417l0,0-12.8758,1.76022Z" transform="translate(-47.76569 -51.24247)" fill="#575a89"/><path d="M865.23431,421.25753l-5-2-23-2s-8-2-6-6,4-5,0-6-5-2-4-5,7-9,7-9l-17-14s-.9201.65081-2.4073,1.85491c-8.44043,6.83376-35.14719,31.48943-15.5927,56.14509,23,29,50,46,72,40Z" transform="translate(-47.76569 -51.24247)" fill="#575a89"/><path d="M887.23431,501.25753v14s-9,17-6,33,4,24,4,24a136.53331,136.53331,0,0,0,7,40c7,20-16,151,13,153s45,4,54-6-15-182-15-182,82,171,99,164,60-23,55-32-131-209-131-209l-4-9Z" transform="translate(-47.76569 -51.24247)" fill="#2f2e41"/><path d="M935.23431,791.25753s-16-1-16,4-8,22-8,22-6,20,10,18,26-20,26-20l-4-19Z" transform="translate(-47.76569 -51.24247)" fill="#2f2e41"/><path d="M1102.23431,756.25753s-14-9-13-3,2,22,9,23,28,7,29,9,25,10,25-3-15-23-15-23l-17-13s-11-1-13,6S1102.23431,756.25753,1102.23431,756.25753Z" transform="translate(-47.76569 -51.24247)" fill="#2f2e41"/><circle cx="851.50812" cy="266.65448" r="16.60376" fill="#2f2e41"/><path d="M880.92228,313.52753a16.60441,16.60441,0,0,1,14.856-16.51042,16.77219,16.77219,0,0,0-1.74776-.09334,16.60376,16.60376,0,1,0,0,33.20753,16.77219,16.77219,0,0,0,1.74776-.09334A16.60442,16.60442,0,0,1,880.92228,313.52753Z" transform="translate(-47.76569 -51.24247)" fill="#2f2e41"/><polygon points="878.136 285.191 855.45 273.307 824.12 278.169 817.638 306.797 833.774 306.176 838.282 295.659 838.282 306.003 845.727 305.717 850.048 288.972 852.749 306.797 879.217 306.257 878.136 285.191" fill="#2f2e41"/><path d="M924.54355,503.57426l-34.98722.94591s-29.85391,5.809-28.17895-6.24071,30.79949-7.83525,30.79949-7.83525l31.88021-4.86338Z" transform="translate(-47.76569 -51.24247)" fill="#fbbebe"/><path d="M952.22557,390.5624a7.46667,7.46667,0,0,1,8.23586,5.128c6.84947,21.584,27.95077,93.81336,6.98533,103.72285-24.69358,11.67164-42.714,11.15847-42.714,11.15847l-9.64534-23.748,8.78051-8.24031,9.37441-60.27537,4.492-25.55049Z" transform="translate(-47.76569 -51.24247)" fill="#575a89"/><polygon points="897.969 379.515 893.969 419.515 858.969 434.515 897.969 425.515 897.969 379.515" opacity="0.4"/><path d="M756.98,298.70514h0a46.83994,46.83994,0,0,1,27.35248,19.86961l3.27083,5.06568.16459.20953L845.153,340.64134a4.18288,4.18288,0,0,1,2.86079,5.11516l-4.45513,16.335a4.18288,4.18288,0,0,1-5.16148,2.92785l-57.3995-16.04387-.00125.0016-5.76486,2.1795a51.51527,51.51527,0,0,1-33.12186,1.12567h0Z" transform="translate(-47.76569 -51.24247)" fill="#3f3d56"/><ellipse cx="811.10661" cy="344.23329" rx="3.50423" ry="6.57042" transform="translate(205.17511 974.78362) rotate(-73.69006)" fill="#575a89"/><circle cx="766.71601" cy="294.13977" r="2.40916" fill="#3f3d56"/><ellipse cx="749.69389" cy="325.72758" rx="28.09043" ry="12.70282" transform="translate(160.84035 887.15413) rotate(-72.0342)" fill="#f9a826"/><path d="M759.99372,329.12386c4.61092-14.21979,3.35687-27.4722-2.7109-30.35509a5.89148,5.89148,0,0,1,1.07554.238c6.67348,2.164,8.20424,15.88146,3.419,30.639s-14.07438,24.96651-20.7479,22.80258a5.86342,5.86342,0,0,1-.70807-.28386C746.88566,353.00035,755.46051,343.10408,759.99372,329.12386Z" transform="translate(-47.76569 -51.24247)" opacity="0.4"/><path d="M757.73431,298.75753,627.49655,197.73229a861.92171,861.92171,0,0,1-66.21511-57.3855C524.15612,104.95908,473.758,76.666,415.0802,61.6025,272.519,25.00485,159.58154,89.89694,108.21435,185.18075c-78.49457,145.60388-138.65021,381.8794,209.394,256.11011,76.11683-27.50562,153.1648-30.42932,211.58594-44.91773l211.54-43.6156Z" transform="translate(-47.76569 -51.24247)" fill="#f9a826"/><circle cx="318.96862" cy="70.51507" r="7" fill="#f2f2f2"/><polygon points="454.949 86.695 453.127 86.695 453.127 84.873 452.771 84.873 452.771 86.695 450.949 86.695 450.949 87.051 452.771 87.051 452.771 88.873 453.127 88.873 453.127 87.051 454.949 87.051 454.949 86.695" fill="#f2f2f2"/><polygon points="637.949 238.695 636.127 238.695 636.127 236.873 635.771 236.873 635.771 238.695 633.949 238.695 633.949 239.051 635.771 239.051 635.771 240.873 636.127 240.873 636.127 239.051 637.949 239.051 637.949 238.695" fill="#f2f2f2"/><polygon points="624.949 285.695 623.127 285.695 623.127 283.873 622.771 283.873 622.771 285.695 620.949 285.695 620.949 286.051 622.771 286.051 622.771 287.873 623.127 287.873 623.127 286.051 624.949 286.051 624.949 285.695" fill="#f2f2f2"/><polygon points="65.949 325.695 64.127 325.695 64.127 323.873 63.771 323.873 63.771 325.695 61.949 325.695 61.949 326.051 63.771 326.051 63.771 327.873 64.127 327.873 64.127 326.051 65.949 326.051 65.949 325.695" fill="#f2f2f2"/><polygon points="145.949 107.695 144.127 107.695 144.127 105.873 143.771 105.873 143.771 107.695 141.949 107.695 141.949 108.051 143.771 108.051 143.771 109.873 144.127 109.873 144.127 108.051 145.949 108.051 145.949 107.695" fill="#f2f2f2"/><polygon points="456.949 293.695 455.127 293.695 455.127 291.873 454.771 291.873 454.771 293.695 452.949 293.695 452.949 294.051 454.771 294.051 454.771 295.873 455.127 295.873 455.127 294.051 456.949 294.051 456.949 293.695" fill="#f2f2f2"/><polygon points="265.949 43.695 264.127 43.695 264.127 41.873 263.771 41.873 263.771 43.695 261.949 43.695 261.949 44.051 263.771 44.051 263.771 45.873 264.127 45.873 264.127 44.051 265.949 44.051 265.949 43.695" fill="#f2f2f2"/><path d="M314.41494,238.91546l-2.27.35c.71,4.54,1.27,9.18,1.68,13.77l2.29-.2C315.70492,248.18548,315.13492,243.50549,314.41494,238.91546Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M308.20492,211.57544l-2.2.67c1.33,4.4,2.52,8.91,3.53,13.4l2.25-.51C310.75491,220.59546,309.54495,216.03546,308.20492,211.57544Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M298.29495,185.35547l-2.09.96c1.92,4.19,3.72,8.49,5.35,12.79l2.15-.81C302.055,193.94543,300.245,189.58545,298.29495,185.35547Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M284.89493,160.77545l-1.94,1.23c2.47,3.87994,4.84,7.9,7.04,11.93l2.02-1.1C289.79495,168.75549,287.39493,164.69543,284.89493,160.77545Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M268.235,138.24548l-1.75,1.49c2.98,3.5,5.88,7.16,8.62,10.86l1.84-1.37C274.1849,145.48547,271.25491,141.78546,268.235,138.24548Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M248.65493,118.18548l-1.53,1.71c3.44,3.07,6.81,6.3,10.02,9.59l1.65-1.61C255.545,124.54547,252.13492,121.28546,248.65493,118.18548Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M226.53494,100.96545l-1.29,1.9c3.82,2.57,7.6,5.31,11.23,8.14l1.42-1.81006C234.21493,106.33545,230.39493,103.56549,226.53494,100.96545Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M206.40493,89.00549v2.6c2.39,1.25,4.76,2.56,7.08,3.9l1.15-1.99Q210.58489,91.17544,206.40493,89.00549Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M314.5699,267.22119l2.29863-.04178c.04223,2.3211.04537,4.65451.00942,6.93607l-2.29844-.03589C314.61446,271.824,314.61145,269.51646,314.5699,267.22119Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M179.41494,435.91546l-2.27.35c.71,4.54,1.27,9.18,1.68,13.77l2.29-.2C180.70492,445.18548,180.13492,440.50549,179.41494,435.91546Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M173.20492,408.57544l-2.2.67c1.33,4.4,2.52,8.91,3.53,13.4l2.25-.51C175.75491,417.59546,174.545,413.03546,173.20492,408.57544Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M163.295,382.35547l-2.09.96c1.92,4.19,3.72,8.49,5.35,12.79l2.15-.81C167.055,390.94543,165.245,386.58545,163.295,382.35547Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M149.89493,357.77545l-1.94,1.23c2.47,3.87994,4.84,7.9,7.04,11.93l2.02-1.1C154.795,365.75549,152.39493,361.69543,149.89493,357.77545Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M133.235,335.24548l-1.75,1.49c2.98,3.5,5.88,7.16,8.62,10.86l1.84-1.37C139.1849,342.48547,136.25491,338.78546,133.235,335.24548Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M113.65493,315.18548l-1.53,1.71c3.44,3.07,6.81,6.3,10.02,9.59l1.65-1.61C120.545,321.54547,117.13492,318.28546,113.65493,315.18548Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M91.53494,297.96545l-1.29,1.9c3.81995,2.57,7.6,5.31,11.23,8.14l1.42-1.81006C99.21493,303.33545,95.39493,300.56549,91.53494,297.96545Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M71.40493,286.00549v2.6c2.39,1.25,4.76,2.56,7.08,3.9l1.15-1.99Q75.58489,288.17544,71.40493,286.00549Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M179.5699,464.22119l2.29863-.04178c.04223,2.3211.04537,4.65451.00942,6.93607l-2.29844-.03589C179.61446,468.824,179.61145,466.51646,179.5699,464.22119Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M641.41494,336.91546l-2.27.35c.71,4.54,1.27,9.18,1.68,13.77l2.29-.2C642.70492,346.18548,642.13492,341.50549,641.41494,336.91546Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M635.20492,309.57544l-2.2.67c1.33,4.4,2.52,8.91,3.53,13.4l2.25-.51C637.75491,318.59546,636.545,314.03546,635.20492,309.57544Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M625.295,283.35547l-2.09.96c1.92,4.19,3.72,8.49,5.35,12.79l2.15-.81C629.055,291.94543,627.245,287.58545,625.295,283.35547Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M611.89493,258.77545l-1.94,1.23c2.47,3.87994,4.84,7.9,7.04,11.93l2.02-1.1C616.795,266.75549,614.39493,262.69543,611.89493,258.77545Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M595.235,236.24548l-1.75,1.49c2.98,3.5,5.88,7.16,8.62,10.86l1.84-1.37C601.1849,243.48547,598.25491,239.78546,595.235,236.24548Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M575.65493,216.18548l-1.53,1.71c3.44,3.07,6.81,6.3,10.02,9.59l1.65-1.61C582.545,222.54547,579.13492,219.28546,575.65493,216.18548Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M553.53494,198.96545l-1.29,1.9c3.82,2.57,7.6,5.31,11.23,8.14l1.42-1.81006C561.21493,204.33545,557.39493,201.56549,553.53494,198.96545Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M533.40493,187.00549v2.6c2.39,1.25,4.76,2.56,7.08,3.9l1.15-1.99Q537.58489,189.17544,533.40493,187.00549Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><path d="M641.5699,365.22119l2.29863-.04178c.04223,2.3211.04537,4.65451.00942,6.93607l-2.29844-.03589C641.61446,369.824,641.61145,367.51646,641.5699,365.22119Z" transform="translate(-47.76569 -51.24247)" fill="#e6e6e6"/><polygon points="149.295 199.895 147.6 199.895 147.6 198.199 147.269 198.199 147.269 199.895 145.573 199.895 145.573 200.225 147.269 200.225 147.269 201.921 147.6 201.921 147.6 200.225 149.295 200.225 149.295 199.895" fill="#f2f2f2"/><polygon points="129.754 302.252 128.059 302.252 128.059 300.556 127.728 300.556 127.728 302.252 126.032 302.252 126.032 302.583 127.728 302.583 127.728 304.278 128.059 304.278 128.059 302.583 129.754 302.583 129.754 302.252" fill="#f2f2f2"/><polygon points="72.417 391.959 70.721 391.959 70.721 390.264 70.39 390.264 70.39 391.959 68.695 391.959 68.695 392.29 70.39 392.29 70.39 393.986 70.721 393.986 70.721 392.29 72.417 392.29 72.417 391.959" fill="#f2f2f2"/><path d="M279.68428,329.42536a122.81116,122.81116,0,1,1,56.98177,45.75139,39.726,39.726,0,1,1-56.98177-45.75139Z" transform="translate(-47.76569 -51.24247)" fill="#3f3d56"/><path d="M380.89379,190.67942c28.154,0,47.524,15.61609,47.524,38.06422,0,14.86532-7.20743,25.15092-21.09674,33.33435-13.06346,7.58282-17.493,13.13854-17.493,22.74844h0a5.93109,5.93109,0,0,1-5.9311,5.9311H369.504a5.9311,5.9311,0,0,1-5.9275-5.72432l-.02555-.73233c-1.27631-15.466,4.12926-25.07584,17.71827-33.034,12.68807-7.58282,18.01856-12.38777,18.01856-21.69736s-9.00928-16.14163-20.1958-16.14163c-8.50252,0-15.23133,4.13864-18.31771,10.8956a13.25248,13.25248,0,0,1-12.112,7.57343h0c-9.752,0-16.19427-10.37059-11.63357-18.99048C344.24307,199.27078,359.46494,190.67942,380.89379,190.67942ZM361.14844,319.362c0-8.63389,7.20743-15.46594,16.06655-15.46594,8.93421,0,16.14162,6.757,16.14162,15.46594s-7.20743,15.466-16.14163,15.466-16.06655-6.757-16.06655-15.466Z" transform="translate(-47.76569 -51.24247)" fill="#f9a826"/></svg>


						    </div>


						    <div class="col-10 justify-content-center text-center">
	                        	<h4 class="mt-5"> Sorry,There is no course. </h4>
						    </div>
						</div>`;
					$('.searchcourseshow').html(html);
					$('.paginate').hide();
				}
			})
			
			
		})

		// html
		$('.wishlist').click(function(){
			var id = $(this).data('course_id');
			$.post('wishlist_save',{id:id},function(res){
				console.log(res);
			})

		})


		// jquery
		$('.searchcourseshow').on('click','.wishlists',function(event){
			var id = $(this).data('course_id');
			$.post('wishlist_save',{id:id},function(res){
				if(res == "delete"){
					$(this).removeClass('active');
				}else{
					// $('.searchcourseshow .wishlist').removeClass('active');
					$(this).addClass('active');

				}
			})
		})
	})
</script>
@stop




</x-frontend>