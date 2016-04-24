<?php

namespace CawaKharkov\LaravelBalance\Providers;


use  \Illuminate\Support\ServiceProvider;

class TransactionsProvider  extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer(
            config('laravel_balance.compose'),\CawaKharkov\LaravelBalance\ViewComposers\TransactionViewComposer::class
        );
      
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}