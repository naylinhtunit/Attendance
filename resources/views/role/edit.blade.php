@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">
	<div class="row justify-content-center">

		<div class="col-xl-7 col-xxl-6">
			<div class="w-100 card p-5">
				
				<form method="post" action="{{ url('/role', $role->id) }}">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="name">Role Name</label>
						<input type="text" name="role_name" class="form-control" id="name" value="{{ $role->role_name }}">
					</div>
					<div class="form-group">
						<label>Company ID</label>
						<select name="company_id" class="form-control">
							@foreach($companies as $company)
								<option value="{{ $company->id }}" @if($role->company_id == $company->id) selected @endif>{{ $company->id }}: {{ $company->company_name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Department ID</label>
						<select name="department_id" class="form-control">
							@foreach($departments as $department)
								<option value="{{ $department->id }}" @if($role->department_id == $department->id) selected @endif>{{ $department->id }}: {{ $department->department_name }}</option>
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