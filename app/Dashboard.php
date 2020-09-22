<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $guarded = ['id'];
    protected $cast = [
        'widgets' => 'json'
    ];

    public function setWidgetsAttribute($widgets)
    {
        $this->attributes['widgets'] = json_encode($widgets);
    }
}
