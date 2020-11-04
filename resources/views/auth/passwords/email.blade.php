@extends('layouts.app')

@section('content')
<main class="content">
	<div class="container-fluid p-0">
		<div class="row justify-content-center">
			<div class="col-md-5 col-xl-6">
				<div class="tab-content">
					<div class="tab-pane fade show active" id="account" role="tabpanel">
						<div class="card p-3">
							<div class="card-header">
								<h5 class="card-title mb-0">{{ __('Reset Password') }}</h5>
							</div>
							<div class="card-body">
								@if (session('status'))
								<div class="alert alert-success" role="alert">
									{{ session('status') }}
								</div>
								@endif

								<form method="POST" action="{{ route('password.email') }}">
									@csrf

									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="fa fa-envelope fa-fw"></i>
											</span>
										</div>
										<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">

										@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									
									<button type="submit" class="btn btn-block btn-primary">
										{{ __('Send Password Reset') }}
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection
