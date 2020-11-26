<x-backend>
	<div class="container">
		<div class="card">
			<h1 class="mt-5 text-center">Create instructor account</h1>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="row my-4">
					<div class="col-md-5 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-1">
						<div class="form-group">
							<label for="user_name" class="form-label">User Name</label>
							<input type="text" name="user_name" id="user_name" class="form-control">
						</div>
					</div>

					<div class="col-md-5 col-sm-10 col-10 offset-1  offset-md-0">
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
							<label for="headline" class="form-label">Headline</label>
							<input type="text" name="headline" id="headline" class="form-control">
						</div>
					</div>

					<div class="col-md-5 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-0">
						<div class="form-group">
							<label for="biography" class="form-label">Biography</label>
							<textarea name="biography" id="biography" class="form-control"></textarea>
						</div>
					</div>
				</div>

				<div class="row my-4">
					<div class="col-md-5 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-1">
						<div class="form-group">
							<label for="website" class="form-label">Website</label>
							<input type="text" name="website" id="website" class="form-control">
						</div>
					</div>

					<div class="col-md-5 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-0">
						<div class="form-group">
							<label for="twitter" class="form-label">Twitter</label>
							<input type="text"  name="twitter" id="twitter" class="form-control"/>
						</div>
					</div>
				</div>

				<div class="row my-4">
					<div class="col-md-5 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-1">
						<div class="form-group">
							<label for="facebook" class="form-label">Facebook</label>
							<input type="text" name="facebook" id="facebook" class="form-control">
						</div>
					</div>

					<div class="col-md-5 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-0">
						<div class="form-group">
							<label for="linkedin" class="form-label">Linkedin</label>
							<input type="text"  name="linkedin" id="linkedin" class="form-control"/>
						</div>
					</div>
				</div>

				<div class="row my-4">
					<div class="col-md-5 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-1">
						<div class="form-group">
							<label for="youtube" class="form-label">Youtube</label>
							<input type="text"  name="youtube" id="youtube" class="form-control"/>
						</div>
					</div>

					<div class="col-md-5 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-0">
						<div class="form-group">
							<label for="instagram" class="form-label">Instagram</label>
							<input type="text" name="instagram" id="instagram" class="form-control">
						</div>
					</div>
				</div>

				<div class="row my-5">
					<div class="col-md-10 col-sm-10 col-10 offset-1 offset-sm-1 offset-md-1">
						<input type="submit" name="" class="btn custom_primary_btnColor w-100">
					</div>
				</div>
				
			</form>
		</div>
	</div>
</x-backend>