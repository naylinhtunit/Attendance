@extends('layouts.app')

@section('content')

<div class="container-fluid p-0">
	<div class="row justify-content-center">

		<div class="col-xl-7 col-xxl-6">
			<div class="w-100 card p-5">
				
				<form method="post" action="{{ url('/leave_type') }}">
					@csrf
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
						<label for="leave_name">Leave Name</label>
						<input type="text" name="leave_name" class="form-control @error('leave_name') is-invalid @enderror" id="leave_name" placeholder="Leave Name" value="{{Request::old('leave_name') ? : ''}}">
						<span class="{{$errors->has('leave_name') ? 'text-danger' : ''}}">{{$errors->first('leave_name')}}</span>
					</div>
					<div class="form-group">
						<label for="total_leave">Total Leave</label>
						<input type="number" name="total_leave" id="total_leave" class="form-control @error('total_leave') is-invalid @enderror" placeholder="12" value="{{Request::old('total_leave') ? : ''}}" />
						<span class="{{$errors->has('total_leave') ? 'text-danger' : ''}}">{{$errors->first('total_leave')}}</span>
					</div>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>

			</div>
		</div>

	</div>
</div>
@endsection