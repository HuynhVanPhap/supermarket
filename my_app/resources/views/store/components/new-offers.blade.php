<!-- new -->
<div class="newproducts-w3agile">
    <div class="container">
        <h3>{{ __('New Offers') }}</h3>
        <div class="agile_top_brands_grids">
            @if (!blank($newOffers))
                @foreach ($newOffers as $product)
                    <div class="col-md-3 top_brand_left-1">
                        @include('store.components.product', [
                            'product' => $product
                        ])
                    </div>
                @endforeach
            @endif
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //new -->
