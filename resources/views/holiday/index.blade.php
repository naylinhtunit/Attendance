@extends('layouts.app')

@section('content')

{{-- Add --}}
<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#centeredHoliday">
	<i class="align-middle mr-2" data-feather="plus"></i>Add
</button>
<div class="modal fade" id="centeredHoliday" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Public Holidays</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body m-3">
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
{{-- end-add --}}
{{-- Edit --}}
@foreach($holidays as $holiday)
<div class="modal fade" id="centeredEditHoliday" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Public Holidays</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body m-3">
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
@endforeach
{{-- end-edit --}}
<div class="container-fluid p-0">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Holiday Name</th>
							<th>Holiday Date</th>
							<th>Year</th>
							<th>Company ID</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($holidays as $holiday)
						<tr>
							<td>{{ $holiday->holiday_name }}</td>
							<td>{{ $holiday->holiday_date }}</td>
							<td>{{ $holiday->year }}</td>
							<td>{{ $holiday->company_id }}: {{ $holiday->company_name }}</td>
							<td class="table-action">
								<form action="{{ url('/holiday', $holiday->id) }}" method="post">
									<a  data-toggle="modal" data-target="#centeredEditHoliday"><i class="align-middle" data-feather="edit-2"></i></a>
									@csrf
									@method('DELETE')
									<a href="javascript:void(0);" onclick="$(this).closest('form').submit();"><i class="align-middle" data-feather="trash"></i></a>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection