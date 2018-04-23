<?php

use App\Achievement;
use Illuminate\Database\Seeder;

class AchievementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Achievement::create(['category_id' => 1, 'name' => 'article_scopus']);
        Achievement::create(['category_id' => 1, 'name' => 'article_other']);
        Achievement::create(['category_id' => 2, 'name' => 'proceeding_scopus']);
        Achievement::create(['category_id' => 2, 'name' => 'proceeding_other']);
        Achievement::create(['category_id' => 3, 'name' => 'book']);
        Achievement::create(['category_id' => 4, 'name' => 'citation_scopus']);
        Achievement::create(['category_id' => 4, 'name' => 'total_citation']);
        Achievement::create(['category_id' => 4, 'name' => 'copyright']);
        Achievement::create(['category_id' => 4, 'name' => 'sinta_account']);
        Achievement::create(['category_id' => 4, 'name' => 'total_staff']);
    }
}
