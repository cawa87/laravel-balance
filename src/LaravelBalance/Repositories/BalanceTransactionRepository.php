<?php

namespace CawaKharkov\LaravelBalance\Repositories;


use CawaKharkov\LaravelBalance\Interfaces\BalanceTransactionInterface;
use CawaKharkov\LaravelBalance\Interfaces\TransactionRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Event;
use CawaKharkov\LaravelBalance\Events\TransactionCreated;

/**
 * Class BalanceTransactionRepository
 * @package CawaKharkov\LaravelBalance\Repositories
 */
class BalanceTransactionRepository implements TransactionRepositoryInterface
{

    /**
     * @var BalanceTransactionInterface
     */
    protected $model;

    /**
     * BalanceTransactionRepository constructor.
     * @param BalanceTransactionInterface $model
     */
    public function __construct(BalanceTransactionInterface $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function allAcceptedForUser($columns = array('*'))
    {
        return $this->model->where([
            'user_id' => Auth::user()->id,
            'accepted' => 1
        ])->get($columns);
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function allForUser($columns = array('*'))
    {
        return $this->model
            ->where('user_id',Auth::user()->id)
            ->get($columns);
    }

    /**
     * Create transaction
     * @param array $data
     */
    public function create(array $data)
    {
        //@todo implement some notification, calculation, etc.
        $transaction = $this->model->create($data);

        Event::fire(new TransactionCreated($transaction));

        return $transaction;
    }
}
