@extends('layouts.app')

@section('content')

<a href="{{route('employee.create')}}" class="btn btn-success mb-2"><i class="align-middle mr-2" data-feather="plus"></i>Add </a>
<div class="container-fluid p-0">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Company ID</th>
							<th>Department ID</th>
							<th>Role ID</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Address</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($employees as $employee)
						<tr>
							<td>
								<img src="{{ asset(''.$employee->image) }}" width="48" height="48" class="rounded-circle mr-2" alt=""> {{ $employee->name }}
							</td>
							<td>{{ $employee->company_id }}</td>
							<td>{{ $employee->department_id }}</td>
							<td>{{ $employee->role_id }}</td>
							<td>{{ $employee->email }}</td>
							<td>{{ $employee->phone }}</td>
							<td>{{ $employee->address }}</td>
							<td class="table-action">
								<form action="{{ route('employee.destroy', $employee->id) }}" method="post">
									<a href="{{ route('employee.edit', $employee->id) }}"><i class="align-middle" data-feather="edit-2"></i></a>
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