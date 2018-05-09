<?php

namespace App\Observers;

use App\Achievement;
use App\Events\DashboardUpdated;

/**
* Achievement Observer
*/
class AchievementObserver
{
    
    public function updated(Achievement $achievement)
    {
        event(new DashboardUpdated($achievement->append('formatted_updated_at')->toArray()));
    }
}
