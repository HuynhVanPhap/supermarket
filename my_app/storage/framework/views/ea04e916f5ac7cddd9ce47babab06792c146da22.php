<?php if(Session::has('success')): ?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title"><?php echo e(__('Success')); ?> !</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>

            </div>

            <div class="card-body">
                <?php echo e(Session::get('success')); ?>

            </div>

        </div>
    </div>
</div>
<?php endif; ?>
<?php /**PATH /var/www/html/my_app/resources/views/admin/layouts/success.blade.php ENDPATH**/ ?>