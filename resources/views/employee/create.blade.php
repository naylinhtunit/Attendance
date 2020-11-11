@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">
	<div class="row justify-content-center">

		<div class="col-xl-7 col-xxl-6">
			<div class="w-100 card p-5">

				<form action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data">

					@csrf
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name"  value="{{Request::old('name') ? : ''}}" />
						<span class="{{$errors->has('name') ? 'text-danger' : ''}}">{{$errors->first('name')}}</span>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email"  value="{{Request::old('email') ? : ''}}" />
						<span class="{{$errors->has('email') ? 'text-danger' : ''}}">{{$errors->first('email')}}</span>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password"  value="{{Request::old('password') ? : ''}}" />
						<span class="{{$errors->has('password') ? 'text-danger' : ''}}">{{$errors->first('password')}}</span>
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
					<div class="form-group">
						<label>Role ID</label>
						<select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
							@foreach($roles as $role)
								<option value="{{ $role->id }}">{{ $role->id }}: {{ $role->role_name }}</option>
							@endforeach
						</select>
						<span class="{{$errors->has('role_id') ? 'text-danger' : ''}}">{{$errors->first('role_id')}}</span>
					</div>
					<div class="form-group">
						<label>Gender</label>
						<select name="gender" class="form-control @error('gender') is-invalid @enderror">
							@foreach(config('const.gender') as $key => $gender)
								<option value="{{ $key }}">{{ $gender }}</option>
							@endforeach
						</select>
						<span class="{{$errors->has('gender') ? 'text-danger' : ''}}">{{$errors->first('gender')}}</span>
					</div>
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="09123456789" value="{{Request::old('phone') ? : ''}}" />
						<span class="{{$errors->has('phone') ? 'text-danger' : ''}}">{{$errors->first('phone')}}</span>
					</div>
					<div class="form-group">
						<label for="inputAddress">Address</label>
						<input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="inputAddress" placeholder="1234 Main St" value="{{Request::old('address') ? : ''}}" />
						<span class="{{$errors->has('address') ? 'text-danger' : ''}}">{{$errors->first('address')}}</span>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Join Date</label>
							<input type="date" name="join_date" id="date" class="form-control @error('join_date') is-invalid @enderror" value="{{Request::old('join_date') ? : ''}}" />
							<span class="{{$errors->has('join_date') ? 'text-danger' : ''}}">{{$errors->first('join_date')}}</span>
						</div>
						<div class="form-group col-md-6">
							<label>Resign Date</label>
							<input type="date" name="resign_date" id="date" class="form-control @error('resign_date') is-invalid @enderror" value="{{Request::old('resign_date') ? : ''}}" />
							<span class="{{$errors->has('resign_date') ? 'text-danger' : ''}}">{{$errors->first('resign_date')}}</span>
						</div>
					</div>
					<div class="form-group">
						<label for="salary">Salary</label>
						<input type="number" name="salary" class="form-control @error('salary') is-invalid @enderror" id="salary" placeholder="Salary"  value="{{Request::old('salary') ? : ''}}" />
						<span class="{{$errors->has('salary') ? 'text-danger' : ''}}">{{$errors->first('salary')}}</span>
					</div>
					<div class="form-group">
						<input name="image" type="file" id="input-file-now" data-allowed-file-extensions="png jpg jpeg svg" class="dropify @error('image') is-invalid @enderror" />    
						<span class="{{$errors->has('image') ? 'text-danger' : ''}}">{{$errors->first('image')}}</span>
					</div>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>

			</div>
		</div>

	</div>
</div>
<script>
// Image Upload
$(document).ready(function(){
    $('.dropify').dropify();
});
</script>
@endsection