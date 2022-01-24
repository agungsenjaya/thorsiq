<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title','content','img','slug','user_id','blog','date','status','link','facebook','twitter','telegram','youtube','blogkategori_id','deleted_at'];

    public function users()
    {
        return $this->hasMany('App\User');
    }
    
    public function blogkategori()
    {
        return $this->belongsTo('App\BlogKategori');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
