<div class="tab-pane" id="updation">
    <form class="form-horizontal" action="<?php echo e(route('admin.users.update', $user->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field("PUT"); ?>

        <div class="form-group row">
            <div class="col-sm-12">
                <?php echo $__env->make('admin.components.form.input', [
                    'label' => __("Email"),
                    'placeholder' => __("Email"),
                    'name' => 'email',
                    'defaultValue' => $user->email,
                    'required' => true
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <?php echo $__env->make('admin.components.form.input', [
                    'label' => __("Phone"),
                    'placeholder' => __("Phone"),
                    'name' => 'phone',
                    'defaultValue' => $user->phone,
                    'required' => true
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <?php echo $__env->make('admin.components.form.input', [
                    'label' => __("Address"),
                    'placeholder' => __("Address"),
                    'name' => 'address',
                    'defaultValue' => $user->address,
                    'required' => true
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
<?php /**PATH /var/www/html/my_app/resources/views/admin/pages/users/layouts/show-update.blade.php ENDPATH**/ ?>