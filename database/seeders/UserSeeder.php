<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //element model tambah data
        User::create([
            //column tabe db=>value
            'name'=>"Staff tata usaha",
            'email'=>"staff_TU@gmail.com",
            'role'=>"staff",
            "password"=>Hash::make("staffTu"),
            //cara lain enkripsi: bcrypt
        ]);

        User::create([
            //column tabel db=>value
            'name'=>"Guru",
            'email'=>"guru_TU@gmail.com",
            'role'=>"guru",
            "password"=>Hash::make("guruTu"),
        ]);
    }
}
