@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">
	<div class="row justify-content-center">

		<div class="col-xl-7 col-xxl-6">
			<div class="w-100 card p-5">
				
				<form method="post" action="{{ url('/attendance') }}">
					@csrf
					<div class="form-group">
						<label>Company ID</label>
						<select name="company_id" class="form-control">
							@foreach($companies as $company)
								<option value="{{ $company->id }}">{{ $company->id }}: {{ $company->company_name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Employee ID</label>
						<select name="employee_id" class="form-control">
							@foreach($employees as $employee)
								<option value="{{ $employee->id }}">{{ $employee->id }}: {{ $employee->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Role ID</label>
						<select name="role_id" class="form-control">
							@foreach($roles as $role)
								<option value="{{ $role->id }}">{{ $role->id }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>CheckIn Time</label>
							<input type="time" name="checkin_time" id="time" class="form-control @error('checkin_time') is-invalid @enderror" value="{{Request::old('checkin_time') ? : ''}}" />
							<span class="{{$errors->has('checkin_time') ? 'text-danger' : ''}}">{{$errors->first('checkin_time')}}</span>
						</div>
						<div class="form-group col-md-6">
							<label>CheckOut Time</label>
							<input type="time" name="checkout_time" id="time" class="form-control @error('checkout_time') is-invalid @enderror" value="{{Request::old('checkout_time') ? : ''}}" />
							<span class="{{$errors->has('checkout_time') ? 'text-danger' : ''}}">{{$errors->first('checkout_time')}}</span>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>

			</div>
		</div>

	</div>
</div>
@endsection