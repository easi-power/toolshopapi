<?php

namespace App\Helpers;

use App\Models\Order;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentHelper
{
    public function payOrder(Order $order, PaymentMethod $method)
    {
        try {
            $body = [
                "accountnumber" => "somenumber",
                "BIC" => "ABCDEFG"
            ];
            $orderId = $order->id;
            $methodId = $method->id;
            $http = Http::withHeaders([
                "Accept" => "application/json",
                "Content-Type" => "application/json",
            ])
                ->put(config('services.paymentengine.url'). "/order/$orderId/$methodId", $body)
                ->throw();
            return $http->collect();

        } catch (\Throwable $ex) {
            Log::channel('paymentengine')->error($ex);
            throw $ex;
        }
    }
}
