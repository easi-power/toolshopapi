<?php
namespace App\Http\Enums;

enum OrderStatus: string {
    case BUSY = 'busy';
    case PAID = 'paid';
    case DELIVER = 'in_delivery';
    case DONE = 'done';
}
