<x-backend>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h2 class="text-center">Course Create Form</h2>
          <form method="post" action="{{route('course.store')}}" enctype="multipart/form-data">
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
              <label>Subtitle:</label>
              <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" placeholder="Course Subtitle..." value="{{old('subtitle')}}">
              @error('subtitle')
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
              <label>Situation:</label>
              <input type="text" class="form-control @error('situation') is-invalid @enderror" name="situation" placeholder="situation..." value="{{old('situation')}}">
              @error('situation')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group my-3">
              <label>Status:</label>
              <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" placeholder="status..." value="{{old('status')}}">
              @error('status')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group my-3">
              <label>Requirements:</label>
              <input type="text" class="form-control @error('requirement') is-invalid @enderror" name="requirement" placeholder="Requirements..." value="{{old('requirement')}}">
              @error('requirement')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group my-3">
              <label>Outline:</label>
              <textarea class="form-control @error('outline') is-invalid @enderror" name="outline" placeholder="Outline...">{{old('outline')}}</textarea>
              @error('outline')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

           
             <div class="form-group my-3">
              <label>Price:</label>
              <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Rprice..." value="{{old('price')}}">
              @error('price')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group my-3">
              <label>Level:</label>
              <select name="level" class="form-control">
                {{-- <optgroup label="Choose Brand">
                  @foreach($brands as $brand)
                  <option value="{{$brand->id}}">{{$brand->name}}</option>
                  @endforeach
                </optgroup> --}}
                <optgroup label="Choose Brand">
                  
                  <option value="">Level 1</option>
                  <option>Level 2</option>
                
                </optgroup>
              </select>
            </div>

            <div class="form-group my-3">
              <label>Subcategory:</label>
              <select name="subcategory" class="form-control">
                {{-- <optgroup label="Choose Brand">
                  @foreach($brands as $brand)
                  <option value="{{$brand->id}}">{{$brand->name}}</option>
                  @endforeach
                </optgroup> --}}
              </select>
            </div>

            <div class="form-group my-3">
              <label>Instructor:</label>
              <select name="brand" class="form-control">
                {{-- <optgroup label="Choose Brand">
                  @foreach($brands as $brand)
                  <option value="{{$brand->id}}">{{$brand->name}}</option>
                  @endforeach
                </optgroup> --}}
              </select>
            </div>

            <div class="form-group my-3">
              <label>Image: (<small class="text-danger">* jpeg|bmp|png</small>)</label>
              <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror">
              @error('image')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

             <div class="form-group my-3">
              <label>Certificate: (<small class="text-danger">* jpeg|bmp|png</small>)</label>
              <input type="file" name="certificate" class="form-control-file @error('certificate') is-invalid @enderror">
              @error('certificate')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group my-3">
              <label>Video: (<small class="text-danger">* mp4</small>)</label>
              <input type="file" name="video" class="form-control-file @error('video') is-invalid @enderror">
              @error('video')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>



            

            <div class="form-group my-3">
              <input type="submit" name="btnsubmit" value="Save" class="btn btn-success">
            </div>
          </form>
        </div>
      </div>
    </div>
    
</x-backend>