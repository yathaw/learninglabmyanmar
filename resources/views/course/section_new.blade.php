<x-backend>
	<div class="row mb-2 mb-xl-3">
		<div class="col-auto d-none d-sm-block">
			<h3><strong> {{ $course->title }} </strong> </h3>
		</div>

		<div class="col-auto ml-auto text-right mt-n1">
			<a href="javascript:void(0)" class="btn custom_primary_btnColor float-right" data-toggle="modal" data-target="#newsectionModal" ><i class="align-middle fas fa-plus"></i> Add New Section </a>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="accordion" id="accordionExample">
				<ul class="list-unstyled section_sortable">
					@php $i=1; @endphp
					@foreach($sections as $section)
					
					<li class="section_sort" data-id="{{$section->id}}" data-sorting="{{ $section->sorting }}">
						<div class="card my-2 border border-warning">

							<div class="card-header" id="headingOne">
								<h5 class="card-title my-2">
									<div class="row">
										<div class="col-1 d-flex align-items-center justify-content-center">
											<i class="fas fa-bars handle"></i>
										</div>
										<div class="col-7">
											<a href="#" data-toggle="collapse" data-target="#row{{$i}}" aria-expanded="false" aria-controls="row{{$i}}">
												<b class="fontbold"> Section <span class="sectionNo">{{$i}}</span> : </b>{{$section->title}}

												<small class="d-block mt-2">{{$section->objective}}</small>
											</a>
										</div>
										<div class="col-3 d-flex align-items-center justify-content-center">
											<span  data-toggle="tooltip" data-placement="top" title="Create New Lecture Lesson in that section">
												<a href="javascript:void(0)" class="btn btn-light btn-sm text-success" data-toggle="modal" data-target="#newcontentModal">
													<i class="align-middle fas fa-plus"></i> Content 
												</a>
											</span>

											<a href="#" class="btn btn-light custom_primary_Color btn-sm editbtn" data-placement="top" title="Edit this section" data-toggle="modal" data-id={{$section->id}}>  
												<i class="align-middle mr-2" data-feather="edit-2"></i> Edit 
											</a>

											<form method="post" action="{{ route('backside.section.destroy',$section->id) }}" class="d-inline-block" onsubmit="return confirm('Are you Sure want to Delete?')">
												@csrf
												@method('DELETE')

												<button class="btn btn-light text-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Remove this section" type="submit"> 
													<i class="align-middle mr-2" data-feather="x"></i>  Remove 
												</button>
											</form>

											{{-- <a href="" class="btn btn-light text-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Remove this section">  
												<i class="align-middle mr-2" data-feather="x"></i>  Remove 
											</a> --}}
										</div>
									</div>
									
								</h5>
							</div>

							<div id="row{{$i}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
									<div class="card-body">
										<div class="row">
											<ul class="list-unstyled lecture_sortable" data-sid="{{$section->id}}">

												<li class="lecture_sort" data-sid="{{$section->id}}" data-id="1">
													<div class="col-12 my-2">
														<div class="card bg-light border">
															<div class="card-body">
																<div class="row">
																	<div class="col-1 d-flex align-items-center justify-content-center">
																		<i class="fas fa-bars handle"></i>
																	</div>
																	<div class="col-11">

																		<h5 class="d-inline-block"> 
																			<b class="fontbold"> Lecture <span class="lectureNo1"> 1 </span> : </b>
																			What Is HTML 
																		</h5>
																		<a href="" class="btn btn-light text-info">  
																			<i class="align-middle mr-2" data-feather="info"></i> Detail 
																		</a>

																		<a href="" class="btn btn-light custom_primary_Color">  
																			<i class="align-middle mr-2" data-feather="edit-2"></i> Edit 
																		</a>

																		<a href="" class="btn btn-light text-danger">  
																			<i class="align-middle mr-2" data-feather="x"></i>  Remove 
																		</a>
																	</div>

																</div>
															</div>
														</div>
													</div>
												</li>
											{{-- <li class="lecture_sort" data-sid="1" data-id="2">
												<div class="col-12 my-2">
													<div class="card bg-light border">
														<div class="card-body">
															<div class="row">
																<div class="col-1 d-flex align-items-center justify-content-center">
																	<i class="fas fa-bars handle"></i>
																</div>
																<div class="col-11">

																	<h5 class="d-inline-block"> 
																		<b class="fontbold"> Lecture <span class="lectureNo1"> 2 </span> : </b>
																		Structure
																	</h5>
																	<a href="" class="btn btn-light text-info">  
																		<i class="align-middle mr-2" data-feather="info"></i>Detail 
																	</a>

																	<a href="" class="btn btn-light custom_primary_Color">  
																		<i class="align-middle mr-2" data-feather="edit-2"></i> Edit 
																	</a>

																	<a href="" class="btn btn-light text-danger">  
																		<i class="align-middle mr-2" data-feather="x"></i>  Remove 
																	</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</li>

											<li class="lecture_sort" data-sid="1" data-id="3">
												<div class="col-12 my-2">
													<div class="card bg-light border">
														<div class="card-body">
															<div class="row">
																<div class="col-1 d-flex align-items-center justify-content-center">
																	<i class="fas fa-bars handle"></i>
																</div>
																<div class="col-11">

																	<h5 class="d-inline-block"> 
																		<b class="fontbold"> Lecture <span class="lectureNo1"> 3 </span> : </b>
																		List
																	</h5>
																	<a href="" class="btn btn-light text-info">  
																		<i class="align-middle mr-2" data-feather="info"></i>Detail 
																	</a>

																	<a href="" class="btn btn-light custom_primary_Color">  
																		<i class="align-middle mr-2" data-feather="edit-2"></i> Edit 
																	</a>

																	<a href="" class="btn btn-light text-danger">  
																		<i class="align-middle mr-2" data-feather="x"></i>  Remove 
																	</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</li>

											<li class="lecture_sort" data-sid="1" data-id="4">
												<div class="col-12 my-2">
													<div class="card bg-light border">
														<div class="card-body">
															<div class="row">
																<div class="col-1 d-flex align-items-center justify-content-center">
																	<i class="fas fa-bars handle"></i>
																</div>
																<div class="col-11">

																	<h5 class="d-inline-block"> 
																		<b class="fontbold"> Lecture <span class="lectureNo1"> 4 </span> : </b>
																		Links
																	</h5>
																	<a href="" class="btn btn-light text-info">  
																		<i class="align-middle mr-2" data-feather="info"></i> Detail 
																	</a>

																	<a href="" class="btn btn-light custom_primary_Color">  
																		<i class="align-middle mr-2" data-feather="edit-2"></i> Edit 
																	</a>

																	<a href="" class="btn btn-light text-danger">  
																		<i class="align-middle mr-2" data-feather="x"></i>  Remove 
																	</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</li>

											<li class="lecture_sort" data-sid="1" data-id="5">
												<div class="col-12 my-2">
													<div class="card bg-light border">
														<div class="card-body">
															<div class="row">
																<div class="col-1 d-flex align-items-center justify-content-center">
																	<i class="fas fa-bars handle"></i>
																</div>
																<div class="col-11">

																	<h5 class="d-inline-block"> 
																		<b class="fontbold"> Lecture <span class="lectureNo1"> 5 </span> : </b>
																		Tables
																	</h5>
																	<a href="" class="btn btn-light text-info">  
																		<i class="align-middle mr-2" data-feather="info"></i> Detail 
																	</a>

																	<a href="" class="btn btn-light custom_primary_Color">  
																		<i class="align-middle mr-2" data-feather="edit-2"></i> Edit 
																	</a>

																	<a href="" class="btn btn-light text-danger">  
																		<i class="align-middle mr-2" data-feather="x"></i>  Remove 
																	</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</li>

											<li class="lecture_sort" data-sid="1" data-id="6">
												<div class="col-12 my-2">
													<div class="card bg-light border">
														<div class="card-body">
															<div class="row">
																<div class="col-1 d-flex align-items-center justify-content-center">
																	<i class="fas fa-bars handle"></i>
																</div>
																<div class="col-11">

																	<h5 class="d-inline-block"> 
																		<b class="fontbold"> Lecture <span class="lectureNo1"> 6 </span> : </b>
																		Images
																	</h5>
																	<a href="" class="btn btn-light text-info">  
																		<i class="align-middle mr-2" data-feather="info"></i></i> Detail 
																	</a>

																	<a href="" class="btn btn-light custom_primary_Color">  
																		<i class="align-middle mr-2" data-feather="edit-2"></i> Edit 
																	</a>

																	<a href="" class="btn btn-light text-danger">  
																		<i class="align-middle mr-2" data-feather="x"></i>  Remove 
																	</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</li>

											<li class="lecture_sort" data-sid="1" data-id="7">
												<div class="col-12 my-2">
													<div class="card bg-light border">
														<div class="card-body">
															<div class="row">
																<div class="col-1 d-flex align-items-center justify-content-center">
																	<i class="fas fa-bars handle"></i>
																</div>
																<div class="col-11">

																	<h5 class="d-inline-block"> 
																		<b class="fontbold"> Lecture <span class="lectureNo1"> 7 </span> : </b>
																		Forms
																	</h5>
																	<a href="" class="btn btn-light text-info">  
																		<i class="align-middle mr-2" data-feather="info"></i></i> Detail 
																	</a>

																	<a href="" class="btn btn-light custom_primary_Color">  
																		<i class="align-middle mr-2" data-feather="edit-2"></i> Edit 
																	</a>

																	<a href="" class="btn btn-light text-danger">  
																		<i class="align-middle mr-2" data-feather="x"></i>  Remove 
																	</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</li>

											<li class="lecture_sort" data-sid="1" data-id="8">
												<div class="col-12 my-2">
													<div class="card bg-light border">
														<div class="card-body">
															<div class="row">
																<div class="col-1 d-flex align-items-center justify-content-center">
																	<i class="fas fa-bars handle"></i>
																</div>
																<div class="col-11">

																	<h5 class="d-inline-block"> 
																		<b class="fontbold"> Lecture <span class="lectureNo1"> 8 </span> : </b>
																		Divs
																	</h5>
																	<a href="" class="btn btn-light text-info">  
																		<i class="align-middle mr-2" data-feather="info"></i> Detail 
																	</a>

																	<a href="" class="btn btn-light custom_primary_Color">  
																		<i class="align-middle mr-2" data-feather="edit-2"></i> Edit 
																	</a>

																	<a href="" class="btn btn-light text-danger">  
																		<i class="align-middle mr-2" data-feather="x"></i>  Remove 
																	</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</li> --}}
										</ul>
									</div>

								</div>
							</div>

						</div>
					</li>
					@php $i++; @endphp
					@endforeach

				</ul>
			</div>

		</div>

	</div>

	<!-- New Section Modal -->
	<div class="modal fade" id="newsectionModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
			<div class="modal-content ">
				<div class="modal-header">
					<h5 class="modal-title"> New Section </h5>
					<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
				</div>
				<form method="post" action="{{route('backside.section.store')}}" enctype="multipart/form-data">
					<input type="hidden" name="courseid" value="{{ $course->id }}">
					@csrf
					<div class="modal-body m-3">
						<div class="row mb-3">
							<label for="titleId" class="col-sm-2 col-form-label"> Title </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="titleId" placeholder="Enter Title" name="title">
							</div>
						</div>

						<div class="row mb-3">
							<label for="objectiveId" class="col-sm-2 col-form-label"> Objective </label>
							<div class="col-sm-10">
								<textarea class="form-control" id="objectiveId" name="objective"></textarea>
								<small> What will students be able to do at the end of this section? </small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="objectiveId" class="col-sm-2 col-form-label"> Content Type </label>
							<div class="col-sm-10">
								<select class="form-control select2" name="contenttype">
									@foreach($contenttypes as $contenttype)
									<option value="{{$contenttype->id}}">{{$contenttype->name}}</option>
									@endforeach
								</select>
							</div>
						</div>

						{{-- <div class="row mb-3">
						    <label for="objectiveId" class="col-sm-2 col-form-label"> Instructor </label>
						    <div class="col-sm-10">
						    	<select class="form-control select2">
						    		<option>1</option>
						    		<option>2</option>
						    		<option>3</option>
						    	</select>
						    </div>
						</div> --}}
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- New Content Modal -->
	<div class="modal fade" id="newcontentModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
			<div class="modal-content ">
				<div class="modal-header">
					<h5 class="modal-title"> New Content </h5>
					<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
				</div>
				<form>
					<div class="modal-body m-3">
						<div class="row mb-3">
							<label for="titleId" class="col-sm-2 col-form-label"> Title </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="titleId" placeholder="Enter Title">
							</div>
						</div>

						<div class="row mb-3">
							<label for="objectiveId" class="col-sm-2 col-form-label"> Description </label>
							<div class="col-sm-10">
								<textarea class="form-control" id="objectiveId"></textarea>
								<small> What will students be able to do at the end of this section? </small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="objectiveId" class="col-sm-2 col-form-label"> Content Type </label>
							<div class="col-sm-10">
								<select class="form-control select2">
									<option>1</option>
									<option>2</option>
									<option>3</option>
								</select>
							</div>
						</div>

						<div class="row mb-3">
							<label for="objectiveId" class="col-sm-2 col-form-label"> Upload File </label>
							<div class="col-sm-10">
								<input type="file" name="file">
							</div>
						</div>


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	{{-- Edit Section Modal kyw --}}

	<div class="modal fade" id="editsectionModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
			<div class="modal-content ">
				<div class="modal-header">
					<h5 class="modal-title">Edit Section </h5>
					<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
				</div>
				<form method="post" action="" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="modal-body m-3">
						<div class="row mb-3">
							<label for="titleEdit" class="col-sm-2 col-form-label"> Title </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="titleEdit" name="title">
							</div>
						</div>

						<div class="row mb-3">
							<label for="objectiveEdit" class="col-sm-2 col-form-label"> Objective </label>
							<div class="col-sm-10">
								<textarea class="form-control" id="objectiveEdit" name="objective"></textarea>
								<small> What will students be able to do at the end of this section? </small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="objectiveId" class="col-sm-2 col-form-label"> Content Type </label>
							<div class="col-sm-10">
								<select class="form-control select2" name="contenttype" id="contenttypeEdit">
									
								</select>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Update changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	


	@section('script_content')

	<script type="text/javascript">

		$(document).ready(function() {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$(".section_sortable").sortable({
				containerSelector: "ul.section_sortable",
				itemSelector: "li.section_sort",
				handle: ".handle",
				placeholder:
				'<li><div class="card bg-primary text-white mb-1"><div class="card-header">Drop Here</div></div></li>',
				distance: 0,

				update: function(event, ui) {
					
					$('.section_sort').each(function(i) { 
						var id = $(this).data('id');

						var increaseId = $(this).index()+1;
			           	$(this).data('sorting', increaseId); // updates the data object
			           	$(this).attr('data-sorting', increaseId); // updates the attribute
			           	$(this).find('.sectionNo').html(increaseId);

			           $.post("/sectionsorting_modernize",{id:id, sorting:increaseId},function (res) {
      
					    });

			       });


				},


				onDrop: function($item, container, _super) {
					// console.log(id);
					$item.attr("style", null).removeClass("dragged");
					$("body").removeClass("dragging");
				}
			});

			$(".lecture_sortable").sortable({

				containerSelector: "ul.lecture_sortable",
				connectWith: $('.lecture_sortable'),

				itemSelector: "li.lecture_sort",
				handle: ".handle",
				placeholder:
				'<li><div class="card bg-primary text-white mb-1"><div class="card-header">Drop Here</div></div></li>',
				distance: 0,

				update: function(event, ui) {
					var ul_sectionid = ui.item.attr('data-sid');
					$('.lecture_sort').each(function(i) { 
						var li_sectionid = $(this).data('sid');

						var li_id = $(this).data('id');


						if (ul_sectionid == li_sectionid) {

							var increaseId = $(this).index()+1;

							console.log(li_sectionid);
				           $(this).data('id', increaseId); // updates the data object
				           $(this).attr('data-id', increaseId); // updates the attribute
				           $(this).find('.lectureNo'+ul_sectionid).html(increaseId);
				       }
				   });
				},

				onDrop: function($item, container, _super) {
					// console.log(id);
					$item.attr("style", null).removeClass("dragged");
					$("body").removeClass("dragging");
				}
			});

			$('.select2').select2({
				theme: 'bootstrap4',
			});


// ------------------------------------------ kyw---------------------------------------------------------------//
$('.editbtn').click(function(){
          	//alert('hi');
          	var id = $(this).data('id');
          	 //console.log(id);
          	 $.post('/backside/section/getid',{id:id},function(response){
          	  //console.log(response.id);
          	 //console.log(response.contenttype_id);
          	 $('#titleEdit').val(response.title);
          	 $('#objectiveEdit').text(response.objective);
          	 var contenttypeid=response.contenttype_id;
          	  	//console.log(contenttypeid);
          	  	$.post('/backside/section/getcontenttype',{contenttypeid:contenttypeid},function(res){
          	  		console.log(res);
          	  		var html = "";
          	  		$.each(res,function (i,v) {
          	  			html +=`<option value="${v.id}"`;

          	  			if(v.id==contenttypeid)
          	  				html+=`selected`;

          	  			html+=`>${v.name}</option>`;

          	  		})

          	  		$('#contenttypeEdit').html(html);
          	  	})

          	  })
          	 $('#editsectionModal').modal('show');

          	})

});


</script>

@stop

</x-backend>