@extends('auth.master')

@section('title')
    {{ __('Register').' | '.config('constraint.brand') }}
@endsection

@section('content')
<div class="register-page">
    <div class="register-box">
        <div class="register-logo">
            <a class="logo_store-admin" href="{{ route('home.page') }}">{{ config('constraint.brand') }}</a>
        </div>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">{!! __('Register a new membership') !!}</p>
                <form action="{{ route('register') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="{{ __('Full name') }}" name="name" value="{{ old('name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                            <div class="error invalid-feedback" style="display: inline;">{{ $errors->first('name') }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="{{ __('Email') }}" name="email" value="{{ old('email') }}">
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
                        <input type="text" class="form-control" placeholder="{{ __('Phone') }}" name="phone" value="{{ old('phone') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                        @error('phone')
                            <div class="error invalid-feedback" style="display: inline;">{{ $errors->first('phone') }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="{{ __('Address') }}" name="address" value="{{ old('address') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-address-card"></span>
                            </div>
                        </div>
                        @error('address')
                            <div class="error invalid-feedback" style="display: inline;">{{ $errors->first('address') }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="{{ __('Password') }}" name="password" value="{{ old('password') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <div class="error invalid-feedback" style="display: inline;">{{ $errors->first('password') }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="{{ __('Retype password') }}" name="retype_password" value="{{ old('retype_password') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('retype_password')
                            <div class="error invalid-feedback" style="display: inline;">{{ $errors->first('retype_password') }}</div>
                        @enderror
                    </div>

                    @error('fail')
                        <div class="input-group mb-3">
                            <div class="error invalid-feedback" style="display: inline; text-align: center;">{!! $errors->first('fail') !!}</div>
                        </div>
                    @enderror

                    <div class="row">
                        <div class="col-8">
                            <a href="{{ route('login.page') }}" class="text-center">{{ __('I already have a membership') }}</a>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-warning btn-block">{{ __('Register') }}</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
