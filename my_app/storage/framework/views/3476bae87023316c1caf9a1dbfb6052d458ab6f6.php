<?php
    $isPayment = $isPayment ?? false;
?>

<h2><?php echo e(__('Cart')); ?><span id="count-products"><?php echo e(count($carts)); ?></span> <?php echo e(__('Products')); ?></span></h2>
<div class="checkout-right">
    <table class="timetable_sub">
        <thead>
            <tr>
                <th>SL No.</th>
                <th><?php echo e(__('Image')); ?></th>
                <th><?php echo e(__('Quantity')); ?></th>
                <th><?php echo e(__("Product's name")); ?></th>
                <th><?php echo e(__('Price')); ?></th>
                <th><?php echo e(__('Endow')); ?></th>
                <th><?php echo e(__('Payment')); ?></th>
                <th><?php echo e(__('Take out')); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($carts)): ?>

                <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="rem" id="<?php echo e($cart[0]['slug']); ?>">
                        <td class="invert"></td>
                        <td class="invert-image">
                            <a href="<?php echo e(route('detail.page', ['slug' => $cart[0]['slug']])); ?>">
                                <img src="<?php echo e(asset(config('constraint.link.image.products.avatar').$cart[0]['url_image'])); ?>" alt="" class="img-responsive">
                            </a>
                        </td>
                        <td class="invert">
                            <div class="quantity">
                                <div class="quantity-select">
                                    <?php if($isPayment): ?>
                                        <div class="entry value-minus">&nbsp;</div>
                                        <div class="entry value amount-update" data-id-linked="<?php echo e($cart[0]['slug']); ?>"><?php echo e($cart[0]['add']); ?></div>
                                        <div class="entry value-plus active">&nbsp;</div>
                                    <?php else: ?>
                                        <div class="entry value amount-update" data-id-linked="<?php echo e($cart[0]['slug']); ?>"><?php echo e($cart[0]['add']); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        <td class="invert"><?php echo e($cart[0]['name']); ?></td>

                        <td class="invert">
                            <h5 class="info"><?php echo e($cart[0]['price'].' vnđ'); ?></h5>
                        </td>
                        <td class="invert">
                            <h5 class="info"><?php echo e(isset($cart[0]['price_discount']) ? $cart[0]['price_discount'] : '0'); ?> vnđ</h5>
                        </td>
                        <td class="invert">
                            <h4><?php echo e($cart[0]['payment'].' vnđ'); ?></h4>
                        </td>
                        <td class="invert">
                            <div class="rem">
                                <div class="close1 remove-cart" data-slug="<?php echo e($cart[0]['slug']); ?>"></div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><h4 class="total-price"><?php echo e($total); ?> vnđ</h4></td>
                        <td></td>
                    </tr>
            <?php else: ?>
                    <tr>
                        <td colspan="8"><?php echo e(__('No cart')); ?></td>
                    </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php /**PATH /var/www/html/my_app/resources/views/store/components/carts.blade.php ENDPATH**/ ?>