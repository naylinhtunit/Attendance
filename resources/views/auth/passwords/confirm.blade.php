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
								{{ __('Please confirm your password before continuing.') }}

								<form method="POST" action="{{ route('password.confirm') }}">
									@csrf

									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="fa fa-lock fa-fw"></i>
											</span>
										</div>
										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">

										@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>

									<div class="input-group mb-3">
										<div class="col-md-8 offset-md-4">
											<button type="submit" class="btn btn-primary">
												{{ __('Confirm Password') }}
											</button>

											@if (Route::has('password.request'))
											<a class="btn btn-link" href="{{ route('password.request') }}">
												{{ __('Forgot Your Password?') }}
											</a>
											@endif
										</div>
									</div>
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
