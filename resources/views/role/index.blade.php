@extends('layouts.app')

@section('content')

{{-- Add --}}
<button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#centeredRole">
	<i class="align-middle mr-2" data-feather="plus"></i>Add
</button>
<div class="modal fade" id="centeredRole" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Role</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body m-3">
				<form method="post" action="{{ url('/role') }}">
					@csrf
					<div class="form-groupl @error('role_name') is-invalid @enderror">
						<label for="name">Role Name</label>
						<input type="text" name="role_name" class="form-control" id="name" placeholder="Role Name">
						<span class="{{$errors->has('role_name') ? 'text-danger' : ''}}">{{$errors->first('role_name')}}</span>
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
					<div class="form-group">
						<label>Department ID</label>
						<select name="department_id" class="form-control @error('department_id') is-invalid @enderror">
							@foreach($departments as $department)
								<option value="{{ $department->id }}">{{ $department->id }}: {{ $department->department_name }}</option>
							@endforeach
						</select>
						<span class="{{$errors->has('department_id') ? 'text-danger' : ''}}">{{$errors->first('department_id')}}</span>
					</div>
					<button type="submit" class="btn btn-primary">Create</button>
				</form>
			</div>
		</div>
	</div>
</div>
{{-- end-add --}}
{{-- Edit --}}
@foreach($roles as $role)
<div class="modal fade" id="centeredEditRole" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Role</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body m-3">
				<form method="post" action="{{ url('/role', $role->id) }}">
					@csrf
					@method('PUT')
					<div class="form-group">
						<label for="name">Role Name</label>
						<input type="text" name="role_name" class="form-control" id="name" value="{{ $role->role_name }}">
					</div>
					<div class="form-group">
						<label>Company ID</label>
						<select name="company_id" class="form-control">
							@foreach($companies as $company)
								<option value="{{ $company->id }}" @if($role->company_id == $company->id) selected @endif>{{ $company->id }}: {{ $company->company_name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Department ID</label>
						<select name="department_id" class="form-control">
							@foreach($departments as $department)
								<option value="{{ $department->id }}" @if($role->department_id == $department->id) selected @endif>{{ $department->id }}: {{ $department->department_name }}</option>
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
							<th>Department ID</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($roles as $role)
						<tr>
							<td>{{ $role->role_name }}</td>
							<td>{{ $role->company_id }}: {{ $role->company_name }}</td>
							<td>{{ $role->department_id }}: {{ $role->department_name }}</td>
							<td class="table-action">
								<form action="{{ url('/role', $role->id) }}" method="post">
									<a  data-toggle="modal" data-target="#centeredEditRole"><i class="align-middle" data-feather="edit-2"></i></a>
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