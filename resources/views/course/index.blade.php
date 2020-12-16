<x-backend>
    @php 
        $count = count($courses);
        $total = count($allcourses);
        
    @endphp

    @if ($courses == '')
        <img src="{{asset('externalphoto/nocourse.gif')}}">

    @else


    <div class="row">
        <div class="col-auto d-none d-sm-block">
            <h3 class="d-inline-block"><strong> Course List </strong> </h3> <p> Showing {{$count}} of {{$total}} Results  </p> 
        </div>
        <div class="col-auto ml-auto text-right mt-n1">
            <a href="{{ route('backside.course.create') }}" class="btn custom_primary_btnColor float-right" ><i class="align-middle fas fa-plus"></i> Add New Course </a>
        </div>
    </div>

    <div class="row mb-4 justify-content-center">
        <div class="col-auto d-none d-sm-block ">
            <div class="searchInputWrapper  mr-4">
                <input class="searchInput" type="text" placeholder='Focus here to search courses' data-user_id = "{{Auth::id()}}" @if(Auth::user() && Auth::user()->instructor) data-instructor = "{{Auth::user()->instructor->id}}" @endif>
                <i class="searchInputIcon align-middle mr-2" data-feather="search"></i>
            </div>

            
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">



    @foreach($courses as $course)

    @php
        $totalDuration = 0;
        $countVideo = 0;
        $countlesson = 0;
        $countassignment = 0;
        foreach ($course->contents as $content) {
            foreach ($content->lessons as $lesson) {
                $duration = $lesson['duration'];
                $type = $lesson['type'];
                if ($type != "MP4") {
                    $countlesson++;
                }
                if ($type == "MP4") {
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
    @endphp
     
    <div class="col-12 col-md-6 col-lg-3">
        <div class="card h-100">
            {{-- <img class="card-img-top backendCoursecard" src="{{asset($course->image)}}" alt="Unsplash"> --}}
            <div class="card-header px-4 pt-4">
                <div class="card-actions float-right">
                    <div class="dropdown show">
                         <a href="#" data-toggle="dropdown" data-display="static">
                         <i class="align-middle" data-feather="more-horizontal"></i>
                         </a>
                         <div class="dropdown-menu dropdown-menu-right">
                            @if($userRole[0] == 'Admin')
                            <a class="dropdown-item text-success fw-bolder" href="{{ route('backside.sectionlist',$course->id) }}" data-toggle="tooltip" data-placement="top" title="Course မှာပါမည့် Lesson တွေထည့်သိမ်းရန်"> 
                            <i class="align-middle mr-2" data-feather="file-plus"></i> 
                            Add Course Content 
                            </a>
                            @elseif(!in_array($role[0], array('Admin','Developer'), true ))
                            <a class="dropdown-item text-success fw-bolder" href="{{ route('backside.sectionlist',$course->id) }}" data-toggle="tooltip" data-placement="top" title="Course မှာပါမည့် Lesson တွေထည့်သိမ်းရန်"> 
                            <i class="align-middle mr-2" data-feather="file-plus"></i> 
                            Add Course Content 
                            </a>
                            @endif

                            @if($course->status == 0)
                                @if(in_array($role[0], array('Admin','Developer'), true ) && $userRole[0] != 'Admin')
                                    <a class="dropdown-item text-success fw-bolder" href="{{ route('backside.sectionlist',$course->id) }}" data-toggle="tooltip" data-placement="top" title="Course ကို Public ချပြရန် ခွင့်ပြုပါမည်"> 
                                    <i class="align-middle mr-2" data-feather="check"></i> 
                                    Approve
                                    </a>
                                @endif
                            @endif

                            <a class="dropdown-item text-info fw-bolder" href="{{ route('backside.course.show',$course->id) }}" data-toggle="tooltip" data-placement="top" title="အသေးစိတ်ကြည့်ရန်"> 
                            <i class="align-middle mr-2" data-feather="info"></i> Detail 
                            </a>
                            @if($userRole[0] == 'Admin')
                                <a class="dropdown-item text-warning fw-bolder" href="{{ route('backside.course.edit',$course->id) }}" data-toggle="tooltip" data-placement="top" title="ပြန်လည်ပြင်ဆင်မည်"> 
                                    <i class="align-middle mr-2" data-feather="edit-2"></i> Edit 
                                </a>
                            @elseif(!in_array($role[0], array('Admin','Developer'), true ))
                                <a class="dropdown-item text-warning fw-bolder" href="{{ route('backside.course.edit',$course->id) }}" data-toggle="tooltip" data-placement="top" title="ပြန်လည်ပြင်ဆင်မည်"> 
                                    <i class="align-middle mr-2" data-feather="edit-2"></i> Edit 
                                </a>
                            @endif
                          
                            <form method="post" action="{{ route('backside.course.destroy',$course->id) }}" class="" onsubmit="return confirm('Are you Sure want to Delete?')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-light text-danger btn-sm dropdown-item text-left" data-toggle="tooltip" data-placement="top" title="ဖျက်စီးမည်" type="submit"> 
                                   <i class="align-middle mr-2" data-feather="x"></i> Remove 
                                </button>
                             </form>
                         </div>
                    </div>
                </div>
               <h5 class="card-title mb-0 fontbold"> {{ $course->title }} </h5>
                @if($countVideo <= 0 )
                    <div class="badge bg-danger my-2">On Hold</div>
                @elseif($course->status > 0)
                    <div class="badge bg-success my-2">Published</div>
                @else
                    <div class="badge bg-info my-2">In Progress</div>
                @endif

            </div>
            <div class="card-body px-4 pt-2">
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
            <ul class="list-group list-group-flush">
                <li class="list-group-item px-4 pb-4">

                    @if($countVideo <= 0 )

                    <p class="mb-2 font-weight-bold">Progress <span class="float-right">0%</span></p>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                            style="width: 0%;">
                        </div>
                    </div>

                    @elseif($countVideo == 7 )

                    <p class="mb-2 font-weight-bold">Progress <span class="float-right">20%</span></p>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                            style="width: 20%;">
                        </div>
                    </div>

                    @elseif($course->status > 0)

                    <p class="mb-2 font-weight-bold">Progress <span class="float-right">100%</span></p>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                        style="width: 100%;">
                        </div>
                    </div>

                    @else

                    <p class="mb-2 font-weight-bold">Progress <span class="float-right">75%</span></p>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                            style="width: 75%;">
                        </div>
                    </div>

                    @endif

                </li>
            </ul>
        </div>
    </div>
    @endforeach

   </div>
   <div class="row mt-3">
        <div class="col-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {!! $courses->links() !!}
                </ul>
            </nav>
        </div>
   </div>
   @endif
   @section('script_content')
   <script type="text/javascript">
      $(document).ready(function() {
      
        $('#listTable').DataTable();

        //ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.searchInput').keyup(function(){
            var search_data = $(this).val();
            var user_id = $(this).data('user_id');
            var instructor_data = $(this).data('instructor');
            // alert(instructor);
            var style = "";
            var html = "";
            var instructor = "";
            var heart = false;
            var sale =  new Array();

            $.post("{{route('courses_search')}}",{data:search_data},function(data){
                console.log(data);
                if(data){
                    $.each(data,function(i,v){
                        
                        html+=`<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card courseCard h-100 border-0">
                                <div class="card-img-wrapper">
                                    <a href="{{route('course',':id')}}">
                                        <img src="${v.image}" class="card-img-top" alt="...">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <a href="{{route('course',':course_id')}}" class="text-decoration-none text-muted">
                                            <h4 class="fontbold text-dark"> ${v.title} </h4>
                                        </a>`;



                                        

                    });
                    
                    $('.searchcourseshow').html(html);
                }
            })
            
            
        })
      
      });
      
      
   </script>
   @stop
</x-backend>