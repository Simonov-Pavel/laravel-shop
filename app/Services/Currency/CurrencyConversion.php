<?php

namespace App\Services\Currency;

use App\Models\Currency;
use Carbon\Carbon;

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

    public static function convert($sum, $originCurrencyCode = 'EUR', $targetCurrencyCode = null){
        self::loadContainer();
        $originCurrency = self::$container[$originCurrencyCode];

        if($originCurrency->rate !=0 || $originCurrency->updated_at->startOfDay() != Carbon::now()->startOfDay()){
            CurrencyRates::getRates();
            self::loadContainer();
            $originCurrency = self::$container[$originCurrencyCode];
        }

        if(is_null($targetCurrencyCode)){
            $targetCurrencyCode = session('currency', 'EUR');
        }
        $targetCurrency = self::$container[$targetCurrencyCode];

        if($targetCurrency->rate == 0 || $targetCurrency->updated_at->startOfDay() != Carbon::now()->startOfDay()){
            CurrencyRates::getRates();
            self::loadContainer();
            $targetCurrency = self::$container[$targetCurrencyCode];
        }

        return $sum / $originCurrency->rate * $targetCurrency->rate;
    }

    public static function getCurrencySymbol(){
        self::loadContainer();
        $currency = self::$container[session('currency', 'EUR')];
        return $currency->symbol;
    }

    public static function getBaseCurrency(){
        self::loadContainer();
        foreach(self::$container as $code=>$currency){
            if($currency->isMain()){
                return $currency;
            }
        }
    }
}