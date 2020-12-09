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

	<div class="row outputshow">
		
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
                 console.log(result.sales);
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
                 $.each(result.sales,function(i,v){
                 		console.log(v);
                 		var date = new Date(v.created_at);

										var day = date.getDate();
									  var month = date.getMonth();
									  var year = date.getFullYear();
										 
										var fullday = day+'/'+month+'/'+year;
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
                 html+=`</tbody>
														</table>
													</div>
												</div>`;
									$('.outputshow').html(html);
									$('.outputshow').show();
								}else{
									html+=`<tr class='clickableRow'>
														<td colspan='6' class='text-center'>Your Search Data Not Found</td>
													</tr></tbody></table></div></div>`;
									$('.outputshow').html(html);
									$('.outputshow').show();
								}
              }
            });
		    	})

        });


    </script>

@stop

</x-backend>