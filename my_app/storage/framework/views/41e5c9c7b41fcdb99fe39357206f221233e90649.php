<?php $__env->startSection('title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- main-slider -->
<ul id="demo1">
    <li>
        <img src="<?php echo e(asset('store/images/11.jpg')); ?>" alt="" />
        <!--Slider Description example-->
        <div class="slide-desc">
            <h3><?php echo e(__('Buy Rice Products Are Now On Line With Us')); ?></h3>
        </div>
    </li>
    <li>
        <img src="<?php echo e(asset('store/images/22.jpg')); ?>" alt="" />
        <div class="slide-desc">
            <h3><?php echo e(__('Whole Spices Products Are Now On Line With Us')); ?></h3>
        </div>
    </li>

    <li>
        <img src="<?php echo e(asset('store/images/44.jpg')); ?>" alt="" />
        <div class="slide-desc">
            <h3><?php echo e(__('Whole Spices Products Are Now On Line With Us')); ?></h3>
        </div>
    </li>
</ul>
<!-- //main-slider -->
<!-- //top-header and slider -->
<!-- top-brands -->
<div class="top-brands">
    <div class="container">
        <h2><?php echo e(__('Top selling offers')); ?></h2>
        <div class="grid_3 grid_5">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab"
                            data-toggle="tab" aria-controls="expeditions" aria-expanded="true"><?php echo e(__('Advertised offers')); ?></a>
                    </li>
                    <li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab"
                            aria-controls="tours"><?php echo e(__('Today offers')); ?></a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="expeditions"
                        aria-labelledby="expeditions-tab">
                        <?php if(!blank($advertisedOffers)): ?>
                            <?php $__currentLoopData = $advertisedOffers->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="agile_top_brands_grids">
                                    <?php $__currentLoopData = $offer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-4 top_brand_left">
                                            <?php echo $__env->make('store.components.product', [
                                                'product' => $product
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="clearfix"> </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>

                    <!--- Today Offers --->
                    <div role="tabpanel" class="tab-pane fade" id="tours" aria-labelledby="tours-tab">
                        <?php if(!blank($todayOffers)): ?>
                            <?php $__currentLoopData = $todayOffers->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="agile_top_brands_grids">
                                    <?php $__currentLoopData = $offer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-4 top_brand_left">
                                            <?php echo $__env->make('store.components.product', [
                                                'product' => $product
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="clearfix"> </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
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
            <a href="beverages.html"> <img class="first-slide" src="<?php echo e(asset('store/images/b1.jpg')); ?>" alt="First slide"></a>

        </div>
        <div class="item">
            <a href="personalcare.html"> <img class="second-slide " src="<?php echo e(asset('store/images/b3.jpg')); ?>" alt="Second slide"></a>

        </div>
        <div class="item">
            <a href="household.html"><img class="third-slide " src="<?php echo e(asset('store/images/b1.jpg')); ?>" alt="Third slide"></a>

        </div>
    </div>

</div><!-- /.carousel -->
<!--banner-bottom-->
<div class="ban-bottom-w3l">
    <div class="container">
        <div class="col-md-6 ban-bottom3">
            <div class="ban-top">
                <img src="<?php echo e(asset('store/images/p2.jpg')); ?>" class="img-responsive" alt="" />

            </div>
            <div class="ban-img">
                <div class=" ban-bottom1">
                    <div class="ban-top">
                        <img src="<?php echo e(asset('store/images/p3.jpg')); ?>" class="img-responsive" alt="" />

                    </div>
                </div>
                <div class="ban-bottom2">
                    <div class="ban-top">
                        <img src="<?php echo e(asset('store/images/p4.jpg')); ?>" class="img-responsive" alt="" />

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-6 ban-bottom">
            <div class="ban-top">
                <img src="<?php echo e(asset('store/images/111.jpg')); ?>" class="img-responsive" alt="" />
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<!--banner-bottom-->
<?php echo $__env->make('store.components.new-offers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('store.components.cart-scroll', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('store.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/my_app/resources/views/store/pages/home.blade.php ENDPATH**/ ?>