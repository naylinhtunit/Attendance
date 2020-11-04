@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">
	<div class="row justify-content-center">

		<div class="col-xl-7 col-xxl-6">
			<div class="w-100 card p-5">
				
				<form method="post" action="{{ url('/attendance', $attendance->id) }}">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label>Company ID</label>
						<select name="company_id" class="form-control">
							@foreach($companies as $company)
								<option value="{{ $company->id }}" @if($attendance->company_id == $company->id) selected @endif>{{ $company->id }}: {{ $company->company_name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Employee ID</label>
						<select name="employee_id" class="form-control">
							@foreach($employees as $employee)
								<option value="{{ $employee->id }}" @if($attendance->employee_id == $employee->id) selected @endif>{{ $employee->id }}: {{ $employee->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Role ID</label>
						<select name="role_id" class="form-control">
							@foreach($roles as $role)
								<option value="{{ $role->id }}" @if($attendance->role_id == $role->id) selected @endif>{{ $role->id }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>CheckIn Time</label>
							<input type="time" name="checkin_time" id="time" class="form-control" value="{{ $attendance->checkin_time }}" />
						</div>
						<div class="form-group col-md-6">
							<label>CheckOut Time</label>
							<input type="time" name="checkout_time" id="time" class="form-control" value="{{ $attendance->checkout_time }}" />
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
				</form>

			</div>
		</div>

	</div>
</div>
@endsection