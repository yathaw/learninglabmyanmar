<x-backend>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h2 class="text-center">Attachment Create Form</h2>
          <form method="post" action="{{route('attachment.store')}}" enctype="multipart/form-data">
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
                  <label>Score</label>
                  <input type="text" name="score" class="form-control @error('score')is-invalid @enderror" >
               </div>
               {{-- <div class="form-group my-3">
                  <label>Status</label>
                  <input type="text" name="status" class="form-control @error('status')is-invalid @enderror" >
               </div> --}}


            <div class="form-group my-3">
              <label>User:</label>
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
              <label>Assignment:</label>
              <select name="assignment" class="form-control">
                {{-- <optgroup label="Choose Brand">
                  @foreach($brands as $brand)
                  <option value="{{$brand->id}}">{{$brand->name}}</option>
                  @endforeach
                </optgroup> --}}
                <optgroup label="Choose Assignment">
                  
                  <option value="">A 1</option>
                  <option>A 2</option>
                
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