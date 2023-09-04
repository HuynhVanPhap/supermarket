<?php $__env->startSection('title'); ?>
    <?php echo e(__('Category').' | '.__('Edit')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo e(Breadcrumbs::render('categories.edit', $category)); ?>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e(__('Category')); ?></h3>
                    </div>

                    <div class="card-body">
                        <form
                            method="POST"
                            action="<?php echo e(route('admin.categories.update', $category->id)); ?>"
                        >
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php echo $__env->make('admin.components.form.input', [
                                            'label' => __("Category's name"),
                                            'placeholder' => __("Category's name"),
                                            'name' => 'name',
                                            'defaultValue' => $category->name
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>

                                    <div class="col-md-6">
                                        <?php echo $__env->make('admin.components.form.selected', [
                                            'label' => __("Category"),
                                            'name' => 'root_category_id',
                                            'data' => Arr::pluck($rootCategories, 'name', 'id'),
                                            'defaultValue' => $category->root_category_id
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            </div>

                            <?php echo $__env->make('admin.components.form-footer', [
                                'backUrl' => route('admin.categories.index')
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/my_app/resources/views/admin/pages/categories/edit.blade.php ENDPATH**/ ?>