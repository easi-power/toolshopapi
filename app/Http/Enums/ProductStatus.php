<?php

namespace App\Http\Enums;

enum ProductStatus: string
{
    case IN_STOCK = "in_stock";
    case TO_ORDER = "to_order";
    case ORDERED = "ordered";
    case OUT_OF_STOCK = "out_of_stock";
}
