<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $methods = [
            ["name" => "PayPal", "icon" => "cc-paypal"],
            ["name" => "Mastercard", "icon" => "cc-mastercard"],
            ["name" => "Visa", "icon" => "cc-visa"],
            ["name" => "Creditcard", "icon" => "credit-card"],
            ["name" => "Bitcoin", "icon" => "bitcoin"],
            ["name" => "Ethereum", "icon" => "ethereum"],
        ];

        foreach ($methods as $method)
        {
            PaymentMethod::create($method);
        }
    }
}
