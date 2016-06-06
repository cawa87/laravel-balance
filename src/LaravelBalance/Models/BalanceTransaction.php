<?php

namespace CawaKharkov\LaravelBalance\Models;

use CawaKharkov\LaravelBalance\Interfaces\BalanceTransactionInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BalanceTransaction
 * @package CawaKharkov\LaravelBalance\Models
 */
class BalanceTransaction extends Model implements BalanceTransactionInterface
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value',
        'hash',
        'type',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'    =>  'integer',
        'value' => 'float'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    const CONST_TYPE_REFILL = 100;
    const CONST_TYPE_PAYMENT = 200;
    const CONST_TYPE_CHECKOUT = 500;


    /**
     * Transactions labels
     * @var array
     */
    private $typeLabels = [
        self::CONST_TYPE_REFILL => 'Пополнение',
        self::CONST_TYPE_PAYMENT => 'Оплата',
        self::CONST_TYPE_CHECKOUT => 'Вывод',
    ];

    /**
     * Bootstrap labels
     * @var array
     */
    protected $labels = [
        self::CONST_TYPE_REFILL  => 'warning',
        self::CONST_TYPE_PAYMENT => 'success',
        self::CONST_TYPE_CHECKOUT => 'danger',

    ];

    public function user()
    {
       return $this->belongsTo(config('laravel_balance.user'));
    }


}