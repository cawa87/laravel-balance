<?php

namespace CawaKharkov\LaravelBalance\Interfaces;

/**
 * Indicates that user model uses transaction functionality
 * Interface UserHasBalance
 * @package CawaKharkov\Interfaces
 */
interface UserHasBalance
{

    public function balance();
    public function transactions();
    
}