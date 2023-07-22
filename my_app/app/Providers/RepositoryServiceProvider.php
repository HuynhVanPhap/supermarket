<?php

namespace App\Providers;

use App\Repositories\AnalyticRevenue\AnalyticRevenueRepository;
use App\Repositories\AnalyticRevenue\AnalyticRevenueRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\DetailOrder\DetailOrderRepository;
use App\Repositories\DetailOrder\DetailOrderRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\RootCategory\RootCategoryRepository;
use App\Repositories\RootCategory\RootCategoryRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(RootCategoryRepositoryInterface::class, RootCategoryRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(DetailOrderRepositoryInterface::class, DetailOrderRepository::class);
        $this->app->bind(AnalyticRevenueRepositoryInterface::class, AnalyticRevenueRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
