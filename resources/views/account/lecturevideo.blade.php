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
                   
                    <div class="video-player" id="videoplayerDiv">
                        <video class="js-player lesson_video_play vidoe-js" controls crossorigin preload="auto" playsinline id="videoarea" style="--plyr-color-main: #f09819;">
                            <source type="video/mp4"/ >

                        </video>
                    </div>

                    <div class="card" id="quizDiv">
                        <div class="card-body text-center py-5">
                            <h1 class="quizHeader display-4"> Quiz Time! </h1>
                            <hr>
                            
                            <h3 class="card-title text-dark fontbold mt-5"> Welcome to <span class="text-success fontbold fs-2 quizTitle"> </span> Quiz Game! </h3>
                            <p class="card-text my-3"> <span class="quizDescription"></span> The game consists of answering the questions that will apppear as your answer, once you have finished answering, you will get your results. </p>

                            <h3 class="card-title text-dark fontbold my-5 text-uppercase"> Are you Ready ? </h3>
                            

                            <a  class="card-link play-button"> Play Now <i class='bx bxs-chevron-right'></i> </a>
                            
                        </div>

                    </div>

                    <div class="card" id="finishquizDiv">
                        <div class="card-body text-center py-5">
                            <h1 class="quizHeader display-4"> Quiz Time! </h1>
                            <hr>
                            
                            <h3 class="card-title text-dark fontbold mt-5"> You've completed the <span class="text-success fontbold fs-2 quizTitle"> </span> Quiz Game! </h3>
                            <p class="card-text my-5"> You got only <span id="userScoreNo"> </span> out of <span class="totalquestionsNo"> </span> </p>

                            <h3 class="card-title text-dark fontbold my-5 text-uppercase"> You are <span class="fontbold text-success userScore"> </span> right. </h3>
                            

                            <a href="javascript:void(0)" class="card-link viewscore-button"> View Score </a>

                            <a  class="card-link play-button"> Play Again <i class='bx bxs-chevron-right'></i> </a>

                            
                        </div>
                    </div>

                    <div class="card" id="viewscoreDiv">
                        <div class="card-header">
                            <div class="card-title"> 
                                <div class="d-inline-flex p-2 bd-highlight fs-5"> 
                                    <h4 class="fontbold questionTitle"> </h4>
                                </div>
                                <div class="alert alert-warning float-right fs-6 py-1 timeoffwarningDiv" role="alert">
                                    Time Off
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            
                            <div class="choiceList"></div>


                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-12">
                                    <p> <span id="currentquestionNo"></span> of <span class="totalquestionsNo"></span> Questions </p>
                                    
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end col-md-6 col-sm-12 col-12">

                                    <a href="javascript:void(0)" class="btn btn-outline-secondary prevButton">
                                        <i class='bx bxs-chevrons-left' ></i> Prev 
                                    </a>
                                    
                                    <a href="javascript:void(0)" class="btn btn-warning nextButton">
                                        <i class='bx bxs-chevrons-right' ></i> Next 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>



                  <!-- <div class="alert alert-success my-3" id="alertmsg">
                    <p class="" id="msg"></p>
                  </div> -->
                    @if(session()->has('message'))
                        <div class="alert alert-success my-3 msg">
                            <p>{{ session()->get('message') }}</p>
                        </div>
                    @endif
                            
                    <div class="alert alert-warning my-3" role="alert" id="notedownloadDiv">
                        Take Notes
                        <a class="btn btn-light btn-sm float-right" id="notedownloadBtn" download> <i class='bx bx-download'></i> Download </a>
                    </div>

                    <div id="certificatedownloadDiv" class="my-3">
                        <a href="{{route('certificate',$course->id)}}" target="__blank" class="btn btn-info" id="certificatedownload1" data-courseid="{{$course->id}}"> <i class='bx bx-download'></i> Generate Certificate </a>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                    <div class="accordion" id="accordionExample">

                        @foreach($sections as $section_key => $section)

                        @php
                            $totalDuration = 0; $exercise;

                            foreach ($section->contents as $key => $content) {
                                if($content->contenttype_id == 1)
                                {
                                    $duration = $content->lessons[0]->duration;
                                    $totalDuration += $duration++;
                                }

                            }

                            if ($totalDuration) {
                                
                                $dt = Carbon\Carbon::now();
                                $days = $dt->diffInDays($dt->copy()->addSeconds($totalDuration));
                                $hours = $dt->diffInHours($dt->copy()->addSeconds($totalDuration)->subDays($days));
                                $minutes = $dt->diffInMinutes($dt->copy()->addSeconds($totalDuration)->subDays($days)->subHours($hours));

                                $contenttotaltimes = Carbon\CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans();
                            }
                            else{
                                $contenttotaltimes = '0 Second';
                            }


                        @endphp

                        <div class="accordion-item">
                            <div class="accordion-header" id="heading{{ $section->id }}">
                                <button class="accordion-button {{ $section_key != 0 ? 'collapsed' : '' }} px-2" type="button" data-toggle="collapse" data-target="#collapse{{ $section->id }}" aria-expanded="true" aria-controls="collapse{{ $section->id }}">
                                <div class="d-flex flex-column">
                                    <p class="text-left fontbold"> {{$section->title}} </p>
                                    <small class="text-left "> ( {{ count($section->contents) }} Lectures • {{ $contenttotaltimes }} ) </small>
                                </div>

                                </button>
                            </div>
                            <div id="collapse{{ $section->id }}" class="accordion-collapse collapse {{ $section_key == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $section->id }}" data-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul id="playlist" class="lh-lg list-group list-group-flush text-left">
                                        <li class="list-group-item list-group-item-info">
                                            Lecture Video
                                        </li>
                                        @php $i=1; $exercise=0; @endphp
                                        @foreach($section->contents  as $content_key => $content)
                                            @php
                                            if ($content->contenttype_id ==3) {
                                                $exercise =1;
                                            }
                                            @endphp

                                        @if($content->contenttype_id == 1)
                                        @php
                                            # Lesson
                                            

                                                $fileId = $content->lessons[0]->id;
                                                $fileLink = asset($content->lessons[0]->file);
                                                $duration = $content->lessons[0]->duration;

                                                $lessonId = $content->lessons[0]->id;
                                                $notefileLink = asset($content->lessons[0]->file_upload);

                                            
                                            // Learning Video

                                            if ($duration) {
                                
                                                $lessontotaltimes = Carbon\CarbonInterval::seconds($duration)->cascade()->forHumans();
                                            }
                                            else{
                                                $lessontotaltimes = '0 Second';
                                            }

                                            $lesson_status = 1;
                                            foreach($completeLessons as $completeLesson){
                                                if ($completeLesson['lesssonid'] == $lessonId) {
                                                    $lesson_status = 0;
                                                }
                                            }
                                        @endphp

                                        <li fileLink="{{ $fileLink }}" contentId="{{ $content->id }}" fileId="{{ $fileId }}" videoDuration="{{ $duration }}" userId="{{ $user_id }}" notefileLink="{{ $notefileLink }}" contentType="{{ $content->contenttype_id }}" class="list-group-item px-0 {{ $content_key == 0 ? 'li_active' : '' }}">

                                            <div class="row">
                                                <div class="col-2 d-flex align-items-center justify-content-center">
                                                    @if($lesson_status == 0)
                                                        <i class='bx bxs-checkbox-checked fs-2 text-success'></i>
                                                    @else
                                                        <i class='bx bx-square-rounded fs-5'></i>

                                                    @endif
                                                </div>

                                                <div class="col-10">
                                                    <p class="mb-0 chapter{{ $content->id }} {{ $content_key == 0 ? 'text-primary' : '' }}  d-inline-block"> 
                                                        <strong class="fontbold"> Lesson {{ $i++ }} </strong> : {{ $content->title }}   
                                                    </p>
                                                    @if($content->description)
                                                        <p class="text-secondary text-justify lh-sm fst-italic"> {{ $content->description }} </p>
                                                    @endif
                                                </div>
                                            </div>
                                           
                                            @if($duration)
                                            <small class="d-block text-muted float-right"> {{ $lessontotaltimes }}</small>
                                            @endif
                                        </li>

                                        @endif
                                        @endforeach

                                        @php 
                                         @endphp

                                        @if($exercise == 1)
                                        <li class="list-group-item list-group-item-info">
                                            Exercises
                                        </li>

                                        @foreach($section->contents  as $content_key => $content)
                                            @if($content->contenttype_id == 3)
                                            @php
                                                $fileId = $content->lessons[0]->id;
                                                $fileLink = asset($content->lessons[0]->file);
                                                $duration = $content->lessons[0]->duration;

                                                $lessonId = $content->lessons[0]->id;
                                                $notefileLink = asset($content->lessons[0]->file_upload);


                                            @endphp
                                                <li fileLink="{{ $fileLink }}" contentId="{{ $content->id }}" fileId="{{ $fileId }}" videoDuration="{{ $duration }}" userId="{{ $user_id }}" notefileLink="{{ $notefileLink }}" contentType="{{ $content->contenttype_id }}" class="list-group-item {{ $content_key == 0 ? 'li_active' : '' }}">

                                                    {{ $content->title }}
                                                    
                                                </li>
                                            @endif
                                        @endforeach

                                        @endif


                                        @if(count($course->tests) > 0)
                                            <li class="list-group-item list-group-item-info">
                                                Quiz Time
                                            </li>

                                            @foreach($course->tests as $content_key => $test)
                                            @if($test->section_id == $section->id)

                                            @php
                                                if ($test->response) {
                                                    $response = $test->response->id;
                                                }else{
                                                    $response = 0;
                                                }
                                            @endphp
                                            <li contentType="2" testId="{{ $test->id }}" testTitle="{{ $test->title }}" testDescription="{{ $test->description }}" responseId="{{ $response }}"  class="list-group-item {{ $content_key == 0 ? 'li_active' : '' }}">
                                                {{ $test->title }}
                                            </li>
                                            @endif
                                            @endforeach
                                        @endif
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
                                        <a href="javascript:void(0)" class="btn custom_primary_btnColor" id="askquestion" data-toggle="modal" data-target="#askquestionModal"> Ask Question </a>
                                        
                                    </div>
                                    <hr class="mt-3">
                                </div>

                                @if($questions->isEmpty())
                                    <div class="row justify-content-center">
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-10 col-10 py-5">
                                            <svg id="ef672dd0-2e16-4c9d-8107-606b55e40777" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 844.67538 595.26155"><circle cx="431.39281" cy="548" r="46" fill="#f9a826"/><path d="M883.86176,743.78487c25.7345-7.72868,53.09381-15.78786,73.50313-34.161,18.23763-16.41813,30.55024-41.48912,22.99475-66.1115-7.54-24.57187-30.12421-40.95629-53.44165-49.10532-13.225-4.62188-27.06087-7.18608-40.89147-9.20037-15.03485-2.18967-30.13615-3.98373-45.23026-5.71012q-91.67724-10.48563-184.04386-12.811c-30.38456-.76525-60.76358-.74682-91.15243-.3057-27.13937.394-55.72215.38417-80.899-11.15051-19.57846-8.96979-37.348-25.28881-42.8033-46.73352-6.29728-24.75467,5.318-49.96382,21.97993-67.892,8.78265-9.45011,19.04731-17.40385,29.63621-24.71743,11.4874-7.93416,23.37539-15.30643,35.52084-22.18813a494.63414,494.63414,0,0,1,74.7667-34.4685c12.74555-4.63445,25.68047-8.63281,38.72759-12.32143,11.017-3.11469,22.06832-6.23382,32.71588-10.47748,20.58349-8.20371,40.161-22.09985,45.39464-44.88142,4.96024-21.59145-3.40305-45.03067-18.065-61.07057-16.96282-18.557-42.53949-26.69181-67.06007-28.008-27.52842-1.47765-54.42246,5.412-80.29678,14.15585-27.59673,9.326-54.59854,20.04924-82.77827,27.60322a556.95783,556.95783,0,0,1-85.19574,15.83655c-14.08227,1.49951-28.59019,3.19273-42.75626,2.04475-11.87246-.96211-23.68426-4.45375-32.43408-12.87964-7.50252-7.22477-11.97184-17.154-10.4353-27.63238.27909-1.90318,3.17022-1.09407,2.89284.79752-1.8704,12.75513,6.79991,24.50863,17.48415,30.5293,12.34817,6.95832,27.37408,6.9678,41.1218,6.172a537.82528,537.82528,0,0,0,88.51452-12.79561c28.59252-6.53059,56.16382-15.86633,83.70391-25.83908,26.15594-9.47153,52.89665-18.71579,80.84009-20.76729,24.24611-1.78007,49.75165,1.75222,70.87426,14.42313,18.56387,11.136,32.21482,29.70722,36.56451,51.01813,4.25044,20.82462-1.63632,41.785-17.4,56.31714-16.32147,15.04633-38.7007,21.47909-59.55655,27.40368-26.45223,7.51437-52.33726,16.29809-77.39248,27.7031a485.82354,485.82354,0,0,0-72.8001,40.92805c-22.24625,15.20228-44.2007,34.33058-51.23658,61.45126-3.27739,12.63313-2.67227,26.03212,2.8116,37.96461,4.87605,10.60993,12.90656,19.53469,22.26169,26.41853,22.32074,16.42443,50.45266,19.79665,77.41421,20.13212,30.28143.37678,60.56382-.64518,90.85508-.148q92.5988,1.51977,184.81863,11.27265,23.108,2.44594,46.15759,5.40711c13.82158,1.776,27.68967,3.54058,41.27849,6.69464,24.16222,5.60822,47.67389,16.39167,62.69178,36.878a61.31938,61.31938,0,0,1,11.94709,30.44593c1.05134,11.52384-1.76985,23.0693-6.98016,33.32083-11.53233,22.69042-33.13363,37.12286-56.07337,46.60471-12.28683,5.0786-25.03167,8.926-37.7516,12.74609-1.853.55651-2.64487-2.338-.79752-2.89283Z" transform="translate(-177.66231 -152.36922)" fill="#f2f2f2"/><circle cx="125.89281" cy="69.5" r="24" fill="#f2f2f2"/><circle cx="292.39281" cy="115" r="24" fill="#f2f2f2"/><circle cx="433.39281" cy="24" r="24" fill="#f2f2f2"/><circle cx="521.39281" cy="126" r="24" fill="#f2f2f2"/><circle cx="402.39281" cy="244" r="24" fill="#f2f2f2"/><circle cx="251.39281" cy="301" r="24" fill="#f2f2f2"/><circle cx="411.39281" cy="390" r="24" fill="#f2f2f2"/><circle cx="583.39281" cy="440" r="24" fill="#f2f2f2"/><circle cx="784.39281" cy="429" r="24" fill="#f2f2f2"/><path d="M604.12763,220.37264c-71.89185.50782-130.75611,58.92987-131.77735,130.81635-.00946.66369-.01381,5.33048-.01324,11.43422a33.74778,33.74778,0,0,0,33.74387,33.746h.00007a33.76855,33.76855,0,0,0,33.76114-33.79775c-.00343-4.15211-.00551-7.02584-.00551-7.20227a64.00037,64.00037,0,1,1,98.52027,53.8794l.01171.01422s-48.02832,30.91956-62.67089,73.33545l.01245.003a94.00389,94.00389,0,0,0-3.87354,26.76794c0,3.72538.21916,36.32138.64261,62.77767a34.78649,34.78649,0,0,0,34.79009,34.22233h.00007a34.79588,34.79588,0,0,0,34.79384-35.01061c-.14706-24.22912-.22661-52.44168-.22661-54.48939,0-26.04473,25.12525-51.99475,45.76367-68.91741,23.76587-19.48694,40.86792-46.04291,47.73706-75.99909a86.7618,86.7618,0,0,0,2.49927-18.8335A132.75,132.75,0,0,0,604.12763,220.37264Z" transform="translate(-177.66231 -152.36922)" fill="#f9a826"/><path d="M1021.147,747.63078H178.853a1.19069,1.19069,0,0,1,0-2.38137h842.294a1.19068,1.19068,0,0,1,0,2.38137Z" transform="translate(-177.66231 -152.36922)" fill="#3f3d56"/><circle cx="628.44885" cy="242.9959" r="30" fill="#2f2e41"/><polygon points="573.012 582.129 560.753 582.129 554.92 534.841 573.015 534.841 573.012 582.129" fill="#a0616a"/><path d="M551.99554,578.62562h23.64387a0,0,0,0,1,0,0v14.88687a0,0,0,0,1,0,0H537.10868a0,0,0,0,1,0,0v0A14.88686,14.88686,0,0,1,551.99554,578.62562Z" fill="#2f2e41"/><polygon points="668.012 582.129 655.753 582.129 649.92 534.841 668.015 534.841 668.012 582.129" fill="#a0616a"/><path d="M646.99554,578.62562h23.64387a0,0,0,0,1,0,0v14.88687a0,0,0,0,1,0,0H632.10868a0,0,0,0,1,0,0v0A14.88686,14.88686,0,0,1,646.99554,578.62562Z" fill="#2f2e41"/><circle cx="623.88979" cy="248.61007" r="24.56103" fill="#a0616a"/><path d="M816.19123,504.7751l10.98975-25.25a31.38253,31.38253,0,0,0-6.94971-35.6,31.87322,31.87322,0,0,0-3.07031-2.67,30.93522,30.93522,0,0,0-18.98975-6.57,32.179,32.179,0,0,0-13.3999,2.98c-.36035.16-.71.33-1.07031.5-.68994.33-1.36963.69-2.02979,1.06a31.67823,31.67823,0,0,0-15.70019,23.88l-4.8501,40.64c-1.21973,3.19-44.73975,118.39-29.51953,206.34a4.46692,4.46692,0,0,0,3.81982,3.67l15.43018,2.1a4.49661,4.49661,0,0,0,5.00976-3.53l25.89014-123.41a3.50323,3.50323,0,0,1,6.79981-.23l36.58007,129.78a4.47129,4.47129,0,0,0,4.31006,3.28,5.12184,5.12184,0,0,0,.87012-.08l18.84961-3.63a4.471,4.471,0,0,0,3.63037-4.81C850.02131,682.3351,835.3011,527.60512,816.19123,504.7751Z" transform="translate(-177.66231 -152.36922)" fill="#2f2e41"/><path d="M706.10166,421.41909A10.05576,10.05576,0,0,0,716.696,432.6225l13.72894,32.99236,10.385-15.3943-14.62937-28.97a10.11027,10.11027,0,0,0-20.07892.16852Z" transform="translate(-177.66231 -152.36922)" fill="#a0616a"/><path d="M800.19025,537.99553a10.05577,10.05577,0,0,0,8.42651-12.91316l28.88533-21.03846-17.39036-6.51224-24.76387,20.97687a10.11028,10.11028,0,0,0,4.84239,19.487Z" transform="translate(-177.66231 -152.36922)" fill="#a0616a"/><path d="M753.10188,487.61024a17.05692,17.05692,0,0,1-3.29834-.32519,16.30539,16.30539,0,0,1-11.94751-9.61621l-19.23438-23.45313a4.50075,4.50075,0,0,1,1.11109-6.68066l13.68432-8.4707a4.50007,4.50007,0,0,1,6.21533,1.49023l13.5564,22.334L779.15022,443.702A9.72146,9.72146,0,0,1,790.46,459.26356l-25.91186,23.63672A16.25271,16.25271,0,0,1,753.10188,487.61024Z" transform="translate(-177.66231 -152.36922)" fill="#2f2e41"/><path d="M823.252,522.8827c-.03515,0-.07055,0-.10571-.001a4.50783,4.50783,0,0,1-3.31079-1.57031l-12.16626-14.19336a4.49979,4.49979,0,0,1,.92041-6.67286l22.78149-15.1875-20.63842-24.8125a9.721,9.721,0,0,1,14.8872-12.18261l25.0835,24.51269a16.52481,16.52481,0,0,1-3.67529,26.94043l-20.50122,21.75391A4.50742,4.50742,0,0,1,823.252,522.8827Z" transform="translate(-177.66231 -152.36922)" fill="#2f2e41"/><path d="M795.30707,470.58358a4.63212,4.63212,0,0,1-.584-.03711,4.46111,4.46111,0,0,1-3.71045-3.06885l-9.14234-28.02929a3.08255,3.08255,0,0,1,1.594-3.72461l.29663-.14014c.269-.12793.5354-.25439.80737-.37549a32.57412,32.57412,0,0,1,13.603-3.023,31.327,31.327,0,0,1,17.16138,5.15674,3.13007,3.13007,0,0,1,.90136,4.29443L799.08393,468.504A4.45513,4.45513,0,0,1,795.30707,470.58358Z" transform="translate(-177.66231 -152.36922)" fill="#e6e6e6"/><circle cx="652.1011" cy="219.78616" r="9.81668" fill="#2f2e41"/><path d="M796.11115,361.36513h0a26,26,0,0,0-26,25.99994v11.00006h13.5293l6.4707-11,1.94141,11h41.05859l-11-11.00006A26,26,0,0,0,796.11115,361.36513Z" transform="translate(-177.66231 -152.36922)" fill="#2f2e41"/><path d="M834.80883,365.43121a15.15,15.15,0,0,1,16.48081-10.39558c6.256,1.04586,11.20228,6.07455,14.14944,11.69107s4.30806,11.90252,6.28935,17.92793,4.79124,12.08362,9.79306,15.984,12.67721,4.9584,17.58966.94607a20.11809,20.11809,0,0,1-37.47706,7.18124c-2.59206-4.61172-3.26121-10.01684-4.02988-15.251s-1.7674-10.6498-4.86211-14.94043-8.88772-7.09293-13.80374-5.13859Z" transform="translate(-177.66231 -152.36922)" fill="#2f2e41"/><path d="M515.60883,380.40755h0a33.748,33.748,0,0,1-33.74414-33.746c-.00049-6.10376.0039-10.77051.01318-11.4342a131.50724,131.50724,0,0,1,15.35889-59.90875,131.80321,131.80321,0,0,0-25.35889,75.90875c-.00928.66369-.01367,5.33044-.01318,11.4342a33.748,33.748,0,0,0,33.74414,33.746h0A33.77281,33.77281,0,0,0,538.09662,371.817,33.62247,33.62247,0,0,1,515.60883,380.40755Z" transform="translate(-177.66231 -152.36922)" fill="#3f3d56"/><path d="M606.415,291.47848a64.00385,64.00385,0,0,1,55.65918,89.413,63.9972,63.9972,0,1,0-107.42578-66.98523A63.87073,63.87073,0,0,1,606.415,291.47848Z" transform="translate(-177.66231 -152.36922)" fill="#3f3d56"/><path d="M616.79682,590.40755h0a34.78682,34.78682,0,0,1-34.79-34.22235c-.42334-26.45629-.64258-59.0523-.64258-62.77765a94.00389,94.00389,0,0,1,3.87354-26.76794l-.01221-.003a95.069,95.069,0,0,1,5.49414-12.70087,110.04745,110.04745,0,0,0-15.49414,28.70087l.01221.003a94.00389,94.00389,0,0,0-3.87354,26.76794c0,3.72535.21924,36.32136.64258,62.77765a34.78682,34.78682,0,0,0,34.79,34.22235h0a34.80287,34.80287,0,0,0,33.40185-25.04846A34.66005,34.66005,0,0,1,616.79682,590.40755Z" transform="translate(-177.66231 -152.36922)" fill="#3f3d56"/><polygon points="126.541 582.585 138.8 582.584 144.633 535.296 126.538 535.297 126.541 582.585" fill="#ffb8b8"/><path d="M301.576,731.45065H340.1067a0,0,0,0,1,0,0v14.88687a0,0,0,0,1,0,0H316.46283A14.88686,14.88686,0,0,1,301.576,731.45066v0A0,0,0,0,1,301.576,731.45065Z" transform="translate(464.05409 1325.40429) rotate(179.99738)" fill="#2f2e41"/><polygon points="82.541 582.585 94.8 582.584 100.633 535.296 82.538 535.297 82.541 582.585" fill="#ffb8b8"/><path d="M257.576,731.45065H296.1067a0,0,0,0,1,0,0v14.88687a0,0,0,0,1,0,0H272.46283A14.88686,14.88686,0,0,1,257.576,731.45066v0A0,0,0,0,1,257.576,731.45065Z" transform="translate(376.05409 1325.4063) rotate(179.99738)" fill="#2f2e41"/><path d="M270.91659,720.41068l-11.975-.62988a4.6735,4.6735,0,0,1-4.41851-4.967l14.31268-158.46594,65.911,17.78562,6.35023-1.73241L321.23868,712.68583a4.69622,4.69622,0,0,1-4.35816,3.94458l-12.9089.60147a4.67413,4.67413,0,0,1-4.93149-4.79557l2.339-84.19641a1.55813,1.55813,0,0,0-3.0832-.36007L275.739,716.69228a4.64568,4.64568,0,0,1-4.56913,3.7255C271.086,720.41778,271.00154,720.41575,270.91659,720.41068Z" transform="translate(-177.66231 -152.36922)" fill="#2f2e41"/><circle cx="128.74202" cy="249.75879" r="24.56103" fill="#ffb8b8"/><path d="M265.51193,474.28693l2.70056,58.26748.97625,21.19852a4.64221,4.64221,0,0,0,3.07432,4.17534l63.336,22.94342a4.47742,4.47742,0,0,0,1.59954.28045,4.64358,4.64358,0,0,0,4.66371-4.7881L339.2657,471.5969A36.93044,36.93044,0,0,0,308.522,435.91974c-.61263-.09345-1.23592-.18695-1.8592-.27006a36.24947,36.24947,0,0,0-29.165,9.44122,37.23612,37.23612,0,0,0-11.9859,29.196Z" transform="translate(-177.66231 -152.36922)" fill="#ccc"/><path d="M365.85452,569.24512a10.06355,10.06355,0,0,1-5.36877-15.22659l-21.478-28.56,18.53424-1.14707,17.55439,27.29693a10.111,10.111,0,0,1-9.24184,17.63673Z" transform="translate(-177.66231 -152.36922)" fill="#ffb8b8"/><path d="M350.75332,548.85022a4.64437,4.64437,0,0,1-2.54106-2.51848L315.854,469.2374a12.4634,12.4634,0,1,1,22.98438-9.64693l32.3582,77.09534a4.679,4.679,0,0,1-2.50048,6.11822l-14.36542,6.029a4.64165,4.64165,0,0,1-3.57741.01724Z" transform="translate(-177.66231 -152.36922)" fill="#ccc"/><path d="M298.50776,546.13086,329.587,486.62205a4.87826,4.87826,0,0,1,6.57494-2.06344l45.11152,23.5601a4.87826,4.87826,0,0,1,2.06343,6.57494l-31.07927,59.50881a4.87827,4.87827,0,0,1-6.57494,2.06344L300.5712,552.7058A4.87826,4.87826,0,0,1,298.50776,546.13086Z" transform="translate(-177.66231 -152.36922)" fill="#3f3d56"/><path d="M319.35062,518.94278a10.06358,10.06358,0,0,0-15.517-4.46026l-29.77845-19.75406-.05061,18.56963L302.2904,529.21a10.111,10.111,0,0,0,17.06022-10.26718Z" transform="translate(-177.66231 -152.36922)" fill="#ffb8b8"/><path d="M281.7006,523.11883l-24.33677-19.27776a17.16326,17.16326,0,0,1-7.82343-27.13518l22.09715-28.95951a10.096,10.096,0,0,1,17.1296,10.28435l-17.48384,28.6,25.694,12.18686a4.67363,4.67363,0,0,1,1.94814,6.71958l-10.37175,16.41406a4.682,4.682,0,0,1-3.16671,2.1111c-.02565.00448-.05149.00846-.0773.0123A4.69555,4.69555,0,0,1,281.7006,523.11883Z" transform="translate(-177.66231 -152.36922)" fill="#ccc"/><path d="M287.84537,418.57447a2.13479,2.13479,0,0,1,1.85636-2.81905,4.93046,4.93046,0,0,1,3.4761,1.71495,13.8334,13.8334,0,0,0,3.07115,2.63711c1.18812.59889,2.79953.51354,3.47685-.62824.63605-1.07221.20023-2.508-.18482-3.75347a36.90711,36.90711,0,0,1-1.62991-9.77c-.11092-3.70032.41115-7.562,2.45972-10.44807,2.64387-3.72475,7.37142-5.13883,11.84544-5.0363s8.87547,1.48362,13.30713,2.35665c1.52992.30139,3.32826.4555,4.35153-.73025,1.08805-1.26082.68844-3.3014.22563-5.00376-1.20094-4.41743-2.475-8.98461-5.26525-12.55224a18.89839,18.89839,0,0,0-12.06081-6.79014,28.93848,28.93848,0,0,0-13.46236,1.52838,36.09628,36.09628,0,0,0-17.68285,12.3186,29.23592,29.23592,0,0,0-5.57809,21.60019,26.66712,26.66712,0,0,0,9.88579,16.85462Z" transform="translate(-177.66231 -152.36922)" fill="#2f2e41"/><path d="M598.92043,735.14922a45.99375,45.99375,0,0,1-17.07033-71.4888,45.99715,45.99715,0,1,0,62.56892,66.464A45.96919,45.96919,0,0,1,598.92043,735.14922Z" transform="translate(-177.66231 -152.36922)" fill="#3f3d56"/></svg>

                                            <h4 class="mt-5"> Sorry, No Question is found </h4>
                                        </div>
                                    </div>
                                @else

                                <div class="row testimonials allquestions">
            
                                    @foreach($questions as $comm)
                                    <div class="col-12 questionLists">
                                        <div class="testimonial-item" style="min-height: 0">
                                            <a href="javascript:void(0)" class="text-dark commentdescription" data-id="{{$comm->id}}">
                                                <p class="fw-bolder fst-normal fontbold pb-0">
                                                    {!! $comm->title !!}
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
                                        <a href="javascript:void(0)" class="btn btn-outline-primary block allques">Back to All Questions</a>
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

                                @endif

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
                                                    $outlines = json_decode( $course->outline);
                                                    $requirements = json_decode( $course->requirements);

                                                @endphp
                                                @if($outlines != NULL)
                                                <ul type="none" class="lh-lg">
                                                    @foreach($outlines as $outline)
                                                        <li> <i class="icofont-check-alt"></i> {{$outline}} </li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Requirement --}}
                                    @if($requirements != NULL)
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
                                    @endif

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
                                @if(isset($instructors))
                                @if(!$instructors[0]['company_id'])

                                @php
                                    if ($instructors[0]->profile_photo_path != NULL) {
                                        $profile = $instructors[0]->profile_photo_path;
                                    }
                                    else{
                                        $profile = "profiles/user.png";
                                    }

                                @endphp


                                <div class="row team">
                                    <div class="col-xl-9 col-lg-9 col-md-6 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-2">
                                        <h3 class="text-dark fontbold"> {{ $instructors[0]->name }} </h3>
                                        <p> {{ $instructors[0]->instructor->headline }} </p>

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
                                                    <p class="lh-base"> {{ $instructors[0]->instructor->bio }} </p>
                                                </div>
                                            </div>

                                            <button class="expand-toggle btn btn-light text-primary" href="javascript:void(0)">
                                                Show more <i class='bx bxs-chevron-down mr-3' ></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                        <div class="member">
                                            <div class="member-img">
                                                <a href="{{ route('instructor',$instructors[0]->instructor->id) }}">
                                                    <img src="{{ asset($profile) }}" class="img-fluid" alt="">
                                                </a>
                                                <div class="social">
                                                    <a href="{{ $instructors[0]->instructor->twitter }}"><i class="icofont-twitter"></i></a>
                                                    <a href="{{ $instructors[0]->instructor->facebook }}"><i class="icofont-facebook"></i></a>
                                                    <a href="{{ $instructors[0]->instructor->instagram }}"><i class="icofont-instagram"></i></a>
                                                    <a href="{{ $instructors[0]->instructor->linkedin }}"><i class="icofont-linkedin"></i></a>
                                                </div>
                                            </div>
                                            <div class="member-info">
                                                <a href="{{ route('instructor',$instructors[0]->instructor->id) }}">
                                                    <h4>{{ $instructors[0]->name }}</h4>
                                                    <span>{{ $instructors[0]->jobtitle->name }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @else

                                @php
                                    $companyname = $instructors[0]->company->name;
                                    $companylogo = asset($instructors[0]->company->logo);
                                    $companydesc = $instructors[0]->company->description;
                                @endphp
                                <div class="row justify-content-center">
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10 ">
                                        <div class="card mb-3">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <img src="{{ $companylogo }}" class="img-fluid ">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title"> {{ $companyname }}</h5>
                                                        <small class="card-text text-muted"> {{ $companydesc }} </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center team">

                                    <h3 class="mt-5"> Instructors in this course </h3>
                                    <hr>

                                    @foreach($instructors as $row)

                                    @php
                                        if ($row->profile_photo_path != NULL) {
                                            $profile = $row->profile_photo_path;
                                        }
                                        else{
                                            $profile = "profiles/user.png";
                                        }

                                    @endphp

                                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                                        <div class="member">
                                            <div class="member-img">
                                                <a href="{{ route('instructor',$row->instructor->id) }}">
                                                    <img src="{{ asset($profile) }}" class="img-fluid" alt="">
                                                </a>
                                                <div class="social">
                                                    <a href="{{ $row->instructor->twitter }}"><i class="icofont-twitter"></i></a>
                                                    <a href="{{ $row->instructor->facebook }}"><i class="icofont-facebook"></i></a>
                                                    <a href="{{ $row->instructor->instagram }}"><i class="icofont-instagram"></i></a>
                                                    <a href="{{ $row->instructor->linkedin }}"><i class="icofont-linkedin"></i></a>
                                                </div>
                                            </div>
                                            <div class="member-info">
                                                <a href="{{ route('instructor',$row->instructor->id) }}">
                                                    <h4>{{ $row->name }}</h4>
                                                    <span>{{ $row->jobtitle->name }}r</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach


                                </div>

                                @endif
                                @endif

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
                <form action="{{route('questionstore')}}" method="post" id="example-form">
                    @csrf
                    <input type="hidden" name="contentid" value="{{ $course->id }}" id="contentids">
                    <div class="modal-body">

                        <div class="form-floating mb-3 col-md-12">
                            <input type="text" class="form-control" id="subject" placeholder="Title or summary" name="summary">
                            <label for="subject"> Title or Summary </label>
                            <div class="validate"></div>

                        </div>

                        <div class="form-group">
                            <div id="commentId"></div>

                            <textarea class="form-control d-none" id="hiddenArea" name="comment"></textarea>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary sendBtn">Send</button>
                    </div>
                </form>

            </div>
        </div>
    </div> 
  

@section('script_content')
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/plyr/demo.css') }}">
<script src="{{ asset('plugin/plyr/plyr_plugin.js') }}"></script>
<script src="{{ asset('plugin/plyr/default.js') }}"></script>
    <style type="text/css">
        .ql-editor {
            min-height: 250px;
        }
    </style>

    <script type="text/javascript">
        var currentQuestion=0; var quizNo=1;
        var questions; var response; var responsedetails;

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
                // startInterval();
            })
            $('.lesson_video_play').on('pause',function(){

                var lesson_id = currentplayVideo.fileid;
                var duration = currentplayVideo.duration;
                var user_id = currentplayVideo.userid;

                var current_time = this.currentTime;



                // clearInterval(plyrtime);
                // plyrtime = current_time;

                var pause_time = current_time.toFixed(2);
             
                // if(duration == pause_time){
                $.post('/lesson_user',{lesson_id:lesson_id, duration:duration,user_id:user_id},function(res){
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
                        
                        var contentType = $('ul#playlist').find('li.li_active').attr("contentType");

                        if(contentType == 2){
                            $('#videoplayerDiv').hide();
                            $('#notedownloadDiv').hide();
                            $('#quizDiv').show();

                            
                        }else{

                            $('#videoplayerDiv').show();
                            $('#notedownloadDiv').show();
                            $('#quizDiv').hide();
                            $('#finishquizDiv').hide();
                            $('#viewscoreDiv').hide();

                            var fileLink = $('ul#playlist').find('li.li_active').attr('fileLink');
                            var contentId = $('ul#playlist').find('li.li_active').attr('contentId');
                            var videoDuration = $('ul#playlist').find('li.li_active').attr('videoDuration');
                            var userId = $('ul#playlist').find('li.li_active').attr('userId');
                            var fileId = $('ul#playlist').find('li.li_active').attr("fileId");
                            var notefileLink = $('ul#playlist').find('li.li_active').attr("notefileLink");


                            if (notefileLink) {
                                $('#notedownloadDiv').show();
                                $('#notedownloadBtn').attr({'href' : notefileLink});
                            }else{
                                $('#notedownloadDiv').hide();

                            }

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
                    }

                        // console.log("fileLink");

                }

                $("#playlist li").on("click", function() {

                    
                    var contentType = $(this).attr("contentType");

                    if (contentType == 2) {
                        $('#videoplayerDiv').hide();
                        $('#notedownloadDiv').hide();



                        var testId = $(this).attr("testId");
                        var testTitle = $(this).attr("testTitle");
                        var testDescription = $(this).attr("testDescription");
                        var responseId = $(this).attr("responseId");

                        if (responseId > 0) {

                            $('#viewscoreDiv').hide();
                            $('#quizDiv').hide();

                            $.when(getQuestions(responseId)).done(function(a1){
                                $('#finishquizDiv').show();

                                var score = response.score;
                                var ans_count =0;
                                $.each(responsedetails,function(a,b){

                                    var status = b.status;

                                    if (b.check_id > 0) {
                                        ans_count++;
                                    }

                                });

                                console.log(ans_count);
                                $('.userScore').text(score+'% ');
                                $('.totalquestionsNo').text(questions.length);

                                $('#userScoreNo').text(ans_count);
                                
                            });

                            $('a.viewscore-button').attr('responseId',responseId);


                        }else{
                            $('#finishquizDiv').hide();
                            $('#viewscoreDiv').hide();

                            $('#quizDiv').show();

                        }
                        var url="{{route('startquiz',':id')}}";
                        url=url.replace(':id',testId);

                        $('.quizTitle').html(testTitle);
                        $('.quizDescription').html(testDescription);
                        $('a.play-button').attr('href',url);

                        

                    }else{

                        var fileLink = $(this).attr("fileLink");
                        var contentId = $(this).attr("contentId");
                        var videoDuration = $(this).attr("videoDuration");
                        var userId = $(this).attr("userId");
                        var fileId = $(this).attr("fileId");
                        var notefileLink = $(this).attr("notefileLink");
                    
                        $('#videoplayerDiv').show();
                        $('#notedownloadDiv').show();
                        $('#quizDiv').hide();
                        $('#finishquizDiv').hide();
                        $('#viewscoreDiv').hide();

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

                        if (notefileLink) {
                                $('#notedownloadDiv').show();
                                $('#notedownloadBtn').attr({'href' : notefileLink});
                            }else{
                                $('#notedownloadDiv').hide();

                            }
                        
                        currentvideoState(fileId, userId);

                        starttime = $(this).attr('startt');


                        $("#playlist li p").removeClass("text-primary");
                        $("p.chapter"+contentId).addClass("text-primary");

                    }
                });

            })

            $('#finishquizDiv').on('click','.viewscore-button', function()
            {
                var responseId = $(this).attr('responseId');

                viewScore(responseId);

                
            });

            function viewScore(responseId){
                $('#videoplayerDiv').hide();
                $('#notedownloadDiv').hide();
                $('#finishquizDiv').hide();
                $('#quizDiv').hide();


                $.when(getQuestions(responseId)).done(function(a1){
                    $('#viewscoreDiv').show();


                    displayCurrentQuestion();
                });
            }

            function displayCurrentQuestion(){

                if (currentQuestion ==0) {
                    $('.prevButton').hide();
                }else{
                    $('.prevButton').show();
                }
                var question = questions[currentQuestion].question;

                $('.questionTitle').text(quizNo+'. '+question);
                $('#currentquestionNo').text(quizNo);
                $('.totalquestionsNo').text(questions.length);

                var html=''; var response_answers=[];

                var answers = questions[currentQuestion].checks;

                $.each(answers,function (i,v) {                 
                    response_answers.push(v.answer);
                    var checkid = v.id;
                    var mark = v.mark;
                    var rightanswer = v.rightanswer;
                    var quizid = v.quiz_id;

                    var svar; var ans_status;
                    $.each(responsedetails,function(a,b){
                        var response_checkid = b.check_id;
                        var response_quizid = b.quiz_id;

                        var status = b.status;

                        console.log(response_checkid)

                        if (response_checkid == checkid && rightanswer == 'true') {
                            svar = true;
                        }

                        else if (response_checkid == checkid && rightanswer == 'false') {
                            svar = false;
                        }

                        if (response_checkid == 0 && quizid == response_quizid && status == 'timeoff') {
                            ans_status = status;
                        }

                    });
                    

                    if (svar == true) {
                        html += `<div class="rightAns px-2 fs-6 py-3 my-3 border-2 rounded">
                                <span class="ansOption${i}"></span>
                                <i class='bx bx-check-circle float-right fs-3'></i>
                            </div>`;
                    }
                    else if (rightanswer == 'true') {
                        html += `<div class="rightAns px-2 fs-6 py-3 my-3 border-2 rounded">
                            <span class="ansOption${i}"></span>
                            <i class='bx bx-check-circle float-right fs-3'></i>
                        </div>`;
                    }

                    else if (svar == false) {


                        html += `<div class="wrongAns px-2 fs-6 py-3 my-3 border-2 rounded">
                                    <span class="ansOption${i}"></span>
                                    <i class='bx bx-x-circle float-right fs-3'></i>
                                </div> `;
                    }
                    else{
                        html+=`<div class="bg-light px-2 fs-6 py-3 my-3 border-2 rounded">
                            <span class="ansOption${i}"></span>
                        </div>`;
                    }
                    console.log(ans_status);
                    if(ans_status == 'timeoff'){
                        $('.timeoffwarningDiv').show();

                    }else{
                        $('.timeoffwarningDiv').hide();

                    }

                });

                $('.choiceList').html(html);

                $.each(response_answers,function (i,v) {
                    $('span.ansOption'+i).text(v);

                });
            }

            function getQuestions(responseId){
                return  $.ajax({
                    type:'POST',
                    url: "/getscore_byresponseid",
                    data: {responseId:responseId},
                    dataType: 'json',
                    success: (data) => {  
                        questions = data.questions;
                        response = data.response;
                        responsedetails = response.responsedetails;

                    }
                });

            }

            $(this).find(".nextButton").on("click", function () 
            {
                currentQuestion++;
                quizNo++;

                if(currentQuestion >= 1) {
                    $(".prevButton").show();
                }else{
                    $(".prevButton").hide();
                }

                if(currentQuestion == (questions.length)-1) {
                    $(".nextButton").hide();
                }else{
                    $(".nextButton").show();
                }

                if (currentQuestion < questions.length) 
                {
                    displayCurrentQuestion();
                }   
            });

            $(this).find(".prevButton").on("click", function () 
            {
                currentQuestion--;
                quizNo--;

                if(currentQuestion >= 1) {
                    $(".prevButton").show();
                }else{
                    $(".prevButton").hide();
                }

                if (currentQuestion < questions.length) 
                {
                    displayCurrentQuestion();
                }   
            });

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

            $('.replyquestions').hide();

            $('.commentdescription').click(function(){
                var quesid = $(this).data('id');
                var profile = "{{Auth::user()->profile_photo_path}}";

                $.post('/questionreply',{quesid:quesid},function(response){
                    var question_user = response.question[0].user.profile_photo_path;

                    if (question_user) {
                        var question_profile = question_user;
                    }else{
                        var question_profile = `/profiles/user.png`;
                    }
                 
                    var html='';
                    html+=` <div class="row">
                                <div class="offset-md-1 col-md-1 pt-5">
                                    <img src="${question_profile}" class="rounded-circle" width="90px">
                                </div>
                                <div class="col-md-8 pt-5">
                                    <p>${response.question[0].user.name}</p>
                                    <small class="float-right text-muted">${timeSince(response.question[0].created_at)} ago</small>
                                    <p>${response.question[0].description}</p>
                                </div>
                            </div>
                            <p class="pt-5">
                                ${response.answer.length} reply
                            </p>
                            <hr>`;
                    $.each(response.answer,function(i,v){
                        var ans_user = v.user.profile_photo_path;

                        if(ans_user){
                            var ans_profile = '/'+ans_user;
                        }else{
                            var ans_profile = `/profiles/user.png`;
                        }
                        html+=` <div class="row">
                                    <div class="offset-1 col-md-1">
                                        <img src="${ans_profile}" class="rounded-circle" width="90px">
                                    </div>
                                    <div class="col-md-8">
                                        <p>${v.user.name}</p>
                                        <small class="float-right text-muted">${timeSince(v.created_at)} ago</small>
                                        <p>${v.description}</p>
                                            </div>
                                    </div>
                                    <hr> `;
                    })

                    html+=`<div class="row">
                                    <div class="col-md-1">`;
                                    if(profile){

                                        html+=`<img src="${profile}" class="rounded-circle" width="70px">`;
                                    }else{
                                        html+=`<img src="{{ asset('frontend/img/testimonials/testimonials-5.jpg') }}" class="rounded-circle" width="70px">`;
                                    }
                                    html+=`</div>
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
            });

            $('[data-toggle="tooltip"]').tooltip();

            var toolbarOptions = [
                [{ 'font': [] }],
                [{ 'header': [1, 2, 3, 4, 5, 6] }],
                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                ['link', 'image'],
                ['code-block'],

                [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent                

                [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            

            ];

            var quill = new Quill('#commentId', {
                modules: {
                    toolbar: toolbarOptions
                  },
                theme: 'snow',
                placeholder: 'Explain your current problem.',
            });

            var form = $("#example-form");

            $('#askquestionModal').on("click",".sendBtn", function(e){ 

                var about = document.querySelector('textarea[name=comment]');

                var quillData = quill.getContents();
                var quillText = quill.getText();
                var quillHtml = quill.root.innerHTML.trim();

                about.value =  quillHtml;

                form.submit();

            });

            $('#alertmsg').hide();

            $('#certificatedownload').click(function(){
                var courseid = $(this).data('courseid');
                $.get('/certificate/'+courseid,function(response){
                    console.log(response);
                    /*$('#msg').html(response);
                    $('#alertmsg').show();*/
                })
            })


            $('.msg').hide(1000000);

        });

    </script>
@stop

</x-frontend>