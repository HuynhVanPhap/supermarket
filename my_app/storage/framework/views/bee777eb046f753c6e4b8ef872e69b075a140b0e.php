<?php if(count($breadcrumbs)): ?>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo e($breadcrumbs->pluck('title')->last()); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if($breadcrumb->url && !$loop->last): ?>
                                <li class="breadcrumb-item"><a href="<?php echo e($breadcrumb->url); ?>"><?php echo e($breadcrumb->title); ?></a></li>
                            <?php else: ?>
                                <li class="breadcrumb-item active"><?php echo e($breadcrumb->title); ?></li>
                            <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH /var/www/html/my_app/resources/views/admin/components/breadcrumbs.blade.php ENDPATH**/ ?>