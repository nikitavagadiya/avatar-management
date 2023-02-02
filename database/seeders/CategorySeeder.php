<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();

        $categories = [
            [
                'id'             => 1,
                'name'           => "Head",
                'position'       => 1,
                'image_url'      => $faker->imageUrl(100, 100),
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ], [
                'id'             => 2,
                'name'           => "Hairs",
                'position'       => 2,
                'image_url'      => $faker->imageUrl(100, 100),
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ], 
            [
                'id'             => 3,
                'name'           => "Eyes",
                'position'       => 3,
                'image_url'      => $faker->imageUrl(100, 100),
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ], [
                'id'             => 4,
                'name'           => "Lips",
                'position'       => 4,
                'image_url'      => $faker->imageUrl(100, 100),
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ], [
                'id'             => 5,
                'name'           => "Neck",
                'position'       => 5,
                'image_url'      => $faker->imageUrl(100, 100),
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ], [
                'id'             => 6,
                'name'           => "Torso",
                'position'       => 6,
                'image_url'      => $faker->imageUrl(100, 100),
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ], [
                'id'             => 7,
                'name'           => "Hand",
                'position'       => 7,
                'image_url'      => $faker->imageUrl(100, 100),
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],[
                'id'             => 8,
                'name'           => "Vest",
                'position'       => 8,
                'image_url'      => $faker->imageUrl(100, 100),
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],[
                'id'             => 9,
                'name'           => "Pants",
                'position'       => 9,
                'image_url'      => $faker->imageUrl(100, 100),
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],[
                'id'             => 10,
                'name'           => "Shoes",
                'position'       => 10,
                'image_url'      => $faker->imageUrl(100, 100),
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ],[
                'id'             => 11,
                'name'           => "Skin",
                'position'       => 11,
                'image_url'      => $faker->imageUrl(100, 100),
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
            ]
        ];

        Category::insert($categories);
    }
}
