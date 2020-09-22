<?php

namespace App\Observers;

use App\Achievement;
use App\Events\AchievementUpdated;

/**
* Achievement Observer
*/
class AchievementObserver
{
    
    public function updated(Achievement $achievement)
    {
        event(new AchievementUpdated($achievement->append('formatted_updated_at')->toArray()));
    }
}
