<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use Illuminate\Support\Facades\Storage;

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
        // javascript validate the data using Parsley
        
        $this->validate($request, array(
            'title' => 'required|max:255'   
        ));
        
        // store Post in database
        
        $post = new Post;
        
        if (!empty($request->image)) {
        
            $image = $request->image;
            $image->origName = $image->getClientOriginalName();    
            $image->title = $image->origName;
            
            $post->image = $image->title;
            
            Storage::disk('public')->putFileAs('images', $image, $image->title);   
            
        } 
        

        
        $post->title = $request->title;
        $post->slug = str_slug($post->title, '-');
        $post->body = $request->body;
        
        $post->save();
        
        
        // success message
        
        Session::flash('success', 'Your blog post was successfully created!');
        
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
    
    public function showArticle($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('posts.show')->withPost($post);
    }
}
