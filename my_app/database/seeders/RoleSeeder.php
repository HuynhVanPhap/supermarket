<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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
                "name" => "Super Admin",
                "value" => 1
            ],
            [
                "name" => "Admin",
                "value" => 2
            ],
            [
                "name" => "Customer",
                "value" => 10
            ],
        ];

        Role::truncate();
        Role::insert($data);
    }
}
