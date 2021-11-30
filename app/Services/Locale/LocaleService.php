<?php

namespace App\Services\Locale;

class LocaleService{
    public static function locale(){
        $locale = session('locale');

        if($locale && in_array($locale, config('app.locales'))){
            return $locale;
        }

        return '';
    }
}