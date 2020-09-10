@extends('layouts.app')

@section('content')

<a href="{{ URL::to('/') }}/leave/create" class="btn btn-success mb-2"><i class="align-middle mr-2" data-feather="plus"></i>Add </a>
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
							<td>{{ $leave->company_id }}: {{ $leave->company->company_name }}</td>
							<td>{{ $leave->request_date }}</td>
							<td>{{ $leave->actual_date }}</td>
							<td>
								@if($category->id == $leave->status) 
								<span class="badge badge-success">{{ $category->category }}</span>
								@else
								<span class="badge badge-warning">{{ $category->category }}</span>
								@endif
							</td>
							<td class="table-action">
								<form action="{{ url('/leave', $leave->id) }}" method="post">
									<a href="{{ url('leave/edit', $leave->id) }}"><i class="align-middle" data-feather="edit-2"></i></a>
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