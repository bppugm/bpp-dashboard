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
        Achievement::create(['category_id' => 1, 'name' => 'article_scopus', 'value' => 195]);
        Achievement::create(['category_id' => 1, 'name' => 'article_other', 'value' => 364]);
        Achievement::create(['category_id' => 2, 'name' => 'proceeding_scopus', 'value' => 101]);
        Achievement::create(['category_id' => 2, 'name' => 'proceeding_other', 'value' => 2]);
        Achievement::create(['category_id' => 3, 'name' => 'book', 'value' => 73]);
        Achievement::create(['category_id' => 4, 'name' => 'citation_scopus', 'value' => 1838]);
        Achievement::create(['category_id' => 4, 'name' => 'total_citation', 'value' => 62093]);
        Achievement::create(['category_id' => 4, 'name' => 'copyright', 'value' => 65]);
        Achievement::create(['category_id' => 4, 'name' => 'sinta_account', 'value' => 2081]);
        Achievement::create(['category_id' => 4, 'name' => 'total_staff', 'value' => 2793]);
    }
}
