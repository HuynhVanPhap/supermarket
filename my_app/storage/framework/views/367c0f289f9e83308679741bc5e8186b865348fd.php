<?php $__env->startSection('title'); ?>
    <?php echo e(__('Customer Info')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo e(Breadcrumbs::view('store.components.breadcrumbs', 'customer.info.page')); ?>


<div class="checkout">
    <div class="container">
        <div class="card">
            <form action="<?php echo e(route('customer.info')); ?>" method="post">
                <?php echo csrf_field(); ?>

                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name"><?php echo e(__('Customer name')); ?> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>"
                                    name="name"
                                    value="<?php echo e(old('name', Session::get('customer.0.name') ?? Auth::user()->name ?? '')); ?>"
                                    id="name"
                                    disabled
                                />
                                <?php if($errors->has('name')): ?>
                                    <span id="exampleInputPassword1-error" class="invalid-feedback"><?php echo e($errors->first('name')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name"><?php echo e(__('Email')); ?> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>"
                                    name="email"
                                    value="<?php echo e(old('email', Session::get('customer.0.email') ?? Auth::user()->email ?? '')); ?>"
                                    id="name"
                                    disabled
                                />
                                <?php if($errors->has('email')): ?>
                                    <span id="exampleInputPassword1-error" class="invalid-feedback"><?php echo e($errors->first('email')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name"><?php echo e(__('Phone')); ?> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?php echo e($errors->has('phone') ? 'is-invalid' : ''); ?>"
                                    name="phone"
                                    value="<?php echo e(old('phone', Session::get('customer.0.phone') ?? Auth::user()->phone ?? '')); ?>"
                                    id="name"
                                />
                                <?php if($errors->has('phone')): ?>
                                    <span id="exampleInputPassword1-error" class="invalid-feedback"><?php echo e($errors->first('phone')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name"><?php echo e(__('Address')); ?> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control <?php echo e($errors->has('address') ? 'is-invalid' : ''); ?>"
                                    name="address"
                                    value="<?php echo e(old('address', Session::get('customer.0.address') ?? Auth::user()->address ?? '')); ?>"
                                    id="name"
                                />
                                <?php if($errors->has('address')): ?>
                                    <span id="exampleInputPassword1-error" class="invalid-feedback"><?php echo e($errors->first('address')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="<?php echo e(route('cart.page')); ?>" class="btn btn-warning"><?php echo e(__('Back')); ?></a>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Confirm')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('store.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/my_app/resources/views/store/pages/customer-info.blade.php ENDPATH**/ ?>