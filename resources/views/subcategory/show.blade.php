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
    <h2>SubCategory Detail</h2>
    <P>{{$subcategory->name}}</P>
    <p> {{$subcategory->category->name}} </p>
    </div>
  </div>
  
  </div>
</main>
</x-backend>