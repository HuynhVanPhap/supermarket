<div class="active tab-pane" id="information">
    <strong><i class="fas fa-envelope mr-1"></i> <?php echo e(__('Email')); ?></strong>
    <p class="text-muted ml-4">
        <?php echo e($user->email); ?>

    </p>
    <hr>
    <strong><i class="fas fa-phone mr-1"></i> <?php echo e(__('Phone')); ?></strong>
    <p class="text-muted ml-4">
        <?php echo e($user->phone); ?>

    </p>
    <hr>
    <strong><i class="fas fa-address-card mr-1"></i> <?php echo e(__('Address')); ?></strong>
    <p class="text-muted ml-4">
        <?php echo e($user->address); ?>

    </p>
</div>
<?php /**PATH /var/www/html/my_app/resources/views/admin/pages/users/layouts/show-info.blade.php ENDPATH**/ ?>