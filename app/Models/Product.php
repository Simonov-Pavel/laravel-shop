<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'code', 'category_id', 'description', 'image', 'price', 'new', 'hit', 
    'recomend', 'count', 'name_en', 'description_en'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getPriceForCount(){
        if(!is_null($this->pivot)){
            return $this->price * $this->pivot->count;
        }
        return $this->price;
    }

    public function scopeByCode($query, $code){
        return $query->where('code', $code);
    }

    public function scopeHit($query){
        return $query->where('hit', 1);
    }

    public function scopeNew($query){
        return $query->where('new', 1);
    }

    public function scopeRecomend($query){
        return $query->where('recomend', 1);
    }

    public function setNewAttribute($value){
        $this->attributes['new'] = $value === 'on' ? 1 : 0;
    }

    public function setHitAttribute($value){
        $this->attributes['hit'] = $value === 'on' ? 1 : 0;
    }

    public function setRecomendAttribute($value){
        $this->attributes['recomend'] = $value === 'on' ? 1 : 0;
    }

    public function isAvailable(){
        return !$this->trashed() && $this->count > 0;
    }

    public function isNew(){
        return $this->new === 1;
    }

    public function isHit(){
        return $this->hit === 1;
    }

    public function isRecomend(){
        return $this->recomend === 1;
    }
}
