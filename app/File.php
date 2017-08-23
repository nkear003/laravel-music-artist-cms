<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;

class File extends Model
{
    protected $table = 'files';
    
    public function category() 
    {
        return $this->belongsTo('App\Category');
    }
    
    public $img_id;
    
    public function processFiles($request) 
    {
        // process image, if exists
        if ($request->hasFile('images')) {    
            
            $images = $request->images;
            
            foreach($images as $image) {
                
                //create new images obj
                $img = new File;

                // set images var and filename
                $filename = time() . '.' . $image->getClientOriginalExtension();

                // determine what category the image is
                // 1 = Release, 2 = Post, 3 = WM, 4 = Poster
                if ($request->wm) {
                    $location = public_path('storage/images/wm/' . $filename);
                    $path = 'storage/images/wm/' . $filename;
                    $category = 3;
                    //$image_id = $category;
                } else if($request->poster) {
                    $location = public_path('storage/images/posters/' . $filename);
                    $path = 'storage/images/posters/' . $filename;
                    $category = 4;
                    //$image_id = 4;
                } else {
                    $location = public_path('storage/images/' . $filename);
                    $path = 'storage/images/' . $filename;
                    $category = 1;
                    //$image_id = 1;
                }

                // resize and save the image
                Image::make($image)->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location);

                // set file parameters for DB
                $img->path_to_image = $path;
                $img->title = $image->getClientOriginalName();
                $img->category_id = $category;

                // save file to table
                $img->save();
                
            }
            
            $this->img_id = $img->id;
            
        }
        
        // process WAV zip if exists
        if ($request->hasFile('wav')) {
            
            $wav = $request->file('wav');
            
            $filename = $wav->getOriginalClientName();
            $post->wav = $filename . $location;
            
            Storage::disk('local')->putFileAs('zips', $mp3, $filename);
        }
        
        // process mp3 zip if exists
        if ($request->hasFile('mp3')) {

            $mp3 = $request->file('mp3');
            
            $filename = $mp3->getClientOriginalName();
            $post->mp3 = $filename;

            Storage::disk('local')->putFileAs('zips', $mp3, $filename);

        }
        
    }
    
    public function getVars() {
        return $this->img_id;
    }
    
}
