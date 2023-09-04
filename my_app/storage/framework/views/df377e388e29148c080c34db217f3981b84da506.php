<?php
    $name = $name ?? null;
    $checked = $checked ?? false;
    $data = $data ?? null;
    $classes = $classes ?? [];
?>

<div class="form-group">
    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
    <input
        type="checkbox"
        name="<?php echo e($name); ?>"
        id="customSwitch<?php echo e($data); ?>"
        <?php echo e(($checked) ? 'checked' : ''); ?>

        <?php echo e(!empty($data) ? "data-id-value=".$data : ''); ?>

        class="custom-control-input <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($item); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>"
    >
    <label class="custom-control-label" for="customSwitch<?php echo e($data); ?>"></label>

    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="error invalid-feedback" style="display: inline;"><?php echo e($errors->first($name)); ?></div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<?php /**PATH /var/www/html/my_app/resources/views/admin/components/form/switch.blade.php ENDPATH**/ ?>