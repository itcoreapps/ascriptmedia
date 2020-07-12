<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'u_id',
        'total_cost',
        'payment_type',
        'o_date',
        'bank_transaction_id',
        
    ];

}
