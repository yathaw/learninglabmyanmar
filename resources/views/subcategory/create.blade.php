<x-backend>
<main class="app-content">
   
   <div class="row">
      <div class="col-md-12">
         <div class="tile">
            <h2>Subcategory Create Form</h2>
            <form method="post" action="{{route('subcategory.store')}}">
               @csrf
               <div class="form-group my-3">
                  <label>Name</label>
                  <input type="text" name="sname" class="form-control @error('name')is-invalid @enderror" >
               </div>
               <div class="form-group my-3">
              <label>Categories:</label>
              <select name="category" class="form-control category">
                <optgroup label="Choose Category">
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
               
               <div class="my-3">
                  <input type="submit" name="btnsave" value="save" class="btn btn-info">
                  <a href="{{route('subcategory.index')}}" class="btn btn-info">Back</a>
               </div>
            </form>
         
</main>
</x-backend>