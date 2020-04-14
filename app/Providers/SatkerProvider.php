<?php

namespace App\Providers;

use App\Repositories\Interfaces\SatkerRepositoryInterfaces;
use App\Repositories\Repository\SatkerRepository;
use Illuminate\Support\ServiceProvider;

class SatkerProvider extends ServiceProvider
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
        $this->app->bind(SatkerRepositoryInterfaces::class,SatkerRepository::class);
    }
}
