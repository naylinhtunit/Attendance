@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">
	<div class="row justify-content-center">

		<div class="col-xl-7 col-xxl-6">
			<div class="w-100 card p-5">
				
				<form method="post" action="{{ url('/holiday') }}">
					@csrf
					<div class="form-group">
						<label for="holiday_name">Holiday Name</label>
						<input type="text" name="holiday_name" class="form-control @error('holiday_name') is-invalid @enderror" id="holiday_name" placeholder="Holiday Name" value="{{Request::old('holiday_name') ? : ''}}">
						<span class="{{$errors->has('holiday_name') ? 'text-danger' : ''}}">{{$errors->first('holiday_name')}}</span>
					</div>
					<div class="form-group">
						<label for="date">Holiday Date</label>
						<input type="date" name="holiday_date" id="date" class="form-control @error('holiday_date') is-invalid @enderror" value="{{Request::old('holiday_date') ? : ''}}" />
						<span class="{{$errors->has('holiday_date') ? 'text-danger' : ''}}">{{$errors->first('holiday_date')}}</span>
					</div>
					<div class="form-group">
						<label for="year">Year</label>
						<input type="text" class="form-control @error('year') is-invalid @enderror" name="year" id="year" value="{{Request::old('year') ? : ''}}">
						<span class="{{$errors->has('year') ? 'text-danger' : ''}}">{{$errors->first('year')}}</span>
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