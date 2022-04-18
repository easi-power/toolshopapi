<?php

namespace App\Models;

use App\Http\Enums\ProductStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends SuperModel
{
    protected $guarded = [];
    protected $casts = [
        "price" => "decimal:2",
        "max_capacity" => "integer",
        "stock" => "integer",
        "status" => ProductStatus::class,
    ];
}
