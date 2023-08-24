<?php
    $product = $product ?? null;
?>

<?php if(!is_null($product)): ?>
<div class="hover14 column">
    <div class="agile_top_brand_left_grid">
        <div class="agile_top_brand_left_grid_pos">
            <img src="<?php echo e(asset('store/images/offer.png')); ?>" alt=" " class="img-responsive">
        </div>
        <div class="agile_top_brand_left_grid1">
            <figure>
                <div class="snipcart-item block">
                    <div class="snipcart-thumb">
                    <a href="<?php echo e(route('detail.page', $product->slug)); ?>"><img title=" " alt=" " src="<?php echo e(asset(config('constraint.link.image.products.thumbnail').$product->image)); ?>"></a>
                        <p class="product-name"><?php echo e($product->name); ?></p>
                        <div class="stars">
                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                            <i class="fa fa-star blue-star" aria-hidden="true"></i>
                            <i class="fa fa-star gray-star" aria-hidden="true"></i>
                        </div>
                        <?php if($product->price_discount === 0): ?>
                            <h4><?php echo e($product->price); ?></h4>
                        <?php else: ?>
                            <h4><?php echo e($product->price_discount); ?><span><?php echo e($product->price); ?></span></h4>
                        <?php endif; ?>
                    </div>
                    <div class="snipcart-details top_brand_home_details">
                        <form class="add-to-cart">
                            <input type="hidden" name="slug" value="<?php echo e($product->slug); ?>">
                            <input type="hidden" name="add" value="1">
                            <input type="hidden" name="url_image" value="<?php echo e($product->image); ?>">
                            <input type="hidden" name="name" value="<?php echo e($product->name); ?>">
                            <input type="hidden" name="price" value="<?php echo e($product->price); ?>">
                            <input type="hidden" name="price_discount" value="<?php echo e($product->price_discount); ?>">
                            <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                            <input type="submit" name="submit" value="<?php echo e(__('Add to cart')); ?>" class="button">
                        </form>
                    </div>
                </div>
            </figure>
        </div>
    </div>
</div>
<?php endif; ?>
<?php /**PATH /var/www/html/my_app/resources/views/store/components/product.blade.php ENDPATH**/ ?>