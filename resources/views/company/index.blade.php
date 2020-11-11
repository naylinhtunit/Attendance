@extends('layouts.app')

@section('content')
<div class="row d-flex">
	<div class="col-2">
		<a href="{{ URL::to('/') }}/company/create" class="btn btn-success mb-2"><i class="align-middle mr-2" data-feather="plus"></i>Add </a>
	</div>
	<div class="col-10">
		<form method="get">
			<input type="text" name="keyword" class="form-control" placeholder="Search…" value="{{ Request::get('keyword') }}">
		</form>
	</div>
</div>
<div class="container-fluid p-0">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Company Name</th>
							<th>Address</th>
							<th>Phone</th>
							<th>Start Pay Date</th>
							<th>End Pay Date</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($companies as $company)
						<tr>
							<td>
								<img src="{{ asset('/img/company/'.$company->avatar) }}" width="48" height="48" class="rounded-circle mr-2" alt=""> {{ $company->company_name }}
							</td>
							<td>{{ $company->address }}</td>
							<td>{{ $company->phone }}</td>
							<td>{{ $company->start_pay_date }}</td>
							<td>{{ $company->end_pay_date }}</td>
							<td class="table-action">
								<form action="{{ url('/company', $company->id) }}" method="post">
									<a class="text-warning" href="{{ url('company/'. $company->id . '/edit') }}"><i class="align-middle mr-2" data-feather="edit"></i></a>
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
			<div class="paginate d-flex justify-content-center">{{ $companies->onEachSide(1)->appends(Request::except('page'))->links() }}</div>
		</div>
	</div>
</div>
@endsection