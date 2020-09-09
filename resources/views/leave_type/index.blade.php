@extends('layouts.app')

@section('content')
	
{{-- Add --}}
<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#centeredLeaveType">
	<i class="align-middle mr-2" data-feather="plus"></i>Add
</button>
<div class="modal fade" id="centeredLeaveType" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Leave Type</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body m-3">
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
{{-- end-add --}}
{{-- Edit --}}
@foreach($leaveTypes as $leave)
<div class="modal fade" id="centeredEditLeaveType" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Leave Type</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body m-3">
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
@endforeach
{{-- end-edit --}}
<div class="container-fluid p-0">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Company ID</th>
							<th>Leave Name</th>
							<th>Total Leave</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($leaveTypes as $leave)
						<tr>
							<td>{{ $leave->company_id }}: {{ $leave->company_name }}</td>
							<td>{{ $leave->leave_name }}</td>
							<td>{{ $leave->total_leave }}</td>
							<td class="table-action">
								<form action="{{ url('/leave_type', $leave->id) }}" method="post">
									<a  data-toggle="modal" data-target="#centeredEditLeaveType"><i class="align-middle" data-feather="edit-2"></i></a>
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