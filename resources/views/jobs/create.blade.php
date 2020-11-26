<x-backend>
	<div class="container">
			<h1 class="mt-5">Create Jobtitle</h1>
			<form action="{{route('jobtitles.store')}}" method="POST">
				@csrf
				<div class="form-group my-4 col-md-6">
					<label for="user_name" class="form-label">Name</label>
					<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">

					@error('name')
					    <div class="text-danger">{{ $message }}</div>
					@enderror
				</div>

				<input type="submit" name="" class="btn custom_primary_btnColor" value="Create">
				
			</form>
	</div>
</x-backend>