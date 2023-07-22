@php
    $isPayment = $isPayment ?? false;
@endphp

<h2>{{ __('Cart') }}<span id="count-products">{{ count($carts) }}</span> {{ __('Products') }}</span></h2>
<div class="checkout-right">
    <table class="timetable_sub">
        <thead>
            <tr>
                <th>SL No.</th>
                <th>{{ __('Image') }}</th>
                <th>{{ __('Quantity') }}</th>
                <th>{{ __("Product's name") }}</th>
                <th>{{ __('Price') }}</th>
                <th>{{ __('Endow') }}</th>
                <th>{{ __('Payment') }}</th>
                <th>{{ __('Take out') }}</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($carts))

                @foreach ($carts as $cart)
                    <tr class="rem" id="{{ $cart[0]['slug'] }}">
                        <td class="invert"></td>
                        <td class="invert-image">
                            <a href="{{ route('detail.page', ['slug' => $cart[0]['slug']]) }}">
                                <img src="{{ asset(config('constraint.link.image.products.avatar').$cart[0]['url_image']) }}" alt="" class="img-responsive">
                            </a>
                        </td>
                        <td class="invert">
                            <div class="quantity">
                                <div class="quantity-select">
                                    @if ($isPayment)
                                        <div class="entry value-minus">&nbsp;</div>
                                        <div class="entry value amount-update" data-id-linked="{{ $cart[0]['slug'] }}">{{ $cart[0]['add'] }}</div>
                                        <div class="entry value-plus active">&nbsp;</div>
                                    @else
                                        <div class="entry value amount-update" data-id-linked="{{ $cart[0]['slug'] }}">{{ $cart[0]['add'] }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="invert">{{ $cart[0]['name'] }}</td>

                        <td class="invert">
                            <h5 class="info">{{ $cart[0]['price'].' vnđ' }}</h5>
                        </td>
                        <td class="invert">
                            <h5 class="info">{{ isset($cart[0]['price_discount']) ? $cart[0]['price_discount'] : '0'}} vnđ</h5>
                        </td>
                        <td class="invert">
                            <h4>{{ $cart[0]['payment'].' vnđ' }}</h4>
                        </td>
                        <td class="invert">
                            <div class="rem">
                                <div class="close1 remove-cart" data-slug="{{ $cart[0]['slug'] }}"></div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><h4 class="total-price">{{ $total }} vnđ</h4></td>
                        <td></td>
                    </tr>
            @else
                    <tr>
                        <td colspan="8">{{ __('No cart') }}</td>
                    </tr>
            @endif
        </tbody>
    </table>
</div>
