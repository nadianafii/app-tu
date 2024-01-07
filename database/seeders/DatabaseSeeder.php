<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
     
        User::create([
            "name" => "Kirana S.SI.",
            "email" => "kiran@gmail.com",
            "password" => Hash::make("kiranwikrama"),
            "role" => "guru",

        ]);
        User::create([
            "name" => "Luna S.Kom.",
            "email" => "Luna@gmail.com",
            "password" => Hash::make("lunawikrama"),
            "role" => "guru",
        ]);
        User::create([
            "name" => "Staff TU",
            "email" => "staff@gmail.com",
            "password" => Hash::make("staffwikrama"),
            "role" => "staff",
        ]);
    }
}
