@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">
	<div class="row justify-content-center">

		<div class="col-xl-7 col-xxl-6">
			<div class="w-100 card p-5">
				
				<form method="post" action="{{ url('/holiday', $holiday->id) }}">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="holiday_name">Holiday Name</label>
						<input type="text" name="holiday_name" class="form-control" id="holiday_name" value="{{ $holiday->holiday_name }}">
					</div>
					<div class="form-group">
						<label for="date">Holiday Date</label>
						<input type="date" name="holiday_date" id="date" class="form-control" value="{{ $holiday->holiday_date }}"/>
					</div>
					<div class="form-group">
						<label for="year">Year</label>
						<input type="text" name="year" class="form-control" id="year" value="{{ $holiday->year }}">
					</div>
					<div class="form-group">
						<label>Company ID</label>
						<select name="company_id" class="form-control">
							@foreach($companies as $company)
								<option value="{{ $company->id }}" @if($holiday->company_id == $company->id) selected @endif>{{ $company->id }}: {{ $company->company_name }}</option>
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