<?php

namespace App\Providers;
use App\Interfaces\ExternalStockRepositoriesInterface;
use App\Repositories\ExternalStockRepository;


use App\Interfaces\EmployeesRepositoriesInterface;
use App\Repositories\EmployeesRepository;

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
         $this->app->bind(ExternalStockRepositoriesInterface::class, ExternalStockRepository::class);
         $this->app->bind(EmployeesRepositoriesInterface::class, EmployeesRepository::class);
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
