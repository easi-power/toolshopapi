<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!User::where("email", "demo@pxl.net")->exists()) {
            User::factory(1, [
                "email" => "demo@pxl.net",
                "firstname" => "Demo",
                "lastname" => "PXL",
                "phone" => "12341234",
                "password" => "Workshop2022"
            ])
                // Assign a random address
                ->has(Address::factory(1), 'addresses')
                ->create();
        }
        User::factory(10)
            ->has(Address::factory(1), 'addresses')
            ->create();
    }
}
