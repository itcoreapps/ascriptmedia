<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends BackEndController
{
    public function __construct(Order $model){
        parent::__construct($model);
    }
}
