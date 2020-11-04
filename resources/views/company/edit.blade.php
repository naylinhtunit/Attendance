@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">
	<div class="row justify-content-center">

		<div class="col-xl-7 col-xxl-6">
			<div class="w-100 card p-5">

				<form method="post" action="{{ url('/company', $company->id) }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="name">Company Name</label>
						<input type="text" name="company_name" class="form-control" id="name" value="{{ $company->company_name }}">
					</div>
					<div class="form-group">
						<label for="inputAddress">Address</label>
						<input type="text" name="address" class="form-control" id="inputAddress" value="{{ $company->address }}">
					</div>
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="number" name="phone" class="form-control" id="phone" value="{{ $company->phone }}">
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="latitude">Latitude</label>
							<input type="text" name="latitude" class="form-control" id="latitude" value="{{ $company->latitude }}">
						</div>
						<div class="form-group col-md-6">
							<label for="longitude">Longitude</label>
							<input type="text" name="longitude" class="form-control" id="longitude" value="{{$company->longitude}}">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Start Office Hours</label>
							<input type="time" name="start_office_hours" id="time" class="form-control" value="{{ $company->start_office_hours }}" />
						</div>
						<div class="form-group col-md-6">
							<label>End Office Hours</label>
							<input type="time" name="end_office_hours" id="time" class="form-control" value="{{ $company->end_office_hours }}" />
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Start Pay Date</label>
							<input type="date" name="start_pay_date" id="date" class="form-control" value="{{ $company->start_pay_date }}" />
						</div>
						<div class="form-group col-md-6">
							<label>End Pay Date</label>
							<input type="date" name="end_pay_date" id="date" class="form-control" value="{{ $company->end_pay_date }}" />
						</div>
					</div>
					<div class="form-group">
						<input name="image" type="file" id="input-file-now" value="{{ asset('/img/company/'.$company->avatar) }}" data-default-file="{{ asset('/img/company/'.$company->avatar) }}" data-allowed-file-extensions="png jpg jpeg svg" class="dropify" />
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