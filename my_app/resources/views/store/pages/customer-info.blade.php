@extends('store.master')

@section('title')
    {{ __('Customer Info') }}
@endsection

@section('content')
{{ Breadcrumbs::view('store.components.breadcrumbs', 'customer.info.page') }}

<div class="checkout">
    <div class="container">
        <div class="card">
            <form action="{{ route('customer.info') }}" method="post">
                @csrf

                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">{{ __('Customer name') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                                    name="name"
                                    value="{{ old('name', Session::get('customer.0.name') ?? Auth::user()->name ?? '') }}"
                                    id="name"
                                    disabled
                                />
                                @if ($errors->has('name'))
                                    <span id="exampleInputPassword1-error" class="invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">{{ __('Email') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}"
                                    name="email"
                                    value="{{ old('email', Session::get('customer.0.email') ?? Auth::user()->email ?? '') }}"
                                    id="name"
                                    disabled
                                />
                                @if ($errors->has('email'))
                                    <span id="exampleInputPassword1-error" class="invalid-feedback">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">{{ __('Phone') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : ''}}"
                                    name="phone"
                                    value="{{ old('phone', Session::get('customer.0.phone') ?? Auth::user()->phone ?? '') }}"
                                    id="name"
                                />
                                @if ($errors->has('phone'))
                                    <span id="exampleInputPassword1-error" class="invalid-feedback">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">{{ __('Address') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : ''}}"
                                    name="address"
                                    value="{{ old('address', Session::get('customer.0.address') ?? Auth::user()->address ?? '') }}"
                                    id="name"
                                />
                                @if ($errors->has('address'))
                                    <span id="exampleInputPassword1-error" class="invalid-feedback">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('cart.page') }}" class="btn btn-warning">{{ __('Back') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('Confirm') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
