<x-frontend>

	<!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      	<div class="container">

        	<div class="d-flex justify-content-between align-items-center">
          		<h2> My Dashboard </h2>
          		<ol>
            		<li><a href="{{ route('frontend.index') }}">Home</a></li>
            		<li> Dashboard </li>
          		</ol>
        	</div>

        	<div class="row mt-5">
        		<div class="col-12">
        			<ul class="nav nav-pills card-header-pills navheader">
                		<li class="nav-item">
                  
                  			<a class="nav-link nab bg-transparent" id="buycourseTab" data-toggle="pill" href="#buyCourse" role="tab" aria-controls="buyCourse" aria-selected="true" data-target="#buyCourse, #buyCourse1">
                    			Buy Courses
                  			</a>
                		</li>
                
                		<li class="nav-item">
                  			<a class="nav-link nab bg-transparent" id="collectionTab" data-toggle="pill" href="#collectionList" role="tab" aria-controls="collectionList" aria-selected="true" data-target="#collectionList, #collectionList_else">
                    			Collection
                  			</a>

                		</li>
                
                		<li class="nav-item">
                  			<a class="nav-link nab bg-transparent" id="wishlistTab" data-toggle="pill" href="#wishList" role="tab" aria-controls="wishList" aria-selected="true" data-target="#wishList, #wishList_else">
                    			Wishlist
                  			</a>
                		</li>
              		</ul>
        		</div>
        	</div>

      	</div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      	<div class="container">
		    <div class="row">
            	<div class="col-md-12">
              		<div class="tab-content" id="myTabContent">

              			{{-- Buy Course Tab --}}
              			
                		<div class="tab-pane fade" id="buyCourse" role="tabpanel" aria-labelledby="home-tab">
                			@if(count($sales)>0)
                			@php
                				$count_course =0;
                				$status = false;
                			@endphp
                			@foreach($sales as $sale) 
                			@foreach($sale->courses as $course)
                			@if($course->pivot->status == 1)
                			@php
                				$count_course++;
                			@endphp
							@endif
							@endforeach


							

							@endforeach
                      		<div class="row mb-5">
				      			<div class="col-12 ">
				      				<div class="card bg-light border-0">
				      					<div class="card-body">
				      						<div class="row">
				      							<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
				      								<p> Showing {{$count_course}} of 
				      									 {{$count_course}} Results  </p>
				      							</div>

				      							<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
				      								<div class="searchInputWrapper float-right mr-4">
													    <input class="searchInput searchmystudying" type="text" placeholder='focus here to search' data-user_id = "{{Auth::id()}}">
													    	<i class='searchInputIcon bx bx-search-alt-2' ></i>
													</div>
				      							</div>
				      						</div>

				      						
				      					</div>
				      				</div>
				      			</div>
				      		</div>

				      		<div class="row g-4 mystudying">

				      			
				      			@foreach($sales as $sale)
				      			@foreach($sale->courses as $course)
				      			@if($course->pivot->status == 1)

								<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
								    <div class="card h-100">
								    	<a href="{{ route('lecture',$course->id) }}">
								      		<img src="{{asset($course->image)}}" class="card-img-top" alt="...">
								      	</a>


								      	<div class="card-body">
								      		<a href="{{ route('lecture',$course->id) }}">
									        	<h4 class="fontbold text-dark"> {{$course->title}} </h4>
									        </a>
									        <a href="{{ route('instructor','1') }}">
								        		<p class="card-text fst-italic text-muted"> 
								        			@foreach($course->instructors as $instructor)
								        				{{$instructor->user->name}}
								        			@endforeach
								        		</p>
								        	</a>
								        		<small class="card-text text-muted"> </small>
								      	</div>
								      	<div class="card-footer bg-transparent border-top-0">
								      		@if(isset($completelessons))
								      		@if(count($completelessons) > 0)


								      		@foreach($completelessons as $completelesson_key=> $completelesson)

								      		
								      		@if($completelesson['courseid'] == $course->id)

								      		@php
								      			$count_section = $completelesson['count_section'];
								      			$count_content = $completelesson['count_content'];
								      			$count_completelesson = count($completelesson['lessons']);

								      			$percentage_decimal = (($count_completelesson/$count_content)*100);
                            					$percentage = round($percentage_decimal);

								      		@endphp

								      		<div class="row">
								      			<div class="col-12">
								      				<div class="progress" style="height: 5px;">
				                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="{{ $percentage }}"></div>
				                                    </div>
								      			</div>
								      		</div>
								      		

								        	<div class="row mt-3">
								        		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
								        			
				                                    <small class="text-muted"> {{ $percentage }}% complete </small>
								        		</div>

								        		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
								        			<a href="javascript:void(0)" data-toggle="modal" data-target="#ratingModal">
									        			<div class="rating float-right">
							                                <i class='bx bxs-star custom_primary_Color'></i>
							                                <i class='bx bxs-star custom_primary_Color'></i>
							                                <i class='bx bxs-star custom_primary_Color' ></i>
							                                <i class='bx bxs-star-half custom_primary_Color' ></i>

							                                <i class='bx bx-star' ></i>

							                                <small class="text-muted d-block"> Your Ratings  </small>
							                            </div>
							                        </a>
								        		</div>
								        	</div>
								        	@endif
								        	@endforeach

								        	@else

								        	<div class="row">
								      			<div class="col-12">
								      				<div class="progress" style="height: 5px;">
				                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
				                                    </div>
								      			</div>
								      		</div>
								      		

								        	<div class="row mt-3">
								        		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
								        			
				                                    <small class="text-muted"> 0% complete </small>
								        		</div>

								        		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
								        			<a href="javascript:void(0)" data-toggle="modal" data-target="#ratingModal">
									        			<div class="rating float-right">
							                                <i class='bx bxs-star custom_primary_Color'></i>
							                                <i class='bx bxs-star custom_primary_Color'></i>
							                                <i class='bx bxs-star custom_primary_Color' ></i>
							                                <i class='bx bxs-star-half custom_primary_Color' ></i>

							                                <i class='bx bx-star' ></i>

							                                <small class="text-muted d-block"> Your Ratings  </small>
							                            </div>
							                        </a>
								        		</div>
								        	</div>


								        	@endif
								        	@endif


								      	</div>
								    </div>
								</div>
								@endif
								@endforeach
								@endforeach


								
								
							  
							</div>

							<nav aria-label="Page navigation example" class="mt-5 paginate">
							  	<ul class="pagination justify-content-center">
									{!! $sales->links() !!}
							  	</ul>
							</nav>


							@else

							<div class="section-title p-0">
								<h2 class="text-center my-4"> Temporally, no Course </h2>
								<p> You haven't enrolled in any courses. Purchase some courses and view lesson videos in each course. </p>
							</div>

							<div class="row justify-content-center">
								<div class="col-xl-3 col-lg-3 col-md-6 col-sm-10 col-10 py-5">
									<svg id="a120547a-517b-40ce-9327-ed5d479d1fdc" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1008.92047 607.45001"><path d="M1104.46,620.305a15.34,15.34,0,0,1-15.25958,15.42H417.8a15.34,15.34,0,0,1-15.26-15.41962V161.695a15.34,15.34,0,0,1,15.25957-15.42H1089.2a15.34,15.34,0,0,1,15.26,15.41959v.00043Z" transform="translate(-95.53976 -146.27499)" fill="#e6e6e6"/><path d="M1096.54,612.795a14.91,14.91,0,0,1-14.91,14.91H425.83a14.91,14.91,0,0,1-14.91-14.91V169.415a14.91,14.91,0,0,1,14.91-14.91h655.83a14.91,14.91,0,0,1,14.88,14.91Z" transform="translate(-95.53976 -146.27499)" fill="#fff"/><path id="b9c54412-061c-4155-b289-fb4c23e4a64e" data-name="c6fe725a-3b03-4a96-90af-cfbd2676500a" d="M350.43023,27.48h616.22a8.85,8.85,0,0,1,8.85,8.85V451.61a8.85,8.85,0,0,1-8.85,8.85h-616.22a8.85,8.85,0,0,1-8.85-8.85V36.33a8.85,8.85,0,0,1,8.85-8.85Z" fill="#e6e6e6"/><path d="M358.23023,37.44h599.95a8.85,8.85,0,0,1,8.85,8.85V439.41a8.85,8.85,0,0,1-8.85,8.85h-599.95a8.85,8.85,0,0,1-8.85-8.85V46.29A8.85,8.85,0,0,1,358.23023,37.44Z" fill="#fff"/><path d="M877.37572,456.8078a16.86941,16.86941,0,0,1-6.85316-1.46024,8.31363,8.31363,0,0,1-1.42861-.81184l-43.60186-30.69158h0a16.86934,16.86934,0,0,1-7.15892-13.79065V368.19654a16.86933,16.86933,0,0,1,7.1589-13.79066l43.60186-30.69158a8.31367,8.31367,0,0,1,1.42862-.81183A16.86929,16.86929,0,0,1,894.245,338.31679V439.93323a16.8693,16.8693,0,0,1-16.8693,16.8693Z" transform="translate(-95.53976 -146.27499)" fill="#3f3d56"/><path d="M779.7948,465.03685H658.187c-24.81022-.02033-44.91651-16.0578-44.942-35.84726V349.06042c.0255-19.78946,20.13179-35.82692,44.942-35.84726H780.112c24.63351.02325,44.59564,15.94572,44.62477,35.59423v80.3822C824.71131,448.97905,804.605,465.01652,779.7948,465.03685Z" transform="translate(-95.53976 -146.27499)" fill="#3f3d56"/><circle cx="900.87945" cy="386.81368" r="36.16732" fill="#e6e6e6"/><path d="M1015.20446,532.44038l-28.82923-16.64457a.7486.7486,0,0,0-1.12289.6483v33.28913a.74859.74859,0,0,0,1.12289.6483l28.82923-16.64456a.74859.74859,0,0,0,0-1.2966l-28.82923-16.64457a.7486.7486,0,0,0-1.12289.6483v33.28913a.74859.74859,0,0,0,1.12289.6483l28.82923-16.64456A.74859.74859,0,0,0,1015.20446,532.44038Z" transform="translate(-95.53976 -146.27499)" fill="#fff"/><path d="M949.46,675.305a15.34,15.34,0,0,1-15.25958,15.42H262.8a15.34,15.34,0,0,1-15.26-15.41962V216.695a15.34,15.34,0,0,1,15.25957-15.42H934.2a15.34,15.34,0,0,1,15.26,15.41959v.00043Z" transform="translate(-95.53976 -146.27499)" fill="#e6e6e6"/><path d="M941.54,667.795a14.91,14.91,0,0,1-14.91,14.91H270.83a14.91,14.91,0,0,1-14.91-14.91V224.415a14.91,14.91,0,0,1,14.91-14.91H926.66a14.91,14.91,0,0,1,14.88,14.91Z" transform="translate(-95.53976 -146.27499)" fill="#fff"/><path id="a7242049-80b4-49e1-bd08-67354734c824" data-name="c6fe725a-3b03-4a96-90af-cfbd2676500a" d="M195.43022,82.48h616.22a8.85,8.85,0,0,1,8.85,8.85V506.61a8.85,8.85,0,0,1-8.85,8.85h-616.22a8.85,8.85,0,0,1-8.85-8.85V91.33a8.85,8.85,0,0,1,8.85-8.85Z" fill="#e6e6e6"/><path d="M203.23023,92.44h599.95a8.85,8.85,0,0,1,8.85,8.85V494.41a8.85,8.85,0,0,1-8.85,8.85h-599.95a8.85,8.85,0,0,1-8.85-8.85V101.29A8.85,8.85,0,0,1,203.23023,92.44Z" fill="#fff"/><path d="M722.37572,511.8078a16.86941,16.86941,0,0,1-6.85316-1.46024,8.31363,8.31363,0,0,1-1.42861-.81184l-43.60186-30.69158h0a16.86934,16.86934,0,0,1-7.15892-13.79065V423.19654a16.86933,16.86933,0,0,1,7.1589-13.79066l43.60186-30.69158a8.31367,8.31367,0,0,1,1.42862-.81183A16.86929,16.86929,0,0,1,739.245,393.31679V494.93323a16.8693,16.8693,0,0,1-16.8693,16.8693Z" transform="translate(-95.53976 -146.27499)" fill="#3f3d56"/><path d="M624.7948,520.03685H503.187c-24.81022-.02033-44.91651-16.0578-44.942-35.84726V404.06042c.0255-19.78946,20.13179-35.82692,44.942-35.84726H625.112c24.63351.02325,44.59564,15.94572,44.62477,35.59423v80.3822C669.71131,503.97905,649.605,520.01652,624.7948,520.03685Z" transform="translate(-95.53976 -146.27499)" fill="#3f3d56"/><circle cx="745.87945" cy="441.81368" r="36.16732" fill="#e6e6e6"/><path d="M860.20446,587.44038l-28.82923-16.64457a.7486.7486,0,0,0-1.12289.6483v33.28913a.74859.74859,0,0,0,1.12289.6483L860.20446,588.737a.74859.74859,0,0,0,0-1.2966l-28.82923-16.64457a.7486.7486,0,0,0-1.12289.6483v33.28913a.74859.74859,0,0,0,1.12289.6483L860.20446,588.737A.74859.74859,0,0,0,860.20446,587.44038Z" transform="translate(-95.53976 -146.27499)" fill="#fff"/><path d="M797.46,738.305a15.34,15.34,0,0,1-15.25958,15.42H110.8a15.34,15.34,0,0,1-15.26-15.41962V279.695a15.34,15.34,0,0,1,15.25957-15.42H782.2a15.34,15.34,0,0,1,15.26,15.41959v.00043Z" transform="translate(-95.53976 -146.27499)" fill="#e6e6e6"/><path d="M789.54,730.795a14.91,14.91,0,0,1-14.91,14.91H118.83a14.91,14.91,0,0,1-14.91-14.91V287.415a14.91,14.91,0,0,1,14.91-14.91H774.66a14.91,14.91,0,0,1,14.88,14.91Z" transform="translate(-95.53976 -146.27499)" fill="#fff"/><path id="b7a050eb-0cb2-44a8-b642-35d340850eff" data-name="c6fe725a-3b03-4a96-90af-cfbd2676500a" d="M43.43022,145.48h616.22a8.85,8.85,0,0,1,8.85,8.85V569.61a8.85,8.85,0,0,1-8.85,8.85h-616.22a8.85,8.85,0,0,1-8.85-8.85V154.33a8.85,8.85,0,0,1,8.85-8.85Z" fill="#e6e6e6"/><path d="M51.23023,155.44h599.95a8.85,8.85,0,0,1,8.85,8.85V557.41a8.85,8.85,0,0,1-8.85,8.85h-599.95a8.85,8.85,0,0,1-8.85-8.85V164.29A8.85,8.85,0,0,1,51.23023,155.44Z" fill="#fff"/><path d="M570.37572,574.8078a16.86941,16.86941,0,0,1-6.85316-1.46024,8.31363,8.31363,0,0,1-1.42861-.81184l-43.60186-30.69158h0a16.86934,16.86934,0,0,1-7.15892-13.79065V486.19654a16.86933,16.86933,0,0,1,7.1589-13.79066l43.60186-30.69158a8.31367,8.31367,0,0,1,1.42862-.81183A16.86929,16.86929,0,0,1,587.245,456.31679V557.93323a16.8693,16.8693,0,0,1-16.8693,16.8693Z" transform="translate(-95.53976 -146.27499)" fill="#f9a826"/><path d="M472.7948,583.03685H351.187c-24.81022-.02033-44.91651-16.0578-44.942-35.84726V467.06042c.0255-19.78946,20.13179-35.82692,44.942-35.84726H473.112c24.63351.02325,44.59564,15.94572,44.62477,35.59423v80.3822C517.71131,566.97905,497.605,583.01652,472.7948,583.03685Z" transform="translate(-95.53976 -146.27499)" fill="#f9a826"/><circle cx="593.87945" cy="504.81368" r="36.16732" fill="#3f3d56"/><path d="M708.20446,650.44038l-28.82923-16.64457a.7486.7486,0,0,0-1.12289.6483v33.28913a.74859.74859,0,0,0,1.12289.6483L708.20446,651.737a.74859.74859,0,0,0,0-1.2966l-28.82923-16.64457a.7486.7486,0,0,0-1.12289.6483v33.28913a.74859.74859,0,0,0,1.12289.6483L708.20446,651.737A.74859.74859,0,0,0,708.20446,650.44038Z" transform="translate(-95.53976 -146.27499)" fill="#fff"/>
									</svg>


								</div>
							</div>

							<div class="row">
								<div class="d-grid gap-2 col-4 mx-auto mt-3">
								  	<a class="btn btn-warning btn-lg rounded-pill" href="{{ route('courses') }}"> Start Course </a>
								</div>
							</div>
							@endif

                		</div>
                		
                		
              			{{-- Collect Tab --}}

              			
                		<div class="tab-pane fade" id="collectionList" role="tabpanel" aria-labelledby="profile-tab">  
                			
							@if(count($collections)>0)
							<div class="d-grid gap-2 d-md-flex justify-content-md-end">
							  	<a href="javascript:void(0)" class="btn custom_primary_btnColor" data-toggle="modal" data-target="#newcollectionModal"> Create New Collection </a>
							</div>
							@foreach($collections as $collection)
							<section class="testimonials my-5">
							    <div class="container">

							        <div class="section-title">
							        	<h2>{{$collection->title}} </h2>
							        	<p> {{$collection->description}} </p>
							        	<div class="d-grid gap-2 col-2 mx-auto my-3">
  											<div class="btn-group">
											  	<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
											  		<i class='bx bxs-wrench mx-2'></i>
											    	<span class="mx-2"> Setting </span>
											  	</button>
											  	<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
												    <li>
												    	<a class="dropdown-item" href="#">
												    		<i class='bx bx-edit-alt custom_primary_Color' ></i> 
												    		Edit Collection
												    	</a>
												    </li>
												    <li>
												    	<a class="dropdown-item" href="{{route('add_course_collection',$collection->id)}}">
												    		<i class='bx bx-add-to-queue text-primary' ></i>
												    		Add Collection
												    	</a>
												    </li>
												    <li>
												    	<a class="dropdown-item" href="#">
												    		<i class='bx bx-sort text-success' ></i>
												    		Sorting Collection
												    	</a>
												    </li>

												    <li><hr class="dropdown-divider"></li>
  													<li>
  														<a class="dropdown-item" href="#"> 
  															<i class='bx bx-x text-danger' ></i> Delete Collection 
  														</a>
  													</li>
												</ul>
											</div>
										</div>
							        </div>
							        @php
						        		$company_array =  array();
						        		$instructor_array = array();
						        		$data = $collection->courses()->orderByRaw("CAST(sorting as Integer) ASC")->get();
						        	@endphp
							        @foreach($data as $collection_course)


							        <div class="owl-carousel testimonials-carousel">
							        	
							        	<div class="testimonial-item px-4">

								            <div class="card h-100 ">
										    	<a href="{{ route('lecture',$collection_course->id) }}">
										      		<img src="{{ asset($collection_course->image) }}" class="card-img-top" alt="...">
										      	</a>

										      	<div class="card-body">
										      		<a href="{{ route('lecture',$collection_course->id) }}">
											        	<h3 class="fontbold text-dark m-0 fs-3"> {{$collection_course->title}} </h3>
											        </a>
											        <a href="{{ route('instructor',$collection_course->id) }}" class="d-block">
										        		<span class="card-text fst-italic text-muted">

										        		@foreach($collection_course->instructors as $instructor)
										        		@if(!$instructor->user->company)
										        			{{$instructor->user->name}}
										        		@else
										        			{{$instructor->user->company->name}}
										        			@php
										        				break;
										        			@endphp
										        		@endif

										        		@endforeach

										        		
										        		</span>
										        	</a>



										        	<small class="card-text text-muted"> 
										        		@foreach($collection_course->instructors as $instructor)

										        			@if(!$instructor->user->company)

										        			{{$instructor->user->jobtitle->name}}

										        			@endif

										        		@endforeach

										        		
										        	</small>




										      	</div>
										      	<div class="card-footer bg-transparent border-top-0">
										      		<div class="row">
										      			<div class="col-12">
										      				<div class="progress" style="height: 5px;">
						                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 80%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
						                                    </div>
										      			</div>
										      		</div>
										        	<div class="row mt-3">
										        		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
										        			
						                                    <small class="text-muted"> 80% complete </small>
										        		</div>

										        		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
										        			<a href="javascript:void(0)" data-toggle="modal" data-target="#ratingModal">
											        			<div class="rating float-right">
									                                <i class='bx bxs-star custom_primary_Color'></i>
									                                <i class='bx bxs-star custom_primary_Color'></i>
									                                <i class='bx bxs-star custom_primary_Color' ></i>
									                                <i class='bx bxs-star-half custom_primary_Color' ></i>

									                                <i class='bx bx-star' ></i>

									                                <small class="text-muted d-block"> Your Ratings  </small>
									                            </div>
									                        </a>
										        		</div>
										        	</div>
										      	</div>
										    </div>
								        </div>
								        

							        </div>
							        
									@endforeach


							    </div>
						    </section>
						    @endforeach


							
                			@else
							<div class="section-title p-0">
								<h2 class="text-center my-4"> Get Started </h2>
								<p> Start a new collection and fill this space with your purchase courses. </p>
							</div>

							<div class="row justify-content-center">
								<div class="col-xl-3 col-lg-3 col-md-6 col-sm-10 col-10 py-5">
									<svg id="ed15083a-efbd-40a8-bcf0-5dc6fb1adb49" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 880.44024 572.99471"><path d="M980.86736,471.84424l-2.32781,31.81339a7.08623,7.08623,0,0,1-6.596,6.55343h0a7.08624,7.08624,0,0,1-7.55561-7.23923l.74113-31.12759,27.38508-87.834-3.31475-53.81064,25.92189-.92579-1.85156,62.02739Z" transform="translate(-159.77988 -163.50264)" fill="#a0616a"/><path d="M1020.47777,340.20392c-11.56052-2.66659-21.45679.44149-29.13357,11.25093l-5.94381-44.96278a11.80857,11.80857,0,0,1,8.8674-12.66615h0a11.80858,11.80858,0,0,1,14.14588,7.918Z" transform="translate(-159.77988 -163.50264)" fill="#f9a826"/><path d="M1021.84212,287.42953c-26.71326-11.36205-54.156-4.16317-86.64948.83314-.30237-6.05058-3.96748-13.41437-.12824-17.63559,4.66434-5.12838,4.235-10.51682,1.42819-15.93633-7.17737-13.85855,3.1058-28.60476,13.48865-40.86608a22.99491,22.99491,0,0,1,19.19245-8.05553l19.23339,1.37382c9.58418.68458,11.9075,7.24667,14.624,16.46327v0c4.59254,6.246,7.05057,12.47466,5.503,18.67092,6.8789,4.70093,8.03463,10.37545,4.94352,16.77246-2.62113,4.02778-2.59322,7.94847.11925,11.76065a54.29814,54.29814,0,0,1,8.07332,16.03577Z" transform="translate(-159.77988 -163.50264)" fill="#2f2e41"/><polygon points="766.709 538.607 753.931 538.607 746.342 433.068 778.744 432.142 766.709 538.607" fill="#a0616a"/><path d="M927.41471,736.36384c-3.40716,1.555-6.26111-11.04355-9.13511-8.21923-8.039,7.9-27.32392,6.12918-27.32392,6.12918a5.02522,5.02522,0,0,1-3.16744-6.5486h0a5.02523,5.02523,0,0,1,3.48646-3.11071l8.54944-2.13736L913.248,698.86968l13.70383-.92579h0a32.74,32.74,0,0,1,6.05529,27.92984C931.76357,730.94944,929.84376,735.25524,927.41471,736.36384Z" transform="translate(-159.77988 -163.50264)" fill="#2f2e41"/><polygon points="851.79 538.607 839.011 538.607 831.422 433.068 864.75 426.588 851.79 538.607" fill="#a0616a"/><path d="M1012.4952,736.36384c-3.40716,1.555-6.26111-11.04355-9.13511-8.21923-8.039,7.9-27.32392,6.12918-27.32392,6.12918a5.02522,5.02522,0,0,1-3.16744-6.5486h0a5.02523,5.02523,0,0,1,3.48646-3.11071l8.54944-2.13736,13.42384-23.60743,14.62962-1.85157.3695.60429a37.72074,37.72074,0,0,1,4.04225,30.84406C1016.15321,732.36474,1014.49716,735.45016,1012.4952,736.36384Z" transform="translate(-159.77988 -163.50264)" fill="#2f2e41"/><path d="M1040.22012,601.33747c-20.65185,9.13751-33.02167-.75212-54.04423,2.23721-6.0029.85359-13.07277-87.41626-19.10493-87.04783-7.67834.469-14.328,89.42684-22.05292,89.12291a255.4193,255.4193,0,0,1-57.412-9.079c20.01927-77.64425,43.65731-147.8517,43.51175-205.52358l60.05615-4.62891,8.2674,13.10686c13.25431,31.09711,26.794,65.63208,33.54054,101.7744Z" transform="translate(-159.77988 -163.50264)" fill="#2f2e41"/><circle cx="800.96298" cy="80.34522" r="27.77346" fill="#a0616a"/><polygon points="831.514 129.412 797.26 131.263 791.705 100.712 819.479 96.084 831.514 129.412" fill="#a0616a"/><path d="M993.95134,391.04719l-43.88741,1.05708-18.94609,2.646c-9.3-30.72015-17.12931-61.36989,1.85157-87.0235l22.21876-22.21876,33.32815-.92579.44148.25228a26.83849,26.83849,0,0,1,12.29635,31.22376C992.98347,342.93461,994.0318,368.31431,993.95134,391.04719Z" transform="translate(-159.77988 -163.50264)" fill="#f9a826"/><path d="M992.27126,243.70774a33.769,33.769,0,0,0-8.5391-22.49055v-9.86514H953.61549a17.487,17.487,0,0,0-17.4871,17.487v.00006h20.0743c-5.41348,9.96469-7.74785,20.41223-2.535,30.47731,3.14459,6.07209,3.28429,18.13491-1.02368,23.927a59.67311,59.67311,0,0,0,6.80053,0c9.30378,0,34.677,1.21023,40.80323-4.85753C1006.45154,272.24133,992.27126,253.12928,992.27126,243.70774Z" transform="translate(-159.77988 -163.50264)" fill="#2f2e41"/><path d="M945.57144,474.75759H767.66a4.253,4.253,0,0,0-4.24053,4.24053V665.74053a4.253,4.253,0,0,0,4.24053,4.24053H945.57144a4.253,4.253,0,0,0,4.24053-4.24053V478.99812A4.253,4.253,0,0,0,945.57144,474.75759Z" transform="translate(-159.77988 -163.50264)" fill="#e6e6e6"/><path d="M941.33091,480.05825H771.90055a3.19214,3.19214,0,0,0-3.1804,3.1804V661.5a3.18976,3.18976,0,0,0,3.1804,3.1804H941.33091a3.18976,3.18976,0,0,0,3.1804-3.1804V483.23865A3.18976,3.18976,0,0,0,941.33091,480.05825Z" transform="translate(-159.77988 -163.50264)" fill="#fff"/><path d="M930.19206,477.1449l-2.32781,31.81339a7.08626,7.08626,0,0,1-6.596,6.55344h0a7.08626,7.08626,0,0,1-7.55562-7.23923l.74114-31.1276,23.14455-87.94928.92578-53.69535,25.92189-.92578-1.85156,62.02739Z" transform="translate(-159.77988 -163.50264)" fill="#a0616a"/><path d="M967.22334,339.2034c-10.99019-4.469-21.25451-2.97235-30.55081,6.48047l1.27359-45.336A11.80858,11.80858,0,0,1,948.71285,289.251h0a11.80858,11.80858,0,0,1,12.70858,10.06446Z" transform="translate(-159.77988 -163.50264)" fill="#f9a826"/><path d="M928.75827,525.14984a1.82639,1.82639,0,0,1,1.82639,1.82639V530.629a1.82639,1.82639,0,0,1-1.82639,1.82639H784.47319a1.82637,1.82637,0,0,1-1.82639-1.82639v-3.65279a1.82637,1.82637,0,0,1,1.82639-1.82639H928.75827" transform="translate(-159.77988 -163.50264)" fill="#e6e6e6"/><path d="M928.75827,542.50057a1.8264,1.8264,0,0,1,1.82639,1.8264v3.65278a1.8264,1.8264,0,0,1-1.82639,1.8264H784.47319a1.82638,1.82638,0,0,1-1.82639-1.8264V544.327a1.82638,1.82638,0,0,1,1.82639-1.8264H928.75827" transform="translate(-159.77988 -163.50264)" fill="#e6e6e6"/><path d="M928.75827,559.85131a1.82641,1.82641,0,0,1,1.82639,1.82639v3.65279a1.82641,1.82641,0,0,1-1.82639,1.82639H784.47319a1.82639,1.82639,0,0,1-1.82639-1.82639V561.6777a1.82639,1.82639,0,0,1,1.82639-1.82639H928.75827" transform="translate(-159.77988 -163.50264)" fill="#f9a826"/><path d="M928.75827,577.58177a1.82639,1.82639,0,0,1,1.82639,1.82639V583.061a1.82639,1.82639,0,0,1-1.82639,1.82639H784.47319a1.82637,1.82637,0,0,1-1.82639-1.82639v-3.65279a1.82637,1.82637,0,0,1,1.82639-1.82639H928.75827" transform="translate(-159.77988 -163.50264)" fill="#e6e6e6"/><path d="M928.75827,594.9325a1.8264,1.8264,0,0,1,1.82639,1.8264v3.65278a1.8264,1.8264,0,0,1-1.82639,1.8264H784.47319a1.82638,1.82638,0,0,1-1.82639-1.8264V596.7589a1.82638,1.82638,0,0,1,1.82639-1.8264H928.75827" transform="translate(-159.77988 -163.50264)" fill="#e6e6e6"/><path d="M928.75827,612.28324a1.82641,1.82641,0,0,1,1.82639,1.82639v3.65279a1.82641,1.82641,0,0,1-1.82639,1.82639H784.47319a1.82639,1.82639,0,0,1-1.82639-1.82639v-3.65279a1.82639,1.82639,0,0,1,1.82639-1.82639H928.75827" transform="translate(-159.77988 -163.50264)" fill="#e6e6e6"/><path d="M292.00616,697.14952l-14.1671.78706-32.26951-217.2289L215.2677,697.54305,199.92,694.00127c-8.52278-93.471-19.61946-190.08537-11.80592-232.18306H295.94147C311.95382,503.66543,301.26528,601.91751,292.00616,697.14952Z" transform="translate(-159.77988 -163.50264)" fill="#2f2e41"/><path d="M203.865,736.48059h0A12.684,12.684,0,0,1,192.1982,720.7815l6.44678-26.19c5.38915-6.69584,10.21327-6.40252,14.544,0l4.42643-1.8974,3.16173,22.76485-4.36058,12.73921A12.684,12.684,0,0,1,203.865,736.48059Z" transform="translate(-159.77988 -163.50264)" fill="#2f2e41"/><path d="M289.63531,736.48059h0a12.684,12.684,0,0,0,11.66675-15.69908l-6.44677-26.19c-5.38915-6.69584-10.21327-6.40252-14.544,0l-4.42643-1.8974-3.16174,22.76485,4.36058,12.73921A12.684,12.684,0,0,0,289.63531,736.48059Z" transform="translate(-159.77988 -163.50264)" fill="#2f2e41"/><circle cx="88.93792" cy="44.88185" r="31.48245" fill="#ffb8b8"/><polygon points="107.827 103.124 67.687 103.124 70.048 61.41 107.827 61.41 107.827 103.124" fill="#ffb8b8"/><path d="M310.10857,466.54058H182.60465c18.59029-62.68378,15.32214-129.83431,1.57413-199.12649l34.63069-11.01886,9.44474-7.87061c11.852,14.43479,24.95729,14.31554,39.35306-.78706l11.80592,8.65767,34.63069,11.80592C295.77795,334.96019,292.80706,401.13655,310.10857,466.54058Z" transform="translate(-159.77988 -163.50264)" fill="#f9a826"/><path d="M215.09338,200.24985a28.49042,28.49042,0,0,1,1.932-23.14887c3.84718-6.82268,11.256-13.21824,25.49918-13.579,31.07612-.78707,44.54244,22.64392,42.79158,29.51479s-8.015,23.21831-8.015,23.21831,3.88452-15.74123-3.88451-17.31535-37.874-7.87061-46.61419-.78706a17.7641,17.7641,0,0,0-6.7979,16.52829Z" transform="translate(-159.77988 -163.50264)" fill="#2f2e41"/><path d="M342.35591,475.81772H164.44449a4.27139,4.27139,0,0,0-4.24053,4.24053V666.80066a4.253,4.253,0,0,0,4.24053,4.24053H342.35591a4.253,4.253,0,0,0,4.24053-4.24053V480.05825A4.253,4.253,0,0,0,342.35591,475.81772Z" transform="translate(-159.77988 -163.50264)" fill="#e6e6e6"/><path d="M338.11538,481.11839H168.685a3.18975,3.18975,0,0,0-3.1804,3.18039V662.56013a3.18976,3.18976,0,0,0,3.1804,3.1804H338.11538a3.18976,3.18976,0,0,0,3.1804-3.1804V484.29878A3.18975,3.18975,0,0,0,338.11538,481.11839Z" transform="translate(-159.77988 -163.50264)" fill="#fff"/><path d="M305.9801,491.03926h0A12.89271,12.89271,0,0,1,298.7897,473.975l10.53181-24.74975-1.57412-78.70612L302.238,343.759l28.3342-11.01886,5.50943,36.99188L325.8498,454.73466l-2.359,25.47722A12.89271,12.89271,0,0,1,305.9801,491.03926Z" transform="translate(-159.77988 -163.50264)" fill="#ffb8b8"/><path d="M189.88137,491.03926h0a12.89271,12.89271,0,0,0,7.19037-17.06427L186.54,449.22523l1.57412-78.70612,5.50943-26.76008-28.3342-11.01886-5.50943,36.99188,10.23179,85.00261,2.359,25.47722A12.8927,12.8927,0,0,0,189.88137,491.03926Z" transform="translate(-159.77988 -163.50264)" fill="#ffb8b8"/><path d="M332.93335,335.10135a100.46691,100.46691,0,0,0-31.48245,14.1671l-7.08355-21.25065,18.10241-60.60371h0a25.85716,25.85716,0,0,1,17.62874,22.897A246.55367,246.55367,0,0,0,332.93335,335.10135Z" transform="translate(-159.77988 -163.50264)" fill="#f9a826"/><path d="M162.92812,335.10135a100.4668,100.4668,0,0,1,31.48245,14.1671l7.08355-21.25065L185.7529,266.627h0c-9.99071,3.33024-19.32468,13.1739-19.98991,23.684A246.55459,246.55459,0,0,1,162.92812,335.10135Z" transform="translate(-159.77988 -163.50264)" fill="#f9a826"/><path d="M325.54274,525.22514a1.82639,1.82639,0,0,1,1.82639,1.82639v3.65279a1.82639,1.82639,0,0,1-1.82639,1.82639H181.25766a1.82637,1.82637,0,0,1-1.82639-1.82639v-3.65279a1.82637,1.82637,0,0,1,1.82639-1.82639H325.54274" transform="translate(-159.77988 -163.50264)" fill="#e6e6e6"/><path d="M325.54274,542.57587a1.8264,1.8264,0,0,1,1.82639,1.8264v3.65278a1.8264,1.8264,0,0,1-1.82639,1.8264H181.25766a1.82638,1.82638,0,0,1-1.82639-1.8264v-3.65278a1.82638,1.82638,0,0,1,1.82639-1.8264H325.54274" transform="translate(-159.77988 -163.50264)" fill="#e6e6e6"/><path d="M325.54274,559.92661a1.82641,1.82641,0,0,1,1.82639,1.8264v3.65278a1.82641,1.82641,0,0,1-1.82639,1.8264H181.25766a1.8264,1.8264,0,0,1-1.82639-1.8264V561.753a1.8264,1.8264,0,0,1,1.82639-1.8264H325.54274" transform="translate(-159.77988 -163.50264)" fill="#f9a826"/><path d="M325.54274,577.65707a1.82639,1.82639,0,0,1,1.82639,1.82639v3.65279a1.82639,1.82639,0,0,1-1.82639,1.82639H181.25766a1.82637,1.82637,0,0,1-1.82639-1.82639v-3.65279a1.82637,1.82637,0,0,1,1.82639-1.82639H325.54274" transform="translate(-159.77988 -163.50264)" fill="#e6e6e6"/><path d="M325.54274,595.00781a1.82639,1.82639,0,0,1,1.82639,1.82639V600.487a1.82639,1.82639,0,0,1-1.82639,1.82639H181.25766a1.82637,1.82637,0,0,1-1.82639-1.82639V596.8342a1.82637,1.82637,0,0,1,1.82639-1.82639H325.54274" transform="translate(-159.77988 -163.50264)" fill="#e6e6e6"/><path d="M325.54274,612.35854a1.82641,1.82641,0,0,1,1.82639,1.8264v3.65278a1.82641,1.82641,0,0,1-1.82639,1.8264H181.25766a1.8264,1.8264,0,0,1-1.82639-1.8264v-3.65278a1.8264,1.8264,0,0,1,1.82639-1.8264H325.54274" transform="translate(-159.77988 -163.50264)" fill="#e6e6e6"/><path d="M685.60572,350.086H507.69423a4.24614,4.24614,0,0,0-4.24053,4.24053V665.76169a4.253,4.253,0,0,0,4.24053,4.24053H685.60572a4.253,4.253,0,0,0,4.24053-4.24053V354.32654A4.24614,4.24614,0,0,0,685.60572,350.086Z" transform="translate(-159.77988 -163.50264)" fill="#e6e6e6"/><path d="M684.47137,357.88857a3.4181,3.4181,0,0,0-.44524-1.07075,3.20914,3.20914,0,0,0-2.66094-1.43115H511.93477a3.18292,3.18292,0,0,0-3.1804,3.1804V661.52116a3.18976,3.18976,0,0,0,3.1804,3.1804H681.36519a3.18972,3.18972,0,0,0,3.1804-3.1804V358.56707A2.89481,2.89481,0,0,0,684.47137,357.88857Z" transform="translate(-159.77988 -163.50264)" fill="#fff"/><path d="M668.79252,519.92447a1.8264,1.8264,0,0,1,1.82639,1.8264v3.65278a1.8264,1.8264,0,0,1-1.82639,1.8264H524.50744a1.82638,1.82638,0,0,1-1.8264-1.8264v-3.65278a1.82638,1.82638,0,0,1,1.8264-1.8264H668.79252" transform="translate(-159.77988 -163.50264)" fill="#e6e6e6"/><path d="M668.79252,537.27521a1.82639,1.82639,0,0,1,1.82639,1.82639v3.65279a1.82639,1.82639,0,0,1-1.82639,1.82639H524.50744a1.82638,1.82638,0,0,1-1.8264-1.82639V539.1016a1.82638,1.82638,0,0,1,1.8264-1.82639H668.79252" transform="translate(-159.77988 -163.50264)" fill="#e6e6e6"/><path d="M668.79252,554.626a1.82641,1.82641,0,0,1,1.82639,1.82639v3.65279a1.82641,1.82641,0,0,1-1.82639,1.82639H524.50744a1.8264,1.8264,0,0,1-1.8264-1.82639v-3.65279a1.8264,1.8264,0,0,1,1.8264-1.82639H668.79252" transform="translate(-159.77988 -163.50264)" fill="#f9a826"/><path d="M668.79252,572.35641a1.82639,1.82639,0,0,1,1.82639,1.82639v3.65279a1.82639,1.82639,0,0,1-1.82639,1.82639H524.50744a1.82638,1.82638,0,0,1-1.8264-1.82639V574.1828a1.82638,1.82638,0,0,1,1.8264-1.82639H668.79252" transform="translate(-159.77988 -163.50264)" fill="#e6e6e6"/><path d="M668.79252,589.70714a1.8264,1.8264,0,0,1,1.82639,1.8264v3.65278a1.8264,1.8264,0,0,1-1.82639,1.8264H524.50744a1.82639,1.82639,0,0,1-1.8264-1.8264v-3.65278a1.82638,1.82638,0,0,1,1.8264-1.8264H668.79252" transform="translate(-159.77988 -163.50264)" fill="#e6e6e6"/><path d="M668.79252,607.05788a1.82641,1.82641,0,0,1,1.82639,1.82639v3.65279a1.82641,1.82641,0,0,1-1.82639,1.82639H524.50744a1.8264,1.8264,0,0,1-1.8264-1.82639v-3.65279a1.8264,1.8264,0,0,1,1.8264-1.82639H668.79252" transform="translate(-159.77988 -163.50264)" fill="#e6e6e6"/><path d="M525.55172,384.48945a2.12237,2.12237,0,0,0-2.12027,2.12027v98.50279a2.1227,2.1227,0,0,0,2.12027,2.12027H667.74823a2.1227,2.1227,0,0,0,2.12027-2.12027V386.60972a2.12237,2.12237,0,0,0-2.12027-2.12027Z" transform="translate(-159.77988 -163.50264)" fill="#f9a826"/><path d="M746.38425,307.99055c3.86368,1.642,7.70563,3.46251,11.41713,5.41144l.98559-1.877c-3.76223-1.97584-7.657-3.82124-11.57242-5.486Z" transform="translate(-159.77988 -163.50264)" fill="#ccc"/><path d="M790.28762,333.36955l-1.4142,1.58088c3.12759,2.7963,6.17444,5.75774,9.05771,8.801l1.53844-1.45768C796.547,339.208,793.45766,336.20519,790.28762,333.36955Z" transform="translate(-159.77988 -163.50264)" fill="#ccc"/><path d="M768.73918,319.72758c3.54274,2.24761,7.0358,4.66914,10.37977,7.19783l1.27961-1.69166c-3.39056-2.56285-6.93227-5.018-10.52471-7.29669Z" transform="translate(-159.77988 -163.50264)" fill="#ccc"/><path d="M722.43394,300.03852c4.08007.99594,8.16323,2.17047,12.13666,3.49l.66879-2.0126c-4.02829-1.33707-8.16737-2.52765-12.3023-3.53757Z" transform="translate(-159.77988 -163.50264)" fill="#ccc"/><path d="M838.77212,421.38541l-2.09334.336c.66258,4.13079,1.15434,8.34855,1.46078,12.53628l2.11406-.1553C839.943,429.85457,839.44506,425.57625,838.77212,421.38541Z" transform="translate(-159.77988 -163.50264)" fill="#ccc"/><path d="M830.53435,397.26377c1.37072,3.95945,2.583,8.02916,3.60383,12.09576l2.05608-.51661c-1.03528-4.12561-2.26624-8.25485-3.65559-12.27279Z" transform="translate(-159.77988 -163.50264)" fill="#ccc"/><path d="M820.26639,374.23228c2.03123,3.67216,3.9258,7.47269,5.63195,11.295l1.936-.86343c-1.73-3.87766-3.65249-7.73255-5.71271-11.45751Z" transform="translate(-159.77988 -163.50264)" fill="#ccc"/><path d="M806.22481,353.275c2.6203,3.27512,5.13191,6.7014,7.46544,10.18255l1.76206-1.18022c-2.36666-3.53085-4.9145-7.00527-7.57105-10.32646Z" transform="translate(-159.77988 -163.50264)" fill="#ccc"/><path d="M703.374,285.23348c-4.81007,3.82234-12.44679,7.28977-18.56339,9.245,5.913,2.5063,13.20222,6.65476,17.64418,10.8993l-2.845-9.14973c3.49823.3245,7.002.7599,10.44519,1.31177l.33543-2.09334c-3.52411-.56527-7.11151-1.0096-10.6923-1.33947Z" transform="translate(-159.77988 -163.50264)" fill="#ccc"/><path d="M365.80539,384.66434l1.936.86343c1.7046-3.82073,3.59917-7.62126,5.63143-11.295l-1.85523-1.026C369.45581,376.93334,367.53432,380.78823,365.80539,384.66434Z" transform="translate(-159.77988 -163.50264)" fill="#ccc"/><path d="M357.44494,408.8424l2.05608.51661c1.01976-4.06091,2.23208-8.13062,3.60383-12.09628l-2.00431-.6926C359.70963,400.59325,358.47919,404.72248,357.44494,408.8424Z" transform="translate(-159.77988 -163.50264)" fill="#ccc"/><path d="M353.38507,434.10234l2.11509.1553c.30541-4.18773.79665-8.40549,1.46027-12.53628l-2.09335-.33647C354.19414,425.57573,353.69565,429.85457,353.38507,434.10234Z" transform="translate(-159.77988 -163.50264)" fill="#ccc"/><path d="M378.18741,362.2768l1.761,1.18022c2.332-3.47856,4.84359-6.90432,7.466-10.18255l-1.65542-1.32413C383.09933,355.27412,380.552,358.74854,378.18741,362.2768Z" transform="translate(-159.77988 -163.50264)" fill="#ccc"/><path d="M434.8512,311.525l.98559,1.877c3.71616-1.95048,7.55759-3.771,11.41713-5.41144l-.82926-1.95152C442.51231,307.70222,438.6186,309.54762,434.8512,311.525Z" transform="translate(-159.77988 -163.50264)" fill="#ccc"/><path d="M458.40084,301.51587l.66776,2.0126c3.97343-1.31948,8.05712-2.494,12.13718-3.49l-.50315-2.06022C466.56718,298.98822,462.42811,300.1788,458.40084,301.51587Z" transform="translate(-159.77988 -163.50264)" fill="#ccc"/><path d="M394.1686,342.29319l1.53947,1.45768c2.88069-3.04115,5.928-6.00258,9.0572-8.801l-1.41316-1.58088C400.179,336.20675,397.08914,339.20908,394.1686,342.29319Z" transform="translate(-159.77988 -163.50264)" fill="#ccc"/><path d="M413.24064,325.23323l1.27858,1.69166c3.346-2.5292,6.83858-4.95074,10.38133-7.19731l-1.13571-1.79052C420.17343,320.21469,416.63275,322.66935,413.24064,325.23323Z" transform="translate(-159.77988 -163.50264)" fill="#ccc"/><path d="M508.82858,294.47851c-6.11672-1.9574-13.75345-5.42476-18.56345-9.24711l3.676,8.87564c-3.5806.3298-7.16787.7742-10.69185,1.33947l.33543,2.09334c3.44291-.5518,6.94677-.98721,10.44461-1.3117l-2.845,9.14759C495.6263,301.13126,502.91548,296.98274,508.82858,294.47851Z" transform="translate(-159.77988 -163.50264)" fill="#ccc"/><path d="M596.64981,327.34263a32.86412,32.86412,0,1,1,32.86412-32.86412A32.9016,32.9016,0,0,1,596.64981,327.34263Zm0-63.608a30.74385,30.74385,0,1,0,30.74385,30.74385A30.77858,30.77858,0,0,0,596.64981,263.73466Z" transform="translate(-159.77988 -163.50264)" fill="#f9a826"/><rect x="433.6897" y="115.07388" width="6.3608" height="31.80398" fill="#f9a826"/><rect x="593.46958" y="278.57652" width="6.3608" height="31.80398" transform="translate(731.34861 -465.67411) rotate(90)" fill="#f9a826"/></svg>
								</div>
							</div>

							<div class="row">
								<div class="d-grid gap-2 col-4 mx-auto mt-3">
								  	<a href="javascript:void(0)" class="btn custom_primary_btnColor" data-toggle="modal" data-target="#newcollectionModal"> Create New Collection </a>
								</div>
							</div>
							@endif
                		</div>
                		
                		

              			{{-- Wishlist Tab --}}

                		<div class="tab-pane fade" id="wishList" role="tabpanel" aria-labelledby="rating-tab">
                			@if(count($wishlists)>0)
                  			<div class="row mb-5">
				      			<div class="col-12 ">
				      				<div class="card bg-light border-0">
				      					<div class="card-body">
				      						<div class="row">
				      							<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
				      								<p> Showing 8 of 20 Results  </p>
				      							</div>

				      							<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
				      								<div class="searchInputWrapper float-right mr-4">
													    <input class="searchInput searchwhishlist" type="text" placeholder='focus here to search' data-id="{{Auth::id()}}">
													    	<i class='searchInputIcon bx bx-search-alt-2' ></i>
													</div>
				      							</div>
				      						</div>
				      					</div>
				      				</div>
				      			</div>
				      		</div>

				      		<div class="row row-cols-1 row-cols-md-3 g-4 searchwishlistshow">

				      		@foreach($wishlists as $wishlist)
				      		@if($wishlist->user_id == Auth::id())
					        	<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
					        		<div class="card courseCard h-100 border-0">
					        			<div class="card-img-wrapper">
					        				<a href="{{route('course','1')}}">
									      		<img src="{{ asset($wishlist->course->image) }}" class="card-img-top" alt="...">
									      	</a>
								      	</div>
								      	<div class="card-body">
								      		<div class="card-title">
								      			<a href="{{route('course','1')}}" class="text-decoration-none text-muted">
									      			<h4 class="fontbold text-dark"> {{$wishlist->course->title}} </h4>
									      		</a>

								      			<a class="favouriteBtn one active mobile button--secondary float-right removewishlist" data-course_id = '{{$wishlist->course->id}}'>
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
								        		<p class="card-text fst-italic text-muted">
								        			@foreach($wishlist->course->instructors as $instructor)
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
								        			<span class="text-danger fs-5"> {{$wishlist->course->price}} Ks  </span> 

										    		<span class="text-decoration-line-through text-muted"> 50,000 Ks </span>

										    		<i class='bx bxs-purchase-tag text-danger' ></i>
								        		</div>

								      		</div>
								        	

								        	<div class="card-content">
									            <small class="card-text text-muted">
									            	{{$wishlist->course->subtitle}}
									            </small>
									            <div class="d-grid gap-2 col-6 mx-auto">
										            <a href="javascript:void(0)" class="btn custom_primary_btnColor mt-3 addtocart" data-id="{{$wishlist->course->id}}" data-course_title="{{$wishlist->course->title}}" data-instructor = "{{$instructor}}" data-user_id = "{{Auth::id()}}" data-price = "{{$wishlist->course->price}}" data-image = "{{$wishlist->course->image}}" data-wishlist = "save"
													>
										            	Add to Cart
										            </a>


										        </div>
									        </div>
								      	</div>
								    </div>
					        	</div>
					        @endif

					        @endforeach
					        {!! $wishlists->links() !!}

					        </div>
					        @else
							
							<div class="section-title p-0">
								<h2 class="text-center my-4"> Collect Love!  </h2>
								<p> Save your favourite lessons, you will find them collect here. Press ❤️ to add a course to your wishlist. </p>
								<p> Waiting For You! </p>
							</div>

							<div class="row justify-content-center">
								<div class="col-xl-3 col-lg-3 col-md-6 col-sm-10 col-10 py-5">
									<svg id="a9f4e35f-fabb-46b1-abf3-f67cbf881ce0" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 728.34646 523.59055"><path d="M947.17323,711.20472h-437a17.01916,17.01916,0,0,1-17-17v-489a17.01917,17.01917,0,0,1,17-17h437a17.01917,17.01917,0,0,1,17,17v489A17.01916,17.01916,0,0,1,947.17323,711.20472Zm-437-521a15.017,15.017,0,0,0-15,15v489a15.017,15.017,0,0,0,15,15h437a15.017,15.017,0,0,0,15-15v-489a15.017,15.017,0,0,0-15-15Z" transform="translate(-235.82677 -188.20472)" fill="#3f3d56"/><rect x="258.34646" y="41.59033" width="469" height="2" fill="#3f3d56"/><circle cx="281.34646" cy="22" r="8" fill="#f9a826"/><circle cx="306.34646" cy="22" r="8" fill="#f9a826"/><circle cx="331.34646" cy="22" r="8" fill="#f9a826"/><path d="M884.67323,303.20472h-312a13,13,0,0,1,0-26h312a13,13,0,0,1,0,26Zm-312-24a11,11,0,0,0,0,22h312a11,11,0,0,0,0-22Z" transform="translate(-235.82677 -188.20472)" fill="#3f3d56"/><path d="M807.52756,405.79528h-142a8,8,0,0,1,0-16h142a8,8,0,0,1,0,16Z" transform="translate(-235.82677 -188.20472)" fill="#ccc"/><path d="M889.52756,432.79528h-224a8,8,0,0,1,0-16h224a8,8,0,0,1,0,16Z" transform="translate(-235.82677 -188.20472)" fill="#ccc"/><path d="M612.3189,434.29528h-43a9.51081,9.51081,0,0,1-9.5-9.5v-27a9.5108,9.5108,0,0,1,9.5-9.5h43a9.5108,9.5108,0,0,1,9.5,9.5v27A9.51081,9.51081,0,0,1,612.3189,434.29528Zm-43-44a7.50835,7.50835,0,0,0-7.5,7.5v27a7.50836,7.50836,0,0,0,7.5,7.5h43a7.50836,7.50836,0,0,0,7.5-7.5v-27a7.50835,7.50835,0,0,0-7.5-7.5Z" transform="translate(-235.82677 -188.20472)" fill="#ccc"/><path d="M807.52756,500.79528h-142a8,8,0,0,1,0-16h142a8,8,0,0,1,0,16Z" transform="translate(-235.82677 -188.20472)" fill="#ccc"/><path d="M889.52756,527.79528h-224a8,8,0,1,1,0-16h224a8,8,0,0,1,0,16Z" transform="translate(-235.82677 -188.20472)" fill="#ccc"/><path d="M612.3189,529.29528h-43a9.51081,9.51081,0,0,1-9.5-9.5v-27a9.5108,9.5108,0,0,1,9.5-9.5h43a9.5108,9.5108,0,0,1,9.5,9.5v27A9.51081,9.51081,0,0,1,612.3189,529.29528Zm-43-44a7.50835,7.50835,0,0,0-7.5,7.5v27a7.50836,7.50836,0,0,0,7.5,7.5h43a7.50836,7.50836,0,0,0,7.5-7.5v-27a7.50835,7.50835,0,0,0-7.5-7.5Z" transform="translate(-235.82677 -188.20472)" fill="#ccc"/><path d="M807.52756,595.79528h-142a8,8,0,0,1,0-16h142a8,8,0,0,1,0,16Z" transform="translate(-235.82677 -188.20472)" fill="#f2f2f2"/><path d="M889.52756,622.79528h-224a8,8,0,0,1,0-16h224a8,8,0,0,1,0,16Z" transform="translate(-235.82677 -188.20472)" fill="#f2f2f2"/><path d="M612.3189,624.29528h-43a9.51081,9.51081,0,0,1-9.5-9.5v-27a9.5108,9.5108,0,0,1,9.5-9.5h43a9.5108,9.5108,0,0,1,9.5,9.5v27A9.51081,9.51081,0,0,1,612.3189,624.29528Z" transform="translate(-235.82677 -188.20472)" fill="#f2f2f2"/><path d="M590.8189,426.03362l-2.31545-2.08878c-8.22262-7.54934-13.65109-12.44922-13.65109-18.553a8.68327,8.68327,0,0,1,8.78159-8.83494,9.44539,9.44539,0,0,1,7.18495,3.37347,9.445,9.445,0,0,1,7.18494-3.37347,8.68328,8.68328,0,0,1,8.78159,8.83494c0,6.10382-5.42854,11.00371-13.65108,18.553Z" transform="translate(-235.82677 -188.20472)" fill="#f9a826"/><path d="M590.8189,521.03362l-2.31545-2.08878c-8.22262-7.54934-13.65109-12.44922-13.65109-18.553a8.68327,8.68327,0,0,1,8.78159-8.83494,9.44539,9.44539,0,0,1,7.18495,3.37347,9.445,9.445,0,0,1,7.18494-3.37347,8.68328,8.68328,0,0,1,8.78159,8.83494c0,6.10382-5.42854,11.00371-13.65108,18.553Z" transform="translate(-235.82677 -188.20472)" fill="#f9a826"/><path d="M409.15748,505.05222h-43a9.51081,9.51081,0,0,1-9.5-9.5v-27a9.5108,9.5108,0,0,1,9.5-9.5h43a9.5108,9.5108,0,0,1,9.5,9.5v27A9.51081,9.51081,0,0,1,409.15748,505.05222Zm-43-44a7.50835,7.50835,0,0,0-7.5,7.5v27a7.50836,7.50836,0,0,0,7.5,7.5h43a7.50836,7.50836,0,0,0,7.5-7.5v-27a7.50835,7.50835,0,0,0-7.5-7.5Z" transform="translate(-235.82677 -188.20472)" fill="#3f3d56"/><path d="M387.65748,496.79056l-2.31545-2.08878c-8.22262-7.54934-13.65109-12.44922-13.65109-18.553a8.68327,8.68327,0,0,1,8.78159-8.83494,9.44536,9.44536,0,0,1,7.185,3.37347,9.445,9.445,0,0,1,7.18495-3.37347,8.68329,8.68329,0,0,1,8.78159,8.83494c0,6.10382-5.42855,11.00371-13.65109,18.553Z" transform="translate(-235.82677 -188.20472)" fill="#f9a826"/><polygon points="126.965 512.106 138.087 509.46 133.175 465.302 116.76 469.207 126.965 512.106" fill="#ffb8b8"/><path d="M360.77092,693.3538h35.92974a0,0,0,0,1,0,0v13.88195a0,0,0,0,1,0,0H374.65285a13.88193,13.88193,0,0,1-13.88193-13.88193v0A0,0,0,0,1,360.77092,693.3538Z" transform="translate(673.4245 1105.72874) rotate(166.61944)" fill="#2f2e41"/><path d="M351.87477,671.87692l-24.15528-82.78613,30.18506-7.48731,17.708,87.67627a4.49981,4.49981,0,0,1-4.2771,5.38916l-15.00708.44581c-.04517.001-.09009.00195-.135.00195A4.50057,4.50057,0,0,1,351.87477,671.87692Z" transform="translate(-235.82677 -188.20472)" fill="#2f2e41"/><polygon points="58.09 512.384 69.522 512.383 74.959 468.287 58.086 468.289 58.09 512.384" fill="#ffb8b8"/><path d="M291.46749,697.32116h35.92974a0,0,0,0,1,0,0V711.2031a0,0,0,0,1,0,0H305.34942a13.88193,13.88193,0,0,1-13.88193-13.88193v0A0,0,0,0,1,291.46749,697.32116Z" transform="translate(383.1015 1220.29161) rotate(179.99483)" fill="#2f2e41"/><path d="M291.90943,683.45554a4.41548,4.41548,0,0,1-1.34448-3.1294l-10.41553-82.585a4.50646,4.50646,0,0,1,4.46729-4.52246l23.24829-.16846h.0332a4.51205,4.51205,0,0,1,4.499,4.43115l1.23584,81.3545a4.497,4.497,0,0,1-4.39576,4.56591l-14.11279,1.34131c-.02173.00049-.04346.00049-.06518.00049A4.46755,4.46755,0,0,1,291.90943,683.45554Z" transform="translate(-235.82677 -188.20472)" fill="#2f2e41"/><circle cx="61.06468" cy="197.34791" r="24.56103" fill="#ffb8b8"/><path d="M264.53443,593.42722C248.554,580.94089,248.72315,566.374,254.176,546.91745c1.53613-5.481,3.19409-11.03613,4.94921-16.91748,8.155-27.32471,17.39795-58.2959,13.88892-83.86816l.49536-.06788-.49536.06788c-.96118-7.00391,1.48877-14.3711,6.72119-20.21192,5.23267-5.8418,12.27564-9.07861,19.35547-8.896,7.06738.18848,13.9397,3.80127,18.85425,9.9126,4.89062,6.08155,7.22485,27.46582,7.91675,30.53076,3.17651,14.0669,5.09375,22.55762,6.46875,36.10254,1.62622,16.01319,21.10254,63.89112,27.30883,71.91993a18.99967,18.99967,0,0,1,3.67676,15.13281,17.80508,17.80508,0,0,1-8.45532,12.13525,101.64833,101.64833,0,0,1-32.70606,12.8711,80.1744,80.1744,0,0,1-15.22705,1.46533C291.07081,607.09421,275.91944,602.32272,264.53443,593.42722Z" transform="translate(-235.82677 -188.20472)" fill="#f9a826"/><path d="M366.67182,500.8945a9.37694,9.37694,0,0,0-14.04849-3.06268l-18.61127-10.61977-9.21209,9.736,26.49335,14.628a9.42779,9.42779,0,0,0,15.3785-10.68158Z" transform="translate(-235.82677 -188.20472)" fill="#ffb8b8"/><path d="M338.3003,508.09323l-33.35718-10.47949a22.96148,22.96148,0,0,1-16.00927-20.82813l-1.43531-32.41113a13.57149,13.57149,0,1,1,27.1233-.18262l-.91748,29.81983,35.5017,14.47851a4.50026,4.50026,0,0,1,1.978,6.76026l-7.85718,11.14306a4.48833,4.48833,0,0,1-5.02661,1.69971Z" transform="translate(-235.82677 -188.20472)" fill="#2f2e41"/><path d="M257.30885,416.11569c1.12231-6.731,1.08105-13.70752,1.041-20.45459-.01074-1.83154-.02173-3.6626-.01049-5.49023.05224-8.49365.57934-17.4961,4.05175-25.78369,3.7793-9.01954,10.77783-15.53272,18.72119-17.42237,8.95557-2.13281,18.6731,2.582,21.59864,10.34522a15.007,15.007,0,1,1,9.14868,27.96924l-.37525.0332-2.92651-7.60547c-.0166.1333-.03247.26807-.04858.40381-.18628,1.57715-.37891,3.20752-1.68091,4.14941h0c-1.62549,1.17578-3.6499,5.04541-3.05835,8.96582a33.80216,33.80216,0,0,0,1.64209,5.88135,32.2768,32.2768,0,0,1,1.74219,6.47949,11.06488,11.06488,0,0,1-2.07227,8.01368,6.18642,6.18642,0,0,1-4.23852,2.43212l-32.9878,3.41114-1.47485-11.01856-9.3833,11.55664Z" transform="translate(-235.82677 -188.20472)" fill="#2f2e41"/><path d="M428.82677,711.79528h-192a1,1,0,0,1,0-2h192a1,1,0,0,1,0,2Z" transform="translate(-235.82677 -188.20472)" fill="#ccc"/></svg>
								</div>
							</div>

							<div class="row">
								<div class="d-grid gap-2 col-4 mx-auto mt-3">
								  	<a class="btn btn-warning btn-lg rounded-pill" href="{{ route('courses') }}"> Add Favourites </a>
								</div>
							</div>

							@endif

                		</div>


              		</div>
            	</div>
          	</div>

		</div>
    </section> 


    <!-- Rating Modal -->
    <div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> How would you rate this course? </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">

                        <p> Select Rating </p>

                        <div class="giveRating">
                        	<label>
							    <input type="radio" name="stars" value="1" />
							    <span class="icon">★</span>
							</label>
							<label>
							    <input type="radio" name="stars" value="2" />
							    <span class="icon">★</span>
							    <span class="icon">★</span>
							</label>
							<label>
							    <input type="radio" name="stars" value="3" />
							    <span class="icon">★</span>
							    <span class="icon">★</span>
							    <span class="icon">★</span>   
							</label>
							
							<label>
							    <input type="radio" name="stars" value="4" />
							    <span class="icon">★</span>
							    <span class="icon">★</span>
							    <span class="icon">★</span>
							    <span class="icon">★</span>
							</label>
							<label>
							    <input type="radio" name="stars" value="5" />
							    <span class="icon">★</span>
							    <span class="icon">★</span>
							    <span class="icon">★</span>
							    <span class="icon">★</span>
							    <span class="icon">★</span>
							</label>
                        </div>

                        <div class="form-floating my-2">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2"> Comments </label>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send</button>
                    </div>
                </form>

            </div>
        </div>
    </div> 

    <!-- NewCollection Modal -->
    <div class="modal fade" id="newcollectionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Create New Collection </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="store_collection">
                    <div class="modal-body">

                        <div class="form-floating mb-3 col-md-12" id="form-group-title">
                            <input type="text" class="form-control" id="subject" placeholder="Title or summary" name="title">
                            <label for="subject"> Title </label>
                            <div class="validate"></div>
                            <span class="text-danger show-error"></span>

                        </div>

                        <div class="form-floating my-2" id="form-group-description">
                            <textarea class="form-control" placeholder="Leave a descriptison here" name="description" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2"> Description </label>
                            <span class="text-danger show-error"></span>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div> 
  

@section('script_content')
  	<script type="text/javascript">
	    $(document).ready(function(){

	    	$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

	    	var tabStatus = {{ $tabs }};

	    	console.log(tabStatus);
	    	if (tabStatus == 0) {
		        $('#buycourseTab').addClass('active show');
		        $('#buyCourse').addClass('active show');

		        $('#collectionTab').removeClass('active show');
		        $('#collectionList').removeClass('active show');

		        $('#wishlistTab').removeClass('active show');
		        $('#wishList').removeClass('active show');

	    	}
	    	else if(tabStatus == 1){
	    		$('#collectionTab').addClass('active show');
		        $('#collectionList').addClass('active show');

		        $('#buycourseTab').removeClass('active show');
		        $('#buyCourse').removeClass('active show');

		        $('#wishlistTab').removeClass('active show');
		        $('#wishList').removeClass('active show');
	    	}
	    	else{
	    		$('#wishlistTab').addClass('active show');
		        $('#wishList').addClass('active show');

		        $('#buycourseTab').removeClass('active show');
		        $('#buyCourse').removeClass('active show');

		        $('#collectionTab').removeClass('active show');
		        $('#collectionList').removeClass('active show');
	    	}

	      	$('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
	        
		      	var activated_tab = e.target // activated tab
		      	var previous_tab = e.relatedTarget // previous tab
		      
		      	if(activated_tab.id === 'buycourseTab') {
		        	$('#buyCourse1').addClass('active');
		        	$('#collectionList_else').removeClass('active');
		        	$('#wishList_else').removeClass('active');
		      	};
		      	if(activated_tab.id === 'collectionTab') {
		        	$('#buyCourse1').removeClass('active');
		        	$('#collectionList_else').addClass('active');
		        	$('#wishList_else').removeClass('active');
		      	}
		      	if(activated_tab.id === 'wishlistTab') {
		        	$('#buyCourse1').removeClass('active');
		        	$('#collectionList_else').removeClass('active');
		        	$('#wishList_else').addClass('active');
		      	}
		    });

	      	$(':radio').change(function() {
				console.log('New star rating: ' + this.value);
			});

			// start search in wishlist

			$('.searchwhishlist').keyup(function(){

			var search_data = $(this).val();
			
			var user_id = $(this).data('id');
				var html = "";

				$.post("{{route('wishlist_search')}}",{data:search_data},function(data){
					
					if(data.length > 0){
						$.each(data,function(i,v){
							$.each(v.wishlists,function(w,l) {
								
								if(l.user_id == user_id){
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

								      			<a class="favouriteBtn one active mobile button--secondary float-right removewishlists" data-course_id = "${v.id}">
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
								        		<p class="card-text fst-italic text-muted">`;

								        		$.each(v.instructor,function(a,b){
								        				html+= $(b.user.name);
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
					        	</div>`
					        		}
							})
						});
					
		        		$('.searchwishlistshow').html(html);
						
					}else{
					
					html+=`<div class="text-center">
								<img src="{{asset('/externalphoto/empty_result.gif')}}" class="img-fluid" width="40%" height="60%">
							</div>`;
					$('.searchwishlistshow').html(html);
					$('.paginate').hide();
				}
				})
			
			})

			$('.removewishlist').click(function(){
				var course_id = $(this).data('course_id');
				removesave(course_id);
			})

			$('.searchwishlistshow').on('click','.removewishlists',function(){
				var course_id = $(this).data('course_id');
				removesave(course_id);
			})

			function removesave(id) {
				$.post('removewishlist',{id:id},function(data){
					if(data){
						location.reload();
					}
					
				})
			}
			// end search in wishlist


			// start search in mystudying

			$('.searchmystudying').keyup(function(){
				var data = $(this).val();
				var user_id = $(this).data('user_id');
				var html = "";
				var instructor = "";
				var heart = false;
				var empty = false;
				// frontendcontroller
				$.post('searchmystudying',{data:data},function(res){
					
					if(res){
						var response = JSON.parse(res);
						
						$.each(response,function(g,h){
							if(h.length > 0){
							$.each(h,function(i,v){
								

							$.each(v.sales,function(c,d){
								// console.log(d);
								if(d.pivot.status == 1){
									if(d.user_id == user_id && d.pivot.course_id == v.id){
										heart = true;
									};
								};
							})
							
							if(heart == true){
							
							html+=`<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
								    <div class="card h-100">
								    	<a href="{{ route('lecture','1') }}">
								      		<img src="${v.image}" class="card-img-top" alt="...">
								      	</a>


								      	<div class="card-body">
								      		<a href="{{ route('lecture','1') }}">
									        	<h4 class="fontbold text-dark"> ${v.title} </h4>
									        </a>
									        <a href="{{ route('instructor','1') }}">
								        		<p class="card-text fst-italic text-muted">`;
								        	$.each(v.instructors,function(a,b) {
								        		html += b.user.name;
								        		
								        	})
								        			
								        	html+=`</p>
								        	</a>
								        		<small class="card-text text-muted"> </small>
								      	</div>
								      	<div class="card-footer bg-transparent border-top-0">
								      		<div class="row">
								      			<div class="col-12">
								      				<div class="progress" style="height: 5px;">
				                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 80%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
				                                    </div>
								      			</div>
								      		</div>
								        	<div class="row mt-3">
								        		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
								        			
				                                    <small class="text-muted"> 80% complete </small>
								        		</div>

								        		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
								        			<a href="javascript:void(0)" data-toggle="modal" data-target="#ratingModal">
									        			<div class="rating float-right">
							                                <i class='bx bxs-star custom_primary_Color'></i>
							                                <i class='bx bxs-star custom_primary_Color'></i>
							                                <i class='bx bxs-star custom_primary_Color' ></i>
							                                <i class='bx bxs-star-half custom_primary_Color' ></i>

							                                <i class='bx bx-star' ></i>

							                                <small class="text-muted d-block"> Your Ratings  </small>
							                            </div>
							                        </a>
								        		</div>
								        	</div>
								      	</div>
								    </div>
								</div>`;
								}
								
							})
						}else{
							empty = true;
						}
						})

						$('.mystudying').html(html);
					}
						if(empty == true){
						
						html+=`<div class="text-center">
									<img src="{{asset('/externalphoto/empty_result.gif')}}" class="img-fluid" width="40%" height="60%">
								</div>`;
						$('.mystudying').html(html);
						$('.paginate').hide();
					}
				
				})
				
			})

			// end search in my studying

			// store new collection

          function showValidationErrors(name, error) {
           
              var group = $("#form-group-" + name);
               console.log(group);
              group.addClass('has-error');
              group.find('.show-error').html(error);
          }

          function clearValidationError(name) {
              console.log(name);
              var group = $("#form-group-" + name);
              group.removeClass('has-error');
              group.find('.show-error').html('');
          }

          $("#installment_date").on('change', function () {
              clearValidationError($(this).attr('id').replace('#', ''))
          });

          $("#payment").on('change', function () {
              clearValidationError($(this).attr('id').replace('#', ''))
          });



          $('#store_collection').submit(function(event){
            event.preventDefault();
            var collection_data = new FormData(this);
            // console.log(installment_data);
            $.ajax({
              url : '{{route('collections.store')}}',
              data:collection_data,
              processData : false,
              contentType: false,
              type : 'POST',
              success:function(res){
                if(res){
                  $('#newcollectionModal').hide();
                  location.reload();
                }

              },
              error:function(error){
                if(error.status == 422){
                      var errors = error.responseJSON;
                      var data = errors.errors;
          
                      $.each(data,function(i,v){
                          showValidationErrors(i,v);
                      })
                      $('.newcollectionModal').modal('show');
                  }
              }

            })
        })

			

	    })
  	</script>
@stop
			


		


</x-frontend>