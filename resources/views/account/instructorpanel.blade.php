<x-backend>

	<div class="row mb-2 mb-xl-3">
		<div class="col-auto d-none d-sm-block">
			<h3><strong> Your </strong> Panel </h3>
		</div>

		<div class="col-auto ml-auto text-right mt-n1">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
					<li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Panel</li>
				</ol>
			</nav>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-6 col-xxl-5 d-flex">
			<div class="w-100">
				<div class="row">
					<div class="col-sm-6">
						<div class="card">
							@if(count($sales) > 0)
							@role('Admin')
							<a href="{{route('backside.enrollment')}}">
								<div class="card-body">
									<h5 class="card-title mb-4"> Enrollments </h5>
									<h1 class="mt-1 mb-3">{{count($sales)}}</h1>
								</div>
							</a>
							@endrole
							@role('Instructor')
							<a href="{{route('backside.sale.index')}}">
								<div class="card-body">
									<h5 class="card-title mb-4"> Enrollments </h5>
									<h1 class="mt-1 mb-3">{{count($sales)}}</h1>
								</div>
							</a>
							@endrole
							@role('Business')
							<a href="{{route('backside.sale.index')}}">
								<div class="card-body">
									<h5 class="card-title mb-4"> Enrollments </h5>
									<h1 class="mt-1 mb-3">{{count($sales)}}</h1>
								</div>
							</a>
							@endrole
							@else
							<a href="#">
								<div class="card-body">
									<h5 class="card-title mb-4"> Enrollments </h5>
									<h1 class="mt-1 mb-3">0</h1>
								</div>
							</a>
							@endif
						</div>
						<div class="card">
							<a href="">
								<div class="card-body">
									<h5 class="card-title mb-4"> Rating </h5>
									<h1 class="mt-1 mb-3"> 10 </h1>
								</div>
							</a>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="card">
							@if(count($courses) > 0)
							<a href="{{route('backside.course.index')}}">
								<div class="card-body">
									<h5 class="card-title mb-4">Courses</h5>
									<h1 class="mt-1 mb-3"> {{count($courses)}} </h1>
								</div>
							</a>
							@else
							<a href="#">
								<div class="card-body">
									<h5 class="card-title mb-4">Courses</h5>
									<h1 class="mt-1 mb-3"> 0 </h1>
								</div>
							</a>
							@endif
						</div>
						<div class="card">
							<a href="">
								<div class="card-body">
									<h5 class="card-title mb-4">Report</h5>
									<h1 class="mt-1 mb-3">0</h1>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-6 col-xxl-7">
			<div class="card flex-fill w-100">
				<div class="card-header">

					<h5 class="card-title mb-0">Total Revenue </h5>
				</div>
				<div class="card-body py-3">
					<div class="chart chart-sm">
						<canvas id="chartjs-dashboard-line"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>

	@if(count($recentcourses) > 0)
	<div class="row">
		<div class="col-12 col-lg-12 col-xxl-12 d-flex">
			<div class="card flex-fill">
				<div class="card-header">

					<h5 class="card-title mb-0">Recent Course </h5>
				</div>
				<table class="table table-hover my-0">
					<thead>
						<tr>
							<th>Name</th>
							<th class="d-none d-xl-table-cell">Start Date</th>
							<th>Status</th>
							<th class="d-none d-md-table-cell"> Price </th>
						</tr>
					</thead>
					<tbody>
						
							@foreach($recentcourses as $recentcourse)
							<tr class='clickableRow' data-href='{{ route('backside.course.show',$recentcourse->id) }}'>
								<td>{{$recentcourse->title}}</td>
								<td class="d-none d-xl-table-cell">{{$recentcourse->created_at->format('d/m/Y')}}</td>
								<td><span class="badge bg-success">Done</span></td>
								<td class="d-none d-md-table-cell">{{$recentcourse->price}}</td>
							</tr>
							@endforeach
						
						<!-- <tr class='clickableRow' data-href='{{ route('backside.course.show','2') }}'>
							<td>Project Fireball</td>
							<td class="d-none d-xl-table-cell">01/01/2020</td>
							<td><span class="badge bg-danger">Cancelled</span></td>
							<td class="d-none d-md-table-cell">William Harris</td>
						</tr>
						<tr class='clickableRow' data-href='{{ route('backside.course.show','3') }}'>
							<td>Project Hades</td>
							<td class="d-none d-xl-table-cell">01/01/2020</td>
							<td><span class="badge bg-success">Done</span></td>
							<td class="d-none d-md-table-cell">Sharon Lessman</td>
						</tr>
						<tr class='clickableRow' data-href='{{ route('backside.course.show','4') }}'>
							<td>Project Nitro</td>
							<td class="d-none d-xl-table-cell">01/01/2020</td>
							<td><span class="badge bg-warning">In progress</span></td>
							<td class="d-none d-md-table-cell">Vanessa Tucker</td>
						</tr>
						<tr class='clickableRow' data-href='{{ route('backside.course.show','5') }}'>
							<td>Project Phoenix</td>
							<td class="d-none d-xl-table-cell">01/01/2020</td>
							<td><span class="badge bg-success">Done</span></td>
							<td class="d-none d-md-table-cell">William Harris</td>
						</tr>
						<tr class='clickableRow' data-href='{{ route('backside.course.show','6') }}'>
							<td>Project X</td>
							<td class="d-none d-xl-table-cell">01/01/2020</td>
							<td><span class="badge bg-success">Done</span></td>
							<td class="d-none d-md-table-cell">Sharon Lessman</td>
						</tr>
						<tr class='clickableRow' data-href='{{ route('backside.course.show','7') }}'>
							<td>Project Romeo</td>
							<td class="d-none d-xl-table-cell">01/01/2020</td>
							<td><span class="badge bg-success">Done</span></td>
							<td class="d-none d-md-table-cell">Christina Mason</td>
						</tr>
						<tr class='clickableRow' data-href='{{ route('backside.course.show','8') }}'>
							<td>Project Wombat</td>
							<td class="d-none d-xl-table-cell">01/01/2020</td>
							<td><span class="badge bg-warning">In progress</span></td>
							<td class="d-none d-md-table-cell">William Harris</td>
						</tr> -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
	@else
	<div class="row">
		<div class="col-md-4 mx-auto">
			<img src="{{asset('externalphoto/nocourse.gif')}}">
		</div>
	</div>
	@endif
@section('script_content')
    
    <script type="text/javascript">

    	document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});

        $(document).ready(function() {

        	$(".clickableRow").click(function() {
		        window.location = $(this).data("href");
		    });

        });


    </script>

@stop

</x-backend>