<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Collective\Html\Eloquent\FormAccessible;

class Release extends Model
{
    protected $table = 'releases';

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function image()
    {
        return $this->belongsTo('App\File');
    }
    public static function process($request, $global_vars)
    {
        // make a new Release object
        $release = new Release;

        // set post metadata
        $release->image_id = $global_vars['img_id'][0];
        $release->wav_id = $global_vars['wav_id'];
        $release->mp3_id = $global_vars['mp3_id'];
        $release->category_id = 1;
        $release->soundcloud_id = $request->soundcloud_id;

        $release->title = $request->title;
        $release->body = $request->body;
        $release->slug = str_slug($release->title, '-');
        $release->released = $request->released;
        $release->mastered_by = $request->mastered_by;
        $release->genre = $request->genre;

        // save post
        $release->save();

        return $release;
    }
}
