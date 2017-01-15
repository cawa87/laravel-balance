<?php

Route::group(['middleware' => ['auth','web'],'prefix' => config('laravel_balance.prefix')], function () {
    Route::get('transactions', [
        'as' => 'transactions.list',
        'uses' => '\CawaKharkov\LaravelBalance\Controllers\TransactionController@index']);
});
