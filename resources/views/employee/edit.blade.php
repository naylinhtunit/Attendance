@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">
	<div class="row justify-content-center">

		<div class="col-xl-7 col-xxl-6">
			<div class="w-100 card p-5">

				<form method="post" action="{{route('employee.update',$employee->id)}}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" class="form-control" id="name" value="{{ $employee->name }}">
						<span class="{{$errors->has('name') ? 'helper-text red-text' : ''}}">{{$errors->first('name')}}</span>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control" id="email" value="{{ $employee->email }}">
						<span class="{{$errors->has('email') ? 'helper-text red-text' : ''}}">{{$errors->first('email')}}</span>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control" id="password" value="{{Request::old('password') ? : ''}}">
						<span class="{{$errors->has('password') ? 'helper-text red-text' : ''}}">{{$errors->first('password')}}</span>
					</div>
					<div class="form-group">
						<label>Company ID</label>
						<select name="company_id" class="form-control">
							@foreach($companies as $company)
								<option value="{{ $company->id }}" @if($employee->company_id == $company->id) selected @endif>{{ $company->id }}: {{ $company->company_name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Department ID</label>
						<select name="department_id" class="form-control">
							@foreach($departments as $department)
								<option value="{{ $department->id }}" @if($employee->department_id == $department->id) selected @endif>{{ $department->id }}: {{ $department->department_name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Role ID</label>
						<select name="role_id" class="form-control">
							@foreach($roles as $role)
								<option value="{{ $role->id }}" @if($employee->role_id == $role->id) selected @endif>{{ $role->id }}: {{ $role->role_name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Gender</label>
						<select name="gender" class="form-control">
							@foreach(config('const.gender') as $key => $gender)
								<option value="{{ $key }}" @if($key == $employee->gender) selected @endif>{{ $gender }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="number" name="phone" class="form-control" id="phone" value="{{ $employee->phone }}">
						<span class="{{$errors->has('phone') ? 'helper-text red-text' : ''}}">{{$errors->first('phone')}}</span>
					</div>
					<div class="form-group">
						<label for="inputAddress">Address</label>
						<input type="text" name="address" class="form-control" id="inputAddress" value="{{ $employee->address }}">
						<span class="{{$errors->has('address') ? 'helper-text red-text' : ''}}">{{$errors->first('address')}}</span>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Join Date</label>
							<input type="date" name="join_date" id="date" class="form-control" value="{{ $employee->join_date }}" />
						</div>
						<div class="form-group col-md-6">
							<label>Resign Date</label>
							<input type="date" name="resign_date" id="date" class="form-control" value="{{ $employee->resign_date }}" />
						</div>
					</div>
					<div class="form-group">
						<label for="salary">Salary</label>
						<input type="number" name="salary" class="form-control" id="salary" value="{{ $employee->salary }}">
						<span class="{{$errors->has('salary') ? 'helper-text red-text' : ''}}">{{$errors->first('salary')}}</span>
					</div>
					<div class="form-group">
						<input name="image" type="file" id="input-file-now" value="{{ asset('/img/employee/'.$employee->image) }}" data-default-file="{{ asset('/img/employee/'.$employee->image) }}" data-allowed-file-extensions="png jpg jpeg svg" class="dropify" />   
						<span class="{{$errors->has('image') ? 'helper-text red-text' : ''}}">{{$errors->has('image') ? $errors->first('image') : ''}}</span>
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
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