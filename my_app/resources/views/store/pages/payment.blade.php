@extends('store.master')

@section('title')
    {{ __('Payment') }}
@endsection

@section('content')
{{ Breadcrumbs::view('store.components.breadcrumbs', 'payment.page') }}

<div class="checkout">
    <div class="container">
        <h2>{{ __('Customer Info') }}</h2>

        <p><span class="t-4p">Họ và tên người mua:</span> {{ $customer['name'] }}</p>
        <p><span class="t-4p">Địa chỉ Email:</span> {{ $customer['email'] }}</p>
        <p><span class="t-4p">Địa chỉ nhận hàng:</span> {{ $customer['address'] }}</p>
        <p><span class="t-4p">Số điện thoại liên lạc:</span> {{ $customer['phone'] }}</p>

    </div>

    <div class="clearfix"> </div>

    <div class="container">
        </br>

        @include('store.components.carts')

        <div class="checkout-left">
            <div class="checkout-left-basket">
                <a href="{{ route('customer.info.page') }}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>{{ __('Back') }}</a>
            </div>
            <div class="checkout-right-basket">
                <form action="{{ route('payment') }}" method="POST">
                    @csrf

                    <button type="submit" name="confirm" value="confirm"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>{{ __('Confirm') }}</button>
                </form>
                {{-- <a href="{{ route('customer.info.page') }}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>{{ __('Confirm') }}</a> --}}
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
@endsection
