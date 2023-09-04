<?php if(Session::has('error')): ?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title"><?php echo e(__('Fail')); ?> !</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <?php echo e(Session::get('error')); ?>

            </div>

        </div>
    </div>
</div>
<?php endif; ?>
<?php /**PATH /var/www/html/my_app/resources/views/admin/layouts/error.blade.php ENDPATH**/ ?>