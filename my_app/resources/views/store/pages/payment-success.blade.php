@extends('store.master')

@section('title')
    {{ __('Payment') }}
@endsection

@section('content')
{{ Breadcrumbs::view('store.components.breadcrumbs', 'payment.page') }}

<div class="jumbotron text-center">
    <h1 class="display-3">Cảm ơn quý khách đã mua hàng !</h1>
        <p class="lead"><strong>Vui lòng kiểm tra Email</strong> để theo dõi trạng thái đơn hàng.</p>
    <hr>
    <p>
        Có vấn đề phát sinh ? <a href="">Liên hệ chúng tôi</a>
    </p>

    <p class="lead">
        <a class="btn btn-primary btn-sm" href="{{ route('home.page') }}" role="button">{{ __('Home') }}</a>
    </p>
</div>
@endsection
