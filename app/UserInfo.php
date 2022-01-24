<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = ['user_id','company_name','street','contract_address','state','zip','city','phone','phone_2','vat','telegram_id','twitter_id'];

    public function users()
    {
        return $this->hasMany('App\User');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
