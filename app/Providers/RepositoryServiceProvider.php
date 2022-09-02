<?php

namespace App\Providers;

use App\Contracts\CategoryContract;
use App\Contracts\CustomerContract;
use App\Contracts\ProductContract;
use App\Contracts\SupplierContract;
use App\Repositories\CategoryRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\ProductRepositories;
use App\Repositories\SupplierRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    protected $repositories = [
            CategoryContract::class => CategoryRepository::class,
            ProductContract::class  => ProductRepositories::class,
            SupplierContract::class => SupplierRepository::class,
            CustomerContract::class => CustomerRepository::class
    ];
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation){
            $this->app->bind($interface,$implementation);
        }
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
