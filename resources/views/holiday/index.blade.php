@extends('layouts.app')

@section('content')

<a href="{{ URL::to('/') }}/holiday/create" class="btn btn-success mb-2"><i class="align-middle mr-2" data-feather="plus"></i>Add </a>
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
							<td>{{ $holiday->company_id }}: {{ $holiday->company->company_name }}</td>
							<td class="table-action">
								<form action="{{ url('/holiday', $holiday->id) }}" method="post">
									<a href="{{ url('holiday/edit', $holiday->id) }}"><i class="align-middle" data-feather="edit-2"></i></a>
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
			<div class="paginate d-flex justify-content-center">{{ $holidays->onEachSide(1)->appends(Request::except('page'))->links() }}</div>
		</div>
	</div>
</div>
@endsection