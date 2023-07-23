<?php $__env->startSection('title'); ?>
    <?php echo e(__('Cart')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo e(Breadcrumbs::view('store.components.breadcrumbs', 'cart.page')); ?>


<div class="checkout">
    <div class="container">
        <?php echo $__env->make('store.components.carts', ['isPayment' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="checkout-left">
            <div class="checkout-left-basket">
                <h4><a href="" id="update-cart"><?php echo e(__('Update cart')); ?></a></h4>
            </div>

            <?php if(empty(!Session::get('cart'))): ?>
                <div class="checkout-right-basket">
                    <a href="<?php echo e(route('customer.info.page')); ?>"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span><?php echo e(__('Next')); ?></a>
                </div>
            <?php endif; ?>

            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('store.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/my_app/resources/views/store/pages/cart.blade.php ENDPATH**/ ?>