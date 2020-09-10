@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">
	<div class="row justify-content-center">

		<div class="col-xl-7 col-xxl-6">
			<div class="w-100 card p-5">
				
				<form method="post" action="{{ url('/department', $department->id) }}">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="name">Department Name</label>
						<input type="text" name="department_name" class="form-control" id="name" value="{{ $department->department_name }}">
					</div>
					<div class="form-group">
						<label>Company ID</label>
						<select name="company_id" class="form-control">
							@foreach($companies as $company)
								<option value="{{ $company->id }}" @if($department->company_id == $company->id) selected @endif>{{ $company->id }}: {{ $company->company_name }}</option>
							@endforeach
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
				</form>

			</div>
		</div>

	</div>
</div>
@endsection