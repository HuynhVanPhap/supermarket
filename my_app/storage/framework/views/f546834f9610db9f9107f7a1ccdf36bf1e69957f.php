<?php
    $label = $label ?? '';
    $required = $required ?? false;
    $disabled = $disabled ?? false;
    $data = $data ?? []; // [ key => value ]
    $name = $name ?? '';
    $defaultValue = $defaultValue ?? '';
    $default = $default ?? true;
    $id = $id ?? '';
    $class = $class ?? '';
    $multiple = ($multiple) ?? false;
?>

<div class="form-group">
    <label><?php echo e($label); ?></label>
    <?php if($required): ?>
        <span class="right badge badge-danger"><?php echo e(__('Required')); ?></span>
    <?php endif; ?>
    <select
        id="<?php echo e($id); ?>"
        <?php echo e(($required) ? 'required' : ''); ?>

        <?php echo e(($multiple) ? 'multiple' : ''); ?>

        class="<?php echo e($class); ?> form-control select2 <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        name="<?php echo e($name); ?>"
        <?php if($disabled): ?>
            <?php echo e('disabled'); ?>

        <?php endif; ?>
        style="width: 100%;"
    >
        <?php if(isset($data)): ?>
            <?php if($default): ?>
            <option value="">
                <?php echo e(__("Select your's option")); ?>

            </option>
            <?php endif; ?>

            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($value); ?>" <?php echo e((old($name, $defaultValue) == $value) ? 'selected' : ''); ?>>
                    <?php echo e(__(ucwords($item))); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <option value="">
                <?php echo e(__("Select your's option")); ?>

            </option>
        <?php endif; ?>
    </select>

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
<?php /**PATH /var/www/html/my_app/resources/views/admin/components/form/selected.blade.php ENDPATH**/ ?>