@extends('store.master')

@section('title')
    {{ __('Detail', ['name' => __('Product')]) }}
@endsection

@section('content')
{{ Breadcrumbs::view('store.components.breadcrumbs', 'detail.page', $product) }}

<div class="products">
    <div class="container">
        <div class="agileinfo_single">

            <div class="col-md-4 agileinfo_single_left">
                <img id="example" src="{{ asset(config('constraint.link.image.products.detail').$product->image) }}" alt=" " class="img-responsive">
            </div>
            <div class="col-md-8 agileinfo_single_right">
            <h2>{{ $product->name }}</h2>
                <div class="rating1">
                    <span class="starRating">
                        <input id="rating5" type="radio" name="rating" value="5">
                        <label for="rating5">5</label>
                        <input id="rating4" type="radio" name="rating" value="4">
                        <label for="rating4">4</label>
                        <input id="rating3" type="radio" name="rating" value="3" checked="">
                        <label for="rating3">3</label>
                        <input id="rating2" type="radio" name="rating" value="2">
                        <label for="rating2">2</label>
                        <input id="rating1" type="radio" name="rating" value="1">
                        <label for="rating1">1</label>
                    </span>
                </div>
                <div class="w3agile_description">
                    <h4>{{ __('Description', ['name' => __('Product')]) }} :</h4>
                    {!! $product->description !!}
                </div>
                <div class="snipcart-item block">
                    <div class="snipcart-thumb agileinfo_single_right_snipcart">
                        @if ($product->price_discount === 0)
                            <h4 class="m-sing">{{ $product->price }} VNĐ</h4>
                        @else
                            <h4 class="m-sing">{{ $product->price_discount }} VNĐ<span>{{ $product->price }} VNĐ</span></h4>
                        @endif
                    </div>
                    <div class="snipcart-details agileinfo_single_right_details">
                        <form action="#" method="post">
                            <fieldset>
                                <input type="hidden" name="cmd" value="_cart">
                                <input type="hidden" name="add" value="1">
                                <input type="hidden" name="business" value=" ">
                                <input type="hidden" name="item_name" value="pulao basmati rice">
                                <input type="hidden" name="amount" value="21.00">
                                <input type="hidden" name="discount_amount" value="1.00">
                                <input type="hidden" name="currency_code" value="USD">
                                <input type="hidden" name="return" value=" ">
                                <input type="hidden" name="cancel_return" value=" ">
                                <input type="submit" name="submit" value="{{ __('Add to cart') }}" class="button">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

@include('store.components.new-offers')

@include('store.components.cart-scroll')
@endsection
