<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogArchive extends Model
{
    protected $fillable = ['user_id','blog_id'];

    public function blog()
    {
        return $this->belongsTo('App\Blog');
    }
}
