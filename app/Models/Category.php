<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LocalizationTrait;

class Category extends Model
{
    use HasFactory, LocalizationTrait;

    protected $fillable = ['name', 'code', 'description', 'image', 'name_en', 'description_en'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
