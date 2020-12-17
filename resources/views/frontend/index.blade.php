<x-frontend>

    <!-- ======= Current Course Section ======= -->

    <section class="currentCourse section-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3> Newest Courses</h3>


                    {{-- <div class="carousel-wrap"> --}}
                        <div class="owl-carousel mt-5">
                            
                            @foreach($newest_courses as $newest_course)

                            <div class="item">
                                <div class="card courseCard h-100 border-0">
                                    <div class="card-img-wrapper">
                                        <a href="{{route('course',$newest_course->id)}}">
                                            <img src="{{ asset($newest_course->image) }}" class="card-img-top" alt="...">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <a href="{{route('course',$newest_course->id)}}" class="text-decoration-none text-muted">
                                                <h4 class="fontbold text-dark"> {{$newest_course->title}}</h4>
                                            </a>
                                            
                                        @php 
                                            $array = array();

                                        @endphp
                                        
                                        {{-- nyi --}}
                                        {{-- check auth --}}
                                        @if(Auth::user())

                                        @if(!Auth::user()->company)

                                        {{-- check course instructor --}}
                                        @if(count($newest_course->instructors) == 0)

                                            @php
                                                array_push($array, "true");
                                            @endphp
                                        @endif
                                        {{-- end check course instructor --}}


                                        {{-- check auth instructor --}}
                                        @if(Auth::user()->instructor)


                                        @foreach($newest_course->instructors as $instructor)

                                            @if($instructor->pivot->instructor_id != Auth::user()->instructor->id)

                                                @php
                                                    array_push($array, "true");
                                                @endphp
    

                                            @endif


                                        @endforeach


                                        {{-- check auth instructor --}}

                                        @else
                                        
                                        <a class="favouriteBtn one
                                        @foreach($wishlists as $wishlist)
                                        @if($wishlist->course_id == $newest_course->id && Auth::id() == $wishlist->user_id)

                                            active

                                        @endif 
                                        @endforeach
                                        mobile button--secondary float-right wishlist" data-course_id = "{{$newest_course->id}}">
                                            <div class="btn__effect">
                                                <svg width="515.99" height="480.73" class="heart-stroke icon-svg icon-svg--size-4 icon-svg--color-silver" viewBox="20 18 29 28" aria-hidden="true" focusable="false"><path d="M28.3 21.1a4.3 4.3 0 0 1 4.1 2.6 2.5 2.5 0 0 0 2.3 1.7c1 0 1.7-.6 2.2-1.7a3.7 3.7 0 0 1 3.7-2.6c2.7 0 5.2 2.7 5.3 5.8.2 4-5.4 11.2-9.3 15a2.8 2.8 0 0 1-2 1 3.4 3.4 0 0 1-2.2-1c-9.6-10-9.4-13.2-9.3-15 0-1 .6-5.8 5.2-5.8m0-3c-5.3 0-7.9 4.3-8.2 8.5-.2 3.2.4 7.2 10.2 17.4a6.3 6.3 0 0 0 4.3 1.9 5.7 5.7 0 0 0 4.1-1.9c1.1-1 10.6-10.7 10.3-17.3-.2-4.6-4-8.6-8.4-8.6a7.6 7.6 0 0 0-6 2.7 8.1 8.1 0 0 0-6.2-2.7z"></path></svg>
                                                <svg class="heart-full icon-svg icon-svg--size-4 icon-svg--color-blue" viewBox="0 0 19.2 18.5" aria-hidden="true" focusable="false"><path d="M9.66 18.48a4.23 4.23 0 0 1-2.89-1.22C.29 10.44-.12 7.79.02 5.67.21 2.87 1.95.03 5.42.01c1.61-.07 3.16.57 4.25 1.76A5.07 5.07 0 0 1 13.6 0c2.88 0 5.43 2.66 5.59 5.74.2 4.37-6.09 10.79-6.8 11.5-.71.77-1.7 1.21-2.74 1.23z"></path></svg>
                                                <svg class="broken-heart" xmlns="http://www.w3.org/2000/svg" width="48" height="16" viewBox="5.707 17 48 16"><g fill="#F48FB1">
                                                <path class="broken-heart--left" d="M29.865 32.735V18.703a4.562 4.562 0 0 0-3.567-1.476c-2.916.017-4.378 2.403-4.538 4.756-.118 1.781.227 4.006 5.672 9.737a3.544 3.544 0 0 0 2.428 1.025l-.008-.008.013-.002z"/>
                                                <path class="broken-heart--right" d="M37.868 22.045c-.135-2.588-2.277-4.823-4.697-4.823a4.258 4.258 0 0 0-3.302 1.487l-.004-.003v14.035a3.215 3.215 0 0 0 2.289-1.033c.598-.596 5.882-5.99 5.714-9.663z"/></g>
                                                <path class="broken-heart--crack" fill="none" stroke="#FFF" stroke-miterlimit="10" d="M29.865 18.205v14.573"/></svg>
                                                
                                                <div class="effect-group">
                                                    <span class="effect"></span>
                                                    <span class="effect"></span>
                                                    <span class="effect"></span>
                                                    <span class="effect"></span>
                                                    <span class="effect"></span>
                                                </div>
                                            </div>
                                        </a>
                                        @endif
                                        {{-- check auth instructor --}}

                                        
                                        {{-- check data array --}}
                                        @if($array)

                                            <a class="favouriteBtn one
                                            @foreach($wishlists as $wishlist)
                                            @if($wishlist->course_id == $newest_course->id && Auth::id() == $wishlist->user_id)

                                                active

                                            @endif 
                                            @endforeach
                                            mobile button--secondary float-right wishlist" data-course_id = "{{$newest_course->id}}">
                                                <div class="btn__effect">
                                                    <svg width="515.99" height="480.73" class="heart-stroke icon-svg icon-svg--size-4 icon-svg--color-silver" viewBox="20 18 29 28" aria-hidden="true" focusable="false"><path d="M28.3 21.1a4.3 4.3 0 0 1 4.1 2.6 2.5 2.5 0 0 0 2.3 1.7c1 0 1.7-.6 2.2-1.7a3.7 3.7 0 0 1 3.7-2.6c2.7 0 5.2 2.7 5.3 5.8.2 4-5.4 11.2-9.3 15a2.8 2.8 0 0 1-2 1 3.4 3.4 0 0 1-2.2-1c-9.6-10-9.4-13.2-9.3-15 0-1 .6-5.8 5.2-5.8m0-3c-5.3 0-7.9 4.3-8.2 8.5-.2 3.2.4 7.2 10.2 17.4a6.3 6.3 0 0 0 4.3 1.9 5.7 5.7 0 0 0 4.1-1.9c1.1-1 10.6-10.7 10.3-17.3-.2-4.6-4-8.6-8.4-8.6a7.6 7.6 0 0 0-6 2.7 8.1 8.1 0 0 0-6.2-2.7z"></path></svg>
                                                    <svg class="heart-full icon-svg icon-svg--size-4 icon-svg--color-blue" viewBox="0 0 19.2 18.5" aria-hidden="true" focusable="false"><path d="M9.66 18.48a4.23 4.23 0 0 1-2.89-1.22C.29 10.44-.12 7.79.02 5.67.21 2.87 1.95.03 5.42.01c1.61-.07 3.16.57 4.25 1.76A5.07 5.07 0 0 1 13.6 0c2.88 0 5.43 2.66 5.59 5.74.2 4.37-6.09 10.79-6.8 11.5-.71.77-1.7 1.21-2.74 1.23z"></path></svg>
                                                    <svg class="broken-heart" xmlns="http://www.w3.org/2000/svg" width="48" height="16" viewBox="5.707 17 48 16"><g fill="#F48FB1">
                                                    <path class="broken-heart--left" d="M29.865 32.735V18.703a4.562 4.562 0 0 0-3.567-1.476c-2.916.017-4.378 2.403-4.538 4.756-.118 1.781.227 4.006 5.672 9.737a3.544 3.544 0 0 0 2.428 1.025l-.008-.008.013-.002z"/>
                                                    <path class="broken-heart--right" d="M37.868 22.045c-.135-2.588-2.277-4.823-4.697-4.823a4.258 4.258 0 0 0-3.302 1.487l-.004-.003v14.035a3.215 3.215 0 0 0 2.289-1.033c.598-.596 5.882-5.99 5.714-9.663z"/></g>
                                                    <path class="broken-heart--crack" fill="none" stroke="#FFF" stroke-miterlimit="10" d="M29.865 18.205v14.573"/></svg>
                                                    
                                                    <div class="effect-group">
                                                        <span class="effect"></span>
                                                        <span class="effect"></span>
                                                        <span class="effect"></span>
                                                        <span class="effect"></span>
                                                        <span class="effect"></span>
                                                    </div>
                                                </div>
                                            </a>

                                        @endif
                                        {{-- end check data array --}}
                                        @endif
                                        {{-- endid check auth --}}
                                        @endif
                                        {{-- nyi --}}

                                            <p class="card-text fst-italic text-muted">
                                                
                                                @foreach($newest_course->instructors as $instructor)
                                                    {{$instructor->user->name}}
                                                    @php
                                                        $instructor = $instructor->user->name;
                                                    @endphp
                                                @endforeach
                                            </p>

                                            <div class="rating">
                                                <i class='bx bxs-star custom_primary_Color'></i>
                                                <i class='bx bxs-star custom_primary_Color'></i>
                                                <i class='bx bxs-star custom_primary_Color' ></i>
                                                <i class='bx bxs-star-half custom_primary_Color' ></i>

                                                <i class='bx bx-star' ></i>
                                            </div>

                                            <div class="price">
                                                <span class="text-danger fs-5"> {{$newest_course->price}} Ks  </span> 

                                                {{-- <span class="text-decoration-line-through text-muted"> 50,000 Ks </span> --}}

                                                <i class='bx bxs-purchase-tag text-danger' ></i>
                                            </div>

                                        </div>
                                        

                                        <div class="card-content">
                                            <small class="card-text text-muted" >

                                                {{-- {!! $newest_course->subtitle !!} --}}
                                                {!! \Illuminate\Support\Str::limit($newest_course->subtitle, 80) !!}
                                            </small>
                                            
                                            <div class="d-grid gap-2 col-6 mx-auto">
                                            @if(Auth::user() && Auth::user()->getRoleNames()[0] != "Business")
                                            @if(!Auth::user()->company)

                                            @if(Auth::user()->sales)



                                            @php
                                                $pending_array = array();
                                                $purched_array = array();
                                                $count_sale = count(Auth::user()->sales);
                                            @endphp

                                                @if($count_sale > 0)
                                                    @foreach(Auth::user()->sales as $sales)
                                                        @foreach($sales->courses as $course_sale)
                                                        

                                                            @if($course_sale->pivot->course_id == $newest_course->id && $course_sale->pivot->status == 0)

                                                                @php
                                                                    array_push($pending_array, 'true')
                                                                @endphp

                                                                <button disabled="disabled" class="btn custom_primary_btnColor mt-3">Pending</button>

                                                            @elseif($course_sale->pivot->course_id == $newest_course->id && $course_sale->pivot->status == 1)
                                                                @php
                                                                    array_push($purched_array, 'true')
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                        @if($purched_array)
                                                             <a href="{{route('lecture',$newest_course->id)}}" class="btn custom_primary_btnColor mt-3">Go to Course</a>
                                                        @endif


                                                @endif
                                            @endif

                                                

                                            @foreach($newest_course->instructors as $instructor)
                                                @if(Auth::user()->instructor)


                                                    @if($instructor->pivot->instructor_id != Auth::user()->instructor->id && !$purched_array && !$pending_array)


                                                        <a href="javascript:void(0)" class="btn custom_primary_btnColor mt-3 addtocart"
                                                        data-id="{{$newest_course->id}}" data-course_title="{{$newest_course->title}}" data-instructor = "{{$instructor}}" data-user_id = "{{Auth::id()}}" data-price = "{{$newest_course->price}}" data-image = "{{$newest_course->image}}"
                                                            {{-- for wishlist --}}
                                                            @foreach($wishlists as $wishlist)
                                                            @if($wishlist->course_id == $newest_course->id && Auth::id() == $wishlist->user_id)

                                                            data-wishlist = "save"

                                                            @endif 
                                                            @endforeach
                                                            
                                                            >
                                                        Purchase
                                                        </a>
                                                   
                                                    @endif
                                                    @elseif(!$purched_array && !$pending_array)
                                                        <a href="javascript:void(0)" class="btn custom_primary_btnColor mt-3 addtocart"
                                                        data-id="{{$newest_course->id}}" data-course_title="{{$newest_course->title}}" data-instructor = "{{$instructor}}" data-user_id = "{{Auth::id()}}" data-price = "{{$newest_course->price}}" data-image = "{{$newest_course->image}}"
                                                            {{-- for wishlist --}}
                                                            @foreach($wishlists as $wishlist)
                                                            @if($wishlist->course_id == $newest_course->id && Auth::id() == $wishlist->user_id)

                                                            data-wishlist = "save"

                                                            @endif 
                                                            @endforeach
                                                            
                                                            >
                                                        Purchase
                                                        </a>
                                                    

                                                @endif
                                            @endforeach



                                            
                                            @else
                                                <button disabled="disabled" class="btn custom_primary_btnColor mt-3">Purchase</button>
                                            @endif
                                            @endif


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- End Current Course Section -->

    <!-- ======= Current Course Section ======= -->

    <section class="currentCourse">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3> Top Courses</h3>


                    {{-- <div class="carousel-wrap"> --}}
                        <div class="owl-carousel mt-5">
                            
                            @foreach($top_courses as $top_course)

                            <div class="item">
                                <div class="card courseCard h-100 border-0">
                                    <div class="card-img-wrapper">
                                        <a href="{{route('course',$top_course->id)}}">
                                            <img src="{{ asset($top_course->image) }}" class="card-img-top" alt="...">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <a href="{{route('course',$top_course->id)}}" class="text-decoration-none text-muted">
                                                <h4 class="fontbold text-dark"> {{$top_course->title}}</h4>
                                            </a>
                                            
                                            @php 
                                            $array = array();
                                            @endphp
                                            
                                            {{-- nyi --}}
                                            {{-- check auth --}}
                                            @if(Auth::user())

                                            @if(!Auth::user()->company)

                                            {{-- check course instructor --}}
                                            @if(count($top_course->instructors) == 0)

                                                @php
                                                    array_push($array, "true");
                                                @endphp
                                            @endif
                                            {{-- end check course instructor --}}


                                            {{-- check auth instructor --}}
                                            @if(Auth::user()->instructor)


                                            @foreach($top_course->instructors as $instructor)

                                                @if($instructor->pivot->instructor_id != Auth::user()->instructor->id)

                                                    @php
                                                        array_push($array, "true");
                                                    @endphp
        

                                                @endif


                                            @endforeach


                                            {{-- check auth instructor --}}

                                            @else
                                            
                                            <a class="favouriteBtn one
                                            @foreach($wishlists as $wishlist)

                                            @if($wishlist->course_id == $top_course->id && Auth::id() == $wishlist->user_id)

                                                active

                                            @endif 
                                            @endforeach
                                            mobile button--secondary float-right wishlist" data-course_id = "{{$top_course->id}}">
                                                <div class="btn__effect">
                                                    <svg width="515.99" height="480.73" class="heart-stroke icon-svg icon-svg--size-4 icon-svg--color-silver" viewBox="20 18 29 28" aria-hidden="true" focusable="false"><path d="M28.3 21.1a4.3 4.3 0 0 1 4.1 2.6 2.5 2.5 0 0 0 2.3 1.7c1 0 1.7-.6 2.2-1.7a3.7 3.7 0 0 1 3.7-2.6c2.7 0 5.2 2.7 5.3 5.8.2 4-5.4 11.2-9.3 15a2.8 2.8 0 0 1-2 1 3.4 3.4 0 0 1-2.2-1c-9.6-10-9.4-13.2-9.3-15 0-1 .6-5.8 5.2-5.8m0-3c-5.3 0-7.9 4.3-8.2 8.5-.2 3.2.4 7.2 10.2 17.4a6.3 6.3 0 0 0 4.3 1.9 5.7 5.7 0 0 0 4.1-1.9c1.1-1 10.6-10.7 10.3-17.3-.2-4.6-4-8.6-8.4-8.6a7.6 7.6 0 0 0-6 2.7 8.1 8.1 0 0 0-6.2-2.7z"></path></svg>
                                                    <svg class="heart-full icon-svg icon-svg--size-4 icon-svg--color-blue" viewBox="0 0 19.2 18.5" aria-hidden="true" focusable="false"><path d="M9.66 18.48a4.23 4.23 0 0 1-2.89-1.22C.29 10.44-.12 7.79.02 5.67.21 2.87 1.95.03 5.42.01c1.61-.07 3.16.57 4.25 1.76A5.07 5.07 0 0 1 13.6 0c2.88 0 5.43 2.66 5.59 5.74.2 4.37-6.09 10.79-6.8 11.5-.71.77-1.7 1.21-2.74 1.23z"></path></svg>
                                                    <svg class="broken-heart" xmlns="http://www.w3.org/2000/svg" width="48" height="16" viewBox="5.707 17 48 16"><g fill="#F48FB1">
                                                    <path class="broken-heart--left" d="M29.865 32.735V18.703a4.562 4.562 0 0 0-3.567-1.476c-2.916.017-4.378 2.403-4.538 4.756-.118 1.781.227 4.006 5.672 9.737a3.544 3.544 0 0 0 2.428 1.025l-.008-.008.013-.002z"/>
                                                    <path class="broken-heart--right" d="M37.868 22.045c-.135-2.588-2.277-4.823-4.697-4.823a4.258 4.258 0 0 0-3.302 1.487l-.004-.003v14.035a3.215 3.215 0 0 0 2.289-1.033c.598-.596 5.882-5.99 5.714-9.663z"/></g>
                                                    <path class="broken-heart--crack" fill="none" stroke="#FFF" stroke-miterlimit="10" d="M29.865 18.205v14.573"/></svg>
                                                    
                                                    <div class="effect-group">
                                                        <span class="effect"></span>
                                                        <span class="effect"></span>
                                                        <span class="effect"></span>
                                                        <span class="effect"></span>
                                                        <span class="effect"></span>
                                                    </div>
                                                </div>
                                            </a>
                                            @endif
                                            {{-- check auth instructor --}}

                                            
                                            {{-- check data array --}}
                                            @if($array)

                                                <a class="favouriteBtn one
                                                @foreach($wishlists as $wishlist)
                                                @if($wishlist->course_id == $top_course->id && Auth::id() == $wishlist->user_id)

                                                    active

                                                @endif 
                                                @endforeach
                                                mobile button--secondary float-right wishlist" data-course_id = "{{$top_course->id}}">
                                                    <div class="btn__effect">
                                                        <svg width="515.99" height="480.73" class="heart-stroke icon-svg icon-svg--size-4 icon-svg--color-silver" viewBox="20 18 29 28" aria-hidden="true" focusable="false"><path d="M28.3 21.1a4.3 4.3 0 0 1 4.1 2.6 2.5 2.5 0 0 0 2.3 1.7c1 0 1.7-.6 2.2-1.7a3.7 3.7 0 0 1 3.7-2.6c2.7 0 5.2 2.7 5.3 5.8.2 4-5.4 11.2-9.3 15a2.8 2.8 0 0 1-2 1 3.4 3.4 0 0 1-2.2-1c-9.6-10-9.4-13.2-9.3-15 0-1 .6-5.8 5.2-5.8m0-3c-5.3 0-7.9 4.3-8.2 8.5-.2 3.2.4 7.2 10.2 17.4a6.3 6.3 0 0 0 4.3 1.9 5.7 5.7 0 0 0 4.1-1.9c1.1-1 10.6-10.7 10.3-17.3-.2-4.6-4-8.6-8.4-8.6a7.6 7.6 0 0 0-6 2.7 8.1 8.1 0 0 0-6.2-2.7z"></path></svg>
                                                        <svg class="heart-full icon-svg icon-svg--size-4 icon-svg--color-blue" viewBox="0 0 19.2 18.5" aria-hidden="true" focusable="false"><path d="M9.66 18.48a4.23 4.23 0 0 1-2.89-1.22C.29 10.44-.12 7.79.02 5.67.21 2.87 1.95.03 5.42.01c1.61-.07 3.16.57 4.25 1.76A5.07 5.07 0 0 1 13.6 0c2.88 0 5.43 2.66 5.59 5.74.2 4.37-6.09 10.79-6.8 11.5-.71.77-1.7 1.21-2.74 1.23z"></path></svg>
                                                        <svg class="broken-heart" xmlns="http://www.w3.org/2000/svg" width="48" height="16" viewBox="5.707 17 48 16"><g fill="#F48FB1">
                                                        <path class="broken-heart--left" d="M29.865 32.735V18.703a4.562 4.562 0 0 0-3.567-1.476c-2.916.017-4.378 2.403-4.538 4.756-.118 1.781.227 4.006 5.672 9.737a3.544 3.544 0 0 0 2.428 1.025l-.008-.008.013-.002z"/>
                                                        <path class="broken-heart--right" d="M37.868 22.045c-.135-2.588-2.277-4.823-4.697-4.823a4.258 4.258 0 0 0-3.302 1.487l-.004-.003v14.035a3.215 3.215 0 0 0 2.289-1.033c.598-.596 5.882-5.99 5.714-9.663z"/></g>
                                                        <path class="broken-heart--crack" fill="none" stroke="#FFF" stroke-miterlimit="10" d="M29.865 18.205v14.573"/></svg>
                                                        
                                                        <div class="effect-group">
                                                            <span class="effect"></span>
                                                            <span class="effect"></span>
                                                            <span class="effect"></span>
                                                            <span class="effect"></span>
                                                            <span class="effect"></span>
                                                        </div>
                                                    </div>
                                                </a>

                                            @endif
                                            {{-- end check data array --}}
                                            @endif
                                            {{-- end check auth --}}
                                            @endif
                                            {{-- nyi --}}


                                            <p class="card-text fst-italic text-muted">
                                                
                                                @foreach($top_course->instructors as $instructor)
                                                    {{$instructor->user->name}}
                                                    @php
                                                        $instructor = $instructor->user->name;
                                                    @endphp
                                                @endforeach
                                            </p>

                                            <div class="rating">
                                                <i class='bx bxs-star custom_primary_Color'></i>
                                                <i class='bx bxs-star custom_primary_Color'></i>
                                                <i class='bx bxs-star custom_primary_Color' ></i>
                                                <i class='bx bxs-star-half custom_primary_Color' ></i>

                                                <i class='bx bx-star' ></i>
                                            </div>

                                            <div class="price">
                                                <span class="text-danger fs-5"> {{$top_course->price}} Ks  </span> 

                                                {{-- <span class="text-decoration-line-through text-muted"> 50,000 Ks </span> --}}

                                                <i class='bx bxs-purchase-tag text-danger' ></i>
                                            </div>

                                        </div>
                                        

                                        <div class="card-content">
                                            <small class="card-text text-muted" >

                                                {{-- {!! $newest_course->subtitle !!} --}}
                                                {!! \Illuminate\Support\Str::limit($top_course->subtitle, 80) !!}
                                            </small>
                                            
                                            <div class="d-grid gap-2 col-6 mx-auto">
                                                @if(Auth::user() && Auth::user()->getRoleNames()[0] != "Business")

                                            @if(Auth::user()->sales)
                                            @if(!Auth::user()->company)



                                            @php
                                                $pending_array = array();
                                                $purched_array = array();
                                                $count_sale = count(Auth::user()->sales);
                                            @endphp

                                                @if($count_sale > 0)
                                                    @foreach(Auth::user()->sales as $sales)
                                                        @foreach($sales->courses as $course_sale)
                                                        

                                                            @if($course_sale->pivot->course_id == $top_course->id && $course_sale->pivot->status == 0)

                                                                @php
                                                                    array_push($pending_array, 'true')
                                                                @endphp

                                                                <button disabled="disabled" class="btn custom_primary_btnColor mt-3">Pending</button>

                                                            @elseif($course_sale->pivot->course_id == $top_course->id && $course_sale->pivot->status == 1)
                                                                @php
                                                                    array_push($purched_array, 'true')
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                        @if($purched_array)
                                                             <a href="{{route('lecture',$top_course->id)}}" class="btn custom_primary_btnColor mt-3">Go to Course</a>
                                                        @endif


                                                @endif
                                            @endif

                                                

                                            @foreach($top_course->instructors as $instructor)
                                                @if(Auth::user()->instructor)


                                                    @if($instructor->pivot->instructor_id != Auth::user()->instructor->id && !$purched_array && !$pending_array)


                                                        <a href="javascript:void(0)" class="btn custom_primary_btnColor mt-3 addtocart"
                                                        data-id="{{$top_course->id}}" data-course_title="{{$top_course->title}}" data-instructor = "{{$instructor}}" data-user_id = "{{Auth::id()}}" data-price = "{{$top_course->price}}" data-image = "{{$top_course->image}}"
                                                            {{-- for wishlist --}}
                                                            @foreach($wishlists as $wishlist)
                                                            @if($wishlist->course_id == $top_course->id && Auth::id() == $wishlist->user_id)

                                                            data-wishlist = "save"

                                                            @endif 
                                                            @endforeach
                                                            
                                                            >
                                                        Purchase
                                                        </a>
                                                   
                                                    @endif
                                                    @elseif(!$purched_array && !$pending_array)
                                                        <a href="javascript:void(0)" class="btn custom_primary_btnColor mt-3 addtocart"
                                                        data-id="{{$top_course->id}}" data-course_title="{{$top_course->title}}" data-instructor = "{{$instructor}}" data-user_id = "{{Auth::id()}}" data-price = "{{$top_course->price}}" data-image = "{{$top_course->image}}"
                                                            {{-- for wishlist --}}
                                                            @foreach($wishlists as $wishlist)
                                                            @if($wishlist->course_id == $top_course->id && Auth::id() == $wishlist->user_id)

                                                            data-wishlist = "save"

                                                            @endif 
                                                            @endforeach
                                                            
                                                            >
                                                        Purchase
                                                        </a>
                                                    

                                                @endif
                                            @endforeach



                                            
                                            @else
                                                <button disabled="disabled" class="btn custom_primary_btnColor mt-3">Purchase</button>
                                            @endif
                                            @endif


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- End Current Course Section -->

    <!-- ======= Counts Section ======= -->
    <section class="counts section-bg">
        <div class="container">

            <div class="row counters">

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">232</span>
                    <p> Instructors </p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">521</span>
                    <p> Online Courses  </p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up">1,463</span>
                    <p> Many Students </p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-toggle="counter-up"> 4 </span>
                    <p> Years of experience </p>
                </div>

            </div>

      </div>
    </section><!-- End Counts Section -->
    
    <!-- ======= Clients Section ======= -->
    {{-- <section class="clients section-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="frontend/img/clients/client-1.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="frontend/img/clients/client-2.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="frontend/img/clients/client-3.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="frontend/img/clients/client-4.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="frontend/img/clients/client-5.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="frontend/img/clients/client-6.png" class="img-fluid" alt="">
                </div>

            </div>
        </div>
    </section> --}}
    <!-- End Clients Section -->

    <!-- ======= About Section ======= -->
    <section class="about">
        <div class="container">

            <div class="row">
                <div class="col-lg-6 pt-0">
                    <lottie-player src="https://assets10.lottiefiles.com/private_files/lf30_imyUMa.json" mode="bounce" background="transparent"  speed="3"   loop autoplay></lottie-player>
                </div>
                <div class="col-lg-6 pt-4">
                    <h3> How It Works </h3>
                    <p>
                        Learn new subjects online anytime and anywhere with no limits.
                    </p>
                    <a href=""> Learn More -> </a>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <i class='bx bx-like'></i>
                            <h4> Industrial Standart  </h4>
                            <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                        </div>

                        <div class="col-md-12">
                            <i class='bx bx-user' ></i>
                            <h4> Expert Instructors </h4>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                        </div>

                        <div class="col-md-12">
                            <i class='bx bx-heart-circle' ></i>
                            <h4> Life time access </h4>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    

    <!-- ======= Services Section ======= -->
    <section class="services section-bg">
        <div class="container">

            <div class="section-title">
                <h2> Choose Category </h2>
                <p> for you</p>
            </div>

            <div class="row">
                @foreach($limitcategories as $limitcategory)
                <div class="col-lg-4 col-md-6 align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box iconbox-yellow">
                        <div class="icon">
                            <i class="bx bx-layer"></i>
                        </div>
                        <h4><a href="">{{ $limitcategory->name }}</a></h4>
                        <p> 5 Courses </p>
                    </div>
                </div>

                @endforeach

            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section class="cta">
        <div class="container">

            <div class="text-center">
                <h3> 25 K + </h3>
                <p>  Students are in one place </p>
                <a class="cta-btn" href="{{ asset('register') }}"> Join Now </a>
            </div>

        </div>
    </section><!-- End Cta Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                <p>
                  Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                <p>
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                <p>
                  Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                <p>
                  Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                <p>
                  Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Contact</h2>
            </div>

            <div class="row">

                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Our Address</h3>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>
                        </div>
                      
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-envelope"></i>
                                <h3>Email Us</h3>
                                <p>info@example.com<br>contact@example.com</p>
                            </div>
                        </div>
                      
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>Call Us</h3>
                                <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row form-group">
                            <div class="form-floating mb-3 col-md-6">
                                <input type="text" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                <label for="name" class="px-4"> Your Name </label>
                                <div class="validate"></div>

                            </div>

                            <div class="form-floating mb-3 col-md-6">
                                <input type="email" class="form-control" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                                <label for="email" class="px-4"> Your Email </label>
                                <div class="validate"></div>

                            </div>
                        </div>

                        <div class="form-floating mb-3 col-md-12">
                            <input type="text" class="form-control" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                            <label for="subject"> Subject </label>
                            <div class="validate"></div>

                        </div>

                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Message" id="message" name="message"  data-rule="required" data-msg="Please write something for us" style="height: 120px"></textarea>
                            <label for="message"> Message </label>
                            <div class="validate"></div>
                        </div>
                      
                        <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

@section('script_content')
<script type="text/javascript">
    $(document).ready(function(){
        $('.wishlist').click(function(){
            var id = $(this).data('course_id');
            $.post('wishlist_save',{id:id},function(res){
                console.log(res);
            })

        })
    })
</script>
@stop

</x-frontend>