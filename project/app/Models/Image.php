<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $primaryKey= "img_id";

    protected $fillable = [
        'img_path',
        'p_id',
        // 'img_id'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'p_id');
    }
}
