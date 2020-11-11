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
							<th>Image</th>
							<th>Name</th>
							<th>Company</th>
							<th>Department</th>
							<th>Role</th>
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
								<img src="{{ asset('/img/employee/'.$employee->image) }}" width="48" height="48" class="rounded-circle mr-2" alt="">
							</td>
							<td>{{ $employee->name }}</td>
							<td>{{ $employee->company->company_name }}</td>
							<td>{{ $employee->department->department_name }}</td>
							<td>{{ $employee->role->role_name }}</td>
							<td>{{ $employee->email }}</td>
							<td>{{ $employee->phone }}</td>
							<td>{{ $employee->address }}</td>
							<td class="table-action">
								<form action="{{ route('employee.destroy', $employee->id) }}" method="post">
									<a class="text-warning" href="{{ url('employee/' . $employee->id . '/edit') }}"><i class="align-middle mr-2" data-feather="edit"></i></a>
									@csrf
									@method('DELETE')
									<a class="text-danger" href="javascript:void(0);" onclick="$(this).closest('form').submit();"><i class="align-middle" data-feather="trash"></i></a>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="paginate d-flex justify-content-center">{{ $employees->onEachSide(1)->appends(Request::except('page'))->links() }}</div>
		</div>
	</div>
</div>
@endsection