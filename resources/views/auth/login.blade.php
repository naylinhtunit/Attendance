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
                                <h5 class="card-title mb-0">{{ __('yathar HR') }}</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                        </div>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                        <button style="right: 0%; z-index: 999; padding: 0px;" title="Show password" class="btn btn-default input-group-btn position-absolute" type="button">
                                            <span style="padding: 8px 26px 8px 16px;" toggle="#password" class="fa fa-fw fa-eye toggle-password"></span>
                                        </button>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-4">
                                        <div class="form-check checkbox">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                        <div class="col-6 text-right">
                                            @if (Route::has('password.request'))
                                            <a class="btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                            @endif
                                            <a class="btn btn-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
