<?php

namespace CawaKharkov\LaravelBalance\Services;


use CawaKharkov\LaravelBalance\Interfaces\BalanceServiceInterface;
use CawaKharkov\LaravelBalance\Interfaces\TransactionRepositoryInterface;
use CawaKharkov\LaravelBalance\Models\BalanceTransaction;
use Illuminate\Support\Facades\Auth;

class BalanceService implements BalanceServiceInterface
{
    
    protected $repository;

    /**
     * BalanceService constructor.
     * @param $repository
     */
    public function __construct(TransactionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Write off from user(current) balance
     * @param $amount
     */
    public function writeOff($amount,$userId)
    {
        if ($this->canPay($amount, $userId)) {
            return false;

        }

        return $this->repository->create([
            'user_id' => $userId,
            'value' => $amount,
            'accepted' => 1,
            'hash' => uniqid('transaction_', true),
            'type' => BalanceTransaction::CONST_TYPE_PAYMENT,
        ]);

    }

    /**
     * Check if user can pay for transaction
     * @param $amount
     * @param $userId
     * @return bool
     */
    public function canPay($amount, $userId)
    {
        $balance = config('laravel_balance.user')::find($userId)->balance();

        return ($balance < $amount) ? false : true;
    }

    public function add($amount,$userId)
    {
        // TODO: Implement add() method.
    }
}