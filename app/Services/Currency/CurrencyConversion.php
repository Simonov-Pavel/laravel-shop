<?php

namespace App\Services\Currency;

use App\Models\Currency;

class CurrencyConversion {
    public static function convert($sum, $originCurrencyCode = 'RUB', $targetCurrencyCode = null){
        $originCurrency = Currency::byCode($originCurrencyCode)->first();
        if(is_null($targetCurrencyCode)){
            $targetCurrencyCode = session('currency', 'RUB');
        }
        $targetCurrency = Currency::byCode($targetCurrencyCode)->first();

        return $sum * $originCurrency->rate / $targetCurrency->rate;
    }
}