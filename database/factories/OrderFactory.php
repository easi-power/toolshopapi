<?php

namespace Database\Factories;

use App\Http\Enums\OrderStatus;
use App\Models\Address;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(['busy', 'paid', 'in_delivery', 'done']),
            'user_id' => User::inRandomOrder()->first()->id,
            'address_id' => Address::inRandomOrder()->first()->id
        ];
    }
}
