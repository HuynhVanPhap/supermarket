@php
    $product = $product ?? null;
@endphp

@if (!is_null($product))
<div class="hover14 column">
    <div class="agile_top_brand_left_grid">
        <div class="agile_top_brand_left_grid_pos">
            <img src="{{ asset('store/images/offer.png') }}" alt=" " class="img-responsive">
        </div>
        <div class="agile_top_brand_left_grid1">
            <figure>
                <div class="snipcart-item block">
                    <div class="snipcart-thumb">
                    <a href="{{ route('detail.page', $product->slug) }}"><img title=" " alt=" " src="{{ asset(config('constraint.link.image.products.thumbnail').$product->image) }}"></a>
                        <p class="product-name">{{ $product->name }}</p>
                        <div class="stars">
                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                            <i class="fa fa-star gray-star" aria-hidden="true"></i>
                        </div>
                        @if ($product->price_discount === 0)
                            <h4>{{ $product->price }}</h4>
                        @else
                            <h4>{{ $product->price_discount }}<span>{{ $product->price }}</span></h4>
                        @endif
                    </div>
                    <div class="snipcart-details top_brand_home_details">
                        <form class="add-to-cart">
                            <input type="hidden" name="slug" value="{{ $product->slug }}">
                            <input type="hidden" name="add" value="1">
                            <input type="hidden" name="url_image" value="{{ $product->image }}">
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="hidden" name="price_discount" value="{{ $product->price_discount }}">
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="submit" name="submit" value="{{ __('Add to cart') }}" class="button">
                        </form>
                    </div>
                </div>
            </figure>
        </div>
    </div>
</div>
@endif
