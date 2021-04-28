<?php

namespace App\Providers;

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
        $this->registerService();
        $this->registerModel();
        $this->registerRepository();
    }

    private function registerService()
    {

    }

    /*
    * Register Model for Ioc
    */
    private function registerModel()
    {
    }

    /*
    * Register Repository for Ioc
    */
    private function registerRepository()
    {
        $this->app->bind('App\Repositories\Contracts\AddressInterface', 'App\Repositories\AddressRepository');
        $this->app->bind('App\Repositories\Contracts\BrandInterface', 'App\Repositories\BrandRepository');
        $this->app->bind('App\Repositories\Contracts\CategoryInterface', 'App\Repositories\CategoryRepository');
        $this->app->bind('App\Repositories\Contracts\CouponInterface', 'App\Repositories\CouponRepository');
        $this->app->bind('App\Repositories\Contracts\CustomerInterface', 'App\Repositories\CustomerRepository');
        $this->app->bind('App\Repositories\Contracts\EmployeeInterface', 'App\Repositories\EmployeeRepository');
        $this->app->bind('App\Repositories\Contracts\OrderInterface', 'App\Repositories\OrderRepository');
        $this->app->bind('App\Repositories\Contracts\ProductInterface', 'App\Repositories\ProductRepository');
        $this->app->bind('App\Repositories\Contracts\SellerInterface', 'App\Repositories\SellerRepository');
        $this->app->bind('App\Repositories\Contracts\ShopInterface', 'App\Repositories\ShopRepository');
        $this->app->bind('App\Repositories\Contracts\SliderInterface', 'App\Repositories\SliderRepository');
        $this->app->bind('App\Repositories\Contracts\UserCartInterface', 'App\Repositories\UserCartRepository');
        $this->app->bind('App\Repositories\Contracts\UserInterface', 'App\Repositories\UserRepository');
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
