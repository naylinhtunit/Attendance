@extends('layouts.app')

@section('content')

<a href="{{ URL::to('/') }}/attendance/create" class="btn btn-success mb-2"><i class="align-middle mr-2" data-feather="plus"></i>Add </a>
<div class="container-fluid p-0">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Company ID</th>
							<th>Employ ID</th>
							<th>CheckIn Time</th>
							<th>CheckIn Time</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($attendances as $attendance)
						<tr>
							<td>
								{{ $attendance->company_id }}: {{ $attendance->company->company_name }}
							</td>
							<td>{{ $attendance->employee_id }}: {{ $attendance->employee->name }}</td>
							<td>{{ $attendance->checkin_time }}</td>
							<td>{{ $attendance->checkout_time }}</td>
							<td class="table-action">
								<form action="{{ url('/attendance', $attendance->id) }}" method="post">
									<a class="text-warning" href="{{ url('attendance/' . $attendance->id . '/edit') }}"><i class="align-middle mr-2" data-feather="edit"></i></a>
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
			<div class="paginate d-flex justify-content-center">{{ $attendances->onEachSide(1)->appends(Request::except('page'))->links() }}</div>
		</div>
	</div>
</div>
@endsection