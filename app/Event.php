<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['user_id','title','date','status','slug'];

    public function eventuser()
    {
        return $this->belongsTo('App\EventUser');
    }
}
