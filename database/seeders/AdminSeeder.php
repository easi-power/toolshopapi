<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "firstname" => "Easi",
            "lastname" => "Admin",
            "email" => "demo@easi.net",
            "phone" => "016121853",
            "password" => Hash::make("Easi2021")
        ]);
    }
}
