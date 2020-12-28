<x-backend>

	<div class="row mb-2 mb-xl-3">
		<div class="col-auto d-none d-sm-block">
			<h3><strong> Student </strong> Enrollment </h3>
		</div>

		<div class="col-auto ml-auto text-right mt-n1">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
					<li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Student Enrollment</li>
				</ol>
			</nav>
		</div>
	</div>
	<div class="row my-5">
		<div class="col-xl-5 col-xxl-5">
			<div class="w-75">
				<p><strong>Start Date:</strong></p>
				<input type="date" name="startdate" class="form-control form-control-lg" id="startdate">
			</div>
		</div>

		<div class="col-xl-5 col-xxl-5">
			<div class="w-75">
				<p><strong>End Date:</strong></p>
				<input type="date" name="enddate" class="form-control form-control-lg" id="enddate">
			</div>
		</div>

		<div class="col-xl-2 col-xxl-2">
			<br>
			<button class="btn btn-primary mt-3 btnsearch">Search</button>
		</div>
	</div>

	<div class="row my-5">
		<div class="offset-md-10 col-xl-2 offset-md-3">
			<select class="form-select">
				<option selected disabled>Choose Course:</option>
				@foreach($courses as $course)
				<option data-id="{{$course->id}}">{{$course->title}}</option>
				@endforeach
			</select>
		</div>
	</div>

	<div class="row outputshow">
		
	</div>

	<div class="row filtershow">
		
	</div>

	<div class="row limitshow">
		<div class="col-12 col-lg-12 col-xxl-12 d-flex">
			<div class="card flex-fill">
				<div class="card-header">

					<h5 class="card-title mb-0">Lastest Course </h5>
				</div>
				<table class="table table-hover my-0">
					<thead>
						<tr>
							<th>No</th>
							<th>Student Name</th>
							<th class="d-none d-xl-table-cell">Start Date</th>
							<th>Invoice No</th>
							<th>Course Title</th>
							<th class="d-none d-md-table-cell"> Price </th>
						</tr>
					</thead>
					<tbody>
						@php $i=1;  $alltotal=0;@endphp
						@foreach($enrolls as $enroll)
						<tr>
							<td>{{$i++}}</td>
							<td class="d-none d-xl-table-cell">{{$enroll->user->name}}</td>
							@php
								$date = date('d/m/Y', strtotime($enroll->created_at));
							@endphp
							<td>{{$date}}</td>
							<td>{{$enroll->invoiceno}}</td>
							<td>
								@foreach($enroll->courses as $ecourse)
								<span class="badge bg-success">
									{{$ecourse->title}}
								</span>
								@endforeach
							</td>
							<td class="d-none d-md-table-cell">{{$enroll->total}}</td>
						</tr>
						@php 
							$subtotal=$enroll->total;
							$alltotal+=$subtotal; 
						@endphp
						@endforeach
						@if($alltotal != 0)
						<tr>
							<th colspan="5" class="text-center">Total Price</th>
							<td>{{$alltotal}}</td>
						</tr>
						@else
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>

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
        	$.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
        	$('.outputshow').hide();
        	$('.filtershow').hide();
        	$(".clickableRow").click(function() {
		        window.location = $(this).data("href");
		    	});

		    	$('.btnsearch').click(function(){
		    		var startdate = $('#startdate').val();
		    		var enddate = $('#enddate').val();

		    		$.ajax({
              url: "/backside/enrollmentsearch",
              method: 'post',
              data: {
                 startdate: startdate,
                 enddate: enddate
              },
              success: function(result){
                 
                 var html=''; var j=1;
                 html+=`<div class="col-12 col-lg-12 col-xxl-12 d-flex">
													<div class="card flex-fill">
														<div class="card-header">

															<h5 class="card-title mb-0">Enrollment (${startdate} and ${enddate})</h5>
														</div>
														<table class="table table-hover my-0">
															<thead>
																<tr>
																	<th>No</th>
																	<th>Student Name</th>
																	<th class="d-none d-xl-table-cell">Start Date</th>
																	<th>Invoice No</th>
																	<th>Course Title</th>
																	<th class="d-none d-md-table-cell"> Price </th>
																</tr>
															</thead>
															<tbody>`;
								if(result.sales.length>0){
								var alltotal = 0;		
                 $.each(result.sales,function(i,v){
                 		
                 		var date = new Date(v.created_at);

										var day = date.getDate();
									  var month = date.getMonth();
									  var year = date.getFullYear();
										 
										var fullday = day+'/'+month+'/'+year;
										var subtotal = v.total;
										
                 		html+=`<tr class='clickableRow'>
																	<td>${j++}</td>
																	<td>${v.user.name}</td>
																	<td class="d-none d-xl-table-cell">${fullday}</td>
																	<td>${v.invoiceno}</td>
																	<td>`;
																	$.each(v.courses,function(k,r){
																		html+=`<span class="badge bg-success">${r.title}</span>`;
																	});
																	html+=`</td>
																	<td class="d-none d-md-table-cell">${v.total}</td>
																</tr>`;
											alltotal+=subtotal++;
                 })
                 html+=`<tr>
													<th colspan="5" class="text-center">Total Price</th>
													<td>${alltotal}</td>
												</tr>
												</tbody>
												</table>
												</div>
												</div>`;
									$('.outputshow').html(html);
									$('.outputshow').show();
									$('.limitshow').hide();
									$('.filtershow').hide();
								}else{
									html+=`<tr class='clickableRow'>
														<td colspan='6' class='text-center'>Your Search Data Not Found</td>
													</tr></tbody></table></div></div>`;
									$('.outputshow').html(html);
									$('.outputshow').show();
									$('.limitshow').hide();
									$('.filtershow').hide();
								}
              }
            });
		    	})



		    	$('select').change(function() {
		    		var id = $(this).find(':selected').data('id');
		    		$.ajax({
              url: "/backside/coursefilter",
              method: 'post',
              data: {
                 id: id
              },
              success: function(result){
              	var html=''; var j=1;
                 html+=`<div class="col-12 col-lg-12 col-xxl-12 d-flex">
													<div class="card flex-fill">
														<div class="card-header">

															<h5 class="card-title mb-0">Enrollment (${result.course.title})</h5>
														</div>
														<table class="table table-hover my-0">
															<thead>
																<tr>
																	<th>No</th>
																	<th>Student Name</th>
																	<th class="d-none d-xl-table-cell">Start Date</th>
																	<th>Invoice No</th>
																	<th>Course Title</th>
																	<th class="d-none d-md-table-cell"> Price </th>
																</tr>
															</thead>
															<tbody>`;
								if(result.sales.length>0){	
								var alltotal = 0;		
                 $.each(result.sales,function(i,v){
                 		
                 		var date = new Date(v.created_at);

										var day = date.getDate();
									  var month = date.getMonth();
									  var year = date.getFullYear();
										 
										var fullday = day+'/'+month+'/'+year;
										var subtotal = v.total;
										alltotal+=subtotal++;
                 		html+=`<tr class='clickableRow'>
																	<td>${j++}</td>
																	<td>${v.user.name}</td>
																	<td class="d-none d-xl-table-cell">${fullday}</td>
																	<td>${v.invoiceno}</td>
																	<td>`;
																	$.each(v.courses,function(k,r){
																		html+=`<span class="badge bg-success">${r.title}</span>`;
																	});
																	html+=`</td>
																	<td class="d-none d-md-table-cell">${v.total}</td>
																</tr>`;
                 })

                 html+=`<tr>
													<th colspan="5" class="text-center">Total Price</th>
													<td>${alltotal}</td>
												</tr>
												</tbody>
												</table>
												</div>
											</div>`;
									$('.filtershow').html(html);
									$('.filtershow').show();
									$('.limitshow').hide();
									$('.outputshow').hide();
								}else{
									html+=`<tr class='clickableRow'>
														<td colspan='6' class='text-center'>Your Search Data Not Found</td>
													</tr></tbody></table></div></div>`;
									$('.filtershow').html(html);
									$('.filtershow').show();
									$('.limitshow').hide();
									$('.outputshow').hide();
								}
              }
            })
		    	})

        });


    </script>

@stop

</x-backend>