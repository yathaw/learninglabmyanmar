<x-backend>

  @role('Admin')
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
                        <th>Phone</th>
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
                      $installment_course = array();
                      $sale_installment = array();
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
                    @foreach($sale->installments as $installment)
                      @php 

                        array_push($sale_installment, $installment);
                        array_push($installment_course, $installment->courses);
                      @endphp
                      {{-- <img src="{{asset($installment->photo)}}" class="img-fluid"> --}}
                    @endforeach

                    @php

                      // sale installment data from installment table

                      $sale_installment_data = json_encode($sale_installment);


                      // installment course data
                      $installment_course_data = json_encode($installment_course);
                    
                      // course_sale status 1 course

                      $purche_data = json_encode($course_count);

                      // course_sale status 0 course

                      $course_data = json_encode($array);
                      $total = 0;
                      foreach($array as $value) {
                        $total+= $value->price;
                      }
                    @endphp
                      <tr>
                        <th>{{$i}}</th>
                        <th>{{$sale->invoiceno}}</th>
                        <th>@if($total==0)
                              {{$sale->total}} KS
                            @else
                              {{$total}} KS
                            @endif</th>
                        <th> {{$sale->user->name}} </th>
                        <th> {{$sale->user->phone}} </th>

                        <th>
                          @if($sale->status == 1 && count($sale->courses) == count($course_count))
                          <p class="text-success">Paid</p>
                          <p class="py-0">( {{count($course_count)}} of {{count($sale->courses)}} Courses)</p>
                          @else
                          
                          <p class="text-danger">Unfinished</p>
                          <p class="py-0">( {{count($course_count)}} of {{count($sale->courses)}} Courses)</p>
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
                                <a href="#" class="dropdown-item payment" data-target="#payment_history" data-toggle="modal" data-sale_installment="{{$sale_installment_data}}" data-installment_course = "{{$installment_course_data}}">Purched</a>

                              @else
                                <a class="dropdown-item installmentpay" data-target="#installmentmodel" data-toggle="modal" data-total = "{{$sale->total}}" data-course="{{$course_data}}" data-id="{{$sale->id}}">Installment</a>
                                <a href="#" class="dropdown-item payment" data-toggle="modal" data-target="#payment_history" data-sale_installment="{{$sale_installment_data}}" data-installment_course = "{{$installment_course_data}}">Purched</a>

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


  {{-- payment_history modal --}}
  <div class="modal fade" id="payment_history" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Payment History</h4>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        
          <div class="modal-body payment_history_show">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endrole

  @role('Instructor')
  <div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
      <h3><strong> Sale </strong> List </h3>
    </div>

    <div class="col-auto ml-auto text-right mt-n1">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
          <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Sale List</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row my-5">
    <div class="col-xl-5 col-xxl-5">
      <div class="w-75">
        <p><strong>Start Date:</strong></p>
        <input type="date" name="startdate" class="form-control form-control-lg" id="startdate">
      </div>
    </div>

    <div class="col-xl-5 col-xxl-5">
      <div class="w-75">
        <p><strong>End Date:</strong></p>
        <input type="date" name="enddate" class="form-control form-control-lg" id="enddate">
      </div>
    </div>

    <div class="col-xl-2 col-xxl-2">
      <br>
      <button class="btn btn-primary mt-3 btnsearch">Search</button>
    </div>
  </div>

  <div class="row my-5">
    <div class="offset-md-10 col-xl-2 offset-md-3">
      <select class="form-select">
        <option selected disabled>Choose Course:</option>
        @foreach($courses as $course)
        <option data-id="{{$course->id}}">{{$course->title}}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="row outputshow">
    
  </div>

  <div class="row filtershow">
    
  </div>

  <div class="row limitshow">
    @if(count($enrolls) > 0)
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
      <div class="card flex-fill">
        <div class="card-header">

          <h5 class="card-title mb-0">Lastest Course </h5>
        </div>
        <table class="table table-hover my-0">
          <thead>
            <tr>
              <th>No</th>
              <th>Student Name</th>
              <th class="d-none d-xl-table-cell">Start Date</th>
              <th>Invoice No</th>
              <th>Course Title</th>
              <th class="d-none d-md-table-cell"> Price </th>
            </tr>
          </thead>
          <tbody>
            @php $i=1;  $alltotal=0;@endphp
            
            @foreach($enrolls as $enroll)
            <tr>
              <td>{{$i++}}</td>
              <td class="d-none d-xl-table-cell">{{$enroll->user->name}}</td>
              @php
                $date = date('d/m/Y', strtotime($enroll->created_at));
              @endphp
              <td>{{$date}}</td>
              <td>{{$enroll->invoiceno}}</td>
              <td>
                @foreach($enroll->courses as $ecourse)
                <span class="badge bg-success">
                  {{$ecourse->title}}
                </span>
                @endforeach
              </td>
              <td class="d-none d-md-table-cell">{{$enroll->total}}</td>
            </tr>
            @php 
              $subtotal=$enroll->total;
              $alltotal+=$subtotal;

            @endphp
            @endforeach
              <tr>
              <th colspan="5" class="text-center">Total Price</th>
              <td>{{$alltotal}}</td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
    @else
    <div class="text-center">
      <img src="{{asset('externalphoto/nocourse.gif')}}">
    </div>
    @endif
  </div>
  @endrole

  @role('Business')
  <div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
      <h3><strong> Sale </strong> List </h3>
    </div>

    <div class="col-auto ml-auto text-right mt-n1">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
          <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Sale List</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row my-5">
    <div class="col-xl-5 col-xxl-5">
      <div class="w-75">
        <p><strong>Start Date:</strong></p>
        <input type="date" name="startdate" class="form-control form-control-lg" id="startdate">
      </div>
    </div>

    <div class="col-xl-5 col-xxl-5">
      <div class="w-75">
        <p><strong>End Date:</strong></p>
        <input type="date" name="enddate" class="form-control form-control-lg" id="enddate">
      </div>
    </div>

    <div class="col-xl-2 col-xxl-2">
      <br>
      <button class="btn btn-primary mt-3 btnsearch">Search</button>
    </div>
  </div>

  <div class="row my-5">
    <div class="offset-md-10 col-xl-2 offset-md-3">
      <select class="form-select">
        <option selected disabled>Choose Course:</option>
        @foreach($courses as $course)
        <option data-id="{{$course->id}}">{{$course->title}}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="row outputshow">
    
  </div>

  <div class="row filtershow">
    
  </div>

  <div class="row limitshow">
    @if(count($enrolls) > 0)
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
      <div class="card flex-fill">
        <div class="card-header">

          <h5 class="card-title mb-0">Lastest Course </h5>
        </div>
        <table class="table table-hover my-0">
          <thead>
            <tr>
              <th>No</th>
              <th>Student Name</th>
              <th class="d-none d-xl-table-cell">Start Date</th>
              <th>Invoice No</th>
              <th>Course Title</th>
              <th class="d-none d-md-table-cell"> Price </th>
            </tr>
          </thead>
          <tbody>
            @php $i=1;  $alltotal=0;@endphp
            @foreach($enrolls as $enroll)
            <tr>
              <td>{{$i++}}</td>
              <td class="d-none d-xl-table-cell">{{$enroll->user->name}}</td>
              @php
                $date = date('d/m/Y', strtotime($enroll->created_at));
              @endphp
              <td>{{$date}}</td>
              <td>{{$enroll->invoiceno}}</td>
              <td>
                @foreach($enroll->courses as $ecourse)
                <span class="badge bg-success">
                  {{$ecourse->title}}
                </span>
                @endforeach
              </td>
              <td class="d-none d-md-table-cell">{{$enroll->total}}</td>
            </tr>
            @php 
              $subtotal=$enroll->total;
              $alltotal+=$subtotal; 
            @endphp
            @endforeach
              <tr>
              <th colspan="5" class="text-center">Total Price</th>
              <td>{{$alltotal}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    @else
    <div class="text-center">
      <img src="{{asset('externalphoto/nocourse.gif')}}">
    </div>
    @endif
  </div>
  @endrole

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

          // modal

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

          // store in database
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
            var sale_installment = $(this).data('sale_installment');
            var installment_course = $(this).data('installment_course');
            console.log(sale_installment);
            html = '';
            var total=0;
            $.each(sale_installment,function(i,v){
              $.each(installment_course,function(a,b){
                // course
                $.each(b,function(c,d) {

                  if(d.pivot.installment_id == v.id){
                    var date = new Date(v.paiddate).getDate()+' - '+new Date(v.paiddate).getMonth()+' - '+new Date(v.paiddate).getFullYear();
                    html+=`<div class="row">
                            <div class="col-md-11 mx-auto">
                              <div class="card border">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-8">
                                      <h3>${d.title}</h3>

                                      <h4>${d.price} Ks</h4>
                                      
                                      <p>${v.type}</p>
                                      <p>${date}</p>
                                    </div>
                                    <div class="col-md-4 text-center">`;

                                    if(v.type == "Cash Money"){

                                      html+=`<img src="{{ asset('payment/cash.jpg') }}" class="img-fluid" width="120px">`

                                    }else if(v.type == "AYA"){

                                      html+=`<img src="{{ asset('payment/aya_bank.png') }}" class="img-fluid" width="120px">`

                                    }else if(v.type == "CB"){

                                      html+=`<img src="{{ asset('payment/cb_bank.png') }}" class="img-fluid" width="120px">`
                                      
                                    }else if(v.type == "KBZ"){

                                      html+=`<img src="{{ asset('payment/kbz_bank.png') }}" class="img-fluid" width="120px">`
                                      
                                    }else if(v.type == "KBZ Pay"){

                                      html+=`<img src="{{ asset('payment/k_pay.png') }}" class="img-fluid" width="120px">`
                                      
                                    }else if(v.type == "Wave Money"){

                                      html+=`<img src="{{ asset('payment/wavemoney.png') }}" class="img-fluid" width="120px">`
                                      
                                    }else if(v.type == "Wave Pay"){

                                      html+=`<img src="{{ asset('payment/wavepay.png') }}" class="img-fluid" width="120px">`
                                      
                                    }else if(v.type == "MAB Bank"){

                                      html+=`<img src="{{ asset('payment/mab_bank.png') }}" class="img-fluid" width="120px">`
                                      
                                    }else if(v.type == "Yoma Bank"){

                                      html+=`<img src="{{ asset('payment/yoma_bank.png') }}" class="img-fluid" width="120px">`
                                      
                                    }else if(v.type == "AGD Bank"){

                                      html+=`<img src="{{ asset('payment/agd_bank.png') }}" class="img-fluid" width="120px">`
                                      
                                    }else if(v.type == "One Pay"){

                                      html+=`<img src="{{ asset('payment/onepay.png') }}" class="img-fluid" width="120px">`
                                      
                                    }else if(v.type == "MPT Money"){

                                      html+=`<img src="{{ asset('payment/mpt_money.jpg') }}" class="img-fluid" width="120px">`
                                      
                                    }else if(v.type == "True Money"){

                                      html+=`<img src="{{ asset('payment/truemoney.png') }}" class="img-fluid" width="120px">`
                                      
                                    }else if(v.type == "Visa"){

                                      html+=`<img src="{{ asset('payment/visa.png') }}" class="img-fluid" width="120px">`
                                      
                                    }else if(v.type == "Master"){

                                      html+=`<img src="{{ asset('payment/master.png') }}" class="img-fluid" width="120px">`
                                      
                                    }else if(v.type == "PayPal"){

                                      html+=`<img src="{{ asset('payment/paypal.png') }}" class="img-fluid" width="120px">`
                                      
                                    }else{

                                      html+=`<img src="{{ asset('payment/jcb.png') }}" class="img-fluid" width="120px">`

                                    }


                                    html+=`</div>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                          
                        </div>`
                      }

                    })
                })
            })

            $('.payment_history_show').html(html);
          })

          $('.outputshow').hide();
          $('.filtershow').hide();

          $('.btnsearch').click(function(){
            var startdate = $('#startdate').val();
            var enddate = $('#enddate').val();

            $.ajax({
              url: "/backside/enrollmentsearch",
              method: 'post',
              data: {
                 startdate: startdate,
                 enddate: enddate
              },
              success: function(result){
                 
                 var html=''; var j=1;
                 html+=`<div class="col-12 col-lg-12 col-xxl-12 d-flex">
                          <div class="card flex-fill">
                            <div class="card-header">

                              <h5 class="card-title mb-0">Enrollment (${startdate} and ${enddate})</h5>
                            </div>
                            <table class="table table-hover my-0">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Student Name</th>
                                  <th class="d-none d-xl-table-cell">Start Date</th>
                                  <th>Invoice No</th>
                                  <th>Course Title</th>
                                  <th class="d-none d-md-table-cell"> Price </th>
                                </tr>
                              </thead>
                              <tbody>`;
                if(result.sales.length>0){
                var alltotal = 0;   
                 $.each(result.sales,function(i,v){
                    
                    var date = new Date(v.created_at);

                    var day = date.getDate();
                    var month = date.getMonth();
                    var year = date.getFullYear();
                     
                    var fullday = day+'/'+month+'/'+year;
                    var subtotal = v.total;
                    
                    html+=`<tr class='clickableRow'>
                                  <td>${j++}</td>
                                  <td>${v.user.name}</td>
                                  <td class="d-none d-xl-table-cell">${fullday}</td>
                                  <td>${v.invoiceno}</td>
                                  <td>`;
                                  $.each(v.courses,function(k,r){
                                    html+=`<span class="badge bg-success">${r.title}</span>`;
                                  });
                                  html+=`</td>
                                  <td class="d-none d-md-table-cell">${v.total}</td>
                                </tr>`;
                      alltotal+=subtotal++;
                 })
                 html+=`<tr>
                          <th colspan="5" class="text-center">Total Price</th>
                          <td>${alltotal}</td>
                        </tr>
                        </tbody>
                        </table>
                        </div>
                        </div>`;
                  $('.outputshow').html(html);
                  $('.outputshow').show();
                  $('.limitshow').hide();
                  $('.filtershow').hide();
                }else{
                  html+=`<tr class='clickableRow'>
                            <td colspan='6' class='text-center'>Your Search Data Not Found</td>
                          </tr></tbody></table></div></div>`;
                  $('.outputshow').html(html);
                  $('.outputshow').show();
                  $('.limitshow').hide();
                  $('.filtershow').hide();
                }
              }
            });
          })



          $('select').change(function() {
            var id = $(this).find(':selected').data('id');
            $.ajax({
              url: "/backside/coursefilter",
              method: 'post',
              data: {
                 id: id
              },
              success: function(result){
                var html=''; var j=1;
                 html+=`<div class="col-12 col-lg-12 col-xxl-12 d-flex">
                          <div class="card flex-fill">
                            <div class="card-header">

                              <h5 class="card-title mb-0">Enrollment (${result.course.title})</h5>
                            </div>
                            <table class="table table-hover my-0">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Student Name</th>
                                  <th class="d-none d-xl-table-cell">Start Date</th>
                                  <th>Invoice No</th>
                                  <th>Course Title</th>
                                  <th class="d-none d-md-table-cell"> Price </th>
                                </tr>
                              </thead>
                              <tbody>`;
                if(result.sales.length>0){  
                var alltotal = 0;   
                 $.each(result.sales,function(i,v){
                    
                    var date = new Date(v.created_at);

                    var day = date.getDate();
                    var month = date.getMonth();
                    var year = date.getFullYear();
                     
                    var fullday = day+'/'+month+'/'+year;
                    var subtotal = v.total;
                    alltotal+=subtotal++;
                    html+=`<tr class='clickableRow'>
                                  <td>${j++}</td>
                                  <td>${v.user.name}</td>
                                  <td class="d-none d-xl-table-cell">${fullday}</td>
                                  <td>${v.invoiceno}</td>
                                  <td>`;
                                  $.each(v.courses,function(k,r){
                                    html+=`<span class="badge bg-success">${r.title}</span>`;
                                  });
                                  html+=`</td>
                                  <td class="d-none d-md-table-cell">${v.total}</td>
                                </tr>`;
                 })

                 html+=`<tr>
                          <th colspan="5" class="text-center">Total Price</th>
                          <td>${alltotal}</td>
                        </tr>
                        </tbody>
                        </table>
                        </div>
                      </div>`;
                  $('.filtershow').html(html);
                  $('.filtershow').show();
                  $('.limitshow').hide();
                  $('.outputshow').hide();
                }else{
                  html+=`<tr class='clickableRow'>
                            <td colspan='6' class='text-center'>Your Search Data Not Found</td>
                          </tr></tbody></table></div></div>`;
                  $('.filtershow').html(html);
                  $('.filtershow').show();
                  $('.limitshow').hide();
                  $('.outputshow').hide();
                }
              }
            })
          })

        });


    </script>

@stop

</x-backend>
