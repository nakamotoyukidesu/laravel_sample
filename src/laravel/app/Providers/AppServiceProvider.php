<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use rameninfo\Domain\Models\Ramen\RamenRepository;
use rameninfo\Infrastructure\Repositories\Domain\Eloquent\EloquentRamenRepository;

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
