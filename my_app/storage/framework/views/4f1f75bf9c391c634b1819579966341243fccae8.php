<?php if($paginator->hasPages()): ?>
<div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
            <?php echo e(__('Showing entries', [
                'firstItem' => $paginator->firstItem(),
                'lastItem' => $paginator->lastItem(),
                'total' => $paginator->total()
            ])); ?>

        </div>
    </div>
    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
            <ul class="pagination">
                
                <?php if($paginator->onFirstPage()): ?>
                    <li class="paginate_button page-item previous disabled"
                        id="example1_previous">
                        <a href="#" aria-controls="example1"
                            data-dt-idx="0" tabindex="0" class="page-link"><?php echo e(__('Previous')); ?>

                        </a>
                    </li>
                <?php else: ?>
                    <li class="paginate_button page-item previous"
                        id="example1_previous">
                        <a href="<?php echo e($paginator->previousPageUrl()); ?>" aria-controls="example1"
                            data-dt-idx="0" tabindex="0" class="page-link"><?php echo e(__('Previous')); ?>

                        </a>
                    </li>
                <?php endif; ?>

                
                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php if(is_array($element)): ?>
                        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($page == $paginator->currentPage()): ?>
                                <li class="paginate_button page-item active">
                                    <span aria-controls="example1" data-dt-idx="1" tabindex="0"
                                        class="page-link"><?php echo e($page); ?>

                                    </span>
                                </li>
                            <?php elseif(($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 1) || $page == $paginator->lastPage()): ?>
                                <li class="paginate_button page-item">
                                    <a href="<?php echo e($url); ?>" aria-controls="example1" data-dt-idx="1" tabindex="0"
                                        class="page-link"><?php echo e($page); ?>

                                    </a>
                                </li>
                            <?php elseif(($page == $paginator->currentPage() - 1 || $page == $paginator->currentPage() - 1) || $page == $paginator->lastPage()): ?>
                                <li class="paginate_button page-item">
                                    <a href="<?php echo e($url); ?>" aria-controls="example1" data-dt-idx="1" tabindex="0"
                                        class="page-link"><?php echo e($page); ?>

                                    </a>
                                </li>
                            <?php elseif($page == $paginator->lastPage() - 1): ?>
                                <li class="page-item disabled" aria-disabled="true"><span class="page-link"><?php echo e('...'); ?></span></li>
                            <?php elseif($page == 2 && $paginator->currentPage() >= 4): ?>
                                <li class="page-item disabled" aria-disabled="true"><span class="page-link"><?php echo e('...'); ?></span></li>
                            <?php elseif($page == 1 ): ?>
                                <li class="paginate_button page-item">
                                    <a href="<?php echo e($url); ?>" aria-controls="example1" data-dt-idx="1" tabindex="0"
                                        class="page-link"><?php echo e($page); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <?php if($paginator->hasMorePages()): ?>
                    <li class="paginate_button page-item next" id="example1_next">
                            <a href="<?php echo e($paginator->nextPageUrl()); ?>" aria-controls="example1" data-dt-idx="7" tabindex="0"
                            class="page-link"><?php echo e(__('Next')); ?>

                        </a>
                    </li>
                <?php else: ?>
                    <li class="paginate_button page-item next disabled" id="example1_next">
                        <a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0"
                            class="page-link"><?php echo e(__('Next')); ?>

                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<?php endif; ?>
<?php /**PATH /var/www/html/my_app/resources/views/admin/components/pagination.blade.php ENDPATH**/ ?>