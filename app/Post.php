<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Collective\Html\Eloquent\FormAccessible;

class Post extends Model
{
    public function category() 
    {
        return $this->belongsTo('App\Category');
    }
}
