<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;
use Storage;
use App\Utility;

class File extends Model
{
    protected $table = 'files';

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function release()
    {
        return $this->belongsTo('App\Release');
    }
    public static function process($request)
    {
        // label forum request
        $file = $request;

        // global vars
        $global_vars = [
            'img_id' => [],
            'wav_id' => '',
            'mp3_id' => ''
        ];

        // if exists in request...
        if ($file->hasFile('images')) // process & save image
        {
            $images = $file->images;
            foreach($images as $image) {

                $file_meta = new File;

                // set image data
                $filename = $image->getClientOriginalName();
                // 1 = Release, 2 = Release, 3 = WM, 4 = Releaseer
                if($file->release) {
                    $file_meta->category_id = 2;
                    $file_meta->path = 'storage/images/releases' . $filename;
                } else if ($file->wm) {
                    $file_meta->category_id = 3;
                    $file_meta->path = 'storage/images/wm/' . $filename;
                } else if ($file->poster) {
                    $file_meta->category_id = 4;
                    $file_meta->path = 'storage/images/posters/' . $filename;
                } else {
                    $file_meta->category_id = 1;
                    $file_meta->path = 'storage/images/' . $filename;
                }

                // resize and save the image
                Image::make($image)->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($file_meta->path);

                // set file parameters for DB
                $file_meta->title = $filename;
                $file_meta->type = 'image';

                // save to database
                $file_meta->save();

                // global vars
                $global_vars['img_id'][] = $file_meta['id'];
            }
        }
        if ($file->hasFile('wav')) // process & save WAV zip
        {
            // new File instance
            $file_meta = new File();
            // store the file
            $filename = $file['wav']->getClientOriginalName();
            Storage::disk('local')->putFileAs('zips', $file->file('wav'), $filename);

            // set data for DB
            $file_meta->type = 'zip';
            $file_meta->path = '/app/zips/' . $filename;
            $file_meta->category_id = 1;
            $file_meta->title = $filename;

            // save to database
            $file_meta->save();

            // save global variables
            $global_vars['wav_id'] = $file_meta['id'];
        }
        if ($file->hasFile('mp3')) // process & save mp3 zip
        {
            // new File instance
            $file_meta = new File;

            // store the file
            $filename = $file['mp3']->getClientOriginalName();
            Storage::disk('local')->putFileAs('zips', $file->file('mp3'), $filename);

            //set data for DB
            $file_meta->type = 'zip';
            $file_meta->path = '/app/zips/' . $filename;
            $file_meta->category_id = 1;
            $file_meta->title = $filename;

            // save to database
            $file_meta->save();

            // save global variables
            $global_vars['mp3_id'] = $file_meta['id'];
        }

        return $global_vars;
    }
    // returns the file object
    public function getFileObject() {
        return $this;
    }

}
