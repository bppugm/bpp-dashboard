<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::updateOrCreate(['id' => 1], ['name' => 'article']);
        Category::updateOrCreate(['id' => 2], ['name' => 'proceeding']);
        Category::updateOrCreate(['id' => 3], ['name' => 'book']);
        Category::updateOrCreate(['id' => 4], ['name' => 'other']);
    }
}
