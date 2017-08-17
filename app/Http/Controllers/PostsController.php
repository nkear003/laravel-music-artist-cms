<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Image;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all blog posts in it from db
        
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        
        // return a view and pass in the variable
        
        return view('posts.index')->withPosts($posts);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // php validate the data

        $this->validate($request, array(
            'title' => 'required|max:255|unique:posts,title'   
        ));

        // store Post in database

        $post = new Post;
        
        if ($request->hasFile('image')) {
            
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            
            if ($request->wm) {
                $location = public_path('storage/images/wm/' . $filename);
                $path = 'storage/images/wm/' . $filename;
            } else if($request->poster) {
                $location = public_path('storage/images/posters/' . $filename);
                $path = 'storage/images/posters/' . $filename;
            } else {
                $location = public_path('storage/images/' . $filename);
                $path = 'storage/images/' . $filename;
            }
            
            Image::make($image)->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location);
            
            $post->path_to_image = $path;
            $post->image = $filename;
            
        }
        
        
        if ($request->hasFile('wav')) {
            
            $wav = $request->file('wav');
            $filename = $wav->getOriginalClientName();
            $location = 
            
            $post->wav = $filename;
        }
        
                
//        if (!empty($request->wav)) {
//
//            $wav = $request->wav;
//            $wav->origName = $wav->getClientOriginalName();
//            $wav->title = $wav->origName;
//            $post->wav = $wav->title;
//            Storage::disk('local')->putFileAs('zips', $wav, $wav->title);
//            
//        }
     
        if (!empty($request->mp3)) {

            $mp3 = $request->mp3;
            $mp3->origName = $mp3->getClientOriginalName();
            $mp3->title = $mp3->origName;

            $post->mp3 = $mp3->title;

            Storage::disk('local')->putFileAs('zips', $mp3, $mp3->title);

        }
            
        $post->title = $request->title;
        $post->slug = str_slug($post->title, '-');
        $post->description = $request->description;
        $post->released = $request->released;
        $post->mastered_by = $request->mastered_by;
        $post->genre = $request->genre;
        $post->soundcloud_id = $request->soundcloud_id;

        $post->save();

        // success message

        Session::flash('success', 'The release was successfully created.');

        // redirect

        return redirect()->route('posts.show', $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        // find the release in the database and save as a var
        
        $post = Post::where('slug', $slug)->first();
            
        // return the view and pass in the var just created
            
        return view('posts.edit')->withPost($post);
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
        // validate the form
        
        $this->validate($request, array(
            'title' => 'required|max:255'   
        ));
        
        // save the data to the database
        
        $post = Post::find($id);

        if (!empty($request->image)) {

            $image = $request->image;
            $image->origName = $image->getClientOriginalName();    
            $image->title = $image->origName;

            $post->image = $image->title;

            Storage::disk('public')->putFileAs('images', $image, $image->title);

        }
        
        if (!empty($request->wav)) {

            $wav = $request->wav;
            $wav->origName = $wav->getClientOriginalName();
            $wav->title = $wav->origName;
        
            $post->wav = $wav->title;
            
            Storage::disk('public')->putFileAs('zips', $wav, $wav->title);
            
        }
        
        if (!empty($request->mp3)) {

            $mp3 = $request->mp3;
            $mp3->origName = $mp3->getClientOriginalName();
            $mp3->title = $mp3->origName;

            $post->mp3 = $mp3->title;

            Storage::disk('public')->putFileAs('zips', $mp3, $mp3->title);

        }
        

        $post->title = $request->input('title');
        $post->slug = str_slug($post->title, '-');
        $post->description = $request->input('description');
        $post->released = $request->input('released');
        $post->mastered_by = $request->input('mastered_by');
        $post->genre = $request->input('genre');
        $post->soundcloud_id = $request->input('soundcloud_id');

        $post->save();
        
        // set flash data with success message
        
        Session::flash('success', 'The release was successfully updated');
        
        // redirect with flash data with success message
        
        return redirect()->route('posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        // find the release
//        $post = Post::where('slug', $slug);
//        Post::where('slug', $slug)->delete();
        $post = Post::find($id);
        
        // delete it
        $post->delete();
//        Post::destroy($id);
        
        // Success flash method
        Session::flash('success', 'The release was successfully deleted');
        
        // redirect
        return redirect()->route('posts.index');
        
    }
}