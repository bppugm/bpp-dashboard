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
        Achievement::create([
          'article_scopus' => 122,
          'proceeding_scopus' => 66,
          'article_other' => 181,
          'proceeding_other' => 1,
          'citation_scopus' => 56031,
          'book' => 28,
          'copyright' => 45,
          'sinta_account' => 2039,
          'total_staff' => 2793,  
        ]);
    }
}
