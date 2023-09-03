<?php
    $backUrl = $backUrl ?? "#";
?>

<div class="card-footer">
    <button type="submit" class="btn btn-warning"><?php echo e(__('Send')); ?></button>
    <a type="button" class="btn btn-default float-right" href="<?php echo e($backUrl); ?>"><?php echo e(__('Back')); ?></a>
</div>
<?php /**PATH /var/www/html/my_app/resources/views/admin/components/form-footer.blade.php ENDPATH**/ ?>