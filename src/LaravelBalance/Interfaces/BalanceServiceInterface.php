<?php

namespace CawaKharkov\LaravelBalance\Interfaces;

/**
 * Interface BalanceServiceInterface
 * @package CawaKharkov\LaravelBalance\Interfaces
 */
interface BalanceServiceInterface
{
    public function writeOff($amount,$userId);
    public function add($amount,$userId);
    
}