<?php
/**
 * Laravel balance package config
 */
return [
    'prefix' => 'profile',
    'user' => App\User::class,
    'layout' => 'layouts.app',
    'list_view' => 'laravel-balance::transactions.list',
    
    /** 
     * Views to inject transaction repository, use $transactions in your view to access user transaction array
     */
    'compose' => [
        'laravel-balance::transactions.list',
    ]
];