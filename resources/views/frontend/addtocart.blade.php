<x-frontend>
<div class="container my-3">
	<div class="section-title">
		<h2 class="text-center my-4">Your Chose Courses</h2>
	</div>

	<div class="row mt-3">
		<div class="col-md-10 col-12 offset-md-1">
			<table class="table table-responsive table-bordered py-4">
				<thead class="table-dark">
					<tr>
						<th>No.</th>
						<th>Photo</th>
						<th>Title</th>
						<th>Instructor</th>
						<th>Price</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>#1</td>

						<td class="text-center">
							<a href="{{route('coursedetail')}}" class="text-dark">
								<img src="frontend/img/about.jpg" alt="image" class="rounded circle" width="120px">
							</a>
						</td>

						<td width="400px">
							<h6><a href="{{route('coursedetail')}}" class="text-dark">User Experience Design Essentials - Adobe XD UI UX Design</a></h6>
						</td>
						<td>Nyi Ye Lin</td>
						<td>
							<span><strike class="text-danger">$ 9</strike></span>
							<br>
							<span>$ 5.60</span>
						</td>
						<td class="text-center">
							<button class="btn btn-outline-danger btn-sm ">
								<i class="icofont-ui-delete fs-5"></i>
							</button>
						</td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4"><h5>Total</h5></td>
						<td colspan="2"><h5>$ 5.6</h5></td>

					</tr>
					
				</tfoot>
			</table>
			
					
				<button class="btn btn-outline-success float-right">Check Out</button>
			
		</div>
	</div>



</x-frontend>