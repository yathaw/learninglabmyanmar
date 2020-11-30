<x-backend>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h2 class="text-center">Course Create Form</h2>
          <form method="post" action="{{route('backside.assignment.store')}}" enctype="multipart/form-data">
            @csrf

            
            <div class="form-group my-3">
                  <label>File(<small class="text-danger">pdf|note|doc</small>)</label>
                  <input type="file" name="filedoc" class="form-control-file @error('filedoc') is-invalid @enderror" >
                  @error('filedoc')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{$message}}</strong>
                  </span>
                  @enderror
               </div>

            <div class="form-group my-3">
              <label>Content:</label>
              <select name="section" class="form-control">
                {{-- <optgroup label="Choose Brand">
                  @foreach($brands as $brand)
                  <option value="{{$brand->id}}">{{$brand->name}}</option>
                  @endforeach
                </optgroup> --}}
                <optgroup label="Choose Section">
                  
                  <option value="">Content 1</option>
                  <option>Content 2</option>
                
                </optgroup>
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