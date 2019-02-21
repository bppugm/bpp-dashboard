<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $guarded = ['id'];
    protected $appends = ['formatted_updated_at'];
    protected $casts = [
        'value' => 'integer',
    ];

    public function getFormattedUpdatedAtAttribute(){
        return $this->updated_at->format('j F Y');
    }
        
}
