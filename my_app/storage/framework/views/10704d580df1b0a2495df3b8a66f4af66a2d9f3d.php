<?php $__env->startSection('title'); ?>
<?php echo e(__('Category').' | '.__('List')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo e(Breadcrumbs::render('categories.index')); ?>


<section class="content">
    <div class="container-fluid">
        <?php echo $__env->make('admin.layouts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e(__('Filter')); ?></h3>
                    </div>
                    <div class="card-body">
                        <form
                            method="GET"
                            action="<?php echo e(route('admin.categories.index')); ?>"
                        >
                            <div class="row">
                                <div class="col-md-4">
                                    <?php echo $__env->make('admin.components.form.input', [
                                        'label' => __("Category's name"),
                                        'placeholder' => __("Category's name"),
                                        'name' => 'filterName'
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <div class="col-md-4">
                                    <?php echo $__env->make('admin.components.form.selected', [
                                        'label' => __("Root Categories"),
                                        'name' => 'filterRootCategoryId',
                                        'data' => Arr::pluck($rootCategories, 'name', 'id')
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>

                                <div class="col-md-4">
                                    <?php echo $__env->make('admin.components.form.selected', [
                                        'label' => __("Display"),
                                        'name' => 'filterDisplay',
                                        'data' => array_flip(config('constraint.display'))
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning float-right"><?php echo e(__('Search')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e(__('Categories')); ?></h3>
                    </div>

                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dtr-inline"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><?php echo e(__("Category's name")); ?></th>
                                                <th><?php echo e(__('Path')); ?></th>
                                                <th><?php echo e(__('Category')); ?></th>
                                                <th><?php echo e(__('Display')); ?></th>
                                                <th><?php echo e(__('Action')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!blank($categories)): ?>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e(++$key); ?></td>
                                                        <td><?php echo e($category->name); ?></td>
                                                        <td>
                                                            <p class="text-info"><?php echo e('/'.$category->slug); ?></p>
                                                        </td>
                                                        <td>
                                                            <span class="right badge badge-info"><?php echo e($category->rootCategory?->name); ?></span>
                                                        </td>
                                                        <td>
                                                            <?php echo $__env->make('admin.components.form.switch', [
                                                                'name' => 'display_status',
                                                                'classes' => ['display-status'],
                                                                'data' => $category->id,
                                                                'checked' => $category->display_status
                                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $__env->make('admin.components.action', [
                                                                'editUrl' => route('admin.categories.edit', $category->id),
                                                                'removeUrl' => route('admin.categories.destroy', $category->id)
                                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php echo $categories->appends(Request::all())->links('admin.components.pagination'); ?>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<?php echo $__env->make('admin.components.modals.default', [
    'title' => __('Alert'),
    'content' => __('This action will affect the associated data. Are you want continue ?')
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/my_app/resources/views/admin/pages/categories/index.blade.php ENDPATH**/ ?>