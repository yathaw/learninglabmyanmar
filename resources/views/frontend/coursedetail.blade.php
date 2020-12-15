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
                                    @php
                                        $company_array = array();
                                    @endphp
                                    @foreach($course->instructors as $instructor)
                                    @php
                                        // instructor info
                                        $instructor_name = $instructor->user->name;
                                        $instructor_jobtitle = $instructor->user->jobtitle->name;
                                        $instructor_bio = $instructor->bio;
                                        $instructor_headline = $instructor->headline;

                                    @endphp

                                    @if($instructor->user->company)


                                    @php
                                        // company info
                                        $company_name = $instructor->user->company->name;
                                        $company_logo = $instructor->user->company->logo;
                                        $company_address = $instructor->user->company->address;
                                        $company_description = $instructor->user->company->description;
                                    @endphp


                                        @php
                                            array_push($company_array, "true");
                                        @endphp

                                        
                                    @else
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#instructordetailModal"> 
                                    
                                        {{$instructor->user->name}} 
                                    
                                        </a> <small> (@if($instructor->user->jobtitle)
                                                        {{$instructor->user->jobtitle->name}} 
                                                      @else
                                                        Jobtitle
                                                      @endif ) 
                                             </small>
                                    @endif
                                    @endforeach

                                    @if($company_array)
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#companyModal"> 
                                    
                                        {{$instructor->user->company->name}} 
                                    
                                        </a> 
                                    @endif
                                </p>


                                @php 
                                    $array = array();
                                @endphp

                                @if(count($course->instructors) == 0)

                                    @php
                                        array_push($array, "true");
                                    @endphp
                                @endif


                                @if(Auth::user())
                                @if(Auth::user()->instructor)

                                @foreach($course->instructors as $instructor)


                                @if($instructor->pivot->instructor_id != Auth::user()->instructor->id)

                                    @php
                                        array_push($array, "true");
                                    @endphp

                                @endif
                                @endforeach

                                @else

                                    <a href="javascript:void(0)" class="btn btn-outline-light 
                                        @foreach($wishlists as $wishlist)
                                        @if($wishlist->course_id == $course->id && Auth::id() == $wishlist->user_id)

                                            active

                                        @endif 
                                        @endforeach btn_wishlist" data-course_id = "{{$course->id}}"> Wishlist 
                                        <i class='bx bx-heart bx-lg ml-2'></i>
                                    </a>

                                @endif


                                @if($array)
                                    <a href="javascript:void(0)" class="btn btn-outline-light 
                                        @foreach($wishlists as $wishlist)
                                        @if($wishlist->course_id == $course->id && Auth::id() == $wishlist->user_id)

                                            active

                                        @endif 
                                        @endforeach btn_wishlist" data-course_id = "{{$course->id}}"> Wishlist 
                                        <i class='bx bx-heart bx-lg ml-2'></i>
                                    </a>
                                @endif
                                

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
                                    
                                    <div class="video-player card-img-top">
                                        <video class="js-player lesson_video_play vidoe-js" data-poster="{{ asset($course->image) }}" controls crossorigin preload="auto" playsinline id="videoarea" style="--plyr-color-main: #f09819;">
                                            <source src="{{ asset($course->video) }}" type="video/mp4"/ >

                                        </video>
                                    </div>

                                    <div class="card-body text-muted">
                                        <p>
                                            <span class="text-danger fs-3"> {{$course->price}} Ks  </span> 

                                            {{-- <span class="text-decoration-line-through text-muted"> 50,000 Ks </span> --}}

                                        </p>

                                        <div class="d-grid gap-2">

                                        @php 
                                            $array = array();
                                        @endphp

                                        @if(count($course->instructors) == 0)

                                            @php
                                                array_push($array, "true");
                                            @endphp
                                        @endif


                                           @if(Auth::user() &&  Auth::user()->getRoleNames()[0] != "Business")

                                            @if(Auth::user()->instructor)


                                            @foreach($course->instructors as $instructor)


                                                @if($instructor->pivot->instructor_id != Auth::user()->instructor->id)

                                                    @php
                                                        array_push($array, "true")
                                                    @endphp
                                                   
                                                @endif
                                                    
                                            @endforeach

                                            @else
                                            @php
                                                $purched_array = array();
                                                $count_sale = count(Auth::user()->sales);
                                            @endphp

                                                @if($count_sale > 0)
                                                    @foreach(Auth::user()->sales as $sales)
                                                        @foreach($sales->courses as $course_sale)
                                                            @if($course_sale->pivot->course_id == $course->id && $course_sale->pivot->status == 0)

                                                                <button disabled="disabled" class="btn custom_primary_btnColor mt-3">Pending</button>

                                                            @else
                                                                @php
                                                                    array_push($purched_array, "true")
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                    @if(count($purched_array) > 0)
                                                        <a href="{{route('lecture',$course->id)}}" class="btn custom_primary_btnColor mt-3">Go to Course</a>
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
                                                Purchase
                                                </a>
                                                @endif
                                            

                                            @endif


                                            @if($array)
                                                <a href="javascript:void(0)" class="btn custom_primary_btnColor mt-3 addtocart"
                                                    data-id="{{$course->id}}" data-course_title="{{$course->title}}" data-instructor = "{{$instructor}}" data-user_id = "{{Auth::id()}}" data-price = "{{$course->price}}" data-image = "{{$course->image}}"
                                                        {{-- for wishlist --}}
                                                        @foreach($wishlists as $wishlist)
                                                        @if($wishlist->course_id == $course->id && Auth::id() == $wishlist->user_id)

                                                        data-wishlist = "save"

                                                        @endif 
                                                        @endforeach
                                                        
                                                        >
                                                    Purcahse
                                                </a>
                                            @endif

                                            @else
                                                <button disabled="disabled" class="btn custom_primary_btnColor mt-3">Purcahse</button>
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
                                    @php
                                        // $data = json_decode($course->outline,true);
                                        $data = json_decode($course->outline,true);

                                        
                                    @endphp

                                    <ul type="none" class="lh-lg">
                                        @foreach($data as $result)
                                            <li> <i class="icofont-check-alt"></i> {{$result}} </li>
                                        @endforeach
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- Requirement --}}
                        <div class="col-12 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="fontbold"> Requirements </h4>

                                    @php
                                        // $data = json_decode($course->requirements,true);
                                        $data = json_decode( $course->requirements);
                                    @endphp

                                    <ul type="none" class="lh-lg">
                                        @foreach($data as $result)
                                            <li> <i class="icofont-check-alt"></i> {{$result}} </li>
                                        @endforeach
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>




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

                            @foreach ($content->assignments as $assignment) 
                                @php
                                  $countassignment++;
                                @endphp
                            @endforeach
                                  
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
                        {{-- Course content --}}
                        <div class="col-12 mt-5">
                            <h4 class="fontbold"> Course content </h4>
                            @php

                                $count_section = count($sections);
                            @endphp
                            
                            <p class="mt-3"> {{$count_section}} Sections • {{$video}} Lectures • {{$totaltimes}} total length </p>

                            <div class="accordion" id="accordionExample">
                                {{-- video duration --}}
                                @php
                                    $i=0;
                                @endphp
                               
                                @foreach($sections as $key => $section)
                                @php
                                    $count_content = count($section->contents);
                                @endphp

                                @if($section->course_id == $course->id)
                                    @php
                                        $contentTotal_duration = 0;
                                        foreach ($section->contents as $content) {

                                            foreach ($content->lessons as $lesson) {
                                                $type = $lesson->type;
                                                if($type == "MP4"){
                                                    $duration = $lesson->duration;

                                                }
                                                $contentTotal_duration += $duration++;
                                            }
                                        }
                                        // dd($contentTotal_duration);
                                        if($contentTotal_duration){
                                            $datetime = Carbon\Carbon::now();
                                            $days = $datetime->diffInDays($datetime->copy()->addSeconds($contentTotal_duration));

                                            $hours = $datetime->diffInHours($datetime->copy()->addSeconds($contentTotal_duration)->subDays($days));
                                            $minutes = $datetime->diffInMinutes($datetime->copy()->addSeconds($contentTotal_duration)->subDays($days)->subHours($hours));

                                            $seconds = $datetime->diffInSeconds($datetime->copy()->addSeconds($contentTotal_duration)->subDays($days)->subHours($hours)->subMinutes($minutes));
                                              // dd($seconds);

                                            $content_time = Carbon\CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans();
                                        }else{
                                            $content_time="0 Second";
                                        }
                                    @endphp
                                @endif


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button {{ $key != 0 ? 'collapsed' : '' }}" type="button" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                                            {{$section->title}}

                                            
                                           


                                            <small class="fst-italic ml-4"> ( {{$count_content}} Lectures • {{$content_time}} ) </small>
                                        </button>
                                    </h2>
                                    <div id="collapse{{$key}}" class="accordion-collapse collapse @if($key == 0) show @endif" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {{-- <p class="lh-lg">
                                                <i class='bx bx-play-circle mr-2 bx-lg' ></i>
                                                <a href="javascript:void(0)" class="text-primary text-decoration-underline videopreivewLink" data-toggle="modal" data-src="https://www.youtube-nocookie.com/embed/H91tgdE7bOw" data-target="#videopreviewModal"> Welcome to the course! </a>
                                                <span class="float-right"> 00:28 </span>
                                            </p> --}}
                                            
                                        @php
                                            $data = App\Models\Content::where('section_id',$section->id)->orderByRaw("CAST(sorting as Integer) ASC")->get();
                                            $onelesson_duration = 0;
                                        @endphp

                                        @foreach($data as $content)
                                            @foreach($content->lessons as $lesson)

                                            @if($lesson->type == "MP4")
                                                @php

                                                    $lesson_duration = $lesson->duration;
                                                    
                                                    $onelesson_duration += $lesson_duration++;
                                                    
                                                @endphp
                                            @endif
                                                    @if($onelesson_duration)
                                                    @php

                                                        $lesson_time = Carbon\Carbon::now();
                                                        $days = $lesson_time->diffInDays($lesson_time->copy()->addSeconds($onelesson_duration));

                                                        $hours = $lesson_time->diffInHours($lesson_time->copy()->addSeconds($onelesson_duration)->subDays($days));
                                                        $minutes = $lesson_time->diffInMinutes($lesson_time->copy()->addSeconds($onelesson_duration)->subDays($days)->subHours($hours));

                                                        $seconds = $lesson_time->diffInSeconds($lesson_time->copy()->addSeconds($onelesson_duration)->subDays($days)->subHours($hours)->subMinutes($minutes));
                                                          // dd($seconds);

                                                        $lesson_total_time = Carbon\CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans();
                                                    @endphp

                                                    @else
                                                    @php
                                                        $lesson_total_time = "0 Second";
                                                    @endphp

                                                    @endif
                                               
                                            

                                                <p class="lh-lg">
                                                    <i class='bx bx-play-circle mr-2 bx-lg' ></i>
                                                        <a href="javascript:void(0)" class="text-primary text-decoration-underline videopreivewLink" data-toggle="modal" data-src="{{$lesson->file}}" data-target="#videopreviewModal"> {{$content->title}} </a>
                                                    <span class="float-right"> 
                                                        @if($lesson->type == "MP4") 
                                                            {{$lesson_total_time}}
                                                        @else
                                                            {{$lesson->type}}
                                                        @endif
                                                    </span>
                                                </p>
                                                {{-- <p class="lh-lg">
                                                    <i class='bx bx-play-circle mr-2 bx-lg' ></i>
                                                    <a href="" class="text-primary text-decoration-underline"> hlelo </a>
                                                    <span class="float-right"> 00:28 </span>
                                                </p> --}}
                                            @endforeach
                                        @endforeach

                                        </div>
                                    </div>
                                </div>

                                @endforeach

                                
                                
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
                                <h3 class="text-dark fontbold"> {{$instructor_name}} </h3>
                                <p> {{$instructor_jobtitle}} </p>

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
                                <p class="lh-base"> {!! $instructor_bio !!} </p>    
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

    {{-- company Modal --}}
    @if($company_array)
    <div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Company Info </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <img src="{{ asset($company_logo) }}" class="img-fluid rounded-circle">
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                                <h3 class="text-dark fontbold"> {{$company_name}} </h3>
                                

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
                                <p class="lh-base"> {!! $company_description !!} </p>    
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="modal-footer">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <a class="btn btn-warning" href="{{ route('instructor','1') }}"> View More </a>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
    @endif

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
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/plyr/demo.css') }}">
    <script src="{{ asset('plugin/plyr/plyr_plugin.js') }}"></script>
    <script src="{{ asset('plugin/plyr/default.js') }}"></script>
    
    <script type="text/javascript">

        $(document).ready(function() {

            const player = Plyr.setup('.js-player',{
                // invertTime: false,
                i18n: {
                    rewind: 'Rewind 15s',
                    fastForward: 'Forward 15s',
                    seek: "Seek",
                    start: "Start",
                    end: "End",
                    seekTime : 10
                },
                controls: [
                    'play-large', // The large play button in the center
                    'restart', // Restart playback
                    'rewind', // Rewind by the seek time (default 10 seconds)
                    'play', // Play/pause playback
                    'fast-forward', // Fast forward by the seek time (default 10 seconds)
                    'progress', // The progress bar and scrubber for playback and buffering
                    'current-time', // The current time of playback
                    'mute', // Toggle mute
                    'volume', // Volume control
                    'captions', // Toggle captions
                    'settings', // Settings menu
                    'fullscreen', // Toggle fullscreen
                    'airplay'
                ],
                events: ["ended", "progress", "stalled", "playing", "waiting", "canplay", "canplaythrough", "loadstart", "loadeddata", "loadedmetadata", "timeupdate", "volumechange", "play", "pause", "error", "seeking", "seeked", "emptied", "ratechange", "cuechange", "download", "enterfullscreen", "exitfullscreen", "captionsenabled", "captionsdisabled", "languagechange", "controlshidden", "controlsshown", "ready", "statechange", "qualitychange", "adsloaded", "adscontentpause", "adscontentresume", "adstarted", "adsmidpoint", "adscomplete", "adsallcomplete", "adsimpression", "adsclick"],
                listeners: {
                    seek: function (e) {
                        // return false;    // required on v3
                    },
                    fastForward: 100
                },
                
                clickToPlay: true,
            });

            // wishlist save
           
            $('.btn_wishlist').click(function(){
            var id = $(this).data('course_id');
            console.log(id);
            $.ajax({
                url : '{{route("wishlist_save")}}',
                method : 'post',
                data : {id : id},
                success:function(res){
                    if(res == "ok"){
                        $('.btn_wishlist').addClass('active');
                    }else{
                         $('.btn_wishlist').removeClass('active');

                    }
                }

            })

        })

  
            // Video Preview
            var $videoSrc;
            $(".videopreivewLink").click(function() {
                $videoSrc = $(this).attr("data-src");
                alert($videoSrc);
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