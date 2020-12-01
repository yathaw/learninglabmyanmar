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

    <section class="inner-page">
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
									    <input class="searchInput" type="text" placeholder='focus here to search'>
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


			        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center searchcourseshow">

			        @foreach($courses as $course)

			        	<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
			        		<div class="card courseCard h-100 border-0">
			        			<div class="card-img-wrapper">
			        				<a href="{{route('course','1')}}">
							      		<img src="{{ asset($course->image) }}" class="card-img-top" alt="...">
							      	</a>
						      	</div>
						      	<div class="card-body">
						      		<div class="card-title">
						      			<a href="{{route('course','1')}}" class="text-decoration-none text-muted">
							      			<h4 class="fontbold text-dark"> {{$course->title}}</h4>
							      		</a>

						      			<a class="favouriteBtn one active mobile button--secondary float-right">
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
						        		<p class="card-text fst-italic text-muted"> {{$course->instructor->user->name}} </p>

						        		<div class="rating">
						        			<i class='bx bxs-star custom_primary_Color'></i>
						        			<i class='bx bxs-star custom_primary_Color'></i>
						        			<i class='bx bxs-star custom_primary_Color' ></i>
						        			<i class='bx bxs-star-half custom_primary_Color' ></i>

						        			<i class='bx bx-star' ></i>
						        		</div>

						        		<div class="price">
						        			<span class="text-danger fs-5"> {{$course->price}} Ks  </span> 

								    		<span class="text-decoration-line-through text-muted"> 50,000 Ks </span>

								    		<i class='bx bxs-purchase-tag text-danger' ></i>
						        		</div>

						      		</div>
						        	

						        	<div class="card-content">
							            <small class="card-text text-muted" >
							            	{!! $course->description !!}
							            </small>
							            <div class="d-grid gap-2 col-6 mx-auto">
								            <a href="javascript:void(0)" class="btn custom_primary_btnColor mt-3">
								            	Add to Cart
								            </a>


								        </div>
							        </div>
						      	</div>
						    </div>
			        	</div>

			        @endforeach

			        </div>
			        
			        {{-- 
			        <nav aria-label="Page navigation example" class="mt-5">
					  	<ul class="pagination justify-content-center">
					    	<li class="page-item disabled">
					      		<a class="page-link" href="#" tabindex="-1" aria-disabled="true"> << </a>
					    	</li>
					    	<li class="page-item"><a class="page-link" href="#">1</a></li>
					    	<li class="page-item"><a class="page-link" href="#">2</a></li>
					    	<li class="page-item"><a class="page-link" href="#">3</a></li>
					    	<li class="page-item">
					      		<a class="page-link" href="#"> >> </a>
					    	</li>
					  	</ul>
					</nav> --}}
					{{-- {!! $courses->links() !!} --}}

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
			console.log(search_data);
			var html = "";
			$.post("{{route('courses_search')}}",{data:search_data},function(data){
				if(data){
					$.each(data,function(i,v){
						console.log(v);
						html+=`<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
			        		<div class="card courseCard h-100 border-0">
			        			<div class="card-img-wrapper">
			        				<a href="{{route('course','1')}}">
							      		<img src="${v.image}" class="card-img-top" alt="...">
							      	</a>
						      	</div>
						      	<div class="card-body">
						      		<div class="card-title">
						      			<a href="{{route('course','1')}}" class="text-decoration-none text-muted">
							      			<h4 class="fontbold text-dark"> ${v.title} </h4>
							      		</a>

						      			<a class="favouriteBtn one active mobile button--secondary float-right">
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
						        		<p class="card-text fst-italic text-muted"> ${v.instructor.user.name} </p>

						        		<div class="rating">
						        			<i class='bx bxs-star custom_primary_Color'></i>
						        			<i class='bx bxs-star custom_primary_Color'></i>
						        			<i class='bx bxs-star custom_primary_Color' ></i>
						        			<i class='bx bxs-star-half custom_primary_Color' ></i>

						        			<i class='bx bx-star' ></i>
						        		</div>

						        		<div class="price">
						        			<span class="text-danger fs-5"> ${v.price} Ks  </span> 

								    		<span class="text-decoration-line-through text-muted"> 50,000 Ks </span>

								    		<i class='bx bxs-purchase-tag text-danger' ></i>
						        		</div>

						      		</div>
						        	

						        	<div class="card-content">
							            <small class="card-text text-muted">
							            	${v.description}
							            </small>
							            <div class="d-grid gap-2 col-6 mx-auto">
								            <a href="javascript:void(0)" class="btn custom_primary_btnColor mt-3">
								            	Add to Cart
								            </a>


								        </div>
							        </div>
						      	</div>
						    </div>
			        	</div>`;
					});
				
					$('.searchcourseshow').html(html);
				}
			})
			
			
		})
	})
</script>
@stop




</x-frontend>