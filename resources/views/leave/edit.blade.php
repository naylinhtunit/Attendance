@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">
	<div class="row justify-content-center">

		<div class="col-xl-7 col-xxl-6">
			<div class="w-100 card p-5">
				
				<form method="post" action="{{ url('/leave', $leave->id) }}">
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
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Request Date</label>
							<input type="date" name="request_date" id="date" class="form-control" value="{{ $leave->request_date }}" />
						</div>
						<div class="form-group col-md-6">
							<label>Actual Date</label>
							<input type="date" name="actual_date" id="date" class="form-control" value="{{ $leave->actual_date }}" />
						</div>
					</div>
					<div class="form-row">
						@foreach(config('const.leaveStatus') as $key => $status)
						<div class="form-group col-md-3">
							<label class="custom-control custom-radio">
								<input name="status" type="radio" class="custom-control-input" @if($leave->status == $key) checked @endif value="{{ $key }}">
								<span class="custom-control-label">{{ $status }}</span>
							</label>
						</div>
						@endforeach
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
				</form>

			</div>
		</div>

	</div>
</div>
@endsection