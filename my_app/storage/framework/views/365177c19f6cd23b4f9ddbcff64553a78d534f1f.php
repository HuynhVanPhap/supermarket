<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(route('home.page')); ?>" class="brand-link">
        <span id="logo_store-admin"><?php echo e(config('constraint.brand')); ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                
                <img src="<?php echo e(asset('admin/images/avatar.jpg')); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo e(Auth::user()->name); ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manager')): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.dashboard.page')); ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                <?php echo e(__('Dashboard')); ?>

                            </p>
                        </a>
                    </li>
                <?php endif; ?>

                
                <li class="nav-header">
                    <i class="nav-icon fas fa-user-tag"></i>
                    <b><?php echo e(__('Personal')); ?></b>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(route('admin.users.show', Auth::user()->email)); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            <?php echo e(__('User Info')); ?>

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(route('admin.list.orders.page', Auth::user()->email)); ?>" class="nav-link">
                        <i class="nav-icon fas fa-scroll"></i>
                        <p>
                            <?php echo e(__('My orders')); ?>

                        </p>
                    </a>
                </li>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('owner')): ?>
                    
                    <li class="nav-header">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <b><?php echo e(__('User')); ?></b>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                <?php echo e(__('User Manager')); ?>

                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.users.index')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon text-info"></i>
                                    <p><?php echo e(__('List')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.users.create')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon text-warning"></i>
                                    <p><?php echo e(__('Create')); ?></p>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                <?php endif; ?>


                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manager')): ?>
                    
                    <li class="nav-header">
                        <i class="nav-icon fas fa-store"></i>
                        <b><?php echo e(__('Store')); ?></b>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                <?php echo e(__('Root Category Manager')); ?>

                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.root-categories.index')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon text-info"></i>
                                    <p><?php echo e(__('List')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.root-categories.create')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon text-warning"></i>
                                    <p><?php echo e(__('Create')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.root-categories.trash')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon text-danger"></i>
                                    <p><?php echo e(__('Trash')); ?></p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                <?php echo e(__('Category Manager')); ?>

                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.categories.index')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon text-info"></i>
                                    <p><?php echo e(__('List')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.categories.create')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon text-warning"></i>
                                    <p><?php echo e(__('Create')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.categories.trash')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon text-danger"></i>
                                    <p><?php echo e(__('Trash')); ?></p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-box"></i>
                            <p>
                                <?php echo e(__('Product Manager')); ?>

                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.products.index')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon text-info"></i>
                                    <p><?php echo e(__('List')); ?></p>
                                </a>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.products.create')); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon text-warning"></i>
                                        <p><?php echo e(__('Create')); ?></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.products.trash')); ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon text-danger"></i>
                                        <p><?php echo e(__('Trash')); ?></p>
                                    </a>
                                </li>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-inbox"></i>
                            <p>
                                <?php echo e(__('Order Manager')); ?>

                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.orders.index')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon text-info"></i>
                                    <p><?php echo e(__('List')); ?></p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH /var/www/html/my_app/resources/views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>