<div class="agileits_header">
    <div class="container">
        <div class="w3l_offers">
            {{-- <p>SALE UP TO 70% OFF. USE CODE "SALE70%" . <a href="products.html">SHOP NOW</a></p> --}}
        </div>
        <div class="agile-login">
            @if (Auth::check())
                <ul>
                    <li><a href="{{ route('admin.dashboard.page') }}" target=”_blank”>{{ Auth::user()->name }}</a></li>
                    <li><a href="{{ route('admin.logout') }}">{{ __('Logout') }}</a></li>
                    <li>
                        <a href="{{ route('admin.dashboard.page') }}" target=”_blank”>
                            <img src="{{ asset('admin/images/avatar.jpg') }}" class="rounded-circle" width="30">
                        </a>
                    </li>
                </ul>
            @else
                <ul>
                    <li><a href="{{ route('register.page') }}"> {{ __('Create Account') }} </a></li>
                    <li><a href="{{ route('login.page') }}">{{ __('Login') }}</a></li>
                </ul>
            @endif
        </div>
        <div class="product_list_header">
                <a href="{{ route('cart.page') }}" target="_blank">
                    <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                </a>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

<div class="logo_products">
    <div class="container">
    <div class="w3ls_logo_products_left1">
            <ul class="phone_email">
                <li><i class="fa fa-phone" aria-hidden="true"></i>{{ __('Contact Me') }} : (+84) 775 425 247</li>

            </ul>
        </div>
        <div class="w3ls_logo_products_left">
            <h1><a href="index.html">super Market</a></h1>
        </div>
    <div class="w3l_search">
        <form action="{{ route('search.page') }}" method="get">
            <input type="search" name="product_name" value="{{ old('product_name') }}" placeholder="{{ __('Search for a Product') }}" required="">
            <button type="submit" class="btn btn-default search" aria-label="Left Align">
                <i class="fa fa-search" aria-hidden="true"> </i>
            </button>
            <div class="clearfix"></div>
        </form>
    </div>

        <div class="clearfix"> </div>
    </div>
</div>
