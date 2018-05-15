<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FailedJob extends Model
{
    protected $table = 'failed_jobs';
    protected $dates = ['failed_at'];

    public function getFormattedDateAttribute(){
        return $this->failed_at->format('j F Y H:i');
    }
        
}
