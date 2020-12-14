<x-frontend>


	<!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      	<div class="container">

        	<div class="d-flex justify-content-between align-items-center">
          		<h2> Purchase History Detail </h2>
          		<ol>
            		<li><a href="{{ route('frontend.index') }}">Home</a></li>
            		<li> Purchase Course </li>
          		</ol>
        	</div>

      	</div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page showdata">
      	<div class="container">

      		
			<section id="portfolio" class="portfolio">
		      	<div class="container">

			        <div class="section-title">
			          	<h2>Invoiceno - {{$sale->invoiceno}} </h2>
			        </div>


			        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center searchcourseshow">
			        	@foreach($sale->courses as $course)
			        		@foreach($course->installments as $installment)

				        	@if($installment->sale_id == $sale->id)
				        	@php
			    				$installment_paiddate = strtotime($installment->paiddate);
			    				$date = date('d-m-Y',$installment_paiddate);
				        	@endphp
					        	<div class="col-md-3">
					        		<div class="card">
					        			
				        				<img src="{{asset($course->image)}}" class="card-img-top img-fluid">
					        			
					        			<div class="card-body mt-3">

					        				<h5>{{$course->title}}</h5>
					        				<div class="row mt-2 pt-2">
					        					<label class="col-md-6">Price</label>
					        					<label class="col-md-6">{{$course->price}}</label>

					        				</div>

					        				<div class="row mt-2 pt-2">
					        					<label class="col-md-6">Payment Type</label>
					        					<label class="col-md-6">{{$installment->type}}</label>

					        				</div>

					        				<div class="row mt-2 pt-2">
					        					<label class="col-md-6">Paid Date</label>
					        					<label class="col-md-6">{{$date}}</label>

					        				</div>

					        				<div class="row">
					        					
					        					 <a href="{{ route('lecture','1') }}" class="btn custom_primary_btnColor mt-3">Go to Course</a>
					        				</div>

					        			</div>
					        		</div>
					        	</div>
					        	
				        	@endif
				        	@endforeach
			        	@endforeach
			        </div>
			        
			      

		      	</div>

		      	
		       
		    </section>
		</div>
	</section>



@section('script_content')
<script type="text/javascript">
	
</script>
@stop




</x-frontend>