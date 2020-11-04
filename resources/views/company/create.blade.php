@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">
	<div class="row justify-content-center">

		<div class="col-xl-7 col-xxl-6">
			<div class="w-100 card p-5">

				<form method="post" action="{{ url('/company') }}" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="name">Company Name</label>
						<input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" id="name" placeholder="Company Name" value="{{Request::old('company_name') ? : ''}}" />
						<span class="{{$errors->has('company_name') ? 'text-danger' : ''}}">{{$errors->first('company_name')}}</span>
					</div>
					<div class="form-group">
						<label for="inputAddress">Address</label>
						<input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="inputAddress" placeholder="1234 Main St" value="{{Request::old('address') ? : ''}}" />
						<span class="{{$errors->has('address') ? 'text-danger' : ''}}">{{$errors->first('address')}}</span>
					</div>
					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="09123456789" value="{{Request::old('phone') ? : ''}}" />
						<span class="{{$errors->has('phone') ? 'text-danger' : ''}}">{{$errors->first('phone')}}</span>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="latitude">Latitude</label>
							<input type="text" name="latitude" class="form-control @error('latitude') is-invalid @enderror" id="latitude" placeholder="16.807907" value="{{Request::old('latitude') ? : ''}}" />
							<span class="{{$errors->has('latitude') ? 'text-danger' : ''}}">{{$errors->first('latitude')}}</span>
						</div>
						<div class="form-group col-md-6">
							<label for="longitude">Longitude</label>
							<input type="text" name="longitude" class="form-control @error('longitude') is-invalid @enderror" id="longitude" placeholder="96.213001" value="{{Request::old('longitude') ? : ''}}" />
							<span class="{{$errors->has('longitude') ? 'text-danger' : ''}}">{{$errors->first('longitude')}}</span>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Start Office Hours</label>
							<input type="time" name="start_office_hours" id="time" class="form-control @error('start_office_hours') is-invalid @enderror" value="{{Request::old('start_office_hours') ? : ''}}" />
							<span class="{{$errors->has('start_office_hours') ? 'text-danger' : ''}}">{{$errors->first('start_office_hours')}}</span>
						</div>
						<div class="form-group col-md-6">
							<label>End Office Hours</label>
							<input type="time" name="end_office_hours" id="time" class="form-control @error('end_office_hours') is-invalid @enderror" value="{{Request::old('end_office_hours') ? : ''}}" />
							<span class="{{$errors->has('end_office_hours') ? 'text-danger' : ''}}">{{$errors->first('end_office_hours')}}</span>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Start Pay Date</label>
							<input type="date" name="start_pay_date" id="date" class="form-control @error('start_pay_date') is-invalid @enderror" value="{{Request::old('start_pay_date') ? : ''}}" />
							<span class="{{$errors->has('start_pay_date') ? 'text-danger' : ''}}">{{$errors->first('start_pay_date')}}</span>
						</div>
						<div class="form-group col-md-6">
							<label>End Pay Date</label>
							<input type="date" name="end_pay_date" id="date" class="form-control @error('end_pay_date') is-invalid @enderror" value="{{Request::old('end_pay_date') ? : ''}}" />
							<span class="{{$errors->has('end_pay_date') ? 'text-danger' : ''}}">{{$errors->first('end_pay_date')}}</span>
						</div>
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