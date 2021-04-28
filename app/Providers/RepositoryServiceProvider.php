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
        $this->app->bind('App\Repository\Contracts\AddressInterface', 'App\Repository\AddressRepository');
        $this->app->bind('App\Repository\Contracts\BrandInterface', 'App\Repository\BrandRepository');
        $this->app->bind('App\Repository\Contracts\CategoryInterface', 'App\Repository\CategoryRepository');
        $this->app->bind('App\Repository\Contracts\CouponInterface', 'App\Repository\CouponRepository');
        $this->app->bind('App\Repository\Contracts\CustomerInterface', 'App\Repository\CustomerRepository');
        $this->app->bind('App\Repository\Contracts\EmployeeInterface', 'App\Repository\EmployeeRepository');
        $this->app->bind('App\Repository\Contracts\OrderInterface', 'App\Repository\OrderRepository');
        $this->app->bind('App\Repository\Contracts\ProductInterface', 'App\Repository\ProductRepository');
        $this->app->bind('App\Repository\Contracts\SellerInterface', 'App\Repository\SellerRepository');
        $this->app->bind('App\Repository\Contracts\ShopInterface', 'App\Repository\ShopRepository');
        $this->app->bind('App\Repository\Contracts\SliderInterface', 'App\Repository\SliderRepository');
        $this->app->bind('App\Repository\Contracts\UserCartInterface', 'App\Repository\UserCartRepository');
        $this->app->bind('App\Repository\Contracts\UserInterface', 'App\Repository\UserRepository');
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
