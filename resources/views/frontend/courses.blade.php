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


			        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center searchcourseshow">

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
					        			{{-- end check data array --}}
					        			@endif
					        			{{-- end check auth --}}
										



						        		<p class="card-text fst-italic text-muted">
						        			
						        			@foreach($course->instructors as $instructor)
						        				{{$instructor->user->name}}
						        				@php
						        					$instructor = $instructor->user->name;
						        				@endphp
						        			@endforeach
						        		</p>

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
							            	@if(Auth::user())
							            	@if(Auth::user()->sales)
							            	@php
							            		$count_sale = count(Auth::user()->sales);
							            	@endphp

							            		@if($count_sale > 0)
								            		@foreach(Auth::user()->sales as $sales)
								            			@foreach($sales->courses as $course_sale)
								            			

								            				@if($course_sale->pivot->course_id == $course->id && $course_sale->pivot->status == 0)

								            					<button disabled="disabled" class="btn custom_primary_btnColor mt-3">Pending</button>

								            				@elseif($course_sale->pivot->course_id == $course->id && $course_sale->pivot->status == 1)
								            					<button disabled="disabled" class="btn custom_primary_btnColor mt-3">Purched</button>
								            				@endif
								            			@endforeach
								            		@endforeach
								            	@endif
								            @endif

							            		

							            	@foreach($course->instructors as $instructor)
							      				@if(Auth::user()->instructor)


							      					@if($instructor->pivot->instructor_id != Auth::user()->instructor->id)


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
										            @else
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
								            @endforeach

								            




								            @else
								            	<button disabled="disabled" class="btn custom_primary_btnColor mt-3">Purchase</button>
								            @endif




								        </div>

							        </div>
						      	</div>
						    </div>
			        	</div>

			        @endforeach

			        </div>
			        
			        
			        <nav aria-label="Page navigation example" class="mt-5">
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
			var sale = "";

			$.post("{{route('courses_search')}}",{data:search_data},function(data){
				console.log(data);
				if(data){
					$.each(data,function(i,v){
						
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
						        			console.log(d);
						        			if(d.pivot.status == 1){
						        				sale += "true";
						        			}else {
						        				sale += "false";
						        			}
						        		})



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

								    		<span class="text-decoration-line-through text-muted"> 50,000 Ks </span>

								    		<i class='bx bxs-purchase-tag text-danger' ></i>
						        		</div>

						      		</div>
						        	

						        	<div class="card-content">
							            <small class="card-text text-muted">
							            	${v.subtitle}
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
								          	html += `<button disabled="disabled" class="btn custom_primary_btnColor mt-3">Purched</button>`;
								          }else if(heart == true && sale == "false")
								          	html += `<button disabled="disabled" class="btn custom_primary_btnColor mt-3">Purched</button>`;
								          else{
								          	html+=`<button disabled="disabled" class="btn custom_primary_btnColor mt-3">Add To Cart</button>`
								          }


								        html+= `</div>
							        </div>
						      	</div>
						    </div>
			        	</div>`;
			        	html = html.replace(':id',v.id);
			        	html = html.replace(':course_id',v.id);

					});
					
					$('.searchcourseshow').html(html);
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