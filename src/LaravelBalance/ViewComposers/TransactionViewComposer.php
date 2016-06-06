<?php

namespace CawaKharkov\LaravelBalance\ViewComposers;

use CawaKharkov\LaravelBalance\Interfaces\TransactionRepositoryInterface;
use Illuminate\View\View;

class TransactionViewComposer
{
    /**
     * The user repository implementation.
     *
     * @var BalanceTransactionRepository
     */
    protected $transactions;

    /**
     * Create a new profile composer.
     *
     * @param  BalanceTransactionRepository  $transactions
     * @return void
     */
    public function __construct(TransactionRepositoryInterface $transactions)
    {
        // Dependencies automatically resolved by service container...
        $this->transactions = $transactions;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('transactions', $this->transactions->allAcceptedForUser());
    }
}