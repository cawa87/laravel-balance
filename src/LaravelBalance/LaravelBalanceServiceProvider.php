<?php

namespace CawaKharkov\LaravelBalance;


use CawaKharkov\LaravelBalance\Interfaces\BalanceTransactionInterface;
use CawaKharkov\LaravelBalance\Models\BalanceTransaction;
use CawaKharkov\LaravelBalance\Repositories\BalanceTransactionRepository;
use Illuminate\Support\ServiceProvider;
use CawaKharkov\LaravelBalance\Interfaces\TransactionRepositoryInterface;

/**
 * Class LaravelBalanceServiceProvider
 * @package LaravelBalanceServiceProvider
 */
class LaravelBalanceServiceProvider extends ServiceProvider
{

    /**
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../views', 'laravel-balance');

        $this->publishes([
            __DIR__ . '/../../config/laravel-balance.php' => config_path('laravel-balance.php'),
        ]);

        //      $this->app->bind('ZaLaravel\LaravelUser\Models\Interfaces\UserInterface', Config::get('auth.model'));
//        $this->app->bind('Illuminate\Contracts\Auth\Registrar', 'ZaLaravel\LaravelUser\Services\Registrar');
        $this->publishes([
            __DIR__ . '/../../database/migrations/' => database_path('/migrations/laravel-balance')
        ], 'migrations');

        include __DIR__ . '/../routes.php';

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TransactionRepositoryInterface::class, BalanceTransactionRepository::class);
        $this->app->bind(BalanceTransactionInterface::class, BalanceTransaction::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
       //     'transactions' => TransactionsProvider::class
        ];
    }

}