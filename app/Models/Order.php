<?php

namespace App\Models;

use App\Http\Enums\OrderStatus;

class Order extends SuperModel
{
    protected $table = "orders";
    protected $attributes = ['status' => OrderStatus::BUSY];
    protected $guarded = [];

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    public function order_products() {
        //TODO: write relationship to order_products
    }
}
