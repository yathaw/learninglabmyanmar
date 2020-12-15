<x-frontend>

	<!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      	<div class="container">

            <div class="d-flex justify-content-between align-items-center">
          		<h2> {{ $course->title }} </h2>
          		<ol>
            		<li><a href="{{ route('frontend.index') }}">Home</a></li>
                    <li><a href="{{ route('mystudyings') }}">My Studying </a></li>
                    <li> Lecture Video </li>
          		</ol>
        	</div>

      	</div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                   
                    <div class="video-player">
                        <video class="js-player lesson_video_play vidoe-js" controls crossorigin preload="auto" playsinline id="videoarea" style="--plyr-color-main: #f09819;">
                            <source type="video/mp4"/ >

                        </video>
                    </div>

                    <div class="alert alert-warning my-3" role="alert">
                        Take Notes
                        <a class="btn btn-light btn-sm float-right"> <i class='bx bx-download'></i> Download </a>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                    <div class="accordion" id="accordionExample">

                        @foreach($sections as $section_key => $section)

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $section->id }}">
                                <button class="accordion-button {{ $section_key != 0 ? 'collapsed' : '' }}" type="button" data-toggle="collapse" data-target="#collapse{{ $section->id }}" aria-expanded="true" aria-controls="collapse{{ $section->id }}"> {{ $section->title }}

                                    <small class="fst-italic ml-4"> ( 10 Lectures • 31 min ) </small>
                                </button>
                            </h2>
                            <div id="collapse{{ $section->id }}" class="accordion-collapse collapse {{ $section_key == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $section->id }}" data-parent="#accordionExample">
                                <div class="accordion-body">

                                    <ul id="playlist" class="lh-lg list-group list-group-flush text-left">

                                        @foreach($section->contents  as $content_key => $content)

                                        @php
                                            # Lesson
                                            if ($content->contenttype_id == 1) {

                                                $fileId = $content->lessons[0]->id;
                                                $fileLink = asset($content->lessons[0]->file);
                                                $duration = $content->lessons[0]->duration;

                                                $lessonId = $content->lessons[0]->id;

                                            }
                                            # Assignment
                                            else if ($content->contenttype_id == 3) {
                                                $fileId = $content->assignments[0]->id;
                                                $fileLink = asset($content->assignments[0]->file);
                                                $duration = '';
                                            }
                                            # Quizz
                                            else{
                                                $fileLink = '';
                                                $duration = '';
                                            }

                                            // Learning Video


                                        @endphp

                                        <li fileLink="{{ $fileLink }}" contentId="{{ $content->id }}" fileId="{{ $fileId
                                         }}" videoDuration="{{ $duration }}" userId="{{ $user_id }}" class="list-group-item px-0 {{ $content_key == 0 ? 'li_active' : '' }}">

                                            @foreach($completeLessons as $completeLesson)
                                                @if($completeLesson['lesssonid'] == $lessonId)
                                                    <i class='bx bxs-checkbox-checked fs-4 text-success'></i>
                                                @else
                                                    <i class='bx bx-checkbox-checked fs-4' ></i>

                                                @endif

                                            @endforeach

                                            <p class="mb-0 chapter{{ $content->id }} {{ $content_key == 0 ? 'text-primary' : '' }}  d-inline-block">  


                                                {{ $content->title }}
                                                
                                            </p>
                                            <span class="float-right"> {{ $duration }}</span>
                                        </li>

                                        @endforeach

                                    </ul>
                                    
                                    

                                </div>
                            </div>
                        </div>

                        @endforeach
                        
                    </div>
                    
                </div>
            </div>


            <div class="row mt-4 text-left">
                <div class="col-12">
                    <nav class="mb-5">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="qnsTab" data-toggle="tab" href="#qns" role="tab" aria-controls="qns" aria-selected="true">
                                Question & Answer
                            </a>
                            <a class="nav-link" id="overviewTab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="false"> Course Overview </a>
                            <a class="nav-link" id="instructorinfoTab" data-toggle="tab" href="#instructorinfo" role="tab" aria-controls="instructorinfo" aria-selected="false"> Instructor Info </a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="qns" role="tabpanel" aria-labelledby="qnsTab">

                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <p> {{count($questions)}} questions in this course </p>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <a href="javascript:void(0)" class="btn custom_primary_btnColor" id="askquestion"> Ask Question </a>
                                        
                                    </div>
                                    <hr class="mt-3">
                                </div>

                                <div class="row testimonials allquestions">
            
                                    @foreach($questions as $comm)
                                    <div class="col-12 questionLists">
                                        <div class="testimonial-item" style="min-height: 0">
                                            <a href="#" class="text-dark commentdescription" data-id="{{$comm->id}}">
                                                <p class="fw-bolder fst-normal fontbold pb-0">
                                                    {{$comm->description}}
                                                </p>
                                            </a>

                                            <p class="fst-normal"> 
                                                <small> 
                                                    <i class='bx bx-user' ></i> {{$comm->user->name}} 
                                                </small>
                                                <small class="ml-4"> 
                                                    <i class='bx bx-time'></i>
                                                    {{$comm->created_at->diffForHumans()}} 
                                                </small>

                                                <small class="ml-4">  
                                                    <i class='bx bx-comment-detail' ></i> {{count($comm->answers)}} Comment 
                                                </small>

                                            </p>
                                            <div class="float-left">
                                                <img src="{{ asset($comm->user->profile_photo_path) }}" class="testimonial-img" alt="">
                                            </div>
                                          </div>
                                    </div>
                                    <!-- @foreach($answers as $ans)
                                    @if($ans->question_id == $comm->id)
                                    <div class="offset-1 col-11 questionLists">
                                        <div class="testimonial-item" style="min-height: 0">
                                            <a href="" class="text-dark">
                                                <p class="fw-bolder fst-normal fontbold pb-0">
                                                    {{$ans->description}}
                                                </p>
                                            </a>

                                            <p class="fst-normal"> 
                                                <small> 
                                                    <i class='bx bx-user' ></i> {{$ans->user->name}} 
                                                </small>
                                                <small class="ml-4"> 
                                                    <i class='bx bx-time'></i>
                                                    {{$ans->created_at->diffForHumans()}} 
                                                </small>

                                                <small class="ml-4">  
                                                    <i class='bx bx-comment-detail' ></i> 0 Comment 
                                                </small>

                                            </p>
                                            <div class="float-left">
                                                <img src="{{ asset($ans->user->profile_photo_path) }}" class="testimonial-img" alt="">
                                            </div>
                                          </div>
                                    </div>
                                    @endif
                                    @endforeach -->
                                    @endforeach

                                   <!--  <div class="col-12 questionLists">
                                        <div class="testimonial-item" style="min-height: 0">
                                            <a href="" class="text-dark">
                                                <p class="fw-bolder fst-normal fontbold pb-0">
                                                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                                                </p>
                                            </a>

                                            <p class="fst-normal"> 
                                                <small> 
                                                    <i class='bx bx-user' ></i> Aye Lwin Soe 
                                                </small>
                                                <small class="ml-4"> 
                                                    <i class='bx bx-time'></i>
                                                    7 minutes ago 
                                                </small>

                                                <small class="ml-4">  
                                                    <i class='bx bx-comment-detail' ></i> 0 Comment 
                                                </small>

                                            </p>
                                            <div class="float-right">
                                                <img src="{{ asset('frontend/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">
                                            </div>
                                          </div>
                                    </div>

                                    <div class="col-12 questionLists">
                                        <div class="testimonial-item" style="min-height: 0">
                                            <a href="" class="text-dark">
                                                <p class="fw-bolder fst-normal fontbold pb-0">
                                                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                                                </p>
                                            </a>

                                            <p class="fst-normal"> 
                                                <small> 
                                                    <i class='bx bx-user' ></i> Aye Lwin Soe 
                                                </small>
                                                <small class="ml-4"> 
                                                    <i class='bx bx-time'></i>
                                                    7 minutes ago 
                                                </small>

                                                <small class="ml-4">  
                                                    <i class='bx bx-comment-detail' ></i> 0 Comment 
                                                </small>

                                            </p>
                                            <div class="float-left">
                                                <img src="{{ asset('frontend/img/testimonials/testimonials-3.jpg') }}" class="testimonial-img" alt="">
                                            </div>
                                          </div>
                                    </div>

                                    <div class="col-12 questionLists">
                                        <div class="testimonial-item" style="min-height: 0">
                                            <a href="" class="text-dark">
                                                <p class="fw-bolder fst-normal fontbold pb-0">
                                                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                                                </p>
                                            </a>

                                            <p class="fst-normal"> 
                                                <small> 
                                                    <i class='bx bx-user' ></i> Aye Lwin Soe 
                                                </small>
                                                <small class="ml-4"> 
                                                    <i class='bx bx-time'></i>
                                                    7 minutes ago 
                                                </small>

                                                <small class="ml-4">  
                                                    <i class='bx bx-comment-detail' ></i> 0 Comment 
                                                </small>

                                            </p>
                                            <div class="float-right">
                                                <img src="{{ asset('frontend/img/testimonials/testimonials-4.jpg') }}" class="testimonial-img" alt="">
                                            </div>
                                          </div>
                                    </div>

                                    <div class="col-12 questionLists">
                                        <div class="testimonial-item" style="min-height: 0">
                                            <a href="" class="text-dark">
                                                <p class="fw-bolder fst-normal fontbold pb-0">
                                                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                                                </p>
                                            </a>

                                            <p class="fst-normal"> 
                                                <small> 
                                                    <i class='bx bx-user' ></i> Aye Lwin Soe 
                                                </small>
                                                <small class="ml-4"> 
                                                    <i class='bx bx-time'></i>
                                                    7 minutes ago 
                                                </small>

                                                <small class="ml-4">  
                                                    <i class='bx bx-comment-detail' ></i> 0 Comment 
                                                </small>

                                            </p>
                                            <div class="float-left">
                                                <img src="{{ asset('frontend/img/testimonials/testimonials-5.jpg') }}" class="testimonial-img" alt="">
                                            </div>
                                          </div>
                                    </div> -->
                                </div>

                                <div class="row testimonials replyquestions">
                                    <div class="col-md-12">
                                        <a href="#" class="btn btn-outline-primary block allques">B
                                    ack to All Questions</a>
                                    </div>
                                    <div class="col-md-12 answerreply">
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-12">
                                        <div class="d-grid gap-2 col-6 mx-auto loadmore_wrapper d-none">
                                            <button class="btn btn-outline-warning loadmoreBtn" type="button"> Load More </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                        <div class="tab-pane fade" id="overview" role="tabpanel" aria-labelledby="overviewTab">

                            <div class="container">
                                <div class="row">
                                    {{-- What you'll Learn --}}
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="fontbold"> What you'll Learn </h4>

                                                @php
                                                    $outlines = json_decode($course->outline);
                                                    $requirements = json_decode( $course->requirements);

                                                @endphp

                                                <ul type="none" class="lh-lg">
                                                    @foreach($outlines as $outline)
                                                        <li> <i class="icofont-check-alt"></i> {{$outline}} </li>
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

                                                <ul type="none" class="lh-lg">
                                                    @foreach($requirements as $requirement)
                                                        <li> <i class="icofont-check-alt"></i> {{$requirement}} </li>
                                                    @endforeach
                                                </ul>
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
                                </div>
                            </div>
                            
                        </div>
                        <div class="tab-pane fade" id="instructorinfo" role="tabpanel" aria-labelledby="instructorinfoTab">
                            <div class="container">
                                <div class="row team">
                                    <div class="col-xl-9 col-lg-9 col-md-6 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-2">
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

                                        <div>
                                            <h3 class="mt-5"> About Me </h3>
                                            <hr>
                                            <div class="expander">
                                                <!-- start of expanding area -->
                                                <div class="inner-bit">
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

                                            <button class="expand-toggle btn btn-light text-primary" href="javascript:void(0)">
                                                Show more <i class='bx bxs-chevron-down mr-3' ></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-2 order-sm-1 order-1 d-flex align-items-stretch">
                                        <div class="member">
                                            <div class="member-img">
                                                <img src="{{ asset('frontend/img/team/team-1.jpg') }}" class="img-fluid" alt="">
                                                <div class="social">
                                                    <a href=""><i class="icofont-twitter"></i></a>
                                                    <a href=""><i class="icofont-facebook"></i></a>
                                                    <a href=""><i class="icofont-instagram"></i></a>
                                                    <a href=""><i class="icofont-linkedin"></i></a>
                                                </div>
                                            </div>
                                            <div class="member-info">
                                                <h4> Nyi Ye Lin</h4>
                                                <span> Senior Web Developer </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <!-- AskQuestion Modal -->
    <div class="modal fade" id="askquestionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Ask Any Question? </h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('questionstore')}}" method="post">
                    @csrf
                    <input type="hidden" name="contentid" value="" id="contentid">
                    <div class="modal-body">

                        <div class="form-floating mb-3 col-md-12">
                            <input type="text" class="form-control" id="subject" placeholder="Title or summary" name="summary">
                            <label for="subject"> Title or Summary </label>
                            <div class="validate"></div>

                        </div>

                        <div class="form-floating my-2">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="comment"></textarea>
                            <label for="floatingTextarea2"> Comments </label>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
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
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var currentplayVideo;

            var DURATION_IN_SECONDS = {
                epochs: ['year', 'month', 'day', 'hour', 'minute'],
                year: 31536000,
                month: 2592000,
                day: 86400,
                hour: 3600,
                minute: 60
              };

              function getDuration(seconds) {
                var epoch, interval;

                for (var i = 0; i < DURATION_IN_SECONDS.epochs.length; i++) {
                  epoch = DURATION_IN_SECONDS.epochs[i];
                  interval = Math.floor(seconds / DURATION_IN_SECONDS[epoch]);
                  if (interval >= 1) {
                    return {
                      interval: interval,
                      epoch: epoch
                    };
                  }
                }

              };

              function timeSince(date) {
                var seconds = Math.floor((new Date() - new Date(date)) / 1000);
                var duration = getDuration(seconds);
                var suffix = (duration.interval > 1 || duration.interval === 0) ? 's' : '';
                return duration.interval + ' ' + duration.epoch + suffix;
              };

            var x;
            var size_li;
            function changeLoadCount(media) {
                if (media.matches) {
                    x = 4; // no. of items per click mobile <= 767
                    $(".questionLists").hide();
                    $(".questionLists:lt(" + x + ")").show();
                    size_li = $("div.questionLists").length;
                    if (x == size_li) {
                        $(".loadmore_wrapper").removeClass('d-none');
                        $(".loadmore_wrapper").addClass('d-block');
                    } else {
                        $(".loadmore_wrapper").addClass('d-none');
                        $(".loadmore_wrapper").removeClass('d-block');
                    }
                } else {
                    x = 3; // no. of items per click in desktop >= 768
                    $(".questionLists").hide();
                    $(".questionLists:lt(" + x + ")").show();
                    size_li = $("div.questionLists").length;
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
                $(".questionLists").hide();
                

                size_li = $("div.questionLists").length;

                $(".questionLists:lt(" + x + ")").show();
                $(".loadmoreBtn").click(function () {

                    if (media.matches) {
                        x = x + 4 <= size_li ? x + 4 : size_li;
                    } else {
                        x = x + x <= size_li ? x + x : size_li;
                    }
                    $(".questionLists:lt(" + x + ")").show();
                    if (x == size_li) {
                        $(".loadmore_wrapper").addClass('d-none');
                        $(".loadmore_wrapper").removeClass('d-block');

                    } else {
                        $(".loadmore_wrapper").removeClass('d-none');
                        $(".loadmore_wrapper").addClass('d-block');

                    }
                });

                if (size_li <= 3) {
                    $(".loadmore_wrapper").addClass('d-none');
                    $(".loadmore_wrapper").removeClass('d-block');
                }else{
                    $(".loadmore_wrapper").removeClass('d-none');
                    $(".loadmore_wrapper").addClass('d-block');
                }

            }
            loadMore();


            // Video

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

            var plyrtime;


            $('.lesson_video_play').on('play',function(){

               
                var lesson_id = currentplayVideo.fileid;
                var duration = currentplayVideo.duration;
                var user_id = currentplayVideo.userid;

                var current_time = this.currentTime;
                // alert(current_time);
                // startInterval();
            })
            $('.lesson_video_play').on('pause',function(){
                var lesson_id = currentplayVideo.fileid;
                var duration = currentplayVideo.duration;
                var user_id = currentplayVideo.userid;

                var current_time = this.currentTime;


                // clearInterval(plyrtime);
                // plyrtime = current_time;

                var pause_time = current_time.toFixed(2)
                // if(duration == pause_time){
                $.post('/lesson_user',{lesson_id:lesson_id, duration:pause_time,user_id:user_id},function(res){
                    // console.log(res);
                });
                // }
            });


            // function startInterval() {
            //    //checks every 100ms to see if the video has reached 6s
            //     console.log('playing startInterval');

            //     plyrtime = setInterval(function(){
            //         console.log(player);
            //     },100);

              
            // }

            


            $(function() {
                // var className = $('#playlist li').attr('class');
                videoplay_currentActiveclass();

                function videoplay_currentActiveclass(){
                    if($('#playlist li').hasClass('li_active')){
                        var fileLink = $('ul#playlist').find('li.li_active').attr('fileLink');
                        var contentId = $('ul#playlist').find('li.li_active').attr('contentId');
                        var videoDuration = $('ul#playlist').find('li.li_active').attr('videoDuration');
                        var userId = $('ul#playlist').find('li.li_active').attr('userId');
                        var fileId = $('ul#playlist').find('li.li_active').attr("fileId");


                        currentplayVideo = {
                            "duration" : videoDuration,
                            "userid" : userId,
                            "fileid" : parseInt(fileId)
                        };


                        $("#videoarea").attr({
                            "src": fileLink,
                            "poster": "",
                            "autoplay": "autoplay",
                            "data-id":contentId,
                            "data-duration" : videoDuration,
                            "data-userid" : userId,
                            "data-fileid" : fileId

                                  });

                        currentvideoState(fileId, userId);

                        starttime = $(this).attr('startt');

                    }

                        // console.log("fileLink");

                }

                $("#playlist li").on("click", function() {

                    var fileLink = $(this).attr("fileLink");
                    var contentId = $(this).attr("contentId");
                    var videoDuration = $(this).attr("videoDuration");
                    var userId = $(this).attr("userId");
                    var fileId = $(this).attr("fileId");


                    var askid = $("#askquestion").attr("data-id",contentId);

                    currentplayVideo = {
                        "duration" : videoDuration,
                        "userid" : userId,
                        "fileid" : parseInt(fileId)
                    };

                    $("#videoarea").attr({
                        "src": $(this).attr("fileLink"),
                        "poster": "",
                        "autoplay": "autoplay",
                        "data-id":contentId,
                        "data-duration" : videoDuration,
                        "data-userid" : userId,
                        "data-fileid" : parseInt(fileId)

                              });
                    
                    currentvideoState(fileId, userId);

                    starttime = $(this).attr('startt');


                    $("#playlist li p").removeClass("text-primary");
                    $("p.chapter"+contentId).addClass("text-primary");
                    

                });

            })

            // document.getElementById("videoarea").addEventListener("loadedmetadata", function() {
            //      this.currentTime = starttime;
            // }, false);

            function currentvideoState(fileId, userId){
                $.post('/lesson_state',{lesson_id:fileId, user_id:userId},function(res){
                    if (res.lesssonid) {
                        var starttime = res.timeline;
                        console.log(starttime);
                        $('.lesson_video_play').on("loadstart", function() {
                            this.seek(starttime);
                        });
                    }
                });
            }

            $('#askquestion').click(function(){
                var vid = $(this).data('id');
                if(vid){
                    $('#contentid').val(vid);
                    $('#askquestionModal').modal();
                }else{

                    var vid = $('#playlist li').attr('contentId');
                    $('#contentid').val(vid);
                    $('#askquestionModal').modal();
                }
            })

            $('.replyquestions').hide();

            $('.commentdescription').click(function(){
                var quesid = $(this).data('id');
                $.post('/questionreply',{quesid:quesid},function(response){
                 
                    var html='';
                    html+=` <div class="row">
                                <div class="offset-md-1 col-md-1 pt-5">
                                    <img src="../${response.question[0].user.profile_photo_path}" class="rounded-circle" width="90px">
                                </div>
                                <div class="col-md-8 pt-5">
                                    <p>${response.question[0].user.name}</p>
                                    <p>${timeSince(response.question[0].created_at)} ago</p>
                                    <p>${response.question[0].description}</p>
                                </div>
                            </div>
                            <p class="pt-5">
                                ${response.answer.length} reply
                            </p>
                            <hr>`;
                    $.each(response.answer,function(i,v){
                        html+=` <div class="row">
                                    <div class="offset-1 col-md-1">
                                        <img src="../${v.user.profile_photo_path}" class="rounded-circle" width="90px">
                                    </div>
                                    <div class="col-md-8">
                                        <p>${v.user.name}</p>
                                        <p>${timeSince(v.created_at)} ago</p>
                                        <p>${v.description}</p>
                                            </div>
                                    </div>
                                    <hr> `;
                    })
                    html+=`<div class="row">
                                    <div class="col-md-1">
                                        <img src="{{ asset('frontend/img/testimonials/testimonials-5.jpg') }}" class="rounded-circle" width="70px">
                                    </div>
                                    <div class="col-md-8">
                                        <textarea placeholder="Add reply" class="form-control" rows="2">
                                        </textarea>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-primary mt-2">
                                            Reply
                                        </button>
                                    </div>
                                </div>
                                    `;
                    $('.replyquestions').show();
                    $('.answerreply').html(html);
                    $('.allquestions').hide();
                })
                

            })

            $('.allques').click(function(){
                $('.replyquestions').hide();
                $('.allquestions').show();
            })



        });

    </script>
@stop

</x-frontend>