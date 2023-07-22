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
     *
     * @return void
     */
    public function run()
    {
        $data = [

            [
                "name" => "Huỳnh Văn Pháp",
                "email" => "huynhvanphap198@gmail.com",
                "phone" => "0775425247",
                "address" => "Tp.Đà Nẵng - Việt Nam",
                "password" => Hash::make('Ab12345!'),
                "remember_token" => "",
                "role_id" => 1
            ],

        ];

        User::truncate();
        User::insert($data);
    }
}
