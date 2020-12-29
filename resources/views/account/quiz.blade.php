<x-quiztemplate>

@php
	
	if ($totalTimer) {
		$timerss = Carbon\CarbonInterval::seconds($totalTimer)->cascade()->forHumans();
	}else{
		$timerss = '0 second';
	}

@endphp

<div class="container">
  	<div class="row justify-content-center">
    	<div class="col-lg-6 col-md-8">


      		<div class="card shadow quizrulesDiv">
        		<div class="card-header">
          			<h4 class="card-title py-2"> Some Rules of this Quiz </h4>
        		</div>
        		<div class="card-body">
          			<ol class="lh-lg">
          				<li> There are totally <span class="custom_primary_Color fontbold"> {{ $totalQuiz }} </span> questions. </li>
          				<li> <span class="custom_primary_Color fontbold"> {{ $timerss }} </span> Tracking in the zone </li>
          				<li> You will have only 
          					@foreach($timers as $timer)
          						<span class="custom_primary_Color fontbold"> {{ $loop->first ? '' : ', ' }} {{ $timer }}  </span> 
          					@endforeach
          					seconds per each question.
          				</li>
          				<li> Once you select your answer, it can't be undone. </li>
          				<li> You can't select any option once time goes off. </li>
          				<li> You can't exit from the Quiz while you're playing. </li>
          				<li> You'll get points on the basis of your correct answers. </li>

          			</ol>
        		</div>
        		<div class="card-footer">
        			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
	        			<a href="{{ url()->previous() }}" class="btn btn-outline-secondary"> Exit Quiz </a>
	        			<a href="javascript:void(0)" class="btn btn-warning startBtn"> Start Now </a>
	        		</div>
        		</div>
      		</div>

      		<div class="card shadow quizboxDiv">
        		<div class="card-header">
          			<div class="card-title"> 
          				<div class="d-inline-flex p-2 bd-highlight fs-5"> Awesome Quiz Application </div>
          				<div class="alert alert-danger float-right fs-6 py-2" role="alert" id="iTimeShow">
  							Time Off <span class="badge bg-secondary" id="timer"> </span>
						</div>

          			</div>
        		</div>
        		<div class="card-body">
          			<h4 class="fontbold mb-5 questionTitle"> </h4>

          			<div class="choiceList">
          				
          			</div>

          			<p class="text-danger fs-3 text-center fontbold quizMessage"> Please select an answer </p>

        		</div>
        		<div class="card-footer row">
        			<div class="col-md-6 col-sm-12 col-12">
        				<p> <span id="currentquestionNo"></span> of <span class="totalquestionsNo"></span> Questions </p>
        				
        			</div>
        			<div class="d-grid gap-2 d-md-flex justify-content-md-end col-md-6 col-sm-12 col-12">
	        			
	        			<a href="javascript:void(0)" class="btn btn-warning nextButton"> 
	        				<i class='bx bxs-chevrons-right' ></i> Next 
	        			</a>
	        		</div>
        		</div>
      		</div>

      		<div class="card shadow quizresultDiv">
        		<div class="card-body text-center p-5">

        			<div class="emoji  emoji--wow">
					  	<div class="emoji__face">
					    	<div class="emoji__eyebrows"></div>
					    	<div class="emoji__eyes"></div>
					    	<div class="emoji__mouth"></div>
					  	</div>
					</div>

					<div class="emoji  emoji--yay">
					  	<div class="emoji__face">
					    	<div class="emoji__eyebrows"></div>
					    	<div class="emoji__mouth"></div>
					  </div>
					</div>

					<div class="emoji  emoji--sad">
					  	<div class="emoji__face">
					    	<div class="emoji__eyebrows"></div>
					    	<div class="emoji__eyes"></div>
					    	<div class="emoji__mouth"></div>
					  	</div>
					</div>
          			
          			<h4 class="my-3"> Completed the Quiz! </h4>

          			<h4 class="my-3"> Your are <span class="fs-1 text-success" id="userscorePercentage"> </span> right. </h4>

          			<p class="mt-5"> You got only <span id="userScoreNo"></span> out of <span class="totalquestionsNo"></span> </p>

          			<div class="">
	          			<a href="{{ url()->previous() }}" class="btn btn-outline-secondary"> Exit Quiz </a>
		        		<a href="javascript:void(0)" class="btn btn-warning startBtn"> View Score </a>
		        	</div>

        		</div>
      		</div>


    	</div>
  	</div>
</div>

@section('script_content')
<script type="text/javascript">
	var totalTimer; var testId;
	var currentQuestion=0; var quizNo=1;
	var questions;
	var originaltotalMark;


	var currentTimer;
	var minutes = 0; var seconds = 0;
	// var minute = 0; var second = 0;

	$(document).ready(function(){
		
		totalTimer = {{ $totalTimer }};
		testId = {{ $test->id }};
		originaltotalMark = {{ $totalmark }};


	});
</script>
    <script src="{{ asset('plugin/quiz_script.js') }}"></script>

@stop


</x-quiztemplate>