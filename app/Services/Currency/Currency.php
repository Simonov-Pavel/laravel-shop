<?php

namespace App\Services\Currency;

class Currency {
    public function convert($sum, $originCurrencyCode = 'RUB', $targetCurrencyCode = null){
        $originCurrency = Currency::byCode($originCurrencyCode)->first();
        if(is_null($targetCurrencyCode)){
            $targetCurrencyCode = session('currency', 'RUB');
        }
        $targetCurrency = Currency::byCode($targetCurrencyCode)->first();

        return $sum * $originCurrency->rate / $targetCurrency->rate;
    }
}