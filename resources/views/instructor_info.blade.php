<x-frontend>
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2> Instructor info </h2>
                <ol>
                    <li><a href="{{ route('frontend.index') }}">Home</a></li>
                    <li> Instructor </li>
                </ol>
            </div>

        </div>
    </section>

    <section class="inner-page contact">
        <div class="container">
            <div class="">
                <h1 class="text-center">Your instructor information</h1>
                <form action="{{route('instructor.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row my-4">
                        <div class="col-md-4 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-2">
                            <div class="form-group">
                                <label for="headline" class="form-label">Headline</label>
                                <input type="text" name="headline" id="headline" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-0">
                            <div class="form-group">
                                <label for="biography" class="form-label">Biography</label>
                                <textarea name="biography" id="biography" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-md-4 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-2">
                            <div class="form-group">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" name="website" id="website" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-0">
                            <div class="form-group">
                                <label for="twitter" class="form-label">Twitter</label>
                                <input type="text"  name="twitter" id="twitter" class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-md-4 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-2">
                            <div class="form-group">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="text" name="facebook" id="facebook" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-0">
                            <div class="form-group">
                                <label for="linkedin" class="form-label">Linkedin</label>
                                <input type="text"  name="linkedin" id="linkedin" class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-md-4 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-2">
                            <div class="form-group">
                                <label for="youtube" class="form-label">Youtube</label>
                                <input type="text"  name="youtube" id="youtube" class="form-control"/>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-0">
                            <div class="form-group">
                                <label for="instagram" class="form-label">Instagram</label>
                                <input type="text" name="instagram" id="instagram" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="my-5 text-center">
                        <input type="submit" name="" class="btn custom_primary_btnColor w-25">
                      
                    </div>
                    
                </form>
            </div>
        </div>
    </section>
</x-frontend>