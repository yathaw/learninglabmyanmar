<x-backend>

   <!-- <div class="row mb-2 mb-xl-3">
      <div class="col-auto d-none d-sm-block">
         <h3><strong> Course Detail </strong> </h3>
      </div>
   </div>
   <div class="row">
    
      <div class="col-6 col-md-6">  
         <img src="{{asset($course->image)}}" alt="Unsplash" class="img-responsive w-50">
            <h5 class="card-title mb-0 my-2"> {{ $course->title }} </h5>
            <div class="badge bg-success my-2">Finished</div>
      </div>

      <div class="col-6 col-md-6 ">
           
         <p> This Course Includes : </p>
         <p> 
            <i class="align-middle mr-2" data-feather="play-circle"></i>
            <small class="pl-3"> 0 hours on-demand video </small>
         </p>
         <p> 
            <i class="align-middle mr-2" data-feather="file"></i>
            <small class="pl-3"> 0 Articles </small>
         </p>
         <p> 
            <i class="align-middle mr-2" data-feather="check-square"></i>
            <small class="pl-3"> 0 Assignments </small>
         </p>
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
            <img src="{{ asset('backend/img/avatars/avatar-3.jpg') }}" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
            <img src="{{ asset('backend/img/avatars/avatar-2.jpg') }}" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
            <img src="{{ asset('backend/img/avatars/avatar.jpg') }}" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
      </div>
   </div>

         <div class="row my-5">
            <ul class="list-group list-group-flush">
               <li class="list-group-item px-4 pb-4">
                  <p class="mb-2 font-weight-bold">Progress <span class="float-right">100%</span></p>
                  <div class="progress progress-sm">
                     <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                        style="width: 100%;">
                     </div>
                  </div>
               </li>
            </ul>
         </div>
    -->
  

    @php
        $totalDuration = 0;
        $countVideo = 0;
        $countlesson = 0;
        $countassignment = 0;
        $duration = 0;
        foreach ($course->contents as $content) {
            foreach ($content->lessons as $lesson) {
                $type = $lesson['type'];

                if ($type != "MP4") {
                    $countlesson++;
                }

                if ($type == "MP4") {
                    $duration = $lesson['duration'];

                    $countVideo++;
                }

                $totalDuration += $duration++;

            }
            foreach ($content->assignments as $assignment) {
                $countassignment++;
            }

        }
        if ($totalDuration) {
                                
            $dt = Carbon\Carbon::now();
            $days = $dt->diffInDays($dt->copy()->addSeconds($totalDuration));
            $hours = $dt->diffInHours($dt->copy()->addSeconds($totalDuration)->subDays($days));
            $minutes = $dt->diffInMinutes($dt->copy()->addSeconds($totalDuration)->subDays($days)->subHours($hours));

            $totaltimes = Carbon\CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans();
        }
        else{
            $totaltimes = '0 Second';
        }

        $userRole = $course->user->getRoleNames();
        $count_section = count($course->sections);
        $count_content = count($course->contents);



    @endphp

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong> {{ $course->title }} </strong> </h3>
            
            @if($countVideo <= 0 )
                <div class="badge bg-danger my-2">On Hold</div>
            @elseif($course->status > 0)
                <div class="badge bg-success my-2">Published</div>
            @else
                <div class="badge bg-info my-2">In Progress</div>
            @endif

        </div>

        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('panel') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('backside.course.index') }}">List</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> New </li>
                </ol>
            </nav>
        </div>

        <div class="rating mt-3  h3">
            <i class='bx bxs-star custom_primary_Color'></i>
            <i class='bx bxs-star custom_primary_Color'></i>
            <i class='bx bxs-star custom_primary_Color' ></i>
            <i class='bx bxs-star-half custom_primary_Color' ></i>

            <i class='bx bx-star' ></i>

            <small> ( 187,33 Ratings ) </small>

            <small> 100 Students </small>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-md-6">  
                            <div class="video-player card-img-top">
                                <video class="js-player lesson_video_play vidoe-js" data-poster="{{ asset($course->image) }}" controls crossorigin preload="auto" playsinline id="videoarea" style="--plyr-color-main: #f09819;">
                                    <source src="{{ asset($course->video) }}" type="video/mp4"/ >
                                </video>
                            </div>


                            <p class="text-danger mt-3 h2 text-center"> {{$course->price}} Ks  </p> 

                        </div>

                        <div class="col-6 col-md-6 ">

                            <p> {!! $course->subtitle !!} </p>
                            <hr>
               
                            <p> This Course Includes : </p>
                            <p> 
                                <i class="align-middle mr-2" data-feather="play-circle"></i>
                                <small class="pl-3"> {{ $countVideo }}  Videos </small>
                            </p>
                            <p> 
                                <i class="align-middle mr-2" data-feather="file"></i>
                                <small class="pl-3"> {{ $countlesson }} Articles </small>
                            </p>
                            <p> 
                                <i class="align-middle mr-2" data-feather="check-square"></i>
                                <small class="pl-3"> {{ $countassignment }} Assignments </small>
                            </p>
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

                            @php
                                $instructors = $course->instructors;
                            @endphp

                            @if(count($instructors) > 1 )
                                <p> 
                                    <i class="align-middle mr-2" data-feather="users"></i> 
                                    @foreach($instructors as $instructor)
                                        {{ $loop->first ? '' : ', ' }}
                                        <small class="pl-3"> {{ $instructor->user->name }} </small>
                                    @endforeach 
                                </p>

                                <p> 
                                    <i class="align-middle mr-2" data-feather="briefcase"></i> 
                                    
                                    <small class="pl-3"> {{ $instructors[0]->user->company->name }} </small>
                                </p>
                            @else
                            <p> 
                                <i class="align-middle mr-2" data-feather="user"></i> 
                                <small class="pl-3"> {{ $instructors[0]->user->name }} </small>
                            </p>

                            @endif
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="tab">
                                <ul class="nav nav-tabs mb-4 nav-fill" role="tablist">
                                    <li class="nav-item"><a class="nav-link active bg-transparent" href="#tab-1" data-toggle="tab" role="tab"> Description </a></li>
                                    <li class="nav-item"><a class="nav-link bg-transparent" href="#tab-2" data-toggle="tab" role="tab"> Contents </a></li>
                                    <li class="nav-item"><a class="nav-link bg-transparent" href="#tab-3" data-toggle="tab" role="tab"> More Info </a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-1" role="tabpanel">
                                        <h4 class="tab-title"> Desciption </h4>
                                        <p>{!! $course->description !!}</p>
                                        
                                    </div>
                                    <div class="tab-pane" id="tab-2" role="tabpanel">
                                        <h4 class="tab-title"> Contents </h4>

                                        <p class="mt-3"> 
                                            <span class="fontbold"> {{ $count_section }} </span> Sections • 
                                            <span class="fontbold"> {{ $count_content }} </span> Lectures • 
                                            <span class="fontbold"> {{ $totaltimes }} </span> total length 
                                        </p>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="accordion" id="accordionExample">
                                                    @php $i=1; @endphp
                                                    @foreach($sections as $section)
                                                    @if($section->course_id == $course->id)

                                                        @php
                                                            $contentTotal_duration = 0;
                                                            foreach ($section->contents as $contents) {
                                                                foreach ($contents as $content) {
                                                                
                                                                    $type = $lesson['type'];

                                                                    if ($type == "MP4") {
                                                                        $duration = $lesson['duration'];
                                                                    }

                                                                    $contentTotal_duration += $duration++;
                                                                
                                                                }
                                                            }

                                                            if ($contentTotal_duration) {
                                
                                                                $dt = Carbon\Carbon::now();
                                                                $days = $dt->diffInDays($dt->copy()->addSeconds($contentTotal_duration));
                                                                $hours = $dt->diffInHours($dt->copy()->addSeconds($contentTotal_duration)->subDays($days));
                                                                $minutes = $dt->diffInMinutes($dt->copy()->addSeconds($contentTotal_duration)->subDays($days)->subHours($hours));

                                                                $contenttotaltimes = Carbon\CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans();
                                                            }
                                                            else{
                                                                $contenttotaltimes = '0 Second';
                                                            }
                                                        @endphp
                                                    
                                                        <div class="card my-2 border border-warning">
                                                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#row{{$i}}" aria-expanded="false" aria-controls="row{{$i}}">
                                                            <div class="card-header" id="headingOne">
                                                                <h5 class="card-title my-2">    
                                                                    <b class="fontbold"> Section{{$i}}</span> : </b>
                                                                    {{$section->title}}
                                                                    <p class="float-right text-muted"> ( {{ count($section->contents) }} Lectures • {{ $contenttotaltimes }} ) </p>
                                                                    <small class="d-block mt-2">{{$section->objective}}</small>
                                                                </h5>
                                                            </div>
                                                            </a>

                                                            <div id="row{{$i}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <div class="row">

                                                                            @foreach($course->contents as $content)

                                                                            @php
                                                                                # Lesson
                                                                                if ($content->contenttype_id == 1) {
                                                                                    $fileLink = asset($content->lessons[0]->file);
                                                                                    $fileType = $content->lessons[0]->type;
                                                                                    $duration = $content->lessons[0]->duration;
                                                                                }
                                                                                # Assignment
                                                                                else if ($content->contenttype_id == 3) {
                                                                                    $fileLink = asset($content->assignments[0]->file);
                                                                                    $fileType = $content->assignments[0]->type;

                                                                                }
                                                                                # Quizz
                                                                                else{
                                                                                    $fileLink = '';
                                                                                    $fileType = '';

                                                                                }
                                                                                $imgallowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
                                                                                $videoallowedTypes = array('mp4', 'avi', 'mov', 'MP4');

                                                                                if (in_array($fileType, $imgallowedTypes, true )) {
                                                                                    $icon = '<i class="align-middle mr-2" data-feather="image"></i>';
                                                                                }
                                                                                elseif (in_array($fileType, $videoallowedTypes, true )) {
                                                                                    $icon = '<i class="align-middle mr-2" data-feather="play-circle"></i>';
                                                                                }
                                                                                else{
                                                                                    $icon = '<i class="align-middle mr-2" data-feather="file-text"></i>';

                                                                                }


                                                                                if ($duration) {
                                
                                                                                    $dt = Carbon\Carbon::now();
                                                                                    $days = $dt->diffInDays($dt->copy()->addSeconds($duration));
                                                                                    $hours = $dt->diffInHours($dt->copy()->addSeconds($duration)->subDays($days));
                                                                                    $minutes = $dt->diffInMinutes($dt->copy()->addSeconds($duration)->subDays($days)->subHours($hours));

                                                                                    $durationtimes = Carbon\CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans();
                                                                                }
                                                                            @endphp

                                                                            @if($content->section_id  == $section->id)
                                                                                <a href="javascript:void(0)" data-type="{{ $fileType }}" data-link={{ $fileLink }}>
                                                                                    <div class="col-12 my-2">
                                                                                        <div class="card bg-light border">
                                                                                            <div class="card-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-1 d-flex align-items-center justify-content-center text-dark">
                                                                                                        {!! $icon !!}
                                                                                                    </div>
                                                                                                    <div class="col-10">
                                                                                                        <h5 class="d-block"> 
                                                                                                            <b class="fontbold">{{$content->title}}
                                                                                                            </b>

                                                                                                            @if($duration)
                                                                                                            <p class="float-right text-muted"> ( {{ $durationtimes }}  ) </p>
                                                                                                            @endif

                                                                                                            <small class="d-block mt-2">{{$content->description}}</small>     
                                                                                                        </h5>
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            @endif
                                                                            @endforeach
                                                                        </div>
                                                                        {{-- {!! $contents->links() !!} --}}
                                                                    </div>
                                                                </div>

                                                        </div>
                                                    @endif
                                                    @php $i++; @endphp

                                                    @endforeach

                                                </div>

                                            </div>

                                        </div>
                                                                            
                                    </div>
                                    <div class="tab-pane" id="tab-3" role="tabpanel">
                                        <h4 class="tab-title"> What will  Learn </h4>
                                        @php
                                            $data = json_decode($course->outline,true);

                                        @endphp

                                        <ul type="none" class="lh-lg">
                                            @if($data != NULL)
                                            @foreach($data as $result)
                                                <li  class="my-3"> <i class="align-middle mr-2" data-feather="check-square"></i> {{$result}} </li>
                                            @endforeach
                                            @endif
                                        </ul>

                                        <hr>
                                        <h4 class="tab-title"> Requirements For Students </h4>

                                        @php
                                            $data = json_decode( $course->requirements);
                                        @endphp

                                        <ul type="none" class="lh-lg">
                                            @if($data != NULL)
                                            @foreach($data as $result)
                                                <li class="my-3"> <i class="align-middle mr-2" data-feather="check-square"></i> {{$result}} </li>
                                            @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
      
      });
      
      
   </script>
   @stop
</x-backend>