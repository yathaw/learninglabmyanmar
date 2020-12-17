<x-frontend>

	<!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      	<div class="container">

        	<div class="d-flex justify-content-between align-items-center">
          		<h2> Course Collect </h2>
          		<ol>
            		<li><a href="{{ route('frontend.index') }}">Home</a></li>
            		<li> Dashboard </li>
          		</ol>
        	</div>


      	</div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      	<div class="container">
		    <div class="row">
            	<div class="col-md-12">
              		<div class="tab-content" id="myTabContent">

              			{{-- Add Course Tab --}}
              			
                		<div class="tab-pane fade show active" id="buyCourse" role="tabpanel" aria-labelledby="home-tab">
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
				      		<form action="{{route('store_course_collection')}}" method="post">
				      		@csrf
				      			<input type="hidden" name="collection_id" value="{{$collection->id}}">
					      		<div class="row g-4 mystudying">

					      			<div class="row mx-1 my-4">
						      			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
						      				<button class="btn btn-outline-success btn-sm col-md-4 btn_collection_save">Save</button>
						      			</div>
						      		</div>
					      			
					      			@foreach($sales as $sale)
					      			@foreach($sale->courses as $course)
					      			@if($course->pivot->status == 1)

									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 form-check">
									    <div class="card h-100">
									    	
									      		<input type="checkbox" name="course_collect_id[]" class="add_course_collection_checkbox form-check-input" width="20px" value="{{$course->id}}" 
									      		@foreach($course->collections as $collection)
									      			@if($collection->pivot->collection_id == $collection->id)
									      			checked="checked" 
									      			@endif
									      		@endforeach>

									      		<img src="{{asset($course->image)}}" class="card-img-top" alt="...">
									      	


									      	<div class="card-body">
									      		
										        	<h4 class="fontbold text-dark"> {{$course->title}} </h4>
										        
									        		<p class="card-text fst-italic text-muted"> 
									        			@foreach($course->instructors as $instructor)
									        				{{$instructor->user->name}}
									        			@endforeach
									        		</p>
									        	
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
									</div>
									@endif
									@endforeach
									@endforeach

								</div>
							</form>

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
                		
                		
                		
              		</div>
            	</div>
          	</div>

		</div>
    </section> 



@section('script_content')
  	<script type="text/javascript">
	    $(document).ready(function(){

	    	$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});



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
								    	<input type="checkbox" name="course_collect" class="add_course_collection_checkbox form-check-input">
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


          // collection save
          $('.btn_collection_save').click(function() {
          	var data = new Array();
          	data.push($('.add_course_collection_checkbox:checked').val());
          	console.log(data);
          })

			

	    })
  	</script>
@stop
			


		


</x-frontend>