<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->realText(50),
            'description' => $this->faker->realText(100),
            'price' => $this->faker->randomFloat(2, 0, 99999999),
            'stock' => $this->faker->numberBetween(0,10000),
            'max_capacity' => $this->faker->numberBetween(100,1000000),
            'status' => $this->faker->state,
        ];
    }

    public function noCapacityLimits()
    {
        return $this->state(function (array $attributes) {
            return [
                'max_capacity' => null,
            ];
        });
    }

    public function noImageStyles()
    {
        return $this->state(function (array $attributes) {
            return [
                'image_styling' => null,
            ];
        });
    }
}
