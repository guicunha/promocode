<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\RecipientRepository::class, \App\Repositories\RecipientRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\OfferRepository::class, \App\Repositories\OfferRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\VoucherRepository::class, \App\Repositories\VoucherRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\VoucherLogRepository::class, \App\Repositories\VoucherLogRepositoryEloquent::class);
        //:end-bindings:
    }
}
