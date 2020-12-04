<x-backend>
	<div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong> Create New Jobs </strong> </h3>
        </div>

        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('panel') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('backside.jobtitles.index') }}">List</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> New </li>
                </ol>
            </nav>
        </div>
    </div>

	<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
					<form action="{{route('backside.jobtitles.store')}}" method="POST">
						@csrf
						<div class="form-group col-md-12 mb-4">
							<label for="user_name" class="form-label"> Job Title </label>
							<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Eg - Web Developer">

							@error('name')
							    <div class="text-danger">{{ $message }}</div>
							@enderror
						</div>

						<input type="submit" name="" class="btn custom_primary_btnColor" value="Save">
						
					</form>
				</div>
			</div>
		</div>
	</div>
</x-backend>