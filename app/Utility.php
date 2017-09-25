<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    public static function debug($object)
    {
        die(print_r($object));
    }
}
