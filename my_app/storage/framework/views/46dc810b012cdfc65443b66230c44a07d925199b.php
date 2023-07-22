<div class="agileits_header">
    <div class="container">
        <div class="w3l_offers">
            
        </div>
        <div class="agile-login">
            <?php if(Auth::check()): ?>
                <ul>
                    <li><a href="<?php echo e(route('admin.dashboard.page')); ?>" target=”_blank”><?php echo e(Auth::user()->name); ?></a></li>
                    <li><a href="<?php echo e(route('admin.logout')); ?>"><?php echo e(__('Logout')); ?></a></li>
                    <li>
                        <a href="<?php echo e(route('admin.dashboard.page')); ?>" target=”_blank”>
                            <img src="<?php echo e(asset('admin/images/avatar.jpg')); ?>" class="rounded-circle" width="30">
                        </a>
                    </li>
                </ul>
            <?php else: ?>
                <ul>
                    <li><a href="<?php echo e(route('register.page')); ?>"> <?php echo e(__('Create Account')); ?> </a></li>
                    <li><a href="<?php echo e(route('login.page')); ?>"><?php echo e(__('Login')); ?></a></li>
                </ul>
            <?php endif; ?>
        </div>
        <div class="product_list_header">
                <a href="<?php echo e(route('cart.page')); ?>" target="_blank">
                    <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                </a>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

<div class="logo_products">
    <div class="container">
    <div class="w3ls_logo_products_left1">
            <ul class="phone_email">
                <li><i class="fa fa-phone" aria-hidden="true"></i><?php echo e(__('Contact Me')); ?> : (+84) 775 425 247</li>

            </ul>
        </div>
        <div class="w3ls_logo_products_left">
            <h1><a href="index.html">super Market</a></h1>
        </div>
    <div class="w3l_search">
        <form action="<?php echo e(route('search.page')); ?>" method="get">
            <input type="search" name="product_name" value="<?php echo e(old('product_name')); ?>" placeholder="<?php echo e(__('Search for a Product')); ?>" required="">
            <button type="submit" class="btn btn-default search" aria-label="Left Align">
                <i class="fa fa-search" aria-hidden="true"> </i>
            </button>
            <div class="clearfix"></div>
        </form>
    </div>

        <div class="clearfix"> </div>
    </div>
</div>
<?php /**PATH /var/www/html/my_app/resources/views/store/layouts/header.blade.php ENDPATH**/ ?>