<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\BaseRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\KataRepositoryInterface;
use App\Repository\Eloquent\KataRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            BaseRepositoryInterface::class,
            BaseRepository::class
        );

        $this->app->bind(
            KataRepositoryInterface::class,
            KataRepository::class
        );
    }
}
