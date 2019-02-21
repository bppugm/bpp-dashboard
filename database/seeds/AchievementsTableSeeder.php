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
        Achievement::truncate();
        
        Achievement::create(['category_id' => 1, 'name' => 'publication_scopus', 'value' => 195, 'automated' => true]);
        Achievement::create(['category_id' => 1, 'name' => 'publication_wos', 'value' => 1146]);
        Achievement::create(['category_id' => 2, 'name' => 'publication_ma', 'value' => 2146]);
        Achievement::create(['category_id' => 2, 'name' => 'publication_other', 'value' => 814]);
        Achievement::create(['category_id' => 3, 'name' => 'book', 'value' => 153]);
        Achievement::create(['category_id' => 4, 'name' => 'citation_scopus', 'value' => 4352]);
        Achievement::create(['category_id' => 4, 'name' => 'total_citation', 'value' => 81153, 'automated' => true]);
        Achievement::create(['category_id' => 4, 'name' => 'journal_scopus', 'value' => 5]);
        Achievement::create(['category_id' => 4, 'name' => 'journal_wos', 'value' => 4]);
        Achievement::create(['category_id' => 4, 'name' => 'sinta_account', 'value' => 2788, 'automated' => true]);
        Achievement::create(['category_id' => 4, 'name' => 'total_staff', 'value' => 2793]);
    }
}
