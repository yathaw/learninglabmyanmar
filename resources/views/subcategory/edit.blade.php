<x-backend>
<main class="app-content">
   <div class="app-title">
      <div>
         <h1><i class="fa fa-dashboard"></i> Learning Lab Myanmar</h1>
         <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
         <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
         <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
      </ul>
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="tile">
            <h2>Subcategory Create Form</h2>
            <form method="post" action="{{route('subcategory.update',$subcategory->id)}}">
               @csrf
               @method('PUT')
               <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="sname" value="{{$subcategory->name}}" class="form-control @error('sname')is-invalid @enderror" >
               </div>
               <div class="form-group">
              <label>Categories:</label>
              <select name="category" class="form-control category">
                <optgroup label="Choose Category">
                  @foreach($categories as $category)
                  <option value="{{$category->id}}" @if($category->id == $subcategory->category_id) {{'selected'}} @endif>{{$category->name}}</option>
                  @endforeach
                </optgroup>
              </select>
            </div>
               
               <div>
                  <input type="submit" name="btnsave" value="save" class="btn btn-info">
                  <a href="{{route('subcategory.index')}}" class="btn btn-info">Back</a>
               </div>
            </form>
         </div>
      </div>
   </div>
</main>
</x-backend>