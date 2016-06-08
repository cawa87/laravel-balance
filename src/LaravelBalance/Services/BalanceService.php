<?php

namespace CawaKharkov\LaravelBalance\Services;


use CawaKharkov\LaravelBalance\Interfaces\BalanceServiceInterface;
use CawaKharkov\LaravelBalance\Interfaces\BalanceTransactionInterface;
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
        // TODO: Implement writeOff() method.
        $this->repository->create([
            'user_id' => $userId,
            'value' => $amount,
            'accepted' => 1,
            'hash' => uniqid('transaction_', true),
            'type' => BalanceTransaction::CONST_TYPE_PAYMENT,
        ]);
        
    }

    public function add($amount,$userId)
    {
        // TODO: Implement add() method.
    }
}