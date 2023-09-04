<?php

namespace Database\Seeders;

use App\Models\RootCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RootCategorySeeder extends Seeder
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
                "name" => 'Thịt, cá, trứng, hải sản',
                "slug" => "thit-ca-trung-hai-san-1182531600",
                "display_status" => 1,
            ],
            [
                "name" => 'Rau, củ, nắm, trái cây',
                "slug" => "rau-cu-nam-trai-cay-1182531600",
                "display_status" => 1,
            ],
            [
                "name" => 'Sữa các loại',
                "slug" => "sua-cac-loai-1182531600",
                "display_status" => 1,
            ],
        ];

        RootCategory::truncate();
        RootCategory::insert($data);
    }

}
