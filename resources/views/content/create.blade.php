<x-backend>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h2 class="text-center">Course Create Form</h2>
          <form method="post" action="{{route('backside.content.store')}}" enctype="multipart/form-data">
            @csrf

            


            <div class="form-group my-3">
              <label>Title:</label>
              <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Course Title..." value="{{old('title')}}">
              @error('title')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div> 

            <div class="form-group my-3">
              <label>Description:</label>
              <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Item Detail Description...">{{old('description')}}</textarea>
              @error('description')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

              
            <div class="form-group my-3">
              <label>Sorting:</label>
              <input type="text" name="sorting" class="form-control @error('sorting') is-invalid @enderror" placeholder="Course sorting..." value="{{old('sorting')}}">
              @error('sorting')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>          



        
            <div class="form-group my-3">
              <label>Content Type:</label>
              <select name="section" class="form-control">
                {{-- <optgroup label="Choose Brand">
                  @foreach($brands as $brand)
                  <option value="{{$brand->id}}">{{$brand->name}}</option>
                  @endforeach
                </optgroup> --}}
                <optgroup label="Choose Section">
                  
                  <option value="">Section 1</option>
                  <option>Section 2</option>
                
                </optgroup>
              </select>
            </div>

            <div class="form-group my-3">
              <label>Section:</label>
              <select name="course" class="form-control">
                {{-- <optgroup label="Choose Brand">
                  @foreach($brands as $brand)
                  <option value="{{$brand->id}}">{{$brand->name}}</option>
                  @endforeach
                </optgroup> --}}
              </select>
            </div>
                

            <div class="form-group my-3">
              <input type="submit" name="btnsubmit" value="Save" class="btn btn-success">
            </div>
          </form>
        </div>
      </div>
    </div>
    
</x-backend>