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

									<div class="form-group row">
										<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

										<div class="col-md-6">
											<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

											@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>

									<div class="form-group row mb-0">
										<div class="col-md-6 offset-md-4">
											<button type="submit" class="btn btn-primary">
												{{ __('Send Password Reset') }}
											</button>
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
