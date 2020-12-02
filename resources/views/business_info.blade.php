<x-frontend>
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2> Business info </h2>
                <ol>
                    <li><a href="{{ route('frontend.index') }}">Home</a></li>
                    <li> Business </li>
                </ol>
            </div>

        </div>
    </section>
    <section class="inner-page contact">

    <div class="container">
        <div class="">
            <h1 class="text-center">Your business information</h1>
            <form action="{{route('business.store')}}" method="POST" enctype="multipart/form-data">
               @csrf
                <div class="row my-4">
                    <div class="col-md-4 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-2">
                        <div class="form-group">
                            <label for="company_name" class="form-label">Company name</label>
                            <input type="text" name="company_name" id="company_name" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-0">
                        <div class="form-group">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-md-4 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-2">
                        <div class="form-group">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" id="address" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-0">
                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="my-3 text-center">
                   
                    <input type="submit" value="Save" class="btn custom_primary_btnColor w-25">
                   
                </div>
                
            </form>
        </div>
    </div>
    </section>
</x-frontend>