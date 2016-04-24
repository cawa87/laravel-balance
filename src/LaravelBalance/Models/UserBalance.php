<?php

namespace CawaKharkov\LaravelBalance\Models;


trait UserBalance
{

    public function transactions()
    {
        return $this->hasMany(BalanceTransaction::class);
    }

    public function balance()
    {
        $income = $this->transactions()
            ->where(['type' => 100])
            ->sum('value');

        $outcome = $this->transactions()
            ->where(['type' => 200])
            ->sum('value');

        $outcomePay = $this->transactions()
            ->where(['type' => 500,
                'accepted' => 1])
            ->sum('value');

        return (int)($income - $outcome - $outcomePay);
    }

}