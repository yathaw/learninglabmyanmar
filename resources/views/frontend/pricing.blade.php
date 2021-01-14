<x-frontend>

	<!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      	<div class="container">

        	<div class="d-flex justify-content-between align-items-center">
          		<h2> Accepted Payment methods </h2>
          		<ol>
            		<li><a href="{{ route('frontend.index') }}">Home</a></li>
            		<li> Pricing </li>
          		</ol>
        	</div>
        </div>

        <section class="inner-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
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
            </div>
        </section>
    </section>
</x-frontend>