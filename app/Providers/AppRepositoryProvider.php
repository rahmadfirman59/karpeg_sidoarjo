<?php

namespace App\Providers;

use App\Repositories\Repository\AppRepository;
use App\Repositories\Interfaces\AppRepositoryInterfaces;
use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->bind(AppRepositoryInterfaces::class,AppRepository::class);
    }
}
