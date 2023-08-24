<div class="footer">
    <div class="container">
        <div class="w3_footer_grids">
            <div class="col-md-3 w3_footer_grid">
                <h3><?php echo e(__('Contact')); ?></h3>

                <ul class="address">
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><?php echo e(__('Da Nang City')); ?>,
                        <span><?php echo e(__('Viet Nam')); ?></span></li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a
                            href="mailto:info@example.com">huynhvanphap198@gmail.com</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>(+84) 775 425 247</li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3><?php echo e(__('Information')); ?></h3>
                <ul class="info">
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="about.html"><?php echo e(__('About Me')); ?></a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="contact.html"><?php echo e(__('Contact Me')); ?></a></li>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3><?php echo e(__('Category')); ?></h3>
                <ul class="info">
                    <?php if(!blank($navigation)): ?>
                        <?php $__currentLoopData = $navigation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rootCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="groceries.html"><?php echo e($rootCategory->name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="col-md-3 w3_footer_grid">
                <h3><?php echo e(__('Profile')); ?></h3>
                <ul class="info">
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="products.html"><?php echo e(__('Store')); ?></a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="checkout.html"><?php echo e(__('My Cart')); ?></a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="login.html"><?php echo e(__('Login')); ?></a></li>
                    <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="registered.html"><?php echo e(__('Create Account')); ?></a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

    <div class="footer-copy">

        <div class="container">
            <p>© 2017 Super Market. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
        </div>
    </div>

</div>

<div class="footer-botm">
    <div class="container">
        <div class="w3layouts-foot">
            <ul>
                <li><a href="https://www.facebook.com/phap.van.58726823" class="w3_agile_facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="https://github.com/HuynhVanPhap?tab=repositories" class="agile_twitter" target="_blank"><i class="fa fa-github-alt"></i></a></li>
                <li><a href="#" class="w3_agile_dribble"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                <li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        <div class="payment-w3ls">
            <img src="<?php echo e(asset('store/images/card.png')); ?>" alt=" " class="img-responsive">
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<?php /**PATH /var/www/html/my_app/resources/views/store/layouts/footer.blade.php ENDPATH**/ ?>