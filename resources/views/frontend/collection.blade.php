<x-frontend>
<section>
<div class="container my-3">
	<div class="section-title">
		<h2 class="text-center my-4">My Collections</h2>
	</div>

	<div class="justify-content-center row">
		<div class="col-md-8">
		
			<div class="row justify-content-center text-center">
				<nav>
			  
				    <a class="nav-link nyinav mx-2 nyinavactive d-inline-block" href="{{route('collection')}}">All Courses</a>
				    <a class="nav-link nyinav mx-2 d-inline-block" href="{{route('wishlist')}}">Wishlist</a>
				</nav>
			    
			</div>

			<a href="{{route('coursedetail')}}" class="text-dark">

			  	<div class="card nylcardshadow mt-4">
			  		<div class="row">
			  			
			  			<div class="col-md-4 col-sm-12 py-3 text-center mt-3">
			  				<img src="frontend/img/about.jpg" alt="image" class="img-fluid rounded circle" width="230px">
			  			</div>

			  			<div class="col-md-8 col-sm-12">
			  				<div class="card-title ml-3 mt-3">
			  					<img src="frontend/img/about.jpg" class="rounded-circle d-inline-block" width="50px" height="50px">
			  					<h3 class="d-inline-block mt-2 ml-3">Name</h3>
			  				</div>
			  				<div class="card-body text-left">
			  					<h3 class="mt-0">Course Title</h3>
			  					<p class="text-truncate" style="max-width: 400px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			  					</p>
			  					<div class="mt-2">
			  						<img src="frontend/img/rating.png" class="img-fluid" width="80px" class="float-lg-left">
			  						<h4 class="font-weight-bold text-dark d-inline-block float-right">
			  							<b>$ 4.44</b>
			  						</h4>

			  					</div>
			  					
			  					
			  				</div>
			  			</div>
			  			
			  		</div>
			  	</div>

		  	</a>

		  	<a href="{{route('coursedetail')}}" class="text-dark">

			  	<div class="card nylcardshadow mt-3">
			  		<div class="row">
			  			
			  			<div class="col-md-4 col-sm-12 py-3 text-center mt-3">
			  				<img src="frontend/img/about.jpg" alt="image" class="img-fluid rounded circle" width="230px">
			  			</div>

			  			<div class="col-md-8 col-sm-12">
			  				<div class="card-title ml-3 mt-3">
			  					<img src="frontend/img/about.jpg" class="rounded-circle d-inline-block" width="50px" height="50px">
			  					<h3 class="d-inline-block mt-2 ml-3">Name</h3>
			  				</div>
			  				<div class="card-body ">
			  					<h3 class="mt-0">Course Title</h3>
			  					<p class="text-truncate" style="max-width: 400px">
			  					Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet 
			  					</p>
			  					<div class="mt-2 ">
			  						<img src="frontend/img/rating.png" class="img-fluid" width="80px">
			  						<h4 class="font-weight-bold text-dark d-inline-block float-right">
			  							Paid
			  						</h4>

			  					</div>
			  					
			  					
			  				</div>
			  			</div>
			  			
			  		</div>
			  	</div>

		  	</a>

			  
			 
		</div>
	</div>
	
</div>
</section>
</x-frontend>