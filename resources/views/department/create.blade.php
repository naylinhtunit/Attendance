@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">
	<div class="row justify-content-center">

		<div class="col-xl-7 col-xxl-6">
			<div class="w-100 card p-5">
				
				<form method="post" action="{{ url('/department') }}">
					@csrf
					<div class="form-group">
						<label for="name">Department Name</label>
						<input type="text" name="department_name" class="form-control @error('department_name') is-invalid @enderror" id="name" placeholder="Department Name" value="{{Request::old('department_name') ? : ''}}">
						<span class="{{$errors->has('department_name') ? 'text-danger' : ''}}">{{$errors->first('department_name')}}</span>
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
					<button type="submit" class="btn btn-primary">Create</button>
				</form>

			</div>
		</div>

	</div>
</div>
@endsection