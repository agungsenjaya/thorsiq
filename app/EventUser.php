<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    protected $fillable = ['user_id','event_id','token'];

    public function events()
    {
        return $this->hasMany('App\Event');
    }
    
    public function users()
    {
        return $this->hasMany('App\User');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
