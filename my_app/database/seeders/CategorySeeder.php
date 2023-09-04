<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
                "name" => 'Thịt các loại',
                "slug" => "thit-cac-loai-1182531600",
                "display_status" => 1,
                "root_category_id" => 1
            ],
            [
                "name" => 'Cá, hải sản',
                "slug" => "ca-hai-san-1182531600",
                "display_status" => 1,
                "root_category_id" => 1
            ],
            [
                "name" => 'Trứng gà, vịt, cút',
                "slug" => "trung-ga-vit-cut-1182531600",
                "display_status" => 1,
                "root_category_id" => 1
            ],
        ];

        Category::truncate();
        Category::insert($data);
    }
}
