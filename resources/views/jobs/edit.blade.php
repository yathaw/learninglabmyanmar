<x-backend>
	<div class="container">
			<h1 class="mt-5">Update Jobtitle</h1>
			<form action="{{route('backside.jobtitles.update',$jobtitle->id)}}" method="POST">
				@csrf
				@method('PUT')
				<div class="form-group my-4 col-md-6">
					<label for="user_name" class="form-label">Name</label>
					<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$jobtitle->name}}">

					@error('name')
					    <div class="text-danger">{{ $message }}</div>
					@enderror
				</div>

				<input type="submit" name="" class="btn custom_primary_btnColor" value="Update">
				
			</form>
	</div>
</x-backend>