<?php

namespace App\Services;

/**
 * Class CurrencyConverter
 * @package App\Services
 */
class CurrencyConverter
{
    public const RATES = [
        'HRK' => 1.0,
        'GBP' => 8,455687,
        'EUR' => 7.532,
        'YEN' => 5,969509,
        'CAN' => 4.874,
        'USD' => 6.189,
    ];

    /**
     * @param string $currencyTo
     * @param float $amount
     * @return float
     */
    public static function makeConversion($currencyTo, $amount): float
    {
        return round(self::RATES[$currencyTo] * $amount, 5);
    }
}
