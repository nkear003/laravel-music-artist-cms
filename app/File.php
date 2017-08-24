<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;
use Storage;

class File extends Model
{
    protected $table = 'files';
    
    public function category() 
    {
        return $this->belongsTo('App\Category');
    }
    
    public $img_id = null;
    public $wav_id = null;
    public $mp3_id = null;
    public $cat_id = null;
    
    public function processFiles($request) 
    {   
        
        // process image, if exists
        if ($request->hasFile('images')) {    
            
            $images = $request->images;
            
            foreach($images as $image) {
                
                //create new images obj
                $img = new File;

                // set files name and type
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $type = 'image';

                // determine what category the image is
                // 1 = Release, 2 = Post, 3 = WM, 4 = Poster
                if ($request->wm) 
                {
                    $location = public_path('storage/images/wm/' . $filename);
                    $path = 'storage/images/wm/' . $filename;
                    $cat_id = 3;
                } 
                else if ($request->poster) 
                {
                    $location = public_path('storage/images/posters/' . $filename);
                    $path = 'storage/images/posters/' . $filename;
                    $cat_id = 4;                    
                } 
                else 
                {
                    $location = public_path('storage/images/' . $filename);
                    $path = 'storage/images/' . $filename;
                    $cat_id = 5;
                }

                // resize and save the image
                Image::make($image)->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location);

                // set file parameters for DB
                $img->path = $path;
                $img->title = $image->getClientOriginalName();
                $img->category_id = $cat_id;
                $img->type = $type;

                // save file to table
                $img->save();
                
            }
            
            $this->img_id = $img->id;
            $this->cat_id = $cat_id;
            
        }
        
        // process WAV zip if exists
        if ($request->hasFile('wav')) {
            
            // create new file object
            $wav = new File;
            
            // data for the file
            $file = $request->file('wav');
            $filename = $file->getClientOriginalName();
            
            // store the file
            Storage::disk('local')->putFileAs('zips', $file, $filename);
            
            
            // set data for DB
            $wav->type = 'zip';
            $wav->path = storage_path('app/zips/') . $filename;
            $wav->category_id = 5; // 5 is no category
            
            // save to DB
            $wav->save();
            
            // set global vars
            $this->wav_id = $wav->id;
        }
        
        // process mp3 zip if exists
        if ($request->hasFile('mp3')) {

            // create new file object
            $mp3 = new File;
            
            // set metadata for file
            $file = $request->file('mp3');
            $filename = $file->getClientOriginalName();

            // store the file
            Storage::disk('local')->putFileAs('zips', $file, $filename);
            
            //set data for DB
            $mp3->type = 'zip';
            $mp3->path = storage_path('app/zips/') . $filename;
            $mp3->category_id = 5; // 5 is no category
            
            //save to DB
            $mp3->save();
            
            // set global variables
            $this->mp3_id = $mp3->id;
        }
        
    }
    
    // returns the file object
    public function getVars() {
        return $this;
    }
    
}
