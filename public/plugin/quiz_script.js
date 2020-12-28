$(document).ready(function(){

    $(".quizMessage").hide();
    $(".preButton").hide();

    $(".quizrulesDiv").show();
    $(".quizboxDiv").hide();
    $(".quizresultDiv").hide();



    $('.startBtn').click(function() {
    	$(".quizrulesDiv").hide();

    	$.when(getQuestions()).done(function(a1){
    		$(".quizboxDiv").show();

			displayCurrentQuestion();
		});

    });

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	


	function getQuestions(){
		return $.ajax({
            type:'POST',
            url: "/getquizzes_bytestid",
            data: {testId, testId},
            dataType: 'json',
            success: (response) => {  
            	questions = response.data;

            }
        });

	}

	function displayCurrentQuestion(){

		if(questions.length != currentQuestion){

			var question = questions[currentQuestion].question;
			$('.questionTitle').text(quizNo+'. '+question);
			$('#currentquestionNo').text(quizNo);
			$('.totalquestionsNo').text(questions.length);

			var time = questions[currentQuestion].timer;


			var quiz_type = questions[currentQuestion].type;
			var input_type;
	    	if (quiz_type == 'multicheck') {
	        	var type = 'Multiple Choice';
				input_type = 'radio';

	        }else if(quiz_type == 'checkbox'){
	        	var type = 'Multiple Answers';
				input_type = 'checkbox';

	        }else{
	        	var type = 'True/False';
				input_type = 'radio';

	        }

			var html=''; var response_answers=[];
		  		var quizid = questions[currentQuestion].id;

			var answers = questions[currentQuestion].checks;
			var cart = localStorage.getItem('cart');


		  		$.each(answers,function (i,v) {  	  			
		  			response_answers.push(v.answer);
		  			var checkid = v.id;
		  			var mark = v.mark;
		  			var rightanswer = v.rightanswer;

		  			html+=`<div class="radiobtn my-3">
							<input type="${input_type}" id="ans${v.id}" name="dynradio" value="${v.id}"
							data-checkid="${checkid}" data-mark="${mark}" data-rightanswer="${rightanswer}"
							data-quizid="${quizid}" data-status="answer" `;

				if (cart) {
					var cartArray = JSON.parse(cart);

					if(cartArray.length > 0){
					$.each(cartArray, function(i,v){
						
						if(status == "timeoff"){
							html += `disabled`;
						}else{
							if (checkid == v.checkid) {
								html += `checked`;
							}
						}
					});
					}
				}


				html+= `/>
							<label for="ans${v.id}" class="ansOption${i}"></label>
						</div>`;

		  		});
			$('.choiceList').html(html);

		  		$.each(response_answers,function (i,v) {
				$('label.ansOption'+i).text(v);

		  		});

			timedCount(time);

		}else{
			showResult();
		}
	}

	function timedCount(time){

		var counter = setInterval(starttimer, 1000);
		var timeText = $('#timer');

		var ms_time = time * 1000;

		var minute=0;
		var second = 0;

		if(ms_time < 60000){
        	second = Math.floor((ms_time % (1000 * 60)) / 1000);
        	minute = 0;
            
        }else{
        	minute = Math.floor((ms_time % (1000 * 60 * 60)) / (1000 * 60)); 
        	second = 0;
        };

        minutes = parseInt(minute, 10);
        seconds = parseInt(second, 10);

		function starttimer(){	
			
            // --seconds;

            minutes = (seconds < 0) ? --minutes : minutes;
            seconds = (seconds < 0) ? 59 : seconds;
            seconds = (seconds < 10) ? '0' + seconds : seconds;

        	currentTimer = minutes + ' : ' + seconds;

            if (minutes < 0) {
            	clearInterval(counter);
            }
	        else if((seconds <= 0) && (minutes <= 0)){ //if timer is less than 0
	            clearInterval(counter); //clear counter
	            timeText.html("Time Off"); //change the time text to time off
	            

	            var inputData = $("input[name='dynradio']:checked");
				var val = inputData.val();

		        if (val == undefined) 
		        {
		        	var checkid = 'null';
					var mark = 'null';
					var rightanswer = 'null';
					var quizid = questions[currentQuestion].id;
	            	var status = 'timeoff';

		        }else{
		        	var checkid = inputData.data('checkid');
					var mark = inputData.data('mark');
					var rightanswer = inputData.data('rightanswer');
					var quizid = inputData.data('quizid');
					var status = inputData.data('status');

		        }

	            var mylist = {checkid:checkid, mark:mark,
					rightanswer:rightanswer, quizid:quizid, status:status};


				var cart = localStorage.getItem('cart');
				var cartArray;

				if (cart==null) {
					cartArray = Array();
				}
				else{
					cartArray = JSON.parse(cart);
				}

				var status=false;

				$.each(cartArray, function(i,v){
					if (quizid == v.quizid) {
						status = true;
					}
				});

				if (!status) {
					cartArray.push(mylist);
				}

				var cartData = JSON.stringify(cartArray);
				localStorage.setItem("cart",cartData);

				currentQuestion++;
				quizNo++;

				displayCurrentQuestion();


	            
	        }else{
		  		timeText.html(minutes + ' : ' + seconds);
	        }

	        seconds--; //decrement the time value
	    }

	}



	// On clicking next, display the next question
    $(this).find(".nextButton").on("click", function () 
	{
		var inputData = $("input[name='dynradio']:checked");
		var val = inputData.val();

        if (val == undefined) 
		{
            $(".quizMessage").show();
        }else{
            $(".quizMessage").hide();

			var checkid = inputData.data('checkid');
			var mark = inputData.data('mark');
			var rightanswer = inputData.data('rightanswer');
			var quizid = inputData.data('quizid');
			var status = inputData.data('status');
			

			var mylist = {checkid:checkid, mark:mark,
					rightanswer:rightanswer, quizid:quizid, status:status};

			var cart = localStorage.getItem('cart');
			var cartArray;

			if (cart==null) {
				cartArray = Array();
			}
			else{
				cartArray = JSON.parse(cart);
			}

			var status=false;

			$.each(cartArray, function(i,v){
				if (quizid == v.quizid) {
					v.checkid = checkid;
					v.mark = mark;
					v.rightanswer = rightanswer;

					status = true;
				}
			});

			if (!status) {
				cartArray.push(mylist);
			}

			var cartData = JSON.stringify(cartArray);
			localStorage.setItem("cart",cartData);

			currentQuestion++;
			quizNo++;

			if(currentQuestion >= 1) {
    			$(".preButton").show();
			}else{
    			$(".preButton").hide();
			}

			if (currentQuestion < questions.length) 
			{
				displayCurrentQuestion();
			} 


        }
	});

	function showResult(){

		var cart = localStorage.getItem('cart');
		if (cart) {
			var cartArray = JSON.parse(cart);

			if (cartArray.length > 0) {
				$(".quizrulesDiv").hide();
			    $(".quizboxDiv").hide();
			    $(".quizresultDiv").show();
				var correctMark = 0;
				var userScore = 0;

			    $.each(cartArray, function(i,v){
					var id = v.id;
			    	var checkid = v.checkid;
			    	var status = v.status;
			    	var mark = Math.abs(v.mark);

			    	if (status == 'answer') {
			    		userScore++;
			    	}

			    	if (mark) {
			    		console.log(mark);
			    		correctMark += mark++;
			    	}


			    });

			    var wrongMark = parseInt(originaltotalMark) - parseInt(correctMark);
				$('#userScoreNo').text(userScore);

				var percentVal = 100 - (parseInt(wrongMark, 10) * 100 / parseInt(originaltotalMark, 10));
				// var percentVal = (originaltotalMark - wrongMark) / questions.length;
				$('#userscorePercentage').text(parseInt(percentVal)+' % ');

				if (percentVal >= 80) {
					$('.emoji--wow').show();
					$('.emoji--yay').hide();
					$('.emoji--sad').hide();

				}
				if (percentVal >= 60) {
					$('.emoji--wow').hide();
					$('.emoji--yay').show();
					$('.emoji--sad').hide();
				}else{
					$('.emoji--wow').hide();
					$('.emoji--yay').hide();
					$('.emoji--sad').show();
				}

				var cart = localStorage.getItem('cart');
				var cartArray = JSON.parse(cart);

				$.ajax({
		            type:'POST',
		            url: "/storequiz",
		            data: {cart: cartArray,
					testId:testId,
					correctMark:correctMark},
		            dataType: 'json',
		            success: (response) => {  
						localStorage.clear();
		            	

		            }
		        });


			}
	    }
	}























});