<x-backend>

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong> Create New Course </strong> </h3>
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
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    @if($instructors == NULL || !$instructors->isEmpty())
                        <div class="wizard-content">
                            <form id="example-form" action="{{ route('backside.course.store') }}" class="tab-wizard wizard-circle wizard clearfix g-3" method="POST" enctype="multipart/form-data">
                            @csrf

                                <h6>Course  Landing </h6>
                                <section>
                                    <div class="row form-group mb-4">
                                        <div class="col-md-12">
                                            <label for="titleId" class="form-label"> Course Title </label>
                                            <input type="text" class="form-control form-control-lg" id="titleId" placeholder="E.g Learn Digital Marketing" name="title">
                                        </div>
                                    </div>

                                    <div class="row form-group my-4">

                                        <div class="col-md-12">
                                            <label for="subtitleId" class="form-label"> Course Subtitle </label>
                                            <input type="text" class="form-control form-control-lg" id="subtitleId" placeholder="Insert Your Course Subtitle" name="subtitle">
                                        </div>
                                    </div>

                                    <div class="row form-group my-4">
                                        <div class="col-md-6">
                                            <label for="titleId" class="form-label"> Choose Category </label>

                                            
                                            <select class="form-select select2" name="subcategoryid" data-placeholder="Select one category">
                                                    <option></option>

                                                @foreach($categories as $category)
                                                <optgroup class="bg-dark" label="{{ $category->name }}">
                                                    @foreach($category->subcategories as $subcategory)
                                                        <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                                    @endforeach
                                                </optgroup>
                                                @endforeach

                                            </select>
                                        </div>


                                        <div class="col-md-6">
                                            <label for="levelId" class="form-label"> Choose Level </label>
                                            <select class="form-select select2" name="level" id="levelId" data-placeholder="Select a level">
                                                <option></option>

                                                @foreach($levels as $level)
                                                <option value="{{$level->id}}">{{$level->name}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>


                                    @if(isset($companies))
                                        <div class="row form-group my-4">

                                            <div class="col-md-12" >
                                                <label for="companyId" class="form-label"> Choose Company </label>

                                                
                                                <select class="form-select select2" name="subcategoryid" id="companyId" data-placeholder="Select one company">
                                                    <option></option>
                                                    @foreach($companies as $company)
                                                        <option value="{{$company->id}}" data-id="{{$company->id}}">{{$company->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="row form-group my-4">

                                            <div class="col-md-12">
                                                <label for="companyInstructor" class="form-label"> Select Instructors </label>

                                                <select name="teachers[]" class="form-select select2" id="companyInstructor" multiple="multiple" disabled>
                                                    <option> aa </option>
                                                    <option> aa </option>                                                
                                                    <option> aa </option>                                                


                                                </select> 
                                            </div>
                                        </div>
                                    @endif

                                    @if(isset($instructors))
                                    <div class="row form-group my-4">

                                        <div class="col-md-12">
                                            <label for="instructorId" class="form-label"> Select Instructors </label>

                                            <select name="teachers[]" class="form-select select2 teacher" id="inputTeachers" multiple="multiple">
                                                
                                                @foreach($instructors as $instructor)
                                                    <option value="{{$instructor->id}}">{{$instructor->name}}</option>
                                                @endforeach
                                               
                                                
                                            </select> 
                                        </div>
                                    </div>
                                    @endif

                                    {{-- <div class="row form-group my-4">

                                        <div class="col-md-12">
                                            <label for="instructorId" class="form-label"> Select Instructors </label>

                                            <select name="teachers[]" class="form-select select2 teacher" id="inputTeacher" multiple="multiple">
                                                @foreach($instructors as $instructor)
                                                <option value="{{$instructor->id}}">{{$instructor->name}}</option>
                                                @endforeach
                                                

                                            </select> 
                                        </div>
                                    </div> --}}


                                    <div class="row form-group my-4 vh-50">

                                        <div class="col-md-12">
                                            <label for="descriptionId" class="form-label"> Course Description </label>
                                            <div id="descriptionId"></div>

                                            <textarea class="form-control d-none" id="hiddenArea" name="description"></textarea>
                                        </div>
                                    </div>
                                </section>
                             
                                <h6> What will Learn </h6>
                                <section>
                             
                                    <div class="row form-group mb-4">
                                        <div class="col-md-12">
                                            <label for="situationId" class="form-label"> What will students learn in your course? </label>
                                            <input type="text" class="form-control form-control-lg my-4" id="situationId" placeholder="E.g Learn Digital Marketing" name="situations[]">

                                            <div class="situation_morewrapperField"></div>
                                        

                                            <button class="btn btn-light text-success add_situations">  
                                                <i class="align-middle mr-2" data-feather="plus"></i> Add Answer 
                                            </button>
                                        </div>
                                    </div>
                                    
                                    
                                   
                                </section>

                             
                                    
                                    
                                   
                                </section>
                             
                                <h6> Requirement For Students </h6>
                                <section>
                                    <div class="row form-group mb-4">
                                        <div class="col-md-12">
                                            <label for="requirementId" class="form-label"> Are there any course requirements or prerequisites? </label>
                                            <input type="text" class="form-control form-control-lg my-4" id="requirementId" placeholder="E.g Be able to read english 4 skills" name="requirements[]">

                                            <div class="requirement_morewrapperField"></div>
                                        

                                            <button class="btn btn-light text-success add_requirements">  
                                                <i class="align-middle mr-2" data-feather="plus"></i> Add Answer 
                                            </button>
                                        </div>
                                    </div>

                                </section>
                             
                                <h6> Pricing </h6>
                                <section>
                                    
                                    <div class="row form-group mb-4">
                                        <div class="col-md-12">
                                            <label for="priceId" class="form-label"> Pricing </label>
                                            <input type="number" class="form-control form-control-lg" id="priceId" placeholder="Course Amount" name="pricing">
                                        </div>
                                    </div>

                                    <input id="acceptTerms-2" name="acceptTerms" type="checkbox" class=""> <label for="acceptTerms-2"> Give a certificate for completing courses </label>
                                    <small class="d-block"> If you give certificate to students, please check,   </small>
                                </section>

                                <h6> Photo / Video </h6>
                                <section>
                                    <label>Photo(<small class="text-danger">jpeg|bmp|png</small>)</label>
                                    
                                    {{-- <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror" > --}}
                                    <img id="blah" src="http://placehold.it/180" alt="your image" class="img-fluid d-block" />

                                    <input type='file' name="photo" onchange="readURL(this);" />

                                    @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                    </span>
                                    @enderror

                                    <div class="my-5"> 
                                    <label>Video(<small class="text-danger">mp4</small>)</label>
                                    <input type="file" name="video" class="form-control-file @error('video') is-invalid @enderror" >
                                    @error('video')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </section>
                            </form>
                        </div>
                    @else

                    <div class="row justify-content-center">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-10 col-10 py-5">
                                <svg id="aff82094-dd84-4d6a-a3ba-e579cac0668b" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 624.44971 614.16373"><path d="M742.58521,257.03188a554.5944,554.5944,0,0,1-4.83008,71.29c-.10987.83-.23,1.66-.34034,2.49H514.135c-.66016-.82-1.31006-1.65-1.93994-2.49-2.1001-2.78-4.06983-5.64-5.87988-8.6-8.7002-14.26-12.74024-30.99-8.8501-42.57l.06982-.18a20.28155,20.28155,0,0,1,3.91992-6.9c8.96-10.2,27.2002-8.61,43.79-.51-14.92968-16.16-26.85986-36.59-27.85986-54.88-.98-17.84,8.27978-30.63995,18.33984-41.53.33008-.36.66016-.71.99024-1.06.16015-.18.33008-.35.48974-.53,7.8501-8.3,17.01026-16.49,30.34034-15.57995,14.61962,1,30.89013,13.15,42.33007,27.35,11.44,14.19,19.07959,30.34,26.81983,46.1,7.75,15.75,16.12988,31.9,28.5,45.33-16.77-20.97-30.33008-44.86-35.41992-68.14s-.8501-45.69,13.92968-56.75a34.71265,34.71265,0,0,1,15.17041-6.22c.63965-.11,1.28955-.2,1.94971-.28,13.73-1.63995,30.16016,3.02,44.18018,14.3,15.43994,12.42,26.1997,30.9,31.60009,48.47C742.00513,223.71187,742.66479,240.65187,742.58521,257.03188Z" transform="translate(-287.77515 -142.91814)" fill="#f2f2f2"/><path d="M596.91479,330.81184h-4.26953q-2.04053-1.25994-4.10009-2.49c-.8501-.53-1.71-1.04-2.57032-1.56q-21.31494-12.855-42.88964-24.65-21.55518-11.805-43.32032-22.51a1.78938,1.78938,0,0,1-1.04-2.04.51552.51552,0,0,1,.07032-.15c.1997-.38.6499-.54,1.31-.22,1.77979.88,3.56983,1.76,5.34961,2.66q21.82545,10.88993,43.47022,22.88,21.62988,11.985,43.02,25.04c.2998.18.6001.37.8999.55C594.20483,329.15187,595.55493,329.98189,596.91479,330.81184Z" transform="translate(-287.77515 -142.91814)" fill="#fff"/><path d="M651.96509,330.81184h-2.64014c-.6001-.82995-1.18994-1.66-1.79-2.49q-21.14941-29.31-42.29-58.62-34.62012-47.985-69.21972-95.97a1.70048,1.70048,0,0,1-.3003-.58c-.1997-.71.32032-1.13.99024-1.06a2.00561,2.00561,0,0,1,1.3999.88q19.40991,26.91,38.81006,53.8,34.43994,47.745,68.87012,95.48c1.46,2.02,2.91992,4.05,4.37988,6.07C650.77515,329.15187,651.37524,329.98189,651.96509,330.81184Z" transform="translate(-287.77515 -142.91814)" fill="#fff"/><path d="M710.69507,315.15187c-.10986,4.45-.37988,8.83-.74024,13.17q-.10473,1.245-.21,2.49h-2.77c.08008-.82995.16016-1.66.23-2.49.5503-6.27.93018-12.61.9502-19.12a266.65558,266.65558,0,0,0-5.54981-53.72,334.66491,334.66491,0,0,0-16.57031-55.75,383.49176,383.49176,0,0,0-26.90967-55.1,1.47574,1.47574,0,0,1-.25-.98c.10987-.79,1.15967-1.03,1.94971-.28a2.293,2.293,0,0,1,.3999.5q1.93506,3.285,3.8003,6.59a383.227,383.227,0,0,1,25.77,55.3,333.08151,333.08151,0,0,1,15.46972,55.84A263.07409,263.07409,0,0,1,710.69507,315.15187Z" transform="translate(-287.77515 -142.91814)" fill="#fff"/><path d="M903.49487,328.32185h-607a8.72767,8.72767,0,0,0-8.71972,8.72V748.36183a8.72766,8.72766,0,0,0,8.71972,8.72h607a8.71244,8.71244,0,0,0,6.63037-3.06,2.0459,2.0459,0,0,0,.19-.24,8.1667,8.1667,0,0,0,1.25-2.11005,8.50722,8.50722,0,0,0,.65966-3.31V337.04189A8.72954,8.72954,0,0,0,903.49487,328.32185Zm6.24024,420.04a6.17538,6.17538,0,0,1-1.03028,3.42,6.44588,6.44588,0,0,1-2.35986,2.12,6.1843,6.1843,0,0,1-2.8501.69h-607a6.23758,6.23758,0,0,1-6.23-6.23V337.04189a6.23758,6.23758,0,0,1,6.23-6.23005h607a6.23945,6.23945,0,0,1,6.24024,6.23005Z" transform="translate(-287.77515 -142.91814)" fill="#3f3d56"/><rect x="1.24265" y="220.35292" width="621.95676" height="2.49281" fill="#3f3d56"/><circle cx="22.43155" cy="204.09981" r="7.47844" fill="#3f3d56"/><circle cx="43.93206" cy="204.09981" r="7.47844" fill="#3f3d56"/><circle cx="65.43257" cy="204.09981" r="7.47844" fill="#3f3d56"/><path d="M564.75225,575.19169c-7.47934-4.86853-11.19944-16.18352-9.36686-26.5314s8.73431-19.26076,17.00769-23.10449a26.64943,26.64943,0,0,1,25.22766,1.79331c7.587,4.63929,18.31727,7.18041,21.92024,16.46244,2.76877,7.133-.74306,21.61748-4.46947,28.54566-3.22083,5.98822-9.34128,8.72742-15.09133,9.91751a45.34011,45.34011,0,0,1-36.669-8.46074Z" transform="translate(-287.77515 -142.91814)" fill="#2f2e41"/><polygon points="273.076 487.234 267.096 497.544 266.306 498.904 265.156 500.904 247.526 500.904 248.716 498.904 251.796 493.714 258.976 481.594 267.106 484.844 273.076 487.234" fill="#ffb8b8"/><path d="M533.9812,643.82185l-3.22-2-.4-.25,20.21-36.83a13.73091,13.73091,0,0,1,8.25-6.62,13.57465,13.57465,0,0,1,6.78-.25,13.3537,13.3537,0,0,1,3.74,1.4,13.08889,13.08889,0,0,1,1.39.88,13.34855,13.34855,0,0,1,4.1,4.62,13.817,13.817,0,0,1-.42,13.95l-7.79,12.45-6.66,10.65-1.25,2h-24.73Z" transform="translate(-287.77515 -142.91814)" fill="#2f2e41"/><circle cx="298.13014" cy="420.78418" r="24.56103" fill="#ffb8b8"/><path d="M610.56136,643.82185h-55.21l.25-.71q-.21021-.645-.39014-1.29c-.12988-.45-.24023-.91-.33984-1.36a30.19353,30.19353,0,0,1,.00976-12.7c3.0503-14.98,15.22022-27.15,15.22022-27.15.21-.16.41992-.31.62988-.46a27.78455,27.78455,0,0,1,5.8501-3.28c9.04-3.75,18.52-2.24,24.88965-.3a49.66945,49.66945,0,0,1,6.49023,2.47c.73975.35,1.14014.57,1.14014.57l.62988,19.21.75977,23Z" transform="translate(-287.77515 -142.91814)" fill="#f9a826"/><path d="M636.1014,641.82185l-4.22022-21.46-4.25976-21.63995a4.51913,4.51913,0,0,0-3.65039-3.57l-8.91993-1.54-8.2998-1.43a4.45928,4.45928,0,0,0-4.31006,1.65,4.40983,4.40983,0,0,0-.97021,2.74,4.52073,4.52073,0,0,0,.37011,1.79c4.33008,10.1,4.41016,26.09,3.31006,43.46-.0498.66-.08984,1.33-.14013,2H636.5013Z" transform="translate(-287.77515 -142.91814)" fill="#2f2e41"/><path d="M576.58138,596.87184a4.52686,4.52686,0,0,0-7.1499-2.48l-3.83008,3.48-15.68018,14.28a4.34546,4.34546,0,0,0-1.12012,1.59c-1.77,4.23-5.21972,12.58-9.23,22.89q-.97485,2.52-2.00976,5.19c-.24024.66-.5,1.33-.76026,2h25.84034c.21-.67.41992-1.34.62988-2,1.1499-3.63,2.27-7.19,3.3501-10.65,3.15966-10.05,6.00976-19.18,8.21-26.4q.91479-3,1.66992-5.54A4.52833,4.52833,0,0,0,576.58138,596.87184Z" transform="translate(-287.77515 -142.91814)" fill="#2f2e41"/><polygon points="354.126 500.904 355.796 500.904 355.566 500.344 354.956 498.904 345.546 476.574 344.106 477.444 332.546 484.434 338.476 498.904 339.296 500.904 348.726 500.904 354.126 500.904" fill="#ffb8b8"/><path d="M632.36116,601.78188a13.82107,13.82107,0,0,0-17.31006-8.17,12.40955,12.40955,0,0,0-1.27.5,13.64666,13.64666,0,0,0-5.81982,4.93,13.20487,13.20487,0,0,0-1.43018,2.77,13.74214,13.74214,0,0,0,.31006,10.57l2.89014,6.44,10.33984,23,.89991,2H641.9012l1.43994-.56,3.74024-1.44.52-.2Z" transform="translate(-287.77515 -142.91814)" fill="#2f2e41"/><path d="M605.19545,535.4936a4.06329,4.06329,0,0,0,4.62209-1.754,5.85069,5.85069,0,0,0,.33826-5.14335,10.73556,10.73556,0,0,0-3.19533-4.21454,12.40607,12.40607,0,0,0-5.61743-2.90837,7.46127,7.46127,0,0,0-6.05269,1.33064,5.37677,5.37677,0,0,0-1.82593,5.72244c.63589,1.84437,2.35849,3.08,4.07875,4.00021a27.09441,27.09441,0,0,0,11.03812,3.138Z" transform="translate(-287.77515 -142.91814)" fill="#2f2e41"/><path d="M609.97341,562.96868c-3.94869.5444-3.44168-1.46546-5.02317-5.12434s-3.69838-8.00234-7.66715-8.37294c-3.25244-.30372-5.93218,2.2964-8.56707,4.22719-4.69631,3.44136-11.02545,5.12576-16.46936,3.06124s-9.22682-8.55255-7.16126-13.99606a11.94253,11.94253,0,0,1,6.9065-6.52921,24.02845,24.02845,0,0,1,9.62258-1.33669,49.6471,49.6471,0,0,1,20.86393,5.34081c4.4722,2.27237,8.82588,5.52329,10.52244,10.24409s2.813,11.35473-2.03813,12.63178Z" transform="translate(-287.77515 -142.91814)" fill="#2f2e41"/><path d="M603.17707,522.50914c-1.95192-3.39729-.34073-8.05884,2.8528-10.32887s7.47743-2.49266,11.28829-1.58221a22.16579,22.16579,0,0,1,15.90025,15.41126c1.61709,5.94124.65566,12.3225,2.02517,18.32565A24.04864,24.04864,0,0,0,665.466,562.06039c4.10194-1.20461,8.27057-4.13321,8.674-8.3893A23.51836,23.51836,0,0,1,660.21235,577.22c-5.2851,2.20464-11.18046,2.34841-16.90507,2.20148-3.73068-.09575-7.54631-.32035-10.98783-1.76366A19.66657,19.66657,0,0,1,621.986,566.454a31.12894,31.12894,0,0,1-1.37547-15.4352c.56314-4.0283,1.68351-7.97662,1.997-12.032s-.28105-8.38552-2.78117-11.59391-7.27586-4.84718-10.83042-2.87c-1.42853.79462-2.581,2.09271-4.13318,2.60549s-3.752-.38836-3.61075-2.0169Z" transform="translate(-287.77515 -142.91814)" fill="#2f2e41"/><path d="M770.78108,643.82185l.19-2,5.64013-58.68a35.917,35.917,0,0,1,5.93018-3.77c11.60986-5.85,22.81006-3.05,28.86963-.63a31.59143,31.59143,0,0,1,4.64013,2.27l3.3003,60.81.10986,2Z" transform="translate(-287.77515 -142.91814)" fill="#f9a826"/><circle cx="509.41886" cy="400.04542" r="24.56103" fill="#ffb8b8"/><path d="M817.12222,557.93951a13.36948,13.36948,0,0,0-10.14531-22.56406c-3.39627.11351-6.59648,1.50343-9.83795,2.52344a32.53459,32.53459,0,0,1-15.28491,1.37639,20.40973,20.40973,0,0,1-13.01642-7.68569c-3.03878-4.17652-3.98636-9.9694-1.83961-14.66717,2.47835-5.42343,8.26757-8.41182,13.71368-10.83993a25.06262,25.06262,0,0,1,6.9624-2.28755,8.92874,8.92874,0,0,1,6.92635,1.746c1.53041,1.31628,2.42737,3.29481,4.09275,4.43554,1.87468,1.28409,4.3099,1.25039,6.57089,1.47672a25.20452,25.20452,0,0,1,12.20761,45.54Z" transform="translate(-287.77515 -142.91814)" fill="#2f2e41"/><path d="M786.201,589.53188l-3.65967-10.16-.22852-.6333a2.10407,2.10407,0,0,0-3.14648-1.03668l-4.15527,2.77s-26.64991,0-28.79,15.99c-.02979.25-.06983.53-.09961.83a.1546.1546,0,0,1-.01026.04c-.27,1.05-5.2998,20.49-9.62011,44.49-.11963.66-.23975,1.33-.35987,2h57.91016v-.00018C795.92562,619.71278,794.87142,597.297,786.201,589.53188Z" transform="translate(-287.77515 -142.91814)" fill="#2f2e41"/><path d="M855.28108,641.82185c-3.15966-24.62-7.67968-44.53-7.67968-44.53-.04-.3-.08008-.58-.11035-.83-2.12989-15.99-28.77979-15.99-28.77979-15.99l-4.15283-2.76862a2.10445,2.10445,0,0,0-3.14746,1.03858l-3.88965,10.79c-8.67041,7.76507-9.72461,30.1806-7.84033,54.2893l.00049.00067h55.8496C855.451,643.15187,855.36116,642.48183,855.28108,641.82185Z" transform="translate(-287.77515 -142.91814)" fill="#2f2e41"/><path d="M386.201,585.76186l-5.93994,56.06-.21,2H363.98128c.18994-.65.37988-1.32.58008-2,4.56006-15.64,10.77-38.47,10.09961-44.52-1.04981-9.44,6.30029-12.59,6.30029-12.59l.46.09Z" transform="translate(-287.77515 -142.91814)" fill="#f9a826"/><circle cx="124.34263" cy="400.97911" r="24.56103" fill="#a0616a"/><path d="M443.911,631.92183a40.26632,40.26632,0,0,0-3.02979,7.16c-.29.88-.56982,1.8-.83008,2.74-.18994.65-.35986,1.32-.52978,2H374.741c.09033-.66.16992-1.33.26025-2,3.31006-26.15,5.98975-52.69,6.41992-57.02.04-.41.06006-.62.06006-.62,38.81982-20.46,67.1499,6.3,67.1499,6.3s.04.19.1001.56C449.3514,594.78188,452.51107,616.62184,443.911,631.92183Z" transform="translate(-287.77515 -142.91814)" fill="#f9a826"/><path d="M440.88118,639.08186l-4.31982-9.26,1.0498-36.72,11.12012-2.06005.39014-.06995a29.44476,29.44476,0,0,1,12.61963,14.72c2.16015,5.4,6.27,21.64,9.74023,36.13.16016.67.31982,1.34.48,2H443.09114l-.93017-2Z" transform="translate(-287.77515 -142.91814)" fill="#f9a826"/><path d="M480.39144,478.82185h-142.02a11.504,11.504,0,0,0-11.49024,11.49v142.02a11.504,11.504,0,0,0,11.49024,11.49h142.02a11.49726,11.49726,0,0,0,11.48974-11.49v-142.02A11.49727,11.49727,0,0,0,480.39144,478.82185Zm9.48974,153.51a9.49787,9.49787,0,0,1-9.48974,9.49h-142.02a9.50458,9.50458,0,0,1-9.49024-9.49v-142.02a9.50458,9.50458,0,0,1,9.49024-9.49h142.02a9.49787,9.49787,0,0,1,9.48974,9.49Zm-109.62011,9.49-.21,2h59.47022c.16992-.68.33984-1.35.52978-2Z" transform="translate(-287.77515 -142.91814)" fill="#3f3d56"/><path d="M671.0013,478.82185h-142.02a11.504,11.504,0,0,0-11.49023,11.49v142.02a11.504,11.504,0,0,0,11.49023,11.49h142.02a11.49727,11.49727,0,0,0,11.48975-11.49v-142.02A11.49728,11.49728,0,0,0,671.0013,478.82185Zm9.48975,153.51a9.49788,9.49788,0,0,1-9.48975,9.49h-142.02a9.50457,9.50457,0,0,1-9.49023-9.49v-142.02a9.50457,9.50457,0,0,1,9.49023-9.49h142.02a9.49788,9.49788,0,0,1,9.48975,9.49Zm-125.27979,9.49q.18018.645.39014,1.29l-.25.71h49.65967c.05029-.67.09033-1.34.14013-2Z" transform="translate(-287.77515 -142.91814)" fill="#3f3d56"/><path d="M861.62142,478.82185h-142.02a11.49738,11.49738,0,0,0-11.49024,11.49v142.02a11.49738,11.49738,0,0,0,11.49024,11.49h142.02a11.50385,11.50385,0,0,0,11.48974-11.49v-142.02A11.50385,11.50385,0,0,0,861.62142,478.82185Zm9.48974,153.51a9.50415,9.50415,0,0,1-9.48974,9.49h-142.02a9.498,9.498,0,0,1-9.49024-9.49v-142.02a9.498,9.498,0,0,1,9.49024-9.49h142.02a9.50415,9.50415,0,0,1,9.48974,9.49Zm-76.91992,9.49c-.0498.66-.1001,1.33-.1499,2h43.08984c.08008-.66.16992-1.33.25-2Z" transform="translate(-287.77515 -142.91814)" fill="#3f3d56"/><path d="M764.99617,701.82185h-330a8,8,0,1,1,0-16h330a8,8,0,1,1,0,16Z" transform="translate(-287.77515 -142.91814)" fill="#ccc"/><path d="M672.49617,436.82185h-145a8,8,0,0,1,0-16h145a8,8,0,0,1,0,16Z" transform="translate(-287.77515 -142.91814)" fill="#f9a826"/><path d="M423.86578,565.29582a4.85261,4.85261,0,0,0,6.3459.40659c5.78855-4.29092,10.87037-9.632,13.87778-16.14675,3.44607-7.465,3.83051-16.62536-.32437-23.72027-3.51234-5.99771-9.71445-9.86806-15.89583-13.046a28.27085,28.27085,0,0,0-7.67384-2.95767,10.93658,10.93658,0,0,0-7.95156,1.283,6.8677,6.8677,0,0,0-3.10059,7.09085A25.847,25.847,0,0,0,398.11138,510.8a14.26707,14.26707,0,0,0-8.4253-.61079c-3.92257,1.11261-6.78627,4.59777-8.35256,8.36223a16.72442,16.72442,0,0,0-1.26244,9.1248,11.14652,11.14652,0,0,0,4.87061,7.63468c3.24313,2.00656,7.38056,1.86189,11.10508,1.04211s7.32987-2.24558,11.12646-2.60616,8.02437.5861,10.33493,3.62014c1.62715,2.13664,2.045,4.92841,2.41021,7.58914l1.89978,13.83909a16.88064,16.88064,0,0,0,1.5099,5.78251A3.33319,3.33319,0,0,0,423.86578,565.29582Z" transform="translate(-287.77515 -142.91814)" fill="#2f2e41"/></svg>
                        
                            </div>
                        </div>

                        <div class="row justify-content-center text-center">

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10">
                                <h3 class="mt-5"> You do not have any teachers. </h3>

                                <p class="my-4 text-muted"> Before you create a course, you must configure at least one teacher. </p>

                                <a class="btn custom_primary_btnColor btn-lg" href="{{route('backside.instructors.create')}}"> Create Teacher  </a>

                            </div>

                            
                        </div>


                    @endif

                </div>
            </div>
        </div>
    </div>

    
@section('script_content')
    
    <script type="text/javascript">

        $(document).ready(function() {

            readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah')
                            .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            

            var form = $("#example-form");

            form.steps({
                headerTag: "h6",
                bodyTag: "section",
                transitionEffect: "fade",
                titleTemplate: '<span class="step">#index#</span> #title#',
                onFinished: function (event, currentIndex)
                {
                    var about = document.querySelector('textarea[name=description]');
                    var value = JSON.stringify(quill.getContents());
                    console.log(value);
                    console.log(Object.values(value));
                    // about.value
                    // form.submit();

                }
            });

            var toolbarOptions = [
                [{ 'font': [] }],
                [{ 'header': [1, 2, 3, 4, 5, 6] }],
                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                ['link', 'image'],
                ['blockquote', 'code-block'],

                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
                [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent

                [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                

                [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                
                [{ 'align': [] }],


            ];

            var quill = new Quill('#descriptionId', {
                modules: {
                    toolbar: toolbarOptions
                  },
                theme: 'snow'
            });


            $('.select2').select2({
                // placeholder: "Select a state",
                theme: 'bootstrap4',
            });

            // get Instrutor (admin ~ role)
            $('#companyId').on("select2:select", function(e) {
                var companyid = $(this).children("option:selected").data('id');
                $.post("/getinstructor_bycompanyid",{id:companyid},function (res) {
                    // console.log(res);
                    $('#companyInstructor').prop('disabled',false);

                    var html='';


                    $.each(res,function (i,v) {
                        html +=`<option value="${v.id}">
                                ${v.name}
                            </option>`;
                    });

                    $('#companyInstructor').html(html);


                });
            });

            
            var max_fields = 10; //Maximum allowed input fields 
            var situation_wrapper    = $(".situation_morewrapperField"); //Input fields wrapper
            var requirement_wrapper    = $(".requirement_morewrapperField"); //Input fields wrapper

            var add_answerBtn = $(".add_situations"); //Add button class or ID
            var add_requirementBtn = $(".add_requirements"); //Add button class or ID

            var x = 1; //Initial input field is set to 1
            var y =1;

            $(add_answerBtn).click(function(e) {

                e.preventDefault();
                //Check maximum allowed input fields
                    if(x < max_fields){ 
                    x++; //input field increment
                    //add input field
                    $(situation_wrapper).append(`<div class="input-group mb-3">
                                        <input type="text" class="form-control form-control-lg" placeholder="E.g Learn Digital Marketing" name="situations[]">
                                        <button class="btn btn-danger remove_situationfield" type="button" id="button-addon2"> X
                                        </button>
                                    </div>`);
                    }

                });

                
                 
                //when user click on remove button
                $(situation_wrapper).on("click",".remove_situationfield", function(e){ 
                    e.preventDefault();
                $(this).parent('div').remove(); //remove inout field
                x--; //inout field decrement

            });


            $(add_requirementBtn).click(function(e) {

                e.preventDefault();
                //Check maximum allowed input fields
                    if(y < max_fields){ 
                    y++; //input field increment
                    //add input field
                    $(requirement_wrapper).append(`<div class="input-group mb-3">
                                        <input type="text" class="form-control form-control-lg" placeholder="E.g Be able to read english 4 skills" name="requirements[]">
                                        <button class="btn btn-danger remove_requirementfield" type="button" id="button-addon2"> X
                                        </button>
                                    </div>`);
                    }

                });

                
                 
                //when user click on remove button
                $(requirement_wrapper).on("click",".remove_requirementfield", function(e){ 
                    e.preventDefault();
                $(this).parent('div').remove(); //remove inout field
                y--; //inout field decrement

            });

            
            
        });


    </script>

@stop
</x-backend>