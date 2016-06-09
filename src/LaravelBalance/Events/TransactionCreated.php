<?php

namespace LaravelBalance\Events;

use App\Podcast;
use App\Events\Event;
use CawaKharkov\LaravelBalance\Interfaces\BalanceServiceInterface;
use Illuminate\Queue\SerializesModels;

/**
 * Class TransactionCreated
 * @package LaravelBalance\Events
 */
class TransactionCreated extends Event
{
    use SerializesModels;

    public $transaction;

    /**
     * Create a new event instance.
     * @param BalanceServiceInterface $transaction
     */
    public function __construct(BalanceServiceInterface $transaction)
    {
        $this->transaction = $transaction;
    }
}