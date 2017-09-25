<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function releases() 
    {
        return $this->hasMany('App\Release');
    }
    public function files()
    {
        return $this->hasMany('App\File');
    }

}
