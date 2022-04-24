@extends('layouts.master')
@section('title', 'Register - OSSI')

@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4">Register</h3>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-label-group">
                                        <input type="text" id="name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autofocus placeholder="Username">
                                        <label for="name">Username</label>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>


                                    <div class="form-label-group">
                                        <input type="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Email address" required autofocus name="email"
                                            value="{{ old('email') }}">
                                        <label for="email">Email address</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" required autofocus name="password">
                                        <label for="password">Password</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="form-label-group">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required placeholder="Confirm Password">
                                        <label for="password-confirm">Confirm Password</label>

                                    </div>

                                    <button
                                        class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                        type="submit">{{ __('Register') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
