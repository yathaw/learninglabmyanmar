<x-frontend>

<div class="container my-3">

	<div class="section-title">
		<h2 class="text-center my-4">My Collections</h2>
	</div>
	

	<div class="justify-content-center row">
		<div class="col-md-10 ">
			
			<div class="row justify-content-center text-center ">
				<nav>
				    <a class="nav-link nyinav mx-2 d-inline-block" href="{{route('collection')}}">All Courses</a>
				    <a class="nav-link nyinav mx-2 nyinavactive d-inline-block" href="{{route('wishlist')}}">Wishlist</a>
				</nav>
			</div>

		  	<div class="row  mt-4">
		  		
		  		<div class="col-md-4 col-sm-12 my-2">
		  			<a href="{{route('coursedetail')}}" class="text-dark">
			  			<div class="card nylcardshadow">
			  				<div class="card-img">
			  					<img src="frontend/img/about.jpg" alt="image" class="img-fluid card-img rounded circle" width="250px">
			  					
			  				</div>
			  				<div class="card-body">
			  					<i class="icofont-ui-love text-danger fs-4 float-right"></i>
			  					<h4 >Course Name</h4>
			  					<p>By <b>Name</b></p>
			  					<p class="text-truncate" style="max-width: 300px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			  					</p>
			  					<img src="frontend/img/rating.png" class="img-fluid" width="80px">
			  					<h4 class="text-dark "><b>$ 5.60</b></h4>
			  				</div>
			  			</div>
		  			</a>
		  		</div>
		  		
		  		<div class="col-md-4 col-sm-12 my-2">
		  			<a href="{{route('coursedetail')}}" class="text-dark">
			  			<div class="card nylcardshadow">
			  				<div class="card-img">
			  					<img src="frontend/img/about.jpg" alt="image" class="img-fluid card-img rounded circle" width="250px">
			  					
			  				</div>
			  				<div class="card-body">
			  						
						    	<i class="icofont-ui-love text-danger fs-4 float-right"></i>
						    	
			  					<h4 class="text-truncate" style="max-width: 250px">Lorem ipsum dolor sit amet, consectetur adipisicing </h4>
			  					<p>By <b>Name</b></p>
			  					<p class="text-truncate" style="max-width: 300px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			  					</p>
			  					<img src="frontend/img/rating.png" class="img-fluid" width="80px">
			  					<h4 class="text-dark "><b>$ 5.60</b></h4>
			  				</div>
			  			</div>
		  			</a>
		  		</div>


		  	</div>

			
		</div>
	</div>
	
</div>

</x-frontend>