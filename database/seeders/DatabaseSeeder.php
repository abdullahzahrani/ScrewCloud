<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('categories')->delete();
        DB::table('home_categories')->delete();
        DB::table('products')->delete();

        User::factory(['name' => 'user@gmail.com'])->create();
        Category::factory(5)->create();
        HomeCategory::factory(5)->create();
        Product::factory()
        ->count(3)
        ->for(Category::factory()->create())
        ->create();
    }
}
