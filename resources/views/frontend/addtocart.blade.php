<x-frontend>

	<!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      	<div class="container">

        	<div class="d-flex justify-content-between align-items-center">
          		<h2> Shopping Cart</h2>
          		<ol>
            		<li><a href="{{ route('frontend.index') }}">Home</a></li>
            		<li> Shopping Cart</li>
          		</ol>
        	</div>

      	</div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      	<div class="container">
        
      
			<div class="section-title">
				<h2 class="text-center my-4"> <span class="course_count">  </span> ~ Courses in Cart</h2>
			</div>

			<div class="row mt-3">
				<input type="hidden" name="user_id" class="user_id" data-user_id = "{{Auth::id()}}">

				{{-- show cart --}}
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-2 showcart">
				{{-- <span class="text-decoration-line-through text-muted"> 50,000 Ks </span> --}}

				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-2 order-sm-1 order-1 mb-3">
					<h5 class="d-xl-block d-md-block d-sm-inline-block d-inline-block text-muted"> Total : </h5>

					{{-- total price --}}
					<h2 class="fw-bolder d-xl-block d-md-block d-sm-inline-block d-inline-block fontbold total"> </h2>


					{{-- <p class="text-decoration-line-through text-muted"> 50,000 Ks </p> --}}

					<div class="d-grid gap-2">
						<button class="btn btn-warning rounded-0 btn-lg text-white checkout" type="button"> Check Out </button>
					</div>
					
				</div>
			</div>


		</div>
    </section>


</x-frontend>