@extends('layouts.app')

@section('content')

<main class="content">
	<div class="container-fluid p-0">
		<div class="row">

			<div class="col-xl-6 col-xxl-5 d-flex">
				<div class="w-100">
					<div class="row">
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body text-center">
									<h5 class="card-title mb-4">Company</h5>
									<h1 class="display-5 mt-1 mb-3"><i class="fa fa-building-o" style="font-size: 30px;" aria-hidden="true"></i></h1>
									<div class="mb-1">
										<span class="text-muted"> Total </span>
										<span class="text-white badge badge-success"> {{$company}} </span>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body text-center">
									<h5 class="card-title mb-4">Department</h5>
									<h1 class="display-5 mt-1 mb-3"><i class="fa fa-building-o" style="font-size: 30px;" aria-hidden="true"></i></h1>
									<div class="mb-1">
										<span class="text-muted"> Total </span>
										<span class="text-white badge badge-success"> {{$department}} </span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body text-center">
									<h5 class="card-title mb-4">Role</h5>
									<h1 class="display-5 mt-1 mb-3"><i class="fa fa-user" style="font-size: 30px;" aria-hidden="true"></i></h1>
									<div class="mb-1">
										<span class="text-muted"> Total </span>
										<span class="text-white badge badge-success"> {{$role}} </span>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body text-center">
									<h5 class="card-title mb-4">Employee</h5>
									<h1 class="display-5 mt-1 mb-3"><i class="fa fa-users" style="font-size: 30px;" aria-hidden="true"></i></h1>
									<div class="mb-1">
										<span class="text-muted"> Total </span>
										<span class="text-white badge badge-success"> {{$employee}} </span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-6 col-xxl-5 d-flex">
				<div class="w-100">
					<div class="row">
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body text-center">
									<h5 class="card-title mb-4">Public Holidays</h5>
									<h1 class="display-5 mt-1 mb-3"><i class="fa fa-gift" style="font-size: 30px;" aria-hidden="true"></i></h1>
									<div class="mb-1">
										<span class="text-muted"> Total </span>
										<span class="text-white badge badge-success"> {{$holiday}} </span>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body text-center">
									<h5 class="card-title mb-4">Leave Type</h5>
									<h1 class="display-5 mt-1 mb-3"><i class="fa fa-pagelines" style="font-size: 30px;" aria-hidden="true"></i></h1>
									<div class="mb-1">
										<span class="text-muted"> Total </span>
										<span class="text-white badge badge-success"> {{$leaveType}} </span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body text-center">
									<h5 class="card-title mb-4">Leave</h5>
									<h1 class="display-5 mt-1 mb-3"><i class="fa fa-sign-out" style="font-size: 30px;" aria-hidden="true"></i></h1>
									<div class="mb-1">
										<span class="text-muted"> Total </span>
										<span class="text-white badge badge-success"> {{$leave}} </span>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body text-center">
									<h5 class="card-title mb-4">Attendance</h5>
									<h1 class="display-5 mt-1 mb-3"><i class="fa fa-clock-o" style="font-size: 30px;" aria-hidden="true"></i></h1>
									<div class="mb-1">
										<span class="text-muted"> Total </span>
										<span class="text-white badge badge-success"> {{$attendance}} </span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</main>

@endsection