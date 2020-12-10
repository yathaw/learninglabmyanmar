
<x-backend>

  <h1 class="h3 mb-3"> Sale List </h1>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0"> All Lists </h5>
        </div>
        <div class="card-body">

          <div class="alert alert-success alert-dismissible fade show d-none" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
            <div class="alert-icon">
              <i class="far fa-fw fa-bell"></i>
            </div>
            <div class="alert-message">
              <strong>Success!</strong>
              <span class="msg"> </span>
            </div>
          </div>

          <div class="table-responsive m-t-40">

              <table id="listTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                  <thead class="custom_primary_bgColor text-white">
                    <tr>
                        <th>No</th>
                        <th>Invoiceno</th>
                        <th>Total</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                            
                  <tbody>
                    @php
                      $i = 1;
                    @endphp
                    @foreach($sales as $sale)

                    @php
                      $array = array();
                      $course_count = array();
                    @endphp
                    @foreach($sale->courses as $course)
                        @if($course->pivot->status == 1)
                          @php
                            array_push($course_count, $course);
                          @endphp
                        @elseif($course->pivot->status == 0)
                          @php
                            array_push($array, $course);
                          @endphp
                        @endif

                    @endforeach
                    @php
                      $purche_data = json_encode($course_count);
                      $course_data = json_encode($array);
                      $total = 0;
                      foreach($array as $value) {
                        $total+= $value->price;
                      }
                    @endphp
                      <tr>
                        <th>{{$i}}</th>
                        <th>{{$sale->invoiceno}}</th>
                        <th>{{$total}} KS</th>
                        <th> {{$sale->user->name}} </th>
                        <th>
                          @if($sale->status == 1 && count($sale->courses) == count($course_count))
                          <p class="text-success">Paid</p>
                          @else
                          
                          <p class="text-danger">
                          Unfinished</p>
                          @endif
                        </th>
                        <th>
                          <a href="{{route('backside.sale.show',$sale->id)}}" class="btn btn-info">Show</a>

                          <div class="btn-group">
                            <a href="#" class="btn btn-secondary dropdown-toggle btn-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog fa-lg"></i>
                            </a>
                            <div class="dropdown-menu">
                              

                              @if(count($sale->installments) > 0 && $sale->status==1 && count($sale->courses) == count($course_count))
                                <a href="#" class="dropdown-item payment" data-target="payment_history" data-course="{{$purche_data}}">Purched</a>

                              @else
                                <a class="dropdown-item installmentpay" data-target="#installmentmodel" data-toggle="modal" data-total = "{{$sale->total}}" data-course="{{$course_data}}" data-id="{{$sale->id}}">Installment</a>
                                <a href="#" class="dropdown-item payment" data-toggle="modal" data-target="#payment_history" data-course="{{$purche_data}}">Purched</a>

                              @endif
                                
                            </div>
                          </div>
                        </th>
                      </tr>

                      @php
                        $i++;
                      @endphp
                     
                    @endforeach
                  </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
  </div>



{{-- payment modal --}}
<div class="modal fade" id="installmentmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
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
              <input type="hidden" name="" class="course_id">



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


{{-- payment_history modal --}}
<div class="modal fade" id="payment_history" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Payment History</h4>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      
        <div class="modal-body">
          <div class="row">
            <div class="col-md-10 mx-auto">
              <div class="card">
                <div class="card-body border">
                  <div class="row">
                    <div class="col-md-6 text-center">
                      <h3>Course Name</h3>
                      <h5>200,000 ks</h5>
                      <p>20-12-2020</p>
                    </div>
                    <div class="col-md-6 text-center">
                      <img src="{{asset('/storage/companylogo/12345.png')}}" class="img-fluid" width="120px">
                    </div>
                  </div>
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
            var id = $(this).data('id');
            // var total = $(this).data('total');
            var courses = $(this).data('course');
            var html = '';
            var corma = "";
            var array = new Array();
            var total = 0;
            var course_id = new Array();
            console.log(courses);

            $.each(courses,function(i,v) {
              array.push(v.title);
              course_id.push(v.id);
              total+= v.price;
            })

            var course = array.join(' , ');
          
            
            $('.course_name').html(course);
            $('.payment').html(total + " KS");
            $('.sale_id').val(id);
            $('.course_id').val(course_id);
            $('.total').val(total);

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

          $('.payment').click(function() {
            var courses = $(this).data('course');
            html = '';
            var total=0;
            $.each(courses,function(i,v){
              html+=`<div class="row">
                      <div class="col-md-11 mx-auto">
                        <div class="card border">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-6 text-center">
                                <h2 class="text-gray-800 font-weight-bold">${v.title}</h2>
                                <h4>${v.price} Ks</h4>
                                <p>date</p>
                              </div>
                              <div class="col-md-6 text-center">
                                <img src="{{asset('/storage/companylogo/12345.png')}}" class="img-fluid" width="120px">
                              </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    
                  </div>`
            })
          })

        });


    </script>

@stop

</x-backend>
