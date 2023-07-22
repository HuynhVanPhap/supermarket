<?php $__env->startSection('title'); ?>
    <?php echo e(__('Category')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo e(Breadcrumbs::view('store.components.breadcrumbs', 'category.page', $keyword)); ?>


<div class="products">
    <div class="container">
        <div class="col-md-4 products-left">
            <div class="categories">
                <h2><?php echo e(__('Categories')); ?></h2>
                <ul class="cate">
                    <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rootCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('category.page', $rootCategory->slug)); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><?php echo e($rootCategory->name); ?></a></li>
                        <?php $__currentLoopData = $rootCategory->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <ul>
                                <li><a href="<?php echo e(route('category.page', $category->slug)); ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><?php echo e($category->name); ?></a></li>
                            </ul>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <div class="col-md-8 products-right">
            <?php if(!blank($products)): ?>
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

                <?php $__currentLoopData = $products->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groups): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="agile_top_brands_grids">
                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 top_brand_left">
                                <?php echo $__env->make('store.components.product', [
                                    'product' => $product
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="clearfix"> </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php echo $products->appends(request()->query())->links('store.components.pagination'); ?>

            <?php else: ?>
                <div class="warning">
                    <?php echo e(__('Product not found')); ?>

                </div>
            <?php endif; ?>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

<?php echo $__env->make('store.components.cart-scroll', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('store.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/my_app/resources/views/store/pages/category.blade.php ENDPATH**/ ?>