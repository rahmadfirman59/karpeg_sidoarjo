<?php

namespace App\Providers;

use App\Repositories\Repository\CetakKartuRepository;
use App\Repositories\Repository\CetakKartuRepositoryInterfaces;
use Illuminate\Support\ServiceProvider;

class CetakKartuProvider extends ServiceProvider
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
        $this->app->bind(CetakKartuRepositoryInterfaces::class,CetakKartuRepository::class);
    }
}
