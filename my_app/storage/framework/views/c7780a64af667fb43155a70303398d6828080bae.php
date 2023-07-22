<?php
    $number = 0;

    if (Session::has('cart')) {
        foreach(Session::get('cart') as $product) {
            $number += $product[0]['add'];
        }
    }
?>

<!-- Scroll Back To Top Button - Cart version -->
<a href="<?php echo e(route('cart.page')); ?>" target="_blank" id="my-cart" title="My Cart">
    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
    <span class="badge-number"><?php echo e($number); ?></span>
</a>
<!-- /Scroll Back To Top Button - Cart version -->
<?php /**PATH /var/www/html/my_app/resources/views/store/components/cart-scroll.blade.php ENDPATH**/ ?>