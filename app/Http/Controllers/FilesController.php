<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Image;
use Session;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = File::orderBy('id', 'desc')->paginate(10);
        
        return view('files.files')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // process image, if exists
        if ($request->hasFile('image')) {    
            
            //create new image obj
            $img = new File;
            
            // set image var and filename
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            
            // determine what category the image is
            // 1 = Release, 2 = Post, 3 = WM, 4 = Poster
            if ($request->wm) {
                $location = public_path('storage/images/wm/' . $filename);
                $path = 'storage/images/wm/' . $filename;
                $category = 3;
                $image_id = $category;
            } else if($request->poster) {
                $location = public_path('storage/images/posters/' . $filename);
                $path = 'storage/images/posters/' . $filename;
                $image_id = 4;
                $category = 4;
            } else {
                $location = public_path('storage/images/' . $filename);
                $path = 'storage/images/' . $filename;
                $image_id = 1;
                $category = 1;
            }
            
            // resize and save the image
            Image::make($image)->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location);
            
            // set image parameters
            $img->path_to_image = $path;
            $img->title = $filename;
            $img->category_id = $category;
            
            // save img to images table
            $img->save();
        }
        
        // process WAV zip if exists
        if ($request->hasFile('wav')) {
            
            $wav = $request->file('wav');
            $filename = $wav->getOriginalClientName();
            $location = 
            
            $post->wav = $filename;
        }
        
        // process mp3 zip if exists
        if (!empty($request->mp3)) {

            $mp3 = $request->mp3;
            $mp3->origName = $mp3->getClientOriginalName();
            $mp3->title = $mp3->origName;

            $post->mp3 = $mp3->title;

            Storage::disk('local')->putFileAs('zips', $mp3, $mp3->title);

        }

        // success message
        Session::flash('success', 'The form was successfully posted.');

        // ...& redirect
        return redirect()->route('files.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
