@extends('auth.master')

@section('title')
    {{ __('Login').' | '.config('constraint.brand') }}
@endsection

@section('content')
<div class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a class="logo_store-admin" href="{{ route('home.page') }}">{{ config('constraint.brand') }}</a>
        </div>

        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i>{{ Session::get('success') }}!</h5>
            </div>
        @endif

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">{!! __('Welcome') !!}</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input
                            type="email"
                            class="form-control"
                            placeholder="Email"
                            name="email"
                            value="{{ old('email') }}"
                            @error('email') is-invalid @enderror
                        >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                        @error('email')
                            <div class="error invalid-feedback" style="display: inline;">{{ $errors->first('email') }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input
                            type="password"
                            class="form-control"
                            placeholder="{{ __('Password') }}"
                            name="password"
                            value="{{ old('password') }}"
                            @error('password') is-invalid @enderror
                        >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        @error('password')
                            <div class="error invalid-feedback" style="display: inline;">{{ $errors->first('password') }}</div>
                        @enderror
                    </div>

                    @error('failAuth')
                        <div class="input-group mb-3">
                            <div class="error invalid-feedback" style="display: inline; text-align: center;">{!! $errors->first('failAuth') !!}</div>
                        </div>
                    @enderror

                    <div class="row">
                        <div class="col-7">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="col-5">
                            <button type="submit" class="btn btn-warning btn-block">{{ __('Sign In') }}</button>
                        </div>

                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>-<b> {{ __('Or') }} </b>-</p>
                    {{-- <a href="{{ route('auth.social', ['provider' => 'facebook']) }}" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> {!! __('Sign in using Facebook') !!}
                    </a> --}}
                    <a href="{{ route('auth.social', ['provider' => 'google']) }}" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> {!! __('Sign in using Google+') !!}
                    </a>
                </div>

                {{-- <p class="mb-1">
                    <a href="forgot-password.html">{{ __('I forgot my password') }}</a>
                </p> --}}
                <p class="mb-0">
                    <a href="{{ route('register.page') }}" class="text-center">{!! __('Register a new membership') !!}</a>
                </p>
            </div>

        </div>
    </div>
</div>
@endsection
