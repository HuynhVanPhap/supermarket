<?php $__env->startSection('title'); ?>
<?php echo e(__('User Info').' | '.config('constraint.brand')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo e(Breadcrumbs::render('users.info')); ?>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?php echo e(asset('admin/images/avatar.jpg')); ?>"
                                alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center"><?php echo e($user->name); ?></h3>
                        <p class="text-muted text-center"><?php echo e(__($user->role->name)); ?></p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b class="text-danger"><?php echo e(__('Order Buyed')); ?></b> <a class="float-right"><?php echo e($user->orders->count()); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b class="text-gray"><?php echo e(__('Pending')); ?></b>
                                <a class="float-right"><?php echo e($user->pending_orders_number); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b class="text-warning"><?php echo e(__('Processing')); ?></b>
                                <a class="float-right"><?php echo e($user->processing_orders_number); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b class="text-info"><?php echo e(__('Shipped')); ?></b>
                                <a class="float-right"><?php echo e($user->shipped_orders_number); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b class="text-teal"><?php echo e(__('Received')); ?></b>
                                <a class="float-right"><?php echo e($user->received_orders_number); ?></a>
                            </li>
                            <li class="list-group-item">
                                <b class="text-success"><?php echo e(__('Paymented')); ?></b>
                                <a class="float-right"><?php echo e($user->paymented_orders_number); ?></a>
                            </li>
                        </ul>

                        <?php if(Auth::user()->role->value === config('constraint.roles.super')): ?>
                            <a href="https://www.facebook.com/phap.van.58726823" class="btn btn-primary btn-block" target="_blank"><b><?php echo e(__('Follow')); ?></b></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#information"
                                    data-toggle="tab"><?php echo e(__('Information')); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="#updation" data-toggle="tab"><?php echo e(__('Update')); ?></a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><?php echo e(__('Password')); ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <?php echo $__env->make('admin.pages.users.layouts.show-info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.pages.users.layouts.show-update', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('admin.pages.users.layouts.show-change-password', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php if(session()->has('success')): ?>
        <script>toastr.success("<?php echo e(session()->get('success')); ?>");</script>
    <?php endif; ?>
    <?php if(empty(!$errors)): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <script>toastr.error("<?php echo e($message); ?>");</script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/my_app/resources/views/admin/pages/users/show.blade.php ENDPATH**/ ?>