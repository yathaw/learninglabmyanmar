<x-frontend>

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2> {{$course->title}} </h2>
                <ol>
                    <li><a href="{{ route('frontend.index') }}">Home</a></li>
                    <li><a href="{{ route('courses') }}"> {{$course->subcategory->category->name}} </a></li>
                    <li><a href="{{ route('courses') }}"> {{$course->subcategory->name}} </a></li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page mt-0 pt-0">

        <div class="container-fluid coursedetailBanner">
            <div class="row">
                <div class="col-12 bg-dark text-white p-5">
                    
                    {{-- <div class="container px-5"> --}}
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-2 order-sm-2 order-2">
                                <h3> {{$course->title}} </h3>
                                {{-- Subtitle --}}
                                <p class="fw-lighter"> {{$course->subtitle}} </p>

                                <div class="rating">
                                    <i class='bx bxs-star custom_primary_Color'></i>
                                    <i class='bx bxs-star custom_primary_Color'></i>
                                    <i class='bx bxs-star custom_primary_Color' ></i>
                                    <i class='bx bxs-star-half custom_primary_Color' ></i>

                                    <i class='bx bx-star' ></i>

                                    <small> ( 187,33 Ratings ) </small>

                                    <small> 100 Students </small>

                                </div>

                                <p> Created By 
                                    @foreach($course->instructors as $instructor)
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#instructordetailModal"> 
                                    
                                        {{$instructor->user->name}} 
                                    
                                        </a> <small> (@if($instructor->user->jobtitle)
                                                        {{$instructor->user->jobtitle->name}} 
                                                      @else
                                                        Jobtitle
                                                      @endif ) 
                                             </small>
                                    @endforeach
                                </p>
                                
                                @if(Auth::user())
                                @foreach($course->instructors as $instructor)
                                @if(Auth::user()->instructor)


                                @if($instructor->pivot->instructor_id != Auth::user()->instructor->id)
                                <a href="javascript:void(0)" class="btn btn-outline-light 
                                        @foreach($wishlists as $wishlist)
                                        @if($wishlist->course_id == $course->id && Auth::id() == $wishlist->user_id)

                                            active

                                        @endif 
                                        @endforeach btn_wishlist" data-course_id = "{{$course->id}}"> Wishlist 
                                    <i class='bx bx-heart bx-lg ml-2'></i>
                                </a>

                                @endif
                                @endif
                                @endforeach
                                

                                <a href="" class="btn btn-outline-light"> Share on Facebook 
                                    <i class='bx bxl-facebook bx-lg ml-2' ></i>
                                </a>

                                <a href="javascript:void(0)" class="btn btn-outline-light" data-toggle="modal" data-target="#reportModal"> Report
                                    <i class='bx bx-error-alt bx-lg ml-2'></i>
                                </a>
                                @else
                                <button href="" class="btn btn-outline-light unauth"> Wishlist 
                                    <i class='bx bx-heart bx-lg ml-2'></i>
                                </button>

                                <button href="" class="btn btn-outline-light unauth" > Share on Facebook 
                                    <i class='bx bxl-facebook bx-lg ml-2' ></i>
                                </button>

                                <button class="btn btn-outline-light unauth" data-toggle="modal" > Report
                                    <i class='bx bx-error-alt bx-lg ml-2'></i>
                                </button>
                                @endif
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-1 order-sm-1 order-1 ">
                                <div class="scrollcardDiv card scroll_card scroll_card_position">
                                    <div class="embed-responsive embed-responsive-4by3">
                                        
                                        
                                        <iframe height="300" src="https://www.youtube-nocookie.com/embed/H91tgdE7bOw?start=34;autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"  class="card-img-top"></iframe>
                                    </div>
                                    <div class="card-body text-muted">
                                        <p>
                                            <span class="text-danger fs-3"> {{$course->price}} Ks  </span> 

                                            <span class="text-decoration-line-through text-muted"> 50,000 Ks </span>

                                        </p>

                                        <div class="d-grid gap-2">
                                           @if(Auth::user())
                                            @foreach($course->instructors as $instructor)
                                                @if(Auth::user()->instructor)


                                                    @if($instructor->pivot->instructor_id != Auth::user()->instructor->id)


                                                        <a href="javascript:void(0)" class="btn custom_primary_btnColor mt-3 addtocart"
                                                        data-id="{{$course->id}}" data-course_title="{{$course->title}}" data-instructor = "{{$instructor}}" data-user_id = "{{Auth::id()}}" data-price = "{{$course->price}}" data-image = "{{$course->image}}"
                                                            {{-- for wishlist --}}
                                                            @foreach($wishlists as $wishlist)
                                                            @if($wishlist->course_id == $course->id && Auth::id() == $wishlist->user_id)

                                                            data-wishlist = "save"

                                                            @endif 
                                                            @endforeach
                                                            
                                                            >
                                                        Add To Cart
                                                        </a>
                                                   
                                                    @endif
                                                    @else
                                                        <a href="javascript:void(0)" class="btn custom_primary_btnColor mt-3 addtocart"
                                                        data-id="{{$course->id}}" data-course_title="{{$course->title}}" data-instructor = "{{$instructor}}" data-user_id = "{{Auth::id()}}" data-price = "{{$course->price}}" data-image = "{{$course->image}}"
                                                            {{-- for wishlist --}}
                                                            @foreach($wishlists as $wishlist)
                                                            @if($wishlist->course_id == $course->id && Auth::id() == $wishlist->user_id)

                                                            data-wishlist = "save"

                                                            @endif 
                                                            @endforeach
                                                            
                                                            >
                                                        Add To Cart
                                                        </a>
                                                    

                                                @endif
                                            @endforeach
                                            @else
                                                <button disabled="disabled" class="btn custom_primary_btnColor mt-3">Add To Cart</button>
                                            @endif
                                        </div>

                                        <div class="d-xl-block d-lg-block d-md-none d-sm-none d-none pt-2">
                                            <p class="text-dark"> This course includes: </p>

                                            <p> 
                                                <i class='bx bxs-videos bx-lg' ></i>
                                                <small class="pl-3"> 63 hours on-demand video </small>
                                            </p>

                                            <p> 
                                                <i class='bx bx-file-blank bx-lg' ></i>
                                                <small class="pl-3"> 16 Articles </small>
                                            </p>

                                            <p> 
                                                <i class='bx bx-task' ></i>
                                                <small class="pl-3"> 3 Assignments </small>
                                            </p>

                                            <p> 
                                                <i class='bx bx-infinite'></i>
                                                <small class="pl-3"> Full lifetime access </small>
                                            </p>

                                            <p> 
                                                @if($course->certificate)
                                                <i class="icofont-certificate-alt-1"></i>
                                                <small class="pl-3"> Certificate of completion </small>
                                                @endif
                                            </p>

                                        </div>


                                    </div>
                                </div>                
                            </div>
                        </div>
                    {{-- </div> --}}

                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">

                    <div class="row">
                        {{-- What you'll Learn --}}
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="fontbold"> What you'll Learn </h4>

                                    <ul type="none" class="lh-lg">
                                        <li> <i class="icofont-check-alt"></i> Beginner level introduction to Docker</li>
                                        <li> <i class="icofont-check-alt"></i> Build Docker images using Dockerfiles with Hands-On Exercises</li>
                                        <li> <i class="icofont-check-alt"></i> Build Application stack using Docker Compose Files with Hands-On Exercises</li>
                                        <li> <i class="icofont-check-alt"></i> Basic Docker Commands with Hands-On Exercises</li>
                                        <li> <i class="icofont-check-alt"></i> Understand what Docker Compose is</li>
                                        <li> <i class="icofont-check-alt"></i> Understand what Docker Swarm is</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- Requirement --}}
                        <div class="col-12 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="fontbold"> Requirements </h4>

                                    {!! $course->requirements !!}
                                </div>
                            </div>
                        </div>

                        {{-- Course content --}}
                        <div class="col-12 mt-5">
                            <h4 class="fontbold"> Course content </h4>
                            
                            <p class="mt-3"> 60 Sections • 623 Lectures • 62h 58m total length </p>

                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Accordion Item #1

                                            <small class="fst-italic ml-4"> ( 10 Lectures • 31 min ) </small>
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="accordion-body">
                                            
                                            <p class="lh-lg">
                                                <i class='bx bx-play-circle mr-2 bx-lg' ></i>
                                                <a href="javascript:void(0)" class="text-primary text-decoration-underline videopreivewLink" data-toggle="modal" data-src="https://www.youtube-nocookie.com/embed/H91tgdE7bOw" data-target="#videopreviewModal"> Welcome to the course! </a>
                                                <span class="float-right"> 00:28 </span>
                                            </p>

                                            <p class="lh-lg">
                                                <i class='bx bx-play-circle mr-2 bx-lg' ></i>
                                                <a href="" class="text-primary text-decoration-underline"> Welcome to the course! </a>
                                                <span class="float-right"> 00:28 </span>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                      <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Accordion Item #2
                                      </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- Description --}}
                        <div class="col-12 mt-5">
                            <h4 class="fontbold mb-3"> Description </h4>
                            <div class="expander">
                              <!-- start of expanding area -->
                            <div class="inner-bit">
                                {!! $course->description !!}
                            </div>
                            </div>

                            <button class="expand-toggle btn btn-light text-primary" href="javascript:void(0)">
                                Show more <i class='bx bxs-chevron-down mr-3' ></i>
                            </button>

                        </div>

                        {{-- Rating --}}
                        <div class="col-12 mt-5">
                            <h4 class="fontbold mb-3"> Student Feedback </h4>
                        </div>
                        
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 d-flex align-items-center justify-content-center">

                            <div class="rating align-content-center text-center">
                                <h1 class="display-4 custom_primary_Color"> 187,33  </h1>
                                <i class='bx bxs-star custom_primary_Color fs-3'></i>
                                <i class='bx bxs-star custom_primary_Color fs-3'></i>
                                <i class='bx bxs-star custom_primary_Color fs-3' ></i>
                                <i class='bx bxs-star-half custom_primary_Color fs-3' ></i>

                                <i class='bx bx-star fs-3' ></i>

                                <p class="ml-3"> Student Ratings  </p>
                            </div>
                            
                        </div>

                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 ">
                            {{-- 5 Stars --}}
                            <div class="row d-flex align-items-center justify-content-center my-0">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-2">
                                    <div class="progress rounded-0" style="height: 10px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 80%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-2 order-sm-1 order-1">
                                    <div class="rating pt-3">
                                        <i class='bx bxs-star custom_primary_Color'></i>
                                        <i class='bx bxs-star custom_primary_Color'></i>
                                        <i class='bx bxs-star custom_primary_Color' ></i>
                                        <i class='bx bxs-star custom_primary_Color' ></i>
                                        <i class='bx bxs-star custom_primary_Color' ></i>

                                        <p class="d-inline-block custom_primarydark_Color fw-bolder float-right"> 80 % </p>
                                    </div>
                                </div>
                            </div>

                            {{-- 4 Stars --}}
                            <div class="row d-flex align-items-center justify-content-center my-0">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-2">
                                    <div class="progress rounded-0" style="height: 10px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-2 order-sm-1 order-1">
                                    <div class="rating pt-3">
                                        <i class='bx bxs-star custom_primary_Color'></i>
                                        <i class='bx bxs-star custom_primary_Color'></i>
                                        <i class='bx bxs-star custom_primary_Color' ></i>
                                        <i class='bx bxs-star custom_primary_Color' ></i>
                                        <i class='bx bx-star custom_primary_Color' ></i>

                                        <p class="d-inline-block custom_primarydark_Color fw-bolder float-right"> 50 % </p>
                                    </div>
                                </div>
                            </div>

                            {{-- 3 Stars --}}
                            <div class="row d-flex align-items-center justify-content-center my-0">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-2">
                                    <div class="progress rounded-0" style="height: 10px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 35%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-2 order-sm-1 order-1">
                                    <div class="rating pt-3">
                                        <i class='bx bxs-star custom_primary_Color'></i>
                                        <i class='bx bxs-star custom_primary_Color'></i>
                                        <i class='bx bxs-star custom_primary_Color' ></i>
                                        <i class='bx bx-star custom_primary_Color' ></i>
                                        <i class='bx bx-star custom_primary_Color' ></i>

                                        <p class="d-inline-block custom_primarydark_Color fw-bolder float-right"> 35 % </p>
                                    </div>
                                </div>
                            </div>

                            {{-- 2 Stars --}}
                            <div class="row d-flex align-items-center justify-content-center my-0">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-2">
                                    <div class="progress rounded-0" style="height: 10px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 30%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-2 order-sm-1 order-1">
                                    <div class="rating pt-3">
                                        <i class='bx bxs-star custom_primary_Color'></i>
                                        <i class='bx bxs-star custom_primary_Color'></i>
                                        <i class='bx bx-star custom_primary_Color' ></i>
                                        <i class='bx bx-star custom_primary_Color' ></i>
                                        <i class='bx bx-star custom_primary_Color' ></i>

                                        <p class="d-inline-block custom_primarydark_Color fw-bolder float-right"> 30 % </p>
                                    </div>
                                </div>
                            </div>

                            {{-- 1 Star --}}
                            <div class="row d-flex align-items-center justify-content-center my-0">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-2">
                                    <div class="progress rounded-0" style="height: 10px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 10%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-2 order-sm-1 order-1">
                                    <div class="rating pt-3">
                                        <i class='bx bxs-star custom_primary_Color'></i>
                                        <i class='bx bx-star custom_primary_Color'></i>
                                        <i class='bx bx-star custom_primary_Color' ></i>
                                        <i class='bx bx-star custom_primary_Color' ></i>
                                        <i class='bx bx-star custom_primary_Color' ></i>

                                        <p class="d-inline-block custom_primarydark_Color fw-bolder float-right"> 10 % </p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                            
                        {{-- Reviews --}}
                        <div class="col-12 mt-5 reviews">
                            <h4 class="fontbold mb-3"> Reviews </h4>

                            @foreach($course->reviews as $review)
                            @php
                                $date= Carbon\Carbon::now();
                                $created_at = $review->created_at;
                                $time_date = Carbon\Carbon::parse($date);
                                $time_created_at = Carbon\Carbon::parse($created_at);
                                
                                $diff_date = $time_date->diffForHumans($time_created_at);

                            @endphp

                            <div class="row py-3 reviewList">
                                <div class="col-2">
                                    <img src="{{ asset($review->user->profile_photo_path) }}" class=" img-fluid rounded-circle"> 
                                </div>
                                <div class="col-10">
                                  
                                    <h4 class="text-dark fw-bolder pl-3">{{$review->user->name}}</h4>

                                    <div class="rating pl-3">
                                        <i class='bx bxs-star custom_primary_Color'></i>
                                        <i class='bx bxs-star custom_primary_Color'></i>
                                        <i class='bx bxs-star custom_primary_Color' ></i>
                                        <i class='bx bxs-star-half custom_primary_Color' ></i>

                                        <i class='bx bx-star' ></i>

                                        <small class="text-muted"> {{$diff_date}} </small>

                                    </div>


                                    <div class="overflow-auto mt-3" style="height: 200px">  
                                        <p class="fw-lighter pl-3 mt-1">
                                          {{$review->description}}
                                        </p>
                                    </div>
                                </div>

                                <hr width="90%" class="mt-3">
                            </div>

                            @endforeach

                            

                            <div class="d-grid gap-2 col-6 mx-auto loadmore_wrapper">
                                <button class="btn btn-outline-warning loadmoreBtn" type="button"> See More Reviews </button>
                            </div>

                        </div>


                    </div>

                </div>
            </div>
        </div>

    </section>



    <!-- Video Preview Modal -->
    <div class="modal fade" id="videopreviewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body videoPreview_modalBox">

                    <button type="button" class="btn-close videoPreview_closeBtn" data-dismiss="modal" aria-label="Close"></button>

                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" id="video"
                          allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen width="100%" height="300"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Instructor Modal -->
    <div class="modal fade" id="instructordetailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Instructor Info </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <img src="{{ asset('frontend/img/team/team-3.jpg') }}" class="img-fluid rounded-circle">
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                <h3 class="text-dark fontbold"> Nyi Ye Lin </h3>
                                <p> Senior Web Developer </p>

                                <div class="mt-2">
                                    <p> 
                                        <i class='bx bxs-star bx-lg custom_primary_Color mr-2' ></i> 
                                        4.7 Ratings 
                                    </p>

                                    <p> 
                                        <i class="icofont-badge custom_primary_Color mr-2"></i>
                                        287,828 Reviews 
                                    </p>

                                    <p> 
                                        <i class="icofont-users-social custom_primary_Color mr-2"></i>
                                        887,947 Students 
                                    </p>

                                    <p> 
                                        <i class='bx bxs-videos mr-2 custom_primary_Color bx-lg'></i>
                                        9 Courses 
                                    </p>
                                </div>
                            </div>

                            <div class="col-12">
                                {{-- Bio --}}
                                <p class="lh-base"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>    
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <a class="btn btn-warning" href="{{ route('instructor','1') }}"> View More </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Report Modal -->
    <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Report This Course </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <p> Flagged content is reviewed by Udemy staff to determine whether it violates Terms of Service or Community Guidelines. If you have a question or technical issue, please contact our Support team here. </p>

                        <div class="form-floating my-2">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected>Please Choose One </option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <label for="floatingSelect"> Issue Type </label>
                        </div>

                        <div class="form-floating my-2">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2"> Message </label>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@section('script_content')
    
    <script type="text/javascript">

        $(document).ready(function() {


            // wishlist save
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

              




            

            // Video Preview
            var $videoSrc;
            $(".videopreivewLink").click(function() {
                $videoSrc = $(this).attr("data-src");
                console.log("button clicked" + $videoSrc);
            });

              // when the modal is opened autoplay it
            $("#videopreviewModal").on("shown.bs.modal", function(e) {
                console.log("modal opened" + $videoSrc);
                $("#video").attr(
                    "src",
                    $videoSrc + "?autoplay=1&showinfo=0&modestbranding=1&rel=0&mute=1"
                );
            });

            // stop playing the youtube video when I close the modal
            $("#videopreviewModal").on("hide.bs.modal", function(e) {
                // a poor man's stop video
                $("#video").attr("src", $videoSrc);
            });

            
            $(window).scroll(function() {    
                var scroll = $(window).scrollTop();    
                if (scroll > 0) {
                    $(".scroll_card").css("margin-top","-100px");
                    $(".scroll_card").css("transition","1");
                    

                }else{
                    $(".scroll_card").css("margin-top","0px");
                }
            });

            $(window).resize(function(){
               var width = $(window).width();
                if(width < 960){
                    $(".scrollcardDiv").removeClass("scroll_card");
                    $(".scrollcardDiv").removeClass("scroll_card_position");

                    $(".scrollcardDiv").addClass("bg-transparent");
                    $(".scrollcardDiv").addClass("border-0");

                }
                else{
                    $(".scrollcardDiv").addClass("scroll_card");
                    $(".scrollcardDiv").addClass("scroll_card_position");

                    $(".scrollcardDiv").removeClass("bg-transparent");
                    $(".scrollcardDiv").removeClass("border-0");

                }
            });


            var x;
            var size_li;
            function changeLoadCount(media) {
                if (media.matches) {
                    x = 4; // no. of items per click mobile <= 767
                    $(".reviewList").hide();
                    $(".reviewList:lt(" + x + ")").show();
                    size_li = $("div.reviewList").length;
                    if (x == size_li) {
                        $(".loadmore_wrapper").hide();
                    } else {
                        $(".loadmore_wrapper").show();
                    }
                } else {
                    x = 3; // no. of items per click in desktop >= 768
                    $(".reviewList").hide();
                    $(".reviewList:lt(" + x + ")").show();
                    size_li = $("div.reviewList").length;
                    if (x == size_li) {
                        $(".loadmore_wrapper").addClass('d-none');
                        $(".loadmore_wrapper").removeClass('d-block');
                    } else {
                        $(".loadmore_wrapper").removeClass('d-none');
                        $(".loadmore_wrapper").addClass('d-block');
                    }
                }
            }

            var media = window.matchMedia("(max-width: 767px)");
            changeLoadCount(media);
            media.addListener(changeLoadCount);
              
            window.addEventListener("load resize", function () {
                changeLoadCount(media);
                media.addListener(changeLoadCount);
            });

            function loadMore() {
                $(".reviewList").hide();
                

                size_li = $("div.reviewList").length;
                $(".reviewList:lt(" + x + ")").show();
                $(".loadmoreBtn").click(function () {
                    console.log(x);

                    console.log(size_li);

                    if (media.matches) {
                        x = x + 4 <= size_li ? x + 4 : size_li;
                    } else {
                        x = x + x <= size_li ? x + x : size_li;
                    }
                    console.log(x);
                    $(".reviewList:lt(" + x + ")").show();
                    if (x == size_li) {
                        $(".loadmore_wrapper").addClass('d-none');
                        $(".loadmore_wrapper").removeClass('d-block');

                    } else {
                        $(".loadmore_wrapper").removeClass('d-none');
                        $(".loadmore_wrapper").addClass('d-block');

                    }

                    if (size_li <= 3) {
                        $(".loadmore_wrapper").addClass('d-none');
                        $(".loadmore_wrapper").removeClass('d-block');
                    }else{
                        $(".loadmore_wrapper").removeClass('d-none');
                        $(".loadmore_wrapper").addClass('d-block');
                    }
                });
              }
              loadMore();


        });

    </script>
@stop
</x-frontend>