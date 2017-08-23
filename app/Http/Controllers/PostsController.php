<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
//use Illuminate\Support\Facades\Storage;
use Storage;
use Image;
use App\File;

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
        // make a new Post object
        $post = new Post;
        
        // php validate the data
        $this->validate($request, array(
            'title' => 'required|max:255|unique:posts,title'   
        ));
        
        // run the processFiles function and return variables
        $file = new File;
        $file->processFiles($request);
        $img_id = $file->getVars();
            
        // set post parameters
        $post->title = $request->title;
        $post->slug = str_slug($post->title, '-');
        $post->body = $request->body;
        $post->released = $request->released;
        $post->mastered_by = $request->mastered_by;
        $post->genre = $request->genre;
        $post->soundcloud_id = $request->soundcloud_id;
        $post->category_id = 1;
        $post->image_id = $img_id;

        // save post
        $post->save();

        // success message
        Session::flash('success', 'The form was successfully posted.');

        // ...& redirect
        return redirect()->route('posts.index', $post->slug);
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
        $post->body = $request->input('body');
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
    
        public function release($slug) {
            
            $post = Post::where('slug', $slug)->first();
            return view('blog.release')->withSlug($slug);
            
//            return view('blog.release')->withSlug($slug);
    }
}