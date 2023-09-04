<?php
    $title = $title ?? 'Default Model';
    $content = $content ?? '<p>One fine body&hellip;</p>';
    $close = $close ?? __('Close');
    $agree = $agree ?? __('Accept');
?>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo e($title); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $content; ?>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-close" data-dismiss="modal"><?php echo e($close); ?></button>
                <button type="button" class="btn btn-warning btn-agree"><?php echo e($agree); ?></button>
            </div>
        </div>

    </div>

</div>
<?php /**PATH /var/www/html/my_app/resources/views/admin/components/modals/default.blade.php ENDPATH**/ ?>