@extends('layouts.app')

@section('content')

<a href="{{ URL::to('/') }}/leave_type/create" class="btn btn-success mb-2"><i class="align-middle mr-2" data-feather="plus"></i>Add </a>
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
							<td>{{ $leave->company_id }}: {{ $leave->company->company_name }}</td>
							<td>{{ $leave->leave_name }}</td>
							<td>{{ $leave->total_leave }}</td>
							<td class="table-action">
								<form action="{{ url('/leave_type', $leave->id) }}" method="post">
									<a class="text-warning" href="{{ url('leave_type/'. $leave->id . '/edit') }}"><i class="align-middle mr-2" data-feather="edit"></i></a>
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
			<div class="paginate d-flex justify-content-center">{{ $leaveTypes->onEachSide(1)->appends(Request::except('page'))->links() }}</div>
		</div>
	</div>
</div>
@endsection