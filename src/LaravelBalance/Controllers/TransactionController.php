<?php

namespace CawaKharkov\LaravelBalance\Controllers;


use App\Http\Controllers\Controller;
use CawaKharkov\LaravelBalance\Models\BalanceTransaction;

class TransactionController extends Controller
{
    public function index()
    {
        return view(config('laravel_balance.list_view'));
    }
}