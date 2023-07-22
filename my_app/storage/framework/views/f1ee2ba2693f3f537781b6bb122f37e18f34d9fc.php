<!-- new -->
<div class="newproducts-w3agile">
    <div class="container">
        <h3><?php echo e(__('New Offers')); ?></h3>
        <div class="agile_top_brands_grids">
            <?php if(!blank($newOffers)): ?>
                <?php $__currentLoopData = $newOffers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 top_brand_left-1">
                        <?php echo $__env->make('store.components.product', [
                            'product' => $product
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //new -->
<?php /**PATH /var/www/html/my_app/resources/views/store/components/new-offers.blade.php ENDPATH**/ ?>