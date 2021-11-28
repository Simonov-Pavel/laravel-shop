<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\App;

trait LocalizationTrait {
    protected $defaultLocale = 'ru';

    public function __($fieldName)
    {
        $locale = App::getLocale() ?? $this->defaultLocale;

        if($locale === 'en'){
            $field = $fieldName . '_en';
        }else $field = $fieldName;
        
        $attributes = array_keys($this->attributes);
        
        if(!in_array($field, $attributes)){
            throw new \LogicException('no such attribute for model ' . get_class($this));
        }
        
        if($locale === 'en' && (is_null($this->$field) || empty($this->$field))){
            return $this->$fieldName; 
        }

        return $this->$field;
    }
}