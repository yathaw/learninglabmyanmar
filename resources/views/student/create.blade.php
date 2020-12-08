<x-backend>
	<div class="container">
		<div class="card">
			<h1 class="mt-5 text-center">Create student account</h1>
			<form action="{{route('backside.students.store')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row my-4">
					<div class="col-md-5 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-1">
						<div class="form-group">
							<label for="user_name" class="form-label">User Name</label>
							<input type="text" name="user_name" id="user_name" class="form-control">
						</div>
					</div>

					<div class="col-md-5 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-0">
						<div class="form-group">
							<label for="email" class="form-label">Email</label>
							<input type="email" name="email" id="email" class="form-control">
						</div>
					</div>
				</div>

				<div class="row my-4">
					<div class="col-md-5 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-1">
						<div class="form-group">
							<label for="password" class="form-label">Password</label>
							<input type="password" name="password" id="password" class="form-control">
						</div>
					</div>

					<div class="col-md-5 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-0">
						<div class="form-group">
							<label for="confirm_password" class="form-label">Confirm Password</label>
							<input type="password" name="confirm_password" id="confirm_password" class="form-control">
						</div>
					</div>
				</div>

				<div class="row my-4">
					<div class="col-md-5 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-1">
						<div class="form-group">
							<label for="phone" class="form-label">Phone</label>
							<input type="number" name="phone" id="phone" class="form-control">
						</div>
					</div>

					<div class="col-md-5 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-0">
						<div class="form-group">
							<label for="profile" class="form-label">Profile</label>
							<input type="file" name="profile" id="profile" class="form-control">
						</div>
					</div>
				</div>

				<div class="row my-3">
					<div class="col-md-10 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-1">
						<button type="submit" class="btn custom_primary_btnColor w-100">Save</button>
					</div>
				</div>
				
			</form>
		</div>
	</div>
</x-backend>