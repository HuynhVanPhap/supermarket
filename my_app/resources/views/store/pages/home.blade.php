@extends('store.master')

@section('title')
    {{ __('Home') }}
@endsection

@section('content')
<!-- main-slider -->
<ul id="demo1">
    <li>
        <img src="{{ asset('store/images/11.jpg') }}" alt="" />
        <!--Slider Description example-->
        <div class="slide-desc">
            <h3>{{ __('Buy Rice Products Are Now On Line With Us') }}</h3>
        </div>
    </li>
    <li>
        <img src="{{ asset('store/images/22.jpg') }}" alt="" />
        <div class="slide-desc">
            <h3>{{ __('Whole Spices Products Are Now On Line With Us') }}</h3>
        </div>
    </li>

    <li>
        <img src="{{ asset('store/images/44.jpg') }}" alt="" />
        <div class="slide-desc">
            <h3>{{ __('Whole Spices Products Are Now On Line With Us') }}</h3>
        </div>
    </li>
</ul>
<!-- //main-slider -->
<!-- //top-header and slider -->
<!-- top-brands -->
<div class="top-brands">
    <div class="container">
        <h2>{{ __('Top selling offers') }}</h2>
        <div class="grid_3 grid_5">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab"
                            data-toggle="tab" aria-controls="expeditions" aria-expanded="true">{{ __('Advertised offers') }}</a>
                    </li>
                    <li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab"
                            aria-controls="tours">{{ __('Today offers') }}</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="expeditions"
                        aria-labelledby="expeditions-tab">
                        @if (!blank($advertisedOffers))
                            @foreach ($advertisedOffers->chunk(3) as $offer)
                                <div class="agile_top_brands_grids">
                                    @foreach ($offer as $product)
                                        <div class="col-md-4 top_brand_left">
                                            @include('store.components.product', [
                                                'product' => $product
                                            ])
                                        </div>
                                    @endforeach
                                    <div class="clearfix"> </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!--- Today Offers --->
                    <div role="tabpanel" class="tab-pane fade" id="tours" aria-labelledby="tours-tab">
                        @if (!blank($todayOffers))
                            @foreach ($todayOffers->chunk(3) as $offer)
                                <div class="agile_top_brands_grids">
                                    @foreach ($offer as $product)
                                        <div class="col-md-4 top_brand_left">
                                            @include('store.components.product', [
                                                'product' => $product
                                            ])
                                        </div>
                                    @endforeach
                                    <div class="clearfix"> </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //top-brands -->
<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <a href="beverages.html"> <img class="first-slide" src="{{ asset('store/images/b1.jpg') }}" alt="First slide"></a>

        </div>
        <div class="item">
            <a href="personalcare.html"> <img class="second-slide " src="{{ asset('store/images/b3.jpg') }}" alt="Second slide"></a>

        </div>
        <div class="item">
            <a href="household.html"><img class="third-slide " src="{{ asset('store/images/b1.jpg') }}" alt="Third slide"></a>

        </div>
    </div>

</div><!-- /.carousel -->
<!--banner-bottom-->
<div class="ban-bottom-w3l">
    <div class="container">
        <div class="col-md-6 ban-bottom3">
            <div class="ban-top">
                <img src="{{ asset('store/images/p2.jpg') }}" class="img-responsive" alt="" />

            </div>
            <div class="ban-img">
                <div class=" ban-bottom1">
                    <div class="ban-top">
                        <img src="{{ asset('store/images/p3.jpg') }}" class="img-responsive" alt="" />

                    </div>
                </div>
                <div class="ban-bottom2">
                    <div class="ban-top">
                        <img src="{{ asset('store/images/p4.jpg') }}" class="img-responsive" alt="" />

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-6 ban-bottom">
            <div class="ban-top">
                <img src="{{ asset('store/images/111.jpg') }}" class="img-responsive" alt="" />
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<!--banner-bottom-->
@include('store.components.new-offers')

@include('store.components.cart-scroll')
@endsection
