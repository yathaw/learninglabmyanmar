<x-backend>

   <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col-md-6">
         <div class="card shadow rounded circle">
            <div class="row">
               <div class="col-md-5 text-center pt-4">
                  <img src="{{asset('/storage/courseimg/11111.jpg')}}" class="img-fluid rounded-circle w-75">
               </div>
               <div class="col-md-7">
                  <div class="my-3 py-3">
                     <div class="row form-group my-2">
                        <label class="col-md-4">Invoiceno</label>
                        <h4 class="col-md-8">{{$sale->invoiceno}}</h4>
                     </div>

                     <div class="row form-group my-2">
                        <label class="col-md-4">Name</label>
                        <h4 class="col-md-8">{{$sale->user->name}}</h4>
                     </div>

                     <div class="row form-group my-2">
                        <label class="col-md-4">Phone</label>
                        <h5 class="col-md-8">{{$sale->user->phone}}</h5>
                     </div>

                     <div class="row form-group my-2">
                        <label class="col-md-4">Email</label>
                        <h5 class="col-md-8">{{$sale->user->email}}</h5>
                     </div>
                     
                     
                  </div>

               </div>
            </div>
         </div>
      </div>
   </div>
   
   <div class="row row-cols-1 row-cols-md-3 g-4">

      @foreach($sale->courses as $course)
      @php
        $total_duration = 0;
        $video = 0;
        $article = 0;
        $countassignment = 0;
      @endphp
      @foreach($course->contents as $content)

        @foreach($content->lessons as $lesson)

          @php
            // video
            $duration = $lesson['duration'];
            $type = $lesson['type'];

            if($type != "MP4"){
                $article++;
            }

            if($type == "MP4"){
                $video++;
                $total_duration += $duration++;
            }
            

            // assignment
          @endphp
        @endforeach
        <!--  -->
      @endforeach

      @if($total_duration)
        @php
          $dt = Carbon\Carbon::now();
          $days = $dt->diffInDays($dt->copy()->addSeconds($total_duration));

          $hours = $dt->diffInHours($dt->copy()->addSeconds($total_duration)->subDays($days));
          $minutes = $dt->diffInMinutes($dt->copy()->addSeconds($total_duration)->subDays($days)->subHours($hours));

          $seconds = $dt->diffInSeconds($dt->copy()->addSeconds($total_duration)->subDays($days)->subHours($hours)->subMinutes($minutes));
          // dd($seconds);

          $totaltimes = Carbon\CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans();
        @endphp
      @else
        @php
          $totaltimes='0 Second';
        @endphp
      @endif
      
      <div class="col-12 col-md-6 col-lg-4">
         <div class="card h-100">
            <img class="card-img-top" src="{{asset($course->image)}}" alt="Unsplash">
            <div class="card-header px-4 pt-4">
               
               <h4 class=" mb-0"> {{ $course->title }} </h4>
               
            </div>
            <div class="card-body px-4 pt-2">
               <p> This Course Includes : </p>
               <p> 
                  <i class="align-middle mr-2" data-feather="play-circle"></i>
                  <small class="pl-3"> {{$totaltimes}} hours on-demand video </small>
               </p>
               
               <p> 
                  <i class="align-middle mr-2" data-feather="file"></i>
                  <small class="pl-3"> {{$article}} Articles </small>
               </p>
               <!-- <p> 
                  <i class="align-middle mr-2" data-feather="check-square"></i>
                  <small class="pl-3"> {{$countassignment}} Assignments </small>
               </p> -->
               @if($course->certificate == "on")
               <p> 
                  <i class="align-middle mr-2" data-feather="award"></i> 
                  <small class="pl-3"> Certificate of completion </small>
               </p>
               @endif
               <p> 
                  <i class="align-middle mr-2" data-feather="dollar-sign"></i> 
                  <small class="pl-3"> {{ $course->price }} Ks </small>
               </p>

               @if($course->instructors)
               
               <p>
                <i class="align-middle mr-2 " data-feather="users"></i> 

                 
                 @foreach($course->instructors as $instructor)
                 {{-- {{ $loop->first ? '' : ',' }} --}}
                 <small class="pl-3 ">{{$instructor->user->name}}</small>
                 {{-- <img src="{{ asset($instructor->user->profile_photo_path) }}" class="rounded-circle mr-1" alt="Avatar" width="28" height="28"> --}}
                 @endforeach
               </p>
              @endif


               
            </div>
            <div class="card-footer pt-0 mt-0">
               @if($course->pivot->status == 1)
               <input type="button" disabled="" class="form-control btn btn-success d-block" value="Purched">
               @else
               <a href="javascript:void(0)" data-toggle="modal" data-target="#installmentmodal" class="btn btn-outline-success d-block installmentpay" data-course="{{$course->title}}" data-course_id ="{{$course->id}}" data-total="{{$course->price}}" data-id="{{$sale->id}}">Installment</a>
               <a href="javascript:void(0)" class="btn btn-outline-danger d-block mt-3 remove_btn" data-course_id="{{$course->id}}" data-id="{{$sale->id}}">Remove</a>
               @endif
            </div>

         </div>
      </div>
      
      @endforeach
   </div>

{{-- installment modal --}}
<div class="modal fade" id="installmentmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Installment</h4>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id ="installment_store">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-md-10 mx-auto">
              <input type="hidden" name="sale_id" class="sale_id">
              <input type="hidden" name="total" class="total">
              <input type="hidden" name="course_id" class="course_id">


              <div class="row form-group my-3">
                <label class="form-control-label col-md-4">Course</label>
                <div class="col-md-8">
                  <p class="course_name"></p>

                </div>
              </div>

              <div class="row form-group my-3">
                <label class="form-control-label col-md-4">Payment</label>
                <div class="col-md-8">
                  <p class="payment"></p>   
                </div>
              </div>

              <div class="row form-group my-3">
                <label class="form-control-label col-md-4">Payment Method</label>
                <div class="col-md-8" id="form-group-payment_type">
                    <select class="form-control js-example-basic-single " name="payment_type" id="paymentMethod">
                      <option>Choose Bank</option>
                      <option data-img_src="{{ asset('payment/cash.jpg') }}" value="Cash Money"> Cash Money </option>
                      <option data-img_src="{{ asset('payment/aya_bank.png') }}" value="AYA"> AYA Bank </option>
                      <option data-img_src="{{ asset('payment/cb_bank.png') }}" value="CB">CB Bank</option>
                      <option data-img_src="{{ asset('payment/kbz_bank.png') }}" value="KBZ"> KBZ Bank </option>
                      <option data-img_src="{{ asset('payment/k_pay.png') }}" value="KBZ Pay"> K Pay </option>
                      <option data-img_src="{{ asset('payment/wavemoney.png') }}" value="Wave Money"> Wave Money </option>
                      <option data-img_src="{{ asset('payment/wavepay.png') }}" value="Wave Pay"> Wave Pay </option>

                      <option data-img_src="{{ asset('payment/mab_bank.png') }}" value="MAB Bank"> MAB Bank </option>

                      <option data-img_src="{{ asset('payment/yoma_bank.png') }}" value="Yoma Bank"> Yoma Bank </option>

                      <option data-img_src="{{ asset('payment/agd_bank.png') }}" value="AGD Bank"> AGD Bank </option>

                      <option data-img_src="{{ asset('payment/onepay.png') }}" value="One Pay"> One Pay </option>

                      <option data-img_src="{{ asset('payment/mpt_money.jpg') }}" value="MPT Money"> MPT Money </option>

                      <option data-img_src="{{ asset('payment/truemoney.png') }}" value="True Money"> True Money </option>

                      <option data-img_src="{{ asset('payment/visa.png') }}" value="Visa"> Visa </option>

                      <option data-img_src="{{ asset('payment/master.png') }}" value="Master"> Master </option>

                      <option data-img_src="{{ asset('payment/paypal.png') }}" value="PayPal"> PayPal </option>

                      <option data-img_src="{{ asset('payment/jcb.png') }}" value="JCB"> JCB </option>
                  </select>
                  <span class="text-danger show-error"></span>
                </div>


              </div>

              <div class="row form-group my-3">
                <label class="form-control-label col-md-4">Installment Date</label>
                <div class="col-md-8" id="form-group-installment_date">
                  <input type="date" name="installment_date" class="form-control" id="installment_date">
                  <span class="text-danger show-error"></span>

                </div>
              </div>

              <div class="row form-group my-3">
                <label class="form-control-label col-md-4">Paid Salit</label>
                <div class="col-md-8" id="form-group-installment_photo">
                  <input type="file" name="installment_photo" id="installment_photo">
                  <span class="text-danger show-error"></span>

                </div>
              </div>



            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
   
   @section('script_content')
       <script type="text/javascript">

        $(document).ready(function() {

          function custom_template(obj){
              var data = $(obj.element).data();
              var text = $(obj.element).text();
              if(data && data['img_src']){
                  img_src = data['img_src'];
                  template = $("<div><img src=\"" + img_src + "\" style=\"width:30px;height:30px;\"/><p style=\"font-weight: 700;display:inline;margin-left:10px;\">" + text + "</p></div>");
                  return template;
              }
          }

          var options = {
                'templateSelection': custom_template,
                'templateResult': custom_template,
                // allowClear: true,
                theme: 'bootstrap4',
            }

          $('.js-example-basic-single').select2(options);


          function showValidationErrors(name, error) {
           
              var group = $("#form-group-" + name);
               console.log(group);
              group.addClass('has-error');
              group.find('.show-error').html(error);
          }

          function clearValidationError(name) {
              console.log(name);
              var group = $("#form-group-" + name);
              group.removeClass('has-error');
              group.find('.show-error').html('');
          }

          $("#installment_date").on('change', function () {
              clearValidationError($(this).attr('id').replace('#', ''))
          });

          $("#payment").on('change', function () {
              clearValidationError($(this).attr('id').replace('#', ''))
          });


          $('#listTable').DataTable();

          $('.installmentpay').click(function(){
            var sale_id = $(this).data('id');
            var course_id = $(this).data('course_id');
            var total = $(this).data('total');
            var courses = $(this).data('course');

            $('.course_name').html(courses);
            $('.payment').html(total + " KS");
            $('.sale_id').val(sale_id);
            $('.total').val(total);
            $('.course_id').val(course_id);

          })


          $('#installment_store').submit(function(event){
            event.preventDefault();
            var installment_data = new FormData(this);
            console.log(installment_data);
            $.ajax({
              url : '{{route('backside.installments.store')}}',
              data:installment_data,
              processData : false,
              contentType: false,
              type : 'POST',
              success:function(res){
                if(res){
                  $('#installmentmodel').hide();
                  location.reload();
                }

              },
              error:function(error){
                if(error.status == 422){
                      var errors = error.responseJSON;
                      var data = errors.errors;
          
                      $.each(data,function(i,v){
                          showValidationErrors(i,v);
                      })
                      $('.install_modal').modal('show');
                  }
              }

            })
          })

          $('.remove_btn').click(function() {
             var course_id = $(this).data('course_id');
             var sale_id = $(this).data('id');
             var ans = confirm('Ready to remove?');
             if(ans){
               //salecontroller
               $.ajax({
                  url : "{{route('backside.remove_sale_course')}}",

                  method : 'post',
                  data : {course_id : course_id , sale_id : sale_id},
                  success:function(res){
                    if(res == 'ok'){
                      location.reload();
                    }else{
                      location.href = '{{route('backside.sale.index')}}';
                    }
                  }
               })
             }
          })

        });


    </script>
   @stop
</x-backend>