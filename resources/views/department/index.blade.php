@extends('layouts.app')

@section('content')

{{-- Add --}}
<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#centeredDepartment">
	<i class="align-middle mr-2" data-feather="plus"></i>Add
</button>
<div class="modal fade" id="centeredDepartment" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Department</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body m-3">
				<form method="post" action="{{ url('/department') }}">
					@csrf
					<div class="form-group">
						<label for="name">Department Name</label>
						<input type="text" name="department_name" class="form-control @error('department_name') is-invalid @enderror" id="name" placeholder="Department Name" value="{{Request::old('department_name') ? : ''}}">
						<span class="{{$errors->has('department_name') ? 'text-danger' : ''}}">{{$errors->first('department_name')}}</span>
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
@foreach($departments as $department)
<div class="modal fade" id="centeredEditDepartment" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Department</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body m-3">
				<form method="post" action="{{ url('/department', $department->id) }}">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="name">Department Name</label>
						<input type="text" name="department_name" class="form-control" id="name" value="{{ $department->department_name }}">
					</div>
					<div class="form-group">
						<label>Company ID</label>
						<select name="company_id" class="form-control">
							@foreach($companies as $company)
								<option value="{{ $company->id }}" @if($department->company_id == $company->id) selected @endif>{{ $company->id }}: {{ $company->company_name }}</option>
							@endforeach
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Create</button>
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
							<th>Department Name</th>
							<th>Company ID</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($departments as $department)
						<tr>
							<td>{{ $department->department_name }}</td>
							<td>{{ $department->company_id }}: {{ $department->company_name }}</td>
							<td class="table-action">
								<form action="{{ url('/department', $department->id) }}" method="post">
									<a  data-toggle="modal" data-target="#centeredEditDepartment"><i class="align-middle" data-feather="edit-2"></i></a>
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