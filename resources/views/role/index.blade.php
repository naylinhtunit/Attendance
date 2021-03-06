@extends('layouts.app')

@section('content')

<a href="{{ URL::to('/') }}/role/create" class="btn btn-success mb-2"><i class="align-middle mr-2" data-feather="plus"></i>Add </a>
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
							<td>{{ $role->company_id }}: {{ $role->company->company_name }}</td>
							<td>{{ $role->department_id }}: {{ $role->department->department_name }}</td>
							<td class="table-action">
								<form action="{{ url('/role', $role->id) }}" method="post">
									<a class="text-warning" href="{{ url('role/'. $role->id . '/edit') }}"><i class="align-middle mr-2" data-feather="edit"></i></a>
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
			<div class="paginate d-flex justify-content-center">{{ $roles->onEachSide(1)->appends(Request::except('page'))->links() }}</div>
		</div>
	</div>
</div>
@endsection