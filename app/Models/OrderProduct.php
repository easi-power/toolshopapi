<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends SuperModel
{
    protected $table = "order_products";
    protected $guarded = [];

    public function product()
    {
        //TODO: write relationship to products
    }
}
