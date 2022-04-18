<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "street" => $this->faker->streetName,
            "number" => $this->faker->numberBetween(1, 100),
            "zipcode" => $this->faker->numberBetween(1000, 9999),
            "city" => $this->faker->city,
            "country" => $this->faker->countryISOAlpha3,
        ];
    }
}
