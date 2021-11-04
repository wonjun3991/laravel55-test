<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observable extends Model
{
    protected static function boot()
    {
        parent::boot();
        Observable::created(function($observable){
            Mock::create();
        });
    }
}
