@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">
	<div class="row justify-content-center">

		<div class="col-xl-7 col-xxl-6">
			<div class="w-100 card p-5">
				
				<form method="post" action="{{ url('/role') }}">
					@csrf
					<div class="form-groupl @error('role_name') is-invalid @enderror">
						<label for="name">Role Name</label>
						<input type="text" name="role_name" class="form-control @error('role_name') is-invalid @enderror" id="name" placeholder="Role Name" value="{{Request::old('role_name') ? : ''}}">
						<span class="{{$errors->has('role_name') ? 'text-danger' : ''}}">{{$errors->first('role_name')}}</span>
					</div>
					<div class="form-group">
						<label>Company ID</label>
						<select name="company_id" class="form-control @error('company_id') is-invalid @enderror">
							@foreach($companies as $company)
								<option value="{{ $company->id }}">{{ $company->id }}: {{ $company->company_name }}</option>
							@endforeach
						</select>
						<span class="{{$errors->has('company_id') ? 'text-danger' : ''}}">{{$errors->first('company_id')}}</span>
					</div>
					<div class="form-group">
						<label>Department ID</label>
						<select name="department_id" class="form-control @error('department_id') is-invalid @enderror">
							@foreach($departments as $department)
								<option value="{{ $department->id }}">{{ $department->id }}: {{ $department->department_name }}</option>
							@endforeach
						</select>
						<span class="{{$errors->has('department_id') ? 'text-danger' : ''}}">{{$errors->first('department_id')}}</span>
					</div>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>

			</div>
		</div>

	</div>
</div>
@endsection