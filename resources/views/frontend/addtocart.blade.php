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

    <section class="inner-page pt-3 d-none">
      	<div class="container">
      		<div class="section-title">
				<h2 class="text-center my-4"> Thank you </h2>
				<p class="mmfont"> သင့်ထံ တရက်အတွင်း Learning Lab Myanmar Team မှ ဆက်သွယ်အကြောင်းကြားပေးပါမည်။ <br>၀ယ်ယူအားပေးမှုအတွက် အထူးကျေးဇူးတင်ပါသည်။ </p>
			</div>
			<div class="row mt-3">
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-2 lh-lg">
					<p class="mmfont fs-5 lh-base mb-4"> ငွေပေးချေရန်အတွက် ဖော်ပြပါ Bank များမှ သင်အဆင်ပြေသည့် Bank မှငွေပေးချေနိုင်ပါသည်။ </p>
					<p class="mmfont fs-5 lh-base mb-4"> Bank Transfer နည်းလမ်းများအား Bank တခုစီတိုင်းတွင် အသေးစိတ်ဖော်ပြထားပါသည်။  </p>

					<p class="mmfont fs-5 lh-base mb-4"> ငွေလွဲပြီးလျှင် <span class="text-danger fw-bolder"> Slip </span> (သို့မဟုတ်)  <span class="text-danger fw-bolder"> Screen Shot </span> လေးကို Learning Lab Myanmar Page Messanger သို့ပို့ပေးရမည်ဖြစ်ပါသည်။ </p>

					<div id="narrow-browser-alert" class="alert alert-info text-center">
      					Bank Transfer Method
      				</div>

					<div class="row">
						<div class="col-12 mb-5">
							<div class="tabbable-responsive">
						        <div class="tabbable">
						          	<ul class="nav nav-pills" id="myTab" role="tablist">
						            	<li class="nav-item">
						              		<a class="nav-link active" id="first-tab" data-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true">
						              			<img src="{{ asset('payment/aya_bank.png') }}" class="img-fluid">
						              		</a>
						            	</li>
						            	<li class="nav-item">
						              		<a class="nav-link" id="second-tab" data-toggle="tab" href="#second" role="tab" aria-controls="second" aria-selected="false">Second Tab</a>
						            	</li>
						            	<li class="nav-item">
						              		<a class="nav-link" id="third-tab" data-toggle="tab" href="#third" role="tab" aria-controls="third" aria-selected="false">Third Tab</a>
						            	</li>
						            	<li class="nav-item">
						              		<a class="nav-link" id="fourth-tab" data-toggle="tab" href="#fourth" role="tab" aria-controls="fourth" aria-selected="false">Fourth Tab</a>
						            	</li>
						            	<li class="nav-item">
						              		<a class="nav-link" id="fifth-tab" data-toggle="tab" href="#fifth" role="tab" aria-controls="fifth" aria-selected="false">Fifth Tab</a>
						            	</li>
						            	<li class="nav-item">
						              		<a class="nav-link" id="sixth-tab" data-toggle="tab" href="#sixth" role="tab" aria-controls="sixth" aria-selected="false">Sixth Tab</a>
						            	</li>
						          	</ul>
						        </div>
						    </div>
						</div>

						<div class="col-12">
							<div class="tab-content">
						        <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
						          	<h5 class="card-title">First Tab header</h5>
						          	<p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						        </div>
						        <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
						          	<h5 class="card-title">Second Tab header</h5>
						          	<p class="card-text">In hac habitasse platea dictumst. Cras sit amet massa fermentum risus eleifend malesuada vel nec erat. Cras massa tellus, volutpat efficitur feugiat eu, accumsan vel felis. Nullam ornare tellus eu dolor rhoncus, ut tempor lectus tincidunt. Ut in condimentum lectus. Praesent non pretium mauris, efficitur condimentum ex. Nam ante lorem, eleifend in egestas a, rhoncus at ex.</p>
						        </div>
						        <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab">
						          	<h5 class="card-title">Third Tab header</h5>
						          	<p class="card-text">Vestibulum neque nunc, ullamcorper et laoreet in, dictum vitae nisi. Morbi scelerisque cursus lobortis. Fusce a leo elit. In hac habitasse platea dictumst. Curabitur aliquet nunc sed tellus rutrum ornare. Mauris euismod cursus ligula, nec mollis lorem sodales vel. Proin mollis posuere nisl a pretium. Aenean sit amet nibh quis nisl pharetra malesuada convallis id leo.</p>
						        </div>
						        <div class="tab-pane fade" id="fourth" role="tabpanel" aria-labelledby="fourth-tab">
						          	<h5 class="card-title">Fourth Tab header</h5>
						          	<p class="card-text">Nulla dignissim justo sed nulla dignissim pellentesque. Maecenas rhoncus faucibus finibus. Mauris eget tincidunt metus. Morbi bibendum nunc sed nisl aliquam, sit amet lacinia lectus pharetra. Cras accumsan convallis risus. Morbi nisi libero, consequat eget leo vel, finibus rhoncus nulla. Mauris tempus risus quis efficitur sollicitudin. Suspendisse potenti. Quisque ut leo interdum ipsum tristique ultrices.</p>
						        </div>
						        <div class="tab-pane fade" id="fifth" role="tabpanel" aria-labelledby="fifth-tab">
						          	<h5 class="card-title">Fifth Tab header</h5>
						          	<p class="card-text">Nunc lacinia sodales ex, in mattis nulla eleifend in. Quisque molestie, dolor non egestas ornare, diam sapien accumsan erat, non malesuada nulla est ac purus. Donec pharetra molestie leo sit amet posuere. Etiam feugiat mi nisi, id semper neque dignissim ut. Praesent vitae accumsan eros. Curabitur a nisi non arcu suscipit rutrum at ut orci. Praesent nec eros eros. Quisque tempus neque ut nibh viverra, ut commodo dolor dapibus.</p>
						        </div>
						        <div class="tab-pane fade" id="sixth" role="tabpanel" aria-labelledby="sixth-tab">
						          	<h5 class="card-title">Sixth Tab header</h5>
						          	<p class="card-text">Proin ornare purus vitae magna viverra suscipit. Etiam rutrum lorem cursus libero scelerisque lacinia. Praesent bibendum risus id aliquam finibus. Donec sed orci sodales, viverra dolor a, dignissim mi. Pellentesque nec lectus enim. Suspendisse eu ligula ac tortor mollis lobortis. Nulla a laoreet neque, sit amet luctus dolor. Nam facilisis at odio ac commodo. Nullam vehicula blandit dui, vel suscipit orci.</p>
						        </div>
      						</div>
						</div>
					</div>

				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-2 order-sm-1 order-1 mb-3">
					<img src="{{ asset('externalphoto/phcall.gif') }}" class="img-fluid">
				</div>

			</div>
      	</div>
      </section>


</x-frontend>