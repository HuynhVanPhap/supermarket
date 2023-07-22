@php
    $number = 0;

    if (Session::has('cart')) {
        foreach(Session::get('cart') as $product) {
            $number += $product[0]['add'];
        }
    }
@endphp

<!-- Scroll Back To Top Button - Cart version -->
<a href="{{ route('cart.page') }}" target="_blank" id="my-cart" title="My Cart">
    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
    <span class="badge-number">{{ $number }}</span>
</a>
<!-- /Scroll Back To Top Button - Cart version -->
