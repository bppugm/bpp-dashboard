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
        Achievement::create(['category_id' => 1, 'name' => 'publication_scopus', 'value' => 195]);
        Achievement::create(['category_id' => 1, 'name' => 'publication_wos', 'value' => 364]);
        Achievement::create(['category_id' => 2, 'name' => 'publication_ma', 'value' => 101]);
        Achievement::create(['category_id' => 2, 'name' => 'publication_other', 'value' => 2]);
        Achievement::create(['category_id' => 3, 'name' => 'book', 'value' => 73]);
        Achievement::create(['category_id' => 4, 'name' => 'citation_scopus', 'value' => 1838]);
        Achievement::create(['category_id' => 4, 'name' => 'total_citation', 'value' => 62093]);
        Achievement::create(['category_id' => 4, 'name' => 'journal_scopus', 'value' => 65]);
        Achievement::create(['category_id' => 4, 'name' => 'sinta_account', 'value' => 2081]);
        Achievement::create(['category_id' => 4, 'name' => 'total_staff', 'value' => 2793]);
    }
}
