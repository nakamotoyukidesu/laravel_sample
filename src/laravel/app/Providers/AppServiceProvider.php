<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use rameninfo\Domain\Models\Ramen\RamenRepository;
use rameninfo\Domain\Models\TwitterData\TwitterDataRepository;
use rameninfo\Infrastructure\Repositories\Domain\Eloquent\EloquentRamenRepository;
use rameninfo\Infrastructure\Repositories\Domain\Eloquent\EloquentTwitterDataRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RamenRepository::class, EloquentRamenRepository::class);
        $this->app->bind(TwitterDataRepository::class, EloquentTwitterDataRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
