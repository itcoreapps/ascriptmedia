<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey= "p_id";


    protected $fillable = [
        'p_name',
        'p_price_egp',
        'p_price_dollar',
        'p_price_bitcoins',
        'p_video',
        'num_of_sales',
        'p_description',
        'cat_id',
        
    ];


    public function cat(){
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function image(){
        return $this->hasMany('App\Models\Image','p_id');
    }
}
