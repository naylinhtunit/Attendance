@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">
	<div class="row justify-content-center">

		<div class="col-xl-7 col-xxl-6">
			<div class="w-100 card p-5">
				
				<form method="post" action="{{ url('/leave_type', $leave->id) }}">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label>Company ID</label>
						<select name="company_id" class="form-control">
							@foreach($companies as $company)
								<option value="{{ $company->id }}" @if($leave->company_id == $company->id) selected @endif>{{ $company->id }}: {{ $company->company_name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="leave_name">Leave Name</label>
						<input type="text" name="leave_name" class="form-control" id="leave_name" value="{{ $leave->leave_name }}">
					</div>
					<div class="form-group">
						<label for="total_leave">Total Leave</label>
						<input type="number" name="total_leave" id="total_leave" class="form-control" value="{{ $leave->total_leave }}"/>
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
				</form>

			</div>
		</div>

	</div>
</div>
@endsection