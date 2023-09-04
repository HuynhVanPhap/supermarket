<?php
    $editUrl = $editUrl ?? null;
    $removeUrl = $removeUrl ?? null;
?>

<div class="btn-group" role="group" aria-label="Basic example">
    <a
        href="<?php echo e($editUrl); ?>"
        class="btn btn-warning mr-1"
    >
        <i class="fas fa-pencil-alt"></i>
    </a>
    <form
        class="delete-form"
        action="<?php echo e($removeUrl); ?>"
        method="POST"
    >
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>

        <button
            type="submit"
            class="btn btn-danger btn-remove"
            data-toggle="modal"
            data-target="#modal-default"
        >
            <i class="fas fa-trash"></i>
        </button>
    </form>
</div>
<?php /**PATH /var/www/html/my_app/resources/views/admin/components/action.blade.php ENDPATH**/ ?>