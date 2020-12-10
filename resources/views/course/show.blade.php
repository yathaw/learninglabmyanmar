<x-backend>
   <div class="row mb-2 mb-xl-3">
      <div class="col-auto d-none d-sm-block">
         <h3><strong> Course Detail </strong> </h3>
      </div>
   </div>
   <div class="row">
    
      <div class="col-6 col-md-6">  
         <img src="{{asset($course->image)}}" alt="Unsplash" class="img-responsive w-50">
            <h5 class="card-title mb-0 my-2"> {{ $course->title }} </h5>
            <div class="badge bg-success my-2">Finished</div>
      </div>

      <div class="col-6 col-md-6 ">
           
         <p> This Course Includes : </p>
         <p> 
            <i class="align-middle mr-2" data-feather="play-circle"></i>
            <small class="pl-3"> 0 hours on-demand video </small>
         </p>
         <p> 
            <i class="align-middle mr-2" data-feather="file"></i>
            <small class="pl-3"> 0 Articles </small>
         </p>
         <p> 
            <i class="align-middle mr-2" data-feather="check-square"></i>
            <small class="pl-3"> 0 Assignments </small>
         </p>
         @if($course->certificate == "on")
         <p> 
            <i class="align-middle mr-2" data-feather="award"></i> 
            <small class="pl-3"> Certificate of completion </small>
         </p>
         @endif
         <p> 
            <i class="align-middle mr-2" data-feather="dollar-sign"></i> 
            <small class="pl-3"> {{ $course->price }} Ks </small>
         </p>
            <img src="{{ asset('backend/img/avatars/avatar-3.jpg') }}" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
            <img src="{{ asset('backend/img/avatars/avatar-2.jpg') }}" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
            <img src="{{ asset('backend/img/avatars/avatar.jpg') }}" class="rounded-circle mr-1" alt="Avatar" width="28" height="28">
      </div>
   </div>

         <div class="row my-5">
            <ul class="list-group list-group-flush">
               <li class="list-group-item px-4 pb-4">
                  <p class="mb-2 font-weight-bold">Progress <span class="float-right">100%</span></p>
                  <div class="progress progress-sm">
                     <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                        style="width: 100%;">
                     </div>
                  </div>
               </li>
            </ul>
         </div>
   
  

 
   @section('script_content')
   <script type="text/javascript">
      $(document).ready(function() {
      
        $('#listTable').DataTable();
      
      });
      
      
   </script>
   @stop
</x-backend>