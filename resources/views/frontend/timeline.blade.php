<x-frontend>

	<!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      	<div class="container">

        	<div class="d-flex justify-content-between align-items-center">
          		<h2> How It Works </h2>
          		<ol>
            		<li><a href="{{ route('frontend.index') }}">Home</a></li>
            		<li> How It Works </li>
          		</ol>
        	</div>

        	<div class="row mt-5">
        		<div class="col-12">
        			<ul class="nav nav-pills card-header-pills navheader">
                		<li class="nav-item">
                  
                  			<a class="nav-link nab bg-transparent active" id="buycourseTab" data-toggle="pill" href="#forStudent" role="tab" aria-controls="forStudent" aria-selected="true" data-target="#forStudent">
                    			Student
                  			</a>
                		</li>
                
                		<li class="nav-item">
                  			<a class="nav-link nab bg-transparent" id="collectionTab" data-toggle="pill" href="#forInstructor" role="tab" aria-controls="forInstructor" aria-selected="true" data-target="#forInstructor">
                    			Instructor
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
              			
                		<div class="tab-pane fade active show" id="forStudent" role="tabpanel" aria-labelledby="home-tab">
                			<section id="process">
								<div class="container-fluid">
								    <div class="row">
									    <div class="steps-timeline text-center">

									        <div class="steps-one">
									          	<h3>Step 1</h3>
									          	<div class="end-circle back-orange"></div>
									          	<div class="step-wrap">
									            	<div class="steps-stops">
									              		<div class="verticle-line back-orange"></div>
									            	</div>
									          	</div>
									          	<div class="pane-warp back-blue">
									            	<div class="steps-pane">
										              	<img src="{{ asset('certificate/student_step1.png') }}">
										            </div>
									          	</div>
									          	<div class="inverted-pane-warp back-blue">
										            <div class="inverted-steps-pane">
										              	<p> Choose & Apply for admission to favourite course </p>
										            </div>
									          	</div>
									       	</div>

									        <div class="steps-two">
									          	<h3>Step 2</h3>
									          	<div class="step-wrap">
									            	<div class="steps-stops">
									              		<div class="verticle-line back-orange"></div>
									            	</div>
									          	</div>
									          	<div class="pane-warp back-orange">
									            	<div class="steps-pane">
									              		<img src="{{ asset('certificate/student_step2.png') }}">
									            	</div>
									          	</div>
									          	<div class="inverted-pane-warp back-orange">
									            	<div class="inverted-steps-pane">
									              		<p> Process to transfer money for course fees </p>
									            	</div>
									          	</div>
									        </div>

									        <div class="steps-three">
									          	<h3>Step 3</h3>
									          	<div class="step-wrap">
									            	<div class="steps-stops">
									              		<div class="verticle-line back-orange"></div>
									            	</div>
									          	</div>
									          	<div class="pane-warp back-blue">
									            	<div class="steps-pane">
									              		<img class="third" src="{{ asset('certificate/student_step3.png') }}">
									            	</div>
									          	</div>
									          	<div class="inverted-pane-warp back-blue">
									            	<div class="inverted-steps-pane">
									              		<p> Send Slip Screenshot to our Facebook Page </p>
									           		</div>
									          	</div>
									        </div>

									        <div class="steps-four">
									          	<h3>Step 4</h3>
									          	<div class="step-wrap">
									            	<div class="steps-stops">
									              		<div class="verticle-line back-orange"></div>
									            	</div>
									          	</div>
									          	<div class="pane-warp back-orange">
									            	<div class="steps-pane">
									              		<img src="{{ asset('certificate/student_step4.png') }}">
									            	</div>
									          	</div>
									          	<div class="inverted-pane-warp back-orange">
									            	<div class="inverted-steps-pane">
									              		<p> Lunch & Learn Session Life Access </p>
									            	</div>
									          	</div>
									        </div>

									        <div class="steps-five">
									          	<h3>Step 5</h3>
									          	<div class="inverted-end-circle back-orange"></div>
									          	<div class="step-wrap">
									            	<div class="steps-stops">
									              		<div class="verticle-line back-orange"></div>
									            	</div>
									          	</div>
									          	<div class="pane-warp back-blue">
									            	<div class="steps-pane">
									              		<img src="{{ asset('certificate/student_step5.png') }}">
									            	</div>
									          	</div>
									          	<div class="inverted-pane-warp back-blue">
									            	<div class="inverted-steps-pane">
									              		<p> Learn courses & qualified quiz result, we will affirm with e-certificate  </p>
									            	</div>
									          	</div>
									        </div>

									    </div>
								      	<!-- /.steps-timeline -->
								    </div>
								</div>
							</section>
                		</div>

                		<div class="tab-pane fade" id="forInstructor" role="tabpanel" aria-labelledby="profile-tab">  
                			<section id="process">
								<div class="container-fluid">
								    <div class="row">
									    <div class="steps-timeline text-center">

									        <div class="steps-one">
									          	<h3>Step 1</h3>
									          	<div class="end-circle back-orange"></div>
									          	<div class="step-wrap">
									            	<div class="steps-stops">
									              		<div class="verticle-line back-orange"></div>
									            	</div>
									          	</div>
									          	<div class="pane-warp back-blue">
									            	<div class="steps-pane">
										              	<img src="{{ asset('certificate/student_step1.png') }}">
										            </div>
									          	</div>
									          	<div class="inverted-pane-warp back-blue">
										            <div class="inverted-steps-pane">
										              	<p> Post Your Course </p>
										            </div>
									          	</div>
									       	</div>

									        <div class="steps-two">
									          	<h3>Step 2</h3>
									          	<div class="step-wrap">
									            	<div class="steps-stops">
									              		<div class="verticle-line back-orange"></div>
									            	</div>
									          	</div>
									          	<div class="pane-warp back-orange">
									            	<div class="steps-pane">
									              		<img src="{{ asset('certificate/instructor_step2.png') }}">
									            	</div>
									          	</div>
									          	<div class="inverted-pane-warp back-orange">
									            	<div class="inverted-steps-pane">
									              		<p> Request Access to approve your course </p>
									            	</div>
									          	</div>
									        </div>

									        <div class="steps-three">
									          	<h3>Step 3</h3>
									          	<div class="step-wrap">
									            	<div class="steps-stops">
									              		<div class="verticle-line back-orange"></div>
									            	</div>
									          	</div>
									          	<div class="pane-warp back-blue">
									            	<div class="steps-pane">
									              		<img class="third" src="{{ asset('certificate/instructor_step3.png') }}">
									            	</div>
									          	</div>
									          	<div class="inverted-pane-warp back-blue">
									            	<div class="inverted-steps-pane">
									              		<p> Check your student who enroll your courses </p>
									           		</div>
									          	</div>
									        </div>

									        <div class="steps-four">
									          	<h3>Step 4</h3>
									          	<div class="step-wrap">
									            	<div class="steps-stops">
									              		<div class="verticle-line back-orange"></div>
									            	</div>
									          	</div>
									          	<div class="pane-warp back-orange">
									            	<div class="steps-pane">
									              		<img src="{{ asset('certificate/instructor_step4.png') }}">
									            	</div>
									          	</div>
									          	<div class="inverted-pane-warp back-orange">
									            	<div class="inverted-steps-pane">
									              		<p> Discuss student with Q&A </p>
									            	</div>
									          	</div>
									        </div>

									        <div class="steps-five">
									          	<h3>Step 5</h3>
									          	<div class="inverted-end-circle back-orange"></div>
									          	<div class="step-wrap">
									            	<div class="steps-stops">
									              		<div class="verticle-line back-orange"></div>
									            	</div>
									          	</div>
									          	<div class="pane-warp back-blue">
									            	<div class="steps-pane">
									              		<img src="{{ asset('certificate/instructor_step5.png') }}">
									            	</div>
									          	</div>
									          	<div class="inverted-pane-warp back-blue">
									            	<div class="inverted-steps-pane">
									              		<p> Earn Money  </p>
									            	</div>
									          	</div>
									        </div>

									    </div>
								      	<!-- /.steps-timeline -->
								    </div>
								</div>
							</section>
                		</div>
                	</div>
            	</div>
            </div>
        </div>
    </section>

</x-frontend>