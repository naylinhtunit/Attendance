@extends('layouts.app')

@section('content')

{{-- Add --}}
<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#centeredLeave">
	<i class="align-middle mr-2" data-feather="plus"></i>Add
</button>
<div class="modal fade" id="centeredLeave" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Leave</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body m-3">
				<form method="post" action="{{ url('/leave') }}">
					@csrf
					<div class="form-group">
						<label>Company ID</label>
						<select name="company_id" class="form-control">
							@foreach($companies as $company)
								<option value="{{ $company->id }}">{{ $company->id }}: {{ $company->company_name }}</option>
							@endforeach
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>
		</div>
	</div>
</div>
{{-- end-add --}}
{{-- Edit --}}
@foreach($leaves as $leave)
<div class="modal fade" id="centeredEditLeave" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Leave</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body m-3">
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
							<th>Request Date</th>
							<th>Actual Date</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($leaves as $leave)
						<tr>
							<td>{{ $leave->company_id }}: {{ $leave->company_name }}</td>
							<td>{{ $leave->request_date }}</td>
							<td>{{ $leave->actual_date }}</td>
							<td class="table-action">
								<form action="{{ url('/leave', $leave->id) }}" method="post">
									<a  data-toggle="modal" data-target="#centeredEditLeave"><i class="align-middle" data-feather="edit-2"></i></a>
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