<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    
    public function posts() {
        return $this->hasMany('App\Post');
    }
    
    public function images() {
        return $this->hasMany('App\File');
    }
    
}
