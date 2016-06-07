<?php

namespace CawaKharkov\LaravelBalance\Interfaces;

/**
 * Interface BalanceServiceInterface
 * @package CawaKharkov\LaravelBalance\Interfaces
 */
interface BalanceServiceInterface
{
    public function writeOff($amount);
    public function add($amount);
    
}