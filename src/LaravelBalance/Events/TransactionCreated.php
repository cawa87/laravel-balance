<?php

namespace CawaKharkov\LaravelBalance\Events;

use CawaKharkov\LaravelBalance\Interfaces\BalanceTransactionInterface;
use Illuminate\Queue\SerializesModels;

/**
 * Class TransactionCreated
 * @package LaravelBalance\Events
 */
class TransactionCreated
{
    use SerializesModels;

    public $transaction;

    /**
     * Create a new event instance.
     * @param BalanceServiceInterface $transaction
     */
    public function __construct(BalanceTransactionInterface $transaction)
    {
        $this->transaction = $transaction;
    }
}
