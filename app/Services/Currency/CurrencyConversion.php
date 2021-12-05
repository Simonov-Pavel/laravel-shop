<?php

namespace App\Services\Currency;

use App\Models\Currency;

class CurrencyConversion {

    protected static $container;

    public static function loadContainer(){
        if(is_null(self::$container)){
            $currensies = Currency::get();
            foreach($currensies as $currency){
                self::$container[$currency->code] = $currency;
            }
        }
    }

    public static function getCurrencies(){
        self::loadContainer();
        return self::$container;
    }

    public static function convert($sum, $originCurrencyCode = 'RUB', $targetCurrencyCode = null){
        self::loadContainer();
        $originCurrency = self::$container[$originCurrencyCode];
        if(is_null($targetCurrencyCode)){
            $targetCurrencyCode = session('currency', 'RUB');
        }
        $targetCurrency = self::$container[$targetCurrencyCode];;

        return $sum * $originCurrency->rate / $targetCurrency->rate;
    }

    public static function getCurrencySymbol(){
        self::loadContainer();
        $currency = self::$container[session('currency', 'RUB')];
        return $currency->symbol;
    }
}