<x-backend>

	@php
		if (isset($questions)) {
			$totalQuiz = count($questions);

			$timers = 0;
			$marks = 0; $totalmark = 0;

			foreach ($questions as $quiz) {
				$timer = $quiz->timer;
				$timers += $timer++;

    			foreach ($quiz->checks as $check) {
    				$mark = (int)$check->mark;
    				
    				if ($mark > 0) {
    					$totalmark += $marks + $mark;
    				}
    				if($mark < 0){
    					$totalmark += $marks - abs($mark); 
    				}
    			}


			}
			if ($timers) {
				$totalTimer = Carbon\CarbonInterval::seconds($timers)->cascade()->forHumans();
			}else{
				$totalTimer = '0 second';
			}
            

		}

	@endphp

	<div class="row">
	    <div class="col-auto d-none d-sm-block">
	        <h3 class="d-inline-block"><strong> {{ $test->title }} </strong> </h3>
	        @if(isset($questions))
	        <p class="mt-3"> 
	            <span class="fontbold"> {{ $totalQuiz }} </span> Quizzes • 
	            <span class="fontbold"> {{ $totalTimer }} </span> Timer in Total • 
	            <span class="fontbold"> {{ $totalmark }} </span> Total Marks
	        </p>
	        @endif
	    </div>

	    <div class="col-auto ml-auto text-right mt-n1">
			<a href="javascript:void(0)" class="btn custom_primary_btnColor float-right" data-toggle="modal" data-target="#newquestionModal" ><i class="align-middle fas fa-plus"></i> Add New Question </a>
		</div>
	    
   	</div>

   	@if ($questions->isEmpty())
   	<div class="row mt-3">

	   	<div class="col-12">
	      	<div class="card">
	         	<div class="card-body">
		            <div class="row justify-content-center">
		               	<div class="col-xl-3 col-lg-3 col-md-6 col-sm-10 col-10 py-5">
			                <svg id="e18ebc6e-17e0-463f-bef8-5e03a9b69a2f" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 941.40412 435.42027"><title>online_test</title><path d="M213.79147,646.81347l-1.26717-.475c-.27846-.10493-27.99252-10.72312-40.975-34.79939-12.983-24.07742-6.62584-53.06672-6.56012-53.35613l.29921-1.32021,1.26659.475c.27846.10493,27.99194,10.72312,40.975,34.79939,12.983,24.07742,6.62585,53.06672,6.56012,53.35613Zm-40.16325-36.39516c10.97621,20.35661,32.87672,30.79147,38.42564,33.17362,1.055-5.94729,4.36362-29.99705-6.60278-50.33406-10.96525-20.33472-32.87441-30.78572-38.42564-33.17363C165.96985,566.035,162.6624,590.08244,173.62822,610.41831Z" transform="translate(-129.29794 -232.28986)" fill="#3f3d56"/><path d="M181.47093,603.09347c23.33121,14.03683,32.3168,41.91784,32.3168,41.91784s-28.84178,5.12282-52.173-8.914-32.3168-41.91784-32.3168-41.91784S158.13972,589.05664,181.47093,603.09347Z" transform="translate(-129.29794 -232.28986)" fill="#d0cde1"/><path d="M928.14845,237.65218H667.97885v-5.36232h-117.971v5.36232H288.76576a17.59851,17.59851,0,0,0-17.59851,17.59852V611.50288a17.59856,17.59856,0,0,0,17.59851,17.59858H928.14845A17.59856,17.59856,0,0,0,945.747,611.50288V255.2507A17.5985,17.5985,0,0,0,928.14845,237.65218Z" transform="translate(-129.29794 -232.28986)" fill="#3f3d56"/><rect x="165.46352" y="36.46377" width="627.3913" height="353.91304" fill="#f9a826"/><circle cx="478.62294" cy="20.37681" r="6.43478" fill="#f9a826"/><path d="M886.1358,313.7967h-29.74V284.05675h29.74Zm-28.44691-1.293h27.15387V285.34979H857.68889Z" transform="translate(-129.29794 -232.28986)" fill="#3f3d56"/><path d="M963.36275,616.23188H902.13344v-4.41154a.87468.87468,0,0,0-.87471-.8747H880.26582a.87468.87468,0,0,0-.8747.8747v4.41154H866.27055v-4.41154a.87468.87468,0,0,0-.8747-.8747H844.40294a.87468.87468,0,0,0-.87471.8747v4.41154H830.40767v-4.41154a.87468.87468,0,0,0-.87471-.8747H808.54a.87468.87468,0,0,0-.8747.8747v4.41154H794.54478v-4.41154a.87468.87468,0,0,0-.8747-.8747H772.67717a.87468.87468,0,0,0-.8747.8747v4.41154H758.6819v-4.41154a.87468.87468,0,0,0-.87471-.8747h-20.9929a.87468.87468,0,0,0-.87471.8747v4.41154H722.819v-4.41154a.87467.87467,0,0,0-.8747-.8747H700.9514a.87468.87468,0,0,0-.8747.8747v4.41154H686.95613v-4.41154a.87468.87468,0,0,0-.8747-.8747H521.637a.87468.87468,0,0,0-.8747.8747v4.41154H507.64171v-4.41154a.87468.87468,0,0,0-.8747-.8747H485.7741a.87468.87468,0,0,0-.87471.8747v4.41154H471.77883v-4.41154a.87468.87468,0,0,0-.87471-.8747H449.91121a.87468.87468,0,0,0-.8747.8747v4.41154H435.91594v-4.41154a.87468.87468,0,0,0-.8747-.8747H414.04833a.87468.87468,0,0,0-.87471.8747v4.41154H400.05306v-4.41154a.87468.87468,0,0,0-.87471-.8747H378.18544a.87468.87468,0,0,0-.8747.8747v4.41154H364.19017v-4.41154a.87468.87468,0,0,0-.8747-.8747H342.32256a.87468.87468,0,0,0-.8747.8747v4.41154H328.32729v-4.41154a.87468.87468,0,0,0-.87471-.8747h-20.9929a.87468.87468,0,0,0-.87471.8747v4.41154h-40.2364a20.99291,20.99291,0,0,0-20.99291,20.9929v9.4925a20.99291,20.99291,0,0,0,20.99291,20.99286H963.36275a20.99292,20.99292,0,0,0,20.99291-20.99286v-9.4925A20.99292,20.99292,0,0,0,963.36275,616.23188Z" transform="translate(-129.29794 -232.28986)" fill="#3f3d56"/><rect x="28.71132" y="413.88349" width="912.69281" height="2.78529" fill="#3f3d56"/><path d="M883.36954,465.96058h-202v-115h202Zm-200-2h198v-111h-198Z" transform="translate(-129.29794 -232.28986)" fill="#3f3d56"/><path d="M513.36954,488.96058h-180v-112h180Zm-178-2h176v-108h-176Z" transform="translate(-129.29794 -232.28986)" fill="#3f3d56"/><path d="M417.46378,445.96058l-.17236-2.23633c-.51563-4.64356,1.03223-9.71777,5.332-14.87695,3.87012-4.5586,6.02-7.91211,6.02-11.78223,0-4.38574-2.75195-7.30957-8.16992-7.39551a15.28045,15.28045,0,0,0-8.686,2.666l-2.064-5.418c2.83838-2.06445,7.74023-3.44043,12.29785-3.44043,9.89014,0,14.36182,6.10644,14.36182,12.6416,0,5.84863-3.26807,10.0625-7.396,14.96387-3.78369,4.47168-5.15967,8.25586-4.90186,12.6416l.08594,2.23633Zm-1.89209,12.04a5.08415,5.08415,0,0,1,5.15967-5.418c3.01025,0,5.07422,2.23535,5.07422,5.418a5.12129,5.12129,0,1,1-10.23389,0Z" transform="translate(-129.29794 -232.28986)" fill="#d0cde1"/><path d="M776.46378,420.96058l-.17236-2.23633c-.51563-4.64356,1.03223-9.71777,5.332-14.87695,3.87012-4.5586,6.02-7.91211,6.02-11.78223,0-4.38574-2.75195-7.30957-8.16992-7.39551a15.28045,15.28045,0,0,0-8.686,2.666l-2.064-5.418c2.83838-2.06445,7.74023-3.44043,12.29785-3.44043,9.89014,0,14.36182,6.10644,14.36182,12.6416,0,5.84863-3.26807,10.0625-7.396,14.96387-3.78369,4.47168-5.15967,8.25586-4.90186,12.6416l.08594,2.23633Zm-1.89209,12.04a5.08415,5.08415,0,0,1,5.15967-5.418c3.01025,0,5.07422,2.23535,5.07422,5.418a5.12129,5.12129,0,1,1-10.23389,0Z" transform="translate(-129.29794 -232.28986)" fill="#d0cde1"/><circle cx="482.69312" cy="260.84872" r="86.29225" fill="#2f2e41"/><polygon points="449.365 379.018 423.568 374.348 431.935 320.484 457.731 325.154 449.365 379.018" fill="#2f2e41"/><rect x="608.43233" y="564.07272" width="26.21537" height="46.9692" transform="translate(-14.69358 -333.60977) rotate(10.26106)" fill="#2f2e41"/><ellipse cx="626.08228" cy="611.19594" rx="8.1923" ry="21.84614" transform="translate(-226.21522 871.66478) rotate(-78.58697)" fill="#2f2e41"/><ellipse cx="572.1108" cy="611.25703" rx="8.1923" ry="21.84614" transform="translate(-238.2839 865.84819) rotate(-82.4537)" fill="#2f2e41"/><circle cx="488.73433" cy="239.74114" r="29.49229" fill="#fff"/><circle cx="500.85556" cy="229.16973" r="9.83076" fill="#3f3d56"/><path d="M543.91852,399.26184c-1.29768-31.94667,26.23575-59.00572,61.49764-60.43807s64.89929,23.30439,66.197,55.25107-23.21382,39.20523-58.47571,40.63758S545.21621,431.20852,543.91852,399.26184Z" transform="translate(-129.29794 -232.28986)" fill="#fff"/><ellipse cx="691.67001" cy="477.41757" rx="43.14613" ry="13.5449" transform="translate(-218.47935 -65.68735) rotate(-12.9101)" fill="#2f2e41"/><ellipse cx="522.28158" cy="505.58661" rx="43.14613" ry="13.5449" transform="translate(-229.05476 -102.82038) rotate(-12.9101)" fill="#2f2e41"/><path d="M588.29085,527.14527A19.66153,19.66153,0,0,0,626.985,534.15c1.9343-10.68509-6.32706-14.46612-17.01215-16.40043S590.22516,516.46018,588.29085,527.14527Z" transform="translate(-129.29794 -232.28986)" fill="#fff"/><rect x="154.5348" y="13.12227" width="141.88698" height="134.9673" fill="#d0cde1"/><rect x="170.65832" y="29.24579" width="109.63994" height="83.84231" fill="#fff"/><rect x="170.54973" y="122.97937" width="59.63671" height="3.13877" fill="#f2f2f2"/><rect x="170.54973" y="132.3957" width="59.63671" height="3.13877" fill="#f2f2f2"/><circle cx="190.16707" cy="71.18959" r="12.5551" fill="#3f3d56"/><circle cx="225.47829" cy="71.18959" r="12.5551" fill="#f9a826"/><circle cx="260.7895" cy="71.18959" r="12.5551" fill="#e6e6e6"/><circle cx="225.47829" cy="20.9692" r="6.27755" fill="#3f3d56"/><rect x="222.02216" y="274.45884" width="141.88698" height="134.9673" fill="#d0cde1"/><rect x="238.14568" y="290.58236" width="109.63994" height="83.84231" fill="#fff"/><rect x="262.27176" y="304.36086" width="38.437" height="38.437" fill="#f9a826"/><path d="M406.28392,546.26247V592.936h46.67356V546.26247Zm44.64908,44.649H408.30839V548.287H450.933Z" transform="translate(-129.29794 -232.28986)" fill="#3f3d56"/><rect x="238.0371" y="382.74656" width="59.63671" height="3.13877" fill="#f2f2f2"/><circle cx="292.96565" cy="282.30578" r="6.27755" fill="#3f3d56"/><rect x="591.4365" y="234.05278" width="141.88698" height="134.9673" fill="#d0cde1"/><rect x="607.56002" y="250.1763" width="109.63994" height="83.84231" fill="#fff"/><rect x="650.5867" y="315.8124" width="23.58659" height="6.98967" fill="#3f3d56"/><rect x="622.07157" y="261.39284" width="80.61684" height="2.99557" fill="#3f3d56"/><rect x="622.07157" y="270.87882" width="80.61684" height="2.99557" fill="#3f3d56"/><rect x="622.07157" y="280.36479" width="80.61684" height="2.99557" fill="#3f3d56"/><rect x="622.07157" y="289.85077" width="80.61684" height="2.99557" fill="#3f3d56"/><rect x="622.07157" y="299.33675" width="80.61684" height="2.99557" fill="#3f3d56"/><rect x="607.45144" y="342.3405" width="59.63671" height="3.13877" fill="#f2f2f2"/><rect x="607.45144" y="350.18743" width="83.17752" height="3.13877" fill="#f2f2f2"/><circle cx="662.37999" cy="241.89971" r="6.27755" fill="#3f3d56"/></svg>
		               	</div>
		               	<div class="row justify-content-center text-center">
		                  	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10">
		                     	<h3 class="mt-5"> No Questions created in this quiz. </h3>
		                     	<p class="my-4 text-muted"> You haven't created any question yet. So, we don't have anything to show you! Go create some! </p>
		                  	</div>
		               	</div>
		            </div>
	         	</div>
	      	</div>
	   	</div>
	</div>
   	@else
	<div class="row mt-3">
		<div class="col-12">
			<div class="accordion" id="accordionExample">
				@foreach($questions as $i => $quiz)

					@php
						$timer = $quiz->timer;
						

			            $timer_count = Carbon\CarbonInterval::seconds($timer)->cascade()->forHumans();

				        
				        if ($quiz->type == 'multicheck') {
				        	$type = 'Multiple Choice';
				        }elseif($quiz->type == 'checkbox'){
				        	$type = 'Multiple Answers';
				        }else{
				        	$type = 'True/False';
				        }

					@endphp

					<div class="card border border-warning my-3">
                        <a href="javascript:void(0)" data-toggle="collapse" data-target="#row{{$i}}" aria-expanded="false" aria-controls="row{{$i}}">
                        <div class="card-header" id="headingOne">
                        	<div class="row">
                        		<div class="col-8 ">
		                            <h5 class="card-title"> {{ $quiz->question }}</h5>
	                                <p class="mt-2 mb-0 text-muted"> 
	                                    <span class="fontbold"> {{ $timer_count }} </span> • 
	                                    {{ $type }}
	                                </p>
		                        </div>

		                        <div class="col-4 d-flex align-items-center justify-content-center">
		                        	<span  data-toggle="tooltip" data-placement="top" title="Edit Question">
			                        	<button class="btn btn-light custom_primary_Color btn-sm editbtn" data-id={{$quiz->id}}>  
											<i class="align-middle mr-2" data-feather="edit-2"></i> Edit 
										</button>
									</span>

									<form method="post" action="{{ route('backside.quiz.destroy',$quiz->id) }}" class="d-inline-block" onsubmit="return confirm('Are you Sure want to Delete?')">
										@csrf
										@method('DELETE')

										<button class="btn btn-light text-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Remove this question" type="submit"> 
											<i class="align-middle mr-2" data-feather="x"></i>  Remove 
										</button>
									</form>

		                        </div>
		                        

	                        </div>
                        </div>
                        </a>

                        <div id="row{{$i}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                            	
                                <div class="row">
                                	<div class="col-12">
                                        <div class="card bg-light border">
                                            <div class="card-body">
                                        		@php
                                        			$marks = 0; $totalmark = 0;
                                        			foreach ($quiz->checks as $check) {
                                        				$mark = (int)$check->mark;
                                        				
                                        				if ($mark > 0) {
                                        					$totalmark += $marks + $mark;
                                        				}
                                        				if($mark < 0){
                                        					$totalmark += $marks - abs($mark); 
                                        				}
                                        			}
                                        		@endphp
                                            		
	                                            
	                                            <div class="float-right"> <span class="text-dark fontbold"> {{ $totalmark }} </span> Marks </div>

	                                           	@foreach($quiz->checks as $check)

                                            		<p> 
                                            			@if($check->rightanswer =='true')
                                            			<i class="align-middle mr-2 text-success" data-feather="check"></i>
                                            			@else
                                            			<i class="align-middle mr-2 text-danger" data-feather="x"></i> 
                                            			@endif
                                            			<span class="fontbold @if($check->rightanswer =='true') text-success @endif"> {{ $check->answer }} </span>
                                            		</p>


                                            	@endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                    </div>

				@endforeach
			</div>
		</div>
	</div>
   		
   	@endif

<!-- New Question Modal -->
	<div class="modal fade" id="newquestionModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
			<div class="modal-content ">
				<div class="modal-header">
					<h5 class="modal-title"> New Question </h5>
					<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="addForm">
					<input type="hidden" name="testid" id="testId" value="{{ $test->id }}">
					<div class="modal-body m-2">

						<div class="card mb-3 border">
							<div class="card-header bg-secondary text-white"> Question Info </div>
							<div class="card-body bg-light">
							    <div class="row mb-3">
									<label for="titleId" class="col-sm-2 col-form-label"> Question </label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="titleId" placeholder="Enter Question" name="question">
										<span class="n_err_title error d-block text-danger"></span>

									</div>
								</div>

								<div class="row mb-3">
									<label for="titleId" class="col-sm-2 col-form-label"> Type </label>
									<div class="col-sm-10">
										<div class="form-check form-check-inline">
			                                <input type="radio" name="type" value="multicheck" class="form-check-input type_check " id="inlineRadio1" checked="">
			                                <label class="form-check-label" for="inlineRadio1">Multiple Choice</label>
			                            </div>
			                            <div class="form-check form-check-inline">
			                                <input type="radio" name="type" value="checkbox" class="form-check-input type_check " id="inlineRadio2">
			                                <label class="form-check-label" for="inlineRadio2"> Multiple Answers </label>
			                            </div>
			                            <div class="form-check form-check-inline">

			                                <input type="radio" name="type" value="truefasle" class="form-check-input type_check " id="inlineRadio3">

			                                <label class="form-check-label" for="inlineRadio3">True/False</label>
			                            </div>
									</div>
								</div>

								<div class="form-group row mt-3">
			                        <label class="col-form-label col-md-2">Timer</label>
			                        <div class="col-md-10">
			                            <select class="form-control" name="timer">
			                                    <option value="5" selected="">5 seconds</option>
			                                    <option value="10">10 seconds</option>
			                                    <option value="20">20 seconds</option>
			                                    <option value="30">30 seconds</option>
			                                    <option value="40">40 seconds</option>
			                                    <option value="50">50 seconds</option>
			                                    <option value="60">1 minutes</option>
			                                    <option value="120">2 minutes</option>
			                                    <option value="180">3 minutes</option>
			                                    <option value="300">5 minutes</option>
			                                    <option value="600">10 minutes</option>
			                            </select>
			                        </div>
			                    </div> 
							</div>
						</div>

						<div class="card mb-3 border">
							<div class="card-header bg-secondary text-white"> Answer Choices 
								<button type="button" class="btn btn-light float-right btn-sm btn_add_answer"><i class="fas fa-plus"></i>Add Answer</button>
							</div>
							<div class="card-body bg-light">

								<p> Select/Check Correct Answer Below </p>

								<div class="add_answer">
			                        <div class="form-group row mt-3">
			                            <label class="col-form-label col-md-2 answer_label">Answer1 </label>
			                            <div class="col-md-10">
			                            	<div class="input-group">
				                            	<div class="input-group-text">
													<input type="checkbox" name="trueanswer[]" class="form-check-input data_check @error('trueanswer') is-invalid @enderror" value="0">
												</div>
				                                <input type="text" name="answer[]" class="form-control answers" placeholder="Answer 1" >
				                                <input type="number" name="marks[]" class="form-control points" placeholder="Marks" >
				                            </div>
			                            </div>
			                        </div>

			                        <div class="form-group row mt-3">

			                            <label class="col-form-label col-md-2 answer_label">Answer2 </label>
			                            <div class="col-md-10">
			                            	<div class="input-group">
				                            	<div class="input-group-text">
				                                	<input type="checkbox" name="trueanswer[]" class="form-check-input data_check @error('trueanswer') is-invalid @enderror" value="1" >
				                                </div>

				                                <input type="text" name="answer[]" class="form-control answers" placeholder="Answer 2">
				                                <input type="number" name="marks[]" class="form-control points" placeholder="Marks" >
				                            </div>
			                            </div>
			                        </div>
			                        
			                        <div class="show_hide">
			                            <div class="form-group row mt-3 anser_3">
			                                <label class="col-form-label col-md-2 answer_label">Answer3 </label>
			                                <div class="col-md-10">
			                                	<div class="input-group">
				                            		<div class="input-group-text">
				                                    	<input type="checkbox" name="trueanswer[] @error('trueanswer') is-invalid @enderror" class="form-check-input data_check" value="2">
				                                    </div>

				                                    <input type="text" name="answer[]" class="form-control @error('answer') is-invalid @enderror answers" placeholder="Answer 3" >
				                                    <input type="number" name="marks[]" class="form-control points" placeholder="Marks" >
				                                </div>
			                                </div>
			                            </div>
			                        </div>

									<span class="n_err_answer error d-block text-danger"></span>
									<span class="n_err_trueanswer error d-block text-danger"></span>

			                    </div>
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

<!-- Edit Question Modal -->
	<div class="modal fade" id="editquestionModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
			<div class="modal-content ">
				<div class="modal-header">
					<h5 class="modal-title"> Edit Question </h5>
					<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="editForm">
					<input type="hidden" name="testid" id="e_testId" value="{{ $test->id }}">
					<input type="hidden" name="quizid" id="e_quizId">
					<div class="modal-body m-2">

						<div class="card mb-3 border">
							<div class="card-header bg-secondary text-white"> Question Info </div>
							<div class="card-body bg-light">
							    <div class="row mb-3">
									<label for="e_titleId" class="col-sm-2 col-form-label"> Question </label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="e_titleId" placeholder="Enter Question" name="question">
										<span class="n_err_title error d-block text-danger"></span>

									</div>
								</div>

								<div class="row mb-3">
									<label for="e_typeId" class="col-sm-2 col-form-label"> Type </label>
									<div class="col-sm-10">
										<input type="hidden" name="type" id="e_typeId">
										<span id="typeText"></span>
									</div>
								</div>

								<div class="form-group row mt-3">
			                        <label class="col-form-label col-md-2">Timer</label>
			                        <div class="col-md-10">
			                            <select class="form-control" name="timer" id="e_timerId">
			                                    <option value="5000">5 seconds</option>
			                                    <option value="10000">10 seconds</option>
			                                    <option value="20000">20 seconds</option>
			                                    <option value="30000">30 seconds</option>
			                                    <option value="40000">40 seconds</option>
			                                    <option value="50000">50 seconds</option>
			                                    <option value="60000">1 minutes</option>
			                                    <option value="120000">2 minutes</option>
			                                    <option value="180000">3 minutes</option>
			                                    <option value="300000">5 minutes</option>
			                                    <option value="600000">10 minutes</option>
			                            </select>
			                        </div>
			                    </div> 
							</div>
						</div>

						<div class="card mb-3 border">
							<div class="card-header bg-secondary text-white"> Answer Choices 
								<button type="button" class="btn btn-light float-right btn-sm btn_add_answer"><i class="fas fa-plus"></i>Add Answer</button>
							</div>
							<div class="card-body bg-light">

								<p> Select/Check Correct Answer Below </p>

								<div class="add_answer">
			                        

									<span class="n_err_answer error d-block text-danger"></span>
									<span class="n_err_trueanswer error d-block text-danger"></span>

			                    </div>
			                </div>
			            </div>


					</div>
					<div class="modal-footer">
						<p> Please select an answer </p>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@section('script_content')
	<style type="text/css">
		.points{
			max-width: 15%;
		}
	</style>
   	<script type="text/javascript">
      $(document).ready(function() {
            
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


		$('.select2').select2({
			placeholder: "Choose Section in this course",
			theme: 'bootstrap4',
		});

		$('.show_hide').show();
        // $('.add_answer').find('.data_check').prop('disabled',true);

        if ($('.type_check:checked').val() == "multicheck") {
        	$('.add_answer').find('.data_check').prop('type','radio');
	        $('.btn_add_answer').show();

        } else if ($('.type_check:checked').val() == "checkbox") {
            $('.add_answer').find('.data_check').prop('type','checkbox');
	        $('.btn_add_answer').show();

        }else{
        	$('.add_answer').find('.data_check').prop('type','radio');
        	$('.btn_add_answer').hide();
        }

        $("input[name=type]:radio").click(function () {
            if ($('.type_check:checked').val() == "multicheck") {
                $('.add_answer').find('.data_check').prop('type','radio');
	        	$('.btn_add_answer').show();


            }  else if ($('.type_check:checked').val() == "checkbox") {
            	$('.add_answer').find('.data_check').prop('type','checkbox');
	        	$('.btn_add_answer').show();

	        }else{
	        	$('.add_answer').find('.data_check').prop('type','radio');
	        	$('.btn_add_answer').hide();
	        }
        });        

        $('.btn_add_answer').click(function(){
            // $('.add_answer').find('.data_check').prop('disabled',true);
            var data = $('.type_check:checked').val();
            var html = '';
            // var answer=new Array();
            var answer=($('.answer_label').text());
            var ans = answer.split(' ');
            var last_array =ans[ans.length-2];
            console.log(ans.length); 
            if (ans.length == 6) {
	        	$('.btn_add_answer').prop('disabled',true);
            }else{
	        	$('.btn_add_answer').prop('disabled',false);

            }
            var input_type ='';
            if(data == 'multicheck'){
                input_type = 'radio';
            }else if(data == 'checkbox'){
                input_type = 'checkbox';
            }
            if(last_array == "Answer2"){
                html+=`
                <div class="show_hide">
                    <div class="form-group row mt-3 answer3">
                        <label class="col-form-label col-md-2 answer_label">Answer3 </label>
                        <div class="col-md-10">
                        	<div class="input-group">
                        		<div class="input-group-text">
                                	<input type="${input_type}" name="trueanswer[]" class="form-check-input data_check" value="2">
                                </div>

                                <input type="text" name="answer[]" class="form-control" placeholder="Answer 3" >
                                <input type="number" name="marks[]" class="form-control points" placeholder="Marks" >

                                <button class="btn btn-danger delete_ans" type="button">
                                	<i class="fas fa-times"></i>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>`;
            }
            else if(last_array == "Answer3"){
            
            	html+=`
            	<div class="show_hide">
                    <div class="form-group row mt-3 answer4">
                        <label class="col-form-label col-md-2 answer_label">Answer4 </label>
                        <div class="col-md-10">
                        	<div class="input-group">
                        		<div class="input-group-text">
                                	<input type="${input_type}" name="trueanswer[]" class="form-check-input data_check" value="3">
                                </div>

                                <input type="text" name="answer[]" class="form-control" placeholder="Answer 4" >
                                <input type="number" name="marks[]" class="form-control points" placeholder="Marks" >

                                <button class="btn btn-danger delete_ans" type="button">
                                	<i class="fas fa-times "></i>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>`;
            
            }
            else if(last_array == "Answer4"){
                html+=`
                <div class="show_hide">
                    <div class="form-group row mt-3 answer5">
                        <label class="col-form-label col-md-2 answer_label">Answer5 </label>
                        <div class="col-md-10">
                        	<div class="input-group">
                        		<div class="input-group-text">
                                	<input type="${input_type}" name="trueanswer[]" class="form-check-input data_check" value="4">
                                </div>

                                <input type="text" name="answer[]" class="form-control" placeholder="Answer 5">
                                <input type="number" name="marks[]" class="form-control points" placeholder="Marks" >

                                <button class="btn btn-danger delete_ans" type="button">
                                	<i class="fas fa-times "></i>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>`;
            }
            else if(last_array == "Answer5"){
                html+=`
                <div class="show_hide">
                    <div class="form-group row mt-3 answer6">
                        <label class="col-form-label col-md-2 answer_label">Answer6 </label>
                        <div class="col-md-10">
                        	<div class="input-group">
                        		<div class="input-group-text">
                                	<input type="${input_type}" name="trueanswer[]" class="form-check-input data_check" value="5">
                                </div>

                                <input type="text" name="answer[]" class="form-control" placeholder="Answer 6" >
                                <input type="number" name="marks[]" class="form-control points" placeholder="Marks">

                                <button class="btn btn-danger delete_ans" type="button">
                                	<i class="fas fa-times "></i>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>`;
            }

            $('.add_answer').append(html);
            // $('.add_answer').find('.data_check').prop('disabled',true);
        })

        $('.add_answer').on('click','.delete_ans',function(){
            var answer=($('.answer_label').text());
            var ans = answer.split(' ');
            var last_array =ans[ans.length-2];
            var html ='';
            console.log(ans.length);
            if(last_array == "Answer6"){
                $('.answer6').remove();
            }else if(last_array == "Answer5"){
                $('.answer5').remove();    
            }else if(last_array == "Answer4"){
                $('.answer4').remove();    
            }

            if (ans.length > 7) {
	        	$('.btn_add_answer').prop('disabled',true);
            }else{
	        	$('.btn_add_answer').prop('disabled',false);

            }

            
        })

        $('.type_check').change(function(){
            var data = $(this).val();
            // select_data(data);
            if(data == "multicheck"){
                $('.show_hide').show(1000);
                $('.data_check').show(1000);
                $('.add_answer').find('.data_check').removeAttr('selected');
                $('.add_answer').find('.data_check').prop('disabled',false);
                $('.add_answer').find('.data_check').attr('type','radio');
                $('.btn_add_answer').show();
                $('.anser_3').show();

                
            }else if(data == "checkbox"){
                $('.show_hide').show(1000);
                $('.data_check').show(1000);
                $('.add_answer').find('.data_check').prop('disabled',false);
                $('.add_answer').find('.data_check').attr('type','checkbox');
                $('.btn_add_answer').show();
                $('.anser_3').show();
                

            }else if(data == "truefasle")
            {
                $('.add_answer').find('.data_check').attr('type','radio');
                $('.add_answer').find('.data_check').prop('disabled',false);
                $('.show_hide').hide(1000);
                $('.anser_3').hide();
            }
        });

        $('.answers').tooltip({'trigger':'focus', 'title': 'Your Choices'});

        // CREATE Quiz
        $("#newquestionModal").on('submit','#addForm',function(e){
            e.preventDefault();
            
            var formData = new FormData(this);

            $.ajax({
                type:'POST',
                url: "{{ route('backside.quiz.store')}}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {  
                	// jQuery.noConflict();

                    $("#newquestionModal").modal("hide");

                    location.reload();

                },
                error: function(error){
                    var message=error.responseJSON.message;
                    var err=error.responseJSON.errors;

                    $.each(err, function( key, value ) {
                        console.log(key);

                        if (key == "name") 
                        {
                            $('.n_err_title').html(err[key]);
                            $('#titleId').addClass('border border-danger');
                        }

                        if (key == "trueanswer") 
                        {
                            $('.n_err_trueanswer').html(err[key]);
                        }

                        if (key == "answer") 
                        {
                            $('.n_err_answer').html(err[key]);
                        }
                    });
                    //console.log(error.responseJSON.errors);
                    
                    
                }
            });
        });

        // EDIT Quiz
        $('.editbtn').click(function(){
            var id = $(this).data('id');

            var url="{{route('backside.quiz.edit',':id')}}";
            url=url.replace(':id',id);

            $.ajax({
                type:'GET',
                url: url,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {  
                	var question = data.question;
                	var timer = data.timer;
                	var quiz_type = data.type;
                	var checks = data.checks;
                	var input_type;
                	if (quiz_type == 'multicheck') {
			        	var type = 'Multiple Choice';
	        			$('.btn_add_answer').show();
	        			input_type = 'radio';


			        }else if(quiz_type == 'checkbox'){
			        	var type = 'Multiple Answers';
	        			$('.btn_add_answer').show();
	        			input_type = 'checkbox';

			        }else{
			        	var type = 'True/False';
	        			$('.btn_add_answer').hide();
	        			input_type = 'radio';


			        }
				    $('#e_quizId').val(id);
	      	  		$('#e_titleId').val(question);
	      	  		$('#e_typeId').val(quiz_type);
	      	  		$('#e_timerId').val(timer);

	      	  		$('#typeText').text(type);

	      	  		var html=''; var a=1;
	      	  		$.each(checks,function (i,v) {
	      	  			html+=`
			            	<div class="show_hide">
			                    <div class="form-group row mt-3 answer4">
			                        <label class="col-form-label col-md-2 answer_label">Answer${a} </label>
			                        <div class="col-md-10">
			                        	<div class="input-group">
			                        		<div class="input-group-text">
			                                	<input type="${input_type}" name="trueanswer[]" class="form-check-input data_check" value="${i}"`;
			            if (v.rightanswer == 'true') {
			            	html +=`checked`;
			            } 
			            html +=`> </div>

                                <input type="text" name="answer[]" class="form-control" placeholder="Answer ${a}" value="${v.answer}">
                                <input type="number" name="marks[]" class="form-control points" placeholder="Marks" value="${v.mark}">

                                <button class="btn btn-danger delete_ans" type="button">
                                	<i class="fas fa-times "></i>
                                </button>

			                    </div>
			                    </div>
			                    </div>
			                </div>`;

			            $('.add_answer').html(html);
			            a++;

	      	  		})



	                $("#editquestionModal").modal("show");

      	  		
                }
            });

        });

        // UPDATE Quiz
        $("#editquestionModal").on('submit','#editForm',function(e){
            e.preventDefault();
            
            var formData = new FormData(this);

            var id = $('#e_quizId').val();

            var url="{{route('backside.quiz.update',':id')}}";
            url=url.replace(':id',id);

            $.ajax({
                type:'POST',
                url: url,
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {  
                	// jQuery.noConflict();

                    $("#editquestionModal").modal("hide");

                    location.reload();

                },
                error: function(error){
                    var message=error.responseJSON.message;
                    var err=error.responseJSON.errors;

                    $.each(err, function( key, value ) {
                        console.log(key);

                        if (key == "name") 
                        {
                            $('.n_err_title').html(err[key]);
                            $('#titleId').addClass('border border-danger');
                        }

                        if (key == "trueanswer") 
                        {
                            $('.n_err_trueanswer').html(err[key]);
                        }

                        if (key == "answer") 
                        {
                            $('.n_err_answer').html(err[key]);
                        }
                    });
                    //console.log(error.responseJSON.errors);
                    
                    
                }
            });
        });

    });
	</script>
@stop
</x-backend>