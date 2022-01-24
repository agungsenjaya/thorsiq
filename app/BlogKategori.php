<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogKategori extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title','slug','deleted_at'];

    public function blogs()
    {
        return $this->hasMany('App\Blog');
    }
}
