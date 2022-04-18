<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
            OrderProductSeeder::class
        ]);
    }
}
