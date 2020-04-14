<?php

namespace App\Providers;

use App\Repositories\Interfaces\PegawaiRepositoryInterfaces;
use App\Repositories\Repository\PegawaiRepository;
use Illuminate\Support\ServiceProvider;

class PegawaiProvider extends ServiceProvider
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
        $this->app->bind(PegawaiRepositoryInterfaces::class,PegawaiRepository::class);
    }
}
