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
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-user fa-fw"></i>
                                            </span>
                                        </div>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="Name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-envelope fa-fw"></i>
                                            </span>
                                        </div>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-lock fa-fw"></i>
                                            </span>
                                        </div>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-lock fa-fw"></i>
                                            </span>
                                        </div>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-block btn-primary">
                                        {{ __('Register') }}
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
