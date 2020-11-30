<x-frontend>

	<!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      	<div class="container">

            <div class="d-flex justify-content-between align-items-center">
          		<h2> PHP Developer Course </h2>
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
                    <div class="embed-responsive embed-responsive-4by3">            
                        <iframe height="500" src="https://www.youtube-nocookie.com/embed/TgzY8syP7lo?start=9;autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"  class="card-img-top" id="videoarea"></iframe>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

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

                                    <ul id="playlist" class="lh-lg list-group list-group-flush">
                                        <li videoUrl="https://www.youtube.com/embed/rk9bBpsLy3M" videoId="1 " class="list-group-item px-0">
                                            <i class='bx bxs-checkbox-checked fs-4 text-success'></i>
                                            <p class="mb-0 chapter1 text-primary d-inline-block">  

                                                Lorem ipsum dolor sit amet
                                                
                                            </p>
                                            <span class="float-right"> 00:28 </span>
                                        </li>

                                        <li videoUrl="https://www.youtube.com/embed/ceuBhmT8vIo?start=16" videoId="2" class="list-group-item px-0"> 
                                            <i class='bx bx-checkbox fs-4 '></i>
                                            <p class="mb-0 chapter2 text-primary d-inline-block">  

                                                Lorem ipsum dolor sit amet
                                                
                                            </p>
                                            <span class="float-right"> 00:28 </span>
                                        </li>

                                        <li videoUrl="https://www.youtube.com/embed/orb_bI5Vz_U" videoId="3" class="list-group-item px-0"> 
                                            <i class='bx bx-checkbox fs-4'></i>
                                            <p class="mb-0 chapter3 text-primary d-inline-block">  

                                                Lorem ipsum dolor sit amet
                                                
                                            </p>
                                            <span class="float-right"> 00:28 </span>
                                        </li>

                                        <li videoUrl="https://www.youtube.com/embed/Mm91Mkn9BD0" videoId="4" class="list-group-item px-0"> 
                                            <i class='bx bx-checkbox fs-4'></i>
                                            <p class="mb-0 chapter4 text-primary d-inline-block">  

                                                Lorem ipsum dolor sit amet
                                                
                                            </p>
                                            <span class="float-right"> 00:28 </span>
                                        </li>

                                        <li videoUrl="https://www.youtube.com/embed/H91tgdE7bOw?start=34" videoId="5" class="list-group-item px-0"> 
                                            <i class='bx bx-checkbox fs-4'></i>
                                            <p class="mb-0 chapter5 text-primary d-inline-block">  

                                                Lorem ipsum dolor sit amet
                                                
                                            </p>
                                            <span class="float-right"> 00:28 </span>
                                        </li>

                                        <li videoUrl="https://www.youtube.com/embed/rk9bBpsLy3M" videoId="6" class="list-group-item px-0"> 
                                            <i class='bx bx-checkbox fs-4'></i>
                                            <p class="mb-0 chapter6 text-primary d-inline-block">  

                                                Lorem ipsum dolor sit amet
                                                
                                            </p>
                                            <span class="float-right"> 00:28 </span>
                                        </li>

                                        <li videoUrl="https://www.youtube.com/embed/ceuBhmT8vIo?start=16" videoId="7" class="list-group-item px-0"> 
                                            <i class='bx bx-checkbox fs-4'></i>
                                            <p class="mb-0 chapter7 text-primary d-inline-block">  

                                                Lorem ipsum dolor sit amet
                                                
                                            </p>
                                            <span class="float-right"> 00:28 </span>
                                        </li>

                                        <li videoUrl="https://www.youtube.com/embed/orb_bI5Vz_U" videoId="8" class="list-group-item px-0"> 
                                            <i class='bx bx-checkbox fs-4'></i>
                                            <p class="mb-0 chapter8 text-primary d-inline-block">  

                                                Lorem ipsum dolor sit amet
                                                
                                            </p>
                                            <span class="float-right"> 00:28 </span>
                                        </li>

                                        <li videoUrl="https://www.youtube.com/embed/Mm91Mkn9BD0" videoId="9" class="list-group-item px-0"> 
                                            <i class='bx bx-checkbox fs-4'></i>
                                            <p class="mb-0 chapter9 text-primary d-inline-block">  

                                                Lorem ipsum dolor sit amet
                                                
                                            </p>
                                            <span class="float-right"> 00:28 </span>
                                        </li>

                                        <li videoUrl="https://www.youtube.com/embed/H91tgdE7bOw?start=10" videoId="5" class="list-group-item px-0"> 
                                            <i class='bx bx-checkbox fs-4'></i>
                                            <p class="mb-0 chapter10 text-primary d-inline-block">  

                                                Lorem ipsum dolor sit amet
                                                
                                            </p>
                                            <span class="float-right"> 00:28 </span>
                                        </li>

                                        <li videoUrl="https://www.youtube.com/embed/rk9bBpsLy3M" videoId="11" class="list-group-item px-0"> 
                                            <i class='bx bx-checkbox fs-4'></i>
                                            <p class="mb-0 chapter11 text-primary d-inline-block">  

                                                Lorem ipsum dolor sit amet
                                                
                                            </p>
                                            <span class="float-right"> 00:28 </span>
                                        </li>

                                        <li videoUrl="https://www.youtube.com/embed/ceuBhmT8vIo?start=16" videoId="12" class="list-group-item px-0"> 
                                            <i class='bx bx-checkbox fs-4'></i>
                                            <p class="mb-0 chapter12 text-primary d-inline-block">  

                                                Lorem ipsum dolor sit amet
                                                
                                            </p>
                                            <span class="float-right"> 00:28 </span>
                                        </li>

                                        <li videoUrl="https://www.youtube.com/embed/orb_bI5Vz_U" videoId="13" class="list-group-item px-0"> 
                                            <i class='bx bx-checkbox fs-4'></i>
                                            <p class="mb-0 chapter13 text-primary d-inline-block">  

                                                Lorem ipsum dolor sit amet
                                                
                                            </p>
                                            <span class="float-right"> 00:28 </span>
                                        </li>

                                        <li videoUrl="https://www.youtube.com/embed/Mm91Mkn9BD0" videoId="14" class="list-group-item px-0"> 
                                            <i class='bx bx-checkbox fs-4'></i>
                                            <p class="mb-0 chapter14 text-primary d-inline-block">  

                                                Lorem ipsum dolor sit amet
                                                
                                            </p>
                                            <span class="float-right"> 00:28 </span>
                                        </li>

                                        <li videoUrl="https://www.youtube.com/embed/H91tgdE7bOw?start=34" videoId="15" class="list-group-item px-0"> 
                                            <i class='bx bx-checkbox fs-4'></i>
                                            <p class="mb-0 chapter15 text-primary d-inline-block">  

                                                Lorem ipsum dolor sit amet
                                                
                                            </p>
                                            <span class="float-right"> 00:28 </span>
                                        </li>

                                    </ul>
                                    
                                    

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
            </div>


            <div class="row mt-4">
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
                                        <p> 41131 questions in this course </p>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <a href="javascript:void(0)" class="btn custom_primary_btnColor" data-toggle="modal" data-target="#askquestionModal"> Ask Question </a>
                                        
                                    </div>
                                    <hr class="mt-3">
                                </div>

                                <div class="row testimonials">
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
                                                <img src="{{ asset('frontend/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
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

                                                <ul class="lh-lg">
                                                    <li> Beginner level introduction to Docker</li>
                                                    <li> Build Docker images using Dockerfiles with Hands-On Exercises</li>
                                                    <li> Build Application stack using Docker Compose Files with Hands-On Exercises</li>
                                                    <li> Basic Docker Commands with Hands-On Exercises</li>
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
                                            <p> COMPLETELY REDONE ON OCTOBER 12th 2020, WITH OVER 500 BRAND NEW VIDEOS! </p>

                                            <p>Hi! Welcome to the brand new version of The Web Developer Bootcamp, Udemy's most popular web development course.  This course was just completely overhauled to prepare students for the 2021 job market, with over 60 hours of brand new content. This is the only course you need to learn web development. There are a lot of options for online developer training, but this course is without a doubt the most comprehensive and effective on the market.  Here's why: </p>

                                            <ul>
                                                <li> This is the only Udemy course taught by a professional bootcamp instructor with a track record of success. </li>
                                                <li> 94% of my in-person bootcamp students go on to get full-time developer jobs. Most of them are complete beginners when I start working with them. </li>
                                                <li> The previous 2 bootcamp programs that I taught cost $14,000 and $21,000.  This course is just as comprehensive but with brand new content for a fraction of the price </li>
                                                <li> Everything I cover is up-to-date and relevant to 2021's developer job market. This course does not cut any corners. I just spent 8 months redoing this behemoth of a course! </li>
                                                <li> We build 13+ projects, including a gigantic production application called YelpCamp. No other course walks you through the creation of such a substantial application. </li>
                                                <li> The course is constantly updated with new content, projects, and modules.  Think of it as a subscription to a never-ending supply of developer training. </li>
                                                <li> You get to meet my cats and chickens! </li>
                                            </ul>

                                            <p> When you're learning to program you often have to sacrifice learning the exciting and current technologies in favor of the "beginner friendly" classes.  With this course, you get the best of both worlds.  This is a course designed for the complete beginner, yet it covers some of the most exciting and relevant topics in the industry. <br> Throughout the brand new version of the course we cover tons of tools and technologies including: </p>

                                            <ul>
                                                <li> HTML5 </li>
                                                <li> CSS3 </li>
                                                <li> Flexbox </li>
                                                <li> Responsive Design </li>
                                                <li> JavaScript (all 2020 modern syntax, ES6, ES2018, etc.) </li>
                                                <li> Asynchronous JavaScript - Promises, async/await, etc. </li>
                                                <li> AJAX and single page apps </li>
                                                <li> Bootstrap 4 and 5 (alpha) </li>
                                                <li> SemanticUI </li>
                                                <li> Bulma CSS Framework </li>
                                                <li> DOM Manipulation </li>
                                                <li> Unix(Command Line) Commands </li>
                                                <li> NodeJS </li>
                                                <li> NPM </li>
                                                <li> ExpressJS </li>
                                                <li> Templating </li>
                                                <li> REST </li>
                                                <li> SQL vs. NoSQL databases </li>
                                                <li> MongoDB </li>
                                                <li> Database Associations </li>
                                                <li> Schema Design </li>
                                                <li> Mongoose </li>
                                                <li> Authentication From Scratch </li>
                                                <li> Cookies & Sessions </li>
                                                <li>  Authorization </li>
                                                <li> Common Security Issues - SQL Injection, XSS, etc. </li>
                                                <li> Developer Best Practices </li>
                                                <li> Deploying Apps </li>
                                                <li> Cloud Databases </li>
                                                <li> Image Upload and Storage </li>
                                                <li> Maps and Geocoding </li>
                                            </ul>
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
                <form>
                    <div class="modal-body">

                        <div class="form-floating mb-3 col-md-12">
                            <input type="text" class="form-control" id="subject" placeholder="Title or summary">
                            <label for="subject"> Title or Summary </label>
                            <div class="validate"></div>

                        </div>

                        <div class="form-floating my-2">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2"> Comments </label>
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
        $(document).ready(function(){

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

                console.log(size_li);
                $(".questionLists:lt(" + x + ")").show();
                $(".loadmoreBtn").click(function () {
                    console.log(x);

                    console.log(size_li);

                    if (media.matches) {
                        x = x + 4 <= size_li ? x + 4 : size_li;
                    } else {
                        x = x + x <= size_li ? x + x : size_li;
                    }
                    console.log(size_li);
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
            var starttime = 2;
            $(function() {
                $("#playlist li").on("click", function() {
                    var videolink = $(this).attr("videoUrl");
                    var videoId = $(this).attr("videoId");
                    $("#videoarea").attr({
                        "src": $(this).attr("videoUrl"),
                        "poster": "",
                        "autoplay": "autoplay"
                              });
                    starttime = $(this).attr('startt');


                    $("#playlist li p").removeClass("text-primary");
                    $("p.chapter"+videoId).addClass("text-primary");

                    


                    

                });

            })

            document.getElementById("videoarea").addEventListener("loadedmetadata", function() {
                 this.currentTime = starttime;
            }, false);



        });

    </script>
@stop

</x-frontend>