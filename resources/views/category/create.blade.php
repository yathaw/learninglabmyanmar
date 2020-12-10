<x-backend>
<main class="app-content">
   
   <div class="row">
      <div class="col-md-12">
         <div class="tile">
            <h2>Category Create Form</h2>
            <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
               @csrf
               <div class="form-group my-3">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" >
               </div>
               <div>
                  <input type="submit" name="btnsave" value="save" class="btn btn-info">
                  <a href="{{route('category.index')}}" class="btn btn-info">Back</a>
               </div>
            </form>
         </div>
      </div>
   </div>
</main>
</x-backend>