<?php
    $label = $label ?? null;
    $required = $required ?? false;
    $type = $type ?? 'text';
    $placeholder = $placeholder ?? null;
    $name = $name ?? null;
    $defaultValue = $defaultValue ?? null;
    $append = $append ?? null;
?>

<div class="form-group">
    <label for="exampleInputEmail1"><?php echo e($label); ?></label>

    <?php if($required): ?>
        <span class="right badge badge-danger"><?php echo e(__('Required')); ?></span>
    <?php endif; ?>

    <div class="input-group">
        <input
            type="<?php echo e(in_array($type, config('constraint.type')) ? $type : 'text'); ?>"
            class="form-control <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
            id="exampleInputEmail1"
            placeholder="<?php echo e($placeholder); ?>"
            name="<?php echo e($name); ?>"
            value="<?php echo e(old($name, $defaultValue)); ?>"
        >

        <?php if(isset($append)): ?>
            <div class="input-group-append">
                <span class="input-group-text"><?php echo e($append); ?></span>
            </div>
        <?php endif; ?>
    </div>

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
<?php /**PATH /var/www/html/my_app/resources/views/admin/components/form/input.blade.php ENDPATH**/ ?>