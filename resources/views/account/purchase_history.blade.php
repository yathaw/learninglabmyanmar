<x-frontend>

	<!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      	<div class="container">

        	<div class="d-flex justify-content-between align-items-center">
          		<h2> My Cart History </h2>
          		<ol>
            		<li><a href="{{ route('frontend.index') }}">Home</a></li>
            		<li> Dashboard </li>
          		</ol>
        	</div>

        	<div class="row mt-5">
        		<div class="col-12">
        			<ul class="nav nav-pills card-header-pills navheader">
                		<li class="nav-item">
                  
                  			<a class="nav-link nab bg-transparent active" id="purchasehistoryTab" data-toggle="tab" href="#purchasehistory" role="tab" aria-controls="purchasehistory" aria-selected="true" data-target="#purchasehistory">
                    			Purchase
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
              			@if(count($sales)>0)
              			<div class="tab-pane fade show active" id="purchasehistory" role="tabpanel" aria-labelledby="purchasehistoryTab">
		              		<table class="table ">
		        				<thead>
		        					<tr>
		        						<th>Purchase History</th>
		        						<th>Invoice</th>
		        						<th>Date</th>
		        						<th>Total Price</th>
		        						<th>Payment Type</th>
		        						<th>Action</th>
		        						
		        					</tr>
		        				</thead>
		        				<tbody>
		        					@foreach($sales as $sale)
		        						@php
		        							$installment = '';
		        							$amount=0;
		        						@endphp
		        						@if(count($sale->installments) > 0)
		        							@foreach($sale->courses as $course)
		        								@php
		        									if($course->pivot->status == 1){
		        									$amount+=$course->price;
		        									}
		        								@endphp
		        							@endforeach
			        						@foreach($sale->installments as $value)
			        							@php
			        								$installment=$value;
			        							@endphp
			        								
						        				
						        			@endforeach

						        				@php
			    									$date = strtotime($installment->paiddate);
			    									$data = date('d-m-Y',$date);

			    								@endphp
					        					<tr>
					        						<td></td>
					        						<td>{{$sale->invoiceno}}</td>
					        						<td>{{$data}}</td>
					        						<td>{{$amount}} KS</td>
					        						<td>{{$installment->type}}</td>
					        						<td>
					        							<a href="{{route('history_detial',$sale->id)}}" class="btn btn-outline-primary">Purchase</a>
					        						</td>

					        					</tr>
					        			
				        				@endif
		        					@endforeach
		        				</tbody>
		        			</table>
		        		</div>
		        		@else
		        		<div class="text-center">
							<img src="{{asset('/externalphoto/empty_purchasehistory.gif')}}" class="img-fluid" width="40%" height="60%">
						</div>
						@endif

        			
        		
            		</div>
          	</div>

		</div>




    </section> 


    
  

@section('script_content')
  	<script type="text/javascript">
	    $(document).ready(function(){

	    })
  	</script>
@stop
			


		


</x-frontend>