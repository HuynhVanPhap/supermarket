@extends('store.master')

@section('title')
    {{ __('Cart') }}
@endsection

@section('content')
{{ Breadcrumbs::view('store.components.breadcrumbs', 'cart.page') }}

<div class="checkout">
    <div class="container">
        @include('store.components.carts', ['isPayment' => true])

        <div class="checkout-left">
            <div class="checkout-left-basket">
                <h4><a href="" id="update-cart">{{ __('Update cart') }}</a></h4>
            </div>

            @empty(!Session::get('cart'))
                <div class="checkout-right-basket">
                    <a href="{{ route('customer.info.page') }}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>{{ __('Next') }}</a>
                </div>
            @endempty

            <div class="clearfix"> </div>
        </div>
    </div>
</div>
@endsection
