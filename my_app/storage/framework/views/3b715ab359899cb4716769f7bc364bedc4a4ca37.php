<div class="tab-pane" id="settings">
    <form class="form-horizontal" action="<?php echo e(route('admin.users.change.password', $user->email)); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="form-group row">
            <div class="col-sm-12">
                <?php echo $__env->make('admin.components.form.input', [
                    'label' => __("Password"),
                    'placeholder' => __("Password"),
                    'name' => 'password',
                    'required' => true,
                    'type' => 'password'
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <?php echo $__env->make('admin.components.form.input', [
                    'label' => __("Retype password"),
                    'placeholder' => __("Retype password"),
                    'name' => 'retype_password',
                    'required' => true,
                    'type' => 'password'
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-danger"><?php echo e(__('Update')); ?></button>
            </div>
        </div>
    </form>
</div>
<?php /**PATH /var/www/html/my_app/resources/views/admin/pages/users/layouts/show-change-password.blade.php ENDPATH**/ ?>