<?php $__env->startSection('title'); ?>
    <?php echo e(__('Login').' | '.config('constraint.brand')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a class="logo_store-admin" href="<?php echo e(route('home.page')); ?>"><?php echo e(config('constraint.brand')); ?></a>
        </div>

        <?php if(Session::has('success')): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i><?php echo e(Session::get('success')); ?>!</h5>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg"><?php echo __('Welcome'); ?></p>

                <form action="<?php echo e(route('login')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <div class="input-group mb-3">
                        <input
                            type="email"
                            class="form-control"
                            placeholder="Email"
                            name="email"
                            value="<?php echo e(old('email')); ?>"
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="error invalid-feedback" style="display: inline;"><?php echo e($errors->first('email')); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="input-group mb-3">
                        <input
                            type="password"
                            class="form-control"
                            placeholder="<?php echo e(__('Password')); ?>"
                            name="password"
                            value="<?php echo e(old('password')); ?>"
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        >
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="error invalid-feedback" style="display: inline;"><?php echo e($errors->first('password')); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <?php $__errorArgs = ['failAuth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="input-group mb-3">
                            <div class="error invalid-feedback" style="display: inline; text-align: center;"><?php echo $errors->first('failAuth'); ?></div>
                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <div class="row">
                        <div class="col-7">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    <?php echo e(__('Remember Me')); ?>

                                </label>
                            </div>
                        </div>

                        <div class="col-5">
                            <button type="submit" class="btn btn-warning btn-block"><?php echo e(__('Sign In')); ?></button>
                        </div>

                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>-<b> <?php echo e(__('Or')); ?> </b>-</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> <?php echo __('Sign in using Facebook'); ?>

                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> <?php echo __('Sign in using Google+'); ?>

                    </a>
                </div>

                <p class="mb-1">
                    <a href="forgot-password.html"><?php echo e(__('I forgot my password')); ?></a>
                </p>
                <p class="mb-0">
                    <a href="<?php echo e(route('register.page')); ?>" class="text-center"><?php echo e(__('Register a new membership')); ?></a>
                </p>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/my_app/resources/views/auth/pages/login.blade.php ENDPATH**/ ?>