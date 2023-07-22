<?php

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\RootCategory;
use App\Models\User;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('Home'), '#');
});

Breadcrumbs::for('categories', function ($trail) {
    $trail->push(__('Category Manager'), '#');
});

Breadcrumbs::for('categories.index', function ($trail) {
    $trail->parent('categories');
    $trail->push(__('List'), route('admin.categories.index'));
});

Breadcrumbs::for('categories.create', function ($trail) {
    $trail->parent('categories');
    $trail->push(__('Create'), route('admin.categories.create'));
});

Breadcrumbs::for('categories.edit', function ($trail, Category $category) {
    $trail->parent('categories');
    $trail->push($category->name, route('admin.categories.edit', $category->id));
});

Breadcrumbs::for('categories.trash', function ($trail) {
    $trail->parent('categories');
    $trail->push(__('Trash'), route('admin.categories.trash'));
});

Breadcrumbs::for('root-categories', function ($trail) {
    $trail->push(__('Root Category Manager'), '#');
});

Breadcrumbs::for('root-categories.index', function ($trail) {
    $trail->parent('root-categories');
    $trail->push(__('List'), route('admin.root-categories.index'));
});

Breadcrumbs::for('root-categories.create', function ($trail) {
    $trail->parent('root-categories');
    $trail->push(__('Create'), route('admin.root-categories.create'));
});

Breadcrumbs::for('root-categories.edit', function ($trail, RootCategory $rootCategory) {
    $trail->parent('root-categories');
    $trail->push($rootCategory->name, route('admin.root-categories.edit', $rootCategory->id));
});

Breadcrumbs::for('root-categories.trash', function ($trail) {
    $trail->parent('root-categories');
    $trail->push(__('Trash'), route('admin.root-categories.trash'));
});

Breadcrumbs::for('products', function ($trail) {
    $trail->push(__('Product Manager'), '#');
});

Breadcrumbs::for('products.index', function ($trail) {
    $trail->parent('products');
    $trail->push(__('List'), route('admin.products.index'));
});

Breadcrumbs::for('products.create', function ($trail) {
    $trail->parent('products');
    $trail->push(__('Create'), route('admin.products.create'));
});

Breadcrumbs::for('products.edit', function ($trail, Product $product) {
    $trail->parent('products');
    $trail->push($product->name, route('admin.products.edit', $product->id));
});

Breadcrumbs::for('products.trash', function ($trail) {
    $trail->parent('products');
    $trail->push(__('Trash'), route('admin.products.trash'));
});

Breadcrumbs::for('home.page', function ($trail) {
    $trail->push(__('Home'), route('home.page'));
});

Breadcrumbs::for('detail.page', function ($trail, Product $product) {
    $trail->parent('home.page');
    $trail->push($product->name, route('detail.page', $product->id));
});

Breadcrumbs::for('category.page', function ($trail, string $categoryName) {
    $trail->parent('home.page');
    $trail->push($categoryName, '#');
});

Breadcrumbs::for('cart.page', function ($trail) {
    $trail->parent('home.page');
    $trail->push(__('Cart'), route('cart.page'));
});

Breadcrumbs::for('customer.info.page', function ($trail) {
    $trail->parent('home.page');
    $trail->push(__('Customer Info'), route('customer.info.page'));
});

Breadcrumbs::for('payment.page', function ($trail) {
    $trail->parent('home.page');
    $trail->push(__('Payment'), route('payment.page'));
});

Breadcrumbs::for('not.found.page', function ($trail) {
    $trail->parent('home.page');
    $trail->push(__('404'), route('not.found.page'));
});

Breadcrumbs::for('orders', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Order Manager'), '#');
});

Breadcrumbs::for('orders.index', function ($trail) {
    $trail->parent('orders');
    $trail->push(__('List'), route('admin.orders.index'));
});

Breadcrumbs::for('orders.list', function ($trail) {
    $trail->parent('home');
    $trail->push(__('My orders'), '#');
});

Breadcrumbs::for('orders.show', function ($trail, Order $order) {
    $trail->parent('orders');
    $trail->push(__('Detail', ['name' => __('Order')]).' - '.$order->code, route('admin.orders.show', $order->id));
});

Breadcrumbs::for('dashboard.page', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Dashboard'), '#');
});

Breadcrumbs::for('users', function ($trail) {
    $trail->parent('home');
    $trail->push(__('User Manager'), '#');
});

Breadcrumbs::for('users.info', function ($trail) {
    $trail->parent('home');
    $trail->push(__('User Info'), '#');
});

Breadcrumbs::for('users.index', function ($trail) {
    $trail->parent('users');
    $trail->push(__('List'), route('admin.users.index'));
});

Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users');
    $trail->push(__('Create'), route('admin.users.create'));
});

Breadcrumbs::for('users.show', function ($trail, User $user) {
    $trail->parent('users');
    $trail->push($user->name, route('admin.users.show', $user->id));
});

