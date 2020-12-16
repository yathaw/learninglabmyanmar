<x-frontend>
	@php
		$amount=0;
        $course_count = array();

		foreach($sale->courses as $course){
			if($course->pivot->status == 1){
				$amount+=$course->price;
                array_push($course_count, $course);

			}
		}
	@endphp

	<!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      	<div class="container">

        	<div class="d-flex justify-content-between align-items-center">
          		<h2> Receipt For - {{ $sale->invoiceno }} </h2>
          		<ol>
            		<li><a href="{{ route('frontend.index') }}">Home</a></li>
            		<li> <a href="{{ route('purchase_history') }}"> Purchase History </a> </li>

            		<li> Receipt </li>
          		</ol>
        	</div>

      	</div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page showdata">
      	<div class="container">

      		<div class="row justify-content-center">
      			<div class="col-10 shadow mb-5 bg-white">
      				<div class="row">
      					<div class="col-12 bg-warning" style="height: 15px;"> </div>
      				</div>

      				<div class="row bg-light p-2">
      					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
      						<div class="text-center">
	      						<img src="{{ asset('logo/logo_transparent_500x500.png') }}" class="img-fluid mx-auto d-inline-block" style="width: 80px; height: 80px;">

	                        	<img src="{{ asset('logo/logotext_color.png') }}" class="img-fluid d-inline-block" >
	                        </div>
      					</div>
      					<div class="offset-xl-4 col-xl-4 offset-lg-4 col-lg-4 col-md-6 col-sm-12 col-12"> 
      						<p class="text-muted"> A108 Adam Street New York, NY 535022 United States </p>
                        	<p class="text-muted"> +1 5589 55488 55 </p>
      					</div>
      				</div>

      				<div class="row">
      					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mt-2">
	      					<div class="mb-4">
								Hello <strong> {{ $sale->user->name }} </strong>,
								<br /> This is the receipt for a payment of <strong> {{ number_format($amount) }} </strong> (Ks) for {{count($course_count)}} of {{count($sale->courses)}} courses.
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mt-2">
	      					{{-- <div class="float-right"> --}}
								<small class="p-0 text-muted"> Invoice No </small>
								<p class="p-0 fs-5"> {{ $sale->invoiceno }} </p>
							{{-- </div> --}}
						</div>
      				</div>
 					
      				<div class="align-items-center text-white pt-2  d-none d-xl-block d-lg-block" style="background-color: #f4b65e">
      					<div class="row mb-3 px-4">
	      					<div class="col-xl-6 col-lg-6">
	      						<p> Description </p>
	      					</div>

	      					<div class="col-xl-4 col-lg-4">
	      						<p> Payment Date </p>
	      					</div>

	      					<div class="col-xl-2 col-lg-2">
	      						<p> Amount </p>
	      					</div>
	      				</div>
      				</div>

      				@foreach($sale->courses as $course)
		        		@foreach($course->installments as $installment)

			        	@if($installment->sale_id == $sale->id)
			        	@php
		    				$installment_paiddate = strtotime($installment->paiddate);
		    				$date = date('M d, Y',$installment_paiddate);
			        	@endphp

		      				<div class="row px-xl-4 px-lg-4">
		      					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
		      						<p>  <span class="text-dark d-xxl-none d-xl-none d-lg-none d-md-inline-block d-sm-inline-block d-inline-block fw-bold fontbold"> Title : </span> 
		      								{{ $course->title }} 
		      						</p>
		      					</div>

		      					<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
		      						<p> 
		      							<span class="text-dark d-xxl-none d-xl-none d-lg-none d-md-inline-block d-sm-inline-block d-inline-block fw-bold fontbold"> Payment Date : </span> 
		      							{{$date}} 
		      						</p>
		      					</div>

		      					<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12">
		      						<p> 
		      							 <span class="text-dark d-xxl-none d-xl-none d-lg-none d-md-inline-block d-sm-inline-block d-inline-block fw-bold fontbold"> Amount : </span>

		      							{{ number_format($course->price) }} Ks 
		      							<small class="d-xxl-block d-xl-block d-lg-block d-md-inline-block d-sm-inline-block d-inline-block"> ( {{ $installment->type }} ) </small>
		      						</p>
		      					</div>
		      					<hr>

		      				</div>

		      			@endif
				        @endforeach
			        @endforeach

			        <div class="row px-xl-4 px-lg-4">
      					<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12 d-none d-xl-block d-lg-block">
      						<p class="float-right pt-2"> Total Paid </p>
      					</div>
      					<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12">
      						<span class="text-dark d-xxl-none d-xl-none d-lg-none d-md-inline-block d-sm-inline-block d-inline-block fw-bold fontbold"> Total : </span>
      						<p class="fs-3 d-inline-block"> {{ number_format($amount) }} Ks </p>
      					</div>
      				</div>

	      			<div class="row">
      					<div class="col-12 bg-warning" style="height: 15px;"> </div>
      				</div>
	      		</div>

      			</div>

      		</div>

      		
			
		</div>
	</section>



@section('script_content')
<script type="text/javascript">
	
</script>
@stop




</x-frontend>