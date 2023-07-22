@extends('store.master')

@section('title')
    {{ __('Category') }}
@endsection

@section('content')
{{ Breadcrumbs::view('store.components.breadcrumbs', 'category.page', $keyword) }}

<div class="products">
    <div class="container">
        <div class="col-md-4 products-left">
            <div class="categories">
                <h2>{{ __('Categories') }}</h2>
                <ul class="cate">
                    @foreach ($menu as $rootCategory)
                        <li><a href="{{ route('category.page', $rootCategory->slug) }}"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{ $rootCategory->name }}</a></li>
                        @foreach ($rootCategory->categories as $category)
                            <ul>
                                <li><a href="{{ route('category.page', $category->slug) }}"><i class="fa fa-arrow-right" aria-hidden="true"></i>{{ $category->name }}</a></li>
                            </ul>
                        @endforeach
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-8 products-right">
            @if (!blank($products))
                <div class="products-right-grid">
                    <div class="products-right-grids">
                        <div class="sorting">
                            <select id="country" onchange="change_country(this.value)" class="frm-field required sect">
                                <option value="null">Default sorting</option>
                                <option value="null">Sort by popularity</option>
                                <option value="null">Sort by average rating</option>
                                <option value="null">Sort by price</option>
                            </select>
                        </div>
                        <div class="sorting-left">
                            <select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
                                <option value="null">Item on page 9</option>
                                <option value="null">Item on page 18</option>
                                <option value="null">Item on page 32</option>
                                <option value="null">All</option>
                            </select>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>

                @foreach ($products->chunk(3) as $groups)
                    <div class="agile_top_brands_grids">
                        @foreach ($groups as $product)
                            <div class="col-md-4 top_brand_left">
                                @include('store.components.product', [
                                    'product' => $product
                                ])
                            </div>
                        @endforeach
                        <div class="clearfix"> </div>
                    </div>
                @endforeach

                {!! $products->appends(request()->query())->links('store.components.pagination') !!}
            @else
                <div class="warning">
                    {{ __('Product not found') }}
                </div>
            @endif
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

@include('store.components.cart-scroll')
@endsection
