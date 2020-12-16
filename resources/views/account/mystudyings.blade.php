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
							<div class="text-center">
								<img src="{{asset('/externalphoto/empty_buycourse.gif')}}" class="img-fluid" width="40%" height="60%">
							</div>
							@endif

                		</div>
                		
                		
              			{{-- Collect Tab --}}

              			
                		<div class="tab-pane fade" id="collectionList" role="tabpanel" aria-labelledby="profile-tab">  
                			
                			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
							  	<a href="javascript:void(0)" class="btn custom_primary_btnColor" data-toggle="modal" data-target="#newcollectionModal"> Create New Collection </a>
							</div>
							@if(count($collections)>0)
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
							<div class="text-center">
								<img src="{{asset('/externalphoto/empty_collection.gif')}}" class="img-fluid" width="40%" height="60%">
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
							<div class="text-center">
								<img src="{{asset('/externalphoto/emtyp_wishlist.gif')}}" class="img-fluid" width="40%" height="60%">
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