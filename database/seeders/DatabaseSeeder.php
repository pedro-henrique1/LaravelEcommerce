<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Database\Factories\CouponFactory;
use Database\Factories\SlideFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(5)->create();
        Product::factory()->count(10)->create();
        User::factory()->count(1)->create();
        HomeCategory::factory()->count(5)->create();
        Sale::factory()->count(1)->create();
        CouponFactory::factory()->count(1)->create();
        SlideFactory::factory()->count(1)->create();
    }
}
