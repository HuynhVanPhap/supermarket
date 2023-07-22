<div class="navigation-agileits">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse"
                    data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?php echo e(route('home.page')); ?>" class="act"><?php echo e(__('Home')); ?></a></li>
                    <!-- Mega Menu -->
                    <?php if(!blank($navigation)): ?>
                        <?php $__currentLoopData = $navigation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rootCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="dropdown">
                                <a href="<?php echo e(route('category.page', $rootCategory->slug)); ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo e($rootCategory->name); ?><b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="row">
                                        <div class="multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                
                                                <?php $__currentLoopData = $rootCategory->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><a href="<?php echo e(route('category.page', $category->slug)); ?>"><?php echo e($category->name); ?></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>

                                    </div>
                                </ul>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <li><a href="contact.html"><?php echo e(__('Contact')); ?></a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<?php /**PATH /var/www/html/my_app/resources/views/store/layouts/navigation.blade.php ENDPATH**/ ?>