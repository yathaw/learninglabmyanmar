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

    <section class="inner-page d-none" id="shoppingcartDiv">
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

    <section class="inner-page d-none" id="ordersuccessDiv">
      	<div class="container-fluid">
      		<div class="section-title pb-0">
				<h2 class="text-center my-4"> Thank you </h2>
				<p class="mmfont"> သင့်ထံ တရက်အတွင်း Learning Lab Myanmar Team မှ ဆက်သွယ်အကြောင်းကြားပေးပါမည်။ <br>၀ယ်ယူအားပေးမှုအတွက် အထူးကျေးဇူးတင်ပါသည်။ </p>
			</div>
			<div class="row d-flex align-items-center">
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-2 lh-lg pl-lg-5 pl-md-3">
					<p class="mmfont fs-5 lh-base mb-5"> ငွေပေးချေရန်အတွက် ဖော်ပြပါ Bank များမှ သင်အဆင်ပြေသည့် Bank မှငွေပေးချေနိုင်ပါသည်။ </p>
					<p class="mmfont fs-5 lh-base mb-5"> Bank Transfer နည်းလမ်းများအား Bank တခုစီတိုင်းတွင် အသေးစိတ်ဖော်ပြထားပါသည်။  </p>

					<p class="mmfont fs-5 lh-base mb-5"> ငွေလွဲပြီးလျှင် <span class="text-danger fw-bolder"> Slip </span> (သို့မဟုတ်)  <span class="text-danger fw-bolder"> Screen Shot </span> လေးကို Learning Lab Myanmar Page Messanger သို့ပို့ပေးရမည်ဖြစ်ပါသည်။ </p>
					
					<section id="section07" class="demo d-lg-block d-md-block d-sm-none d-none p-0">
						<div class="d-flex justify-content-center">
							<a href="#transfermoneyDiv"> 
								<div class="scroll-arrow"></div>
								<div class="scroll-arrow"></div>
								<div class="scroll-arrow"></div> 
							</a>
						</div>
					</section>
				
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-2 order-sm-1 order-1">
					<img src="{{ asset('externalphoto/phcall.gif') }}" class="img-fluid">
				</div>

			</div>
      	</div>

      	<section class="container" id="transfermoneyDiv">
      		<div class="row">
				<div class="col-12">
					<div class="alert alert-warning text-center">
      					<div class="section-title pb-0">
							<h2 class="text-center my-4"> How To Transfer Money </h2>
							<p class="mmfont text-muted"> ငွေလွဲပြီးလျှင် <span class="text-danger fw-bolder"> Slip </span> (သို့မဟုတ်)  <span class="text-danger fw-bolder"> Screen Shot </span> လေးကို Learning Lab Myanmar Page Messanger သို့ပို့ပေးရမည်ဖြစ်ပါသည်။ </p>
						</div>

      					<div class="col-12 mt-3">
							<div class="sky-tabs sky-tabs-pos-top-left sky-tabs-anim-flip sky-tabs-response-to-icons">				
								<input type="radio" name="sky-tabs" checked id="sky-tab1" class="sky-tab-content-1">

								<label for="sky-tab1"><span> <span> <i class="aya"></i> AYA Bank </span></span></label>
						
								<input type="radio" name="sky-tabs" id="sky-tab2" class="sky-tab-content-2">
								<label for="sky-tab2"><span><span> <i class="kbz"></i> KBZ Bank </span></span></label>
						
								<input type="radio" name="sky-tabs" id="sky-tab3" class="sky-tab-content-3">
								<label for="sky-tab3"><span><span> <i class="cb"></i> CB Bank </span></span></label>
						
								<input type="radio" name="sky-tabs" id="sky-tab4" class="sky-tab-content-4">
								<label for="sky-tab4"><span><span> <i class="kpay"></i> K-Pay </span></span></label>

								<input type="radio" name="sky-tabs" id="sky-tab5" class="sky-tab-content-5">
								<label for="sky-tab5"><span><span> <i class="wave"></i> Wave Money </span></span></label>
						
								<label class="switcher"><span><span><a href="#"><i class="icon-reorder"></i>Tabs</a></span></span></label>
						
								<ul>
									<li class="sky-tab-content-1">	
										<div class="row typography">
											<div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-2">
												<h4> <small class="fs-6"> Account Name - </small> U Yan Myoe Aung </h4>

												<h3> 0063 2010 1000 9409 </h3>
											</div>

											<div class="col-xl-6 col-lg-6 col-md-4 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-2 order-sm-1 order-1">
												<img src="{{ asset('payment/aya_bank_full.png') }}" class="img-fluid mx-auto d-block">
												
											</div>
										</div>				
										
									</li>
									
									<li class="sky-tab-content-2">
										<div class="row typography">
											<div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-2">
												<h4> <small class="fs-6"> Account Name - </small> U Yan Myoe Aung </h4>

												<h3> 999 307 999 2846 6801 </h3>
											</div>

											<div class="col-xl-6 col-lg-6 col-md-4 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-2 order-sm-1 order-1">
												<img src="{{ asset('payment/kbz_bank_full.png') }}" class="img-fluid mx-auto d-block">
												
											</div>
										</div>	
									</li>
									
									<li class="sky-tab-content-3">
										<div class="row typography">
											<div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-2">
												<h4> <small class="fs-6"> Account Name - </small> U Yan Myoe Aung </h4>

												<h3> 0002 6001 0011 0329 </h3>
											</div>

											<div class="col-xl-6 col-lg-6 col-md-4 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-2 order-sm-1 order-1">
												<img src="{{ asset('payment/cb_bank_full.png') }}" class="img-fluid mx-auto d-block">
												
											</div>
										</div>	
									</li>
									
									<li class="sky-tab-content-4">
										<div class="row typography">
											<div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-2">
												<h6> KPay Account  </h6>

												<h3> 0063 2010 1000 9409 </h3>
											</div>

											<div class="col-xl-6 col-lg-6 col-md-4 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-2 order-sm-1 order-1">
												<img src="{{ asset('payment/k_pay.png') }}" class="img-fluid mx-auto d-block">
												
											</div>
										</div>	
									</li>

									<li class="sky-tab-content-5">
										<div class="row typography">
											<div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-2">
												<h6> Wave Money Phone No  </h6>

												<h3> 09 772 750 502 </h3>

												<h3> 09 772 750 503 </h3>

											</div>

											<div class="col-xl-6 col-lg-6 col-md-4 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-2 order-sm-1 order-1">
												<img src="{{ asset('payment/wavefull.png') }}" class="img-fluid mx-auto d-block">
												
											</div>
										</div>
									</li>					
								</ul>
		      				</div>
						</div>
					</div>
				</div>
			</div>
      	</section>

    </section>

    <section class="inner-page pt-0 d-none" id="emptyshoppingcartDiv">
    	<div class="container">
    		<div class="section-title pb-0">
				<h2 class="text-center my-4"> Your Cart is Currently Empty </h2>
				<p> Before proceed you must enroll some courses to your shopping cart. You will find a lot interesting courses in your "Cart Page" </p>
			</div>

			<div class="row">
				<div class="offset-xl-4 col-xl-4 offset-xl-4 offset-lg-4 col-lg-4 offset-lg-4 col-md-12 col-sm-12 col-12">
					<img src="{{ asset('externalphoto/empty_shoppingbag.gif') }}" class="img-fluid mx-auto d-block">
				</div>
			</div>

			<div class="row">
				<div class="d-grid gap-2 col-4 mx-auto mt-3">
				  	<a class="btn btn-warning btn-lg rounded-pill" href="{{ route('courses') }}"> Start Course </a>
				</div>
			</div>


    	</div>
    </section>


</x-frontend>