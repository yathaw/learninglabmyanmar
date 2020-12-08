<x-backend>
    @php
        $id = $category->id;
        $name = $category->name;
        
    @endphp

	<!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> 
            	Edit Existing Category 

            	<a href="{{ route('category.index') }}" class="btn btn-outline-success btn-sm float-right"> <i class="fas fa-backward"></i> </a>

            </h6>

        </div>
        <form action="{{ route('category.update',$id) }}" method="POST" enctype="multipart/form-data">
            
            @csrf
            @method('PUT')

           

            <div class="card-body">
                
                <div class="form-row">
                    <div class="form-group col-md-12 ">
                        <label for="name"> Name </label>
                        <input type="text" class="form-control" id="name" placeholder="Computer" name="name" value="{{ $name }}">
                        <div class="text-danger form-control-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="reset" class="btn btn-secondary text-uppercase mr-2"> 
                    <i class="fas fa-times mr-2"></i> Cancel 
                </button>
                <button type="submit" class="btn btn-primary text-uppercase"> 
                    <i class="fas fa-save mr-2"></i> Save 
                </button>
            </div>
        </form>

    </div>
</x-backend>